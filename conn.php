<?php
require_once 'db/MysqliDb.php';
class Database
{
    private static $instance;
    private $db;

    private function __construct()
    {
        // Set database connection credentials
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'article';

        // Create a new database connection
        $this->db = new mysqliDb($host, $username, $password, $database);
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->db;
    }
}
