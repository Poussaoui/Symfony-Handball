--
-- Base de données :  `ggahandb` 
-- Création des tables

-- --------------------------------------------------------

--
-- Structure de la table `Fonctions`
--

CREATE TABLE `Fonctions` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `libelle` varchar(64) NOT NULL,
  PRIMARY KEY (id)
) CHARSET='utf8';

--
-- Structure de la table `Organisation`
--

CREATE TABLE `Organisation` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `match` INTEGER NOT NULL, -- id du match
  `fonction` INTEGER NOT NULL, -- id de la fonction
  `noms` varchar(256) NOT NULL,
  PRIMARY KEY (id)
) CHARSET='utf8';

