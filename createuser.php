<?php
require 'vendor/autoload.php';
include_once 'dbconfig.php';

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Templatefile
$tpl = new Dwoo\Template\File('templates/createuser.tpl');

$page = array();
$page['title']   = 'Ticketsystem | Dashboard';

if(!$user->is_loggedin())
{
    $user->redirect('index.php');
}

$user_data = $user->getUser();
$user_data=$user_data->fetch(PDO::FETCH_ASSOC);


$tickets = $ticket->getAllTickets();
$tickets = $tickets->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['createUser'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $role = trim($_POST['role']);
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);
    $firstname = htmlspecialchars($firstname);
    $lastname = htmlspecialchars($lastname);

    try {
        $user->createUser($email, $password, $firstname, $lastname, $role);
        echo 'Erfolgreich';
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$data = array('user'=>$user_data);

echo $core->get($tpl, $data);