-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Mar-2020 às 18:38
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `cursos_id` int(11) NOT NULL,
  `cursos_nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `cursos_id`, `cursos_nome`) VALUES
(1, 1, 'CFSd'),
(2, 2, 'CFCb'),
(3, 3, 'CFSg'),
(4, 4, 'CFTn'),
(5, 5, 'CFMj');

-- --------------------------------------------------------

--
-- Estrutura da tabela `patentes`
--

CREATE TABLE `patentes` (
  `id` int(11) NOT NULL,
  `permissao_id` int(11) NOT NULL,
  `permissao_nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `patentes`
--

INSERT INTO `patentes` (`id`, `permissao_id`, `permissao_nome`) VALUES
(1, 1, 'Soldado'),
(2, 2, 'Cabo'),
(4, 3, 'Sargento'),
(5, 4, 'Subtenente'),
(6, 5, 'Aspirante a Oficial'),
(7, 6, 'Tenente'),
(8, 7, 'Capitão'),
(9, 8, 'General'),
(10, 9, 'Coronel'),
(11, 10, 'Inspetor'),
(12, 11, 'Inspetor-Chefe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `patente` varchar(11) NOT NULL,
  `curso` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `patente` int(11) NOT NULL,
  `cursos` int(11) NOT NULL,
  `patente2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `nick`, `senha`, `patente`, `cursos`, `patente2`) VALUES
(71, 'Marcos Augusto Massini', 'dextergrama@gmail.com', 'Nyen?', '9c94cff6e2e6f572234dc7f5c9781e0c', 6, 4, ''),
(72, 'Marcos Augusto Massini', 'dextergsrama@gmail.com', 'Nyen?', '9c94cff6e2e6f572234dc7f5c9781e0c', 6, 3, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `patentes`
--
ALTER TABLE `patentes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `patentes`
--
ALTER TABLE `patentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
