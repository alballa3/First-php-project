<?php
class books
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
            echo "DATABASE HAS ERROR";
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
    public function addbook($schame, array $addeddata, $page)
    {
        $keyforsql = implode(",", array_map(
            function ($A) {
                return "`$A`";
            },
            array_keys($addeddata)
        ));
        $valueforsql = implode(",", array_map(
            fn ($a) => "'$a'",
            array_values($addeddata)
        ));
        #ADD THE BOOK AFTER TO CHECK IF THE BOOK EXITS
        $sql = "INSERT INTO `$schame` ($keyforsql) VALUES ($valueforsql)";
        if (mysqli_query($this->db, $sql)) {
            # code...
            echo "YOur Good";
            header("Location : https://www.youtube.com/ ");
            exit;
            $this->ended();
        } else {
            echo "There Is Error With the data " . mysqli_error($this->db);
        }
    }

    public function getalldata(){
        $sql="SELECT * FROM book ";
        $data=mysqli_query($this->db,$sql);
        return mysqli_fetch_all($data,MYSQLI_ASSOC);
    }
}

$db = new books("localhost", "mohammed", "m12345", "project");

// $db->addbook("book", [
//     "book_title" => "ELZERO WEB SCHOOL IS COOL",
//     "book_auther" => "Elzero is good",
//     "book_des" => "GNASOGJGSAOKJGKGSJGJGKGSJ",
//     "book_by" => "mohammed"
// ], "../index.php");
