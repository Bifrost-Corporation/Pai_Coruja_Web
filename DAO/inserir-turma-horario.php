<?php

    include ('../secretaria/sentinela.php');
    include ('../classes/Turma.php');
    include("../classes/Disciplina.php");
    include("../classes/HorarioTurma.php");

    try{
        header("location: ../secretaria/cadastrar-dados.php");
        $idTurma = $_POST['idTurma'];
        $nomeTurma = $_POST['txtNomeTurma'];
        $nomeDisciplina = $_POST['txtDisciplina'];
        $diaSemana = $_POST['txtDiaSemana'];
        $idEscola = $_SESSION['idEscola'];
        $turma = new Turma();
        $turma->setNomeTurma($nomeTurma);
        $turma->setIdEscola($idEscola);
        if($idTurma > 0){
            $turma->setIdTurma($idTurma);
            echo $turma->atualizar($turma);
        }else{
            echo $turma->cadastrar($turma);
        }
        $listaTurma = $turma->selecionarUltimaTurma();
        $disciplina = new Disciplina();
        $listaDisciplina = $disciplina->listar($_SESSION['idEscola']);
        $validaTurma = false;
        foreach($listaTurma as $linha){
                $idTurma = $linha['idTurma'];
        }
        foreach($listaDisciplina as $linha){
            if($idEscola == $_SESSION['idEscola'] && $nomeDisciplina == $linha['nomeDisciplina']){
                $idDisciplina = $linha['idDisciplina'];
            }
        }
        $horarioTurma = new HorarioTurma();
        $horarioTurma->setDiaSemana($diaSemana);
        $horarioTurma->setIdTurma($idTurma);
        $horarioTurma->setIdDisciplina($idDisciplina);
        $horarioTurma->setIdEscola($_SESSION['idEscola']);
        echo $horarioTurma->cadastrar($horarioTurma);
    } catch(Exception $e) {
        echo $e->getMessage();
    }

?>