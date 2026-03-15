-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Mar-2026 às 16:16
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
  `tipo_artigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `artigo`
--

INSERT INTO `artigo` (`id_artigo`, `artigo`, `imagem`, `preco`, `stock`, `tipo_artigo`) VALUES
(13, 'Bucal para Luta Venum', 'bucal-venum.jpg', 16, 200, 3),
(14, 'Bucal para Luta Buddha', 'bucal.jpg', 16, 200, 3),
(15, 'Bucal para Luta Leone', 'bucal-leone.jpg', 16, 200, 3),
(16, 'Luva de MMA Buddha', 'luvMMA.jpg', 45, 90, 2),
(17, 'Luva de Boxe Leone', 'luvas-leone.jpg', 52, 250, 2),
(18, 'Luva de Boxe Venum', 'luvas-venum.jpg', 46, 200, 2),
(19, 'Luva de MMA Venum', 'luvas-mma-venum.jpg', 48, 200, 2),
(20, 'Caneleiras de Luta buddha', 'canMMA.jpg', 53, 100, 1),
(21, 'Caneleiras de MMA Buddha estilizadas', 'caneleiras-buddha.jpg', 60, 100, 1),
(22, 'Caneleiras de Luta Venum', 'caneleiras-venum.jpg', 71, 100, 1),
(23, 'Capacete Protetor Venum', 'capacete-venum.jpg', 60, 200, 3),
(24, 'Capacete Protetor Leone', 'capacete-leone.jpg', 60, 200, 3),
(25, 'Saco de Boxe Buddha', 'saco2-buddha.jpg', 130, 200, 3),
(26, 'Saco de Boxe  Venum', 'saco-venum.jpg', 230, 200, 3),
(27, 'Saco de Boxe Buddha', 'saco-buddha.jpg', 204, 200, 3),
(28, 'Bandadem de Luta Venum', 'ligas-venum.jpg', 10, 200, 3),
(29, 'Bandagem de Luta Buddha', 'ligas-buddha.jpg', 10, 200, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE `carrinho` (
  `id_artigo` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_artigos`
--

DROP TABLE IF EXISTS `tipos_artigos`;
CREATE TABLE `tipos_artigos` (
  `tipo_artigo` int(11) NOT NULL,
  `designacao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipos_artigos`
--

INSERT INTO `tipos_artigos` (`tipo_artigo`, `designacao`) VALUES
(1, 'Caneleiras'),
(2, 'Luvas'),
(3, 'Acessórios');

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
(7, 'Daniel', 'daniel@gmail.com', 1234, 'user'),
(8, 'Professor Pedro', 'pedro@gmail.com', 1234, 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`id_artigo`),
  ADD KEY `tipo_artigo` (`tipo_artigo`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD KEY `id_artigo` (`id_artigo`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `tipos_artigos`
--
ALTER TABLE `tipos_artigos`
  ADD PRIMARY KEY (`tipo_artigo`);

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
-- AUTO_INCREMENT de tabela `tipos_artigos`
--
ALTER TABLE `tipos_artigos`
  MODIFY `tipo_artigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `artigo`
--
ALTER TABLE `artigo`
  ADD CONSTRAINT `artigo_ibfk_1` FOREIGN KEY (`tipo_artigo`) REFERENCES `tipos_artigos` (`tipo_artigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`id_artigo`) REFERENCES `artigo` (`id_artigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
