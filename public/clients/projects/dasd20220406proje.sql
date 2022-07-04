-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 24 Mar 2022, 13:17:36
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bbnew`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje`
--

CREATE TABLE `proje` (
  `proje_ID` int(11) NOT NULL,
  `proje_durum` varchar(255) NOT NULL DEFAULT '0',
  `proje_musteriad` varchar(255) DEFAULT NULL,
  `proje_musterikod` varchar(255) DEFAULT NULL,
  `proje_urunkod` varchar(255) DEFAULT NULL,
  `proje_urunad` varchar(255) DEFAULT NULL,
  `proje_hammadde` varchar(255) DEFAULT NULL,
  `proje_olcut` varchar(255) DEFAULT NULL,
  `proje_koliicadet` int(11) DEFAULT NULL,
  `proje_koliadet` int(11) DEFAULT NULL,
  `proje_projefiyat` int(11) DEFAULT NULL,
  `proje_projefiyatkur` varchar(255) DEFAULT NULL,
  `proje_faturafiyat` int(11) DEFAULT NULL,
  `proje_faturafiyatkur` varchar(255) DEFAULT NULL,
  `proje_gercekfiyat` int(11) DEFAULT NULL,
  `proje_gercekfiyatkur` varchar(255) DEFAULT NULL,
  `proje_hammadde2` varchar(255) DEFAULT NULL,
  `teklif_sandwich` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `proje`
--

INSERT INTO `proje` (`proje_ID`, `proje_durum`, `proje_musteriad`, `proje_musterikod`, `proje_urunkod`, `proje_urunad`, `proje_hammadde`, `proje_olcut`, `proje_koliicadet`, `proje_koliadet`, `proje_projefiyat`, `proje_projefiyatkur`, `proje_faturafiyat`, `proje_faturafiyatkur`, `proje_gercekfiyat`, `proje_gercekfiyatkur`, `proje_hammadde2`, `teklif_sandwich`) VALUES
(1, 'PR', 'burbant 3 4 5', '12312412', 'qqweqwe', 'qweqwrqw', 'q213qweqw', '123e', 1, 20, 3, '2312', 2, '23', 2, '3', '', NULL),
(2, 'PR', 'burbant 3', '12312412', 'qqweqwe', 'qweqwrqw', 'q213qweqw', '123e', 1, 20, 3, '2312', 2, '23', 2, '3', '2', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `proje`
--
ALTER TABLE `proje`
  ADD PRIMARY KEY (`proje_ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `proje`
--
ALTER TABLE `proje`
  MODIFY `proje_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
