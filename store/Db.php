<?php

class Db {

    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'store';

    public function __construct() {
        $this->connnect();
    }

    public function connnect() {

        $con = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {

//            echo "Connected";
        }

        return $con;
    }

    public function getResults($query) {

        $row = '';
        if ($result = mysqli_query($this->connnect(), $query)) {

            while ($row = mysqli_fetch_object($result)) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    public function insertRow($query) {

        $sql = mysqli_query($this->connnect(), $query);

        return $sql;
    }

}




//echo '<pre>';
//var_dump($result);
//echo '</pre>'
?>