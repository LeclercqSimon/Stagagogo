-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: stagagogo3
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address` (
  `id_address` int(11) NOT NULL AUTO_INCREMENT,
  `num_address` smallint(6) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `country_address` varchar(50) NOT NULL,
  `postal_address` varchar(20) NOT NULL,
  `city_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_address`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,10,'Rue de la Paix','France','75001','Paris'),(2,25,'Avenue des Champs-Élysées','France','75008','Paris'),(3,5,'Boulevard Haussmann','France','75009','Paris'),(4,12,'Place Bellecour','France','69002','Lyon'),(5,3,'Rue de Rome','France','13001','Marseille'),(6,44,'Quai des Chartrons','France','33000','Bordeaux'),(7,15,'Promenade des Anglais','France','06000','Nice'),(8,8,'Rue du Faubourg-Saint-Honoré','France','75008','Paris'),(9,22,'Boulevard Gambetta','France','34000','Montpellier'),(10,6,'Avenue Jean Médecin','France','06000','Nice'),(11,27,'14 Rue des Grèbes','France','29950','Bénodet'),(12,-10,'14 Rue des Grèbes','France','29950','Bénodet'),(13,2,'14 Rue des Grèbes','France','29950','Bénodet'),(14,4,'14 Rue des Grèbes','France','29950','Bénodet'),(15,-6,'14 Rue des Grèbes','France','29950','Bénodet'),(16,23,'14 Rue des Grèbes','France','29950','Bénodet'),(17,3,'14 Rue des Grèbes','France','29950','Bénodet'),(18,3,'14 Rue des Grèbes','France','29950','Bénodet'),(19,1,'14 Rue des Grèbes','France','29950','Bénodet'),(20,1,'14 Rue des Grèbe','France','29959','Bénode'),(21,1,'14 Rue des Grèbe','France','29959','Bénode'),(22,1,'14 Rue des Grèb','France','29959','Bénode'),(23,3,'14 Rue des Grèbes','France','29950','Bénodet'),(24,4,'14 Rue Des Grèbes','France','22950','Bénodet'),(25,4,'14 Rue Des Grèbes','France','45667','Bénodet'),(26,3,'14 Rue Des Grèbes','France','22950','Bénodet'),(27,0,'3456','ERTYU','45666','Test'),(28,32767,'14 Rue Des Grèbes','France','22950','Bénodet'),(29,32767,'14 Rue Des Grèbes','France','22950','Bénodet'),(30,32767,'14 Rue Des Grèbes','France','22950','Bénodet'),(31,12,'14 Rue Des Grèbes','France','22950','Bénodet'),(32,12,'14 Rue Des Grèbes','France','22950','Bénodet'),(33,12,'14 Rue Des Grèbes','France','22950','Bénodet'),(34,12,'14 Rue Des Grèbes','France','22950','Bénodet'),(35,32767,'lol','lol','22950','Bénodet'),(36,32767,'14 Rue Des Grèbes','France','22950','Bénodet'),(37,32767,'14 Rue Des Grèbes','France','22950','Bénodet'),(38,32767,'14 Rue Des Grèbes','France','22950','Bénodet'),(39,32767,'14 Rue Des Grèbes','France','22950','Bénodet'),(40,1232,'14 Rue Des Grèbes','France','22950','Bénodet'),(41,1232,'14 Rue Des Grèbes','France','22950','Bénodet'),(42,1232,'14 Rue Des Grèbes','France','22950','Bénodet'),(43,32767,'14 Ru','lbjk','22567','Bénodet'),(44,6789,'14 Rue Des Grèbes','France','22950','Bénodet'),(45,6789,'14 Rue Des Grèbes','France','22950','Bénodet'),(46,6789,'14 Rue Des Grèbes','France','22950','Bénodet'),(47,78,'14 Rue Des Grèbes','France','22950','Bénodet'),(48,2,'14 Rue des Grèbes','France','29950','Bénodet'),(49,78,'14 Rue Des Grèbes','France','22950','Bénodet'),(50,78,'14 Rue Des Grèbes','France','22950','Bénodet'),(51,4567,'14 Rue Des Grèbes','France','22950','Bénodet'),(52,4567,'14 Rue Des Grèbes','France','22950','Bénodet'),(53,456,'14 Rue Des Grèbes','France','22950','Bénodet'),(54,456,'14 Rue Des Grèbes','France','22950','Bénodet'),(55,4566,'14 Rue Des Grèbes','France','22950','Bénodet'),(56,4566,'14 Rue Des Grèbes','France','22950','Bénodet'),(57,4567,'14 Rue Des Grèbes','France','22950','Bénodet'),(58,4567,'14 Rue Des Grèbes','France','22950','Bénodet'),(59,4567,'14 Rue Des Grèbes','France','22950','Bénodet'),(60,1234,'14 Rue Des Grèbes','France','22950','Bénodet'),(61,1234,'14 Rue Des Grèbes','France','22950','Bénodet'),(62,32767,'rue de la soif','Merveille','69694','la baule'),(63,45,'14 Rue Des Grèbes','France','55555','Bénodet');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asso_1`
--

DROP TABLE IF EXISTS `asso_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asso_1` (
  `id_user` int(11) NOT NULL,
  `id_offer` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_offer`),
  KEY `id_offer` (`id_offer`),
  CONSTRAINT `asso_1_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `asso_1_ibfk_2` FOREIGN KEY (`id_offer`) REFERENCES `offer` (`id_offer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asso_1`
--

LOCK TABLES `asso_1` WRITE;
/*!40000 ALTER TABLE `asso_1` DISABLE KEYS */;
/*!40000 ALTER TABLE `asso_1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `name_company` varchar(50) NOT NULL,
  `city_company` varchar(50) NOT NULL,
  `sector_company` varchar(50) NOT NULL,
  `mail_company` varchar(50) NOT NULL,
  `phone_company` varchar(10) NOT NULL,
  `description_company` varchar(100) NOT NULL,
  `post_company` varchar(50) DEFAULT NULL,
  `siret_company` varchar(50) NOT NULL,
  `id_address` int(11) NOT NULL,
  PRIMARY KEY (`id_company`),
  UNIQUE KEY `id_address` (`id_address`),
  UNIQUE KEY `mail_company` (`mail_company`),
  UNIQUE KEY `phone_company` (`phone_company`),
  CONSTRAINT `company_ibfk_1` FOREIGN KEY (`id_address`) REFERENCES `address` (`id_address`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'TechCorp','Paris','IT','contact@techcorp.com','0987654321','Entreprise tech innovante',NULL,'123456789',1),(2,'MediCare','Lyon','Santé','info@medicare.com','0456789123','Société de matériel médical',NULL,'234567890',2),(3,'EduSmart','Marseille','Éducation','support@edusmart.com','0498765432','Start-up edtech',NULL,'345678901',3),(4,'GreenEnergy','Bordeaux','Énergie','contact@greenenergy.com','0556789123','Solutions d\'énergie renouvelable',NULL,'456789012',4),(5,'FoodDelight','Nice','Alimentation','hello@fooddelight.com','0491234567','Livraison de repas',NULL,'567890123',5),(6,'AutoParts','Toulouse','Automobile','sales@autoparts.com','0567891234','Pièces détachées auto',NULL,'678901234',6),(7,'BuildTech','Nantes','Construction','info@buildtech.com','0245678912','Matériaux de construction',NULL,'789012345',7),(8,'CloudNet','Strasbourg','IT','support@cloudnet.com','0387654321','Solutions cloud',NULL,'890123456',8),(9,'SafeBank','Lille','Finance','contact@safebank.com','0323456789','Services bancaires',NULL,'901234567',9),(10,'FashionStyle','Montpellier','Mode','sales@fashionstyle.com','0467891234','Vêtements tendance',NULL,'012345678',10),(21,'TEST','Bénodet','Ecologie','nedelec.eloise29@gmail.com','0767313690','dfggjhjklljhvvbn,;;,nbnlkhghjlk',NULL,'TYUIOIUHJKL',41),(24,'TEST','Bénodet','Ecologie','nedelec9@gmail.com','0767313612','DFGGHJJKKJNBVHBJNJ?KL?KN BN??.NB ',NULL,' hkbb ',44),(27,'TEST','Bénodet','Ecologie','cfhgjyhuih@gmail.com','0656438906','FMKLJHHVGCF VB.?LJHGYTFXCVBHN?.BLKK/?.?N',NULL,'AZERTY',47),(30,'TEST','Bénodet','Ecologie','ertyuio@gmail.com','0767345678','gvzejnkvgexzjekzezccez',NULL,'cklnc',51),(32,'erty','Bénodet','Ecologie','vghbjzaxnjznxjnbazbx@gmail.com','0767313678','vgzxeceznjuezcnjkejkbcencezlcenz',NULL,'gbhk',53),(34,'TEST','Bénodet','Ecologie','ertyu@gmail.com','0767313666','ZERTYUIOhj l xs hkl xxjlazzjx jax,q',NULL,'gbhk',55),(36,'erty','Bénodet','Ecologie','nedelec.eloise6789@gmail.com','0767318767','buieczbzec kijeecbzhegcjez',NULL,'ecnezio',57),(38,'TEST','Bénodet','Ecologie','enczejk@gmail.com','0667676545','azertyuieinzcenkizecnlkczejnezcjlkjkce',NULL,'ecnezio',59),(39,'TEST','Bénodet','Ecologie','azertyui@gmail.com','0767313611','azertyuioklnjbvcfv bn,klk:nj;bh',NULL,'TYUIOIUHJKL',60),(41,'Wiklog','la baule','dev web','wiklog@gmail.com','0298634567','azertyuipkjhgcfggvnbbhn bjn;kbknjnlk',NULL,'TYUIOIUHJKL',62);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `note` (
  `id_note` int(11) NOT NULL AUTO_INCREMENT,
  `crit1_note` smallint(6) NOT NULL,
  `crit2_note2` smallint(6) NOT NULL,
  `crit3_note` smallint(6) NOT NULL,
  `id_company` int(11) NOT NULL,
  PRIMARY KEY (`id_note`),
  UNIQUE KEY `id_company` (`id_company`),
  CONSTRAINT `note_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `note`
--

LOCK TABLES `note` WRITE;
/*!40000 ALTER TABLE `note` DISABLE KEYS */;
INSERT INTO `note` VALUES (10,7,9,8,10);
/*!40000 ALTER TABLE `note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offer` (
  `id_offer` int(11) NOT NULL AUTO_INCREMENT,
  `publication_offer` date NOT NULL,
  `title_offer` varchar(50) NOT NULL,
  `descr_offer` varchar(100) NOT NULL,
  `salary_offer` varchar(50) NOT NULL,
  `offer_status` varchar(50) NOT NULL,
  `contract_offer` varchar(50) NOT NULL,
  `sector_offer` varchar(50) NOT NULL,
  `views_offer` int(11) DEFAULT NULL,
  `candidates_offer` int(11) DEFAULT NULL,
  `id_company` int(50) NOT NULL,
  PRIMARY KEY (`id_offer`),
  KEY `id_company` (`id_company`),
  CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer`
--

LOCK TABLES `offer` WRITE;
/*!40000 ALTER TABLE `offer` DISABLE KEYS */;
INSERT INTO `offer` VALUES (1,'2024-03-01','Développeur Web','Poste en CDI','40000','Ouvert','CDI','IT',10,5,1),(2,'2024-02-15','Ingénieur Système','Expérience requise 5 ans','50000','Ouvert','CDI','IT',8,3,1),(3,'2024-04-01','Data Analyst','Poste pour débutant','35000','Ouvert','CDD','Finance',12,4,3),(4,'2024-01-10','Commercial','Travail à distance possible','30000','Fermé','CDI','Vente',20,10,4),(5,'2024-02-20','Technicien Support','Assistance niveau 1','28000','Ouvert','CDI','IT',6,2,5),(6,'2024-03-18','Chef de Projet','Gestion de projet agile','55000','Ouvert','CDI','Management',14,7,6),(7,'2024-03-25','Comptable','Expertise comptable demandée','42000','Ouvert','CDI','Finance',9,3,7),(8,'2024-04-05','Designer UX/UI','Poste créatif','37000','Ouvert','CDI','Design',15,6,8),(9,'2024-03-30','Consultant SEO','Optimisation SEO/SEA','45000','Ouvert','Freelance','Marketing',18,5,9),(10,'2024-02-12','Responsable RH','Expérience en gestion RH','48000','Ouvert','CDI','Ressources Humaines',11,2,10),(14,'2025-04-29','ZERTYU','ybhlzblhzeczeRtyuiolnmnm','3456','ouvert','evjnk','AZERT',0,0,34),(15,'2025-04-29','ZERTYU','ZERTyyvbehzxbcljkczejblkczeh jecz','567','ouvert','ZERT','XFTGYHUJI',0,0,36),(16,'2025-04-29','ZERTYU','ertyuikjhbvbnjzkca kcejz k ejek','345678','ouvert','evjnk','AZERT',0,0,38),(17,'2025-04-29','RERTUIOKJBV','sdrcftrvflmjiuvbgbhbhgbhgfcghb,;lk;','4567','ouvert','45678','XFTGYHUJI',0,0,39),(18,'2025-04-29','Stage dev web','azebuhedbjezdnjkzedkl,cezn dezk,nc nze,','2356789998','ouvert','stage','info',0,0,41);
/*!40000 ALTER TABLE `offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(50) NOT NULL,
  `firstname_user` varchar(50) NOT NULL,
  `mail_user` varchar(50) NOT NULL,
  `pwd_user` varchar(255) DEFAULT NULL,
  `phone_user` varchar(10) NOT NULL,
  `status_user` varchar(50) DEFAULT NULL,
  `id_address` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_address` (`id_address`),
  UNIQUE KEY `mail_user` (`mail_user`),
  UNIQUE KEY `phone_user` (`phone_user`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_address`) REFERENCES `address` (`id_address`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Doe','John','john.doe@example.com','password123','1234567890','1',1),(2,'Smith','Alice','alice.smith@example.com','passAlice','0987654321','1',2),(3,'Brown','Charlie','charlie.brown@example.com','charliePass','0778899001','1',3),(4,'Johnson','Emily','emily.johnson@example.com','emily2024','0665544332','1',4),(5,'Williams','Daniel','daniel.w@example.com','danielPass','0654321897','1',5),(6,'Miller','Emma','emma.miller@example.com','emmaPass123','0612345678','1',6),(7,'Davis','Michael','michael.davis@example.com','michaelD2024','0698765432','1',7),(8,'Garcia','Olivia','olivia.garcia@example.com','oliviaPass','0712345678','1',8),(9,'Martinez','Liam','liam.m@example.com','liamPass789','0723456789','1',9),(10,'Anderson','Sophia','sophia.anderson@example.com','sophiaSecure','0734567890','1',10),(11,'test','test','test@gmail.com','$2y$12$2yj7.GqOV9cO04HPFTM/ZOLFUbGyU9.k09agbodr8kx','0767313690','1',11),(20,'Eloïse','Eloïse','nedelec.eloise29@gmail.com','$2y$12$7BhuGCpXa7KBtwyVdNBbLuVUV4slTUfXE4U96Cs4xo.','0767313645','1',20),(22,'Eloïse','Eloïse','nedelec.eloise@gmail.com','$2y$12$PuJxGwJjXORbm1DA9iCKieokVM7QqQ2hFzlzMtfACud','0767313646','1',22),(23,'klara','klara','klara@gmail.com','$2y$12$hohK128OD/0UxSkudryhLO8eyIVkQf5NVzqdxO9QT/X','0767314567','1',23),(24,'vqevqe','ejkvsq','redbull@gmail.com','$2y$12$Sh8YEREr876buR3LvC4xiuDnXxcypQBL06N1qnXmvPG','0767565656','1',24),(25,'vjhbkj','crfyvb','nedelec.eloise9@gmail.com','$2y$12$CKH5BjVlGNyZNJIugMUkpeIQPdj1SPdyCm0.6L87A5n','0767313699','3',25),(26,'oso','n,kl','sos@gmail.com','$2y$12$xEI8onoDDFXGROThwVHlSOEKVZY8zEeRcwRruZabdr6fZIKuQzRle','0767313691','2',26),(27,'Klara','Klara','klaraa@gmail.com','$2y$12$b/e3eF6kkRi4rqSl7neVg.5Y55sy6sGT3TP8qbYJFF36kdTLEjfFS','0755555555','1',48),(28,'admin','admin','admin@gmail.com','$2y$12$1wMVyi6zcH4KalaH/6JLaOoLCtu9bUNDw6ETSTpR8AMjBykmRLySq','0767313608','3',63);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `status_wishlist` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_offer` int(11) NOT NULL,
  PRIMARY KEY (`status_wishlist`),
  UNIQUE KEY `unique_wishlist` (`id_user`,`id_offer`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES (4,1,1),(5,1,2),(3,1,3),(11,1,9),(12,1,10),(13,26,1),(14,26,3),(16,28,2),(17,28,3);
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'stagagogo3'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-29 17:30:14
