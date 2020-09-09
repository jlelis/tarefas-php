<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = '';
$dbBanco = 'tarefas';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $dbBanco);

if (mysqli_connect_errno($conexao)) {
    echo "Não foi possivel conectar no banco. Erro: ";
    echo mysqli_connect_error();
    die();
}
function buscar_tarefas($conexao)
{
    $sqlBusca = 'SELECT * FROM tarefas';
    $resuldato = mysqli_query($conexao, $sqlBusca);
    $tarefas = [];

    while ($tarefa = mysqli_fetch_assoc($resuldato)) {
        $tarefas[] = $tarefa;
    }
    return $tarefas;
}
function gravar_tarefa($conexao, $tarefa)
{
    $sqlGravar = "INSERT INTO tarefas
    (nome,descricao,prioridade)
    VALUES
    (
        '{$tarefa['nome']}',
        '{$tarefa['descricao']}',
        '{$tarefa['prioridade']}'
    )";
    mysqli_query($conexao, $sqlGravar);
}
