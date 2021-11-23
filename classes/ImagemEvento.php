<?php

    include_once("Conexao.php");

    class ImagemEvento{

        private $idImagemEvento;
        private $nomeImagemEvento;
        private $caminhoImagemEvento;
        private $idEvento;

        public function getIdImagemEvento(){
            return $this->idImagemEvento;
        }

        public function setIdImagemEvento($idImagemEvento){
            $this->idImagemEvento = $idImagemEvento;
        }

        public function getNomeImagemEvento(){
            return $this->nomeImagemEvento;
        }

        public function setNomeImagemEvento($nomeImagemEvento){
            $this->nomeImagemEvento = $nomeImagemEvento;
        }

        public function getCaminhoImagemEvento(){
            return $this->caminhoImagemEvento;
        }

        public function setCaminhoImagemEvento($caminhoImagemEvento){
            $this->caminhoImagemEvento = $caminhoImagemEvento;
        }

        public function getIdEvento(){
            return $this->idEvento;
        }

        public function setIdEvento($idEvento){
            $this->idEvento = $idEvento;
        }

        public function cadastrar($imagemEvento){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO tbimagemevento (nomeImagemEvento, caminhoImagemEvento, idEvento)
                                            VALUES (?, ?, ?)");
            $stmt->bindParam(1, $imagemEvento->getNomeImagemEvento());
            $stmt->bindParam(2, $imagemEvento->getCaminhoImagemEvento());
            $stmt->bindParam(3, $imagemEvento->getIdEvento());
            $stmt->execute();
            return 'Cadastro da imagem do evento realizado com sucesso!';
        }

        public function atualizar($imagemEvento){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('UPDATE tbimagemevento SET nomeImagemEvento = ?, caminhoImagemEvento = ?, idEvento = ? WHERE idImagemEvento = ?');
            $stmt->bindParam(1, $imagemEvento->getNomeImagemEvento());
            $stmt->bindParam(2, $imagemEvento->getCaminhoImagemEvento());
            $stmt->bindParam(3, $imagemEvento->getIdEvento());
            $stmt->bindParam(4, $imagemEvento->getIdImagemEvento());
            $stmt->execute();
            return 'Imagem do evento atualizada com sucesso!';
        }

        public function excluir($imagemEvento){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare('DELETE FROM tbimagemevento WHERE idImagemEvento = ?');
            $stmt->bindParam(1, $imagemEvento->getIdImagemEvento());
            $stmt->execute();
            return 'Imagem do evento excluída com sucesso!';
        }

        public function selecionarImagemEvento($idEvento){
            $conexao = Conexao::conectar();
            $queryImagemEvento = "SELECT idImagemEvento, nomeImagemEvento, caminhoImagemEvento, idEvento FROM tbimagemevento WHERE idEvento = '$idEvento'";
            $resultadoImagemEvento = $conexao->query($queryImagemEvento);
            $listaImagemEvento = $resultadoImagemEvento->fetchAll(PDO::FETCH_ASSOC);
            return $listaImagemEvento;
        }

        public function contarLinhasImagemEvento($idEvento){
            $conexao = Conexao::conectar();
            $queryImagemEvento = "SELECT idImagemEvento, nomeImagemEvento, caminhoImagemEvento, idEvento FROM tbimagemevento WHERE idEvento = '$idEvento'";
            $resultadoImagemEvento = $conexao->query($queryImagemEvento);
            $numeroLinhas = $resultadoImagemEvento->rowCount();
            return $numeroLinhas;
        }

    }

?>