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

$user = $user->getUser();
$user=$user->fetch(PDO::FETCH_ASSOC);


$tickets = $ticket->getAllTickets();
$tickets = $tickets->fetchAll(PDO::FETCH_ASSOC);

$userTicket = $ticket->getAssignedTicket($user['userID']);
$userTicket = $userTicket->fetchAll(PDO::FETCH_ASSOC);



$data = array('user'=>$user, 'tickets'=>$tickets, 'userTicket'=>$userTicket);

echo $core->get($tpl, $data);

?>
