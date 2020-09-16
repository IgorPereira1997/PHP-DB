<a class="btn btn-success" href="?pagina=inserir_aluno">Inserir Novo Aluno</a>
<p></p>
<table class="table table-hover table-striped" id="alunos">
    <thead>
        <tr>
            <th>Aluno</th>
            <th>Data de Nascimento</th>
            <th>Endereço</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>CPF</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $linha = select($connect, array("alunos"), array("*"));
        $qtdElementos = count($linha);
        $qtdLinhas = count($linha[0]);
        for ($i = 0; $i < $qtdElementos; $i++) {
            echo '<tr>';
            for ($j = 1; $j < $qtdLinhas; $j++) {
                echo '<td style="">' . $linha[$i][$j] . '</td>';
            }
        ?>
            <td><a href="?pagina=inserir_aluno&editar=<?php echo $linha[$i][0]; ?>"><span style="color: DodgerBlue;"><i class="fas fa-user-edit"></span></i></a></td>
            <td><a href="deleta_aluno.php?id=<?php echo $linha[$i][0]; ?>"><span style="color: Tomato;"><i class="fas fa-user-times"></i></span></a></td>
        <?php
            echo '</tr>';
        }
        ?>
    </tbody>
</table>