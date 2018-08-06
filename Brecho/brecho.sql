-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Ago-2018 às 03:28
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brecho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `UsuarioID` text COLLATE utf8_bin NOT NULL,
  `Nome` text COLLATE utf8_bin NOT NULL,
  `Preco` float NOT NULL,
  `DataHora` datetime NOT NULL,
  `Foto` text COLLATE utf8_bin NOT NULL,
  `Categoria` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`UsuarioID`, `Nome`, `Preco`, `DataHora`, `Foto`, `Categoria`) VALUES
('', 'foi em', 600, '0000-00-00 00:00:00', 'dd', ''),
('', 'cadastrando um produto bacana', 600, '0000-00-00 00:00:00', 'dd', ''),
('', 'hyjyu', 0, '0000-00-00 00:00:00', 'jujujujuju', ''),
('', 'teste', 500, '0000-00-00 00:00:00', 'g.png', ''),
('', 'rr', 0, '0000-00-00 00:00:00', '500', ''),
('', 'ee', 600, '0000-00-00 00:00:00', 'dd', ''),
('', 'test', 500, '0000-00-00 00:00:00', 'dddd', ''),
('', 'test categoria', 600, '0000-00-00 00:00:00', 'ddd', 'eletronicos'),
('', '', 0, '0000-00-00 00:00:00', '', ''),
('', 'ddd', 0, '0000-00-00 00:00:00', 'dd', ''),
('', 'ddd', 0, '0000-00-00 00:00:00', 'dd', 'aulas'),
('', 'Comiiidas', 200, '0000-00-00 00:00:00', 'gggggg', 'comidas'),
('', 'materiiiial escolar', 355666, '0000-00-00 00:00:00', 'dddrrrt', 'materiais'),
('', 'outrrrroooos', 699999, '0000-00-00 00:00:00', '22d', 'outros'),
('', 'outros2', 300, '0000-00-00 00:00:00', 'ddd.png', 'outros'),
('', 'nenhuma categoria kkk', 500, '0000-00-00 00:00:00', 'ddddd', ''),
('', 'eletronicosss2', 500, '0000-00-00 00:00:00', '20', 'eletronicos'),
('', 'gg', 0, '0000-00-00 00:00:00', 'ggg', 'comidas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
