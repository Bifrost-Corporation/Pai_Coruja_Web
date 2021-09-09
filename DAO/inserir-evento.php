<?php

    include("../secretaria/sentinela.php");
    include("../classes/Evento.php");
    include("../classes/ImagemEvento.php");

    try{
        header("Location: ../secretaria/cadastrar-evento.php");
        $tituloEvento = $_POST['txtNomeEvento'];
        $descEvento = $_POST['txtDescricaoEvento'];
        $dataEvento = $_POST['txtData'];
        $idSecretaria = $_SESSION['idSecretaria'];
        $nomeImagem = $_FILES['arquivo']['name'];
        $arquivo = $_FILES['arquivo']['tmp_name'];
        $caminhoImagem = "../img/eventos/";
        move_uploaded_file($arquivo, $caminhoImagem . $nomeImagem);
        $caminhoImagem = "img/eventos/";
        $evento = new Evento();
        $imagemEvento = new ImagemEvento();
        $evento->setTituloEvento($tituloEvento);
        $evento->setDescEvento($descEvento);
        $evento->setDataEvento($dataEvento);
        $evento->setIdSecretaria($idSecretaria);
        echo $evento->cadastrar($evento);
        $listaEvento = $evento->pegarUltimoEvento();
        foreach($listaEvento as $linha){
            $idEvento = $linha['idEvento'];
        }
        $imagemEvento->setNomeImagemEvento($nomeImagem);
        $imagemEvento->setCaminhoImagemEvento($caminhoImagem);
        $imagemEvento->setIdEvento($idEvento);
        echo $imagemEvento->cadastrar($imagemEvento);
    }catch(Exception $e){
        echo $e->getMessage();
    }



?>