<!DOCTYPE html>
<?php session_start() ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css" media="screen">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
    <title>Gerenciador de Tarefas</title>
</head>
<h1 class="h1">Gerenciador de Tarefas</h1>
<!-- Aqui o Codigo-->

<body>
    <form method="$_GET">

        <fieldset>
            <legend>Nova tarefa</legend>
            <label class="class=" form-control">Tarefa: </label>
            <input type="text" name="nome" />
            <input type="submit" class="btn btn-primary" value="Cadastrar" />
            <button type="button" class="btn btn-warning">Limpar</button>
            </br>


        </fieldset>

    </form>
    <?php
    // if (array_key_exists('nome', $_GET)) {
    //     echo "Nome Tarefa: " . $_GET['nome'];
    // }
    $lista_tarefas = [];
    if (array_key_exists('nome', $_GET)) {

        $_SESSION['lista_tarefas'][] = $_GET['nome'];
    }
    $lista_tarefas = [];

    if (array_key_exists('lista_tarefas', $_SESSION)) {
        $lista_tarefas = $_SESSION['lista_tarefas'];
    }
    ?>
    <div class="table-responsive">
        <table class="table table-sm">
            <tr>
                <th>Tarefas</th>
            </tr>
            <?php foreach ($lista_tarefas as $tarefa) : ?>
                <tr>
                    <td><?php echo $tarefa; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>