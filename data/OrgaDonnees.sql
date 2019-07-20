--
-- Base de données :  `ggahandb`
-- Données de test

--
-- Déchargement des données de la table `Fonctions`
--

INSERT INTO `Fonctions` (`id`, `libelle`) VALUES
(1, "Arbitres"),
(2, "Courses"),
(3, "Paiement arbitres"),
(4, "Réception"),
(5, "Responsable de salle"),
(6, "Table de marque");

--
-- Déchargement des données de la table `Organisation`
--

INSERT INTO `Organisation` (`match`, `fonction`, `noms`) VALUES
(1, 1, "[ 'Damien' ]"),
(94, 1, "[ 'Marly', 'Mena Ponsard', 'Romane Clurtiol' ]"),
(94, 2, "[ 'Vanessa' ]"),
(94, 5, "[ 'Geoffray' ]"),
(73, 1, "[ 'Marly' ]"),
(92, 1, "[ 'Laurie', 'Laurie' ]"),
(38, 1, "[ 'Marly' ]"),
(64, 1, "[ 'Marly' ]"),
(40, 1, "[ 'Danae' ]"),
(84, 1, "[ 'Laurie', 'Lucie' ]"),
(44, 1, "[ 'Johana', 'Sarah' ]"),
(34, 1, "[ 'Danae', 'Héloïse' ]"),
(110, 1, "[ 'Danae', 'Héloïse' ]");

