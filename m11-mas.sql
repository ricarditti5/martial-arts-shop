-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Fev-2026 às 11:45
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `m11-mas`
--
CREATE DATABASE IF NOT EXISTS `m11-mas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `m11-mas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigo`
--

DROP TABLE IF EXISTS `artigo`;
CREATE TABLE `artigo` (
  `id_artigo` int(11) NOT NULL,
  `artigo` varchar(40) NOT NULL,
  `imagem` varchar(1000) NOT NULL,
  `preco` decimal(11,0) NOT NULL,
  `stock` int(11) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `artigo`
--

INSERT INTO `artigo` (`id_artigo`, `artigo`, `imagem`, `preco`, `stock`, `categoria`) VALUES
(13, 'Bucal para Luta Venum', 'bucal-venum.jpg', 16, 270, 'Nenhuma Categoria'),
(14, 'Bucal para Luta Buddha', 'bucal.jpg', 16, 300, 'Nenhuma Categoria'),
(15, 'Bucal para Luta Leone', 'bucal-leone.jpg', 16, 500, 'Nenhuma Categoria'),
(16, 'Luva de MMA Buddha', 'luvMMA.jpg', 45, 90, 'Luvas'),
(17, 'Luva de Boxe Leone', 'luvas-leone.jpg', 52, 250, 'Luvas'),
(18, 'Luva de Boxe Venum', 'luvas-venum.jpg', 46, 200, 'Luvas'),
(19, 'Luva de MMA Venum', 'luvas-mma-venum.jpg', 48, 200, 'Luvas'),
(20, 'Caneleiras de Luta buddha', 'canMMA.jpg', 53, 100, 'Caneleiras'),
(21, 'Caneleiras de MMA Buddha estilizadas', 'caneleiras-buddha.jpg', 60, 100, 'Caneleiras'),
(22, 'Caneleiras de Luta Venum', 'caneleiras-venum.jpg', 71, 100, 'Caneleiras'),
(23, 'Capacete Protetor Venum', 'capacete-venum.jpg', 60, 50, 'Nenhuma Categoria'),
(24, 'Capacete Protetor Leone', 'capacete-leone.jpg', 60, 50, 'Nenhuma Categoria'),
(25, 'Saco de Boxe Buddha', 'saco2-buddha.jpg', 130, 16, 'Nenhuma Categoria'),
(26, 'Saco de Boxe  Venum', 'saco-venum.jpg', 230, 10, 'Nenhuma Categoria'),
(27, 'Saco de Boxe Buddha', 'saco-buddha.jpg', 204, 10, 'Nenhuma Categoria'),
(28, 'Bandadem de Luta Venum', 'ligas-venum.jpg', 10, 20, 'Nenhuma Categoria'),
(29, 'Bandagem de Luta Buddha', 'ligas-buddha.jpg', 10, 23, 'Nenhuma Categoria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_email` varchar(70) NOT NULL,
  `user_pass` int(11) NOT NULL,
  `type_user` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `type_user`) VALUES
(1, 'Ricardo', 'ricarditti5@gmail.com', 1234, 'admin'),
(6, 'Gonçalo', 'goncalo@gmail.com', 1234, 'user'),
(7, 'Daniel', 'daniel@gmail.com', 1234, 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`id_artigo`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigo`
--
ALTER TABLE `artigo`
  MODIFY `id_artigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
