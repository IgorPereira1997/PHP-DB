<?php if (!isset($_GET['editar'])) { ?>
    <h1>Inserir novo curso</h1>
    <br><br>
    <form method="POST" action="insercao_curso.php">
        <div class="form-group">
            <label>Nome do Curso:</label>
            <input class="form-control" type="text" name="nome_curso" placeholder="Insira o nome do curso">
        </div>
        <div class="form-group">
            <label>Carga Horária:</label>
            <input class="form-control" type="text" name="carga_horaria" placeholder="Insira a Carga Horária">
        </div>
        <input type="submit" value="Inserir Curso">
    </form>
<?php } else {
    $linha = select($connect, array("cursos"), array("*"), "id_curso = " . $_GET['editar']);
?>
    <form method="POST" action="edita_curso.php">
        <div class="form-group">
            <label>Nome do Curso:</label>
            <input class="form-control" type="text" name="nome_curso" placeholder="Insira o nome do curso" value=" <?php echo $linha[0][1]; ?>">
        </div>
        <div class="form-group">
            <label>Carga Horária:</label>
            <input class="form-control" type="text" name="carga_horaria" placeholder="Insira a Carga Horária" value="<?php echo $linha[0][2]; ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo $_GET['editar']; ?>">
        <input class="btn btn-warning" type="submit" value="Editar Curso">
    </form>
<?php } ?>