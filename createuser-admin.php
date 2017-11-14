<?php
/**
 * Created by PhpStorm.
 * User: praktikant
 * Date: 07.11.2017
 * Time: 11:07
 */

require 'vendor/autoload.php';
include_once 'dbconfig.php';

// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();

// Templatefile
$tpl = new Dwoo\Template\File('templates/createuser-admin.tpl');

$page = array();
$page['title'] = 'Ticketsystem | User erstellen';

if (isset($_POST['signup'])) {
    $umail = trim($_POST['umail']);
    $upass = trim($_POST['upass']);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $role = trim($_POST['role']);

    try {
        $user->createUser($umail, $upass, $fname, $lname, $role);
        $user->redirect('dashboard-admin.php');

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

echo $core->get($tpl, $page);