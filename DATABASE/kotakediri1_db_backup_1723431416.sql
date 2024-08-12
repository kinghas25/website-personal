

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO admin VALUES("1","admin","$2y$10$AIy0X1Ep6alaHDTofiChGeqq7k/d1Kc8vKQf1JZo0mKrzkkj6M626");



CREATE TABLE `bom_produk` (
  `kode_bom` varchar(100) NOT NULL,
  `kode_bk` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `kebutuhan` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO bom_produk VALUES("B0001","M0002","P0001","Roti Sobek","2");
INSERT INTO bom_produk VALUES("B0001","M0001","P0001","Roti Sobek","4");
INSERT INTO bom_produk VALUES("B0001","M0004","P0001","Roti Sobek","3");
INSERT INTO bom_produk VALUES("B0002","M0005","P0002","Maryam","7");
INSERT INTO bom_produk VALUES("B0002","M0004","P0002","Maryam","6");
INSERT INTO bom_produk VALUES("B0002","M0003","P0002","Maryam","5");
INSERT INTO bom_produk VALUES("B0003","M0002","P0003","Kue tart coklat","8");
INSERT INTO bom_produk VALUES("B0003","M0003","P0003","Kue tart coklat","5");
INSERT INTO bom_produk VALUES("B0003","M0005","P0003","Kue tart coklat","5");
INSERT INTO bom_produk VALUES("B0001","M0002","P0001","Roti Sobek","2");
INSERT INTO bom_produk VALUES("B0001","M0001","P0001","Roti Sobek","4");
INSERT INTO bom_produk VALUES("B0001","M0004","P0001","Roti Sobek","3");
INSERT INTO bom_produk VALUES("B0002","M0005","P0002","Maryam","7");
INSERT INTO bom_produk VALUES("B0002","M0004","P0002","Maryam","6");
INSERT INTO bom_produk VALUES("B0002","M0003","P0002","Maryam","5");
INSERT INTO bom_produk VALUES("B0003","M0002","P0003","Kue tart coklat","8");
INSERT INTO bom_produk VALUES("B0003","M0003","P0003","Kue tart coklat","5");
INSERT INTO bom_produk VALUES("B0003","M0005","P0003","Kue tart coklat","5");



CREATE TABLE `customer` (
  `kode_customer` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(200) NOT NULL,
  PRIMARY KEY (`kode_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO customer VALUES("C0002","Rafi Akbar","a.rafy@gmail.com","rafi","$2y$10$/UjGYbisTPJhr8MgmT37qOXo1o/HJn3dhafPoSYbOlSN1E7olHIb.","0856748564");
INSERT INTO customer VALUES("C0003","Nagita Silvana","bambang@gmail.com","Nagita","$2y$10$47./qEeA/y3rNx3UkoKmkuxoAtmz4ebHSR0t0Bc.cFEEg7cK34M3C","087804616097");
INSERT INTO customer VALUES("C0004","Nadiya","nadiya@gmail.com","nadiya","$2y$10$6wHH.7rF1q3JtzKgAhNFy.4URchgJC8R.POT1osTAWmasDXTTO7ZG","0898765432");
INSERT INTO customer VALUES("C0005","saber","saber@okok","saber","$2y$10$ehRzLWAhnl9eZqCayajBluj18/IZlkJ2Xtin3OK4M2yGbHxVweFqS","08787");
INSERT INTO customer VALUES("C0006","uki","uuu@hhg","uki","$2y$10$jrtpPdnIuH17Fk9IP/O8FeaffikIf7My.3UqTeUHd7I.xyVUi.hkC","08787");



CREATE TABLE `inventory` (
  `kode_bk` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `satuan` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`kode_bk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO inventory VALUES("M0001","Tepung","60","Kg","1000","2020-07-26");
INSERT INTO inventory VALUES("M0002","Pengembang","76","Kg","1000","2024-07-18");
INSERT INTO inventory VALUES("M0003","Cream","-13","Kg","3000","2020-07-26");
INSERT INTO inventory VALUES("M0004","Keju","46","Kg","4000","2020-07-26");
INSERT INTO inventory VALUES("M0005","Coklat","962","Kg","5000","2024-07-18");



CREATE TABLE `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO kategori VALUES("K-1","kocakll","0");
INSERT INTO kategori VALUES("K-3","Aqidah","0");
INSERT INTO kategori VALUES("K-4","Shalat","0");
INSERT INTO kategori VALUES("K-6","coklat","0");
INSERT INTO kategori VALUES("K-7","rizkikk","0");



CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_customer` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO keranjang VALUES("16","C0003","P0002","Maryam","5","15000");
INSERT INTO keranjang VALUES("17","C0003","P0003","Kue tart coklat","2","100000");
INSERT INTO keranjang VALUES("23","C0008","P0001","Roti Sobekll","1","10000");
INSERT INTO keranjang VALUES("24","C0008","P0003","Kue tart coklatttt","1","1000099999");
INSERT INTO keranjang VALUES("25","C0008","P0004","saber","3","90909");
INSERT INTO keranjang VALUES("26","C0008","P0002","Maryam777","1","15000777");
INSERT INTO keranjang VALUES("38","C0006","P0002","Maryam777","5","15000777");
INSERT INTO keranjang VALUES("39","C0006","P0003","Kue tart coklatttt","1","1000099999");
INSERT INTO keranjang VALUES("42","C0005","P0003","Kue tart coklatttt","1","1000099999");
INSERT INTO keranjang VALUES("43","C0005","P0002","Maryam777","1","15000777");



CREATE TABLE `produk` (
  `kode_produk` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`kode_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO produk VALUES("P0001","Roti Sobekll","K-1","5f1d915d27dc3.jpg","																																								Roti Enak Sobek Sobek aww
																																	","10000");
INSERT INTO produk VALUES("P0002","Maryam777","K-4","5f1d9154715a4.jpg","								Roti araym777
									","15000777");
INSERT INTO produk VALUES("P0003","Kue tart coklatttt","K-3","5f1d924614831.jpg","Kuetar dengan varian rasa coklat enak dan lumer rasanyassss
			","1000099999");
INSERT INTO produk VALUES("P0004","saber","K-3","6698337f838c3.png","				jhjh
			tffgfgfg			","90909");
INSERT INTO produk VALUES("P0005","rizkilllsssss222333","K-3","6698f4631fdba.png","								uuuuuuuuooooooo		wwwww		44444		333						","2147483333");
INSERT INTO produk VALUES("P0006"," Printer ","K-3","66983b544ba42.jpeg","												
			iiiiiiii									","88888");
INSERT INTO produk VALUES("P0007","maryam0000","K-7","669a6b19e50d6.png","
		a,smkaskamsk","9999");



CREATE TABLE `produksi` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(200) NOT NULL,
  `kode_customer` varchar(200) NOT NULL,
  `kode_produk` varchar(200) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kode_pos` varchar(200) NOT NULL,
  `terima` varchar(200) NOT NULL,
  `tolak` varchar(200) NOT NULL,
  `cek` int(11) NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO produksi VALUES("8","INV0001","C0002","P0003","Kue tart coklat","1","100000","Pesanan Baru","2020-07-27","Jawa Timur","Surabaya","Jl.Tanah Merah Indah 1","60129","2","1","0");
INSERT INTO produksi VALUES("9","INV0002","C0002","P0001","Roti Sobek","3","10000","0","2020-07-27","Jawa Barat","Bandung","Jl.Jati Nangor Blok C, 10","30712","1","0","0");
INSERT INTO produksi VALUES("10","INV0003","C0003","P0002","Maryam","2","15000","0","2020-07-27","Jawa Tengah","Yogyakarta","Jl.Malioboro, Blok A 10D","30123","1","0","1");
INSERT INTO produksi VALUES("11","INV0003","C0003","P0003","Kue tart coklat","1","100000","0","2020-07-27","Jawa Tengah","Yogyakarta","Jl.Malioboro, Blok A 10D","30123","1","0","1");
INSERT INTO produksi VALUES("12","INV0003","C0003","P0001","Roti Sobek","1","10000","0","2020-07-27","Jawa Tengah","Yogyakarta","Jl.Malioboro, Blok A 10D","30123","1","0","1");
INSERT INTO produksi VALUES("13","INV0004","C0004","P0002","Maryam","1","15000","0","2020-07-26","Jawa Timur","Sidoarjo","Jl.KH Syukur Blok C 18 A","50987","1","0","1");
INSERT INTO produksi VALUES("14","INV0005","C0006","P0003","Kue tart coklatttt","1","1000099999","0","2424-07-18","kediri","kota","di hatimua eh","76778","1","0","1");
INSERT INTO produksi VALUES("15","INV0005","C0006","P0001","Roti Sobekll","1","10000","0","2424-07-18","kediri","kota","di hatimua eh","76778","1","0","1");
INSERT INTO produksi VALUES("16","INV0005","C0006","P0002","Maryam777","2","15000777","0","2424-07-18","kediri","kota","di hatimua eh","76778","1","0","1");
INSERT INTO produksi VALUES("17","INV0006","C0006","P0003","Kue tart coklatttt","1","1000099999","Pesanan Baru","2424-07-18","kediri","KEDIRI","di kota kediri","76778","2","1","0");
INSERT INTO produksi VALUES("18","INV0007","C0006","P0002","Maryam777","1","15000777","0","2424-07-18","kediri","kota","di hatimua eh","76778","1","0","1");
INSERT INTO produksi VALUES("19","INV0007","C0006","P0003","Kue tart coklatttt","1","1000099999","0","2424-07-18","kediri","kota","di hatimua eh","76778","1","0","1");
INSERT INTO produksi VALUES("20","INV0008","C0006","P0001","Roti Sobekll","1","10000","Pesanan Baru","2424-07-18","kediri","kota","adaddda","76778","0","0","0");
INSERT INTO produksi VALUES("21","INV0008","C0006","P0005","rizkilllsssss222333","1","2147483333","Pesanan Baru","2424-07-18","kediri","kota","adaddda","76778","0","0","0");
INSERT INTO produksi VALUES("22","INV0009","C0006","P0001","Roti Sobekll","1","10000","Pesanan Baru","2424-07-18","bbbb","ddddd","ccccc","eeee","0","0","0");
INSERT INTO produksi VALUES("23","INV0009","C0006","P0002","Maryam777","1","15000777","Pesanan Baru","2424-07-18","bbbb","ddddd","ccccc","eeee","0","0","0");
INSERT INTO produksi VALUES("24","INV0009","C0006","P0003","Kue tart coklatttt","1","1000099999","Pesanan Baru","2424-07-18","bbbb","ddddd","ccccc","eeee","0","0","0");
INSERT INTO produksi VALUES("25","INV0010","C0005","P0002","Maryam","2","15000","Pesanan Baru","2424-07-19","","","","","0","0","0");
INSERT INTO produksi VALUES("26","INV0010","C0005","P0003","Kue tart coklat","1","100000","Pesanan Baru","2424-07-19","","","","","0","0","0");
INSERT INTO produksi VALUES("27","INV0011","C0005","P0002","Maryam777","1","15000777","Pesanan Baru","2424-07-19","","","","","0","0","0");
INSERT INTO produksi VALUES("28","INV0012","C0005","P0003","Kue tart coklatttt","2","1000099999","Pesanan Baru","2424-07-19","hhh","nbnb","ccccc","frdf","0","0","0");



CREATE TABLE `report_cancel` (
  `id_report_cancel` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_report_cancel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `report_inventory` (
  `id_report_inv` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bk` varchar(100) NOT NULL,
  `nama_bahanbaku` varchar(100) NOT NULL,
  `jml_stok_bk` int(11) NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  PRIMARY KEY (`id_report_inv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `report_omset` (
  `id_report_omset` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_omset` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_report_omset`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `report_penjualan` (
  `id_report_sell` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah_terjual` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_report_sell`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `report_produksi` (
  `id_report_prd` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_report_prd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `report_profit` (
  `id_report_profit` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bom` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `jumlah` varchar(11) NOT NULL,
  `total_profit` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_report_profit`),
  UNIQUE KEY `kode_bom` (`kode_bom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


