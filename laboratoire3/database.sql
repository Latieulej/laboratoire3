-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 26 mars 2018 à 04:05
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `laboratoire`
--

-- --------------------------------------------------------

--
-- Structure de la table `metadata`
--

CREATE TABLE `metadata` (
  `id` int(100) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `valeur` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `metadata`
--

INSERT INTO `metadata` (`id`, `nom`, `valeur`) VALUES
(1, 'TPS', '5'),
(2, 'TVQ', '10');

-- --------------------------------------------------------

--
-- Structure de la table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `valeur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `privilege`
--

INSERT INTO `privilege` (`id`, `valeur`) VALUES
(1, 'Administra'),
(2, 'Utilisateu');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prix` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `nom`, `description`, `prix`) VALUES
(1, 'ASUS ZenBook Ultra-Slim Laptop', '13\', neuf.', '549'),
(2, 'HUAWEI P9', 'Téléphone de la marque Huawei, très peu servi, vendu dans sa boite.', '250'),
(1, 'ASUS ZenBook Ultra-Slim Laptop', '13\', neuf.', '549'),
(2, 'HUAWEI P9', 'Téléphone de la marque Huawei, très peu servi, vendu dans sa boite.', '250'),
(3, 'Appareil photo bridge', 'Lumix F7200, très bon état, vendu avec une housse et deux cartes SD.', '400');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`username`, `email`, `password`) VALUES
('admin', 'admin@admin.ca', 'admin'),
('user', 'user@admin.ca', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `userprivilege`
--

CREATE TABLE `userprivilege` (
  `idUser` int(11) NOT NULL,
  `idPrivilege` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `userprivilege`
--

INSERT INTO `userprivilege` (`idUser`, `idPrivilege`) VALUES
(1, 1),
(2, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
