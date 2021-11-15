<?php

    require_once ('../classes/Conexao.php');
    require_once('../classes/Usuario.php');
    require_once('../classes/Secretaria.php');
    require_once('../classes/Responsavel.php');
    require_once('../classes/Professor.php');

    $conexao = Conexao::conectar();
    if(isset($_POST['query'])){
        $inputUser = $_POST['query'];
        $arrayInput = explode(" ", $inputUser);
        $idUserDestino = $arrayInput[0];
        $idUserResponsavel = $arrayInput[1];
        $tipoConta = $arrayInput[2];
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idUsuario'] == $idUserResponsavel){
                $idResponsavel = $linha['idResponsavel'];
            }
        }
        if($tipoConta == 'S'){
            foreach($listaUsuario as $linha){
                if($linha['idUsuario'] == $idUserDestino){
                    $idSecretaria = $linha['idSecretaria'];
                }
            }
            $query = "SELECT tbmensagem.idMensagem, tbsecretaria.nomeSecretaria AS 'EnvioSecretaria', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbsecretaria ON tbsecretaria.idSecretaria = tbusuario.idSecretaria WHERE tbdestinomensagem.idUsuario = '$idUserResponsavel' UNION SELECT tbmensagem.idMensagem, tbresponsavel.nomeResponsavel AS 'EnvioResponsavel', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbresponsavel ON tbusuario.idResponsavel = tbresponsavel.idResponsavel WHERE tbdestinomensagem.idUsuario = '$idUserDestino' ORDER BY idMensagem";
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
                        echo "<div class='message-row destinatario'>";
                            echo "<h4 class='name-user'>" . $linha['EnvioSecretaria'] . "</h4>";
                            echo "<p class='text-message'>". $linha['textoMensagem'] . "</p>";
                            echo "<small class='date-message'>".$linha['dataMensagem'] ."</small>";
                        echo "</div>";
                    }else if($linha['EnvioSecretaria'] == $nomeResponsavel){
                        echo "<div class='message-row remetente'>";
                            echo "<h4 class='name-user'>" . $linha['EnvioSecretaria'] . "</h4>";
                            echo "<p class='text-message'>". $linha['textoMensagem'] . "</p>";
                            echo "<small class='date-message'>".$linha['dataMensagem'] ."</small>";
                        echo "</div>";
                    }
                }
            }
        }else if($tipoConta == 'P'){
            foreach($listaUsuario as $linha){
                if($linha['idUsuario'] == $idUserDestino){
                    $idProfessor = $linha['idProfessor'];
                }
            }
            $query = "SELECT tbmensagem.idMensagem, tbprofessor.nomeProfessor AS 'EnvioSecretaria', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbprofessor ON tbprofessor.idProfessor = tbusuario.idProfessor WHERE tbdestinomensagem.idUsuario = '$idUserResponsavel' UNION SELECT tbmensagem.idMensagem, tbresponsavel.nomeResponsavel AS 'EnvioResponsavel', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbresponsavel ON tbusuario.idResponsavel = tbresponsavel.idResponsavel WHERE tbdestinomensagem.idUsuario = '$idUserDestino' ORDER BY idMensagem";
            $resultadoConsulta = $conexao->query($query);
            $listaMensagens = $resultadoConsulta->fetchAll(PDO::FETCH_ASSOC);
            $queryNomeResponsavel = "SELECT nomeResponsavel FROM tbresponsavel WHERE idResponsavel = '$idResponsavel'";
            $resultadoNomeResponsavel = $conexao->query($queryNomeResponsavel);
            $listaNomeResponsavel = $resultadoNomeResponsavel->fetchAll(PDO::FETCH_ASSOC);
            foreach($listaNomeResponsavel as $linha){
                $nomeResponsavel = $linha['nomeResponsavel'];
            }
            $queryNomeProfessor = "SELECT nomeProfessor FROM tbprofessor WHERE idProfessor = '$idProfessor'";
            $resultadoNomeProfessor = $conexao->query($queryNomeProfessor);
            $listaNomeProfessor = $resultadoNomeProfessor->fetchAll(PDO::FETCH_ASSOC);
            foreach($listaNomeProfessor as $linha){
                $nomeProfessor = $linha['nomeProfessor'];
            }
            if($resultadoConsulta->rowCount() > 0){
                foreach($listaMensagens as $linha){
                    if($linha['EnvioSecretaria'] == $nomeProfessor){
                        echo "<div class='message-row destinatario'>";
                            echo "<h4 class='name-user'>" . $linha['EnvioSecretaria'] . "</h4>";
                            echo "<p class='text-message'>". $linha['textoMensagem'] . "</p>";
                            echo "<small class='date-message'>".$linha['dataMensagem'] ."</small>";
                        echo "</div>";
                    }else if($linha['EnvioSecretaria'] == $nomeResponsavel){
                        echo "<div class='message-row remetente'>";
                            echo "<h4 class='name-user'>" . $linha['EnvioSecretaria'] . "</h4>";
                            echo "<p class='text-message'>". $linha['textoMensagem'] . "</p>";
                            echo "<small class='date-message'>".$linha['dataMensagem'] ."</small>";
                        echo "</div>";
                    }
                }
                    
            }
    }
        
    }

?>