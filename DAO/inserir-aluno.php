<?php

    include("../secretaria/sentinela.php");
    include("../classes/Aluno.php");
    include("../classes/Turma.php");

    try{
        header("Location: ../secretaria/visualizar-dados.php");
        unset($_SESSION['turmaInvalida']);
        $idAluno = $_POST['idAluno'];
        $nomeAluno = $_POST['txtNomeAluno'];
        $dataNasc = $_POST['dataNasc'];
        $turmaAluno = $_POST['txtTurma'];
        $idEscola = $_POST['idEscola'];
        if($idAluno > 0){
            $turma = new Turma();
            $listaturma = $turma->listar($idEscola);
            $turmaInvalida = true;
            foreach($listaturma as $linha){
                if($turmaAluno == $linha['nomeTurma'] && $idEscola == $linha['idEscola']){
                    $turmaInvalida = false;
                    $aluno = new Aluno();
                    $listaAluno = $aluno->listar($idEscola);
                    foreach($listaAluno as $linha2){
                        if($linha2['idAluno'] == $idAluno){
                            $aluno->setIdAluno($idAluno);
                            $aluno->setNomeAluno($nomeAluno);
                            $aluno->setDataNascAluno($dataNasc);
                            $aluno->setIdTurma($linha['idTurma']);
                            $aluno->setIdEscola($idEscola);
                            echo $aluno->atualizar($aluno);
                        }
                    }
                }
            }
            if($turmaInvalida == true){
                $_SESSION['turmaInvalida'] = $turmaAluno;
            }
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }

?>