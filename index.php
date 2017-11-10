<?php
// Include the main class, the rest will be automatically loaded
require 'vendor/autoload.php';
require_once 'dbconfig.php';

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Templatefile
$tpl = new Dwoo\Template\File('templates/index.tpl');

$page = array();
$page['title']   = 'The next social networking website';


if ($user->is_loggedin() != "") {
    $user->redirect('dashboard.php');
}

if (isset($_POST['login'])) {
    $umail = $_POST['email'];
    $upass = $_POST['password'];

    $stmt = $DB_con->prepare("SELECT * FROM user WHERE email=:umail");
    $stmt->execute(array(":umail" => $umail));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user->login($umail, $upass)) {
            $user->redirect('dashboard.php');
        }
    }

// Create some data

// Output the result

echo $core->get($tpl, $page);
?>