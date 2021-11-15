<?php

    require_once ('../classes/Conexao.php');
    require_once('../classes/Usuario.php');
    require_once('../classes/Secretaria.php');
    require_once('../classes/Responsavel.php');

    $conexao = Conexao::conectar();
    if(isset($_POST['query'])){
        $inputUser = $_POST['query'];
        $arrayInput = explode(" ", $inputUser);
        $idEnviar = $arrayInput[0];
        $idReceber = $arrayInput[1];
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idUsuario'] == $idEnviar){
                if(!is_null($linha['idSecretaria'])){
                    $idSecretaria = $linha['idSecretaria'];
                    foreach($listaUsuario as $linha2){
                        if($idReceber == $linha2['idUsuario']){
                            $idResponsavel = $linha2['idResponsavel'];
                        }
                    }
                    $query = "SELECT tbmensagem.idMensagem, tbsecretaria.nomeSecretaria AS 'EnvioSecretaria', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbsecretaria ON tbsecretaria.idSecretaria = tbusuario.idSecretaria WHERE tbdestinomensagem.idUsuario = '$idReceber' UNION SELECT tbmensagem.idMensagem, tbresponsavel.nomeResponsavel AS 'EnvioResponsavel', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbresponsavel ON tbusuario.idResponsavel = tbresponsavel.idResponsavel WHERE tbdestinomensagem.idUsuario = '$idEnviar' ORDER BY idMensagem";
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
                                echo "<div class='message-row remetente'>";
                                    echo "<h4 class='name-user'>" . $linha['EnvioSecretaria'] . "</h4>";
                                    echo "<p class='text-message'>". $linha['textoMensagem'] . "</p>";
                                    echo "<small class='date-message'>".$linha['dataMensagem'] ."</small>";
                                echo "</div>";
                            }else if($linha['EnvioSecretaria'] == $nomeResponsavel){
                                echo "<div class='message-row destinatario'>";
                                    echo "<h4 class='name-user'>" . $linha['EnvioSecretaria'] . "</h4>";
                                    echo "<p class='text-message'>". $linha['textoMensagem'] . "</p>";
                                    echo "<small class='date-message'>".$linha['dataMensagem'] ."</small>";
                                echo "</div>";
                            }
                        }
                    }
                }
                if(isset($linha['idResponsavel'])){
                    $idResponsavel = $linha['idResponsavel'];
                    foreach($listaUsuario as $linha2){
                        if($idReceber == $linha2['idSecretaria']){
                            $idSecretaria = $linha2['idSecretaria'];
                        }
                    }
                    $query = "SELECT tbmensagem.idMensagem, tbsecretaria.nomeSecretaria AS 'EnvioSecretaria', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbsecretaria ON tbsecretaria.idSecretaria = tbusuario.idSecretaria WHERE tbdestinomensagem.idUsuario = '$idEnviar' UNION SELECT tbmensagem.idMensagem, tbresponsavel.nomeResponsavel AS 'EnvioResponsavel', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbresponsavel ON tbusuario.idResponsavel = tbresponsavel.idResponsavel WHERE tbdestinomensagem.idUsuario = '$idReceber' ORDER BY idMensagem";
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
                }
                if(isset($linha['idProfessor'])){
                    $idProfessor = $linha['idProfessor'];
                    foreach($listaUsuario as $linha2){
                        if($idReceber == $linha2['idResponsavel']){
                            $idResponsavel = $linha2['idResponsavel'];
                        }
                    }
                    $query = "SELECT tbmensagem.idMensagem, tbsecretaria.nomeSecretaria AS 'EnvioSecretaria', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbsecretaria ON tbsecretaria.idSecretaria = tbusuario.idSecretaria WHERE tbdestinomensagem.idUsuario = '$idReceber' UNION SELECT tbmensagem.idMensagem, tbresponsavel.nomeResponsavel AS 'EnvioResponsavel', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbresponsavel ON tbusuario.idResponsavel = tbresponsavel.idResponsavel WHERE tbdestinomensagem.idUsuario = '$idEnviar' ORDER BY idMensagem";
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
                            if($linha['EnvioSecretaria'] == $nomeResponsavel){
                                echo "<div class='message-row destinatario'>";
                                    echo "<h4 class='name-user'>" . $linha['EnvioSecretaria'] . "</h4>";
                                    echo "<p class='text-message'>". $linha['textoMensagem'] . "</p>";
                                    echo "<small class='date-message'>".$linha['dataMensagem'] ."</small>";
                                echo "</div>";
                            }else if($linha['EnvioSecretaria'] == $nomeProfessor){
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
        }
        /*
        $query = "SELECT tbmensagem.idMensagem, tbsecretaria.nomeSecretaria AS 'Usuario', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbsecretaria ON tbsecretaria.idSecretaria = tbusuario.idSecretaria WHERE tbdestinomensagem.idUsuario = '$idEnviar' UNION SELECT tbmensagem.idMensagem, tbresponsavel.nomeResponsavel AS 'EnvioResponsavel', textoMensagem, dataMensagem FROM tbmensagem INNER JOIN tbdestinomensagem ON tbdestinomensagem.idDestinoMensagem = tbmensagem.idDestinoMensagem INNER JOIN tborigemmensagem ON tborigemmensagem.idOrigemMensagem = tbmensagem.idOrigemMensagem INNER JOIN tbusuario ON tbusuario.idUsuario = tborigemmensagem.idUsuario INNER JOIN tbresponsavel ON tbusuario.idResponsavel = tbresponsavel.idResponsavel WHERE tbdestinomensagem.idUsuario = '$idReceber' ORDER BY idMensagem";
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
                    echo "<div class='message-row remetente'>";
                        echo "<h4 class='name-user'>" . $linha['EnvioSecretaria'] . "</h4>";
                        echo "<p class='text-message'>". $linha['textoMensagem'] . "</p>";
                        echo "<small class='date-message'>".$linha['dataMensagem'] ."</small>";
                    echo "</div>";
                }else if($linha['EnvioSecretaria'] == $nomeResponsavel){
                    echo "<div class='message-row destinatario'>";
                        echo "<h4 class='name-user'>" . $linha['EnvioSecretaria'] . "</h4>";
                        echo "<p class='text-message'>". $linha['textoMensagem'] . "</p>";
                        echo "<small class='date-message'>".$linha['dataMensagem'] ."</small>";
                    echo "</div>";
                }
            }
        }
        */
    }

?>