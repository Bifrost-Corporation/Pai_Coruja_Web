<?php

    //include_once("../codigoRecuperarSenha.php");
    include_once("../classes/Conexao.php");
    include_once("../classes/Professor.php");
    include_once("../classes/Secretaria.php");
    include_once("../classes/Responsavel.php");
    include_once("../classes/Usuario.php");

    try{
        $codRecuperacao = $_POST['txtCodigo'];
        $idUsuario = $_POST['idUsuario'];
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idUsuario'] == $idUsuario){
                if(isset($linha['idProfessor'])){
                    $professor = new Professor();
                    $listaProfessor = $professor->listar();
                    foreach($listaProfessor as $linha2){
                        if($linha['idProfessor'] == $linha2['idProfessor']){
                            if($linha2['codNovaSenha'] == $codRecuperacao){
                                $_SESSION['idUsuario'] = $linha['idUsuario'];
                                header("Location: ../novaSenha.php?idUsuario=$idUsuario");
                            }else{
                                $_SESSION['codInvalido'] = $codRecuperacao;
                                header("Location: ../codigoRecuperarSenha.php");
                            }
                        }
                    }
                }
                if(isset($linha['idResponsavel'])){
                    $responsavel = new Responsavel();
                    $listaResponsavel = $responsavel->listarAlternativo();
                    foreach($listaResponsavel as $linha2){
                        if($linha['idResponsavel'] == $linha2['idResponsavel']){
                            if($linha2['codNovaSenha'] == $codRecuperacao){
                                $_SESSION['idUsuario'] = $linha['idUsuario'];
                                header("Location: ../novaSenha.php?idUsuario=$idUsuario");
                            }else{
                                $_SESSION['codInvalido'] = $codRecuperacao;
                                header("Location: ../codigoRecuperarSenha.php");
                            }
                        }
                    }
                }
                if(isset($linha['idSecretaria'])){
                    $secretaria = new Secretaria();
                    $listaSecretaria = $secretaria->listar();
                    foreach($listaSecretaria as $linha2){
                        if($linha['idSecretaria'] == $linha2['idSecretaria']){
                            if($linha2['codNovaSenha'] == $codRecuperacao){
                                $_SESSION['idUsuario'] = $linha['idUsuario'];
                                header("Location: ../novaSenha.php?idUsuario=$idUsuario");
                            }else{
                                $_SESSION['codInvalido'] = $codRecuperacao;
                                header("Location: ../codigoRecuperarSenha.php");
                            }
                        }
                    }
                }
            }
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
?>