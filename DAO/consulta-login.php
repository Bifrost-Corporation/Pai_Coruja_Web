<?php

    session_start();
    include('../classes/Conexao.php');
    $emailForm = $_POST['txtEmail'];
    $senhaForm = $_POST['txtSenha'];

    try{
        $conexao = Conexao::conectar();
        $verificalogin = false;
        $queryadm = "SELECT idAdministrador, loginAdministrador, senhaAdministrador FROM tbadministrador";
        $querysecretaria = "SELECT emailSecretaria, senhaSecretaria FROM tbsecretaria";
        $queryprofessor = "SELECT emailProfessor, senhaProfessor FROM tbprofessor";
        $queryresponsavel = "SELECT emailResponsavel, senhaResponsavel FROM tbresponsavel";
        $resultadoadm = $conexao->query($queryadm);
        $listaadm = $resultadoadm->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaadm as $linha){
            if($linha['loginAdministrador'] == $emailForm && $linha['senhaAdministrador'] == $senhaForm){
                $verificalogin = true;
                $_SESSION['idAdministrador'] = $linha['idAdministrador'];
                $_SESSION['emailAdm'] = $emailForm;
                $_SESSION['senhaAdm'] = $senhaForm;
                $_SESSION['autorizacaoAdm'] = true;
                header('location: ../adm/home-adm.php');
            }
        }
        $resultadosecretaria = $conexao->query($querysecretaria);
        $listasecretaria = $resultadosecretaria->fetchAll(PDO::FETCH_ASSOC);
        foreach($listasecretaria as $linha){
            if($linha['emailSecretaria'] == $emailForm && $linha['senhaSecretaria'] == $senhaForm){
                $verificalogin = true;
                $_SESSION['emailSecretaria'] = $emailForm;
                $_SESSION['senhaSecretaria'] = $senhaForm;
                $_SESSION['autorizacaoSecretaria'] = true;
                header('location: ../secretaria/home-secretaria.php');
            }
        }
        $resultadoprofessor = $conexao->query($queryprofessor);
        $listaprofessor = $resultadoprofessor->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaprofessor as $linha){
            if($linha['emailProfessor'] == $emailForm && $linha['senhaProfessor'] == $senhaForm){
                $verificalogin = true;
                header('location: ../professor/home-professor.html');
            }
        }
        $resultadoresponsavel = $conexao->query($queryresponsavel);
        $listaresponsavel = $resultadoresponsavel->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaresponsavel as $linha){
            if($linha['emailResponsavel'] == $emailForm && $linha['senhaResponsavel'] == $senhaForm){
                $verificalogin = true;
            }
        }
        if($verificalogin == false){
            unset($_SESSION['emailUsuario']);
            unset($_SESSION['senhaUsuario']);
            session_destroy();
            header('location: ../index.php');
        }
        
    }catch(Exception $e){
        echo('Erro: '.$e->getMessage());
    }

?>