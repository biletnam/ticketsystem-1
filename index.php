<?php
// Include the main class, the rest will be automatically loaded
require 'vendor/autoload.php';
require_once 'dbconfig.php';


// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Templatefile
$tpl = new Dwoo\Template\File('templates/index.tpl');

$page = array();
$page['title'] = 'Ticketsystem | Lite';


if ($user->is_loggedin() != "") {
    $user->redirect('dashboard.php');
}

if (isset($_POST['login'])) {
    $umail = $_POST['email'];
    $upass = $_POST['password'];

    $stmt = $DB_con->prepare("SELECT * FROM user WHERE email=:umail");
    $stmt->execute(array(":umail" => $umail));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $role = $row['role'];

    $status = 1;
    $attempt = $DB_con->prepare("INSERT INTO login_attempts(user_id, status) VALUES ('$umail', '$status')");
    $attempt->execute();



    if ($user->login($umail, $upass)) {
        switch ($role) {
            case 'Admin':
                $user->redirect('dashboard-admin.php');
                break;
            case 'Manager':
                $user->redirect('dashboard-manager.php');
                break;
            default:
                $user->redirect('dashboard.php');
        }

    } else {
        echo 'Login fehlgeschlagen';
        $status = 0;
        $attempt = $DB_con->prepare("INSERT INTO login_attempts(user_id, status) VALUES ('$umail', '$status')");
        $attempt->execute();
    }
}

// Create some data

// Output the result

echo $core->get($tpl, $page);
?>