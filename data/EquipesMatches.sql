--
-- Base de données :  `ggahandb` 
-- Création des tables Equipes et Matches

-- --------------------------------------------------------

--
-- Structure de la table `Equipes`
--

CREATE TABLE `Equipes` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(64) NOT NULL,
  `entraineur` VARCHAR(128) NOT NULL,
  `creneaux` VARCHAR(128) NOT NULL,
  `url_photo` VARCHAR(128),
  `url_result_calendrier` VARCHAR(512),
  `commentaire` text,
  PRIMARY KEY (id)
) CHARSET='utf8';

--
-- Structure de la table `Matches`
--

CREATE TABLE `Matches` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `equipe_locale` INTEGER NOT NULL, -- id équipe
  `domicile_exterieur` tinyint(1) NOT NULL,
  `equipe_adverse` VARCHAR(64) NOT NULL,
  `date_heure` DATETIME DEFAULT NULL,
  `num_semaine` INTEGER DEFAULT NULL,
  `num_journee` INTEGER DEFAULT NULL,
  `gymnase` VARCHAR(64) DEFAULT NULL,
  PRIMARY KEY (id)
) CHARSET='utf8';

