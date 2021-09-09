<?php

    include("../professor/sentinela.php");
    include("../classes/Aluno.php");
    include("../classes/Turma.php");
    include("../classes/Observacao.php");

    try{
        header("location: ../professor/cadastrar-flags.php");
        $qtdePontosObservacao = $_POST['txtGravidade'];
        $descObservacao = $_POST['txtOcorrido'];
        $idProfessor = $_SESSION['idProfessor'];
        $nomeAluno = $_POST['txtAluno'];
        $aluno = new Aluno();
        $listaAluno = $aluno->listar();
        $turma = new Turma();
        $listaTurma = $turma->listar();
        $idEscola = $_SESSION['idEscola'];
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
        
        /* FAZER ESSE INSERT SELECIONANDO A TURMA JUNTO PARA NÃO CONFLITAR */
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>