-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql4.skymail.local
-- Tempo de geração: 28/06/2023 às 17:50
-- Versão do servidor: 8.0.28
-- Versão do PHP: 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `areadoarquiteto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquitetos`
--

CREATE TABLE `arquitetos` (
  `idArquiteto` int NOT NULL,
  `arquiteto` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `fotoUrl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cpfCnpj` varchar(100) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `pis` varchar(100) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `filiacao` varchar(255) DEFAULT NULL,
  `telefone` varchar(100) NOT NULL,
  `emailPremium` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `dadosBancarios` varchar(255) DEFAULT NULL,
  `pontuacao` float NOT NULL DEFAULT '0',
  `status` enum('a','d','b','') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `downloads`
--

CREATE TABLE `downloads` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `idArquiteto` int DEFAULT NULL,
  `status` enum('a','d','b','') NOT NULL DEFAULT 'a',
  `dataCadastro` date NOT NULL,
  `nomeDoArquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int NOT NULL,
  `idArquiteto` int NOT NULL,
  `pedido` int NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `idVendedor` int NOT NULL,
  `data` date NOT NULL,
  `valor` float NOT NULL,
  `pontos` float NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `status` enum('a','d','b','') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `teste`
--

CREATE TABLE `teste` (
  `teste` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `idVendedor` int NOT NULL,
  `vendedor` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `dataCadastro` date NOT NULL,
  `status` enum('a','d','b','') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `arquitetos`
--
ALTER TABLE `arquitetos`
  ADD PRIMARY KEY (`idArquiteto`);

--
-- Índices de tabela `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idArquiteto` (`idArquiteto`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices de tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`idVendedor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquitetos`
--
ALTER TABLE `arquitetos`
  MODIFY `idArquiteto` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `idVendedor` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`idArquiteto`) REFERENCES `arquitetos` (`idArquiteto`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
