-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Fev-2024 às 16:42
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pandim_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_perfil`
--

DROP TABLE IF EXISTS `imagem_perfil`;
CREATE TABLE IF NOT EXISTS `imagem_perfil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_imagem` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` datetime NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nome_usuario` (`nome_usuario`(250))
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `imagem_perfil`
--

INSERT INTO `imagem_perfil` (`id`, `nome_imagem`, `path`, `data_upload`, `nome_usuario`) VALUES
(1, '15.png', '../image/perfil/65c10b265cd5b.png', '2024-02-05 13:24:49', 'User1'),
(2, 'cat-4189697_640.jpg', '../image/perfil/65c10c21d0bf0.jpg', '2024-02-05 13:26:34', 'User2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_postagem`
--

DROP TABLE IF EXISTS `imagem_postagem`;
CREATE TABLE IF NOT EXISTS `imagem_postagem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_imagem` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` datetime NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nome_usuario` (`nome_usuario`(250))
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `imagem_postagem`
--

INSERT INTO `imagem_postagem` (`id`, `nome_imagem`, `path`, `data_upload`, `nome_usuario`) VALUES
(1, 'canyon-1740973_1280.jpg', '../image/postagem/65c10e8fe2799.jpg', '2024-02-05 13:36:31', 'User1'),
(2, 'maldives-1993704_1280.jpg', '../image/postagem/65c10ee19d923.jpg', '2024-02-05 13:37:53', 'User2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

DROP TABLE IF EXISTS `postagens`;
CREATE TABLE IF NOT EXISTS `postagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `autor` varchar(30) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `imagem_postagem` varchar(255) NOT NULL,
  `data_da_postagem` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`id`, `autor`, `titulo`, `descricao`, `imagem_postagem`, `data_da_postagem`) VALUES
(1, 'User1', 'Título da Postagem', 'Descrição da postagem com imagem abaixo', '../image/postagem/65c10e8fe2799.jpg', '2024-02-05'),
(2, 'User2', 'Lindo!!', 'Olhem essa paisagem!', '../image/postagem/65c10ee19d923.jpg', '2024-02-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_de_usuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `descricao` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `seguidores` int NOT NULL,
  `seguindo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_de_usuario`, `data_de_nascimento`, `sexo`, `descricao`, `email`, `senha`, `seguidores`, `seguindo`) VALUES
(1, 'User1', '2000-01-01', 'M', 'Olá mundo', 'user1@gmail.com', '$2y$10$V5..R1KAE2T7nALdYMC9QeVGxtwuPywNrkjXpNMy9BVF/vj.WQodu', 0, 0),
(2, 'User2', '2000-02-02', 'F', 'Olá gente!', 'user2@gmail.com', '$2y$10$s/UE7wEN3opmzAt.7PlWAuxQDji3SlxlaSRndqAOSNNyb9q2lomNy', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
