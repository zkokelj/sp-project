-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 14. jan 2017 ob 20.06
-- Različica strežnika: 10.1.19-MariaDB
-- Različica PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `avtoporaba`
--

-- --------------------------------------------------------

--
-- Struktura tabele `car_manufacturers`
--
/*
CREATE TABLE `car_manufacturers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
*/
--
-- Odloži podatke za tabelo `car_manufacturers`
--

INSERT INTO `car_manufacturers` (`id`, `name`, `country`) VALUES
(1, 'Audi', 'Nemcija'),
(2, 'BMW', 'Nemčija'),
(3, 'Citroen', 'Francija'),
(4, 'Ford', 'USA'),
(5, 'Mercedes', 'Nemčija'),
(6, 'Peugeot', 'Francija'),
(7, 'Renault', 'Francija'),
(8, 'Škoda', 'Češka'),
(9, 'Volkswagen', 'Nemčija');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `car_manufacturers`
/*
ALTER TABLE `car_manufacturers`
  ADD PRIMARY KEY (`id`);
**/
--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `car_manufacturers`
--
/*
ALTER TABLE `car_manufacturers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
  */
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
