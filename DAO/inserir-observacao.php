<?php

    include("../professor/sentinela.php");
    include("../classes/Aluno.php");
    include("../classes/Turma.php");
    include("../classes/Observacao.php");

    try{
        unset($_SESSION['turmaAluno']);
        header("location: ../professor/cadastrar-flags.php");
        $qtdePontosObservacao = $_POST['range-gravidade'];
        $descObservacao = $_POST['txtOcorrido'];
        $idProfessor = $_SESSION['idProfessor'];
        $nomeAluno = $_POST['txtAluno'];
        $turmaAluno = $_POST['txtTurma'];
        $aluno = new Aluno();
        $listaAluno = $aluno->listar();
        $turma = new Turma();
        $listaTurma = $turma->listar();
        $idTurma = 0;
        $alunoInexistente = true;
        foreach($listaTurma as $linha){
            if($linha['nomeTurma'] == $turmaAluno){
                $idTurma = $linha['idTurma'];
            }
        }
        if($idTurma == 0){
            $_SESSION['turmaAluno'] = $turmaAluno;
        }else{
            foreach($listaAluno as $linha){
                if($nomeAluno == $linha['nomeAluno'] && $idTurma == $linha['idTurma']){
                    $alunoInexistente = false;
                    $observacao = new Observacao();
                    $observacao->setQtdePontosObservacao($qtdePontosObservacao);
                    $observacao->setDescObservacao($descObservacao);
                    $observacao->setIdProfessor($idProfessor);
                    $observacao->setIdAluno($linha['idAluno']);
                    echo $observacao->cadastrar($observacao);
                }
            }
            if($alunoInexistente == true){
                $_SESSION['nomeAluno'] = $nomeAluno;
            }
        }
        $idEscola = $_SESSION['idEscola'];
        /*
        foreach($listaAluno as $linha){
            foreach($listaTurma as $linha2){
                if($nomeAluno == $linha['nomeAluno'] . ' ' . $linha2['nomeTurma'] && $idEscola == $linha['idEscola']){
                    $observacao = new Observacao();
                    $observacao->setQtdePontosObservacao($qtdePontosObservacao);
                    $observacao->setDescObservacao($descObservacao);
                    $observacao->setIdProfessor($idProfessor);
                    $observacao->setIdAluno($linha['idAluno']);
                    echo $observacao->cadastrar($observacao);
                }
            }
        }
        */
        
        /* FAZER ESSE INSERT SELECIONANDO A TURMA JUNTO PARA NÃO CONFLITAR */
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>