<?php

namespace Classes\Sistema\Entity;


class Cliente {

    private $nome;
    private $email;

    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function getNome()
    {
        return $this->nome;
    }



} 