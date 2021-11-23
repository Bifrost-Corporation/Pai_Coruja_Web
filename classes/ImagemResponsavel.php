<?php

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

        public function atualizar($imagemResponsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('UPDATE tbimagemperfilresponsavel SET nomeImagemPerfilResponsael = ?, caminhoImagemPerfilResponsavel = ?, idResponsavel = ? WHERE idImagemPerfilResponsavel = ?');
            $stmt->bindParam(1, $imagemResponsavel->getNomeImagemResponsavel());
            $stmt->bindParam(2, $imagemResponsavel->getCaminhoImagemResponsavel());
            $stmt->bindParam(3, $imagemResponsavel->getIdResponsavel());
            $stmt->bindParam(4, $imagemResponsavel->getIdImagemResponsavel());
            $stmt->execute();
            return 'Imagem de perfil do responsável atualizada com sucesso!';
        }

        public function excluir($imagemResponsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('DELETE FROM tbimagemperfilresponsavel WHERE idImagemPerfilResponsavel = ?');
            $stmt->bindParam(1, $imagemResponsavel->getIdImagemResponsavel());
            $stmt->execute();
            return 'Imagem do responsável excluida com sucesso!';
        }


        public function listarImagem($idResponsavel){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT nomeImagemPerfilResponsavel,caminhoImagemPerfilResponsavel, idResponsavel FROM tbimagemperfilresponsavel WHERE idImagemPerfilResponsavel = (SELECT max(idImagemPerfilResponsavel) FROM tbimagemperfilResponsavel WHERE idResponsavel = '$idResponsavel');";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
         }
    }

?>