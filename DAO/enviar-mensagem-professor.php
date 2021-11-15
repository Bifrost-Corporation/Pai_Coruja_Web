<?php

    include("../classes/DestinoMensagem.php");
    include("../classes/OrigemMensagem.php");
    include("../classes/Mensagem.php");
    include("../classes/Usuario.php");

    try{
        header("Location: ../professor/chat-professor.php");
        $textoMensagem = $_POST['txtMensagem'];
        $idProfessorOrigem = $_POST['idEnviar'];
        $idResponsavelDestino = $_POST['idReceber'];
        $dataMensagem = date("Y-m-d H:i:s");
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idProfessor'] == $idProfessorOrigem){
                $idOrigem = $linha['idUsuario'];
            }
        }
        $origem = new OrigemMensagem();
        $origem->setIdUsuario($idOrigem);
        echo $origem->cadastrar($origem);
        foreach($listaUsuario as $linha){
            if($linha['idResponsavel'] == $idResponsavelDestino){
                $idDestino = $linha['idUsuario'];
            }
        }
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