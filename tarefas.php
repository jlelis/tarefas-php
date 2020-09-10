<?php
session_start();
require "banco.php";
require "ajudantes.php";

if (array_key_exists('nome', $_GET) && $_GET['nome'] != '') {
    $tarefa = [];
    $tarefa['nome'] = $_GET['nome'];
    if (array_key_exists('descricao', $_GET)) {
        $tarefa['descricao'] = $_GET['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }
    if (array_key_exists('prazo', $_GET)) {
        // $tarefa['prazo'] = $_GET['prazo'];
        $tarefa['prazo'] = traduz_data_para_banco($_GET['prazo']);
    } else {
        $tarefa['prazo'] = '';
    }
    $tarefa['prioridade'] = $_GET['prioridade'];
    if (array_key_exists('concluida', $_GET)) {
        // $tarefa['concluida'] = $_GET['concluida'];
        $tarefa['concluida'] = 1;
    } else {
        $tarefa['concluida'] = 0;
    }
    // $_SESSION['lista_tarefas'][] = $tarefa;
    gravar_tarefa($conexao, $tarefa);
}

$lista_tarefas = buscar_tarefas($conexao);
// $lista_tarefas = [];

// if (array_key_exists('lista_tarefas', $_SESSION)) {
//     $lista_tarefas = $_SESSION['lista_tarefas'];
// }
