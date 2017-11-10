<?php
require 'vendor/autoload.php';
include_once 'dbconfig.php';

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Templatefile
$tpl = new Dwoo\Template\File('templates/dashboard.tpl');

$page = array();
$page['title']   = 'The next social networking website';

if(!$user->is_loggedin())
{
    $user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM user WHERE userID=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$data = array('firstname'=>$userRow['firstname'], 'lastname'=>$userRow['lastname'], 'role'=>$userRow['role']);

echo $core->get($tpl, $data);