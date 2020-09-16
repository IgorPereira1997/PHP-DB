<a class="btn btn-success" href="?pagina=inserir_curso">Inserir Novo Curso</a>
<p></p>
<table class="table table-hover table-striped" id="cursos">
    <thead>
        <tr>
            <th>Curso</th>
            <th>Carga horária</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $linha = select($connect, array("cursos"), array("*"));
        $qtdElementos = count($linha);
        $qtdLinhas = count($linha[0]);
        for ($i = 0; $i < $qtdElementos; $i++) {
            echo '<tr>';
            for ($j = 1; $j < $qtdLinhas; $j++) {
                echo '<td style="">' . $linha[$i][$j] . '</td>';
            }
        ?>
            <td><a href="?pagina=inserir_curso&editar=<?php echo $linha[$i][0]; ?>"><span style="color: Mediumslateblue;"><i class="fas fa-edit"></i></span></a></td>
            <td><a href="deleta_curso.php?id=<?php echo $linha[$i][0]; ?>"><span style="color: Tomato;"><i class="fas fa-ban"></i></span></a></td>
        <?php
            echo '</tr>';
        }
        ?>
    </tbody>
</table>