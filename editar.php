<?php
session_start();
require "banco.php";
require "ajudantes.php";

$exibir_tabela = false;
$tem_erros = false;
$erros_validacao = [];

// if (array_key_exists('nome', $_GET) && $_GET['nome'] != '') {
if (tem_post()) {
    # code...

    $tarefa = [];
    $tarefa['id'] = $_GET['id'];

    if (array_key_exists('nome', $_GET) && strlen($_GET['nome']) > 0) {
        $tarefa['nome'] = $_GET['nome'];
    } else {
        $tem_erros = true;
        $erros_validacao['nome'] = 'o nome da tarefa é obrigatorio!';
    }

    if (array_key_exists('descricao', $_GET)) {
        $tarefa['descricao'] = $_GET['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }
    if (array_key_exists('prazo', $_GET) && strlen($_GET['prazo']) > 0) {
        if (validar_data($_GET['prazo'])) {
            $tarefa['prazo'] = traduz_data_para_banco($_GET['prazo']);
        } else {
            $tem_erros = true;
            $erros_validacao['prazo'] = 'O Prazp não é uma data valida!';
        }
    } else {
        $tarefa['prazo'] = '';
    }
    $tarefa['prioridade'] = $_GET['prioridade'];

    if (array_key_exists('concluida', $_GET)) {
        $tarefa['concluida'] = 1;
    } else {
        $tarefa['concluida'] = 0;
    }
    if (!$tem_erros) {
        editar_tarefa($conexao, $tarefa);
        header('Location: tarefas.php');
        die();
    }
}
$tarefa = buscar_tarefa($conexao, $_GET['id']);
// require "template.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pag. Edicao</title>
</head>

<body>
    <?php require "formulario.php" ?>
</body>

</html>