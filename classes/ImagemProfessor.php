<?php

    include_once("Conexao.php");

    class ImagemProfessor{

        private $idImagemProfessor;
        private $nomeImagemProfessor;
        private $caminhoImagemProfessor;
        private $idProfessor;

        public function getIdImagemProfessor(){
            return $this->idImagemProfessor;
        }

        public function setIdImagemProfessor($idImagemProfessor){
            $this->idImagemProfessor = $idImagemProfessor;
        }

        public function getNomeImagemProfessor(){
            return $this->nomeImagemProfessor;
        }

        public function setNomeImagemProfessor($nomeImagemProfessor){
            $this->nomeImagemProfessor = $nomeImagemProfessor;
        }

        public function getCaminhoImagemProfessor(){
            return $this->caminhoImagemProfessor;
        }

        public function setCaminhoImagemProfessor($caminhoImagemProfessor){
            $this->caminhoImagemProfessor = $caminhoImagemProfessor;
        }

        public function getIdProfessor(){
            return $this->idProfessor;
        }

        public function setIdProfessor($idProfessor){
            $this->idProfessor = $idProfessor;
        }

        public function cadastrar($imagemProfessor){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbimagemperfilprofessor (nomeImagemPerfilProfessor, caminhoImagemPerfilProfessor, idProfessor)
                                            VALUES (?, ?, ?)");
            $stmt->bindParam(1, $imagemProfessor->getNomeImagemProfessor());
            $stmt->bindParam(2, $imagemProfessor->getCaminhoImagemProfessor());
            $stmt->bindParam(3, $imagemProfessor->getIdProfessor());
            $stmt->execute();
            return 'Cadastro de imagem de perfil do professor realizado com sucesso!';
        }

    }

?>