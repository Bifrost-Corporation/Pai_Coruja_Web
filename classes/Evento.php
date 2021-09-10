<?php

    include_once("Conexao.php");

    class Evento{

        private $idEvento;
        private $tituloEvento;
        private $descEvento;
        private $dataEvento;
        private $idSecretaria;

        public function getIdEvento(){
            return $this->idEvento;
        }

        public function setIdEvento($idEvento){
            $this->idEvento = $idEvento;
        }

        public function getTituloEvento(){
            return $this->tituloEvento;
        }

        public function setTituloEvento($tituloEvento){
            $this->tituloEvento = $tituloEvento;
        }

        public function getDescEvento(){
            return $this->descEvento;
        }

        public function setDescEvento($descEvento){
            $this->descEvento = $descEvento;
        }

        public function getDataEvento(){
            return $this->dataEvento;
        }

        public function setDataEvento($dataEvento){
            $this->dataEvento = $dataEvento;
        }

        public function getIdSecretaria(){
            return $this->idSecretaria;
        }

        public function setIdSecretaria($idSecretaria){
            $this->idSecretaria = $idSecretaria;
        }

        public function cadastrar($evento){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbevento (tituloEvento, descEvento, dataEvento, idSecretaria)
                                            VALUES (?, ?, ?, ?)");
            $stmt->bindParam(1, $evento->getTituloEvento());
            $stmt->bindParam(2, $evento->getDescEvento());
            $stmt->bindParam(3, $evento->getDataEvento());
            $stmt->bindParam(4, $evento->getIdSecretaria());
            $stmt->execute();
            return 'Cadastro do evento realizado com sucesso!';
        }

        public function pegarUltimoEvento(){
            $conexao = Conexao::conectar();
            $queryEvento = "SELECT idEvento FROM tbevento WHERE idEvento = (SELECT MAX(idEvento) FROM tbevento)";
            $resultadoEvento = $conexao->query($queryEvento);
            $listaEvento = $resultadoEvento->fetchAll(PDO::FETCH_ASSOC);
            return $listaEvento;
        }

    }

?>