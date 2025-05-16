<?php

class Database 
{
    private $host = "localhost";
    private $port = "3306";
    private $db = "bolsa_de_valores";
    private $user = "root";
    private $pass = "";
    private $pdo;

    public function connect()
    {
        if (!$this->pdo) {
            try {
                // mysql:host=localhost;port=3306;dbname=bolsa_de_valores
                $dns = "mysql:host={$this->host};port={$this->port};dbname={$this->db}";
                $this->pdo = new PDO($dns, $this->user, $this->pass);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $th) {
                die("Erro ao conectar ao banco de dados: " . $th->getMessage());
            }
        }

        return $this->pdo;
    }
}