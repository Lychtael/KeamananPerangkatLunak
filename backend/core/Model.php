<?php
require_once "../config/database.php";

class Model
{
    protected $db;
    protected $table;
    protected $conn;

    public function __construct()
    {
        $this->db = new Database();
        $this->conn = $this->db->connect();
    }
}
