-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 10 déc. 2023 à 20:50
-- Version du serveur :  10.3.38-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ntic23courtin1`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `note_eval` decimal(10,0) NOT NULL,
  `texte_commentaire` text DEFAULT NULL,
  `date_commentaire` date NOT NULL,
  `nom` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `id_livre`, `note_eval`, `texte_commentaire`, `date_commentaire`, `nom`, `id_utilisateur`) VALUES
(1, 1, '3', 'hello', '2023-12-10', 'Courtin', 1),
(2, 3, '4', 'Un livre très bien écrit !', '2023-12-10', 'Armand', 8),
(3, 1, '3', '', '2023-12-10', 'Armand', 8),
(4, 4, '4', 'Tres bien', '2023-12-10', 'Courtin', 1),
(5, 5, '2', ':)', '2023-12-10', 'Courtin', 1),
(6, 2, '6', 'parfait', '2023-12-10', 'Courtin', 1),
(7, 2, '5', 'Excellent livre', '2023-12-10', 'courtin', 9),
(8, 1, '1', '', '2023-12-10', 'Courtin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id_livre` int(11) NOT NULL,
  `titre` text NOT NULL,
  `auteur` text NOT NULL,
  `discipline` text DEFAULT NULL,
  `annee_pub` int(11) NOT NULL,
  `langue` text NOT NULL,
  `editeur` text NOT NULL,
  `ISBN` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id_livre`, `titre`, `auteur`, `discipline`, `annee_pub`, `langue`, `editeur`, `ISBN`) VALUES
(1, '1984', 'George Orwell', 'Roman', 1950, 'fr', 'Gallimard', '2-07-036822-X'),
(2, 'L\'étranger', 'Albert Camus', 'Roman', 1942, 'fr', 'Gallimard', '9788845277634'),
(3, 'Les Fleurs du mal', 'Charles Baudelaire', 'Poésie', 1857, 'fr', 'Auguste Poulet-Malassis', '9782253158653'),
(4, 'Les misérables', 'Victor Hugo', 'Roman', 1862, 'fr', 'Gallimard', '9781407017013'),
(5, 'Madame Bovary', 'Gustave Flaubert', 'Roman', 1856, 'fr', 'Michel Lévy frères', '9781933499185');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `mdp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'Courtin', 'Carolina', 'carolina.courtin04@gmail.com', 'abc123'),
(2, 'Anna', 'Dupont', 'anna.dupont@gmail.com', 'abccc1234'),
(3, 'May', 'Lila', 'nmho455@gmail.com', 'abcvb123'),
(4, 'Theo', 'Lucas', 'th.lucvas@yahoo.ch', 'qwertz123'),
(5, 'Emma', 'Rocher', 'ge.emm.koala@47.com', 'gerotz1478'),
(6, 'Martin', 'Laura', 'martin.laurage@gmail.com', 'bhuok52'),
(7, 'mclmcd', 'pdsmoms', 'éldmv éld', 'ésldmvodsmv'),
(8, 'Armand', 'Lucas', 'ar.lucas@yagoo.com', 'soppl123'),
(9, 'courtin', 'luna', 'courtin.luna10@gmail.com', 'abcc123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id_livre`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
