--
-- Estrutura da tabela `dadoscards`
--

CREATE TABLE `dadoscards` (
  `id` int(8) NOT NULL,
  `nomeSala` varchar(20) NOT NULL,
  `quantAlunos` int(2) NOT NULL,
  `corHex` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Índices para tabela `dadoscards`
--
ALTER TABLE `dadoscards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dadoscards`
--
ALTER TABLE `dadoscards`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
