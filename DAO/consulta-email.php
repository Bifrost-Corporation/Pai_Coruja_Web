<?php


    //include_once("../forgetPassword.php");
    include_once("../classes/Conexao.php");
    include_once("../classes/Professor.php");
    include_once("../classes/Secretaria.php");
    include_once("../classes/Responsavel.php");

    try{
        $verificaEmail = false;
        $email = $_POST['txtEmail'];
        $professor = new Professor();
        $listaProfessor = $professor->listar();
        $responsavel = new Responsavel();
        $listaResponsavel = $responsavel->listarAlternativo();
        $secretaria = new Secretaria();
        $listaSecretaria = $secretaria->listar();
        foreach($listaProfessor as $linha){
            if($linha['emailProfessor'] == $email){
                $verificaEmail = true;
            }
        }
        foreach($listaResponsavel as $linha){
            if($linha['emailResponsavel'] == $email){
                $verificaEmail = true;
            }
        }
        foreach($listaSecretaria as $linha){
            if($linha['emailSecretaria'] == $email){
                $verificaEmail = true;
            }
        }
        if($verificaEmail){
            $_SESSION['emailCerto'] = $email;
            header("Location: ../PHPMailer/enviar-email.php");
            
        } else {
            $_SESSION['email'] = $email;
            echo 'errado';
            header("Location: ../forgetPassword.php");
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>