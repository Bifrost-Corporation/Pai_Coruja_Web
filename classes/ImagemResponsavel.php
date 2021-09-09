<?php

    include ("Conexao.php");

    class ImagemResponsavel{

        private $idImagemResponsavel;
        private $nomeImagemResponsavel;
        private $caminhoImagemResponsavel;
        private $idResponsavel;

        public function getIdImagemResponsavel(){
            return $this->idImagemResponsavel;
        }

        public function setIdImagemResponsavel($idImagemResponsavel){
            $this->idImagemResponsavel = $idImagemResponsavel;
        }

        public function getNomeImagemResponsavel(){
            return $this->nomeImagemResponsavel;
        }

        public function setNomeImagemResponsael($nomeImagemResponsavel){
            $this->nomeImagemResponsavel = $nomeImagemResponsavel;
        }

        public function getCaminhoImagemResponsavel(){
            return $this->caminhoImagemResponsavel;
        }

        public function setCaminhoImagemResponsavel($caminhoImagemResponsavel){
            $this->caminhoImagemResponsavel = $caminhoImagemResponsavel;
        }

        public function getIdResponsavel(){
            return $this->idResponsavel;
        }

        public function setIdResponsavel($idResponsavel){
            $this->idResponsavel = $idResponsavel;
        }

        public function cadastrar($imagemResponsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbimagemperfilresponsavel (nomeImagemPerfilResponsavel, caminhoImagemPerfilResponsavel, idResponsavel)
                                            VALUES (?, ?, ?)");
            $stmt->bindParam(1, $imagemResponsavel->getNomeImagemResponsavel());
            $stmt->bindParam(2, $imagemResponsavel->getCaminhoImagemResponsavel());
            $stmt->bindParam(3, $imagemResponsavel->getIdResponsavel());
            $stmt->execute();
            return 'Cadastro da imagem do perfil do responsável realizado com sucesso!';
        }

    }

?>