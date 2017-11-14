<?php
require 'vendor/autoload.php';
include_once 'dbconfig.php';

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Templatefile
$tpl = new Dwoo\Template\File('templates/dashboard-admin.tpl');

$page = array();
$page['title'] = 'Ticketsystem | Dashboard';

if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM user WHERE userID=:user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
$userID = trim($userRow['userID']);

$ticketID = $ticket->get_oldest_unass_ticket();

print_r($ticketID);

if (isset($_POST['getTicket'])) {
    try {
        $ticket->getTicket($userID, $ticketID);
        $user->redirect('dashboard-admin.php');
        echo ('Erfolgreich');

    } catch (PDOException $e) {
            echo $e->getMessage();
            $user->redirect('dashboard-admin.php');
            echo ('Nicht erfolgreich');
        }
}

$data = array('firstname' => $userRow['firstname'], 'lastname' => $userRow['lastname'], 'role' => $userRow['role'], 'userID' => $userRow['userID']);

echo $core->get($tpl, $data);