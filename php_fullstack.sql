-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Ago-2023 às 01:38
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `php_fullstack`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `adm_id` int(11) NOT NULL,
  `adm_nome` varchar(255) NOT NULL,
  `adm_login` varchar(100) NOT NULL,
  `adm_senha` varchar(32) NOT NULL,
  `adm_criacao` timestamp NULL DEFAULT NULL,
  `adm_alteracao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`adm_id`, `adm_nome`, `adm_login`, `adm_senha`, `adm_criacao`, `adm_alteracao`) VALUES
(1, 'Administrador Fulano', 'admin', '0192023a7bbd73250516f069df18b500', '2023-08-05 01:23:23', '2023-08-05 01:23:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `fun_id` int(11) NOT NULL,
  `fun_nome` varchar(255) NOT NULL,
  `fun_login` varchar(100) NOT NULL,
  `fun_senha` varchar(32) NOT NULL,
  `fun_saldo` float NOT NULL,
  `fun_adm` int(11) NOT NULL,
  `fun_foto` varchar(100) NOT NULL,
  `fun_criacao` timestamp NULL DEFAULT NULL,
  `fun_alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `fun_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `mov_id` int(11) NOT NULL,
  `mov_tipo` tinyint(4) NOT NULL,
  `mov_valor` float NOT NULL,
  `mov_obs` text NOT NULL,
  `mov_fun` int(11) NOT NULL,
  `mov_adm` int(11) NOT NULL,
  `mov_data` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`adm_id`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`fun_id`),
  ADD KEY `fun_adm` (`fun_adm`);

--
-- Índices para tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`mov_id`),
  ADD KEY `mov_fun` (`mov_fun`),
  ADD KEY `mov_adm` (`mov_adm`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `fun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `mov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`fun_adm`) REFERENCES `administrador` (`adm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `movimentacao_ibfk_1` FOREIGN KEY (`mov_adm`) REFERENCES `administrador` (`adm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimentacao_ibfk_2` FOREIGN KEY (`mov_fun`) REFERENCES `funcionario` (`fun_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
