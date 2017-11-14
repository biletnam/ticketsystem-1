<?php
require_once('session.php');
require_once('classes/userClass.php');
$user_logout = new USER();

if($user_logout->is_loggedin()!="")
{
    $user_logout->redirect('index.php');
}
if(isset($_GET['logout']))
{
    $user_logout->logout();
    $user_logout->redirect('index.php');
}

