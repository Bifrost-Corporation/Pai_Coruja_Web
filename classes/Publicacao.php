<?php

    include("Conexao.php");

    class Publicacao{

        private $idPublicacao;
        private $tituloPublicacao;
        private $descPublicacao;
        private $idProfessor;

        public function getIdPublicacao(){
            return $this->idPublicacao;
        }

        public function setIdPublicacao($idPublicacao){
            $this->idPublicacao = $idPublicacao;
        }

        public function getTituloPublicacao(){
            return $this->tituloPublicacao;
        }

        public function setTituloPublicacao($tituloPublicacao){
            $this->tituloPublicacao = $tituloPublicacao;
        }

        public function getDescPublicacao(){
            return $this->descPublicacao;
        }

        public function setDescPublicacao($descPublicacao){
            $this->descPublicacao = $descPublicacao;
        }

        public function getIdProfessor(){
            return $this->idProfessor;
        }

        public function setIdProfessor($idProfessor){
            $this->idProfessor = $idProfessor;
        }

        public function cadastrar($publicaco){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbpublicacao (tituloPublicacao, descPublicacao, idProfessor)
                                            VALUES (?, ?, ?)");
            $stmt->bindParam(1, $publicaco->getTituloPublicacao());
            $stmt->bindParam(2, $publicaco->getDescPublicacao());
            $stmt->bindParam(3, $publicaco->getIdProfessor());
            $stmt->execute();
            return 'Cadastro da publicação realizado com sucesso!';
        }

        public function atualizar($publicaco){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('UPDATE tbpublicacao SET tituloPublicacao = ?, descPublicacao = ?, idProfessor = ? WHERE idPublicacao = ?');
            $stmt->bindParam(1, $publicaco->getTituloPublicacao());
            $stmt->bindParam(2, $publicaco->getDescPublicacao());
            $stmt->bindParam(3, $publicaco->getIdProfessor());
            $stmt->bindParam(4, $publicaco->getIdPublicacao());
            $stmt->execute();
            return 'Publicação atualizada com sucesso!';
        }

    }

?>