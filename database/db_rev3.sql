/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.38-MariaDB : Database - ims
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ims` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ims`;

/*Table structure for table `asset` */

DROP TABLE IF EXISTS `asset`;

CREATE TABLE `asset` (
  `id_asset` varchar(50) NOT NULL,
  `nama_asset` varchar(50) DEFAULT NULL,
  `id_jenis_asset` varchar(50) DEFAULT NULL,
  `id_kategori_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` enum('Tersedia','Rusak','Maintenance') DEFAULT NULL,
  PRIMARY KEY (`id_asset`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `asset` */

insert  into `asset`(`id_asset`,`nama_asset`,`id_jenis_asset`,`id_kategori_asset`,`jumlah`,`status`) values 
('ASST-1910-0001','Mobil','HRG-1910-0001','KTG-1910-0001',5,'Tersedia'),
('ASST-1910-0002','Gedung A','HRG-1910-0004','KTG-1910-0002',2,'Tersedia');

/*Table structure for table `det_inventarisasi` */

DROP TABLE IF EXISTS `det_inventarisasi`;

CREATE TABLE `det_inventarisasi` (
  `id_det_inventarisasi` varchar(50) NOT NULL,
  `id_inventarisasi` varchar(50) DEFAULT NULL,
  `id_pengajuan` varchar(50) DEFAULT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_inventarisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_inventarisasi` */

/*Table structure for table `det_pengajuan` */

DROP TABLE IF EXISTS `det_pengajuan`;

CREATE TABLE `det_pengajuan` (
  `id_det_pengajuan` varchar(50) NOT NULL,
  `id_pengajuan` varchar(50) DEFAULT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  PRIMARY KEY (`id_det_pengajuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_pengajuan` */

/*Table structure for table `det_pengelolaan` */

DROP TABLE IF EXISTS `det_pengelolaan`;

CREATE TABLE `det_pengelolaan` (
  `id_det_pengelolaan` varchar(50) NOT NULL,
  `id_pengelolaan` varchar(50) DEFAULT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_pengelolaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_pengelolaan` */

/*Table structure for table `det_penghapusan` */

DROP TABLE IF EXISTS `det_penghapusan`;

CREATE TABLE `det_penghapusan` (
  `id_det_penghapusan` varchar(50) NOT NULL,
  `id_penghapusan` varchar(50) DEFAULT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `jenis_hapus` varchar(50) DEFAULT NULL,
  `nilai_asset` double DEFAULT NULL,
  PRIMARY KEY (`id_det_penghapusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_penghapusan` */

/*Table structure for table `det_perencanaan` */

DROP TABLE IF EXISTS `det_perencanaan`;

CREATE TABLE `det_perencanaan` (
  `id_det_perencanaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_perencanaan` varchar(50) DEFAULT NULL,
  `id_kategori_asset` varchar(50) DEFAULT NULL,
  `id_jenis_asset` varchar(50) DEFAULT NULL,
  `nama_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  PRIMARY KEY (`id_det_perencanaan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `det_perencanaan` */

insert  into `det_perencanaan`(`id_det_perencanaan`,`id_perencanaan`,`id_kategori_asset`,`id_jenis_asset`,`nama_asset`,`jumlah`,`harga`,`total_harga`) values 
(1,NULL,'KTG-1910-0001','HRG-1910-0001','sadasd',NULL,NULL,20000);

/*Table structure for table `inventarisasi` */

DROP TABLE IF EXISTS `inventarisasi`;

CREATE TABLE `inventarisasi` (
  `id_inventarisasi` varchar(50) NOT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `id_pengajuan` varchar(50) DEFAULT NULL,
  `status` enum('Sudah Diinput','Belum Diinput') DEFAULT NULL,
  PRIMARY KEY (`id_inventarisasi`),
  CONSTRAINT `inventarisasi_ibfk_1` FOREIGN KEY (`id_inventarisasi`) REFERENCES `det_inventarisasi` (`id_det_inventarisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inventarisasi` */

/*Table structure for table `jenis_asset` */

DROP TABLE IF EXISTS `jenis_asset`;

CREATE TABLE `jenis_asset` (
  `id_jenis_asset` varchar(50) NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_asset`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jenis_asset` */

insert  into `jenis_asset`(`id_jenis_asset`,`nama_jenis`) values 
('HRG-1910-0001','Peralatan'),
('HRG-1910-0002','Perlengkapan'),
('HRG-1910-0003','Kendaraan'),
('HRG-1910-0004','Gedung/Bangunan'),
('HRG-1910-0005','Tanah'),
('HRG-1910-0006','Lain - Lain');

/*Table structure for table `kategori_asset` */

DROP TABLE IF EXISTS `kategori_asset`;

CREATE TABLE `kategori_asset` (
  `id_kategori_asset` varchar(50) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_asset`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori_asset` */

insert  into `kategori_asset`(`id_kategori_asset`,`nama_kategori`) values 
('KTG-1910-0001','Asset Bergerak'),
('KTG-1910-0002','Asset Tak Bergerak');

/*Table structure for table `pengajuan` */

DROP TABLE IF EXISTS `pengajuan`;

CREATE TABLE `pengajuan` (
  `id_pengajuan` varchar(50) NOT NULL,
  `tgl_pengajuan` datetime DEFAULT NULL,
  `id_perencanaan` varchar(50) DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `status` enum('Proses','Ditolak','Peninjauan Ulang') DEFAULT NULL,
  PRIMARY KEY (`id_pengajuan`),
  CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `inventarisasi` (`id_inventarisasi`),
  CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_pengajuan`) REFERENCES `det_pengajuan` (`id_det_pengajuan`),
  CONSTRAINT `pengajuan_ibfk_3` FOREIGN KEY (`id_pengajuan`) REFERENCES `det_inventarisasi` (`id_det_inventarisasi`),
  CONSTRAINT `pengajuan_ibfk_4` FOREIGN KEY (`id_pengajuan`) REFERENCES `inventarisasi` (`id_inventarisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengajuan` */

/*Table structure for table `pengelolaan` */

DROP TABLE IF EXISTS `pengelolaan`;

CREATE TABLE `pengelolaan` (
  `id_pengelolaan` varchar(50) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status_pengelolaan` enum('Sewa') DEFAULT NULL,
  PRIMARY KEY (`id_pengelolaan`),
  CONSTRAINT `pengelolaan_ibfk_1` FOREIGN KEY (`id_pengelolaan`) REFERENCES `det_pengelolaan` (`id_det_pengelolaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengelolaan` */

/*Table structure for table `penghapusan` */

DROP TABLE IF EXISTS `penghapusan`;

CREATE TABLE `penghapusan` (
  `id_penghapusan` varchar(50) NOT NULL,
  `tgl_hapus` datetime DEFAULT NULL,
  `id_staff` varchar(50) DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `status` enum('Sudah Dihapus','Pending','Proses') DEFAULT NULL,
  PRIMARY KEY (`id_penghapusan`),
  CONSTRAINT `penghapusan_ibfk_1` FOREIGN KEY (`id_penghapusan`) REFERENCES `det_penghapusan` (`id_det_penghapusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penghapusan` */

/*Table structure for table `penyusutan` */

DROP TABLE IF EXISTS `penyusutan`;

CREATE TABLE `penyusutan` (
  `id_penyusutan` varchar(50) NOT NULL,
  `nilai_penyusutan` double DEFAULT NULL,
  PRIMARY KEY (`id_penyusutan`),
  CONSTRAINT `penyusutan_ibfk_1` FOREIGN KEY (`id_penyusutan`) REFERENCES `trans_penyusutan` (`id_trans_penyusutan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penyusutan` */

/*Table structure for table `perencanaan` */

DROP TABLE IF EXISTS `perencanaan`;

CREATE TABLE `perencanaan` (
  `id_perencanaan` varchar(50) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `tgl_rencana_pengadaan` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tujuan` text,
  `total_perencanaan` double DEFAULT NULL,
  PRIMARY KEY (`id_perencanaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `perencanaan` */

insert  into `perencanaan`(`id_perencanaan`,`tgl_transaksi`,`tgl_rencana_pengadaan`,`id_user`,`tujuan`,`total_perencanaan`) values 
('TRB-1910-0001','2019-10-23 00:00:00',NULL,1,'asdasdas',NULL),
('TRB-1910-0002','2019-10-23 00:00:00',NULL,1,'',NULL);

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `id_staff` varchar(50) NOT NULL,
  `nama_staff` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_staff`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `staff` */

insert  into `staff`(`id_staff`,`nama_staff`,`alamat`,`no_hp`,`jabatan`,`id_user`) values 
('STF-1910-0003','Test Dev','Test','87382738192','Pegawai',1);

/*Table structure for table `trans_penyusutan` */

DROP TABLE IF EXISTS `trans_penyusutan`;

CREATE TABLE `trans_penyusutan` (
  `id_trans_penyusutan` varchar(50) NOT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `id_penyusutan` varchar(50) DEFAULT NULL,
  `nilai_beli` double DEFAULT NULL,
  `nilai_asset` double DEFAULT NULL,
  PRIMARY KEY (`id_trans_penyusutan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trans_penyusutan` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang','Pegawai') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  KEY `level` (`hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id_user`,`username`,`nama_user`,`password`,`email`,`telepon`,`foto`,`hak_akses`,`status`,`created_at`,`updated_at`) values 
(1,'superadmin','superadmin','17c4520f6cfd1ab53d8745e84681eb49','superadmin@gmail.com','12345678','user-default.png','Super Admin','aktif','2017-04-01 15:15:15','2019-01-22 10:19:40'),
(2,'kadina','Kadina Putri','202cb962ac59075b964b07152d234b70','kadinaputri@gmail.com','085680892909','kadina.png','Manajer','aktif','2017-04-01 15:15:15','2017-04-01 15:15:15'),
(3,'danang','Danang Kesuma','202cb962ac59075b964b07152d234b70','danang@gmail.com','085758858855','','Pegawai','aktif','2017-04-01 15:15:15','2019-01-22 10:34:09');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
