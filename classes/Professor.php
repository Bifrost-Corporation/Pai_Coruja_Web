<?php

    include_once("Conexao.php");

    class Professor{

        private $idProfessor;
        private $nomeProfessor;
        private $emailProfessor;
        private $senhaProfessor;
        private $idEscola;

        public function getIdProfessor(){
            return $this->idProfessor;
        }

        public function setIdProfessor($idProfessor){
            $this->idProfessor = $idProfessor;
        }

        public function getNomeProfessor(){
            return $this->nomeProfessor;
        }

        public function setNomeProfessor($nomeProfessor){
            $this->nomeProfessor = $nomeProfessor;
        }

        public function getEmailProfessor(){
            return $this->emailProfessor;
        }

        public function setEmailProfessor($emailProfessor){
            $this->emailProfessor = $emailProfessor;
        }

        public function getSenhaProfessor(){
            return $this->senhaProfessor;
        }

        public function setSenhaProfessor($senhaProfessor){
            $this->senhaProfessor = $senhaProfessor;
        }

        public function getIdEscola(){
            return $this->idEscola;
        }

        public function setIdEscola($idEscola){
            $this->idEscola = $idEscola;
        }

        public function cadastrar($professor){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbprofessor (nomeProfessor, emailProfessor, senhaProfessor, idEscola)
                                            VALUES (?, ?, ?, ?)");
            $stmt->bindParam(1, $professor->getNomeProfessor());
            $stmt->bindParam(2, $professor->getEmailProfessor());
            $stmt->bindParam(3, $professor->getSenhaProfessor());
            $stmt->bindParam(4, $professor->getIdEscola());
            $stmt->execute();
            return 'Cadastro do professor realizado com sucesso!';
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $queryProfessor = 'SELECT idProfessor, nomeProfessor, emailProfessor, senhaProfessor, idEscola FROM tbprofessor';
            $respostaProfessor = $conexao->query($queryProfessor);
            $listaProfessor = $respostaProfessor->fetchAll(PDO::FETCH_ASSOC);
            return $listaProfessor;
        }

        public function selecionarUltimoProfessor(){
            $conexao = Conexao::conectar();
            $queryProfessor = "SELECT idProfessor FROM tbprofessor WHERE idProfessor = (SELECT MAX(idProfessor) FROM tbprofessor)";
            $resultadoProfessor = $conexao->query($queryProfessor);
            $listaProfessor = $resultadoProfessor->fetchAll(PDO::FETCH_ASSOC);
            return $listaProfessor;
        }

    }

?>