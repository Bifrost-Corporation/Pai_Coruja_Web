<?php

    class HorarioTurma{

        private $idHorarioTurma;
        private $diaSemana;
        private $idTurma;
        private $idDisciplina;
        private $idEscola;

        public function getIdHorarioTurma(){
            return $this->idHorarioTurma;
        }

        public function setIdHorarioTurma($idHorarioTurma){
            $this->idHorarioTurma = $idHorarioTurma;
        }

        public function getDiaSemana(){
            return $this->diaSemana;
        }

        public function setDiaSemana($diaSemana){
            $this->diaSemana = $diaSemana;
        }

        public function getIdTurma(){
            return $this->idTurma;
        }

        public function setIdTurma($idTurma){
            $this->idTurma = $idTurma;
        }

        public function getIdDisciplina(){
            return $this->idDisciplina;
        }

        public function setIdDisciplina($idDisciplina){
            $this->idDisciplina = $idDisciplina;
        }

        public function getIdEscola(){
            return $this->idEscola;
        }

        public function setIdEscola($idEscola){
            $this->idEscola = $idEscola;
        }

        public function cadastrar($horarioTurma){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbhorarioturma (diaSemana, idTurma, idDisciplina, idEscola)
                                            VALUES (?, ?, ?, ?)");
            $stmt->bindParam(1, $horarioTurma->getDiaSemana());
            $stmt->bindParam(2, $horarioTurma->getIdTurma());
            $stmt->bindParam(3, $horarioTurma->getIdDisciplina());
            $stmt->bindParam(4, $horarioTurma->getIdEscola());
            $stmt->execute();
            return 'Cadastro do horário da turma realizado com sucesso!';
        }

    }

?>