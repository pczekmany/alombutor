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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci;

INSERT INTO alombutor_galeriakepek VALUES("1","1","reka_sarok.jpg","0","konyhapult","");
INSERT INTO alombutor_galeriakepek VALUES("2","2","blokk_adam.jpg","","","");



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

INSERT INTO alombutor_regisztralt VALUES("0","pczekmany","","0724739e4f7811dd09648d9b205c7d3d","pczekmany@gmail.com","","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","","","","","","","");
INSERT INTO alombutor_regisztralt VALUES("1","bmbtamas","Bombicz Tamás","825389c33a252ee237134596cbc77a77","bombiczt@gmail.com","","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","","","","","","","");
INSERT INTO alombutor_regisztralt VALUES("2","alombutor","Alombutor","5E7FBEF73C650794755C52000E254CEA","info@turulcafe.com","","1","0","2014-01-27 00:00:00","0000-00-00 00:00:00","","","","","","","");
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
  `leiras` text COLLATE utf8_hungarian_ci,
  `aktiv` varchar(1) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `akcios` varchar(1) COLLATE utf8_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`sorszam`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

INSERT INTO alombutor_termekek VALUES("1","Réka","1","fa","fehér","konyhapult","113900","200/72cm-es blokk, alu keretes, munkalappal, mosogatóval

A képen egyedi sarok verzióba látható.","1","1");
INSERT INTO alombutor_termekek VALUES("2","Ádám","1","","","","73200","Ádám konyha blokk, MDF,  160/60cm-es, munkalappal, mosogatóval

200/60cm-es: 83.000.-Ft","1","1");
INSERT INTO alombutor_termekek VALUES("3","Jutka szék","3","fa","","szék","18000","","0","0");
INSERT INTO alombutor_termekek VALUES("5","próba2","11","","","","0","","0","0");



DROP TABLE turul_galeriacsop;

CREATE TABLE `turul_galeriacsop` (
  `sorszam` int(11) NOT NULL DEFAULT '0',
  `felirat_hu` varchar(50) COLLATE latin2_hungarian_ci DEFAULT NULL,
  `sorrendszam` int(2) DEFAULT NULL,
  `csoporttagja` int(11) DEFAULT NULL,
  PRIMARY KEY (`sorszam`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci;

INSERT INTO turul_galeriacsop VALUES("1","Házak","1","0");
INSERT INTO turul_galeriacsop VALUES("2","Lakások","2","0");
INSERT INTO turul_galeriacsop VALUES("3","Társasházak","3","0");
INSERT INTO turul_galeriacsop VALUES("4","Irodák","4","2");



DROP TABLE turul_galeriakepek;

CREATE TABLE `turul_galeriakepek` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `sorszam` int(10) unsigned NOT NULL DEFAULT '0',
  `fajlnev_nagy` text COLLATE latin2_hungarian_ci,
  `kepszam` int(10) DEFAULT NULL,
  `felirat_hu` varchar(60) COLLATE latin2_hungarian_ci DEFAULT NULL,
  `csoport` varchar(50) COLLATE latin2_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `hirdetes_sorszam` (`kepszam`)
) ENGINE=MyISAM AUTO_INCREMENT=332 DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci;

INSERT INTO turul_galeriakepek VALUES("1","1","Haz_1.jpg","1","kecskédi családi viskó","1");
INSERT INTO turul_galeriakepek VALUES("2","2","Haz_2.jpg","2","Barossközi házzzz","1");
INSERT INTO turul_galeriakepek VALUES("3","3","Haz_3.jpg","3","Tatai ház valahol","1");
INSERT INTO turul_galeriakepek VALUES("4","4","Haz_4.jpg","4","","1");
INSERT INTO turul_galeriakepek VALUES("5","5","Haz_5.jpg","5","","1");
INSERT INTO turul_galeriakepek VALUES("6","6","Haz_6.jpg","6","","1");
INSERT INTO turul_galeriakepek VALUES("7","7","Haz_7.jpg","7","","1");
INSERT INTO turul_galeriakepek VALUES("8","8","Haz_8.jpg","8","","1");
INSERT INTO turul_galeriakepek VALUES("9","9","Haz_9.jpg","9","","1");
INSERT INTO turul_galeriakepek VALUES("10","10","Lakas_1.jpg","1","","2");
INSERT INTO turul_galeriakepek VALUES("11","11","Lakas_2.jpg","2","","2");
INSERT INTO turul_galeriakepek VALUES("12","12","Lakas_3.jpg","1","","4");
INSERT INTO turul_galeriakepek VALUES("168","157","022.jpg","20","","7");
INSERT INTO turul_galeriakepek VALUES("320","158","DSC_3684lr.jpg","1","","8");
INSERT INTO turul_galeriakepek VALUES("321","170","DSC_3685lr.jpg","22","","8");
INSERT INTO turul_galeriakepek VALUES("322","171","DSC_3689lr.jpg","23","","8");
INSERT INTO turul_galeriakepek VALUES("323","172","DSC_3692lr.jpg","24","","8");
INSERT INTO turul_galeriakepek VALUES("324","173","DSC_3697lr.jpg","25","","8");
INSERT INTO turul_galeriakepek VALUES("325","174","DSC_3700lr.jpg","26","","8");
INSERT INTO turul_galeriakepek VALUES("326","175","IMG_8733_11lr.jpg","1","","9");
INSERT INTO turul_galeriakepek VALUES("327","176","DSC_3723lr.jpg","2","","9");
INSERT INTO turul_galeriakepek VALUES("328","177","DSC_3683lr.jpg","3","","9");
INSERT INTO turul_galeriakepek VALUES("329","178","IMG_8802_11lr.jpg","20","","7");
INSERT INTO turul_galeriakepek VALUES("330","179","IMG_8829_11lr.jpg","23","","7");
INSERT INTO turul_galeriakepek VALUES("331","180","180.jpg","1","március","3");



DROP TABLE turul_regisztralt;

CREATE TABLE `turul_regisztralt` (
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

INSERT INTO turul_regisztralt VALUES("0","pczekmany","","0724739e4f7811dd09648d9b205c7d3d","pczekmany@gmail.com","","1","0","","","","","","","","","");
INSERT INTO turul_regisztralt VALUES("1","bmbtamas","Bombicz Tamás","825389c33a252ee237134596cbc77a77","bombiczt@gmail.com","","0","0","","","","","","","","","");
INSERT INTO turul_regisztralt VALUES("2","turulcafe","Turulcafe","0525b35b50a662fdf908062a1c7ddcfe","info@turulcafe.com","","1","0","2014-01-27 00:00:00","","","","","","","","");
INSERT INTO turul_regisztralt VALUES("3","AdminZoli","Molnár Zoltán","e20ffabe4230eed6ba92c6ee9d9618e4","info@inkozrt.hu","1","1","0","0000-00-00 00:00:00","0000-00-00 00:00:00","","","","","","","");



