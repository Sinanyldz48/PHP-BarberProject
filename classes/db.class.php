<?php
class DB
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "berber";

    protected function connect()
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            "Bağlantı Hatası: " . $e->getMessage();
        }
    }
}
?>
