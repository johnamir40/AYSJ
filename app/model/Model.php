<?php
session_start();
require_once("../app/db/Dbh.php");
abstract class Model{
    protected $db;
    protected $conn;

    public function connect(){
        if(null === $this->conn ){
            $this->db = Dbh::getInstance();
        }
        return $this->db;
    }
}
?>