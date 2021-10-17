-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 18/09/2021 às 01:04
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdpaicoruja`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbadministrador`
--

CREATE TABLE `tbadministrador` (
  `idAdministrador` int(11) NOT NULL,
  `loginAdministrador` varchar(150) NOT NULL,
  `senhaAdministrador` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tbadministrador`
--

INSERT INTO `tbadministrador` (`idAdministrador`, `loginAdministrador`, `senhaAdministrador`) VALUES
(1, 'adm.bifrost.paicoruja@gmail.com', 'aa0754437f2c96d0b64bb9710bbb3c62');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbaluno`
--

CREATE TABLE `tbaluno` (
  `idAluno` int(11) NOT NULL,
  `nomeAluno` varchar(50) NOT NULL,
  `dataNascAluno` datetime NOT NULL,
  `idTurma` int(11) DEFAULT NULL,
  `idEscola` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdisciplina`
--

CREATE TABLE `tbdisciplina` (
  `idDisciplina` int(11) NOT NULL,
  `nomeDisciplina` varchar(80) NOT NULL,
  `idProfessor` int(11) DEFAULT NULL,
  `idEscola` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbenderecoresponsavel`
--

CREATE TABLE `tbenderecoresponsavel` (
  `idEnderecoResponsavel` int(11) NOT NULL,
  `logradouroEnderecoResponsavel` varchar(150) NOT NULL,
  `numCasaEnderecoResponsavel` varchar(8) NOT NULL,
  `complementoEnderecoResponsavel` varchar(18) DEFAULT NULL,
  `cepEnderecoResponsavel` varchar(9) NOT NULL,
  `bairroEnderecoResponsavel` varchar(80) NOT NULL,
  `cidadeEnderecoResponsavel` varchar(100) NOT NULL,
  `idResponsavel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbescola`
--

CREATE TABLE `tbescola` (
  `idEscola` int(11) NOT NULL,
  `nomeEscola` varchar(200) NOT NULL,
  `idAdministrador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbevento`
--

CREATE TABLE `tbevento` (
  `idEvento` int(11) NOT NULL,
  `tituloEvento` varchar(80) NOT NULL,
  `descEvento` varchar(500) NOT NULL,
  `dataEvento` datetime NOT NULL,
  `idSecretaria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbhorarioturma`
--

CREATE TABLE `tbhorarioturma` (
  `idHorarioTurma` int(11) NOT NULL,
  `diaSemana` varchar(13) NOT NULL,
  `idTurma` int(11) DEFAULT NULL,
  `idDisciplina` int(11) DEFAULT NULL,
  `idEscola` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbimagemevento`
--

CREATE TABLE `tbimagemevento` (
  `idImagemEvento` int(11) NOT NULL,
  `nomeImagemEvento` varchar(150) DEFAULT NULL,
  `caminhoImagemEvento` varchar(250) DEFAULT NULL,
  `idEvento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbimagemperfilprofessor`
--

CREATE TABLE `tbimagemperfilprofessor` (
  `idImagemPerfilProfessor` int(11) NOT NULL,
  `nomeImagemPerfilProfessor` varchar(150) DEFAULT NULL,
  `caminhoImagemPerfilProfessor` varchar(250) DEFAULT NULL,
  `idProfessor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbimagemperfilsecretaria`

CREATE TABLE `tbimagemperfilsecretaria` (
  `idImagemPerfilSecretaria` int(11) NOT NULL,
  `nomeImagemPerfilSecretaria` varchar(150) DEFAULT NULL,
  `caminhoImagemPerfilSecretaria` varchar(250) DEFAULT NULL,
  `idSecretaria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbimagemperfilresponsavel`
--

CREATE TABLE `tbimagemperfilresponsavel` (
  `idImagemPerfilResponsavel` int(11) NOT NULL,
  `nomeImagemPerfilResponsavel` varchar(150) NOT NULL,
  `caminhoImagemPerfilResponsavel` varchar(250) NOT NULL,
  `idResponsavel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbobservacao`
--

CREATE TABLE `tbobservacao` (
  `idObservacao` int(11) NOT NULL,
  `qtdePontosObservacao` int(11) NOT NULL,
  `descObservacao` varchar(500) NOT NULL,
  `idProfessor` int(11) DEFAULT NULL,
  `idAluno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbprofessor`
--

CREATE TABLE `tbprofessor` (
  `idProfessor` int(11) NOT NULL,
  `nomeProfessor` varchar(50) NOT NULL,
  `emailProfessor` varchar(150) NOT NULL,
  `senhaProfessor` varchar(150) NOT NULL,
  `idEscola` int(11) DEFAULT NULL,
  `codNovaSenha` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbpublicacao`
--

CREATE TABLE `tbpublicacao` (
  `idPublicacao` int(11) NOT NULL,
  `tituloPublicacao` varchar(80) NOT NULL,
  `descPublicacao` varchar(500) NOT NULL,
  `idProfessor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbresponsavel`
--

CREATE TABLE `tbresponsavel` (
  `idResponsavel` int(11) NOT NULL,
  `nomeResponsavel` varchar(50) NOT NULL,
  `cpfResponsavel` char(14) NOT NULL,
  `emailResponsavel` varchar(150) NOT NULL,
  `senhaResponsavel` varchar(150) NOT NULL,
  `idAluno` int(11) DEFAULT NULL,
  `codNovaSenha` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbsecretaria`
--

CREATE TABLE `tbsecretaria` (
  `idSecretaria` int(11) NOT NULL,
  `nomeSecretaria` varchar(50) NOT NULL,
  `emailSecretaria` varchar(150) NOT NULL,
  `senhaSecretaria` varchar(150) NOT NULL,
  `idEscola` int(11) DEFAULT NULL,
  `idAdministrador` int(11) DEFAULT NULL,
  `codNovaSenha` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtelefoneresponsavel`
--

CREATE TABLE `tbtelefoneresponsavel` (
  `idTelefoneResponsavel` int(11) NOT NULL,
  `numTelefoneResponsavel` varchar(16) NOT NULL,
  `idResponsavel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbturma`
--

CREATE TABLE `tbturma` (
  `idTurma` int(11) NOT NULL,
  `nomeTurma` varchar(50) NOT NULL,
  `idEscola` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idUsuario` int(11) NOT NULL,
  `idProfessor` int(11) DEFAULT NULL,
  `idResponsavel` int(11) DEFAULT NULL,
  `idSecretaria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tborigemmensagem`
--

CREATE TABLE `tborigemmensagem` (
  `idOrigemMensagem` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdestinomensagem`
--

CREATE TABLE `tbdestinomensagem` (
  `idDestinoMensagem` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbmensagem`
--

CREATE TABLE `tbmensagem` (
  `idMensagem` int(11) NOT NULL,
  `textoMensagem` varchar(500) NOT NULL,
  `dataMensagem` datetime NOT NULL,
  `idOrigemMensagem` int(11) DEFAULT NULL,
  `idDestinoMensagem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tbadministrador`
--
ALTER TABLE `tbadministrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Índices de tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD PRIMARY KEY (`idAluno`),
  ADD KEY `fk_aluno_turma` (`idTurma`),
  ADD KEY `fk_aluno_escola` (`idEscola`);

--
-- Índices de tabela `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
  ADD PRIMARY KEY (`idDisciplina`),
  ADD KEY `fk_disciplina_professor` (`idProfessor`),
  ADD KEY `fk_disciplina_escola` (`idEscola`);

--
-- Índices de tabela `tbenderecoresponsavel`
--
ALTER TABLE `tbenderecoresponsavel`
  ADD PRIMARY KEY (`idEnderecoResponsavel`),
  ADD KEY `fk_endereco_responsavel` (`idResponsavel`);

--
-- Índices de tabela `tbescola`
--
ALTER TABLE `tbescola`
  ADD PRIMARY KEY (`idEscola`),
  ADD KEY `fk_escola_administrador` (`idAdministrador`);

--
-- Índices de tabela `tbevento`
--
ALTER TABLE `tbevento`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `fk_evento_secretaria` (`idSecretaria`);

--
-- Índices de tabela `tbhorarioturma`
--
ALTER TABLE `tbhorarioturma`
  ADD PRIMARY KEY (`idHorarioTurma`),
  ADD KEY `fk_horario_turma` (`idTurma`),
  ADD KEY `fk_horario_disciplina` (`idDisciplina`),
  ADD KEY `fk_horario_escola` (`idEscola`);

--
-- Índices de tabela `tbimagemevento`
--
ALTER TABLE `tbimagemevento`
  ADD PRIMARY KEY (`idImagemEvento`),
  ADD KEY `fk_imagemEvento_evento` (`idEvento`);

--
-- Índices de tabela `tbimagemperfilprofessor`
--
ALTER TABLE `tbimagemperfilprofessor`
  ADD PRIMARY KEY (`idImagemPerfilProfessor`),
  ADD KEY `fk_imagemPerfilProfessor_professor` (`idProfessor`);

--
-- Índices de tabela `tbimagemperfilsecretaria`
--
ALTER TABLE `tbimagemperfilsecretaria`
  ADD PRIMARY KEY (`idImagemPerfilSecretaria`),
  ADD KEY `fk_imagemPerfilSecretaria_secretaria` (`idSecretaria`);

--
-- Índices de tabela `tbimagemperfilresponsavel`
--
ALTER TABLE `tbimagemperfilresponsavel`
  ADD PRIMARY KEY (`idImagemPerfilResponsavel`),
  ADD KEY `fk_imagemPerfilResponsavel_responsavel` (`idResponsavel`);

--
-- Índices de tabela `tbobservacao`
--
ALTER TABLE `tbobservacao`
  ADD PRIMARY KEY (`idObservacao`),
  ADD KEY `fk_observacao_aluno` (`idAluno`),
  ADD KEY `fk_observacao_professor` (`idProfessor`);

--
-- Índices de tabela `tbprofessor`
--
ALTER TABLE `tbprofessor`
  ADD PRIMARY KEY (`idProfessor`),
  ADD KEY `fk_professor_escola` (`idEscola`);

--
-- Índices de tabela `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  ADD PRIMARY KEY (`idPublicacao`),
  ADD KEY `fk_publicacao_professor` (`idProfessor`);

--
-- Índices de tabela `tbresponsavel`
--
ALTER TABLE `tbresponsavel`
  ADD PRIMARY KEY (`idResponsavel`),
  ADD KEY `fk_responsavel_aluno` (`idAluno`);

--
-- Índices de tabela `tbsecretaria`
--
ALTER TABLE `tbsecretaria`
  ADD PRIMARY KEY (`idSecretaria`),
  ADD KEY `fk_secretaria_escola` (`idEscola`),
  ADD KEY `fk_secretaria_administrador` (`idAdministrador`);

--
-- Índices de tabela `tbtelefoneresponsavel`
--
ALTER TABLE `tbtelefoneresponsavel`
  ADD PRIMARY KEY (`idTelefoneResponsavel`),
  ADD KEY `fk_telefoneResponsavel_responsavel` (`idResponsavel`);

--
-- Índices de tabela `tbturma`
--
ALTER TABLE `tbturma`
  ADD PRIMARY KEY (`idTurma`),
  ADD KEY `fk_turma_escola` (`idEscola`);

--
-- Índices de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_usuario_professor` (`idProfessor`),
  ADD KEY `fk_usuario_responsavel` (`idResponsavel`),
  ADD KEY `fk_usuario_secretaria` (`idSecretaria`);

--
-- Índices de tabela `tborigemmensagem`
--
ALTER TABLE `tborigemmensagem`
  ADD PRIMARY KEY (`idOrigemMensagem`),
  ADD KEY `fk_origemMensagem_usuario` (`idUsuario`);

--
-- Índices de tabela `tbdestinomensagem`
--
ALTER TABLE `tbdestinomensagem`
  ADD PRIMARY KEY (`idDestinoMensagem`),
  ADD KEY `fk_destinoMensagem_usuario` (`idUsuario`);

--
-- Índices de tabela `tbmensagem`
--
ALTER TABLE `tbmensagem`
  ADD PRIMARY KEY (`idMensagem`),
  ADD KEY `fk_mensagem_origemMensagem` (`idOrigemMensagem`),
  ADD KEY `fk_mensagem_destinoMensagem` (`idDestinoMensagem`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tbadministrador`
--
ALTER TABLE `tbadministrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbenderecoresponsavel`
--
ALTER TABLE `tbenderecoresponsavel`
  MODIFY `idEnderecoResponsavel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbescola`
--
ALTER TABLE `tbescola`
  MODIFY `idEscola` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbevento`
--
ALTER TABLE `tbevento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbhorarioturma`
--
ALTER TABLE `tbhorarioturma`
  MODIFY `idHorarioTurma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbimagemevento`
--
ALTER TABLE `tbimagemevento`
  MODIFY `idImagemEvento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbimagemperfilprofessor`
--
ALTER TABLE `tbimagemperfilprofessor`
  MODIFY `idImagemPerfilProfessor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbimagemperfilsecretaria`
--
ALTER TABLE `tbimagemperfilsecretaria`
  MODIFY `idImagemPerfilSecretaria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbimagemperfilresponsavel`
--
ALTER TABLE `tbimagemperfilresponsavel`
  MODIFY `idImagemPerfilResponsavel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbobservacao`
--
ALTER TABLE `tbobservacao`
  MODIFY `idObservacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbprofessor`
--
ALTER TABLE `tbprofessor`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  MODIFY `idPublicacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbresponsavel`
--
ALTER TABLE `tbresponsavel`
  MODIFY `idResponsavel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbsecretaria`
--
ALTER TABLE `tbsecretaria`
  MODIFY `idSecretaria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtelefoneresponsavel`
--
ALTER TABLE `tbtelefoneresponsavel`
  MODIFY `idTelefoneResponsavel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbturma`
--
ALTER TABLE `tbturma`
  MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tborigemmensagem`
--
ALTER TABLE `tborigemmensagem`
  MODIFY `idOrigemMensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbdestinomensagem`
--
ALTER TABLE `tbdestinomensagem`
  MODIFY `idDestinoMensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbmensagem`
--
ALTER TABLE `tbmensagem`
  MODIFY `idMensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD CONSTRAINT `fk_aluno_escola` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`),
  ADD CONSTRAINT `fk_aluno_turma` FOREIGN KEY (`idTurma`) REFERENCES `tbturma` (`idTurma`);

--
-- Restrições para tabelas `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
  ADD CONSTRAINT `fk_disciplina_escola` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`),
  ADD CONSTRAINT `fk_disciplina_professor` FOREIGN KEY (`idProfessor`) REFERENCES `tbprofessor` (`idProfessor`);

--
-- Restrições para tabelas `tbenderecoresponsavel`
--
ALTER TABLE `tbenderecoresponsavel`
  ADD CONSTRAINT `fk_endereco_responsavel` FOREIGN KEY (`idResponsavel`) REFERENCES `tbresponsavel` (`idResponsavel`);

--
-- Restrições para tabelas `tbescola`
--
ALTER TABLE `tbescola`
  ADD CONSTRAINT `fk_escola_administrador` FOREIGN KEY (`idAdministrador`) REFERENCES `tbadministrador` (`idAdministrador`);

--
-- Restrições para tabelas `tbevento`
--
ALTER TABLE `tbevento`
  ADD CONSTRAINT `fk_evento_secretaria` FOREIGN KEY (`idSecretaria`) REFERENCES `tbsecretaria` (`idSecretaria`);

--
-- Restrições para tabelas `tbhorarioturma`
--
ALTER TABLE `tbhorarioturma`
  ADD CONSTRAINT `fk_horario_disciplina` FOREIGN KEY (`idDisciplina`) REFERENCES `tbdisciplina` (`idDisciplina`),
  ADD CONSTRAINT `fk_horario_escola` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`),
  ADD CONSTRAINT `fk_horario_turma` FOREIGN KEY (`idTurma`) REFERENCES `tbturma` (`idTurma`);

--
-- Restrições para tabelas `tbimagemevento`
--
ALTER TABLE `tbimagemevento`
  ADD CONSTRAINT `fk_imagemEvento_evento` FOREIGN KEY (`idEvento`) REFERENCES `tbevento` (`idEvento`);

--
-- Restrições para tabelas `tbimagemperfilprofessor`
--
ALTER TABLE `tbimagemperfilprofessor`
  ADD CONSTRAINT `fk_imagemPerfilProfessor_professor` FOREIGN KEY (`idProfessor`) REFERENCES `tbprofessor` (`idProfessor`);

--
-- Restrições para tabelas `tbimagemperfilsecretaria`
--
ALTER TABLE `tbimagemperfilsecretaria`
  ADD CONSTRAINT `fk_imagemPerfilSecretaria_secretaria` FOREIGN KEY (`idSecretaria`) REFERENCES `tbsecretaria` (`idSecretaria`);

--
-- Restrições para tabelas `tbimagemperfilresponsavel`
--
ALTER TABLE `tbimagemperfilresponsavel`
  ADD CONSTRAINT `fk_imagemPerfilResponsavel_responsavel` FOREIGN KEY (`idResponsavel`) REFERENCES `tbresponsavel` (`idResponsavel`);

--
-- Restrições para tabelas `tbobservacao`
--
ALTER TABLE `tbobservacao`
  ADD CONSTRAINT `fk_observacao_aluno` FOREIGN KEY (`idAluno`) REFERENCES `tbaluno` (`idAluno`),
  ADD CONSTRAINT `fk_observacao_professor` FOREIGN KEY (`idProfessor`) REFERENCES `tbprofessor` (`idProfessor`);

--
-- Restrições para tabelas `tbprofessor`
--
ALTER TABLE `tbprofessor`
  ADD CONSTRAINT `fk_professor_escola` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`);

--
-- Restrições para tabelas `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  ADD CONSTRAINT `fk_publicacao_professor` FOREIGN KEY (`idProfessor`) REFERENCES `tbprofessor` (`idProfessor`);

--
-- Restrições para tabelas `tbresponsavel`
--
ALTER TABLE `tbresponsavel`
  ADD CONSTRAINT `fk_responsavel_aluno` FOREIGN KEY (`idAluno`) REFERENCES `tbaluno` (`idAluno`);

--
-- Restrições para tabelas `tbsecretaria`
--
ALTER TABLE `tbsecretaria`
  ADD CONSTRAINT `fk_secretaria_administrador` FOREIGN KEY (`idAdministrador`) REFERENCES `tbadministrador` (`idAdministrador`),
  ADD CONSTRAINT `fk_secretaria_escola` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`);

--
-- Restrições para tabelas `tbtelefoneresponsavel`
--
ALTER TABLE `tbtelefoneresponsavel`
  ADD CONSTRAINT `fk_telefoneResponsavel_responsavel` FOREIGN KEY (`idResponsavel`) REFERENCES `tbresponsavel` (`idResponsavel`);

--
-- Restrições para tabelas `tbturma`
--
ALTER TABLE `tbturma`
  ADD CONSTRAINT `fk_turma_escola` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`);

--
-- Restrições para tabelas `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD CONSTRAINT `fk_usuario_professor` FOREIGN KEY (`idProfessor`) REFERENCES `tbprofessor` (`idProfessor`),
  ADD CONSTRAINT `fk_usuario_responsavel` FOREIGN KEY (`idResponsavel`) REFERENCES `tbresponsavel` (`idResponsavel`),
  ADD CONSTRAINT `fk_usuario_secretaria` FOREIGN KEY (`idSecretaria`) REFERENCES `tbsecretaria` (`idSecretaria`);

--
-- Restições para tabelas `tborigemmensagem`
--
ALTER TABLE `tborigemmensagem`
  ADD CONSTRAINT `fk_origemMensagem_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Restrições para tabelas `tbdestinomensagem`
--
ALTER TABLE `tbdestinomensagem`
  ADD CONSTRAINT `fk_destinoMensagem_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

ALTER TABLE `tbmensagem`
  ADD CONSTRAINT `fk_mensagem_origemMensagem` FOREIGN KEY (`idOrigemMensagem`) REFERENCES `tborigemmensagem` (`idOrigemMensagem`),
  ADD CONSTRAINT `fk_mensagem_destinoMensagem` FOREIGN KEY (`idDestinoMensagem`) REFERENCES `tbdestinomensagem` (`idDestinoMensagem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
