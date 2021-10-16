<?php

    include_once('Conexao.php');

    class Turma{

        private $idTurma;
        private $nomeTurma;
        private $idEscola;

        public function getIdTurma(){
            return $this->idTurma;
        }

        public function setIdTurma($idTurma){
            $this->idTurma = $idTurma;
        }

        public function getNomeTurma(){
            return $this->nomeTurma;
        }

        public function setNomeTurma($nomeTurma){
            $this->nomeTurma = $nomeTurma;
        }

        public function getIdEscola(){
            return $this->idEscola;
        }

        public function setIdEscola($idEscola){
            $this->idEscola = $idEscola;
        }

        public function cadastrar($turma){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbturma (nomeTurma, idEscola)
                                            VALUES (?, ?)");
            $stmt->bindParam(1, $turma->getNomeTurma());
            $stmt->bindParam(2, $turma->getIdEscola());
            $stmt->execute();
            return 'Cadastro da turma realizado com sucesso!';
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $queryTurma = 'SELECT idTurma, nomeTurma, idEscola FROM tbturma';
            $resultadoTurma = $conexao->query($queryTurma);
            $listaTurma = $resultadoTurma->fetchAll(PDO::FETCH_ASSOC);
            return $listaTurma;
        }

        public function atualizar($turma){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('UPDATE tbturma SET nomeTurma = ?, idEscola = ? WHERE idTurma = ?');
            $stmt->bindParam(1, $turma->getNomeTurma());
            $stmt->bindParam(2, $turma->getIdEscola());
            $stmt->bindParam(3, $turma->getIdTurma());
            $stmt->execute();
            return 'Turma atualizada com sucesso!';
        }

        public function excluir($turma){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('DELETE FROM tbturma WHERE idTurma = ?');
            $stmt->bindParam(1, $turma->getIdTurma());
            $stmt->execute();
            return 'Turma deletada com sucesso!';
        }

        public function contar($idEscola){
            $conexao = Conexao::conectar();
            $queryTurma = "SELECT COUNT(idTurma) AS 'qtdeTurma' FROM tbturma WHERE idEscola LIKE '$idEscola'";
            $resultadoTurma = $conexao->query($queryTurma);
            $listaTurma = $resultadoTurma->fetchAll(PDO::FETCH_ASSOC);
            return $listaTurma;
        }

        public function contarAlunosTurma($idEscola){
            $conexao = Conexao::conectar();
            $queryTurma = "SELECT tbturma.idTurma, nomeTurma, tbturma.idEscola, COUNT(idAluno) AS 'alunoTurma' FROM tbturma INNER JOIN tbaluno ON tbaluno.idTurma = tbturma.idTurma WHERE tbturma.idEscola = '$idEscola' GROUP BY nomeTurma;";
            $resultadoTurma = $conexao->query($queryTurma);
            $listaTurma = $resultadoTurma->fetchAll(PDO::FETCH_ASSOC);
            return $listaTurma;
        }

        public function selecionarUltimaTurma(){
            $conexao = Conexao::conectar();
            $queryTurma = "SELECT idTurma FROM tbturma WHERE idTurma = (SELECT MAX(idTurma) FROM tbturma)";
            $resultadoTurma = $conexao->query($queryTurma);
            $listaTurma = $resultadoTurma->fetchAll(PDO::FETCH_ASSOC);
            return $listaTurma;
        }

    }

?>