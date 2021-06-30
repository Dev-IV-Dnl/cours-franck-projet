-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 30 juin 2021 à 10:03
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `nom`, `image`, `description`, `prix`, `date`) VALUES
(1, 'Honda 125 2 temps', 'honda.jpg', 'Cette honda est extrêmement légère. De puissance modérée, elle conviendra à tout débutant de poids léger.', 1000, '2021-06-22 00:00:00'),
(2, 'Kawasaki 250 4 temps', 'kawasaki.jpg', 'Cette Kawasaki, moins légère que la Honda, conviendra plus à quelqu\'un d\'un peu plus fort et lourd. la linéarité du 4 temps améliorera les reprises en bas régime moteur, la rendant un peu plus polyvalente, bien que plus lourde.', 1500, '2021-06-22 00:00:00'),
(3, 'Yamaha 250 2 temps', 'yamaha.jpg', 'Légère et très puissante, on entre ici dans la catégorie au dessus, le 250 2 temps.\r\nIl s\'agit d\'une moto complexe à maîtriser pour des utilisateurs plus chevronnés.\r\nCette version Yamaha a fait ses preuves.', 3000, '2021-06-22 00:00:00'),
(4, 'KTM 350 4 temps', 'ktm.jpg', 'Dans la même catégorie que la 250 2 temps, Cette version KTM 350 est d\'une rare efficacité. En effet, on arrive à la croisée des chemins entre la puissance et le couple du 450 et la légèreté du 2 temps 250. Cette moto intermédiaire offre un couple et des performances impressionnantes entre les mains d\'un pilote expérimenté maîtrisant au minimum parfaitement le 25O 2 temps.\r\nOn entre ici entre dans une catégorie exigeante physiquement et techniquement.', 4000, '2021-06-22 00:00:00'),
(5, 'Yamaha 450 4 temps', 'YZ.jpg', 'une monstrueuse moto pour de monstrueux pilotes !', 10000, '2021-06-22 15:02:33');

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id`, `nom`, `image`, `description`, `prix`, `date`) VALUES
(1, 'Casque JUST Noir-jaune fluo', 'casque-noir.jpg', 'Superbe casque ultra résistant pour être protégé tout en ayant du style !', 90, '2021-06-24 09:56:12'),
(2, 'Casque rose', 'casque-rose.jpg', 'Casque pour les filles ou les hommes de l\'autre bord pour garder un peu de féminité tout en étant badass !!', 95, '2021-06-24 10:04:25'),
(3, 'casque Bleu Matte', 'casque-bleu.jpeg', 'Un casque ultra badass pour un protection sans faille, Là tu peux le tenter le saut qui te faisait peur car maintenant, peur tu n\'auras plus !', 100, '2021-06-24 10:07:14'),
(4, 'casque Vert', 'casque-vert.jpg', 'Casque ultra solide, et si tu roules en kawasaki, il sera parfaitement assorti, je dis ça, je dis rien !', 99, '2021-06-24 10:08:36'),
(5, 'Casque Red Bull', 'casque-redbull.jpg', 'On dit que Red-Bull donne des ailes ! Eh bien avec ce casque, on compte bien respecter ce slogant, enfile donc ce casque et va faire un saut de l\'ange, mais attention à ne pas t\'envoler, carvoler, c\'est cool, mais une belle réception pour continuer à rouler, c\'est encore mieux !', 110, '2021-06-24 10:10:58');

-- --------------------------------------------------------

--
-- Structure de la table `goodies`
--

CREATE TABLE `goodies` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `goodies`
--

INSERT INTO `goodies` (`id`, `nom`, `image`, `description`, `date`) VALUES
(1, 'Tee-shirt Moto-Cross HONDA', 't-shirt-honda.jpg', 'Superbe tee-shirt offert pour l\'achat d\'une moto-cross Honda !', '2021-06-22 19:44:12'),
(2, 'Tee-shirt Moto-Cross KAWASAKI', 't-shirt-kawasaki.jpg', 'Superbe tee-shirt offert pour l\'achat d\'une moto-cross Kawasaki !', '2021-06-22 19:47:38'),
(3, 'Tee-shirt Moto-Cross Yamaha', 't-shirt-yamaha.jpg', 'Superbe tee-shirt offert pour l\'achat d\'une moto-cross Yamaha !', '2021-06-22 19:50:05'),
(4, 'Tee-shirt Moto-cross KTM', 't-shirt-ktm.jpg', 'Superbe tee-shirt KTM offert pour l\'achat d\'une moto-cross KTM !', '2021-06-22 19:51:32'),
(6, 'Tee-shirt Gas Gas', 't-shirt-gasgas.jpg', 'Superbe Tee-shirt Gas Gas pour avoir du style même plein de terre !', '2021-06-23 15:08:35');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `nom` int(255) NOT NULL,
  `image` int(255) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `mot_de_passe`, `is_admin`) VALUES
(3, 'IV', '$2y$10$IbpbEQwUfwtGVcHfXz3xTO4.zqQpnl7Ru.bInjCFbdXf.JalmGjVK', 1),
(4, 'Neo', '$2y$10$KR2yZEBCQNX1WTBQHTCz/Ovos6hb3TZVSHKVeQkHP3DaTOFUaUZ1q', 0),
(5, 'Emilie', '$2y$10$jdZfjxf72GOyVH6af3gDAuboG319Uk5y9ZK/cjffZmnC2OLBMDK82', 0),
(6, 'neyo', '$2y$10$laYPPEgP7h4oFTjqISghJ.LQaorxPmwkEfFZsxIrKdKU5VknPAvqS', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `goodies`
--
ALTER TABLE `goodies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `goodies`
--
ALTER TABLE `goodies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
