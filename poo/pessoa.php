<?php

class Pessoa
{
    protected $nome;
    const ESPECIE = "Homo Sapiens";

    public function __construct($tmpnome)
    {
        $this->nome = $tmpnome;
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