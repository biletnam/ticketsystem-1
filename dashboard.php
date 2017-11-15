<?php
require 'vendor/autoload.php';
include_once 'dbconfig.php';

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Templatefile
$tpl = new Dwoo\Template\File('templates/dashboard.tpl');

$page = array();
$page['title']   = 'Ticketsystem | Dashboard';

if(!$user->is_loggedin())
{
    $user->redirect('index.php');
}
$user = $user->getUser();
$user=$user->fetch(PDO::FETCH_ASSOC);

$userID = $user['userID'];
$ticketID = $ticket->get_oldest_unass_ticket();

if (isset($_POST['getTicket'])) {
    try {
        $ticket->getTicket($userID, $ticketID);
        header('Location: /ticketsystem/tickets.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$data = array('user'=>$user);

echo $core->get($tpl, $data);