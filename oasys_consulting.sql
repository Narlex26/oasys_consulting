-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: Mar 18, 2023 at 11:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oasys_consulting`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `adresse_mail_client` varchar(255) DEFAULT NULL,
  `nom_client` varchar(255) DEFAULT NULL,
  `prenom_client` varchar(255) DEFAULT NULL,
  `nom_entreprise_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `adresse_mail_client`, `nom_client`, `prenom_client`, `nom_entreprise_client`) VALUES
(1, 'test@test.com', 'test', 'test', 'test entreprise'),
(2, 'gaetan.mass@bergerlevraud.com', 'Mass', 'Gaetan', 'Berger Levraud'),
(3, 'fedou.gab@gmail.com', 'Fedou', 'Gabriel', 'Gabriel Fedou Corp'),
(4, 'thomas.beuil@mobilerecycle.fr', 'Beuil', 'Thomas', 'Mobile Recycle');

-- --------------------------------------------------------

--
-- Table structure for table `etape_projet`
--

CREATE TABLE `etape_projet` (
  `id_etape_projet` int(11) NOT NULL,
  `commentaire_etape_projet` varchar(255) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_end` datetime DEFAULT NULL,
  `code_projet` int(11) NOT NULL,
  `id_type_etape_projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etape_projet`
--

INSERT INTO `etape_projet` (`id_etape_projet`, `commentaire_etape_projet`, `date_add`, `date_end`, `code_projet`, `id_type_etape_projet`) VALUES
(25, 'Début de projet', '2023-03-02 10:24:32', '2023-03-03 15:54:32', 4, 1),
(26, 'mise en place du cahier des charges / MCD', '2023-03-03 15:08:53', NULL, 4, 2),
(27, 'Présentation du cahier des charges au client', '2023-03-14 14:59:09', NULL, 4, 2),
(28, 'Développement des vue / controller', '2023-03-14 14:59:48', NULL, 4, 3),
(29, 'Présentation des vues au client pour premier rendu', '2023-03-14 15:00:37', NULL, 4, 4),
(30, 'Développement des classes / Model -> premiers test effectués', '2023-03-14 15:01:40', NULL, 4, 3),
(31, 'Présentation es premières fonctionnalités au client pour validation et retours', '2023-03-14 15:02:30', NULL, 4, 4),
(32, 'Finalisation des dernières fonctionnalités demandé par le client lors de la présentation', '2023-03-14 15:03:28', NULL, 4, 3),
(33, 'Présentation finale au client', '2023-03-07 15:05:18', NULL, 4, 4),
(34, 'Rendu de projet -> hébergement sur le serveur du client', '2023-03-06 15:04:32', NULL, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `etape_projet_user`
--

CREATE TABLE `etape_projet_user` (
  `id_user` int(11) NOT NULL,
  `id_etape_projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etape_projet_user`
--

INSERT INTO `etape_projet_user` (`id_user`, `id_etape_projet`) VALUES
(1, 26),
(1, 27),
(1, 28),
(1, 32),
(1, 33),
(2, 26),
(2, 29),
(2, 30),
(2, 33),
(3, 25),
(3, 28),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(4, 25),
(4, 30),
(4, 31),
(4, 33);

-- --------------------------------------------------------

--
-- Table structure for table `facturation`
--

CREATE TABLE `facturation` (
  `id_facturation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facturation`
--

INSERT INTO `facturation` (`id_facturation`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

CREATE TABLE `projet` (
  `code_projet` int(11) NOT NULL,
  `libelle_projet` varchar(50) NOT NULL,
  `date_de_debut_projet` date NOT NULL,
  `date_de_fin_projet` date DEFAULT NULL,
  `taux_horaire_projet` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_facturation` int(11) DEFAULT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projet`
--

INSERT INTO `projet` (`code_projet`, `libelle_projet`, `date_de_debut_projet`, `date_de_fin_projet`, `taux_horaire_projet`, `id_user`, `id_facturation`, `id_client`) VALUES
(1, 'Projet 1', '2023-03-09', NULL, 10, 1, 1, 2),
(2, 'Projet 2', '2023-02-21', NULL, 12, 2, NULL, 4),
(3, 'Projet 3', '2023-03-07', '2023-03-10', 10, 1, NULL, 3),
(4, 'Projet 4', '2023-03-08', NULL, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `libelle_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `libelle_role`) VALUES
(1, 'Technicien'),
(2, 'Administrateur'),
(3, 'Prestataire externe'),
(4, 'Chef de projet');

-- --------------------------------------------------------

--
-- Table structure for table `type_etape_projet`
--

CREATE TABLE `type_etape_projet` (
  `id_type_etape_projet` int(11) NOT NULL,
  `libelle_type_etape_projet` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_etape_projet`
--

INSERT INTO `type_etape_projet` (`id_type_etape_projet`, `libelle_type_etape_projet`) VALUES
(1, 'Initiation'),
(2, 'Planification'),
(3, 'Exécution'),
(4, 'Contrôle'),
(5, 'Fermeture');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `adresse_mail_user` varchar(255) DEFAULT NULL,
  `password_user` varchar(255) DEFAULT NULL,
  `nom_user` varchar(50) DEFAULT NULL,
  `prenom_user` varchar(50) DEFAULT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `adresse_mail_user`, `password_user`, `nom_user`, `prenom_user`, `id_role`) VALUES
(1, 'alexandre.boyer@mobilerecycle.fr', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', 'Boyer', 'Alexandre', 4),
(2, 'maxime.dufour@gmail.com', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', 'Dufour', 'Maxime', 4),
(3, 'amadou.ly@outlook.com', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', 'Ly', 'Amadou', 3),
(4, 'paul.floutard@gmail.com', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', 'Floutard', 'Paul', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `etape_projet`
--
ALTER TABLE `etape_projet`
  ADD PRIMARY KEY (`id_etape_projet`),
  ADD KEY `code_projet` (`code_projet`),
  ADD KEY `id_type_etape_projet` (`id_type_etape_projet`);

--
-- Indexes for table `etape_projet_user`
--
ALTER TABLE `etape_projet_user`
  ADD PRIMARY KEY (`id_user`,`id_etape_projet`),
  ADD KEY `id_etape_projet` (`id_etape_projet`);

--
-- Indexes for table `facturation`
--
ALTER TABLE `facturation`
  ADD PRIMARY KEY (`id_facturation`);

--
-- Indexes for table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`code_projet`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_facturation` (`id_facturation`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `type_etape_projet`
--
ALTER TABLE `type_etape_projet`
  ADD PRIMARY KEY (`id_type_etape_projet`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `etape_projet`
--
ALTER TABLE `etape_projet`
  MODIFY `id_etape_projet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facturation`
--
ALTER TABLE `facturation`
  MODIFY `id_facturation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projet`
--
ALTER TABLE `projet`
  MODIFY `code_projet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_etape_projet`
--
ALTER TABLE `type_etape_projet`
  MODIFY `id_type_etape_projet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `etape_projet`
--
ALTER TABLE `etape_projet`
  ADD CONSTRAINT `etape_projet_ibfk_1` FOREIGN KEY (`code_projet`) REFERENCES `projet` (`code_projet`),
  ADD CONSTRAINT `etape_projet_ibfk_2` FOREIGN KEY (`id_type_etape_projet`) REFERENCES `type_etape_projet` (`id_type_etape_projet`);

--
-- Constraints for table `etape_projet_user`
--
ALTER TABLE `etape_projet_user`
  ADD CONSTRAINT `etape_projet_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `etape_projet_user_ibfk_2` FOREIGN KEY (`id_etape_projet`) REFERENCES `etape_projet` (`id_etape_projet`);

--
-- Constraints for table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `projet_ibfk_2` FOREIGN KEY (`id_facturation`) REFERENCES `facturation` (`id_facturation`),
  ADD CONSTRAINT `projet_ibfk_3` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
