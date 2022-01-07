-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 05-Jan-2022 às 18:51
-- Versão do servidor: 10.5.12-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id18224393_projetosocial`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `classRoom`
--

CREATE TABLE `classRoom` (
  `id` int(11) NOT NULL,
  `class` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `chairLength` int(11) NOT NULL,
  `chairWidth` int(11) NOT NULL,
  `classSize` int(11) NOT NULL,
  `colorHex` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `userFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `classRoom`
--

INSERT INTO `classRoom` (`id`, `class`, `chairLength`, `chairWidth`, `classSize`, `colorHex`, `userFK`) VALUES
(5, 'Salão do Lolzinho', 9, 5, 45, '#e5bd82', 3),
(7, '3° B', 6, 7, 42, '#f6da4f', 5),
(8, '3ºB', 5, 5, 25, '#e70b73', 2),
(12, '1B INFORMÁTICA', 4, 4, 16, '#de77cb', 6),
(13, '2B', 3, 3, 9, '#e95ab5', 3),
(14, '2B INFO ', 4, 4, 16, '#faf82f', 6),
(15, '4B INFO', 4, 4, 16, '#f88177', 6),
(16, '5B INFOS', 4, 4, 16, '#e5228c', 6),
(18, '1G', 4, 4, 16, '#e0a1d9', 6),
(19, '13', 4, 4, 16, '#ec1f67', 6),
(20, 'ADG', 4, 4, 16, '#e1fcda', 6),
(21, 'TESTEE', 3, 3, 9, '#ee8915', 6),
(23, '3B', 7, 6, 42, '#fee0b9', 1),
(24, '3A', 8, 8, 64, '#fa6725', 4),
(25, '3°B', 7, 6, 42, '#e6a136', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `map`
--

CREATE TABLE `map` (
  `idMap` int(11) NOT NULL,
  `map` longtext COLLATE utf8_unicode_ci NOT NULL,
  `classMapFK` int(11) NOT NULL,
  `userFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `map`
--

INSERT INTO `map` (`idMap`, `map`, `classMapFK`, `userFK`) VALUES
(4, 'vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, Luis, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio', 7, 5),
(15, 'Pedro gbr, Heron, Luis Ganriel, Ianny , Kalleby , João gabriel, Iramar, Kaylanne, Weslley, Hugo, vazio, Guilherme, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio', 23, 1),
(16, 'Guilherme, Heron, Ianny , Kalleby , Luis Ganriel, Pedro gbr, Iramar, Kaylanne, Weslley, Hugo, vazio, João gabriel, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio, vazio', 23, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `vision` tinyint(1) NOT NULL,
  `height` tinyint(1) NOT NULL,
  `acessibility` tinyint(1) NOT NULL,
  `priority` int(11) NOT NULL,
  `classStudentFK` int(11) NOT NULL,
  `userFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `students`
--

INSERT INTO `students` (`id`, `student`, `vision`, `height`, `acessibility`, `priority`, `classStudentFK`, `userFK`) VALUES
(3, 'João Gabriel Barbosa Da Silva', 1, 1, 2, 2, 5, 3),
(4, 'TeuTi', 1, 1, 1, 1, 5, 3),
(5, 'JojoGbr', 1, 1, 1, 1, 5, 3),
(9, 'Chiquin dos Peixe', 1, 2, 2, 3, 5, 3),
(10, 'Luis', 1, 2, 2, 3, 7, 5),
(11, 'ZePqn', 2, 2, 2, 4, 5, 3),
(12, 'Aluno', 1, 1, 1, 1, 8, 2),
(24, 'Serginho', 2, 1, 2, 5, 12, 6),
(25, 'Guilherme', 1, 2, 1, 1, 12, 6),
(26, 'Kauê', 2, 1, 2, 5, 12, 6),
(27, 'Luis', 2, 1, 2, 5, 12, 6),
(28, 'Irama', 1, 1, 1, 1, 12, 6),
(29, 'Nilto', 2, 1, 2, 5, 12, 6),
(30, 'Joao', 1, 1, 1, 1, 12, 6),
(31, 'Diego', 1, 2, 1, 1, 12, 6),
(46, 'WaveIGL', 1, 1, 1, 1, 12, 6),
(47, 'Nobru', 1, 1, 1, 1, 12, 6),
(48, 'Piuzinho', 1, 1, 1, 1, 12, 6),
(49, 'Júnior', 1, 1, 1, 1, 12, 6),
(50, 'GADGADG', 1, 1, 1, 1, 12, 6),
(51, 'HASDGHAGH', 1, 1, 1, 1, 12, 6),
(52, 'ASFHASFH', 2, 2, 2, 4, 12, 6),
(53, 'ADFGADG', 1, 1, 1, 1, 12, 6),
(60, 'Guilherme', 1, 1, 2, 2, 23, 1),
(61, 'Weslley', 2, 1, 2, 5, 23, 1),
(62, 'Hugo', 2, 1, 2, 5, 23, 1),
(63, 'Kaylanne', 2, 2, 2, 4, 23, 1),
(64, 'Ianny ', 1, 2, 2, 3, 23, 1),
(65, 'Iramar', 1, 1, 2, 2, 23, 1),
(66, 'Luis Ganriel', 1, 2, 2, 3, 23, 1),
(67, 'Pedro gbr', 1, 1, 2, 2, 23, 1),
(68, 'Kalleby ', 1, 2, 2, 3, 23, 1),
(69, 'João gabriel', 1, 1, 2, 2, 23, 1),
(71, 'Heron', 1, 2, 2, 3, 23, 1),
(72, 'Aluno', 1, 1, 1, 1, 24, 4),
(75, 'Alice', 1, 2, 2, 3, 25, 8),
(76, 'Ana cecilia', 1, 2, 2, 3, 25, 8),
(77, 'Davi Gomes', 2, 1, 2, 5, 25, 8),
(78, 'Sergio', 2, 1, 2, 5, 25, 8),
(79, 'Carlos Eduardo ', 1, 2, 2, 3, 25, 8),
(80, 'Daniel ', 1, 2, 2, 3, 25, 8),
(81, 'Felipe', 2, 1, 2, 5, 25, 8),
(82, 'Enzo', 1, 1, 2, 2, 25, 8),
(83, 'Nadia', 2, 2, 2, 4, 25, 8),
(84, 'Hugo', 2, 1, 2, 5, 25, 8),
(85, 'Diego', 1, 1, 2, 2, 25, 8),
(86, 'Iramar', 1, 1, 2, 2, 25, 8),
(87, 'Nilton', 2, 1, 2, 5, 25, 8),
(88, 'Rafael', 2, 2, 2, 4, 25, 8),
(89, 'Gabriel Gonsalves ', 2, 2, 2, 4, 25, 8),
(90, 'Gotardo', 2, 2, 2, 4, 25, 8),
(91, 'Guilherme', 1, 1, 2, 2, 25, 8),
(92, 'Gustavo', 1, 1, 2, 2, 25, 8),
(93, 'Heron', 2, 1, 2, 5, 25, 8),
(94, 'Ianny', 2, 2, 2, 4, 25, 8),
(95, 'João Gabriel', 1, 1, 2, 2, 25, 8),
(96, 'Jose Vinicius', 1, 1, 2, 2, 25, 8),
(97, 'Kalleby ', 1, 1, 1, 1, 25, 8),
(98, 'Kaue', 2, 1, 2, 5, 25, 8),
(99, 'Kaylanne', 2, 2, 2, 4, 25, 8),
(102, 'Keven', 1, 1, 2, 2, 25, 8),
(103, 'Luis Gabriel', 2, 1, 2, 5, 25, 8),
(104, 'Mabel', 1, 2, 2, 3, 25, 8),
(105, 'Maria Eduarda', 2, 2, 2, 4, 25, 8),
(106, 'Leticia', 1, 2, 2, 3, 25, 8),
(108, 'Williane', 1, 2, 2, 3, 25, 8),
(109, 'Mauro', 2, 2, 2, 4, 25, 8),
(110, 'Nicoly', 1, 2, 2, 3, 25, 8),
(111, 'Paulo', 1, 1, 2, 2, 25, 8),
(112, 'Pedro Gabriel', 1, 1, 2, 2, 25, 8),
(114, 'Perla', 1, 2, 2, 3, 25, 8),
(115, 'Raniere ', 2, 1, 2, 5, 25, 8),
(116, 'Thais', 1, 2, 2, 3, 25, 8),
(117, 'Natan', 2, 2, 2, 4, 25, 8),
(118, 'Wanisse', 1, 2, 2, 3, 25, 8),
(119, 'Weslley', 2, 1, 2, 5, 25, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `email`) VALUES
(1, 'admin2', '202cb962ac59075b964b07152d234b70', 'admin2@gmail.com'),
(2, 'adminSena', '7968acaec7fe7c945b22ad3ba00e1a34', 'admin123@gmail.com'),
(3, 'JojoGbr', '21232f297a57a5a743894a0e4a801fc3', 'joao.gbr190@gmail.com'),
(4, 'Tar', 'e8d95a51f3af4a3b134bf6bb680a213a', 'pedro@email.com'),
(5, 'Luis', '827ccb0eea8a706c4c34a16891f84e7b', 'luisgabrielwg04@gmail.com'),
(6, 'Júnior', 'aa1bf4646de67fd9086cf6c79007026c', 'iramarjunhorveras@gmail.com'),
(7, 'JUNIO2', 'aa1bf4646de67fd9086cf6c79007026c', 'Jnior@ADGADG.COM'),
(8, 'Guilherme', '202cb962ac59075b964b07152d234b70', 'gerente@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `classRoom`
--
ALTER TABLE `classRoom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userFK` (`userFK`);

--
-- Índices para tabela `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`idMap`),
  ADD KEY `classMapFK` (`classMapFK`),
  ADD KEY `userFK` (`userFK`);

--
-- Índices para tabela `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classStudentFK` (`classStudentFK`),
  ADD KEY `userFK` (`userFK`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classRoom`
--
ALTER TABLE `classRoom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `map`
--
ALTER TABLE `map`
  MODIFY `idMap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `classRoom`
--
ALTER TABLE `classRoom`
  ADD CONSTRAINT `classRoom_ibfk_1` FOREIGN KEY (`userFK`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `map`
--
ALTER TABLE `map`
  ADD CONSTRAINT `map_ibfk_1` FOREIGN KEY (`classMapFK`) REFERENCES `classRoom` (`id`),
  ADD CONSTRAINT `map_ibfk_2` FOREIGN KEY (`userFK`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`classStudentFK`) REFERENCES `classRoom` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`userFK`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
