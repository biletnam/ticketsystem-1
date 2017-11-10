<?php
/**
 * Created by PhpStorm.
 * User: praktikant
 * Date: 08.11.2017
 * Time: 11:34
 */
require 'vendor/autoload.php';
require_once 'dbconfig.php';

// Controller
$core = new Dwoo\Core();

// Template
$tpl = new Dwoo\Template\File('templates/createticket.tpl');

$page = array();
$page['title']   = 'The next social networking website';

if (isset($_POST['createTicket'])) {
    $name = trim($_POST['tname']);
    $email = trim($_POST['temail']);
    $message = trim($_POST['tmessage']);
    $message = htmlspecialchars($message);

    try {
        $ticket->createTicket($name, $email, $message);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}
echo $core->get($tpl, $page );


?>
