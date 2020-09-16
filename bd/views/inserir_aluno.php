<?php if (!isset($_GET['editar'])) { ?>
    <h1>Inserir novo aluno</h1>
    <br><br>
    <form method="POST" action="edita_aluno.php">
        <div class="form-group">
            <label>Nome do Aluno:</label>
            <input class="form-control" type="text" name="nome_aluno" placeholder="Insira o nome do aluno">
        </div>
        <div class="form-group">
            <label>Data de Nascimento:</label>
            <input class="form-control" type="number" name="data_nasc_dia" placeholder="" minlength="1" maxlength="31">
            <input class="form-control" type="number" name="data_nasc_mes" placeholder="" minlength="1" maxlength="12">
            <input class="form-control" type="number" name="data_nasc_ano" placeholder="" minlength="1900" maxlength="2020">
        </div>
        <div class="form-group">
            <label>Endereço:</label>
            <input class="form-control" type="text" name="endereco" placeholder="Insira o endereço">
        </div>
        <div class="form-group">
            <label>Cidade:</label>
            <input class="form-control" type="text" name="cidade" placeholder="Insira a cidade">
        </div>
        <div class="form-group">
            <label>Estado:</label>
            <input class="form-control" type="text" name="estado" placeholder="Insira o Estado">
        </div>
        <div class="form-group">
            <label>CPF:</label>
            <input class="form-control" type="text" name="cpf" placeholder="Insira o CPF">
        </div>
        <div class="form-group">
            <input class="form-control" type="hidden" name="id">
            <input class="btn btn-warning" type="submit" value="Editar Aluno">
        </div>
    </form>

<?php } else {
    $linha = select($connect, array("alunos"), array("*"), "id_aluno = " . $_GET['editar']);
    $data = $linha[0][2];
    $data_dia = $data[8] . $data[9];
    $data_mes = $data[5] . $data[6];
    $data_ano = $data[0] . $data[1] . $data[2] . $data[3];

?>
    <h1>Editar novo aluno</h1>
    <br><br>
    <form method="POST" action="edita_aluno.php">
        <div class="form-group">
            <label>Nome do Aluno:</label>
            <input class="form-control" type="text" name="nome_aluno" placeholder="Insira o nome do aluno" value="<?php echo $linha[0][1]; ?>">
        </div>
        <div class="form-group">
            <label>Data de Nascimento:</label>
            <input class="form-control" type="number" name="data_nasc_dia" placeholder="" minlength="1" maxlength="31" value="<?php echo $data_dia; ?>">
            <input class="form-control" type="number" name="data_nasc_mes" placeholder="" minlength="1" maxlength="12" value="<?php echo $data_mes; ?>">
            <input class="form-control" type="number" name="data_nasc_ano" placeholder="" minlength="1900" maxlength="2020" value="<?php echo $data_ano; ?>">
        </div>
        <div class="form-group">
            <label>Endereço:</label>
            <input class="form-control" type="text" name="endereco" placeholder="Insira o endereço" value="<?php echo $linha[0][3]; ?>">
        </div>
        <div class="form-group">
            <label>Cidade:</label>
            <input class="form-control" type="text" name="cidade" placeholder="Insira a cidade" value="<?php echo $linha[0][4]; ?>">
        </div>
        <div class="form-group">
            <label>Estado:</label>
            <input class="form-control" type="text" name="estado" placeholder="Insira o Estado" value="<?php echo $linha[0][5]; ?>">
        </div>
        <div class="form-group">
            <label>CPF:</label>
            <input class="form-control" type="text" name="cpf" placeholder="Insira o CPF" value="<?php echo $linha[0][6]; ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="hidden" name="id" value="<?php echo $_GET['editar']; ?>">
            <input class="btn btn-warning" type="submit" value="Editar Aluno">
        </div>
    </form>

<?php } ?>