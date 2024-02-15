-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Fev-2024 às 19:49
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
(1, '(❛‿❛).png', '../image/perfil/65cd42f36443a.png', '2024-02-14 19:47:15', 'Kaiky'),
(2, 'candidato3.jpg', '../image/perfil/65ce6a7d24c4a.jpg', '2024-02-15 16:48:13', 'Joao');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `imagem_postagem`
--

INSERT INTO `imagem_postagem` (`id`, `nome_imagem`, `path`, `data_upload`, `nome_usuario`) VALUES
(1, 'code-820275_1920.jpg', '../image/postagem/65ce6aaee960d.jpg', '2024-02-15 16:49:02', 'Joao');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`id`, `autor`, `titulo`, `descricao`, `imagem_postagem`, `data_da_postagem`) VALUES
(1, 'Joao', 'Olá gente!', 'Como vocês estão?', '../image/postagem/65ce6aaee960d.jpg', '2024-02-15');

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
(1, 'Kaiky', '2006-03-03', 'M', 'Olá mundo', 'kaiky@gmail.com', '$2y$10$Qt0uz//LKTe6zjWZIgtNte3JLyo1QCJ/MBRirsHKItOGf.W.GjE5S', 0, 0),
(2, 'Joao', '2000-12-01', 'M', 'Olá', 'Joao123@gmail.com', '$2y$10$3kosv/.glO1jcEQ563bGjO37Ya4Hjf2h9QT0/V3ruxto2zTNVv/he', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
