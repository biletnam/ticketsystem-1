<?php
require 'vendor/autoload.php';
include_once 'dbconfig.php';

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Templatefile
$tpl = new Dwoo\Template\File('templates/ticketsdetail.tpl');

$page = array();
$page['title']   = 'Ticketsystem | Dashboard';

if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}

$user = $user->getUser();
$user=$user->fetch(PDO::FETCH_ASSOC);

$ticketID = $_GET["id"];

$ticket_details = $ticket->getTicketDetails($ticketID);
$ticket_details = $ticket_details->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['editTicket'])) {
    $message = trim($_POST['message']);
    $message = htmlspecialchars($message);
    try {
        $ticket->editTicket($ticketID, $message);
        header('Location: /ticketsystem/tickets.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['closeTicket'])) {
    try {
        $ticket->closeTicket($ticketID);
        header('Location: /ticketsystem/tickets.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


$data = array('user'=>$user, 'ticket'=>$ticket_details);

echo $core->get($tpl, $data);

?>
