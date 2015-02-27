/*
SQLyog Community v11.31 (32 bit)
MySQL - 5.5.39 : Database - rekrutmen
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rekrutmen` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rekrutmen`;

/*Table structure for table `criteria_value_matrix` */

DROP TABLE IF EXISTS `criteria_value_matrix`;

CREATE TABLE `criteria_value_matrix` (
  `row` int(5) NOT NULL,
  `column` int(5) NOT NULL,
  `criteria_1` int(5) NOT NULL,
  `criteria_2` int(5) NOT NULL,
  `alias_criteria_1` varchar(5) DEFAULT NULL,
  `alias_criteria_2` varchar(5) DEFAULT NULL,
  `value` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`row`,`column`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `criteria_value_matrix` */

/*Table structure for table `intensitas` */

DROP TABLE IF EXISTS `intensitas`;

CREATE TABLE `intensitas` (
  `id_intentsitas` int(5) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(5) NOT NULL,
  `tambahan` varchar(10) DEFAULT NULL,
  `range_bawah` double NOT NULL DEFAULT '0',
  `range_atas` double NOT NULL DEFAULT '0',
  `intensitas` int(3) DEFAULT '1',
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_intentsitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `intensitas` */

/*Table structure for table `kriteria` */

DROP TABLE IF EXISTS `kriteria`;

CREATE TABLE `kriteria` (
  `id_kriteria` int(5) NOT NULL AUTO_INCREMENT,
  `parent_kriteria` int(5) DEFAULT NULL,
  `kode_kriteria` varchar(4) NOT NULL,
  `nama_kriteria` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`,`kode_kriteria`),
  KEY `parent_kriteria` (`parent_kriteria`),
  CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`parent_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `kriteria` */

insert  into `kriteria`(`id_kriteria`,`parent_kriteria`,`kode_kriteria`,`nama_kriteria`,`keterangan`) values (4,NULL,'K1','IPK','Nilai pencapaian peserta setelah pendidikan'),(9,NULL,'K2','Pendidikan',''),(10,NULL,'K3','Identitas Diri',''),(13,10,'SK1','Proporsional',''),(14,10,'SK2','Usia',''),(15,10,'SK3','Ketekunan','<font face=\"Arial, Verdana\"><span  13.3333330154419px;\">Ketekunan</span></font>'),(23,NULL,'K4','Psikotes',''),(24,NULL,'K5','Hasil Wawancara',''),(25,24,'SK1','Komunikasi',''),(26,24,'SK2','Dampak',''),(27,24,'SK3','Motivasi',''),(28,24,'SK4','Wawancara',''),(29,24,'SK5','Pengendalian Diri',''),(30,24,'SK6','Keterampilan Sosial',''),(31,24,'SK7','Inisiatif','');

/*Table structure for table `pairwise_comparison_matrix` */

DROP TABLE IF EXISTS `pairwise_comparison_matrix`;

CREATE TABLE `pairwise_comparison_matrix` (
  `row` int(5) NOT NULL,
  `column` int(5) NOT NULL,
  `criteria_1` int(5) NOT NULL,
  `criteria_2` int(5) NOT NULL,
  `alias_criteria_1` varchar(5) DEFAULT NULL,
  `alias_criteria_2` varchar(5) DEFAULT NULL,
  `value` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`row`,`column`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pairwise_comparison_matrix` */

/*Table structure for table `pendidikan` */

DROP TABLE IF EXISTS `pendidikan`;

CREATE TABLE `pendidikan` (
  `no_peserta` int(5) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(150) DEFAULT NULL,
  `institusi` varchar(150) NOT NULL,
  `lama_pendidikan` int(5) DEFAULT NULL,
  `jurusan` varchar(170) DEFAULT NULL,
  `tahun_masuk` int(5) DEFAULT NULL,
  `tahun_ijazah` int(5) DEFAULT NULL,
  `IPK` double DEFAULT NULL,
  PRIMARY KEY (`no_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pendidikan` */

insert  into `pendidikan`(`no_peserta`,`pendidikan`,`institusi`,`lama_pendidikan`,`jurusan`,`tahun_masuk`,`tahun_ijazah`,`IPK`) values (1,'D3','Universitas Sriwijaya',4,'Sistem Informasi Bilingual',2010,2014,3.6);

/*Table structure for table `peserta` */

DROP TABLE IF EXISTS `peserta`;

CREATE TABLE `peserta` (
  `no_peserta` int(5) NOT NULL AUTO_INCREMENT,
  `nama_peserta` varchar(200) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `agama` enum('Islam','Protestan','Khatolik','Hindu','Budha','Lainnya') DEFAULT 'Lainnya',
  `alamat` text,
  `kode_pos` varchar(7) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `tinggi_badan` int(5) DEFAULT NULL COMMENT 'in cm',
  `berat_badan` int(5) DEFAULT NULL COMMENT 'in kilogram',
  `warga_negara` varchar(50) DEFAULT NULL,
  `hobby` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`no_peserta`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `peserta` */

insert  into `peserta`(`no_peserta`,`nama_peserta`,`tgl_lahir`,`tempat_lahir`,`jenis_kelamin`,`status`,`agama`,`alamat`,`kode_pos`,`no_telp`,`no_hp`,`tinggi_badan`,`berat_badan`,`warga_negara`,`hobby`,`email`,`password`) values (1,'Rahma Fitri','1992-11-19','Palembang','Perempuan','0','Islam','Indonesia','31114','','08981169578',158,40,NULL,'ntah','rahmafitri92@gmail.com','5a1a5593623cdde561bacff4477aec78'),(2,'Frans Filasta Pratama',NULL,NULL,NULL,NULL,'Lainnya',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'therealfrans@gmail.com','fff362de37277ebf4e9aff1a080770e8');

/*Table structure for table `priorities_and_results` */

DROP TABLE IF EXISTS `priorities_and_results`;

CREATE TABLE `priorities_and_results` (
  `row` int(5) NOT NULL DEFAULT '0',
  `priority` double DEFAULT NULL,
  `result` double DEFAULT NULL,
  PRIMARY KEY (`row`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `priorities_and_results` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('manager','staff','admin') NOT NULL DEFAULT 'staff',
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id_user`,`username`,`password`,`role`,`nama`,`jabatan`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','Lisa','Owner');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
