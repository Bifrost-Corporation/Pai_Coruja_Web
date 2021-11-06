<?php

    include ('../secretaria/sentinela.php');
    include ('../classes/Turma.php');

    try{
        header("location: ../secretaria/cadastrar-turma.php");
        if(!empty($_FILES['arquivo']['tmp_name'])){
            $arquivo = new DOMDocument();
            $arquivo->load($_FILES['arquivo']['tmp_name']);
            $listaTurma = $arquivo->getElementsByTagName("Row");
            $turma = new Turma();
            $idEscola = $_SESSION['idEscola'];
            $i = 0;
            foreach($listaTurma as $linha){
                if($i > 1){
                    $nomeTurma = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                    $turma->setNomeTurma($nomeTurma);
                    $turma->setIdEscola($idEscola);
                    $turma->cadastrar($turma);
                }
                $i++;
            }
        }
    }catch(Exception $e) {
        echo $e->getMessage();
    }
    

?>