<?php

include 'conexion.php';

delete($connect, "alunos_cursos", array("id_aluno_cursos", $_GET['id']));

header("location:index.php?pagina=matriculas");
