-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/05/2026 às 10:11
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cantina`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `turma` varchar(50) DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `pedido` varchar(100) DEFAULT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `prazo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `turno`, `turma`, `tipo`, `pedido`, `descricao`, `preco`, `prazo`) VALUES
(1, 'Matheus Cruz', 'vespetino', 'redesvT23', 'aluno', '', 'dois pão de queijo e dois café', 10.00, '2026-05-23'),
(2, 'Libni', 'notuno', 'SI', 'aluno', '', 'bolo e refrigerante', 10.49, '2026-05-18'),
(3, 'Libni', 'matutino', 'SI', 'aluno', '', 'bolo e refrigerante', 10.49, '2026-05-18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `item_vendas`
--

CREATE TABLE `item_vendas` (
  `id` int(11) NOT NULL,
  `venda_id` int(11) DEFAULT NULL,
  `produto_nome` varchar(100) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `item_vendas`
--

INSERT INTO `item_vendas` (`id`, `venda_id`, `produto_nome`, `preco`) VALUES
(1, 32, 'Pão de Queijo', 5.00),
(2, 32, 'Salgadinhos ', 15.00),
(3, 33, 'Salgadinhos ', 15.00),
(4, 34, 'Pão de Queijo', 5.00),
(5, 34, 'Salgadinhos ', 15.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `categoria`, `preco`, `quantidade`, `descricao`) VALUES
(1, 'Pão de Queijo', 'Lanches', 5, 20, '20 pães de queijo '),
(3, 'coxinha de frango', 'Lanches', 5, 15, '15 coxinha para venda ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtosimg`
--

CREATE TABLE `produtosimg` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `ativo` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtosimg`
--

INSERT INTO `produtosimg` (`id`, `nome`, `descricao`, `preco`, `imagem`, `ativo`) VALUES
(1, 'Pão de Queijo', 'unidade com café ', 5.00, 'paoqueijo.png', 1),
(2, 'Salgadinhos ', 'porção ', 15.00, 'salgadinho-ceet.png', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('aluno','professor','funcionario','admin') DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`, `data_cadastro`) VALUES
(1, 'Cleitiany', 'cleitiany@cantina.com.br', 'cantina123', 'admin', '2026-05-23 20:17:43'),
(2, 'Libnny Santos Pereirinha ', 'libnisantos@cantina.com.br', 'cantina123', 'aluno', '2026-05-23 22:04:05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `cliente` varchar(100) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `data_venda` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `cliente`, `total`, `data_venda`) VALUES
(1, 'Cleitiany', 15.00, '2026-05-26 00:29:09'),
(2, 'Cleitiany', 10.00, '2026-05-26 04:04:37'),
(27, 'Cleitiany', 20.00, '2026-05-29 07:14:43'),
(28, 'Cleitiany', 20.00, '2026-05-29 07:18:24'),
(29, 'Cleitiany', 5.00, '2026-05-29 07:19:13'),
(30, 'Cleitiany', 10.00, '2026-05-29 07:22:15'),
(31, 'Cleitiany', 10.00, '2026-05-29 07:23:30'),
(32, 'Cleitiany', 20.00, '2026-05-29 07:28:05'),
(33, 'Cleitiany', 15.00, '2026-05-29 07:38:54'),
(34, 'Cleitiany', 20.00, '2026-05-29 07:41:35');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `item_vendas`
--
ALTER TABLE `item_vendas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtosimg`
--
ALTER TABLE `produtosimg`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `item_vendas`
--
ALTER TABLE `item_vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produtosimg`
--
ALTER TABLE `produtosimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
