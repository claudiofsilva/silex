<?php

namespace Classes\Sistema\Mapper;

use \Classes\Sistema\Entity\Produtos;

class ProdutosMapper {

    private $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    public function insert(Produtos $produtos)
    {
        $sql = "INSERT INTO produtos (nome,descricao,valor) VALUES ('{$produtos->getNome()}','{$produtos->getDescricao()}','{$produtos->getValor()}')";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute();
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM produtos";
        $dados = $this->db->fetchAll($sql);

        return $dados;
    }
} 