<?php

include 'conexion.php';

update($connect, "cursos",
    array(array('nome', $_POST['nome_curso']),
           array('cargaHoraria', $_POST['carga_horaria'])),
    "id_curso = " . $_POST['id']
);

header('location:index.php?pagina=cursos');
