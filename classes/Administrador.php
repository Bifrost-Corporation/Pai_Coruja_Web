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

        public function contarEscolas(){
            $conexao = Conexao::conectar();
            $queryAdm = "SELECT COUNT(idEscola) AS 'qtdeEscolas' FROM tbescola";
            $resultadoAdm = $conexao->query($queryAdm);
            $listaAdm = $resultadoAdm->fetchAll(PDO::FETCH_ASSOC);
            return $listaAdm;
        }

        public function contarAlunos(){
            $conexao = Conexao::conectar();
            $queryAdm = "SELECT COUNT(idAluno) AS 'qtdeAlunos' FROM tbaluno";
            $resultadoAdm = $conexao->query($queryAdm);
            $listaAdm = $resultadoAdm->fetchAll(PDO::FETCH_ASSOC);
            return $listaAdm;
        }

        public function contarResponsaveis(){
            $conexao = Conexao::conectar();
            $queryAdm = "SELECT COUNT(idResponsavel) AS 'qtdeResponsaveis' FROM tbresponsavel";
            $resultadoAdm = $conexao->query($queryAdm);
            $listaAdm = $resultadoAdm->fetchAll(PDO::FETCH_ASSOC);
            return $listaAdm;
        }

        public function contarProfessores(){
            $conexao = Conexao::conectar();
            $queryAdm = "SELECT COUNT(idProfessor) AS 'qtdeProfessores' FROM tbprofessor";
            $resultadoAdm = $conexao->query($queryAdm);
            $listaAdm = $resultadoAdm->fetchAll(PDO::FETCH_ASSOC);
            return $listaAdm;
        }

        public function mediaAlunoEscola(){
            $conexao = Conexao::conectar();
            $queryAdm = "SELECT (SELECT COUNT(tbaluno.idAluno) FROM tbaluno) / (SELECT COUNT(tbescola.idEscola) FROM tbescola) AS 'mediaAlunoEscola' FROM tbescola";
            $resultadoAdm = $conexao->query($queryAdm);
            $listaAdm = $resultadoAdm->fetchAll(PDO::FETCH_ASSOC);
            return $listaAdm;
        }

        public function mediaTurmaEscola(){
            $conexao = Conexao::conectar();
            $queryAdm = "SELECT (SELECT COUNT(tbturma.idTurma) FROM tbturma)  / (SELECT COUNT(tbescola.idEscola) FROM tbescola) AS 'mediaTurmaEscola'";
            $resultadoAdm = $conexao->query($queryAdm);
            $listaAdm = $resultadoAdm->fetchAll(PDO::FETCH_ASSOC);
            return $listaAdm;
        }

    }

?>