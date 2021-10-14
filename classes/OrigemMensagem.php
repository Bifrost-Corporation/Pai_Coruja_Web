<?php

    include_once("Conexao.php");

    class OrigemMensagem{

        private $idOrigemMensagem;
        private $idUsuario;

        public function getIdOrigemMensagem(){
            return $this->idOrigemMensagem;
        }

        public function setIdOrigemMensagem($idOrigemMensagem){
            $this->idOrigemMensagem = $idOrigemMensagem;
        }

        public function getIdUsuario(){
            return $this->idUsuario;
        }

        public function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }

        public function cadastrar($origemMensagem){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbOrigemMensagem (idUsuario)
                                            VALUES (?)");
            $stmt->bindParam(1, $origemMensagem->getIdUsuario());
            $stmt->execute();
            return 'Origem da mensagem cadastrada com sucesso!';
        }

        public function pegarUltimaOrigem(){
            $conexao = Conexao::conectar();
            $queryOrigem = "SELECT idOrigemMensagem FROM tborigemmensagem WHERE idOrigemMensagem = (SELECT MAX(idOrigemMensagem) FROM tborigemmensagem)";
            $resultadoOrigem = $conexao->query($queryOrigem);
            $listaOrigem = $resultadoOrigem->fetchAll(PDO::FETCH_ASSOC);
            return $listaOrigem;
        }

    }

?>