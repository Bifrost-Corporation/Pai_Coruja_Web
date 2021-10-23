<?php


    //include_once("../forgetPassword.php");
    include_once("../classes/Conexao.php");
    include_once("../classes/Professor.php");
    include_once("../classes/Secretaria.php");
    include_once("../classes/Responsavel.php");
    

    try{

        //header("Location: ../forgetPassword.php");
        if(isset($_SESSION['emailCerto'])){
            unset($_SESSION['emailCerto']);
        }
        $email = $_POST['txtEmail'];
        $verificaEmail;
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
        //echo $verificaEmail;
        if($verificaEmail == true){
            $_SESSION['emailCerto'] = $email;
            header("Location: ../PHPMailer/enviar-email.php?email=$email");
            
        } else {
            $_SESSION['email'] = $email;
            echo 'errado';
            header("Location: ../forgetPassword.php");
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>