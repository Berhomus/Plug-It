-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 20 Juin 2013 à 15:00
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `plugit`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mdp_md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `mdp_md5`) VALUES
(1, 'moi', '70b783251225354e883a5bef3c011843');

-- --------------------------------------------------------

--
-- Structure de la table `references`
--

CREATE TABLE IF NOT EXISTS `references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `titre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sous_titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `references`
--

INSERT INTO `references` (`id`, `image`, `titre`, `lien`, `sous_titre`, `date`) VALUES
(1, 'image/ref_01_rollover.jpg', 'Maison de la Culture d''Amiens', 'http://www.maisondelaculture-amiens.com/www/', 'Infogérance Cloud Computing', '2013-06-20 14:15:39'),
(2, 'images/ref_02_rollover.jpg', 'Missions locales de Picardie', 'http://www.missions-locales-picardie.org/', 'Infogérance Cloud Computing', '2013-06-20 14:38:36'),
(3, 'images/ref_03_rollover.jpg', 'Conseil Régional de Picardie', 'http://www.picardie.fr/', 'Assistance nouvelles technologies', '2013-06-20 14:40:51'),
(4, 'images/ref_04_rollover.jpg', 'CHU d''Amiens', 'http://www.chu-amiens.fr/', 'Marché public', '2013-06-20 14:43:10'),
(5, 'images/ref_05_rollover.jpg', 'CCA International', 'http://www.ccainternational.com/', 'Missions d’audit et conseil NE15838', '2013-06-20 14:44:56'),
(6, 'ref_06_rollover.jpg', 'RICOH', 'http://www.ricoh.fr/', 'Missions d’audits techniques', '2013-06-20 14:47:39'),
(7, 'images/ref_07_rollover.jpg', 'Spta', 'http://www.spta.fr/', 'Infogérance Cloud Computing', '2013-06-20 14:49:36'),
(8, 'images/ref_08_rollover.jpg', 'Neuronnexion', 'http://www.neuronnexion.fr/', 'Partenaire historique', '2013-06-20 14:53:32'),
(9, 'images/ref_09.jpg', 'Croix Rouge', 'http://www.croix-rouge.fr/', 'Infogérance', '2013-06-20 14:54:44'),
(10, 'images/ref_10.jpg', 'Orchestre de Picardie', 'http://www.orchestredepicardie.fr/', 'Infogérance', '2013-06-20 14:55:42'),
(11, 'images/ref_11.jpg', 'Comédie de Picardie', 'http://www.comdepic.com/', 'Infogérance', '2013-06-20 14:56:42'),
(12, 'images/ref_12.jpg', 'La Ligue de l''Enseignement', 'http://www.fol80.net/', 'Infogérance Cloud Computing', '2013-06-20 14:57:31');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `corps` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`id`, `titre`, `corps`, `image`, `date`) VALUES
(2, 'Maintenance : Préventive, Curative & Evolutive', '<img src="images/fleche.png"/>\r\n<p><h2>Que vous ayez quelques ordinateurs ou un parc informatique comprenant des dizaines d’équipements IT, des routeurs,<br/> des passerelles, des serveurs, des sites distants, des agents itinérants, vous pouvez souscrire à l’une de nos<br/> solutions de maintenance informatique.</h2><br/>\r\nCombien de temps pouvez-vous tolérer un arrêt de production ?<br/> 1 heure, 4 heures, une journée ou plus ?\r\nSuivant votre besoin, nous pouvons vous proposer de l’intervention sur mesure au ticket horaire au contrat spécifique avec des garanties de temps d’intervention et<br/> des garanties de temps de rétablissement.<br/>\r\n<img src="images/fleche.png"/>\r\n<h2>Dans tous les cas, nous pouvons référencer 3 types de maintenance :</h2><br/>\r\n<b>- La maintenance informatique préventive</b> qui consiste à effectuer un nettoyage de vos ordinateurs, de mettre à jour les logiciels ou encore d''enlever les<br/> éventuels virus ou autres malwares. Pour cela, 2 interventions par an sont prévues.\r\n<b>- La maintenance informatique curative</b> qui comprend les interventions ponctuelles de dépannage. En cas de problème, vous êtes prioritaire sur le délai<br/> d''intervention.\r\n<b>- La maintenance informatique évolutive</b> qui permet d''améliorer le système par rapport à l''évolution des technologies. Cela peut être par exemple l''installation<br/> de nouveaux équipements ou la mise à jour de logiciels.<br/>\r\n<img src="images/fleche.png"/>\r\n<h2>Les avantages du contrat de maintenance informatique</h2><br/>\r\n- Vous êtes prioritaire par rapport aux clients qui n''ont pas souscrit de contrat.\r\n- Il couvre les interventions ponctuelles de dépannage.\r\n- Vous bénéficiez de tarifs préférentiels sur les interventions de maintenance informatique.</p>', 'images/services_maintenance.png', '2013-06-20 13:51:22');

-- --------------------------------------------------------

--
-- Structure de la table `solutions`
--

CREATE TABLE IF NOT EXISTS `solutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `corps` text COLLATE utf8_unicode_ci NOT NULL,
  `image_car` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_sol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `solutions`
--

INSERT INTO `solutions` (`id`, `titre`, `corps`, `image_car`, `image_sol`, `description`, `date`) VALUES
(1, 'WanaDesk', '<p>\r\n<img src="images/fleche.png"/><h2>Accéder à votre bureau virtuel depuis une simple connexion internet.</h2>\r\n<br/>\r\n<b>- Le Cloud vous permet d’utiliser vos applications depuis internet :</b><br/>\r\nDepuis n’importe quel périphérique connecté (PC, MAC, iPad, iPhone, etc.).<br/>\r\nPlus d’achat de logiciels : bureautique, gestion, antivirus, comptabilité.<br/>\r\nPlus de soucis de mises à jour.<br/>\r\n<br/>\r\n<b>- Accéder à vos données à tout moment et de n’importe où :</b><br/>\r\nDepuis votre bureau, en déplacement ou à domicile.<br/>\r\nPlus de soucis de sauvegarde, on s’en occupe pour vous.<br/>\r\n<br/>\r\n<b>- Vos données en toute sécurité :</b><br/>\r\nVous accédez à vos données cryptées via un portail sécurisé grâce à un login et un mot de passe personnel.<br/>\r\n<br/>\r\n<b>- Vos applications métiers installées sur votre ou vos serveurs virtuels dédiés.</b><br/>\r\n<br/>\r\n<b>- Un coût maîtrisé :</b><br/>\r\nVous n’achetez rien, vous souscrivez juste un abonnement mensuel au coût défini.<br/>\r\n<br/>\r\n<b>- Une démarche écologique :</b><br/>\r\nLe Cloud ne sollicite pas inutilement vos ressources informatiques et prolonge la durée de vie de votre matériel.<br/>\r\n<br/>\r\n<img src="images/fleche.png"/><h2>À partir de 1 utilisateur, stockage illimité et coût maîtrisé !</h2>\r\n</p>', 'images/titre_wanadesk.jpg', 'images/solutions_wanadesk.jpg', 'vous permet d’accéder à votre bureau virtuel <br/> depuis n’importe où* sur la planète !<br/> *connexion Internet requise', '2013-06-20 14:34:29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
