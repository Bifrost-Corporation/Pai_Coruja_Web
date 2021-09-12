<?php

    include("../secretaria/sentinela.php");
    include("../classes/Aluno.php");
    include("../classes/Turma.php");

    try{
        header("Location: ../secretaria/cadastrar-aluno.php");
        $nomeAluno = $_POST['txtNomeAluno'];
        $dataNasc = $_POST['dataNasc'];
        $turmaAluno = $_POST['txtTurma'];
        $idEscola = $_SESSION['idEscola'];
        $turma = new Turma();
        $listaturma = $turma->listar();
        $turmaInvalida = true;
        foreach($listaturma as $linha){
            if($turmaAluno == $linha['nomeTurma'] && $idEscola == $linha['idEscola']){
                $turmaInvalida = false;
                $aluno = new Aluno();
                $aluno->setNomeAluno($nomeAluno);
                $aluno->setDataNascAluno($dataNasc);
                $aluno->setIdTurma($linha['idTurma']);
                $aluno->setIdEscola($idEscola);
                echo $aluno->cadastrar($aluno);
            }
        }
        if($turmaInvalida == true){
            $_SESSION['turmaInvalida'] = $turmaAluno;
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }

?>