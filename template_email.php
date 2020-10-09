<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




function enviar_email($tarefa, $anexos = [])
{
    $corpo = preparar_corpo_email($tarefa, $anexos);
    $email = new PHPMailer(true); // Esta é a criação do objeto
    $email->isSMTP();

    $email->Host = "smtp.mailtrap.io";
    $email->Port = 2525;
    $email->SMTPSecure = 'tls';
    $email->SMTPAuth = true;
    $email->Username = "150d2e66944087";
    $email->Password = "a8424c836e6e7a";

    // Digitar o e-mail do destinatário;
    $email->addAddress(EMAIL_NOTIFICACAO);
    $email->Subject = "Aviso de tarefa: {$tarefa['nome']}";
    $corpo = preparar_corpo_email($tarefa, $anexos);
    $email->msgHTML($corpo);
    foreach ($anexos as $anexo) {
        $email->addAttachment("anexos/{$anexo['arquivo']}");
    }
    $email->setFrom("03f7b555a1-5eb9cc@inbox.mailtrap.io", "Avisador de Tarefas");
    // Usar a opção de enviar o e-mail.
    if (!$email->send()) {
        gravar_log($email->ErrorInfo);
    }
}
function preparar_corpo_email($tarefa, $anexos)
{
    return false;
}

?>
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