-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 16 nov. 2026 à 19:10
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `missing`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id` int(10) UNSIGNED NOT NULL,
  `messages` text NOT NULL,
  `id_auteur` int(10) UNSIGNED NOT NULL,
  `date_send` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `messages`, `id_auteur`, `date_send`) VALUES
(1, 'Bonjour à tous !', 1, '2026-07-14 22:06:14'),
(2, 'Quelqu\'un aurait-il des conseils sur les démarches juridiques immédiates après une disparition ?', 2, '2026-07-21 21:37:51'),
(3, 'Attention aux faux appels de rançon ! Des arnaqueurs utilisent les numéros sur les affiches. Passez toujours par la police.', 4, '2026-07-21 21:37:51'),
(4, 'Une battue citoyenne est organisée ce dimanche à Yaoundé (Mvan). Venez nombreux nous aider.', 2, '2026-07-21 21:37:51'),
(5, 'La petite Amina a été retrouvée saine et sauve ! Merci à tous pour vos partages et votre vigilance !', 3, '2026-07-21 21:37:51'),
(6, 'c\'est une bonne nouvelle ca', 1, '2026-07-21 22:42:19');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `msg` text NOT NULL,
  `id_destinataire` int(10) UNSIGNED NOT NULL,
  `id_auteur` int(10) UNSIGNED NOT NULL,
  `date_message` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `msg`, `id_destinataire`, `id_auteur`, `date_message`) VALUES
(1, 'Salut, comment ça va ?', 1, 1, '2026-07-14 22:06:14'),
(2, 'Bonjour Mme Marie, je suis l\'Inspecteur Ewane. Avez-vous du nouveau ou un indice récent sur le cas de Bafoussam ?', 3, 4, '2026-07-21 21:37:51'),
(3, 'Bonjour Inspecteur. Oui, un témoin dit l\'avoir vue près de la gare routière dimanche matin.', 4, 3, '2026-07-21 21:37:51'),
(4, 'Merci, nous envoyons une équipe vérifier les caméras de surveillance de cette zone.', 3, 4, '2026-07-21 21:37:51'),
(5, 'Salut Borel, tu as pu jeter un coup d\'œil dans la zone de Deido pour le signalement ?', 5, 2, '2026-07-21 21:37:51'),
(6, 'Salut Alain, j\'y suis actuellement. Je fais le tour des commerces avec la photo.', 2, 5, '2026-07-21 21:37:51');

-- --------------------------------------------------------

--
-- Structure de la table `signalement`
--

CREATE TABLE `signalement` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) DEFAULT NULL,
  `sexe` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `ville` varchar(150) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `descriptions` text DEFAULT NULL,
  `date_signalement` datetime NOT NULL DEFAULT current_timestamp(),
  `id_auteur` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `signalement`
--

INSERT INTO `signalement` (`id`, `nom`, `prenom`, `sexe`, `age`, `ville`, `photo`, `descriptions`, `date_signalement`, `id_auteur`) VALUES
(1, 'Dupont', 'Jean', 'Masculin', 34, 'Paris', 'img/ia (72).jpg', 'Disparu depuis 2 jours', '2026-07-14 22:06:14', 1),
(2, 'Ewondo', 'Paul', 'Masculin', 12, 'Yaoundé', 'img/ia (72).jpg', 'Disparu à la sortie de l\'école publique de Mvan. Il portait son uniforme bleu et un sac à dos rouge.', '2026-07-21 21:37:51', 2),
(3, 'Fotso', 'Carine', 'Féminin', 22, 'Bafoussam', 'img/ia (69).jpg', 'Étudiante partie de Bandjoun pour Bafoussam. Plus de nouvelles depuis samedi soir. Elle portait un jean bleu et un haut blanc.', '2026-07-21 21:37:51', 3),
(4, 'Amadou', 'Ibrahim', 'Masculin', 65, 'Garoua', 'img/ia (72).jpg', 'Souffre d\'amnésie partielle. S\'est égaré près du grand marché. Il s\'exprime principalement en Fulfulde.', '2026-07-21 21:37:51', 5),
(5, 'Mbia', 'Stéphane', 'Masculin', 30, 'Douala', 'img/ia (72).jpg', 'Parti pour son travail à Akwa mardi matin et n\'est jamais revenu. Son véhicule a été retrouvé garé.', '2026-07-21 21:37:51', 1),
(6, 'Bella', 'Anasthasie', 'Féminin', 7, 'Douala', 'img/ia (69).jpg', 'Égarée au marché de Bonamoussadi pendant les courses de l\'après-midi. Teint clair, tresses fines.', '2026-07-21 21:37:51', 6);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `photo`, `phone`) VALUES
(1, 'foko', 'foko', 'foko@gmail.com', 'foko', 'img/ia (72).JPG', '+0000000000'),
(2, 'Kamga', 'Alain', 'alain.kamga@example.com', 'user123', 'img/ia (70).JPG', '+237677123456'),
(3, 'Ngo', 'Marie', 'marie.ngo@example.com', 'marie2026', 'img/ia (76).JPG', '+237699876543'),
(4, 'Ewane', 'Patrick', 'p.ewane@police.cm', 'autorite2026', 'img/profiles/police.png', '+237655443322'),
(5, 'Tchinda', 'Borel', 'borel.tchinda@example.com', 'borelpass', 'img/profiles/borel.png', '+237688112233'),
(6, 'Menga', 'Christelle', 'christelle.m@example.com', 'secret123', 'img/profiles/christelle.png', '+237622334455');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_forum_id_auteur` (`id_auteur`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_message_destinataire` (`id_destinataire`),
  ADD KEY `idx_message_auteur` (`id_auteur`);

--
-- Index pour la table `signalement`
--
ALTER TABLE `signalement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_signalement_id_auteur` (`id_auteur`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_user_email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `signalement`
--
ALTER TABLE `signalement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `fk_forum_user` FOREIGN KEY (`id_auteur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_auteur` FOREIGN KEY (`id_auteur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_message_destinataire` FOREIGN KEY (`id_destinataire`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `signalement`
--
ALTER TABLE `signalement`
  ADD CONSTRAINT `fk_signalement_user` FOREIGN KEY (`id_auteur`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
