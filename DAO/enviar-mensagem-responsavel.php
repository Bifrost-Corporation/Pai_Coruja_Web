<?php

    include("../classes/DestinoMensagem.php");
    include("../classes/OrigemMensagem.php");
    include("../classes/Mensagem.php");
    include("../classes/Usuario.php");

    try{
        //header("Location: ../responsavel/chat-responsavel.php");
        $textoMensagem = $_POST['txtMensagem'];
        $idResponsavelOrigem = $_POST['idEnviar'];
        $idSecretariaDestino = $_POST['idReceber'];
        $dataMensagem = date("Y-m-d H:i:s");
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idResponsavel'] == $idResponsavelOrigem){
                $idEnvio = $linha['idUsuario'];
            }
        }
        $origem = new OrigemMensagem();
        $origem->setIdUsuario($idEnvio);
        echo $origem->cadastrar($origem);
        if($idSecretariaDestino == 1){
            foreach($listaUsuario as $linha){
                if($linha['idSecretaria'] == $idSecretariaDestino){
                    $idDestino = $linha['idUsuario'];
                }
            }
        }else{
            foreach($listaUsuario as $linha){
                if($linha['idUsuario'] == $idSecretariaDestino){
                    $idDestino = $linha['idUsuario'];
                }
            }
        }
        echo $idDestino;
        $destino = new DestinoMensagem();
        $destino->setIdUsuario($idDestino);
        echo $destino->cadastrar($destino);
        $listaDestino = $destino->pegarUltimoDestino();
        foreach($listaDestino as $linha){
            $idDestinoMensagem = $linha['idDestinoMensagem'];
        }
        $listaOrigem = $origem->pegarUltimaOrigem();
        foreach($listaOrigem as $linha){
            $idOrigemMensagem = $linha['idOrigemMensagem'];
        }
        $mensagem = new Mensagem();
        $mensagem->setTextoMensagem($textoMensagem);
        $mensagem->setDataMensagem($dataMensagem);
        $mensagem->setIdOrigemMensagem($idOrigemMensagem);
        $mensagem->setIdDestinoMensagem($idDestinoMensagem);
        echo $mensagem->cadastrar($mensagem);
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>