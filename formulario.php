<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/tarefas.css" type="text/css" />
    <title>Formulario</title>
</head>

<body>
    <form>
        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>" />
        <fieldset>
            <legend>Nova Tarefa</legend>
            <label>Tarefa:
                <?php if ($tem_erros && array_key_exists('nome', $erros_validacao)) : ?>
                    <span class="erro"><?php echo $erros_validacao['nome']; ?></span>
                <?php endif; ?>
                <input type="text" name="nome" value="<?php echo $tarefa['nome']; ?>" />
            </label>
            <label> Descricao (Opcional):
                <textarea name="descricao"><?php echo $tarefa['descricao']; ?></textarea>
            </label>
            <label>Prazo (Opcional):
                <?php if ($tem_erros && array_key_exists('prazo', $erros_validacao)) : ?>
                    <span class="erro">
                        <?php echo $erros_validacao['prazo']; ?>
                    </span>
                <?php endif; ?>
                <input type="text" name="prazo" value="<?php echo traduz_data_para_exibir($tarefa['prazo']); ?>" />
            </label>
            <legend>Prioridade:</legend>
            <input type="radio" name="prioridade" value="1" <?php echo ($tarefa['prioridade'] == 1)
                                                                ? 'checked'
                                                                : '';
                                                            ?> /> Baixa
            <input type="radio" name="prioridade" value="2" <?php echo ($tarefa['prioridade'] == 2)
                                                                ? 'checked'
                                                                : '';
                                                            ?> /> Media
            <input type="radio" name="prioridade" value="3" <?php echo ($tarefa['prioridade'] == 3)
                                                                ? 'checked'
                                                                : '';
                                                            ?> /> Alta
        </fieldset>
        <label>
            Tarefa concluída:
            <input type="checkbox" name="concluida" value="1" <?php echo ($tarefa['concluida'] == 1)
                                                                    ? 'checked'
                                                                    : '';
                                                                ?> />
        </label>
        <label>
            Lembrete por e-mail:
            <input type="checkbox" name="lembrete" value="1">
        </label>

        </fieldset>
        <input type="submit" value="<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>" />
    </form>

</body>

</html>