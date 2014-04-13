DROP TABLE alombutor_galeriacsop;

CREATE TABLE `alombutor_galeriacsop` (
  `sorszam` int(11) NOT NULL DEFAULT '0',
  `felirat_hu` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci DEFAULT NULL,
  `sorrendszam` int(2) DEFAULT NULL,
  `csoporttagja` int(11) DEFAULT NULL,
  `termekar` int(11) DEFAULT NULL,
  `anyag` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci DEFAULT NULL,
  `szinek` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci DEFAULT NULL,
  `elemek` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`sorszam`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci;

INSERT INTO alombutor_galeriacsop VALUES("1","Konyhák","1","0","0","","","");
INSERT INTO alombutor_galeriacsop VALUES("2","Tálalók","2","0","0","","","");
INSERT INTO alombutor_galeriacsop VALUES("3","Étkezők","3","0","0","","","");
INSERT INTO alombutor_galeriacsop VALUES("4","Nappali elemes bútorok","4","0","0","","","");
INSERT INTO alombutor_galeriacsop VALUES("5","Szekrénysorok","5","0","0","","","");
INSERT INTO alombutor_galeriacsop VALUES("6","Gardróbok","6","0","0","","","");
INSERT INTO alombutor_galeriacsop VALUES("7","Kanapék","7","0","0","","","");
INSERT INTO alombutor_galeriacsop VALUES("8","Ülőgarnitúrák","8","0","0","","","");
INSERT INTO alombutor_galeriacsop VALUES("9","Sarok ülőgarnitúrák","9","0","0","","","");
INSERT INTO alombutor_galeriacsop VALUES("10","Hálószoba garnitúrák","10","0","0","","","");
INSERT INTO alombutor_galeriacsop VALUES("11","Design Ágykeretek","11","0","0","","","");



DROP TABLE alombutor_galeriakepek;

CREATE TABLE `alombutor_galeriakepek` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `sorszam` int(10) unsigned NOT NULL DEFAULT '0',
  `fajlnev_nagy` text COLLATE latin2_hungarian_ci,
  `kepszam` int(10) DEFAULT NULL,
  `felirat_hu` varchar(60) COLLATE latin2_hungarian_ci DEFAULT NULL,
  `csoport` varchar(50) COLLATE latin2_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `hirdetes_sorszam` (`kepszam`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci;

INSERT INTO alombutor_galeriakepek VALUES("1","1","ujtermek_kep.jpg","","konyhapult","");



DROP TABLE alombutor_regisztralt;

CREATE TABLE `alombutor_regisztralt` (
  `sorszam` int(11) NOT NULL,
  `azonosito` varchar(20) COLLATE latin2_hungarian_ci NOT NULL,
  `nev` varchar(50) COLLATE latin2_hungarian_ci DEFAULT NULL,
  `jelszo` varchar(32) COLLATE latin2_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE latin2_hungarian_ci DEFAULT NULL,
  `hirlevel` varchar(10) COLLATE latin2_hungarian_ci DEFAULT NULL,
  `jog` varchar(1) COLLATE latin2_hungarian_ci NOT NULL DEFAULT '0',
  `archiv` varchar(1) COLLATE latin2_hungarian_ci NOT NULL DEFAULT '0',
  `regisztracio` datetime DEFAULT NULL,
  `bejelentkezes` datetime DEFAULT NULL,
  `megjegyzes` text COLLATE latin2_hungarian_ci,
  `keresztnev` varchar(40) COLLATE latin2_hungarian_ci DEFAULT NULL,
  `vezeteknev` varchar(40) COLLATE latin2_hungarian_ci DEFAULT NULL,
  `telefon` varchar(20) COLLATE latin2_hungarian_ci DEFAULT NULL,
  `telepules` varchar(50) COLLATE latin2_hungarian_ci DEFAULT NULL,
  `cim` varchar(80) COLLATE latin2_hungarian_ci DEFAULT NULL,
  `emailx` varchar(20) COLLATE latin2_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`sorszam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci;

INSERT INTO alombutor_regisztralt VALUES("0","pczekmany","","0724739e4f7811dd09648d9b205c7d3d","pczekmany@gmail.com","","1","0","","","","","","","","","");
INSERT INTO alombutor_regisztralt VALUES("1","bmbtamas","Bombicz Tamás","825389c33a252ee237134596cbc77a77","bombiczt@gmail.com","","1","0","","","","","","","","","");
INSERT INTO alombutor_regisztralt VALUES("2","alombutor","Alombutor","5E7FBEF73C650794755C52000E254CEA","info@turulcafe.com","","1","0","2014-01-27 00:00:00","","","","","","","","");
INSERT INTO alombutor_regisztralt VALUES("3","AdminZoli","Molnár Zoltán","e20ffabe4230eed6ba92c6ee9d9618e4","info@inkozrt.hu","1","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","","","","","","","");



DROP TABLE alombutor_termekek;

CREATE TABLE `alombutor_termekek` (
  `sorszam` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `csoport` int(11) DEFAULT NULL,
  `anyag` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `szin` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `elem` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `ar` int(11) DEFAULT NULL,
  PRIMARY KEY (`sorszam`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

INSERT INTO alombutor_termekek VALUES("1","Icuka","1","fa","fehér","konyhapult","990000");
INSERT INTO alombutor_termekek VALUES("2","Béla étkező","3","pozdorja","barna","asztal","40000");
INSERT INTO alombutor_termekek VALUES("3","Jutka szék","3","fa","fehér","szék","18000");



