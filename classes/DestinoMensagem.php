<?php

    include_once("Conexao.php");

    class DestinoMensagem{

        private $idDestinoMensagem;
        private $idUsuario;

        public function getIdDestinoMensagem(){
            return $this->idDestinoMensagem;
        }

        public function setIdDestinoMensagem($idDestinoMensagem){
            $this->idDestinoMensagem = $idDestinoMensagem;
        }

        public function getIdUsuario(){
            return $this->idUsuario;
        }

        public function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }

        public function cadastrar($destionoMensagem){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbdestinomensagem (idUsuario)
                                            VALUES (?)");
            $stmt->bindParam(1, $destionoMensagem->getIdUsuario());
            $stmt->execute();
            return 'Cadastro do destino da mensagem realizado com sucesso!';
        }

        public function pegarUltimoDestino(){
            $conexao = Conexao::conectar();
            $queryDestino = "SELECT idDestinoMensagem FROM tbdestinomensagem WHERE idDestinoMensagem = (SELECT MAX(idDestinoMensagem) FROM tbdestinomensagem)";
            $resultadoDestino = $conexao->query($queryDestino);
            $listaDestino = $resultadoDestino->fetchAll(PDO::FETCH_ASSOC);
            return $listaDestino;
        }

    }

?>