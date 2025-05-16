<?php

require_once 'Database.php';

class Compra
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    public function adicionarCompra($ativo, $quantidade, $valorUnitario, $dataCompra)
    {
        $sql = "INSERT INTO compras (ativo, quantidade, valor_unitario, data_compra) VALUES (:ativo, :quantidade, :valor_unitario, :data_compra)";
        $query = $this->db->prepare($sql);

        $query->execute([
            'ativo' => $ativo,
            'quantidade' => $quantidade,
            'valor_unitario' => $valorUnitario,
            'data_compra' => $dataCompra
        ]);
    }
}
