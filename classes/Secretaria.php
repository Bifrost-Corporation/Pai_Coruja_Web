<?php

    include_once("Conexao.php");

    class Secretaria{

        private $idSecretaria;
        private $nomeSecretaria;
        private $emailSecretaria;
        private $senhaSecretaria;
        private $idEscola;
        private $idAdministrador;

        public function getIdSecretaria(){
            return $this->idSecretaria;
        }

        public function setIdSecretaria($idSecretaria){
            $this->idSecretaria = $idSecretaria;
        }

        public function getNomeSecretaria(){
            return $this->nomeSecretaria;
        }

        public function setNomeSecretaria($nomeSecretaria){
            $this->nomeSecretaria = $nomeSecretaria;
        }

        public function getEmailSecretaria(){
            return $this->emailSecretaria;
        }

        public function setEmailSecretaria($emailSecretaria){
            $this->emailSecretaria = $emailSecretaria;
        }

        public function getSenhaSecretaria(){
            return $this->senhaSecretaria;
        }

        public function setSenhaSecretaria($senhaSecretaria){
            $this->senhaSecretaria = $senhaSecretaria;
        }

        public function getIdEscola(){
            return $this->idEscola;
        }

        public function setIdEscola($idEscola){
            $this->idEscola = $idEscola;
        }

        public function getIdAdministrador(){
            return $this->idAdministrador;
        }

        public function setIdAdministrador($idAdministrador){
            $this->idAdministrador = $idAdministrador;
        }

        public function cadastrar($secretaria){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbsecretaria (nomeSecretaria, emailSecretaria, senhaSecretaria, idEscola, idAdministrador)
                                            VALUES (?,?,?,?,?)");
            $stmt->bindParam(1, $secretaria->getNomeSecretaria());
            $stmt->bindParam(2, $secretaria->getEmailSecretaria());
            $stmt->bindParam(3, $secretaria->getSenhaSecretaria());
            $stmt->bindParam(4, $secretaria->getIdEscola());
            $stmt->bindParam(5, $secretaria->getIdAdministrador());
            $stmt->execute();
            return 'Cadastro da secretária realizado com sucesso!';
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $querySecretaria = 'SELECT idSecretaria, nomeSecretaria, emailSecretaria, senhaSecretaria, idEscola, idAdministrador FROM tbsecretaria';
            $resultadoSecretaria = $conexao->query($querySecretaria);
            $listaSecretaria = $resultadoSecretaria->fetchAll(PDO::FETCH_ASSOC);
            return $listaSecretaria;
        }

    }

?>