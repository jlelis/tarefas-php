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
    $resultado = mysqli_query($conexao, $sqlBusca);
    $tarefas = [];

    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas[] = $tarefa;
    }
    return $tarefas;
}
function gravar_tarefa($conexao, $tarefa)
{
    // var_dump($tarefa);
    $sqlGravar = "INSERT INTO tarefas
    (nome, descricao, prioridade, prazo, concluida)
    VALUES
    (
        '{$tarefa['nome']}',
        '{$tarefa['descricao']}',
        {$tarefa['prioridade']},
        '{$tarefa['prazo']}',
        {$tarefa['concluida']}
    )";
    mysqli_query($conexao, $sqlGravar);
}
function buscar_tarefa($conexao, $id)
{
    $sqlBusca = 'SELECT * FROM tarefas where id = ' . $id;
    $resultado = mysqli_query($conexao, $sqlBusca);
    // var_dump(mysqli_fetch_assoc($resultado));
    return mysqli_fetch_assoc($resultado);
}
function editar_tarefa($conexao, $tarefa)
{
    $sqlEditar = "UPDATE tarefas SET
    nome = '{$tarefa['nome']}',
    descricao = '{$tarefa['descricao']}',
    prioridade = {$tarefa['prioridade']},
    prazo = '{$tarefa['prazo']}',
    concluida = {$tarefa['concluida']}
    WHERE id = {$tarefa['id']}
";
    var_dump($sqlEditar);
    // mysqli_query($conexao, $sqlEditar);
}

function remover_tarefa($conexao, $id)
{
    $sqlRemover = "DELETE FROM tarefas WHERE id={$id}";
    //var_dump($sqlRemover);
    mysqli_query($conexao, $sqlRemover);
}
function gravar_anexo($conexao, $anexo)
{
    $sqlGravar = "INSERT INTO anexos (tarefa_id,nome,arquivo)
    values(
        {$anexo['tarefa_id']},
        {$anexo['nome']},
        {$anexo['arquivo']}
    )
    ";
    mysqli_query($conexao, $sqlGravar);
}
