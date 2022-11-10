-- MariaDB dump 10.19  Distrib 10.6.7-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: r31n
-- ------------------------------------------------------
-- Server version	10.6.7-MariaDB-2ubuntu1.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `GPSLOG`
--

DROP TABLE IF EXISTS `GPSLOG`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GPSLOG` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) unsigned NOT NULL,
  `missionId` int(11) unsigned NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `latitude` double(12,8) DEFAULT NULL,
  `longitude` double(12,8) DEFAULT NULL,
  `altitude` int(11) DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  `heading` int(11) DEFAULT NULL,
  `datum` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GPSLOG`
--

LOCK TABLES `GPSLOG` WRITE;
/*!40000 ALTER TABLE `GPSLOG` DISABLE KEYS */;
INSERT INTO `GPSLOG` VALUES (4,1,1,'test','test 123',53.10000000,7.10000000,20,5,90,'2022-10-04 10:11:12'),(5,1,1,'test','test 123',53.20000000,7.20000000,20,5,90,'2022-10-04 11:11:12'),(6,1,1,'test','test 123',53.10000000,7.20000000,20,5,90,'2022-10-04 12:11:12'),(7,1,1,'test','test 123',53.00000000,7.20000000,20,5,90,'2022-10-04 12:11:12'),(8,1,1,'test','test 123',52.90000000,7.20000000,20,5,90,'2022-10-04 12:11:12');
/*!40000 ALTER TABLE `GPSLOG` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LOGBOOK`
--

DROP TABLE IF EXISTS `LOGBOOK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LOGBOOK` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) unsigned NOT NULL,
  `missionId` int(11) unsigned NOT NULL,
  `coordinate` point NOT NULL,
  `datum` datetime NOT NULL,
  `data` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LOGBOOK`
--

LOCK TABLES `LOGBOOK` WRITE;
/*!40000 ALTER TABLE `LOGBOOK` DISABLE KEYS */;
/*!40000 ALTER TABLE `LOGBOOK` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MEDIA`
--

DROP TABLE IF EXISTS `MEDIA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MEDIA` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) unsigned NOT NULL,
  `missionId` int(11) unsigned NOT NULL,
  `latitude` double(12,8) DEFAULT NULL,
  `longitude` double(12,8) DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(32) DEFAULT NULL,
  `mimetype` varchar(64) NOT NULL,
  `filesize` int(11) unsigned NOT NULL,
  `uri` varchar(255) NOT NULL,
  `datum` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MEDIA`
--

LOCK TABLES `MEDIA` WRITE;
/*!40000 ALTER TABLE `MEDIA` DISABLE KEYS */;
INSERT INTO `MEDIA` VALUES (1,1,9,NULL,NULL,'sdf','sdfsfds','',0,'','2022-10-20 00:00:00'),(2,1,9,0.00000000,0.00000000,'1667088116_b3e12ad3f30728339f61.','','image/jpeg',1625325,'','2022-02-02 02:02:02'),(3,1,9,0.00000000,0.00000000,'1667089743_b18a02bb8feebd258574.','','image/jpeg',4266719,'/home/rein/public_html/r31n/writable//uploads/20221030/1667089743_b18a02bb8feebd258574.jpg','2020-06-19 21:07:24'),(4,1,6,0.00000000,0.00000000,'1667090240_15ee474c928240ae8fca.','','image/jpeg',2102248,'/home/rein/public_html/r31n/writable//uploads/20221030/1667090240_15ee474c928240ae8fca.jpg','2019-10-19 12:45:42'),(5,1,8,0.00000000,0.00000000,'1667255127_4c34c76061f317772ad7.','','image/jpeg',2104478,'/home/rein/public_html/r31n/writable/uploads/20221031/1667255127_4c34c76061f317772ad7.jpg','2019-10-19 12:45:41'),(6,1,9,0.00000000,0.00000000,'1667375068_5e102d5529ebbc6959c0.','','image/jpeg',178966,'/home/rein/public_html/r31n/writable/uploads/20221102/1667375068_5e102d5529ebbc6959c0.jpg','2022-11-02 08:44:28'),(7,1,9,0.00000000,0.00000000,'1667375068_228ead1a1ee5531e72e0.','','image/jpeg',1625325,'/home/rein/public_html/r31n/writable/uploads/20221102/1667375068_228ead1a1ee5531e72e0.jpg','2014-01-31 04:29:33'),(8,1,7,0.00000000,0.00000000,'1667379368_d66f6a5267e184c04cef.','','image/jpeg',167995,'/home/rein/public_html/r31n/writable/uploads/20221102/1667379368_d66f6a5267e184c04cef.jpeg','2022-11-02 09:56:08'),(9,1,7,0.00000000,0.00000000,'1667379371_2aa8d3094b92096a0cba.','','image/jpeg',167995,'/home/rein/public_html/r31n/writable/uploads/20221102/1667379371_2aa8d3094b92096a0cba.jpeg','2022-11-02 09:56:11'),(10,1,7,0.00000000,0.00000000,'1667379555_365976de5265e5e420fc.','','image/jpeg',167995,'/home/rein/public_html/r31n/writable/uploads/20221102/1667379555_365976de5265e5e420fc.jpeg','2022-11-02 09:59:15'),(11,1,7,0.00000000,0.00000000,'1667379555_f392f0c1526894001f96.','','image/jpeg',37870,'/home/rein/public_html/r31n/writable/uploads/20221102/1667379555_f392f0c1526894001f96.jpg','2022-11-02 09:59:15'),(12,1,7,0.00000000,0.00000000,'1667379555_09e1c4abd68f84390787.','','image/jpeg',38671,'/home/rein/public_html/r31n/writable/uploads/20221102/1667379555_09e1c4abd68f84390787.jpg','2022-11-02 09:59:15'),(13,1,5,0.00000000,0.00000000,'1667602669_602e536e3caaa46515b3.','','image/jpeg',2677407,'/home/rein/public_html/r31n/writable/uploads/20221104/1667602669_602e536e3caaa46515b3.jpg','2022-11-04 23:57:49'),(14,1,5,0.00000000,0.00000000,'1667602669_bd4ae1de8e37bc967fce.','','image/jpeg',9163,'/home/rein/public_html/r31n/writable/uploads/20221104/1667602669_bd4ae1de8e37bc967fce.jpg','2022-11-04 23:57:49'),(15,1,5,0.00000000,0.00000000,'1667602669_bd501d227229e9a34d68.','','image/jpeg',46528,'/home/rein/public_html/r31n/writable/uploads/20221104/1667602669_bd501d227229e9a34d68.jpg','2022-11-04 23:57:49'),(16,1,5,0.00000000,0.00000000,'1667602695_7cea18bb12184a35639b.','','image/jpeg',4099928,'/home/rein/public_html/r31n/writable/uploads/20221104/1667602695_7cea18bb12184a35639b.jpg','2022-11-04 23:58:15'),(17,1,5,0.00000000,0.00000000,'1667602695_c2554a870ac85ffb5546.','','image/jpeg',1291207,'/home/rein/public_html/r31n/writable/uploads/20221104/1667602695_c2554a870ac85ffb5546.jpg','2022-11-04 23:58:15'),(18,1,5,0.00000000,0.00000000,'1667602695_4dbd465504aada2c1954.','','image/jpeg',646432,'/home/rein/public_html/r31n/writable/uploads/20221104/1667602695_4dbd465504aada2c1954.jpg','2022-11-04 23:58:15'),(19,1,5,0.00000000,0.00000000,'1667602695_d668b1a40b955443cb01.','','image/jpeg',548486,'/home/rein/public_html/r31n/writable/uploads/20221104/1667602695_d668b1a40b955443cb01.jpg','2022-11-04 23:58:15'),(20,1,8,0.00000000,0.00000000,'1667609013_2706f5010a683cd01e92.','','image/jpeg',1149043,'/home/rein/public_html/r31n/writable/uploads/20221105/1667609013_2706f5010a683cd01e92.jpg','2022-11-05 01:43:33'),(21,1,8,0.00000000,0.00000000,'1667609013_046f661fdc7077089056.','','image/jpeg',682587,'/home/rein/public_html/r31n/writable/uploads/20221105/1667609013_046f661fdc7077089056.jpg','2022-11-05 01:43:33'),(22,1,8,0.00000000,0.00000000,'1667609013_afe8356596c0a58f44f0.','','image/jpeg',1051439,'/home/rein/public_html/r31n/writable/uploads/20221105/1667609013_afe8356596c0a58f44f0.jpg','2022-11-05 01:43:33'),(23,1,8,0.00000000,0.00000000,'1667609013_96c30f1cdd9d2504b640.','','image/jpeg',407334,'/home/rein/public_html/r31n/writable/uploads/20221105/1667609013_96c30f1cdd9d2504b640.jpg','2022-11-05 01:43:33');
/*!40000 ALTER TABLE `MEDIA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MISSION`
--

DROP TABLE IF EXISTS `MISSION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MISSION` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` int(11) unsigned DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  `data` text DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `finished` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MISSION`
--

LOCK TABLES `MISSION` WRITE;
/*!40000 ALTER TABLE `MISSION` DISABLE KEYS */;
INSERT INTO `MISSION` VALUES (1,NULL,'test mission','terra icognita','','2022-10-01 00:00:00','2022-11-01 00:00:00',1),(2,NULL,'tertt','erterttr','','2022-10-31 00:00:00','2022-10-21 00:00:00',1),(3,NULL,'frankrijk','Trip door Frankrijk met de tent en de auto langs fictieve plaatsen war we url geweest zijn','','2022-10-17 00:00:00','2022-10-17 00:00:00',1),(4,NULL,'lapland','lap','','2022-10-19 00:00:00','0000-00-00 00:00:00',1),(5,NULL,'drenthe','dr','','2022-10-12 00:00:00','2022-11-25 00:00:00',0),(6,NULL,'Holiday in Holland','rrrr j hhasjkhd kjash aasjk hkjash asjkh asjkld hwldjpwd jkw jqdhlkdj jkqw,dh qwlk ldkjhq wlkqwd dkjlhld kjhqw kljd  wkjdhw qwjk hkjdqwh dhqwk djh qwkjd hkjdhwq kjdhwqk djqwd','','2022-10-05 00:00:00','0000-00-00 00:00:00',1),(7,NULL,'Go shopping in Germany',' jkh jkasdjkaasdjkakjhkdhd jkh kj hjkh kj jk asjk sjkahd;skds;oop´dkjl w dkljsh asjhjkhdkl','','2022-10-20 00:00:00','0000-00-00 00:00:00',1),(8,NULL,'Mission to Mars','meeting the lizards','','2022-01-03 00:00:00','2022-10-19 00:00:00',1),(9,NULL,'Schotland',' jkfh fkjfh kfskjfh kjsfhfkjsfh sksdkjf dskjjkhsdkj djkh dkkfhjk kjfkjfhjkf hkfj','','2023-08-01 00:00:00','2022-11-08 00:00:00',1);
/*!40000 ALTER TABLE `MISSION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MISSION_PARTICIPANTS`
--

DROP TABLE IF EXISTS `MISSION_PARTICIPANTS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MISSION_PARTICIPANTS` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `missionRole` int(10) unsigned NOT NULL,
  `missionId` int(11) unsigned NOT NULL,
  `userId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MISSION_PARTICIPANTS`
--

LOCK TABLES `MISSION_PARTICIPANTS` WRITE;
/*!40000 ALTER TABLE `MISSION_PARTICIPANTS` DISABLE KEYS */;
/*!40000 ALTER TABLE `MISSION_PARTICIPANTS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MISSION_ROLES`
--

DROP TABLE IF EXISTS `MISSION_ROLES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MISSION_ROLES` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MISSION_ROLES`
--

LOCK TABLES `MISSION_ROLES` WRITE;
/*!40000 ALTER TABLE `MISSION_ROLES` DISABLE KEYS */;
/*!40000 ALTER TABLE `MISSION_ROLES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MISSION_TARGETS`
--

DROP TABLE IF EXISTS `MISSION_TARGETS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MISSION_TARGETS` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `missionId` int(11) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  `latitude` double(12,8) NOT NULL,
  `longitude` double(12,8) NOT NULL,
  `datum` datetime NOT NULL,
  `finished` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MISSION_TARGETS`
--

LOCK TABLES `MISSION_TARGETS` WRITE;
/*!40000 ALTER TABLE `MISSION_TARGETS` DISABLE KEYS */;
INSERT INTO `MISSION_TARGETS` VALUES (1,1,'ec','home',52.78855785,7.04512085,'2022-01-01 00:00:00',0),(2,1,'la','la',69.40198176,21.07615006,'2022-10-01 00:00:00',0),(3,8,'mars1','bf',51.58091847,5.64648223,'2022-10-01 00:00:00',0),(4,8,'mars2.2','weqwe',52.17237343,18.75555576,'2022-10-11 00:00:00',0),(5,9,'rotterdam','wqeq',51.95187632,4.43927978,'2022-08-01 00:00:00',0),(6,6,'De Rijp','Oudhollandse huisjes',52.55482610,4.84430961,'2022-11-10 00:00:00',0),(7,6,'Leiden','Bakkie koffie in Leiden',52.15898038,4.49248736,'2022-10-18 00:00:00',0),(8,7,'Berlin','hpt',52.43844703,13.34391734,'2022-10-21 00:00:00',0),(9,9,'edinburgh','vliegtuig',55.95126558,-3.35894114,'2022-08-02 00:00:00',0),(10,5,'ec','home',52.78810719,7.04526646,'2022-10-31 00:00:00',1),(11,5,'mm','mm',52.78657828,6.89544858,'2022-11-04 00:00:00',0),(12,5,'2#','gdfgffdgfgdfgdfgfgfgdggg hhh',52.90699817,6.76392887,'2022-11-30 00:00:00',0),(13,4,'iu','uyi  yui yui uyi yyiyu iuyi yu',69.06812769,20.56728395,'2022-10-25 00:00:00',0),(14,4,'gjh','hgj gjghj jghj ghjgh jghgh',69.05992840,20.54883906,'2022-11-04 00:00:00',0),(15,8,'saarbrucken','zum saarbrucken',49.23341521,6.95457648,'2022-11-25 00:00:00',0),(16,1,'fi','dfgfdsfd dfg fgd fg gdfgdfg dfgdfg df',64.80089451,24.94044536,'2023-01-19 00:00:00',0),(17,3,'home dh','groene',52.06733294,4.27020415,'2021-10-01 00:00:00',0),(18,9,'becraigs','fgdgf gdfg fgd',55.94910826,-3.59262720,'2022-08-03 00:00:00',0),(19,6,'hometown','assendelft',52.46829631,4.74370484,'2022-10-25 00:00:00',0),(20,6,'texel','tx',53.06046388,4.79610783,'2023-01-13 00:00:00',0),(21,6,'Terschelling','ter',53.37988453,5.24111890,'2023-01-19 00:00:00',0),(22,1,'Hamburg','de',53.99072273,8.98866456,'2022-03-01 00:00:00',0),(23,1,'se','se',57.70960608,12.20034185,'2022-05-05 00:00:00',0),(24,1,'no','no',63.55050239,11.12377218,'2022-06-01 00:00:00',0),(25,1,'ech','rch',53.03778810,8.32131933,'2022-02-02 00:00:00',0),(26,9,'callendar','cal',56.23577727,-4.18948880,'2022-08-04 00:00:00',0),(27,9,'fort william','fw',56.84121542,-5.05354985,'2022-08-05 00:00:00',0),(28,9,'inverness','torvean',57.46499333,-4.24937181,'2022-08-06 00:00:00',0),(29,3,'rouen','r',49.42172311,0.78172734,'2022-05-03 00:00:00',0),(30,3,'malo','m',48.68016134,-1.98341312,'2022-06-01 00:00:00',0),(31,3,'camaret sm','bretagne',48.28502042,-4.60533872,'2022-07-01 00:00:00',0),(32,3,'medoc','m',45.26879982,-1.15873797,'2022-07-21 00:00:00',0),(33,3,'puy','p',45.78771175,2.95775368,'2022-07-26 00:00:00',0),(34,3,'la bastide sb','sb',44.72850307,4.30089726,'2022-08-01 00:00:00',0);
/*!40000 ALTER TABLE `MISSION_TARGETS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USERS`
--

DROP TABLE IF EXISTS `USERS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USERS` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nick` varchar(32) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USERS`
--

LOCK TABLES `USERS` WRITE;
/*!40000 ALTER TABLE `USERS` DISABLE KEYS */;
INSERT INTO `USERS` VALUES (1,'Rein','rein.velt@gmail.com','secret'),(2,'Piet','piet@gmail.com','1sdfdsfdffs');
/*!40000 ALTER TABLE `USERS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-10 23:40:47
