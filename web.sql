-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/07/2024 às 20:55
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `web`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

CREATE TABLE `consulta` (
  `consultaId` int(11) NOT NULL,
  `consultaTxt` mediumtext DEFAULT NULL,
  `criancaId` int(11) NOT NULL,
  `login_medico` varchar(120) NOT NULL,
  `sentimento` varchar(10) DEFAULT NULL,
  `dataConsulta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consulta`
--

INSERT INTO `consulta` (`consultaId`, `consultaTxt`, `criancaId`, `login_medico`, `sentimento`, `dataConsulta`) VALUES
(20, 'Nesta consulta usamos o método tal para acalmar a criança e fizemos isso isso e isso.', 142, 'Caio', '2', '2024-07-26'),
(21, NULL, 142, 'Caio', '0', '2024-07-26'),
(22, NULL, 143, 'Caio', '0', '2024-07-26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `crianca`
--

CREATE TABLE `crianca` (
  `criancaId` int(11) NOT NULL,
  `cor_pele` varchar(15) DEFAULT NULL,
  `tipo_cabelo` varchar(11) DEFAULT NULL,
  `cor_cabelo` varchar(11) DEFAULT NULL,
  `oculos` int(11) DEFAULT NULL,
  `sentimento` int(11) DEFAULT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `genero` varchar(2) DEFAULT NULL,
  `senha` varchar(120) DEFAULT NULL,
  `login_medico` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `crianca`
--

INSERT INTO `crianca` (`criancaId`, `cor_pele`, `tipo_cabelo`, `cor_cabelo`, `oculos`, `sentimento`, `nome`, `genero`, `senha`, `login_medico`) VALUES
(142, '614335', 'shortRound', '2D221C', 0, 1, 'Pedro Magalhães', 'ma', '123', 'Caio'),
(143, '614335', 'straight02', '2D221C', 0, 2, 'Joana Da Silva', 'fe', '123', 'Caio');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `nome` varchar(120) DEFAULT NULL,
  `cro` varchar(7) DEFAULT NULL,
  `login` varchar(120) NOT NULL,
  `senha` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`nome`, `cro`, `login`, `senha`) VALUES
('Caio Rodrigues Vieira', 'RJ00003', 'Caio', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`consultaId`),
  ADD KEY `criancaId` (`criancaId`),
  ADD KEY `login_medico` (`login_medico`);

--
-- Índices de tabela `crianca`
--
ALTER TABLE `crianca`
  ADD PRIMARY KEY (`criancaId`),
  ADD KEY `login_medico` (`login_medico`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `consultaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `crianca`
--
ALTER TABLE `crianca`
  MODIFY `criancaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`criancaId`) REFERENCES `crianca` (`criancaId`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`login_medico`) REFERENCES `medico` (`login`);

--
-- Restrições para tabelas `crianca`
--
ALTER TABLE `crianca`
  ADD CONSTRAINT `login_medico` FOREIGN KEY (`login_medico`) REFERENCES `medico` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
