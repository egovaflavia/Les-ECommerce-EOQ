-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 16. Desember 2019 jam 11:51
-- Versi Server: 5.0.67
-- Versi PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_furniture`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(12, 'nana', 'na123'),
(7, 'welia marni', '123456'),
(17, 'welia', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_barang` int(11) NOT NULL auto_increment,
  `id_kategori` int(11) NOT NULL,
  `nm_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `biaya_simpan` int(11) NOT NULL,
  `biaya_pesan` int(11) NOT NULL,
  PRIMARY KEY  (`kd_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_barang`, `id_kategori`, `nm_barang`, `harga`, `stok`, `gambar`, `deskripsi`, `biaya_simpan`, `biaya_pesan`) VALUES
(26, 1, 'sdf', 12, 2, 'ere.jpg', 'jkjk', 23, 67),
(20, 1, 'lemari 4 pintu', 14000000, 5, 'dre.jpg', 'lemari jati', 400, 600);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `id_detail` int(11) NOT NULL auto_increment,
  `id_penjualan` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jml_beli` int(11) NOT NULL,
  PRIMARY KEY  (`id_detail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id_detail`, `id_penjualan`, `kd_barang`, `jml_beli`) VALUES
(1, 1, 26, 1),
(2, 1, 20, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL auto_increment,
  `id_pembelian` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jml_pembelian` int(11) NOT NULL,
  PRIMARY KEY  (`id_detail_pembelian`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `kd_barang`, `jml_pembelian`) VALUES
(1, 3, 26, 1),
(3, 13, 20, 1),
(4, 14, 26, 2),
(5, 15, 20, 4),
(6, 15, 20, 2),
(7, 15, 20, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL auto_increment,
  `nm_kategori` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nm_kategori`) VALUES
(1, 'kursi '),
(2, 'lemari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkos_kirim`
--

CREATE TABLE IF NOT EXISTS `ongkos_kirim` (
  `id_ongkir` int(11) NOT NULL auto_increment,
  `tujuan` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  PRIMARY KEY  (`id_ongkir`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `ongkos_kirim`
--

INSERT INTO `ongkos_kirim` (`id_ongkir`, `tujuan`, `tarif`) VALUES
(2, 'Bukittinggi', 50000),
(3, 'Lubuk Basung', 20000),
(4, 'Pasaman Barat', 100000),
(6, 'padang', 230000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_pelanggan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `email`, `no_telp`, `alamat`) VALUES
(1, 'welia marni1', '11111', 'WELIA@gmail.com', '08123445465', 'padang'),
(4, 'Egova', 'egova', 'egova@gmail.com', '081923123', 'Padang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL auto_increment,
  `id_supplier` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  PRIMARY KEY  (`id_pembelian`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_supplier`, `tgl_beli`) VALUES
(3, 4, '2019-12-20'),
(4, 4, '2019-12-19'),
(5, 5, '2019-12-16'),
(6, 4, '2019-12-16'),
(7, 4, '2019-12-16'),
(8, 5, '2019-12-15'),
(9, 4, '0000-00-00'),
(10, 4, '2019-12-16'),
(11, 4, '2019-12-16'),
(12, 4, '2019-12-16'),
(13, 5, '2019-12-16'),
(14, 5, '2019-12-16'),
(15, 5, '2019-12-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(11) NOT NULL auto_increment,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` varchar(100) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `total` int(11) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamt` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_penjualan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pelanggan`, `id_ongkir`, `tgl_penjualan`, `total`, `kota`, `tarif`, `alamt`) VALUES
(1, 4, '4', '2019-12-12', 45000, 'padang', 56000, 'padang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` int(11) NOT NULL auto_increment,
  `nama_supplier` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  PRIMARY KEY  (`id_supplier`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telp`) VALUES
(4, 'welia', 'padang', '08123456779'),
(5, 'nanas', 'lubas', '0823567756551');
