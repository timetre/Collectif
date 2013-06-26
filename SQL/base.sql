-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 26 Juin 2013 à 07:58
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `confluence`
--

-- --------------------------------------------------------

--
-- Structure de la table `Article`
--

CREATE TABLE `Article` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CD8737FABCF5E72D` (`categorie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Article`
--

INSERT INTO `Article` VALUES(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateModification` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` VALUES(1, 'Test', '<p><img alt="" src="/ckfinder/userfiles/images/tumblr_md05qf1BiF1ru35vpo1_500.jpg" style="height:750px; width:500px" /></p>', '2012-12-15 23:39:29', '2013-05-22 19:13:58');
INSERT INTO `Categorie` VALUES(2, 'Encore', '<p>test</p>', '2013-05-12 10:17:44', '2013-05-12 10:17:44');

-- --------------------------------------------------------

--
-- Structure de la table `Competence`
--

CREATE TABLE `Competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DB896BAF6A99F74A` (`membre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Competence`
--

INSERT INTO `Competence` VALUES(1, 3, 'Ordinateur', 1);
INSERT INTO `Competence` VALUES(3, 3, 'Word', 2);
INSERT INTO `Competence` VALUES(4, 3, 'Excel', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Domaine`
--

CREATE TABLE `Domaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titrePage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateModification` datetime NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `ordre` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Contenu de la table `Domaine`
--

INSERT INTO `Domaine` VALUES(9, 'Histoire', 'histoire', 'Etat de la recherche', '2012-12-02 00:00:00', '2012-12-11 00:00:00', 1, 1, '43c9b654b6abadea45063d1d3da395092c4d0114.jpeg');
INSERT INTO `Domaine` VALUES(10, 'Géographie', 'geographie', 'blorp', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 2, '0ebe89942fabded0d9bd94f8a8a576e8c311fa2e.jpeg');
INSERT INTO `Domaine` VALUES(11, 'Economie', 'economie', 'fsd', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 3, '01be597db581c700361b574ec986dd3f73467e14.jpeg');
INSERT INTO `Domaine` VALUES(12, 'Sociologie', 'sociologie', 'Sociologie', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 4, 'aab75ae8c03e50cb4128085f0668722fb40fbbf8.jpeg');
INSERT INTO `Domaine` VALUES(13, 'Anthropologie', 'anthropologie', 'Anthropologie', '2012-12-11 00:00:00', '2013-02-03 15:43:57', 1, 5, 'adebf1509b268dd9eed5cea60a8ea02175de2156.jpeg');
INSERT INTO `Domaine` VALUES(14, 'Communication', 'communication', 'Communication', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 6, 'b4075d33b4578ae24475b4126b7a7da02226e0a1.jpeg');
INSERT INTO `Domaine` VALUES(15, 'Philosophie', 'philosophie', 'Texte', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 7, '0966e3e19feebac9a0ae7f793fcbdbee7ed8214e.jpeg');
INSERT INTO `Domaine` VALUES(16, 'Droit', 'droit', 'droit', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 8, '569e0fc1e88180c30f81e42112bfa1bf4c8f16ee.jpeg');
INSERT INTO `Domaine` VALUES(17, 'Science Politique', 'science-politique', 'sciences po', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 9, '0c1b85bd21c9346c529446deb91f319b5463d180.jpeg');
INSERT INTO `Domaine` VALUES(18, 'Affaires Internationales', 'affaires-internationales', 'état de la recherche en Géopolitique et Affaires internationales des membres du Collectif Confluence', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 10, '835019414d28e72af0537f642e0db7882657a030.jpeg');
INSERT INTO `Domaine` VALUES(19, 'Linguistique', 'linguistique', 'test', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 11, 'a5c8ba045aa2c7a541997049ac232ada8fcfe3ee.jpeg');
INSERT INTO `Domaine` VALUES(20, 'Arts', 'arts', '<p>test</p>', '2012-12-11 00:00:00', '2013-05-12 10:18:50', 1, 12, 'b7a040e8a913e0053540d18ddf23fc31529f28ef.jpeg');
INSERT INTO `Domaine` VALUES(21, 'Archéologie', 'archeologie', 'test', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 13, 'b677f3e15740fb816eef73e66ebe4eb2af56a7ec.jpeg');
INSERT INTO `Domaine` VALUES(22, 'Urbanisme', 'urbanisme', 'test', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 14, '5f136b52595ea56e1360635d947d1aa7f41646d4.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `Experience`
--

CREATE TABLE `Experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ordre` int(11) NOT NULL,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime DEFAULT NULL,
  `entreprise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4ACDC2D36A99F74A` (`membre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Experience`
--

INSERT INTO `Experience` VALUES(3, 3, 'Secrétaire', 'Paris 1', '<p>Super poste, &agrave; refaire !&nbsp;</p>', 3, '2012-01-20 00:00:00', '2013-05-12 00:00:00', 'La défense');
INSERT INTO `Experience` VALUES(4, 3, 'Informaticien', 'Aix', '<p>test</p>', 2, '2013-05-04 00:00:00', '2013-05-12 00:00:00', 'Acseo');

-- --------------------------------------------------------

--
-- Structure de la table `Formation`
--

CREATE TABLE `Formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) DEFAULT NULL,
  `ecole` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diplome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domaineEtude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resultat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activites` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ordre` int(11) NOT NULL,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C2B1A31C6A99F74A` (`membre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Formation`
--

INSERT INTO `Formation` VALUES(1, 3, 'Université de technologie de Belfort Montbéliard', 'Ingénieur', 'Ingénierie des logiciels et de la connaissance', 'Succès', '<p>Trucmuche</p>', '<p>Super DB + java</p>', 1, '2009-02-20 00:00:00', '2013-05-12 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `Forum`
--

CREATE TABLE `Forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `dateCreation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Forum`
--

INSERT INTO `Forum` VALUES(1, 'Evenements', 1, '2013-04-14 00:00:00');
INSERT INTO `Forum` VALUES(2, 'Super forum', 1, '2013-04-14 18:03:00');

-- --------------------------------------------------------

--
-- Structure de la table `Interet`
--

CREATE TABLE `Interet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_663C56396A99F74A` (`membre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `Interet`
--

INSERT INTO `Interet` VALUES(1, 3, 'Sports', 1);
INSERT INTO `Interet` VALUES(2, 3, 'Informatique', 2);
INSERT INTO `Interet` VALUES(5, 25, 'Brouette', 1);
INSERT INTO `Interet` VALUES(6, 3, 'test', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Membre`
--

CREATE TABLE `Membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine_id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `membreBureau` tinyint(1) NOT NULL,
  `fonctionBureau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contenuPage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateModification` datetime NOT NULL,
  `actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F118FE1F4272FC9F` (`domaine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Membre`
--


-- --------------------------------------------------------

--
-- Structure de la table `MonCv`
--

CREATE TABLE `MonCv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `langue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateCreation` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_257FA2556A99F74A` (`membre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `MonCv`
--

INSERT INTO `MonCv` VALUES(10, 3, 'sdfvb', 'EN', '91f5e8dfdd5e03d5c7b332b6ffce3c8bbf369a16.pdf', '2013-06-25 22:02:36');
INSERT INTO `MonCv` VALUES(11, 25, NULL, NULL, '5d0445fbfe57baaace90fe09707d14377613ec9a.pdf', '2013-06-15 00:24:05');
INSERT INTO `MonCv` VALUES(12, 7, NULL, NULL, '7f52329ad46427ed04ee8fe2b0a791d3bc5ab5cf.pdf', '2013-06-25 22:21:25');

-- --------------------------------------------------------

--
-- Structure de la table `Page`
--

CREATE TABLE `Page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texteMenu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateModification` datetime NOT NULL,
  `lienRedirectionExterne` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lienRedirectionInterne` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seoDescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordre` int(11) NOT NULL,
  `defaut` tinyint(1) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `clickable` tinyint(1) NOT NULL,
  `typePage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B438191E727ACA70` (`parent_id`),
  KEY `IDX_B438191EBCF5E72D` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Contenu de la table `Page`
--

INSERT INTO `Page` VALUES(1, 'Accueil', 'Accueil', '<p>Test page accueil</p>', 'accueil', 1, '2012-12-02 00:00:00', '2013-04-27 12:05:39', 'df', 'fs', NULL, 1, 1, NULL, NULL, 0, 'CONTENU');
INSERT INTO `Page` VALUES(2, 'Qui sommes nous ?', 'Qui sommes nous ?', 'Test contenu page inner', 'qui-sommes-nous-?', 1, '2012-12-02 00:00:00', '2013-01-30 22:09:39', NULL, NULL, NULL, 2, 0, NULL, NULL, 0, 'CONTENU');
INSERT INTO `Page` VALUES(3, 'Evenements', 'Evenements', 'Test contenu', 'evenements', 1, '2012-12-02 00:00:00', '2013-01-30 22:10:28', NULL, NULL, NULL, 3, 0, NULL, NULL, 0, 'CONTENU');
INSERT INTO `Page` VALUES(6, 'Partenariats', 'Partenariats', 'fesd', 'partenariats', 1, '2012-12-06 00:00:00', '2013-01-30 22:10:10', NULL, NULL, NULL, 6, 0, NULL, NULL, 0, 'CONTENU');
INSERT INTO `Page` VALUES(7, 'Adhésions', 'Adhésions', 'ds', 'adhesions', 1, '2012-12-06 00:00:00', '2013-01-30 22:10:46', NULL, NULL, NULL, 7, 0, NULL, NULL, 1, 'CONTENU');
INSERT INTO `Page` VALUES(9, 'Manifeste', 'Manifeste', 'fsd', 'manifeste', 1, '2012-12-06 00:00:00', '2013-01-30 22:07:43', NULL, NULL, NULL, 9, 0, 2, NULL, 1, 'CONTENU');
INSERT INTO `Page` VALUES(10, 'Bureau', 'Bureau', '<p>b</p>', 'bureau', 1, '2012-12-06 00:00:00', '2013-04-20 09:21:58', NULL, NULL, NULL, 10, 0, 2, NULL, 1, 'BUREAU');
INSERT INTO `Page` VALUES(11, 'Contact', 'Contact', 'jk', 'contact', 1, '2012-12-06 00:00:00', '2012-12-07 00:00:00', NULL, NULL, NULL, 11, 0, 2, NULL, 1, 'CONTACT');
INSERT INTO `Page` VALUES(12, 'Conférences / Colloques', 'Conférences / Colloques', 'fqs', 'conferences-colloques', 1, '2012-12-06 00:00:00', '2012-12-06 00:00:00', NULL, NULL, NULL, 12, 0, 3, NULL, 1, 'CONTENU');
INSERT INTO `Page` VALUES(13, 'Café des jeunes chercheurs Lyon', 'Café des jeunes chercheurs Lyon', 'fsdr', 'cafes', 1, '2012-12-06 00:00:00', '2012-12-06 00:00:00', NULL, NULL, NULL, 13, 0, 3, NULL, 1, 'CONTENU');
INSERT INTO `Page` VALUES(14, 'Rencontres', 'Rencontres', 'rencontres', 'rencontres', 1, '2012-12-06 00:00:00', '2012-12-06 00:00:00', NULL, NULL, NULL, 14, 0, 3, NULL, 1, 'CONTENU');
INSERT INTO `Page` VALUES(15, 'Réseau confluence', 'Réseau confluence', 'sdf', 'reseau-confluence', 1, '2012-12-06 00:00:00', '2012-12-06 00:00:00', NULL, NULL, NULL, 15, 0, 6, NULL, 1, 'CONTENU');
INSERT INTO `Page` VALUES(16, 'Nos partenaires', 'Nos partenaires', 'fs', 'partenaires', 1, '2012-12-06 00:00:00', '2012-12-06 00:00:00', NULL, NULL, NULL, 16, 0, 6, NULL, 1, 'PARTENAIRES');
INSERT INTO `Page` VALUES(17, 'Nos invités', 'Nos invités', 'fqesd', 'invites', 1, '2012-12-06 00:00:00', '2012-12-06 00:00:00', NULL, NULL, NULL, 17, 0, 6, NULL, 1, 'CONTENU');

-- --------------------------------------------------------

--
-- Structure de la table `Parameters`
--

CREATE TABLE `Parameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomSite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proprietaireSite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresseSite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mailSite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephoneSite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `faxSite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logoSite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lienFacebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lienTwitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactInfos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Parameters`
--

INSERT INTO `Parameters` VALUES(1, 'Collectif CONFLUENCE', 'fsd', 'fsd', 'mail@test.fr', 'dq', 'dqs', 'dq', 'http://facebook.fr', 'http://twitter.fr', 'vincent.jerem@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `Partenaire`
--

CREATE TABLE `Partenaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ordre` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `align` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `Partenaire`
--

INSERT INTO `Partenaire` VALUES(2, 'Région Rhône-Alpes', '176414101ee2a4f120ebbae4c462a5f540f8bf19.jpeg', 'http://www.rhonealpes.fr/', '<p>Le Collectif Confluence est subventionn&eacute; par la r&eacute;gion Rh&ocirc;ne-Alpes, qui le finance dans sa mission premi&egrave;re : d&eacute;mocratiser la recherche en Sciences Humaines et Sociales. La r&eacute;gion Rh&ocirc;ne-Alpes soutient &eacute;galement la r&eacute;alisation des actions du Collectif Confluence.</p>', 2, 80, 400, 'center');
INSERT INTO `Partenaire` VALUES(3, 'Ville de Lyon', '7b6b482dc4bacb83ce3fc29d70009952a17db9f0.png', 'http://www.lyoncampus.info/', '<p>La ville de Lyon met &agrave; disposition du Collectif Confluence des locaux et des ressources pour nous aider &agrave; faire grandir nos projets. L\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''objectif est de soutenir et de favoriser nos initiatives par une aide materielle. Le si&egrave;ge social du Collectif Confluence est h&eacute;berg&eacute; par la ville de Lyon au 25 rue Jaboulay, 69007 Lyon.</p>', 6, 80, 0, 'left');
INSERT INTO `Partenaire` VALUES(4, 'Bibliothèque Municipale de Lyon', '629a08c9e1f38e2be2161a9bf09e4039b941510a.jpeg', 'http://www.bm-lyon.fr/', '<p>Le Collectif Confluence organise des caf&eacute;s jeunes chercheurs en partenariat avec la Biblioth&egrave;que Municipale de Lyon ; moment de d&eacute;bats et d&rsquo;&eacute;changes o&ugrave; les jeunes chercheurs pr&eacute;sentent, confrontent et critiquent leurs travaux en sciences humaines et sociales. Cet &eacute;change entre pairs dans une optique pluridisciplinaire permet une publicisation des travaux. Mais l&rsquo;esprit du caf&eacute; est aussi de mettre en valeur les interventions du public, permettre la rencontre de jeunes chercheurs travaillant sur des m&ecirc;mes th&egrave;mes et diffuser leurs recherches au plus grand nombre. Les caf&eacute;s jeunes chercheurs ont lieu une fois par mois au caf&eacute; de la&nbsp;<a href=\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\&quot;http:/www.bm-lyon.fr/pratique/bibliotheques/bib3Pd.htm\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\">Biblioth&egrave;que de la Part-Dieu</a>, 30 boulevard Marius Vivier Merle, 69003 Lyon.</p>', 5, 80, 0, 'left');
INSERT INTO `Partenaire` VALUES(6, 'Radio campus Lyon / Brume', 'cba17f9a3f2a966040329d5704c4f71addc01cee.jpeg', 'http://www.radiobrume.fr/', '<p>Le Collectif Confluence tient une &eacute;mission de radio mensuelle sur les ondes de Radio campus Lyon 90.7 intitul&eacute;e &laquo; La Fabrique de la Recherche &raquo;. Cette &eacute;mission permet de donner la parole aux jeunes chercheurs pour p&eacute;senter leurs parcours, activit&eacute;s et travaux en sciences humaines et sociales. Radio Campus Lyon retransmet aussi tous les mois les caf&eacute;s jeunes chercheurs organis&eacute;s par le Collectif Confluence en partenariat avec la Biblioth&egrave;que Municipale de Lyon.</p>', 8, 80, 0, 'center');
INSERT INTO `Partenaire` VALUES(7, '(SUEL) Service Universitaire E-Learning', '67af5f9e0c2d5cd9adfd9022efd861a2063b8948.png', 'http://suel.univ-lyon3.fr/', '<p>Le SUEL (Service Universitaire E-Learning) a pour mission de d&eacute;velopper, promouvoir et valoriser l&rsquo;enseignement &agrave; l&rsquo;aide des outils num&eacute;riques p&eacute;dagogiques au sein de l&rsquo;Universit&eacute; Jean Moulin Lyon 3. Le SUEL a un r&ocirc;le transversal aupr&egrave;s des diff&eacute;rents services et composantes de l&rsquo;&eacute;tablissement. Il valorise les productions universitaires par le biais de son portail E-Learning. Le SUEL filme les &eacute;v&eacute;nements organis&eacute;s par le Collectif Confluence et permet leur consultation en ligne.</p>', 7, 80, 0, 'left');
INSERT INTO `Partenaire` VALUES(8, 'Mairie de Paris', '5ae698c33e4ae39ff0cff77acb2145b99f9ce00b.jpeg', 'http://paris.fr', '<p>La mairie de Paris met &agrave; disposition du Collectif Confluence des locaux et des ressources pour nous aider &agrave; faire grandir nos projets. L&#39;objectif est de soutenir et de favoriser nos initiatives par une aide mat&eacute;rielle. Le bureau du Collectif Confluence pour la r&eacute;gion parisienne est h&eacute;berg&eacute; par la mairie de Paris au 50 rue des Tournelles, 75003 Paris.</p>', 1, 80, 400, 'center');
INSERT INTO `Partenaire` VALUES(9, 'gillet', 'ecbc5a64d84defecee6c4f67a7177418fdff4077.jpeg', 'fze', '<p>Le Collectif Confluence organise en partenariat avec la Villa Gillet, des rencontres estivales rassemblant chaque ann&eacute;e &agrave; Lyon les membres du collectif venant de toute la France (et au-del&agrave;). Les rencontres estivales permettent aux membres du Collectif Confluence pendant plusieurs jours de r&eacute;lf&eacute;chir, d\\''&eacute;changer et de partager leurs travaux sous le signe de la transdisciplinarit&eacute;. C\\''est un des temps fort de la vie du collectif. Les rencontres estivales auront lieu cette ann&eacute;e du 15 au 17 juillet 2013 &agrave; la Villa Gillet, 25 Rue Chazi&egrave;re, 69004 Lyon. Nous contacter pour en savoir plus.</p>', 3, 80, 0, 'left');
INSERT INTO `Partenaire` VALUES(10, 'Archives', 'afec6770bc9dc3bc67d2dd8dd7a19b83195a0473.jpeg', 'kml', '<p>Le Collectif Confluence organise en partenariat avec la Villa Gillet, des rencontres estivales rassemblant chaque ann&eacute;e &agrave; Lyon les membres du collectif venant de toute la France (et au-del&agrave;). Les rencontres estivales permettent aux membres du Collectif Confluence pendant plusieurs jours de r&eacute;lf&eacute;chir, d\\''&eacute;changer et de partager leurs travaux sous le signe de la transdisciplinarit&eacute;. C\\''est un des temps fort de la vie du collectif. Les rencontres estivales auront lieu cette ann&eacute;e du 15 au 17 juillet 2013 &agrave; la Villa Gillet, 25 Rue Chazi&egrave;re, 69004 Lyon. Nous contacter pour en savoir plus.</p>', 4, 80, 0, 'left');

-- --------------------------------------------------------

--
-- Structure de la table `Post`
--

CREATE TABLE `Post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) NOT NULL,
  `sousForum_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FAB8C3B36A99F74A` (`membre_id`),
  KEY `IDX_FAB8C3B387FB41B6` (`sousForum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Post`
--


-- --------------------------------------------------------

--
-- Structure de la table `Publication`
--

CREATE TABLE `Publication` (
  `id` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29A0E8AE6A99F74A` (`membre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Publication`
--

INSERT INTO `Publication` VALUES(2, 3);
INSERT INTO `Publication` VALUES(4, 3);
INSERT INTO `Publication` VALUES(3, 25);

-- --------------------------------------------------------

--
-- Structure de la table `SousForum`
--

CREATE TABLE `SousForum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  `isRss` tinyint(1) DEFAULT NULL,
  `urlFlux` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `typeTopic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_15333D3D29CCBAD0` (`forum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `SousForum`
--

INSERT INTO `SousForum` VALUES(4, 1, 'Cafés lyon', '2013-06-17 19:51:32', 0, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse accumsan lacus vel leo fermentum, vitae mattis nunc pellentesque. Pellentesque lacinia quis sem vitae blandit. Vivamus placerat nunc ut neque ornare volutpat. Integer in facilisis mauris, eget bibendum nunc. Praesent elementum et magna sed hendrerit. Nulla consequat est sed arcu ullamcorper, sed tincidunt justo consequat. Quisque interdum dignissim libero, eu eleifend leo suscipit egestas.</p>\r\n\r\n<p>Aliquam sit amet erat non nunc auctor gravida. Mauris blandit suscipit pellentesque. Nullam ipsum libero, ullamcorper vel tincidunt eget, dignissim sit amet lectus. Vivamus dui urna, faucibus quis condimentum ut, fermentum ac dui. Morbi eget luctus nisi, vitae bibendum mi. Proin congue consectetur lectus, eu accumsan elit congue sed. Aenean sed elit aliquam, commodo tortor non, bibendum erat. Maecenas consequat mattis erat et gravida. Vivamus non hendrerit tellus. Praesent condimentum vehicula orci, quis viverra leo fermentum quis. Integer eget leo id tellus aliquet mollis sit amet vitae nisi. Ut a lorem sed dolor semper ultricies vel vel magna. Etiam sed porta nisi. Mauris eget sodales felis.</p>\r\n\r\n<p>Mauris mattis rhoncus tellus, in sagittis mi volutpat sit amet. Phasellus eros neque, luctus nec posuere quis, imperdiet vitae lacus. Etiam a ipsum quis nisl posuere dictum. Curabitur congue lacus ac ipsum aliquam, sit amet faucibus enim porttitor. Suspendisse auctor hendrerit porttitor. Pellentesque hendrerit, nibh eget viverra auctor, nisi lorem viverra ante, sit amet iaculis mauris leo eget est. Proin auctor id nulla in semper. Praesent fermentum hendrerit velit nec tempus. Suspendisse ultricies hendrerit neque, eu gravida diam semper a.</p>\r\n\r\n<p>Nam fringilla nulla quis sodales pharetra. Duis tristique, magna sed pulvinar commodo, elit risus ultricies magna, euismod cursus erat sem sit amet dui. Nullam sit amet diam ut justo mattis faucibus non sit amet sapien. Nunc pretium ut arcu eget aliquet. In lacinia tincidunt quam facilisis feugiat. Morbi eget sem turpis. Fusce non ipsum arcu.</p>\r\n\r\n<p>Donec vel sem eget massa congue bibendum. Nulla iaculis mi non lorem interdum, a sollicitudin nibh dignissim. Pellentesque eu arcu leo. Aenean condimentum dictum molestie. Integer imperdiet vel felis sed sodales. Sed elementum nibh quis risus viverra aliquam. Sed tristique sem eu velit tincidunt dignissim nec vitae arcu.</p>', NULL);
INSERT INTO `SousForum` VALUES(5, 1, 'Cafés Paris', '2013-06-17 19:51:41', 0, NULL, '<p>Test</p>', NULL);
INSERT INTO `SousForum` VALUES(6, 2, 'Boite à outils', '2013-06-17 19:52:02', 0, NULL, '<p>Test</p>', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Statistic`
--

CREATE TABLE `Statistic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `navigateur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mois` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `jour` int(11) NOT NULL,
  `semaine` int(11) NOT NULL,
  `heure` int(11) NOT NULL,
  `minute` int(11) NOT NULL,
  `seconde` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E66AC43F6A99F74A` (`membre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=434 ;

--
-- Contenu de la table `Statistic`
--

INSERT INTO `Statistic` VALUES(1, 3, '2013-05-26 14:54:32', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.93 Safari/537.36', '', 5, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(2, 25, '2013-05-26 14:55:20', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.93 Safari/537.36', '', 5, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(3, 3, '2013-05-26 15:06:57', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.93 Safari/537.36', '', 5, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(4, 25, '2013-05-26 15:32:30', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.93 Safari/537.36', '', 5, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(5, 25, '2013-05-26 15:32:55', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.93 Safari/537.36', '', 5, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(6, 25, '2013-05-26 15:34:25', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.93 Safari/537.36', '', 5, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(7, 3, '2013-05-27 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2013, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(8, 3, '2013-05-28 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2013, 28, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(9, 3, '2013-05-29 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2013, 29, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(10, 3, '2013-05-30 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2013, 30, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(11, 3, '2013-05-31 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2013, 31, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(12, 3, '2013-06-01 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 1, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(13, 3, '2013-06-02 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 2, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(14, 3, '2013-06-03 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 3, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(15, 3, '2013-06-04 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 4, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(16, 3, '2013-06-05 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 5, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(17, 3, '2013-06-06 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 6, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(18, 3, '2013-06-07 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 7, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(19, 3, '2013-06-08 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 8, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(20, 3, '2013-06-09 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 9, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(21, 3, '2013-06-10 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 10, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(22, 3, '2013-06-11 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 11, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(23, 3, '2013-06-12 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 12, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(24, 3, '2013-06-13 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(25, 3, '2013-06-14 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(26, 3, '2013-06-15 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(27, 3, '2013-06-16 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 16, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(28, 3, '2013-06-17 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 17, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(29, 3, '2013-06-18 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 18, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(30, 3, '2013-06-19 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 19, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(31, 3, '2013-06-20 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 20, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(32, 3, '2013-06-21 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 21, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(33, 3, '2013-06-22 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 22, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(34, 3, '2013-06-23 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 23, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(35, 3, '2013-06-24 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 24, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(36, 3, '2013-06-25 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 25, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(37, 3, '2013-06-26 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(38, 3, '2013-06-27 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(39, 3, '2013-06-28 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 28, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(40, 3, '2013-06-29 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 29, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(41, 3, '2013-06-30 16:06:08', '127.0.0.1', 'localhost', '', '', 5, 2013, 30, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(42, 3, '2013-07-01 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 1, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(43, 3, '2013-07-02 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 2, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(44, 3, '2013-07-03 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 3, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(45, 3, '2013-07-04 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 4, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(46, 3, '2013-07-05 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 5, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(47, 3, '2013-07-06 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 6, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(48, 3, '2013-07-07 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 7, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(49, 3, '2013-07-08 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 8, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(50, 3, '2013-07-09 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 9, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(51, 3, '2013-07-10 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 10, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(52, 3, '2013-07-11 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 11, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(53, 3, '2013-07-12 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 12, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(54, 3, '2013-07-13 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(55, 3, '2013-07-14 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(56, 3, '2013-07-15 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(57, 3, '2013-07-16 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 16, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(58, 3, '2013-07-17 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 17, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(59, 3, '2013-07-18 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 18, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(60, 3, '2013-07-19 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 19, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(61, 3, '2013-07-20 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 20, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(62, 3, '2013-07-21 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 21, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(63, 3, '2013-07-22 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 22, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(64, 3, '2013-07-23 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 23, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(65, 3, '2013-07-24 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 24, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(66, 3, '2013-07-25 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 25, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(67, 3, '2013-07-26 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(68, 3, '2013-07-27 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(69, 3, '2013-07-28 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 28, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(70, 3, '2013-07-29 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 29, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(71, 3, '2013-07-30 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 30, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(72, 3, '2013-07-31 16:07:08', '127.0.0.1', 'localhost', '', '', 6, 2013, 31, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(73, 3, '2013-08-01 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 1, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(74, 3, '2013-08-02 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 2, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(75, 3, '2013-08-03 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 3, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(76, 3, '2013-08-04 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 4, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(77, 3, '2013-08-05 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 5, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(78, 3, '2013-08-06 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 6, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(79, 3, '2013-08-07 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 7, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(80, 3, '2013-08-08 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 8, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(81, 3, '2013-08-09 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 9, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(82, 3, '2013-08-10 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 10, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(83, 3, '2013-08-11 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 11, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(84, 3, '2013-08-12 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 12, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(85, 3, '2013-08-13 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(86, 3, '2013-08-14 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(87, 3, '2013-08-15 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(88, 3, '2013-08-16 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 16, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(89, 3, '2013-08-17 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 17, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(90, 3, '2013-08-18 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 18, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(91, 3, '2013-08-19 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 19, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(92, 3, '2013-08-20 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 20, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(93, 3, '2013-08-21 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 21, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(94, 3, '2013-08-22 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 22, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(95, 3, '2013-08-23 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 23, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(96, 3, '2013-08-24 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 24, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(97, 3, '2013-08-25 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 25, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(98, 3, '2013-08-26 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(99, 3, '2013-08-27 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(100, 3, '2013-08-28 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 28, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(101, 3, '2013-08-29 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 29, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(102, 3, '2013-08-30 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 30, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(103, 3, '2013-08-31 16:08:08', '127.0.0.1', 'localhost', '', '', 7, 2013, 31, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(104, 3, '2013-09-01 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 1, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(105, 3, '2013-09-02 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 2, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(106, 3, '2013-09-03 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 3, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(107, 3, '2013-09-04 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 4, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(108, 3, '2013-09-05 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 5, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(109, 3, '2013-09-06 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 6, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(110, 3, '2013-09-07 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 7, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(111, 3, '2013-09-08 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 8, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(112, 3, '2013-09-09 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 9, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(113, 3, '2013-09-10 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 10, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(114, 3, '2013-09-11 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 11, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(115, 3, '2013-09-12 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 12, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(116, 3, '2013-09-13 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(117, 3, '2013-09-14 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(118, 3, '2013-09-15 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(119, 3, '2013-09-16 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 16, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(120, 3, '2013-09-17 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 17, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(121, 3, '2013-09-18 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 18, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(122, 3, '2013-09-19 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 19, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(123, 3, '2013-09-20 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 20, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(124, 3, '2013-09-21 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 21, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(125, 3, '2013-09-22 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 22, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(126, 3, '2013-09-23 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 23, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(127, 3, '2013-09-24 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 24, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(128, 3, '2013-09-25 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 25, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(129, 3, '2013-09-26 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(130, 3, '2013-09-27 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(131, 3, '2013-09-28 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 28, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(132, 3, '2013-09-29 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 29, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(133, 3, '2013-09-30 16:09:08', '127.0.0.1', 'localhost', '', '', 8, 2013, 30, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(134, 3, '2013-10-01 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 1, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(135, 3, '2013-10-02 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 2, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(136, 3, '2013-10-03 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 3, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(137, 3, '2013-10-04 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 4, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(138, 3, '2013-10-05 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 5, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(139, 3, '2013-10-06 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 6, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(140, 3, '2013-10-07 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 7, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(141, 3, '2013-10-08 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 8, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(142, 3, '2013-10-09 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 9, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(143, 3, '2013-10-10 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 10, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(144, 3, '2013-10-11 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 11, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(145, 3, '2013-10-12 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 12, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(146, 3, '2013-10-13 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(147, 3, '2013-10-14 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(148, 3, '2013-10-15 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(149, 3, '2013-10-16 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 16, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(150, 3, '2013-10-17 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 17, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(151, 3, '2013-10-18 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 18, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(152, 3, '2013-10-19 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 19, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(153, 3, '2013-10-20 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 20, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(154, 3, '2013-10-21 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 21, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(155, 3, '2013-10-22 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 22, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(156, 3, '2013-10-23 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 23, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(157, 3, '2013-10-24 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 24, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(158, 3, '2013-10-25 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 25, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(159, 3, '2013-10-26 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(160, 3, '2013-10-27 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(161, 3, '2013-10-28 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 28, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(162, 3, '2013-10-29 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 29, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(163, 3, '2013-10-30 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 30, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(164, 3, '2013-10-31 16:10:08', '127.0.0.1', 'localhost', '', '', 9, 2013, 31, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(165, 3, '2013-11-01 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 1, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(166, 3, '2013-11-02 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 2, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(167, 3, '2013-11-03 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 3, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(168, 3, '2013-11-04 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 4, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(169, 3, '2013-11-05 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 5, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(170, 3, '2013-11-06 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 6, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(171, 3, '2013-11-07 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 7, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(172, 3, '2013-11-08 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 8, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(173, 3, '2013-11-09 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 9, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(174, 3, '2013-11-10 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 10, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(175, 3, '2013-11-11 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 11, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(176, 3, '2013-11-12 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 12, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(177, 3, '2013-11-13 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(178, 3, '2013-11-14 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(179, 3, '2013-11-15 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(180, 3, '2013-11-16 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 16, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(181, 3, '2013-11-17 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 17, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(182, 3, '2013-11-18 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 18, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(183, 3, '2013-11-19 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 19, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(184, 3, '2013-11-20 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 20, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(185, 3, '2013-11-21 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 21, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(186, 3, '2013-11-22 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 22, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(187, 3, '2013-11-23 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 23, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(188, 3, '2013-11-24 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 24, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(189, 3, '2013-11-25 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 25, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(190, 3, '2013-11-26 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(191, 3, '2013-11-27 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(192, 3, '2013-11-28 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 28, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(193, 3, '2013-11-29 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 29, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(194, 3, '2013-11-30 16:11:08', '127.0.0.1', 'localhost', '', '', 10, 2013, 30, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(195, 3, '2013-12-01 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 1, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(196, 3, '2013-12-02 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 2, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(197, 3, '2013-12-03 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 3, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(198, 3, '2013-12-04 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 4, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(199, 3, '2013-12-05 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 5, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(200, 3, '2013-12-06 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 6, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(201, 3, '2013-12-07 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 7, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(202, 3, '2013-12-08 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 8, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(203, 3, '2013-12-09 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 9, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(204, 3, '2013-12-10 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 10, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(205, 3, '2013-12-11 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 11, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(206, 3, '2013-12-12 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 12, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(207, 3, '2013-12-13 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(208, 3, '2013-12-14 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(209, 3, '2013-12-15 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(210, 3, '2013-12-16 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 16, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(211, 3, '2013-12-17 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 17, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(212, 3, '2013-12-18 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 18, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(213, 3, '2013-12-19 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 19, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(214, 3, '2013-12-20 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 20, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(215, 3, '2013-12-21 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 21, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(216, 3, '2013-12-22 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 22, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(217, 3, '2013-12-23 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 23, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(218, 3, '2013-12-24 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 24, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(219, 3, '2013-12-25 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 25, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(220, 3, '2013-12-26 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(221, 3, '2013-12-27 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(222, 3, '2013-12-28 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 28, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(223, 3, '2013-12-29 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 29, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(224, 3, '2013-12-30 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 30, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(225, 3, '2013-12-31 16:12:08', '127.0.0.1', 'localhost', '', '', 11, 2013, 31, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(226, 3, '2014-01-01 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 1, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(227, 3, '2014-01-02 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 2, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(228, 3, '2014-01-03 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 3, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(229, 3, '2014-01-04 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 4, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(230, 3, '2014-01-05 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 5, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(231, 3, '2014-01-06 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 6, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(232, 3, '2014-01-07 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 7, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(233, 3, '2014-01-08 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 8, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(234, 3, '2014-01-09 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 9, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(235, 3, '2014-01-10 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 10, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(236, 3, '2014-01-11 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 11, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(237, 3, '2014-01-12 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 12, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(238, 3, '2014-01-13 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(239, 3, '2014-01-14 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(240, 3, '2014-01-15 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(241, 3, '2014-01-16 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 16, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(242, 3, '2014-01-17 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 17, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(243, 3, '2014-01-18 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 18, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(244, 3, '2014-01-19 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 19, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(245, 3, '2014-01-20 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 20, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(246, 3, '2014-01-21 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 21, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(247, 3, '2014-01-22 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 22, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(248, 3, '2014-01-23 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 23, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(249, 3, '2014-01-24 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 24, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(250, 3, '2014-01-25 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 25, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(251, 3, '2014-01-26 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(252, 3, '2014-01-27 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(253, 3, '2014-01-28 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 28, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(254, 3, '2014-01-29 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 29, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(255, 3, '2014-01-30 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 30, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(256, 3, '2014-01-31 16:01:08', '127.0.0.1', 'localhost', '', '', 0, 2014, 31, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(257, 3, '2014-02-01 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 1, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(258, 3, '2014-02-02 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 2, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(259, 3, '2014-02-03 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 3, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(260, 3, '2014-02-04 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 4, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(261, 3, '2014-02-05 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 5, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(262, 3, '2014-02-06 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 6, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(263, 3, '2014-02-07 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 7, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(264, 3, '2014-02-08 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 8, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(265, 3, '2014-02-09 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 9, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(266, 3, '2014-02-10 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 10, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(267, 3, '2014-02-11 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 11, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(268, 3, '2014-02-12 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 12, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(269, 3, '2014-02-13 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(270, 3, '2014-02-14 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(271, 3, '2014-02-15 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(272, 3, '2014-02-16 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 16, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(273, 3, '2014-02-17 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 17, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(274, 3, '2014-02-18 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 18, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(275, 3, '2014-02-19 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 19, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(276, 3, '2014-02-20 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 20, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(277, 3, '2014-02-21 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 21, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(278, 3, '2014-02-22 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 22, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(279, 3, '2014-02-23 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 23, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(280, 3, '2014-02-24 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 24, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(281, 3, '2014-02-25 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 25, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(282, 3, '2014-02-26 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(283, 3, '2014-02-27 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(284, 3, '2014-02-28 16:02:08', '127.0.0.1', 'localhost', '', '', 1, 2014, 28, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(285, 3, '2014-03-01 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 1, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(286, 3, '2014-03-02 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 2, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(287, 3, '2014-03-03 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 3, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(288, 3, '2014-03-04 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 4, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(289, 3, '2014-03-05 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 5, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(290, 3, '2014-03-06 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 6, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(291, 3, '2014-03-07 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 7, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(292, 3, '2014-03-08 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 8, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(293, 3, '2014-03-09 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 9, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(294, 3, '2014-03-10 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 10, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(295, 3, '2014-03-11 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 11, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(296, 3, '2014-03-12 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 12, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(297, 3, '2014-03-13 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(298, 3, '2014-03-14 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(299, 3, '2014-03-15 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(300, 3, '2014-03-16 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 16, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(301, 3, '2014-03-17 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 17, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(302, 3, '2014-03-18 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 18, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(303, 3, '2014-03-19 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 19, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(304, 3, '2014-03-20 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 20, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(305, 3, '2014-03-21 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 21, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(306, 3, '2014-03-22 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 22, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(307, 3, '2014-03-23 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 23, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(308, 3, '2014-03-24 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 24, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(309, 3, '2014-03-25 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 25, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(310, 3, '2014-03-26 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(311, 3, '2014-03-27 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(312, 3, '2014-03-28 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 28, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(313, 3, '2014-03-29 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 29, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(314, 3, '2014-03-30 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 30, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(315, 3, '2014-03-31 16:03:08', '127.0.0.1', 'localhost', '', '', 2, 2014, 31, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(316, 3, '2014-04-01 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 1, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(317, 3, '2014-04-02 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 2, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(318, 3, '2014-04-03 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 3, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(319, 3, '2014-04-04 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 4, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(320, 3, '2014-04-05 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 5, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(321, 3, '2014-04-06 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 6, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(322, 3, '2014-04-07 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 7, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(323, 3, '2014-04-08 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 8, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(324, 3, '2014-04-09 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 9, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(325, 3, '2014-04-10 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 10, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(326, 3, '2014-04-11 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 11, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(327, 3, '2014-04-12 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 12, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(328, 3, '2014-04-13 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(329, 3, '2014-04-14 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(330, 3, '2014-04-15 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(331, 3, '2014-04-16 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 16, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(332, 3, '2014-04-17 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 17, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(333, 3, '2014-04-18 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 18, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(334, 3, '2014-04-19 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 19, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(335, 3, '2014-04-20 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 20, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(336, 3, '2014-04-21 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 21, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(337, 3, '2014-04-22 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 22, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(338, 3, '2014-04-23 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 23, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(339, 3, '2014-04-24 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 24, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(340, 3, '2014-04-25 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 25, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(341, 3, '2014-04-26 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(342, 3, '2014-04-27 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(343, 3, '2014-04-28 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 28, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(344, 3, '2014-04-29 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 29, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(345, 3, '2014-04-30 16:04:08', '127.0.0.1', 'localhost', '', '', 3, 2014, 30, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(346, 3, '2014-05-01 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 1, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(347, 3, '2014-05-02 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 2, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(348, 3, '2014-05-03 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 3, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(349, 3, '2014-05-04 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 4, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(350, 3, '2014-05-05 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 5, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(351, 3, '2014-05-06 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 6, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(352, 3, '2014-05-07 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 7, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(353, 3, '2014-05-08 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 8, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(354, 3, '2014-05-09 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 9, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(355, 3, '2014-05-10 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 10, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(356, 3, '2014-05-11 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 11, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(357, 3, '2014-05-12 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 12, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(358, 3, '2014-05-13 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(359, 3, '2014-05-14 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(360, 3, '2014-05-15 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(361, 3, '2014-05-16 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 16, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(362, 3, '2014-05-17 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 17, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(363, 3, '2014-05-18 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 18, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(364, 3, '2014-05-19 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 19, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(365, 3, '2014-05-20 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 20, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(366, 3, '2014-05-21 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 21, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(367, 3, '2014-05-22 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 22, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(368, 3, '2014-05-23 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 23, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(369, 3, '2014-05-24 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 24, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(370, 3, '2014-05-25 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 25, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(371, 3, '2014-05-26 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 26, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(372, 3, '2014-05-27 16:05:08', '127.0.0.1', 'localhost', '', '', 4, 2014, 27, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(373, 3, '2013-06-13 20:30:36', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(374, 3, '2013-06-13 20:53:34', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(375, 7, '2013-06-13 20:53:50', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(376, 25, '2013-06-13 20:53:58', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(377, 25, '2013-06-13 21:37:48', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(378, 3, '2013-06-13 22:26:08', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(379, 3, '2013-06-13 22:42:15', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(380, 3, '2013-06-13 22:42:35', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(381, 3, '2013-06-13 22:42:51', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(382, 3, '2013-06-13 22:43:13', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(383, 3, '2013-06-13 22:43:20', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(384, 3, '2013-06-13 22:44:44', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(385, 3, '2013-06-13 22:45:30', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(386, 3, '2013-06-13 22:45:39', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(387, 3, '2013-06-13 22:45:53', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(388, 3, '2013-06-13 22:46:03', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(389, 3, '2013-06-13 22:46:12', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(390, 3, '2013-06-13 22:46:37', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(391, 3, '2013-06-13 22:46:49', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(392, 3, '2013-06-13 22:47:27', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(393, 25, '2013-06-13 22:47:30', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(394, 3, '2013-06-13 22:47:41', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(395, 3, '2013-06-13 22:48:41', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(396, 3, '2013-06-13 22:48:53', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(397, 3, '2013-06-13 22:49:05', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(398, 3, '2013-06-13 22:52:06', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(399, 3, '2013-06-13 22:54:07', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(400, 3, '2013-06-13 22:56:29', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 13, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(401, 3, '2013-06-14 21:58:33', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(402, 3, '2013-06-14 23:23:51', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(403, 3, '2013-06-14 23:24:13', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 14, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(404, 3, '2013-06-15 00:05:46', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(405, 3, '2013-06-15 00:12:33', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(406, 25, '2013-06-15 00:17:04', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(407, 25, '2013-06-15 00:17:32', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(408, 25, '2013-06-15 00:23:56', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(409, 25, '2013-06-15 00:24:08', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(410, 25, '2013-06-15 00:37:34', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(411, 25, '2013-06-15 00:38:07', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(412, 25, '2013-06-15 00:38:20', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(413, 25, '2013-06-15 00:39:45', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 15, 0, 0, 0, 0);
INSERT INTO `Statistic` VALUES(414, 3, '2013-06-17 19:27:48', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 17, 25, 0, 0, 0);
INSERT INTO `Statistic` VALUES(415, 3, '2013-06-17 19:28:16', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 17, 25, 0, 0, 0);
INSERT INTO `Statistic` VALUES(416, 3, '2013-06-17 19:30:22', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 17, 25, 19, 30, 0);
INSERT INTO `Statistic` VALUES(417, 3, '2013-06-17 19:41:17', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 17, 25, 19, 35, 17);
INSERT INTO `Statistic` VALUES(418, 3, '2013-06-17 19:42:38', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 17, 25, 19, 42, 38);
INSERT INTO `Statistic` VALUES(419, 3, '2013-06-17 19:44:54', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', '', 6, 2013, 17, 25, 19, 44, 54);
INSERT INTO `Statistic` VALUES(420, 30, '2013-06-25 21:54:28', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 21, 54, 28);
INSERT INTO `Statistic` VALUES(421, 3, '2013-06-25 21:54:32', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 21, 54, 32);
INSERT INTO `Statistic` VALUES(422, 3, '2013-06-25 21:56:20', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 21, 56, 20);
INSERT INTO `Statistic` VALUES(423, 3, '2013-06-25 21:58:00', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 21, 58, 0);
INSERT INTO `Statistic` VALUES(424, 3, '2013-06-25 22:00:55', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 22, 0, 55);
INSERT INTO `Statistic` VALUES(425, 3, '2013-06-25 22:02:52', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 22, 2, 52);
INSERT INTO `Statistic` VALUES(426, 3, '2013-06-25 22:04:00', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 22, 4, 0);
INSERT INTO `Statistic` VALUES(427, 3, '2013-06-25 22:04:58', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 22, 4, 58);
INSERT INTO `Statistic` VALUES(428, 3, '2013-06-25 22:05:58', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 22, 5, 58);
INSERT INTO `Statistic` VALUES(429, 30, '2013-06-25 22:23:55', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 22, 23, 55);
INSERT INTO `Statistic` VALUES(430, 25, '2013-06-25 22:26:51', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 22, 26, 51);
INSERT INTO `Statistic` VALUES(431, 25, '2013-06-25 22:28:59', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 22, 28, 59);
INSERT INTO `Statistic` VALUES(432, 7, '2013-06-25 22:31:06', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 22, 31, 6);
INSERT INTO `Statistic` VALUES(433, 3, '2013-06-25 22:33:16', '127.0.0.1', 'localhost', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', '', 6, 2013, 25, 26, 22, 33, 16);

-- --------------------------------------------------------

--
-- Structure de la table `SuperClassArticle`
--

CREATE TABLE `SuperClassArticle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resume` longtext COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateModification` datetime NOT NULL,
  `datePublication` datetime NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `SuperClassArticle`
--

INSERT INTO `SuperClassArticle` VALUES(1, 'Jean Jean', '<p>sdcds</p>', '<p>cds</p>', '2013-05-26 12:12:51', '2013-05-26 12:37:21', '2013-05-31 00:00:00', 1, 'jean-jean', 'article');
INSERT INTO `SuperClassArticle` VALUES(2, 'test', '<p>test</p>', '<p>test</p>', '2013-05-26 12:20:29', '2013-05-26 12:20:29', '2013-05-26 00:00:00', 1, 'test', 'publication');
INSERT INTO `SuperClassArticle` VALUES(3, 'truc', '<p>Salut je suis g&eacute;nial</p>', '<p>Bonjour tous !!!&nbsp;</p>', '2013-06-15 00:16:25', '2013-06-15 00:16:25', '2013-06-15 00:00:00', 1, 'truc', 'publication');
INSERT INTO `SuperClassArticle` VALUES(4, 'prout', '<p>tghjk</p>', '<p>dfgvjkjghfukjkhbkufvuykjh</p>', '2013-06-25 22:03:52', '2013-06-25 22:03:52', '2013-06-25 00:00:00', 1, 'prout', 'publication');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domaine_id` int(11) DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `membreBureau` tinyint(1) DEFAULT NULL,
  `fonctionBureau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contenuPage` longtext COLLATE utf8_unicode_ci,
  `dateCreation` datetime NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activiteNumerique` longtext COLLATE utf8_unicode_ci,
  `lieu` longtext COLLATE utf8_unicode_ci,
  `statut` longtext COLLATE utf8_unicode_ci,
  `sujetRecherche` longtext COLLATE utf8_unicode_ci,
  `structure` longtext COLLATE utf8_unicode_ci,
  `$twitter` longtext COLLATE utf8_unicode_ci,
  `facebook` longtext COLLATE utf8_unicode_ci,
  `hypothese` longtext COLLATE utf8_unicode_ci,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sitePersonnel` longtext COLLATE utf8_unicode_ci,
  `pageStructure` longtext COLLATE utf8_unicode_ci,
  `dateModification` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  KEY `IDX_8D93D6494272FC9F` (`domaine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` VALUES(3, 'test@test.fr', 'test@test.fr', 'test@test.fr', 'test@test.fr', 1, 'fyq4xj7lrugw8kk4gg0kw884sgkk0o4', 'dQDq7LqHrfR6oGVEQWwYmv3mQPlNm9Croj53Pfu6DSi7coJNpKw0930wFtJVYi53mtu2BOWDH5OLpDZEi1vz1Q==', '2013-06-25 22:19:50', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL, 'VINCENT', 9, 'Jérémy', 1, 'Secrétaire', '<p>Super page, la meilleure</p>', '2013-03-01 22:34:31', 'bfa393720087366a2f0c473859b98e533931e591.jpeg', 'jeremy-vincent', 'http://test', NULL, NULL, 'test', NULL, 'http://https://twitter.com/', 'http://www.facebook.com', 'http://fr.hypotheses.org/', '0384940120', 'http://test', 'http://test', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(7, 'test2@test.fr', 'test2@test.fr', 'test2@test.fr', 'test2@test.fr', 1, 'e2jg68vhtrswg8soowsgwc8g8sso888', 'HjQpuDD+X83k2aZL3YIz6FTCzn3rejGMEGE3MGwuUHLJoBJ9YUD4AoN9O3SnyPlp1TKFZRJu4xObwMS7WkBEUA==', '2013-06-25 22:20:27', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'TEST', 12, 'Test', 0, 'sdf', '<p>fsd</p>', '2013-03-02 13:06:11', '08a89942582cea233fc4b817ef30eb37a5083a13.jpeg', 'test-test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-06-25 22:20:09');
INSERT INTO `user` VALUES(25, 'bl@v.fr', 'bl@v.fr', 'bl@v.fr', 'bl@v.fr', 1, 'sto0dp3w3gg04w4kc04wc844skks8gc', 'MZAeIFYxBVqNQ+Zdax6ZQvpt8WhwlQZ5S8oqx0skxaGP+Sv2C1Om5sIUCWzVKoUBN8Lk5j47vaDHeqUWeIMB5w==', '2013-06-15 00:37:23', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'BENOIT', 9, 'Benoit', 0, NULL, '<p>Enseignant de Culture G&eacute;n&eacute;rale &agrave; l&#39;universit&eacute; Lyon 2, il &eacute;tudie l&#39;histoire du XIX&egrave;me si&egrave;cle, et particuli&egrave;rment l&rsquo;histoire politique. Il travaille actuellement &agrave; comprendre l&rsquo;ascension sociale exceptionnelle et le parcours politique d&#39;Auguste Burdeau, durant lesquels il a &eacute;t&eacute; amen&eacute; &agrave; remplir les fonctions de d&eacute;put&eacute;, ministre, puis pr&eacute;sident de la Chambre des d&eacute;put&eacute;s sous la III&egrave;me R&eacute;publique. La probl&eacute;matique de cette recherche est ax&eacute;e autour de la biographie d&#39;Auguste Burdeau, afin d&rsquo;appr&eacute;hender sa sociologie, son parcours et son poids politique. Au cours de ses &eacute;tudes, il a assist&eacute; plusieurs personnalit&eacute;s publiques. Il a par ailleurs remport&eacute; la XIX&egrave;me &eacute;dition du Concours de Plaidoiries des &eacute;tudiants lyonnais (concours d&#39;&eacute;loquence Adely Lyon 3) sous le parrainage de Monsieur le Pr&eacute;sident du Conseil Constitutionnel J.-L. DEBR&Eacute;. Il est actuellement commissaire Jeunesse de la r&eacute;gion Rh&ocirc;ne-Alpes.</p>', '2013-05-12 12:01:55', 'd0459a8337528464a0a5ac5cb8bd6c1ff9a3b89d.jpeg', 'benoit-benoit', 'http://google.fr', 'ju', 'u', 'De tout', NULL, 'http://google.fr', 'http://google.fr', NULL, '0000000000', 'http://google.fr', 'http://google.fr', '2013-06-15 00:23:21');
INSERT INTO `user` VALUES(26, 'test@tttt.fr', 'test@tttt.fr', 'test@tttt.fr', 'test@tttt.fr', 0, 'gvqx8zortu88kkc4ok0kc40gc0kckww', '7e6j4kHcPOAjpFW7KtmXjpwUdB61rvw7FsZVkm4QCSVdsc4KioXnD4+Oysrim64xmf9XQGRl5hAUC8PPgkbw9w==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'test1', NULL, 'test', NULL, NULL, NULL, '2013-05-12 17:12:52', NULL, 'test1-test', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(27, 'tet@ppppp.fr', 'tet@ppppp.fr', 'tet@ppppp.fr', 'tet@ppppp.fr', 1, 'j2x58m7i1tkwocw800ko4kggck4s8oc', '2qUtBZQCdpjIDpsh+U3bFzRrxBTJpmocdej61clLeoESIiz1KkqVnjEnFQaCa+gVBZmr51qwTQDhlT2F8y6oig==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'Dujardin', 14, 'Jean', 0, NULL, '<p>Bonjour</p>', '2013-05-12 18:26:17', NULL, 'jean-dujardin', 'http://jeremy-online.fr', 'Paris', 'Célibataire', 'Informatique', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(28, 'hhh@hhh.com', 'hhh@hhh.com', 'hhh@hhh.com', 'hhh@hhh.com', 0, '2hdtcn4q4vuowcgkgks00skkgsk0s4g', 'ATVzZs1stCHWuB4O6N8SM1qdPXIcS9BSVeDfZFgLqXe8y+gjUwkdOR+dj3LFLlmQmumAC8KZHyibnpIlLbUWEQ==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'fhjb', NULL, 'kjb', NULL, NULL, '<p>lkjn</p>', '2013-06-14 22:32:34', NULL, 'kjb-fhjb', 'klm,', 'm,', 'ml,', 'jkn', 'kj', 'bjb', 'k,', 'kl', NULL, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(29, 'pp', 'pp', 'pp', 'pp', 0, 'gfn0olch068g0cgog4cwkocwoswosks', 'SYO4KlE9guB61Jc36vGHijFVuF1IkB3kiltxePZ6u2MCrFcMBV9+eUaPpCZcWW5ep7EW8zp+Wps9PoO/liof9w==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'pp', NULL, 'pp', NULL, NULL, NULL, '2013-06-14 22:50:27', NULL, 'pp-pp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `user` VALUES(30, 'jean@jean.com', 'jean@jean.com', 'jean@jean.com', 'jean@jean.com', 1, '8vxi9cy9nrwgwk4sc8gc4cgok0sw0w0', 'fr/PeQOZz0Z2NkVUJmP/Zkfyj5kM3Uk8jnPW4BiMapzvRYiHyUzIVbbC4GN1jXOiVR6CuziwvfYVlmD+pOx6Jw==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'TT', 9, 'T', 0, NULL, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '2013-06-14 23:12:21', NULL, 't-tt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Article`
--
ALTER TABLE `Article`
  ADD CONSTRAINT `FK_CD8737FABCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `Categorie` (`id`),
  ADD CONSTRAINT `FK_CD8737FABF396750` FOREIGN KEY (`id`) REFERENCES `SuperClassArticle` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Competence`
--
ALTER TABLE `Competence`
  ADD CONSTRAINT `FK_DB896BAF6A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `Experience`
--
ALTER TABLE `Experience`
  ADD CONSTRAINT `FK_4ACDC2D36A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `Formation`
--
ALTER TABLE `Formation`
  ADD CONSTRAINT `FK_C2B1A31C6A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `Interet`
--
ALTER TABLE `Interet`
  ADD CONSTRAINT `FK_663C56396A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `Membre`
--
ALTER TABLE `Membre`
  ADD CONSTRAINT `FK_F118FE1F4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `Domaine` (`id`);

--
-- Contraintes pour la table `MonCv`
--
ALTER TABLE `MonCv`
  ADD CONSTRAINT `FK_257FA2556A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `Page`
--
ALTER TABLE `Page`
  ADD CONSTRAINT `FK_B438191E727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `Page` (`id`),
  ADD CONSTRAINT `FK_B438191EBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `Categorie` (`id`);

--
-- Contraintes pour la table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `FK_FAB8C3B36A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_FAB8C3B387FB41B6` FOREIGN KEY (`sousForum_id`) REFERENCES `SousForum` (`id`);

--
-- Contraintes pour la table `Publication`
--
ALTER TABLE `Publication`
  ADD CONSTRAINT `FK_29A0E8AE6A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_29A0E8AEBF396750` FOREIGN KEY (`id`) REFERENCES `SuperClassArticle` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `SousForum`
--
ALTER TABLE `SousForum`
  ADD CONSTRAINT `FK_15333D3D29CCBAD0` FOREIGN KEY (`forum_id`) REFERENCES `Forum` (`id`);

--
-- Contraintes pour la table `Statistic`
--
ALTER TABLE `Statistic`
  ADD CONSTRAINT `FK_E66AC43F6A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6494272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `Domaine` (`id`);
