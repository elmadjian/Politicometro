-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2014 at 12:02 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

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

CREATE TABLE `comentario` (
`id` int(11) NOT NULL,
  `autor` varchar(32) NOT NULL COMMENT 'username',
  `mensagem` mediumtext NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `noticia`
--

CREATE TABLE `noticia` (
`id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `conteudo` tinytext NOT NULL,
  `divulgador` varchar(32) NOT NULL COMMENT 'tem que ser username'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `politico`
--

CREATE TABLE `politico` (
  `nome` varchar(120) NOT NULL,
  `cargo` varchar(60) NOT NULL,
  `partido` varchar(10) NOT NULL,
  `registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lista os políticos cadastrados no portal';

-- --------------------------------------------------------

--
-- Table structure for table `proposta`
--

CREATE TABLE `proposta` (
`id` int(11) NOT NULL,
  `area` varchar(90) NOT NULL,
  `status` enum('cumprido','cumprindo','naoCumprido','') NOT NULL,
  `procedencia` tinyint(1) NOT NULL,
  `classificacao` enum('subjetiva','objetiva','naoClassificada') NOT NULL,
  `proponente` int(11) NOT NULL COMMENT 'deve conter o registro do político',
  `informante` varchar(90) NOT NULL,
  `descricao` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(32) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(90) NOT NULL,
  `tipo` enum('administrador','comum','verificador','classificador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Armazena os usuários do ';

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
