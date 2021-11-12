<?php

    include ('../secretaria/sentinela.php');
    include ('../classes/Turma.php');
    include ('../classes/HorarioTurma.php');
    include ('../classes/Disciplina.php');

    try{
        header("location: ../secretaria/cadastrar-dados.php");
        $idEscola = $_SESSION['idEscola'];
        $turmaSelecionada = $_POST['nomeTurmaHorario'];
        $turma = new Turma();
        $horarioTurma = new HorarioTurma();
        $disciplina = new Disciplina();
        $listaDisciplina = $disciplina->listar($idEscola);
        $listaTurma = $turma->listar($idEscola);
        foreach($listaTurma as $linha){
            if($linha['nomeTurma'] == $turmaSelecionada){
                $idTurma = $linha['idTurma'];
            }
        }
        
            $arquivo = new DOMDocument();
            $arquivo->load($_FILES['planilha-horario']['tmp_name']);
            $listaTurma = $arquivo->getElementsByTagName("Row");
            $i = 0;
            $numeroAula = 1;
            foreach($listaTurma as $linha){
                if($i > 1){
                    
                    $disciplinaAula = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                    foreach($listaDisciplina as $linha2){
                        if($linha2['nomeDisciplina'] == $disciplinaAula){
                            $horarioTurma->setIdTurma($idTurma);
                            $horarioTurma->setIdEscola($idEscola);
                            $horarioTurma->setDiaSemana("Segunda-Feira");
                            $horarioTurma->setIdDisciplina($linha2['idDisciplina']);
                            $horarioTurma->setOrdemAulaDia($numeroAula);
                            $horarioTurma->cadastrar($horarioTurma);
                        }
                    }

                    $disciplinaAula = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                    foreach($listaDisciplina as $linha2){
                        if($linha2['nomeDisciplina'] == $disciplinaAula){
                            $horarioTurma->setIdTurma($idTurma);
                            $horarioTurma->setIdEscola($idEscola);
                            $horarioTurma->setDiaSemana("Terça-Feira");
                            $horarioTurma->setIdDisciplina($linha2['idDisciplina']);
                            $horarioTurma->setOrdemAulaDia($numeroAula);
                            $horarioTurma->cadastrar($horarioTurma);
                        }
                    }

                    $disciplinaAula = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                    foreach($listaDisciplina as $linha2){
                        if($linha2['nomeDisciplina'] == $disciplinaAula){
                            $horarioTurma->setIdTurma($idTurma);
                            $horarioTurma->setIdEscola($idEscola);
                            $horarioTurma->setDiaSemana("Quarta-Feira");
                            $horarioTurma->setIdDisciplina($linha2['idDisciplina']);
                            $horarioTurma->setOrdemAulaDia($numeroAula);
                            $horarioTurma->cadastrar($horarioTurma);
                        }
                    }

                    $disciplinaAula = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                    foreach($listaDisciplina as $linha2){
                        if($linha2['nomeDisciplina'] == $disciplinaAula){
                            $horarioTurma->setIdTurma($idTurma);
                            $horarioTurma->setIdEscola($idEscola);
                            $horarioTurma->setDiaSemana("Quinta-Feira");
                            $horarioTurma->setIdDisciplina($linha2['idDisciplina']);
                            $horarioTurma->setOrdemAulaDia($numeroAula);
                            $horarioTurma->cadastrar($horarioTurma);
                        }
                    }

                    $disciplinaAula = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
                    foreach($listaDisciplina as $linha2){
                        if($linha2['nomeDisciplina'] == $disciplinaAula){
                            $horarioTurma->setIdTurma($idTurma);
                            $horarioTurma->setIdEscola($idEscola);
                            $horarioTurma->setDiaSemana("Sexta-Feira");
                            $horarioTurma->setIdDisciplina($linha2['idDisciplina']);
                            $horarioTurma->setOrdemAulaDia($numeroAula);
                            $horarioTurma->cadastrar($horarioTurma);
                        }
                    }
                    $numeroAula++;
                }
                $i++;
            }
        
    }
    catch(Exception $e){
        echo $e->getMessage();
    }