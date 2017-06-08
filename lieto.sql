-- MySQL dump 10.13  Distrib 5.5.55, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: lieto
-- ------------------------------------------------------
-- Server version	5.5.55-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `catprod`
--

DROP TABLE IF EXISTS `catprod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catprod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `url` varchar(45) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catprod`
--

LOCK TABLES `catprod` WRITE;
/*!40000 ALTER TABLE `catprod` DISABLE KEYS */;
INSERT INTO `catprod` VALUES (1,'{\"it\":\"Motori Fuoribordo\",\"en\":\"Outboard Engines\"}','motori-fuoribordo',1),(2,'{\"it\":\"Moto d\'acqua\",\"en\":\"Watercrafts\"}','moto-d-acqua',1),(3,'{\"it\":\"Imbarcazioni\",\"en\":\"Boats\"}','imbarcazioni',1),(4,'{\"it\":\"Gommoni\",\"en\":\"Ribs\"}','gommoni',1),(5,'{\"it\":\"Elettronica\",\"en\":\"Electronics\"}','elettronica',1),(6,'{\"it\":\"Carrelli Rimorchio\",\"en\":\"Trailer Carts\"}','carrelli-rimorchio',1),(7,'{\"it\":\"Assistenza\",\"en\":\"Support\"}','assistenza',2);
/*!40000 ALTER TABLE `catprod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('7e9556bcb574581d079fe323fc2038a716174d70','127.0.0.1',1496930394,'__ci_last_regenerate|i:1496929317;next|s:16:\"http://lieto.pc/\";'),('272263a8c35ea07f2518cd1249b90334e9fb40a5','127.0.0.1',1496931012,'__ci_last_regenerate|i:1496930536;next|s:16:\"http://lieto.pc/\";'),('ee18748fc29088e0fadb762bdd34e14084bdcfb2','127.0.0.1',1496931460,'__ci_last_regenerate|i:1496931145;next|s:9:\"usato/asd\";save|s:30:\"Aggiornamento usato completato\";__ci_vars|a:2:{s:4:\"save\";s:3:\"new\";s:11:\"save_status\";s:3:\"new\";}save_status|s:7:\"success\";'),('5e006994118ed7f7c48a60f163739f73eb8d2d2b','127.0.0.1',1496931902,'__ci_last_regenerate|i:1496931619;next|s:5:\"usato\";'),('07763fa54bc29bdad91694028e219a65f312bc14','127.0.0.1',1496932264,'__ci_last_regenerate|i:1496931973;next|s:5:\"usato\";'),('40976f61178505f7e8d3bd18fa7b3b6c5e718465','127.0.0.1',1496932375,'__ci_last_regenerate|i:1496932336;next|s:5:\"usato\";'),('5be17b2b3cac1d06d0eeb18c251189ad5dd4fdd2','127.0.0.1',1496933044,'__ci_last_regenerate|i:1496932996;next|s:5:\"usato\";'),('315044f1ed44a080782cd51328a5945d2c08820b','127.0.0.1',1496933616,'__ci_last_regenerate|i:1496933391;next|s:5:\"usato\";delete|s:30:\"Cancellazione usato completata\";__ci_vars|a:2:{s:6:\"delete\";s:3:\"old\";s:13:\"delete_status\";s:3:\"old\";}delete_status|s:7:\"success\";'),('8af38871f49424b453a37510d6c433f722cdd2dd','127.0.0.1',1496935005,'__ci_last_regenerate|i:1496934745;next|s:5:\"usato\";'),('e72fced04a51ca54b497973781f1c3fb9217392c','127.0.0.1',1496935848,'__ci_last_regenerate|i:1496935621;next|s:5:\"usato\";user|O:8:\"stdClass\":5:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:12:\"nauticalieto\";s:8:\"password\";s:40:\"8b2a98ae1527e59dea1d68452ae422be3c5d0626\";s:9:\"is_active\";s:1:\"1\";s:10:\"last_login\";s:19:\"2017-06-08 17:21:58\";}'),('80efbf776fb9fa5c30c7e4b7ac45d5fb24b95aeb','127.0.0.1',1496936234,'__ci_last_regenerate|i:1496935991;next|s:5:\"usato\";user|O:8:\"stdClass\":5:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:12:\"nauticalieto\";s:8:\"password\";s:40:\"8b2a98ae1527e59dea1d68452ae422be3c5d0626\";s:9:\"is_active\";s:1:\"1\";s:10:\"last_login\";s:19:\"2017-06-08 17:21:58\";}'),('0463848ae6c2b74ac472d01046dc1ac889d85297','127.0.0.1',1496936462,'__ci_last_regenerate|i:1496936459;next|s:5:\"usato\";user|O:8:\"stdClass\":5:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:12:\"nauticalieto\";s:8:\"password\";s:40:\"8b2a98ae1527e59dea1d68452ae422be3c5d0626\";s:9:\"is_active\";s:1:\"1\";s:10:\"last_login\";s:19:\"2017-06-08 17:21:58\";}'),('a9ffa8eefa6ece5a7dfdb7cbeedce968b3b1e580','127.0.0.1',1496937283,'__ci_last_regenerate|i:1496937243;next|s:5:\"usato\";user|O:8:\"stdClass\":5:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:12:\"nauticalieto\";s:8:\"password\";s:40:\"8b2a98ae1527e59dea1d68452ae422be3c5d0626\";s:9:\"is_active\";s:1:\"1\";s:10:\"last_login\";s:19:\"2017-06-08 17:21:58\";}'),('d58992700a1a56469f592aba13ecc88db9c9d748','127.0.0.1',1496939956,'__ci_last_regenerate|i:1496939904;next|s:16:\"http://lieto.pc/\";user|O:8:\"stdClass\":5:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:12:\"nauticalieto\";s:8:\"password\";s:40:\"8b2a98ae1527e59dea1d68452ae422be3c5d0626\";s:9:\"is_active\";s:1:\"1\";s:10:\"last_login\";s:19:\"2017-06-08 17:21:58\";}'),('28f5b392323605a61f9cc88acf481036f6df040d','127.0.0.1',1496940360,'__ci_last_regenerate|i:1496940320;next|s:16:\"http://lieto.pc/\";user|O:8:\"stdClass\":5:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:12:\"nauticalieto\";s:8:\"password\";s:40:\"8b2a98ae1527e59dea1d68452ae422be3c5d0626\";s:9:\"is_active\";s:1:\"1\";s:10:\"last_login\";s:19:\"2017-06-08 17:21:58\";}save|s:30:\"Aggiornamento usato completato\";__ci_vars|a:2:{s:4:\"save\";s:3:\"new\";s:11:\"save_status\";s:3:\"new\";}save_status|s:7:\"success\";'),('834bc235e6234dadb51172b0f781f07d6fcfa1e1','127.0.0.1',1496940985,'__ci_last_regenerate|i:1496940626;next|s:16:\"http://lieto.pc/\";user|O:8:\"stdClass\":5:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:12:\"nauticalieto\";s:8:\"password\";s:40:\"8b2a98ae1527e59dea1d68452ae422be3c5d0626\";s:9:\"is_active\";s:1:\"1\";s:10:\"last_login\";s:19:\"2017-06-08 17:21:58\";}save|s:30:\"Aggiornamento usato completato\";__ci_vars|a:2:{s:4:\"save\";s:3:\"new\";s:11:\"save_status\";s:3:\"new\";}save_status|s:7:\"success\";'),('62b292da76accbcd1a1b7071243b4ba68b92a5ce','127.0.0.1',1496941169,'__ci_last_regenerate|i:1496941006;next|s:11:\"usato/prova\";user|O:8:\"stdClass\":5:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:12:\"nauticalieto\";s:8:\"password\";s:40:\"8b2a98ae1527e59dea1d68452ae422be3c5d0626\";s:9:\"is_active\";s:1:\"1\";s:10:\"last_login\";s:19:\"2017-06-08 17:21:58\";}lang|s:7:\"english\";jlang|s:2:\"en\";'),('817307bd547dabc0158f985580061005873280be','127.0.0.1',1496941784,'__ci_last_regenerate|i:1496941492;next|s:11:\"usato/prova\";user|O:8:\"stdClass\":5:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:12:\"nauticalieto\";s:8:\"password\";s:40:\"8b2a98ae1527e59dea1d68452ae422be3c5d0626\";s:9:\"is_active\";s:1:\"1\";s:10:\"last_login\";s:19:\"2017-06-08 17:21:58\";}lang|s:7:\"english\";jlang|s:2:\"en\";'),('175a588e1a6bf3d78b6c15ed380b8da1dae9b15a','127.0.0.1',1496942166,'__ci_last_regenerate|i:1496941996;next|s:11:\"usato/prova\";user|O:8:\"stdClass\":5:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:12:\"nauticalieto\";s:8:\"password\";s:40:\"8b2a98ae1527e59dea1d68452ae422be3c5d0626\";s:9:\"is_active\";s:1:\"1\";s:10:\"last_login\";s:19:\"2017-06-08 17:21:58\";}lang|s:7:\"english\";jlang|s:2:\"en\";'),('a69d75d48e74678df561963d386c51cc1ec0f540','127.0.0.1',1496942322,'__ci_last_regenerate|i:1496942315;next|s:11:\"usato/prova\";user|O:8:\"stdClass\":5:{s:2:\"id\";s:1:\"1\";s:8:\"username\";s:12:\"nauticalieto\";s:8:\"password\";s:40:\"8b2a98ae1527e59dea1d68452ae422be3c5d0626\";s:9:\"is_active\";s:1:\"1\";s:10:\"last_login\";s:19:\"2017-06-08 17:21:58\";}lang|s:7:\"english\";jlang|s:2:\"en\";');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titolo` text NOT NULL,
  `img_titolo` varchar(45) NOT NULL,
  `img_banner` varchar(45) NOT NULL DEFAULT 'null.jpg',
  `url` varchar(100) NOT NULL,
  `abst` text NOT NULL,
  `text` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'{\"it\":\"Garanzia Evinrude 10 anni... ma entro giugno 2017!\",\"en\":\"Evinrude Warranty 10 years... but within June 2017!\"}','evinrude.jpg','null.jpg','garanzia-evinrude-10-anni','{\"it\":\"Un motivo in più per acquistare un motore EVINRUDE. Fino al 30 giugno 2017, potrai fruire della garanzia di 10 anni sui motori fuoribordo\",\"en\":\"One more reason to buy an EVINRUDE engine. Until June 30, 2017, you will be able to benefit from the 10-year warranty on outboard engines\"}','{\r\n	\"it\": \"Un motivo in più per acquistare un motore EVINRUDE. Fino al 30 giugno 2017, potrai fruire della garanzia di 10 anni sui motori fuoribordo rilasciata direttamente da Evinrude e dalla sua rete vendita.<br><br> E’ il periodo di garanzia più lungo rilasciato sul mercato dei motori fuoribordo. <br> <br>La garanzia è trasferibile, pertanto il motore è coperto da garanzia indipendentemente da chi sia il proprietario.Per maggiori informazioni <a href=\'http://www.evinrude.com\' target=\'_blank\'> www.evinrude.com </a>\",\r\n	\"en\": \"One more reason to buy an EVINRUDE engine. Until June 30, 2017, you will be able to benefit from the 10-year warranty on outboard engines issued directly by Evinrude and its sales network.<br><br> It is the longest warranty period on the outboard engine market. <br> <br> The guarantee is transferable, so the engine is covered by warranty regardless of who the owner is.For more information <a href=\'http://www.evinrude.com\' target= \'_blank\'> www.evinrude.com </a>\"\r\n}','2017-05-20 04:06:55',1),(2,'{\"it\":\"Vieni a provare la SAVER 750 Cabin\",\"en\":\"Come to try the SAVER 750 Cabin\"}','saver750cabin.jpg','null.jpg','prova-la-saver-750-cabin','{\"it\":\"La nuova SAVER 750 Cabin, da noi in pronta consegna, può essere provata in mare previo appuntamento\",\"en\":\"The new SAVER 750 Cabin, which is ready for delivery, can be tested at sea by appointment\"}','{\"it\":\"La nuova SAVER 750 Cabin, da noi in pronta consegna, può essere provata in mare previo appuntamento. Il modello disponibile è motorizzato con un Evinrude G2 da 250 cavalli, per apprezzarne tutte le qualità e doti marine.\",\"en\":\"The new SAVER 750 Cabin, which is ready for delivery, can be tested at sea by appointment. The available model is powered by a 250 hp Evinrude G2, to appreciate all its qualities and marine skills.\"}','2017-05-24 04:19:04',1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offerte`
--

DROP TABLE IF EXISTS `offerte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offerte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descr` longtext NOT NULL,
  `tecniche` longtext NOT NULL,
  `accessori` longtext NOT NULL,
  `url` varchar(100) NOT NULL,
  `img_home` varchar(45) NOT NULL,
  `img_banner` varchar(45) NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  `btn_txt` varchar(255) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `target` varchar(10) NOT NULL DEFAULT '_self',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `url_UNIQUE` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offerte`
--

LOCK TABLES `offerte` WRITE;
/*!40000 ALTER TABLE `offerte` DISABLE KEYS */;
INSERT INTO `offerte` VALUES (1,'Saver 750 Cabin','{\"it\":\"SAVER 750 CABIN, usata solo per prove giornalisti, motorizzata con Evinrude G2 da 250 hp. La garanzia decorre dal momento della vendita e se acquistata entro il 30 giugno 2017 sarà di 10 anni\",\"en\":\"SAVER 750 CABIN, used for journalists only, powered by 250 hp Evinrude G2. The warranty starts from the time of the sale and if the boat purchased within 30 June 2017, warranty will be 10 years old.\"}','{\"it\":\"\",\"en\":\"\"}','{\"it\":\"\",\"en\":\"\"}','saver-750-cabin','saver-750-cabin.jpg','saver-750-cabin_banner.jpg',1,'{\"it\":\"Scarica preventivo\",\"en\":\"Download quote\"}','{\"it\":\"public/pdf/preventivo_saver.pdf\",\"en\":\"public/pdf/preventivo_saver_en.pdf\"}','\"_blank\"');
/*!40000 ALTER TABLE `offerte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offerte_pics`
--

DROP TABLE IF EXISTS `offerte_pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offerte_pics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_offerta` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offerte_pics`
--

LOCK TABLES `offerte_pics` WRITE;
/*!40000 ALTER TABLE `offerte_pics` DISABLE KEYS */;
/*!40000 ALTER TABLE `offerte_pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodotti`
--

DROP TABLE IF EXISTS `prodotti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  `descr` text NOT NULL,
  `img` varchar(45) NOT NULL,
  `img_banner` varchar(45) NOT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '3',
  `ext_link` varchar(100) NOT NULL,
  `ordine` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodotti`
--

LOCK TABLES `prodotti` WRITE;
/*!40000 ALTER TABLE `prodotti` DISABLE KEYS */;
INSERT INTO `prodotti` VALUES (1,'BRP (EVINRUDE & JOHNSON)','brp-evinrude-johnson','{\"it\": \"E’ l’acronimo di Bombardier Recreational Products, azienda che raggruppa in sé una molteplicità di prodotti che svariano dal settore nautico a quello professionale. Tra questi spiccano i marchi EVINRUDE e JOHNSON, storici brand del settore motori fuoribordo. Mentre Johnson non è più oggi presente sul mercato, e per esso la Nautica Lieto presta solo servizio di assistenza autorizzata sui motori attualmente naviganti, EVINRUDE è invece rimasto il brand primario, grazie alla sua tecnologia 2T E-TEC ed all’innovazione che ha recentemente portato il marchio alla progettazione della serie E-TEC G2.<br><br>L’E-TEC è una tecnologia ad iniezione diretta, controllata da un modulo di gestione motore computerizzato che inietta direttamente il carburante ad alta pressione nelle camere dei cilindri, riducendo drasticamente le emissioni grazie ad una migliore combustione. I motori vantano inoltre l’impiego di leghe di alluminio sviluppate dalla NASA, per una maggiore resistenza nel tempo ed alle alte temperature, in particolare dei pistoni.<br><br>La serie G2 propone inoltre un nuovo design, decisamente accattivante, la combustione PurePower che offre la coppia maggiore della categoria (30% in più rispetto ai fuoribordo comparabili della concorrenza), consumi contenuti e basse emissioni, un servosterzo dinamico, l’i-Trim per regolare automaticamente l’assetto, oltre ad un alternatore senza cinghie che garantisce una maggior potenza di carica.<br><br>La gamma EVINRUDE include nella serie <strong>E-TEC</strong> motori da 25 a 300 HP, nella serie <strong>E-TEC G2</strong> da 150 a 300 HP, in quella dei <strong>portatili</strong> motori da 3,5 a 15 HP  ed infine una serie <strong>MEF</strong> (Multifuel) da 30 e 55 HP per utilizzo professionale.\",\"en\": \"It stands for Bombardier Recreational Products, a company that combines in itself a multitude of products that range from the marine industry and professional sports. Among these are the Evinrude and Johnson brands, historians of the outboard engine industry brand. While Johnson is no longer on the market today, and for it to Nautica Lieto provides only to furnish authorized service on currently sailors engines, Evinrude has however remained the primary brand, thanks to its technology 2 Stroke E-TEC and innovation that has recently brought the brand to the design of the E-TEC G2 series. <br><br>The E-TEC is a direct-injection technology, controlled by a computerized engine management module that directly injects the fuel at high pressure in the cylinder rooms, drastically reducing the emissions due to a better combustion. The engines also have the use of aluminum alloys developed by NASA, for greater strength over time and at high temperatures, in particular of the pistons. <br><br>The G2 Series also features a new design, very attractive, the PurePower combustion that offers more torque in its class (30% more than the comparable outboard of competition), low fuel consumption and low emissions, a dynamic power steering, i-Trim to automatically adjust the set, in addition to an alternator without belts, which guarantees a greater charging power. <br><br>The Evinrude range includes (in <strong>E-TEC</strong> family) engines from 25 up to 300 hp, in the <strong>E-TEC G2</strong> family engines from 150 up to300 Hp, a <strong>portable engines</strong> family from 3.5 to 15 HP and finally a professional series <strong>MEF</strong> (Multifuel) from 30 and 55 HP.\"}','brp-evinrude-johnson.jpg','evinrude.jpg',1,3,'www.evinrude.com',1),(2,'BRP (SEA-DOO)','brp-seadoo','{\"it\":\"E\' l\'acronimo di Bombardier Recreational Products, azienda che raggruppa in sé una molteplicità di prodotti che svariano dal settore nautico a quello professionale. Tra i prodotti per la famiglia e lo sport c\'è Sea-Doo, il brand che si occupa delle moto d\'acqua in grado di offrire momenti di puro e sano divertimento da soli o in compagnia.<br /><br />Leader di mercato, Sea-Doo adotta l\'esclusivo sistema di frenata iBR®, con frenata e retromarcia intelligente riconosciuto fin dal 2009 dalla Guardia Costiera degli Stati Uniti che consente l\'arresto della moto d\'acqua dotata di tale sistema, ben 48 metri prima di una moto tradizionale. <br /><br />L\'adozione di un sedile Ergolock offre la massima aderenza del corpo, con conseguente miglior controllo, mentre degli appositi cunei del vano piedi favoriscono  la tenuta in particolar modo durante le virate strette. Il manubrio è regolabile (l\'unico del settore) grazie all\'A.E.S. per una personalizzazione dell\'assetto di guida.<br /><br />A ciò si aggiunge un design innovativo che si adatta ai vari stili di guida, ben 4 modalità di guida selezionabili (ECOTM – Cruise – Touring e Sport – Sci), e la leggendaria potenza dei motori ROTAX, che offrono prestazioni imbattibili, che includono l\'unico sistema di raffreddamento a circuito chiuso del settore (il Closed-Loop).  La gamma è molto ampia, e prevede i modelli <strong>SPARK,  GTI, WAKE PRO, GTX LIMITED 300, GTR 230.</strong>\",\"en\":\"It stands for Bombardier Recreational Products, a company that combines in itself a multitude of products that range from the marine industry and professional sports. Among the products for the family and the sport\'s Sea-Doo, the brand that deals with personal watercraft can offer moments of pure and healthy fun alone or with friends.<br /><br />Market leader, Sea-Doo adopts the exclusive braking system iBR® with intelligent braking and reversing, recognized since 2009 by the U.S. Coast Guard that allows the arrest of watercraft equipped with this system, well 48 meters before a traditional watercraft.<br /><br />The adoption of a ErgoLock seat provides maximum adherence for the body, resulting in better control, while the wedges of the footwell favor the seal particularly during tight turns. The handlebar is adjustable (the only industry) thanks all\'A.E.S. for a buoyancy customization driving.<br /><br />In addition, an innovative design that adapts to different driving styles, well four selectable driving modes (ECOTM - Cruise - Touring and Sport - Skiing), and the legendary power of ROTAX engines that offer performance, including the \'one of the sector closed-circuit cooling system (the Closed-Loop). The range is very wide, and provide for the <strong>SPARK</strong> models, <strong>GTI, WAKE PRO, GTX LIMITED 300, 230 GTR.</strong>\"}','brp-sea-doo.jpg','sea-doo.jpg',2,3,'www.sea-doo.com',2),(3,'SELVA','selva','{\"it\":\"Unico marchio motoristico italiano presente nel palcoscenico mondiale dei fuoribordo. SELVA S.p.A. è un\'azienda operante nel settore dal 1959, quando venne costruito l\'impianto a Tirano (SO) nel quale Lorenzo Selva Sr. trasferì parte dell\'attività motoristica già esistente a Sesto San Giovanni sin dal 1945, fornendo tra l\'altro marchi quali Innocenti e Lambretta. <br /><br />Oggi l\'Azienda è l\'unica in ambito europeo ad avere un ciclo veramente completo di produzione dei componenti per motori marini ed è certificata ISO 9001. Vasta la gamma di fuoribordo offerti dal marchio. <br /><br />Si va dalla famiglia <strong>4Tempi</strong> che include potenze da 2,5 a 250 HP, di cui alcune anche disponibili nella versione più sportiva siglata <strong>XSR</strong>, che con alimentazione ad iniezione diretta del carburante (<strong>D.F.I.</strong>), ove le potenze vanno dai 40 agli 80 HP. Infine, sempre in ambito motoristico, la famiglia dei <strong>2Tempi</strong>, che propone sette modelli dai 15 agli 80 HP. <br /><br />Per il marchio SELVA la Nautica Lieto offre sia servizio di vendita che di assistenza.\",\"en\":\"The only Italian motorsport brand present in the world stage of the outboard. SELVA S.p.A. is a company operating in this sector since 1959, when it was built the plant in Tirano (SO) in which Lorenzo Selva Sr. moved part of motorsport existing in Sesto San Giovanni since 1945, providing among other brands such as Innocenti and Lambretta. <br /><br />Today the company is the only one in Europe to have a truly complete cycle of production of components for marine engines and is certified ISO 9001. A wide range of outboard offered by the brand.  <br /><br />It ranges from <strong>4 Stroke</strong> family that includes power ratings from 2.5 to 250 HP, some of which are also available in a sportier version signed <strong>XSR</strong>, that with power to direct fuel injection (<strong>D.F.I.</strong>), where the powers ranging from 40 to 80 HP.  <br /><br />Finally, in the field of motorsport, the family of <strong>2 Stroke</strong>, which proposes seven models from 15 to 80 HP. For the brand SELVA Nautica Lieto offers both sales service support.\"}','selva.jpg','selva.jpg',2,3,'www.selvamarine.com',4),(4,'TORQEEDO','torqeedo','{\"it\":\"Tecnologia pulita per questo marchio made in Germania. Si tratta di un\'Azienda leader nel campo dei motori elettrici anche se ha vita piuttosto recente essendo nata solo nel 2005.<br /><br /> Attualmente la gamma propone ben 25 differenti modelli a catalogo, con potenze da 1 a 80 HP, che vengono integrati da un\'ampia gamma di accessori, tra cui un sistema di alimentazione a energia solare, batterie al litio ad alta durata, App per smartphone, etc. <br /><br /> Ampia la gamma di soluzioni proposte, da quelle fuoribordo agli entrobordo, per barche a vela o motore, ibridi e non, con un unico obiettivo: il rispetto dell\'ambiente.\",\"en\":\"Clean technology for this brand made in Germany. It is a leader Company in the field of electric motors even though he lives rather recent having been born in 2005.<br /><br /> Currently, the range offers over 25 different models in the catalog, with power from 1 to 80 HP, which are supplemented by a wide range of accessories, including a solar power system, batteries high-life lithium, App for smart phones, etc. <br /><br />A wide range of solutions, from outboard to inboard, sailboat or motor, hybrid or not, with a single target: respect for the environment.\"}','torqeedo.jpg','torqeedo.jpg',3,2,'www.torqeedo.com',NULL),(5,'SAVER','saver','{\"it\":\"L\'azienda siciliana con sede a Piraino (ME) che maggiormente ha saputo capire e soddisfare le plurime esigenze dei diportisti, con una produzione che annovera attualmente ben 22 modelli, con misure che vanno dai 5,20 ai 10 metri, limite massimo che il Cantiere si è imposto per rimanere nell\'ambito dei natanti non soggetti ad immatricolazione.<br /><br />Questi 22 modelli sono a loro volta suddivisi in quattro importanti famiglie: <strong>Open</strong> (per chi sceglie di vivere l\'imbarcazione prettamente di giorno) con tre modelli; <strong>Walk Around</strong> ( per chi invece ama poter disporre degli stessi vantaggi di un open ma nel contempo poter disporre a bordo di un locale toilette separato o di una vera e propria cabina), con cinque modelli; <strong>Fisher</strong> (per gli amanti delle discipline alieutiche) con quattro modelli, ed infine la famiglia <strong>Cabin</strong>, la più numerosa con dieci modelli, ideale per chi desidera di più dalla propria imbarcazione e, a seconda della misura, vivere a bordo un\'intera vacanza o una semplice giornata grazie alle aree notte predisposte.\",\"en\":\"The Sicilian company based in Piraino (ME) that mostly has been able to understand and meet the multiple needs of sailors, with a production that currently lists no less than 22 models, with sizes ranging from 5.20 to 10 meters, the maximum limit Company has imposed to stay within the vessels not subject to registration in Italy. <br /><br />These 22 models are in turn divided into four major families: <strong>Open</strong> (for those who choose to live purely by day boat) with three models; <strong>Walk Around</strong> (for those who love to have the same advantages of an open but at the same time be able to have on board a separate toilet or a real cabin), with five models; <strong>Fisher</strong> (for lovers of fishing disciplines) with four models, and finally the <strong>Cabin</strong> line, the largest with ten models, ideal for those who want more from your vessel and, depending on the measure, live aboard or an entire vacation a simple day thanks to night prepared areas.\"}','saver.jpg','saver.jpg',3,2,'www.saverimbarcazioni.com',NULL),(6,'SAVER - MG','saver-mg','{\"it\":\"L\'azienda siciliana con sede a Piraino (ME) che maggiormente ha saputo capire e soddisfare le plurime esigenze dei diportisti, ha affiancato alla consolidata e conosciuta gamma d\'imbarcazioni in vetroresina anche una produzione di battelli pneumatici a marchio <strong>MG.</strong><br /><br />Si tratta di RIB curati nei dettagli e destinati ad un pubblico amante di tale tipo di mezzo nautico, che annovera misure dai 5,20 agli 8,30 metri fuoritutto, in continuo ampliamento. Punti di forza di questi battelli sono la grande vivibilità in coperta, con doppio prendisole (uno fisso a prua e l\'altro componibile a poppa), console di guida centrale ed una gavonatura in grado di accogliere tutto quanto serve a bordo.<br /><br />La motorizzazione è esclusivamente fuoribordo, in soluzione mono o bi-motorizzazione a seconda del modello.\",\"en\":\"The Sicilian company based in Piraino (ME) that mostly has been able to understand and meet the multiple needs of sailors, has joined the established and well-known range of  fiberglass boats, also a production of the <strong>MG</strong> brand inflatable boats.<br /><br />It is R.I.B. with attention to detail and are studied for a public lover of this type of nautical means, which includes measures from 5.20 to 8.30 meters overall, in continuous expansion Strengths of these R.I.B. are extremely comfort in deck, with double sunbathing (one fixed on the bow and the other fitted aft), central steering console and lockers able to accommodate everything you need on board.<br /><br />The engine is only outboard, in solution mono or bi-solution depending on the model.\"}','saver-mg.jpg','saver-mg.jpg',4,2,'www.saverimbarcazioni.com',NULL),(7,'JOKER BOAT','joker-boat','{\"it\":\"Storico brand italiano specializzato nella progettazione e costruzione di battelli pneumatici. Nato negli anni \'70 dall\'avventura imprenditoriale di Giuseppe Aiello, il marchio Joker Boat ha raggiunto una posizione sul mercato internazionale di primario livello, garantendo una gamma di prodotti con oltre 25 modelli che si estrinsecano attraverso le serie <strong>CLUBMAN, COASTER, JET TENDER, MAINSTREAM e WIDE</strong>.<br /><br />La <strong>Clubman</strong> è la serie essenziale e moderna con misure che vanno dai 5 agli 11 metri. La <strong>Coaster</strong> abbina un grande sfruttamento degli spazi a bordo a carene progettate da Franco Donno, con misure dai 4,70 ai 6,50 metri. La <strong>Jet Tender</strong>, come lascia intendere il nome, punta a soddisfare le esigenze di chi necessita di un tender o di un \'\'giocattolo\'\' nautico. La <strong>Mainstream</strong> invece da\' sfogo alla creatività ed al design, con estetica curata e massima comodità, il tutto distribuito su di una gamma che conta modelli dagli 8 agli 11 metri. Infine la <strong>Wide</strong>, una gamma recente che annovera carene e coperte più ampie al fine di ottimizzare la navigazione.\",\"en\":\"Historical Italian brand specialized in the design and construction of inflatable boats. Born in the \'70s by the adventure business of Giuseppe Aiello, the Joker Boat brand has reached a position on the international primary market, providing a range of products with over 25 models that are expressed through the series CLUBMAN, COASTER, JET TENDER, MAINSTREAM and WIDE</strong>. <br /><br />The <strong>Clubman</strong> is the essential and modern standard with sizes ranging from 5 to 11 meters. the <strong>Coaster</strong> combines a great use of space on board at a hulls designed by Franco Donno, with sizes from 4.70 to 6.50 meters. the <strong>Jet Tender</strong>, as the name implies, aims to meet the needs of those who need a dinghy or a \'\'toy\'\' boat. The <strong>Mainstream</strong> instead gives vent to creativity and design, with a very clean appearance and maximum comfort, all distributed over a range of matters models from 8 to 11 meters. Finally the <strong>Wide</strong> family, a recent range that includes broader hulls and deck in order to optimize the navigation.\"}','joker-boat.jpg','joker-boat.jpg',4,2,'www.jokerboat.it',NULL),(8,'GARMIN','garmin','{\"it\":\"La Nautica Lieto è Centro GARMIN, vero e proprio punto di riferimento locale per i prodotti della società americana leader nella strumentazione elettronica di bordo. <br /><br />Che si tratti di un apparato multifunzione per navigare come nel caso dei Chartplotter di ultimissima generazione della serie <strong>GPSMAP</strong>, con schermi touchscreen e display che arrivano sino a 24\'\', funzione ecoscandaglio con tecnologia CHIRP, ClearVü e SideVü, o ancora che si tratti di un modulo eco professionale della serie <strong>GSD</strong>, o di ecoscandagli con GPS e fishfinder come quelli della serie <strong>STRIKER</strong> con tecnologia CHIRP DownVü e ClearVü e schermi ad altissima risoluzione o ancora che si sia interessati al trasduttore di ultima generazione Panoptix, l\'utente potrà sempre trovare il meglio al momento sul mercato.<br /><br /> Inoltre presso questo centro sarà anche possibile acquistare antenne radar, autopiloti, radio VHF, Smartwatch e GPS, telecamere ed Action cam, bussole ed accessori vari, oltre ad una comoda serie di App scaricabili.\",\"en\":\"Nautica Lieto is GARMIN Center, a real local landmark for products of the American company leader in the on-board electronics.<br /><br />Whether it\'s a multi-function device to browse as in the case of plotters of the latest generation of the <strong>GPSMAP</strong> series, with touchscreens and displays that reach up to 24\'\', depth sounder mode with CHIRP technology, ClearVú and SideVü, or that it is a form professional echo of <strong>GSD</strong> series, or with GPS and fishfinder sounders like those of <strong>STRIKER</strong> series with CHIRP technology and DownVü ClearVú and screens very high resolution or that it is interested in the transducer <strong>Panoptix</strong> last generation, the user can always find best currently on the market.<br /><br />Also at this center you can also buy radar antennas, autopilot, VHF radio, GPS and Smartwatch, Camera and Action Cam, compasses and various accessories, as well as a comfortable suite of downloadable Apps.\"}','garmin.jpg','garmin.jpg',5,2,'www.garmin.com',NULL),(9,'ELLEBI','ellebi','{\"it\":\"Per chi vuole trasferire la propria imbarcazione o il proprio gommone da una località all\'altra, o semplicemente programmare la propria vacanza itinerante senza vincoli di sorta, il carrello portaimbarcazioni diventa elemento indispensabile.<br /><br />A tale proposito la Nautica Lieto è concessionaria dei prodotti a marchio ELLEBI, leader nel settore grazie ad una gamma completa di soluzioni ed a prodotti qualitativamente al top.<br /><br />L\'azienda ELLEBI è fornitrice di ganci traino da installare sull\'autovettura, e nel contempo mette a disposizione una molteplicità di soluzioni per rimorchiare il proprio mezzo, che si tratti di scafo (a vela o a motore) o moto d\'acqua, in soluzione mono asse. I rimorchi hanno diverse portate e sono equipaggiabili con una serie di accessori che meglio si adattano alla carena del mezzo nautico da trasportare.\",\"en\":\"For those who want to transfer your boat or your boat from one location to another, or simply plan their walking holiday without any restrictions, the bogie for road transfer become indispensable. <br /><br />In this regard, Nautica Lieto\'s is a dealership in ELLEBI brand, a leader in this industry brand with a comprehensive range of solutions and products in top quality. <br /><br />ELLEBI is a company supplier of towing hooks to install on the car, and at the same time provides a variety of solutions to tow their vehicles, be it hull (sailing or motor) or jet skis, in solution mono axis. The trailers have different flow rates and can be equipped with a range of accessories that are best suited to the hull of the means to transport water.\"}','ellebi.jpg','ellebi.jpg',6,2,'www.ellebi.com',NULL),(10,'CASTOLDI','castoldi','{\"it\":\"E\' da sempre considerata l\'Azienda innovatrice per ciò che concerne le motorizzazioni a idrogetto, e grazie alla qualità dei suoi prodotti è diventata leader mondiale del settore. <br /><br />L\'Azienda, nata nel 1962, è certificata ISO 9001 e tutti i suoi modelli rispondono appieno ai requisiti ABS, BV, DNV, RINA, RMRS e RRR. La produzione include i <strong>Waterjet</strong>, studiati appositamente per un uso marino in sostituzione dei tradizionali sistemi propulsivi, la gamma <strong>Jet Tenders</strong>, ossia battelli pneumatici equipaggiati con motorizzazioni waterjet e disponibili in misure da 14 sino a 33 piedi, e <strong>Jet Craft</strong> per impieghi \'\'da lavoro” di tali motorizzazioni. <br /><br />La Nautica Lieto si occupa da anni di fornire assistenza e manutenzione ai motori di produzione Castoldi.\",\"en\":\"It\'s considered to be the innovator with regard to jet engines, and thanks to the quality of its products has become a world leader in the sector. <br /><br />The Company, founded in 1962, is certified ISO 9001 and all of its models are ideally suited to the requirements of ABS, BV, DNV, RINA, RMRS and RRR. The production includes <strong>Waterjet</strong>, designed specifically for marine use in alternative of traditional propulsion systems, the <strong>Jet Tenders</strong> range, dinghies equipped with waterjet engines and available in sizes from 14 up to 33 feet, and <strong>Jet Craft</strong> for \'\'work applications\'\' of such engines. <br /><br />The Nautica Lieto has been concerned for years to provide support and maintenance to Castoldi production engines.\"}','castoldi.jpg','',7,1,'www.castoldijet.it',7),(11,'FIART','fiart','{\"it\":\"La Nautica Lieto è da anni centro di assistenza autorizzato per le imbarcazioni del prestigioso marchio che ha sede a Baia (NA). <br /><br />Il cantiere, che ha fatto dell\'eleganza una delle sue \'\'mission\'\', è nato nel 1960 per volontà del fondatore, cavaliere Ruggiero di Luggo ed oggi mantiene ancora tutto il fascino di un tempo, vista la creatività e cura maniacale con cui ogni imbarcazione a marchio FIART viene prodotta.<br /><br />Un\'azienda che raggruppa al suo interno ebanisti, progettisti, maestri d\'ascia e maestranze qualificate al fine di garantire prodotti di altissima fattura che oggi sono anche vanto italiano all\'estero.\",\"en\":\"The Nautica Lieto has for years been an authorized service center for craft of the prestigious brand which is based in Baia (NA). <br /><br />The yard, which has made elegance one of his \'\'mission\'\', was born in 1960 by the founder, the knight Ruggiero di Luggo and still retains all the charm of yesteryear, given the creativity and meticulous care with which every boat to FIART brand it is produced. <br /><br />A company that brings together inside cabinet makers, designers, carpenters and qualified workers in order to ensure the highest quality products that today are also Italian pride abroad.\"}','fiart.jpg','',7,1,'www.fiart.com',6),(12,'VOLVO PENTA','volvo-penta','{\"it\":\"Marchio conosciuto a livello mondiale per la qualità e quantità dei suoi prodotti, che si estrinsecano dall\'ambito industriale a quello più ludico e diportistico. <br /><br />Volvo Penta è un marchio che fa parte del Gruppo Volvo e che include oltre al settore marino anche quello degli autoveicoli, dei camion, degli autobus e delle macchine per le grandi costruzioni. <br /><br />I motori per uso marino si distinguono per ambito commerciale e diportistico. Questi ultimi, sia alimentati a benzina che diesel, si distinguono in entrobordo ed entrofuoribordo, sia a supporto delle imbarcazioni a vela che primari su quelle a motore, cui si aggiunge la serie <strong>IPS</strong>, un sistema definito \'\'geniale” per effetto delle sue doppie eliche controrotanti rivolte a prua e delle trasmissioni orientabili che lo fanno diventare un\'alternativa moderna ai tradizionali entrobordo. La Nautica Lieto è Centro Assistenza Autorizzato.\",\"en\":\"Worldwide brand known for the quality and quantity of its products that are expressed from the industrial to the more playful and recreational. <br /><br />Volvo Penta is a brand that is part of the Volvo Group and that includes in addition to the marine sector also that of cars, trucks, buses and for large construction equipment. <br /><br />The engines for marine use are characterized by commercial and recreational area. The latter, both gasoline-powered and diesel, are distinguished in sterndrive and inboard, both in support of the sailing boats or on the primary motor on motor-boats, plus the <strong>IPS</strong> series, a system called \'\'genius\'\' as a result of its double helices counter facing the bow and directional transmissions that make it a modern alternative to traditional inboard. The Nautica Lieto\'s Authorized Service Center Volvo Penta.\"}','volvo-penta.jpg','',7,1,'www.volvopenta.com',3),(13,'YANMAR','yanmar','{\"it\":\"Marchio giapponese ultracentenario presente sia nel settore nautico che dell\'agricoltura, ma che si occupa anche di generatori di corrente, sistemi di condizionamento e prodotti per uso industriale. <br /><br />In ambito marino, sia commerciale che diportistico, è marchio conosciuto per i suoi entrobordo ed entrofuoribordo diesel, con potenze che vanno dai 9 sino ai 440 HP, per il sistema di trasmissione <strong>Y-Pod</strong> per potenze da 427 a 440 HP o per la trasmissione idraulica <strong>ZT370</strong>, e per il recente apparato <strong>E-dock</strong>, un joystick che fornisce assistenza in fase di manovra, combinando i propulsori YANMAR e l\'elica di prua.\",\"en\":\"Japanese centenarian brand  present in both the marine industry and agriculture, but also deals with power generators, air conditioning systems and products for industrial use. <br /><br />For marine applications, both commercial and recreational, is known for its brand diesel inboard and stern drive, with capacities ranging from 9 up to 440 HP, for the <strong>Y-Pod</strong> transmission system for power ratings from 427 to 440 HP or broadcasting hydraulic <strong>ZT370</strong>, and the recent apparatus <strong>E-dock</strong>, a joystick that provides assistance when maneuvering, combining the YANMAR engines and bow thruster.\"}','yanmar.jpg','',7,1,'www.yanmaritalia.it',8),(14,'FNM','fnm','{\"it\":\"Marchio motoristico tutto italiano che fa capo alla famiglia Negri, la C.M.D. (Costruzione Motori Diesel) – FNM è riconosciuta a livello mondiale quale leader per lo sviluppo di motori diesel ed a benzina di avanzata tecnologia. <br /><br />Operante da più di trent\'anni nel settore automotive e marino, l\'Azienda è attiva in \'\'ogni fase di sviluppo del motore, a partire dal layout sino alla sua produzione\'\'. <br /><br />La tecnologia messa in campo da FNM interessa diversi campi motoristici, dall\'aeronautica all\'automotive, dai generatori alle centraline elettroniche ed ovviamente il settore marino, nel quale è presente con una serie di soluzioni, sia entrobordo che entrofuoribordo, per tutte le necessità. <br /><br />La Nautica Lieto è Centro di Assistenza Autorizzata del marchio.\",\"en\":\"Motorsport Italian brand which belongs to the Negri family, C.M.D. (Construction Diesel Engines) - FNM is recognized worldwide as a leader in the development of diesel engines and advanced technology gasoline. <br /><br />Operating for more than thirty years in the automotive and marine sector, the Company is active in \'\'every phase of engine development, starting from the layout until its production.\'\' <br /><br />The technology used by FNM interested in different motorsport fields, from aeronautics to automotive and from the electronic control units generators and of course the marine industry, where it is present with a range of solutions, both inboard sterndrives, for all needs. <br /><br />The Nautica Lieto is authorized service center of the brand.\"}','fnm.jpg','',7,1,'www.fnm-marine.com',5);
/*!40000 ALTER TABLE `prodotti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usato`
--

DROP TABLE IF EXISTS `usato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descr` longtext NOT NULL,
  `tecniche` longtext NOT NULL,
  `accessori` longtext NOT NULL,
  `url` varchar(100) NOT NULL,
  `img_home` varchar(45) NOT NULL,
  `img_banner` varchar(45) NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `url_UNIQUE` (`url`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usato`
--

LOCK TABLES `usato` WRITE;
/*!40000 ALTER TABLE `usato` DISABLE KEYS */;
INSERT INTO `usato` VALUES (1,'Seapower GT 550','{\"it\":\"Gommone a chiglia rigida Seapower GT 550 a € 17.000,00 (Anno 2016)\",\"en\":\"Inflatable boat Seapower GT 550 at € 17.000,00 (Year 2016)\"}','{\"it\":[\"Lunghezza Fuori tutto: 550 cm\",\"Larghezza Fuori tutto: 250cm\",\"Peso : 420KG\",\"Dimensioni prendisole di poppa: 184cm x100cm\",\"Portata massima passeggeri: 8\",\"Categoria di  appartenenza: C\",\"Massima potenza applicabile: 85Kw (115Hp)\",\"Diametro tubolari: 54 cm\",\"Tessuto Hypalon 1100dtx\",\"Motore fb Evinrude 115 HP\"],\"en\":[\"Lenght all: 550 cm\",\"Width all: 250cm\",\"Weight : 420KG\",\"Aft sunbathing size: 184cm x100cm\",\"Persons capacity: 8\",\"Navigation category: C\",\"Engine max: 85Kw (115Hp)\",\"Tubular’s diameter: 54 cm\",\"Hypalon 1100dtx\",\"Engine O.B. Evinrude 115 HP\"]}','{\"it\":\"Cuscineria completa DE LUXE BICOLORE a cellule chiuse, con spalliera integrata a 3 posizioni - Console di guida con sedile passeggero frontale - Gavone portaoggetti stagno - Volante DE LUXE e timoneria completa ULTRAFLEX - Pannello elettrico comandi  a 3 posizioni - Pompa di sentina - Spiaggine di poppa con scaletta estraibile in acciaio - Impianto doccia - Tendalino con prolunga - Eco Garmin - Serbatoio carburante 90 lt.\",\"en\":\"Deluxe two-tone cushions, closed cell, with integrated 3-position backrest - Console with front passenger seat - DE LUXE wheel and ULTRAFLEX steering - Check panel with 3 position - Bilge pump - Stern platform with stainless steel bathing ladder - Shower kit - Bimini with extension - Eco Garmin - Fuel tank 90 lt.\"}','seapower-gt-550','seapower-gt-550.jpg','seapower-gt-550_banner.jpg',0),(2,'Callegari Olimpus 50','{\"it\":\"Gommone a chiglia rigida Callegari Olimpus 50 a € 12.000,00 (Anno 2010)\",\"en\":\"Inflatable boat Callegari Olimpus 50 at € 12.000,00 (Year 2010)\"}','{\"it\":[\"Lunghezza Fuori tutto: 485 cm\",\"Larghezza Fuori tutto: 230 cm\",\"Peso : 290 KG\",\"Portata massima passeggeri: 9\",\"Categoria di  appartenenza: C\",\"Massima potenza applicabile: 80 Hp\",\"Diametro tubolari: 48 cm\",\"Motore fb Mercury 40/60 4 Tempi elica inox anno 2015\"],\"en\":[\"Lenght all: 485 cm\",\"Width all: 230 cm\",\"Weight : 290 KG\",\"Persons capacity: 9\",\"Navigation category: C\",\"Engine max: 80 Hp\",\"Tubular’s diameter: 48 cm\",\"Engine O.B. Mercury 40/60 Four stroke 2015 with stainless steel propeller\"]}','{\"it\":\"Impianto doccia con serbatoio acqua da lt. 50 floscio - Cuscineria nuova del 2016 - Impianto elettrico 2016 - Flexiteek totale - Lowrance Eco7 GPS CHIRP - Serbatoio carburante da lt. 80 con indicatore - Antifurto meccanico + antifurto elettronico - Tendalino alluminio - Schienale poppa trasformabile in prendisole\",\"en\":\"Shower kit with water tank 50 l. - Cushions new 2016 - Electric plant 2016 - Total Flexiteek - DE LUXE wheel and ULTRAFLEX steering - Lowrance Eco7 GPS CHIRP - Fuel tank 80 lt. with level indicator - Mechanical and electronic anti-theft - Bimini in aluminium - Back aft convertible sun\"}','callegari-olimpus-50','callegari-olimpus-50.jpg','null.jpg',0),(3,'Evinrude 200 HO','{\"it\":\"Motore fuoribordo Evinrude 200 H.O. G2 (2T)  a € 14.000,00 trattabili (Anno 2016)\",\"en\":\"Engine O.B. Evinrude 200 H.O. G2 (2T) at € 14.000,00 tractable (Year 2016)\"}','{\"it\":[\"N° cilindri: 6 a V 74°\",\"Cilindrata: 3.441 cc\",\"Alimentazione: Iniezione diretta E-TEC\",\"38 ore di moto\",\"Piede lungo\"],\"en\":[\"n. cilynders: 6 V 74°\",\"Displacement:  3.441 cc\",\"Feeding system: Direct Injection E-TEC\",\"38 hours work\",\"Foot \'L\'\"]}','{\"it\":\"\",\"en\":\"\"}','evinrude-200-ho','evinrude-200-ho.jpg','evinrude-200-ho_banner.jpg',1),(4,'Zar 43 Formenti','{\"it\":\"Gommone a chiglia rigida ZAR 43 FORMENTI a € 14.500,00 (Anno 2012)\",\"en\":\"Inflatable boat ZAR 43 FORMENTI at € 14.500,00 (Year 2012)\"}','{\"it\":[\"Lunghezza Fuori tutto: 450 cm\",\"Larghezza Fuori tutto: 216 cm\",\"Peso : 300 KG\",\"Portata massima passeggeri: 7\",\"Categoria di  appartenenza: C\",\"Massima potenza applicabile: 90 Hp\",\"Diametro tubolari: 49 cm\",\"Motore fb Evinrude E-TEC 90 hp anno 2012 (scadenza garanzia 03/2017)\",\"Carrello SATELLITE MX081/RE con ruota di scorta anno 2012\"],\"en\":[\"Lenght all: 450 cm\",\"Width all: 216 cm\",\"Weight : 300 KG\",\"Persons capacity: 7\",\"Navigation category: C\",\"Engine max: 90 hp\",\"Tubular’s diameter: 49 cm\",\"Engine O.B. Evinrude E-TEC 90 2012\",\"Trolling SATELLITE MX081/RE with spare wheel\"]}','{\"it\":\"Serbatoio carburante in polietilene da 100 litri - Aspiratore gas vano serbatoio - Roll bar ribaltabile completo di luci di via e tromba - Pompa di sentina - Cappottina telescopica con prolunga a prua - Imbottiture di prua - Serbatoio acqua con impianto doccia - Plancette risalita con scaletta telescopica e maniglia - N. 4 altoparlanti - Bussola\",\"en\":\"Fuel tank 100 l in polyethylene - Gas aspirator tank compartment - Folding roll-bar complete with horn and navigation lights - Bilge pump - Bimini with telescopic extension in bow - Bow Fillings - Water tank with shower plant - Stern platform with telescopic ladder and handle - N. 4 speakers - Compass\"}','zar-43-formenti','zar-43-formenti.jpg','null.jpg',0),(36,'prova','{\"it\":\"prova mod\",\"en\":\"edit test\"}','{\"it\":[\"aaa\",\"sdfds\"],\"en\":[\"sdfsdf\",\"sdfsdf\"]}','{\"it\":\"bla bla bla\",\"en\":\"bla bla bka\"}','prova','m6YAKWqe.jpg','null.jpg',1),(37,'dgdfg','{\"it\":\"dfgdfg\",\"en\":\"dfgdfg\"}','{\"it\":\"\",\"en\":\"\"}','{\"it\":\"\",\"en\":\"\"}','dgdfg','null.jpg','null.jpg',1);
/*!40000 ALTER TABLE `usato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usato_pics`
--

DROP TABLE IF EXISTS `usato_pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usato_pics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usato` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usato_pics`
--

LOCK TABLES `usato_pics` WRITE;
/*!40000 ALTER TABLE `usato_pics` DISABLE KEYS */;
INSERT INTO `usato_pics` VALUES (1,1,'seapower-gt-550_01.jpg'),(2,1,'seapower-gt-550_02.jpg'),(3,1,'seapower-gt-550_03.jpg'),(4,1,'seapower-gt-550_04.jpg'),(5,1,'seapower-gt-550_05.jpg'),(6,2,'callegari-olimpus-50_01.jpg'),(7,2,'callegari-olimpus-50_02.jpg'),(8,2,'callegari-olimpus-50_03.jpg'),(9,2,'callegari-olimpus-50_04.jpg'),(10,2,'callegari-olimpus-50_05.jpg'),(11,2,'callegari-olimpus-50_06.jpg'),(12,2,'callegari-olimpus-50_07.jpg'),(13,2,'callegari-olimpus-50_08.jpg'),(14,2,'callegari-olimpus-50_09.jpg'),(15,2,'callegari-olimpus-50_10.jpg'),(16,3,'evinrude-200-ho_01.jpg'),(17,3,'evinrude-200-ho_02.jpg'),(18,3,'evinrude-200-ho_03.jpg'),(19,3,'evinrude-200-ho_04.jpg'),(20,36,'Eq2WLiTs.jpg'),(21,36,'JqPGbpTU.jpg'),(22,36,'wm2THBOV.jpg'),(23,36,'s5iQPrqc.jpg'),(33,36,'P3XvMZqb.jpg');
/*!40000 ALTER TABLE `usato_pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'nauticalieto','8b2a98ae1527e59dea1d68452ae422be3c5d0626',1,'2017-06-08 15:37:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-08 20:57:55
