-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Abr-2022 às 15:57
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fatura+`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor_total` double NOT NULL,
  `iva_total` int(11) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `referencia_cliente` int(11) NOT NULL,
  `referencia_funcionario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bill_line`
--

CREATE TABLE `bill_line` (
  `id_bill_line` int(11) NOT NULL,
  `valor_iva` int(11) NOT NULL,
  `valor` double NOT NULL,
  `quantidade` int(11) NOT NULL,
  `referencia_produto` int(11) NOT NULL,
  `referencia_fatura` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enterprises`
--

CREATE TABLE `business` (
  `id_empresa` int(11) NOT NULL,
  `designação social` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nif` int(9) NOT NULL,
  `código postal` int(11) NOT NULL,
  `capital social` int(11) NOT NULL,
  `telefone` int(9) NOT NULL,
  `localidade` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `iva`
--

CREATE TABLE `iva` (
  `id_iva` int(11) NOT NULL,
  `percentagem` int(11) NOT NULL,
  `descricao` varchar(25) NOT NULL,
  `vigor_taxa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `referencia` int(11) NOT NULL,
  `descricao` varchar(25) NOT NULL,
  `preco` double NOT NULL,
  `stock` int(11) NOT NULL,
  `vigor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telefone` int(9) NOT NULL,
  `nif` int(9) NOT NULL,
  `morada` varchar(25) NOT NULL,
  `código postal` int(11) NOT NULL,
  `localidade` varchar(25) NOT NULL,
  `estado` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Índices para tabela `bill_line`
--
ALTER TABLE `bill_line`
  ADD PRIMARY KEY (`id_bill_line`),
  ADD KEY `valor` (`valor`);

--
-- Índices para tabela `enterprises`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id_empresa`) USING BTREE;

--
-- Índices para tabela `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id_iva`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `bill_line`
--
ALTER TABLE `bill_line`
  MODIFY `id_bill_line` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `enterprises`
--
ALTER TABLE `business`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `iva`
--
ALTER TABLE `iva`
  MODIFY `id_iva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
