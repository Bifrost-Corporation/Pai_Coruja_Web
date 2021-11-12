<?php

    include("../professor/sentinela.php");
    include("../classes/ImagemProfessor.php");

    try{
        if($_FILES['arquivo']['name'] != ''){
            header("Location: ../professor/cadastrar-imagem-perfil.php");
            $nomeImagem = $_FILES['arquivo']['name'];
            $arquivo = $_FILES['arquivo']['tmp_name'];
            $caminhoImagem = "../img/imgProfessor/";
            move_uploaded_file($arquivo, $caminhoImagem . $nomeImagem);
            $caminhoImagem = "img/imgProfessor/";
            $imagemProfessor = new ImagemProfessor();
            $imagemProfessor->setNomeImagemProfessor($nomeImagem);
            $imagemProfessor->setCaminhoImagemProfessor($caminhoImagem);
            $imagemProfessor->setIdProfessor($_SESSION['idProfessor']);
            echo $imagemProfessor->cadastrar($imagemProfessor);
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>