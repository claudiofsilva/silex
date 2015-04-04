<?php

require_once __DIR__.'/../bootstrap.php';

$app->get("/cliente", function()  use ($app){

   $dadosCliente = [
       'nome' => "Empresa X",
       'email' => "contato@empresax.com.br",
       'cpf' => "000.000.000-00",
       'cnpj' => "00.000.000-0000-00"
   ];

   return $app->json($dadosCliente);

});

$app->run();