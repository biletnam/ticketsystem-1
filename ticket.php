<?php
/**
 * Created by PhpStorm.
 * User: praktikant
 * Date: 07.11.2017
 * Time: 14:43
 */

class TICKET
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function createTicket($name, $email, $message)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO tickets(name, email, message) VALUES (:name, :email, :message)");

            $stmt->bindparam(":name", $name);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":message", $message);
            $stmt->execute();

            return $stmt;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}