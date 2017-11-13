<?php
/**
 * Created by PhpStorm.
 * User: praktikant
 * Date: 08.11.2017
 * Time: 11:49
 */

require 'vendor/autoload.php';
include_once 'dbconfig.php';

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Templatefile
$tpl = new Dwoo\Template\File('templates/tickets-admin.tpl');

$page = array();
$page['title']   = 'Ticketsystem | Tickets';

if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];

$stmt = $DB_con->prepare("SELECT * FROM user WHERE userID=:user_id");
$stmt->execute(array(":user_id" => $user_id));

$tickets = $DB_con->prepare("SELECT * FROM tickets");
$tickets->execute();

$ticketRow = $stmt->fetch(PDO::FETCH_ASSOC);

$data = 0;

echo $core->get($tpl, $data);
