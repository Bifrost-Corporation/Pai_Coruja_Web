<?php

    class HorarioTurma{

        private $idHorarioTurma;
        private $diaSemana;
        private $ordemAulaDia;
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

        public function getOrdemAulaDia(){
            return $this->ordemAulaDia;
        }

        public function setOrdemAulaDia($ordemAulaDia){
            $this->ordemAulaDia = $ordemAulaDia;
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
            $stmt = $conexao->prepare("INSERT INTO tbhorarioturma (diaSemana, ordemAulaDia, idTurma, idDisciplina, idEscola)
                                            VALUES (?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $horarioTurma->getDiaSemana());
            $stmt->bindParam(2, $horarioTurma->getOrdemAulaDia());
            $stmt->bindParam(3, $horarioTurma->getIdTurma());
            $stmt->bindParam(4, $horarioTurma->getIdDisciplina());
            $stmt->bindParam(5, $horarioTurma->getIdEscola());
            $stmt->execute();
            return 'Cadastro do horário da turma realizado com sucesso!';
        }

        //Atualizar o essas querys mais tarde

        public function atualizar($horarioTurma){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('UPDATE tbhorarioturma SET diaSemana = ?, idTurma = ?, idDisciplina = ?, idEscola = ? WHERE idHorarioTurma = ?');
            $stmt->bindParam(1, $horarioTurma->getDiaSemana());
            $stmt->bindParam(2, $horarioTurma->getIdTurma());
            $stmt->bindParam(3, $horarioTurma->getIdDisciplina());
            $stmt->bindParam(4, $horarioTurma->getIdEscola());
            $stmt->bindParam(5, $horarioTurma->getIdHorarioTurma());
            $stmt->execute();
            return 'Dados do horário da turma atualizados com sucesso!';
        }

        public function excluir($horarioTurma){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('DELETE FROM tbhorarioturma WHERE idHorarioTurma = ?');
            $stmt->bindParam(1, $horarioTurma->getIdHorarioTurma());
            $stmt->execute();
            return 'Horario turma excluido com sucesso!';
        }

    }

?>