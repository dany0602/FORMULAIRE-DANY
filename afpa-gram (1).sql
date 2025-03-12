-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 12 mars 2025 à 15:57
-- Version du serveur : 8.4.3
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `afpa-gram`
--

-- --------------------------------------------------------

--
-- Structure de la table `76_comments`
--

CREATE TABLE `76_comments` (
  `com_id` int NOT NULL,
  `com_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `com_timestamp` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_favorites`
--

CREATE TABLE `76_favorites` (
  `user_id` int NOT NULL,
  `fav_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_likes`
--

CREATE TABLE `76_likes` (
  `like_id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_pictures`
--

CREATE TABLE `76_pictures` (
  `pic_id` int NOT NULL,
  `pic_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `76_pictures`
--

INSERT INTO `76_pictures` (`pic_id`, `pic_name`, `post_id`) VALUES
(1, 'paysage.png', 1),
(2, 'beautemps.png', 2),
(3, 'levehicule.png', 3),
(4, 'lepedale.png', 4),
(5, 'levelo.png', 5),
(6, 'pluie.png', 6),
(7, 'neigeblanche.png', 7),
(8, 'glacial.png', 8),
(9, '67d1aa56cb79e_azerty.jpg', 9),
(10, '67d1aa6f0f4b9_zer.jpg', 10);

-- --------------------------------------------------------

--
-- Structure de la table `76_posts`
--

CREATE TABLE `76_posts` (
  `post_id` int NOT NULL,
  `post_timestamp` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_private` tinyint NOT NULL DEFAULT '0',
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `76_posts`
--

INSERT INTO `76_posts` (`post_id`, `post_timestamp`, `post_description`, `post_private`, `user_id`) VALUES
(1, '1741596170', 'il fait beau', 0, 10),
(2, '1741596170', 'le soleil brille', 0, 10),
(3, '1741596170', 'la voiture', 0, 10),
(4, '1741596170', 'le vélo', 0, 10),
(5, '1741596170', 'le pédalo', 0, 10),
(6, '1741596170', 'ilpleut', 0, 11),
(7, '1741596170', 'ilneige', 0, 11),
(8, '1741596170', 'lefroid', 0, 11),
(9, '1741793878', 'zerzerzer', 0, 10),
(10, '1741793903', 'zerzerzer zer zer zer', 0, 10);

-- --------------------------------------------------------

--
-- Structure de la table `76_users`
--

CREATE TABLE `76_users` (
  `user_id` int NOT NULL,
  `user_gender` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_lastname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_firstname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pseudo` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_avatar` varchar(250) COLLATE utf8mb4_general_ci DEFAULT 'avatar.png',
  `user_birthdate` date NOT NULL,
  `user_mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_activated` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `76_users`
--

INSERT INTO `76_users` (`user_id`, `user_gender`, `user_lastname`, `user_firstname`, `user_pseudo`, `user_avatar`, `user_birthdate`, `user_mail`, `user_password`, `user_activated`) VALUES
(10, 'homme', 'aaa', 'bbb', 'ccc', 'avatar.png', '1964-02-06', 'aze@aze.fr', '$2y$10$.jOkEVcKEo9aMlQxge3Tiusvga9xovDTsGcrA7qqxkoOiZQ9IlojW', 1),
(11, 'homme', 'bbb', 'ccc', 'ddd', 'avatar.png', '1964-02-06', 'azz@aze.fr', '$2y$10$moYIJ3YyyNpbuStO2/6h4eXWDNdYN8mFRwTOw8O7t9PwK2E8dtx4y', 1),
(12, 'homme', 'ddd', 'eee', 'fff', 'avatar.png', '1964-02-06', 'azf@aze.fr', '$2y$10$.amIMoMztW4QELJJgt0aF.KZ1Y5LfNCiHlUUxOdVetV.SeioUoGMe', 1),
(13, 'homme', 'admin', 'admin', 'admin', 'avatar.png', '2025-03-09', 'admin@admin.admin', '$2y$10$8AZXieF30vtp6/Is1E0KB.R8jjOqxk0/ltXXn.usAFZ0PaL691Tti', 1),
(14, 'homme', 'dddd', 'dddd', 'ffff', 'avatar.png', '1964-02-06', 'admio@admin.admin', '$2y$10$pYcZpAv50jGWNnP27ea8NOZWh9zyhb2gDQcA9d27XzMcb3XN5cr1C', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `76_comments`
--
ALTER TABLE `76_comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `76_comments_ibfk_1` (`post_id`),
  ADD KEY `76_comments_ibfk_2` (`user_id`);

--
-- Index pour la table `76_favorites`
--
ALTER TABLE `76_favorites`
  ADD PRIMARY KEY (`user_id`,`fav_id`),
  ADD KEY `fav_id` (`fav_id`);

--
-- Index pour la table `76_likes`
--
ALTER TABLE `76_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `76_likes_ibfk_1` (`user_id`),
  ADD KEY `76_likes_ibfk_2` (`post_id`);

--
-- Index pour la table `76_pictures`
--
ALTER TABLE `76_pictures`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `76_pictures_ibfk_1` (`post_id`);

--
-- Index pour la table `76_posts`
--
ALTER TABLE `76_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `76_users`
--
ALTER TABLE `76_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_pseudo` (`user_pseudo`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `76_comments`
--
ALTER TABLE `76_comments`
  MODIFY `com_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `76_likes`
--
ALTER TABLE `76_likes`
  MODIFY `like_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `76_pictures`
--
ALTER TABLE `76_pictures`
  MODIFY `pic_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `76_posts`
--
ALTER TABLE `76_posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `76_users`
--
ALTER TABLE `76_users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `76_comments`
--
ALTER TABLE `76_comments`
  ADD CONSTRAINT `76_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `76_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `76_favorites`
--
ALTER TABLE `76_favorites`
  ADD CONSTRAINT `76_favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`),
  ADD CONSTRAINT `76_favorites_ibfk_2` FOREIGN KEY (`fav_id`) REFERENCES `76_users` (`user_id`);

--
-- Contraintes pour la table `76_likes`
--
ALTER TABLE `76_likes`
  ADD CONSTRAINT `76_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `76_likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `76_pictures`
--
ALTER TABLE `76_pictures`
  ADD CONSTRAINT `76_pictures_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `76_posts`
--
ALTER TABLE `76_posts`
  ADD CONSTRAINT `76_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
