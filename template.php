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
    <h1>Gerenciado de Tarefas</h1>
    <?php require 'formulario.php'; ?>
    <?php if ($exibir_tabela) : ?>
        <?php require 'tabela.php'; ?>
    <?php endif; ?>
</body>

</html>