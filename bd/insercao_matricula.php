<?php

include "conexion.php";

$id_aluno = $_POST['escolha_aluno'];
$id_curso = $_POST['escolha_curso'];
insert($connect, "alunos_cursos", 
       array($_POST['escolha_aluno'], 
             $_POST['escolha_curso']),
       array("id_aluno", "id_curso")
);

header('location:index.php?pagina=matriculas');