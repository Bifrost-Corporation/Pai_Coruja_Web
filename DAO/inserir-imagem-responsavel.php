<?php

    include("../responsavel/sentinela.php");
    include("../classes/ImagemResponsavel.php");

    try{
        if($_FILES['arquivo']['name'] != ''){
            header("Location: ../responsavel/cadastrar-imagem-perfil.php");
            $nomeImagem = $_FILES['arquivo']['name'];
            $arquivo = $_FILES['arquivo']['tmp_name'];
            $caminhoImagem = "../img/imgResponsavel/";
            move_uploaded_file($arquivo, $caminhoImagem . $nomeImagem);
            $caminhoImagem = "img/imgResponsavel/";
            $imagemResponsavel = new ImagemResponsavel();
            $imagemResponsavel->setNomeImagemResponsael($nomeImagem);
            $imagemResponsavel->setCaminhoImagemResponsavel($caminhoImagem);
            $imagemResponsavel->setIdResponsavel($_SESSION['idResponsavel']);
            echo $imagemResponsavel->cadastrar($imagemResponsavel);
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>