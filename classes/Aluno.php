<?php

    include_once('Conexao.php');

    class Aluno{

        private $idAluno;
        private $nomeAluno;
        private $dataNascAluno;
        private $idTurma;
        private $idEscola;

        public function getIdAluno(){
            return $this->idAluno;
        }

        public function setIdAluno($idAluno){
            $this->idAluno = $idAluno;
        }

        public function getNomeAluno(){
            return $this->nomeAluno;
        }

        public function setNomeAluno($nomeAluno){
            $this->nomeAluno = $nomeAluno;
        }

        public function getDataNascAluno(){
            return $this->dataNascAluno;
        }

        public function setDataNascAluno($dataNascAluno){
            $this->dataNascAluno = $dataNascAluno;
        }

        public function getIdTurma(){
            return $this->idTurma;
        }

        public function setIdTurma($idTurma){
            $this->idTurma = $idTurma;
        }

        public function getIdEscola(){
            return $this->idEscola;
        }

        public function setIdEscola($idEscola){
            $this->idEscola = $idEscola;
        }

        public function cadastrar($aluno){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbaluno (nomeAluno, dataNascAluno, idTurma, idEscola)
                                            VALUES (?, ?, ?, ?)");
            $stmt->bindParam(1, $aluno->getNomeAluno());
            $stmt->bindParam(2, $aluno->getDataNascAluno());
            $stmt->bindParam(3, $aluno->getIdTurma());
            $stmt->bindParam(4, $aluno->getIdEscola());
            $stmt->execute();
            return 'Cadastro do aluno realizado com sucesso!';
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $queryAluno = "SELECT idAluno, nomeAluno, DATE(dataNascAluno) AS 'dataNascAluno', tbaluno.idTurma, tbaluno.idEscola, nomeTurma FROM tbaluno INNER JOIN tbturma ON tbturma.idTurma = tbaluno.idTurma";
            $resultadoAluno = $conexao->query($queryAluno);
            $listaAluno = $resultadoAluno->fetchAll(PDO::FETCH_ASSOC);
            return $listaAluno;
        }

        public function selecionarNomeTurma(){
            $conexao = Conexao::conectar();
            $queryNomeTurma = 'SELECT idAluno, nomeAluno, nomeTurma FROM tbaluno INNER JOIN tbturma ON tbaluno.idTurma = tbturma.idTurma WHERE tbaluno.idTurma = tbturma.idTurma';
            $resutaldoNomeTurma = $conexao->query($queryNomeTurma);
            $listaNomeTurma = $resutaldoNomeTurma->fetchAll(PDO::FETCH_ASSOC);
            return $listaNomeTurma;
        }

        public function atualizar($aluno){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('UPDATE tbaluno SET nomeAluno = ?, dataNascAluno = ?, idTurma = ?, idEscola = ? WHERE idAluno  = ?');
            $stmt->bindParam(1, $aluno->getNomeAluno());
            $stmt->bindParam(2, $aluno->getDataNascAluno());
            $stmt->bindParam(3, $aluno->getIdTurma());
            $stmt->bindParam(4, $aluno->getIdEscola());
            $stmt->bindParam(5, $aluno->getIdAluno());
            $stmt->execute();
            return 'Dados do aluno atualizados com sucesso!';
        }

        public function excluir($aluno){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('DELETE FROM tbaluno WHERE idAluno = ?');
            $stmt->bindParam(1, $aluno->getIdAluno());
            $stmt->execute();
            return 'Aluno excluido com sucesso!';
        }

        public function contar($idEscola){
            $conexao = Conexao::conectar();
            $queryAluno = "SELECT COUNT(idAluno) AS 'qtdeAluno' FROM tbaluno WHERE idEscola LIKE '$idEscola'";
            $resultadoAluno = $conexao->query($queryAluno);
            $listaAluno = $resultadoAluno->fetchAll(PDO::FETCH_ASSOC);
            return $listaAluno;
        }

        public function selecionarUltimoAluno(){
            $conexao = Conexao::conectar();
            $queryAluno = "SELECT idAluno FROM tbaluno WHERE idAluno = (SELECT MAX(idAluno) FROM tbaluno)";
            $resultadoAluno = $conexao->query($queryAluno);
            $listaAluno = $resultadoAluno->fetchAll(PDO::FETCH_ASSOC);
            return $listaAluno;
        }

    }

?>