<?php

    include_once("Conexao.php");

    class Mensagem{

        private $idMensagem;
        private $textoMensagem;
        private $dataMensagem;
        private $idOrigemMensagem;
        private $idDestinoMensagem;

        public function getIdMensagem(){
            return $this->idMensagem;
        }

        public function setIdMensagem($idMensagem){
            $this->idMensagem = $idMensagem;
        }

        public function getTextoMensagem(){
            return $this->textoMensagem;
        }

        public function setTextoMensagem($textoMensagem){
            $this->textoMensagem = $textoMensagem;
        }

        public function getDataMensagem(){
            return $this->dataMensagem;
        }

        public function setDataMensagem($dataMensagem){
            $this->dataMensagem = $dataMensagem;
        }

        public function getIdOrigemMensagem(){
            return $this->idOrigemMensagem;
        }

        public function setIdOrigemMensagem($idOrigemMensagem){
            $this->idOrigemMensagem = $idOrigemMensagem;
        }

        public function getIdDestinoMensagem(){
            return $this->idDestinoMensagem;
        }

        public function setIdDestinoMensagem($idDestinoMensagem){
            $this->idDestinoMensagem = $idDestinoMensagem;
        }
        
        public function cadastrar($mensagem){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbmensagem (textoMensagem, dataMensagem, idOrigemMensagem, idDestinoMensagem)
                                            VALUES (?, ?, ?, ?)");
            $stmt->bindParam(1, $mensagem->getTextoMensagem());
            $stmt->bindParam(2, $mensagem->getDataMensagem());
            $stmt->bindParam(3, $mensagem->getIdOrigemMensagem());
            $stmt->bindParam(4, $mensagem->getIdDestinoMensagem());
            $stmt->execute();
            return 'Mensagem cadastrada com sucesso!';
        }

    }

?>