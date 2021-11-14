<?php
    // include ("Conexao.php");
    class ImagemSecretaria{

        private $idImagemSecretaria;
        private $nomeImagemSecretaria;
        private $caminhoImagemSecretaria;
        private $idSecretaria;

        public function getIdImagemSecretaria(){
            return $this->idImagemSecretaria;
        }

        public function setIdImagemSecretaria($idImagemSecretaria){
            $this->idImagemSecretaria = $idImagemSecretaria;
        }

        public function getNomeImagemSecretaria(){
            return $this->nomeImagemSecretaria;
        }

        public function setNomeImagemSecretaria($nomeImagemSecretaria){
            $this->nomeImagemSecretaria = $nomeImagemSecretaria;
        }

        public function getCaminhoImagemSecretaria(){
            return $this->caminhoImagemSecretaria;
        }

        public function setCaminhoImagemSecretaria($caminhoImagemSecretaria){
            $this->caminhoImagemSecretaria = $caminhoImagemSecretaria;
        }

        public function getIdSecretaria(){
            return $this->idSecretaria;
        }

        public function setIdSecretaria($idSecretaria){
            $this->idSecretaria = $idSecretaria;
        }

        public function cadastrar($imagemSecretaria){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbimagemperfilsecretaria (nomeImagemPerfilSecretaria, caminhoImagemPerfilSecretaria, idSecretaria)
                                            VALUES (?, ?, ?)");
            $stmt->bindParam(1, $imagemSecretaria->getNomeImagemSecretaria());
            $stmt->bindParam(2, $imagemSecretaria->getCaminhoImagemSecretaria());
            $stmt->bindParam(3, $imagemSecretaria->getIdSecretaria());
            $stmt->execute();
            return 'Cadastro da imagem do perfil do Secretaria realizado com sucesso!';
        }

        public function atualizar($imagemSecretaria){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('UPDATE tbimagemperfilsecretaria SET nomeImagemPerfilSecretaria = ?, caminhoImagemPerfilSecretaria = ?, idSecretaria = ? WHERE idImagemPerfilSecretaria = ?');
            $stmt->bindParam(1, $imagemSecretaria->getNomeImagemSecretaria());
            $stmt->bindParam(2, $imagemSecretaria->getCaminhoImagemSecretaria());
            $stmt->bindParam(3, $imagemSecretaria->getIdSecretaria());
            $stmt->bindParam(4, $imagemSecretaria->getIdImagemSecretaria());
            $stmt->execute();
            return 'Imagem de perfil do Secretaria atualizada com sucesso!';
        }

        public function excluir($imagemSecretaria){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('DELETE FROM tbimagemperfilsecretaria WHERE idImagemPerfilSecretaria = ?');
            $stmt->bindParam(1, $imagemSecretaria->getIdImagemSecretaria());
            $stmt->execute();
            return 'Imagem do Secretaria excluida com sucesso!';
        }

        public function listarImagem(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT nomeImagemPerfilSecretaria,caminhoImagemPerfilSecretaria, idSecretaria FROM tbimagemperfilsecretaria 
                              WHERE idSecretaria = (SELECT DISTINCT idSecretaria FROM tbsecretaria)";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
         }

    }

?>