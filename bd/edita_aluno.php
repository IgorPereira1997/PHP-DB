<?php

include 'conexion.php';

update($connect, 
       "alunos", 
       array(
             array('nome', $_POST['nome_aluno']),
             array('data_nasc', 
                   $_POST['data_nasc_ano']."-".
                   $_POST['data_nasc_mes']."-".
                   $_POST['data_nasc_dia'] ),
             array('endereco', $_POST['endereco']),
             array('cidade', $_POST['cidade']),
             array('estado', $_POST['estado']),
             array('cpf', $_POST['cpf'])
       ),
       "id_aluno = ".$_POST['id']
);

header('location:index.php?pagina=alunos');