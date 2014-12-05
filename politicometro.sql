-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2014 at 08:37 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `politicometro`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
`id` int(11) NOT NULL,
  `autor` varchar(32) NOT NULL COMMENT 'username',
  `mensagem` mediumtext NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
`id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `conteudo` tinytext NOT NULL,
  `divulgador` varchar(32) NOT NULL COMMENT 'tem que ser username'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `politico`
--

CREATE TABLE IF NOT EXISTS `politico` (
  `nome` varchar(120) NOT NULL,
  `cargo` varchar(60) NOT NULL,
  `partido` varchar(10) NOT NULL,
  `registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lista os políticos cadastrados no portal';

--
-- Dumping data for table `politico`
--

INSERT INTO `politico` (`nome`, `cargo`, `partido`, `registro`) VALUES
('Geraldo Alckmin', 'Governador', 'PSDB', 2342343),
('Francisco Everardo Oliveira Silva', 'Deputado Federal', 'PR', 2342434),
('Dilma Rousseff', 'Presidente', 'PT', 324893423),
('Paulo Maluf', 'Bandido', 'PP', 434238932);

-- --------------------------------------------------------

--
-- Table structure for table `proposta`
--

CREATE TABLE IF NOT EXISTS `proposta` (
`id` int(11) NOT NULL,
  `area` varchar(90) NOT NULL,
  `status` enum('cumprido','cumprindo','naoCumprido','naoClassificada') NOT NULL,
  `procedencia` tinyint(1) NOT NULL,
  `classificacao` enum('subjetiva','objetiva','naoClassificada') NOT NULL,
  `proponente` int(11) NOT NULL COMMENT 'deve conter o registro do político',
  `informante` varchar(90) NOT NULL,
  `descricao` tinytext NOT NULL,
  `relevancia` enum('alta','media','baixa','naoClassificada') NOT NULL,
  `fonte` tinytext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `proposta`
--

INSERT INTO `proposta` (`id`, `area`, `status`, `procedencia`, `classificacao`, `proponente`, `informante`, `descricao`, `relevancia`, `fonte`) VALUES
(5, 'Saúde', 'naoClassificada', 0, 'naoClassificada', 2312311, 'geraldao', 'Criação clínicas especializadas para tratamento de dependentes químicos', 'naoClassificada', 'http://www.terra.com.br/noticias/infograficos/eleicoes/programa-de-governo-dilma/programa-de-governo-dilma-06.htm'),
(6, 'Cultura', 'naoClassificada', 0, 'naoClassificada', 2312311, 'geraldao', 'Proposta para incentivo ao circo.', 'naoClassificada', 'http://congressoemfoco.uol.com.br/noticias/manchetes-anteriores/tiririca-voce-sabe-o-que-ele-faz/'),
(7, 'Transportes', 'naoClassificada', 0, 'naoClassificada', 2312311, 'comum', 'Minhocão - Construir uma obra esteticamente muito feia.', 'naoClassificada', 'http://pt.wikipedia.org/wiki/Elevado_Presidente_Costa_e_Silva'),
(8, 'Outra', 'naoClassificada', 0, 'naoClassificada', 2312311, 'comum', 'Quinta-Feira sem peixe.', 'naoClassificada', 'http://www.usp.br/coseas/COSEASHP/COSEAS2010_cardapio.html'),
(9, 'Cultura', 'naoClassificada', 0, 'naoClassificada', 2312311, 'comum', 'Valorização da cultura nacional e favorecimento do diálogo com outras culturas', 'naoClassificada', 'http://www.terra.com.br/noticias/infograficos/eleicoes/programa-de-governo-dilma/programa-de-governo-dilma-01.htm'),
(10, 'Educação', 'naoClassificada', 0, 'naoClassificada', 2312311, 'geraldao', 'SP derrubou a evasão, tem a melhor taxa de alfabetização e integrou ensino médio ao técnico. Ênfase será dada ao ensino integral ', 'naoClassificada', 'http://g1.globo.com/politica/politico/geraldo-alckmin.html#!proposta=3');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `login` varchar(32) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(90) NOT NULL,
  `tipo` enum('administrador','comum','verificador','classificador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Armazena os usuários do ';

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`login`, `senha`, `nome`, `email`, `tipo`) VALUES
('comum', 'd715eded625a557a132def17e4ce04b5eec114406c8e8efe3ec400512d6705b5e3e2775de43560d8323f3a771e0649f136e0c8923afecd233e4453bdec9faa8f', 'comum', 'comum@comum', 'comum'),
('geraldao', '5ab5faa6aa54133ff6a87c16224af7704a4cbe7355f58b2886a48afbe5e5bcf7af0ada80f4a0275ae487575e79e0fdf607924bcae92f9345c9d6aa66ffa1b88e', 'geraldao', 'geraldao@geraldao', 'verificador');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `politico`
--
ALTER TABLE `politico`
 ADD PRIMARY KEY (`registro`), ADD KEY `nome` (`nome`), ADD KEY `nome_2` (`nome`);

--
-- Indexes for table `proposta`
--
ALTER TABLE `proposta`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proposta`
--
ALTER TABLE `proposta`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
