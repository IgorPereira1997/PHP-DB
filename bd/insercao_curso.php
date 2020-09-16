<?php
    include 'conexion.php';
   
    insert($connect, "cursos", array($_POST['nome_curso'], $_POST['carga_horaria']), array('nome', 'cargaHoraria'));

    header('location:index.php?pagina=cursos');
