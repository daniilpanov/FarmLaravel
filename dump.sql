-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: farm
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.20.04.1

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
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint NOT NULL,
  `user_uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `carts_user_uuid_product_id_uindex` (`user_uuid`,`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=444 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (107,'2022-11-09 08:44:13','2022-11-09 08:44:13',10,'97b3f221-56f2-4970-95b8-26382eb4ad75',1);
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogs`
--

DROP TABLE IF EXISTS `catalogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalogs` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint DEFAULT NULL,
  `visible` tinyint(1) DEFAULT '1',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogs`
--

LOCK TABLES `catalogs` WRITE;
/*!40000 ALTER TABLE `catalogs` DISABLE KEYS */;
INSERT INTO `catalogs` VALUES (1,'Молочная продукция','Молочная продукция',1,1,'milk',NULL),(2,'Парное мясо','Парное мясо',2,1,'meat',NULL),(3,'Куриные яйца','Куриные яйца',3,1,'eggs',NULL),(4,'Сезонные овощи и фрукты','Сезонные овощи и фрукты',4,1,'fruits-and-vegetables',NULL),(5,'tmp','test',NULL,1,'test',NULL);
/*!40000 ALTER TABLE `catalogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` mediumtext COLLATE utf8mb4_unicode_ci,
  `visible` tinyint(1) DEFAULT '1',
  `product_id` bigint DEFAULT NULL,
  `alt` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'Молочная продукция','КАРТИНКА Молочная продукция','img/category-milk-icon.jpg',1,NULL,NULL),(2,'Парное мясо','КАРТИНКА Парное мясо','img/category-meat-icon.jpg',1,NULL,NULL),(3,'Куриные яйца','КАРТИНКА Куриные яйца','img/category-eggs-icon.jpg',1,NULL,NULL),(4,'Сезонные овощи и фрукты','КАРТИНКА Сезонные овощи и фрукты','img/category-vegetables-n-fruits-icon.jpg',1,NULL,NULL),(5,'Коровы на поле','КАРТИНКА В хедере главной страницы','img/cows.jpg',1,NULL,NULL),(6,'','','img/map_contact.jpg',1,NULL,NULL),(9,'','','img/delivery.jpg',1,NULL,NULL),(10,NULL,NULL,'img/Milk_Cheese_Quark_curd_cottage_farmer_cheese_576611_1280x851.jpg',1,NULL,NULL),(11,'Молоко коровье','КАРТИНКА Молоко коровье','img/cow-milk-card.jpg',1,1,NULL);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localizations`
--

DROP TABLE IF EXISTS `localizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `localizations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_id` bigint NOT NULL,
  `lang_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localizations`
--

LOCK TABLES `localizations` WRITE;
/*!40000 ALTER TABLE `localizations` DISABLE KEYS */;
INSERT INTO `localizations` VALUES (1,1,'en',0,NULL,NULL,'{\"image\": \"storage/img/Vika.jpg\",\"content\": \"Дорогие друзья!<p> Спасибо, что зашли на наш сайт. Наша семейная ферма существует уже более 10 лет. Я искренне горжусь тем, что качество нашей продукции всегда было и остается неизменно высоким.</p> <p>Для меня всегда было важно,  чтобы наша продукция была сделана по-домашнему, только из натуральных ингредиентов собственного производства, с любовью и заботой о наших клиентах.</p> <p>Наша ферма распологается в экологически чистом районе Ленинградской области. Мы используем только натуральные корма и заботимся о здоровье наших животных. При переработке мы максимально стараемся сохранить полезные свойства натурального молока, чтобы обеспечить наших клиентов полезными продуктами, вкусными, как в детстве.</p><p> Снаилучшими пожеланиями, Виктория Кулюдина</p>\",\"make_order\":\"ЗАКАЗАТЬ ПРОДУКЦИЮ\"}');
/*!40000 ALTER TABLE `localizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (4,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 20:12:03','2022-10-15 20:12:03'),(5,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 20:49:33','2022-10-15 20:49:33'),(6,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:00:19','2022-10-15 21:00:19'),(7,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:00:44','2022-10-15 21:00:44'),(8,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:09:26','2022-10-15 21:09:26'),(9,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:11:25','2022-10-15 21:11:25'),(10,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:12:01','2022-10-15 21:12:01'),(11,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:12:19','2022-10-15 21:12:19'),(12,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:12:41','2022-10-15 21:12:41'),(13,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:13:05','2022-10-15 21:13:05'),(14,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:13:16','2022-10-15 21:13:16'),(15,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:13:55','2022-10-15 21:13:55'),(16,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:14:02','2022-10-15 21:14:02'),(17,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:17:50','2022-10-15 21:17:50'),(18,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:18:05','2022-10-15 21:18:05'),(19,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:25:12','2022-10-15 21:25:12'),(20,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:25:29','2022-10-15 21:25:29'),(21,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:27:57','2022-10-15 21:27:57'),(22,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:28:08','2022-10-15 21:28:08'),(23,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com','dfsdgbdrfxszxcvfnb sdretgfhbvvgnh gmcv bbdhbgvc \r\n\r\njgnmhvgbn vnvbg','2022-10-15 21:29:08','2022-10-15 21:29:08'),(24,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com','sdgrcdefvertgdfgx','2022-10-15 21:29:55','2022-10-15 21:29:55'),(25,'gfd','89217567445','daniilpanov016@gmail.com','gfdrfg','2022-10-15 21:31:17','2022-10-15 21:31:17'),(26,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:31:36','2022-10-15 21:31:36'),(27,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:43:12','2022-10-15 21:43:12'),(28,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:51:54','2022-10-15 21:51:54'),(29,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:52:10','2022-10-15 21:52:10'),(30,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:53:15','2022-10-15 21:53:15'),(31,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-10-15 21:58:16','2022-10-15 21:58:16'),(32,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com','sdcsd','2022-11-09 08:24:25','2022-11-09 08:24:25'),(33,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com','sdcsd','2022-11-09 08:24:50','2022-11-09 08:24:50'),(34,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-11-09 08:25:44','2022-11-09 08:25:44'),(35,'Екатерина','490328493284','katya_sol@inbox.ru','bmhbmnb,mn,m..,m','2022-11-09 08:26:30','2022-11-09 08:26:30'),(36,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-11-09 08:26:43','2022-11-09 08:26:43'),(37,'Екатерина','490328493284','katya_sol@inbox.ru','bmhbmnb,mn,m..,m','2022-11-09 08:27:03','2022-11-09 08:27:03'),(38,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com','daszfcsc','2022-11-09 10:20:21','2022-11-09 10:20:21'),(39,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com',NULL,'2022-11-09 10:24:49','2022-11-09 10:24:49'),(40,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com','hgfh','2022-11-09 10:30:59','2022-11-09 10:30:59'),(41,'DANIIL PANOV','89217567445','daniilpanov016@gmail.com','sdfgdg','2022-11-09 10:41:23','2022-11-09 10:41:23');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_09_21_230352_create_pages_table',1),(6,'2022_09_21_230407_create_products_table',1),(7,'2022_09_21_230421_create_carts_table',1),(8,'2022_10_01_115706_create_catalogs_table',1),(9,'2022_10_01_161237_create_localizations_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` mediumtext COLLATE utf8mb4_unicode_ci,
  `order_data` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `keywords` mediumtext COLLATE utf8mb4_unicode_ci,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clickable` tinyint(1) NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_image_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Главная',NULL,NULL,'index',1,1,0,NULL,NULL,'О ферме',5),(2,'test',NULL,NULL,'f',1,0,1,NULL,NULL,NULL,NULL),(3,'test2',NULL,NULL,'g',1,0,1,NULL,NULL,NULL,NULL),(4,'test3',NULL,NULL,'h',1,0,3,NULL,NULL,NULL,NULL),(5,'Наша продукция',NULL,NULL,'catalog',1,1,NULL,NULL,NULL,'Продукция',10),(6,'Доставка и самовывоз',NULL,NULL,'delivery',1,1,NULL,NULL,NULL,'Доставка и самовывоз',9),(7,'Контакты',NULL,NULL,'contacts',1,1,NULL,NULL,NULL,'Контакты',6),(10,'Молоко козье',NULL,NULL,'milk1',0,0,0,NULL,NULL,'Продукт Молоко козье',NULL),(11,'Молоко коровье','Молоко коровье цельное,жирность от 3,5% до 6%',NULL,'milk2',0,0,0,NULL,NULL,'Продукт Молоко коровье',NULL),(12,'Корзина',NULL,NULL,'cart',1,1,0,NULL,NULL,'Корзина',0);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int DEFAULT NULL,
  `old_price` int DEFAULT NULL,
  `visible` tinyint(1) DEFAULT '1',
  `category_id` int NOT NULL,
  `page_id` bigint DEFAULT NULL,
  `price_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_pk` (`name`),
  UNIQUE KEY `products_title_pk` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,NULL,NULL,'Молоко коровье','Молоко коровье',1,NULL,1,1,11,NULL),(2,NULL,NULL,'Молоко козье','Молоко козье',2,NULL,1,1,10,NULL),(3,NULL,NULL,'Творог','Творог',3,NULL,1,1,NULL,NULL),(4,NULL,NULL,'Сливки','Сливки',4,NULL,1,1,NULL,NULL),(5,NULL,NULL,'Сыр адыгейский','Сыр адыгейский',5,NULL,1,1,NULL,NULL),(6,NULL,NULL,'Ряженка','Ряженка',6,NULL,1,1,NULL,NULL),(7,NULL,NULL,'Кефир','Кефир',7,NULL,1,1,NULL,NULL),(8,NULL,NULL,'Сливочное масло','Сливочное масло',8,NULL,1,1,NULL,NULL),(9,NULL,NULL,'Говядина','Говядина',9,NULL,1,2,NULL,NULL),(10,NULL,NULL,'Свинина','Свинина',10,NULL,1,2,NULL,NULL),(11,NULL,NULL,'Баранина','Баранина',11,NULL,1,2,NULL,NULL),(12,NULL,NULL,'Яйца куриные','Яйца куриные',12,NULL,1,3,NULL,'за 1 дес.'),(13,NULL,NULL,'Картофель','Картофель',13,NULL,1,4,NULL,NULL),(14,NULL,NULL,'Морковь','Морковь',15,NULL,1,4,NULL,NULL),(15,NULL,NULL,'Огурцы','Огурцы',16,NULL,1,4,NULL,NULL),(16,NULL,NULL,'Яблоки','Яблоки',18,NULL,1,4,NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Виктория Кулюдина','vika@email.ru',NULL,'sfsdfsdfsdfvggf vcfdvgb nhcv vg nhbcrt',NULL,NULL,NULL,'2');
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

-- Dump completed on 2022-11-09 16:43:35
