<?php

    include("../classes/DestinoMensagem.php");
    include("../classes/OrigemMensagem.php");
    include("../classes/Mensagem.php");
    include("../classes/Usuario.php");

    try{
        // header("Location: ../secretaria/chat-secretaria.php");
        $textoMensagem = $_POST['txtMensagem'];
        $idResponsavelDestino = $_POST['idReceber'];
        $idSecretariaEnvio = $_POST['idEnviar'];
        $dataMensagem = date("Y-m-d H:i:s");
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idResponsavel'] == $idResponsavelDestino){
                $idDestino = $linha['idUsuario'];
            }
        }
        $destino = new DestinoMensagem();
        $destino->setIdUsuario($idDestino);
        echo $destino->cadastrar($destino);
        foreach($listaUsuario as $linha){
            if($linha['idSecretaria'] == $idSecretariaEnvio){
                $idEnvio = $linha['idUsuario'];
            }
        }
        $origem = new OrigemMensagem();
        $origem->setIdUsuario($idEnvio);
        echo $origem->cadastrar($origem);
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