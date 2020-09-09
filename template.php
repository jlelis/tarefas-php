<?php require "tarefas.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet.css" type="text/css" />
    <title>Gerenciador de Tarefas</title>
</head>

<body>
    <h1> Gerenciador de Tarefas</h1>
    <form method="get">
        <fieldset>
            <legend>Nova Tarefa</legend>
            <label for="">Tarefa:
                <input type="text" name="nome" />
            </label>
            <label>Descriçao (Opicional):
                <textarea name="descricao"></textarea>
            </label>
            <label>
                Prazo (Opicional):
                <input type="text" name="prazo" />
            </label>
            <fieldset>
                <legend>Prioridades:</legend>
                <label>
                    <input type="radio" name="prioridade" value="1" checked />Baixa
                    <input type="radio" name="prioridade" value="2" />Média
                    <input type="radio" name="prioridade" value="3" />Alta
                </label>
            </fieldset>
            <label>
                Tarefa Concluida:
                <input type="checkbox" name="concluida" value="sim" />
            </label>

            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>
    <table>
        <tr>
            <th>Tarefa</th>
            <th>Descricao</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Concluída</th>
        </tr>
        <?php foreach ($lista_tarefas as $tarefa) : ?>
            <tr>
                <td><?php echo $tarefa['nome']; ?></td>
                <td><?php echo $tarefa['descricao']; ?></td>
                <td><?php echo $tarefa['prazo']; ?></td>
                <td><?php echo $tarefa['prioridade']; ?></td>
                <td><?php echo $tarefa['concluida']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>