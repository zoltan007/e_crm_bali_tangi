/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.25-MariaDB : Database - e_crm_bali_tangi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`e_crm_bali_tangi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `e_crm_bali_tangi`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`name`,`type`,`mobile`,`email`,`password`,`status`,`created_at`,`updated_at`) values 
(1,'Govinda','Admin Utama','081292830283','govinda@admin.com','$2a$12$62JgOYCoZ.bxqhbN.SC5/uiyJvyX8XmT7H8.FwvrwGw7nCoDF7vbS',1,NULL,'2023-03-16 12:20:53'),
(7,'Dayu','Customer Service','084283732938','dayu@admin.com','$2y$10$j.bN2RSVvWA02i1.vPrTVO0N/TRcXwCHWH3YkvDYBJWvVlivL8Laa',1,'2023-03-17 02:24:12','2023-03-17 02:24:12'),
(8,'Kadek','Penjualan','0817373938393','kadek@admin.com','$2y$10$dhSOPrZEa2rPT3E/chTGXudhVZ5zP1nHn.r9oWrzgqMZlP1OlvTWG',1,'2023-03-17 02:24:58','2023-03-17 02:24:58'),
(9,'Radit','Manajer','08273827382923','radit@admin.com','$2y$10$P6XBmVs.qwY30c7yIP/9ouIJV9TCw.oS/3Q/Hcf6K.ghzKS61wIP.',1,'2023-03-17 02:29:11','2023-03-17 02:29:11');

/*Table structure for table `banners` */

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `banners` */

insert  into `banners`(`id`,`image`,`type`,`link`,`title`,`alt`,`status`,`created_at`,`updated_at`) values 
(4,'11154.JPG','Slider','produk-terkini','Produk terkini','produk-terkini',1,'2023-03-20 05:29:04','2023-03-20 05:29:04'),
(5,'70624.JPG','Slider','kegiatan-kami','Kegiatan Kami','kegiatan-kami',1,'2023-03-20 05:30:21','2023-03-20 05:30:21');

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

insert  into `carts`(`id`,`session_id`,`user_id`,`product_id`,`size`,`quantity`,`created_at`,`updated_at`) values 
(33,'vfLWJvW24EUpzefj2fvVrv0HlllMOQ2O0gJa4v2g',3,10,'1000gr',1,'2023-09-11 07:11:05','2023-09-11 07:11:05');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_discount` float NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`category_name`,`category_discount`,`status`,`created_at`,`updated_at`) values 
(16,'Scrub',0,1,'2023-03-22 04:52:44','2023-03-22 04:52:44'),
(17,'Essential Oil',0,1,'2023-03-22 04:53:28','2023-03-22 04:53:28'),
(18,'Massage Oil',0,1,'2023-03-22 04:53:34','2023-03-22 04:53:34'),
(19,'Rempah',0,1,'2023-03-22 04:53:43','2023-03-22 04:53:43'),
(20,'Sabun',0,1,'2023-03-22 04:53:54','2023-03-22 04:53:54'),
(21,'Hand Sanitizer',0,1,'2023-03-22 04:54:15','2023-03-22 04:54:15'),
(22,'Masker',0,1,'2023-03-22 04:54:21','2023-03-22 04:54:21'),
(23,'Parfum',0,1,'2023-03-22 04:54:29','2023-03-22 04:54:29'),
(24,'Aromaterapi',0,1,'2023-03-22 04:54:38','2023-03-22 04:54:38'),
(25,'Herbal Drink',0,1,'2023-03-22 04:54:46','2023-03-22 04:54:46'),
(26,'Alat Pijat',0,1,'2023-03-22 04:54:53','2023-03-22 04:54:53'),
(27,'Handicraft',0,1,'2023-03-22 04:55:00','2023-03-22 04:55:00'),
(28,'Lotion',0,1,'2023-03-22 04:55:09','2023-03-22 04:55:09'),
(29,'Ratus',0,1,'2023-03-22 04:55:21','2023-03-22 04:55:21'),
(30,'Perlengkapan Spa',0,1,'2023-03-22 04:55:29','2023-03-22 04:55:29'),
(31,'Herbal Spa',0,1,'2023-03-22 04:55:36','2023-03-22 04:55:36');

/*Table structure for table `coupons` */

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `coupon_option` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `coupons` */

insert  into `coupons`(`id`,`coupon_option`,`coupon_code`,`categories`,`users`,`coupon_type`,`amount_type`,`amount`,`expiry_date`,`status`,`created_at`,`updated_at`) values 
(4,'Manual','BALITANGINEW','16','danielsyahreza@gmail.com','Beberapa Kali Pakai','Percentage',10,'2023-03-24',0,'2023-03-21 09:09:04','2023-04-04 06:46:56'),
(5,'Automatic','cFY2dWg6','13','dimasradit@gmail.com','Sekali Pakai','Percentage',10,'2023-03-31',1,'2023-03-21 10:23:03','2023-03-21 15:16:28'),
(6,'Automatic','fPtsG0Ob','10','danielsyahreza@gmail.com','Beberapa Kali Pakai','Percentage',10,'2023-03-29',1,'2023-03-22 00:51:27','2023-03-22 00:51:38'),
(7,'Automatic','Kz7KL7bz','16','danielsyahreza@gmail.com','Beberapa Kali Pakai','Percentage',15,'2023-03-31',1,'2023-03-28 03:41:08','2023-03-28 03:41:08'),
(8,'Manual','BALITANGIHERE','16','danielsyahreza@gmail.com,dimasradit@gmail.com','Beberapa Kali Pakai','Percentage',15,'2023-04-14',1,'2023-04-04 06:46:13','2023-04-04 06:46:13'),
(9,'Automatic','A34lVt4Q','16,22','danielsyahreza@gmail.com','Sekali Pakai','Percentage',50,'2023-07-23',1,'2023-07-13 13:26:15','2023-07-13 13:26:15');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_100000_create_password_resets_table',1),
(2,'2019_08_19_000000_create_failed_jobs_table',1),
(3,'2019_12_14_000001_create_personal_access_tokens_table',1),
(4,'2023_03_11_173735_create_newsletters_table',2),
(5,'2023_04_13_053444_create_originaddress_table',3);

/*Table structure for table `order_statuses` */

DROP TABLE IF EXISTS `order_statuses`;

CREATE TABLE `order_statuses` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_statuses` */

insert  into `order_statuses`(`id`,`name`,`status`,`created_at`,`updated_at`) values 
(1,'Baru',1,NULL,NULL),
(2,'Menunggu Konfirmasi',1,NULL,NULL),
(3,'Dibatalkan',1,NULL,NULL),
(4,'Sedang Diproses',1,NULL,NULL),
(5,'Dalam Pengiriman',1,NULL,NULL),
(6,'Sudah Sampai Tujuan',1,NULL,NULL),
(7,'Selesai',1,NULL,NULL);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` int(12) NOT NULL,
  `coupon_code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` float DEFAULT NULL,
  `order_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` int(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`user_id`,`name`,`address`,`mobile`,`email`,`shipping_charges`,`coupon_code`,`coupon_amount`,`order_status`,`payment_method`,`grand_total`,`created_at`,`updated_at`) values 
(2,3,'Daniel Zoltan','Perumahan Pasraman Unud Blok B.73, Kel. Jimbaran, Kec.Kuta Selatan, Kab.Badung, Bali, 80361','081829292658','danielsyahreza@gmail.com',0,NULL,NULL,'Sedang Diproses','Transfer Bank',130000,'2023-08-29 04:42:49','2023-08-31 06:15:12'),
(3,3,'Daniel Zoltan','Perumahan Pasraman Unud Blok B.73, Kel. Jimbaran, Kec.Kuta Selatan, Kab.Badung, Bali, 80361','081829292658','danielsyahreza@gmail.com',0,NULL,NULL,'Baru','Transfer Bank',182750,'2023-08-31 06:08:47','2023-08-31 06:08:47');

/*Table structure for table `orders_details` */

DROP TABLE IF EXISTS `orders_details`;

CREATE TABLE `orders_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(12) NOT NULL,
  `product_qty` int(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders_details` */

insert  into `orders_details`(`id`,`order_id`,`user_id`,`product_id`,`product_name`,`product_size`,`product_price`,`product_qty`,`created_at`,`updated_at`) values 
(1,2,3,11,'Rempah Wangi Scrub','500gr',130000,1,'2023-08-29 04:42:49','2023-08-29 04:42:49'),
(2,3,3,10,'Green Tea Scrub','1000gr',182750,1,'2023-08-31 06:08:47','2023-08-31 06:08:47');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` float NOT NULL,
  `product_discount` float NOT NULL DEFAULT 0,
  `product_weight` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` enum('No','Yes') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_bestseller` enum('No','Yes') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`category_id`,`product_name`,`product_price`,`product_discount`,`product_weight`,`stock`,`product_image`,`description`,`is_featured`,`is_bestseller`,`status`,`created_at`,`updated_at`) values 
(10,16,'Green Tea Scrub',215000,15,'1000gr',14,'40056.png','Bermanfaat untuk melawan penuaan dini dan mencerahkan kembali area gelap di bawah mata.\r\n\r\nKomposisi: Oryza sativa starch, phaseolus angularis seed powder, kaolin, camellia sinensis leaf, camellia sinensis oil','Yes',NULL,1,'2023-03-22 05:00:36','2023-03-22 05:42:52'),
(11,16,'Rempah Wangi Scrub',130000,0,'500gr',15,'55791.png','Dibuat dari bahan dasar beras organik yang bermanfaaf untuk mengangkat sel kulit mati, melembabkan dan mencerahkan kulit.\r\nKomposisi: Oryza sativa powder, phaseolus radiatus seed powder, cinnamomun burmanii, bark extract, curcumae xanthoriizae rhizome, trigonella foenum graecum seed powder, curcuma heyneana root powder, jasminum sabac flower extract.','Yes',NULL,1,'2023-03-22 05:02:42','2023-03-22 16:57:11'),
(12,22,'Green Tea Masker',215000,20,'1000gr',NULL,'34098.png','Bermanfaat untuk melawan penuaan dini dan mencerahkan kembali area gelap di bawah mata.\r\n\r\nKomposisi: Oryza sativa starch, phaseolus angularis seed powder, kaolin, camellia sinensis leaf, camellia sinensis oil','Yes',NULL,1,'2023-03-22 05:05:34','2023-03-22 05:05:34'),
(13,22,'Milk Masker',130000,15,'500gr',NULL,'22261.png','Bermanfaat untuk melembabkan kulit, mengencangkan kulit, meratakan warna kulit dan mengatasi jerawat.\r\n\r\nKomposisi: Milk lipid, manihot utilissima starch, oryza sativa starch, vanilla planifolia fruit .','Yes',NULL,1,'2023-03-22 05:09:04','2023-03-22 05:09:04');

/*Table structure for table `products_attributes` */

DROP TABLE IF EXISTS `products_attributes`;

CREATE TABLE `products_attributes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `price` int(12) NOT NULL,
  `size` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products_attributes` */

insert  into `products_attributes`(`id`,`product_id`,`price`,`size`,`sku`,`status`,`created_at`,`updated_at`) values 
(6,10,215000,'1000gr','GSGSE342',1,'2023-03-23 07:46:27','2023-03-23 09:49:37'),
(7,11,130000,'500gr','GSHS445',1,'2023-03-23 09:51:32','2023-03-23 09:51:32'),
(8,12,215000,'1000gr','GRGSEG45',1,'2023-03-23 10:01:57','2023-03-23 10:01:57'),
(9,13,130000,'500gr','SGSGSE5',1,'2023-03-23 10:03:37','2023-03-23 10:03:37');

/*Table structure for table `products_images` */

DROP TABLE IF EXISTS `products_images`;

CREATE TABLE `products_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products_images` */

insert  into `products_images`(`id`,`product_id`,`image`,`status`,`created_at`,`updated_at`) values 
(1,2,'Evostripe-Slim-Fit-Men\'s-T-Shirt.jpg95447.jpg',1,'2022-05-11 19:17:25','2022-05-11 19:38:15'),
(2,2,'Evostripe-Slim-Fit-Men\'s-T-Shirt.jpeg2756.jpeg',0,'2022-05-11 19:17:25','2022-05-11 19:38:14');

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reviews` */

insert  into `reviews`(`id`,`user_id`,`product_id`,`title`,`review`,`rating`,`status`,`created_at`,`updated_at`) values 
(2,3,10,'Memuaskan','Saya puas dengan pemakaian produk ini.',4,1,'2023-03-27 07:47:18','2023-03-27 08:07:14');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `religion` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`address`,`birthdate`,`religion`,`mobile`,`status`,`remember_token`,`created_at`,`updated_at`) values 
(3,'Daniel Zoltan','danielsyahreza@gmail.com',NULL,'$2y$10$ZFx.m2sDHVXJpDTCu36gNeRrnUtle/LzvBGRrx/FfwHtq62tBVt16','Perumahan Pasraman Unud Blok B.73, Kel. Jimbaran, Kec.Kuta Selatan, Kab.Badung, Bali, 80361','1999-07-19','Islam','081829292643',1,NULL,'2023-02-27 15:39:54','2023-09-13 06:23:16'),
(4,'dimasradit','dimasradit@gmail.com',NULL,'$2y$10$1NxxhiKAVD5pC1yvkAB2b.Sw0f8wYf.rMjJyOxc4K8/23gLdFUr9e','',NULL,NULL,'',1,NULL,'2023-03-16 03:07:58','2023-03-16 03:07:58'),
(5,'Abdul Septian','abdulseptian@gmail.com',NULL,'$2y$10$K7OeKcrfotlIHHO.N7pZYOLri0FRGyDB9Vzs2xnLg9GQmEG6QKkdi','Perumahan Taman Griya Blok B.73','1999-07-14','Islam','081284483839',1,NULL,'2023-09-08 03:26:15','2023-09-08 03:27:21'),
(6,'Fahmi Ramadhan','fahmiramadhan@gmail.com',NULL,'$2y$10$aUee/vyN80/z6Q5J.zdjheYLfz9KHSYwxlpb/vigFRGlVJOZLhtzi',NULL,NULL,NULL,NULL,1,NULL,'2023-09-08 03:36:02','2023-09-08 03:36:02'),
(7,'Gabriella Fransiska','gabriellafransiska@gmail.com',NULL,'$2y$10$fWXzL61ugn1u8Hepqn2vIOmKE2cVLrCZRGYs7i5OBdlAhQEzRxRna',NULL,NULL,NULL,NULL,1,NULL,'2023-09-08 04:17:39','2023-09-08 04:17:39'),
(8,'Natalia','natalia@gmail.com',NULL,'$2y$10$X.PdANOk3CtmzOc8/piDbOK4NWzq60jSufJq8jsIvNDmf3GS/fPVu',NULL,NULL,NULL,NULL,1,NULL,'2023-09-08 04:27:13','2023-09-08 04:27:13'),
(9,'Fariz Iwana','fariziwana@gmail.com',NULL,'$2y$10$1QN3e5O0.H/xEwGixU0F5Onzc1dv7seTBmms9F//aKkrukk50UhRe','Kori Nuansa Jimbaran','2004-09-17','Kristen Katolik','081282282928',1,NULL,'2023-09-13 06:15:27','2023-09-13 06:25:38'),
(10,'Akhmad Faisal','akhmadfaisal@gmail.com',NULL,'$2y$10$CPvgCENDF9Pg95kRuVVHV.8TvGj6bVxqTjTGO/MbtrtbeB24WPem.',NULL,NULL,NULL,NULL,1,NULL,'2023-09-20 05:27:31','2023-09-20 05:27:31');

/*Table structure for table `wishlists` */

DROP TABLE IF EXISTS `wishlists`;

CREATE TABLE `wishlists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `wishlists` */

insert  into `wishlists`(`id`,`user_id`,`product_id`,`session_id`,`size`,`created_at`,`updated_at`) values 
(7,3,11,'DvpIYVPMXISmXnSl8xxh2GiR4KvkFKz6b4COofi6','500gr','2023-09-13 06:08:04','2023-09-13 06:08:04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
