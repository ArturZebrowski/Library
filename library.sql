-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Sty 2023, 18:25
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id_book` int(10) UNSIGNED NOT NULL,
  `Title` varchar(25) COLLATE utf8_polish_ci DEFAULT NULL,
  `Author` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL,
  `Release_date` year(4) DEFAULT NULL,
  `Status` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `image` varchar(25) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id_book`, `Title`, `Author`, `Release_date`, `Status`, `image`) VALUES
(1, 'Kordian', 'Juliusz Słowacki', 1901, 'available', 'assets/img1.webp'),
(2, 'Lalka', 'Bolesław Prus', 1903, 'available', 'assets/img2.webp'),
(3, 'Dziady cz.4', 'Adam Mickiewicz', 1905, 'available', 'assets/img3.webp'),
(4, 'Wesele', 'Stanisław Wyspiański', 1908, 'available', 'assets/img4.webp'),
(5, 'Chłopcy z placu broni', 'Ferenc Molnár', 1911, 'available', 'assets/img5.webp'),
(6, 'Kamienie na szaniec', 'Aleksander Kamiński', 1943, 'available', 'assets/img6.webp');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `borrow`
--

CREATE TABLE `borrow` (
  `id_borrow` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_book` int(11) DEFAULT NULL,
  `Rental_date` date DEFAULT NULL,
  `Delivery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `Firstname` varchar(25) COLLATE utf8_polish_ci DEFAULT NULL,
  `Lastname` varchar(25) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `Firstname`, `Lastname`) VALUES
(1, 'Kordian', 'Ręka'),
(2, 'Marta', 'Ogórek'),
(3, 'Adam', 'Górak'),
(4, 'Tomasz', 'Zawadzki');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`);

--
-- Indeksy dla tabeli `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id_borrow`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id_borrow` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
