<?php 
include "ajudantes.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/tarefas.css" type="text/css" />
</head>
<body>
    <div class="bloco_principal">
    <h1>Tarefa: <?php echo $tarefa['nome']?></h1>
    <p>
        <a href="tarefas.php">Voltar pra lista de Tarefas</a>
    </p>
    <p><strong>Concluida:</strong><?php echo traduz_cconcluida($tarefa['concluida']);?></p>
    <p><strong>Descrição:</strong><?php  echo $tarefa['descricao'];?></p>
    <p><strong>Prazo:</strong><?php  echo traduz_data_pare_exibir($tarefa['prazo']);?></p>
    <p><strong>Prioridade: </strong><?php echo traduz_prioridade($tarefa['prioridade']);?></p>
    <h2>Anexos</h2>
    </div>
</body>
</html>