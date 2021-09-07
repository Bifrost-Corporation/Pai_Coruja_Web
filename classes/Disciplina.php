<?php

    class Disciplina{
        
        private $idDisciplina;
        private $nomeDisciplina;
        private $idProfessor;
        private $idEscola;

        public function getIdDisciplina(){
            return $this->idDisciplina;
        }

        public function setIdDisciplina($idDisciplina){
            $this->idDisciplina = $idDisciplina;
        }

        public function getNomeDisciplina(){
            return $this->nomeDisciplina;
        }

        public function setNomeDisciplina($nomeDisciplina){
            $this->nomeDisciplina = $nomeDisciplina;
        }

        public function getIdProfessor(){
            return $this->idProfessor;
        }

        public function setIdProfessor($idProfessor){
            $this->idProfessor = $idProfessor;
        }

        public function getIdEscola(){
            return $this->idEscola;
        }

        public function setIdEscola($idEscola){
            $this->idEscola = $idEscola;
        }

        public function cadastrar($disciplina){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('INSERT INTO tbdisciplina (nomeDisciplina, idProfessor, idEscola)
                                            VALUES (?, ?, ?)');
            $stmt->bindParam(1, $disciplina->getNomeDisciplina());
            $stmt->bindParam(2, $disciplina->getIdProfessor());
            $stmt->bindParam(3, $disciplina->getIdEscola());
            $stmt->execute();
            return 'Cadastro da disciplina realizado com sucesso!';
        }

    }

?>