-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 09:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin.online`
--

INSERT INTO `tb_admin.online` (`id`, `ip`, `ultima_acao`, `token`) VALUES
(25, '::1', '2020-11-18 17:41:43', '5f97ff5a41540');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
(1, 'admin', 'admin', '5faacd67de574.jpg', 'Leonardo Pessoa', 0),
(2, 'leo', 'leo', '7612528fd50281b2631d690953b96b61.jpg', 'Leo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `dia`) VALUES
(1, '::1', '2020-10-19'),
(2, '192.168.0.2', '2020-10-18'),
(3, '::1', '2020-10-25'),
(4, '::1', '2020-11-02'),
(5, '::1', '2020-11-10'),
(6, '::1', '2020-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.categorias`
--

CREATE TABLE `tb_site.categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_site.categorias`
--

INSERT INTO `tb_site.categorias` (`id`, `nome`, `slug`, `order_id`) VALUES
(14, 'General', 'general', 14),
(15, 'Cotidiano', 'cotidiano', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.config`
--

CREATE TABLE `tb_site.config` (
  `titulo` varchar(255) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `descricao1` text NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `descricao3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_site.config`
--

INSERT INTO `tb_site.config` (`titulo`, `nome_autor`, `descricao`, `icone1`, `descricao1`, `icone2`, `descricao2`, `icone3`, `descricao3`) VALUES
('Projeto 01', 'Leonardo Pessoa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at nunc ornare, vehicula nisl eget, tristique arcu. Etiam porttitor mauris risus, at maximus tellus fermentum ut. Nullam commodo interdum lorem, a consequat est. Ut vel sollicitudin purus. Phasellus pretium elit ac purus feugiat ultricies. Aliquam massa lectus, scelerisque vel porta at, efficitur quis diam. Nam vitae lorem placerat, varius turpis in, tincidunt ante. Sed tincidunt posuere dui.\r\n\r\nPhasellus hendrerit, lacus eget efficitur mollis, diam erat faucibus sapien, ut tristique arcu enim tempor neque. Vestibulum at tellus ac turpis aliquam laoreet. Integer sit amet tempor ipsum, a consectetur massa. Vivamus suscipit tortor ut nisl iaculis aliquam. Aliquam vel odio at eros vestibulum malesuada vitae vitae enim. Suspendisse varius metus facilisis, ullamcorper ligula in, pellentesque lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\n\r\nPhasellus hendrerit, lacus eget efficitur mollis, diam erat faucibus sapien, ut tristique arcu enim tempor neque. Vestibulum at tellus ac turpis aliquam laoreet. Integer sit amet tempor ipsum, a consectetur massa. Vivamus suscipit tortor ut nisl iaculis aliquam. Aliquam vel odio at eros vestibulum malesuada vitae vitae enim. Suspendisse varius metus facilisis, ullamcorper ligula in, pellentesque lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'fab fa-css3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at nunc ornare, vehicula nisl eget, tristique arcu. Etiam porttitor mauris risus, at maximus tellus fermentum ut. Nullam commodo interdum lorem, a consequat est. Ut vel sollicitudin purus. Phasellus pretium elit ac purus feugiat ultricies. Aliquam massa lectus.', 'fab fa-html5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at nunc ornare, vehicula nisl eget, tristique arcu. Etiam porttitor mauris risus, at maximus tellus fermentum ut. Nullam commodo interdum lorem, a consequat est. Ut vel sollicitudin purus. Phasellus pretium elit ac purus feugiat ultricies. Aliquam massa lectus.', 'fab fa-js-square', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at nunc ornare, vehicula nisl eget, tristique arcu. Etiam porttitor mauris risus, at maximus tellus fermentum ut. Nullam commodo interdum lorem, a consequat est. Ut vel sollicitudin purus. Phasellus pretium elit ac purus feugiat ultricies. Aliquam massa lectus.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.depoimentos`
--

CREATE TABLE `tb_site.depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_site.depoimentos`
--

INSERT INTO `tb_site.depoimentos` (`id`, `nome`, `depoimento`, `data`, `order_id`) VALUES
(26, 'Leonardo', 'Funcionando!', '19/09/2020', 29),
(27, 'Paulo', 'Muito bom mesmo!!!', '19/09/2020', 27),
(28, 'Marcia', 'Gostei de mais!', '19/09/2020', 26),
(29, 'Ana', 'Otimo atendimento!', '20/03/2021', 28),
(30, 'Leonardo', 'TESTEEEEEEEEEEEEEEEE', '20/03/2021', 30),
(31, 'TomY', 'OUTRO TESTE', '20/03/2021', 31);

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.noticias`
--

CREATE TABLE `tb_site.noticias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `capa` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_site.noticias`
--

INSERT INTO `tb_site.noticias` (`id`, `categoria_id`, `data`, `titulo`, `conteudo`, `capa`, `slug`, `order_id`) VALUES
(24, 14, '2020-11-16', 'Novo jogo do Mario', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et magna turpis. In venenatis leo nec quam laoreet vestibulum. Nunc pharetra, elit id convallis rutrum, lectus dolor ullamcorper arcu, ac vulputate enim augue ac nisl. Vivamus ac libero eget turpis vehicula mattis at ut sem. Sed tempus tincidunt aliquet. Phasellus tincidunt suscipit purus sed iaculis. Sed vel feugiat augue, a porta mauris. Fusce elementum et elit non pretium. Suspendisse et vulputate est. Nunc rutrum ipsum quis velit pretium vulputate. In molestie lorem et ultricies semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum erat tellus, hendrerit ut eros ut, ornare tincidunt leo. Fusce feugiat ipsum sed enim sagittis, eu feugiat diam placerat. Etiam tortor dolor, blandit a libero eu, condimentum feugiat sem.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Suspendisse et faucibus nisl. Duis ac est dignissim, fermentum dui at, iaculis risus. Cras maximus tempor lacus, at mattis leo bibendum eu. Fusce eleifend urna vitae tellus varius, non lacinia augue dictum. Aenean nec justo non odio ultrices elementum. Duis dignissim massa nec sodales rhoncus. In at lorem eu arcu tristique vestibulum non ac turpis. Vivamus nibh massa, fermentum et eros vel, dapibus feugiat arcu. Pellentesque malesuada, felis id varius fringilla, orci felis vulputate nisl, nec accumsan libero tellus sed risus. Donec non sem malesuada, aliquam enim nec, pharetra felis. Mauris ut nibh purus. In rutrum lorem sit amet justo dignissim blandit. Integer placerat, orci sed sollicitudin ullamcorper, arcu est placerat orci, sed sollicitudin sapien nisl nec ligula.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\"><img src=\"https://lh3.googleusercontent.com/proxy/6lWLebXVOwmWNeXKN3zf-zi3G-7f51yEK1NUcDZmqZTtSU64EZbchLCwDp2qHGfrrBMGwFsXSxgyeEM8fD3SBWECIkn0VLx9zQsHU6psHvGXTnfUT5NRwf46HBc_8fLZZP4B8H_J0kqXadCrkAP8zx4-0oEoGnQzV8egnxHTLXaqPfVbgJhv\" alt=\"Matem&aacute;tica no cotidiano | Galera Cult\" /></p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et magna turpis. In venenatis leo nec quam laoreet vestibulum. Nunc pharetra, elit id convallis rutrum, lectus dolor ullamcorper arcu, ac vulputate enim augue ac nisl. Vivamus ac libero eget turpis vehicula mattis at ut sem. Sed tempus tincidunt aliquet. Phasellus tincidunt suscipit purus sed iaculis. Sed vel feugiat augue, a porta mauris. Fusce elementum et elit non pretium. Suspendisse et vulputate est. Nunc rutrum ipsum quis velit pretium vulputate. In molestie lorem et ultricies semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum erat tellus, hendrerit ut eros ut, ornare tincidunt leo. Fusce feugiat ipsum sed enim sagittis, eu feugiat diam placerat. Etiam tortor dolor, blandit a libero eu, condimentum feugiat sem.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Suspendisse et faucibus nisl. Duis ac est dignissim, fermentum dui at, iaculis risus. Cras maximus tempor lacus, at mattis leo bibendum eu. Fusce eleifend urna vitae tellus varius, non lacinia augue dictum. Aenean nec justo non odio ultrices elementum. Duis dignissim massa nec sodales rhoncus. In at lorem eu arcu tristique vestibulum non ac turpis. Vivamus nibh massa, fermentum et eros vel, dapibus feugiat arcu. Pellentesque malesuada, felis id varius fringilla, orci felis vulputate nisl, nec accumsan libero tellus sed risus. Donec non sem malesuada, aliquam enim nec, pharetra felis. Mauris ut nibh purus. In rutrum lorem sit amet justo dignissim blandit. Integer placerat, orci sed sollicitudin ullamcorper, arcu est placerat orci, sed sollicitudin sapien nisl nec ligula.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Duis blandit nisi sit amet arcu hendrerit, ac porttitor sem euismod. Donec sollicitudin dictum justo ac pretium. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi pretium volutpat quam id pulvinar. Donec quis ullamcorper dolor, eget tempor erat. Aenean non magna sit amet justo iaculis sagittis id eget libero. Integer justo libero, feugiat ac erat eu, consequat tempor nisl. Quisque viverra lacinia erat, ornare mollis elit posuere ac. Cras cursus bibendum lacinia. Aenean congue blandit eleifend.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Quisque sed massa nec lorem auctor sodales. Ut et massa quis mi interdum volutpat. Fusce eget varius velit. Cras dapibus, velit sit amet volutpat venenatis, urna massa rutrum eros, vel dignissim purus ex ac lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam non velit convallis, ultricies nisi nec, molestie enim. Morbi in est vehicula, posuere ante non, lobortis diam. Donec velit tellus, congue vitae diam eget, tincidunt gravida libero. Donec commodo metus ut felis vulputate porta. Ut gravida ac elit eget ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Integer est augue, imperdiet egestas magna nec, dignissim bibendum augue. Aenean dignissim, diam eget tincidunt semper, metus libero pulvinar purus, in dapibus sem eros commodo urna. Ut hendrerit suscipit dignissim. Nulla facilisi. Integer gravida sem sed massa ultrices vulputate. Vestibulum eu maximus quam. Donec dignissim arcu vel est cursus, ut maximus ipsum mollis. Proin quis augue eu leo scelerisque volutpat at eu leo. Donec ut fermentum ligula. Duis interdum urna id lacus mollis dapibus. Duis hendrerit sem aliquam posuere tristique. Curabitur suscipit venenatis dui vitae bibendum. Etiam malesuada pellentesque dolor, ac scelerisque ipsum condimentum ac. Nam pulvinar aliquet ipsum sit amet auctor.</p>', '5fb2c2710ea15.jpg', 'novo-jogo-do-mario', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.servicos`
--

CREATE TABLE `tb_site.servicos` (
  `id` int(11) NOT NULL,
  `servico` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_site.servicos`
--

INSERT INTO `tb_site.servicos` (`id`, `servico`, `order_id`) VALUES
(5, 'My service of control panel with very functions', 5),
(6, 'My service of SEO for optimize your website EDITADOO', 4),
(7, 'My service of marketing for upgrade your sells', 6),
(8, 'My service of developer ', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.slides`
--

CREATE TABLE `tb_site.slides` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_site.slides`
--

INSERT INTO `tb_site.slides` (`id`, `nome`, `slide`, `order_id`) VALUES
(16, 'Slider #1', '5fa148e40e5b2.jpg', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
