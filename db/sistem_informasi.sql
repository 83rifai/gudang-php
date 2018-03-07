/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : sistem_informasi

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-03-07 09:26:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `Kode_Barang` varchar(10) NOT NULL,
  `Nama_Barang` varchar(15) NOT NULL,
  `Jenis_Barang` varchar(15) NOT NULL,
  `Qty_Stok_Awal` int(11) NOT NULL,
  `Nilai_Satuan` int(11) NOT NULL,
  `Qty_Stok` int(20) NOT NULL,
  `Tanggal_Input` datetime NOT NULL,
  `Tanggal_Ubah` datetime DEFAULT NULL,
  `User_Input` varchar(10) NOT NULL,
  `User_Ubah` varchar(10) DEFAULT NULL,
  `Satuan` varchar(10) NOT NULL,
  PRIMARY KEY (`Kode_Barang`),
  KEY `User_Input` (`User_Input`),
  KEY `User_Ubah` (`User_Ubah`),
  KEY `Jenis_Barang` (`Jenis_Barang`),
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`User_Input`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE,
  CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`User_Ubah`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES ('BB001', '2 x 10 x 120', 'Bahan Baku', '0', '0', '39', '2017-12-08 00:00:00', '2017-12-20 08:58:04', 'PB_002', 'PB_002', 'Batang');
INSERT INTO `barang` VALUES ('BB002', '2 x 8 x 120', 'Bahan Baku', '0', '0', '10', '2017-12-11 00:00:00', '2017-12-20 08:55:57', 'PB_002', 'PB_002', 'Batang');
INSERT INTO `barang` VALUES ('BB003', '3 x 10 x 120', 'Bahan Baku', '0', '0', '29', '2017-12-11 00:00:00', '2017-12-20 08:55:57', 'PB_002', 'PB_002', 'Batang');
INSERT INTO `barang` VALUES ('BB004', '9 x 9 x 120', 'Bahan Baku', '0', '0', '0', '2017-12-11 00:00:00', '2017-12-20 08:55:57', 'PB_002', 'PB_002', 'Batang');
INSERT INTO `barang` VALUES ('BB005', '4 x 8 x 120', 'Bahan Baku', '0', '0', '25', '2017-12-11 00:00:00', '2017-12-20 08:55:57', 'PB_002', 'PB_002', 'Batang');
INSERT INTO `barang` VALUES ('BB006', '5 x 9 x 120', 'Bahan Baku', '0', '0', '11', '2017-12-11 00:00:00', '2017-12-20 08:58:04', 'PB_002', 'PB_002', 'Batang');
INSERT INTO `barang` VALUES ('BJ001', 'Pallet Box', 'Barang Jadi', '0', '0', '0', '2017-12-12 00:00:00', null, 'PB_002', null, 'Pcs');
INSERT INTO `barang` VALUES ('BJ002', 'Pallet Eksport', 'Barang Jadi', '10', '0', '0', '0000-00-00 00:00:00', null, 'PB_002', null, 'Pcs');
INSERT INTO `barang` VALUES ('BJ003', 'Pallet UK. 110 ', 'Barang Jadi', '0', '0', '0', '0000-00-00 00:00:00', null, 'PB_002', null, 'Pcs');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id_customer` varchar(15) NOT NULL,
  `Nama_Customer` varchar(35) NOT NULL,
  `Alamat` varchar(70) NOT NULL,
  `Contact_person` char(15) NOT NULL,
  `Tanggal_Input` datetime NOT NULL,
  `Tanggal_Ubah` datetime DEFAULT NULL,
  `User_Input` varchar(10) NOT NULL,
  `User_Ubah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_customer`),
  KEY `id` (`id_customer`),
  KEY `User_Input` (`User_Input`,`User_Ubah`),
  KEY `User_Input_2` (`User_Input`,`User_Ubah`),
  KEY `User_Ubah` (`User_Ubah`),
  CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`User_Ubah`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE,
  CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`User_Input`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('C001', 'PT.TIMAH INDUSTRI', 'JL. Eropa 1Kav A.3 Krakatau Industrial Estate Cilegon (KIEC)', '(0254) 315009', '2017-12-07 00:00:00', '2017-12-07 00:00:00', 'PB_002', 'PB_002');
INSERT INTO `customer` VALUES ('C002', 'PT. ARCHROMA INDONESIA', 'Kaw. Industrial Baja Krakatau Steel', '062-21-55770', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PB_002', 'PB_002');
INSERT INTO `customer` VALUES ('C003', 'PT. PETROJAYA BORAL PLASTERBOARD', 'KAWASAN INDUSTRI', '0254-83170001', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PB_002', 'PB_002');
INSERT INTO `customer` VALUES ('C004', 'PT.ROHM AND HAAS INDONESIA', 'JL.  Eropa III Kav. M2 Krakatau Industrial Estate Cilegon', '864008202201', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PB_002', 'PB_002');

-- ----------------------------
-- Table structure for detail_jual
-- ----------------------------
DROP TABLE IF EXISTS `detail_jual`;
CREATE TABLE `detail_jual` (
  `No_Jual` varchar(10) NOT NULL,
  `Kode_Barang` varchar(10) NOT NULL,
  `No_Produksi` varchar(10) NOT NULL,
  `PO_Item` varchar(15) NOT NULL,
  `Tanggal_Pengiriman` date NOT NULL,
  `Qty` int(100) NOT NULL,
  `Satuan` varchar(10) NOT NULL,
  `Harga` int(25) NOT NULL,
  `Item_Jual` varchar(10) NOT NULL,
  `Qty_Jadi` int(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Tanggal_Input` datetime NOT NULL,
  `Tanggal_Ubah` datetime DEFAULT NULL,
  `User_Input` varchar(10) NOT NULL,
  `User_Ubah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`No_Jual`,`Kode_Barang`),
  KEY `Item_Jual` (`Item_Jual`),
  KEY `Kode_Barang` (`Kode_Barang`),
  KEY `User_Input` (`User_Input`,`User_Ubah`),
  KEY `User_Ubah` (`User_Ubah`),
  KEY `PO_Item` (`PO_Item`),
  KEY `No_Produksi` (`No_Produksi`),
  CONSTRAINT `detail_jual_ibfk_2` FOREIGN KEY (`User_Input`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE,
  CONSTRAINT `detail_jual_ibfk_3` FOREIGN KEY (`User_Ubah`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE,
  CONSTRAINT `detail_jual_ibfk_4` FOREIGN KEY (`No_Produksi`) REFERENCES `produksi` (`No_Produksi`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_jual
-- ----------------------------

-- ----------------------------
-- Table structure for detail_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `detail_pembelian`;
CREATE TABLE `detail_pembelian` (
  `Kode_Barang` varchar(10) NOT NULL,
  `No_Beli` int(10) NOT NULL,
  `Harga` int(25) NOT NULL,
  `Qty` int(10) NOT NULL,
  `Satuan` varchar(10) NOT NULL,
  `Tanggal_Input` datetime NOT NULL,
  `Tanggal_Ubah` datetime DEFAULT NULL,
  `User_Input` varchar(10) NOT NULL,
  `User_Ubah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Kode_Barang`,`No_Beli`),
  KEY `No_Beli` (`No_Beli`),
  KEY `User_Input` (`User_Input`,`User_Ubah`),
  KEY `User_Ubah` (`User_Ubah`),
  CONSTRAINT `detail_pembelian_ibfk_1` FOREIGN KEY (`No_Beli`) REFERENCES `pembelian` (`No_Beli`) ON UPDATE CASCADE,
  CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`Kode_Barang`) REFERENCES `barang` (`Kode_Barang`) ON UPDATE CASCADE,
  CONSTRAINT `detail_pembelian_ibfk_3` FOREIGN KEY (`User_Ubah`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE,
  CONSTRAINT `detail_pembelian_ibfk_4` FOREIGN KEY (`User_Input`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_pembelian
-- ----------------------------
INSERT INTO `detail_pembelian` VALUES ('BB001', '1180105001', '1000000', '10', 'Batang', '2018-01-05 05:52:42', null, 'PB_002', null);
INSERT INTO `detail_pembelian` VALUES ('BB001', '1180106005', '1000000', '9', 'Batang', '2018-01-06 05:06:58', null, 'PB_002', null);
INSERT INTO `detail_pembelian` VALUES ('BB001', '1180106006', '1000000', '10', 'Batang', '2018-01-06 05:12:08', null, 'PB_002', null);
INSERT INTO `detail_pembelian` VALUES ('BB001', '1180106007', '1000000', '10', 'Batang', '2018-01-06 05:32:41', null, 'PB_002', null);
INSERT INTO `detail_pembelian` VALUES ('BB002', '1180105002', '1000000', '10', 'Batang', '2018-01-05 05:54:04', null, 'PB_002', null);
INSERT INTO `detail_pembelian` VALUES ('BB003', '1180105002', '1025000', '10', 'Batang', '2018-01-05 05:54:05', null, 'PB_002', null);
INSERT INTO `detail_pembelian` VALUES ('BB003', '1180106007', '1000000', '10', 'Batang', '2018-01-06 05:32:41', null, 'PB_002', null);
INSERT INTO `detail_pembelian` VALUES ('BB005', '1180105004', '1000000', '25', 'Batang', '2018-01-05 06:40:45', null, 'PB_002', null);
INSERT INTO `detail_pembelian` VALUES ('BB006', '1180105003', '1000000', '11', 'Batang', '2018-01-05 06:01:04', null, 'PB_002', null);

-- ----------------------------
-- Table structure for detail_produksi
-- ----------------------------
DROP TABLE IF EXISTS `detail_produksi`;
CREATE TABLE `detail_produksi` (
  `No_Produksi` varchar(10) NOT NULL,
  `Kode_Barang` varchar(10) NOT NULL,
  `Qty` int(15) NOT NULL,
  `Satuan` varchar(15) NOT NULL,
  `Tanggal_Input` datetime NOT NULL,
  `Tanggal_Ubah` datetime DEFAULT NULL,
  `User_Input` varchar(10) NOT NULL,
  `User_Ubah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`No_Produksi`,`Kode_Barang`),
  KEY `Kode_Barang` (`Kode_Barang`),
  KEY `User_Input` (`User_Input`,`User_Ubah`),
  KEY `User_Ubah` (`User_Ubah`),
  CONSTRAINT `detail_produksi_ibfk_1` FOREIGN KEY (`Kode_Barang`) REFERENCES `barang` (`Kode_Barang`) ON UPDATE CASCADE,
  CONSTRAINT `detail_produksi_ibfk_2` FOREIGN KEY (`No_Produksi`) REFERENCES `produksi` (`No_Produksi`) ON UPDATE CASCADE,
  CONSTRAINT `detail_produksi_ibfk_3` FOREIGN KEY (`User_Ubah`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE,
  CONSTRAINT `detail_produksi_ibfk_4` FOREIGN KEY (`User_Input`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_produksi
-- ----------------------------
INSERT INTO `detail_produksi` VALUES ('3171217003', 'BB001', '22', 'batang', '2017-12-17 21:51:46', null, 'PB_002', null);
INSERT INTO `detail_produksi` VALUES ('3171217003', 'BB002', '16', 'batang', '2017-12-17 21:51:46', null, 'PB_002', null);
INSERT INTO `detail_produksi` VALUES ('3171217003', 'BB003', '22', 'batang', '2017-12-17 21:51:46', null, 'PB_002', null);
INSERT INTO `detail_produksi` VALUES ('3171217003', 'BB004', '6', 'batang', '2017-12-17 21:51:46', null, 'PB_002', null);
INSERT INTO `detail_produksi` VALUES ('3171217003', 'BB005', '16', 'batang', '2017-12-17 21:51:47', null, 'PB_002', null);

-- ----------------------------
-- Table structure for history
-- ----------------------------
DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `Id` int(11) NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Kode_Transaksi` varchar(10) NOT NULL,
  `Qty` int(100) NOT NULL,
  `Keterangan` varchar(10) NOT NULL,
  `User_Ubah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of history
-- ----------------------------

-- ----------------------------
-- Table structure for jual
-- ----------------------------
DROP TABLE IF EXISTS `jual`;
CREATE TABLE `jual` (
  `No_Jual` varchar(10) NOT NULL,
  `Tanggal_Jual` date NOT NULL,
  `id_customer` varchar(15) NOT NULL,
  `Tanggal_Input` datetime NOT NULL,
  `Tanggal_Ubah` datetime DEFAULT NULL,
  `User_Input` varchar(10) NOT NULL,
  `User_Ubah` varchar(10) DEFAULT NULL,
  `PO` varchar(10) NOT NULL,
  `Tanggal_PO` date NOT NULL,
  PRIMARY KEY (`No_Jual`),
  KEY `id_costumer` (`id_customer`),
  KEY `id_customer` (`id_customer`),
  KEY `User_Input` (`User_Input`,`User_Ubah`),
  KEY `User_Ubah` (`User_Ubah`),
  CONSTRAINT `jual_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON UPDATE CASCADE,
  CONSTRAINT `jual_ibfk_3` FOREIGN KEY (`User_Input`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE,
  CONSTRAINT `jual_ibfk_4` FOREIGN KEY (`User_Ubah`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jual
-- ----------------------------
INSERT INTO `jual` VALUES ('2171217003', '2017-12-09', 'C001', '0000-00-00 00:00:00', '2017-12-27 06:17:58', 'PB_002', 'PB_002', '', '0000-00-00');
INSERT INTO `jual` VALUES ('2180101012', '2018-01-10', 'C004', '2018-01-10 03:11:31', null, 'PB_002', null, '', '0000-00-00');
INSERT INTO `jual` VALUES ('2180101013', '0000-00-00', 'C001', '2018-02-10 05:39:50', null, 'PB_002', null, '', '0000-00-00');
INSERT INTO `jual` VALUES ('2180101014', '0000-00-00', 'C001', '2018-02-10 07:12:49', null, 'PB_002', null, '', '0000-00-00');
INSERT INTO `jual` VALUES ('2180101015', '0000-00-00', 'C001', '2018-02-10 07:12:58', null, 'PB_002', null, '', '0000-00-00');
INSERT INTO `jual` VALUES ('2180101016', '0000-00-00', 'C001', '2018-02-10 07:13:54', null, 'PB_002', null, '', '0000-00-00');
INSERT INTO `jual` VALUES ('2180101017', '0000-00-00', 'C001', '2018-02-10 07:14:09', null, 'PB_002', null, '', '0000-00-00');
INSERT INTO `jual` VALUES ('2180101018', '0000-00-00', 'C001', '2018-02-10 07:15:17', null, 'PB_002', null, '', '0000-00-00');
INSERT INTO `jual` VALUES ('2180101019', '0000-00-00', 'C001', '2018-02-10 07:36:04', null, 'PB_002', null, '', '0000-00-00');

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian` (
  `No_Beli` int(10) NOT NULL AUTO_INCREMENT,
  `Tanggal_Beli` date NOT NULL,
  `Kode_Supplier` varchar(11) NOT NULL,
  `Tanggal_Input` datetime NOT NULL,
  `Tanggal_Ubah` datetime DEFAULT NULL,
  `User_Input` varchar(10) NOT NULL,
  `User_Ubah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`No_Beli`),
  KEY `Kode_Supplier` (`Kode_Supplier`),
  KEY `User_Input` (`User_Input`,`User_Ubah`),
  KEY `User_Ubah` (`User_Ubah`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`Kode_Supplier`) REFERENCES `supplier` (`Kode_Supplier`) ON UPDATE CASCADE,
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`User_Ubah`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE,
  CONSTRAINT `pembelian_ibfk_3` FOREIGN KEY (`User_Input`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1180106008 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES ('1180105001', '2018-01-06', 'S002', '2018-01-05 05:52:42', null, 'PB_002', null);
INSERT INTO `pembelian` VALUES ('1180105002', '2018-01-08', 'S002', '2018-01-05 05:54:04', null, 'PB_002', null);
INSERT INTO `pembelian` VALUES ('1180105003', '2018-01-09', 'S004', '2018-01-05 06:01:04', null, 'PB_002', null);
INSERT INTO `pembelian` VALUES ('1180105004', '2018-01-11', 'S003', '2018-01-05 06:40:45', null, 'PB_002', null);
INSERT INTO `pembelian` VALUES ('1180106005', '2018-01-03', 'S002', '2018-01-06 05:06:57', null, 'PB_002', null);
INSERT INTO `pembelian` VALUES ('1180106006', '2018-01-06', 'S004', '2018-01-06 05:12:08', null, 'PB_002', null);
INSERT INTO `pembelian` VALUES ('1180106007', '2018-01-08', 'S003', '2018-01-06 05:32:41', null, 'PB_002', null);

-- ----------------------------
-- Table structure for pendataan_fisik
-- ----------------------------
DROP TABLE IF EXISTS `pendataan_fisik`;
CREATE TABLE `pendataan_fisik` (
  `No_Beli_PF` varchar(10) NOT NULL,
  `Kode_Barang` varchar(10) NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Qty` int(11) NOT NULL,
  `Nilai` int(11) NOT NULL,
  `Satuan` varchar(10) NOT NULL,
  KEY `Kode_Barang` (`Kode_Barang`),
  CONSTRAINT `pendataan_fisik_ibfk_1` FOREIGN KEY (`Kode_Barang`) REFERENCES `barang` (`Kode_Barang`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pendataan_fisik
-- ----------------------------

-- ----------------------------
-- Table structure for produksi
-- ----------------------------
DROP TABLE IF EXISTS `produksi`;
CREATE TABLE `produksi` (
  `No_Produksi` varchar(10) NOT NULL,
  `Item_Jual` varchar(10) NOT NULL,
  `Tanggal_Selesai_Produksi` date NOT NULL,
  `No_Jual` varchar(10) NOT NULL,
  `Qty_Jadi` int(10) unsigned NOT NULL,
  `Tanggal_Input` datetime NOT NULL,
  `Tanggal_Ubah` datetime DEFAULT NULL,
  `User_Input` varchar(10) NOT NULL,
  `User_Ubah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`No_Produksi`),
  KEY `No_Jual` (`No_Jual`),
  KEY `User_Input` (`User_Input`,`User_Ubah`),
  KEY `User_Ubah` (`User_Ubah`),
  CONSTRAINT `produksi_ibfk_2` FOREIGN KEY (`User_Input`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE,
  CONSTRAINT `produksi_ibfk_3` FOREIGN KEY (`User_Ubah`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE,
  CONSTRAINT `produksi_ibfk_4` FOREIGN KEY (`No_Jual`) REFERENCES `jual` (`No_Jual`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of produksi
-- ----------------------------
INSERT INTO `produksi` VALUES ('3171217003', 'Pallet Box', '0000-00-00', '2171217003', '0', '2017-12-17 21:51:46', '2017-12-27 06:17:58', 'PB_002', 'PB_002');
INSERT INTO `produksi` VALUES ('3171217004', 'pb', '2018-01-10', '2180101012', '10', '2018-01-10 00:00:00', '2018-01-10 15:35:52', 'PB_002', 'PB_002');

-- ----------------------------
-- Table structure for stok
-- ----------------------------
DROP TABLE IF EXISTS `stok`;
CREATE TABLE `stok` (
  `Kode_Stok` int(10) NOT NULL,
  `Kode_Barang` varchar(10) NOT NULL,
  `Stok_Awal` int(11) NOT NULL,
  `Stok_Masuk` int(11) NOT NULL,
  `Stok_Keluar` int(11) NOT NULL,
  `Stok_PF` int(11) NOT NULL,
  `Stok_Penyesuaian` int(11) NOT NULL,
  `Stok_Akhir` int(11) NOT NULL,
  PRIMARY KEY (`Kode_Stok`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stok
-- ----------------------------

-- ----------------------------
-- Table structure for stok_awal
-- ----------------------------
DROP TABLE IF EXISTS `stok_awal`;
CREATE TABLE `stok_awal` (
  `Bulan` date NOT NULL,
  `Kode_Barang` varchar(10) NOT NULL,
  `Stok_Awal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stok_awal
-- ----------------------------

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `Kode_Supplier` char(11) NOT NULL,
  `Nama_Supplier` varchar(15) NOT NULL,
  `Contact_Person` char(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `Alamat` varchar(70) NOT NULL,
  `Tanggal_Input` datetime NOT NULL,
  `Tanggal_Ubah` datetime DEFAULT NULL,
  `User_Input` varchar(10) NOT NULL,
  `User_Ubah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Kode_Supplier`),
  KEY `User_Input` (`User_Input`,`User_Ubah`),
  KEY `User_Input_2` (`User_Input`,`User_Ubah`),
  KEY `User_Ubah` (`User_Ubah`),
  CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`User_Ubah`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE,
  CONSTRAINT `supplier_ibfk_2` FOREIGN KEY (`User_Input`) REFERENCES `user` (`User_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES ('S001', 'Rasmid', '087773525007', 'Kadu Hauk Ds. Kadu Hauk  Kec.banjarsari, Lebak Banten', '2017-12-05 00:00:00', '2017-12-05 00:00:00', 'PB_002', 'PB_002');
INSERT INTO `supplier` VALUES ('S002', 'Masna', '087773175224', 'Cinangka', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PB_002', 'PB_002');
INSERT INTO `supplier` VALUES ('S003', 'Rosid', '08179041374', 'Kp. Gunung Kenceng', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PB_002', 'PB_002');
INSERT INTO `supplier` VALUES ('S004', 'Joni', '083893638519', 'Pandeglang', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'PB_002', 'PB_002');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `User_Id` varchar(10) NOT NULL,
  `User_Name` varchar(15) NOT NULL,
  `User_Password` varchar(10) NOT NULL,
  `Status_Aktif` char(1) NOT NULL,
  `Tanggal_Input` datetime NOT NULL,
  `Tanggal_Ubah` datetime DEFAULT NULL,
  `User_Input` varchar(10) NOT NULL,
  `User_Ubah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('PB_002', 'tuti', 'tuti', '0', '2017-12-02 00:00:00', null, 'ABC_001', null);
