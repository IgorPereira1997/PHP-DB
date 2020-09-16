<?php

class Programador extends Pessoa
{
    private $linguagem;

    public function __construct($tmpnome, $tmplinguagem)
    {
        $this->nome = $tmpnome;
        $this->linguagem = $tmplinguagem;

        echo "<br>Objeto ".__CLASS__." foi instanciado!<br>";
    
    }

    public function setLinguagem($ling)
    {
        $this->linguagem = $ling;
    }

    public function getLinguagem()
    {
        return $this->linguagem;
    }

}
