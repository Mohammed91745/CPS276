<?php
class Db_conn {
    private $host = 'russet-v8.wccnet.edu';
    private $db = 'mdthabata';
    private $user = 'mdthabata';
    private $pass = 'ajXXrZZ8ybJH'; 
    private $charset = 'utf8mb4';

    public function connect() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES    => false,
        ];
        try {
            return new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}