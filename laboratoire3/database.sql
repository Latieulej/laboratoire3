-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 26 mars 2018 à 21:53
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
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prix` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `nom`, `photo`, `description`, `prix`) VALUES
(1, 'Voiture', 'img1.jpg', 'Jolie voiture de 2003. ', '1200'),
(2, 'Ordinateur portable', 'img2.jpg', 'Presque neuf, trés peu servi. Vendu avec une sacoche.', '900'),
(3, 'Sac à dos', 'img3.jpg', 'L\'indispensable de Dora, toujours à porté de main.', '70'),
(4, 'Bonhomme de neige', 'img4.jpg', 'Bonhomme de neige', '10');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `salt`) VALUES
(1, 'admin', 'admin@admin.ca', '09a8acab3ad09ab2b1572353bd1fbfce9a00d24b34548eccac14fad187720d35', 'azerty'),
(2, 'user', 'user@admin.ca', '5a4d7d7c339b061242e2fe4baa1b08622e69248b9edc58273afd614d6c926c51', 'azerty');

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
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `userprivilege`
--
ALTER TABLE `userprivilege`
  ADD KEY `userprivilege_user_fk` (`idUser`),
  ADD KEY `userprivilege_privilege_fk` (`idPrivilege`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `userprivilege`
--
ALTER TABLE `userprivilege`
  ADD CONSTRAINT `userprivilege_privilege_fk` FOREIGN KEY (`idPrivilege`) REFERENCES `privilege` (`id`),
  ADD CONSTRAINT `userprivilege_user_fk` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
