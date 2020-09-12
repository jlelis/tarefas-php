<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
</head>

<body>

    <table>
        <tr>
            <th>Tarefa</th>
            <th>Descricao</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Concluída</th>
            <th colspan="2">Opções</th>
        </tr>
        <?php foreach ($lista_tarefas as $tarefa) : ?>
            <tr>
                <td>
                    <?php echo $tarefa['nome']; ?>
                </td>
                <td>
                    <?php echo $tarefa['descricao']; ?>
                </td>
                <td>
                    <?php echo
                        traduz_data_para_exibir($tarefa['prazo']); ?>
                </td>
                <td>
                    <?php echo
                        traduz_prioridade($tarefa['prioridade']); ?>
                </td>
                <td>
                    <?php echo
                        traduz_concluida($tarefa['concluida']); ?>
                </td>
                <td>
                    <a href="editar.php?id=<?php echo $tarefa['id']; ?>">
                        Editar
                    </a>
                </td>
                <td>
                    <a href="remover.php?id=<?php echo $tarefa['id']; ?>">
                        Remover
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


</body>

</html>