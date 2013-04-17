-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 10 Avril 2013 à 19:58
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resume` longtext COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateModification` datetime NOT NULL,
  `actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CD8737FABCF5E72D` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Article`
--

INSERT INTO `Article` VALUES(1, 1, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In interdum ligula in enim posuere sollicitudin. Cras sagittis blandit diam, vitae pellentesque erat bibendum a. Suspendisse ut est mi, quis convallis turpis. Donec in purus eu lectus commodo vestibulum. Praesent porta, sem at volutpat posuere, lectus ante iaculis nunc, volutpat ullamcorper ante ipsum in nulla. Vestibulum massa nisi, eleifend et sagittis quis, pellentesque a turpis. Nulla sit amet felis nunc. Aliquam pulvinar convallis sapien, a tempus nulla tincidunt ornare. Sed est dolor, elementum at pharetra pharetra, porta imperdiet tortor. Nam interdum viverra leo, ac vehicula arcu eleifend sit amet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam pharetra tellus feugiat sem lobortis lacinia.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In interdum ligula in enim posuere sollicitudin. Cras sagittis blandit diam, vitae pellentesque erat bibendum a. Suspendisse ut est mi, quis convallis turpis. Donec in purus eu lectus commodo vestibulum. Praesent porta, sem at volutpat posuere, lectus ante iaculis nunc, volutpat ullamcorper ante ipsum in nulla. Vestibulum massa nisi, eleifend et sagittis quis, pellentesque a turpis. Nulla sit amet felis nunc. Aliquam pulvinar convallis sapien, a tempus nulla tincidunt ornare. Sed est dolor, elementum at pharetra pharetra, porta imperdiet tortor. Nam interdum viverra leo, ac vehicula arcu eleifend sit amet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam pharetra tellus feugiat sem lobortis lacinia.\r\n\r\nPraesent quam lorem, adipiscing sed dignissim vitae, tristique a diam. Suspendisse potenti. Praesent a laoreet tortor. Nam facilisis mi eget felis auctor ultrices. Nullam pellentesque, odio eget fermentum ornare, mauris ante accumsan sem, fermentum ultricies sem enim vitae enim. Mauris quam tellus, accumsan ac iaculis ut, malesuada et lacus. Nam sollicitudin lacinia nulla, in accumsan arcu ornare a. Phasellus ut tellus in lectus consectetur interdum at et leo. Fusce posuere suscipit nunc, eu interdum mi rhoncus at.\r\n\r\nProin luctus placerat viverra. Vivamus sapien libero, sollicitudin ut interdum vel, elementum quis magna. Cras condimentum tempus metus, eu mollis felis hendrerit et. Phasellus eget pellentesque elit. Praesent vel neque odio. Nulla lacinia nisl ac nisl aliquam at hendrerit elit ultrices. Fusce nisl lacus, feugiat eget mollis iaculis, sodales quis urna. Nam et libero metus. Nulla aliquet pretium nulla id condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus ut elit in urna fermentum tristique. Donec elementum, arcu vel ultricies tempus, neque erat eleifend augue, vulputate rutrum orci velit et arcu. Quisque sodales posuere tortor ut condimentum. Fusce tempor auctor justo, non molestie metus iaculis eget. Donec a odio sed nibh mattis cursus.\r\n\r\nPellentesque eu sapien elit. Cras malesuada accumsan ante in congue. Vivamus id quam eu nisi fermentum varius vel id tellus. Donec condimentum adipiscing mollis. Phasellus dapibus convallis sagittis. Praesent fringilla suscipit eros, nec tincidunt nisi commodo nec. Pellentesque ligula nibh, porttitor sed accumsan eget, rhoncus at ligula. Sed ac nunc justo. Nullam diam nisl, auctor sed fringilla sit amet, sodales ac ante. Etiam iaculis dapibus aliquet. Phasellus tempus, eros vel sollicitudin tristique, nulla magna malesuada magna, sed cursus felis nisi eget magna. Vivamus ac nulla ante. Ut condimentum ligula eu purus fermentum nec sodales eros hendrerit. Ut neque justo, cursus quis ultricies non, malesuada rutrum quam.\r\n\r\nProin eget tellus justo, et tempus erat. Fusce nec arcu ac leo dictum facilisis eget et mauris. Nullam in est tellus, non viverra tellus. Fusce semper mattis tincidunt. Nullam vitae arcu pellentesque nulla commodo lacinia. Nullam placerat dui et nunc sagittis non bibendum magna blandit. Phasellus lacus augue, laoreet nec condimentum in, lobortis nec metus. Donec nec lacus mi. Phasellus vitae ornare sapien. Integer et odio in nulla facilisis suscipit. Cras vitae velit augue, a fermentum diam.', '2012-12-15 23:39:41', '2013-02-03 15:30:51', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` VALUES(1, 'Test', 'efdsv', '2012-12-15 23:39:29', '2012-12-15 23:39:29');

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
INSERT INTO `Domaine` VALUES(20, 'Arts & Lettres', 'arts-&-lettres', 'test', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 12, 'b7a040e8a913e0053540d18ddf23fc31529f28ef.jpeg');
INSERT INTO `Domaine` VALUES(21, 'Archéologie', 'archeologie', 'test', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 13, 'b677f3e15740fb816eef73e66ebe4eb2af56a7ec.jpeg');
INSERT INTO `Domaine` VALUES(22, 'Urbanisme', 'urbanisme', 'test', '2012-12-11 00:00:00', '2012-12-11 00:00:00', 1, 14, '5f136b52595ea56e1360635d947d1aa7f41646d4.jpeg');

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
  `defaut` tinyint(1) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `clickable` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B438191E727ACA70` (`parent_id`),
  KEY `IDX_B438191EBCF5E72D` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Contenu de la table `Page`
--

INSERT INTO `Page` VALUES(1, 'Accueil', 'Accueil', 'Test page accueil', 'accueil', 1, '2012-12-02 00:00:00', '2013-01-30 22:09:22', 'df', 'fs', NULL, 1, 1, NULL, NULL, 0);
INSERT INTO `Page` VALUES(2, 'Qui sommes nous ?', 'Qui sommes nous ?', 'Test contenu page inner', 'qui-sommes-nous-?', 1, '2012-12-02 00:00:00', '2013-01-30 22:09:39', NULL, NULL, NULL, 2, 0, NULL, NULL, 0);
INSERT INTO `Page` VALUES(3, 'Evenements', 'Evenements', 'Test contenu', 'evenements', 1, '2012-12-02 00:00:00', '2013-01-30 22:10:28', NULL, NULL, NULL, 3, 0, NULL, NULL, 0);
INSERT INTO `Page` VALUES(6, 'Partenariats', 'Partenariats', 'fesd', 'partenariats', 1, '2012-12-06 00:00:00', '2013-01-30 22:10:10', NULL, NULL, NULL, 6, 0, NULL, NULL, 0);
INSERT INTO `Page` VALUES(7, 'Adhésions', 'Adhésions', 'ds', 'adhesions', 1, '2012-12-06 00:00:00', '2013-01-30 22:10:46', NULL, NULL, NULL, 7, 0, NULL, NULL, 1);
INSERT INTO `Page` VALUES(9, 'Manifeste', 'Manifeste', 'fsd', 'manifeste', 1, '2012-12-06 00:00:00', '2013-01-30 22:07:43', NULL, NULL, NULL, 9, 0, 2, NULL, 1);
INSERT INTO `Page` VALUES(10, 'Bureau', 'Bureau', 'b', 'bureau', 1, '2012-12-06 00:00:00', '2012-12-07 00:00:00', NULL, NULL, NULL, 10, 0, 2, NULL, 1);
INSERT INTO `Page` VALUES(11, 'Contact', 'Contact', 'jk', 'contact', 1, '2012-12-06 00:00:00', '2012-12-07 00:00:00', NULL, NULL, NULL, 11, 0, 2, NULL, 1);
INSERT INTO `Page` VALUES(12, 'Conférences / Colloques', 'Conférences / Colloques', 'fqs', 'conferences-colloques', 1, '2012-12-06 00:00:00', '2012-12-06 00:00:00', NULL, NULL, NULL, 12, 0, 3, NULL, 1);
INSERT INTO `Page` VALUES(13, 'Café des jeunes chercheurs Lyon', 'Café des jeunes chercheurs Lyon', 'fsdr', 'cafes', 1, '2012-12-06 00:00:00', '2012-12-06 00:00:00', NULL, NULL, NULL, 13, 0, 3, NULL, 1);
INSERT INTO `Page` VALUES(14, 'Rencontres', 'Rencontres', 'rencontres', 'rencontres', 1, '2012-12-06 00:00:00', '2012-12-06 00:00:00', NULL, NULL, NULL, 14, 0, 3, NULL, 1);
INSERT INTO `Page` VALUES(15, 'Réseau confluence', 'Réseau confluence', 'sdf', 'reseau-confluence', 1, '2012-12-06 00:00:00', '2012-12-06 00:00:00', NULL, NULL, NULL, 15, 0, 6, NULL, 1);
INSERT INTO `Page` VALUES(16, 'Nos partenaires', 'Nos partenaires', 'fs', 'partenaires', 1, '2012-12-06 00:00:00', '2012-12-06 00:00:00', NULL, NULL, NULL, 16, 0, 6, NULL, 1);
INSERT INTO `Page` VALUES(17, 'Nos invités', 'Nos invités', 'fqesd', 'invites', 1, '2012-12-06 00:00:00', '2012-12-06 00:00:00', NULL, NULL, NULL, 17, 0, 6, NULL, 1);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Parameters`
--

INSERT INTO `Parameters` VALUES(1, 'Collectif CONFLUENCE', 'fsd', 'fsd', 'mail@test.fr', 'dq', 'dqs', 'dq', 'http://facebook.fr', 'http://twitter.fr');

-- --------------------------------------------------------

--
-- Structure de la table `Partenaire`
--

CREATE TABLE `Partenaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `Partenaire`
--

INSERT INTO `Partenaire` VALUES(2, 'Test', '176414101ee2a4f120ebbae4c462a5f540f8bf19.jpeg', 'http://google.fr');
INSERT INTO `Partenaire` VALUES(3, 'ezfds', '7b6b482dc4bacb83ce3fc29d70009952a17db9f0.png', 'fsdqfqsd');
INSERT INTO `Partenaire` VALUES(4, 'BM', '629a08c9e1f38e2be2161a9bf09e4039b941510a.jpeg', 'BM');
INSERT INTO `Partenaire` VALUES(5, 'fqds', 'b6ff13863a585d788ec8cb8420c9c24480f9527c.jpeg', 'fqds');
INSERT INTO `Partenaire` VALUES(6, 'fqd', 'e4b18decee8414ef3126934c4bc21075a0876862.jpeg', 'fqsd');

-- --------------------------------------------------------

--
-- Structure de la table `Publication`
--

CREATE TABLE `Publication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resume` longtext COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` date NOT NULL,
  `dateModification` date NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `membre_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29A0E8AE6A99F74A` (`membre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `Publication`
--

INSERT INTO `Publication` VALUES(6, 'dsqdqs', '<p>zd</p>', '<p>dqs</p>', '2013-03-01', '2013-03-02', 1, 3);
INSERT INTO `Publication` VALUES(9, 'zkd,sqm', 'm,fqds', 'k,sqd', '2013-03-02', '2013-03-02', 1, 7);
INSERT INTO `Publication` VALUES(15, 'lnjlkn', '<p>m,ml,</p>', '<p>mlml,ml</p>', '2013-03-02', '2013-03-02', 1, 3);

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
  `dateNaissance` date NOT NULL,
  `membreBureau` tinyint(1) DEFAULT NULL,
  `fonctionBureau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contenuPage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateCreation` datetime NOT NULL,
  `actif` tinyint(1) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  KEY `IDX_8D93D6494272FC9F` (`domaine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` VALUES(3, 'timetre', 'timetre', 'test@test.fr', 'test@test.fr', 1, 'fyq4xj7lrugw8kk4gg0kw884sgkk0o4', 'dQDq7LqHrfR6oGVEQWwYmv3mQPlNm9Croj53Pfu6DSi7coJNpKw0930wFtJVYi53mtu2BOWDH5OLpDZEi1vz1Q==', '2013-04-08 20:29:33', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL, 'Vincent', 9, 'Jérémy', '1989-08-29', 0, 'Nope', '6bf31d5e65a693a800e6d58c507c9564ddc8e5e0.png', '<p>Prout bbbbbb</p>', '2013-03-01 22:34:31', 1, NULL);
INSERT INTO `user` VALUES(7, 'membre', 'membre', 'jk@k.fr', 'jk@k.fr', 1, 'e2jg68vhtrswg8soowsgwc8g8sso888', 'HjQpuDD+X83k2aZL3YIz6FTCzn3rejGMEGE3MGwuUHLJoBJ9YUD4AoN9O3SnyPlp1TKFZRJu4xObwMS7WkBEUA==', '2013-03-02 13:17:02', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'te', 12, 'bj', '2013-03-07', 0, 'sdf', NULL, 'fsd', '2013-03-02 13:06:11', 1, NULL);
INSERT INTO `user` VALUES(8, 'ppp', 'ppp', 'pp@pp.de', 'pp@pp.de', 0, 'hb41bp06z808kg4ccoc48c8ookggso0', 'BNoW9lUrUZTP57JauSkNaNn6VFYmvYbjKIgL8m5WoXkQychpyK7S4kXCoSFlGZQVUfHz/9b3LtoPsqkUBox3AQ==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'pp', 9, 'pp', '2013-03-14', 0, 'pp', NULL, 'pp', '2013-03-02 23:13:06', 0, NULL);
INSERT INTO `user` VALUES(9, 'pp', 'pp', 'pp@pp.fr', 'pp@pp.fr', 0, '5sex848wcmoswg08g4wco4ws48ggwck', 'jEb3BHjXPf8XaR+59a7yMRUlO4PZAY4tJAgxfP9CX/hd+NIJoyos4JiDMTngCKZZBNK5mbJPiQ1lSg4f1hmNOA==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'p', NULL, 'p', '2013-03-25', NULL, NULL, NULL, NULL, '2013-03-02 23:16:40', NULL, NULL);
INSERT INTO `user` VALUES(10, 'mm', 'mm', 'mm@mm.fr', 'mm@mm.fr', 0, '5rryv9rhukcg8okwgo08wkgw8s84k08', '9uZMUA8ZGBTN4AVttVbzmQLVzdJDRbQwx1Fd9qFUaYXqtpPmX1mBJZeYVORRxSx0IVaWKpibYOmBvRNB3GPWOg==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'm', NULL, 'm', '2013-03-12', NULL, NULL, NULL, NULL, '2013-03-02 23:18:54', 0, NULL);
INSERT INTO `user` VALUES(11, 'yyy', 'yyy', 'y@y.fr', 'y@y.fr', 0, 'lhf1219t05c0skck04k8kc4o88oo4ws', 'z87j5KbdJCW5JWJ+z8kZxJDjCdwiryBIUfMxH0x5f0udvcuGin4DWDkFTXKw6/95yApHefJs5LJCwtbqAIV9kg==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'yyy', NULL, 'yyy', '2013-03-11', NULL, NULL, NULL, NULL, '2013-03-02 23:21:17', 0, NULL);
INSERT INTO `user` VALUES(14, 'superadmin', 'superadmin', 'pp@pp.frd', 'pp@pp.frd', 0, 'gbo7tw6jxv4sgwcos4gw40gkc08c4ks', 'hLcfFoSXD3Zd1ZJQ0YCdiDgnSjibF5n1M/ZG9Df25wcbuPHWP+44+JEqM6OsCo+Ota81dsXhSIf7mTBmXPoMzQ==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'pp', NULL, 'pp', '2013-03-04', NULL, NULL, NULL, NULL, '2013-03-02 23:26:26', 0, NULL);
INSERT INTO `user` VALUES(15, 'bb', 'bb', 'bb@bb.fr', 'bb@bb.fr', 0, 'k46aheuoc5s8kw44ooc00k0koc4g08g', '4MdFyju0BoY2NKIwWb2AiZmDYdlOTWk0tDNH0Y1Mfj5oYie3eUf7ehGhwqsBSU3SLHAACKb1vkEUtV2Dnsw5fw==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'bb', NULL, 'bb', '2013-03-05', NULL, NULL, NULL, NULL, '2013-03-02 23:27:32', 0, NULL);
INSERT INTO `user` VALUES(16, 'nn', 'nn', 'nn@nn.h', 'nn@nn.h', 0, 'dkwf6ly2gnc48k4gg04gs8kcgsos0gw', 'NpNAY0sJKrojy2kkhrykEZVLChz6/KaUNQ2huSRqrBGy/QOdiKvaIXm+RRUJP/JlHgFt0ppvHVg1b3/Mf3F0AA==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'nn', NULL, 'nn', '2013-03-04', NULL, NULL, NULL, NULL, '2013-03-02 23:28:26', 0, NULL);
INSERT INTO `user` VALUES(18, 'bbbjbknkjnl', 'bbbjbknkjnl', 'mmmm@mm.frrr', 'mmmm@mm.frrr', 0, '38p4451479gk804wkg4w0g4k4wowks4', 'wfcmfL5CMACrXdYa2A87nHPBzoH3QhzDNC7yFY56rBS11Jc6vThGPjJB+MANBV+Ywfa9om56mIoUM/VPCwudLw==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'mm', NULL, 'mm', '2013-03-18', NULL, NULL, NULL, NULL, '2013-03-02 23:30:33', 0, NULL);
INSERT INTO `user` VALUES(19, 'jeje', 'jeje', 'ttt@ttt.freee', 'ttt@ttt.freee', 0, 'n72wntz8bkg80so8sks8048os4ssgwk', 'I3ABLNwUrIJDF7mufCInaN7ZfjWxkHChkbBVr7/4KmGZaBDPiRTH2xoo62RGFdwjiqWynisLH9c8H3cjFsOXgQ==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'tt', NULL, 'tt', '2013-03-12', NULL, NULL, NULL, NULL, '2013-03-02 23:39:16', 0, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Article`
--
ALTER TABLE `Article`
  ADD CONSTRAINT `FK_CD8737FABCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `Categorie` (`id`);

--
-- Contraintes pour la table `Membre`
--
ALTER TABLE `Membre`
  ADD CONSTRAINT `FK_F118FE1F4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `Domaine` (`id`);

--
-- Contraintes pour la table `Page`
--
ALTER TABLE `Page`
  ADD CONSTRAINT `FK_B438191E727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `Page` (`id`),
  ADD CONSTRAINT `FK_B438191EBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `Categorie` (`id`);

--
-- Contraintes pour la table `Publication`
--
ALTER TABLE `Publication`
  ADD CONSTRAINT `FK_29A0E8AE6A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6494272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `Domaine` (`id`);
