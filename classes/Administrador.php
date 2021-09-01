<?php

    class Administrador{

        private $idAdministador;
        private $loginAdministrador;
        private $senhaAdministrador;

        public function getIdAdministrador(){
            return $this->idAdministador;
        }

        public function setIdAdministrador($idAdministador){
            $this->idAdministador = $idAdministador;
        }

        public function getLoginAdministrador(){
            return $this->loginAdministrador;
        }

        public function setLoginAdministrador($loginAdministrador){
            $this->loginAdministrador = $loginAdministrador;
        }

        public function getSenhaAdministrador(){
            return $this->senhaAdministrador;
        }

        public function setSenhaAdministrador($senhaAdministrador){
            $this->senhaAdministrador = $senhaAdministrador;
        }

    }

?>