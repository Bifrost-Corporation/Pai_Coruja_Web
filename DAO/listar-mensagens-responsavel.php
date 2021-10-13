<?php

    require_once ('../classes/Conexao.php');
    require_once('../classes/Usuario.php');
    require_once('../classes/Secretaria.php');
    require_once('../classes/Responsavel.php');

    $conexao = Conexao::conectar();
    if(isset($_POST['query'])){
        $inputUser = $_POST['query'];
        $arrayInput = explode(" ", $inputUser);
        $idSecretaria = $arrayInput[0];
        $idResponsavel = $arrayInput[1];
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idResponsavel'] == $idResponsavel){
                $idUserResponsavel = $linha['idUsuario'];
            }
        }
        foreach($listaUsuario as $linha){
            if($linha['idSecretaria'] == $idSecretaria){
                $idUserSecretaria = $linha['idUsuario'];
            }
        }
        $query = "SELECT tbmensagem.idMensagem, tbsecretaria.nomeSecretaria AS 'EnvioSecretaria', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbsecretaria ON tbsecretaria.idSecretaria = tbusuario.idSecretaria WHERE tbdestinomensagem.idUsuario = '$idUserResponsavel' UNION SELECT tbmensagem.idMensagem, tbresponsavel.nomeResponsavel AS 'EnvioResponsavel', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbresponsavel ON tbusuario.idResponsavel = tbresponsavel.idResponsavel WHERE tbdestinomensagem.idUsuario = '$idUserSecretaria' ORDER BY idMensagem";
        $resultadoConsulta = $conexao->query($query);
        $listaMensagens = $resultadoConsulta->fetchAll(PDO::FETCH_ASSOC);
        $queryNomeResponsavel = "SELECT nomeResponsavel FROM tbresponsavel WHERE idResponsavel = '$idResponsavel'";
        $resultadoNomeResponsavel = $conexao->query($queryNomeResponsavel);
        $listaNomeResponsavel = $resultadoNomeResponsavel->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaNomeResponsavel as $linha){
            $nomeResponsavel = $linha['nomeResponsavel'];
        }
        $queryNomeSecretaria = "SELECT nomeSecretaria FROM tbsecretaria WHERE idSecretaria = '$idSecretaria'";
        $resultadoNomeSecretaria = $conexao->query($queryNomeSecretaria);
        $listaNomeSecretaria = $resultadoNomeSecretaria->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaNomeSecretaria as $linha){
            $nomeSecretaria = $linha['nomeSecretaria'];
        }
        if($resultadoConsulta->rowCount() > 0){
            foreach($listaMensagens as $linha){
                if($linha['EnvioSecretaria'] == $nomeSecretaria){
                    echo "<div class='mensagem'>";
                        echo "<h4 class='recebido'>". $linha['EnvioSecretaria'] . "</h4>";
                        echo "<p class='recebido'>". $linha['textoMensagem'] . " - <small>" . $linha['dataMensagem'] . "</small></p>";
                    echo "</div>";
                }else if($linha['EnvioSecretaria'] == $nomeResponsavel){
                    echo "<div class='mensagem'>";
                        echo "<h4 class='enviado'>". $linha['EnvioSecretaria'] . "</h4>";
                        echo "<p class='enviado'>". $linha['textoMensagem'] . " - <small>" . $linha['dataMensagem'] . "</small></p>";
                    echo "</div>";
                }
            }
        }
    }

?>