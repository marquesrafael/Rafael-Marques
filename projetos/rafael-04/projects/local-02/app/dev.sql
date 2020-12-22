--
-- TABELA USUÁRIOS
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `situacao` int(25) NOT NULL DEFAULT 0,
  `cargo` int(25) NOT NULL DEFAULT 0,
  `avatar` varchar(255) DEFAULT '/files/img/comment_default-img.jpg',
  `registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- TABELA CARGOS
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cargos` (`id`, `nome`, `descricao`) VALUES
(0, 'Usuario', 'Usuário comum do site');

INSERT INTO `cargos` (`id`, `nome`, `descricao`) VALUES
(1, 'Administrador', 'Responsavel por toda administração do site');

INSERT INTO `cargos` (`id`, `nome`, `descricao`) VALUES
(2, 'Desenvolvedor', 'Responsavel por todo o site');

ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- TABELA SISTEMA
--

CREATE TABLE `sistema` (
  `id` int(11) NOT NULL,
  `website` varchar(255) NOT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `whats` varchar(255) NOT NULL,
  `endereco` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `sistema`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- TABELA FUNCIONARIOS
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `situacao` int(25) NOT NULL DEFAULT 0,
  `cargo` int(25) NOT NULL DEFAULT 0,
  `avatar` varchar(255) DEFAULT '/files/img/comment_default-img.jpg',
  `registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;