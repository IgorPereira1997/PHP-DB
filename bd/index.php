<?php
    session_start();

    include 'conexion.php';
    
    include 'header.php';

    if(isset($_SESSION['login'])){
        if (!isset($_GET['pagina'])) {
            include 'views/cursos.php';
        } else {
            switch ($_GET['pagina']) {
                case 'cursos':
                    include 'views/cursos.php';
                    break;
                case 'alunos':
                    include 'views/alunos.php';
                    break;
                case 'matriculas':
                    include 'views/matriculas.php';
                    break;
                case 'inserir_curso':
                    include 'views/inserir_curso.php';
                    break;
                case 'inserir_aluno':
                    include 'views/inserir_aluno.php';
                    break;
                case 'inserir_matricula':
                    include 'views/inserir_matricula.php';
                    break;
                default:
                    include 'views/home.php';
                    break;
            }
        }
    }else{
        include 'views/home.php';
    }

    
    
    
    
    include 'footer.php';
     