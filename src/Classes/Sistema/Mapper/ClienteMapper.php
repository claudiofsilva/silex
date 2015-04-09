<?php

namespace Classes\Sistema\Mapper;

use Classes\Sistema\Entity\Cliente;

class ClienteMapper {

    private $db;

    public function __construct($pdo){
        $this->db = $pdo;
    }


    public function inserir(Cliente $cliente)
    {
        $sql = "INSERT INTO clientes (nome,email) VALUES ('{$cliente->getNome()}','{$cliente->getEmail()}')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $this->fetchAll();

    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM clientes";

        $dados = $this->db->fetchAll($sql);

        return $dados;
    }

} 