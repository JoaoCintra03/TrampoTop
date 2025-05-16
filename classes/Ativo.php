<?php

require_once 'Database.php';

class Ativo {
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    public function calcularPrecoMedio()
    {
        $sql = "SELECT 
                    ativo,
                    SUM(quantidade) as total_quantidade,
                    SUM(quantidade * valor_unitario) as total_valor
                FROM compras
                    GROUP BY ativo";
        $query = $this->db->query($sql);
        $ativos = $query->fetchAll(PDO::FETCH_ASSOC);

        //echo "<pre>";
        //print_r($ativos);exit;

        foreach($ativos as &$ativo) {
            $ativo['preco_medio'] = $ativo['total_valor'] / $ativo['total_quantidade'];
        }

        //echo "<pre>";
        //print_r($ativos);exit;
        return $ativos;
    }
}