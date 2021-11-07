<?php

    include ('../secretaria/sentinela.php');
    include ('../classes/Turma.php');

    try{
        header("location: ../secretaria/cadastrar-dados.php");
        $idEscola = $_SESSION['idEscola'];
        $turma = new Turma();
        if(!empty($_FILES['arquivo']['tmp_name'])){
            $arquivo = new DOMDocument();
            $arquivo->load($_FILES['arquivo']['tmp_name']);
            $listaTurma = $arquivo->getElementsByTagName("Row");
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
        } else {
            $nomeTurma = $nomeTurma = $_POST['txtNomeTurma'];
            $turma->setNomeTurma($nomeTurma);
            $turma->setIdEscola($idEscola);
            $turma->cadastrar($turma);
        }
    }catch(Exception $e) {
        echo $e->getMessage();
    }
    

?>