<?php

    include_once('Conexao.php');

    class Responsavel{

        private $idResponsavel;
        private $nomeResponsavel;
        private $cpfResponsavel;
        private $emailResponsavel;
        private $senhaResponsavel;
        private $idAluno;
        private $codNovaSenha;

        public function getIdResponsavel(){
            return $this->idResponsavel;
        }

        public function setIdResponsavel($idResponsavel){
            $this->idResponsavel = $idResponsavel;
        }

        public function getNomeResponsavel(){
            return $this->nomeResponsavel;
        }

        public function setNomeResponsavel($nomeResponsavel){
            $this->nomeResponsavel = $nomeResponsavel;
        }

        public function getCpfResponsavel(){
            return $this->cpfResponsavel;
        }

        public function setCpfResponsavel($cpfResponsavel){
            $this->cpfResponsavel = $cpfResponsavel;
        }

        public function getEmailResponsavel(){
            return $this->emailResponsavel;
        }

        public function setEmailResponsavel($emailResponsavel){
            $this->emailResponsavel = $emailResponsavel;
        }

        public function getSenhaResponsavel(){
            return $this->senhaResponsavel;
        }

        public function setSenhaResponsavel($senhaResponsavel){
            $this->senhaResponsavel = $senhaResponsavel;
        }

        public function getIdAluno(){
            return $this->idAluno;
        }

        public function setIdAluno($idAluno){
            $this->idAluno = $idAluno;
        }

        public function getCodNovaSenha(){
            return $this->codNovaSenha;
        }

        public function setCodNovaSenha($codNovaSenha){
            $this->codNovaSenha = $codNovaSenha;
        }

        public function cadastrar($responsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbresponsavel (nomeResponsavel, cpfResponsavel, emailResponsavel, senhaResponsavel, idAluno)
                                            VALUES (?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $responsavel->getNomeResponsavel());
            $stmt->bindParam(2, $responsavel->getCpfResponsavel());
            $stmt->bindParam(3, $responsavel->getEmailResponsavel());
            $stmt->bindParam(4, $responsavel->getSenhaResponsavel());
            $stmt->bindParam(5, $responsavel->getIdAluno());
            $stmt->execute();
            return 'Cadastro do responsável realizado com sucesso!';
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $queryResponsavel = "SELECT idResponsavel, nomeResponsavel, cpfResponsavel, emailResponsavel, senhaResponsavel, idAluno, codNovaSenha FROM tbresponsavel";
            $resultadoResponsavel = $conexao->query($queryResponsavel);
            $listaResponsavel = $resultadoResponsavel->fetchAll(PDO::FETCH_ASSOC);
            return $listaResponsavel;
        }

        public function atualizar($responsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('UPDATE tbresponsavel SET nomeResponsavel = ?, cpfResponsavel = ?, emailResponsavel = ?, senhaResponsavel = ?, idAluno = ? WHERE idResponsavel = ?');
            $stmt->bindParam(1, $responsavel->getNomeResponsavel());
            $stmt->bindParam(2, $responsavel->getCpfResponsavel());
            $stmt->bindParam(3, $responsavel->getEmailResponsavel());
            $stmt->bindParam(4, $responsavel->getSenhaResponsavel());
            $stmt->bindParam(5, $responsavel->getIdAluno());
            $stmt->bindParam(6, $responsavel->getIdResponsavel());
            $stmt->execute();
            return 'Dados do responsável atualizados com sucesso!';
        }

        public function excluir($responsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('DELETE FROM tbresponsavel WHERE idResponsavel = ?');
            $stmt->bindParam(1, $responsavel->getIdResponsavel());
            $stmt->execute();
            return 'Responsável excluido com sucesso!';
        }

        public function selecionarUltimoResponsavel(){
            $conexao = Conexao::conectar();
            $queryResponsavel = "SELECT idResponsavel FROM tbresponsavel WHERE idResponsavel = (SELECT MAX(idResponsavel) FROM tbResponsavel)";
            $resultadoResponsavel = $conexao->query($queryResponsavel);
            $listaResponsavel = $resultadoResponsavel->fetchAll(PDO::FETCH_ASSOC);
            return $listaResponsavel;
        }

        public function updateCodSenha($responsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("UPDATE tbresponsavel SET codNovaSenha = ? WHERE idResponsavel = ?");
            $stmt->bindParam(1, $responsavel->getCodNovaSenha());
            $stmt->bindParam(2, $responsavel->getIdResponsavel());
            $stmt->execute();
            return 'Update realizado com sucesso!';
        }

        public function updateSenha($responsavel){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("UPDATE tbresponsavel SET senhaResponsavel = ?, codNovaSenha = '' WHERE idResponsavel = ?");
            $stmt->bindParam(1, $responsavel->getSenhaResponsavel());
            $stmt->bindParam(2, $responsavel->getIdResponsavel());
            $stmt->execute();
            return 'Update da senha realizado com sucesso!';
        }

    }

?>