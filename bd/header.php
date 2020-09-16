<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cursos PHP&MySQL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://kit.fontawesome.com/21c82cb1ef.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <script>
        $(function() {
            $('#cursos').DataTable();
            $('#alunos').DataTable();
            $('#matriculas').DataTable();
        });
    </script>

</head>

<body>
    <header>
        <div class="container">
            <a href="?pagina=cursos"><img src="img/logo.png" title="Logo" alt="Logo"></a>
            <div id="menu">
                <a href="?pagina=cursos">Cursos</a>
                <a href="?pagina=alunos">Alunos</a>
                <a href="?pagina=matriculas">Matrículas</a>
                <?php if (isset($_SESSION['login'])) { ?>
                    <a href="logout.php">
                        <span style="color: aqua;"><?php echo $_SESSION['user']; ?></span> (sair)
                    </a>
                <?php } ?>
            </div>
        </div>
    </header>

    <div id="conteudo" class="container">