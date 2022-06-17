-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Jun-2022 às 01:43
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
  `reference` varchar(6) NOT NULL,
  `date` date NOT NULL,
  `total_value` decimal(16,2) NOT NULL,
  `total_iva` decimal(16,2) NOT NULL,
  `state` char(1) NOT NULL,
  `client_reference_id` int(11) NOT NULL,
  `employee_reference_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_BILL_CLIENT` (`client_reference_id`),
  KEY `FK_BILL_EMPLOYEE` (`employee_reference_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bills`
--

INSERT INTO `bills` (`id`, `reference`, `date`, `total_value`, `total_iva`, `state`, `client_reference_id`, `employee_reference_id`) VALUES
(1, '000575', '2022-05-18', '2025.24', '523.76', 'l', 3, 2),
(2, '007446', '2022-06-17', '1600.00', '400.00', 'l', 5, 7),
(3, '004687', '2022-06-02', '2930.48', '767.52', 'l', 3, 6),
(4, '007575', '2022-06-03', '1680.00', '420.00', 'l', 5, 6),
(5, '004545', '2022-06-03', '400.00', '100.00', 'l', 3, 6),
(7, '048468', '2022-06-05', '850.48', '247.52', 'e', 3, 2),
(9, '004788', '2022-06-17', '265.24', '83.76', 'e', 5, 2),
(11, '004790', '2022-06-17', '95.90', '103.90', 'l', 5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bill_lines`
--

DROP TABLE IF EXISTS `bill_lines`;
CREATE TABLE IF NOT EXISTS `bill_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `unitary_value` decimal(16,2) NOT NULL,
  `iva_value` decimal(16,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_BILL_LINE_PRODUCT` (`product_id`),
  KEY `FK_BILL_LINE_BILL` (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bill_lines`
--

INSERT INTO `bill_lines` (`id`, `quantity`, `unitary_value`, `iva_value`, `product_id`, `bill_id`) VALUES
(1, 2, '80.00', '20.00', 5, 1),
(2, 1, '800.00', '200.00', 1, 1),
(3, 2, '800.00', '200.00', 1, 2),
(4, 1, '800.00', '200.00', 1, 1),
(5, 3, '800.00', '200.00', 1, 3),
(6, 1, '265.24', '83.76', 4, 1),
(7, 2, '800.00', '200.00', 1, 4),
(8, 1, '80.00', '20.00', 5, 4),
(9, 2, '265.24', '83.76', 4, 3),
(10, 3, '80.00', '20.00', 5, 5),
(11, 2, '80.00', '20.00', 5, 5),
(12, 2, '265.24', '83.76', 4, 7),
(13, 4, '80.00', '20.00', 5, 7),
(14, 1, '349.00', '24.00', 4, 9),
(15, 2, '339.80', '28.00', 8, 1),
(16, 2, '339.80', '28.00', 8, 2),
(17, 1, '34.90', '24.00', 10, 2),
(18, 1, '9.90', '20.00', 9, 2),
(19, 3, '74.70', '42.00', 12, 2),
(20, 1, '33.90', '20.00', 7, 3),
(21, 2, '69.80', '48.00', 10, 3),
(22, 1, '64.90', '20.00', 11, 3),
(23, 1, '99.90', '26.00', 6, 4),
(24, 1, '24.90', '14.00', 12, 4),
(25, 2, '339.80', '28.00', 8, 4),
(26, 1, '64.90', '20.00', 11, 5),
(27, 1, '34.90', '24.00', 10, 5),
(28, 1, '99.90', '26.00', 6, 5);

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
  `social_capital` decimal(16,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `enterprises`
--

INSERT INTO `enterprises` (`id`, `social_designation`, `email`, `phone`, `nif`, `postal_code`, `country`, `city`, `locale`, `address`, `social_capital`) VALUES
(1, 'Fatura Plus', 'faturaplus@gmail.com', 956154645, 265246564, '1234-127', 'Portugal', 'Torres Vedras', 'Localidade Teste', 'Morada Teste', '10712.57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentage` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `vigour` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `percentage`, `description`, `vigour`) VALUES
(1, 14, 'Teste DescriÃ§Ã£o', 1),
(2, 12, 'Teste DescriÃ§Ã£o', 0),
(3, 10, 'Teste DescriÃ§Ã£o', 0),
(4, 20, 'Teste DescriÃ§Ã£o', 1),
(5, 24, 'Teste DescriÃ§Ã£o', 1),
(6, 26, 'Teste DescriÃ§Ã£o', 1),
(7, 23, 'Taxa Normal', 1),
(8, 13, 'Taxa IntermÃ©dia', 1),
(9, 6, 'Taxa Reduzida', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(16,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `iva_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_PRODUCT_IVA` (`iva_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `reference`, `title`, `description`, `price`, `stock`, `iva_id`) VALUES
(1, '086482', 'Computador Gaming', 'Computador da incrÃ­vel gama gaming de Desktops', '1000.00', 11, 4),
(4, '654716', 'Cadeira Gaming', 'A ergonomia Ã© um dos nossos principais focos de atenÃ§Ã£o', '349.00', 14, 5),
(5, '000545', 'Auriculares Wireless', 'Ãudio de Alta ResoluÃ§Ã£o Sem Fios', '100.00', 8, 4),
(6, '001565', 'Corta-relvas ElÃ©trico Bosch', 'Corte relva com menos esforÃ§o e mÃ¡ximo controlo.', '99.90', 40, 6),
(7, '087233', 'Jogo de Tabuleiro Monopoly', 'Um clÃ¡ssico para reuniÃµes de famÃ­lia.', '33.90', 30, 4),
(8, '001615', 'Aspirador Vertical', 'Equipado com um motor digital de alta velocidade.', '169.90', 60, 1),
(9, '005644', 'RÃ¡dio de Bolso', 'Antena FM telescÃ³pica.', '9.90', 80, 4),
(10, '045643', 'Coluna PortÃ¡til', 'Bluetooth Pro com tecnologia BassUp e PartyCast.', '34.90', 35, 5),
(11, '014653', 'CÃ¢mara de SeguranÃ§a', 'Com uma resoluÃ§Ã£o de 2560x1440, o QHD oferece detalhes mais delicados.', '64.90', 25, 4),
(12, '045132', 'Webcam FHD 1080P', 'Perfeita para sessÃµes de streaming, bem como videoconferÃªncia no trabalho.', '24.90', 15, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
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
  `role` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `phone`, `nif`, `postal_code`, `birth`, `genre`, `country`, `city`, `locale`, `address`, `role`) VALUES
(2, 'teste123', 'aa1bf4646de67fd9086cf6c79007026c', 'Teste', 'teste@gmail.com', 912345678, 123456789, '1234-123', '2022-05-23', 'm', 'Portugal', 'Torres Vedras', 'testeeee', 'testeeeee', 'f'),
(3, 'teste1234', '09151a42659cfc08aff86820f973f640', 'Guilherme Cruz', 'testeteste@gmail.com', 912345746, 512478953, '1234-124', '2022-05-26', 'f', 'Portugal', 'Avintes', 'Localidade Teste', 'Morada Teste', 'c'),
(4, 'teste12345', 'e602a3f35f680b48b5d3c0e84deeddc6', 'Teste Admin', 'teste12345@gmail.com', 954832352, 175638624, '1545-185', '2022-05-29', 'm', 'nshguysda', 'Torres Vedras', 'testeeee', 'testeeeee', 'a'),
(5, 'cliente1', 'd41d8cd98f00b204e9800998ecf8427e', 'Cliente', 'cliente1@gmail.com', 915413255, 485375189, '1545-185', '2022-05-18', 'f', 'Portugal', 'Torres Vedras', 'Localidade Teste', 'Morada Teste', 'c'),
(6, 'funcionario1', 'e6b78617985d7fb806699b4a966e46dd', 'FuncionÃ¡rio', 'funcionario1@gmail.com', 945816726, 758412578, '1234-123', '2022-05-15', 'm', 'Portugal', 'Torres Vedras', 'Localidade Teste', 'Morada Teste', 'f'),
(7, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'Admin', 'admin1@gmail.com', 945318136, 489551153, '1234-123', '2022-06-01', 'm', 'Portugal', 'Torres Vedras', 'Localidade Teste', 'Morada Teste', 'a'),
(8, 'cliente2', '6dcd0e14f89d67e397b9f52bb63f5570', 'Cliente2', 'cliente2@gmail.com', 941234121, 453124575, '1234-123', '2022-06-14', 'm', 'Cyprus', 'Nicosia', 'Localidade Teste', 'Morada Teste', 'c');

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
