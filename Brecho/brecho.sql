-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Ago-2018 às 23:04
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
  `ID` int(11) NOT NULL,
  `UsuarioID` text COLLATE utf8_bin NOT NULL,
  `Nome` text COLLATE utf8_bin NOT NULL,
  `Preco` float NOT NULL,
  `DataHora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Foto` text COLLATE utf8_bin NOT NULL,
  `Categoria` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`ID`, `UsuarioID`, `Nome`, `Preco`, `DataHora`, `Foto`, `Categoria`) VALUES
(5, '', 'br', 200, '2018-08-06 22:35:26', 'nao ha.png', 'materiais'),
(6, '', 'teste', 5000, '2018-08-24 16:05:36', 'dfefr', ''),
(11, '5', 'produto de g', 500, '2018-08-24 17:23:46', '65er', 'comidas'),
(12, '5', 'produto de g2', 500, '2018-08-24 17:59:53', 'defr', 'comidas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `Nome` text COLLATE utf8_bin NOT NULL,
  `Email` text COLLATE utf8_bin NOT NULL,
  `Senha` text COLLATE utf8_bin NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `Nome`, `Email`, `Senha`, `Admin`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(2, 'Guilherme', 'g@gmail.com', '123', 0),
(3, 'gui', 'gg@gmail.com', '1234', 0),
(4, 'conta Teste', 'gui@gmail.com', '123456', 0),
(5, 'g', 'g', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
