<?php

class newacount
{
    private $host;
    private $username;
    private $pass;
    private $database;
    private $db;
    public $id;


    public function __construct($host, $username, $pass, $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->pass = $pass;
        $this->database = $database;
        $this->db = mysqli_connect($this->host, $this->username, $this->pass, $this->database);

        if (!$this->db) {
            echo "ERROR IN CONNECT TO DATABASE " . mysqli_connect_error();
        }
    }


    #Login Page and check the error
    public function adduser(string $schame, array $theaddeddata, $page = "")
    {
        #get The Keys And Value in The Database To get Started 
        $key1 = implode(",", array_keys($theaddeddata));

        $map = implode(",", array_map(
            function ($value) {
                $data = mysqli_real_escape_string($this->db, $value);
                return "'$data'";
            },
            array_values($theaddeddata)
        ));

        #check if the data if it exites send error
        $check = mysqli_fetch_all(mysqli_query($this->db, "SELECT id,username ,email FROM user"), MYSQLI_ASSOC);
        $datanames = [];
        $dataemail = [];
        foreach ($check as $key => $value) :
            $datanames[] = $value["username"];
            $dataemail[] = $value["email"];
        endforeach;

        $sql = "INSERT INTO `$schame` ($key1) VALUES ($map)";


        if (mysqli_query($this->db, $sql)) {
            #set Cookie to Check If The Bro Has Data  And store username 
            setcookie(
                "username",
                $theaddeddata["username"],
                strtotime("+1 week"),
                "/"
            );
            header("Location: $page");
            exit;
        } else {
            echo "<span class='error'>The Username or  The Email Is Used</span>";
        }
    }

    public  function ended()
    {
        if (mysqli_close($this->db)) {
            echo "THE DATA IS CLOSED";
        } else {
            echo "ERROR";
        }
    }
}
class login
{
    private $host;
    private $username;
    private $pass;
    private $database;
    private $db;
    public function __construct($host, $username, $pass, $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->pass = $pass;
        $this->database = $database;
        $this->db = mysqli_connect($this->host, $this->username, $this->pass, $this->database);

        if (!$this->db) {
            echo "ERROR IN CONNECT TO DATABASE " . mysqli_connect_error();
        }
    }
    public function login($schame, $username, $email, $pass)
    {
    }
}

$db = new newacount("localhost", "mohammed", "m12345", "project");


// $db->adduser("user", [
//     "username" => "Mohammaseda42",
//     "email" => "alballf12a1@gmail.com",
//     "passworld" => "V05112i",
//     "age" => 10
// ]);
