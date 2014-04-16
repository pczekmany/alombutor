DROP TABLE alombutor_galeriacsop;

CREATE TABLE `alombutor_galeriacsop` (
  `sorszam` int(11) NOT NULL DEFAULT '0',
  `felirat_hu` varchar(100) CHARACTER SET utf8 COLLATE utf8_hungarian_ci DEFAULT NULL,
  `sorrendszam` int(2) DEFAULT NULL,
  `csoporttagja` int(11) DEFAULT NULL,
  PRIMARY KEY (`sorszam`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci;

INSERT INTO alombutor_galeriacsop VALUES("1","Konyhák","1","0");
INSERT INTO alombutor_galeriacsop VALUES("2","Tálalók","2","0");
INSERT INTO alombutor_galeriacsop VALUES("3","Étkezők","3","0");
INSERT INTO alombutor_galeriacsop VALUES("4","Nappali elemes bútorok","4","0");
INSERT INTO alombutor_galeriacsop VALUES("5","Szekrénysorok","5","0");
INSERT INTO alombutor_galeriacsop VALUES("6","Gardróbok","6","0");
INSERT INTO alombutor_galeriacsop VALUES("7","Kanapék","7","0");
INSERT INTO alombutor_galeriacsop VALUES("8","Ülőgarnitúrák","8","0");
INSERT INTO alombutor_galeriacsop VALUES("9","Sarok ülőgarnitúrák","9","0");
INSERT INTO alombutor_galeriacsop VALUES("10","Hálószoba garnitúrák","10","0");
INSERT INTO alombutor_galeriacsop VALUES("11","Design Ágykeretek","11","0");
INSERT INTO alombutor_galeriacsop VALUES("12","Ágyak, heverők, ágykeretek","12","");
INSERT INTO alombutor_galeriacsop VALUES("13","Fenyő és bükk  ágykeretek, fenyő emeletes ágyak, gardróbok, tálalók, komódok, íróasztalok","13","");
INSERT INTO alombutor_galeriacsop VALUES("14","Matracok","13","");
INSERT INTO alombutor_galeriacsop VALUES("15","Gyermek és  Ifjúsági bútorok, íróasztalok, fotelágyak, stb.","15","");
INSERT INTO alombutor_galeriacsop VALUES("16","Előszobák, cipős szekrények","16","");
INSERT INTO alombutor_galeriacsop VALUES("17","Kisbútorok, TV  állványok, komódok, polcok, fésülködő asztalok","17","");
INSERT INTO alombutor_galeriacsop VALUES("18","Dohányzó és üveg  dohányzó asztalok","18","");
INSERT INTO alombutor_galeriacsop VALUES("19","Székek, asztalok,  fotelok, relaxfotelek, puffok, hintaszékek","19","");
INSERT INTO alombutor_galeriacsop VALUES("20","Forgószékek,  bárszékek","20","");
INSERT INTO alombutor_galeriacsop VALUES("21","Fürdőszoba  bútorok","21","");
INSERT INTO alombutor_galeriacsop VALUES("22","Lengyel termékeink katalógusa","22","");



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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci;

INSERT INTO alombutor_galeriakepek VALUES("1","1","reka_sarok.jpg","","Réka sarok konyha","");
INSERT INTO alombutor_galeriakepek VALUES("2","2","trinity_kanape.jpg","0","Trinity","");
INSERT INTO alombutor_galeriakepek VALUES("3","3","xena_kanape.jpg","","Xéna kanapé","");
INSERT INTO alombutor_galeriakepek VALUES("4","4","hermina_kanape.jpg
","","Hermina kanapé","7");
INSERT INTO alombutor_galeriakepek VALUES("5","5","blokk_adam.jpg","","Ádám konyha","");
INSERT INTO alombutor_galeriakepek VALUES("6","6","blokk_velence.jpg","","Velence konyha blokk, Antikolt MDF, 200/72cm-es, munkalappal","");
INSERT INTO alombutor_galeriakepek VALUES("7","6","konyha_velence.jpg","","Velence konyha egyedi  sarok verzió ","");



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
  `leiras` varchar(300) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `szin` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `elem` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `ar` int(11) DEFAULT NULL,
  `aktiv` varchar(1) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `akcios` varchar(1) COLLATE utf8_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`sorszam`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

INSERT INTO alombutor_termekek VALUES("1","Réka konyha","1","","Réka 200/72cm-es blokk, alu keretes, munkalappal, mosogatóval.
A képen egyedi sarok verzióba látható.","","","113900","0","0");
INSERT INTO alombutor_termekek VALUES("2","Trinity kanapé","7","","Trinity kanapé, ágyazható, ágneműtartós, szivacsos 218x88x84cm, fekvőfelület. 150x183cm, fekvőmagasság: 30cm. Választható szövettel, textilbőrrel, az ár, a választott szövetkategóriától függ.","","","59500","","");
INSERT INTO alombutor_termekek VALUES("3","Xéna kanapé","7","","Xéna kanapé, kizárólag szivacsos változatban készül, 240x78x85cm, fekvőfelület:190x160cm, fekvőmagasság:30cm. Választható szövettel, textilbőrrel, az ár, a választott szövetkategóriától függ.","","","59900","1","0");
INSERT INTO alombutor_termekek VALUES("4","Hermina kanapé","7","","Hermina kanapé, kizárólag szivacsos változatban készül, 213x78x85cm, fekvőfelület:190x160cm, fekvőmagasság:30cm. Választható szövettel, textilbőrreé, az ár, a választott szövetkategóriától függ.","","","57200","","");
INSERT INTO alombutor_termekek VALUES("5","Ádám","1","","Ádám konyha blokk, MDF,  200/60cm-es, munkalappal, mosogatóval:
160/60cm-es: 73.200.-Ft","","","83000","","");
INSERT INTO alombutor_termekek VALUES("6","Velence konyha","1","","Velence konyha blokk, Antikolt MDF, 200/72cm-es, munkalappal,mosogatóval:","","","121900","1","1");
INSERT INTO alombutor_termekek VALUES("7","Porto konyha blokk","1","","Antikolt, MDF, 200/72cm-es, mosogatóval, munkalappal","","","121900","1","0");
INSERT INTO alombutor_termekek VALUES("8","Genf","1","","Genf konyha blokk, 3D lemarással, vákumfóliával borított MDF,  200/72cm-es, munkalappal, mosogatóval","","","99400","1","0");
INSERT INTO alombutor_termekek VALUES("9","Oslo","1","","Oslo 220/72cm-es konyha blokk, munkalappal, mosogatóval","","","118000","1","0");
INSERT INTO alombutor_termekek VALUES("10","Rodosz","1","","Rodosz konyha blokk ,MDF,  200/60cm-es, munkalappal, mosgatóval","","","87800","1","0");
INSERT INTO alombutor_termekek VALUES("11","Boston","1","","Boston 200/72cm-es konyha blokk, 3D lemarással, vákumfóliával borított MDF fronttal, munkalappal, mosogatóval:","","","113900","1","0");



