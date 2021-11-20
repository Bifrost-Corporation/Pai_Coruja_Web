<?php
    include("../classes/Conexao.php");
    include("../professor/sentinela.php");
    include("../classes/ImagemProfessor.php");

    try{
        if($_FILES['imagemPerfil']['name'] != ''){
            header("Location: ../professor/home-professor.php");
            $nomeImagem = $_FILES['imagemPerfil']['name'];
            $arquivo = $_FILES['imagemPerfil']['tmp_name'];
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