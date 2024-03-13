<?php

require_once('database.php');
session_start();

class User
{
    public $db;
    private $id;

    private $section;
    private $search_input;
    private $boekid;

    private $boek;
    private $email_leen;

    private $titel;
    private $auteur;
    private $onderwerp;
    private $isbn;
    private $jaar;
    private $aanwezig;
    private $nummer;

    public function __construct()
    {
        $this->db = new DatabaseClass();
    }

    public function searchBook()
    {
        $result = $this->db->database->query("SELECT * FROM boeken");
        return $result;
    }

    public function leenboek($boekid)
    {
        $this->boekid = $boekid;
        $result = $this->db->database->query("SELECT * FROM boeken WHERE id=$this->boekid");
        return $result;
    }

    public function leenconfirm($boek, $email_leen)
    {
        $this->boek = $boek;
        $this->email_leen = $email_leen;

        $update = $this->db->database->query("UPDATE boeken SET aanwezig = '0' WHERE id = $this->boek");

        $result = $this->db->database->query("INSERT INTO leningen (boek_id, emailadres) VALUES ('$this->boek', '$this->email_leen')");
        return $update;
        return $result;

    }

    public function getReservering()
    {
        $result = $this->db->database->query("SELECT * FROM leningen");
        return $result;
    }

    public function deleteLening($nummer)
    {
        $this->nummer = $nummer;
        $result = $this->db->database->query("DELETE FROM leningen WHERE id=$this->nummer");

        $_SESSION['message'] = "Lening deleted!";
        return $result;
    }

    public function checkaantal($email_leen)
    {
        $this->email_leen = $email_leen;
        $result = $this->db->database->query("SELECT COUNT($email_leen) FROM leningen WHERE emailadres=$this->email_leen");
        return $result;
    }
    

    public function save($titel, $auteur, $onderwerp, $isbn, $jaar, $aanwezig)
    {
        $this->titel = $titel;
        $this->auteur = $auteur;
        $this->onderwerp = $onderwerp;
        $this->isbn = $isbn;
        $this->jaar = $jaar;
        $this->aanwezig = $aanwezig;
        $this->db->database->query("INSERT INTO boeken (titel, auteur, onderwerp, isbn, jaar, aanwezig) VALUES ('$this->titel', '$this->auteur', '$this->onderwerp', '$this->isbn', '$this->jaar', '$this->aanwezig')");
        $_SESSION['message'] = "Boek saved";
        header("Location: admin.php");
    }

    public function update($id, $titel, $auteur, $onderwerp, $isbn, $jaar, $aanwezig)
    {
        $this->id = $id;
        $this->titel = $titel;
        $this->auteur = $auteur;
        $this->onderwerp = $onderwerp;
        $this->isbn = $isbn;
        $this->jaar = $jaar;
        $this->aanwezig = $aanwezig;

        $this->db->database->query("UPDATE boeken SET titel='$this->titel', auteur='$this->auteur', onderwerp='$this->onderwerp', isbn='$this->isbn', jaar='$this->jaar', aanwezig='$this->aanwezig' WHERE id='$this->id'");
        $_SESSION['message'] = "Boek updated";
        header("Location: ../public/admin.php");
    }

    public function delete($id)
    {
        $this->id = $id;
        $this->db->database->query("DELETE FROM boeken WHERE id=$this->id");

        $_SESSION['message'] = "User deleted!";
        header("Location: home.php");
    }

    public function findBoek($id)
    {
        $this->id = $id;
        $result = $this->db->database->query("SELECT * FROM boeken WHERE id=$this->id");
        return $result->fetch_array();
    }

    public function getAllUsers()
    {
        $result = $this->db->database->query("SELECT * FROM users");
        return $result;
    }

    public function loginFunction()
    {
        $email = $_POST['email_login'];
        $password = $_POST['password_login'];

        $sql = "SELECT * FROM gebruikers WHERE emailadres = '$email' AND wachtwoord = '$password'"; 
        $users = $this->db->database->query($sql);

        while ($userInfo = $users->fetch_assoc())
        {
            if ($email == $userInfo['emailadres'] && $password == $userInfo['wachtwoord'])
            {
                $us = $userInfo['emailadres'];
                $_SESSION['username'] = $us;
                header("Location: ../public/admin.php");
            }
            else
            {
                header("Location: ../public/login.php");
            }
        }
    }

}
