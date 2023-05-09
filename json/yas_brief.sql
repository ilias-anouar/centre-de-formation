-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 mai 2023 à 00:41
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `yas_brief`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenant_`
--

CREATE TABLE `apprenant_` (
  `Id_apprenant_` int(11) NOT NULL,
  `nom_` varchar(50) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `apprenant_`
--

INSERT INTO `apprenant_` (`Id_apprenant_`, `nom_`, `prenom`, `email`, `password`) VALUES
(29, 'mamado', 'lini', 'mamado@gmail.com', '$2y$10$NxdRv6EqXAZJ1IDyWly6ce.3G7xNvGynHS.3u1/TNONcdbIqc/DC2'),
(30, 'kamila', 'lamo', 'kamila@gmail.com', '$2y$10$OUiPzTX6S.yu/H3TROi4y.mltHqD9XPvyfJxE.NLtsqsz11LghsK2'),
(31, 'oranos', 'kaja', 'oranos@gmail.com', '$2y$10$CrIPUfYe/AA4fSuSkAVNium.USyg7nz62iOn/Qd5hv0NXFDNdSM/q'),
(32, 'hicham', 'mapo', 'hicham@gmail.com', '$2y$10$4ihZknUHKKCXw0hRMlh5ZOmz3SSOCLDKPBmv38Tf7kBbf6lriIwt2'),
(33, 'yasin', 'ghirban', 'yasin@gmail.com', '$2y$10$yHKkdcCOMnKbTr6VeWN3NuRw/LwIigds1oHkhwZzz5zUFeARSss0.'),
(34, 'chiha', 'malak', 'chiha@gmail.com', '$2y$10$q7kV1UTad0MauHrbACBT8ulVPnOgxiQOkjJFG/QwZd2Iy0DqHXP6.'),
(35, 'talib', 'mokbil', 'talib@gmail.com', '$2y$10$/O3Enzj6SW.mNB8yquGsTeiRk.E/pbBzSqJE6HyRJB.dAf5vmWFB2'),
(36, 'jamal', 'amokbil', 'jamal@gmail.com', '$2y$10$KlBU7i3FEY1IgNse/QVlTevagxZItqQ08XnczM/hqK2N05Npdyv3W'),
(37, 'milodi', 'jasi', 'milodi@gmail.com', '$2y$10$GD5f0xMXNqrKAPssRmyDFOKRLajQgwqfQbKmsSPDqLF4qCiL5hYg.'),
(38, 'nano', 'one', 'milodi@gmail.com', '$2y$10$HQVeRSDNY3JGWDXe301mVOWeUzY.d7tCnibzl4RcdmTmDFpyaZ2K.'),
(39, 'jamal', 'hamo', 'jamal@gmail.com', '$2y$10$l6TXeniC.qa5ptBYANEkdeDnyBQby39LefRoJAodkAR3MbyJ2iqyG'),
(40, 'ploma', 'pija', 'ploma@gmail.com', '$2y$10$TgSy3s4s.DScgrLIMbS/ZOuSYwu3WscIR/.h2BrQPuOCB2sH3Oyr2'),
(41, 'tiji', 'malkom', 'tiji@gmail.com', '$2y$10$6mmwfAsP/3TRovNEpLeIeOa/Ht87AIjYj28YrhDIbOkubgwANjKqO'),
(42, 'naomi', 'pitis', 'naomi@gmail.com', '$2y$10$4MQCz7bdb7sM/j1Gz7cAYubmKb9Qmj130Dr.ReLsKpzCJR.MGs15u'),
(43, 'ilias', 'anouar', 'ilias@gmail.com', '$2y$10$PJcycI.WGnLtxLTg/AwYOuvzqLTnutufx2JLfedKo9WRBuRXp32e2');

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `Id_Formateur` int(11) NOT NULL,
  `nom` varchar(58) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(61) NOT NULL,
  `competences` varchar(90) DEFAULT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`Id_Formateur`, `nom`, `prenom`, `email`, `competences`, `password`) VALUES
(1, 'anouar', 'ilias', 'ilias@gmail.com', 'Gestion', '$2y$10$CSYDTj0WsXRdGGfMehNcs.bRNGH1/kVrYiFUQtfKb62aOgAfTPflW'),
(2, 'daifane', 'yasmine', 'yasmine@gmail.com', 'Self development', '$2y$10$TqKwHLnRnBX7sm.QbTYj8uJva6qdmDS9fZUekIesu9qv095Nqu87K'),
(3, 'buik', 'hussain', 'hussain@gmail.com', 'Sensibilisation', '$2y$10$UTPmh4AQKSCSQDbPIxGWseNUiOrmwvvt0zXg/E9bnLAaR6yrPeS86'),
(4, 'buich', 'fatima zahra', 'fatima@gmail.com', 'Technologie', '$2y$10$ydPd47SWyyI95f0aRutvtuMsnJBUokE9NsHjyoyWogrb7ioh9FpZm'),
(5, 'el ghali', 'ikram', 'ikram@gmail.com', 'Self development', '$2y$10$VDyGTkj0sQyWpgz62/Bfxeq/12f6JLI0npCufgnOvQrvR6LSUvUkW');

-- --------------------------------------------------------

--
-- Structure de la table `formation_`
--

CREATE TABLE `formation_` (
  `Id_formation_` int(11) NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `masse_horaire` varchar(50) NOT NULL,
  `discription` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formation_`
--

INSERT INTO `formation_` (`Id_formation_`, `sujet`, `categorie`, `masse_horaire`, `discription`) VALUES
(1, 'La communication', 'Self development', '20', 'La communication de formation consiste à transmettre des informations et des compétences entre un formateur et des apprenants. Elle utilise des techniques efficaces pour développer les aptitudes des apprenants, et peut se dérouler en présentiel ou à distance.'),
(2, 'Diversité et inclusion', 'Gestion', '10', 'La diversité et l\'inclusion visent à valoriser et respecter les différences entre les individus. Cela implique de créer un environnement inclusif où tous les individus ont la possibilité de s\'exprimer librement et de contribuer de manière équitable. Les organisations peuvent ainsi améliorer leur productivité et leur capacité à répondre aux besoins de leur clientèle.'),
(3, 'Gestion du temps', 'Gestion', '15', 'La gestion du temps consiste à utiliser efficacement le temps disponible pour accomplir des tâches et atteindre des objectifs. Cela implique de planifier et d\'organiser les activités en fonction de leur priorité, de déléguer les tâches lorsque c\'est possible, de limiter les distractions et de rester concentré sur les tâches importantes. En gérant efficacement son temps, on peut augmenter sa productivité, réduire son stress et atteindre ses objectifs plus rapidement.'),
(4, 'Rédaction professionnelle', 'Gestion', '20', 'La rédaction professionnelle consiste à produire des documents écrits clairs, précis et adaptés au contexte professionnel. Cela implique de structurer les idées de manière logique, d\'utiliser un langage professionnel et de respecter les normes de présentation. Une rédaction professionnelle efficace permet de communiquer de manière claire et concise avec ses collègues, clients ou partenaires, renforçant ainsi la crédibilité et la qualité de l\'image de l\'entreprise.'),
(5, 'Gestion du stress', 'Gestion', '14', 'La gestion du stress consiste à adopter des techniques et des stratégies pour faire face aux facteurs de stress de manière efficace. Cela implique de reconnaître les sources de stress, d\'apprendre à les gérer et de prendre soin de sa santé physique et mentale. Les techniques de gestion du stress peuvent inclure la méditation, l\'exercice physique régulier, la respiration profonde, le temps de loisir, la planification efficace et l\'optimisation de la qualité de vie. En gérant efficacement son stre'),
(6, 'Sensibilisation à la sécurité', 'Sensibilisation', '20', 'La sensibilisation à la sécurité consiste à informer les individus sur les risques potentiels et les mesures de sécurité à prendre pour prévenir les accidents. Elle vise à réduire le nombre d\'accidents et à renforcer la confiance dans l\'environnement de travail ou de vie.\r\n'),
(7, 'Technologie d assistance', 'Technologie', '16', 'La technologie d\'assistance est un domaine qui vise à améliorer la qualité de vie des personnes ayant des limitations physiques, cognitives ou sensorielles en utilisant des dispositifs et des outils technologiques. Ces technologies peuvent inclure des fauteuils roulants électriques, des prothèses, des aides auditives, des logiciels de reconnaissance vocale, des dispositifs de contrôle d\'environnement et bien plus encore.'),
(8, 'L éthique', 'Self development', '10', 'L\'éthique concerne les principes et les valeurs qui régissent les comportements humains. Elle implique de faire des choix moralement justes et de respecter les droits et la dignité de tous les êtres humains. En respectant les normes éthiques, on peut favoriser la confiance, la transparence et l\'intégrité dans les interactions sociales et professionnelles.'),
(9, 'Le développement personnel', 'Self development', '20', 'Le développement personnel désigne les efforts individuels pour améliorer ses compétences, ses connaissances et ses attitudes dans le but d\'atteindre ses objectifs personnels et professionnels. Cela implique de se connaître soi-même, d\'apprendre de nouvelles compétences, de développer une attitude positive et d\'adopter de nouvelles habitudes. Le développement personnel peut aider à améliorer la confiance en soi, la résilience et la réussite dans la vie.'),
(10, 'Le harcèlement sur le lieu de travail', 'Self development', '15', 'Le harcèlement sur le lieu de travail désigne tout comportement abusif, répétitif ou offensant qui crée un environnement de travail hostile ou offensant pour une personne. Cela peut inclure des commentaires discriminatoires, des comportements intimidants, des insultes, des menaces et des violences physiques. Le harcèlement sur le lieu de travail est illégal et peut avoir des conséquences graves sur la santé mentale et physique de la victime, ainsi que sur la productivité et le bien-être de l\'ent');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `Id_session` int(11) NOT NULL,
  `Id_apprenant_` int(11) NOT NULL,
  `evaluation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`Id_session`, `Id_apprenant_`, `evaluation`) VALUES
(41, 29, ''),
(41, 30, ''),
(41, 31, ''),
(41, 32, ''),
(41, 38, ''),
(41, 39, ''),
(41, 43, NULL),
(43, 37, ''),
(44, 41, NULL),
(45, 40, ''),
(46, 33, ''),
(47, 34, '');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `Id_session` int(11) NOT NULL,
  `Date_debut` date NOT NULL,
  `Date_fin` date NOT NULL,
  `Places_max` int(11) NOT NULL,
  `Etat` varchar(50) NOT NULL,
  `Id_Formateur` int(11) NOT NULL,
  `Id_formation_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
-- 
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`Id_session`, `Date_debut`, `Date_fin`, `Places_max`, `Etat`, `Id_Formateur`, `Id_formation_`) VALUES
(41, '2023-04-17', '2023-04-21', 10, 'en cours dinscription', 1, 1),
(42, '2023-04-17', '2023-04-21', 10, 'en cours dinscription', 2, 2),
(43, '2023-04-17', '2023-04-21', 10, 'en cours dinscription', 3, 3),
(44, '2023-04-17', '2023-04-21', 10, 'en cours dinscription', 4, 4),
(45, '2023-04-17', '2023-04-21', 10, 'en cours dinscription', 5, 5),
(46, '2023-04-17', '2023-04-21', 10, 'en cours dinscription', 1, 6),
(47, '2023-04-17', '2023-04-21', 10, 'en cours dinscription', 2, 7),
(48, '2023-04-17', '2023-04-21', 10, 'en cours dinscription', 3, 8),
(49, '2023-04-17', '2023-04-21', 10, 'en cours dinscription', 4, 9),
(50, '2023-04-17', '2023-04-21', 10, 'en cours dinscription', 5, 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprenant_`
--
ALTER TABLE `apprenant_`
  ADD PRIMARY KEY (`Id_apprenant_`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`Id_Formateur`);

--
-- Index pour la table `formation_`
--
ALTER TABLE `formation_`
  ADD PRIMARY KEY (`Id_formation_`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`Id_session`,`Id_apprenant_`);
--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`Id_session`),
  ADD KEY `Id_Formateur` (`Id_Formateur`),
  ADD KEY `Id_formation_` (`Id_formation_`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apprenant_`
--
ALTER TABLE `apprenant_`
  MODIFY `Id_apprenant_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `Id_Formateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `formation_`
--
ALTER TABLE `formation_`
  MODIFY `Id_formation_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `Id_session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`Id_session`) REFERENCES `session` (`Id_session`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`Id_apprenant_`) REFERENCES `apprenant_` (`Id_apprenant_`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`Id_Formateur`) REFERENCES `formateur` (`Id_Formateur`),
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`Id_formation_`) REFERENCES `formation_` (`Id_formation_`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
