<?php

    include_once("../classes/Conexao.php");
    include_once("../classes/Professor.php");
    include_once("../classes/Secretaria.php");
    include_once("../classes/Responsavel.php");
    include_once("../classes/Usuario.php");

    try{
        $idUsuario = $_POST['idUsuario'];
        $senha = $_POST['txtSenha1'];
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idUsuario'] == $idUsuario){
                if(isset($linha['idProfessor'])){
                    $professor = new Professor();
                    $listaProfessor = $professor->listar();
                    foreach($listaProfessor as $linha2){
                        if($linha['idProfessor'] == $linha2['idProfessor']){
                            $professor->setIdProfessor($linha2['idProfessor']);
                            $professor->setSenhaProfessor(md5($senha));
                            echo $professor->updateSenha($professor);
                            unset($_SESSION['permissao']);
                            unset($_SESSION['idUsuario']);
                            unset($_SESSION['codRecuperacao']);
                            session_destroy();
                            header("Location: ../index.php");
                        }
                    }
                }
                if(isset($linha['idResponsavel'])){
                    $responsavel = new Responsavel();
                    $listaResponsavel = $responsavel->listarAlternativo();
                    foreach($listaResponsavel as $linha2){
                        if($linha['idResponsavel'] == $linha2['idResponsavel']){
                            $responsavel->setIdResponsavel($linha['idResponsavel']);
                            $responsavel->setSenhaResponsavel(md5($senha));
                            echo $responsavel->updateSenha($responsavel);
                            unset($_SESSION['permissao']);
                            unset($_SESSION['idUsuario']);
                            unset($_SESSION['codRecuperacao']);
                            session_destroy();
                            header("Location: ../index.php");
                        }
                    }
                }
                if(isset($linha['idSecretaria'])){
                    $secretaria = new Secretaria();
                    $listaSecretaria = $secretaria->listar();
                    foreach($listaSecretaria as $linha2){
                        if($linha['idSecretaria'] == $linha2['idSecretaria']){
                            $secretaria->setIdSecretaria($linha2['idSecretaria']);
                            $secretaria->setSenhaSecretaria(md5($senha));
                            echo $secretaria->updateSenha($secretaria);
                            unset($_SESSION['permissao']);
                            unset($_SESSION['idUsuario']);
                            unset($_SESSION['codRecuperacao']);
                            session_destroy();
                            header("Location: ../index.php");
                        }
                    }
                }
            }
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>