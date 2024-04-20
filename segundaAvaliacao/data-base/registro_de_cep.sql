-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Abr-2024 às 23:11
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_cep`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_de_cep`
--

CREATE TABLE `registro_de_cep` (
  `id_cep` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `localidade` varchar(80) NOT NULL,
  `uf` varchar(10) NOT NULL,
  `ibge` varchar(20) NOT NULL,
  `ddd` varchar(4) NOT NULL,
  `siafi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registro_de_cep`
--

INSERT INTO `registro_de_cep` (`id_cep`, `id_usuario`, `cep`, `logradouro`, `bairro`, `localidade`, `uf`, `ibge`, `ddd`, `siafi`) VALUES
(6, 5, '69901-15', 'Rua Marte', 'Morada do Sol', 'Rio Branco', 'AC', '1200401', '68', '0139'),
(7, 5, '78730-27', 'Rua Petrônio Portela', 'Vila São Sebastião II', 'Rondonópolis', 'MT', '5107602', '66', '9151'),
(8, 5, '79843-34', 'Travessa 07', 'Estrela Vera', 'Dourados', 'MS', '5003702', '67', '9073');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `registro_de_cep`
--
ALTER TABLE `registro_de_cep`
  ADD PRIMARY KEY (`id_cep`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `registro_de_cep`
--
ALTER TABLE `registro_de_cep`
  MODIFY `id_cep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `registro_de_cep`
--
ALTER TABLE `registro_de_cep`
  ADD CONSTRAINT `registro_de_cep_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
