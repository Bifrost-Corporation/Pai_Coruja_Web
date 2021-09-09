<?php

    include_once("Conexao.php");

    class Observacao{

        private $idObservacao;
        private $qtdePontosObservacao;
        private $descObservacao;
        private $idProfessor;
        private $idAluno;

        public function getIdObservacao(){
            return $this->idObservacao;
        }

        public function setIdObservacao($idObservacao){
            $this->idObservacao = $idObservacao;
        }

        public function getQtdePontosObservacao(){
            return $this->qtdePontosObservacao;
        }

        public function setQtdePontosObservacao($qtdePontosObservacao){
            $this->qtdePontosObservacao = $qtdePontosObservacao;
        }

        public function getDescObservacao(){
            return $this->descObservacao;
        }

        public function setDescObservacao($descObservacao){
            $this->descObservacao = $descObservacao;
        }

        public function getIdProfessor(){
            return $this->idProfessor;
        }

        public function setIdProfessor($idProfessor){
            $this->idProfessor = $idProfessor;
        }

        public function getIdAluno(){
            return $this->idAluno;
        }

        public function setIdAluno($idAluno){
            $this->idAluno = $idAluno;
        }

        public function cadastrar($observacao){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbobservacao (qtdePontosObservacao, descObservacao, idProfessor, idAluno)
                                            VALUES (?, ?, ?, ?)");
            $stmt->bindParam(1, $observacao->getQtdePontosObservacao());
            $stmt->bindParam(2, $observacao->getDescObservacao());
            $stmt->bindParam(3, $observacao->getIdProfessor());
            $stmt->bindParam(4, $observacao->getIdAluno());
            $stmt->execute();
            return 'Cadastro da observação realizado com sucesso!';
        }

    }

?>