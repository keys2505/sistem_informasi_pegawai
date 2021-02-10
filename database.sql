/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.5.19 : Database - tugas_web
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tugas_web` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tugas_web`;

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `ID_KARYAWAN` bigint(20) NOT NULL,
  `NAMA_KARYAWAN` varchar(100) DEFAULT NULL,
  `ALAMAT` varchar(250) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(100) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `JENIS_KELAMIN` varchar(15) DEFAULT NULL,
  `STATUS_PERKAWINAN` varchar(100) DEFAULT NULL,
  `JABATAN` varchar(200) DEFAULT NULL,
  `DEPARTEMENT` varchar(150) DEFAULT NULL,
  `STATUS_RESIGN` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_KARYAWAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

insert  into `karyawan`(`ID_KARYAWAN`,`NAMA_KARYAWAN`,`ALAMAT`,`TEMPAT_LAHIR`,`TANGGAL_LAHIR`,`JENIS_KELAMIN`,`STATUS_PERKAWINAN`,`JABATAN`,`DEPARTEMENT`,`STATUS_RESIGN`) values 
(20201010,'KADEK2','alamat2','tempatlahir2','2021-02-12','LAKI-LAKI','TK/2','Staff','Security',1),
(20210208185202,'eri','dfd','dfdf','2021-02-08','0','TK/0','Direktur','Accounting',0),
(20210208185708,'te','rer','ere','2021-02-08','0','TK/0','Direktur','Accounting',0),
(20210209010611,'test','tsete','test','2021-02-09','0','TK/0','Direktur','Accounting',0),
(20210209010645,'test','tsete','test','2021-02-09','0','TK/0','Direktur','Accounting',0),
(20210209010740,'dfd','fdf','fdf','2021-02-09','0','TK/0','Direktur','Accounting',0),
(20210209010756,'dfdf','fdfdf','fdfdfdf','2021-02-09','0','TK/0','Direktur','Accounting',0),
(20210209200600,'tet','tsestset','etst','2021-02-09','0','TK/0','Direktur','Security',0),
(20210209200933,'dfdf','fdf','dfd','2021-02-09','0','TK/0','Direktur','Accounting',0),
(20210209201215,'dfd','dfdf','dfd','2021-02-09','0','TK/0','Direktur','Accounting',0),
(20210209203031,'tet','erer','erer','2021-02-09','0','TK/0','Direktur','Accounting',0),
(20210209203040,'erer','err','rer','2021-02-09','0','TK/0','Direktur','Accounting',0),
(20210209212652,'dfdf','dfd','dfd','2021-02-09','0','TK/0','Direktur','Accounting',0),
(20210209212702,'dfd','dfd','dfd','2021-02-09','0','TK/0','Direktur','Accounting',0);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `ID_USER` bigint(20) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `FULLNAME` varchar(150) DEFAULT NULL,
  `EMAIL` varchar(150) DEFAULT NULL,
  `USER_TYPE` int(1) DEFAULT NULL,
  `USER_STATUS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`ID_USER`,`USERNAME`,`PASSWORD`,`FULLNAME`,`EMAIL`,`USER_TYPE`,`USER_STATUS`) values 
(20210209211711,'test2','test2','test2','sds',0,0),
(20210209211727,'dfd','dfd','dfdf','fdfd',0,0),
(20210209211806,'eri','123','eri','sds',1,1),
(20210209211920,'eri','123','eri','sds',1,1),
(20210209212019,'dfdfd','user','fullname','email',1,1),
(20210209212034,'001-ert','user','fullname','email',1,1),
(20210209213110,'000000','dfd','dfdf','dfdf',0,0),
(20210209213116,'ddfdf','dfd','dfdf','dfdf',0,0),
(20210209213126,'321','sdsd','sdsd','sds',0,0),
(20210209213320,'dfdfd','dfd','dfdf','dfd',0,0),
(20210209214202,'34','sds','sds','sdsd',0,0),
(20210210105541,'test','test','test','test',0,0),
(202102011053001,'admin','admin','administrator','admin@gmai.com',1,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
