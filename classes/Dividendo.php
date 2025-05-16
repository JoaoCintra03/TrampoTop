<?php

require_once 'Database.php';

class Dividendo {
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();

    }

    public function adicionarDividendo($ativo, $valor, $dataRecebimento)
    {
        $sql = "INSERT INTO dividendos (ativo, valor, data_recebimento) VALUES (:ativo, :valor, :data_recebimento)";
        $query = $this->db->prepare($sql);
        $query->execute([
            'ativo' => $ativo,
            'valor' => $valor,
            'data_recebimento' => $dataRecebimento
        ]);
    }

    public function calcularDividendosPorAtivo()
    {
        $sql = "SELECT ativo, SUM(valor) AS total_dividendos GROUP BY ativo";
        $query = $this->db->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}   