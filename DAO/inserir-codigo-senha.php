<?php

    include("../forgetPassword.php");
    include("../classes/Conexao.php");
    include("../classes/Responsavel.php");
    include("../classes/Professor.php");
    include("../classes/Secretaria.php");
    include("../classes/Usuario.php");

    try{
        header("Location: ../codigoRecuperarSenha.php");
        $conexao = Conexao::conectar();
        $idUsuario = $_SESSION['idUsuario'];
        $codRecuperacao = $_SESSION['codRecuperacao'];
        $usuario = new Usuario();
        $responsavel = new Responsavel();
        $professor = new Professor();
        $secretaria = new Secretaria();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idUsuario'] == $idUsuario){
                if(isset($linha['idProfessor'])){
                    $professor->setCodNovaSenha($codRecuperacao);
                    $professor->setIdProfessor($linha['idProfessor']);
                    $professor->updateCodSenha($professor);
                }
                if(isset($linha['idResponsavel'])){
                    $responsavel->setCodNovaSenha($codRecuperacao);
                    $responsavel->setIdResponsavel($linha['idResponsavel']);
                    $responsavel->updateCodSenha($responsavel);
                }
                if(isset($linha['idSecretaria'])){
                    $secretaria->setCodNovaSenha($codRecuperacao);
                    $secretaria->setIdSecretaria($linha['idSecretaria']);
                    $secretaria->updateCodSenha($secretaria);
                }
            }
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>