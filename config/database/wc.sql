-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 02/05/2019 às 12:07
-- Versão do servidor: 10.1.38-MariaDB
-- Versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `wc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `files`
--

CREATE TABLE `files` (
  `name` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `isvideo` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL,
  `datenow` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `files`
--

INSERT INTO `files` (`name`, `title`, `description`, `isvideo`, `id`, `datenow`) VALUES
('', 'Direito empresarial 2', 'Referente a aula passada', 0, 21, '02-05-19-05-55-48'),
('https://www.youtube.com/watch?v=4Mtk8F9A1OY', 'Como se fazem os tiltadores?', 'nada a declarar', 1, 22, '02-05-19-05-56-21');

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `level` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `user` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `logs`
--

INSERT INTO `logs` (`id`, `level`, `message`, `user`) VALUES
(8, '4', 'Usuário logou', 'teste'),
(9, '4', 'Usuário logou', 'teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tips`
--

CREATE TABLE `tips` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `tip` text NOT NULL,
  `datenow` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `type_user`
--

CREATE TABLE `type_user` (
  `id` int(11) NOT NULL,
  `value` varchar(20) NOT NULL,
  `who` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `type_user`
--

INSERT INTO `type_user` (`id`, `value`, `who`) VALUES
(1, '1', 'adm'),
(2, '2', 'student'),
(3, '3', 'teacher');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `token` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `token`, `status`) VALUES
(1, 'betho', 'teste', 'teste', '1', 'Nzk=', ''),
(2, 'Rubia', 'rubia@gmail.com', '123', '2', '444', 'blocked'),
(3, 'José', 'jose@hotmail.com', '123', '3', 'asd', 'free'),
(8, 'Glaucia', 'glaucinha200@hotmail.com', '123', '2', 'asd', 'free'),
(9, 'Jofferson', 'joferson_funk@hotmail.com', '123', '2', 'asd', 'free'),
(10, 'Thiago', 'thiagobrow@hotmail.com', '123', '2', 'asd', 'pending'),
(16, 'rubia', 'rubia', '123', '1', 'MTM0', '1');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `type_user`
--
ALTER TABLE `type_user`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `type_user`
--
ALTER TABLE `type_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
