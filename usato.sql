-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: lieto
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.14.04.1

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
  UNIQUE KEY `url_UNIQUE` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usato`
--

LOCK TABLES `usato` WRITE;
/*!40000 ALTER TABLE `usato` DISABLE KEYS */;
INSERT INTO `usato` VALUES (1,'Seapower GT 550','{\"it\":\"Gommone a chiglia rigida Seapower GT 550 a € 17.000,00 (Anno 2016)\",\"en\":\"Inflatable boat Seapower GT 550 at € 17.000,00 (Year 2016)\"}','{\"it\":[\"Lunghezza Fuori tutto: 550 cm\",\"Larghezza Fuori tutto: 250cm\",\"Peso : 420KG\",\"Dimensioni prendisole di poppa: 184cm x100cm\",\"Portata massima passeggeri: 8\",\"Categoria di  appartenenza: C\",\"Massima potenza applicabile: 85Kw (115Hp)\",\"Diametro tubolari: 54 cm\",\"Tessuto Hypalon 1100dtx\",\"Motore fb Evinrude 115 HP\"],\"en\":[\"Lenght all: 550 cm\",\"Width all: 250cm\",\"Weight : 420KG\",\"Aft sunbathing size: 184cm x100cm\",\"Persons capacity: 8\",\"Navigation category: C\",\"Engine max: 85Kw (115Hp)\",\"Tubular’s diameter: 54 cm\",\"Hypalon 1100dtx\",\"Engine O.B. Evinrude 115 HP\"]}','{\"it\":\"Cuscineria completa DE LUXE BICOLORE a cellule chiuse, con spalliera integrata a 3 posizioni - Console di guida con sedile passeggero frontale - Gavone portaoggetti stagno - Volante DE LUXE e timoneria completa ULTRAFLEX - Pannello elettrico comandi  a 3 posizioni - Pompa di sentina - Spiaggine di poppa con scaletta estraibile in acciaio - Impianto doccia - Tendalino con prolunga - Eco Garmin - Serbatoio carburante 90 lt.\",\"en\":\"Deluxe two-tone cushions, closed cell, with integrated 3-position backrest - Console with front passenger seat - DE LUXE wheel and ULTRAFLEX steering - Check panel with 3 position - Bilge pump - Stern platform with stainless steel bathing ladder - Shower kit - Bimini with extension - Eco Garmin - Fuel tank 90 lt.\"}','seapower-gt-550','seapower-gt-550.jpg','seapower-gt-550_banner.jpg',1),(2,'Callegari Olimpus 50','{\"it\":\"Gommone a chiglia rigida Callegari Olimpus 50 a € 12.000,00 (Anno 2010)\",\"en\":\"Inflatable boat Callegari Olimpus 50 at € 12.000,00 (Year 2010)\"}','{\"it\":[\"Lunghezza Fuori tutto: 485 cm\",\"Larghezza Fuori tutto: 230 cm\",\"Peso : 290 KG\",\"Portata massima passeggeri: 9\",\"Categoria di  appartenenza: C\",\"Massima potenza applicabile: 80 Hp\",\"Diametro tubolari: 48 cm\",\"Motore fb Mercury 40/60 4 Tempi elica inox anno 2015\"],\"en\":[\"Lenght all: 485 cm\",\"Width all: 230 cm\",\"Weight : 290 KG\",\"Persons capacity: 9\",\"Navigation category: C\",\"Engine max: 80 Hp\",\"Tubular’s diameter: 48 cm\",\"Engine O.B. Mercury 40/60 Four stroke 2015 with stainless steel propeller\"]}','{\"it\":\"Impianto doccia con serbatoio acqua da lt. 50 floscio - Cuscineria nuova del 2016 - Impianto elettrico 2016 - Flexiteek totale - Lowrance Eco7 GPS CHIRP - Serbatoio carburante da lt. 80 con indicatore - Antifurto meccanico + antifurto elettronico - Tendalino alluminio - Schienale poppa trasformabile in prendisole\",\"en\":\"Shower kit with water tank 50 l. - Cushions new 2016 - Electric plant 2016 - Total Flexiteek - DE LUXE wheel and ULTRAFLEX steering - Lowrance Eco7 GPS CHIRP - Fuel tank 80 lt. with level indicator - Mechanical and electronic anti-theft - Bimini in aluminium - Back aft convertible sun\"}','callegari-olimpus-50','callegari-olimpus-50.jpg','null.jpg',1),(3,'Evinrude 200 HO','{\"it\":\"Motore fuoribordo Evinrude 200 H.O. G2 (2T)  a € 14.000,00 trattabili (Anno 2016)\",\"en\":\"Engine O.B. Evinrude 200 H.O. G2 (2T) at € 14.000,00 tractable (Year 2016)\"}','{\"it\":[\"N° cilindri: 6 a V 74°\",\"Cilindrata: 3.441 cc\",\"Alimentazione: Iniezione diretta E-TEC\",\"38 ore di moto\",\"Piede lungo\"],\"en\":[\"n. cilynders: 6 V 74°\",\"Displacement:  3.441 cc\",\"Feeding system: Direct Injection E-TEC\",\"38 hours work\",\"Foot \'L\'\"]}','{\"it\":\"\",\"en\":\"\"}','evinrude-200-ho','evinrude-200-ho.jpg','null.jpg',1),(4,'Zar 43 Formenti','{\"it\":\"Gommone a chiglia rigida ZAR 43 FORMENTI a € 14.500,00 (Anno 2012)\",\"en\":\"Inflatable boat ZAR 43 FORMENTI at € 14.500,00 (Year 2012)\"}','{\"it\":[\"Lunghezza Fuori tutto: 450 cm\",\"Larghezza Fuori tutto: 216 cm\",\"Peso : 300 KG\",\"Portata massima passeggeri: 7\",\"Categoria di  appartenenza: C\",\"Massima potenza applicabile: 90 Hp\",\"Diametro tubolari: 49 cm\",\"Motore fb Evinrude E-TEC 90 hp anno 2012 (scadenza garanzia 03/2017)\",\"Carrello SATELLITE MX081/RE con ruota di scorta anno 2012\"],\"en\":[\"Lenght all: 450 cm\",\"Width all: 216 cm\",\"Weight : 300 KG\",\"Persons capacity: 7\",\"Navigation category: C\",\"Engine max: 90 hp\",\"Tubular’s diameter: 49 cm\",\"Engine O.B. Evinrude E-TEC 90 2012\",\"Trolling SATELLITE MX081/RE with spare wheel\"]}','{\"it\":\"Serbatoio carburante in polietilene da 100 litri - Aspiratore gas vano serbatoio - Roll bar ribaltabile completo di luci di via e tromba - Pompa di sentina - Cappottina telescopica con prolunga a prua - Imbottiture di prua - Serbatoio acqua con impianto doccia - Plancette risalita con scaletta telescopica e maniglia - N. 4 altoparlanti - Bussola\",\"en\":\"Fuel tank 100 l in polyethylene - Gas aspirator tank compartment - Folding roll-bar complete with horn and navigation lights - Bilge pump - Bimini with telescopic extension in bow - Bow Fillings - Water tank with shower plant - Stern platform with telescopic ladder and handle - N. 4 speakers - Compass\"}','zar-43-formenti','zar-43-formenti.jpg','null.jpg',1);
/*!40000 ALTER TABLE `usato` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-03 15:59:10
