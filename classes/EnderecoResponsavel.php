<?php

    include_once('Conexao.php');

    class EnderecoResponsavel{

        private $idEnderecoResponsavel;
        private $logradouroEnderecoResponsavel;
        private $numCasaEnderecoResponsavel;
        private $complementoEnderecoResponsavel;
        private $cepEnderecoResponsavel;
        private $bairroEnderecoResponsavel;
        private $cidadeEnderecoResponsavel;
        private $idResponsavel;

        public function getIdEnderecoResponsavel(){
            return $this->idEnderecoResponsavel;
        }

        public function setIdEnderecoResponsavel($idEnderecoResponsavel){
            $this->idEnderecoResponsavel = $idEnderecoResponsavel;
        }

        public function getLogradouroEnderecoResponsavel(){
            return $this->logradouroEnderecoResponsavel;
        }

        public function setLogradouroEnderecoResponsavel($logradouroEnderecoResponsavel){
            $this->logradouroEnderecoResponsavel = $logradouroEnderecoResponsavel;
        }

        public function getNumCasaEnderecoResponsavel(){
            return $this->numCasaEnderecoResponsavel;
        }

        public function setNumCasaEnderecoResponsavel($numCasaEnderecoResponsavel){
            $this->numCasaEnderecoResponsavel = $numCasaEnderecoResponsavel;
        }

        public function getComplementoEnderecoResponsavel(){
            return $this->complementoEnderecoResponsavel;
        }

        public function setComplementoEnderecoResponsavel($complementoEnderecoResponsavel){
            $this->complementoEnderecoResponsavel = $complementoEnderecoResponsavel;
        }

        public function getCepEnderecoResponsavel(){
            return $this->cepEnderecoResponsavel;
        }

        public function setCepEnderecoResponsavel($cepEnderecoResponsavel){
            $this->cepEnderecoResponsavel = $cepEnderecoResponsavel;
        }

        public function getBairroEnderecoResponsavel(){
            return $this->bairroEnderecoResponsavel;
        }

        public function setBairroEnderecoResponsavel($bairroEnderecoResponsavel){
            $this->bairroEnderecoResponsavel = $bairroEnderecoResponsavel;
        }

        public function getCidadeEnderecoResponsavel(){
            return $this->cidadeEnderecoResponsavel;
        }

        public function setCidadeEnderecoResponsavel($cidadeEnderecoResponsavel){
            $this->cidadeEnderecoResponsavel = $cidadeEnderecoResponsavel;
        }

        public function getIdResponsavel(){
            return $this->idResponsavel;
        }

        public function setIdResponsavel($idResponsavel){
            $this->idResponsavel = $idResponsavel;
        }

        public function cadastrar($enderecoResponsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbenderecoresponsavel (logradouroEnderecoResponsavel, numCasaEnderecoResponsavel, complementoEnderecoResponsavel, cepEnderecoResponsavel, bairroEnderecoResponsavel, cidadeEnderecoResponsavel, idResponsavel)
                                            VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $enderecoResponsavel->getLogradouroEnderecoResponsavel());
            $stmt->bindParam(2, $enderecoResponsavel->getNumCasaEnderecoResponsavel());
            $stmt->bindParam(3, $enderecoResponsavel->getComplementoEnderecoResponsavel());
            $stmt->bindParam(4, $enderecoResponsavel->getCepEnderecoResponsavel());
            $stmt->bindParam(5, $enderecoResponsavel->getBairroEnderecoResponsavel());
            $stmt->bindParam(6, $enderecoResponsavel->getCidadeEnderecoResponsavel());
            $stmt->bindParam(7, $enderecoResponsavel->getIdResponsavel());
            $stmt->execute();
            return 'Cadastro do endereço do responsável realizado com sucesso!';
        }

        public function atualizar($enderecoResponsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('UPDATE tbenderecoresponsavel SET logradouroEnderecoResponsavel = ?, numCasaEnderecoResponsavel = ?, complementoEnderecoResponsavel = ?, cepEnderecoResponsavel = ?, bairroEnderecoResponsavel = ?, cidadeEnderecoResponsavel = ?, idResponsavel = ? WHERE idEnderecoResponsavel = ?');
            $stmt->bindParam(1, $enderecoResponsavel->getLogradouroEnderecoResponsavel());
            $stmt->bindParam(2, $enderecoResponsavel->getNumCasaEnderecoResponsavel());
            $stmt->bindParam(3, $enderecoResponsavel->getComplementoEnderecoResponsavel());
            $stmt->bindParam(4, $enderecoResponsavel->getCepEnderecoResponsavel());
            $stmt->bindParam(5, $enderecoResponsavel->getBairroEnderecoResponsavel());
            $stmt->bindParam(6, $enderecoResponsavel->getCidadeEnderecoResponsavel());
            $stmt->bindParam(7, $enderecoResponsavel->getIdResponsavel);
            $stmt->bindParam(8, $enderecoResponsavel->getIdEnderecoResponsavel());
            $stmt->execute();
            return 'Dados do endereço do responsável atualizados com sucesso!';
        }

        public function excluir($enderecoResponsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('DELETE FROM tbenderecoresponsavel WHERE idEnderecoResponsavel = ?');
            $stmt->bindParam(1, $enderecoResponsavel->getIdEnderecoResponsavel());
            $stmt->execute();
            return 'Endereço do responsável excluido com sucesso!';
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $queryEndereco = "SELECT idEnderecoResponsavel, logradouroEnderecoResponsavel, numCasaEnderecoResponsavel, complementoEnderecoResponsavel, cepEnderecoResponsavel, bairroEnderecoResponsavel, cidadeEnderecoResponsavel, idResponsavel FROM tbenderecoresponsavel";
            $resultadoQuery = $conexao->query($queryEndereco);
            $listaEndereco = $resultadoQuery->fetchAll(PDO::FETCH_ASSOC);
            return $listaEndereco;
        }

    }

?>