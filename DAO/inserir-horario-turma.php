<?php

    include("../secretaria/sentinela.php");
    include("../classes/Turma.php");
    include("../classes/Disciplina.php");
    include("../classes/HorarioTurma.php");

    try{
        header("location: ../secretaria/cadastrar-horario-turma.php");
        $diaSemana = $_POST['txtDiaSemana'];
        $nomeTurma = $_POST['txtTurma'];
        $nomeDisciplina = $_POST['txtDisciplina'];
        $turma = new Turma();
        $listaTurma = $turma->listar();
        $disciplina = new Disciplina();
        $listaDisciplina = $disciplina->listar();
        foreach($listaTurma as $linha){
            if($nomeTurma == $linha['nomeTurma'] && $linha['idEscola'] == $_SESSION['idEscola']){
                foreach($listaDisciplina as $linha2){
                    if($nomeDisciplina == $linha2['nomeDisciplina'] && $linha2['idEscola'] == $_SESSION['idEscola']){
                        $horarioTurma = new HorarioTurma();
                        $horarioTurma->setDiaSemana($diaSemana);
                        $horarioTurma->setIdTurma($linha['idTurma']);
                        $horarioTurma->setIdDisciplina($linha2['idDisciplina']);
                        $horarioTurma->setIdEscola($_SESSION['idEscola']);
                        echo $horarioTurma->cadastrar($horarioTurma);
                    }
                }
            }
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>