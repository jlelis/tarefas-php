<?php
session_start();
require "banco.php";
require "ajudantes.php";

$exibir_tabela = true;
$tarefa = [
    'id' => 0,
    'nome' => '',
    'descricao' => '',
    'prazo' => '',
    'prioridade' => 1,
    'concluida' => ''
];
$tem_erros = false;
$erros_validacao = [];

// if (array_key_exists('nome', $_GET) && $_GET['nome'] != '') {
if (tem_post()) {


    $tarefa = [];
    // $tarefa['nome'] = $_GET['nome'];
    if (array_key_exists($tarefa['nome'], $_GET) && strlen($_GET['nome'] > 0)) {
        $tarefa['nome'] = $_GET['nome'];
    } else {
        $tem_erros = true;
        $erros_validacao['nome'] = 'O nome da tarefa é obrigatorio!';
    }

    if (array_key_exists('descricao', $_GET)) {
        $tarefa['descricao'] = $_GET['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }
    if (array_key_exists('prazo', $_GET) && strlen($_GET['prazo'] > 0)) {
        // $tarefa['prazo'] = $_GET['prazo'];
        if (validar_data($_GET['prazo'])) {
            $tarefa['prazo'] = traduz_data_para_banco($_GET['prazo']);
        } else {
            $tem_erros = true;
            $erros_validacao['prazo'] = 'o prazo não é uma data valida!';
        }
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
    if (!$tem_erros) {
        gravar_tarefa($conexao, $tarefa);
        if (array_key_exists('lembrete', $_GET) && $_GET['lembrete'] == '1') {
            enviar_email($tarefa);
        }
        header('Location: tarefas.php');
        die();
    }
    $tarefa = [
        'id' => 0,
        'nome' => (array_key_exists('nome', $_GET)) ? $_GET['nome'] : '',
        'descricao' => (array_key_exists('descricao', $_GET)) ? $_GET['descricao'] : '',
        'prazo' => (array_key_exists('prazo', $_GET)) ? traduz_data_para_banco($_GET['prazo']) : '',
        'prioridade' => (array_key_exists('prioridade', $_GET)) ? $_GET['prioridade'] : '',
        'concluida' => (array_key_exists('concluida', $_GET)) ? $_GET['concluida'] : ''
    ];
}

$lista_tarefas = buscar_tarefas($conexao);
$tarefa = buscar_tarefa($conexao, $_GET['id']);
$anexo = buscar_anexos($conexao, $_GET['id']);
// $lista_tarefas = [];

// if (array_key_exists('lista_tarefas', $_SESSION)) {
//     $lista_tarefas = $_SESSION['lista_tarefas'];
// }
