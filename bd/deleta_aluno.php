<?php

include 'conexion.php';

delete($connect, "alunos", array("id_aluno", $_GET['id']));

if (verificarValorBD($connect, "aluno_cursos", array("id_aluno", $_GET['id']))) {
    delete($connect, "alunos_cursos", array("id_aluno", $_GET['id']));
}


header("location:index.php?pagina=alunos");
