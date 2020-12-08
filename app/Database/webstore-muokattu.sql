--
-- Database: `webstore`
--

drop database if exists webstore;
create database webstore;
use webstore;

-- --------------------------------------------------------

--
-- Rakenne taululle `asiakas`
--

CREATE TABLE `asiakas` (
  `id` int(11) NOT NULL,
  `sukunimi` varchar(50) NOT NULL,
  `etunimi` varchar(50) NOT NULL,
  `lahiosoite` varchar(100) NOT NULL,
  `postitoimipaikka` varchar(50) NOT NULL,
  `postinumero` char(5) NOT NULL,
  `puhelin` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `asiakas`
--

INSERT INTO `asiakas` (`id`, `sukunimi`, `etunimi`, `lahiosoite`, `postitoimipaikka`, `postinumero`, `puhelin`, `email`) VALUES
(2, 'Holic', 'Shoppa', 'aaa', 'aaa', '333', '111', 'testaaja@testaa.com'),
(3, 'Manni', 'Monni', 'bbbb', 'bbbb', '4444', '555', 'boo@xn--b-1gaa.com'),
(4, 'Aina', 'Antiikka', 'ccc', 'ccc', '555', '6666', 'kkk@kkk.com'),
(5, 'Ilta', 'Rusko', 'dddd', 'dddd', '7777', '77777', 'ddd@dddd.com');

-- --------------------------------------------------------

--
-- Rakenne taululle `tilaus`
--

CREATE TABLE `tilaus` (
  `id` int(11) NOT NULL,
  `paivays` timestamp NOT NULL DEFAULT current_timestamp(),
  `asiakas_id` int(11) NOT NULL,
  `tila` enum('tilattu','toimitettu') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `tilaus`
--

INSERT INTO `tilaus` (`id`, `paivays`, `asiakas_id`, `tila`) VALUES
(2, '2020-12-05 20:00:30', 2, NULL),
(3, '2020-12-05 20:09:05', 3, NULL),
(4, '2020-12-05 20:11:54', 4, NULL),
(5, '2020-12-05 20:42:33', 5, NULL);

-- --------------------------------------------------------

--
-- Rakenne taululle `tilausrivi`
--

CREATE TABLE `tilausrivi` (
  `tilaus_id` int(11) NOT NULL,
  `tuote_id` int(11) NOT NULL,
  `maara` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `tilausrivi`
--

INSERT INTO `tilausrivi` (`tilaus_id`, `tuote_id`, `maara`) VALUES
(2, 3, NULL),
(2, 5, NULL),
(2, 4, NULL),
(2, 3, NULL),
(2, 2, NULL),
(2, 1, NULL),
(3, 4, NULL),
(3, 3, NULL),
(4, 4, NULL),
(5, 5, NULL);

-- --------------------------------------------------------

--
-- Rakenne taululle `tuote`
--

CREATE TABLE `tuote` (
  `id` int(11) NOT NULL,
  `nimi` varchar(50) NOT NULL,
  `kuvaus` text NOT NULL,
  `hinta` decimal(6,2) NOT NULL,
  `kuva` varchar(50) DEFAULT NULL,
  `kuvan_kuvaus` varchar(50) DEFAULT NULL,
  `varastomaara` smallint(5) UNSIGNED DEFAULT NULL,
  `tuoteryhma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `tuote`
--

INSERT INTO `tuote` (`id`, `nimi`, `kuvaus`, `hinta`, `kuva`, `kuvan_kuvaus`, `varastomaara`, `tuoteryhma_id`) VALUES
(1, 'Nalle Puh Ihaa', 'Masentunut aasi', '20.50', 'k1.png', 'Muki: Nalle Puh - Ihaa', 10, 1),
(2, 'Nalle Puh kuppi', 'Nalle Puh kuppi', '20.50', 'k2.png', 'Muki: Nalle Puh', 10, 1),
(3, 'Lautanen', 'Tämä on lautanen', '6680.00', NULL, NULL, 100, 2),
(4, 'Mariskooli valkoinen', 'Himmeänvalkoinen Mariskooli sopii kaikenlaisiin kattauksiin ja myös ajankohtaiseen kokovalkoiseen sisustustrendiin. Valkoinen väri on raikas ja nuorekas.', '29.00', 'marivap1.jpg', 'Mattavalkoinen Mariskooli-lasimalja', 20, 3),
(5, 'lusikka', 'Tämä on lusikka', '399.00', NULL, NULL, 5, 4),
(6, 'Kastehelmi', 'Kastehelmi-kulhosta tarjoilet tyylikkäästi niin kiisselit kuin parfaitit. Kestosuosikiksi tullut kesäisen luonnon inspiroima kastehelmiaihe kestää aikaa.', '18.00', 'kastehelmi2.jpg', 'Kastehelmi-sarjan kuppi, väritön, lasia', 44, 5),
(7, 'Kartio', 'Käsintehty n. 10cm korkea Kartio sopii kuivakukkien vaasiksi, kynäpurkiksi, tai kirjahyllyyn komeilemaan. Tämä kimallelasitettu kippo puhuttelee muotokielellään.', '13.00', 'kartio1.jpg', 'Ruskea kartionmuotoinen keramiikkakippo', 23, 6),
(8, 'Mariskooli vihreä', 'Todellinen klassikko pirteässä vihreän sävyssä. Tähän skooliin sopivat tarjolle niin joulukarkit kuin kesällä mansikat, se on aina yhtä tyylikäs.', '29.00', 'marivp1.jpg', 'Jalallinen lasimalja, vihreää lasia', 52, 3),
(9, 'Pantera', 'Tässä rouhean aito kahvimuki Pantera-tekstillä ja pääkallokuviolla. Musta painokuvio valkoisella pohjalla.', '17.00', 'kuppi1.jpg', 'Mustavalkoinen muki pääkalloaiheella ja Pantera-te', 14, 1),
(10, 'Pisara', 'Pisaranmuotoinen matala lasimalja hedelmäaiheisella kohokuvioinnilla. Hauskanmuotoinen kulho sopii niin jälkiruokien, kuin kasvis- tai hedelmäviipaleiden tarjoiluun.', '25.00', 'paaryna1.jpg', 'Pisaranmuotoinen lasimalja, väritön, lasia, hedelm', 19, 5),
(11, 'Sundae', 'Jäätelö maistuu erityisen hyvältä jalallisesta jälkiruokamaljasta lusikoituna. Sundae ilahduttaa lapsivieraita, ja sopii juhlaviinkin kattauksiin.', '17.00', 'jalallinenkorkea1.jpg', 'Jalallinen jälkiruokamalja, väritön, lasia', 22, 5),
(12, 'Posio', 'Huikea käsin tehty muki, jonka ulkopinta on lasittamaton. Käteen tuntuva karhea savipinta ja rouhea kohokuvio tekevät kahvihetkestä tämän kupin kanssa käsin aistittavan elämyksen. Kupin sisäpuoli on hygieenisesti lasitettu. Oikea taideteos!', '65.00', 'posio1.jpg', 'Harmaa keraaminen kahvikuppi, jossa kohokuvio ulko', 6, 1),
(13, 'Lappi', 'Lapin taikaa ja noitarummun kaikuja arkisiin kahvihetkiin tuo tämä tyylikkäästi kuvioitu muki. Hyvin tilavaan mukiin mahtuu kiireetön kupponen kuumaa.', '55.00', 'lappip1.jpg', 'Harmaa muki valkoisilla lappilaisaiheisilla kuvioi', 23, 1),
(14, 'Niiskuneiti ja Muumipeikko', 'Nämä muumiaiheiset mukit myydään vain pareittain. Niiskuneiti-mukissa on kesäinen kuva-aihe, Muumipeikko-muki vie joulunalusajan tunnelmiin. Kevyet kupit sopivat myös lasten käyttöön. Tästä Niiskuneiti ja Muumipeikko vaikkapa joulupakettiin, lahjaksi pariskunnalle tai sisaruksille!', '69.00', 'muumiv1.jpg', 'Kaksi muumiaiheista mukia, toisessa Niiskuneiti ja', 17, 1),
(15, 'Joulutähti', 'Punaisella joulutähdellä kuvioitu luonnonvalkoinen muki, vaikkapa pukinkonttiin. ', '32.00', 'tahtip1.jpg', 'Valkoinen muki, kuva-aiheena joulutähti.', 44, 1),
(16, 'Tontut', 'Mukin kyljestä katselee alta hiippalakkien kokonainen harmaapartaisten tonttujen rivi. Tontut-muki huokuu salaperäistä joulun tunnelmaa. Tästä kelpaa nauttia glögit ja totit!', '32.00', 'tonttuv1.jpg', 'Valkoinen muki, kuva-aiheena tonttuja, joilla pitk', 3, 1),
(17, 'Lennokas', 'Tilava muki kauniilla hunajanvärisellä vapaakuvioinnilla. Lennokas-mukin kansi pitää lämpimänä pitkäänkin hautuvan juoman, kuten yrttiteen. Lennokas - elegantteihin teehetkiin!', '38.50', 'lennokas1.jpg', 'Kannellinen muki, jossa hunajanvärisellä pohjalla ', 21, 1),
(18, 'Pikari', 'Pieniin ja elegantteihin jälkiruoka-annoksiin on omiaan tämä pieni jalallinen jälkiruokamalja. Puolipallon muotoisen maljan kuvioiheena on lehdet.', '24.00', 'jalallinenmatala1.jpg', 'Jalallinen jälkiruokamalja, lasia, väritön', 16, 5),
(19, 'Fondant', 'Luonnonvalkoinen Fondant -kulho kestää niin uunin kuin pakastimenkin. Siinä on sileä reuna ja kuviointina pystysuoira uurteita.', '13.00', 'fondant1.jpg', 'Jälkiruokakulho, luonnonvalkoinen, keraaminen.', 43, 5),
(20, 'Huurre', 'Pakkastalven tunnelmaa tuo tämä tyylikäs hieman alaspäin levenevä Huurre-malja. Kylmille jälkiruoille sopivan kupin pohjassa on aivan pienet, matalat jalat.', '23.00', 'uurteinen1.jpg', 'Jälkiruokamalja, lasia, kirkas', 34, 5),
(21, 'Siloinen', 'Yksinkertainen on kaunista. Siloinen-malja on pelkistetty ja miellyttävästi reunoilta pyöristetty. Ajatonta kauneutta, joka kestää vuosikymmenestä toiseen.', '19.00', 'silea1.jpg', 'Jälkiruokakuppi, lasia, väritön, yksinkertainen.', 41, 5),
(22, 'Lieriö', 'Yksinkertaisuudessaan hyvin puhutteleva on tämä miellyttävän sileä ja pyöreäpintainen kippo. Sinne sopii niin tuikkukynttilä kuin vaikka korukivet talteen.', '16.00', 'lierio1.jpg', 'Pieni keraaminen kippo, tummanruskealla lasitteell', 43, 6),
(23, 'Rustiikki', 'Käsintehty kippo tuikulle tai pikkuesineille. Tässä käsitehdyn rouheassa kipossa näkyy taitajan kädenjälki.', '29.90', 'rustiikki1.jpg', 'Keraaminen kippo, käsintehty, ruskea lasite', 4, 6),
(24, 'Tuike', 'Matalan Tuike-kipon lasitteessa on kimallusta kerrakseen. Se on yksinkertaisen kaunis ja jopa hypnoottinen katsella: kimaltava lasite loistaa kilpaa kupissa palavan tuikun kanssa.', '20.00', 'tuikkukuppi1.jpg', 'Matala, pyöreä kippo, jossa kimaltava ruskea lasit', 51, 6),
(25, 'Espresso', 'Tyylikkäästi kuin pariisilainen siemaiset pienen, vahvan kahvikupposen tästä Espresso-kupista. Kuppi on paksuseinäinen ja miellyttävä muotokieleltään. Väri on pehmeän ruskea. ', '21.50', 'espresso1.jpg', 'Pieni espressokuppi, ruskea, valkoinen sisäpuoli', 47, 7),
(26, 'Lila', 'Hohdokkuutta taukohetkeen tuo tämä vaaleanvioletti, helmiäispintainen kuppipari. Siin', '36.00', 'poskupv1.jpg', 'Kuppi ja asetti, violetit, helmiäispintaiset', 15, 7),
(27, 'Ruska', 'Aitoa retroa ja vanhan hyvän ajan tunnelmaa henkivä Ruska-kuppipari sopii hyvin nykyaikaiseenkin kahvipöytään. Ruskean sävyillä raidoitettu Ruska raikastuu vaikkapa valkoisella servetillä.', '24.50', 'ruska1.jpg', 'Kahvikuppi ja asetti, Ruska, ruskeilla pystyraidoi', 9, 7),
(28, 'Rosa', 'Yksinkertaisen kaunis Rosa-kuppi on hennon vaaleanpunaista, elävän pilkullista keramiikkaa. Tämä kahvikuppi on unelman värinen!', '22.50', 'vaaleanpun1.jpg', 'Kahvikuppi ja asetti, vaaleanpunaiset.', 11, 7),
(29, 'Neliöt', 'Valkoinen, ruskea ja turkoosi muodostavat näinkin kauniin värimaailman. Tässä sopivanvetoisessa kupissa on vinkeä neliökuviointi. Rohkea valinta kahvikattaukseen.', '31.90', 'ruskeaturkoosi1.jpg', 'Kuppi, neliönmuotoisilla kuvioilla, valkoinen/rusk', 22, 7),
(30, 'Konjac', 'Jalallisessa aromilasissa kehkeytyvät vahvat maut täyteen loistoonsa. Konjac-lasin yksinkertainen kauneus kestää aikaa.', '36.50', 'lasi1_1.jpg', 'Jalallinen aromilasi, väritön', 48, 8),
(31, 'Kola', 'Ameriikanhenkeä huokuva kolajuoman mainoslasi vihreänsävyisenä. Tästä kelpaa juoda virvoitusjuomat monenmoiset.', '14.00', 'kokis1_1.jpg', 'Coca cola -lasi, vihreänsävyinen', 27, 8),
(32, 'Kolpakko', 'Tällä kolpakolla huuhtoutuu alas kaikenlainen arki- ja juhlajuoma. Ote kahvasta on tukeva, ja tilavuuskin on reilunlainen, 4 desilitraa.', '18.50', 'kolpakko1.jpg', 'Kolpakko, kahvallinen, väritöntä lasia', 37, 8),
(33, 'Kristalli', 'Juhlahetkiin kaunis kristallilasi sirolla, korkealla jalalla. Värittömässä lasissa juoman väri pääsee oikeuksiinsa.', '52.00', 'krisviiv1.jpg', 'Kristallilasi korkealla jalalla, väritöntä lasia', 11, 8),
(34, 'Kristalli -setti', 'Setti sisältää tyylikkäät lasit alkumaljalle ja ruokajuomalle. Ajattoman elegantti Kristalli sopii juhlavimpiinkin kattauksiin. Kapeassa lasissa kuplat pääsevät oikeuksiinsa. Pyöreämaljaisessa lasissa värillinen juoma saa kauniit kuviot erottumaan.', '75.00', 'krisv1.jpg', 'Kahden lasin setti, jalalliset, kristallia, väritt', 5, 8);

-- --------------------------------------------------------

--
-- Rakenne taululle `tuoteryhma`
--

CREATE TABLE `tuoteryhma` (
  `id` int(11) NOT NULL,
  `nimi` varchar(50) NOT NULL,
  `kuvake` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `tuoteryhma`
--

INSERT INTO `tuoteryhma` (`id`, `nimi`, `kuvake`) VALUES
(1, 'Kupit', '<i class=\"fas fa-coffee text-muted\"></i>'),
(2, 'Lautaset', '<i class=\"fas fa-bullseye text-muted\"></i>'),
(3, 'Taidelasi', '<i class=\"fas fa-glass-martini-alt text-muted\"></i>'),
(4, 'Ruokailuvälineet', '<i class=\"fas fa-utensils text-muted\"></i>'),
(5, 'Jälkiruokakupit', '<i class=\"fas fa-ring text-muted\"></i>'),
(6, 'Keramiikkakipot', '<i class=\"fas fa-drum-steelpan text-muted\"></i>'),
(7, 'Pienet kahvikupit', '<i class=\"fas fa-mug-hot text-muted\"></i>'),
(8, 'Juomalasit', '<i class=\"fas fa-beer text-muted\"></i>');

-- --------------------------------------------------------

--
-- Rakenne taululle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'Testikäyttäjä', '$2y$10$u6QxuTzaPADEPVM2XUJtle.syhDpTmTCG4dFI3E3TlEI5jcp9MpOS', 'Teppo', 'Testikäyttäjä'),
(2, 'TESTI1234', '$2y$10$800JIgPsFTGSvWPoU7SgauorhUtj5GRSMIMArT.5c/eyYoMBbZ1GC', 'Pertti', 'Möttönen');

-- --------------------------------------------------------

--
-- Rakenne taululle `uutiskirjeentilaajat`
--

CREATE TABLE `uutiskirjeentilaajat` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `uutiskirjeentilaajat`
--

INSERT INTO `uutiskirjeentilaajat` (`id`, `email`) VALUES
(1, 'testi@testi');

-- --------------------------------------------------------

--
-- Rakenne taululle `viesti`
--

CREATE TABLE `viesti` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `viesti` varchar(500) DEFAULT NULL,
  `saved` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `viesti`
--

INSERT INTO `viesti` (`id`, `email`, `viesti`, `saved`) VALUES
(1, 'foo@foo.com', 'heipähei', '2020-12-05 19:36:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asiakas`
--
ALTER TABLE `asiakas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tilaus`
--
ALTER TABLE `tilaus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asiakas_id` (`asiakas_id`);

--
-- Indexes for table `tilausrivi`
--
ALTER TABLE `tilausrivi`
  ADD KEY `tilaus_id` (`tilaus_id`),
  ADD KEY `tuote_id` (`tuote_id`);

--
-- Indexes for table `tuote`
--
ALTER TABLE `tuote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tuoteryhma_id` (`tuoteryhma_id`);

--
-- Indexes for table `tuoteryhma`
--
ALTER TABLE `tuoteryhma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nimi` (`nimi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `uutiskirjeentilaajat`
--
ALTER TABLE `uutiskirjeentilaajat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `viesti`
--
ALTER TABLE `viesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asiakas`
--
ALTER TABLE `asiakas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tilaus`
--
ALTER TABLE `tilaus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tuote`
--
ALTER TABLE `tuote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tuoteryhma`
--
ALTER TABLE `tuoteryhma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uutiskirjeentilaajat`
--
ALTER TABLE `uutiskirjeentilaajat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `viesti`
--
ALTER TABLE `viesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `tilaus`
--
ALTER TABLE `tilaus`
  ADD CONSTRAINT `tilaus_ibfk_1` FOREIGN KEY (`asiakas_id`) REFERENCES `asiakas` (`id`);

--
-- Rajoitteet taululle `tilausrivi`
--
ALTER TABLE `tilausrivi`
  ADD CONSTRAINT `tilausrivi_ibfk_1` FOREIGN KEY (`tilaus_id`) REFERENCES `tilaus` (`id`),
  ADD CONSTRAINT `tilausrivi_ibfk_2` FOREIGN KEY (`tuote_id`) REFERENCES `tuote` (`id`);

--
-- Rajoitteet taululle `tuote`
--
ALTER TABLE `tuote`
  ADD CONSTRAINT `tuote_ibfk_1` FOREIGN KEY (`tuoteryhma_id`) REFERENCES `tuoteryhma` (`id`);
COMMIT;

CREATE TABLE `admin` (
  `adminname` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  INSERT INTO `admin` (`adminname`, `password`) VALUES
('habaneroadmin1', 'ad123456');