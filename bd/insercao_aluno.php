<?php
include 'conexion.php';

$data = $_POST['data_nasc_ano'] . "-";
if (strlen($_POST['data_nasc_mes']) == 1) {
    $data .= '0' . $_POST['data_nasc_mes']."-";
} else {
    $data .= $_POST['data_nasc_mes'] . "-";
}
if(strlen($_POST['data_nasc_dia']) == 1){
    $data .= '0'.$_POST['data_nasc_dia'];
} else {
    $data .= $_POST['data_nasc_dia'];
}

insert($connect, 
       "alunos", 
       array($_POST['nome_aluno'], 
             $data,
             $_POST['endereco'],
             $_POST['cidade'],
             $_POST['estado'],
             (string)$_POST["cpf"]
        ), 
       array('nome', 'data_nasc', 'endereco', 'cidade','estado', 'cpf'));

header('location:index.php?pagina=alunos');
