<?php
/**
 *
 * Die Klasse represäntiert Tickets.
 *
 * @author Christoph Sczigiol
 * @version 1.0
 *
 */

class TICKET
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    /**
     *
     * Erstellen eines Tickets.
     *
     * @param $name
     * @param $email
     * @param $message
     * @return mixed
     */
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

    /**
     *
     * Sucht das älteste nicht zugewiesen Ticket aus der Datenbank.
     *
     * @return string
     */

    public function get_oldest_unass_ticket()
    {
        try {
                $stmt = $this->db->prepare("SELECT ticketsID FROM tickets WHERE isAssignedTo = 0 AND isFinished = 0 ORDER BY created LIMIT 1");
                $stmt->execute();

                $ticketRow = $stmt->fetch(PDO::FETCH_ASSOC);
                $ticketID = trim($ticketRow['ticketsID']);

                return $ticketID;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     *
     * Weist ein Ticket einem User zu.
     *
     * @param $userID
     * @param $ticketsID
     * @return mixed
     */

    public function getTicket($userID, $ticketsID)
    {
        try {

            $stmt = $this->db->prepare("UPDATE tickets SET isAssignedTo = :userID WHERE ticketsID = :ticketID");

            $stmt->bindparam(":userID", $userID);
            $stmt->bindparam(":ticketID", $ticketsID);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     *
     * Gibt alle in der DB vorhandenen Tickets zurück.
     *
     * @return mixed
     */

    public function getTicketDetails($ticketsID) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM tickets WHERE ticketsID = :ticketID");
            $stmt->bindparam(":ticketID", $ticketsID);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllTickets()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM tickets");
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAssignedTicket($userID) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM tickets WHERE isAssignedTo = :userID");
            $stmt->bindparam(":userID", $userID);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function editTicket($ticketID, $message) {
        try {
            $stmt = $this->db->prepare("UPDATE tickets SET message = :message WHERE ticketsID = :ticketID");
            $stmt->bindparam(":ticketID", $ticketID);
            $stmt->bindparam(":message", $message);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    /**
     *
     * Schließt ein bearbeitetes Ticket.
     *
     * @param $ticketID
     */

    public function closeTicket($ticketID)
    {
        try {
            $stmt = $this->db->prepare('UPDATE tickets SET isFinished = 1, isAssignedTo = 0 WHERE ticketsID = :ticketID');
            $stmt->bindparam(":ticketID", $ticketID);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}