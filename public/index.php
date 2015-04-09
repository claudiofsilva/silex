<?php

require_once __DIR__.'/../bootstrap.php';

use Classes\Sistema\Service\ClienteService;
use Classes\Sistema\Entity\Cliente;
use Classes\Sistema\Mapper\ClienteMapper;
use Classes\Sistema\Entity\Produtos;
use Classes\Sistema\Mapper\ProdutosMapper;
use Classes\Sistema\Service\ProdutosService;

$app['clienteService'] = function() use ($app) {
    $cliente = new Cliente();

    $clienteMapper = new ClienteMapper($app['db']);

    $clienteService = new ClienteService($cliente, $clienteMapper);

    return $clienteService;
};


$app['produtosService'] = function() use($app){
    $produtos = new Produtos();

    $produtosMapper = new ProdutosMapper($app['db']);

    $produtosService = new ProdutosService($produtos,$produtosMapper);

    return $produtosService;
};



$app->get("/cliente", function()  use ($app){

    $dadosCliente = [
        'nome' => "Empresa X",
        'email' => "contato@empresax.com.br"
    ];

    $result = $app['clienteService']->insert($dadosCliente);

    return $app->json($result);

});

$app->get("/produtos", function() use($app) {

    $dadosProdutos = [
        'nome' => "produto 1",
        'descrição' => "Essa é uma simples descrição do produto",
        'valor' => "100,55"
    ];

    $result = $app['produtosService']->insert($dadosProdutos);

    if($result){
        return $app->json($app['produtosService']->fetchAll());
    }else{
        die('não foi possivel persistir no banco de dados');
    }

});


$app->get("/", function() use ($app){
    return $app['twig']->render('index.twig');
});

$app->get("/ola/{nome}", function($nome) use ($app){
    return $app['twig']->render('ola.twig',['nome' => $nome]);
});

$app->get("/clientes", function() use ($app){

    $clientes = $app['clienteService']->fetchAll();

    return $app['twig']->render("clientes.twig",["clientes" => $clientes]);

});

$app->run();