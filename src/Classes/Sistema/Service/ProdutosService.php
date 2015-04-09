<?php

namespace Classes\Sistema\Service;



use Classes\Sistema\Entity\Produtos;
use Classes\Sistema\Mapper\ProdutosMapper;

class ProdutosService {

      private $entityProduto;
      private $produtosMapper;

      public function __construct(Produtos $produtos, ProdutosMapper $produtosMapper)
      {
          $this->entityProduto = $produtos;
          $this->produtosMapper = $produtosMapper;
      }

      public function insert(array $dados)
      {
          $this->entityProduto->setNome($dados['nome']);
          $this->entityProduto->setDescricao($dados['descricao']);
          $this->entityProduto->setValor($dados['valor']);

         return $this->produtosMapper->insert($this->entityProduto);

      }

      public function fetchAll()
      {
            return $this->produtosMapper->fetchAll();
      }


} 