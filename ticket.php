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

    public function createTicket($tsubject, $tmessage, $tmail)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO ticket(name, email, message) VALUES (:tsubject, :tmessage, :tmail)");

            $stmt->bindparam(":tsubject", $tsubject);
            $stmt->bindparam(":tmessage", $tmessage);
            $stmt->bindparam(":tmail", $tmail);

            return $stmt;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}