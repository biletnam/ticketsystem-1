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

$data = array('user'=>$user);

echo $core->get($tpl, $data);