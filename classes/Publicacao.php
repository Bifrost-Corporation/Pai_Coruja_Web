<?php

    class Publicacao{

        private $idPublicacao;
        private $tituloPublicacao;
        private $descPublicacao;
        private $idProfessor;
        private $idSecretaria;

        public function getIdPublicacao(){
            return $this->idPublicacao;
        }

        public function setIdPublicacao($idPublicacao){
            $this->idPublicacao = $idPublicacao;
        }

        public function getTituloPublicacao(){
            return $this->tituloPublicacao;
        }

        public function setTituloPublicacao($tituloPublicacao){
            $this->tituloPublicacao = $tituloPublicacao;
        }

        public function getDescPublicacao(){
            return $this->descPublicacao;
        }

        public function setDescPublicacao($descPublicacao){
            $this->descPublicacao = $descPublicacao;
        }

        public function getIdProfessor(){
            return $this->idProfessor;
        }

        public function setIdProfessor($idProfessor){
            $this->idProfessor = $idProfessor;
        }

        public function getIdSecretaria(){
            return $this->idSecretaria;
        }

        public function setIdSecretaria($idSecretaria){
            $this->idSecretaria = $idSecretaria;
        }

        public function cadastrar($publicaco){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbpublicacao (tituloPublicacao, descPublicacao, idProfessor, idSecretaria)
                                            VALUES (?, ?, ?, ?)");
            $stmt->bindParam(1, $publicaco->getTituloPublicacao());
            $stmt->bindParam(2, $publicaco->getDescPublicacao());
            $stmt->bindParam(3, $publicaco->getIdProfessor());
            $stmt->bindParam(4, $publicaco->getIdSecretaria());
            $stmt->execute();
            return 'Cadastro da publicação realizado com sucesso!';
        }

        public function atualizar($publicaco){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('UPDATE tbpublicacao SET tituloPublicacao = ?, descPublicacao = ?, idProfessor = ?, idSecretaria = ? WHERE idPublicacao = ?');
            $stmt->bindParam(1, $publicaco->getTituloPublicacao());
            $stmt->bindParam(2, $publicaco->getDescPublicacao());
            $stmt->bindParam(3, $publicaco->getIdProfessor());
            $stmt->bindParam(4, $publicaco->getIdSecretaria());
            $stmt->bindParam(5, $publicaco->getIdPublicacao());
            $stmt->execute();
            return 'Publicação atualizada com sucesso!';
        }

        public function excluir($publicaco){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('DELETE FROM tbpublicacao WHERE idPublicacao = ?');
            $stmt->bindParam(1, $publicaco->getIdPublicacao());
            $stmt->execute();
            return 'Publicação excluida com sucesso!';
        }

        public function listarPublicacoes($idAluno, $idEscola){
            $conexao = Conexao::conectar();
            $queryPublicacao = "SELECT idPublicacao, tituloPublicacao, descPublicacao, tbprofessor.idProfessor FROM tbpublicacao INNER JOIN tbprofessor ON tbprofessor.idProfessor = tbpublicacao.idProfessor INNER JOIN tbdisciplina ON tbdisciplina.idProfessor = tbprofessor.idProfessor INNER JOIN tbhorarioturma ON tbhorarioturma.idDisciplina = tbdisciplina.idDisciplina INNER JOIN tbturma ON tbturma.idTurma = tbhorarioturma.idTurma INNER JOIN tbaluno ON tbaluno.idTurma = tbturma.idTurma WHERE tbaluno.idAluno = '$idAluno' UNION SELECT idPublicacao, tituloPublicacao, descPublicacao, tbsecretaria.idSecretaria FROM tbpublicacao INNER JOIN tbsecretaria ON tbsecretaria.idSecretaria = tbpublicacao.idSecretaria WHERE tbsecretaria.idEscola = '$idEscola'";
            $resultadoPublicacao = $conexao->query($queryPublicacao);
            $listaPublicacao = $resultadoPublicacao->fetchAll(PDO::FETCH_ASSOC);
            return $listaPublicacao;
        }

    }

?>