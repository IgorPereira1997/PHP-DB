<?php

include 'conexion.php';

delete($connect, "cursos", array("id_curso", $_GET['id']));

if(verificarValorBD($connect, "aluno_cursos", array("id_curso", $_GET['id']))){
    delete($connect, "alunos_cursos", array("id_curso", $_GET['id']));
}


header("location:index.php?pagina=cursos");