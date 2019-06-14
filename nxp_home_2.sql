-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 14 Juin 2019 à 13:31
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nxp_home_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `audio`
--

CREATE TABLE `audio` (
  `id_audio` int(11) NOT NULL,
  `titre_audio` varchar(255) DEFAULT NULL,
  `date_sortie_audio` varchar(255) DEFAULT NULL,
  `duree_audio` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `audio`
--

INSERT INTO `audio` (`id_audio`, `titre_audio`, `date_sortie_audio`, `duree_audio`) VALUES
(1, 'test_titre_audio', '2019-05-29', '214');

-- --------------------------------------------------------

--
-- Structure de la table `audio_utilisateur`
--

CREATE TABLE `audio_utilisateur` (
  `id_audio_utilisateur` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_audio` int(11) DEFAULT NULL,
  `url_audio` varchar(2000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `audio_utilisateur`
--

INSERT INTO `audio_utilisateur` (`id_audio_utilisateur`, `id_utilisateur`, `id_audio`, `url_audio`) VALUES
(1, 2, 1, ''),
(2, 3, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id_livre` int(11) NOT NULL,
  `titre_livre` varchar(255) NOT NULL,
  `edition_livre` varchar(255) NOT NULL,
  `nb_page_livre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `titre_livre`, `edition_livre`, `nb_page_livre`) VALUES
(1, 'test_titre_livre', 'test_edition', 150);

-- --------------------------------------------------------

--
-- Structure de la table `livre_utilisateur`
--

CREATE TABLE `livre_utilisateur` (
  `id_livre_utilisateur` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `url_livre` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `livre_utilisateur`
--

INSERT INTO `livre_utilisateur` (`id_livre_utilisateur`, `id_utilisateur`, `id_livre`, `url_livre`) VALUES
(1, 2, 1, 'qdgf'),
(2, 3, 1, 's');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `prenom_utilisateur` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ddn_utilisateur` varchar(255) DEFAULT NULL,
  `mdp_utilisateur` varchar(2000) CHARACTER SET latin1 DEFAULT NULL,
  `adresse_utilisateur` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `pseudo_utilisateur` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `code_postal_utilisateur` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ville_utilisateur` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `sexe_utilisateur` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `date_inscription_utilisateur` varchar(255) DEFAULT NULL,
  `adresse_mail_utilisateur` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `ddn_utilisateur`, `mdp_utilisateur`, `adresse_utilisateur`, `pseudo_utilisateur`, `code_postal_utilisateur`, `ville_utilisateur`, `sexe_utilisateur`, `date_inscription_utilisateur`, `adresse_mail_utilisateur`) VALUES
(1, 'test_nom', 'test_prenom', '2019-05-29', '$2y$10$nq5M8aTY3A6p3mx4d0MZPeFs3tOrsnjQm4RYShCpRccXTMk.gcc7a', 'new_adresse', 'new_pseudo', '00000', 'new_ville', 'Homme', '2019-05-29', 'new@mail'),
(2, '2', '2', '1990-12-18', '$2y$10$bXmDHB87KdV16bzEz9f26OgcU.Md.9WvWfVw.hNlILLdVszgL74bq', '2', '2', '20000', '2', 'Homme', '2019-05-29', '2@2'),
(3, 'b', 'b', '2019-05-29', '$2y$10$FG4FSsalm7eFw1Qo63ZO9O9Alo289oiyS8XkiBvVT7NrA1Ju1yXm2', 'b', 'b', '55000', 'b', 'Homme', '2019-05-29', 'b@b'),
(4, 'admin', 'admin', '2019-06-03', '$2y$10$0yAAVodFPs0Gy7vUn7MGru.NeYkVsf0E3rQggRn1Hny6PUSTfvab.', '1 Rue Horizon Vert', 'admin', '37170', 'Chambray-lès-Tours', 'Homme', '2019-06-03', 'contact@nxp.com'),
(5, 'z', 'z', '2019-06-13', '$2y$10$hMQXTFgniNd0o2vFMJoFIOg60B1wXJGxQEetAG7n8WMoUkO4pCgEe', 'z', 'z', '55000', 'z', 'Homme', '2019-06-13', 'z@z'),
(6, 'Bonneau', 'Thomas', '1999-07-18', '$2y$10$w1uyvd5tXm61Q5H7pbxCR.fCpPl0DFMG/.5ChHDRuc2.jfq/Eitem', '64ter rue de la grange champion', 'Thomas', '37530', 'Nazelles', 'Homme', '2019-06-13', 'skkay.thomas@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `titre_video` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `titre_video_vo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `resume_video` varchar(2000) CHARACTER SET latin1 DEFAULT NULL,
  `langue_video` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `duree_video` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `date_sortie_video` varchar(255) DEFAULT NULL,
  `date_sortie_video_vo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `video`
--

INSERT INTO `video` (`id_video`, `titre_video`, `titre_video_vo`, `resume_video`, `langue_video`, `duree_video`, `date_sortie_video`, `date_sortie_video_vo`) VALUES
(5, 'Top Gun', 'Top Gun', 'Pete Maverick Mitchell, un jeune prodige du pilotage peu apprécié par sa hiérarchie, rejoint la très réputée école de l\'aéronavale américaine, Top Gun,pour perfectionner ses techniques de combat aérien. Tous les étudiants concourent pour le titre de meilleur pilote.', 'fr', '6600', '1986-09-17', '1986-09-17'),
(7, 'Pirates des Caraïbes : La Fontaine de Jouvence', 'Pirates des Caraïbes : La Fontaine de Jouvence', 'Pirates des Caraïbes : La Fontaine de Jouvence', 'fr', '3600', '2019-06-13', '2019-06-13'),
(8, 'Avengers: Endgame', 'Avengers: Endgame', 'Avengers: Endgame', 'fr', '3600', '2019-06-13', '2019-06-13'),
(9, 'Avengers: Infinity War', 'Avengers: Infinity War', 'Avengers: Infinity War', 'fr', '3600', '2019-06-13', '2019-06-13'),
(10, 'Justice League', 'Justice League', 'Justice League', 'fr', '3600', '2019-06-13', '2019-06-13'),
(11, 'Raiponce', 'Raiponce', 'Raiponce', 'fr', '3600', '2019-06-13', '2019-06-13'),
(12, 'Spider-Man 3', 'Spider-Man 3', 'Spider-Man 3', 'fr', '3600', '2019-06-13', '2019-06-13'),
(13, 'Harry Potter et le Prince de sang-mêlé', 'Harry Potter et le Prince de sang-mêlé', 'Harry Potter et le Prince de sang-mêlé', 'fr', '3600', '2019-06-13', '2019-06-13');

-- --------------------------------------------------------

--
-- Structure de la table `video_utilisateur`
--

CREATE TABLE `video_utilisateur` (
  `id_video_utilisateur` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `url_video` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `video_utilisateur`
--

INSERT INTO `video_utilisateur` (`id_video_utilisateur`, `id_utilisateur`, `id_video`, `url_video`) VALUES
(1, 1, 1, 'rrrrrr'),
(2, 1, 2, 'rrrrrr'),
(3, 1, 3, 'cd'),
(4, 2, 3, 'zr'),
(5, 2, 1, 'testurl'),
(6, 2, 2, ''),
(7, 2, 4, 'q'),
(8, 3, 2, 'r'),
(9, 3, 4, 'z'),
(10, 3, 1, ''),
(11, 4, 5, 'sergsdgsfdg'),
(12, 4, 1, 'dsd'),
(13, 6, 5, '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id_audio`);

--
-- Index pour la table `audio_utilisateur`
--
ALTER TABLE `audio_utilisateur`
  ADD PRIMARY KEY (`id_audio_utilisateur`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`);

--
-- Index pour la table `livre_utilisateur`
--
ALTER TABLE `livre_utilisateur`
  ADD PRIMARY KEY (`id_livre_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- Index pour la table `video_utilisateur`
--
ALTER TABLE `video_utilisateur`
  ADD PRIMARY KEY (`id_video_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `audio`
--
ALTER TABLE `audio`
  MODIFY `id_audio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `audio_utilisateur`
--
ALTER TABLE `audio_utilisateur`
  MODIFY `id_audio_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `livre_utilisateur`
--
ALTER TABLE `livre_utilisateur`
  MODIFY `id_livre_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `video_utilisateur`
--
ALTER TABLE `video_utilisateur`
  MODIFY `id_video_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
