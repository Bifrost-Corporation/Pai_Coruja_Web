-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 01, 2021 at 11:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdpaicoruja`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadministrador`
--

CREATE TABLE `tbadministrador` (
  `idAdministrador` int(11) NOT NULL,
  `loginAdministrador` varchar(150) NOT NULL,
  `senhaAdministrador` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbadministrador`
--

INSERT INTO `tbadministrador` (`idAdministrador`, `loginAdministrador`, `senhaAdministrador`) VALUES
(1, 'adm.bifrost.paicoruja@gmail.com', 'dcdadogdkpmprdvd');

-- --------------------------------------------------------

--
-- Table structure for table `tbaluno`
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
-- Table structure for table `tbdisciplina`
--

CREATE TABLE `tbdisciplina` (
  `idDisciplina` int(11) NOT NULL,
  `nomeDisciplina` varchar(80) NOT NULL,
  `idProfessor` int(11) DEFAULT NULL,
  `idEscola` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbenderecoresponsavel`
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
-- Table structure for table `tbescola`
--

CREATE TABLE `tbescola` (
  `idEscola` int(11) NOT NULL,
  `nomeEscola` varchar(200) NOT NULL,
  `idAdministrador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbescola`
--

INSERT INTO `tbescola` (`idEscola`, `nomeEscola`, `idAdministrador`) VALUES
(1, 'Etec de Guaianazes', 1),
(2, 'EMEF Profª Clotilde Rosa Henriques Elias', 1),
(3, 'Escola Estadual Jardim Pedra Branca', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbevento`
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
-- Table structure for table `tbhorarioturma`
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
-- Table structure for table `tbimagemevento`
--

CREATE TABLE `tbimagemevento` (
  `idImagemEvento` int(11) NOT NULL,
  `nomeImagemEvento` varchar(150) DEFAULT NULL,
  `caminhoImagemEvento` varchar(250) DEFAULT NULL,
  `idEvento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbimagemperfilprofessor`
--

CREATE TABLE `tbimagemperfilprofessor` (
  `idImagemPerfilProfessor` int(11) NOT NULL,
  `nomeImagemPerfilProfessor` varchar(150) DEFAULT NULL,
  `caminhoImagemPerfilProfessor` varchar(250) DEFAULT NULL,
  `idProfessor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbimagemperfilresponsavel`
--

CREATE TABLE `tbimagemperfilresponsavel` (
  `idImagemPerfilResponsavel` int(11) NOT NULL,
  `nomeImagemPerfilResponsavel` varchar(150) NOT NULL,
  `caminhoImagemPerfilResponsavel` varchar(250) NOT NULL,
  `idResponsavel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbobservacao`
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
-- Table structure for table `tbprofessor`
--

CREATE TABLE `tbprofessor` (
  `idProfessor` int(11) NOT NULL,
  `nomeProfessor` varchar(50) NOT NULL,
  `emailProfessor` varchar(150) NOT NULL,
  `senhaProfessor` varchar(150) NOT NULL,
  `idEscola` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpublicacao`
--

CREATE TABLE `tbpublicacao` (
  `idPublicacao` int(11) NOT NULL,
  `tituloPublicacao` varchar(80) NOT NULL,
  `descPublicacao` varchar(500) NOT NULL,
  `idProfessor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbresponsavel`
--

CREATE TABLE `tbresponsavel` (
  `idResponsavel` int(11) NOT NULL,
  `nomeResponsavel` varchar(50) NOT NULL,
  `cpfResponsavel` char(14) NOT NULL,
  `emailResponsavel` varchar(150) NOT NULL,
  `senhaResponsavel` varchar(150) NOT NULL,
  `idAluno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbsecretaria`
--

CREATE TABLE `tbsecretaria` (
  `idSecretaria` int(11) NOT NULL,
  `nomeSecretaria` varchar(50) NOT NULL,
  `emailSecretaria` varchar(150) NOT NULL,
  `senhaSecretaria` varchar(150) NOT NULL,
  `idEscola` int(11) DEFAULT NULL,
  `idAdministrador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsecretaria`
--

INSERT INTO `tbsecretaria` (`idSecretaria`, `nomeSecretaria`, `emailSecretaria`, `senhaSecretaria`, `idEscola`, `idAdministrador`) VALUES
(1, 'Regiane da Silva', 'se.clotilde1998@hotmail.com', 'senhateste', 2, 1),
(2, 'Regiane da Silva', 'se.clotilde2000@hotmail.com', 'senhateste', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbtelefoneresponsavel`
--

CREATE TABLE `tbtelefoneresponsavel` (
  `idTelefoneResponsavel` int(11) NOT NULL,
  `numTelefoneResponsavel` varchar(16) NOT NULL,
  `idResponsavel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbturma`
--

CREATE TABLE `tbturma` (
  `idTurma` int(11) NOT NULL,
  `nomeTurma` varchar(50) NOT NULL,
  `idEscola` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idUsuario` int(11) NOT NULL,
  `idProfessor` int(11) DEFAULT NULL,
  `idResponsavel` int(11) DEFAULT NULL,
  `idSecretaria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadministrador`
--
ALTER TABLE `tbadministrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indexes for table `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD PRIMARY KEY (`idAluno`),
  ADD KEY `fk_aluno_turma` (`idTurma`);

--
-- Indexes for table `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
  ADD PRIMARY KEY (`idDisciplina`),
  ADD KEY `fk_disciplina_professor` (`idProfessor`),
  ADD KEY `fk_disciplina_escola` (`idEscola`);

--
-- Indexes for table `tbenderecoresponsavel`
--
ALTER TABLE `tbenderecoresponsavel`
  ADD PRIMARY KEY (`idEnderecoResponsavel`),
  ADD KEY `fk_endereco_responsavel` (`idResponsavel`);

--
-- Indexes for table `tbescola`
--
ALTER TABLE `tbescola`
  ADD PRIMARY KEY (`idEscola`),
  ADD KEY `fk_escola_administrador` (`idAdministrador`);

--
-- Indexes for table `tbevento`
--
ALTER TABLE `tbevento`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `fk_evento_secretaria` (`idSecretaria`);

--
-- Indexes for table `tbhorarioturma`
--
ALTER TABLE `tbhorarioturma`
  ADD PRIMARY KEY (`idHorarioTurma`),
  ADD KEY `fk_horario_turma` (`idTurma`),
  ADD KEY `fk_horario_disciplina` (`idDisciplina`),
  ADD KEY `fk_horario_escola` (`idEscola`);

--
-- Indexes for table `tbimagemevento`
--
ALTER TABLE `tbimagemevento`
  ADD PRIMARY KEY (`idImagemEvento`),
  ADD KEY `fk_imagemEvento_evento` (`idEvento`);

--
-- Indexes for table `tbimagemperfilprofessor`
--
ALTER TABLE `tbimagemperfilprofessor`
  ADD PRIMARY KEY (`idImagemPerfilProfessor`),
  ADD KEY `fk_imagemPerfilProfessor_professor` (`idProfessor`);

--
-- Indexes for table `tbimagemperfilresponsavel`
--
ALTER TABLE `tbimagemperfilresponsavel`
  ADD PRIMARY KEY (`idImagemPerfilResponsavel`),
  ADD KEY `fk_imagemPerfilResponsavel_responsavel` (`idResponsavel`);

--
-- Indexes for table `tbobservacao`
--
ALTER TABLE `tbobservacao`
  ADD PRIMARY KEY (`idObservacao`),
  ADD KEY `fk_observacao_aluno` (`idAluno`),
  ADD KEY `fk_observacao_professor` (`idProfessor`);

--
-- Indexes for table `tbprofessor`
--
ALTER TABLE `tbprofessor`
  ADD PRIMARY KEY (`idProfessor`),
  ADD KEY `fk_professor_escola` (`idEscola`);

--
-- Indexes for table `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  ADD PRIMARY KEY (`idPublicacao`),
  ADD KEY `fk_publicacao_professor` (`idProfessor`);

--
-- Indexes for table `tbresponsavel`
--
ALTER TABLE `tbresponsavel`
  ADD PRIMARY KEY (`idResponsavel`),
  ADD KEY `fk_responsavel_aluno` (`idAluno`);

--
-- Indexes for table `tbsecretaria`
--
ALTER TABLE `tbsecretaria`
  ADD PRIMARY KEY (`idSecretaria`),
  ADD KEY `fk_secretaria_escola` (`idEscola`),
  ADD KEY `fk_secretaria_administrador` (`idAdministrador`);

--
-- Indexes for table `tbtelefoneresponsavel`
--
ALTER TABLE `tbtelefoneresponsavel`
  ADD PRIMARY KEY (`idTelefoneResponsavel`),
  ADD KEY `fk_telefoneResponsavel_responsavel` (`idResponsavel`);

--
-- Indexes for table `tbturma`
--
ALTER TABLE `tbturma`
  ADD PRIMARY KEY (`idTurma`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_usuario_professor` (`idProfessor`),
  ADD KEY `fk_usuario_responsavel` (`idResponsavel`),
  ADD KEY `fk_usuario_secretaria` (`idSecretaria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadministrador`
--
ALTER TABLE `tbadministrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbaluno`
--
ALTER TABLE `tbaluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbenderecoresponsavel`
--
ALTER TABLE `tbenderecoresponsavel`
  MODIFY `idEnderecoResponsavel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbescola`
--
ALTER TABLE `tbescola`
  MODIFY `idEscola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbevento`
--
ALTER TABLE `tbevento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbhorarioturma`
--
ALTER TABLE `tbhorarioturma`
  MODIFY `idHorarioTurma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbimagemevento`
--
ALTER TABLE `tbimagemevento`
  MODIFY `idImagemEvento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbimagemperfilprofessor`
--
ALTER TABLE `tbimagemperfilprofessor`
  MODIFY `idImagemPerfilProfessor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbimagemperfilresponsavel`
--
ALTER TABLE `tbimagemperfilresponsavel`
  MODIFY `idImagemPerfilResponsavel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbobservacao`
--
ALTER TABLE `tbobservacao`
  MODIFY `idObservacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbprofessor`
--
ALTER TABLE `tbprofessor`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  MODIFY `idPublicacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbresponsavel`
--
ALTER TABLE `tbresponsavel`
  MODIFY `idResponsavel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbsecretaria`
--
ALTER TABLE `tbsecretaria`
  MODIFY `idSecretaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbtelefoneresponsavel`
--
ALTER TABLE `tbtelefoneresponsavel`
  MODIFY `idTelefoneResponsavel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbturma`
--
ALTER TABLE `tbturma`
  MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD CONSTRAINT `fk_aluno_turma` FOREIGN KEY (`idTurma`) REFERENCES `tbturma` (`idTurma`),
  ADD CONSTRAINT `fk_aluno_escola` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`);

--
-- Constraints for table `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
  ADD CONSTRAINT `fk_disciplina_professor` FOREIGN KEY (`idProfessor`) REFERENCES `tbprofessor` (`idProfessor`),
  ADD CONSTRAINT `fk_disciplina_escola` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`);

--
-- Constraints for table `tbenderecoresponsavel`
--
ALTER TABLE `tbenderecoresponsavel`
  ADD CONSTRAINT `fk_endereco_responsavel` FOREIGN KEY (`idResponsavel`) REFERENCES `tbresponsavel` (`idResponsavel`);

--
-- Constraints for table `tbescola`
--
ALTER TABLE `tbescola`
  ADD CONSTRAINT `fk_escola_administrador` FOREIGN KEY (`idAdministrador`) REFERENCES `tbadministrador` (`idAdministrador`);

--
-- Constraints for table `tbevento`
--
ALTER TABLE `tbevento`
  ADD CONSTRAINT `fk_evento_secretaria` FOREIGN KEY (`idSecretaria`) REFERENCES `tbsecretaria` (`idSecretaria`);

--
-- Constraints for table `tbhorarioturma`
--
ALTER TABLE `tbhorarioturma`
  ADD CONSTRAINT `fk_horario_disciplina` FOREIGN KEY (`idDisciplina`) REFERENCES `tbdisciplina` (`idDisciplina`),
  ADD CONSTRAINT `fk_horario_turma` FOREIGN KEY (`idTurma`) REFERENCES `tbturma` (`idTurma`),
  ADD CONSTRAINT `fk_horario_escola` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`);

--
-- Constraints for table `tbimagemevento`
--
ALTER TABLE `tbimagemevento`
  ADD CONSTRAINT `fk_imagemEvento_evento` FOREIGN KEY (`idEvento`) REFERENCES `tbevento` (`idEvento`);

--
-- Constraints for table `tbimagemperfilprofessor`
--
ALTER TABLE `tbimagemperfilprofessor`
  ADD CONSTRAINT `fk_imagemPerfilProfessor_professor` FOREIGN KEY (`idProfessor`) REFERENCES `tbprofessor` (`idProfessor`);

--
-- Constraints for table `tbimagemperfilresponsavel`
--
ALTER TABLE `tbimagemperfilresponsavel`
  ADD CONSTRAINT `fk_imagemPerfilResponsavel_responsavel` FOREIGN KEY (`idResponsavel`) REFERENCES `tbresponsavel` (`idResponsavel`);

--
-- Constraints for table `tbobservacao`
--
ALTER TABLE `tbobservacao`
  ADD CONSTRAINT `fk_observacao_aluno` FOREIGN KEY (`idAluno`) REFERENCES `tbaluno` (`idAluno`),
  ADD CONSTRAINT `fk_observacao_professor` FOREIGN KEY (`idProfessor`) REFERENCES `tbprofessor` (`idProfessor`);

--
-- Constraints for table `tbprofessor`
--
ALTER TABLE `tbprofessor`
  ADD CONSTRAINT `fk_professor_escola` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`);

--
-- Constraints for table `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  ADD CONSTRAINT `fk_publicacao_professor` FOREIGN KEY (`idProfessor`) REFERENCES `tbprofessor` (`idProfessor`);

--
-- Constraints for table `tbresponsavel`
--
ALTER TABLE `tbresponsavel`
  ADD CONSTRAINT `fk_responsavel_aluno` FOREIGN KEY (`idAluno`) REFERENCES `tbaluno` (`idAluno`);

--
-- Constraints for table `tbsecretaria`
--
ALTER TABLE `tbsecretaria`
  ADD CONSTRAINT `fk_secretaria_administrador` FOREIGN KEY (`idAdministrador`) REFERENCES `tbadministrador` (`idAdministrador`),
  ADD CONSTRAINT `fk_secretaria_escola` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`);

--
-- Constraints for table `tbtelefoneresponsavel`
--
ALTER TABLE `tbtelefoneresponsavel`
  ADD CONSTRAINT `fk_telefoneResponsavel_responsavel` FOREIGN KEY (`idResponsavel`) REFERENCES `tbresponsavel` (`idResponsavel`);

--
-- Constraints for table `tbturma`
--
ALTER TABLE `tbturma`
  ADD CONSTRAINT `fk_turma_escola` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`);
 
--
-- Constraints for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD CONSTRAINT `fk_usuario_professor` FOREIGN KEY (`idProfessor`) REFERENCES `tbprofessor` (`idProfessor`),
  ADD CONSTRAINT `fk_usuario_responsavel` FOREIGN KEY (`idResponsavel`) REFERENCES `tbresponsavel` (`idResponsavel`),
  ADD CONSTRAINT `fk_usuario_secretaria` FOREIGN KEY (`idSecretaria`) REFERENCES `tbsecretaria` (`idSecretaria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
