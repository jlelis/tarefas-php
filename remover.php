<?php
require "banco.php";
remover_tarefa($conexao, $_GET['id']);
header('Location: tarefas.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pag. Remover</title>
</head>

<body>

</body>

</html>