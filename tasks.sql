-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jan-2018 às 22:09
-- Versão do servidor: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto_tasks`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `code` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `attached_file` varchar(256) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tasks`
--

INSERT INTO `tasks` (`id`, `code`, `name`, `description`, `attached_file`, `user_id`) VALUES
(1, 'lm273', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut ligula vel lectus molestie suscipit non sit amet nisi. Phasellus et est purus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam in ornare elit, vitae rhoncus nulla. Donec non velit imperdiet, bibendum leo gravida, pretium libero. Nulla lorem purus, porta ac vulputate in, hendrerit vitae justo. Vivamus mi purus, consequat nec elit non, porta auctor lectus.', '14703368831515704748.pdf', 1),
(2, 'sm12312', 'Sem Anexo', 'Maecenas volutpat lectus vitae diam laoreet egestas. Nam sit amet urna et massa faucibus eleifend. Vivamus tincidunt quam sit amet sem eleifend efficitur. Phasellus quam felis, vehicula ut mollis in, sodales sed ipsum. Nam mattis tellus eu commodo laoreet. Vestibulum posuere mauris ut urna auctor lacinia. Morbi fringilla accumsan commodo. In hac habitasse platea dictumst.', '0', 1),
(4, 'msa2312', 'Maecenas sit amet', 'Maecenas sit amet leo mollis, porttitor nisi id, aliquet arcu. Proin non libero nisl. Nunc vel feugiat orci. Sed ultrices nunc volutpat congue consequat. Duis iaculis urna in augue rutrum dictum. Quisque vehicula maximus tortor, sed laoreet orci viverra non. Fusce et dolor tincidunt, egestas nibh ut, faucibus magna. Sed convallis ultrices mauris, vulputate blandit orci accumsan ut.', '20708714151515704494.pdf', 2),
(5, '12312132', 'Arquivo', 'Um arquivo anexado', '4177278101515704524.docx', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tasks_users` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `FK_tasks_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
