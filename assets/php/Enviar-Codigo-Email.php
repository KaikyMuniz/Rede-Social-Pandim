<?php
    session_start();
    if (isset($_SESSION['email_cadastro'])) {
        $email = $_SESSION['email_cadastro'];
    } else {
        header("Location: ../php/Protecao-Cadastro.php");
        exit;
    }

    require_once('../php-mailer/PHPMailer.php');
    require_once('../php-mailer/SMTP.php');
    require_once('../php-mailer/Exception.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function gerarCodigo($tamanho = 6) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codigo = '';
        for ($i = 0; $i < $tamanho; $i++) {
            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $codigo;
    }

    $codigo_gerado = gerarCodigo();
    $_SESSION['code_cadastro'] = $codigo_gerado;

    $mail = new PHPMailer(true);

    try {
        // Diminui a segurança, mas necessário nesse pequeno projeto
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'suportepandim@gmail.com';
        $mail->Password = 'gimb tztr aoei vauz';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'utf8';

        $mail->setFrom('suportepandim@gmail.com', 'Suporte Pandim');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "Código de Confirmação";
        $mail->Body = "
        <html>
            <head>
                <meta charset='utf-8'>
            </head>
            <body>
                <h1>Código de Acesso: <h2 style='letter-spacing: 10px;'>$codigo_gerado</h2></h1>
            </body>
        </html>";
        $mail->AltBody = "Chegou um email";

        $mail->send();
    } catch (Exception $e) {
        echo "Erro ao enviar mensagem {$mail->ErrorInfo}";
    }
?>