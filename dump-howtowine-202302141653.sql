-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: howtowine
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aborder`
--

DROP TABLE IF EXISTS `aborder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aborder` (
  `id_question` int(11) NOT NULL,
  `id_viticulture` int(11) NOT NULL,
  `id_elevage` int(11) NOT NULL,
  `id_vinification` int(11) NOT NULL,
  KEY `aborder_FK` (`id_question`),
  KEY `aborder_FK_1` (`id_vinification`),
  KEY `aborder_FK_2` (`id_elevage`),
  KEY `aborder_FK_3` (`id_viticulture`),
  CONSTRAINT `aborder_FK` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`),
  CONSTRAINT `aborder_FK_1` FOREIGN KEY (`id_vinification`) REFERENCES `vinification` (`id`),
  CONSTRAINT `aborder_FK_2` FOREIGN KEY (`id_elevage`) REFERENCES `elevage` (`id`),
  CONSTRAINT `aborder_FK_3` FOREIGN KEY (`id_viticulture`) REFERENCES `viticulture` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aborder`
--

LOCK TABLES `aborder` WRITE;
/*!40000 ALTER TABLE `aborder` DISABLE KEYS */;
/*!40000 ALTER TABLE `aborder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `associer`
--

DROP TABLE IF EXISTS `associer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `associer` (
  `id_question` int(11) NOT NULL,
  `id_reponses` int(11) NOT NULL,
  KEY `associer_FK` (`id_reponses`),
  KEY `associer_FK_1` (`id_question`),
  CONSTRAINT `associer_FK` FOREIGN KEY (`id_reponses`) REFERENCES `reponses` (`id`),
  CONSTRAINT `associer_FK_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associer`
--

LOCK TABLES `associer` WRITE;
/*!40000 ALTER TABLE `associer` DISABLE KEYS */;
/*!40000 ALTER TABLE `associer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `associer_couleur`
--

DROP TABLE IF EXISTS `associer_couleur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `associer_couleur` (
  `id_chapitre` int(11) NOT NULL,
  `id_couleur` int(11) NOT NULL,
  KEY `associer_couleur_FK` (`id_chapitre`),
  KEY `associer_couleur_FK_1` (`id_couleur`),
  CONSTRAINT `associer_couleur_FK` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id`),
  CONSTRAINT `associer_couleur_FK_1` FOREIGN KEY (`id_couleur`) REFERENCES `couleur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associer_couleur`
--

LOCK TABLES `associer_couleur` WRITE;
/*!40000 ALTER TABLE `associer_couleur` DISABLE KEYS */;
INSERT INTO `associer_couleur` VALUES (9,1),(10,1),(11,1),(12,1),(13,1);
/*!40000 ALTER TABLE `associer_couleur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cepage`
--

DROP TABLE IF EXISTS `cepage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `origine` varchar(1000) DEFAULT NULL,
  `typicite` varchar(300) DEFAULT NULL,
  `id_couleur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cepage_FK` (`id_couleur`),
  CONSTRAINT `cepage_FK` FOREIGN KEY (`id_couleur`) REFERENCES `couleur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cepage`
--

LOCK TABLES `cepage` WRITE;
/*!40000 ALTER TABLE `cepage` DISABLE KEYS */;
INSERT INTO `cepage` VALUES (1,'Merlot','Pourrait provenir du Libournais (France) selon les traces les plus anciennes.','Il donne de la souplesse, de la rondeur et de la générosité au vin, qui devient plus charnu et fruité.',1),(2,'Cabernet Sauvignon',NULL,'Il apporte la structure tannique et le bouquet aromatiques.',1),(3,'Cabernet Franc',NULL,'Donne des vins riches en tannins, fins et aromatiques. ',1),(4,'Carménère',NULL,NULL,1),(5,'Malbec',NULL,NULL,1),(6,'Côt',NULL,NULL,1),(7,'Petit Verdot',NULL,NULL,1),(8,'Sauvignon',NULL,NULL,2),(9,'Sémillon',NULL,NULL,2),(10,'Muscadelle',NULL,NULL,2),(11,'Ugni blanc',NULL,NULL,2),(12,'Colombard',NULL,NULL,2);
/*!40000 ALTER TABLE `cepage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chapitre`
--

DROP TABLE IF EXISTS `chapitre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chapitre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_chapitre` varchar(100) NOT NULL,
  `contenu` longtext NOT NULL,
  `id_lecon` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `chapitre_FK` (`id_lecon`),
  KEY `chapitre_FK_1` (`id_theme`),
  KEY `chapitre_FK_2` (`id_niveau`),
  CONSTRAINT `chapitre_FK` FOREIGN KEY (`id_lecon`) REFERENCES `lecon` (`id`),
  CONSTRAINT `chapitre_FK_1` FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id`),
  CONSTRAINT `chapitre_FK_2` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapitre`
--

LOCK TABLES `chapitre` WRITE;
/*!40000 ALTER TABLE `chapitre` DISABLE KEYS */;
INSERT INTO `chapitre` VALUES (1,'<h1>Qu\'est-ce que le vin ?</h1>','<p>Le vin est le produit de la transformation du jus de raisin en alcool. Des organismes microscopiques appelées levures vont venir dégrader les sucres contenu dans le jus en alcool, on parle alors de fermentation alcoolique.</p><br><p>Bien entendu, une multitude d\'étapes et de facteurs vont venir modifier ou altérer l\'élaboration du vin pour permettre aux producteurs de faire un vin qui correspondra à l\'identité d\'une marque, d\'une appellation et surtout d\'un terroir.</p>',1,1,1),(9,'<h2>Les vendanges</h2>','<p>La récolte du raisin est une étape crucial pour tout producteur. Une des valeurs les plus précieuses est le niveau de maturité. En effet, la maturité du raisin va déterminer en parti le style de vin visé. La maturité peut être suivi à l\'aide de prélèvement de baies et diverses analyses effectué le plus souvent en laboratoire œnologique. Le facteur météo est aussi un élément clé pour éviter des dégradations de la vendange.</p><br><p>Le schéma suivant donne une idée du moment de la récolte dans le temps selon le style de vin :</p><img src=\"public/img/evolution_maturite.png\" alt=\"schéma du style de vin selon la maturité\"><p>Bien, maintenant que le niveau de maturité souhaité est atteint, il faut acheminer la récolte au chai ou le raisin pourra être vinifié.</p>',1,1,1),(10,'<h2>L\'encuvage</h2>','<p>Avant toute chose, le raisin va subir des opérations pour permettre plus tard de mieux le travailler. Le tri, directement à la vigne et parfois au chai, le raisin va être mis en œuvre une voir plusieurs fois. Le but étant d\'écarter tout corps étrangers(feuilles, bois de vigne etc...), baies rosé(qui manque de maturité) ou encore pourries.</p><br><span>plusieurs exemple de tri :<span><br><ul><li>- manuel</li><li>- mécanique</li> <li>- optique</li></ul><p>L\'éraflage qui consiste à séprarer les rafles des baies n\'est pas obligatoire mais très souvent employé pour éviter tout côté herbacé dans le produit final.</p><p>Le foulage anciennement fait avec les pieds est aujourd\'hui mécanisé la pluspart du temps. Cette action permet d\'écraser le raisin pour qu\'il puisse libérer tout ces composés et donc améliorer l\'extraction par la suite.</p><p>Le sulfitage non obligatoire également. Juste avant l\'encuvage, le sulfitage de la vendange permet toutefois d\'avoir un meilleur contrôle sur le démarrage des fermentations à ce stade.</p>',1,1,1),(11,'<h2>La vinification</h2>','<p>Les vinification démarre par la fermentation alcoolique par le biais des levures. Une des pratique consiste à faire ce que l\'on appelle \"un pied de cuve\", on laisse les levures dites \"indigènes\" présentent sur la pellicule du raisin  ou bien par ensemencement de levure sèche active(LSA).</p><p>L\'ensemencement est une méthode plus onéreuse mais présente toutefois l\'avantage de sélectionner l\'espèce de levure qui va coloniser le milieu.Ces levures avec des propriétés bien spécifique pourront si les conditions sont réunis mener à bien la fermentation.</p><p>En rouge, une deuxième fermentation sera effectué, la fermentation malolactique. Elle permet d\'adoucir les vins rouge.Une fois les fermentations terminés, nous pouvons alors parler de vin à cette étape de l\'élaboration.',1,1,1),(12,'<h2>Les écoulages</h2>','<p>Une fois les vinifications terminés, le vin va être séparé de la parti solide(pellicules et pépins majoritairement). On écoule alors le liquide que l\'on appelle vin de goutte dans un nouveau contenant. En rouge on presse le marc(parti solide) pour extraire les jus encore prisonnier à l\'intérieur. Ces jus présentent un intérêt non négligeable puisqu\'il sont en général très concentrés et peuvent donc plus tard être assemblé au vin de goutte. ',1,1,1),(13,'<h2>L\'élevage</h2>','<p>L\'élevage est la dernière ligne droite avant la mise en bouteille. Le temps d\'élevage varie en fonction du type/style de vin allant de quelque mois à plus d\'un an. Pendant cette période les vins vont être clarifié et stabilisé via diverses méthode.</p><br><p>Le soutirage consiste à séparer le vin clair des lies qui ont déposer au fond du contenant. Cet action est réalisé plusieurs fois afin d\'éliminer les impuretés mais aussi les micro-organismes qui pourrait venir attaquer le vin.</p><br><p>Vers la fin de l\'élevage, les vins vont être \"coller\". Le collage est une action qui consiste à incorporé le plus souvent de l\'albumine(blanc d’œuf) pour faire précipité les cristaux de tartre. De nos jour l’exigence du consommateur pousse les producteurs à rendre le produit final le plus présentable possible. Les dépôts que l\'on peut rencontrer dans la bouteille bien qu\'inoffensif sont donc en parti évité par ces méthodes.</p>',1,1,1);
/*!40000 ALTER TABLE `chapitre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clones`
--

DROP TABLE IF EXISTS `clones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(20) NOT NULL,
  `annee_agrement` varchar(4) NOT NULL,
  `origine` varchar(100) NOT NULL,
  `id_cepage` int(11) DEFAULT NULL,
  `id_organisme_vin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clones_FK` (`id_cepage`),
  KEY `clones_FK_1` (`id_organisme_vin`),
  CONSTRAINT `clones_FK` FOREIGN KEY (`id_cepage`) REFERENCES `cepage` (`id`),
  CONSTRAINT `clones_FK_1` FOREIGN KEY (`id_organisme_vin`) REFERENCES `organisme_vin` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clones`
--

LOCK TABLES `clones` WRITE;
/*!40000 ALTER TABLE `clones` DISABLE KEYS */;
INSERT INTO `clones` VALUES (1,'181','1973','Gironde',1,1),(2,'182','1973','Gironde',1,1),(3,'184','1973','Gironde',1,1),(4,'314','1973','Gironde',1,1),(5,'342','1975','Gironde',1,1),(6,'1125','2009','Gironde',2,4),(7,'1124','2009','Gironde',2,4),(8,'685','1980','Pyrénées-Atlantiques',2,5),(9,'412','1976','Gironde',2,5),(10,'411','1976','Gironde',2,5),(11,'410','1976','Gironde',2,5),(12,'341','1975','Gironde',2,1),(13,'338','1975','Gironde',2,1),(14,'337','1975','Gironde',2,1),(15,'269','1973','Gironde',2,5),(16,'267','1973','Gironde',2,5),(17,'219','1973','Val-de-Loire',2,5),(19,'218','1973','Gironde',2,5),(20,'217','1973','Val-de-Loire',2,5),(21,'216','1973','Val-de-Loire',2,5),(22,'191','1973','Gironde',2,1),(23,'170','1972','Val-de-Loire',2,5),(24,'169','1972','Gironde',2,5),(25,'15','1971','Gironde',2,5);
/*!40000 ALTER TABLE `clones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `composer`
--

DROP TABLE IF EXISTS `composer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `composer` (
  `id_questionnaire` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  KEY `composer_FK` (`id_questionnaire`),
  KEY `composer_FK_1` (`id_question`),
  CONSTRAINT `composer_FK` FOREIGN KEY (`id_questionnaire`) REFERENCES `questionnaire` (`id`),
  CONSTRAINT `composer_FK_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `composer`
--

LOCK TABLES `composer` WRITE;
/*!40000 ALTER TABLE `composer` DISABLE KEYS */;
/*!40000 ALTER TABLE `composer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulter`
--

DROP TABLE IF EXISTS `consulter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consulter` (
  `id_lecon` int(11) DEFAULT NULL,
  `id_personne` int(11) DEFAULT NULL,
  KEY `consulter_FK` (`id_personne`),
  KEY `consulter_FK_1` (`id_lecon`),
  CONSTRAINT `consulter_FK` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id`),
  CONSTRAINT `consulter_FK_1` FOREIGN KEY (`id_lecon`) REFERENCES `lecon` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulter`
--

LOCK TABLES `consulter` WRITE;
/*!40000 ALTER TABLE `consulter` DISABLE KEYS */;
/*!40000 ALTER TABLE `consulter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenants`
--

DROP TABLE IF EXISTS `contenants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contenants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `volume` float NOT NULL,
  `id_materiaux` int(11) NOT NULL,
  `id_forme` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contenants_FK` (`id_materiaux`),
  KEY `contenants_FK_2` (`id_forme`),
  CONSTRAINT `contenants_FK` FOREIGN KEY (`id_materiaux`) REFERENCES `materiaux` (`id`),
  CONSTRAINT `contenants_FK_2` FOREIGN KEY (`id_forme`) REFERENCES `forme` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenants`
--

LOCK TABLES `contenants` WRITE;
/*!40000 ALTER TABLE `contenants` DISABLE KEYS */;
INSERT INTO `contenants` VALUES (1,12,1,1),(2,32,1,2),(3,69.7,2,4),(4,107,2,5),(5,135,3,3),(6,135,3,1),(7,135,4,2),(8,215,4,1),(9,215,5,2),(10,300,5,1);
/*!40000 ALTER TABLE `contenants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `couleur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `abreviation_couleur` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `couleur`
--

LOCK TABLES `couleur` WRITE;
/*!40000 ALTER TABLE `couleur` DISABLE KEYS */;
INSERT INTO `couleur` VALUES (1,'Rouge','N'),(2,'Blanc','B'),(3,'Gris','G'),(4,'Rosé','Rs');
/*!40000 ALTER TABLE `couleur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cultiver`
--

DROP TABLE IF EXISTS `cultiver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cultiver` (
  `id_pays` int(11) NOT NULL,
  `id_cepage` int(11) NOT NULL,
  `id_viticulture` int(11) NOT NULL,
  KEY `cultiver_FK` (`id_cepage`),
  KEY `cultiver_FK_1` (`id_pays`),
  KEY `cultiver_FK_2` (`id_viticulture`),
  CONSTRAINT `cultiver_FK` FOREIGN KEY (`id_cepage`) REFERENCES `cepage` (`id`),
  CONSTRAINT `cultiver_FK_1` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id`),
  CONSTRAINT `cultiver_FK_2` FOREIGN KEY (`id_viticulture`) REFERENCES `viticulture` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cultiver`
--

LOCK TABLES `cultiver` WRITE;
/*!40000 ALTER TABLE `cultiver` DISABLE KEYS */;
/*!40000 ALTER TABLE `cultiver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `degustation`
--

DROP TABLE IF EXISTS `degustation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `degustation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degustation`
--

LOCK TABLES `degustation` WRITE;
/*!40000 ALTER TABLE `degustation` DISABLE KEYS */;
/*!40000 ALTER TABLE `degustation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elevage`
--

DROP TABLE IF EXISTS `elevage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `elevage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elevage`
--

LOCK TABLES `elevage` WRITE;
/*!40000 ALTER TABLE `elevage` DISABLE KEYS */;
/*!40000 ALTER TABLE `elevage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elever`
--

DROP TABLE IF EXISTS `elever`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `elever` (
  `id_elevage` int(11) DEFAULT NULL,
  `id_contenants` int(11) DEFAULT NULL,
  KEY `elever_FK` (`id_elevage`),
  KEY `elever_FK_1` (`id_contenants`),
  CONSTRAINT `elever_FK` FOREIGN KEY (`id_elevage`) REFERENCES `elevage` (`id`),
  CONSTRAINT `elever_FK_1` FOREIGN KEY (`id_contenants`) REFERENCES `contenants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elever`
--

LOCK TABLES `elever` WRITE;
/*!40000 ALTER TABLE `elever` DISABLE KEYS */;
/*!40000 ALTER TABLE `elever` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forme`
--

DROP TABLE IF EXISTS `forme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forme`
--

LOCK TABLES `forme` WRITE;
/*!40000 ALTER TABLE `forme` DISABLE KEYS */;
INSERT INTO `forme` VALUES (1,'Cubique'),(2,'Cylindrique'),(3,'Ovoïde'),(4,'Tronconique'),(5,'Tronconique inversée');
/*!40000 ALTER TABLE `forme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecon`
--

DROP TABLE IF EXISTS `lecon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lecon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecon`
--

LOCK TABLES `lecon` WRITE;
/*!40000 ALTER TABLE `lecon` DISABLE KEYS */;
INSERT INTO `lecon` VALUES (1,'Œnologie'),(2,'Viticulture'),(3,'Dégustation');
/*!40000 ALTER TABLE `lecon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materiaux`
--

DROP TABLE IF EXISTS `materiaux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materiaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materiaux`
--

LOCK TABLES `materiaux` WRITE;
/*!40000 ALTER TABLE `materiaux` DISABLE KEYS */;
INSERT INTO `materiaux` VALUES (1,'Acier inoxydable'),(2,'Acier revêtu'),(3,'Béton'),(4,'Fibre de verre'),(5,'Bois');
/*!40000 ALTER TABLE `materiaux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `millesime`
--

DROP TABLE IF EXISTS `millesime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `millesime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `climat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `millesime`
--

LOCK TABLES `millesime` WRITE;
/*!40000 ALTER TABLE `millesime` DISABLE KEYS */;
/*!40000 ALTER TABLE `millesime` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `niveau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_niveau` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveau`
--

LOCK TABLES `niveau` WRITE;
/*!40000 ALTER TABLE `niveau` DISABLE KEYS */;
INSERT INTO `niveau` VALUES (1,'Niveau Amateur','Au niveau débutant, nous verrons les grandes étapes de l\'élaboration d\'un vin selon votre choix rouge, blanc et rosé. Avec quelques termes techniques incontournables mais sans entrer dans le détail. Il existe autant de manière de faire un vin que de nom de domaine dans le monde donc nous resterons sur les vins tranquille et sec pour commencer. De futur sections seront crée spécifiquement pour les autres catégorie de vin.'),(2,'Niveau Étudiant','Le niveau étudiant est là pour consolidé les bases et aller plus loin dans le développement des connaissances et pratiques.'),(3,'Niveau Professionnel','Le niveau professionnel fournira quelques méthodes et outils pour vous aider tout au long de votre parcours.');
/*!40000 ALTER TABLE `niveau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisme_vin`
--

DROP TABLE IF EXISTS `organisme_vin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisme_vin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acronyme` varchar(30) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisme_vin`
--

LOCK TABLES `organisme_vin` WRITE;
/*!40000 ALTER TABLE `organisme_vin` DISABLE KEYS */;
INSERT INTO `organisme_vin` VALUES (1,'INRA','Institut national de la recherche agronomique','Institut National de la Recherche Agronomique. Cet organisme de recherche scientifique publique a été fondé en 1946. Il est placé sous la tutelle du ministère de l’Enseignement supérieur et de la Recherche et du ministère de l’Agriculture et de la Pêche. Ses recherches concernent les questions liées à l’agriculture et notamment à la vigne, à l’alimentation et à la sécurité des aliments, à l’environnement et à la gestion des territoires, dans une perspective de développement durable.'),(2,'ISVV','Institut des sciences de la vigne et du vin','L\'ISVV est l\'un des centre de recherche de l\'INRA. C\'est un pôle pluridisciplinaire et international de recherche, d\'enseignement supérieur et de développement pour relever les défis de l\'industrie du vin de demain.'),(3,'CIVB','Conseil Interprofessionnel du Vin de Bordeaux','Le CIVB à pour but de promouvoir les vins de bordeaux et faire le lien entre les négociants et les viticulteurs.'),(4,'IFV','Institu Français de la vigne et du vin','L\'IFV offre des prestations pour aider les producteurs à la mise en place de solution innovantes et le suivie de celle-çi grâce à leurs expertise dans une multitudes de domaines allant du plant de vigne à la bouteille.'),(5,'ENTAV','ENTAV-INRA','Créée en 1995 par l’IFV et l’INRA la marque ENTAV-INRA® incarne une Sélection vigne inégalable en matières sanitaires et agronomiques, avec la volonté de diffuser qualité et authenticité, made in France, à travers le monde. Elle vise à offrir à chaque professionnel une garantie au travers de la traçabilité et de la diffusion exclusive par les licenciés de la marque.');
/*!40000 ALTER TABLE `organisme_vin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(3) NOT NULL,
  `alpha2` varchar(2) NOT NULL,
  `alpha3` varchar(3) NOT NULL,
  `nom_en_gb` varchar(45) NOT NULL,
  `nom_fr_fr` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alpha2` (`alpha2`),
  UNIQUE KEY `alpha3` (`alpha3`),
  UNIQUE KEY `code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pays`
--

LOCK TABLES `pays` WRITE;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` VALUES (1,4,'AF','AFG','Afghanistan','Afghanistan'),(2,8,'AL','ALB','Albania','Albanie'),(3,10,'AQ','ATA','Antarctica','Antarctique'),(4,12,'DZ','DZA','Algeria','Algérie'),(5,16,'AS','ASM','American Samoa','Samoa Américaines'),(6,20,'AD','AND','Andorra','Andorre'),(7,24,'AO','AGO','Angola','Angola'),(8,28,'AG','ATG','Antigua and Barbuda','Antigua-et-Barbuda'),(9,31,'AZ','AZE','Azerbaijan','Azerbaïdjan'),(10,32,'AR','ARG','Argentina','Argentine'),(11,36,'AU','AUS','Australia','Australie'),(12,40,'AT','AUT','Austria','Autriche'),(13,44,'BS','BHS','Bahamas','Bahamas'),(14,48,'BH','BHR','Bahrain','Bahreïn'),(15,50,'BD','BGD','Bangladesh','Bangladesh'),(16,51,'AM','ARM','Armenia','Arménie'),(17,52,'BB','BRB','Barbados','Barbade'),(18,56,'BE','BEL','Belgium','Belgique'),(19,60,'BM','BMU','Bermuda','Bermudes'),(20,64,'BT','BTN','Bhutan','Bhoutan'),(21,68,'BO','BOL','Bolivia','Bolivie'),(22,70,'BA','BIH','Bosnia and Herzegovina','Bosnie-Herzégovine'),(23,72,'BW','BWA','Botswana','Botswana'),(24,74,'BV','BVT','Bouvet Island','Île Bouvet'),(25,76,'BR','BRA','Brazil','Brésil'),(26,84,'BZ','BLZ','Belize','Belize'),(27,86,'IO','IOT','British Indian Ocean Territory','Territoire Britannique de l\'Océan Indien'),(28,90,'SB','SLB','Solomon Islands','Îles Salomon'),(29,92,'VG','VGB','British Virgin Islands','Îles Vierges Britanniques'),(30,96,'BN','BRN','Brunei Darussalam','Brunéi Darussalam'),(31,100,'BG','BGR','Bulgaria','Bulgarie'),(32,104,'MM','MMR','Myanmar','Myanmar'),(33,108,'BI','BDI','Burundi','Burundi'),(34,112,'BY','BLR','Belarus','Bélarus'),(35,116,'KH','KHM','Cambodia','Cambodge'),(36,120,'CM','CMR','Cameroon','Cameroun'),(37,124,'CA','CAN','Canada','Canada'),(38,132,'CV','CPV','Cape Verde','Cap-vert'),(39,136,'KY','CYM','Cayman Islands','Îles Caïmanes'),(40,140,'CF','CAF','Central African','République Centrafricaine'),(41,144,'LK','LKA','Sri Lanka','Sri Lanka'),(42,148,'TD','TCD','Chad','Tchad'),(43,152,'CL','CHL','Chile','Chili'),(44,156,'CN','CHN','China','Chine'),(45,158,'TW','TWN','Taiwan','Taïwan'),(46,162,'CX','CXR','Christmas Island','Île Christmas'),(47,166,'CC','CCK','Cocos (Keeling) Islands','Îles Cocos (Keeling)'),(48,170,'CO','COL','Colombia','Colombie'),(49,174,'KM','COM','Comoros','Comores'),(50,175,'YT','MYT','Mayotte','Mayotte'),(51,178,'CG','COG','Republic of the Congo','République du Congo'),(52,180,'CD','COD','The Democratic Republic Of The Congo','République Démocratique du Congo'),(53,184,'CK','COK','Cook Islands','Îles Cook'),(54,188,'CR','CRI','Costa Rica','Costa Rica'),(55,191,'HR','HRV','Croatia','Croatie'),(56,192,'CU','CUB','Cuba','Cuba'),(57,196,'CY','CYP','Cyprus','Chypre'),(58,203,'CZ','CZE','Czech Republic','République Tchèque'),(59,204,'BJ','BEN','Benin','Bénin'),(60,208,'DK','DNK','Denmark','Danemark'),(61,212,'DM','DMA','Dominica','Dominique'),(62,214,'DO','DOM','Dominican Republic','République Dominicaine'),(63,218,'EC','ECU','Ecuador','Équateur'),(64,222,'SV','SLV','El Salvador','El Salvador'),(65,226,'GQ','GNQ','Equatorial Guinea','Guinée Équatoriale'),(66,231,'ET','ETH','Ethiopia','Éthiopie'),(67,232,'ER','ERI','Eritrea','Érythrée'),(68,233,'EE','EST','Estonia','Estonie'),(69,234,'FO','FRO','Faroe Islands','Îles Féroé'),(70,238,'FK','FLK','Falkland Islands','Îles (malvinas) Falkland'),(71,239,'GS','SGS','South Georgia and the South Sandwich Islands','Géorgie du Sud et les Îles Sandwich du Sud'),(72,242,'FJ','FJI','Fiji','Fidji'),(73,246,'FI','FIN','Finland','Finlande'),(74,248,'AX','ALA','Åland Islands','Îles Åland'),(75,250,'FR','FRA','France','France'),(76,254,'GF','GUF','French Guiana','Guyane Française'),(77,258,'PF','PYF','French Polynesia','Polynésie Française'),(78,260,'TF','ATF','French Southern Territories','Terres Australes Françaises'),(79,262,'DJ','DJI','Djibouti','Djibouti'),(80,266,'GA','GAB','Gabon','Gabon'),(81,268,'GE','GEO','Georgia','Géorgie'),(82,270,'GM','GMB','Gambia','Gambie'),(83,275,'PS','PSE','Occupied Palestinian Territory','Territoire Palestinien Occupé'),(84,276,'DE','DEU','Germany','Allemagne'),(85,288,'GH','GHA','Ghana','Ghana'),(86,292,'GI','GIB','Gibraltar','Gibraltar'),(87,296,'KI','KIR','Kiribati','Kiribati'),(88,300,'GR','GRC','Greece','Grèce'),(89,304,'GL','GRL','Greenland','Groenland'),(90,308,'GD','GRD','Grenada','Grenade'),(91,312,'GP','GLP','Guadeloupe','Guadeloupe'),(92,316,'GU','GUM','Guam','Guam'),(93,320,'GT','GTM','Guatemala','Guatemala'),(94,324,'GN','GIN','Guinea','Guinée'),(95,328,'GY','GUY','Guyana','Guyana'),(96,332,'HT','HTI','Haiti','Haïti'),(97,334,'HM','HMD','Heard Island and McDonald Islands','Îles Heard et Mcdonald'),(98,336,'VA','VAT','Vatican City State','Saint-Siège (état de la Cité du Vatican)'),(99,340,'HN','HND','Honduras','Honduras'),(100,344,'HK','HKG','Hong Kong','Hong-Kong'),(101,348,'HU','HUN','Hungary','Hongrie'),(102,352,'IS','ISL','Iceland','Islande'),(103,356,'IN','IND','India','Inde'),(104,360,'ID','IDN','Indonesia','Indonésie'),(105,364,'IR','IRN','Islamic Republic of Iran','République Islamique d\'Iran'),(106,368,'IQ','IRQ','Iraq','Iraq'),(107,372,'IE','IRL','Ireland','Irlande'),(108,376,'IL','ISR','Israel','Israël'),(109,380,'IT','ITA','Italy','Italie'),(110,384,'CI','CIV','Côte d\'Ivoire','Côte d\'Ivoire'),(111,388,'JM','JAM','Jamaica','Jamaïque'),(112,392,'JP','JPN','Japan','Japon'),(113,398,'KZ','KAZ','Kazakhstan','Kazakhstan'),(114,400,'JO','JOR','Jordan','Jordanie'),(115,404,'KE','KEN','Kenya','Kenya'),(116,408,'KP','PRK','Democratic People\'s Republic of Korea','République Populaire Démocratique de Corée'),(117,410,'KR','KOR','Republic of Korea','République de Corée'),(118,414,'KW','KWT','Kuwait','Koweït'),(119,417,'KG','KGZ','Kyrgyzstan','Kirghizistan'),(120,418,'LA','LAO','Lao People\'s Democratic Republic','République Démocratique Populaire Lao'),(121,422,'LB','LBN','Lebanon','Liban'),(122,426,'LS','LSO','Lesotho','Lesotho'),(123,428,'LV','LVA','Latvia','Lettonie'),(124,430,'LR','LBR','Liberia','Libéria'),(125,434,'LY','LBY','Libyan Arab Jamahiriya','Jamahiriya Arabe Libyenne'),(126,438,'LI','LIE','Liechtenstein','Liechtenstein'),(127,440,'LT','LTU','Lithuania','Lituanie'),(128,442,'LU','LUX','Luxembourg','Luxembourg'),(129,446,'MO','MAC','Macao','Macao'),(130,450,'MG','MDG','Madagascar','Madagascar'),(131,454,'MW','MWI','Malawi','Malawi'),(132,458,'MY','MYS','Malaysia','Malaisie'),(133,462,'MV','MDV','Maldives','Maldives'),(134,466,'ML','MLI','Mali','Mali'),(135,470,'MT','MLT','Malta','Malte'),(136,474,'MQ','MTQ','Martinique','Martinique'),(137,478,'MR','MRT','Mauritania','Mauritanie'),(138,480,'MU','MUS','Mauritius','Maurice'),(139,484,'MX','MEX','Mexico','Mexique'),(140,492,'MC','MCO','Monaco','Monaco'),(141,496,'MN','MNG','Mongolia','Mongolie'),(142,498,'MD','MDA','Republic of Moldova','République de Moldova'),(143,500,'MS','MSR','Montserrat','Montserrat'),(144,504,'MA','MAR','Morocco','Maroc'),(145,508,'MZ','MOZ','Mozambique','Mozambique'),(146,512,'OM','OMN','Oman','Oman'),(147,516,'NA','NAM','Namibia','Namibie'),(148,520,'NR','NRU','Nauru','Nauru'),(149,524,'NP','NPL','Nepal','Népal'),(150,528,'NL','NLD','Netherlands','Pays-Bas'),(151,530,'AN','ANT','Netherlands Antilles','Antilles Néerlandaises'),(152,533,'AW','ABW','Aruba','Aruba'),(153,540,'NC','NCL','New Caledonia','Nouvelle-Calédonie'),(154,548,'VU','VUT','Vanuatu','Vanuatu'),(155,554,'NZ','NZL','New Zealand','Nouvelle-Zélande'),(156,558,'NI','NIC','Nicaragua','Nicaragua'),(157,562,'NE','NER','Niger','Niger'),(158,566,'NG','NGA','Nigeria','Nigéria'),(159,570,'NU','NIU','Niue','Niué'),(160,574,'NF','NFK','Norfolk Island','Île Norfolk'),(161,578,'NO','NOR','Norway','Norvège'),(162,580,'MP','MNP','Northern Mariana Islands','Îles Mariannes du Nord'),(163,581,'UM','UMI','United States Minor Outlying Islands','Îles Mineures Éloignées des États-Unis'),(164,583,'FM','FSM','Federated States of Micronesia','États Fédérés de Micronésie'),(165,584,'MH','MHL','Marshall Islands','Îles Marshall'),(166,585,'PW','PLW','Palau','Palaos'),(167,586,'PK','PAK','Pakistan','Pakistan'),(168,591,'PA','PAN','Panama','Panama'),(169,598,'PG','PNG','Papua New Guinea','Papouasie-Nouvelle-Guinée'),(170,600,'PY','PRY','Paraguay','Paraguay'),(171,604,'PE','PER','Peru','Pérou'),(172,608,'PH','PHL','Philippines','Philippines'),(173,612,'PN','PCN','Pitcairn','Pitcairn'),(174,616,'PL','POL','Poland','Pologne'),(175,620,'PT','PRT','Portugal','Portugal'),(176,624,'GW','GNB','Guinea-Bissau','Guinée-Bissau'),(177,626,'TL','TLS','Timor-Leste','Timor-Leste'),(178,630,'PR','PRI','Puerto Rico','Porto Rico'),(179,634,'QA','QAT','Qatar','Qatar'),(180,638,'RE','REU','Réunion','Réunion'),(181,642,'RO','ROU','Romania','Roumanie'),(182,643,'RU','RUS','Russian Federation','Fédération de Russie'),(183,646,'RW','RWA','Rwanda','Rwanda'),(184,654,'SH','SHN','Saint Helena','Sainte-Hélène'),(185,659,'KN','KNA','Saint Kitts and Nevis','Saint-Kitts-et-Nevis'),(186,660,'AI','AIA','Anguilla','Anguilla'),(187,662,'LC','LCA','Saint Lucia','Sainte-Lucie'),(188,666,'PM','SPM','Saint-Pierre and Miquelon','Saint-Pierre-et-Miquelon'),(189,670,'VC','VCT','Saint Vincent and the Grenadines','Saint-Vincent-et-les Grenadines'),(190,674,'SM','SMR','San Marino','Saint-Marin'),(191,678,'ST','STP','Sao Tome and Principe','Sao Tomé-et-Principe'),(192,682,'SA','SAU','Saudi Arabia','Arabie Saoudite'),(193,686,'SN','SEN','Senegal','Sénégal'),(194,690,'SC','SYC','Seychelles','Seychelles'),(195,694,'SL','SLE','Sierra Leone','Sierra Leone'),(196,702,'SG','SGP','Singapore','Singapour'),(197,703,'SK','SVK','Slovakia','Slovaquie'),(198,704,'VN','VNM','Vietnam','Viet Nam'),(199,705,'SI','SVN','Slovenia','Slovénie'),(200,706,'SO','SOM','Somalia','Somalie'),(201,710,'ZA','ZAF','South Africa','Afrique du Sud'),(202,716,'ZW','ZWE','Zimbabwe','Zimbabwe'),(203,724,'ES','ESP','Spain','Espagne'),(204,732,'EH','ESH','Western Sahara','Sahara Occidental'),(205,736,'SD','SDN','Sudan','Soudan'),(206,740,'SR','SUR','Suriname','Suriname'),(207,744,'SJ','SJM','Svalbard and Jan Mayen','Svalbard etÎle Jan Mayen'),(208,748,'SZ','SWZ','Swaziland','Swaziland'),(209,752,'SE','SWE','Sweden','Suède'),(210,756,'CH','CHE','Switzerland','Suisse'),(211,760,'SY','SYR','Syrian Arab Republic','République Arabe Syrienne'),(212,762,'TJ','TJK','Tajikistan','Tadjikistan'),(213,764,'TH','THA','Thailand','Thaïlande'),(214,768,'TG','TGO','Togo','Togo'),(215,772,'TK','TKL','Tokelau','Tokelau'),(216,776,'TO','TON','Tonga','Tonga'),(217,780,'TT','TTO','Trinidad and Tobago','Trinité-et-Tobago'),(218,784,'AE','ARE','United Arab Emirates','Émirats Arabes Unis'),(219,788,'TN','TUN','Tunisia','Tunisie'),(220,792,'TR','TUR','Turkey','Turquie'),(221,795,'TM','TKM','Turkmenistan','Turkménistan'),(222,796,'TC','TCA','Turks and Caicos Islands','Îles Turks et Caïques'),(223,798,'TV','TUV','Tuvalu','Tuvalu'),(224,800,'UG','UGA','Uganda','Ouganda'),(225,804,'UA','UKR','Ukraine','Ukraine'),(226,807,'MK','MKD','The Former Yugoslav Republic of Macedonia','L\'ex-République Yougoslave de Macédoine'),(227,818,'EG','EGY','Egypt','Égypte'),(228,826,'GB','GBR','United Kingdom','Royaume-Uni'),(229,833,'IM','IMN','Isle of Man','Île de Man'),(230,834,'TZ','TZA','United Republic Of Tanzania','République-Unie de Tanzanie'),(231,840,'US','USA','United States','États-Unis'),(232,850,'VI','VIR','U.S. Virgin Islands','Îles Vierges des États-Unis'),(233,854,'BF','BFA','Burkina Faso','Burkina Faso'),(234,858,'UY','URY','Uruguay','Uruguay'),(235,860,'UZ','UZB','Uzbekistan','Ouzbékistan'),(236,862,'VE','VEN','Venezuela','Venezuela'),(237,876,'WF','WLF','Wallis and Futuna','Wallis et Futuna'),(238,882,'WS','WSM','Samoa','Samoa'),(239,887,'YE','YEM','Yemen','Yémen'),(240,891,'CS','SCG','Serbia and Montenegro','Serbie-et-Monténégro'),(241,894,'ZM','ZMB','Zambia','Zambie');
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo_profil` varchar(250) DEFAULT NULL,
  `mot_de_passe` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personne`
--

LOCK TABLES `personne` WRITE;
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionnaire`
--

DROP TABLE IF EXISTS `questionnaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questionnaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionnaire`
--

LOCK TABLES `questionnaire` WRITE;
/*!40000 ALTER TABLE `questionnaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `questionnaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repondre`
--

DROP TABLE IF EXISTS `repondre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `repondre` (
  `id_personne` int(11) NOT NULL,
  `id_reponses` int(11) NOT NULL,
  KEY `evaluer_FK` (`id_personne`),
  KEY `evaluer_FK_1` (`id_reponses`),
  CONSTRAINT `evaluer_FK` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id`),
  CONSTRAINT `repondre_FK` FOREIGN KEY (`id_reponses`) REFERENCES `reponses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repondre`
--

LOCK TABLES `repondre` WRITE;
/*!40000 ALTER TABLE `repondre` DISABLE KEYS */;
/*!40000 ALTER TABLE `repondre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reponses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reponses`
--

LOCK TABLES `reponses` WRITE;
/*!40000 ALTER TABLE `reponses` DISABLE KEYS */;
/*!40000 ALTER TABLE `reponses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taille`
--

DROP TABLE IF EXISTS `taille`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `point_fort` text NOT NULL,
  `point_faible` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taille`
--

LOCK TABLES `taille` WRITE;
/*!40000 ALTER TABLE `taille` DISABLE KEYS */;
INSERT INTO `taille` VALUES (1,'Taille en gobelet','En échalas ou sans palissage, la taille en gobelet est formé sur plusieurs bras en forme de chandelier sur lesquels reposent 1 à 2 coursons à leurs extremités.','Il permet une bonne résistance au vent et à la sécheresse. Les raisins sont près du sol ce qui assure une maturité précoce.','Cette forme de conduite est mal adaptée à la mécanisation. Elle induit également une mauvaise diffusion des produits de traitement pour pénétrer notamment à l’intérieur des bras.'),(2,'Taille en cordon de Royat','La taille en cordon de Royat repose sur deux bois(charpente) formé dès les premières années de croissance sur lesquels reposent plusieurs courson(cot) équidistant.','Bonne répartition de la vendange et homogénéité de la maturité. Procure une bonne ventilation de la végétation également.','Nécessite de reformer le pied au bout d\'un certain nombre d\'année car les coursons surélève le pied petit à petit.'),(3,'Taille guyot simple','La vigne est taillé sur un long bois pouvant aller de 4 à 10 bourgeons(yeux) dépendant de la capacité du pied à pouvoir recevoir une charge plus importante.','Offre une bonne capacité de rendement. ','Type de taille sollicitant énormement le végétal et peux occasionner un manque d\'homogénéité au niveau de la maturité si celui-çi est trop faible.'),(4,'Taille guyot double','La charge est réparti sur deux bois(baguette) avec 3 à 4 bourgeons(yeux) dépendant de la capacité du pied à pouvoir recevoir une charge plus importante.','Offre une bonne capacité de rendement. ','Type de taille sollicitant énormement le végétal et peux occasionner un manque d\'homogénéité au niveau de la maturité si celui-çi est trop faible.');
/*!40000 ALTER TABLE `taille` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tailler`
--

DROP TABLE IF EXISTS `tailler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tailler` (
  `id_taille` int(11) NOT NULL,
  `id_viticulture` int(11) NOT NULL,
  KEY `tailler_FK` (`id_taille`),
  KEY `tailler_FK_1` (`id_viticulture`),
  CONSTRAINT `tailler_FK` FOREIGN KEY (`id_taille`) REFERENCES `taille` (`id`),
  CONSTRAINT `tailler_FK_1` FOREIGN KEY (`id_viticulture`) REFERENCES `viticulture` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tailler`
--

LOCK TABLES `tailler` WRITE;
/*!40000 ALTER TABLE `tailler` DISABLE KEYS */;
/*!40000 ALTER TABLE `tailler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_theme` varchar(100) NOT NULL,
  `theme_contenu` text NOT NULL,
  `theme_logo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` VALUES (1,' Thème de l\'Œnologie','Du début des vendanges à la mise en bouteille, retrouvez les étapes incontournables de l\'élaboration d\'un vin. ','./public/img/baril.png'),(2,'Thème de la Viticulture','La culture de la vigne nécessite une adaptation à toutes épreuves. A chaque saison, retrouvez les bonnes pratiques nécessaires à la bonne conduite d\'un vignoble.','./public/img/vigne.png'),(3,'Thème de la Dégustation','La dégustation est une valeur essentielle pour tout producteur qui se respect. Il est un des facteurs de prise de décision qui peut faire la différence entre un vin d\'exception et un vin correct.','./public/img/verreDeVin.png');
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vin`
--

DROP TABLE IF EXISTS `vin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vin`
--

LOCK TABLES `vin` WRITE;
/*!40000 ALTER TABLE `vin` DISABLE KEYS */;
/*!40000 ALTER TABLE `vin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vinification`
--

DROP TABLE IF EXISTS `vinification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vinification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vinification`
--

LOCK TABLES `vinification` WRITE;
/*!40000 ALTER TABLE `vinification` DISABLE KEYS */;
/*!40000 ALTER TABLE `vinification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vinifier`
--

DROP TABLE IF EXISTS `vinifier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vinifier` (
  `id_vinification` int(11) NOT NULL,
  `id_contenants` int(11) NOT NULL,
  KEY `vinifier_FK` (`id_contenants`),
  KEY `vinifier_FK_1` (`id_vinification`),
  CONSTRAINT `vinifier_FK` FOREIGN KEY (`id_contenants`) REFERENCES `contenants` (`id`),
  CONSTRAINT `vinifier_FK_1` FOREIGN KEY (`id_vinification`) REFERENCES `vinification` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vinifier`
--

LOCK TABLES `vinifier` WRITE;
/*!40000 ALTER TABLE `vinifier` DISABLE KEYS */;
/*!40000 ALTER TABLE `vinifier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viticulture`
--

DROP TABLE IF EXISTS `viticulture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `viticulture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viticulture`
--

LOCK TABLES `viticulture` WRITE;
/*!40000 ALTER TABLE `viticulture` DISABLE KEYS */;
/*!40000 ALTER TABLE `viticulture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'howtowine'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-14 16:53:04
