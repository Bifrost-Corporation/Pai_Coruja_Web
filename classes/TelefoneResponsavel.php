<?php

    include_once('Conexao.php');

    class TelefoneResponsavel{

        private $idTelefoneResponsavel;
        private $numTelefoneResponsavel;
        private $idResponsavel;

        public function getIdTelefoneResponsavel(){
            return $this->idTelefoneResponsavel;
        }

        public function setIdTelefoneResponsavel($idTelefoneResponsavel){
            $this->idTelefoneResponsavel = $idTelefoneResponsavel;
        }

        public function getNumTelefoneResponsavel(){
            return $this->numTelefoneResponsavel;
        }

        public function setNumTelefoneResponsavel($numTelefoneResponsavel){
            $this->numTelefoneResponsavel = $numTelefoneResponsavel;
        }

        public function getIdResponsavel(){
            return $this->idResponsavel;
        }

        public function setIdResponsavel($idResponsavel){
            $this->idResponsavel = $idResponsavel;
        }

        public function cadastrar($telefoneResponsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbtelefoneresponsavel (numTelefoneResponsavel, idResponsavel)
                                            VALUES (?, ?)");
            $stmt->bindParam(1, $telefoneResponsavel->getNumTelefoneResponsavel());
            $stmt->bindParam(2, $telefoneResponsavel->getIdResponsavel());
            $stmt->execute();
            return 'Cadastro do telefone do responsável realizado com sucesso!';
        }

    }

?>