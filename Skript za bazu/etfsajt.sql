-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 24, 2021 at 12:23 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etfsajt`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `email` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`email`) VALUES
('administrator1@etf.bg.ac.rs'),
('administrator2@etf.bg.ac.rs');

-- --------------------------------------------------------

--
-- Table structure for table `drzi_predmet`
--

DROP TABLE IF EXISTS `drzi_predmet`;
CREATE TABLE IF NOT EXISTS `drzi_predmet` (
  `ident` int(11) NOT NULL AUTO_INCREMENT,
  `id_nastavnik` varchar(32) COLLATE utf8_bin NOT NULL,
  `sifra_predmet` varchar(15) COLLATE utf8_bin NOT NULL,
  `grupa` varchar(15) COLLATE utf8_bin NOT NULL,
  `termin` varchar(32) COLLATE utf8_bin NOT NULL,
  `sala` varchar(32) COLLATE utf8_bin NOT NULL,
  `nastava` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ident`),
  KEY `nastavnik2` (`id_nastavnik`),
  KEY `predmetsifra` (`sifra_predmet`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `drzi_predmet`
--

INSERT INTO `drzi_predmet` (`ident`, `id_nastavnik`, `sifra_predmet`, `grupa`, `termin`, `sala`, `nastava`) VALUES
(1, 'drazen.draskovic@etf.bg.ac.rs', '13E111PKR', 'P1', 'Utorak 15:00-17:00h', 'Paviljon P-25', 'predavanje'),
(2, 'drazen.draskovic@etf.bg.ac.rs', '13E113PIA', 'P1', 'Ponedeljak 12:00-14:00h', '70', 'predavanje'),
(3, 'drazen.draskovic@etf.bg.ac.rs', '13E114IP', 'P2', 'Ponedeljak 10:00-12:00h', '70', 'predavanje'),
(4, 'drazen.draskovic@etf.bg.ac.rs', '13E114IS', 'P1', 'Sreda 16:00-19:00h', '310', 'predavanje'),
(5, 'drazen.draskovic@etf.bg.ac.rs', '13E114PP1', 'P1', 'Ponedeljak 10:00-12:00h', '310', 'predavanje'),
(6, 'drazen.draskovic@etf.bg.ac.rs', '13M111PSZ', 'P1', 'Utorak 12:00-14:00h', '70', 'predavanje'),
(7, 'jelica@etf.bg.ac.rs', '13E111ORT', 'V1', 'Sreda 14:00-17:00h', '56', 'vezbe'),
(8, 'jelica@etf.bg.ac.rs', '13E111PKR', 'V1', 'Cetvrtak 14:00-16:00h', 'Paviljon P-25', 'vezbe'),
(9, 'jelica@etf.bg.ac.rs', '13E112ORT2', 'V1', 'Cetvrtak 16:00-18:00h', '57', 'vezbe'),
(10, 'jelica@etf.bg.ac.rs', '13E113PIA', 'V1', 'Petak 09:00-11:00h', 'Paviljon P-26', 'vezbe'),
(11, 'jelica@etf.bg.ac.rs', '13E114IP', 'V1', 'Ponedeljak 12:00-14:00h', '70', 'vezbe'),
(12, 'jelica@etf.bg.ac.rs', '13E114IS', 'V1', 'Cetvrtak 14:00-16:00h', '70', 'vezbe'),
(13, 'jelica@etf.bg.ac.rs', '13M111PSZ', 'V1', 'Utorak 12:00-14:00h', 'Paviljon P-25', 'vezbe'),
(14, 'micko@etf.bg.ac.rs', '13E111ORT', 'V2', 'Cetvrtak 14:00-16:00h', '55', 'vezbe'),
(15, 'micko@etf.bg.ac.rs', '13E112OO1', 'V1', 'Utorak 15:00-17:00h', '57', 'vezbe'),
(16, 'ziza@etf.bg.ac.rs', '13E112OO1', 'V2', 'Cetvrtak 14:00-16:00h', '55', 'vezbe'),
(17, 'nbosko@etf.bg.ac.rs', '13E112OO1', 'P1', 'Ponedeljak 10:00-12:00h', '310', 'predavanje'),
(18, 'nbosko@etf.bg.ac.rs', '13E111ORT', 'P1', 'Ponedeljak 16:00-19:00h', '56', 'predavanje'),
(19, 'nbosko@etf.bg.ac.rs', '13E112OO2', 'P1', 'Utorak 10:00-12:00h', '310', 'predavanje'),
(20, 'micko@etf.bg.ac.rs', '13E112OO2', 'V1', 'Utorak 19:00-21:00h', '310', 'vezbe'),
(21, 'ziza@etf.bg.ac.rs', '13E112OO2', 'V2', 'Petak 14:00-16:00h', '55', 'vezbe'),
(22, 'nbosko@etf.bg.ac.rs', '13E112ORT2', 'P1', 'Sreda 10:00-13:00h', '56', 'predavanje'),
(23, 'nbosko@etf.bg.ac.rs', '13E112RM1', 'P1', 'Sreda 18:00-20:00h', '56', 'predavanje'),
(24, 'micko@etf.bg.ac.rs', '13E112RM1', 'V1', 'Petak 16:00-18:00h', '70', 'vezbe'),
(25, 'nbosko@etf.bg.ac.rs', '13E114IP', 'P2', 'Ponedeljak 10:00-12:00h', '57', 'predavanje'),
(26, 'ziza@etf.bg.ac.rs', '13E114PP1', 'V1', 'Cetvrtak 10:00-12:00h', '55', 'vezbe'),
(27, 'drazen.draskovic@etf.bg.ac.rs', '13E114RM2', 'P1', 'Ponedeljak 19:00-21:00h', '57', 'predavanje'),
(28, 'micko@etf.bg.ac.rs', '13E114RM2', 'V1', 'Petak 12:00-14:00h', '70', 'vezbe'),
(29, 'nbosko@etf.bg.ac.rs', '13M111OPJ', 'P1', 'Ponedeljak 14:00-16:00h', '312', 'predavanje'),
(30, 'drazen.draskovic@etf.bg.ac.rs', '13M111OPJ', 'V1', 'Sreda 14:00-16:00h', '70', 'vezbe'),
(31, 'ziza@etf.bg.ac.rs', '13E111ORT', 'V3', 'Petak 09:00-11:00h', '55', 'vezbe'),
(32, 'drazen.draskovic@etf.bg.ac.rs', '13E111ORT', 'P2', 'Utorak 12:00-15:00h', '65', 'predavanje'),
(33, 'sanjad@etf.bg.ac.rs', '13E112RM1', 'V2', 'Cetvrtak 10:00-12:00h', 'Paviljon 25', 'vezbe'),
(34, 'nbosko@etf.bg.ac.rs', '13E114RM2', 'P2', 'Sreda 15:00-17:00h', '310', 'predavanje'),
(35, 'adrianm@etf.bg.ac.rs', '13M111OPJ', 'V2', 'Cetvrtak 17:00-19:00h', '314', 'vezbe'),
(36, 'drazen.draskovic@etf.bg.ac.rs', '13E113AOR1', 'P1', 'Ponedeljak 17:00-20:00h', '310', 'predavanje'),
(37, 'micko@etf.bg.ac.rs', '13E113AOR1', 'V1', 'Sreda 18:00-20:00h', '57', 'vezbe'),
(38, 'nbosko@etf.bg.ac.rs', '13E113BP1', 'P1', 'Sreda 10:00-12:00h', '312', 'predavanje'),
(39, 'drazen.draskovic@etf.bg.ac.rs', '13E113BP1', 'V1', 'Petak 11:00-13:00h', '311', 'vezbe'),
(40, 'nbosko@etf.bg.ac.rs', '13E114PRS', 'P1', 'Sreda 14:00-16:00h', '312', 'predavanje'),
(41, 'sanjad@etf.bg.ac.rs', '13E114PRS', 'V1', 'Sreda 16:00-18:00h', '312', 'vezbe'),
(42, 'drazen.draskovic@etf.bg.ac.rs', '13M111SON', 'P1', 'Utorak 15:00-17:00h', '311', 'predavanje'),
(43, 'adrianm@etf.bg.ac.rs', '13M111SON', 'V1', 'Cetvrtak 17:00-19:00h', '311', 'vezbe');

-- --------------------------------------------------------

--
-- Table structure for table `fajl_uz_obavestenje`
--

DROP TABLE IF EXISTS `fajl_uz_obavestenje`;
CREATE TABLE IF NOT EXISTS `fajl_uz_obavestenje` (
  `id_fajl` int(11) NOT NULL AUTO_INCREMENT,
  `id_obav` int(11) NOT NULL,
  `putanja` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_fajl`),
  KEY `obavestenje` (`id_obav`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fajl_uz_obavestenje`
--

INSERT INTO `fajl_uz_obavestenje` (`id_fajl`, `id_obav`, `putanja`) VALUES
(1, 1, 'Fajlovi/13S111ORT1_2019_2020_Oktobar_Ocene.pdf'),
(3, 3, 'Fajlovi/13E112OO1_poeni_20202021_jan.pdf'),
(4, 4, 'Fajlovi/dz_2019_20_3_SI_IR_V1.pdf'),
(5, 5, 'Fajlovi/2020_2021_OS4IP-Projekat_JAN_FEB_rok_2021.pdf'),
(19, 2, 'Fajlovi/predispitne.pdf'),
(20, 2, 'Fajlovi/januar.pdf'),
(41, 9, 'Fajlovi/PIA_Lab_JSF_2020_05.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija_obav`
--

DROP TABLE IF EXISTS `kategorija_obav`;
CREATE TABLE IF NOT EXISTS `kategorija_obav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kategorija_obav`
--

INSERT INTO `kategorija_obav` (`id`, `naziv`) VALUES
(1, 'Takmicenje'),
(2, 'Konferencija'),
(3, 'Praksa'),
(4, 'Posao');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `email` varchar(32) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  `ime` varchar(15) COLLATE utf8_bin NOT NULL,
  `prezime` varchar(32) COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1-Aktivan 0-Neaktivan',
  `tip_korisnika` varchar(1) COLLATE utf8_bin NOT NULL COMMENT 'Z-Zaposleni S-Student A-Administrator',
  `prvi_pristup` tinyint(4) NOT NULL COMMENT '1-Nije prvi 0-Prvi pristup',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`email`, `password`, `ime`, `prezime`, `status`, `tip_korisnika`, `prvi_pristup`) VALUES
('administrator1@etf.bg.ac.rs', 'admin123', 'Petar', 'Petrovic', 1, 'A', 1),
('administrator2@etf.bg.ac.rs', 'admin1234', 'Jovan', 'Jovanovic', 1, 'A', 1),
('adrianm@etf.bg.ac.rs', 'adrian123', 'Adrian', 'Marinkovic', 1, 'Z', 1),
('cd160197d@student.etf.rs', 'dule123', 'Dusan', 'Cvetkovic', 1, 'Z', 1),
('dj160441d@student.etf.rs', 'jovana1234', 'Jovana', 'Dimkovic', 1, 'S', 1),
('drazen.draskovic@etf.bg.ac.rs', 'drazen123', 'Drazen', 'Draskovic', 1, 'Z', 1),
('fj200155d@student.etf.rs', 'julija123', 'Julija', 'Filipovic', 0, 'S', 1),
('jelica@etf.bg.ac.rs', 'jelica123', 'Jelica', 'Cincovic', 1, 'Z', 1),
('jovo.perovic@etf.bg.ac.rs', 'jovo123', 'Jovo', 'Perovic', 1, 'Z', 0),
('ka203075m@student.etf.rs', 'aleksa123', 'Aleksa', 'Kostadinovic', 1, 'S', 0),
('micko@etf.bg.ac.rs', 'micko123', 'Marko', 'Micovic', 1, 'Z', 1),
('nbosko@etf.bg.ac.rs', 'bosko123', 'Bosko', 'Nikolic', 1, 'Z', 1),
('pu160186d@student.etf.rs', 'uros123', 'Uros', 'Petkovic', 0, 'S', 0),
('pu203027m@student.etf.rs', 'uros123', 'Uros', 'Petkovic', 1, 'S', 1),
('rj203022m@student.etf.rs', 'jelica123', 'Jelica', 'Radomirovic', 1, 'S', 1),
('rm205001p@student.etf.rs', 'marina123', 'Marina', 'Ristic', 1, 'S', 0),
('sanjad@etf.bg.ac.rs', 'sanja123', 'Sanja', 'Delcev', 1, 'Z', 0),
('ziza@etf.bg.ac.rs', 'ziza123', 'Kristijan', 'Ziza', 1, 'Z', 1);

-- --------------------------------------------------------

--
-- Table structure for table `materijal`
--

DROP TABLE IF EXISTS `materijal`;
CREATE TABLE IF NOT EXISTS `materijal` (
  `id_materijal` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_bin NOT NULL,
  `fajl_putanja` varchar(150) COLLATE utf8_bin NOT NULL,
  `sifra_predmet` varchar(15) COLLATE utf8_bin NOT NULL,
  `tip_materijala` varchar(32) COLLATE utf8_bin NOT NULL,
  `id_nastavnik` varchar(32) COLLATE utf8_bin NOT NULL,
  `datum_objave` date NOT NULL,
  `vidljiv` tinyint(4) NOT NULL COMMENT '1-Vidljiv 0-Nevidljiv',
  `tip_fajla` varchar(10) COLLATE utf8_bin NOT NULL,
  `velicina` varchar(15) COLLATE utf8_bin NOT NULL,
  `sortiranje` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_materijal`),
  KEY `materijali` (`tip_materijala`),
  KEY `nastavnik1` (`id_nastavnik`),
  KEY `sifrapredmet` (`sifra_predmet`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `materijal`
--

INSERT INTO `materijal` (`id_materijal`, `naslov`, `fajl_putanja`, `sifra_predmet`, `tip_materijala`, `id_nastavnik`, `datum_objave`, `vidljiv`, `tip_fajla`, `velicina`, `sortiranje`) VALUES
(1, 'Uvod, Microsoft Windows, Office', 'Materijali/praktikum_iz_koriscenja_racunara.pdf', '13E111PKR', 'Predavanja', 'drazen.draskovic@etf.bg.ac.rs', '2018-10-02', 1, 'PDF', '4916.05', 'datum_rastuce'),
(2, 'Organizacija racunara i racunarski hardver', 'Materijali/PKR_Organizacija_racunara_i_racunarski_hardver_2019.pdf', '13E111PKR', 'Predavanja', 'drazen.draskovic@etf.bg.ac.rs', '2019-10-03', 1, 'PDF', '2481.8', 'datum_rastuce'),
(3, 'Operativni sistem MS Windows i koriscenje Interneta', 'Materijali/PKR_prva_lab_vezba.pdf', '13E111PKR', 'Laboratorijske vezbe', 'jelica@etf.bg.ac.rs', '2020-10-02', 1, 'PDF', '3746.3', 'datum_rastuce'),
(4, 'Operativni sistem MS Windows i koriscenje Interneta', 'Materijali/Lista_tasterskih_precica_za_Windows_OS.pdf', '13E111PKR', 'Laboratorijske vezbe', 'jelica@etf.bg.ac.rs', '2020-10-02', 1, 'PDF', '2342.1', 'datum_rastuce'),
(5, 'Microsoft Office Word', 'Materijali/PKR_druga_lab_vezba.pdf', '13E111PKR', 'Laboratorijske vezbe', 'jelica@etf.bg.ac.rs', '2020-11-10', 1, 'PDF', '4253.1', 'datum_rastuce'),
(6, 'Microsoft Office Word', 'Materijali/EquationEditor.pdf', '13E111PKR', 'Laboratorijske vezbe', 'jelica@etf.bg.ac.rs', '2020-11-10', 1, 'PDF', '3425.32', 'datum_rastuce'),
(7, 'Bulova algebra', 'Materijali/ORT1_2013_glava_1.pdf', '13E111ORT', 'Predavanja', 'nbosko@etf.bg.ac.rs', '2020-10-06', 1, 'PDF', '7567.2', ''),
(8, 'Prekidacke funkcije', 'Materijali/ORT1_2013_glava_2.pdf', '13E111ORT', 'Predavanja', 'nbosko@etf.bg.ac.rs', '2020-11-10', 1, 'PDF', '6875.34', ''),
(9, 'Digitalni uredjaji', 'Materijali/ORT1_2014_glava_9_ProjektovanjeUredjaja.pdf', '13E111ORT', 'Predavanja', 'nbosko@etf.bg.ac.rs', '2017-11-30', 1, 'PDF', '8989.5', ''),
(10, 'Bulova algebra i prekidacke funkcije', 'Materijali/ORT1_2017_Vezbe1 - Bulova algebra i prekidacke funkcije.pdf', '13E111ORT', 'Vezbe', 'jelica@etf.bg.ac.rs', '2019-10-14', 1, 'PDF', '5458.65', ''),
(11, 'Projektovanje upravljacke jedinice', 'Materijali/ORT1_2013_Vezbe7 - ProjektovanjeUpravljackeJedinice.pdf', '13E111ORT', 'Vezbe', 'jelica@etf.bg.ac.rs', '2019-12-17', 1, 'PDF', '5678.9', ''),
(12, 'Junski ispitni rok', 'Materijali/13E111ORT_jun_I_2019_2020_formular_resenje.pdf', '13E111ORT', 'Ispitna pitanja', 'jelica@etf.bg.ac.rs', '2020-06-23', 1, 'PDF', '254.2', ''),
(13, 'Julski ispitni rok', 'Materijali/13E111ORT_jul_I_2019_2020_formular_resenje.pdf', '13E111ORT', 'Ispitna pitanja', 'jelica@etf.bg.ac.rs', '2020-07-15', 1, 'PDF', '123.4', ''),
(14, 'O predmetu', 'Materijali/00_OO1_2020-21.pdf', '13E112OO1', 'Predavanja', 'nbosko@etf.bg.ac.rs', '2020-10-20', 1, 'PDF', '2409.8', ''),
(15, 'Uvod', 'Materijali/01_Uvod.pdf', '13E112OO1', 'Predavanja', 'nbosko@etf.bg.ac.rs', '2020-10-29', 1, 'PDF', '2453.8', ''),
(16, 'Prosirenja C', 'Materijali/02_Prosirenja_C.pdf', '13E112OO1', 'Predavanja', 'nbosko@etf.bg.ac.rs', '2020-11-10', 1, 'PDF', '2675.9', ''),
(17, 'Januar 2019.', 'Materijali/OO1K2IR190113.pdf', '13E112OO1', 'Ispitna pitanja', 'ziza@etf.bg.ac.rs', '2019-01-17', 1, 'PDF', '243.3', ''),
(18, 'Prvi domaci zadatak', 'Materijali/13E112OO1_13S112OO1_DZ_Lab1_2021.pdf', '13E112OO1', 'Domaci zadaci', 'micko@etf.bg.ac.rs', '2020-10-30', 1, 'PDF', '178.4', ''),
(19, 'Drugi domaci zadatak', 'Materijali/13E112OO1_DZ_Lab2_2021_V1.pdf', '13E112OO1', 'Domaci zadaci', 'ziza@etf.bg.ac.rs', '2020-11-17', 1, 'PDF', '198.8', ''),
(20, 'Treci domaci zadatak', 'Materijali/13E112OO1_13S112OO1_DZ_Lab3_2021_V1.pdf', '13E112OO1', 'Domaci zadaci', 'ziza@etf.bg.ac.rs', '2020-12-15', 1, 'PDF', '201.2', ''),
(21, 'O predmetu', 'Materijali/00-13E112OO2 2019-20.pdf', '13E112OO2', 'Predavanja', 'nbosko@etf.bg.ac.rs', '2020-03-09', 1, 'PDF', '784.3', ''),
(22, 'Uvod', 'Materijali/01-Uvod-Java.pdf', '13E112OO2', 'Predavanja', 'nbosko@etf.bg.ac.rs', '2020-03-18', 1, 'PDF', '1458.98', ''),
(23, 'Ispit u junskom roku', 'Materijali/OO2K2IR190609.pdf', '13E112OO2', 'Ispitna pitanja', 'micko@etf.bg.ac.rs', '2020-06-25', 1, 'PDF', '112.8', ''),
(24, 'Prvi domaci zadatak', 'Materijali/13S112OO2_DZ_Lab1_1920.pdf', '13E112OO2', 'Domaci zadaci', 'ziza@etf.bg.ac.rs', '2020-04-14', 1, 'PDF', '154.1', ''),
(25, 'Racunarske mreze 2-Udzbenik za predavanja', 'Materijali/Racunarske mreze2-CIP.pdf', '13E114RM2', 'Predavanja', 'drazen.draskovic@etf.bg.ac.rs', '2020-05-11', 1, 'PDF', '8995.3', ''),
(26, 'Uvod u PIA', 'Materijali/PIA_Lekcija1_Uvod.pdf', '13E113PIA', 'Predavanja', 'drazen.draskovic@etf.bg.ac.rs', '2020-03-09', 1, 'PDF', '1489.2', ''),
(27, 'Java Servleti', 'Materijali/PIA_Lekcija2_Servleti.pdf', '13E113PIA', 'Predavanja', 'drazen.draskovic@etf.bg.ac.rs', '2020-05-05', 1, 'PDF', '3534.7', ''),
(28, 'HTML', 'Materijali/PIA_Vezbe1_HTML.pdf', '13E113PIA', 'Vezbe', 'jelica@etf.bg.ac.rs', '2020-06-08', 1, 'PDF', '4325.35', ''),
(29, 'CSS', 'Materijali/PIA_Vezbe4_CSS.pdf', '13E113PIA', 'Vezbe', 'jelica@etf.bg.ac.rs', '2020-06-22', 1, 'PDF', '2814.2', ''),
(30, 'JavaScript', 'Materijali/JavaScript_vezbe.pdf', '13E113PIA', 'Vezbe', 'jelica@etf.bg.ac.rs', '2020-01-15', 1, 'PDF', '2445.5', ''),
(31, 'Angular', 'Materijali/PIA_LabAngular_04_2020.pdf', '13E113PIA', 'Laboratorijske vezbe', 'jelica@etf.bg.ac.rs', '2020-09-30', 1, 'PDF', '1534.88', ''),
(32, 'Projekat u februarskom roku', 'Materijali/2020_21_Projekat_januarsko_februarski.pdf', '13E113PIA', 'Projekti', 'jelica@etf.bg.ac.rs', '2021-01-12', 1, 'PDF', '574.98', ''),
(33, 'Ispit januar 2019.', 'Materijali/PIA_2020_01_09_SI_K2.pdf', '13E113PIA', 'Ispitna pitanja', 'drazen.draskovic@etf.bg.ac.rs', '2019-01-15', 1, 'PDF', '144.1', 'datum_rastuce'),
(34, 'Zbirka zadataka iz ekspertskih sistema', 'Materijali/ES-2013.pdf', '13E114IS', 'Predavanja', 'drazen.draskovic@etf.bg.ac.rs', '2020-10-14', 1, 'PDF', '5432.11', 'datum_rastuce'),
(35, 'Uvod', 'Materijali/IS_P1_Uvod.pdf', '13E114IS', 'Predavanja', 'drazen.draskovic@etf.bg.ac.rs', '2020-10-07', 1, 'PDF', '895.04', 'datum_rastuce'),
(36, 'Prostor i algoritmi pretrazivanja', 'Materijali/IS_Prostor_i_algoritmi_pretrazivanja.pdf', '13E114IS', 'Vezbe', 'jelica@etf.bg.ac.rs', '2020-10-22', 1, 'PDF', '1756.32', 'naziv_rastuce'),
(37, 'Projekat u januarskom roku', 'Materijali/IS_Domaci_Januar2020.pdf', '13E114IS', 'Projekti', 'drazen.draskovic@etf.bg.ac.rs', '2021-01-07', 1, 'PDF', '867.45', 'naziv_rastuce'),
(38, 'Tekst januarskog ispita 2020.', 'Materijali/JAN_201920.pdf', '13E114IS', 'Ispitna pitanja', 'drazen.draskovic@etf.bg.ac.rs', '2021-01-19', 1, 'PDF', '121', 'datum_opadajuce'),
(40, 'PHP - osnovni kurs', 'Materijali/PHP.pdf', '13E114IP', 'Predavanja', 'drazen.draskovic@etf.bg.ac.rs', '2020-11-28', 1, 'PDF', '2343.22', 'datum_rastuce'),
(41, 'Projekat u januarskom i februarskom roku', 'Materijali/2020_2021_OS4IP-Projekat_JAN_FEB_rok_2021.pdf', '13E114IP', 'Projekti', 'drazen.draskovic@etf.bg.ac.rs', '2021-01-01', 1, 'PDF', '998.65', 'naziv_rastuce'),
(42, 'Ispit februar 2017.', 'Materijali/OS4IP_Feb2017.pdf', '13E114IP', 'Ispitna pitanja', 'jelica@etf.bg.ac.rs', '2017-02-08', 1, 'PDF', '102', 'datum_opadajuce'),
(43, 'Uvod u masinsko ucenje', 'Materijali/Mašinskoučenje.pdf', '13M111PSZ', 'Predavanja', 'drazen.draskovic@etf.bg.ac.rs', '2020-03-11', 1, 'PDF', '1865.11', ''),
(44, 'Primer ispitnog zadatka', 'Materijali/PSZ_Jun2019_tekst.pdf', '13M111PSZ', 'Ispitna pitanja', 'drazen.draskovic@etf.bg.ac.rs', '2020-06-01', 1, 'PDF', '234.44', ''),
(46, 'Projekat za januarski i februarski rok', 'Materijali/pp1_2020_2021_jan.pdf', '13E114PP1', 'Projekti', 'ziza@etf.bg.ac.rs', '2021-01-12', 1, 'PDF', '456.12', 'naziv_opadajuce'),
(47, 'Jul 2019-2020.', 'Materijali/pp1-1920-jul.pdf', '13E114PP1', 'Ispitna pitanja', 'ziza@etf.bg.ac.rs', '2020-07-22', 1, 'PDF', '323.23', ''),
(52, 'HTML-liste, linkovi, tabele', 'Materijali/IP_Vezbe2_HTML.pdf', '13E114IP', 'Predavanja', 'nbosko@etf.bg.ac.rs', '2020-10-14', 1, 'PDF', '3421.28', 'datum_rastuce'),
(53, 'Leksicka analiza', 'Materijali/Leksicka_Analiza.pdf', '13E114PP1', 'Vezbe', 'ziza@etf.bg.ac.rs', '2020-09-30', 1, 'PDF', '1454.54', ''),
(54, 'Uvod o bazama', 'Materijali/UvodBaze.pdf', '13E113BP1', 'Predavanja', 'nbosko@etf.bg.ac.rs', '2021-02-23', 1, 'PDF', '234.12', ''),
(55, 'Model entiteta i odnosa', 'Materijali/ModelEntiteti.pdf', '13E113BP1', 'Vezbe', 'drazen.draskovic@etf.bg.ac.rs', '2021-02-23', 1, 'PDF', '324.5', ''),
(56, 'Ispit u februaru 2021. godine', 'Materijali/BP1_20_21_Januar(13E113BP1-13S112BP1).zip', '13E113BP1', 'Ispitna pitanja', 'nbosko@etf.bg.ac.rs', '2021-02-23', 1, 'ZIP', '2454', ''),
(57, 'Memorija iz AOR1', 'Materijali/Memorija_iz_AOR1_2005_2006_v2.pdf', '13E113AOR1', 'Predavanja', 'drazen.draskovic@etf.bg.ac.rs', '2021-02-23', 1, 'PDF', '1454.54', ''),
(58, 'Materijali za vezbe iz AOR1', 'Materijali/Vezbe_AOR1_2014_V1.0.pdf', '13E113AOR1', 'Vezbe', 'micko@etf.bg.ac.rs', '2021-02-23', 1, 'PDF', '5342.9', ''),
(59, 'Prvo predavanje', 'Materijali/PRS1.pdf', '13E114PRS', 'Predavanja', 'nbosko@etf.bg.ac.rs', '2021-02-22', 1, 'PDF', '234.12', '');

-- --------------------------------------------------------

--
-- Table structure for table `nastavni_plan`
--

DROP TABLE IF EXISTS `nastavni_plan`;
CREATE TABLE IF NOT EXISTS `nastavni_plan` (
  `sifra_predmet` varchar(15) COLLATE utf8_bin NOT NULL,
  `id_odsek` int(11) NOT NULL,
  `godina_studija` varchar(10) COLLATE utf8_bin NOT NULL,
  `semestar` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`sifra_predmet`,`id_odsek`,`godina_studija`),
  KEY `idodsek` (`id_odsek`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `nastavni_plan`
--

INSERT INTO `nastavni_plan` (`sifra_predmet`, `id_odsek`, `godina_studija`, `semestar`) VALUES
('13E111ORT', 1, 'prva', 'drugi'),
('13E111ORT', 2, 'prva', 'drugi'),
('13E111ORT', 3, 'prva', 'drugi'),
('13E111ORT', 4, 'prva', 'drugi'),
('13E111ORT', 5, 'prva', 'drugi'),
('13E111ORT', 6, 'prva', 'drugi'),
('13E111ORT', 7, 'prva', 'drugi'),
('13E111PKR', 1, 'prva', 'prvi'),
('13E111PKR', 2, 'prva', 'prvi'),
('13E111PKR', 4, 'prva', 'prvi'),
('13E112OO1', 1, 'druga', 'treci'),
('13E112OO1', 2, 'druga', 'treci'),
('13E112OO1', 5, 'druga', 'treci'),
('13E112OO1', 7, 'druga', 'treci'),
('13E112OO2', 1, 'druga', 'cetvrti'),
('13E112OO2', 2, 'druga', 'cetvrti'),
('13E112OO2', 5, 'druga', 'cetvrti'),
('13E112OO2', 7, 'druga', 'cetvrti'),
('13E112ORT2', 1, 'druga', 'treci'),
('13E112ORT2', 7, 'druga', 'treci'),
('13E112RM1', 1, 'druga', 'cetvrti'),
('13E112RM1', 7, 'druga', 'cetvrti'),
('13E113AOR1', 1, 'treca', 'peti'),
('13E113BP1', 1, 'treca', 'peti'),
('13E113PIA', 1, 'treca', 'sesti'),
('13E113PIA', 7, 'treca', 'sesti'),
('13E114IP', 2, 'cetvrta', 'sedmi'),
('13E114IP', 4, 'cetvrta', 'sedmi'),
('13E114IS', 1, 'cetvrta', 'sedmi'),
('13E114IS', 7, 'cetvrta', 'sedmi'),
('13E114PP1', 1, 'cetvrta', 'sedmi'),
('13E114PP1', 7, 'cetvrta', 'sedmi'),
('13E114PRS', 1, 'cetvrta', 'osmi'),
('13E114RM2', 1, 'cetvrta', 'sedmi'),
('13M111OPJ', 1, 'peta', 'deseti'),
('13M111OPJ', 7, 'peta', 'deseti'),
('13M111PSZ', 1, 'peta', 'deseti'),
('13M111PSZ', 7, 'peta', 'deseti'),
('13M111SON', 1, 'peta', 'deveti');

-- --------------------------------------------------------

--
-- Table structure for table `obavestenje_predmet`
--

DROP TABLE IF EXISTS `obavestenje_predmet`;
CREATE TABLE IF NOT EXISTS `obavestenje_predmet` (
  `id_obav` int(11) NOT NULL AUTO_INCREMENT,
  `id_predmet` varchar(15) COLLATE utf8_bin NOT NULL,
  `naslov` varchar(50) COLLATE utf8_bin NOT NULL,
  `sadrzaj` varchar(500) COLLATE utf8_bin NOT NULL,
  `datum_objave` date NOT NULL,
  `id_nastavnik` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_obav`),
  KEY `nastavnik` (`id_nastavnik`),
  KEY `predmet` (`id_predmet`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `obavestenje_predmet`
--

INSERT INTO `obavestenje_predmet` (`id_obav`, `id_predmet`, `naslov`, `sadrzaj`, `datum_objave`, `id_nastavnik`) VALUES
(1, '13E111ORT', '[28.09.2020.] 13E111ORT', 'Rezultati oktobarskog ispitnog roka mogu se videti na linku ispod. Uvid u radove ce biti organizovan u utorak 29.09. u 15:00 u kancelariji 37.', '2020-09-28', 'jelica@etf.bg.ac.rs'),
(2, '13E111PKR', '03.02.2020. Rezultati januarskog roka iz PKR-a', 'Rezultati januarskog roka iz Praktikuma iz koriscenja racunara nalaze se na linku ispod. Uvid ce se obaviti 04.02.2021. godine u 15h u kabinetu 37.Svi koji su zainteresovani za dolazak na uvid neka se jave mejlom.', '2021-02-23', 'drazen.draskovic@etf.bg.ac.rs'),
(3, '13E112OO1', '07.02.2021. Rezultati januarskog roka iz OO1', 'Rezultate januarskog roka mozete videti na linku ispod. Uvid u radove odrzace se 05.02.2021. godine u 14h u sali 60.', '2021-02-07', 'ziza@etf.bg.ac.rs'),
(4, '13E112OO2', '23.05.2020.', 'Postavke domaceg zadatka za trecu laboratorijsku vezbu za sve odseke nalaze se na linku ispod.', '2020-05-23', 'micko@etf.bg.ac.rs'),
(5, '13E114IP', 'Projekat za januarski i februarski rok 2021.', 'Postovani, u prilogu se nalazi tekst projekta koji se moze braniti u januarskom i februarskom roku. Odbrana ce se organizovati nekoliko dana nakon ispita.', '2020-12-25', 'nbosko@etf.bg.ac.rs'),
(9, '13E113PIA', 'Laboratorijska vezba iz JSF maj 2020. godine', '20. maja 2020. godine odrzace se laboratorijska vezba iz JSF u Paviljonu u ucionici P26 sa pocetkom u 14h. Materijal za ovu laboratorijsku vezbu nalazi se na linku ispod. Od studenata se ocekuje da dodju spremni na ovu laboratorijsku vezbu.', '2021-02-16', 'drazen.draskovic@etf.bg.ac.rs'),
(10, '13E114RM2', 'Prva laboratorijska vezba u martu', 'Postovani, obavestavamo Vas da ce se prva laboratorijska vezba odrzati 15. marta sa pocetkom u 14h u sali 25 u Paviljonu.', '2021-02-23', 'drazen.draskovic@etf.bg.ac.rs'),
(11, '13M111PSZ', 'Predavanja u ovom semestru', 'Obavestavaju se svi studenti da ce predavanja u ovom semestru poceti 1.3.2021. godine sa pocetkom u 10h.', '2021-02-23', 'drazen.draskovic@etf.bg.ac.rs'),
(12, '13M111SON', 'Pocetak novog semestra', 'Postovani, obavestavamo Vas da ce predavanja na predmetu poceti po dogovorenom rasporedu koji se nalazi na zvanicnom sajtu fakulteta.', '2021-02-23', 'drazen.draskovic@etf.bg.ac.rs'),
(13, '13E113BP1', 'Uvodno predavanje', 'Obavestavaju se studenti da ce se uvodno predavanja odrzati 15. marta sa pocetkom u 10h u  sali 310. Svi zainteresovani studenti su pozvani da dodju.', '2021-02-23', 'drazen.draskovic@etf.bg.ac.rs'),
(14, '13E112RM1', 'Uvodno predavanje', 'Obavestavaju se studenti da ce se uvodno predavanje odrzati 12.3. sa pocetkom u 12h u sali 310.', '2021-02-23', 'nbosko@etf.bg.ac.rs'),
(15, '13M111OPJ', 'Uvodno predavanje', 'Obavestavaju se studenti master studija, da ce poredavanja iz ovog predmeta poceti u martu mesecu.Uvodno predavanje odrzace se 7. marta sa pocetkom u 14h u sali 314.', '2021-02-23', 'nbosko@etf.bg.ac.rs'),
(16, '13E114PRS', 'Uvodno predavanje', 'Uvodno predavanje ovog obaveznog predmeta odrzace se 1.3.2021. godine sa pocetkom u 10h u sali 56.Pozivaju se svi studenti da pristustvuju ovom predavanju.', '2021-02-23', 'nbosko@etf.bg.ac.rs');

-- --------------------------------------------------------

--
-- Table structure for table `obavestenje_sajt`
--

DROP TABLE IF EXISTS `obavestenje_sajt`;
CREATE TABLE IF NOT EXISTS `obavestenje_sajt` (
  `id_obav` int(11) NOT NULL AUTO_INCREMENT,
  `id_kat` int(11) NOT NULL,
  `naslov` varchar(50) COLLATE utf8_bin NOT NULL,
  `sadrzaj` varchar(250) COLLATE utf8_bin NOT NULL,
  `datum_objave` date NOT NULL,
  `autor` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_obav`),
  KEY `autor` (`autor`),
  KEY `kategorija` (`id_kat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `obavestenje_sajt`
--

INSERT INTO `obavestenje_sajt` (`id_obav`, `id_kat`, `naslov`, `sadrzaj`, `datum_objave`, `autor`) VALUES
(1, 1, 'HAKATON 2020 UBISOFT', 'Pozivaju se svi zainteresovani studenti da se prijave na hakaton takmicenje koje organizuje kompanija Ubisoft. Cilj je napraviti najbolju igricu strategijskog tipa. Pobednici osvajaju vredne nagrade. Broj prijava je ogranicen, zato pozurite.', '2020-08-11', 'administrator1@etf.bg.ac.rs'),
(2, 1, 'Artificial Intelligence Hackaton 2021', 'Dobro dosli na AI Hackaton 2021. Zainteresovani ucesnici mogu se prijaviti do 28. februara 2021. godine. Tema hakatona je optimizacija kretanja robota u zatvorenom prostoru uz pomoc neuralnih mreza i APIja. Pobednike ocekuju vredne nagrade.', '2021-02-02', 'administrator2@etf.bg.ac.rs'),
(3, 2, 'Konferencija kompanije MICROSOFT', 'Postovani, obavestavamo Vas da ce se 3. marta 2021. godine odrzati online konferencija kompanije Microsoft pod nazivom Deep Learning koja ce se baviti bitnim temama iz masinskog ucenja. Konferenciju ce voditi zaposleni kompanije.', '2021-02-17', 'administrator1@etf.bg.ac.rs'),
(4, 3, 'Internship - Softwer Development', 'QuantLabs is building an exciting financial software – from scratch. We are always eager to give a chance to young and ambitious people, regardless of their work experience, to become a part of our team.', '2020-10-11', 'administrator1@etf.bg.ac.rs'),
(5, 4, 'Kompanija Raiffeisen siri svoj razvojni tim', 'Usled modernizacije i prosirenja poslovanja, Raiffeisen banka otvara mogucnosti za mlade inzenjere. Trazene pozicije su: IT Developer, iOS Developer, WEB Developer i .NET Developer. Za vise informacija obratite se PR timu.', '2021-02-01', 'administrator1@etf.bg.ac.rs'),
(6, 2, 'Konferencija UN na ETF-u', 'Odrzace se konferencija UN povodom novonastale epidemioloske situacije 25.3.2021. godine. Zainteresovani mogu da dodju.', '2021-02-18', 'administrator1@etf.bg.ac.rs');

-- --------------------------------------------------------

--
-- Table structure for table `odsek`
--

DROP TABLE IF EXISTS `odsek`;
CREATE TABLE IF NOT EXISTS `odsek` (
  `id_odsek` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_odseka` varchar(50) COLLATE utf8_bin NOT NULL,
  `sef_odseka` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_odsek`),
  KEY `sef` (`sef_odseka`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `odsek`
--

INSERT INTO `odsek` (`id_odsek`, `naziv_odseka`, `sef_odseka`) VALUES
(1, 'Racunarska tehnika i informatika', 'drazen.draskovic@etf.bg.ac.rs'),
(2, 'Signali i sistemi', 'jelica@etf.bg.ac.rs'),
(3, 'Energetika', 'ziza@etf.bg.ac.rs'),
(4, 'Elektronika', 'micko@etf.bg.ac.rs'),
(5, 'Telekomunikacije', 'nbosko@etf.bg.ac.rs'),
(6, 'Fizicka elektronika', 'micko@etf.bg.ac.rs'),
(7, 'Softversko inzenjerstvo', 'ziza@etf.bg.ac.rs');

-- --------------------------------------------------------

--
-- Table structure for table `prati_predmet`
--

DROP TABLE IF EXISTS `prati_predmet`;
CREATE TABLE IF NOT EXISTS `prati_predmet` (
  `id_student` varchar(32) COLLATE utf8_bin NOT NULL,
  `sifra_predmet` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_student`,`sifra_predmet`),
  KEY `predmetasifra1` (`sifra_predmet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prati_predmet`
--

INSERT INTO `prati_predmet` (`id_student`, `sifra_predmet`) VALUES
('fj200155d@student.etf.rs', '13E111ORT'),
('pu160186d@student.etf.rs', '13E111ORT'),
('pu203027m@student.etf.rs', '13E111ORT'),
('pu160186d@student.etf.rs', '13E111PKR'),
('pu160186d@student.etf.rs', '13E112OO1'),
('fj200155d@student.etf.rs', '13E112OO2'),
('pu160186d@student.etf.rs', '13E112OO2'),
('rj203022m@student.etf.rs', '13E112OO2'),
('rj203022m@student.etf.rs', '13E112ORT2'),
('rj203022m@student.etf.rs', '13E112RM1'),
('dj160441d@student.etf.rs', '13E113AOR1'),
('fj200155d@student.etf.rs', '13E113AOR1'),
('dj160441d@student.etf.rs', '13E113BP1'),
('ka203075m@student.etf.rs', '13E113BP1'),
('rj203022m@student.etf.rs', '13E113PIA'),
('fj200155d@student.etf.rs', '13E114IP'),
('ka203075m@student.etf.rs', '13E114IP'),
('pu203027m@student.etf.rs', '13E114IP'),
('fj200155d@student.etf.rs', '13E114IS'),
('pu160186d@student.etf.rs', '13E114IS'),
('fj200155d@student.etf.rs', '13E114PP1'),
('pu203027m@student.etf.rs', '13E114PRS'),
('rm205001p@student.etf.rs', '13E114PRS'),
('fj200155d@student.etf.rs', '13E114RM2'),
('ka203075m@student.etf.rs', '13M111OPJ'),
('pu203027m@student.etf.rs', '13M111OPJ'),
('ka203075m@student.etf.rs', '13M111PSZ'),
('pu203027m@student.etf.rs', '13M111PSZ'),
('pu203027m@student.etf.rs', '13M111SON'),
('rj203022m@student.etf.rs', '13M111SON');

-- --------------------------------------------------------

--
-- Table structure for table `predmet`
--

DROP TABLE IF EXISTS `predmet`;
CREATE TABLE IF NOT EXISTS `predmet` (
  `sifra` varchar(15) COLLATE utf8_bin NOT NULL,
  `naziv` varchar(50) COLLATE utf8_bin NOT NULL,
  `fond` varchar(10) COLLATE utf8_bin NOT NULL,
  `espb` int(11) NOT NULL,
  `cilj_predmeta` varchar(350) COLLATE utf8_bin NOT NULL,
  `ishod_predmeta` varchar(350) COLLATE utf8_bin NOT NULL,
  `komentar` varchar(250) COLLATE utf8_bin NOT NULL,
  `aktivan` tinyint(4) NOT NULL COMMENT '1-Aktivan 0-Neaktivan',
  `tip_predmeta` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`sifra`),
  KEY `tip` (`tip_predmeta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `predmet`
--

INSERT INTO `predmet` (`sifra`, `naziv`, `fond`, `espb`, `cilj_predmeta`, `ishod_predmeta`, `komentar`, `aktivan`, `tip_predmeta`) VALUES
('13E111ORT', 'Osnove racunarske tehnike', '3+2', 6, 'Upoznavanje sa Bulovom algebrom, prekidackim funkcijama, kombinacionim i sekvencijalnim prekidackim mrezama, logickim i memorijskim elementima, standardnim kombinacionim i sekcencijalnim modulima i njihovim korscenjem kod logickog projektovanja digitalnih uredjaja i racunara.', 'Po zavrsetku kursa studenti ce biti sposobni da razumeju strukturu prekidackih mreza, obavljaju analizu i sintezu kombinacionih i sekvencijalnih mreza, koriste kombinacione i sekvencijalne module i izvrse logicko projektovanje delova racunara manje slozenosti.', 'Sastoji se iz predavanja i vezbi. Polaze se preko kolokvijuma koji nosi 45 poena i ispita koji nosi 55 poena, nakon cega se formira konacna ocena.', 1, 'obavezni'),
('13E111PKR', 'Praktikum iz koriscenja racunara', '1', 2, 'Upoznavanje studenata sa osnovnim elementima personalnih racunara sa aspekta korisnika, kao i upucivanje u korscenje operativnog sistema za personalne racunare Microsoft Windows, Interneta i njegovih osnovnih usluga, softverskog paketa Microsoft Office. ', 'Nakon zavrsenog kursa student je osposobljen da realizuje i formatira osnovne tipove dokumenata, kao sto su tekstualni, tabelarna izracunavanja, vizuelne prezentacije. Takodje, studenti ce biti osposobljeni da na efikasan nacin koriste osnovne servise Interneta.', 'Predmet se sastoji iz predavanja i laboratorijskih vezbi. Polaze se preko prakticne nastave koja nosi 30 poena i ispita koji nosi 70 poena, nakon cega se formira konacna ocena.', 1, 'izborni'),
('13E112OO1', 'Objektno-orjentisano programiranje 1', '2+2+1', 6, 'Razumevanje i ovladavanje osnovnim principima objektno-orijentisanog programiranja, kao sto su apstrakcija, kapsulacija, nasledjivanje i polimorfizam. Razumevanje koncepata izuzetaka i sablona. Sticanje vestine objektno-orijentisanog programiranja na jeziku C++.', 'Po uspesno savladanom predmetu, studenti ce biti osposobljeni da interpretiraju i primenjuju paradigmu objektno-orijentisanog programiranja, demonstriraju principe ovog programiranja na jeziku C++ i resavaju prakticne probleme.', 'Sastoji se iz predavanja, auditornih vezbi i pokaznih i kontrolnih laboratorijskih vezbi. Polaze se preko prakticne nastave od 20 poena, kolokvijuma 40 poena i ispita od 40 poena.', 1, 'obavezni'),
('13E112OO2', 'Objektno-orjentisano programiranje 2', '2+2+1', 6, 'Razumevanje i ovladavanje naprednim konceptima objektno-orijentisanog programiranja, kao i osnovnim konceptima konkurentnog i dogadjajima vodjenog programiranja, uz njihovu primenu na jezicima Java i C#. Ovladavanje elementima programiranja visenitnih aplikacija sa grafickim korisnickim interfejsom.', 'Student poznaje napredne koncepte OO programiranja i osnovne koncepte konkurentnog i dogadjajima vodjenog programiranja. Student je sposoban da razvija objektno-orijentisane visenitne aplikacije sa grafickim korisnickim interfejsom na jeziku Java. Student poznaje elemente visejezicke .NET platforme i jezika C#.', 'Predmet se sastoji iz predavanja,auditornih i laboratorijskih vezbi. Polaze se preko prakticne nastave koja nosi 20 poena, kolokvijuma 40 poena i ispita 40 poena, nakon cega se formira ocena.', 1, 'izborni'),
('13E112ORT2', 'Osnove racunarske tehnike 2', '2+2+1', 6, 'Upoznavanje sa postupcima projektovanja digitalnih sistema, strukturom racunara, i elementima arhitekture i organizacije procesora.', 'Po zavrsetku kursa studenti ce biti sposobni da razumeju postupak projektovanja digitalnih sistema, strukturu racunara, elemente arhitekture i organizacije racunara.', 'Sastoji se iz predavanja, auditornih i laboratorijskih vezbi. Polaze se preko prakticne nastave koja nosi 20 poena, kolokvijuma 50 poena i ispita 30 poena.', 1, 'obavezni'),
('13E112RM1', 'Racunarske mreze 1', '2+2+1', 6, 'Upoznavanje studenata sa osnovnim konceptima savremenih racunarskih mreza i komunikacionih protokola.', 'Predmet nudi siroku predstavu racunarskih mreza uopste, bazirano na komunikacionim protokolima na razlicitim nivoima (od nizeg ka visem). Savladavanjem znanja iz ovog predmeta, studenti dobijaju jasnu sliku funkcionisanja racunarskih mreza od fizickog do aplikativnog nivoa.', 'Predmet se sastoji iz predavanja, auditornih i laboratorijskih vezbi. Polaze se preko prakticne nastave koja nosi 10 poena,kolokvijuma 60 poena i ispita 10 poena, nakon cega se formira ocena.', 1, 'obavezni'),
('13E113AOR1', 'Arhitektura racunara 1', '2+2+1', 6, 'Upoznavanje sa konceptima hijerarhijskog memorijskog sistema, RISC arhitekturom i pipeline organizacijom.', 'Po zavrsetku kursa studenti ce biti sposobni da razumeju strukturu i funkcionisanje hijerarhijskog memorijskog sistema, razumeju RISC arhitekturu i osnovne koncepte pipeline organizacije, koriste literaturu radi daljeg izucavanja ovih oblasti.', 'Sastoji se iz predavanja, auditornih i laboratorijskih vezbi. Polaze se preko prakticne nastave koja nosi 20 poena, kolokvijuma od 50 i ispita od 30 poena, nakon cega se formira ocena.', 1, 'obavezni'),
('13E113BP1', 'Baze podataka 1', '2+2+1', 6, 'Upoznavanje studenata sa osnovnim pojmovima i principima Sistema za Upravljanje Bazama Podataka,upoznavanje sa osnovnim konceptima projektovanja baza podataka,osposobljavanje studenata za dizajn i implementaciju konkretne baze podataka i koriscenje komercijalnih sistema za upravljanje bazama podataka.', 'Osposobljenost studenata za dizajn i implementaciju konkretne baze podataka i koriscenje komercijalnih sistema za upravljanje bazama podataka.', 'Sastoji se iz predavanja, auditornih i laboratorijskih vezbi.Polaze se preko prakticne nastave koja nosi 10 poena,kolokvijuma od 20 poena, seminara od 10 poena i ispita od 60 poena, nakon cega se formira ocena.', 1, 'obavezni'),
('13E113PIA', 'Programiranje internet aplikacija', '2+2+1', 6, 'Upoznavanje studenata sa osnovnim pojmovima razvoja viseslojnih Internet aplikacija baziranih na programskom jeziku Java (Java servlets, JSP, JSF framework). Primena najsavremenijih tehnologija za dizajn i implementaciju komercijalnih Internet aplikacija.', 'Studenti ce biti osposobljeni da projektuju i razviju viseslojne Internet aplikacije potrebne slozenosti koristeci najefikasnije metode i tehnologije. Kroz sadrzaj kursa upoznace se i sa vrstama Internet aplikacija, kao i sa osnovama Veb dizajna.', 'Sastoji se iz predavanja, vezbi i prezentacija. Polaze se preko kolokvijuma koji nosi 40 poena, projekta koji nosi 30 poena i ispita koji nosi 30 poena, nakon cega se formira ocena.', 1, 'izborni'),
('13E114IP', 'Internet programiranje', '2+2+1', 6, 'Cilj nastave je osposobljavanje studenata da projektuju i pisu savremene Internet aplikacije koristeci osnovne elemente programskog jezika PHP. Realizacija Web stranica pomocu jezika HTML i JavaScript, uz koriscenje naprednih tehnika.', 'Studenti ce biti osposobljeni da uz pomoc savremenog razvojnog okruzenja razviju komercijalne Internet aplikacije zasnovane na PHP jeziku, naprave troslojnu aplikaciju i postave je na Internet.', 'Predmet se sastoji iz predavanja i auditornih vezbi. Polaze se preko ispita i kolokvijuma koji nose 30 poena i projekta koji nosi 40 poena, nakon cega se formira konacna ocena.', 1, 'izborni'),
('13E114IS', 'Inteligentni sistemi', '2+2+1', 6, 'Upoznavanje studenata sa osnovnim konceptima i tehnikama vestacke inteligencije i ekspertskih sistema. Tokom kursa studenti ce izucavati najpopularnije modele implementacije ovakvih vrsta aplikacija.', 'Studenti ce biti osposobljeni da prepoznaju problem koji pripada oblasti vestacke inteligencije i ekspertskih sistema i da na osnovu svog znanja primene najpodesniju i najefikasniju metodu za njegovo resavanje.', 'Sastoji se od predavanja, auditornih i simulatornih lab. vezbi. Polaze se preko kolokvijuma i ispita koji nose po 40 poena i projekta koji nosi 20 poena.', 1, 'izborni'),
('13E114PP1', 'Programski prevodioci 1', '2+2+1', 6, 'Cilj predmeta je upoznavanje studenata sa osnovnim pojmovima teorije formalnih jezika, sa osnovnim tehnikama konstrukcije jezickih procesora, kompajlera i interpretatora i osposobljavanje studenata za upotrebu standardnih alata za konstrukciju jezickih procesora i kompajlera.', 'Ocekuje se da student po zavrsetku kursa bude u stanju da demonstrira razumevanje, kriticku analizu i primenu vazecih teorija, modela i tehnika iz oblasti konstrukcije programskih prevodilaca,da bude u stanju da na formalan nacin opise sintaksu jezika i primenom standarnih alata konstruise jednostavnije jezicke procesore i translatore.', 'Sastoji se iz predavanja, auditornih i lab. vezbi. Polaze se preko projekta koji nosi 40 poena i ispita koji nosi 60 poena, nakon cega se formira konacna ocena.', 1, 'obavezni'),
('13E114PRS', 'Performanse racunarskih sistema', '2+2+1', 6, 'Ucenje osnovnih koncepata analize racunarskih performansi i oblasti njihove primene. Prikaz pojednostavljenih modela komponenata racunarskog sistema (procesori, memorije, diskovi). Osposobljavanje studenata za modeliranje i analizu racunarskih sistema i mreza pomocu stohastickih metoda i analize srednjih vrednosti (MVA).', 'Studenti ce biti u stanju da odaberu odgovarajucu tehniku modeliranja u zavisnosti od karakteristika racunarske komponente ili sistema, postave apstraktan model, navedu pretpostavke i aproksimacije za konkretan model, izracunaju indikatore performansi sistema na osnovu datih parametara, kriticki diskutuju dobijene numericke pokazatelje performansi.', 'Sastoji se iz predavanja i auditornih vezbi i samostalnog rada studenata. Polaze se preko projekta koji nosi 30 poena i ispita koji nosi 70 poena.', 1, 'obavezni'),
('13E114RM2', 'Racunarske mreze 2', '2+2+1', 6, 'Upoznavanje studenata sa arhitekturom i mehanizmima funkcionisanja Interneta, te naprednim konceptima, protokolima i algoritmima funkcionisanja nekih kljucnih Internet servisa i savremenih racunarskih mreza.', 'Nakon ovog kursa studenti ce u potpunosti razumeti arhitekturu Interneta i modernih mehanizama prosledjivanja paketa. Bice sposobni da samostalno odrede politiku rutiranja i da je implementiraju na realnim mreznim uredjajima.Kroz ucenje o mehanizmima upravljanja uredjajima biće u stanju da dizajniraju efikasne servise.', 'Sastoji se iz predavanja, auditornih i lab. vezbi. Polaze se preko prakticne nastave koja nosi 10 poena,kolokvijuma 60 poena i ispita od 30 poena, nakon cega se formira konacna ocena.', 1, 'obavezni'),
('13M111OPJ', 'Obrada prirodnih jezika', '2+2+1', 6, 'Upoznavanje studenata sa osnovnim konceptima i tehnikama statisticke obrade prirodnih jezika. Razmatranje cesto koriscenih modela masinskog ucenja i njihovo poređenje. Prikaz nekih od glavnih morfoloskih, sintaksnih i semantickih problema iz racunarske obrade prirodnih jezika.', 'Studenti ce biti osposobljeni da analiziraju probleme iz domena obrade prirodnih jezika i primenjuju statisticke modele u njihovom resavanju.', 'Predmet se sastoji iz predavanja i laboratorijskih vezbi. Polaze se preko projekta koji nosi 70 poena i ispita koji nosi 30 poena, nakon cega se formira konacna ocena.', 1, 'izborni'),
('13M111PSZ', 'Pronalazenje skrivenog znanja', '2+2', 6, 'Cilj predmeta je upoznavanje studenata sa najpopularnijim modelima masinskog ucenja i metodologijom njihovog pravilnog koriscenja i evaluacije.', 'Ocekuje se da student po uspesnom zavrsetku kursa bude u stanju da demonstrira razumevanje problema koji se resava, primeni algoritme i tehnike masinskog ucenja i definise sopstvene modele resavanja problema i stekne osecaj za istrazivanje, analizu i obradu podataka.', 'Predmet se sastoji iz predavnaja i vezbi. Polaze se preko prakticne nastavne koja nosi 40 poena, projekta koji nosi 20 poena i ispita koji nosi 40 poena.', 1, 'izborni'),
('13M111SON', 'Sistemi otporni na otkaze', '2+2', 6, 'Ucenje hardverskih i softverskih mehanizama i tehnika smanjenja osetljivosti na otkaze i osposobljavanje studenata da modeliraju, projektuju i vrednuju takve sisteme.', 'Ovladavanje metodologijom i tehnikama modeliranja, projektovanja i vrednovanja sistema sa smanjenom osetljivoscu na otkaze.', 'Sastoji se od predavanja i vezbi. Polaze se preko projekta koji nosi 40 poena, kolokvijuma od 20 i ispita od 40 poena, nakon cega se formira ocena.', 1, 'obavezni');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `email` varchar(32) COLLATE utf8_bin NOT NULL,
  `indeks` varchar(10) COLLATE utf8_bin NOT NULL,
  `tipstudija` varchar(1) COLLATE utf8_bin NOT NULL COMMENT 'd-Osnovne studije m-Master studije p-Doktorske studije',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email`, `indeks`, `tipstudija`) VALUES
('dj160441d@student.etf.rs', '2016/0441', 'd'),
('fj200155d@student.etf.rs', '2020/0155', 'd'),
('ka203075m@student.etf.rs', '2020/3075', 'm'),
('pu160186d@student.etf.rs', '2016/0186', 'd'),
('pu203027m@student.etf.rs', '2020/3027', 'm'),
('rj203022m@student.etf.rs', '2020/3022', 'm'),
('rm205001p@student.etf.rs', '2020/5001', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `tip_materijala`
--

DROP TABLE IF EXISTS `tip_materijala`;
CREATE TABLE IF NOT EXISTS `tip_materijala` (
  `naziv_tipa` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`naziv_tipa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tip_materijala`
--

INSERT INTO `tip_materijala` (`naziv_tipa`) VALUES
('Domaci zadaci'),
('Ispitna pitanja'),
('Laboratorijske vezbe'),
('Predavanja'),
('Projekti'),
('Vezbe');

-- --------------------------------------------------------

--
-- Table structure for table `tip_predmeta`
--

DROP TABLE IF EXISTS `tip_predmeta`;
CREATE TABLE IF NOT EXISTS `tip_predmeta` (
  `naziv_tipa` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`naziv_tipa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tip_predmeta`
--

INSERT INTO `tip_predmeta` (`naziv_tipa`) VALUES
('izborni'),
('obavezni');

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

DROP TABLE IF EXISTS `zaposleni`;
CREATE TABLE IF NOT EXISTS `zaposleni` (
  `email` varchar(32) COLLATE utf8_bin NOT NULL,
  `id_zaposleni` int(11) NOT NULL AUTO_INCREMENT,
  `adresa` varchar(32) COLLATE utf8_bin NOT NULL,
  `mobilni` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `licniweb` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `biografija` varchar(350) COLLATE utf8_bin DEFAULT NULL,
  `zvanje` varchar(32) COLLATE utf8_bin NOT NULL,
  `kabinet` varchar(20) COLLATE utf8_bin NOT NULL,
  `profilna_slika` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `id_zaposleni` (`id_zaposleni`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`email`, `id_zaposleni`, `adresa`, `mobilni`, `licniweb`, `biografija`, `zvanje`, `kabinet`, `profilna_slika`) VALUES
('adrianm@etf.bg.ac.rs', 19, 'Bulevar kralja Aleksandra 73', '', '', '', 'saradnik u nastavi', 'Lola 500', 'Slike/avatar_musko.png'),
('cd160197d@student.etf.rs', 6, 'Bulevar kralja Aleksandra 73', '068 7777 777', NULL, 'Student cetvrte godine smera RTI.', 'laboratorijski tehnicar', 'Lola 550', 'Slike/avatar_musko.png'),
('drazen.draskovic@etf.bg.ac.rs', 1, 'Bulevar kralja Aleksandra 73', '068 8888 888', 'https://www.etf.bg.ac.rs/en/faculty/staff/drazen-draskovic-4502#gsc.tab=0', 'Zavrsio je Elektrotehnicki fakultet u Beogradu. Nakon toga se zaposlio na njemu prvo kao asistent, a kasnije i kao profesor. Angazovan je na vise predmeta, a pored toga je i napisao dosta radova. ', 'docent', '37A', 'Slike/drazen.png'),
('jelica@etf.bg.ac.rs', 2, 'Bulevar kralja Aleksandra 73', NULL, NULL, 'Zavrsila je Elektrotehnicki fakultet u Beogradu, nakon cega se i zaposlila a fakultetu. Zavrsila je master studije i stekla zvanje asistenta. Angazovana je na dosta predmeta na katedri RTI.', 'asistent', '37A', 'Slike/jelica.png'),
('jovo.perovic@etf.bg.ac.rs', 28, 'Bulevar kralja Aleksandra 73', '', '', 'Zavrsio je ETF 2020. godine, nakon cega se zaposlio kao saradnik u nastavi.   ', 'saradnik u nastavi', 'Lola 800', 'Slike/avatar_musko.png'),
('micko@etf.bg.ac.rs', 3, 'Bulevar kralja Aleksandra 73', '069 9999 999', NULL, 'Zavrsio je Elektrotehnicki fakultet u Beogradu, nakon cega je zavrsio i master studije. Angazovan je na fakultetu kao asistent na vise predmeta na katedri za RTI, pored cega je izdao i par radova.', 'asistent', 'Lola 909', 'Slike/avatar_musko.png'),
('nbosko@etf.bg.ac.rs', 4, 'Bulevar kralja Aleksandra 73', NULL, NULL, 'Zavrsio je Elektrotehnicki fakultet u Beogradu, nakon cega je zavrsio master i doktorske studije. Zaposlen je na fakultetu kao profesor na vise predmeta, pored cega je izdao i dosta radova.', 'redovni profesor', 'RC-ETF, I sprat', 'Slike/bosko.png'),
('sanjad@etf.bg.ac.rs', 11, 'Bulevar kralja Aleksandra 73', '065 5555 555', '', 'Zavrsila ETF, od tada radi kao asistent.   ', 'asistent', 'Paviljon 25', 'Slike/sanja.png'),
('ziza@etf.bg.ac.rs', 5, 'Bulevar kralja Aleksandra 73', NULL, NULL, 'Zavrsio je Elektrotehnicki fakultet u Beogradu, nakon cega je zavrsio i master studije. Proglasen je za najboljeg studenta u generaciji. Angazovan je na vise predmeta kao asistent na katedri za RTI.', 'asistent', 'Paviljon P-23', 'Slike/avatar_musko.png');

-- --------------------------------------------------------

--
-- Table structure for table `zaprati`
--

DROP TABLE IF EXISTS `zaprati`;
CREATE TABLE IF NOT EXISTS `zaprati` (
  `sifra_predmet` varchar(32) COLLATE utf8_bin NOT NULL,
  `id_student` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`sifra_predmet`,`id_student`),
  KEY `emailstud` (`id_student`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `zaprati`
--

INSERT INTO `zaprati` (`sifra_predmet`, `id_student`) VALUES
('13E111ORT', 'pu203027m@student.etf.rs'),
('13E114IP', 'pu203027m@student.etf.rs'),
('13E114PRS', 'pu203027m@student.etf.rs'),
('13M111OPJ', 'pu203027m@student.etf.rs');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `korisnikveza2` FOREIGN KEY (`email`) REFERENCES `korisnik` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drzi_predmet`
--
ALTER TABLE `drzi_predmet`
  ADD CONSTRAINT `nastavnik2` FOREIGN KEY (`id_nastavnik`) REFERENCES `zaposleni` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `predmetsifra` FOREIGN KEY (`sifra_predmet`) REFERENCES `predmet` (`sifra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fajl_uz_obavestenje`
--
ALTER TABLE `fajl_uz_obavestenje`
  ADD CONSTRAINT `obavestenje` FOREIGN KEY (`id_obav`) REFERENCES `obavestenje_predmet` (`id_obav`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materijal`
--
ALTER TABLE `materijal`
  ADD CONSTRAINT `materijali` FOREIGN KEY (`tip_materijala`) REFERENCES `tip_materijala` (`naziv_tipa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nastavnik1` FOREIGN KEY (`id_nastavnik`) REFERENCES `zaposleni` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sifrapredmet` FOREIGN KEY (`sifra_predmet`) REFERENCES `predmet` (`sifra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nastavni_plan`
--
ALTER TABLE `nastavni_plan`
  ADD CONSTRAINT `idodsek` FOREIGN KEY (`id_odsek`) REFERENCES `odsek` (`id_odsek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sifrapredmeta1` FOREIGN KEY (`sifra_predmet`) REFERENCES `predmet` (`sifra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obavestenje_predmet`
--
ALTER TABLE `obavestenje_predmet`
  ADD CONSTRAINT `nastavnik` FOREIGN KEY (`id_nastavnik`) REFERENCES `zaposleni` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `predmet` FOREIGN KEY (`id_predmet`) REFERENCES `predmet` (`sifra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obavestenje_sajt`
--
ALTER TABLE `obavestenje_sajt`
  ADD CONSTRAINT `autor` FOREIGN KEY (`autor`) REFERENCES `administrator` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategorija` FOREIGN KEY (`id_kat`) REFERENCES `kategorija_obav` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `odsek`
--
ALTER TABLE `odsek`
  ADD CONSTRAINT `sef` FOREIGN KEY (`sef_odseka`) REFERENCES `zaposleni` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prati_predmet`
--
ALTER TABLE `prati_predmet`
  ADD CONSTRAINT `idstudenta` FOREIGN KEY (`id_student`) REFERENCES `student` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `predmetasifra1` FOREIGN KEY (`sifra_predmet`) REFERENCES `predmet` (`sifra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `predmet`
--
ALTER TABLE `predmet`
  ADD CONSTRAINT `tip` FOREIGN KEY (`tip_predmeta`) REFERENCES `tip_predmeta` (`naziv_tipa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `korisnikveza` FOREIGN KEY (`email`) REFERENCES `korisnik` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD CONSTRAINT `korisnikveza1` FOREIGN KEY (`email`) REFERENCES `korisnik` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zaprati`
--
ALTER TABLE `zaprati`
  ADD CONSTRAINT `emailstud` FOREIGN KEY (`id_student`) REFERENCES `prati_predmet` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sifrica` FOREIGN KEY (`sifra_predmet`) REFERENCES `predmet` (`sifra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentemail` FOREIGN KEY (`id_student`) REFERENCES `student` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
