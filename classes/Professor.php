<?php

    include_once("Conexao.php");

    class Professor{

        private $idProfessor;
        private $nomeProfessor;
        private $emailProfessor;
        private $senhaProfessor;
        private $idEscola;
        private $codNovaSenha;

        public function getIdProfessor(){
            return $this->idProfessor;
        }

        public function setIdProfessor($idProfessor){
            $this->idProfessor = $idProfessor;
        }

        public function getNomeProfessor(){
            return $this->nomeProfessor;
        }

        public function setNomeProfessor($nomeProfessor){
            $this->nomeProfessor = $nomeProfessor;
        }

        public function getEmailProfessor(){
            return $this->emailProfessor;
        }

        public function setEmailProfessor($emailProfessor){
            $this->emailProfessor = $emailProfessor;
        }

        public function getSenhaProfessor(){
            return $this->senhaProfessor;
        }

        public function setSenhaProfessor($senhaProfessor){
            $this->senhaProfessor = $senhaProfessor;
        }

        public function getIdEscola(){
            return $this->idEscola;
        }

        public function setIdEscola($idEscola){
            $this->idEscola = $idEscola;
        }

        public function getCodNovaSenha(){
            return $this->codNovaSenha;
        }

        public function setCodNovaSenha($codNovaSenha){
            $this->codNovaSenha = $codNovaSenha;
        }

        public function cadastrar($professor){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbprofessor (nomeProfessor, emailProfessor, senhaProfessor, idEscola)
                                            VALUES (?, ?, ?, ?)");
            $stmt->bindParam(1, $professor->getNomeProfessor());
            $stmt->bindParam(2, $professor->getEmailProfessor());
            $stmt->bindParam(3, $professor->getSenhaProfessor());
            $stmt->bindParam(4, $professor->getIdEscola());
            $stmt->execute();
            return 'Cadastro do professor realizado com sucesso!';
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $queryProfessor = 'SELECT idProfessor, nomeProfessor, emailProfessor, senhaProfessor, idEscola, codNovaSenha FROM tbprofessor';
            $respostaProfessor = $conexao->query($queryProfessor);
            $listaProfessor = $respostaProfessor->fetchAll(PDO::FETCH_ASSOC);
            return $listaProfessor;
        }

        public function listarEscola($idEscola){
            $conexao = Conexao::conectar();
            $queryProfessor = "SELECT idProfessor, nomeProfessor, emailProfessor, senhaProfessor, idEscola, codNovaSenha FROM tbprofessor WHERE idEscola LIKE '$idEscola'";
            $respostaProfessor = $conexao->query($queryProfessor);
            $listaProfessor = $respostaProfessor->fetchAll(PDO::FETCH_ASSOC);
            return $listaProfessor;
        }

        public function atualizar($professor){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('UPDATE tbprofessor SET nomeProfessor = ?, emailProfessor = ?, senhaProfessor = ?, idEscola = ? WHERE idProfessor = ?');
            $stmt->bindParam(1, $professor->getNomeProfessor());
            $stmt->bindParam(2, $professor->getEmailProfessor());
            $stmt->bindParam(3, $professor->getSenhaProfessor());
            $stmt->bindParam(4, $professor->getIdEscola());
            $stmt->bindParam(5, $professor->getIdProfessor());
            $stmt->execute();
            return 'Dados do professor atualizados com sucesso!';
        }

        public function excluir($professor){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('DELETE FROM tbprofessor WHERE idProfessor = ?');
            $stmt->bindParam(1, $professor->getIdProfessor());
            $stmt->execute();
            return 'Professor excluido com sucesso!';;
        }

        public function contar($idEscola){
            $conexao = Conexao::conectar();
            $queryProfessor = "SELECT COUNT(idProfessor) AS 'qtdeProfessor' FROM tbprofessor WHERE idEscola LIKE '$idEscola'";
            $resultadoProfessor = $conexao->query($queryProfessor);
            $listaProfessor = $resultadoProfessor->fetchAll(PDO::FETCH_ASSOC);
            return $listaProfessor;
        }

        public function selecionarUltimoProfessor(){
            $conexao = Conexao::conectar();
            $queryProfessor = "SELECT idProfessor, nomeProfessor FROM tbprofessor WHERE idProfessor = (SELECT MAX(idProfessor) FROM tbprofessor)";
            $resultadoProfessor = $conexao->query($queryProfessor);
            $listaProfessor = $resultadoProfessor->fetchAll(PDO::FETCH_ASSOC);
            return $listaProfessor;
        }

        public function updateCodSenha($professor){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("UPDATE tbprofessor SET codNovaSenha = ? WHERE idProfessor = ?");
            $stmt->bindParam(1, $professor->getCodNovaSenha());
            $stmt->bindParam(2, $professor->getIdProfessor());
            $stmt->execute();
            return 'Update realizado com sucesso!';
        }

        public function updateSenha($professor){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("UPDATE tbprofessor SET senhaProfessor = ?, codNovaSenha = '' WHERE idProfessor = ?");
            $stmt->bindParam(1, $professor->getSenhaProfessor());
            $stmt->bindParam(2, $professor->getIdProfessor());
            $stmt->execute();
            return 'Update da senha realizado com sucesso!';
        }

    }

?>