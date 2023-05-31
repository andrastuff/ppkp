/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.24-MariaDB : Database - ppkb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
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
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2023_05_09_142726_create_permission_tables',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',2);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

insert  into `personal_access_tokens`(`id`,`tokenable_type`,`tokenable_id`,`name`,`token`,`abilities`,`last_used_at`,`created_at`,`updated_at`) values 
(1,'App\\Models\\Tbl_user_tpk',3,'auth_token','0f67075a60927bafe15015b5919829152a64295f39790bf39efdb283afed1b20','[\"tpk\"]',NULL,'2023-05-28 18:44:01','2023-05-28 18:44:01'),
(4,'App\\Models\\Tbl_user_tpk',3,'auth_token','342c8bc4693d396d571242be0bc0ae7cd48b586389682f6f7c2182b0a68b06ac','[\"tpk\"]','2023-05-28 23:25:54','2023-05-28 19:38:08','2023-05-28 23:25:54');

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

/*Table structure for table `tbl_baduta` */

DROP TABLE IF EXISTS `tbl_baduta`;

CREATE TABLE `tbl_baduta` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kode_baduta` int(12) NOT NULL,
  `wilayah_id` int(12) NOT NULL,
  `pendamping_id` int(12) NOT NULL,
  `nik` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `tgl_lahir` varchar(11) NOT NULL,
  `usia` int(2) NOT NULL,
  `status_usia` varchar(50) NOT NULL,
  `tgl_lahir_anak_sebelum` varchar(11) NOT NULL,
  `status_jarak_kehamilan` varchar(50) NOT NULL,
  `penggunaan_kontrasepsi` tinyint(1) NOT NULL,
  `air_minum_layak` tinyint(1) NOT NULL,
  `tempat_bab_layak` tinyint(1) NOT NULL,
  `nama_bayi` varchar(225) NOT NULL,
  `tgl_lahir_bayi` varchar(11) NOT NULL,
  `usia_bayi` int(2) NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `urutan_anak_ke` int(2) NOT NULL,
  `status_urutan_anak` int(2) NOT NULL,
  `umur_kehamilan` varchar(50) NOT NULL,
  `pb_lahir` varchar(50) NOT NULL,
  `bb_kehamilan` varchar(50) NOT NULL,
  `asi_ekslusif` tinyint(1) NOT NULL,
  `tgl_pengukuran_saat_ini` varchar(50) NOT NULL,
  `bb_saat_ini` varchar(50) NOT NULL,
  `status_bb_saat_ini` varchar(50) NOT NULL,
  `pb_saat_ini` varchar(50) NOT NULL,
  `status_pb` varchar(50) NOT NULL,
  `status_bb_pb` varchar(50) NOT NULL,
  `pengisian_kka` tinyint(1) NOT NULL,
  `kehadiran_posyandu` tinyint(1) NOT NULL,
  `penyuluhan_kie` tinyint(1) NOT NULL,
  `pemberian_fasilitas_rujukan` tinyint(1) NOT NULL,
  `bansos` tinyint(1) NOT NULL,
  `kunjungan` int(1) NOT NULL,
  `tgl_kunjungan` varchar(11) NOT NULL,
  `catatan_baduta` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_baduta` */

/*Table structure for table `tbl_bumil` */

DROP TABLE IF EXISTS `tbl_bumil`;

CREATE TABLE `tbl_bumil` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kode_bumil` varchar(20) NOT NULL,
  `wilayah_id` int(12) NOT NULL,
  `pendamping_id` int(12) NOT NULL,
  `nik` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah_anak` int(2) NOT NULL,
  `status_jumlah_anak` tinyint(1) NOT NULL,
  `usia_hamil` int(2) NOT NULL,
  `tfu` varchar(5) NOT NULL,
  `status_tfu` tinyint(1) NOT NULL,
  `bb` int(5) NOT NULL,
  `tb` int(5) NOT NULL,
  `imt` int(5) NOT NULL,
  `status_imt` tinyint(1) NOT NULL,
  `riwayat_penyakit` varchar(225) NOT NULL,
  `status_riwayat_penyakit` tinyint(1) NOT NULL,
  `kadar_hb` varchar(10) NOT NULL,
  `status_hb` tinyint(1) NOT NULL,
  `lila` varchar(10) NOT NULL,
  `status_lila` tinyint(1) NOT NULL,
  `tbj` int(2) NOT NULL,
  `status_tbj` varchar(50) NOT NULL,
  `terpapar_rokok` tinyint(1) NOT NULL,
  `suplement_darah` tinyint(1) NOT NULL,
  `rujukan_pelayanan` tinyint(1) NOT NULL,
  `bansos` tinyint(1) NOT NULL,
  `tgl_kunjungan` varchar(11) NOT NULL,
  `kunjungan` tinyint(2) NOT NULL,
  `catatan_kunjungan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_bumil` */

/*Table structure for table `tbl_catin` */

DROP TABLE IF EXISTS `tbl_catin`;

CREATE TABLE `tbl_catin` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kode_catin` varchar(20) NOT NULL,
  `wilayah_id` int(10) NOT NULL,
  `pendamping_id` int(12) NOT NULL,
  `nama_catin_pria` varchar(225) NOT NULL,
  `nik_catin_pria` varchar(100) NOT NULL,
  `tgl_lahir_catin_pria` varchar(20) NOT NULL,
  `usia_catin_pria` varchar(5) NOT NULL,
  `status_usia_catin_pria` tinyint(1) NOT NULL,
  `alamat_catin_pria` text NOT NULL,
  `nama_catin_wanita` varchar(225) NOT NULL,
  `telp_catin_wanita` varchar(13) NOT NULL,
  `nik_catin_wanita` varchar(100) NOT NULL,
  `tgl_lahir_catin_wanita` varchar(20) NOT NULL,
  `usia_catin_wanita` varchar(5) NOT NULL,
  `status_usia_catin_wanita` int(1) NOT NULL,
  `alamat_catin_wanita` text NOT NULL,
  `tgl_pernikahan` varchar(20) NOT NULL,
  `tb_catin_wanita` int(5) NOT NULL,
  `bb_catin_wanita` int(5) NOT NULL,
  `imt` int(2) NOT NULL,
  `status_imt` tinyint(1) NOT NULL,
  `kadar_hb` varchar(20) NOT NULL,
  `status_hb` varchar(20) NOT NULL,
  `terpapar_rokok` tinyint(1) NOT NULL,
  `lila` varchar(10) NOT NULL,
  `merokok_pria` tinyint(1) NOT NULL,
  `status_resiko` tinyint(1) NOT NULL,
  `status_ideal` tinyint(1) NOT NULL,
  `tgl_pendampingan` varchar(20) NOT NULL,
  `kunjungan` int(11) NOT NULL,
  `catatan_pendampingan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_catin` */

/*Table structure for table `tbl_ket_variabel` */

DROP TABLE IF EXISTS `tbl_ket_variabel`;

CREATE TABLE `tbl_ket_variabel` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `tbl_variabel` varchar(100) NOT NULL,
  `nama_variabel` varchar(100) NOT NULL,
  `ket_variabel` varchar(100) NOT NULL,
  `kode` int(11) DEFAULT NULL,
  `ket_kode` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_ket_variabel` */

/*Table structure for table `tbl_pasca_persalinan` */

DROP TABLE IF EXISTS `tbl_pasca_persalinan`;

CREATE TABLE `tbl_pasca_persalinan` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kode_pasca_persalinan` int(12) NOT NULL,
  `wilayah_id` int(12) NOT NULL,
  `pendamping_id` int(12) NOT NULL,
  `nik` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `tgl_lahir` varchar(11) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_melahirkan` varchar(11) NOT NULL,
  `tempat_persalinan` tinyint(1) NOT NULL,
  `penolong_persalinan` tinyint(1) NOT NULL,
  `komplikasi_nifas` tinyint(1) NOT NULL,
  `jenis_komplikasi` varchar(25) NOT NULL,
  `kb_pasca_persalinan` tinyint(1) NOT NULL,
  `jenis_kb` tinyint(1) NOT NULL,
  `alasan_kb` varchar(20) NOT NULL,
  `alasan_tidak_kb` varchar(20) NOT NULL,
  `status_ibu` tinyint(1) NOT NULL,
  `rujukan_pelayanan` tinyint(1) NOT NULL,
  `bansos` tinyint(1) NOT NULL,
  `tgl_kunjungan_berikut` varchar(11) NOT NULL,
  `tgl_kunjungan` varchar(11) NOT NULL,
  `kunjungan` int(2) NOT NULL,
  `catatan_kunjungan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pasca_persalinan` */

/*Table structure for table `tbl_setting` */

DROP TABLE IF EXISTS `tbl_setting`;

CREATE TABLE `tbl_setting` (
  `idset` int(8) NOT NULL AUTO_INCREMENT,
  `idadm` int(8) NOT NULL,
  `googlecode` text NOT NULL,
  `judul` varchar(75) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `telp2` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `metatag` text NOT NULL,
  `footer` text NOT NULL,
  `fb` text NOT NULL,
  `twitter` text NOT NULL,
  `google` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `linked` text NOT NULL,
  `metadesc` text NOT NULL,
  `metakey` text NOT NULL,
  `maps` varchar(600) NOT NULL,
  PRIMARY KEY (`idset`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_setting` */

insert  into `tbl_setting`(`idset`,`idadm`,`googlecode`,`judul`,`deskripsi`,`logo`,`alamat`,`telp`,`telp2`,`email`,`metatag`,`footer`,`fb`,`twitter`,`google`,`youtube`,`linked`,`metadesc`,`metakey`,`maps`) values 
(1,2,'','Aplikasi','Aplikasi','logo.png','Jalan Cemara Komplek Perkantoran Pemda Tulang Bawang, Menggala.','08120000000','0721 000 222','','','Copyright © 2020 DISKOMINFO. All Rights Reserved.','','','','','','','','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127101.55546063841!2d105.20069698136186!3d-5.428575518058512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40da46f3aa6fbf%3A0x3039d80b220cc40!2sBandar+Lampung%2C+Kota+Bandar+Lampung%2C+Lampung!5e0!3m2!1sid!2sid!4v1485576407886\" width=\"100%\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>');

/*Table structure for table `tbl_user_tpk` */

DROP TABLE IF EXISTS `tbl_user_tpk`;

CREATE TABLE `tbl_user_tpk` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `wilayah_id` int(12) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_user_mitra_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_user_tpk` */

insert  into `tbl_user_tpk`(`id`,`wilayah_id`,`nama`,`jabatan`,`alamat`,`avatar`,`no_telp`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(3,31,'Ardi Andra',NULL,NULL,NULL,'085769306099','testing@gmail.com',NULL,'$2y$10$uMTECjdLypD1Wfp29aSgf.MYxq6OK6m.jSNzSLol72kYiptVYANG.','hurgQrcFsnj1YcPsdJqW1JIjPzqVMmV6ZhuwYpMcQJqcg5W7dbYPuSRENzYN','2022-08-14 19:50:22','2022-08-14 19:50:22');

/*Table structure for table `tbl_wilayah` */

DROP TABLE IF EXISTS `tbl_wilayah`;

CREATE TABLE `tbl_wilayah` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kode` varchar(39) DEFAULT NULL,
  `nama` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_wilayah` */

insert  into `tbl_wilayah`(`id`,`kode`,`nama`) values 
(31,'18.05.02','Menggala'),
(32,'18.05.02.1008','Menggala Selatan'),
(33,'18.05.02.1009','Ujung Gunung Ilir'),
(34,'18.05.02.1010','Menggala Tengah'),
(35,'18.05.02.1011','Menggala Kota'),
(36,'18.05.02.2001','Bujung Tenuk'),
(37,'18.05.02.2002','Ujung Gunung Ilir'),
(38,'18.05.02.2007','Astra Ksetra'),
(39,'18.05.02.2013','Kagungan Rahayu'),
(40,'18.05.02.2014','Tiuh Tohou'),
(41,'18.05.06','Gedung Aji'),
(42,'18.05.06.2001','Aji Jaya KNPI'),
(43,'18.05.06.2002','Kecubung Jaya'),
(44,'18.05.06.2008','Kecubung Mulya'),
(45,'18.05.06.2015','Gedung Aji'),
(46,'18.05.06.2016','Penawar'),
(47,'18.05.06.2022','Penawar Baru'),
(48,'18.05.06.2023','Aji Murni Jaya'),
(49,'18.05.06.2024','Aji Mesir'),
(50,'18.05.06.2025','Aji Permai Talang Buah'),
(51,'18.05.06.2026','Bandar Aji Jaya'),
(52,'18.05.08','Banjar Agung'),
(53,'18.05.08.2001','Banjar Agung'),
(54,'18.05.08.2007','Tri Dharma Wira Jaya'),
(55,'18.05.08.2009','Moris Jaya'),
(56,'18.05.08.2010','Tunggal Warga'),
(57,'18.05.08.2011','Dwi Warga Tunggal Jaya'),
(58,'18.05.08.2019','Tri Mulya Jaya'),
(59,'18.05.08.2020','Tri Mukti Jaya'),
(60,'18.05.08.2021','Tri Tunggal Jaya'),
(61,'18.05.08.2022','Warga Makmur Jaya'),
(62,'18.05.08.2023','Warga Indah Jaya'),
(63,'18.05.08.2024','Banjar Dewa'),
(64,'18.05.11','Gedung Meneng'),
(65,'18.05.11.2001','Gunung Tapa'),
(66,'18.05.11.2002','Gedung Meneng'),
(67,'18.05.11.2006','Bakung Udik'),
(68,'18.05.11.2007','Bakung Ilir'),
(69,'18.05.11.2008','Gedung Bandar Rahayu'),
(70,'18.05.11.2014','Gunung Tapa Ilir'),
(71,'18.05.11.2015','Gunung Tapa Tengah'),
(72,'18.05.11.2016','Gunung Tapa Udik'),
(73,'18.05.11.2017','Gedung Bandar Rejo'),
(74,'18.05.11.2018','Bakung Rahayu'),
(75,'18.05.11.2019','Gedung Meneng Baru'),
(76,'18.05.12','Rawa Jitu Selatan'),
(77,'18.05.12.2003','Yudha Karya Jitu'),
(78,'18.05.12.2004','Gedung Karya Jitu'),
(79,'18.05.12.2005','Hargo Rejo'),
(80,'18.05.12.2006','Wono Agung'),
(81,'18.05.12.2008','Karya Jitu Mukti'),
(82,'18.05.12.2009','Bumi Ratu'),
(83,'18.05.12.2010','Medasari'),
(84,'18.05.12.2013','Hargo Mulyo'),
(85,'18.05.12.2014','Karya Cipta Abadi'),
(86,'18.05.13','Penawar Tama'),
(87,'18.05.13.2001','Tri Rejo Mulyo'),
(88,'18.05.13.2002','Tri Jaya'),
(89,'18.05.13.2005','Sidoharjo'),
(90,'18.05.13.2006','Sidomulyo'),
(91,'18.05.13.2010','Bogatama'),
(92,'18.05.13.2011','Wiratama'),
(93,'18.05.13.2013','Tri Tunggal Jaya'),
(94,'18.05.13.2019','Pulo Gadung'),
(95,'18.05.13.2020','Sidodadi'),
(96,'18.05.13.2021','Dwimulyo'),
(97,'18.05.13.2022','Rejo Sari'),
(98,'18.05.13.2023','Wira Agung Sari'),
(99,'18.05.13.2024','Sidomakmur'),
(100,'18.05.13.2025','Trikarya'),
(101,'18.05.18','Rawa Jitu Timur'),
(102,'18.05.18.2001','Bumi Dipasena Utama'),
(103,'18.05.18.2002','Bumi Dipasena Agung'),
(104,'18.05.18.2003','Bumi Dipasena Jaya'),
(105,'18.05.18.2004','Bumi Dipasena Abadi'),
(106,'18.05.18.2005','Bumi Dipasena Makmur'),
(107,'18.05.18.2006','Bumi Sentosa'),
(108,'18.05.18.2007','Bumi Dipasena Mulya'),
(109,'18.05.18.2008','Bumi Dipasena Sjahtera'),
(110,'18.05.20','Banjar Margo'),
(111,'18.05.20.2001','Bujuk Agung'),
(112,'18.05.20.2002','Ringin Sari'),
(113,'18.05.20.2003','Sukamaju'),
(114,'18.05.20.2004','Catur Karya Buana'),
(115,'18.05.20.2005','Purwa Jaya'),
(116,'18.05.20.2006','Penawar Jaya'),
(117,'18.05.20.2007','Agung Dalem'),
(118,'18.05.20.2008','Sumber Makmur'),
(119,'18.05.20.2009','Tri Tunggal Jaya'),
(120,'18.05.20.2010','Agung Jaya'),
(121,'18.05.20.2011','Penawar Rejo'),
(122,'18.05.20.2012','Mekar Jaya'),
(123,'18.05.22','Rawa Pitu'),
(124,'18.05.22.2001','Sumber Agung'),
(125,'18.05.22.2002','Batang Hari'),
(126,'18.05.22.2003','Panggung Mulyo'),
(127,'18.05.22.2004','Duto Yoso Mulyo'),
(128,'18.05.22.2005','Andalas Cermin'),
(129,'18.05.22.2006','Rawa Ragil'),
(130,'18.05.22.2007','Gedung Jaya'),
(131,'18.05.22.2008','Bumi Sari'),
(132,'18.05.22.2009','Mulyo Dadi'),
(133,'18.05.23','Penawar Aji'),
(134,'18.05.23.2001','Gedung Harapan'),
(135,'18.05.23.2002','Gedung Asri'),
(136,'18.05.23.2003','Gedung Rejo Sakti'),
(137,'18.05.23.2004','Pasar Batang'),
(138,'18.05.23.2005','Suka Makmur'),
(139,'18.05.23.2006','Karya Makmur'),
(140,'18.05.23.2007','Wono Rejo'),
(141,'18.05.23.2008','Panca Tunggal Jaya'),
(142,'18.05.23.2009','Sumber Sari'),
(143,'18.05.25','Dente Teladas'),
(144,'18.05.25.2001','Teladas'),
(145,'18.05.25.2002','Kekatung'),
(146,'18.05.25.2003','Kuala Teladas'),
(147,'18.05.25.2004','Mahabang'),
(148,'18.05.25.2005','Sungai Nibung'),
(149,'18.05.25.2006','Pasiran Jaya'),
(150,'18.05.25.2007','Bratasena Adiwarna'),
(151,'18.05.25.2008','Bratasena Mandiri'),
(152,'18.05.25.2009','Way Dente'),
(153,'18.05.25.2010','Dente Makmur'),
(154,'18.05.25.2011','Pendowo Asri'),
(155,'18.05.25.2012','Sungai Burung'),
(156,'18.05.26','Meraksa Aji'),
(157,'18.05.26.2001','Bangun Rejo'),
(158,'18.05.26.2002','Paduan Rajawali'),
(159,'18.05.26.2003','Karya Bhakti'),
(160,'18.05.26.2004','Sukarame'),
(161,'18.05.26.2005','Bina Bumi'),
(162,'18.05.26.2006','Mulyo Aji'),
(163,'18.05.26.2007','Kecubung Raya'),
(164,'18.05.26.2008','Marga Jaya'),
(165,'18.05.27','Gedung Aji Baru'),
(166,'18.05.27.2001','Sidomukti'),
(167,'18.05.27.2002','Mesir Dwi Jaya'),
(168,'18.05.27.2003','Makartitama'),
(169,'18.05.27.2004','Suka Bhakti'),
(170,'18.05.27.2005','Batu Ampar'),
(171,'18.05.27.2006','Setia Tama'),
(172,'18.05.27.2007','Sumber Jaya'),
(173,'18.05.27.2008','Mekar Asri'),
(174,'18.05.27.2009','Sidomekar'),
(175,'18.05.29','Banjar Baru'),
(176,'18.05.29.2001','Panca Mulia'),
(177,'18.05.29.2002','Panca Karsa Purna Jaya'),
(178,'18.05.29.2003','Kahuripan Jaya'),
(179,'18.05.29.2004','Bawang Sakti Jaya'),
(180,'18.05.29.2005','Mekar Jaya'),
(181,'18.05.29.2006','Balai Murni Jaya'),
(182,'18.05.29.2007','Mekar Indah Jaya'),
(183,'18.05.29.2008','Jaya Makmur'),
(184,'18.05.29.2009','Bawang Tirto Mulyo'),
(185,'18.05.29.2010','Karya Murni Jaya'),
(186,'18.05.30','Menggala Timur'),
(187,'18.05.30.2001','Lebuh Dalam'),
(188,'18.05.30.2002','Menggala'),
(189,'18.05.30.2003','Lingai'),
(190,'18.05.30.2004','Kibang Pacing'),
(191,'18.05.30.2005','Sungai Luar'),
(192,'18.05.30.2006','Kahuripan Dalam'),
(193,'18.05.30.2007','Cempaka Dalem'),
(194,'18.05.30.2008','Bedarou Indah'),
(195,'18.05.30.2009','Tri Makmur Jaya'),
(196,'18.05.30.2010','Cempaka Jaya');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
