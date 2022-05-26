-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25-Maio-2022 às 09:42
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `faturaplus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `total_value` decimal(10,0) NOT NULL,
  `total_iva` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `client_reference_id` int(11) NOT NULL,
  `employee_reference_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_BILL_CLIENT` (`client_reference_id`),
  KEY `FK_BILL_EMPLOYEE` (`employee_reference_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bills`
--

INSERT INTO `bills` (`id`, `date`, `total_value`, `total_iva`, `state`, `client_reference_id`, `employee_reference_id`) VALUES
(1, '2022-05-18', '551', '515', 'teste', 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bill_lines`
--

DROP TABLE IF EXISTS `bill_lines`;
CREATE TABLE IF NOT EXISTS `bill_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `unitary_value` int(11) NOT NULL,
  `iva_value` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_BILL_LINE_PRODUCT` (`product_id`),
  KEY `FK_BILL_LINE_BILL` (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enterprises`
--

DROP TABLE IF EXISTS `enterprises`;
CREATE TABLE IF NOT EXISTS `enterprises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_designation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(9) NOT NULL,
  `nif` int(9) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `social_capital` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `enterprises`
--

INSERT INTO `enterprises` (`id`, `social_designation`, `email`, `phone`, `nif`, `postal_code`, `country`, `city`, `locale`, `address`, `social_capital`) VALUES
(1, 'testee', 'teste@gmail.com', 912345786, 741852963, '56546556', 'sygusayu', 'sasdadas', 'sdasdsa', 'testeeeee', 'sdadsdsa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentage` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `vigour` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `percentage`, `description`, `vigour`) VALUES
(1, '14', 'dssnd', 1),
(2, 'teste', 'teste', 0),
(3, 'teste', 'teste', 0),
(4, 'teste', 'teste', 0),
(5, 'teste', 'teste', 1),
(6, 'testeee', 'testeee', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `iva_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_PRODUCT_IVA` (`iva_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `reference`, `description`, `price`, `stock`, `iva_id`) VALUES
(1, 'product1', 'exemplo', '13', '1', 1),
(4, 'mdanjhsgdh', 'dsadjksh', '12', '1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(9) NOT NULL,
  `nif` int(9) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `genre` char(1) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `image`, `name`, `email`, `phone`, `nif`, `postal_code`, `birth`, `genre`, `country`, `city`, `locale`, `address`, `role`) VALUES
(2, 'teste123', 'teste123', 'default.png', 'Teste', 'teste@gmail.com', 912345678, 123456789, '1234-123', '2022-05-23', 'm', 'Portugal', 'Torres Vedras', 'testeeee', 'testeeeee', 'funcionario');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `FK_BILL_CLIENT` FOREIGN KEY (`client_reference_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_BILL_EMPLOYEE` FOREIGN KEY (`employee_reference_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `bill_lines`
--
ALTER TABLE `bill_lines`
  ADD CONSTRAINT `FK_BILL_LINE_BILL` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `FK_BILL_LINE_PRODUCT` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_PRODUCT_IVA` FOREIGN KEY (`iva_id`) REFERENCES `ivas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
