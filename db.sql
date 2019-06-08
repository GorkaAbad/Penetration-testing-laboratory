-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2019 at 12:45 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `container`
--

CREATE TABLE `container` (
  `id_container` int(11) NOT NULL,
  `cve_container` varchar(45) NOT NULL,
  `name_container` varchar(100) NOT NULL,
  `description_container` varchar(1000) NOT NULL,
  `diff_container` float NOT NULL,
  `command_container` varchar(500) NOT NULL,
  `hash_container` varchar(250) NOT NULL,
  `image_container` varchar(100) DEFAULT NULL,
  `puntos_container` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `container`
--

INSERT INTO `container` (`id_container`, `cve_container`, `name_container`, `description_container`, `diff_container`, `command_container`, `hash_container`, `image_container`, `puntos_container`) VALUES
(1, 'CVE-2014-6271', 'ShellShock', 'Shellshock, also known as Bashdoor, is a family of security bugs in the widely used Unix Bash shell, the first of which was disclosed on 24 September 2014. Many Internet-facing services, such as some web server deployments, use Bash to process certain requests, allowing an attacker to cause vulnerable versions of Bash to execute arbitrary commands. This can allow an attacker to gain unauthorized access to a computer system. You should be able to find the root user, in the shadow file...', 1, 'http://35.196.136.210:9998/', 'flag{3bc6768686053f49bf134a44191480e5}', '\"http://placehold.it/700x400\"', 30),
(4, 'RainbowTables', 'Crack Hashes', 'A rainbow table is a precomputed table for reversing cryptographic hash functions, usually for cracking password hashes. In this exercide you have to get the unhashed string that correspond to the hashs above. You must use rainbow tables. Hash: b26bcf0ae0c16d6952b1629e7ea4326dd3ea9512', 1, 'no', 'flag{6eccfd91aa8a36582fbf64b8ea533692}', '\"http://placehold.it/700x400\"', 10),
(5, 'Viegenere', 'ChiperText ', 'The Vigenère cipher is a method of encrypting alphabetic text by using a series of interwoven Caesar ciphers, based on the letters of a keyword. It is a form of polyalphabetic substitution. In this exercise you have to decode the chipertext, in order to get a readable plain text. Cipher Text: {msm jm azgh b pcfbs ueoy hvbt yfg pfee hvwqeijr itiel jwheejfs dhzusf.}', 1, 'no', 'flag{cc13b4c76f3d9cc61fb7729bef875e31}', '\"http://placehold.it/700x400\"', 10),
(6, 'JohnTheRipper', 'Cracking Linux passwords', 'John the Ripper is a fast password cracker, currently available for many flavors of Unix, Windows, DOS, and OpenVMS. Its primary purpose is to detect weak Unix passwords', 1, 'no', 'flag{74cc1c60799e0a786ac7094b532f01b1}', '\"http://placehold.it/700x400\"', 10),
(7, 'SQLInjection', 'Code injection', 'SQL injection attacks allow attackers to spoof identity, tamper with existing data, cause repudiation issues such as voiding transactions or changing balances, allow the complete disclosure of all data on the system, destroy the data or make it otherwise unavailable, and become administrators of the database server. In this case you will have to find the admin password... could you?', 3, 'http://35.196.136.210:8001/', 'flag{21232f297a57a5a743894a0e4a801fc3}', '	\r\n\"http://placehold.it/700x400\"\r\n', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(512) NOT NULL,
  `name` varchar(45) NOT NULL,
  `points` int(11) DEFAULT '0',
  `salt` varchar(256) NOT NULL,
  `token` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `email`, `password`, `name`, `points`, `salt`, `token`) VALUES
(35, 'gorka@gmail.com', '$6$2824722495ce52f8$2qABtx.0iRulWUZrBmM.PFXllZlEJy3Lui5WCw978kA9W.YPt5PwEYDjalJCQ/JE5R5DdJupJZ.yRq5kGrvog.', 'Gorka', 50, '$6$2824722495ce52f818c9772.27864939', NULL),
(36, 'unai19970315@gmail.com', '$6$17506774865ce539$VHBKI69h3.O3vanR0iL9QusB6cAp8ggDDxSFg8drXekE7gOXM3TY3gnNOQRahClKFqpuvsCAPGhtlP26wsIW50', 'Unai LÃ³pez Ansolega', 0, '$6$17506774865ce53998b3fa87.05270434', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userContainer`
--

CREATE TABLE `userContainer` (
  `iduserContainer` int(11) NOT NULL,
  `id_container` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userContainer`
--

INSERT INTO `userContainer` (`iduserContainer`, `id_container`, `id_user`) VALUES
(4, 'CVE-2014-6271', 35),
(5, 'RainbowTables', 35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`id_container`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `userContainer`
--
ALTER TABLE `userContainer`
  ADD PRIMARY KEY (`iduserContainer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
  MODIFY `id_container` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `userContainer`
--
ALTER TABLE `userContainer`
  MODIFY `iduserContainer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
