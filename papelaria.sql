-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 03-Maio-2023 às 17:54
-- Versão do servidor: 8.0.30
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `papelaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` double NOT NULL,
  `quantidade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `quantidade`) VALUES
(1, 'Caneta Verde', 1, 39),
(2, 'Caneta Roxa', 0.75, 10),
(4, 'Bolsa Preta', 9.99, 15),
(5, 'Caixa lápis', 1.49, 41),
(6, 'X-acto', 1.09, 14),
(7, 'Borracha', 0.25, 30),
(8, 'Afia', 1.79, 24),
(10, 'Caderno Pautado', 3.89, 14),
(11, 'Caderno Quadriculado', 4.29, 9),
(12, 'Agenda 2023', 17.99, 4),
(13, 'Aquarelas', 7.99, 6),
(14, 'Marcador Verde', 1, 18),
(15, 'Jornal', 1.99, 3),
(17, 'Tinta Rosa', 2.56, 12),
(20, 'Agrafador', 3.83, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'Ana Rocha', 'ana', '$2y$10$09x/eTWSV2k9S7LEhJyojuo.cgY5EBJC5nBBT767j8kBjdVid6Vo2'),
(2, 'João Silva', 'joao', '$2y$10$09x/eTWSV2k9S7LEhJyojuo.cgY5EBJC5nBBT767j8kBjdVid6Vo2'),
(3, 'Suzan Dias', 'suh', '$2y$10$09x/eTWSV2k9S7LEhJyojuo.cgY5EBJC5nBBT767j8kBjdVid6Vo2'),
(4, 'Isabel Mendonça', 'isa', '$2y$10$09x/eTWSV2k9S7LEhJyojuo.cgY5EBJC5nBBT767j8kBjdVid6Vo2');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
