<?php

    include_once("Conexao.php");

    class Usuario{

        private $idUsuario;
        private $idProfessor;
        private $idResponsavel;
        private $idSecretaria;

        public function getIdUsuario(){
            return $this->idUsuario;
        }

        public function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }

        public function getIdProfessor(){
            return $this->idProfessor;
        }

        public function setIdProfessor($idProfessor){
            $this->idProfessor = $idProfessor;
        }

        public function getIdResponsavel(){
            return $this->idResponsavel;
        }

        public function setIdResponsavel($idResponsavel){
            $this->idResponsavel = $idResponsavel;
        }

        public function getIdSecretaria(){
            return $this->idSecretaria;
        }

        public function setIdSecretaria($idSecretaria){
            $this->idSecretaria = $idSecretaria;
        }

        public function cadastrar($usuario){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbusuario (idProfessor, idResponsavel, idSecretaria)
                                            VALUES (?, ?, ?)");
            $stmt->bindParam(1, $usuario->getIdProfessor());
            $stmt->bindParam(2, $usuario->getIdResponsavel());
            $stmt->bindParam(3, $usuario->getIdSecretaria());
            $stmt->execute();
            return 'Cadastro de usuário realizado com sucesso!';
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $queryUsuario = "SELECT idUsuario, idProfessor, idResponsavel, idSecretaria FROM tbusuario";
            $resultadoUsuario = $conexao->query($queryUsuario);
            $listaUsuario = $resultadoUsuario->fetchAll(PDO::FETCH_ASSOC);
            return $listaUsuario;
        }

    }

?>