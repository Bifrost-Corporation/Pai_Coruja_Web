<?php

    include_once('Conexao.php');

    class Responsavel{

        private $idResponsavel;
        private $nomeResponsavel;
        private $cpfResponsavel;
        private $emailResponsavel;
        private $senhaResponsavel;
        private $idAluno;

        public function getIdResponsavel(){
            return $this->idResponsavel;
        }

        public function setIdResponsavel($idResponsavel){
            $this->idResponsavel = $idResponsavel;
        }

        public function getNomeResponsavel(){
            return $this->nomeResponsavel;
        }

        public function setNomeResponsavel($nomeResponsavel){
            $this->nomeResponsavel = $nomeResponsavel;
        }

        public function getCpfResponsavel(){
            return $this->cpfResponsavel;
        }

        public function setCpfResponsavel($cpfResponsavel){
            $this->cpfResponsavel = $cpfResponsavel;
        }

        public function getEmailResponsavel(){
            return $this->emailResponsavel;
        }

        public function setEmailResponsavel($emailResponsavel){
            $this->emailResponsavel = $emailResponsavel;
        }

        public function getSenhaResponsavel(){
            return $this->senhaResponsavel;
        }

        public function setSenhaResponsavel($senhaResponsavel){
            $this->senhaResponsavel = $senhaResponsavel;
        }

        public function getIdAluno(){
            return $this->idAluno;
        }

        public function setIdAluno($idAluno){
            $this->idAluno = $idAluno;
        }

        public function cadastrar($responsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbresponsavel (nomeResponsavel, cpfResponsavel, emailResponsavel, senhaResponsavel, idAluno)
                                            VALUES (?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $responsavel->getNomeResponsavel());
            $stmt->bindParam(2, $responsavel->getCpfResponsavel());
            $stmt->bindParam(3, $responsavel->getEmailResponsavel());
            $stmt->bindParam(4, $responsavel->getSenhaResponsavel());
            $stmt->bindParam(5, $responsavel->getIdAluno());
            $stmt->execute();
            return 'Cadastro do responsável realizado com sucesso!';
        }

    }

?>