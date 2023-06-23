-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql4.skymail.local
-- Tempo de geração: 23/06/2023 às 19:51
-- Versão do servidor: 8.0.28
-- Versão do PHP: 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `areadoarquiteto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquitetos`
--

CREATE TABLE `arquitetos` (
  `idArquiteto` int NOT NULL,
  `arquiteto` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `fotoUrl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cpfCnpj` varchar(100) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `pis` varchar(100) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `filiacao` varchar(255) DEFAULT NULL,
  `telefone` varchar(100) NOT NULL,
  `emailPremium` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `dadosBancarios` varchar(255) DEFAULT NULL,
  `pontuacao` float NOT NULL DEFAULT '0',
  `status` enum('a','d','b','') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `arquitetos`
--

INSERT INTO `arquitetos` (`idArquiteto`, `arquiteto`, `email`, `senha`, `dataCadastro`, `fotoUrl`, `cpfCnpj`, `rg`, `pis`, `nascimento`, `filiacao`, `telefone`, `emailPremium`, `endereco`, `dadosBancarios`, `pontuacao`, `status`) VALUES
(5, 'Renata', 'renata@trancarte.com.br', 'c192c7a0d71e04460e9dab52f667f04c', '2021-11-29 14:14:51', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(6, 'Roberta Baldez Verdan', 'roberta@trancarte.com.br', '1ec1b4b54845e142f5cd20785bf0b63c', '2021-12-07 14:57:36', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(7, 'Hannah Cabral', 'mharquiteturaeinteriores@gmail.com', '86b05a1631e0decb4c9b4eac181c740a', '2022-03-15 11:15:58', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(8, 'Luana da Rocha Moraes Moreira', 'designluanamoraes@gmail.com.br', 'faa22abc648659407b7b87ae149208c1', '2022-03-15 11:17:05', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(9, 'Mariana Pessoa Proença de Gouvea Halpern', 'mariana@marianahalpern.com.br', 'e3d0b9e2182fc0b8c45fd34f4a26c896', '2022-03-15 11:24:24', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(10, 'Mario Santos', 'mario@mario.com.br', '332f6f835d1e4ad0a09470de19ecaf39', '2022-03-15 11:28:53', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(11, 'Ana Raquel da Silva Ferreira', 'contato@anaraquelprojetos.com.br', '723d5f75e6d31f63e19f3700f7f0c9af', '2022-03-15 11:29:56', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(12, 'Gabriel Dile Braga', 'gbdile@gmail.com', 'f68b8ae2a5d204d8ce78a99c774bd910', '2022-03-15 11:30:56', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(13, 'Jorge Nascimento', 'arquiteturajeg@gmail.com', 'ef8bdded613aa2aaa1455fc8dea9767c', '2022-03-17 16:13:27', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(14, 'Isabella Carvalho', 'isabella.carvalho@rdmarketingdigital.com.br', 'eefa0308f37bd381a74d36a0e2c544fe', '2022-03-21 15:04:06', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(15, 'Lúcia Maria Pinheiro Costa', 'luciamcostarj@gmail.com', '7201511d5f0cc73d3c03af707e7298fe', '2022-03-25 11:31:05', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(16, 'Lúcia Maria Pinheiro Costa', 'luciamcostarj@gmail.com', '8d85dfdf849e95391424781a6db13ae0', '2022-03-25 11:31:22', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(17, 'SEBASTIAO GUEDES ARQUITETURA', 'sebaguedes.arq@gmail.com', '1bec2fbc28bca508cd6f1d2bfe8ebf0b', '2022-04-01 14:34:21', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(18, 'Glaucia Alves Constancio', 'degau@globo.com', '14b6a45250bc310571229f8efb1b96b4', '2022-04-01 16:57:27', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(19, 'Elaine Cristina da Silva Ramos Santos', 'elaine@elaineramos.arq.br', 'aa6bd082edd536c8d16e877aeed6092d', '2022-04-06 09:37:08', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(20, 'Carolina Lis Rozensztajn', 'contato@carollisinteriores.com.br', '1c51c88a5de3930175cf38adefa6dd50', '2022-04-07 16:23:49', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(21, 'Tamine Mattos Servulo Gonçalves', 'tamineservulo.arq@gmail.com', '9f396331f421cfc7f124a702ac502677', '2022-04-14 10:19:16', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(22, 'Tatiane Leite Botelho Vaz', 'tatianelvaz@gmail.com', '8965b77e52b2b4544d54cee5cc4cc6c9', '2022-04-21 09:09:46', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(23, 'LILIAN CLEBICAR DESIGN DE INTERIORES', 'lilianclebicar@gmail.com', 'be51ef2b5ab90930f39c929adf68b4a9', '2022-04-29 13:23:15', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(24, 'PAULA COSTA ARQUITETURA', 'paula@paulacostaarquitetura.com.br', 'aff7843093d631de03b2e03bb0cb8abc', '2022-04-29 13:31:41', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(26, 'BIANCO ARQUITETURA E DESIGN LTDA', 'alexandrembianco@gmail.com', 'a6328e01fea606bf15b53d9374f9a465', '2022-05-06 08:58:09', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(27, 'Monica Gervasio', 'monica_gervasio@hotmail.com', '8a7b04df602cb5947d13700df1cf6686', '2022-05-30 17:09:09', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(28, 'Landscape Jardins', 'contato@landscapejardins.com.br', '85021fd8e7ec1cc10223f2fe68283a3e', '2022-06-01 13:47:29', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(29, 'URBANETTO ARQUITETURA', 'camila@urbanettoarquitetura.com.br', 'af561a396c09b59fe963a8643a01ac51', '2022-06-22 17:21:56', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(30, 'INTERARQUI SERVIÇOS TÉC DE ARQUITETURA E INTERIORES LTDA', 'anapaula.interarqui@gmail.com', '00ff1126f21529beb1e47ac542e7657f', '2022-06-29 15:45:21', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(31, 'Leandro Esteves Arquitetura e Paisagismo', 'leandromsesteves@gmail.com', '38a90309de2f99b5e36211c7164bc018', '2022-07-12 10:16:17', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(32, 'Andrea Carminate', 'acarminate@gmail.com', 'dd1a80fdf209f1d5e5288be6ea3c8559', '2022-07-29 17:01:01', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(33, 'Maria Carolina Diez Queiroz', 'mcaroldiez@gmail.com', '09d2353d2ec152e0d64fa8dccbed5197', '2022-08-01 09:57:00', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(34, 'Paulo Cezar Bezerra Rego', 'rego.paulosexto@gmail.com', '44908209f6d839caaf062ed9373f1d32', '2022-08-02 11:39:58', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(36, 'Fernanda Camargo Rochet', 'ferochetdesign@hotmail.com', '670a133537a887c8316f3ed4cd673015', '2022-08-02 17:53:59', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(37, 'ANGELA MEZA ARQUITETURA & INTERIORES LTDA', 'angelameza@angelameza.com.br', '2e1f9bf351a47157f1b2c35af996cdce', '2022-08-02 18:28:01', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(38, 'Vanessa Mello de Souza', 'vmello.innova@gmail.com', '950ef63bdbdacefa14f1ba4cb98d515d', '2022-08-03 17:04:09', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(39, 'Isabela Garcez', 'isabellagarcez@hotmail.com', '1c7a26af7238112cd60594929a2593be', '2022-08-04 14:26:42', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(40, 'Isve Campos', 'isve.campos@arkmais.com.br', 'c9204fdc9a187c5b108e1bf17246e873', '2022-08-05 09:37:05', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(41, 'Márcia Machado', 'marciamachadomm03@gmail.com', 'daa2ffa4cf75d18dd00d347e42aac490', '2022-08-05 16:27:38', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(42, 'Adriana Trindade Fonseca', 'arqtudo.rj@gmail.com', '811b6b3459d44c83a4568ae08a89c7a3', '2022-08-05 16:43:50', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(43, 'Cecilia Carvalho de Azevedo', 'ceciliacarvalho@me.com', 'eaad2920bb5555925f7fc0bc65836a55', '2022-08-08 09:58:34', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(44, 'Ana Beatriz Gomes dos Santos Ribeiro', 'beatrizgsribeiro@hotmail.com', 'a23f5b4ba0cbc5da9f8ce630c50994f0', '2022-08-08 13:38:47', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(45, 'Geize Nunes Geize Nunes dos Santos', 'Geizenunes@gnarq.org', '514dd224023e717de83d030d5b647e2a', '2022-08-08 17:16:31', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(46, 'Lucia Manhães', 'lucia_manhaes@yahoo.com.br', 'd68fac2fa90f957ec496842d52f5b962', '2022-08-09 11:36:24', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(47, 'Alessandra Rangel de Oliveira', 'contatoalerangel@gmail.com', '371a7bd3b0a7bdb57f499bcdb82c3c18', '2022-08-10 14:34:08', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(48, 'Glauciene Lerback M Teixeira', 'glaulerback@yahoo.com.br', '0116c5b17f18be32356fa9aa0139da50', '2022-08-10 15:42:48', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(49, 'Maria Luiza Marins Fernandes', 'luiza@ricardohachiya.arq.br', '998858916d5fec21a813a1d11c275f14', '2022-08-11 16:06:53', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(50, 'Ana Carolina Bezamat da Costa Lino', 'anacarolinabezamat@gmail.com', '9ce2db4d2545594b1f95747a30d86430', '2022-08-17 16:24:21', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(51, 'Rodrigo Barino', 'rodrigo@barinoarquitetura.com.br', '590b53cdd2c65d98c6919bcd09954232', '2022-08-18 09:19:45', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(52, 'Brise Arquitetura', 'cecilia@brisearquitetura.com.br', '8b28a3fc0d31be4536851d72c2784b94', '2022-08-29 15:16:34', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(53, 'Jairo De Sender', 'jairodesender@jairodesender.com.br', 'c3502831b9f19ef1b11032dc92adab57', '2022-08-30 16:44:12', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(54, 'Mauricio Rebello Caldas', 'mr@mauriciorebello.com.br', 'e1beb7930e8fd82520023e07c6a54fa2', '2022-09-12 10:04:32', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(56, 'Cassiano Alcantra', 'cassianoarquitetura@yahoo.com.br', '5d7a10439c1806be71de0abd124a5b08', '2022-10-08 10:41:58', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(57, 'Helem Janaína Sena', 'realtyrio@yahoo.com.br', '7060eb6266b5b6365867bd5e9ee009e8', '2022-10-08 10:44:50', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(58, 'Julio Cezar teroni', 'arquiteto@julioteroni.com.br', '05d5b8db0a9fe377be2ca95b29a4d652', '2022-10-08 10:47:28', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(59, 'ARC STUDIO ARQUITETURA Ltda', 'carol@arcstudio.com.br', 'b1ae90ad683d0679f59e6f762d415a6d', '2022-10-08 10:50:41', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(60, 'LYCIA CRISTINA MELO SANCIER MAIA', 'financeiro@lyciamaia.com.br', '42a995ba2487ab6ba225896a55b85b5d', '2022-10-08 10:55:02', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(61, 'João Gilberto Barreiros de Moura Braga', 'joaogilberto@jgbarq.com', '9334dc871af07d22275fa3eaef1ef8c1', '2022-10-08 10:56:51', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(62, 'Simoni Neu', 'simonineu@gmail.com', '621bf983b76f9811b8fe33f2e25b4048', '2022-10-22 09:11:27', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(63, 'ANA CLAUDIA SILVA DE ARAÚJO PEREIRA', 'ANACLAUDIAGIORNO@GMAIL.COM', 'ea83eddd0b70ffa2323c337940ec63cd', '2022-10-22 09:23:32', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(64, 'FLAVIA LUCAS VASILCOVSKY', 'lf.lucas@uol.com.br', '0f732fd20da8bcb250b32bc363c5141a', '2022-10-22 09:31:26', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(67, 'Cris', 'patricia@trancarte.com.br', '72818557e9090ef8a070e43f5bbd9b6d', '2022-12-03 16:43:21', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(68, 'MARIANA BOECHAT', 'maricamposboechat@hotmail.com', '1ca80cc8757e091e4415e6920174c2f9', '2022-12-03 16:44:39', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(69, 'Cristina Côrtes da Silva lopes', 'cristinacortes@cristinacortes.com.br', 'b615d225a2f2725798db3102bf73a641', '2022-12-03 16:48:22', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(70, 'GREGORY COPELLO ARQUITETURA E DESIGN LTDA', 'gregory@gregorycopello.com', '562a19a7915518267caf8b1089cb730e', '2022-12-03 16:51:04', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(71, 'Elisa Corrêa Sampaio', 'elisa.Sampaio.architektur@outlook.com', '3f87c87cbfc1dc22bbcd52ffae3ec68d', '2022-12-03 16:53:48', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(72, 'Fabio Barreto', 'fabiobarreto.arq@gmail.com', 'f73e4bdbb7f6e75d03f89b4e798af9eb', '2022-12-03 16:55:47', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(73, 'Gianne Almeida Saraiva', 'naoentra@gmail.com', 'ad296b06a3dfeb6bbeb2fdfc49fb1a73', '2022-12-03 16:59:36', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(74, 'PAULO DOMPIERI', 'paulo@bauhaus.arq.br', '59c661aa406df0fb9d6973c510275e34', '2022-12-03 17:02:02', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(75, 'Luciana Amaral', 'arqlucianaamaral@gmail.com', '1215797a4a46a07bf41c4a72ced3f70c', '2022-12-04 08:26:32', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(76, 'Marilene Galindo', 'naotem@gmail.com', '5264644b3756afb2a736d4442be101c8', '2022-12-04 09:21:12', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(77, 'Paula Verano Mauro', 'N@GMAIL.COM', '55ac6804af88a8de60192ae2f9227074', '2022-12-04 09:45:39', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(78, 'Gabriela Ferraz Duarte Feliciano', 'gabriela_feliciano@hotmail.com', 'b67671be43f04bc44d4c5c69a4d5c646', '2022-12-04 10:13:19', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(79, 'Fabio', 'patricia@trancarte.com.br', '3e363f270b04f09fa2e2a44850a2d6c1', '2022-12-04 10:16:43', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(80, 'CLAUDIA PIMENTEL DO PRADO', 'claudiapimentel.arq@gmail.com', '4195c13b275cec346a6e83c140c968ec', '2022-12-04 10:21:10', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(81, 'Ronald Goulart Barreto', 'contato@ronaldgoulart.arq.br', 'f2385da3f5bfb270f2007bad8352e0fa', '2022-12-04 10:24:07', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(82, 'Adriana Vaz', 'Adrianavaz848@gmail.com', 'c26a85a46608b457faa184024595fb9f', '2022-12-04 10:48:52', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(83, 'Mônica Gervasio', 'monica_gervasio@hotmail.com', '606c8aab926229bc7573ec36c04216e3', '2022-12-04 10:50:53', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(84, 'Ennio Carvalho da Silva Filho', 'ennio.filho@grupoenfil.com', '46e809a5dfbc43488d05f0aa69072b01', '2022-12-04 10:56:09', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(85, 'Ana Beatriz Elias', 'contato@construtoracarpa.com.br', 'bb6f13ca4762e017781e518d426c7f77', '2022-12-04 11:15:04', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(86, 'Regina Tavora', 'Cynthiaderezende@gmail.com', '70b2d9c3fe8a40ca7d015f224093e766', '2022-12-04 11:22:18', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(87, 'BERNARDES ARQUITETURA LTDA', 'n@gmail.com', '6681bb82b64c0ef328a82fa3352f1a3b', '2022-12-04 11:30:31', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(88, 'MARTHA PEIXOTO THOMPSON', 'martha.thompson@inoutconsultoria.com', 'bbddfa712341d44c57b3705ef2be7c47', '2022-12-04 11:36:02', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(89, 'Lúcia Maria Pinheiro Costa', 'luciamcostarj@gmail.com', '05eb8cbb40b599aa3ff1acf3c0e64ffd', '2022-12-04 11:39:23', '', '', NULL, NULL, NULL, NULL, '', '', '', NULL, 0, 'a'),
(90, 'lucasdantasrdmarketing', 'lucas.dantas@rdmarketingdigital.com.br', '2c42bdebd7bb37284c1328a8fe9c33af', '2023-05-03 18:57:36', 'logo.png', '0', NULL, '0', NULL, '0', '00', '0', '0', '0', 5, 'd'),
(91, 'lucasDantas', 'lucasdantas.rdmarketingdigital@gmail.com', '2c42bdebd7bb37284c1328a8fe9c33af', '2023-05-31 16:57:10', 'logo.png', '2', NULL, NULL, NULL, NULL, '414', '1@1.c', '111', NULL, 7108, 'a'),
(94, 'Lucas de Sousa Dantas', '', '', '0000-00-00 00:00:00', NULL, '', NULL, NULL, NULL, NULL, '', '', '444', NULL, 0, 'd'),
(95, 'Lucas de Sousa Dantas', '321@231.c', '2c42bdebd7bb37284c1328a8fe9c33af', '0000-00-00 00:00:00', 'logo.png', '421', '421', '412', NULL, '421', '421', '123@21321.c', '421', '214', 0, 'd'),
(96, 'Lucas de Sousa Dantas', '321@231.c', '-uW4;wG6}tT7', '0000-00-00 00:00:00', 'logo.png', '421', '421', '412', NULL, '421', '421', '123@21321.c', '421', '214', 0, 'd'),
(97, 'teste', 'aaa@aaa.com', '-uW4;wG6}tT7', '0000-00-00 00:00:00', 'logo.png', '32', '213', '21', NULL, '312', '213', 'lucas@lucas.com', '231', '231', 0, 'd'),
(98, 'old_wp', 'aaaaaa@bbbb.com', '-uW4;wG6}tT7', '2023-06-07 10:06:53', 'logo.png', '2413', '2', '214', '0000-00-00', '421', '21', '412@421cc.c', '1312312', '32121', 0, 'd'),
(99, 'asfas', '213@321c.c', '-uW4;wG6}tT7', '2023-06-07 11:06:19', 'logo.png', '123', '213', '213', '1111-05-10', '112', '132', '321@213.213', '321', '213', 0, 'd'),
(100, 'old_wp', '213@321c.c', '-uW4;wG6}tT7', '2023-06-07 14:06:35', 'https://trancarte.com.br/novosistemaarquitetos/files/architect-images/3_Trancarte-18.jpg', '213', '213', '213', '2023-06-07', '213', '123', '213@312.321', '123', '213', 0, 'd'),
(101, '213', '321@231.c', '-uW4;wG6}tT7', '2023-06-07 14:06:46', 'https://trancarte.com.br/novosistemaarquitetos/files/architect-images/3_Trancarte-18.jpg', '21312', '321', '213', '2023-06-07', '213', '123', '123@21321.c', '213', '123', 0, 'd'),
(102, '213', '321@231.c', '-uW4;wG6}tT7', '2023-06-07 14:06:44', 'https://trancarte.com.br/novosistemaarquitetos/files/architect-images/3_Trancarte-18.jpg', '21312', '321', '213', '2023-06-07', '213', '123', '123@21321.c', '213', '123', 0, 'd'),
(103, '124', '321@231.c', '-uW4;wG6}tT7', '2023-06-07 14:06:17', 'https://trancarte.com.br/novosistemaarquitetos/files/architect-images/3_Trancarte-18.jpg', '412', '124', '124', '2023-06-07', '1', '1', '1@1.1', '214', '214', 0, 'd'),
(104, 'teste', 'lucas.dantas@rdmarketingdigital.com.br', '-uW4;wG6}tT7', '2023-06-13 18:06:48', '/var/www/vhosts/trancarte.com.br/httpdocs/novosistemaarquitetos/files/architect-images/3-logo-trancarte-transparente.png', '1', '1', '1', '2023-06-13', '1', '12', '123@21321.c', 'sadas', '12321', 0, 'd'),
(105, 'testesrd123@rd.com', 'testesrd123@rd.com', '4f98b50d4ed84f26ec3407ab2edc4cb0', '2023-06-13 18:06:03', 'https://trancarte.com.br/novosistemaarquitetos/files/downloads/', '1', '1', '1', '2023-06-13', '1', '1', '123@21321.c111111111', '1', '1', 0, 'd'),
(106, 'testesR&DMarketing@rdmarketingdigital.com', 'testesR&DMarketing@rdmarketingdigital.com', '2c42bdebd7bb37284c1328a8fe9c33af', '2023-06-13 19:06:27', 'https://trancarte.com.br/novosistemaarquitetos/files/architect-images/', '11', '11', '11', '1111-11-11', '11', '1', 'testesR&DMarketing@rdmarketingdigital.com', '1', '1', 15, 'd'),
(107, 'lucas', 'lucas.dantas@rdmarketingdigital.com.br', '2c42bdebd7bb37284c1328a8fe9c33af', '2023-06-13 19:06:04', '111-logo-trancarte-transparente.png', '111', '11', '111', '2023-06-13', '312321', '12321', 'lucas@lucas.com', '13112', '21321', 0, 'a');

-- --------------------------------------------------------

--
-- Estrutura para tabela `downloads`
--

CREATE TABLE `downloads` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `idArquiteto` int DEFAULT NULL,
  `status` enum('a','d','b','') NOT NULL DEFAULT 'a',
  `dataCadastro` date NOT NULL,
  `nomeDoArquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `downloads`
--

INSERT INTO `downloads` (`id`, `nome`, `url`, `idArquiteto`, `status`, `dataCadastro`, `nomeDoArquivo`) VALUES
(1, '5', 'dasdas', NULL, 'd', '2023-06-13', ''),
(2, 'teste', 'https://trancarte.com.br/novosistemaarquitetos/files/downloads/3-Apresentacao-Arvore-Trancarte.pdf', NULL, 'd', '2023-06-14', '3-Apresentacao-Arvore-Trancarte.pdf'),
(3, 'teste', 'https://trancarte.com.br/novosistemaarquitetos/files/downloads/3-Apresentacao-Arvore-Trancarte.pdf', NULL, 'd', '2023-06-14', '3-Apresentacao-Arvore-Trancarte.pdf'),
(4, 'teste15', 'https://trancarte.com.br/novosistemaarquitetos/files/downloads/3-Apresentacao-Arvore-Trancarte.pdf', NULL, 'd', '2023-06-14', '3-Apresentacao-Arvore-Trancarte.pdf'),
(5, 'teste', 'https://trancarte.com.br/novosistemaarquitetos/files/downloads/3-Apresentacao-Arvore-Trancarte.pdf', NULL, 'd', '2023-06-15', '3-Apresentacao-Arvore-Trancarte.pdf'),
(6, 'atb', 'https://trancarte.com.br/novosistemaarquitetos/files/downloads/3-Apresentacao-Arvore-Trancarte.pdf', NULL, 'd', '2023-06-15', '3-Apresentacao-Arvore-Trancarte.pdf'),
(7, 'teste', 'https://trancarte.com.br/novosistemaarquitetos/files/downloads/3-Apresentacao-Arvore-Trancarte.pdf', NULL, 'd', '2023-06-22', '3-Apresentacao-Arvore-Trancarte.pdf'),
(8, 'teste', 'https://trancarte.com.br/novosistemaarquitetos/files/downloads/3-Apresentacao-Arvore-Trancarte.pdf', NULL, 'a', '2023-06-23', '3-Apresentacao-Arvore-Trancarte.pdf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int NOT NULL,
  `idArquiteto` int NOT NULL,
  `pedido` int NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `idVendedor` int NOT NULL,
  `data` date NOT NULL,
  `valor` float NOT NULL,
  `pontos` float NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `status` enum('a','d','b','') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idArquiteto`, `pedido`, `cliente`, `idVendedor`, `data`, `valor`, `pontos`, `dataCadastro`, `status`) VALUES
(3, 5, 0, 'João da Silva', 2, '2021-11-29', 0, 1000, '2021-11-29 14:16:12', 'a'),
(4, 5, 2020, 'Rafael Verdan', 3, '2021-11-29', 0, 3000, '2021-11-29 14:19:11', 'a'),
(5, 12, 9471, 'José Abdallah Nehe ', 4, '2022-02-25', 0, 14, '2022-03-15 11:35:45', 'a'),
(6, 11, 9518, 'FREGUESIA CENTER COMERCIO DE ROUPAS LTDA ', 4, '2022-02-24', 0, 52, '2022-03-15 11:37:33', 'a'),
(7, 10, 9516, 'RITZ PLAZA HOTEL LEBLON LTDA ', 4, '2022-02-24', 0, 7, '2022-03-15 11:38:58', 'a'),
(8, 9, 9495, 'Renata Pinto Abtibol ', 2, '2022-02-19', 0, 7, '2022-03-15 11:40:21', 'a'),
(9, 8, 9084, 'Elaine Oliveira Chada de Almeida ', 2, '2022-02-05', 0, 200, '2022-03-15 11:41:55', 'a'),
(10, 7, 9401, 'Michelle Mello de Souza ', 2, '2022-02-03', 0, 8, '2022-03-15 11:44:17', 'a'),
(11, 13, 521868, 'Robert Sellers ', 4, '2022-03-04', 0, 7, '2022-03-17 16:25:46', 'a'),
(12, 15, 521885, 'Carlos Clementino dos Santos Peixoto ', 4, '2022-03-24', 0, 1, '2022-03-25 11:32:32', 'a'),
(13, 17, 9631, 'Helena De Almeida Tupinamba ', 4, '2022-03-27', 0, 14, '2022-04-01 14:35:29', 'a'),
(14, 18, 9590, 'VITOR DE SOUZA DA SILVA ', 4, '2022-03-29', 0, 25, '2022-04-01 16:58:27', 'a'),
(15, 19, 9664, 'Ana Paula Andres Chitto', 2, '2022-04-02', 0, 33, '2022-04-06 09:38:06', 'a'),
(16, 20, 9628, 'Danielle Silbergleid ', 2, '2022-03-31', 0, 14, '2022-04-07 16:25:17', 'a'),
(17, 21, 521909, 'Peter de Oliveira Da silva', 4, '2022-03-31', 0, 6, '2022-04-14 10:20:24', 'a'),
(18, 22, 9581, 'Neusa Regina Larsen de Alvarenga Leite ', 2, '2022-04-14', 0, 26, '2022-04-21 09:10:42', 'a'),
(19, 12, 521942, 'Silvia Ribeiro de Albuquerque ', 4, '2022-04-22', 0, 4, '2022-04-27 15:30:56', 'a'),
(20, 23, 9687, 'Roberto Romero Dias Carneiro ', 4, '2022-04-27', 0, 10, '2022-04-29 13:24:15', 'a'),
(21, 24, 9638, 'Crezo Araujo ', 2, '2022-03-21', 0, 9, '2022-04-29 13:32:35', 'a'),
(22, 26, 521938, 'Simone Giacobbo Kopezynski ', 4, '2022-05-04', 62, 62, '2022-05-06 08:59:26', 'a'),
(23, 27, 9744, 'Ana paula Gentil ', 2, '2022-04-30', 0, 8, '2022-05-30 17:09:56', 'a'),
(24, 28, 522010, 'Gustavo Emina ', 4, '2022-05-30', 0, 1, '2022-06-01 13:48:13', 'a'),
(25, 8, 521948, 'Miguel Lacerda de Almeida', 2, '2022-02-05', 0, 33, '2022-06-15 13:48:52', 'a'),
(26, 29, 9787, 'Tiago Ferreira ', 2, '2022-04-29', 0, 50, '2022-06-22 17:22:57', 'a'),
(27, 30, 9865, 'Henrique Jose Dias ', 1, '2022-05-28', 0, 26, '2022-06-29 15:46:09', 'a'),
(28, 31, 9998, 'ALEXIS LEMOS COSTA SOCIEDADE SOCIEDADE INDIVIDUAL DE ADVOCACIA ', 4, '2022-07-06', 0, 150, '2022-07-12 10:17:04', 'a'),
(29, 28, 8807, 'Elaine Lourenco Menezes Nunes ', 4, '2022-06-23', 0, 23, '2022-07-13 15:50:46', 'a'),
(30, 28, 9919, 'LS FAMILY HOLDING LTDA -', 4, '2022-06-28', 0, 28, '2022-07-14 10:05:51', 'a'),
(31, 11, 10052, 'Bruno Marcolini', 2, '2022-07-21', 46000, 0, '2022-07-30 10:49:16', 'a'),
(32, 33, 9947, 'Marcos Tabuquine Marques ', 2, '2022-07-01', 0, 3, '2022-08-01 09:59:56', 'a'),
(33, 34, 10017, 'Elisete Ribeiro Lopes Carneiro ', 2, '2022-07-06', 0, 10, '2022-08-02 11:41:34', 'a'),
(34, 32, 10052, 'Bruno Marcolini ', 2, '2022-07-21', 0, 46, '2022-08-02 12:03:35', 'a'),
(35, 36, 10044, 'Erika Maria Tocci Ebert Linhares ', 4, '2022-07-15', 0, 2, '2022-08-02 17:54:54', 'a'),
(36, 37, 10117, 'Priscila dos Santos de Brito ', 4, '2022-07-30', 0, 23, '2022-08-02 18:28:45', 'a'),
(37, 38, 10110, 'Jose Eduardo de Camargo Leite ', 1, '2022-07-24', 0, 20, '2022-08-03 17:05:00', 'a'),
(38, 39, 10150, 'Victor Moraes', 1, '2022-07-31', 0, 4, '2022-08-04 14:27:33', 'a'),
(39, 40, 10030, 'L&S EMPREENDIMENTOS IMOBILIARIOS -', 4, '2022-07-09', 0, 267, '2022-08-05 09:38:02', 'a'),
(40, 41, 10127, 'Sônia Bahiense Araujo Gomes ', 2, '2022-07-27', 0, 5, '2022-08-05 16:28:25', 'a'),
(41, 42, 10132, 'MARILUCIA SALES DE SOUZA ', 4, '2022-07-30', 30192, 30, '2022-08-05 16:44:45', 'a'),
(42, 43, 10107, 'Haroldo Alves Flores ', 4, '2022-07-30', 0, 32, '2022-08-08 09:59:43', 'a'),
(43, 44, 10082, 'Alan Douglas Borges De Carvalho ', 4, '2022-07-31', 0, 242, '2022-08-08 13:39:40', 'a'),
(44, 45, 10012, 'Giovana Bartelle Velloso ', 1, '2022-07-05', 0, 80, '2022-08-08 17:17:19', 'a'),
(45, 46, 9892, 'Rita Leta -', 1, '2022-07-14', 0, 2, '2022-08-09 11:37:19', 'a'),
(46, 47, 10026, 'Mariana Pereira Silveira ', 2, '2022-07-08', 7815, 7, '2022-08-10 14:34:55', 'a'),
(47, 48, 7782, 'Mauricio Pimentel Marinho ', 2, '2022-07-31', 0, 36, '2022-08-10 15:44:09', 'a'),
(48, 49, 10166, 'PATRICIA GUEDES XAVIER ', 2, '2022-08-03', 0, 8, '2022-08-11 16:12:25', 'a'),
(49, 50, 10183, 'Anete Weltzer Niskier ', 3, '2022-08-10', 0, 47, '2022-08-17 16:25:11', 'a'),
(50, 51, 9970, 'Gary Desmond Campbel ', 2, '2022-07-31', 0, 53, '2022-08-18 09:20:42', 'a'),
(51, 30, 10209, 'Henrique Jose Dias ', 1, '2022-08-13', 0, 60, '2022-08-26 14:30:20', 'a'),
(52, 52, 10148, 'LUIS GUSTAVO NOGUEIRA FRANCISCO', 3, '2022-07-30', 0, 10, '2022-08-29 15:17:26', 'a'),
(53, 53, 10224, 'Elie Safadi Sender', 2, '2022-08-20', 0, 6, '2022-08-30 16:45:27', 'a'),
(54, 44, 10249, 'Alan Douglas Borges De Carvalho ', 4, '2022-08-29', 0, 2, '2022-09-02 10:40:45', 'a'),
(55, 54, 9992, 'Pedro Mendes Tavares de Souza ', 3, '2022-08-19', 0, 11, '2022-09-12 10:05:37', 'a'),
(56, 55, 10419, 'NONOW PARTICIPACOES LTDA', 4, '2022-10-07', 100000, 100, '2022-10-08 10:28:27', 'a'),
(57, 56, 10350, 'GRAND CABALLERO BARBER SHOPP LTDA', 4, '2022-09-22', 0, 0, '2022-10-08 10:43:42', 'a'),
(58, 57, 9858, 'Michael Gidwitz', 3, '2022-06-19', 33748, 33, '2022-10-08 10:46:28', 'a'),
(59, 58, 10284, 'Flavio Vieira Lima Neto', 3, '2022-09-15', 80000, 80, '2022-10-08 10:48:19', 'a'),
(60, 59, 10264, 'MILANO EMPREENDIMENTOS E PARTICIPACOES S/A', 2, '2022-09-13', 60730, 61, '2022-10-08 10:51:50', 'a'),
(61, 60, 10141, 'ANDRE LUIS CORBACHO VIANNA', 2, '2022-09-08', 110000, 110, '2022-10-08 10:55:55', 'a'),
(62, 61, 10265, 'João Gilberto Barreiros de Moura Braga', 2, '2022-09-01', 12681, 12, '2022-10-08 10:57:44', 'a'),
(63, 44, 10249, ' Alan Douglas Borges De Carvalho', 4, '2022-08-29', 2587, 2, '2022-10-08 10:59:30', 'a'),
(64, 47, 10225, 'Alessandra Rangel de Oliveira', 2, '2022-08-29', 11535, 11, '2022-10-08 11:01:42', 'a'),
(65, 62, 10474, 'Miguel Dibo ', 4, '2022-10-20', 12136, 121, '2022-10-22 09:20:16', 'a'),
(66, 63, 10495, 'Vânia Maria Platenik Gonçalves', 1, '2022-10-19', 5000, 50, '2022-10-22 09:24:21', 'a'),
(67, 40, 10466, 'L&S EMPREENDIMENTOS IMOBILIARIOS ', 4, '2022-10-15', 3600, 36, '2022-10-22 09:28:35', 'a'),
(68, 56, 10350, 'GRAND CABALLERO ', 4, '2022-09-22', 11000, 110, '2022-10-22 09:38:40', 'a'),
(69, 57, 9858, 'Michael Gidwitz ', 3, '2022-09-19', 3374, 34, '2022-10-22 09:44:56', 'a'),
(70, 56, 10735, 'BARRA CAR AUTO LTDA', 4, '2022-11-29', 55000, 55, '2022-12-03 16:33:22', 'a'),
(71, 67, 10729, 'Roberta Vieira', 1, '2022-11-28', 41.497, 41, '2022-12-03 16:42:54', 'a'),
(72, 68, 10718, 'Eduardo de Barros Manhaes', 4, '2022-11-27', 17000, 17, '2022-12-03 16:45:41', 'a'),
(73, 64, 10449, 'NONOW PARTICIPACOES LTDA', 4, '2022-11-27', 6236, 6, '2022-12-03 16:47:07', 'a'),
(74, 69, 9988, 'ESTILO NOBRE I RIO SUB-EMPREITEIRA LTDA', 4, '2022-11-24', 13221, 13, '2022-12-03 16:49:06', 'a'),
(75, 70, 10688, 'Thiago Ruiz Lopes', 4, '2022-11-23', 4577, 4, '2022-12-03 16:52:07', 'a'),
(76, 71, 10638, 'Carla Machado Nazareth', 4, '2022-11-21', 7000, 7, '2022-12-03 16:54:32', 'a'),
(77, 72, 10279, 'Thaisa Xavier Gonçalves Faia', 1, '2022-11-19', 7000, 7, '2022-12-03 16:56:37', 'a'),
(78, 73, 10545, 'MAXX CLUBE DE BENEFICIOS DO BRASIL', 4, '2022-11-12', 6500, 6, '2022-12-03 17:00:36', 'a'),
(79, 74, 10595, 'Phelipe Guedes Vianna', 4, '2022-11-10', 21918, 22, '2022-12-03 17:03:01', 'a'),
(80, 22, 10387, 'Neusa Regina Larsen de Alvarenga Leite', 3, '2022-11-01', 6167, 6, '2022-12-04 08:23:38', 'a'),
(81, 75, 10544, 'Derlan de Lima Ribeiro', 4, '2022-10-31', 48598, 49, '2022-12-04 08:27:41', 'a'),
(82, 71, 10528, 'Carla Machado Nazareth', 4, '2022-10-26', 20587, 22, '2022-12-04 08:29:56', 'a'),
(83, 8, 521827, 'Miguel Lacerda de Almeida', 3, '2022-02-05', 50001, 50, '2022-12-04 08:48:13', 'a'),
(84, 76, 9643, 'Carlos Roberto Fuziyama', 4, '2022-03-30', 300000, 300, '2022-12-04 09:22:18', 'a'),
(85, 28, 9643, 'Carlos Roberto Fuziyama', 4, '2022-03-30', 300000, 300, '2022-12-04 09:23:13', 'a'),
(86, 28, 10637, 'Elaine Lourenco Menezes Nunes', 4, '2022-11-17', 3478, 3, '2022-12-04 09:32:43', 'a'),
(87, 31, 10576, 'ALEXIS LEMOS COSTA SOCIEDADE SOCIEDADE INDIVIDUAL DE ADVOCACIA', 4, '2022-11-17', 1767, 2, '2022-12-04 09:34:37', 'a'),
(88, 28, 10560, 'Mário Cunha Campos', 4, '2022-11-10', 30000, 30, '2022-12-04 09:37:05', 'a'),
(89, 28, 10433, 'PEDRO DE SOUSA DORIA DREUX', 4, '2022-10-07', 30265, 30, '2022-12-04 09:41:36', 'a'),
(90, 64, 10419, ' NONOW PARTICIPACOES LTDA', 4, '2022-10-07', 100000, 100, '2022-12-04 09:43:37', 'a'),
(91, 77, 9470, 'FATIMA MARIA VERANO MAURO', 4, '2022-09-30', 21118, 21, '2022-12-04 09:46:27', 'a'),
(92, 28, 10256, 'Rodolfo Medina', 4, '2022-09-27', 10000, 10, '2022-12-04 09:47:58', 'a'),
(93, 78, 10672, 'Maurício Visconti Luz', 1, '2022-11-23', 20000, 20, '2022-12-04 10:14:41', 'a'),
(94, 78, 10669, 'Maurício Visconti Luz', 1, '2022-11-23', 20000, 20, '2022-12-04 10:15:43', 'a'),
(95, 79, 10279, 'Thaisa Xavier Gonçalves Faia', 1, '2022-11-19', 7000, 7, '2022-12-04 10:17:34', 'a'),
(96, 80, 10385, 'Guilherme Silva Trovão', 1, '2022-10-03', 2200, 2, '2022-12-04 10:21:50', 'a'),
(97, 81, 10215, 'Cornelia Stein', 1, '2022-09-28', 46655, 46, '2022-12-04 10:24:51', 'a'),
(98, 78, 10372, 'Maurício Visconti Luz', 1, '2022-09-24', 100000, 100, '2022-12-04 10:27:10', 'a'),
(99, 78, 10361, 'Maurício Visconti Luz', 1, '2022-09-23', 50000, 50, '2022-12-04 10:28:19', 'a'),
(100, 80, 10198, 'Guilherme Silva Trovão', 1, '2022-08-10', 1971, 2, '2022-12-04 10:30:13', 'a'),
(101, 82, 9552, 'Andréa Rezende Vaz', 3, '2022-02-05', 66750, 66, '2022-12-04 10:49:43', 'a'),
(102, 83, 9744, 'Ana paula Gentil', 3, '2022-04-30', 8488, 8, '2022-12-04 10:51:52', 'a'),
(103, 84, 9359, 'Rafaela Herdy Fischer', 3, '2022-02-07', 121700, 121, '2022-12-04 10:57:04', 'a'),
(104, 7, 9401, 'Michelle Mello de Souza', 2, '2022-02-03', 8068, 8, '2022-12-04 11:12:55', 'a'),
(105, 85, 522185, 'Aline Santana Sena Oliveira', 2, '2022-11-08', 31152, 31, '2022-12-04 11:16:23', 'a'),
(106, 86, 521936, 'Regina Helena Tavora de Mello Cunha', 2, '2022-04-13', 7218, 7, '2022-12-04 11:23:16', 'a'),
(107, 58, 522160, 'Flávio Vieira LIma Neto', 3, '2022-10-11', 4500, 4, '2022-12-04 11:25:38', 'a'),
(108, 87, 522026, 'Marcelo Orberg', 4, '2022-09-19', 40370, 40, '2022-12-04 11:31:32', 'a'),
(109, 91, 421, '142', 5, '2023-06-09', 231, 15, '2023-06-09 18:06:47', 'a'),
(110, 91, 1111, '1111', 5, '1970-01-01', 111, 111, '2023-06-12 17:06:49', 'a'),
(111, 91, 22222, '2222', 5, '1970-01-01', 222, 22, '2023-06-12 17:06:37', 'a'),
(112, 91, 22222, '2222', 5, '1970-01-01', 222, 22, '2023-06-12 17:06:51', 'a'),
(113, 91, 333, '333', 5, '2003-03-31', 333, 333, '2023-06-12 17:06:31', 'a'),
(114, 91, 444, '444', 5, '2004-04-04', 444, 444, '2023-06-12 18:06:36', 'd'),
(115, 91, 55555, '5555', 5, '2005-05-05', 555555, 55555, '2023-06-12 18:06:16', 'a'),
(116, 91, 2147483647, '777', 5, '2007-07-07', 7777780, 77777, '2023-06-12 18:06:46', 'd'),
(117, 91, 2147483647, '777', 5, '2007-07-07', 7777780, 77777, '2023-06-12 18:06:16', 'a'),
(118, 91, 2147483647, '777', 5, '2007-07-07', 7777780, 77777, '2023-06-12 18:06:35', 'd'),
(119, 91, 67777, '777', 5, '2007-07-07', 7777780, 77777, '2023-06-12 18:06:59', 'd'),
(120, 91, 1212, '1212', 5, '2007-07-07', 7777780, 77777, '2023-06-12 18:06:26', 'd'),
(121, 91, 1313, '1313', 5, '1970-01-01', 11111, 111, '2023-06-12 18:06:16', 'a'),
(122, 91, 141414, '141414', 5, '1970-01-01', 1414, 1414, '2023-06-12 18:06:18', 'd'),
(123, 91, 151515, '151515', 2, '1970-01-01', 5, 1, '2023-06-12 18:06:19', 'd'),
(124, 91, 1777777, '777777', 5, '1970-01-01', 111, 111, '2023-06-12 18:06:18', 'a'),
(125, 91, 551, '551', 5, '1970-01-01', 15, 5555, '2023-06-13 11:06:22', 'd'),
(126, 106, 4443, '4443', 5, '1970-01-01', 15, 15, '2023-06-13 19:06:58', 'd');

-- --------------------------------------------------------

--
-- Estrutura para tabela `teste`
--

CREATE TABLE `teste` (
  `teste` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `teste`
--

INSERT INTO `teste` (`teste`) VALUES
('Lucas de Sousa Dantas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nome`, `login`, `senha`) VALUES
(1, 'Guppy', 'guppy', 'd1c47df9c7d692538e6744fea9d826b1'),
(2, 'Trancarte', 'trancarte', '4acbe3fb21ea3319952325b0b9801e2b'),
(3, 'webrd', 'webrd', '2c42bdebd7bb37284c1328a8fe9c33af');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `idVendedor` int NOT NULL,
  `vendedor` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `dataCadastro` date NOT NULL,
  `status` enum('a','d','b','') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `vendedores`
--

INSERT INTO `vendedores` (`idVendedor`, `vendedor`, `usuario`, `cpf`, `rg`, `email`, `senha`, `dataCadastro`, `status`) VALUES
(1, ' Laureano Nicácio ', '', '', '', '', '', '0000-00-00', 'a'),
(2, ' Déborah Nunes', '', '', '', '', '', '0000-00-00', 'a'),
(3, 'Bárbara Xavier', '', '', '', '', '', '0000-00-00', 'a'),
(4, 'Keferson Jose ', '', '', '', '', '', '0000-00-00', 'a'),
(5, 'teste', 'webrd', '1231312', '213', 'lucas.dantas@rdmarketingdigital.com.br', 'f9acebb0fe0eebff7646a62cd0ccb295', '2023-06-09', 'a');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `arquitetos`
--
ALTER TABLE `arquitetos`
  ADD PRIMARY KEY (`idArquiteto`);

--
-- Índices de tabela `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idArquiteto` (`idArquiteto`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices de tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`idVendedor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquitetos`
--
ALTER TABLE `arquitetos`
  MODIFY `idArquiteto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de tabela `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `idVendedor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`idArquiteto`) REFERENCES `arquitetos` (`idArquiteto`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
