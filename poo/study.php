<?php

    include_once("pessoa.php");
    include_once("programador.php");

    $a_person = new Programador("Igor", "Python");
 
    # var_dump($a_person);
    echo "<br>";
    echo $a_person->getNome();
    echo "<br>";
    echo $a_person::ESPECIE;


/*
Tabela constantes mágicas

__LINE__ -> Retorna o número da linha do script na qual ela foi declarada.

__FILE__ -> Retorna o caminho do arquivo PHP.

__DIR__ -> Retorna o diretório.

__FUNCTION__ -> Retorna a function a qual foi declarada.

__CLASS__ -> Retorna a class a qual foi declarada.

__METHOD__ -> Retorna a classe e o método a qual foi declarada.

__NAMESPACE__ -> Retona o namespace a qual foi declarada.

*/ 