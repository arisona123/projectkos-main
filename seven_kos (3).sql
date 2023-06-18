-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2023 pada 05.13
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seven_kos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kos`
--

CREATE TABLE `tbl_kos` (
  `id_kos` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(11) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(5) DEFAULT NULL,
  `kategori` varchar(100) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tipe` enum('Putri','Putra','Campur') NOT NULL,
  `fasilitas` varchar(200) NOT NULL,
  `fasilitas_umum` longtext NOT NULL,
  `fasilitas_kamar_mandi` longtext NOT NULL,
  `fasilitas_parkir` longtext NOT NULL,
  `image_header` varchar(200) NOT NULL,
  `sisa_kamar` int(11) NOT NULL,
  `peraturan_kamar` longtext NOT NULL,
  `spesifikasi_kamar` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_kos`
--

INSERT INTO `tbl_kos` (`id_kos`, `id_user`, `alamat`, `slug`, `date`, `time`, `status`, `kota`, `harga`, `diskon`, `kategori`, `nama`, `tipe`, `fasilitas`, `fasilitas_umum`, `fasilitas_kamar_mandi`, `fasilitas_parkir`, `image_header`, `sisa_kamar`, `peraturan_kamar`, `spesifikasi_kamar`) VALUES
(1, 3, 'Jl.Raya Paledang Bandung No.33', 'Kost-BR-46-Pasteur-Bandung', '2022-11-16', '07:57:55', 1, 'Yogyakarta', 500000, 50, '[\"1\",\"3\",\"6\"]', 'Kost BR 46 Pasteur Jawa Barat', 'Campur', '[\"Kursi\",\"Bantal\",\"Jendela\",\"Meja\",\"Ventilasi\",\"Kipas Angin\",\"Guling\",\"Cermin\",\"Kamar Mandi\"]', '[\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\"]', '[\"K. Mandi Dalam\",\"K. Mandi Luar\",\"Kloset Duduk\",\"Kloset Jongkok\",\"Shower\",\"Air Panas\",\"Cermin\"]', '[\"Parkir Motor\",\"Parkir Mobil\"]', 'kos13.jpg', 2, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap dikenakan biaya\"]', '5x3 Meter;Termasuk Listrik'),
(2, 3, 'Jl. Permai No.17 Cigadung Cibeunying Kaler Kota Bandung ', 'Kost-Cibeunying-Permai', '2022-11-15', '09:21:29', 1, 'Bandung', 700000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Cibeunying Permai', 'Putri', '[\"Kasur\",\"Lemari Baju\",\"Kursi\",\"Bantal\",\"Jendela\",\"Meja\",\"Kamar Mandi\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', 'kos2.jpg', 0, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap dikenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(3, 3, 'Jl.Anjani Sukasari Bandung No.90', 'guest-house-anjani-sukasari-bandung', '2022-10-10', '10:58:52', 1, 'Bandung', 600000, 30, '[\"1\",\"12\"]', 'Guest House Anjani Sukasari', 'Putra', '[\"Kasur\",\"Lemari Baju\",\"Kursi\",\"Bantal\",\"Jendela\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', 'kos12.jpg', 0, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(4, 6, 'Jl.Cidadap No.1', 'kost-platinum-cidadap-bandung', '2022-09-05', '13:39:59', 1, 'Bandung', 900000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Platinum Cidadap', 'Putra', '[\"Kasur\",\"Lemari Baju\",\"Kursi\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', 'kos14.jpg', 3, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(5, 7, 'Jl. Cibiru No.900', 'kost-bowie-cibiru-bandung', '2022-10-10', '13:05:54', 1, 'Surabaya', 1000000, 40, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Bowie Cibiru', 'Putra', '[\"Bantal\",\"Jendela\",\"Meja\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '2.jpg', 5, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(6, 8, 'Jl. Sukaluyu No.222', 'kost-sapujagad-2-sukaluyu-bandung', '2022-09-05', '13:34:19', 1, 'Surabaya', 850000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Sapujagad 2 Sukaluyu', 'Putra', '[\"Kasur\",\"Lemari Baju\",\"Kursi\",\"Meja\",\"Jendela\",\"Kamar Mandi\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '3.jpg', 1, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(7, 9, 'Jl. Wisma No.88', 'kost-wisma-lentera-bandung', '2022-09-05', '13:34:29', 1, 'Bandung', 1100000, 45, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Wisma Lentera', 'Putra', '[\"Lemari Baju\",\"Kursi\",\"Meja\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '4.jpg', 2, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(8, 10, 'Jl. Rancasari No.88', 'kost-pondok-mars-barat-iii-no-8-tipe-b-rancasari-bandung', '2022-09-05', '13:34:37', 1, 'Yogyakarta', 1500000, 25, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Pondok Mars Barat III No. 8 Tipe B Rancasari', 'Putra', '[\"Kipas Angin\",\"Guling\",\"Cermin\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '6.JPG', 2, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(9, 11, 'Jl. Subur Coblong No.21', 'kost-sadang-subur-i-coblong-bandung', '2022-09-05', '13:34:45', 1, 'Yogyakarta', 550000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Sadang Subur I Coblong', 'Putra', '[\"Jendela\",\"Kipas Angin\",\"Bantal\",\"Cermin\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '7.jpg', 4, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(10, 12, 'Jl. Cibiru No.21', 'kost-pondok-jati-cibiru-bandung', '2022-11-07', '17:07:34', 1, 'Surabaya', 750000, NULL, 'null', 'Kost Pondok Jati Cibiru ', 'Putra', 'null', 'null', 'null', 'null', '8.jpg', 4, 'null', '3x3 Meter;'),
(11, 13, 'Jl. Sukasari No.121', 'kost-niji-house-sukasari-bandung', '2022-09-05', '13:35:03', 1, 'Jakarta', 500000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Niji House Sukasari', 'Putra', '[\"Lemari Baju\",\"Kursi\",\"Bantal\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '9.JPG', 3, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(12, 14, 'Jl. Cibeurem No.812', 'kost-nyaman-cibeurem-bandung', '2022-09-05', '13:36:14', 1, 'Jakarta', 650000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Nyaman Cibeurem', 'Putra', '[\"Cermin\",\"Kamar Mandi\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '10.jpg', 1, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(13, 15, 'Jl. Peta 90', 'kost-amara-residence-bandung', '2022-09-05', '13:36:26', 1, 'Jakarta', 450000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Amara Residence', 'Putra', '[\"Ventilasi\",\"Kipas Angin\",\"Kasur\",\"Meja\",\"Kursi\",\"Kamar Mandi\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '11.jpg', 0, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(14, 16, 'Jl. Tubagus Ismanil No.90', 'kost-tipe-a-tubagus-ismail-depan-no-90-bandung', '2022-09-05', '13:36:48', 1, 'Surabaya', 950000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Tipe A Tubagus Ismail Depan No. 90', 'Putra', '[\"Bantal\",\"Jendela\",\"Meja\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '12.jpg', 1, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(15, 17, 'Jl. Kosambi No.18', 'kost-wartawan-18-bandung', '2022-09-05', '13:37:01', 1, 'Jakarta', 1600000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost wartawan 18', 'Putra', '[\"Jendela\",\"Meja\",\"Kursi\",\"Ventilasi\",\"Kipas Angin\",\"Kasur\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '13.jpg', 1, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(16, 18, 'Jl. Ciheulang No.235', 'kost-terusan-ciheulang-no-235-b-type-a-coblong-bandung', '2022-09-05', '13:37:12', 1, 'Jakarta', 1700000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Terusan Ciheulang No. 235 B Type A Coblong', 'Putra', '[\"Meja\",\"Ventilasi\",\"Kipas Angin\",\"Guling\",\"Bantal\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '14.jpg', 2, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(17, 19, 'Jl. Antanan 1', 'kost-antanan-1-bandung', '2022-09-05', '13:37:21', 1, 'Yogyakarta', 1300000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Antanan 1', 'Putra', '[\"Jendela\",\"Meja\",\"Kursi\",\"Ventilasi\",\"Kasur\",\"Bantal\",\"Guling\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '15.jpg', 1, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(18, 20, 'Jl. Dago No.87', 'kost-dan-paviliun-dago-cintawangi-bandung', '2022-09-05', '13:37:30', 1, 'Yogyakarta', 1050000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost dan Paviliun Dago Cintawangi', 'Putra', '[\"Lemari Baju\",\"Kursi\",\"Kasur\",\"Bantal\",\"Guling\",\"Jendela\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '16.jpg', 4, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(19, 21, 'Jl. Coblong No.6', 'kost-yayu-no16-type-b-coblong-bandung', '2022-09-05', '13:37:42', 1, 'Yogyakarta', 1400000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Yayu No.16 Type B Coblong', 'Putra', '[\"Kursi\",\"Meja\",\"Kasur\",\"Bantal\",\"Jendela\",\"Cermin\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '18.jpg', 4, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(20, 22, 'Jl. Sukajadi No.23', 'kost-light-home-sukajadi-bandung', '2022-09-05', '13:37:52', 1, 'Jakarta', 2000000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Light Home Sukajadi', 'Putra', '[\"Kursi\",\"Bantal\",\"Jendela\",\"Meja\",\"Ventilasi\",\"Kipas Angin\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '20.jpg', 4, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(21, 23, 'Jl. Dipatiukur No.17', 'kost-nur-house-bandung', '2022-09-05', '13:38:42', 1, 'Yogyakarta', 1150000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Nur House', 'Putra', '[\"Kasur\",\"Lemari Baju\",\"Kursi\",\"Bantal\",\"Jendela\",\"Ventilasi\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '17.jpg', 3, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(22, 24, 'Jl. Pagarsih No.78', 'kost-tian-jalan-pagarsih-no78', '2022-09-05', '13:38:32', 1, 'Jakarta', 2700000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Tian Jalan Pagarsih No.78', 'Putra', '[\"Kasur\",\"Bantal\",\"Guling\",\"Lemari Baju\",\"Kursi\",\"Meja\",\"Kipas Angin\",\"Kamar Mandi\",\"Cermin\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '19.jpg', 3, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(55, 26, 'kosku', 'kosku', '2022-09-05', '13:38:05', 1, 'Banda Aceh', 1000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'kosku', 'Putra', '[\"Bantal\",\"Jendela\",\"Meja\",\"Kipas Angin\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', 'Seven_inc5.jpeg', 2, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(57, 44, 'Temon Kulon, Kec Temon,', 'kost-temon-kulon-progo-yogyakarta', '2022-09-29', '11:20:55', 1, 'Yogyakarta', 700000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'KOST TEMON, KULON PROGO, YOGYAKARTA', 'Putra', '[\"Kasur\",\"Lemari Baju\",\"Kursi\",\"Bantal\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', 'kost-temon-kulon-progo.jpeg', 2, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(58, 44, '\r\nGlaheng RT 006/RW 003, Sindutan, Temon,Kulon Progo, DIY', 'kost-fastabikhul-khairat', '2022-09-29', '11:27:00', 1, 'Yogyakarta', 500000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Fastabikhul Khairat', 'Putra', '[\"Kasur\",\"Bantal\",\"Guling\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', 'kost-fastabikhul.jpg', 3, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(59, 44, 'Jl. Janti Gg. Nakula, RT.02, RW No.31, Jaranan, Banguntapan, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55198', 'kos-mbok-jillah', '2022-10-10', '16:21:10', 1, 'Yogyakarta', 500000, NULL, '[\"1\",\"12\"]', 'Kos Mbok Jillah', 'Putra', '[\"Kosongan\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '2021-12-01.jpg', 2, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(60, 44, 'Jl. Mantrigawen Lor 5, Panembahan-Kraton, Jogja', 'kost-putri-nyaman-dekat-kraton', '2022-09-29', '14:48:11', 1, 'Yogyakarta', 400000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'Kost Putri Nyaman Dekat Kraton', 'Putri', '[\"Kasur\",\"Lemari Baju\",\"Bantal\",\"Guling\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Shower\",\"Air Panas\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', 'kost-putri-nyaman.jpg', 2, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap di kenakan biaya\"]', '3x3 Meter;Tidak Termasuk Listrik'),
(85, 65, 'Nunukan Tim., Kec. Nunukan, Kabupaten Nunukan, Kalimantan Utara 77482', 'kost-bujang', '2022-12-17', '16:08:26', 1, 'Nunukan', 500000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'KOS Bujang paling oke dahh', 'Campur', '[\"Kasur\",\"Bantal\",\"Guling\"]', '[\"Wifi\",\"Pengurus Kos\",\"Kulkas\"]', '[\"K. Mandi Luar\",\"Kloset Jongkok\",\"Cermin\"]', '[\"Parkir Motor\",\"Parkir Sepeda\"]', '01b.jpg', -1, '[\"Kamar maksimal dihuni oleh 2 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap dikenakan biaya\"]', '4x4 Meter;Termasuk Listrik'),
(86, 65, 'Nunukan Tim., Kec. Nunukan, Kabupaten Nunukan, Kalimantan Utara 77482', 'kost-campur-paling-joss', '2022-12-17', '15:44:25', 1, 'Nunukan', 500000, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'kost campur paling wenak', 'Campur', '[\"Kasur\",\"Lemari Baju\",\"Kursi\",\"Bantal\",\"Jendela\",\"Meja\",\"Ventilasi\",\"Kipas Angin\",\"Guling\",\"Cermin\",\"Kamar Mandi\"]', '[\"Wifi\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Dispenser\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\",\"Air Panas\",\"Cermin\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '73447009e165ce2b3e1e9bc8391810b3.png', 3, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Tidak untuk pasutri\",\"Tidak boleh bawa anak\",\"Tamu menginap dikenakan biaya\"]', '3x4 Meter;Termasuk Listrik'),
(87, 66, ' Gang Sadewa, Ngentak Gede, RT.07/RW.24, Bedog, Trihanggo, Gamping, Sleman Regency, Special Region of Yogyakarta 55291', 'kos-campur-bebas-sesukamu', '2022-12-13', '09:24:04', 1, 'Yogyakarta', 2223, NULL, '[\"1\",\"3\",\"6\"]', 'kos campur bebas sesukamu', 'Campur', '[\"Kasur\",\"Lemari Baju\",\"Ventilasi\",\"Kipas Angin\",\"Guling\",\"Cermin\"]', '[\"Laundry\",\"Dapur\",\"CCTV\"]', '[\"K. Mandi Luar\"]', '[\"Parkir Motor\",\"Parkir Sepeda\"]', '7f7bf2eb0051a0d5901d748482e1cb21.jpg', 1, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Tidak untuk pasutri\",\"Tidak boleh bawa anak\",\"Tamu menginap dikenakan biaya\"]', '3x3 Meter;Termasuk Listrik'),
(88, 69, '4MP2+R55, Tim.,, Nunukan Tim., Kec. Nunukan, Kabupaten Nunukan, Kalimantan Utara 77482', 'kos-fandi', '2022-12-15', '14:33:19', 1, 'Nunukan', 500000, NULL, '[\"1\",\"3\",\"6\"]', 'kos fandi ', 'Putra', '[\"Kasur\"]', '[\"Dapur\"]', '[\"Kloset Jongkok\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '66887a3e77233364fcd67d91b9b53f26.png', 4, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Tidak untuk pasutri\"]', '3x3 Meter;Termasuk Listrik'),
(89, 69, '4JMX+9Q8, East, Nunukan Tim., Kec. Nunukan, Kabupaten Nunukan, Kalimantan Utara 77482', 'kost-fandi-paling-mantap-okee', '2022-12-15', '14:48:14', 1, 'Nunukan', 0, NULL, '[\"1\",\"3\",\"6\",\"12\"]', 'kost fandi paling mantap okee', 'Putri', '[\"Kasur\",\"Lemari Baju\",\"Bantal\",\"Jendela\"]', '[\"Wifi\",\"Dapur\",\"CCTV\"]', '[\"K. Mandi Dalam\",\"Kloset Duduk\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '426ebd22bd8b3712266af7e76edec16d.png', 4, '[\"Kamar maksimal dihuni oleh 1 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap dikenakan biaya\"]', '3x3 Meter;Termasuk Listrik'),
(90, 77, 'mamat', 'jaya-kost', '2023-05-10', '09:35:04', 1, 'Semarang', 900000000, 10, '[\"1\",\"3\"]', 'jaya kost', 'Putra', '[\"Jendela\"]', '[\"Penjaga Kos\"]', '[\"K. Mandi Luar\"]', '[\"Parkir Motor\"]', '197ec14ac4ebbd434b8b8e2508ef8a86.png', 996, '[\"Tamu menginap dikenakan biaya\"]', '3x3 Meter;Termasuk Listrik'),
(91, 1, 'jooo', 'admin', '2023-05-11', '10:12:45', 1, 'Aceh Jaya', 100000000, NULL, 'null', 'admin', 'Campur', 'null', 'null', 'null', '[\"Parkir Mobil\"]', 'c9445dd54a208757ee9577dbc16fd3ad.jpg', 11111111, '[\"Tidak untuk pasutri\",\"Boleh bawa anak\"]', '10x1 Meter;Termasuk Listrik'),
(92, 1, 'soto batok bu chalim', 'bagus', '2023-05-15', '09:37:30', 1, 'Semarang', 10000, 80, '[\"1\",\"3\",\"6\",\"12\"]', 'bagus', 'Campur', '[\"Kasur\",\"Lemari Baju\",\"Kursi\",\"Bantal\",\"Jendela\",\"Meja\",\"Ventilasi\",\"Kipas Angin\",\"Guling\",\"Cermin\",\"Kamar Mandi\",\"Kosongan\"]', '[\"Wifi\",\"Laundry\",\"Dapur\",\"CCTV\",\"Pengurus Kos\",\"Kulkas\",\"Penjaga Kos\",\"Dispenser\",\"Gazebo\",\"Rice Cooker\"]', '[\"K. Mandi Dalam\",\"K. Mandi Luar\",\"Kloset Duduk\",\"Kloset Jongkok\",\"Shower\",\"Air Panas\",\"Cermin\"]', '[\"Parkir Motor\",\"Parkir Mobil\",\"Parkir Sepeda\"]', '465094f006e9e143aeb0c2b15bc3b53f.png', 1000, '[\"Kamar maksimal dihuni oleh 10 orang\",\"Boleh pasutri\",\"Boleh bawa anak\",\"Tamu menginap dikenakan biaya\"]', '10x10 Meter;Termasuk Listrik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sewa`
--

CREATE TABLE `tbl_sewa` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `date` date NOT NULL,
  `tagihan` int(11) NOT NULL,
  `buktipem` varchar(32) NOT NULL,
  `status` enum('Lunas','Belum Lunas','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_sewa`
--

INSERT INTO `tbl_sewa` (`id`, `id_user`, `id_kos`, `date`, `tagihan`, `buktipem`, `status`) VALUES
(1, 1, 92, '2023-04-21', 1111111, 'profil.jpg', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tempat`
--

CREATE TABLE `tbl_tempat` (
  `id_tempat` int(11) NOT NULL,
  `id_kos` int(10) NOT NULL,
  `kategoriTempat` varchar(255) NOT NULL,
  `namaTempat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_tempat`
--

INSERT INTO `tbl_tempat` (`id_tempat`, `id_kos`, `kategoriTempat`, `namaTempat`) VALUES
(66, 1, 'ATM', 'ATM BCA'),
(67, 1, 'MASJID', 'Masjid Al_AZIZ'),
(69, 1, 'UNIVERSITAS', 'UTDI (Universitas Digital Indonesia)'),
(70, 3, 'RUMAH MAKAN', 'Warung ibu Ida'),
(71, 3, 'UNIVERSITAS', 'Stimik Akakom'),
(72, 2, 'MASJID', 'Masjid Al-Huda'),
(73, 2, 'ATM', 'ATM Mandiri'),
(74, 5, 'MASJID', 'Masjid An-nur'),
(75, 10, 'RUMAH MAKAN', 'Warung ibu nana'),
(84, 1, 'RUMAH MAKAN', 'Warung Mas Dwi'),
(85, 1, 'RUMAH SAKIT', 'RSUD'),
(86, 1, 'TEMPAT BELANJA', 'INDOMARET'),
(87, 1, 'STASIUN KERETA', 'LEMPUYANGAN'),
(98, 87, 'RUMAH MAKAN', 'Rumah Makan Padang'),
(99, 90, 'MASJID', 'masjidil haram');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_request`
--

CREATE TABLE `tb_request` (
  `id_request` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `info_hub` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `nama_properti` varchar(100) NOT NULL,
  `url_properti` varchar(100) NOT NULL,
  `tipe_kos` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kabupaten_kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jumlah_kamar` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL,
  `id_user_request` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_request`
--

INSERT INTO `tb_request` (`id_request`, `nama_depan`, `nama_belakang`, `info_hub`, `no_hp`, `nama_properti`, `url_properti`, `tipe_kos`, `harga`, `provinsi`, `kabupaten_kota`, `kecamatan`, `kelurahan`, `alamat`, `jumlah_kamar`, `is_active`, `id_user_request`) VALUES
(4, 'Arkan', 'Altair', 'Whatsapp', '081234578979', 'Wisma Arya 3', 'https://drive.google.com/drive/u/1/folders/1G44ZC66cpKFYPLkOnJJVDerWx3i9W4ty', 'Kost Putra', '1.000.000/bulan', 'Riau', 'Pekanbaru', 'Rumbai', 'Argowisata', 'Jalan Rumbai', '4', 1, 0),
(5, 'Glocha', 'Rakabumi', 'No Handphone', '081234578965', 'Kost Broklyn ', 'https://drive.google.com/drive/u/1/folders/1G44ZC66cpKFYPLkOnJJVDerWx3i9W4ty', 'Kost Putra', '1.500.000/bulan', 'Riau', 'Pekanbaru', 'Rumbai', 'Argowisata', 'Jalan Rumbai', '6', 1, 0),
(20, 'yoga ', 'okee', 'Whatsapp', '0817656676', 'kos bujang paling oke', '', 'Putri', '500000', 'Jawa Timur', 'Nunukan', 'Nunukan', 'Nunukan tengah', 'Nunukan Tim., Kec. Nunukan, Kabupaten Nunukan, Kalimantan Utara 77482', '1', 1, 65),
(24, 'johan', 'ajalah', 'Whatsapp', '081227753901', 'kos bujang paling oke', '', 'Campur', '500000', 'Jawa Timur', 'Nunukan', 'Nunukan', 'Nunukan tengah', 'Nunukan Tim., Kec. Nunukan, Kabupaten Nunukan, Kalimantan Utara 77482', '1', 1, 66),
(25, 'fandi', 'abdillah', 'Whatsapp', '0912277539019', 'kos fandi mantap', '', 'Putra', '400000', 'Lampung', 'Nunukan', 'Nunukan', 'Nunukan tengah', 'Nunukan Tim., Kec. Nunukan, Kabupaten Nunukan, Kalimantan Utara 77482', '3', 1, 69),
(26, 'Bagong', 'Sujiadi', 'No Handphone', '085335055043', 'Kost Bapak Bagong', '', 'Campur', '650.000', 'DI Yogyakarta', 'Bantul', 'Banguntapan', 'maju jaya', 'jalan simpang 7', '1', 1, 72),
(27, 'bagus', 'bagus', 'Whatsapp', '000', 'haba property ', '', 'Campur', '900000000', 'Jawa Tengah', 'semarang', 'semarang', 'semarang', 'semarang', '1000', 1, 77),
(28, 'bagus', 'dias', 'Whatsapp', '01', 'ygy esport', '', 'Putra', '100000000', 'Jawa Tengah', 'semarang', 'semarang', '1', 'semarang salatiga', '999', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Owner'),
(4, 'Super Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `fullname`, `foto`, `jk`, `email`, `no_hp`, `alamat`, `id_role`, `is_active`) VALUES
(1, 'm.bagus.dias.s1@gmai', 'd2817245f80a874fbad9e557febcf4d8', 'mbagusdiass', 'person_4.jpg', 'Pria', 'm.bagus.dias.s1@gmail.com', '083836998301', 'kab semarang', 2, 0),
(2, 'admin', 'fcea920f7412b5da7be0cf42b8c93759', 'admin', 'pria.png', 'Pria', 'admin@gmail.com', '1010', 'admin', 1, 0),
(3, 'fandi', 'e10adc3949ba59abbe56e057f20f883e', 'alvian ahja wijaya', '', 'Pria', 'alvian@gmail.com', '085222549953', 'Jl.Pagarsih Gg.Holili No.120 Blok 87 RT02/RW09', 2, 0),
(6, 'kurniawan', 'e10adc3949ba59abbe56e057f20f883e', 'Kurniawan Aditya', '', 'Pria', 'kurniawan@gmail.com', '08752563663', 'Jl.Raya Cibeurem No.19', 2, 0),
(7, 'nawan', 'e10adc3949ba59abbe56e057f20f883e', 'Nawan Tutu Syah Lampah', '', 'Pria', 'nawan@gmail.com', '085322145896', 'Jl. Raya Cimahi No.90', 2, 0),
(8, 'rudy', 'e10adc3949ba59abbe56e057f20f883e', 'Rudy Setiawan', '', 'Pria', 'rudy@gmail.com', '085369985555', 'Jl.Pasir Impun No.90', 2, 0),
(9, 'firman', 'e10adc3949ba59abbe56e057f20f883e', 'Firman Alhadiansyah', '', 'Pria', 'firman@gmail.com', '085244215511', 'Jl. Ir.Hj Juanda No.11', 2, 0),
(10, 'tantan', 'e10adc3949ba59abbe56e057f20f883e', 'Tantan Faturahman', '', 'Pria', 'tantan@gmail.com', '08125648974', 'Jl. Gede Bangkong No.12', 2, 0),
(11, 'azzi', 'e10adc3949ba59abbe56e057f20f883e', 'Muhammad Azzi Alfurqon', '', 'Pria', 'azzi@gmail.com', '082133669988', 'Jl. Dipatiukur No.67', 2, 0),
(12, 'reza', 'e10adc3949ba59abbe56e057f20f883e', 'Reza Yogi Andria', '', 'Pria', 'reza@gmail.com', '0228956938', 'Jl. Soekarno Hatta No.90', 2, 0),
(13, 'angga', 'e10adc3949ba59abbe56e057f20f883e', 'Rangga Jaya Utama', '', 'Pria', 'rangga@gmail.com', '08526335214', 'Jl. Pasirkoja No.90', 2, 0),
(14, 'yuliani', 'e10adc3949ba59abbe56e057f20f883e', 'Yuliani Putri Utama', '', 'Wanita', 'yuliani@gmail.com', '087758521245', 'Jl.Holis No.87', 2, 0),
(15, 'rahma', 'e10adc3949ba59abbe56e057f20f883e', 'Rahma Aulia', '', 'Wanita', 'rahma@gmail.com', '085245696963', 'Jl. Peta No.88', 2, 0),
(16, 'anie', '14e1b600b1fd579f47433b88e8d85291', 'Ani Yani', '', 'Wanita', 'ani@gmail.com', '085254698988', 'Jl.Sereh No.78', 2, 0),
(17, 'rani', '14e1b600b1fd579f47433b88e8d85291', 'Rani Maharani', '', 'Wanita', 'rani@gmail.com', '0852633562312', 'Jl. Jamika No.4', 2, 0),
(18, 'Andika', '14e1b600b1fd579f47433b88e8d85291', 'Andika Ramdani', '', 'Pria', 'Dika@gmail.com', '085245658878', 'Jl. Sukamulya No.2', 2, 0),
(19, 'Kartika', 'e10adc3949ba59abbe56e057f20f883e', 'Kartika Sari', '', 'Wanita', 'kartika@gmail.com', '089563652145', 'Jl. Sunda No.22', 2, 0),
(20, 'ariska', 'e10adc3949ba59abbe56e057f20f883e', 'Sri Ariska', '', 'Wanita', 'ariska@gmail.com', '085622325645', 'Jl. Ciroyom', 2, 0),
(21, 'yayu', 'e10adc3949ba59abbe56e057f20f883e', 'Yayu', '', 'Wanita', 'yayu@gmail.com', '085698974563', 'Jl. Burangrang No.82', 2, 0),
(22, 'kezia', '14e1b600b1fd579f47433b88e8d85291', 'Kezia Andria', '', 'Wanita', 'kezia@gmail.com', '08545689758', 'Jl. Buah Batu No.34', 2, 0),
(23, 'Nurhikmah', 'e10adc3949ba59abbe56e057f20f883e', 'Nurhikmah', '', 'Wanita', 'nur@gmail.com', '0856478945', 'Jl. Dipatiukur No.56', 2, 0),
(24, 'tian', '25d55ad283aa400af464c76d713c07ad', 'Tian Bagja ', '', 'Pria', 'tian@gmail.com', '087854446958', 'Jl. Pagarsih', 4, 0),
(25, 'test', 'e10adc3949ba59abbe56e057f20f883e', 'testest', '', 'Pria', 'test@gmail.com', '087857846', 'Jl.Pagarsih', 3, 0),
(26, 'claire', '25d55ad283aa400af464c76d713c07ad', 'claire', '', 'Wanita', 'claire@gmail.com', '089786567899', 'Malang', 1, 0),
(28, 'keshi', 'e10adc3949ba59abbe56e057f20f883e', 'keshi', '', 'Pria', 'keshi@gmail.com', '089987654555', 'Surabaya', 2, 0),
(29, 'keshi', 'e10adc3949ba59abbe56e057f20f883e', 'keshi', '', 'Pria', 'keshi@gmail.com', '089987654555', 'Surabaya', 2, 0),
(30, 'keshi', '14e1b600b1fd579f47433b88e8d85291', 'keshi', '', 'Pria', 'keshi@gmail.com', '089987654555', 'Surabaya', 3, 0),
(32, 'ashley', '14e1b600b1fd579f47433b88e8d85291', 'ashley choi', '', 'Wanita', 'ashley@gmail.com', '089763345234', 'Yogyakarta', 2, 0),
(36, 'max', 'e10adc3949ba59abbe56e057f20f883e', 'max', '', 'Wanita', 'max@gmail.com', '089786567899', 'Arcadia Bay', 2, 0),
(37, 'chloe', 'e10adc3949ba59abbe56e057f20f883e', 'chloe', '', 'Wanita', 'chloe@gmail.com', '089767546345', 'Arcadia Bay', 2, 0),
(38, 'rachel', 'e10adc3949ba59abbe56e057f20f883e', 'rachel', '', 'Wanita', 'rachel@gmail.com', '089786567899', 'Arcadia Bay', 3, 0),
(39, 'bea', 'e10adc3949ba59abbe56e057f20f883e', 'beabadobee', '', 'Wanita', 'bea@gmail.com', '089786567899', 'Surabaya', 2, 0),
(40, 'conan', 'e10adc3949ba59abbe56e057f20f883e', 'conan', '', 'Pria', 'conan@gmail.com', '089786567444', 'Jakarta', 2, 0),
(41, 'ash', 'e10adc3949ba59abbe56e057f20f883e', 'ash island', '', 'Pria', 'ash@gmail.com', '08975456777', 'Chicago', 2, 0),
(42, 'jeff', 'e10adc3949ba59abbe56e057f20f883e', 'jeff benard', '', 'Pria', 'jeff@gmail.com', '089765678756', 'Jakarta', 3, 0),
(43, 'lucas', 'e10adc3949ba59abbe56e057f20f883e', 'lucas', '', 'Pria', 'lucas@gmail.com', '089765456777', 'Atlanta', 2, 0),
(44, 'lana', 'e10adc3949ba59abbe56e057f20f883e', 'lana del rey', '', 'Wanita', 'lana@gmail.com', '089765435234', 'jalan janti', 2, 0),
(45, 'monica', 'e10adc3949ba59abbe56e057f20f883e', 'monica', '', 'Wanita', 'monica@gmail.com', '089765453676', 'Surabaya', 4, 0),
(46, 'blacksweet@gmail.com', 'b0e268aa058c057523f931943e981b23', 'andika', '', 'Pria', 'blacksweet@gmail.com', '082278476347', 'jln nangka', 2, 0),
(47, 'cobap', 'feb5b4b10c7eb056d241967bd3b12864', 'cobap', 'kopisusu.jpg', 'Pria', 'cobap@gmail.com', '08123456789', 'Malang', 2, 0),
(49, 'enone', '95e36f1e7a3f876952a8b95f3d309d55', 'enone', '', 'Pria', 'enone@gmail.com', '0987654321', 'Malang', 2, 0),
(51, 'Fandi', 'd41d8cd98f00b204e9800998ecf8427e', 'fandi abdillah', '', 'Wanita', 'fandi44abdillah@gmail.com', '081227753901', 'jln, janti', 3, 0),
(52, 'Fandi abdillah', 'd41d8cd98f00b204e9800998ecf8427e', 'Fandi abdillah', '', 'Wanita', 'fandi@gmail.com', '081227765372', 'jl.janti', 2, 0),
(53, 'ariaaa', 'd41d8cd98f00b204e9800998ecf8427e', 'aria', '', 'Wanita', 'aria@gmail.com', '0817656676', 'jl.janti', 2, 0),
(54, 'randi', 'd41d8cd98f00b204e9800998ecf8427e', 'randitya', '', 'Wanita', 'randi@gmail.com', '081245332334', 'jalan janti', 2, 0),
(55, 'gabriel', 'd41d8cd98f00b204e9800998ecf8427e', 'gabriel benya', '', 'Wanita', 'gabriel@gmail.com', '081234567889', 'jalan magelang', 2, 0),
(56, 'ucok', 'd41d8cd98f00b204e9800998ecf8427e', 'ucokbaba', '', 'Pria', 'ucok@gmail.com', '09125678976', 'jalan janti', 2, 0),
(58, 'FandiAbdillah', 'b7653296ed257174b1733f58d104250a', 'Fandi abdillah', 'fandi5.jpg', 'Pria', 'fandiabdillah@gmail.com', '81227753901', 'jln, janti', 4, 0),
(59, 'alfian', 'e10adc3949ba59abbe56e057f20f883e', 'Alfian Hakim', '', 'Pria', 'alfianhakim93@gmail.com', '0898123123', 'Kebumen', 4, 0),
(60, 'alfianmagang', 'e10adc3949ba59abbe56e057f20f883e', 'Alfian Hakim', '', 'Pria', 'testinggg@gmail.com', '089812312757753', 'Kebumen', 3, 0),
(62, 'roger@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'roger', 'fandi6.jpg', 'Pria', 'roger@gmail.com', '098377465381', 'jl.bantul banguntapan', 4, 0),
(63, 'gain', 'e10adc3949ba59abbe56e057f20f883e', 'gain', 'Fandi_abdillah.jpg', 'Pria', 'gain@gmail.com', '09883746352', 'maroko', 1, 0),
(64, 'FandiAbdillah44', 'e10adc3949ba59abbe56e057f20f883e', 'Fandi Abdillah', 'pria.png', 'Pria', 'fandiabdillah44@gmail.com', '09873641234', 'bantul,banguntapan, gang kenanga', 2, 0),
(65, 'yogaohh', 'e10adc3949ba59abbe56e057f20f883e', 'yogaohh', 'WhatsApp_Image_2022-07-29_at_21_24_12.jpeg', 'Pria', 'yoga@gmail.com', '081256472334', 'jl.kampung jawa,nunukan,kalimantan utara', 3, 0),
(66, 'johaanlahh', 'fcea920f7412b5da7be0cf42b8c93759', 'johan ajah', 'communityIcon_1gau7nk6pwo41.png', 'Pria', 'johan@gamil.com', '0987653647', 'bannguntapan,bantul,gang knanga, yogyakarta', 3, 0),
(69, 'fandiajah', 'fcea920f7412b5da7be0cf42b8c93759', 'fandi ajah', 'pria.png', 'Pria', 'fandi123@gmail.com', '0812277539019', 'jalan magelang', 3, 0),
(70, 'Wasmad', 'cd5ec4656267a4447b23f37841262821', 'Bagus Hariyanto', 'pria.png', 'Pria', 'bagushariyanto.magangjogja@gma', '085852284068', 'Tegal', 2, 0),
(71, 'Cici', 'e5ef5fe5b2c4e8160f54d6b1b10aef8f', 'Cici Abidin', 'wanita.png', 'Wanita', 'cici@gmail.com', '085855484848', 'jogja', 2, 0),
(72, 'bagong', 'dbbc2270246c1ef4900824ceda65caf9', 'bagong leda lede', 'DSC_0347.jpg', 'Pria', 'bagong@gmail.com', '0896786950495', 'jogja', 3, 0),
(73, 'Bagushariyanto.18', 'e10adc3949ba59abbe56e057f20f883e', 'Bagus Hariyanto', 'pria.png', 'Pria', 'bagushariyanto.magangjogja@gma', '0857482839029', 'Tegal', 2, 0),
(74, 'Bagus', 'fcea920f7412b5da7be0cf42b8c93759', 'Bagus Hariyanto', 'pria.png', 'Pria', 'bagus.magang@gmail.com', '124567890', 'Tegal', 2, 0),
(75, 'Jokololer', 'e10adc3949ba59abbe56e057f20f883e', 'Bagus Hariyanto', 'pria.png', 'Pria', 'bagushariyanto.magangjogja@gma', '0890440305003', 'Tegal', 2, 0),
(77, 'bagus@gmail.com', '6c282280688ff96110c7a70d049926e0', 'bagus', 'monyet.jpg\r\n', 'Pria', 'bagus@gmail.com', '000', 'seee', 2, 0),
(79, 'user', 'fcea920f7412b5da7be0cf42b8c93759', 'user', 'pria.png', 'Pria', 'user@gmail.com', '1234567', '123456', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_booking` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_Owner` int(20) NOT NULL,
  `id_kos` int(20) NOT NULL,
  `sisa_kamar` int(2) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `harga` int(20) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status_pengembalian` varchar(20) NOT NULL,
  `status_sewa` varchar(20) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_booking`, `id_user`, `id_Owner`, `id_kos`, `sisa_kamar`, `tgl_sewa`, `tanggal_selesai`, `harga`, `kategori`, `tgl_pengembalian`, `status_pengembalian`, `status_sewa`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(107, 44, 3, 6, 0, '2022-10-06', '2022-11-06', 850000, '6', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(108, 44, 3, 6, 0, '2022-10-06', '2023-01-06', 850000, '1', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(109, 44, 3, 6, 0, '2022-10-06', '2023-01-01', 850000, '3', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(110, 44, 3, 6, 0, '2022-10-06', '2023-01-02', 850000, '12', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(111, 44, 3, 6, 0, '2022-10-06', '2023-01-03', 850000, '6', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(112, 44, 3, 6, 0, '2022-10-06', '2023-01-04', 850000, '1', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(169, 59, 3, 1, 0, '2022-11-16', '2023-02-16', 500000, '3', '0000-00-00', 'belum_kembali', 'belum_selesai', '2022-Formula1-Red-Bull-Racing-RB18-002-1080w3.jpg', 0),
(182, 64, 65, 85, 0, '2022-12-23', '2023-06-23', 500000, '6', '0000-00-00', 'belum_kembali', 'belum_selesai', 'Gaftech31.png', 1),
(183, 64, 8, 6, 0, '2022-12-17', '2023-06-17', 850000, '6', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(184, 64, 8, 6, 0, '2022-12-17', NULL, 850000, '6', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(186, 64, 65, 86, 0, '2022-12-13', '2023-06-13', 500000, '6', '0000-00-00', 'belum_kembali', 'belum_selesai', '33564138986_7f7055d6b4_b.jpg', 1),
(187, 64, 65, 86, 2, '2022-12-12', '2023-06-12', 500000, '6', '0000-00-00', 'belum_kembali', 'belum_selesai', '9a557bc3-eaa4-4ac0-b73a-aa2030d72ace.jpg', 1),
(188, 64, 65, 86, 1, '2022-12-23', '2023-12-23', 500000, '12', '0000-00-00', 'belum_kembali', 'belum_selesai', 'images_(1).png', 1),
(189, 64, 65, 85, 2, '2022-12-17', '2023-03-17', 500000, '3', '0000-00-00', 'belum_kembali', 'belum_selesai', 'erd-sistem-informasi-apotek.png', 1),
(190, 64, 65, 85, 1, '2022-12-23', '2023-03-23', 500000, '3', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(191, 64, 66, 87, 3, '2022-12-23', '2023-03-23', 2223, '3', '0000-00-00', 'belum_kembali', 'belum_selesai', 'Group_25.png', 1),
(192, 67, 66, 87, 2, '2022-12-21', '2023-06-21', 2223, '6', '0000-00-00', 'belum_kembali', 'belum_selesai', 'kkkk.png', 1),
(193, 67, 66, 87, 1, '2022-12-28', '2023-06-28', 2223, '6', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(194, 68, 66, 87, 1, '2022-12-22', '2023-03-22', 2223, '3', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(206, 71, 3, 1, 3, '2023-03-01', '2023-04-01', 500000, '1', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(209, 74, 3, 1, 3, '2023-04-27', '2023-05-27', 500000, '1', '0000-00-00', 'belum_kembali', 'belum_selesai', '92a8ce42d22da898a6dd85b967c19541.png', 1),
(211, 74, 3, 1, 1, '2023-05-27', '2023-06-27', 500000, '1', '0000-00-00', 'belum_kembali', 'belum_selesai', '', 0),
(213, 1, 77, 90, 999, '2023-05-24', '2024-05-24', 900000000, '12', '0000-00-00', 'belum_kembali', 'belum_selesai', 'fc18d83f79b7f6599a9b55b5190558e3.png', 1),
(214, 1, 10, 8, 2, '2023-05-30', '2024-05-30', 1500000, '12', '0000-00-00', 'belum_kembali', 'belum_selesai', 'blob.svg', 0),
(215, 1, 77, 90, 998, '2023-05-17', '2023-08-17', 900000000, '3', '0000-00-00', 'belum_kembali', 'belum_selesai', '8fd806d27e72d97e5115f248d61ca7c1.jpg', 1),
(216, 1, 77, 90, 997, '2023-05-25', '2023-08-25', 900000000, '3', '0000-00-00', 'belum_kembali', 'belum_selesai', '1339e16162d8cd0b8fa297c824710ae1.jpg', 1),
(217, 77, 1, 92, 1001, '2023-04-22', '2023-05-22', 10000, '6', '0000-00-00', 'belum_kembali', 'belum_selesai', 'ed19ef667701945e5571d1fede258ed4.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unser_access_menu`
--

CREATE TABLE `unser_access_menu` (
  `id` int(11) NOT NULL,
  `id_role` int(10) NOT NULL,
  `menu_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `unser_access_menu`
--

INSERT INTO `unser_access_menu` (`id`, `id_role`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(5, 2, 2),
(6, 3, 3),
(7, 3, 2),
(8, 4, 4),
(9, 4, 2),
(10, 4, 3),
(11, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Owner'),
(4, 'Super_Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dasbor Admin', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 1, 'Permintaan Pemilik', 'admin/request_owner', 'fas fa-fw fa-file-alt', 1),
(7, 2, 'Profil Saya', 'User', 'fas fa-fw fa-user', 1),
(8, 3, 'Data Kos', 'owner', 'fas fa-fw fa-house-user', 1),
(9, 3, 'Data Sewa', 'owner/data_sewa', 'fas fa-fw fa-dollar-sign', 1),
(13, 1, 'Data Pengguna', 'admin/data_pengguna', 'fas fa-fw fa-users', 1),
(15, 4, 'Data Admin', 'super_admin/data_admin', 'fas fa-fw fa-users-cog', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_kos`
--
ALTER TABLE `tbl_kos`
  ADD PRIMARY KEY (`id_kos`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_sewa`
--
ALTER TABLE `tbl_sewa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kos` (`id_kos`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  ADD PRIMARY KEY (`id_tempat`),
  ADD KEY `id_kos` (`id_kos`) USING BTREE;

--
-- Indeks untuk tabel `tb_request`
--
ALTER TABLE `tb_request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `unser_access_menu`
--
ALTER TABLE `unser_access_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kos`
--
ALTER TABLE `tbl_kos`
  MODIFY `id_kos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `tb_request`
--
ALTER TABLE `tb_request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_booking` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_kos`
--
ALTER TABLE `tbl_kos`
  ADD CONSTRAINT `tbl_kos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tbl_sewa`
--
ALTER TABLE `tbl_sewa`
  ADD CONSTRAINT `tbl_sewa_ibfk_1` FOREIGN KEY (`id_kos`) REFERENCES `tbl_kos` (`id_kos`),
  ADD CONSTRAINT `tbl_sewa_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
