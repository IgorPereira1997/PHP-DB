<?php

$server = "localhost";
$user = "root";
$key = "";
$db = "escola_curso";

$connect = mysqli_connect($server, $user, $key, $db);
if(!$connect){
    die("Erro ao acessar banco de dados!");
}

$query = "SELECT * FROM cursos";
$consult = mysqli_query($connect, $query);

