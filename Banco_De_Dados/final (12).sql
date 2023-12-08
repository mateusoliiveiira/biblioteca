-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2023 às 17:20
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `final`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrarlivros`
--

CREATE TABLE `cadastrarlivros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `ano_publicacao` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `emprestado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `cadastrarlivros`
--

INSERT INTO `cadastrarlivros` (`id`, `titulo`, `autor`, `genero`, `ano_publicacao`, `descricao`, `imagem`, `emprestado`) VALUES
(1, '#Umdiasemreclamar', 'Davi Lago', '#', '2021', 'Quantas vezes vocÃª reclamou de algo hoje? JÃ¡ parou pra pensar como Ã© difÃ­cil ser grato e como focamos muito mais a nossa atenÃ§Ã£o nos problemas e nÃ£o nas soluÃ§Ãµes?', 'https://m.media-amazon.com/images/I/619T0W3tfuL._SL1360_.jpg', 0),
(2, 'O alquimista', 'Paulo Coelho', '#', '2017', 'O alquimista - um clÃ¡ssico contemporÃ¢neo sobre o poder transformador dos sonhos.', 'https://m.media-amazon.com/images/I/81slUinjTlS._SL1500_.jpg', 1),
(3, 'O Homem de Giz', ' C. J. Tudor', 'aventura', '1986', 'Assassinato e sinais misteriosos em uma trama para fÃ£s de Stranger Things e Stephen King', 'uploads/91o6FMAy8UL._SL1500_.jpg', 0),
(4, 'A garota do lago', ' Charlie Donlea', 'Suspense', '2017', 'Summit Lake, uma pequena cidade entre montanhas, Ã© esse tipo de lugar, bucÃ³lico e com encantadoras casas dispostas Ã  beira de um longo trecho de Ã¡gua intocada.', 'uploads/81LRk6+p1HL._SL1500_.jpg', 1),
(5, 'A Biblioteca da Meia-Noite', ' Matt Haig', 'Aventura', '2021', 'A Biblioteca da Meia-Noite Ã© um romance incrÃ­vel que fala dos infinitos rumos que a vida pode tomar e da busca incessante pelo rumo certo.', 'uploads/81iqH8dpjuL._SL1500_.jpg', 0),
(6, 'Ã‰ assim que comeÃ§a', ' Colleen Hoover', 'Aventura', '2022', 'reparem os coraÃ§Ãµes. Lily e Atlas estÃ£o de volta na aguardada sequÃªncia de Ã‰ assim que acaba. Ã‰ assim que comeÃ§a chega para consagrar novamente Colleen Hoover como a autora mais vendida do Brasil.', 'uploads/81Izv2GRWoL._SL1500_.jpg', 0),
(7, 'Ã‰ Assim que Acaba', ' Colleen Hoover', 'Aventura', '2018', 'Considerado o livro do ano, que virou febre no TikTok e sozinho jÃ¡ acumulou mais de um milhÃ£o de exemplares vendidos no Brasil.', 'uploads/91r5G8RxqfL._SL1500_.jpg', 0),
(8, 'Novembro, 9 ', ' Colleen Hoover ', '#', '2016', 'Novembro, 9 Ã© uma histÃ³ria de amor inesquecÃ­vel entre um aspirante a escritor e sua musa improvÃ¡vel. Da autora da sÃ©rie Hopeless.', 'uploads/91YbRs+x+cL._SL1500_.jpg', 0),
(9, 'O palhaÃ§o e o psicanalista', ' Christian Dunker', '#', '2021', 'Se de mÃ©dico e louco todo mundo tem um pouco, de psicanalista e palhaÃ§o todo mundo tem um pedaÃ§o. ', 'uploads/81QZ67LnZ8L._SL1500_.jpg', 0),
(10, 'O lado bom do lado ruim', ' Daniel Martins de Barros ', '#', '2020', 'OMO A CIÃŠNCIA ENSINA A USAR A TRISTEZA, O MEDO, A RAIVA E OUTRAS EMOÃ‡Ã•ES NEGATIVAS A SEU FAVOR.', 'uploads/61-yZIqK79L._SL1360_.jpg', 0),
(11, 'TED: Falar, convencer, emocionar ', ' Carmine Gallo ', '#', '2013', 'Este Ã© um livro que traz o melhor de dois mundos: Carmine Gallo, um dos maiores especialistas sobre falar em pÃºblico, autor best-seller no Brasil e que agora destrincha o mÃ©todo que faz das grandes apresentaÃ§Ãµes da TED um sucesso mundial.', 'uploads/61-dLRDFNBL._SL1031_.jpg', 0),
(12, 'A cabana ', ' William P. Young ', '#', '2008', 'Durante uma viagem de fim de semana, a filha mais nova de Mack Allen Phillips Ã© raptada e evidÃªncias de que ela foi brutalmente assassinada sÃ£o encontradas numa velha cabana.', 'uploads/91fLBlcmpXL._SL1500_.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `permissao` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `senha`, `email`, `permissao`) VALUES
(8, 'Mateus', '$2y$10$nhs7JlbPy34FCM0UkYVmneGv06pfgtkBsHeN5E0rgCpCq9G9ruY2S', 'mateusoliiveira000@gmail.com', '0'),
(10, 'administrador', '$2y$10$X.Low9c9t.D8eFemPCE8BeGxyMcB7ZnRud9uJkPUkjI20yB6jjc0S', 'mateus@gmail.com', '1'),
(12, 'namodoteteus', '$2y$10$U2Y4wnX72OYIC6kdpe0AKO9oR/ZKvNSbMfQEHrxHYB12RnekY3Kny', 'evellinsouza2806@gmail.com', ''),
(13, 'Evellin', '$2y$10$MHQJoco5F2CuFoYRgXTQZe31bvxwvZPLX8eREROOuN6ovE6cjEHsu', 'evellinsouza2806@gmail.com', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastrarlivros`
--
ALTER TABLE `cadastrarlivros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastrarlivros`
--
ALTER TABLE `cadastrarlivros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
