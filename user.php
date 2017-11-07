<?php
/**
 * Created by PhpStorm.
 * User: praktikant
 * Date: 06.11.2017
 * Time: 17:14
 */

class USER
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function createUser($umail, $upass, $fname, $lname, $role)
    {
        try {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare("INSERT INTO user(email, password, firstname, lastname, role) VALUES (:umail, :upass, :fname, :lname, :role)");

            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":upass", $new_password);
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":role", $role);
            $stmt->execute();

            return $stmt;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login($uemail, $upassword)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM user WHERE email=:uemail");
            $stmt->execute(array(':uemail' => $uemail));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($upassword, $userRow['password'])) {
                    $_SESSION['user_session'] = $userRow['userID'];
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin()
    {
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
}