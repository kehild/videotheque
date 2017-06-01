-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 25 Mai 2017 à 12:25
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `videotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `anime`
--

DROP TABLE IF EXISTS `anime`;
CREATE TABLE IF NOT EXISTS `anime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `duree` varchar(25) DEFAULT NULL,
  `support` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `anime`
--

INSERT INTO `anime` (`id`, `nom`, `duree`, `support`) VALUES
(1, 'Aladdin', '1h31', 'PC'),
(2, 'Albator', '1h55', 'PC'),
(3, 'La Véritable Histoire Du Petit Chaperon Rouge', '1h20', 'PC'),
(4, 'L age de glace 2', '1h25', 'PC'),
(5, 'L Age de glace 3', '1h30', 'PC'),
(6, 'Le Roi Lion', '1h23', 'PC'),
(7, 'Le Roi Lion 2', '1h17', 'PC'),
(8, 'Les Indestructibles', '1h55', 'PC'),
(9, 'Madagascar', '1h25', 'PC'),
(10, 'Madagascar 2', '1h29', 'PC'),
(11, 'Astérix Chez les Bretons', '1h15', 'PC'),
(12, 'Astérix Et La suprise de César', '1h10', 'PC'),
(13, 'Astérix chez les Indiens', '1h20', 'PC'),
(14, 'Astérix et les Vikings', '1h15', 'PC'),
(15, 'Shrek', '1h28', 'PC'),
(16, 'Shrek 2', '1h32', 'PC'),
(17, 'Shrek 4', '1h29', 'PC'),
(18, 'Tintin Les Cigares du Pharaon', '0h42', 'PC'),
(19, 'Tintin et Le Lotus Bleu', '0h42', 'PC'),
(20, 'Tintin et L ile de Noire', '0h42', 'PC'),
(21, 'Tintin et le Sceptre d Ottokar', '0h42', 'PC'),
(22, 'Tintin et le crabe aux pinces d or', '0h42', 'PC'),
(23, 'Tiintin et le Secret de la Licorne', '0h42', 'PC'),
(24, 'Tintin Le Tresor de Rackham le Rouge', '0h42', 'PC'),
(25, 'Tintin l affaire tournesol et les picaros', '0h42', 'PC'),
(26, 'Tintin L oreille cassée - Les bijoux de la castafiore', '01h23', 'PC'),
(27, 'Tintin et l objectif lune', '0h42', 'PC'),
(28, 'Tintin et coke en stoke', '0h42', 'PC'),
(29, 'Tintin Les 7 boules de cristal Tintin et le temple du soleil', '1h22', 'PC'),
(30, 'Tintin Vol 714 pour sidney', '0h42', 'PC'),
(31, 'Aladdin et le retour de Jafar', '1h06', 'PC'),
(32, 'Aladdin et  le roi des voleurs', '1h18', 'PC'),
(33, 'Batman Red Hood', '2010', 'PC'),
(34, 'Aladdin', '1h31', 'DVD'),
(35, 'Le tour du monde en 80 jours', '50min', 'DVD'),
(36, 'Batman', '1h20', 'DVD'),
(37, 'La ferme se rebelle', '1h20', 'DVD'),
(38, 'Nemo', '1h28', 'DVD'),
(39, 'Le trésor des flibustiers', '1h10', 'DVD'),
(40, 'Le dernier des mohicans', '50min', 'DVD'),
(41, 'Peter Pan', '50min', 'DVD'),
(42, 'Black Beauty', '50min', 'DVD'),
(43, 'Les trois mousquetaires', '50min', 'DVD'),
(44, 'Astérix et Le gaulois', '1h30', 'DVD'),
(45, 'Les 12 travaux d Astérix', '1h30', 'DVD'),
(46, 'Astérix et Cléopatre', '1h30', 'DVD'),
(47, 'Les voyages au centre de la terre', '1h35', 'DVD'),
(48, 'Notre Dame de Paris', '50min', 'DVD'),
(49, 'Ivanhoé Le chevalier noir', '50min', 'DVD'),
(50, 'Gijoe', '46min', 'DVD'),
(51, 'Best Of Power Rangers', '2h31', 'DVD'),
(52, 'Zootopia', '1h48', 'PC'),
(53, 'La Reine des Neiges', '1h42', 'PC'),
(54, 'Ratatouille', '1h46', 'PC');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `annee` varchar(25) DEFAULT NULL,
  `duree` varchar(25) DEFAULT NULL,
  `support` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `film`
--

INSERT INTO `film` (`id`, `nom`, `auteur`, `annee`, `duree`, `support`) VALUES
(1, 'Ant-Man', 'Peyton Reed', '2015', '1h57', 'PC'),
(2, 'Jurassic World', 'Colin Trevorrow', '2015', '1h59', 'PC'),
(3, 'Die Hard', 'John McTiernan', '1988', '2h06', 'PC'),
(4, 'Die Hard 2', 'Renny Harlin', '1990', '1h58', 'PC'),
(5, 'Die Hard 3', 'John McTiernan', '1995', '2h02', 'PC'),
(6, 'Die Hard 4', 'Len Wiseman', '2007', '2h03', 'PC'),
(7, 'Fast and Furious', 'Rob Cohen', '2001', '01h42', 'PC'),
(8, 'Fast And Furious 2', 'John Singleton', '2003', '1h47', 'PC'),
(9, 'Fast And Furious 3 Tokyo Drift', 'Justin Lin', '2006', '1h44', 'PC'),
(10, 'Fast And Furious 4', 'Justin Lin', '2009', '2h04', 'PC'),
(11, 'Fast And Furious 5', 'Justin Lin', '2011', '2h10', 'PC'),
(12, 'Fast And Furious 6', 'Justin Lin', '2013', '2h19', 'PC'),
(13, 'Fast And Furious 7', 'James Wan', '2015', '1h47', 'PC'),
(14, 'Le Seigneurs de Anneaux 1', 'Peter Jackson', '2001', '3h', 'PC/DVD'),
(15, 'Le Seigneurs de Anneaux 2', 'Peter Jackson', '2002', '3h', 'PC/DVD'),
(16, 'Le Seigneurs de Anneaux 3', 'Peter Jackson', '2003', '3h25', 'PC'),
(17, 'Star Wars 1', 'George Lucas', '1999', '2h10', 'PC/DVD'),
(18, 'Star Wars 2', 'George Lucas', '2002', '2h12', 'PC/DVD'),
(19, 'Star Wars 3', 'George Lucas', '2005', '2h20', 'PC/DVD'),
(20, 'Star Wars 4', 'George Lucas', '1977', '2h', 'PC'),
(21, 'Star Wars 5', 'Irvin Kershner', '1980', '2h07', 'PC'),
(22, 'Star Wars 6', 'Richard Marquand', '1983', '2h05', 'PC'),
(23, 'Taxi', 'Luc Besson', '1998', '1h30', 'PC'),
(24, 'Taxi 2', 'Luc Besson', '2000', '1h30', 'PC'),
(25, 'Taxi 3', 'Luc Besson', '2003', '1h30', 'PC'),
(26, 'Taxi 4', 'Luc Besson', '2007', '1h30', 'PC'),
(27, 'Transformers', 'Michael Bay', '2007', '2h23', 'PC'),
(28, 'Transformers 2', 'Michael Bay', '2009', '2h20', 'PC'),
(29, 'Transformers 3', 'Michael Bay', '2011', '2h20', 'PC'),
(30, 'Saint Seiya Legend of Sanctuary', '', '2014', '1h32', 'PC'),
(31, '20 ans d ecart', 'David Moreau', '2013', '1h32', 'PC'),
(32, 'Astérix et Obélix Au service de sa majesté', 'Laurent Tirard', '2013', '1h32', 'PC'),
(33, 'Astérix et Obélix Mission Cléopatre', 'Alain Chabat', '2002', '1h43', 'PC'),
(34, 'Avengers Age of Ultron', 'Joss Weldon', '2015', '3h15', 'PC'),
(35, 'Avengers', 'Joss Weldon', '2012', '2h17', 'PC'),
(36, 'Batman Begins', 'Christopher Nolan', '2005', '2h14', 'PC'),
(37, 'Brice de Nice', 'James Huth', '2005', '1h36', 'PC'),
(38, 'Bruce tout puissant', 'Tom Shaydac', '2003', '1h40', 'PC'),
(39, 'Captain America Le Soldat d hiver', 'Anthony Russo', '2014', '2h15', 'PC'),
(40, 'Captain America', 'Joe Johnston', '2011', '2h04', 'PC'),
(41, 'Constantine', 'Francis Lawrence', '2h01', '1h54', 'PC'),
(42, 'Coup de foudre à Notting Hill', 'Roger Michell', '1999', '1h58', 'PC'),
(43, 'De rouille et d os', 'Jacques Audiard', '2012', '2h02', 'PC'),
(44, 'Demolition man', 'Marco Brambilla', '1993', '1h50', 'PC'),
(45, 'Entre le coeur et la raison', 'Ron Oliver', '2014', '1h22', 'PC'),
(46, 'Gi joe Le réveil du cobra', 'Stephen Sommers', '2009', '1h57', 'PC'),
(47, 'Girl Next Door', 'Luke Greenfield', '2004', '1h49', 'PC'),
(48, 'Harry Potter et Les reliques de la mort 1', 'David Yates', '2010', '2h25', 'PC'),
(49, 'Harry Potter et Les reliques de la mort 2', 'David Yates', '2011', '2h10', 'PC'),
(50, 'Il etait une fois a castlebury', 'Michael Damian', '2011', '1h30', 'PC'),
(51, 'Inception', 'Chrispoher Nolan', '2010', '2h22', 'PC'),
(52, 'Intouchables', 'Olivier Nakache', '2011', '1h47', 'PC'),
(54, 'Jour de tonnerre', 'Tony Scott', '1990', '1h42', 'PC'),
(55, 'Jurassic Park 1', 'Steven Spielberg', '1993', '2h01', 'PC'),
(56, 'Jurassic Park Le monde perdu', 'Steven Spielberg', '1997', '2h03', 'PC'),
(57, 'La doublure', 'Francis Veber', '2006', '1h22', 'PC'),
(58, 'La légende de zorro', 'Martin Campbell', '2005', '2h10', 'PC'),
(59, 'La momie', 'Stephen Sommers', '1999', '1h59', 'PC'),
(60, 'La momie 2', 'Stephen Sommers', '2001', '2h04', 'PC'),
(61, 'la mort vous va si bien', 'Robert Zemeckis', '1992', '1h39', 'PC'),
(62, 'La proposition', 'Anne Flecher', '2009', '1h47', 'PC'),
(63, 'la star de noel', 'John Bradshaw', '2013', '1h30', 'PC'),
(64, 'l agence tous risques', 'Joe Camahan', '2010', '1h53', 'PC'),
(65, 'le dernier maitre de lair', 'Night Shyalalan', '2010', '1h43', 'PC'),
(66, 'le diner de cons', 'Francis Veber', '1998', '1h16', 'PC'),
(67, 'Le geek Charmant', 'Jeffrey hornaday', '2011', '1h33', 'PC'),
(68, 'Le Labyrinthe', 'Wes Ball', '2014', '1h53', 'PC'),
(69, 'le masque de zorro', 'Martin Campbell', '1998', '2h10', 'PC'),
(70, 'le placard', 'Francis Veber', '2001', '1h22', 'PC'),
(71, 'les 4 fantastiques et le sufer d argent', 'Tim Story', '2007', '1h27', 'PC'),
(72, 'Les aristos', 'Charllotte de turckheim', '2006', '1h25', 'PC'),
(73, 'Les aventures de tintin et le secret de la licorne', 'Steven Spielberg', '2011', '1h42', 'PC'),
(74, 'Les daltons', 'Philippe Haim', '2004', '1h25', 'PC'),
(75, 'Les Gardiens de la Galaxie', 'James Gunn', '2014', '2h00', 'PC'),
(76, 'Les Schtroumpfs', 'Raja Gosnell', '2011', '1h38', 'PC'),
(77, 'Les sorcieres', 'Nicolas Roeg', '1990', '1h31', 'PC'),
(78, 'les sous doues passent le bacs', 'Claude Zidi', '1980', '1h27', 'PC'),
(79, 'Lucy', 'Luc Besson', '2014', '1h29', 'PC'),
(80, 'Man of Steel', 'Zack Snyker', '2013', '2h23', 'PC'),
(81, 'Matrix', 'Andy Wachowshi', '1999', '2h10', 'PC/CD'),
(82, 'Matrix 2', 'Andy Wachowshi', '2003', '2h10', 'PC/DVD'),
(83, 'Mauvais Esprit', 'Patrck Alessandrin', '2002', '1h30', 'PC'),
(84, 'Men in Black', 'Barry Sonnenfeld', '1997', '1h34', 'PC'),
(85, 'Men in black', 'Barry Sonnenfeld', '2002', '1h24', 'PC'),
(86, 'Men in Black 2', 'Barry Sonnenfeld', '2002', '1h24', 'PC'),
(87, 'Mon babysitter', 'Bart Freudilch', '2009', '1h30', 'PC'),
(88, 'Mortal Kombat', 'Paul Anderson', '1995', '1h34', 'PC'),
(89, 'Le monde de Narnia', 'Andrew Adamson', '2005', '2h23', 'PC'),
(90, 'Papy fait de la resistance', 'Jean Marie Poire', '1983', '1h46', 'PC'),
(91, 'Paul', 'Greg Mottola', '2011', '1h39', 'PC'),
(92, 'Percy Jackson La mer des monstre', 'Thor Freudenthal', '2013', '1h46', 'PC'),
(93, 'Percy Jackson Le voleur de foudre', 'Chris Columbus', '2010', '1h58', 'PC'),
(94, 'Pirates des Caraibes 2', 'Gore Verbinski', '2006', '2h14', 'PC'),
(95, 'Pirates des Caraibes', 'Gore Verbinski', '2007', '2h39', 'PC/DVD'),
(96, 'Priest', 'Scott Charles Stewart', '2011', '1h27', 'PC'),
(97, 'Prince of Persia', 'Mike Newell', '2010', '1h56', 'PC'),
(98, 'Promotion Canapé', 'Claude Zidi', '1990', '1h45', 'PC'),
(99, 'Seven', 'David Fincher', '1995', '2h06', 'PC'),
(100, 'Sex Friends', 'Ivan Reitman', '2011', '1h48', 'PC'),
(101, 'Shaolin Soccer', 'Stephen Chow', '2002', '1h53', 'PC'),
(102, 'Sister Act', 'Emile Ardolino', '1992', '1h40', 'PC'),
(103, 'Sister Act 2', 'Miles Goodman', '1993', '1h42', 'PC'),
(104, 'Sos Fantomes', 'Ivan Reitman', '1984', '1h40', 'PC'),
(105, 'Star Trek', 'J. J. Abrams', '2009', '2h01', 'PC'),
(106, 'Sucker Punch', 'Zack Snyder', '2011', '1h50', 'PC'),
(107, 'Terminator 4', 'McG', '2009', '1h50', 'PC'),
(108, 'Terminator Genesis', 'Alan Taylor', '2015', '2h06', 'PC'),
(109, 'The Amazing Spiderman 2', 'Marc Webb', '2014', '2h21', 'PC'),
(110, 'The Amazing Spider Man', 'Marc Webb', '2012', '2h11', 'PC'),
(111, 'The Da Vinci Code', 'Ron Howard', '2006', '2h27', 'PC'),
(112, 'The Faculty', 'Robert Rodriguez', '1999', '1h37', 'PC'),
(113, 'The Forgotten', 'Joseph Ruben', '2004', '1h44', 'PC'),
(114, 'The Mask', 'Chuck Russell', '1994', '1h37', 'PC'),
(115, 'Tron l héritage', 'Joseph Kosinski', '2011', '2h05', 'PC'),
(116, 'Trop Belle !', 'Jim Field Smith', '2010', '1h44', 'PC'),
(117, 'Trop Jeune Pour Elle', 'Amy Heckerling', '2007', '1h37', 'PC'),
(118, 'Un Bonheur N arrive jamais seul', 'James Huth', '2012', '1h50', 'PC'),
(119, 'Very Bad Trip', 'Todd Phillips', '2009', '1h38', 'PC'),
(120, 'X-Men Origins Wolverine', 'Gavin Hood', '2009', '1h43', 'PC'),
(121, 'Iron man', 'Jon Farveau', '2008', '2h06', 'DVD'),
(122, 'Antitrust', '', '2001', '1h44', 'DVD'),
(123, 'Spiderman', 'David Koepp', '2002', '2h01', 'DVD'),
(124, 'Spiderman 2', 'Sami Raimi', '2004', '2h02', 'DVD'),
(125, 'Spiderman 3', 'Sam Raimi', '2007', '2h13', ''),
(126, 'X Men', 'Bryan Singer', '2000', '1h40', 'DVD'),
(127, 'X Men 2', 'Bryan Singer', '2003', '2h14', 'DVD'),
(129, 'Neuilly Sa Mère', 'Gabriel Julien Laferrière', '2009', '1h32', 'DVD'),
(130, 'Le monde de narnia 2', 'Andrew Adamson', '2008', '2h23', 'DVD'),
(131, 'Eragon', 'Stefen Fangmeier', '206', '1h39', 'DVD'),
(132, 'Minority report', 'Steven Spielberg', '2002', '2h26', 'DVD'),
(133, 'Frankenstien general hospital', 'Deboran roberts', '1988', '1h27', 'DVD'),
(134, 'Scooby doo', 'Raja Gosnell', '2002', '1h26', 'DVD'),
(135, 'Anges Démon', 'Ron Howard', '2009', '2h20', 'DVD'),
(136, 'Underworld', 'Len Wiseman', '2003', '2h21', 'DVD'),
(137, 'Underworld 2', 'Len Wiseman', '2006', '1h40', 'DVD'),
(138, 'Batman The Dark Knight', 'Christopher Nolan', '2009', '2h30', 'DVD'),
(139, 'Terminator 2', 'Maro Kassar', '1991', '2h11', 'DVD'),
(140, 'Terminator 3', 'Jonathan Mostow', '2003', '1h49', 'DVD'),
(141, 'Harry Potter', 'Chris Columbus', '2001', '2h20', 'DVD'),
(142, 'Harry Potter 2', 'Chris Columbus', '2002', '2h30', 'DVD'),
(143, 'Harry Potter 3', 'Alfonso Cuarón', '2004', '1h15', 'DVD'),
(144, 'Harry Potter 4', 'Mike Newell', '2005', '2h30', 'DVD'),
(145, 'Harry Potter 5', 'David Yates', '2007', '2h13', 'DVD'),
(146, 'Harry Potter 6', 'David Yates', '2009', '2h34', ''),
(147, 'Ocean Eleven', 'Steven Soberbergh', '2001', '1h52', 'DVD'),
(148, 'Garfield 2', 'Tim Hill', '2006', '1h22', 'DVD'),
(149, 'Le séminaire', 'Charles Nemes', '2008', '1h30', 'DVD'),
(150, 'Retour Vers le futur', 'Robert Zemeckis', '1985', '1h50', 'DVD'),
(151, 'Retour Vers le futur 2', 'Robert Zemeckis', '1989', '1h50', 'DVD'),
(152, 'Retour Vers le futur 3', 'Robert Zemeckis', '1990', '1h50', 'DVD'),
(153, 'Le jour d apres', 'Roland Emmerich', '2004', '2h04', 'DVD'),
(154, 'Matrix 3', 'Andy Wachowski', '2003', '2h08', 'DVD'),
(155, 'Termniator', 'James Cameron', '1985', '1h40', 'DVD'),
(156, 'Charlie et Chocolaterie', 'Tim Burton', '2005', '1h56', 'DVD'),
(157, 'Sleepy Hollow', 'Tim Burton', '1999', '1h50', 'CD'),
(158, 'Le Choix du coeur', 'Dave Alan Johnson', '2015', '1h23', 'PC'),
(159, 'Star Wars 7', 'J. J. Abrams', '2015', '2h18', 'PC'),
(160, 'Deadpool', 'Tim Miller', '2016', '1h50', 'PC'),
(161, 'Les Mythos', '', '2011', '1h25', 'PC'),
(162, 'Sexy Dance 2', 'Jon M Chu', '2008', '1h38', 'PC'),
(163, 'Sexy Dance 3', 'Jon M Chu', '2010', '1h48', 'PC'),
(164, 'Sexy Dance 4', 'Scott Speer', '2012', '1h39', 'PC'),
(165, 'Le Missionnaire', 'Roger Delattre', '2009', '1h25', 'PC'),
(166, 'Docteur Strange', 'Scott Derrikson', '2016', '1h54', 'PC'),
(167, 'Assassin Creed', 'Justin Kurzel', '2016', '1h55', 'PC'),
(168, 'Princesse malgré elle 2', 'Garry Marshall', '2004', '1h53', 'PC'),
(169, 'Adaline', 'Lee Toland Krieger ', '2015', '1h53', 'PC'),
(170, 'Avant toi', 'Thea Sharrock', '2016', '1h50', 'PC'),
(171, 'Blue Crush', 'John Stockwell', '2003', '1h46', 'PC'),
(172, 'Escapade princière', 'James Head', '2015', '1h50', 'PC'),
(173, 'Safe Haven', 'Lasse Hallström', '2013', '1h55', 'PC'),
(174, 'Terrain D Entente', ' Bobby Farrelly, Peter Farrelly', '2005', '1h38', 'PC'),
(175, 'Un Coach pour mon bébé', 'Christie Will', '2014', '1h40', 'PC'),
(176, 'Une Couronne pour Noël', 'Alex Zamm', '2017', '1h26', 'PC'),
(177, 'Une Drole D Histoire', 'Ryan Fleck, Anna Boden', '2012', '1h41', 'PC'),
(178, 'Une Star pour Noel', 'Michael Feifer', '2012', '1h28', 'PC');

-- --------------------------------------------------------

--
-- Structure de la table `manga`
--

DROP TABLE IF EXISTS `manga`;
CREATE TABLE IF NOT EXISTS `manga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `episode` varchar(25) DEFAULT NULL,
  `saison` varchar(25) DEFAULT NULL,
  `annee` varchar(25) DEFAULT NULL,
  `duree` varchar(25) DEFAULT NULL,
  `support` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `manga`
--

INSERT INTO `manga` (`id`, `nom`, `episode`, `saison`, `annee`, `duree`, `support`) VALUES
(1, 'Black Lagoon', '29', '3', '2006', '25min', 'PC'),
(3, 'Olive et Tom', '16', '1', '2001', '20min', 'PC'),
(4, 'XxxHolic', '41', '3', '2008', '25min', 'PC'),
(5, 'WitchCraft Works', '13', '1', '2014', '25min', 'PC'),
(6, 'Uragiri wa Boku no Namae o Shitteiru', '24', '1', '2010', '25min', 'PC'),
(7, 'Unbeakable Machine Doll', '12', '1', '2013', '25min', 'PC'),
(8, 'Tasogare Otome x Amnesia', '13', '1', '2012', '25min', 'PC'),
(9, 'Sword Art Online', '49', '2', '2012', '25min', 'PC'),
(10, 'Shinrei Tantei Yakumo', '13', '1', '2012', '25min', 'PC'),
(11, 'Shinkyoku Soukai Polyphonica', '26', '2', '2006', '25min', 'PC'),
(12, 'Shingetsutan Tsukihime', '12', '1', '2003', '25min', 'PC'),
(13, 'Sekirei', '27', '2', '2006', '25min', 'PC'),
(14, 'Sakurasou no Pet na Kanojo', '24', '1', '2013', '25min', 'PC'),
(15, 'Saint Seiya', '152', '6', '1982', '25min', 'PC'),
(16, 'Rental Magica', '24', '1', '2007', '25min', 'PC'),
(17, 'Onegai Teacher', '13', '1', '2002', '25min', 'PC'),
(18, 'Omamori Himari', '12', '1', '2010', '25min', 'PC'),
(19, 'Oda Nobuna no Yabou', '12', '1', '2013', '25min', 'PC'),
(20, 'Nogizaka no Himitsu', '28', '3', '2008', '25min', 'PC'),
(21, 'Naruto Shippuden', '334', '22', '2007', '25min', 'PC'),
(22, 'Naruto', '138', '1', '2002', '25min', 'PC'),
(23, 'Monster Musume no Iru Nichijou', '12', '1', '2015', '25min', 'PC'),
(24, 'Mamoru-kun ni Megami no Shukufuku wo', '24', '1', '2008', '25min', 'PC'),
(25, 'Madan no O to Vanadis', '13', '1', '2014', '25min', 'PC'),
(26, 'Kiss x Sis', '24', '2', '2005', '25min', 'PC'),
(27, 'Kimi ga Aruji de Shitsugi ga Ore de', '13', '1', '2013', '25min', 'PC'),
(28, 'Kanokon', '12', '1', '2009', '25min', 'PC'),
(29, 'Infinite Stratos', '27', '2', '2011', '25min', 'PC'),
(30, 'HighSchool DxD', '38', '3', '2012', '25min', 'PC'),
(31, 'HighSchool of The Dead', '13', '1', '2010', '25min', 'PC'),
(32, 'Hanaukyo Maid tai', '15', '1', '2001', '15min', 'PC'),
(33, 'Golden Time', '24', '1', '2010', '25min', 'PC'),
(34, 'Full Metal Panic', '38', '2', '2002', '25min', 'PC'),
(35, 'Full Metal Alchemist', '53', '1', '2001', '25min', 'PC'),
(36, 'Dungeon ni Deai o Motomeru no wa Machigatte Iru Darouka', '14', '1', '2014', '25min', 'PC'),
(37, 'Campione!', '13', '1', '2013', '25min', 'PC'),
(38, 'Bokura wa Minna Kawaisou', '13', '1', '2013', '25min', 'PC'),
(39, 'Amagami ss', '22', '3', '2010', '25min', 'PC'),
(40, 'Ai Yori Aoshi', '36', '2', '2002', '25min', 'PC'),
(41, 'Absolute Duo', '12', '1', '2014', '25min', 'PC'),
(42, 'Dragon Ball Z Le retour de broly', '1', 'Film', '1994', '48min', 'PC'),
(43, 'Dragon Ball Z L attaque du dragon', '1', 'Film', '1995', '48min', 'PC'),
(44, 'Dragon Ball Z Fusion', '1', 'Film', '1995', '46min', 'PC'),
(45, 'Dragon Ball Z Le résurrection de Freezer', '1', 'Film', '2015', '1h33', 'PC'),
(46, 'Dragon Ball Z Bio Broly', '1', 'Film', '1994', '44min', 'PC'),
(47, 'Dragon Ball Z Battle of Gods', '1', 'Film', '2014', '1h25', 'PC'),
(48, 'Rakudai Kishi no Cavalry', '12', '1', '2015', '25min', 'PC'),
(49, 'Sakurako-san no Ashimoto', '12', '1', '2015', '25min', 'PC'),
(50, 'Dragon Ball Super', '82', '5', '2015', '25min', 'PC'),
(51, 'Naruto La mort de naruto', '1', 'Film', '2007', '1h35', 'PC'),
(52, 'Naruto La tour perdue', '1', 'Film', '2010', '1h25', 'PC'),
(54, 'Naruto les liens', '54', '4', '2008', '1h30', 'PC'),
(55, 'Naruto Prison Sanglante', '1', 'Film', '2011', '1h34', 'PC'),
(56, 'Naruto Road Ninja', '1', 'Film', '2013', '1h50', 'PC'),
(57, 'Naruto The Last Movie', '1', 'Film', '2014', '1h50', 'PC'),
(60, 'Evangelion', '26', '1', '1995', '25min', 'DVD'),
(61, 'Saint Seiya', '24', '1', '2008', '20min', 'DVD'),
(62, 'Baby Steps', '50', '2', '2014', '25min', 'PC'),
(63, 'D Gray Man', '116', '3', '2006', '25min', 'PC'),
(64, 'Kuroko no Basket', '78', '3', '2013', '25min', 'PC'),
(65, 'Hundred', '12', '1', '2016', '25min', 'PC'),
(66, 'One Piece', '680', '17', '1999', '25min', 'PC'),
(67, 'Majikoi', '12', '1', '2011', '25min', 'PC'),
(68, 'Amaama to Inazuma', '12', '1', '2016', '25min', 'PC'),
(69, 'Orange', '13', '1', '2016', '25min', 'PC'),
(70, 'Days', '24', '1', '2016', '25min', 'PC'),
(71, 'Onne chan ga Kita', '12', '1', '2016', '3min', 'PC'),
(72, 'Princess lover', '12', '1', '2009', '25min', 'PC'),
(73, 'Strike Blood', '24', '1', '2014', '25min', 'PC'),
(74, 'Tactical road', '13', '1', '2006', '25min', 'PC'),
(75, 'Tales of Zestiria the x', '25', '2', '2016', '25min', 'PC'),
(76, 'Seiren', '12', '1', '2017', '25min', 'PC'),
(77, '3 Gatsu no lion', '22', '1', '2017', '25min', 'PC'),
(78, 'Kuzu no Honkai', '12', '1', '2017', '25min', 'PC'),
(79, 'Kono Subaraschi', '11', '1', '2016', '25min', 'PC');

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `episode` varchar(25) DEFAULT NULL,
  `saison` varchar(255) DEFAULT NULL,
  `duree` varchar(25) DEFAULT NULL,
  `annee` varchar(25) DEFAULT NULL,
  `support` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `series`
--

INSERT INTO `series` (`id`, `nom`, `episode`, `saison`, `duree`, `annee`, `support`) VALUES
(1, 'Marvel Jessica Jones', '13', '1', '52min', '2015', 'PC'),
(2, 'Arrow', '46', '2', '25min', '2012', 'PC'),
(3, 'Charmed', '74', '4', '40min', '1998', 'PC'),
(4, 'Dardedevil', '26', '2', '52min', '2014', 'PC'),
(5, 'Dexter', '72', '6', '52min', '2006', 'PC'),
(6, 'Fringe (vostfr)', '43', '2', '42min', '2008', 'PC'),
(7, 'Games Of Thrones', '60', '6', '60min', '2010', 'PC'),
(8, 'Kaamelott', '33', '2', '5min', '2005', 'PC'),
(9, 'Prison Break', '81', '4', '40min', '2005', 'PC'),
(10, 'The Big Bang Theory (vf)', '183', '8', '25min', '2006', 'PC'),
(11, 'The Big Bang Theory (vostfr)', '239', '10', '25min', '2006', 'PC'),
(12, 'The Flash', '55', '3', '25min', '2014', 'PC'),
(13, 'True Blood', '48', '4', '42min', '2008', 'PC'),
(14, 'X-Files ', '208', '10', '43min', '1991', 'DVD/PC'),
(16, 'Avatar', '61', '3', '25min', '2005', 'PC'),
(17, 'Aladdin', '86', '1', '25min', '1994', 'PC'),
(18, 'Star Wars Rebels', '55', '3', '25min', '2014', 'PC'),
(19, 'Superman', '54', '3', '21min', '1996', 'PC'),
(20, 'Batman', '84', '1', '20min', '1992', 'PC'),
(21, 'Batman les nouvelles aventures', '23', '1', '22min', '1996', 'PC'),
(22, 'Batman le Relève', '43', '3', '22min', '1998', 'PC'),
(24, 'Angel', '44', '2', '42min', '1999', 'DVD'),
(25, 'Prison Break', '13', '1', '45min', '2008', 'DVD'),
(26, 'Robocop', '2', '1', '42min', '1993', 'DVD'),
(27, 'Supergirl', '40', '2', '25min', '2015', 'PC'),
(28, 'Spiderman', '65', '5', '21min', '1994', 'PC'),
(29, 'Friends', '236', '10', '25min', '1994', 'PC'),
(30, 'Versailles', '20', '2', '52min', '2015', 'PC'),
(31, 'Love', '10', '1', '30min', '2016', 'PC'),
(32, 'Orange is the new black', '52', '4', '60min', '2012', 'PC'),
(33, 'Once upon a time', '112', '6', '40min', '2011', 'PC'),
(34, 'Marvel Luke Cage', '13', '1', '60min', '2016', 'PC'),
(35, 'Downton Abbey', '28', '3', '60min', '2011', 'PC'),
(36, 'How I met Your Mother', '208', '9', '22min', '2005', 'PC');

-- --------------------------------------------------------

--
-- Structure de la table `spectacle`
--

DROP TABLE IF EXISTS `spectacle`;
CREATE TABLE IF NOT EXISTS `spectacle` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `annee` varchar(25) DEFAULT NULL,
  `support` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `spectacle`
--

INSERT INTO `spectacle` (`id`, `nom`, `auteur`, `annee`, `support`) VALUES
(1, 'Les 20 ans des Guignols', 'Les Guignols', '2009', 'PC'),
(2, 'Anne Rougemanoff', 'Anne Roumanoff', '2013', 'PC'),
(3, 'Carte Blanche à Anne Roumanoff', 'Anne Roumanoff', '2011', 'PC'),
(4, 'Papa Haut', 'Gad Elmaleh', '2008', 'PC'),
(5, 'Ils S''aiment', 'Michèle Laroque & Pierre Palmade', '1996', 'PC'),
(6, 'Ils se sont aimés', 'Michèle Laroque & Pierre Palmade', '2001', 'PC'),
(7, 'Roland Magdane craque', 'Roland Magdane', '2006', 'PC'),
(8, 'Roland Magdane Rire', 'Roland Magdane', '2014', 'PC'),
(9, 'Le gros n''avion', 'Mimie Mathy, Isabelle de Botton, Michèle Bernier', '1991', 'PC'),
(10, 'Gilles Détroit DVD', 'Gilles Détroit', '2003', 'DVD'),
(11, 'Les Guignols 2002-2003', 'Les Guignols', '2002-2003', 'PC'),
(12, 'Les Guignols 2003-2004', 'Les Guignols', '2003-2004', 'PC'),
(13, 'Les Guignols 2005-2006', 'Les Guignols', '2005-2006', 'PC'),
(14, 'Les 15 ans des Guignols Partie 1', 'Les Guignols', '2003', 'PC'),
(15, 'Les 15 ans des Guignols Partie 2', 'Les Guignols', '2003', 'PC'),
(16, 'Kavanagh', 'Kavanagh', '1995', 'PC'),
(17, 'La rentré des sketches', 'Chevalier Laspales', '2006', 'DVD'),
(18, 'Les Bodins Grandeur Nature', 'Les Bodins', '2014', 'PC'),
(19, 'Les bodins retour au pays', 'les bodins', '2012', 'PC');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
