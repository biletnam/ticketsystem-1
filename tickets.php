<?php
require 'vendor/autoload.php';
include_once 'dbconfig.php';

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Templatefile
$tpl = new Dwoo\Template\File('templates/tickets.tpl');

$page = array();
$page['title']   = 'Ticketsystem | Dashboard';

if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];

$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM user WHERE userID=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$user = array('firstname'=>$userRow['firstname'], 'lastname'=>$userRow['lastname'], 'role'=>$userRow['role'], 'userID'=>$userRow['userID']);
$tickets = $ticket->getAllTickets();
$tickets = $tickets->fetchAll(PDO::FETCH_ASSOC);


$data = array('user'=>$user, 'tickets'=>$tickets);

echo $core->get($tpl, $data);

?>
