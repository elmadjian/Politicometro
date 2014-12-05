-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 05/12/2014 às 22:24
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

--
-- Fazendo dump de dados para tabela `politico`
--

INSERT INTO `politico` (`nome`, `cargo`, `partido`, `registro`) VALUES
('Geraldo Alckmin', 'Governador', 'PSDB', 2342343),
('Francisco Everardo Oliveira Silva', 'Deputado Federal', 'PR', 2342434),
('Dilma Rousseff', 'Presidente', 'PT', 324893423),
('Paulo Maluf', 'Bandido', 'PP', 434238932);

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
  `informante` varchar(90) NOT NULL COMMENT 'deve corresponder ao login de um usuário',
  `descricao` tinytext NOT NULL,
  `relevancia` enum('alta','media','baixa','naoClassificada') NOT NULL,
  `fonte` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Fazendo dump de dados para tabela `proposta`
--

INSERT INTO `proposta` (`id`, `area`, `status`, `procedencia`, `classificacao`, `proponente`, `informante`, `descricao`, `relevancia`, `fonte`) VALUES
(5, 'Saúde', 'naoClassificada', 0, 'naoClassificada', 324893423, 'geraldao', 'Criação clínicas especializadas para tratamento de dependentes químicos', 'naoClassificada', 'http://www.terra.com.br/noticias/infograficos/eleicoes/programa-de-governo-dilma/programa-de-governo-dilma-06.htm'),
(6, 'Cultura', 'naoClassificada', 0, 'naoClassificada', 2342434, 'geraldao', 'Proposta para incentivo ao circo.', 'naoClassificada', 'http://congressoemfoco.uol.com.br/noticias/manchetes-anteriores/tiririca-voce-sabe-o-que-ele-faz/'),
(7, 'Transportes', 'naoClassificada', 0, 'naoClassificada', 434238932, 'comum', 'Minhocão - Construir uma obra esteticamente muito feia.', 'naoClassificada', 'http://pt.wikipedia.org/wiki/Elevado_Presidente_Costa_e_Silva'),
(8, 'Outra', 'naoClassificada', 0, 'naoClassificada', 2342434, 'comum', 'Quinta-Feira sem peixe.', 'naoClassificada', 'http://www.usp.br/coseas/COSEASHP/COSEAS2010_cardapio.html'),
(9, 'Cultura', 'naoClassificada', 1, 'naoClassificada', 324893423, 'comum', 'Valorização da cultura nacional e favorecimento do diálogo com outras culturas', 'naoClassificada', 'http://www.terra.com.br/noticias/infograficos/eleicoes/programa-de-governo-dilma/programa-de-governo-dilma-01.htm'),
(10, 'Educação', 'naoClassificada', 0, 'naoClassificada', 2342343, 'geraldao', 'SP derrubou a evasão, tem a melhor taxa de alfabetização e integrou ensino médio ao técnico. Ênfase será dada ao ensino integral ', 'naoClassificada', 'http://g1.globo.com/politica/politico/geraldo-alckmin.html#!proposta=3');

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

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`login`, `senha`, `nome`, `email`, `tipo`) VALUES
('geraldao', '5ab5faa6aa54133ff6a87c16224af7704a4cbe7355f58b2886a48afbe5e5bcf7af0ada80f4a0275ae487575e79e0fdf607924bcae92f9345c9d6aa66ffa1b88e', 'Geraldo Amigão', 'geraldao@geraldao.com.br', 'verificador'),
('joelma', 'ede0cd2d88c688a2869f473c5ce6bb50cc633f4c5c73b41c8e9a0754d5516487f530f3167ef239a44eb1628ac638d4ef945c90984c97b0058a756ea6276e2536', 'Joelma Garcia Fernandes', 'joelminha73@hotmail.com', 'classificador');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
