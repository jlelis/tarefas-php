<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tarefa: <?php echo $tarefa['nome']; ?></h1>
    <p><strong>Concluida: </strong>
        <?php echo traduz_concluida($tarefa['concluida']); ?>
    </p>
    <p><strong>Descrição:</strong>
        <?php echo nl2br($tarefa['descricao']); ?>
    </p>
    <p><strong>Prazo:</strong>
        <?php echo traduz_data_para_exibir($tarefa['prazo']); ?>
    </p>
    <p><strong>Prioridade:</strong>
        <?php echo traduz_prioridade($tarefa['prioridade']); ?>
    </p>
    <?php if (count($anexos) > 0) : ?>
        <p><strong>Atenção!</strong>Esta tarefa contem Anexos!</p>
    <?php endif; ?>
    <p>Tenha um bom dia!</p>


</body>

</html>