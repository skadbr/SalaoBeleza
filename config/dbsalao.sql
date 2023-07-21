-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Fev-2020 às 12:36
-- Versão do servidor: 10.4.8-MariaDB-log
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbsalao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `title` text DEFAULT NULL,
  `allday` tinyint(1) DEFAULT NULL,
  `idColab` int(11) NOT NULL,
  `idCli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCli` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `imagem` varchar(150) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Estrutura da tabela `colaborador`
--

CREATE TABLE `colaborador` (
  `idColab` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `imagem` varchar(150) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `colaborador`
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `itenstransacao`
--

CREATE TABLE `itenstransacao` (
  `id` int(11) UNSIGNED NOT NULL,
  `idAgenda` int(11) DEFAULT NULL,
  `idCli` int(11) DEFAULT NULL,
  `idColab` int(11) DEFAULT NULL,
  `idServ` int(11) DEFAULT NULL,
  `idProdt` int(11) DEFAULT NULL,
  `qtd` int(11) NOT NULL,
  `valor` decimal(13,2) DEFAULT NULL,
  `descProdtServ` varchar(100) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itenstransacao`
--


--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProdt` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `vlrFornecedor` decimal(11,2) NOT NULL,
  `vlrVenda` decimal(11,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProdt`, `descricao`, `vlrFornecedor`, `vlrVenda`, `created`, `updated`) VALUES
(1, 'Reconstrutor', '1.00', '2.00', '2020-01-25 14:22:10', '2020-01-25 14:22:10'),
(2, 'Iogurte', '1.00', '2.00', '2020-01-25 14:22:12', '2020-01-25 14:22:12'),
(3, 'hidratante', '1.00', '2.00', '2020-01-25 14:22:13', '2020-01-25 14:22:13'),
(4, 'shampoo xpto', '1.00', '2.00', '2020-01-25 14:22:14', '2020-01-25 14:22:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idServ` int(6) UNSIGNED NOT NULL,
  `descr` varchar(100) NOT NULL,
  `valbase` decimal(13,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`idServ`, `descr`, `valbase`, `created`, `updated`) VALUES
(1, '(CORTES) - Corte Feminino', '20.00', '2020-01-26 12:38:48', '2020-01-26 12:38:48'),
(2, '(CORTES) - Corte Masculino', '20.00', '2020-01-26 12:38:48', '2020-01-26 12:38:48'),
(3, '(CORTES) - Corte Infantil', '22.00', '2020-01-26 12:38:48', '2020-01-26 12:38:48'),
(4, '(CORTES) - Franja', '12.00', '2020-01-26 12:38:48', '2020-01-26 12:38:48'),
(5, '(CORTES) - Higienização Capilar', '8.00', '2020-01-26 12:38:48', '2020-01-26 12:38:48'),
(6, '(ESCOVA DEFINITIVA) - Secagem', '14.00', '2020-01-26 12:38:48', '2020-01-26 12:38:48'),
(7, '(ESCOVA DEFINITIVA) - Médio', '299.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(8, '(ESCOVA DEFINITIVA) - Longo', '350.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(9, '(ESCOVA DEFINITIVA) - Extra-longo', '400.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(10, '(ESCOVA DEFINITIVA) - Retoque de Raiz (até 3 meses após)', '180.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(11, '(ESCOVA DEFINITIVA) - Teste da Escova Definitiva', '100.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(12, '(ESCOVAR E MODELAR) - Escova Curto', '19.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(13, '(ESCOVAR E MODELAR) - Escova Médio', '23.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(14, '(ESCOVAR E MODELAR) - Escova Longo', '28.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(15, '(ESCOVAR E MODELAR) - Escova Extra-longo (a partir de)', '35.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(16, '(ESCOVAR E MODELAR) - Escova em Mega-hair (a partir de)', '50.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(17, '(ESCOVAR E MODELAR) - Piastra e Baby Liss (após escova)', '14.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(18, '(ESCOVAR E MODELAR) - Piastra (curto sem escova)', '20.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(19, '(ESCOVAR E MODELAR) - Piastra (longo sem escova)', '26.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(20, '(ESCOVAR E MODELAR) - Baby Liss (sem escova)', '30.00', '2020-01-26 12:38:49', '2020-01-26 12:38:49'),
(21, '(RECONSTRUÇÕES) - Cauterização – Curto', '70.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(22, '(RECONSTRUÇÕES) - Cauterização – Médio', '90.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(23, '(RECONSTRUÇÕES) - Cauterização – Longo', '95.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(24, '(RECONSTRUÇÕES) - Cauterização – Extra-longo', '100.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(25, '(RECONSTRUÇÕES) - Plástica dos Fios – Curto', '65.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(26, '(RECONSTRUÇÕES) - Plástica dos Fios – Médio', '75.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(27, '(RECONSTRUÇÕES) - Plástica dos Fios – Longo', '90.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(28, '(RELAXAMENTO E ALISAMENTO) - Curto', '60.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(29, '(RELAXAMENTO E ALISAMENTO) - Médio', '75.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(30, '(RELAXAMENTO E ALISAMENTO) - Longo', '90.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(31, '(RELAXAMENTO E ALISAMENTO) - Extra-longo', '105.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(32, '(TRATAMENTOS E HIDRATAÇÕES) - Escova de Brilho – Curto', '39.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(33, '(TRATAMENTOS E HIDRATAÇÕES) - Escova de Brilho – Médio', '45.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(34, '(TRATAMENTOS E HIDRATAÇÕES) - Escova de Brilho – Longo', '55.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(35, '(TRATAMENTOS E HIDRATAÇÕES) - Escova de Brilho – Extra-longo', '60.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(36, '(TRATAMENTOS E HIDRATAÇÕES) - Escova Inteligente – Curto', '80.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(37, '(TRATAMENTOS E HIDRATAÇÕES) - Escova Inteligente – Médio', '95.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(38, '(TRATAMENTOS E HIDRATAÇÕES) - Escova Inteligente – Longo', '120.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(39, '(TRATAMENTOS E HIDRATAÇÕES) - Escova Inteligente – Extra-longo', '150.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(40, '(TRATAMENTOS E HIDRATAÇÕES) - Escova Botox – Curto', '70.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(41, '(TRATAMENTOS E HIDRATAÇÕES) - Escova Botox – Médio', '85.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(42, '(TRATAMENTOS E HIDRATAÇÕES) - Escova Botox – Longo', '110.00', '2020-01-26 12:38:50', '2020-01-26 12:38:50'),
(43, '(TRATAMENTOS E HIDRATAÇÕES) - Escova Botox – Extra-longo', '140.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(44, '(TONALIZANTES E COLORAÇÕES) - Retoque de raiz (trazendo a tinta)', '20.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(45, '(TONALIZANTES E COLORAÇÕES) - Coloração sem secagem (trazendo a tinta)', '25.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(46, '(TONALIZANTES E COLORAÇÕES) - Curto', '50.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(47, '(TONALIZANTES E COLORAÇÕES) - Médio', '62.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(48, '(TONALIZANTES E COLORAÇÕES) - Longo', '75.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(49, '(TONALIZANTES E COLORAÇÕES) - Extra-longo', '100.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(50, '(TONALIZANTES E COLORAÇÕES) - Decapagem', '55.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(51, '(TONALIZANTES E COLORAÇÕES) - Descoloração', '75.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(52, '(TONALIZANTES E COLORAÇÕES) - Pré-pigmentação', '50.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(53, '(FESTAS E CASAMENTOS) - Penteado Social', '50.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(54, '(FESTAS E CASAMENTOS) - Penteado Festa', '65.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(55, '(FESTAS E CASAMENTOS) - Penteado (Casamento e Debutantes)', '100.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(56, '(FESTAS E CASAMENTOS) - Maquiagem Social', '55.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(57, '(FESTAS E CASAMENTOS) - Maquiagem (Casamento e Debutantes)', '68.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(58, '(FESTAS E CASAMENTOS) - Maquiagem Infantil', '40.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(59, '(MECHAS) - Californiana', '90.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(60, '(MECHAS) - Na Touca / No Papel Curto', '80.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(61, '(MECHAS) - Na Touca / No Papel Medio', '105.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(62, '(MECHAS) - Na Touca / No Papel Longo', '115.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(63, '(MECHAS) - Na Touca /No Papel Extra-longo  ', '130.00', '2020-01-26 12:38:51', '2020-01-26 12:38:51'),
(64, '(MANICURAS E PEDICURAS) - Pé ou Mão (segunda a quinta)', '12.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(65, '(MANICURAS E PEDICURAS) - Pé ou Mão (sexta ou sábado)', '17.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(66, '(MANICURAS E PEDICURAS) - Pé e mão (segunda a quinta) com a mesma manicura', '24.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(67, '(MANICURAS E PEDICURAS) - Pé e mão (sexta ou sábado) com a mesma manicura', '28.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(68, '(MANICURAS E PEDICURAS) - Francesinha na mão', '4.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(69, '(MANICURAS E PEDICURAS) - Francesinha no pé', '4.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(70, '(MANICURAS E PEDICURAS) - Unhas de Acrigel', '85.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(71, '(MANICURAS E PEDICURAS) - Manutenção Acrigel (incluindo cutilagem e esmaltação)', '75.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(72, '(MANICURAS E PEDICURAS) - Prótese por Unha', '18.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(73, '(EMBELEZAMENTO DO OLHAR) - Henna em Sobrancelhas', '30.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(74, '(EMBELEZAMENTO DO OLHAR) - Limpeza de Pele', '55.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(75, '(EMBELEZAMENTO DO OLHAR) - Colocação de Cílios Fio a Fio', '85.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(76, '(DEPILAÇÃO) - Axila', '16.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(77, '(DEPILAÇÃO) - Buço', '10.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(78, '(DEPILAÇÃO) - Braços', '18.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(79, '(DEPILAÇÃO) - Meia Perna', '22.00', '2020-01-26 12:38:52', '2020-01-26 12:38:52'),
(80, '(DEPILAÇÃO) - Nádegas', '26.00', '2020-01-26 12:38:53', '2020-01-26 12:38:53'),
(81, '(DEPILAÇÃO) - Nariz', '14.00', '2020-01-26 12:38:53', '2020-01-26 12:38:53'),
(82, '(DEPILAÇÃO) - Perna Inteira', '30.00', '2020-01-26 12:38:53', '2020-01-26 12:38:53'),
(83, '(DEPILAÇÃO) - Queixo', '12.00', '2020-01-26 12:38:53', '2020-01-26 12:38:53'),
(84, '(DEPILAÇÃO) - Rosto', '26.00', '2020-01-26 12:38:53', '2020-01-26 12:38:53'),
(85, '(DEPILAÇÃO) - Sobrancelha com Cera', '16.00', '2020-01-26 12:38:53', '2020-01-26 12:38:53'),
(86, '(DEPILAÇÃO) - Sobrancelha com Pinça', '14.00', '2020-01-26 12:38:53', '2020-01-26 12:38:53'),
(87, '(DEPILAÇÃO) - Tricotomia (púbis+virilha+ânus)', '40.00', '2020-01-26 12:38:53', '2020-01-26 12:38:53'),
(88, '(DEPILAÇÃO) - Virilha', '22.00', '2020-01-26 12:38:53', '2020-01-26 12:38:53'),
(89, '(DEPILAÇÃO) - Virilha Cavada', '30.00', '2020-01-26 12:38:53', '2020-01-26 12:38:53'),
(90, '(DEPILAÇÃO) - Barba com Cera', '42.00', '2020-01-26 12:38:53', '2020-01-26 12:38:53'),
(91, '(DEPILAÇÃO) - Barba com Navalha', '20.00', '2020-01-26 12:38:53', '2020-01-26 12:38:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacao`
--

CREATE TABLE `transacao` (
  `id` int(11) UNSIGNED NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entrada_saida` char(7) NOT NULL,
  `idAgenda` int(11) DEFAULT NULL,
  `idCli` int(11) DEFAULT NULL,
  `idColab` int(11) DEFAULT NULL,
  `valor` decimal(13,2) DEFAULT NULL,
  `descTransacao` varchar(250) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('m','f') COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_func` (`idColab`),
  ADD KEY `id_cli` (`idCli`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCli`);

--
-- Índices para tabela `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`idColab`);

--
-- Índices para tabela `itenstransacao`
--
ALTER TABLE `itenstransacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ixAgenda` (`idAgenda`),
  ADD KEY `ixidCli` (`idCli`) USING BTREE,
  ADD KEY `ixidColab` (`idColab`) USING BTREE,
  ADD KEY `ixidProdt` (`idProdt`) USING BTREE,
  ADD KEY `ixidServ` (`idServ`) USING BTREE;

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProdt`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idServ`);

--
-- Índices para tabela `transacao`
--
ALTER TABLE `transacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de tabela `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `idColab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `itenstransacao`
--
ALTER TABLE `itenstransacao`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProdt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `idServ` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de tabela `transacao`
--
ALTER TABLE `transacao`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
