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

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `start`, `end`, `title`, `allday`, `idColab`, `idCli`) VALUES
(221, '2019-12-19 00:00:00', '2019-12-20 00:00:00', 'Novo titulo Uu', 1, 1, 3),
(234, '2019-12-19 12:00:00', '2019-12-19 13:30:00', 'arrumei', 0, 2, 2),
(238, '2019-12-18 15:00:00', '2019-12-18 16:00:00', 'mao pé', 0, 3, 1),
(239, '2019-12-17 12:00:00', '2019-12-17 13:30:00', 'Agora 1 e 1', 0, 1, 1),
(313, '2019-12-21 09:00:00', '2019-12-21 10:00:00', 'cabelo', 0, 2, 1),
(314, '2019-12-17 10:00:00', '2019-12-17 10:30:00', 'Highcharts Demo', 0, 3, 1),
(317, '2019-12-20 11:30:00', '2019-12-20 13:30:00', 'evento criado novo', 0, 3, 1),
(318, '2019-12-20 00:00:00', '2019-12-21 00:00:00', 'Dia inteiro Novo', 1, 2, 3),
(319, '2019-12-20 00:00:00', '2019-12-21 00:00:00', 'dia inteiro novo novo 3, 4', 1, 4, 3),
(320, '2019-12-20 09:00:00', '2019-12-20 10:00:00', 'dia inteiro novo novo novo', 0, 4, 4),
(321, '2019-12-21 00:00:00', '2019-12-22 00:00:00', 'envento diario sabado inteiro 1,2', 1, 2, 1),
(322, '2019-12-20 00:00:00', '2019-12-21 00:00:00', 'Novo evento dia inteiro sexta dia 20 4,5', 1, 5, 4),
(323, '2019-12-20 14:30:00', '2019-12-20 15:00:00', 'evento 1/2hora dia 20 7,8', 0, 8, 7),
(324, '2019-12-21 16:00:00', '2019-12-21 17:00:00', 'Sabado a tardinha (3 e 1) agora', 0, 3, 1),
(325, '2019-12-21 12:00:00', '2019-12-21 13:00:00', 'sabado meio dia 2,3 agora até 13h', 0, 3, 2),
(326, '2019-12-21 10:30:00', '2019-12-21 11:00:00', 'teste session', 0, 2, 2),
(327, '2019-12-21 11:00:00', '2019-12-21 11:30:00', 'Outro teste session 1,3', 0, 3, 1),
(328, '2019-12-21 14:30:00', '2019-12-21 15:00:00', 'Novo teste session', 0, 3, 2),
(329, '2019-12-21 13:30:00', '2019-12-21 14:00:00', 'mais 1 teste de session', 0, 3, 2),
(330, '2019-12-23 09:00:00', '2019-12-23 11:30:00', 'teste domingo updated dona celia 1', 0, 3, 1),
(333, '2019-12-24 12:30:00', '2019-12-24 13:30:00', 'Evento novo UU cliente 1 colab 2 alterado 3 e 3', 0, 3, 3),
(336, '2020-01-09 10:00:00', '2020-01-09 12:30:00', '10h do dia 13', 0, 1, 54),
(337, '2019-12-28 00:00:00', '2019-12-29 00:00:00', 'sabado dia inteiro', 1, 1, 2),
(338, '2020-01-06 09:00:00', '2020-01-06 10:00:00', 'novo', 0, 1, 2),
(339, '2020-01-09 13:00:00', '2020-01-09 14:00:00', 'teste de mov - blz deu certo movimentar dia', 0, 2, 55),
(340, '2020-01-07 12:00:00', '2020-01-07 13:00:00', 'unha xxxx', 0, 1, 2),
(341, '2020-01-08 10:00:00', '2020-01-08 11:00:00', 'outra coisa', 0, 2, 40),
(359, '2020-01-11 15:00:00', '2020-01-11 15:30:00', 'novo via autom', 0, 2, 73),
(360, '2020-01-11 11:00:00', '2020-01-11 11:30:00', 'oba oba', 0, 2, 74),
(361, '2020-01-11 12:00:00', '2020-01-11 12:30:00', 'blz?', 0, 1, 75),
(362, '2020-01-11 12:30:00', '2020-01-11 13:00:00', 'OAB OBA 2', 0, 2, 1),
(363, '2020-01-10 10:00:00', '2020-01-10 10:30:00', 'Servir sopa quente', 0, 2, 3),
(364, '2020-01-11 15:30:00', '2020-01-11 16:00:00', 'fazer caca', 0, 0, 77),
(365, '2020-01-11 16:30:00', '2020-01-11 17:00:00', 'novo', 0, 2, 77),
(366, '2020-01-12 08:00:00', '2020-01-12 08:30:00', 'ultimo teste', 0, 0, 78),
(367, '2020-01-12 09:30:00', '2020-01-12 10:00:00', 'agora é ultimo', 0, 2, 79),
(368, '2020-01-12 10:30:00', '2020-01-12 11:00:00', 'teste para mensagem', 0, 3, 79),
(369, '2020-01-12 11:30:00', '2020-01-12 12:30:00', 'Pe e mão', 0, 2, 80),
(370, '2020-01-16 14:00:00', '2020-01-16 15:00:00', 'cabelo', 0, 2, 50),
(371, '2020-01-13 11:00:00', '2020-01-13 11:30:00', 'unha', 0, 2, 81),
(372, '2020-01-22 09:00:00', '2020-01-22 10:00:00', 'sfsafda', 0, 2, 36),
(386, '2020-01-30 12:00:00', '2020-01-30 12:30:00', 'Srta Xpto/cliente 83', 0, 3, 83),
(387, '2020-01-28 13:00:00', '2020-01-28 13:30:00', 'Monica/outro cli novo agora', 0, 2, 85),
(388, '2020-01-28 14:00:00', '2020-01-28 14:30:00', 'Sergio/Eloá Azambuja', 0, 1, 50),
(389, '2020-01-28 11:00:00', '2020-01-28 12:00:00', 'Srta Xpto/Maria Eduarda Arruda', 0, 3, 46),
(390, '2020-01-28 16:30:00', '2020-01-28 17:00:00', '', 0, 2, 50),
(392, '2020-01-28 15:00:00', '2020-01-28 15:30:00', 'Monica/Dona Julia Novaes de Souza', 0, 2, 3),
(393, '2020-01-30 12:00:00', '2020-01-30 12:30:00', 'Srta Xpto/cliente 83', 0, 3, 83),
(395, '2020-02-02 10:00:00', '2020-02-02 10:30:00', 'Srta Xpto/que isso', 0, 3, 108),
(399, '2020-02-01 09:00:00', '2020-02-01 09:30:00', 'Srta Xpto/corrigido via script', 0, 3, 50),
(400, '2020-02-01 14:00:00', '2020-02-01 15:00:00', 'Srta Xpto/Novo cliente tudo', 0, 3, 87),
(401, '2020-01-31 08:00:00', '2020-01-31 08:30:00', 'Srta Xpto/incluido via form agenda3', 0, 3, 90),
(402, '2020-02-01 11:30:00', '2020-02-01 12:00:00', 'Srta Xpto/incluido via form agenda', 0, 3, 88),
(404, '2020-02-01 13:30:00', '2020-02-01 14:00:00', 'Srta Xpto/Luiza Andrade', 0, 3, 41),
(411, '2020-02-01 15:30:00', '2020-02-01 16:00:00', 'Srta Xpto/Sergio Kadobayashi', 0, 3, 102),
(412, '2020-02-01 12:30:00', '2020-02-01 13:00:00', 'Monica/Sergio Kadobayashi', 0, 2, 103),
(413, '2020-02-01 16:30:00', '2020-02-01 17:00:00', 'Monica/Sergio Kadobayashi1', 0, 2, 104),
(414, '2020-02-01 17:00:00', '2020-02-01 17:30:00', 'Monica/azambuja', 0, 2, 105),
(415, '2020-02-02 14:00:00', '2020-02-02 14:30:00', 'Srta Xpto/Sergio Kadobayashi2', 0, 3, 107),
(416, '2020-02-03 12:30:00', '2020-02-03 13:00:00', 'Srta Xpto/Sergio Kadobayashi2', 0, 3, 107),
(425, '2020-02-03 00:00:00', '2020-02-04 00:00:00', 'Sergio/Balcão', 1, 1, 109),
(426, '2020-02-03 14:30:00', '2020-02-03 15:00:00', 'Sergio/novo cliente', 0, 1, 106),
(427, '2020-02-03 15:30:00', '2020-02-03 16:00:00', 'Sergio/novo de tudo', 0, 1, 76),
(428, '2020-02-03 09:00:00', '2020-02-03 09:30:00', 'Sergio/cliente 85', 0, 1, 85),
(429, '2020-02-03 10:00:00', '2020-02-03 10:30:00', 'Monica/novo de tudo', 0, 2, 76),
(430, '2020-02-03 10:00:00', '2020-02-03 10:30:00', 'Monica/novo de tudo', 0, 2, 76),
(431, '2020-02-03 10:00:00', '2020-02-03 10:30:00', 'Monica/novo de tudo', 0, 2, 76),
(432, '2020-02-03 10:00:00', '2020-02-03 10:30:00', 'Monica/Sergio Kadobayashi1', 0, 2, 104),
(433, '2020-02-03 10:30:00', '2020-02-03 11:00:00', 'Monica/novo de tudo', 0, 2, 76),
(434, '2020-02-03 13:00:00', '2020-02-03 13:30:00', 'Monica/Sergio Kadobayashi1', 0, 2, 104),
(435, '2020-02-03 16:00:00', '2020-02-03 16:30:00', 'Monica/err', 0, 2, 111),
(436, '2020-02-03 16:30:00', '2020-02-03 17:00:00', 'Sergio/er', 0, 1, 110);

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
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCli`, `nome`, `celular`, `imagem`, `created`, `modified`) VALUES
(1, 'Dona Celia', '98888-88888888', '2019-12-26-20-57-13.gif', '2019-12-27 00:19:15', '2019-12-27 00:19:15'),
(2, 'Dona Maria', '97777-77777777', '2020-01-09-21-25-47.gif', '2019-12-27 23:21:24', '2020-01-09 23:25:48'),
(3, 'Dona Julia Novaes de Souza', '8888', '2019-12-27-22-35-58.jpg', '2019-12-28 00:35:58', '2020-01-12 04:18:12'),
(33, 'desconhecido', '00000', '', '2019-12-28 02:27:57', '2019-12-28 02:27:57'),
(34, 'corrigido via script', '995400307', '', '2019-12-28 02:39:43', '2020-02-01 14:36:24'),
(35, 'Valentina Alegria', '944374644', '', '2019-12-28 02:39:43', '2019-12-28 02:39:43'),
(36, 'Laura Alencastro', '950995886', '', '2019-12-28 02:39:44', '2019-12-28 02:39:44'),
(37, 'corrigido via script', '997170762', '', '2019-12-28 02:39:44', '2020-02-01 14:36:24'),
(38, 'Manuela Alves', '953761613', '', '2019-12-28 02:39:44', '2019-12-28 02:39:44'),
(39, 'Júlia Alvim', '971620835', '', '2019-12-28 02:39:44', '2019-12-28 02:39:44'),
(40, 'corrigido via script', '901084776', '', '2019-12-28 02:39:44', '2020-02-01 14:36:24'),
(41, 'Luiza Andrade', '949130139', '', '2019-12-28 02:39:44', '2019-12-28 02:39:44'),
(42, 'corrigido via script', '990466921', '', '2019-12-28 02:39:44', '2020-02-01 14:36:24'),
(43, 'Lorena Aparício', '948269061', '', '2019-12-28 02:39:44', '2019-12-28 02:39:44'),
(44, 'Lívia Apolinário', '995045550', '', '2019-12-28 02:39:44', '2019-12-28 02:39:44'),
(45, 'Giovanna Araújo', '978360231', '', '2019-12-28 02:39:44', '2019-12-28 02:39:44'),
(46, 'dona estava vazio', '(41) 9 8205-7754', '', '2019-12-28 02:39:44', '2020-01-28 20:41:25'),
(47, 'Beatriz Assis', '959407936', '', '2019-12-28 02:39:44', '2019-12-28 02:39:44'),
(48, 'Maria Clara Assunção', '950048173', '', '2019-12-28 02:39:45', '2019-12-28 02:39:45'),
(49, 'Cecília Ávila', '964119269', '', '2019-12-28 02:39:45', '2019-12-28 02:39:45'),
(50, '', '940239621', '', '2019-12-28 02:39:45', '2020-02-02 11:35:24'),
(51, 'Lara Baptista', '990186557', '', '2019-12-28 02:39:45', '2019-12-28 02:39:45'),
(52, 'Maria Júlia Barreto', '953510413', '2019-12-28-02-46-40.jpg', '2019-12-28 02:39:45', '2019-12-28 04:46:40'),
(53, 'Isadora Barros', '951699046', '', '2019-12-28 02:39:45', '2019-12-28 02:39:45'),
(54, 'corrigido via script', '(41) 9 8888-7777', '2019-12-28-02-44-07.jpg', '2019-12-28 02:39:45', '2020-02-01 14:36:24'),
(55, 'Emanuelly Belchior', '948945998', '', '2019-12-28 02:39:45', '2019-12-28 02:39:45'),
(56, 'Ana Júlia Belém', '990538952', '2019-12-28-02-01-57.jpg', '2019-12-28 02:39:45', '2019-12-28 04:01:57'),
(69, '68', 'aaa', '2020-01-11-16-42-28.jpg', '2020-01-11 18:42:28', '2020-01-11 18:42:28'),
(70, 'setenta', '70', '2020-01-11-16-43-34.png', '2020-01-11 18:42:53', '2020-01-11 18:43:34'),
(72, 'corrigido via script', 'inserido automaticam', '', '2020-01-11 20:42:22', '2020-02-01 14:36:24'),
(73, 'setenta e tres', '987', '', '2020-01-11 20:45:57', '2020-01-24 19:42:56'),
(74, 'corrigido via script', 'inserido automaticam', '', '2020-01-11 20:51:50', '2020-02-01 14:36:24'),
(75, 'eva silva', '9999', '', '2020-01-11 20:56:58', '2020-01-12 04:17:57'),
(76, 'novo de tudo', '9999', '', '2020-01-11 21:00:53', '2020-01-12 04:31:05'),
(77, 'Por que está sem nome?', '4199991234', '', '2020-01-12 02:40:26', '2020-01-15 14:05:11'),
(78, 'joaquina da silva', '999999999', '', '2020-01-12 02:42:49', '2020-01-12 02:42:49'),
(79, 'marilda da silva', '777', '', '2020-01-12 02:44:38', '2020-01-12 02:51:23'),
(80, 'arrumando nome', '9999', '2020-01-12-13-29-42.png', '2020-01-12 02:47:10', '2020-01-12 15:29:42'),
(81, 'josefa', '99999', '', '2020-01-17 02:17:45', '2020-01-17 02:17:45'),
(82, 'aff', '41 98857-6782', '', '2020-01-17 18:13:00', '2020-01-17 18:13:00'),
(83, 'corrigido via script', '9999999999', '', '2020-01-22 11:48:20', '2020-02-01 14:36:24'),
(84, 'cliente 84', 'novo cel', '', '2020-01-24 14:35:24', '2020-01-30 16:44:00'),
(85, 'cliente 85', '9999', '', '2020-01-24 20:07:23', '2020-01-30 16:43:52'),
(86, 'pq nome vazio?', '41988887777', '', '2020-01-26 10:42:31', '2020-01-30 12:36:49'),
(87, 'corrigido via script', '(12) 3 4567-8901', '', '2020-01-31 19:41:09', '2020-02-01 14:36:24'),
(88, 'corrigido via script', '(11) 1 1111-1111', '', '2020-01-31 19:57:09', '2020-02-01 14:36:24'),
(89, 'incluido via form agenda2', '(22) 2 2222-2222', '', '2020-01-31 20:50:54', '2020-01-31 20:50:54'),
(90, 'incluido via form agenda3', '(33) 3 3333-3333', '', '2020-01-31 20:52:21', '2020-01-31 20:52:21'),
(91, 'incluido via form agenda4', '(44) 4 4444-4444', '', '2020-01-31 20:53:16', '2020-01-31 20:53:16'),
(92, 'incluido via form agenda5', '(55) 5 5555-5555', '', '2020-01-31 21:01:29', '2020-01-31 21:01:29'),
(93, 'incluido via form agenda6', '(66) 6 6666-6666', '', '2020-01-31 21:11:53', '2020-01-31 21:11:53'),
(94, 'incluido via form agenda7', '(77) 7 7777-777', '', '2020-01-31 21:13:33', '2020-01-31 21:13:33'),
(95, 'incluido via form agenda8', '(88) 8 8888-8888', '', '2020-01-31 21:19:53', '2020-01-31 21:19:53'),
(96, 'incluido via form agenda9', '(99) 9 9999-9999', '', '2020-01-31 22:30:44', '2020-01-31 22:30:44'),
(97, 'incluido via form agenda10', '(10) 1 0101-0101', '', '2020-01-31 22:36:17', '2020-01-31 22:36:17'),
(98, 'incluido via form agenda11', '(11) 1 1111-1111', '', '2020-01-31 22:38:15', '2020-01-31 22:38:15'),
(99, 'incluido via form agenda12', '(12) 1 2121-2121', '', '2020-01-31 22:44:06', '2020-01-31 22:44:06'),
(100, 'incluido via form agenda13', '(13) 1 3131-3131', '', '2020-01-31 22:47:11', '2020-01-31 22:47:11'),
(101, 'corrigido via script', '(11) 1 1111-1111', '', '2020-02-01 00:02:58', '2020-02-01 14:36:24'),
(102, '', '(11) 1 1111-1111', '', '2020-02-01 14:42:28', '2020-02-01 14:42:35'),
(103, 'Sergio Kadobayashi', '(11) 1 1111-1111', '', '2020-02-01 14:43:04', '2020-02-01 14:43:04'),
(104, 'Sergio Kadobayashi1', '(22) 2 2222-2222', '', '2020-02-01 14:47:58', '2020-02-01 14:47:58'),
(105, 'azambuja', '(22) 2 2222-2222', '', '2020-02-01 14:51:19', '2020-02-01 14:51:19'),
(106, 'novo cliente', '(99) 9 9999-9999', '', '2020-02-01 15:17:29', '2020-02-01 15:17:29'),
(107, '', '(22) 2 2222-2222', '', '2020-02-02 11:37:32', '2020-02-03 12:14:05'),
(108, 'que isso', '', '', '2020-02-03 11:39:26', '2020-02-03 11:39:26'),
(109, 'Balcão', '', '', '2020-02-03 12:54:37', '2020-02-03 12:54:37'),
(110, 'er', '', '', '2020-02-03 20:39:04', '2020-02-03 20:39:04'),
(111, 'err', '', '', '2020-02-03 20:43:54', '2020-02-03 20:43:54');

-- --------------------------------------------------------

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

INSERT INTO `colaborador` (`idColab`, `nome`, `celular`, `imagem`, `created`, `modified`) VALUES
(1, 'Sergio', '41 98857-6782', '2020-01-06-02-37-09.jpg', '2020-01-06 01:13:13', '2020-01-06 01:37:09'),
(2, 'Monica', '990538952', '2020-01-06-02-36-52.jpg', '2020-01-06 01:13:13', '2020-01-06 01:36:52'),
(3, 'Srta Xpto', '987654321', '2020-01-06-02-33-22.jpg', '2020-01-06 01:13:13', '2020-01-06 01:33:22');

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

INSERT INTO `itenstransacao` (`id`, `idAgenda`, `idCli`, `idColab`, `idServ`, `idProdt`, `qtd`, `valor`, `descProdtServ`, `created`, `updated`) VALUES
(1, 388, 3, 1, 44, 0, 1, '20.12', 'Agendamento Sergio/Dona Julia Novaes de Souza', '2020-01-25 23:28:47', '2020-02-01 01:22:17'),
(5, 388, 3, 1, 29, 0, 1, '75.12', 'Agendamento Sergio/Dona Julia Novaes de Souza', '2020-01-26 00:13:02', '2020-02-01 01:22:17'),
(6, 388, 3, 1, 6, 0, 1, '14.12', 'Agendamento Sergio/Dona Julia Novaes de Souza', '2020-01-26 00:13:27', '2020-02-01 01:22:17'),
(7, 388, 3, 1, 56, 0, 1, '55.12', 'Agendamento Sergio/Dona Julia Novaes de Souza', '2020-01-26 00:57:24', '2020-02-01 01:22:17'),
(17, 389, 86, 3, 46, 0, 1, '50.00', 'Agendamento Srta Xpto/cliente xpto', '2020-01-26 13:25:08', '2020-02-01 01:22:17'),
(44, 389, 46, 3, 35, 0, 1, '60.00', 'Agendamento Srta Xpto/Maria Eduarda Arruda', '2020-01-27 20:40:29', '2020-02-01 01:22:17'),
(45, 389, 46, 3, 35, 0, 1, '60.00', 'Agendamento Srta Xpto/Maria Eduarda Arruda', '2020-01-27 20:45:58', '2020-02-01 01:22:17'),
(46, 389, 46, 3, 5, 0, 1, '8.00', 'Agendamento Srta Xpto/Maria Eduarda Arruda', '2020-01-27 20:47:08', '2020-02-01 01:22:17'),
(47, 389, 46, 3, 40, 0, 1, '70.00', 'Agendamento Srta Xpto/Maria Eduarda Arruda', '2020-01-27 20:47:45', '2020-02-01 01:22:17'),
(49, 388, 40, 1, 32, 0, 1, '39.00', 'Agendamento Sergio/Heloísa Amorim', '2020-01-28 20:12:29', '2020-02-01 01:22:17'),
(57, 386, 86, 2, 0, 4, 1, '4.00', 'Agendamento Monica/pq nome vazio?', '2020-01-30 12:38:23', '2020-02-01 01:22:17'),
(58, 386, 83, 3, 47, 0, 1, '62.00', 'Agendamento Srta Xpto/cliente 83', '2020-01-30 19:07:43', '2020-02-01 01:22:17'),
(59, 395, 50, 3, 0, 4, 1, '2.00', 'Agendamento Srta Xpto/Eloá Azambuja', '2020-01-31 14:45:52', '2020-02-01 01:22:17'),
(60, 395, 50, 3, 34, 0, 1, '55.00', 'Agendamento Srta Xpto/Eloá Azambuja', '2020-01-31 14:46:19', '2020-02-01 01:22:17'),
(64, 401, 88, 3, 33, 0, 1, '45.00', 'Agendamento Srta Xpto/incluido via form agenda', '2020-01-31 20:46:42', '2020-02-01 01:22:17'),
(65, 401, 88, 3, 0, 4, 1, '2.00', 'Agendamento Srta Xpto/incluido via form agenda', '2020-01-31 20:48:25', '2020-02-01 01:22:17'),
(88, 404, 48, 3, 36, 0, 1, '80.00', 'Agendamento Srta Xpto/Maria Clara Assunção', '2020-02-01 13:51:29', '2020-02-01 13:51:29'),
(89, 414, 105, 2, 35, 0, 1, '60.00', 'Agendamento Monica/azambuja', '2020-02-01 15:23:56', '2020-02-01 15:23:56'),
(90, 414, 105, 2, 0, 4, 1, '2.00', 'Agendamento Monica/azambuja', '2020-02-01 15:24:06', '2020-02-01 15:24:06'),
(91, 415, 107, 3, 34, 0, 1, '55.00', 'Agendamento Srta Xpto/Sergio Kadobayashi2', '2020-02-02 12:28:26', '2020-02-02 12:28:26'),
(94, 395, 50, 3, 5, 0, 1, '8.00', 'Agendamento Srta Xpto/Eloá Azambuja', '2020-02-02 12:34:40', '2020-02-02 12:34:40'),
(95, 416, 107, 3, 5, 0, 1, '8.00', 'Agendamento Srta Xpto/Sergio Kadobayashi2', '2020-02-02 12:37:17', '2020-02-02 12:37:17'),
(96, 416, 107, 3, 39, 0, 1, '150.00', 'Agendamento Srta Xpto/Sergio Kadobayashi2', '2020-02-02 12:38:03', '2020-02-02 12:38:03'),
(97, 415, 107, 3, 0, 3, 1, '1234.56', 'Agendamento Srta Xpto/Sergio Kadobayashi2', '2020-02-02 14:59:03', '2020-02-02 14:59:03'),
(98, 416, 107, 3, 36, 0, 1, '80.00', 'Agendamento Srta Xpto/Sergio Kadobayashi2', '2020-02-02 19:38:32', '2020-02-02 19:38:32'),
(99, 416, 107, 3, 0, 2, 1, '12.35', 'Agendamento Srta Xpto/Sergio Kadobayashi2', '2020-02-02 19:43:29', '2020-02-02 19:43:29'),
(100, 416, 107, 3, 39, 0, 6, '150.00', 'Agendamento Srta Xpto/Sergio Kadobayashi2', '2020-02-02 19:59:17', '2020-02-02 19:59:17'),
(109, 425, 109, 1, 0, 4, 1, '2.00', 'Agendamento Sergio/Balcão', '2020-02-03 14:43:27', '2020-02-03 14:43:27'),
(110, 426, 106, 1, 5, 0, 1, '8.00', 'Agendamento Sergio/novo cliente', '2020-02-03 14:55:17', '2020-02-03 14:55:17'),
(111, 427, 76, 1, 5, 0, 1, '8.00', 'Agendamento Sergio/novo de tudo', '2020-02-03 14:57:27', '2020-02-03 14:57:27'),
(112, 428, 85, 1, 0, 2, 1, '2.00', 'Agendamento Sergio/cliente 85', '2020-02-03 15:01:32', '2020-02-03 15:01:32'),
(113, 428, 85, 1, 5, 0, 1, '8.00', 'Agendamento Sergio/cliente 85', '2020-02-03 15:01:38', '2020-02-03 15:01:38'),
(115, 428, 85, 1, 15, 0, 2, '35.00', 'Agendamento Sergio/cliente 85', '2020-02-03 15:02:25', '2020-02-03 15:02:25'),
(116, 425, 109, 1, 0, 2, 2, '2.00', 'Agendamento Sergio/Balcão', '2020-02-03 15:12:33', '2020-02-03 15:12:33');

-- --------------------------------------------------------

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

--
-- Extraindo dados da tabela `transacao`
--

INSERT INTO `transacao` (`id`, `data`, `entrada_saida`, `idAgenda`, `idCli`, `idColab`, `valor`, `descTransacao`, `created`, `updated`) VALUES
(1, '2019-01-12 03:00:00', 'e', 339, 55, 3, '12123.45', 'Teste transacao', '2020-01-13 00:13:28', '2020-01-15 20:01:44'),
(11, '2019-12-31 12:31:02', 'e', 0, 56, 3, '234.56', 'nova transacao', '2020-01-14 11:56:57', '2020-01-15 20:01:14'),
(12, '2020-01-14 16:15:33', 'e', 0, 57, 3, '11234.56', 'nova transacao', '2020-01-14 12:16:17', '2020-01-14 14:57:06'),
(15, '2020-01-16 23:10:04', 's', 0, 40, 1, '85.64', 'nova transacao', '2020-01-14 12:35:24', '2020-01-16 19:11:10'),
(16, '0000-00-00 00:00:00', 'e', 0, 36, 3, '1.45', 'nova transacao 1', '2020-01-15 23:13:23', '2020-01-15 23:13:23'),
(19, '2020-01-16 22:55:05', 's', 0, 38, 3, '234.56', 'nova transacao', '2020-01-15 23:22:01', '2020-01-16 18:55:24'),
(23, '2020-01-16 18:21:13', 'e', 0, 1, 0, '1235.56', 'nova transacao', '2020-01-16 14:21:47', '2020-01-16 14:21:47'),
(24, '2020-01-16 23:10:04', 's', 0, 42, 0, '124.50', 'nova transacao upa', '2020-01-16 15:03:02', '2020-01-16 19:10:58'),
(25, '2020-01-23 13:17:17', 's', 0, 34, 0, '1287.65', 'nova transacao1', '2020-01-16 17:54:58', '2020-01-23 09:17:53'),
(26, '2020-01-25 16:43:05', 'e', 0, 55, 0, '123.56', '1', '2020-01-25 12:44:06', '2020-01-25 12:44:06'),
(27, '2020-01-25 16:54:02', 'e', 0, 0, 0, '1.24', 'nova transacao', '2020-01-25 12:55:06', '2020-01-25 12:55:06');

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
