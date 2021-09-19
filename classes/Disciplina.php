<?php

    include_once('Conexao.php');

    class Disciplina{
        
        private $idDisciplina;
        private $nomeDisciplina;
        private $idProfessor;
        private $idEscola;

        public function getIdDisciplina(){
            return $this->idDisciplina;
        }

        public function setIdDisciplina($idDisciplina){
            $this->idDisciplina = $idDisciplina;
        }

        public function getNomeDisciplina(){
            return $this->nomeDisciplina;
        }

        public function setNomeDisciplina($nomeDisciplina){
            $this->nomeDisciplina = $nomeDisciplina;
        }

        public function getIdProfessor(){
            return $this->idProfessor;
        }

        public function setIdProfessor($idProfessor){
            $this->idProfessor = $idProfessor;
        }

        public function getIdEscola(){
            return $this->idEscola;
        }

        public function setIdEscola($idEscola){
            $this->idEscola = $idEscola;
        }

        public function cadastrar($disciplina){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('INSERT INTO tbdisciplina (nomeDisciplina, idProfessor, idEscola)
                                            VALUES (?, ?, ?)');
            $stmt->bindParam(1, $disciplina->getNomeDisciplina());
            $stmt->bindParam(2, $disciplina->getIdProfessor());
            $stmt->bindParam(3, $disciplina->getIdEscola());
            $stmt->execute();
            return 'Cadastro da disciplina realizado com sucesso!';
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $queryDisciplina = 'SELECT idDisciplina, nomeDisciplina, tbdisciplina.idProfessor, tbdisciplina.idEscola, tbprofessor.nomeProfessor FROM tbdisciplina INNER JOIN tbprofessor ON tbprofessor.idProfessor = tbdisciplina.idProfessor';
            $resultadoDisciplina = $conexao->query($queryDisciplina);
            $listaDisciplina = $resultadoDisciplina->fetchAll(PDO::FETCH_ASSOC);
            return $listaDisciplina;
        }

        public function atualizar($disciplina){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('UPDATE tbdisciplina SET nomeDisciplina = ?, idProfessor = ?, idEscola = ? WHERE idDisciplina = ?');
            $stmt->bindParam(1, $disciplina->getNomeDisciplina());
            $stmt->bindParam(2, $disciplina->getIdProfessor());
            $stmt->bindParam(3, $disciplina->getIdEscola());
            $stmt->bindParam(4, $disciplina->getIdDisciplina());
            $stmt->execute();
            return 'Dados da disciplina atualizados com sucesso!';
        }

        public function excluir($disciplina){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('DELETE FROM tbdisciplina WHERE idDisciplina = ?');
            $stmt->bindParam(1, $disciplina->getIdDisciplina());
            $stmt->execute();
            return 'Disciplina excluida com sucesso!';
        }

        public function contar($idEscola){
            $conexao = Conexao::conectar();
            $queryDisciplina = "SELECT COUNT(idDisciplina) AS 'qtdeDisciplina' FROM tbdisciplina INNER JOIN tbprofessor ON tbprofessor.idProfessor = tbdisciplina.idProfessor WHERE tbprofessor.idEscola LIKE '$idEscola'";
            $resultadoDisciplina = $conexao->query($queryDisciplina);
            $listaDisciplina = $resultadoDisciplina->fetchAll(PDO::FETCH_ASSOC);
            return $listaDisciplina;
        }

    }

?>