<?php
/**
 * Created by PhpStorm.
 * User: praktikant
 * Date: 06.11.2017
 * Time: 17:07
 */

session_start();

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "ticketsystem";

try {
    $DB_con = new PDO("mysql:host={$DB_host}; dbname={$DB_name}",$DB_user,$DB_pass);
    $DB_con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo $e->getMessage();
}

include_once 'user.class.php';
$user = new USER($DB_con);

include_once 'ticket.php';
$ticket = new TICKET($DB_con);
