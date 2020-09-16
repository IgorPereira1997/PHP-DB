<h1>Inserir nova Matríula</h1>


<form method="post" action="insercao_matricula.php">
    <div class="form-group">
        <p>Selecione o Aluno: </p>
        <select class="form-control" name="escolha_aluno">
            <option>Selecione um aluno</option>
            <?php
            $linha = select($connect, array("alunos"), array("*"));
            $qtdElementos = count($linha);
            for ($i = 0; $i < $qtdElementos; $i++) {
                echo '<option value="' . $linha[$i][0] . '">' . $linha[$i][1] . '</option>';
            }
            $linha = null;
            $qtdElementos = null;
            ?>
        </select>
    </div>
    <div class="form-group">
        <p>Selecione o Curso: </p>
        <select class="form-control" name="escolha_curso">
            <option>Selecione um curso</option>
            <?php
            $linha = select($connect, array("cursos"), array("*"));
            $qtdElementos = count($linha);
            for ($i = 0; $i < $qtdElementos; $i++) {
                echo '<option value="' . $linha[$i][0] . '">' . $linha[$i][1] . '</option>';
            }

            ?>
        </select>
    </div>
    <input class="btn btn-warning" type="submit" value="Matricular Aluno no curso">
</form>