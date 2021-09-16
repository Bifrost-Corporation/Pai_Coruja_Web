<?php

    include_once("../DAO/consulta-email.php");
    include_once("../classes/Usuario.php");
    include_once("../classes/Professor.php");
    include_once("../classes/Responsavel.php");
    include_once("../classes/Secretaria.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

    //$nome = $_POST['nomeEmail'];
    $email = $_SESSION['emailCerto'];
    //$assunto = $_POST['assuntoEmail'];
    //$mensagem = $_POST['mensagemEmail'];

    $professor = new Professor();
    $responsavel = new Responsavel();
    $secretaria = new Secretaria();
    $listaProfessor = $professor->listar();
    $listaResponsavel = $responsavel->listar();
    $listaSecretaria = $secretaria->listar();
    $usuario = new Usuario();
    $listaUsuario = $usuario->listar();
    foreach($listaProfessor as $linha){
        if($email == $linha['emailProfessor']){
            foreach($listaUsuario as $linha2){
                if($linha['idProfessor'] == $linha2['idProfessor']){
                    $idUsuario = $linha2['idUsuario'];
                }
            }
        }
    }
    foreach($listaResponsavel as $linha){
        if($email == $linha['emailResponsavel']){
            foreach($listaUsuario as $linha2){
                if($linha['idResponsavel'] == $linha2['idResponsavel']){
                    $idUsuario = $linha2['idUsuario'];
                }
            }
        }
    }
    foreach($listaSecretaria as $linha){
        if($email == $linha['emailSecretaria']){
            foreach($listaUsuario as $linha2){
                if($linha['idSecretaria'] == $linha2['idSecretaria']){
                    $idUsuario = $linha2['idUsuario'];
                }
            }
        }
    }
    

    $codPagina = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->CharSet = 'UTF-8';
    $mail->SMTPAuth = true;

    $mail->Username = 'bifrost.suporte@gmail.com';
    $mail->Password = 'dcdadogdkpmprdvd';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('bifrost.suporte@gmail.com', 'Suporte | Pai Coruja');
    
    $mail->addAddress("$email");

    $mail->Subject = 'Resetar senha de acesso ao Pai Coruja';
    $mail->Body = 'Olá, fomos informados de que você perdeu o acesso à sua conta do Pai Coruja, utilize esse código para recuperar a sua senha Código de recuperação: ' . $codPagina;
    $_SESSION['permissao'] = true;
    $_SESSION['idUsuario'] = $idUsuario;
    $_SESSION['codRecuperacao'] = $codPagina;
    header("Location: ../DAO/inserir-codigo-senha.php");

    if(!$mail->Send()){
        echo "Erro ao enviar email: ".$mail->ErrorInfo;
    }else{
        $url = '../contato.php';
        echo("<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>");
        exit();
    }

?>