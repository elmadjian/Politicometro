-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 04/12/2014 às 21:36
-- Versão do servidor: 5.6.16
-- Versão do PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `politicometro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(32) NOT NULL COMMENT 'username',
  `mensagem` mediumtext NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `conteudo` tinytext NOT NULL,
  `divulgador` varchar(32) NOT NULL COMMENT 'tem que ser username',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `politico`
--

CREATE TABLE IF NOT EXISTS `politico` (
  `nome` varchar(120) NOT NULL,
  `cargo` varchar(60) NOT NULL,
  `partido` varchar(10) NOT NULL,
  `registro` int(11) NOT NULL,
  PRIMARY KEY (`registro`),
  KEY `nome` (`nome`),
  KEY `nome_2` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lista os políticos cadastrados no portal';

-- --------------------------------------------------------

--
-- Estrutura para tabela `proposta`
--

CREATE TABLE IF NOT EXISTS `proposta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(90) NOT NULL,
  `status` enum('cumprido','cumprindo','naoCumprido','naoClassificada') NOT NULL,
  `procedencia` tinyint(1) NOT NULL,
  `classificacao` enum('subjetiva','objetiva','naoClassificada') NOT NULL,
  `proponente` int(11) NOT NULL COMMENT 'deve conter o registro do político',
  `informante` varchar(90) NOT NULL,
  `descricao` tinytext NOT NULL,
  `relevancia` enum('alta','media','baixa','naoClassificada') NOT NULL,
  `fonte` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `login` varchar(32) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(90) NOT NULL,
  `tipo` enum('administrador','comum','verificador','classificador') NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Armazena os usuários do ';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
