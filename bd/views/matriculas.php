<a class="btn btn-success" href="?pagina=inserir_matricula">Inserir Nova Matrícula</a>
<p></p>
<table class="table table-hover table-striped" id="matriculas">
    <thead>
        <tr>
            <th>Aluno</th>
            <th>Curso</th>
            <th>Deletar Matrícula</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $linha = select(
            $connect,
            array("alunos", "cursos", "alunos_cursos"),
            array("alunos.nome", "cursos.nome", "alunos_cursos.id_aluno_cursos"),
            "alunos_cursos.id_aluno = alunos.id_aluno AND alunos_cursos.id_curso = cursos.id_curso"
        );
        $qtdElementos = count($linha);
        $qtdLinhas = count($linha[0]);

        for ($i = 0; $i < $qtdElementos; $i++) {
            echo '<tr>';
            for ($j = 0; $j < ($qtdLinhas - 1); $j++) {
                echo '<td>' . $linha[$i][$j] . '</td>';
            }
        ?>
            <td><a href="deleta_matricula.php?id=<?php echo $linha[$i][2]; ?>"><span style="color: Tomato;"><i class="fas fa-trash-alt"></i></span></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>