<?php
    include_once("Conexao.php");

    class Escola{

        private $idEscola;
        private $nomeEscola;
        private $idAdministrador;

        public function getIdEscola(){
            return $this->idEscola;
        }

        public function setIdEscola($idEscola){
            $this->idEscola = $idEscola;
        }

        public function getNomeEscola(){
            return $this->nomeEscola;
        }

        public function setNomeEscola($nomeEscola){
            $this->nomeEscola = $nomeEscola;
        }

        public function getIdAdministrador(){
            return $this->idAdministrador;
        }

        public function setIdAdministrador($idAdministrador){
            $this->idAdministrador = $idAdministrador;
        }

        public function cadastrar($escola){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbescola (nomeEscola, idAdministrador)
                                            VALUES (?, ?)");
            $stmt->bindParam(1, $escola->getNomeEscola());
            $stmt->bindParam(2, $escola->getIdAdministrador());
            $stmt->execute();
            return 'Cadastro da escola realizado com sucesso!';
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $queryEscola = 'SELECT idEscola, nomeEscola, idAdministrador FROM tbescola';
            $resultadoEscola = $conexao->query($queryEscola);
            $listaEscola = $resultadoEscola->fetchAll(PDO::FETCH_ASSOC);
            return $listaEscola;
        }

    }

?>