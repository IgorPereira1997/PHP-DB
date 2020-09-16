<?php

include "conexion.php";


if(select($connect, array("usuarios"), array("*"), "user = '".addslashes($_POST['user'])."' AND password = '".md5($_POST['password'])."'")){
    session_start();
    $_SESSION['login'] = true;
    $_SESSION['user'] = $_POST['user'];
    header('location:index.php');
}else{
    header('location:index.php?erro');
}