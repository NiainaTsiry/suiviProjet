-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  lun. 04 avr. 2022 à 07:43
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reboisement`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

DROP TABLE IF EXISTS `acteurs`;
CREATE TABLE IF NOT EXISTS `acteurs` (
  `ID_ACTEUR` varchar(6) NOT NULL,
  `NOM_ACTEUR` varchar(250) DEFAULT NULL,
  `TELEPHONE` varchar(16) DEFAULT NULL,
  `ADRESSE_MAIL` varchar(50) DEFAULT NULL,
  `PERSONNE_CONTACT` varchar(250) DEFAULT NULL,
  `ADRESSE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_ACTEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `autre_menace`
--

DROP TABLE IF EXISTS `autre_menace`;
CREATE TABLE IF NOT EXISTS `autre_menace` (
  `ID_PLANTATION` varchar(20) NOT NULL,
  `ID_MENACE` varchar(6) NOT NULL,
  `DATE_CONSTAT` date DEFAULT NULL,
  `RESPONSABLE` varchar(250) DEFAULT NULL,
  `SURFACE_TOUCHE` decimal(8,0) DEFAULT NULL,
  `INTERVENTION_MENEE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_PLANTATION`,`ID_MENACE`),
  KEY `FK_AUTRE_MENACE2` (`ID_MENACE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avoir_type_acteur`
--

DROP TABLE IF EXISTS `avoir_type_acteur`;
CREATE TABLE IF NOT EXISTS `avoir_type_acteur` (
  `ID_ACTEUR` varchar(6) NOT NULL,
  `ID_TYPE_ACTEUR` varchar(6) NOT NULL,
  PRIMARY KEY (`ID_ACTEUR`,`ID_TYPE_ACTEUR`),
  KEY `FK_AVOIR_TYPE_ACTEUR2` (`ID_TYPE_ACTEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bassin_versant`
--

DROP TABLE IF EXISTS `bassin_versant`;
CREATE TABLE IF NOT EXISTS `bassin_versant` (
  `ID_BASSIN_VERSANT` varchar(6) NOT NULL,
  `LIBELLE_BASSIN_ERSANT` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_BASSIN_VERSANT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `communaute`
--

DROP TABLE IF EXISTS `communaute`;
CREATE TABLE IF NOT EXISTS `communaute` (
  `ID_COMMUNAUTE` varchar(6) NOT NULL,
  `LIBELLE_COMMUNAUTE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_COMMUNAUTE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `ID_COMMUNE` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ID_DISTRICT` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `LIBELLE_COMMUNE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_COMMUNE`),
  KEY `FK_APPARTENIR_DISTRICT` (`ID_DISTRICT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`ID_COMMUNE`, `ID_DISTRICT`, `LIBELLE_COMMUNE`) VALUES
('MDG11101001', 'MDG11101', '1er Arrondissement'),
('MDG11101002', 'MDG11101', '2e Arrondissement'),
('MDG11101003', 'MDG11101', '3e Arrondissement'),
('MDG11101004', 'MDG11101', '4e Arrondissement'),
('MDG11101005', 'MDG11101', '5e Arrondissement'),
('MDG11101006', 'MDG11101', '6e Arrondissement'),
('MDG11102010', 'MDG11102', 'Alasora'),
('MDG11102039', 'MDG11102', 'Ankadikely Ilafy'),
('MDG11102050', 'MDG11102', 'Ambohimanambola'),
('MDG11102079', 'MDG11102', 'Sabotsy Namehana'),
('MDG11102099', 'MDG11102', 'Ambohimangakely'),
('MDG11102210', 'MDG11102', 'Manandriana'),
('MDG11102230', 'MDG11102', 'Ambohimalaza Miray'),
('MDG11102279', 'MDG11102', 'Fiaferana'),
('MDG11102319', 'MDG11102', 'Ambohimanga Rova'),
('MDG11102350', 'MDG11102', 'Viliahazo'),
('MDG11102379', 'MDG11102', 'Talata Volonondry'),
('MDG11102390', 'MDG11102', 'Anjeva Gara'),
('MDG11102410', 'MDG11102', 'Masindray'),
('MDG11102430', 'MDG11102', 'Ankadinandriana'),
('MDG11103010', 'MDG11103', 'Ambohidratrimo'),
('MDG11103030', 'MDG11103', 'Anosiala'),
('MDG11103050', 'MDG11103', 'Talatamaty'),
('MDG11103070', 'MDG11103', 'Antehiroka'),
('MDG11103090', 'MDG11103', 'Iarinarivo'),
('MDG11103111', 'MDG11103', 'Ivato Firaisana'),
('MDG11103112', 'MDG11103', 'Ivato Aeroport'),
('MDG11103130', 'MDG11103', 'Ambohitrimanjaka'),
('MDG11103150', 'MDG11103', 'Mahitsy'),
('MDG11103171', 'MDG11103', 'Merimandroso'),
('MDG11103172', 'MDG11103', 'Ambatolampy'),
('MDG11103190', 'MDG11103', 'Ampangabe'),
('MDG11103210', 'MDG11103', 'Ampanotokana'),
('MDG11103230', 'MDG11103', 'Mananjara'),
('MDG11103251', 'MDG11103', 'Manjakavaradrano'),
('MDG11103252', 'MDG11103', 'Antsahafilo'),
('MDG11103270', 'MDG11103', 'Ambohimanjaka'),
('MDG11103290', 'MDG11103', 'Fiadanana'),
('MDG11103310', 'MDG11103', 'Mahabo'),
('MDG11103330', 'MDG11103', 'Mahereza'),
('MDG11103350', 'MDG11103', 'Antanetibe'),
('MDG11103370', 'MDG11103', 'Ambohipihaonana'),
('MDG11103390', 'MDG11103', 'Ambato'),
('MDG11103410', 'MDG11103', 'Anjanadoria'),
('MDG11103430', 'MDG11103', 'Avaratsena'),
('MDG11104010', 'MDG11104', 'Ankazobe'),
('MDG11104030', 'MDG11104', 'Talata Angavo'),
('MDG11104050', 'MDG11104', 'Ambohitromby'),
('MDG11104071', 'MDG11104', 'Antotohazo'),
('MDG11104072', 'MDG11104', 'Marondry'),
('MDG11104090', 'MDG11104', 'Fihaonana'),
('MDG11104110', 'MDG11104', 'Mahavelona'),
('MDG11104130', 'MDG11104', 'Fiadanana'),
('MDG11104150', 'MDG11104', 'Tsaramasoandro'),
('MDG11104170', 'MDG11104', 'Ambolotarakely'),
('MDG11104190', 'MDG11104', 'Antakavana'),
('MDG11104210', 'MDG11104', 'Kiangara'),
('MDG11104230', 'MDG11104', 'Miantso'),
('MDG13105010', 'MDG13105', 'Arivonimamo I'),
('MDG13105030', 'MDG13105', 'Arivonimamo II'),
('MDG13105050', 'MDG13105', 'Ambohitrambo'),
('MDG13105070', 'MDG13105', 'Ampahimanga'),
('MDG13105090', 'MDG13105', 'Amboanana'),
('MDG13105110', 'MDG13105', 'Morafeno'),
('MDG13105130', 'MDG13105', 'Imerintsiatosika'),
('MDG13105150', 'MDG13105', 'Morarano'),
('MDG13105170', 'MDG13105', 'Ambatomirahavavy'),
('MDG13105190', 'MDG13105', 'Ambatomanga'),
('MDG13105211', 'MDG13105', 'Manalalondo'),
('MDG13105212', 'MDG13105', 'Antenimbe'),
('MDG13105213', 'MDG13105', 'Alakamisikely'),
('MDG13105214', 'MDG13105', 'Mahatsinjo Est'),
('MDG13105215', 'MDG13105', 'Marofangady'),
('MDG13105216', 'MDG13105', 'Rambolamasoandro Andranomiely'),
('MDG13105230', 'MDG13105', 'Ambohimandry'),
('MDG13105250', 'MDG13105', 'Antambolo'),
('MDG13105270', 'MDG13105', 'Ambohimasina'),
('MDG13105291', 'MDG13105', 'Ambohipandrano'),
('MDG13105292', 'MDG13105', 'Miandrandra'),
('MDG13105310', 'MDG13105', 'Miantsoarivo'),
('MDG11106011', 'MDG11106', 'Manjakandriana'),
('MDG11106012', 'MDG11106', 'Ambatolaona'),
('MDG11106030', 'MDG11106', 'Sambaina'),
('MDG11106050', 'MDG11106', 'Ambohibary'),
('MDG11106070', 'MDG11106', 'Ambatomanga'),
('MDG11106090', 'MDG11106', 'Alarobia'),
('MDG11106110', 'MDG11106', 'Mantasoa'),
('MDG11106130', 'MDG11106', 'Ranovao'),
('MDG11106150', 'MDG11106', 'Miadanandriana'),
('MDG11106170', 'MDG11106', 'Nandihizana'),
('MDG11106190', 'MDG11106', 'Anjepy'),
('MDG11106210', 'MDG11106', 'Ambanitsena'),
('MDG11106230', 'MDG11106', 'Ambohitrandriamanitra'),
('MDG11106251', 'MDG11106', 'Ambatomena'),
('MDG11106252', 'MDG11106', 'Ambohibao Sud'),
('MDG11106271', 'MDG11106', 'Ambohitseheno'),
('MDG11106272', 'MDG11106', 'Antsahalalina'),
('MDG11106290', 'MDG11106', 'Ambohitrony'),
('MDG11106310', 'MDG11106', 'Merikanjaka'),
('MDG11106330', 'MDG11106', 'Anjoma Betoho'),
('MDG11106351', 'MDG11106', 'Ankazondandy'),
('MDG11106352', 'MDG11106', 'Soavinandriana'),
('MDG11106371', 'MDG11106', 'Ambohitrolomahitsy'),
('MDG11106372', 'MDG11106', 'Ampaneva'),
('MDG11106390', 'MDG11106', 'Sadabe'),
('MDG11107019', 'MDG11107', 'Anjozorobe'),
('MDG11107070', 'MDG11107', 'Mangamila'),
('MDG11107099', 'MDG11107', 'Ambongamarina'),
('MDG11107110', 'MDG11107', 'Tsarasaotra'),
('MDG11107130', 'MDG11107', 'Ambohimanarina Marovazaha'),
('MDG11107150', 'MDG11107', 'Betatao'),
('MDG11107170', 'MDG11107', 'Alakamisy'),
('MDG11107190', 'MDG11107', 'Analaroa'),
('MDG11107211', 'MDG11107', 'Antanetibe'),
('MDG11107212', 'MDG11107', 'Belanitra'),
('MDG11107230', 'MDG11107', 'Ambatomanoina'),
('MDG11107250', 'MDG11107', 'Amparatanjona'),
('MDG11107270', 'MDG11107', 'Amboasary Nord'),
('MDG11107290', 'MDG11107', 'Androvakely'),
('MDG11107310', 'MDG11107', 'Ambohibary Vohilena'),
('MDG11107330', 'MDG11107', 'Ambohimirary'),
('MDG11107350', 'MDG11107', 'Marotsipoy'),
('MDG11107370', 'MDG11107', 'Beronono'),
('MDG12108001', 'MDG12108', 'Antsenakely Andraikiba'),
('MDG12108002', 'MDG12108', 'Ampatana Mandriankeniheny'),
('MDG12108003', 'MDG12108', 'Soamalaza Mahatsinjo'),
('MDG12108004', 'MDG12108', 'Antsirabe Afovoany Atsinanana'),
('MDG12108005', 'MDG12108', 'Manodidina Ny Gara Ambilombe'),
('MDG12108006', 'MDG12108', 'Mahazoarivo Avarabohitra'),
('MDG12109010', 'MDG12109', 'Betafo'),
('MDG12109030', 'MDG12109', 'Andranomafana'),
('MDG12109050', 'MDG12109', 'Mandritsara'),
('MDG12109070', 'MDG12109', 'Alakamisy Anativato'),
('MDG12109090', 'MDG12109', 'Antsoso'),
('MDG12109110', 'MDG12109', 'Tritriva'),
('MDG12109130', 'MDG12109', 'Soavina'),
('MDG12109150', 'MDG12109', 'Manohisoa'),
('MDG12109170', 'MDG12109', 'Ambatonikolahy'),
('MDG12109190', 'MDG12109', 'Antohobe'),
('MDG12109211', 'MDG12109', 'Mahaiza'),
('MDG12109212', 'MDG12109', 'Anosiarivo Manapa'),
('MDG12109230', 'MDG12109', 'Alakamisy Marososona'),
('MDG12109250', 'MDG12109', 'Ambohimanambola'),
('MDG12109270', 'MDG12109', 'Ambohimasina'),
('MDG12109290', 'MDG12109', 'Inanantonana'),
('MDG12109390', 'MDG12109', 'Alarobia Bemaha'),
('MDG12109490', 'MDG12109', 'Andrembesoa'),
('MDG12110010', 'MDG12110', 'Ambatolampy'),
('MDG12110030', 'MDG12110', 'Morarano'),
('MDG12110050', 'MDG12110', 'Ambohipihaonana'),
('MDG12110070', 'MDG12110', 'Manjakatompo'),
('MDG12110090', 'MDG12110', 'Ambatondrakalavao'),
('MDG12110110', 'MDG12110', 'Andriambilany'),
('MDG12110130', 'MDG12110', 'Belambo Firaisana'),
('MDG12110150', 'MDG12110', 'Andravola Vohipeno'),
('MDG12110170', 'MDG12110', 'Tsiafajavona Ankaratra'),
('MDG12110190', 'MDG12110', 'Ambodifarihy Fenomanana'),
('MDG12110210', 'MDG12110', 'Sabotsy Namatoana'),
('MDG12110230', 'MDG12110', 'Antanimasaka'),
('MDG12110250', 'MDG12110', 'Behenjy'),
('MDG12110270', 'MDG12110', 'Antsampandrano'),
('MDG12110291', 'MDG12110', 'Antanamalaza'),
('MDG12110292', 'MDG12110', 'Antakasina'),
('MDG12110310', 'MDG12110', 'Tsinjoarivo'),
('MDG12110330', 'MDG12110', 'Andranovelona'),
('MDG14111030', 'MDG14111', 'Tsiroanomandidy Fihaonana'),
('MDG14111051', 'MDG14111', 'Ambatolampy'),
('MDG14111052', 'MDG14111', 'Maritampona'),
('MDG14111070', 'MDG14111', 'Bevato'),
('MDG14111090', 'MDG14111', 'Ankadinondry Sakay'),
('MDG14111110', 'MDG14111', 'Ankerana Avaratra'),
('MDG14111130', 'MDG14111', 'Miandrarivo'),
('MDG14111150', 'MDG14111', 'Tsinjoarivo Imanga'),
('MDG14111170', 'MDG14111', 'Soanierana'),
('MDG14111190', 'MDG14111', 'Anosy'),
('MDG14111210', 'MDG14111', 'Ambararatabe'),
('MDG14111230', 'MDG14111', 'Belobaka'),
('MDG14111250', 'MDG14111', 'Ambalanirana'),
('MDG14111270', 'MDG14111', 'Mahasolo'),
('MDG14111290', 'MDG14111', 'Bemahatazana'),
('MDG14111310', 'MDG14111', 'Fierenana'),
('MDG14111330', 'MDG14111', 'Maroharona'),
('MDG13112010', 'MDG13112', 'Miarinarivo I'),
('MDG13112030', 'MDG13112', 'Miarinarivo II'),
('MDG13112050', 'MDG13112', 'Ambatomanjaka'),
('MDG13112071', 'MDG13112', 'Manazary'),
('MDG13112072', 'MDG13112', 'Antoby Est'),
('MDG13112090', 'MDG13112', 'Soamahamanina'),
('MDG13112111', 'MDG13112', 'Analavory'),
('MDG13112112', 'MDG13112', 'Alatsinainikely'),
('MDG13112130', 'MDG13112', 'Mandiavato'),
('MDG13112151', 'MDG13112', 'Anosibe Ifanja'),
('MDG13112152', 'MDG13112', 'Sarobaratra Ifanja'),
('MDG13112170', 'MDG13112', 'Zoma Bealoka'),
('MDG13112190', 'MDG13112', 'Soavimbazaha'),
('MDG13112210', 'MDG13112', 'Andolofotsy'),
('MDG13113011', 'MDG13113', 'Soavinandriana'),
('MDG13113012', 'MDG13113', 'Dondona'),
('MDG13113030', 'MDG13113', 'Ampary'),
('MDG13113050', 'MDG13113', 'Mananasy'),
('MDG13113071', 'MDG13113', 'Masindray'),
('MDG13113072', 'MDG13113', 'Amparibohitra'),
('MDG13113090', 'MDG13113', 'Ampefy'),
('MDG13113110', 'MDG13113', 'Antanetibe'),
('MDG13113131', 'MDG13113', 'Amparaky'),
('MDG13113132', 'MDG13113', 'Amberomanga'),
('MDG13113150', 'MDG13113', 'Ankaranana'),
('MDG13113170', 'MDG13113', 'Mahavelona'),
('MDG13113190', 'MDG13113', 'Ankisabe'),
('MDG13113210', 'MDG13113', 'Ambatoasana Centre'),
('MDG13113230', 'MDG13113', 'Tamponala'),
('MDG12114010', 'MDG12114', 'Antanifotsy'),
('MDG12114030', 'MDG12114', 'Ambatolahy'),
('MDG12114050', 'MDG12114', 'Ampitatafika'),
('MDG12114079', 'MDG12114', 'Ambatomiady'),
('MDG12114090', 'MDG12114', 'Andranofito'),
('MDG12114110', 'MDG12114', 'Ambohimandroso'),
('MDG12114150', 'MDG12114', 'Ambatotsipihina'),
('MDG12114171', 'MDG12114', 'Ambohitompoina'),
('MDG12114172', 'MDG12114', 'Belanitra'),
('MDG12114199', 'MDG12114', 'Antsahalava'),
('MDG12114230', 'MDG12114', 'Ambodiriana'),
('MDG12114290', 'MDG12114', 'Antsampandrano'),
('MDG11115010', 'MDG11115', 'Andramasina'),
('MDG11115031', 'MDG11115', 'Sabotsy Ambohitromby'),
('MDG11115032', 'MDG11115', 'Andohariana'),
('MDG11115050', 'MDG11115', 'Mandrosoa'),
('MDG11115071', 'MDG11115', 'Alatsinainy Bakaro'),
('MDG11115072', 'MDG11115', 'Antotohazo'),
('MDG11115091', 'MDG11115', 'Ambohimiadana'),
('MDG11115092', 'MDG11115', 'Tankafatra'),
('MDG11115110', 'MDG11115', 'Alarobia Vatosola'),
('MDG11115130', 'MDG11115', 'Fitsinjovana Bakaro'),
('MDG11115150', 'MDG11115', 'Sabotsy Manjakavahoaka'),
('MDG11115170', 'MDG11115', 'Anosibe Trimoloharano'),
('MDG12116010', 'MDG12116', 'Faratsiho'),
('MDG12116030', 'MDG12116', 'Antsampanimahazo'),
('MDG12116050', 'MDG12116', 'Faravohitra'),
('MDG12116070', 'MDG12116', 'Ramainandro'),
('MDG12116090', 'MDG12116', 'Andranomiady'),
('MDG12116110', 'MDG12116', 'Vinaninony Atsimo'),
('MDG12116130', 'MDG12116', 'Ambohiborona'),
('MDG12116150', 'MDG12116', 'Miandrarivo'),
('MDG12116170', 'MDG12116', 'Valabetokana'),
('MDG11117011', 'MDG11117', 'Ampitatafika'),
('MDG11117012', 'MDG11117', 'Anosizato Andrefana'),
('MDG11117030', 'MDG11117', 'Andranonahoatra'),
('MDG11117050', 'MDG11117', 'Ambohidrapeto'),
('MDG11117070', 'MDG11117', 'Bemasoandro'),
('MDG11117090', 'MDG11117', 'Fiombonana'),
('MDG11117110', 'MDG11117', 'Itaosy'),
('MDG11117130', 'MDG11117', 'Ambavahaditokana'),
('MDG11117150', 'MDG11117', 'Tanjombato'),
('MDG11117170', 'MDG11117', 'Andoharanofotsy'),
('MDG11117190', 'MDG11117', 'Ankaraobato'),
('MDG11117210', 'MDG11117', 'Soalandy'),
('MDG11117230', 'MDG11117', 'Antanetikely'),
('MDG11117250', 'MDG11117', 'Alatsinainy Ambazaha'),
('MDG11117270', 'MDG11117', 'Ampanefy'),
('MDG11117290', 'MDG11117', 'Ankadimanga'),
('MDG11117311', 'MDG11117', 'Fenoarivo'),
('MDG11117312', 'MDG11117', 'Alakamisy Fenoarivo'),
('MDG11117330', 'MDG11117', 'Soavina'),
('MDG11117350', 'MDG11117', 'Ambohijanaka'),
('MDG11117370', 'MDG11117', 'Ampahitrosy'),
('MDG11117390', 'MDG11117', 'Bongatsara'),
('MDG11117410', 'MDG11117', 'Androhibe'),
('MDG11117430', 'MDG11117', 'Tsiafahy'),
('MDG11117450', 'MDG11117', 'Ambalavao'),
('MDG11117470', 'MDG11117', 'Ambatofahavalo'),
('MDG12118010', 'MDG12118', 'Ambano'),
('MDG12118030', 'MDG12118', 'Belazao'),
('MDG12118050', 'MDG12118', 'Alakamisy'),
('MDG12118070', 'MDG12118', 'Antanimandry'),
('MDG12118090', 'MDG12118', 'Vinaninkarena'),
('MDG12118110', 'MDG12118', 'Andranomanelatra'),
('MDG12118130', 'MDG12118', 'Ambohidranandriana'),
('MDG12118150', 'MDG12118', 'Ambohimiarivo'),
('MDG12118170', 'MDG12118', 'Ambohitsimanova'),
('MDG12118190', 'MDG12118', 'Mangarano'),
('MDG12118210', 'MDG12118', 'Manandona'),
('MDG12118230', 'MDG12118', 'Antsoatany'),
('MDG12118250', 'MDG12118', 'Alatsinainy Ibity'),
('MDG12118270', 'MDG12118', 'Sahanivotry Manandona'),
('MDG12118290', 'MDG12118', 'Soanindrariny'),
('MDG12118310', 'MDG12118', 'Ambatomena'),
('MDG12118331', 'MDG12118', 'Ambohibary'),
('MDG12118332', 'MDG12118', 'Mandrosohasina'),
('MDG12118350', 'MDG12118', 'Tsarahonenana Sahanivotry'),
('MDG12118370', 'MDG12118', 'Antanambao'),
('MDG14119010', 'MDG14119', 'Fenoarivo Centre'),
('MDG14119031', 'MDG14119', 'Firavahana'),
('MDG14119032', 'MDG14119', 'Morarano Maritampona'),
('MDG14119051', 'MDG14119', 'Kiranomena'),
('MDG14119052', 'MDG14119', 'Tsinjoarivo 22'),
('MDG14119053', 'MDG14119', 'Mahajeby'),
('MDG14119071', 'MDG14119', 'Ambohitromby'),
('MDG14119072', 'MDG14119', 'Ambatomainty Atsimo'),
('MDG12120010', 'MDG12120', 'Mandoto'),
('MDG12120030', 'MDG12120', 'Betsohana'),
('MDG12120050', 'MDG12120', 'Antanambao Ambary'),
('MDG12120070', 'MDG12120', 'Anjoma Ramartina'),
('MDG12120090', 'MDG12120', 'Ankazomiriotra'),
('MDG12120110', 'MDG12120', 'Fidirana'),
('MDG12120130', 'MDG12120', 'Vasiana'),
('MDG12120150', 'MDG12120', 'Vinany'),
('MDG21201001', 'MDG21201', 'Tanana Ambony'),
('MDG21201002', 'MDG21201', 'Tanana Ambany'),
('MDG21201003', 'MDG21201', 'Andrainjato Avaratra'),
('MDG21201004', 'MDG21201', 'Andrainjato Sud'),
('MDG21201005', 'MDG21201', 'Manolafaka'),
('MDG21201006', 'MDG21201', 'Lalazana'),
('MDG21201007', 'MDG21201', 'Vatosola'),
('MDG22202010', 'MDG22202', 'Ambatofinandrahana'),
('MDG22202030', 'MDG22202', 'Itremo'),
('MDG22202050', 'MDG22202', 'Fenoarivo'),
('MDG22202070', 'MDG22202', 'Soavina'),
('MDG22202090', 'MDG22202', 'Ambondromisotra'),
('MDG22202110', 'MDG22202', 'Ambatomifanongoa'),
('MDG22202130', 'MDG22202', 'Amborompotsy'),
('MDG22202150', 'MDG22202', 'Mandrosonoro'),
('MDG22202170', 'MDG22202', 'Mangataboahangy'),
('MDG22203010', 'MDG22203', 'Ambositra I'),
('MDG22203030', 'MDG22203', 'Ambositra II'),
('MDG22203050', 'MDG22203', 'Ankazoambo'),
('MDG22203070', 'MDG22203', 'Ivony Miaramiasa'),
('MDG22203090', 'MDG22203', 'Andina'),
('MDG22203110', 'MDG22203', 'Imerina Imady'),
('MDG22203130', 'MDG22203', 'Ivato'),
('MDG22203150', 'MDG22203', 'Tsarasaotra'),
('MDG22203170', 'MDG22203', 'Marosoa'),
('MDG22203190', 'MDG22203', 'Fahizay'),
('MDG22203210', 'MDG22203', 'Alakamisy Ambohijato'),
('MDG22203230', 'MDG22203', 'Kianjandrakefina'),
('MDG22203250', 'MDG22203', 'Ambalamanakana'),
('MDG22203290', 'MDG22203', 'Ilaka Centre'),
('MDG22203310', 'MDG22203', 'Ihadilanana'),
('MDG22203390', 'MDG22203', 'Ambatofitorahana'),
('MDG22203410', 'MDG22203', 'Antoetra'),
('MDG22203430', 'MDG22203', 'Mahazina Ambohipierenana'),
('MDG22203450', 'MDG22203', 'Sahatsiho Ambohimanjaka'),
('MDG22203491', 'MDG22203', 'Ambohimitombo I'),
('MDG22203492', 'MDG22203', 'Ambohimitombo II'),
('MDG22203551', 'MDG22203', 'Ambinanindrano'),
('MDG22203552', 'MDG22203', 'Vohidahy'),
('MDG22204010', 'MDG22204', 'Fandriana'),
('MDG22204030', 'MDG22204', 'Milamaina'),
('MDG22204050', 'MDG22204', 'Sahamadio Fisakana'),
('MDG22204070', 'MDG22204', 'Fiadanana'),
('MDG22204090', 'MDG22204', 'Tsarazaza'),
('MDG22204110', 'MDG22204', 'Tatamalaza'),
('MDG22204130', 'MDG22204', 'Ankarinoro'),
('MDG22204150', 'MDG22204', 'Sandrandahy'),
('MDG22204170', 'MDG22204', 'Mahazoarivo'),
('MDG22204191', 'MDG22204', 'Miarinavaratra'),
('MDG22204192', 'MDG22204', 'Betsimisotra'),
('MDG22204210', 'MDG22204', 'Alakamisy Ambohimahazo'),
('MDG22204230', 'MDG22204', 'Imito'),
('MDG21205010', 'MDG21205', 'Ambalavao'),
('MDG21205030', 'MDG21205', 'Manamisoa'),
('MDG21205050', 'MDG21205', 'Iarintsena'),
('MDG21205071', 'MDG21205', 'Ambohimandroso'),
('MDG21205072', 'MDG21205', 'Andrainjato'),
('MDG21205090', 'MDG21205', 'Anjoma'),
('MDG21205110', 'MDG21205', 'Kirano'),
('MDG21205130', 'MDG21205', 'Sendrisoa'),
('MDG21205150', 'MDG21205', 'Besoa'),
('MDG21205170', 'MDG21205', 'Mahazony'),
('MDG21205190', 'MDG21205', 'Ambinanindovoka'),
('MDG21205211', 'MDG21205', 'Ankaramena'),
('MDG21205212', 'MDG21205', 'Ambinaniroa'),
('MDG21205230', 'MDG21205', 'Ambohimahamasina'),
('MDG21205250', 'MDG21205', 'Miarinarivo'),
('MDG21205270', 'MDG21205', 'Vohitsaoka'),
('MDG21205290', 'MDG21205', 'Fenoarivo'),
('MDG23206011', 'MDG23206', 'Ifanadiana'),
('MDG23206012', 'MDG23206', 'Antaretra'),
('MDG23206030', 'MDG23206', 'Tsaratanana'),
('MDG23206051', 'MDG23206', 'Ranomafana'),
('MDG23206052', 'MDG23206', 'Kelilalina'),
('MDG23206071', 'MDG23206', 'Androrangavola'),
('MDG23206072', 'MDG23206', 'Marotoko'),
('MDG23206090', 'MDG23206', 'Ambohimiera'),
('MDG23206110', 'MDG23206', 'Antsindra'),
('MDG23206130', 'MDG23206', 'Ambohimanga Du Sud'),
('MDG23206150', 'MDG23206', 'Analampasina'),
('MDG23206170', 'MDG23206', 'Fasintsara'),
('MDG23206190', 'MDG23206', 'Maroharatra'),
('MDG23207010', 'MDG23207', 'Nosy Varika'),
('MDG23207031', 'MDG23207', 'Ambahy'),
('MDG23207032', 'MDG23207', 'Andara'),
('MDG23207051', 'MDG23207', 'Fiadanana'),
('MDG23207052', 'MDG23207', 'Ambodirian\'i Sahafary'),
('MDG23207070', 'MDG23207', 'Sahavato'),
('MDG23207090', 'MDG23207', 'Vohilava'),
('MDG23207111', 'MDG23207', 'Vohitrandriana'),
('MDG23207112', 'MDG23207', 'Vohidroa'),
('MDG23207113', 'MDG23207', 'Ambakobe'),
('MDG23207130', 'MDG23207', 'Soavina'),
('MDG23207151', 'MDG23207', 'Ambodilafa'),
('MDG23207152', 'MDG23207', 'Androrangavola'),
('MDG23207171', 'MDG23207', 'Ampasinambo'),
('MDG23207172', 'MDG23207', 'Antanambao'),
('MDG23207173', 'MDG23207', 'Angodongodona'),
('MDG23207191', 'MDG23207', 'Befody'),
('MDG23207192', 'MDG23207', 'Ambodiara'),
('MDG21208010', 'MDG21208', 'Ambohimahasoa'),
('MDG21208030', 'MDG21208', 'Ampitana'),
('MDG21208050', 'MDG21208', 'Ankerana'),
('MDG21208071', 'MDG21208', 'Manandroy'),
('MDG21208072', 'MDG21208', 'Ambalakindresy'),
('MDG21208090', 'MDG21208', 'Ankafina Tsarafidy'),
('MDG21208110', 'MDG21208', 'Sahave'),
('MDG21208130', 'MDG21208', 'Morafeno'),
('MDG21208150', 'MDG21208', 'Ikalalao'),
('MDG21208170', 'MDG21208', 'Vohiposa'),
('MDG21208190', 'MDG21208', 'Ambatosoa'),
('MDG21208211', 'MDG21208', 'Isaka'),
('MDG21208212', 'MDG21208', 'Vohitrarivo'),
('MDG21208230', 'MDG21208', 'Ambohinamboarina'),
('MDG21208251', 'MDG21208', 'Sahatona'),
('MDG21208252', 'MDG21208', 'Camp Robin'),
('MDG21208270', 'MDG21208', 'Befeta'),
('MDG21208290', 'MDG21208', 'Fiadanana'),
('MDG23209010', 'MDG23209', 'Mananjary'),
('MDG23209031', 'MDG23209', 'Tsaravary'),
('MDG23209032', 'MDG23209', 'Ankatafana'),
('MDG23209050', 'MDG23209', 'Mahatsara Sud'),
('MDG23209070', 'MDG23209', 'Tsiatosika'),
('MDG23209090', 'MDG23209', 'Mahatsara Iefaka'),
('MDG23209110', 'MDG23209', 'Marokarima'),
('MDG23209130', 'MDG23209', 'Morafeno'),
('MDG23209150', 'MDG23209', 'Antsenavolo'),
('MDG23209170', 'MDG23209', 'Marosangy'),
('MDG23209190', 'MDG23209', 'Ambohimiarina II'),
('MDG23209210', 'MDG23209', 'Andranambolava'),
('MDG23209230', 'MDG23209', 'Vohilava'),
('MDG23209251', 'MDG23209', 'Mahela'),
('MDG23209252', 'MDG23209', 'Ambohitsara Est'),
('MDG23209270', 'MDG23209', 'Mahavoky Nord'),
('MDG23209290', 'MDG23209', 'Andonabe'),
('MDG23209310', 'MDG23209', 'Ambohinihaonana'),
('MDG23209331', 'MDG23209', 'Marofototra'),
('MDG23209332', 'MDG23209', 'Andranomavo'),
('MDG23209350', 'MDG23209', 'Vatohandrina'),
('MDG23209370', 'MDG23209', 'Ambalahosy Nord'),
('MDG23209391', 'MDG23209', 'Ambodinonoka'),
('MDG23209392', 'MDG23209', 'Antaretra'),
('MDG23209410', 'MDG23209', 'Kianjavato'),
('MDG23209430', 'MDG23209', 'Sandrohy'),
('MDG23209450', 'MDG23209', 'Anosimparihy'),
('MDG23209470', 'MDG23209', 'Manakana Nord'),
('MDG23209490', 'MDG23209', 'Namorona'),
('MDG23210010', 'MDG23210', 'Manakara'),
('MDG23210031', 'MDG23210', 'Tataho'),
('MDG23210032', 'MDG23210', 'Mangatsiotra'),
('MDG23210051', 'MDG23210', 'Marofarihy'),
('MDG23210052', 'MDG23210', 'Anosiala'),
('MDG23210070', 'MDG23210', 'Ambila'),
('MDG23210090', 'MDG23210', 'Sorombo'),
('MDG23210110', 'MDG23210', 'Mizilo Gara'),
('MDG23210130', 'MDG23210', 'Ambohitsara M'),
('MDG23210151', 'MDG23210', 'Sahasinaka'),
('MDG23210152', 'MDG23210', 'Sahanambohitra'),
('MDG23210153', 'MDG23210', 'Ambahatrazo'),
('MDG23210171', 'MDG23210', 'Amboanjo'),
('MDG23210172', 'MDG23210', 'Anorombato'),
('MDG23210190', 'MDG23210', 'Vohimasy'),
('MDG23210211', 'MDG23210', 'Lokomby'),
('MDG23210212', 'MDG23210', 'Vatana'),
('MDG23210213', 'MDG23210', 'Sakoana'),
('MDG23210231', 'MDG23210', 'Ambahive'),
('MDG23210232', 'MDG23210', 'Ambandrika'),
('MDG23210233', 'MDG23210', 'Ambalaroka'),
('MDG23210250', 'MDG23210', 'Vohimanitra'),
('MDG23210271', 'MDG23210', 'Mitanty'),
('MDG23210272', 'MDG23210', 'Analavory'),
('MDG23210291', 'MDG23210', 'Bekatra'),
('MDG23210292', 'MDG23210', 'Vinanitelo'),
('MDG23210311', 'MDG23210', 'Ampasimanjeva'),
('MDG23210312', 'MDG23210', 'Ambotaka'),
('MDG23210313', 'MDG23210', 'Nihaonana'),
('MDG23210330', 'MDG23210', 'Mavorano'),
('MDG23210351', 'MDG23210', 'Vohimasina Nord'),
('MDG23210352', 'MDG23210', 'Vohimasina Sud'),
('MDG23210353', 'MDG23210', 'Betampona'),
('MDG23210370', 'MDG23210', 'Vohilava'),
('MDG23210390', 'MDG23210', 'Fenomby'),
('MDG23210410', 'MDG23210', 'Ambalavero'),
('MDG23210430', 'MDG23210', 'Amborondra'),
('MDG23210451', 'MDG23210', 'Mahabako'),
('MDG23210452', 'MDG23210', 'Onilahy'),
('MDG23210471', 'MDG23210', 'Mahamaibe'),
('MDG23210472', 'MDG23210', 'Kianjanomby'),
('MDG23210490', 'MDG23210', 'Ampasimpotsy Sud'),
('MDG23210510', 'MDG23210', 'Anteza'),
('MDG23210531', 'MDG23210', 'Saharefo'),
('MDG23210532', 'MDG23210', 'Ampasimboraka'),
('MDG23211011', 'MDG23211', 'Ikongo'),
('MDG23211012', 'MDG23211', 'Ambolomadinika'),
('MDG23211031', 'MDG23211', 'Ambatofotsy'),
('MDG23211032', 'MDG23211', 'Belemoka'),
('MDG23211033', 'MDG23211', 'Maromiandra'),
('MDG23211051', 'MDG23211', 'Manampatrana'),
('MDG23211052', 'MDG23211', 'Ambinanitromby'),
('MDG23211071', 'MDG23211', 'Ifanirea'),
('MDG23211072', 'MDG23211', 'Tanakambana'),
('MDG23211073', 'MDG23211', 'Sahalanona'),
('MDG23211091', 'MDG23211', 'Tolongoina'),
('MDG23211092', 'MDG23211', 'Ambohimisafy'),
('MDG23211111', 'MDG23211', 'Ankarimbelo'),
('MDG23211112', 'MDG23211', 'Antodinga'),
('MDG23211113', 'MDG23211', 'Kalafotsy'),
('MDG23212010', 'MDG23212', 'Vohipeno'),
('MDG23212031', 'MDG23212', 'Vohitrindry'),
('MDG23212032', 'MDG23212', 'Vohindava'),
('MDG23212051', 'MDG23212', 'Ivato'),
('MDG23212052', 'MDG23212', 'Savana'),
('MDG23212053', 'MDG23212', 'Anoloka'),
('MDG23212070', 'MDG23212', 'Mahabo'),
('MDG23212090', 'MDG23212', 'Ankarimbary'),
('MDG23212110', 'MDG23212', 'Lanivo'),
('MDG23212130', 'MDG23212', 'Nato'),
('MDG23212150', 'MDG23212', 'Mahasoabe'),
('MDG23212171', 'MDG23212', 'Onjatsy'),
('MDG23212172', 'MDG23212', 'Vohilany'),
('MDG23212190', 'MDG23212', 'Andemaka'),
('MDG23212211', 'MDG23212', 'Ifatsy'),
('MDG23212212', 'MDG23212', 'Antananabo'),
('MDG23212230', 'MDG23212', 'Ilakatra'),
('MDG23212250', 'MDG23212', 'Sahalava'),
('MDG23212270', 'MDG23212', 'Mahazoarivo'),
('MDG25213010', 'MDG25213', 'Farafangana'),
('MDG25213030', 'MDG25213', 'Vohimasy'),
('MDG25213050', 'MDG25213', 'Anosivelo'),
('MDG25213070', 'MDG25213', 'Anosy Tsararafa'),
('MDG25213090', 'MDG25213', 'Vohitromby'),
('MDG25213110', 'MDG25213', 'Ivandrika'),
('MDG25213130', 'MDG25213', 'Manambotra Atsimo'),
('MDG25213150', 'MDG25213', 'Mahavelo'),
('MDG25213170', 'MDG25213', 'Mahafasa Centre'),
('MDG25213190', 'MDG25213', 'Amporoforo'),
('MDG25213210', 'MDG25213', 'Iabohazo'),
('MDG25213230', 'MDG25213', 'Tangainony'),
('MDG25213250', 'MDG25213', 'Beretra Bevoay'),
('MDG25213270', 'MDG25213', 'Ambohigogo'),
('MDG25213290', 'MDG25213', 'Maheriraty'),
('MDG25213310', 'MDG25213', 'Mahabo Mananivo'),
('MDG25213330', 'MDG25213', 'Ambohimandroso'),
('MDG25213350', 'MDG25213', 'Ankarana Miraihina'),
('MDG25213370', 'MDG25213', 'Evato'),
('MDG25213390', 'MDG25213', 'Etrotroka Atsimo'),
('MDG25213410', 'MDG25213', 'Ambalavato Nord'),
('MDG25213430', 'MDG25213', 'Efatsy'),
('MDG25213450', 'MDG25213', 'Tovona'),
('MDG25213471', 'MDG25213', 'Ambalatany'),
('MDG25213472', 'MDG25213', 'Namohora Iaborano'),
('MDG25213490', 'MDG25213', 'Sahamadio'),
('MDG25213510', 'MDG25213', 'Fenoarivo'),
('MDG25213530', 'MDG25213', 'Antseranambe'),
('MDG25213551', 'MDG25213', 'Ihorombe'),
('MDG25213552', 'MDG25213', 'Ambalavato Antevato'),
('MDG25213570', 'MDG25213', 'Vohilengo'),
('MDG25213590', 'MDG25213', 'Marovandrika'),
('MDG25214010', 'MDG25214', 'Vangaindrano'),
('MDG25214031', 'MDG25214', 'Ampasimalemy'),
('MDG25214032', 'MDG25214', 'Tsianofana'),
('MDG25214033', 'MDG25214', 'Bekaraoky'),
('MDG25214050', 'MDG25214', 'Tsiately'),
('MDG25214070', 'MDG25214', 'Soamanova'),
('MDG25214091', 'MDG25214', 'Lopary'),
('MDG25214092', 'MDG25214', 'Bema'),
('MDG25214111', 'MDG25214', 'Vohitrambo'),
('MDG25214112', 'MDG25214', 'Anilobe'),
('MDG25214131', 'MDG25214', 'Lohafary'),
('MDG25214132', 'MDG25214', 'Ampataka'),
('MDG25214151', 'MDG25214', 'Matanga'),
('MDG25214152', 'MDG25214', 'Masianaka'),
('MDG25214171', 'MDG25214', 'Vohipaho'),
('MDG25214172', 'MDG25214', 'Marokibo'),
('MDG25214190', 'MDG25214', 'Ranomena'),
('MDG25214211', 'MDG25214', 'Ambongo'),
('MDG25214212', 'MDG25214', 'Ambatolava'),
('MDG25214230', 'MDG25214', 'Iara'),
('MDG25214251', 'MDG25214', 'Bevata'),
('MDG25214252', 'MDG25214', 'Karimbary'),
('MDG25214270', 'MDG25214', 'Manambondro'),
('MDG25214290', 'MDG25214', 'Fenoambany'),
('MDG25214311', 'MDG25214', 'Isahara'),
('MDG25214312', 'MDG25214', 'Vohimalaza'),
('MDG25214313', 'MDG25214', 'Vatanato'),
('MDG25214331', 'MDG25214', 'Amparihy Est'),
('MDG25214332', 'MDG25214', 'Sandravinany'),
('MDG25215011', 'MDG25215', 'Nosifeno'),
('MDG25215012', 'MDG25215', 'Ankazovelo'),
('MDG25215031', 'MDG25215', 'Andranolalina'),
('MDG25215032', 'MDG25215', 'Maliorano'),
('MDG25215051', 'MDG25215', 'Ivondro'),
('MDG25215052', 'MDG25215', 'Soakibany'),
('MDG24216010', 'MDG24216', 'Ihosy'),
('MDG24216031', 'MDG24216', 'Ankily'),
('MDG24216032', 'MDG24216', 'Ambia'),
('MDG24216033', 'MDG24216', 'Tolohomiady'),
('MDG24216050', 'MDG24216', 'Irina'),
('MDG24216070', 'MDG24216', 'Sahambano'),
('MDG24216090', 'MDG24216', 'Analaliry'),
('MDG24216110', 'MDG24216', 'Mahasoa'),
('MDG24216131', 'MDG24216', 'Ambatolahy'),
('MDG24216132', 'MDG24216', 'Soamatasy'),
('MDG24216151', 'MDG24216', 'Zazafotsy'),
('MDG24216152', 'MDG24216', 'Antsoha'),
('MDG24216170', 'MDG24216', 'Sakalalina'),
('MDG24216191', 'MDG24216', 'Satrokala'),
('MDG24216192', 'MDG24216', 'Andiolava'),
('MDG24216210', 'MDG24216', 'Analavoka'),
('MDG24216231', 'MDG24216', 'Ranohira'),
('MDG24216232', 'MDG24216', 'Ilakaka'),
('MDG24216250', 'MDG24216', 'Menamaty Iloto'),
('MDG25217011', 'MDG25217', 'Vondrozo'),
('MDG25217012', 'MDG25217', 'Manambidala'),
('MDG25217013', 'MDG25217', 'Anandravy'),
('MDG25217030', 'MDG25217', 'Mahatsinjo'),
('MDG25217051', 'MDG25217', 'Mahazoarivo'),
('MDG25217052', 'MDG25217', 'Iamonta'),
('MDG25217071', 'MDG25217', 'Vohimary'),
('MDG25217072', 'MDG25217', 'Antokonala'),
('MDG25217090', 'MDG25217', 'Ambohimana'),
('MDG25217111', 'MDG25217', 'Karianga'),
('MDG25217112', 'MDG25217', 'Manato'),
('MDG25217130', 'MDG25217', 'Ivato'),
('MDG25217150', 'MDG25217', 'Mahavelo'),
('MDG25217170', 'MDG25217', 'Andakana'),
('MDG25217191', 'MDG25217', 'Moroteza'),
('MDG25217192', 'MDG25217', 'Vohiboreka'),
('MDG24218010', 'MDG24218', 'Ivohibe'),
('MDG24218030', 'MDG24218', 'Antambohobe'),
('MDG24218050', 'MDG24218', 'Maropaika'),
('MDG24218070', 'MDG24218', 'Ivongo'),
('MDG21219010', 'MDG21219', 'Ikalamavony'),
('MDG21219030', 'MDG21219', 'Mangidy'),
('MDG21219050', 'MDG21219', 'Solila'),
('MDG21219070', 'MDG21219', 'Ambatomainty'),
('MDG21219090', 'MDG21219', 'Fitampito'),
('MDG21219110', 'MDG21219', 'Tanamarina Sakay'),
('MDG21219130', 'MDG21219', 'Tsitondroina'),
('MDG21219150', 'MDG21219', 'Tanamarina Bekisopa'),
('MDG21220011', 'MDG21220', 'Andrainjato Centre'),
('MDG21220012', 'MDG21220', 'Andrainjato Est'),
('MDG21220030', 'MDG21220', 'Ambalakely'),
('MDG21220070', 'MDG21220', 'Ivoamba'),
('MDG21220090', 'MDG21220', 'Taindambo'),
('MDG21220111', 'MDG21220', 'Mahatsinjony'),
('MDG21220112', 'MDG21220', 'Sahambavy'),
('MDG21220210', 'MDG21220', 'Ambalamahasoa'),
('MDG21220250', 'MDG21220', 'Alakamisy Ambohimaha'),
('MDG21220330', 'MDG21220', 'Androy'),
('MDG21220350', 'MDG21220', 'Alatsinainy Ialamarina'),
('MDG21220430', 'MDG21220', 'Fandrandava'),
('MDG21220630', 'MDG21220', 'Ialananindro'),
('MDG24221010', 'MDG24221', 'Iakora'),
('MDG24221030', 'MDG24221', 'Ranotsara Nord'),
('MDG24221050', 'MDG24221', 'Begogo'),
('MDG25222011', 'MDG25222', 'Befotaka Sud'),
('MDG25222012', 'MDG25222', 'Antondabe'),
('MDG25222031', 'MDG25222', 'Marovitsika Sud'),
('MDG25222032', 'MDG25222', 'AnTaninarenina'),
('MDG25222051', 'MDG25222', 'Ranotsara Sud'),
('MDG25222052', 'MDG25222', 'Beharena'),
('MDG25222053', 'MDG25222', 'Bekofafa Sud'),
('MDG22223010', 'MDG22223', 'Ambovombe Centre'),
('MDG22223030', 'MDG22223', 'Ambohimahazo'),
('MDG22223050', 'MDG22223', 'Anjoma Nandihizana'),
('MDG22223070', 'MDG22223', 'Ambohimilanja'),
('MDG22223090', 'MDG22223', 'Ambohipo'),
('MDG22223110', 'MDG22223', 'Anjoman\'ankona'),
('MDG22223130', 'MDG22223', 'Vinany Andakatanikely'),
('MDG22223150', 'MDG22223', 'Talata Vohimena'),
('MDG22223171', 'MDG22223', 'Ambatomarina'),
('MDG22223172', 'MDG22223', 'Andakatany'),
('MDG21224010', 'MDG21224', 'Mahasoabe'),
('MDG21224030', 'MDG21224', 'Vinanitelo'),
('MDG21224050', 'MDG21224', 'Alakamisy Itenina'),
('MDG21224070', 'MDG21224', 'Talata Ampano'),
('MDG21224090', 'MDG21224', 'Ihazoara'),
('MDG21224110', 'MDG21224', 'Ankaromalaza Mifanasoa'),
('MDG21224130', 'MDG21224', 'Vohimarina'),
('MDG21224150', 'MDG21224', 'Maneva'),
('MDG21224170', 'MDG21224', 'Vohitrafeno'),
('MDG21224190', 'MDG21224', 'Andranovorivato'),
('MDG21224210', 'MDG21224', 'Vohibato Ouest'),
('MDG21224230', 'MDG21224', 'Andranomiditra'),
('MDG21224250', 'MDG21224', 'Soaindrana'),
('MDG21224270', 'MDG21224', 'Mahaditra'),
('MDG21225010', 'MDG21225', 'Isorana'),
('MDG21225030', 'MDG21225', 'Anjoma Itsara'),
('MDG21225050', 'MDG21225', 'Andoharanomaitso'),
('MDG21225070', 'MDG21225', 'Ambondrona'),
('MDG21225090', 'MDG21225', 'Ambalamidera II'),
('MDG21225110', 'MDG21225', 'Ankarinarivo Manirisoa'),
('MDG21225130', 'MDG21225', 'Soatanana'),
('MDG21225150', 'MDG21225', 'Nasandratrony'),
('MDG21225170', 'MDG21225', 'Mahazoarivo'),
('MDG21225190', 'MDG21225', 'Fanjakana'),
('MDG21225210', 'MDG21225', 'Iavonomby Vohibola'),
('MDG31301001', 'MDG31301', 'Ambodimanga'),
('MDG31301002', 'MDG31301', 'Anjoma'),
('MDG31301003', 'MDG31301', 'Morarano'),
('MDG31301004', 'MDG31301', 'Tanambao V'),
('MDG31301005', 'MDG31301', 'Ankirihiry'),
('MDG32302019', 'MDG32302', 'Sainte Marie'),
('MDG32303010', 'MDG32303', 'Maroantsetra'),
('MDG32303031', 'MDG32303', 'Anjanazana'),
('MDG32303032', 'MDG32303', 'Manambolo'),
('MDG32303051', 'MDG32303', 'Andranofotsy'),
('MDG32303052', 'MDG32303', 'Antakotako'),
('MDG32303070', 'MDG32303', 'Ankofa'),
('MDG32303090', 'MDG32303', 'Ambinanitelo'),
('MDG32303111', 'MDG32303', 'Anjahana'),
('MDG32303112', 'MDG32303', 'Ambanizana'),
('MDG32303113', 'MDG32303', 'Mahalevona'),
('MDG32303131', 'MDG32303', 'Voloina'),
('MDG32303132', 'MDG32303', 'Ankofabe'),
('MDG32303133', 'MDG32303', 'Antsirabe Sahatany'),
('MDG32303151', 'MDG32303', 'Rantabe'),
('MDG32303152', 'MDG32303', 'Morafeno'),
('MDG32303153', 'MDG32303', 'Androndrono'),
('MDG32303154', 'MDG32303', 'Ambodimanga Rantabe'),
('MDG32303155', 'MDG32303', 'Anandrivola'),
('MDG32304011', 'MDG32304', 'Mananara Avaratra'),
('MDG32304012', 'MDG32304', 'Ambodivoanio'),
('MDG32304013', 'MDG32304', 'Imorona'),
('MDG32304031', 'MDG32304', 'Antanambaobe'),
('MDG32304032', 'MDG32304', 'Antanananivo'),
('MDG32304050', 'MDG32304', 'Manambolosy'),
('MDG32304070', 'MDG32304', 'Ambodiampana'),
('MDG32304091', 'MDG32304', 'Sandrakatsy'),
('MDG32304092', 'MDG32304', 'Tanibe'),
('MDG32304093', 'MDG32304', 'Ambatoharanana'),
('MDG32304110', 'MDG32304', 'Antanambe'),
('MDG32304130', 'MDG32304', 'Saromaona'),
('MDG32304151', 'MDG32304', 'Vanono'),
('MDG32304152', 'MDG32304', 'Andasibe I'),
('MDG32305010', 'MDG32305', 'Fenerive Est'),
('MDG32305030', 'MDG32305', 'Ambodimanga II'),
('MDG32305050', 'MDG32305', 'Mahambo'),
('MDG32305070', 'MDG32305', 'Ampasina Maningory'),
('MDG32305090', 'MDG32305', 'Ambatoharanana'),
('MDG32305110', 'MDG32305', 'Vohilengo'),
('MDG32305130', 'MDG32305', 'Saranambana'),
('MDG32305150', 'MDG32305', 'Ampasimbe Manantsatrana'),
('MDG32305170', 'MDG32305', 'Miorimivalana'),
('MDG32305190', 'MDG32305', 'Vohipeno'),
('MDG32305210', 'MDG32305', 'Antsiatsiaka'),
('MDG32305238', 'MDG32305', 'Mahanoro'),
('MDG31306010', 'MDG31306', 'Brickaville'),
('MDG31306030', 'MDG31306', 'Vohitranivona'),
('MDG31306050', 'MDG31306', 'Anivorano Est'),
('MDG31306070', 'MDG31306', 'Mahatsara'),
('MDG31306090', 'MDG31306', 'Andovoranto'),
('MDG31306110', 'MDG31306', 'Ambinaninony'),
('MDG31306130', 'MDG31306', 'Fetraomby'),
('MDG31306150', 'MDG31306', 'Vohipeno Razanaka'),
('MDG31306171', 'MDG31306', 'Ranomafana Est'),
('MDG31306172', 'MDG31306', 'Ampasimbe'),
('MDG31306190', 'MDG31306', 'Fanasana'),
('MDG31306210', 'MDG31306', 'Ambalarondra'),
('MDG31306230', 'MDG31306', 'Maroseranana'),
('MDG31306251', 'MDG31306', 'Lohariandava'),
('MDG31306252', 'MDG31306', 'Andekaleka'),
('MDG31306270', 'MDG31306', 'Ambohimanana'),
('MDG31306290', 'MDG31306', 'Anjahamana'),
('MDG31307010', 'MDG31307', 'Vatomandry'),
('MDG31307030', 'MDG31307', 'Ambodivoananto'),
('MDG31307051', 'MDG31307', 'Maintinandry'),
('MDG31307052', 'MDG31307', 'Tanambao Vahatrakaka'),
('MDG31307053', 'MDG31307', 'Tsarasambo'),
('MDG31307070', 'MDG31307', 'Sahamatevina'),
('MDG31307091', 'MDG31307', 'Antanambao Mahatsara'),
('MDG31307092', 'MDG31307', 'Iamborano'),
('MDG31307110', 'MDG31307', 'Ambalavolo'),
('MDG31307131', 'MDG31307', 'Amboditavolo'),
('MDG31307132', 'MDG31307', 'Niherenana'),
('MDG31307151', 'MDG31307', 'Ilaka Est'),
('MDG31307152', 'MDG31307', 'Niarovana Caroline'),
('MDG31307171', 'MDG31307', 'Tsivangiana'),
('MDG31307172', 'MDG31307', 'Ampasimazava'),
('MDG31307190', 'MDG31307', 'Ampasimadinika'),
('MDG31307210', 'MDG31307', 'Ifasina I'),
('MDG31307230', 'MDG31307', 'Ambalabe'),
('MDG31307250', 'MDG31307', 'Ifasina II'),
('MDG31308011', 'MDG31308', 'Mahanoro'),
('MDG31308012', 'MDG31308', 'Betsizaraina'),
('MDG31308030', 'MDG31308', 'Tsaravinany'),
('MDG31308050', 'MDG31308', 'Ambodiharina'),
('MDG31308070', 'MDG31308', 'Manjakandriana'),
('MDG31308090', 'MDG31308', 'Masomeloka'),
('MDG31308110', 'MDG31308', 'Ambinanidilana'),
('MDG31308130', 'MDG31308', 'Ambodibonara'),
('MDG31308150', 'MDG31308', 'Ankazotsifantatra'),
('MDG31308170', 'MDG31308', 'Ambinanindrano'),
('MDG31308190', 'MDG31308', 'Befotaka'),
('MDG31309010', 'MDG31309', 'Marolambo'),
('MDG31309031', 'MDG31309', 'Betampona'),
('MDG31309032', 'MDG31309', 'Tanambao Rabemanana'),
('MDG31309050', 'MDG31309', 'Andonabe Sud'),
('MDG31309071', 'MDG31309', 'Ambalapaiso II'),
('MDG31309072', 'MDG31309', 'Ambodivoangy'),
('MDG31309090', 'MDG31309', 'Ambohimilanja'),
('MDG31309110', 'MDG31309', 'Ambatofisaka II'),
('MDG31309131', 'MDG31309', 'Androrangavola'),
('MDG31309132', 'MDG31309', 'Anosiarivo I'),
('MDG31309150', 'MDG31309', 'Amboasary'),
('MDG31309170', 'MDG31309', 'Lohavanana'),
('MDG31309191', 'MDG31309', 'Ambodinonoka'),
('MDG31309192', 'MDG31309', 'Sahakevo'),
('MDG31310010', 'MDG31310', 'Toamasina Suburbaine'),
('MDG31310030', 'MDG31310', 'Antetezambaro'),
('MDG31310050', 'MDG31310', 'Fanandrana'),
('MDG31310070', 'MDG31310', 'Ambodiriana'),
('MDG31310091', 'MDG31310', 'Ampasimadinika Manambolo'),
('MDG31310092', 'MDG31310', 'Amboditandroroho'),
('MDG31310110', 'MDG31310', 'Mahavelona (Foulpointe)'),
('MDG31310130', 'MDG31310', 'Sahambala'),
('MDG31310150', 'MDG31310', 'Ambodilazana'),
('MDG31310170', 'MDG31310', 'Ampasimbe Onibe'),
('MDG31310191', 'MDG31310', 'Mangabe'),
('MDG31310192', 'MDG31310', 'Amporoforo'),
('MDG31310193', 'MDG31310', 'Antenina'),
('MDG31310211', 'MDG31310', 'Andondabe'),
('MDG31310212', 'MDG31310', 'Ampisokina'),
('MDG31310230', 'MDG31310', 'Andranobolaha'),
('MDG31310250', 'MDG31310', 'Fito'),
('MDG31311010', 'MDG31311', 'Antanambao Manampontsy'),
('MDG31311030', 'MDG31311', 'Mahela'),
('MDG31311050', 'MDG31311', 'Saivaza'),
('MDG31311070', 'MDG31311', 'Antanandehibe'),
('MDG31311090', 'MDG31311', 'Manakana'),
('MDG33312011', 'MDG33312', 'Amparafaravola'),
('MDG33312012', 'MDG33312', 'Bedidy'),
('MDG33312013', 'MDG33312', 'Ambohimandroso'),
('MDG33312014', 'MDG33312', 'Sahamamy'),
('MDG33312031', 'MDG33312', 'Ambatomainty'),
('MDG33312032', 'MDG33312', 'Ampasikely'),
('MDG33312033', 'MDG33312', 'Andrebakely Sud'),
('MDG33312051', 'MDG33312', 'Ambohitrarivo'),
('MDG33312052', 'MDG33312', 'Anororo'),
('MDG33312071', 'MDG33312', 'Morarano Chrome'),
('MDG33312072', 'MDG33312', 'Ranomainty'),
('MDG33312090', 'MDG33312', 'Ambohijanahary'),
('MDG33312111', 'MDG33312', 'Tanambe'),
('MDG33312112', 'MDG33312', 'Beanana'),
('MDG33312113', 'MDG33312', 'Vohitsara'),
('MDG33312131', 'MDG33312', 'Amboavory'),
('MDG33312132', 'MDG33312', 'Andilana Nord'),
('MDG33312133', 'MDG33312', 'Ambodimanga'),
('MDG33312151', 'MDG33312', 'Vohimena'),
('MDG33312152', 'MDG33312', 'Andrebakely Nord'),
('MDG33313010', 'MDG33313', 'Ambatondrazaka'),
('MDG33313031', 'MDG33313', 'Feramanga Nord'),
('MDG33313032', 'MDG33313', 'Ambatondrazaka Suburbaine'),
('MDG33313033', 'MDG33313', 'Ambandrika'),
('MDG33313050', 'MDG33313', 'Ampitatsimo'),
('MDG33313070', 'MDG33313', 'Ambohitsilaozana'),
('MDG33313090', 'MDG33313', 'Ilafy'),
('MDG33313111', 'MDG33313', 'Manakambahiny Andrefana'),
('MDG33313112', 'MDG33313', 'Antsangasanga'),
('MDG33313130', 'MDG33313', 'Ambatosoratra'),
('MDG33313151', 'MDG33313', 'Andilanatoby'),
('MDG33313152', 'MDG33313', 'Bejofo'),
('MDG33313170', 'MDG33313', 'Didy'),
('MDG33313191', 'MDG33313', 'Imerimandroso'),
('MDG33313192', 'MDG33313', 'Amparihintsokatra'),
('MDG33313194', 'MDG33313', 'Andromba'),
('MDG33313210', 'MDG33313', 'Manakambahiny Antsinanana'),
('MDG33313231', 'MDG33313', 'Soalazaina'),
('MDG33313232', 'MDG33313', 'Tanambao Besakay'),
('MDG33314010', 'MDG33314', 'Moramanga'),
('MDG33314030', 'MDG33314', 'Ambohibary'),
('MDG33314050', 'MDG33314', 'Ampasimpotsy Gara'),
('MDG33314070', 'MDG33314', 'Andasibe'),
('MDG33314091', 'MDG33314', 'Anosibe Ifody'),
('MDG33314092', 'MDG33314', 'Vodiriana'),
('MDG33314110', 'MDG33314', 'Morarano Gara'),
('MDG33314130', 'MDG33314', 'Belavabary'),
('MDG33314150', 'MDG33314', 'Sabotsy Anjiro'),
('MDG33314170', 'MDG33314', 'Ambohidronono'),
('MDG33314190', 'MDG33314', 'Beforona'),
('MDG33314210', 'MDG33314', 'Ambatovola'),
('MDG33314230', 'MDG33314', 'Lakato'),
('MDG33314250', 'MDG33314', 'Amboasary'),
('MDG33314270', 'MDG33314', 'Fierenana'),
('MDG33314291', 'MDG33314', 'Mandialaza'),
('MDG33314292', 'MDG33314', 'Antaniditra'),
('MDG33314293', 'MDG33314', 'Ampasipotsy Mandialaza'),
('MDG33314310', 'MDG33314', 'Antanandava'),
('MDG33314330', 'MDG33314', 'Mangarivotra'),
('MDG33314350', 'MDG33314', 'Andaingo'),
('MDG32315010', 'MDG32315', 'Vavatenina'),
('MDG32315030', 'MDG32315', 'Maromitety'),
('MDG32315050', 'MDG32315', 'Ambohibe'),
('MDG32315070', 'MDG32315', 'Ampasimazava'),
('MDG32315091', 'MDG32315', 'Anjahambe'),
('MDG32315092', 'MDG32315', 'Ambatoharanana'),
('MDG32315110', 'MDG32315', 'Andasibe'),
('MDG32315130', 'MDG32315', 'Miarinarivo'),
('MDG32315150', 'MDG32315', 'Sahatavy'),
('MDG32315170', 'MDG32315', 'Ambodimangavalo'),
('MDG33316011', 'MDG33316', 'Andilamena'),
('MDG33316012', 'MDG33316', 'Bemaitso'),
('MDG33316031', 'MDG33316', 'Antanimenabaka'),
('MDG33316032', 'MDG33316', 'Tanananifololahy'),
('MDG33316051', 'MDG33316', 'Maroadabo'),
('MDG33316052', 'MDG33316', 'Marovato'),
('MDG33316071', 'MDG33316', 'Miarinarivo'),
('MDG33316072', 'MDG33316', 'Maitsokely'),
('MDG33317011', 'MDG33317', 'Anosibe An\'ala'),
('MDG33317012', 'MDG33317', 'Ampasimaneva'),
('MDG33317031', 'MDG33317', 'Ampandroantraka'),
('MDG33317032', 'MDG33317', 'Tratramarina'),
('MDG33317051', 'MDG33317', 'Antandrokomby'),
('MDG33317052', 'MDG33317', 'Ambalaomby'),
('MDG33317053', 'MDG33317', 'Niarovana Marosampanana'),
('MDG33317054', 'MDG33317', 'Tsaravinany'),
('MDG33317071', 'MDG33317', 'Longozabe'),
('MDG33317072', 'MDG33317', 'Ambatoharanana'),
('MDG32318011', 'MDG32318', 'Soanierana Ivongo'),
('MDG32318012', 'MDG32318', 'Fotsialanana'),
('MDG32318030', 'MDG32318', 'Antanifotsy'),
('MDG32318050', 'MDG32318', 'Ambodiampana'),
('MDG32318070', 'MDG32318', 'Andapafito'),
('MDG32318090', 'MDG32318', 'Ambahoabe'),
('MDG32318110', 'MDG32318', 'Manompana'),
('MDG32318130', 'MDG32318', 'Antenina'),
('MDG41401001', 'MDG41401', 'Mahajanga'),
('MDG41401002', 'MDG41401', 'Mahabibo'),
('MDG44402011', 'MDG44402', 'Besalampy'),
('MDG44402012', 'MDG44402', 'Ampako'),
('MDG44402030', 'MDG44402', 'Marovoay Sud'),
('MDG44402050', 'MDG44402', 'Soanenga'),
('MDG44402071', 'MDG44402', 'Bekodoka'),
('MDG44402072', 'MDG44402', 'Ambolodia Sud'),
('MDG44402090', 'MDG44402', 'Ankasakasa Tsibiray'),
('MDG44402110', 'MDG44402', 'Mahabe'),
('MDG41403010', 'MDG41403', 'Soalala'),
('MDG41403030', 'MDG41403', 'Ambohipaky'),
('MDG41403050', 'MDG41403', 'Andranomavo'),
('MDG43404010', 'MDG43404', 'Maevatanana I'),
('MDG43404031', 'MDG43404', 'Maevatanana II'),
('MDG43404032', 'MDG43404', 'Beratsimanina'),
('MDG43404050', 'MDG43404', 'Bemokotra'),
('MDG43404070', 'MDG43404', 'Mahazoma'),
('MDG43404091', 'MDG43404', 'Antsiafabositra'),
('MDG43404092', 'MDG43404', 'Antanimbary'),
('MDG43404111', 'MDG43404', 'Tsararano'),
('MDG43404112', 'MDG43404', 'Ambalajia'),
('MDG43404131', 'MDG43404', 'Ambalanjanakomby'),
('MDG43404132', 'MDG43404', 'Marokoro'),
('MDG43404150', 'MDG43404', 'Maria'),
('MDG43404171', 'MDG43404', 'Andriba'),
('MDG43404172', 'MDG43404', 'Mahatsinjo'),
('MDG43404173', 'MDG43404', 'Morafeno'),
('MDG43404191', 'MDG43404', 'Mangabe'),
('MDG43404192', 'MDG43404', 'Madiromirafy'),
('MDG41405019', 'MDG41405', 'Ambato Ambarimay'),
('MDG41405051', 'MDG41405', 'Ankijabe'),
('MDG41405052', 'MDG41405', 'Andranofasika'),
('MDG41405070', 'MDG41405', 'Madirovalo'),
('MDG41405090', 'MDG41405', 'Anjiajia'),
('MDG41405111', 'MDG41405', 'Tsaramandroso'),
('MDG41405112', 'MDG41405', 'Ambondromamy'),
('MDG41405130', 'MDG41405', 'Ankirihitra'),
('MDG41405150', 'MDG41405', 'Andranomamy'),
('MDG41405170', 'MDG41405', 'Manerinerina'),
('MDG41405190', 'MDG41405', 'Sitampiky'),
('MDG41406010', 'MDG41406', 'Marovoay Ville'),
('MDG41406031', 'MDG41406', 'Marovoay Banlieue'),
('MDG41406032', 'MDG41406', 'Antanambao Andranolava'),
('MDG41406033', 'MDG41406', 'Anosinalainolona'),
('MDG41406051', 'MDG41406', 'Ambolomoty'),
('MDG41406052', 'MDG41406', 'Marosakoa'),
('MDG41406070', 'MDG41406', 'Tsararano'),
('MDG41406090', 'MDG41406', 'Ankazomborona'),
('MDG41406111', 'MDG41406', 'Manaratsandry'),
('MDG41406112', 'MDG41406', 'Antanimasaka'),
('MDG41406130', 'MDG41406', 'Bemaharivo'),
('MDG41406158', 'MDG41406', 'Ankaraobato'),
('MDG41407011', 'MDG41407', 'Mitsinjo'),
('MDG41407012', 'MDG41407', 'Antseza'),
('MDG41407030', 'MDG41407', 'Antongomena Bevary'),
('MDG41407050', 'MDG41407', 'Matsakabanja'),
('MDG41407070', 'MDG41407', 'Katsepy'),
('MDG41407091', 'MDG41407', 'Bekipay'),
('MDG41407092', 'MDG41407', 'Ambarimaninga'),
('MDG43408010', 'MDG43408', 'Tsaratanana'),
('MDG43408030', 'MDG43408', 'Bekapaika'),
('MDG43408050', 'MDG43408', 'Tsararova'),
('MDG43408070', 'MDG43408', 'Betrandraka'),
('MDG43408090', 'MDG43408', 'Keliloha'),
('MDG43408110', 'MDG43408', 'Sarobaratra'),
('MDG43408130', 'MDG43408', 'Ampandrana'),
('MDG43408150', 'MDG43408', 'Andriamena'),
('MDG43408170', 'MDG43408', 'Ambakireny'),
('MDG43408190', 'MDG43408', 'Brieville'),
('MDG43408210', 'MDG43408', 'Sakoamadinika'),
('MDG43408230', 'MDG43408', 'Manakana'),
('MDG42409010', 'MDG42409', 'Port Berge'),
('MDG42409031', 'MDG42409', 'Ambanjabe'),
('MDG42409032', 'MDG42409', 'Tsaratanana I'),
('MDG42409050', 'MDG42409', 'Tsarahasina'),
('MDG42409070', 'MDG42409', 'Tsiningia'),
('MDG42409091', 'MDG42409', 'Andranomeva'),
('MDG42409092', 'MDG42409', 'Amparihy'),
('MDG42409111', 'MDG42409', 'Leanja'),
('MDG42409112', 'MDG42409', 'Ambodisakoana'),
('MDG42409131', 'MDG42409', 'Tsinjomitondraka'),
('MDG42409132', 'MDG42409', 'Maevaranohely'),
('MDG42409150', 'MDG42409', 'Marovato'),
('MDG42409171', 'MDG42409', 'Ambodimahabibo'),
('MDG42409172', 'MDG42409', 'Ambodivongo'),
('MDG42409190', 'MDG42409', 'Port Berge II'),
('MDG42410010', 'MDG42410', 'Mandritsara'),
('MDG42410030', 'MDG42410', 'Antanandava'),
('MDG42410050', 'MDG42410', 'Antsoha'),
('MDG42410070', 'MDG42410', 'Tsaratanana'),
('MDG42410090', 'MDG42410', 'Kalandy'),
('MDG42410111', 'MDG42410', 'Antsirabe Centre'),
('MDG42410112', 'MDG42410', 'Antsiatsiaka'),
('MDG42410130', 'MDG42410', 'Amboaboa'),
('MDG42410150', 'MDG42410', 'Manampaneva'),
('MDG42410171', 'MDG42410', 'Ambarikorano'),
('MDG42410172', 'MDG42410', 'Andratamarina'),
('MDG42410191', 'MDG42410', 'Ambaripaika'),
('MDG42410192', 'MDG42410', 'Ambodiamontana Kianga'),
('MDG42410211', 'MDG42410', 'Ambalakirajy'),
('MDG42410212', 'MDG42410', 'Tsarajomoka'),
('MDG42410231', 'MDG42410', 'Antsatramidola'),
('MDG42410232', 'MDG42410', 'Ankiakabe-Fonoko'),
('MDG42410250', 'MDG42410', 'Marotandrano'),
('MDG42410270', 'MDG42410', 'Ambilombe'),
('MDG42410290', 'MDG42410', 'Andohajango'),
('MDG42410310', 'MDG42410', 'Anjiabe'),
('MDG42410330', 'MDG42410', 'Ambohisoa'),
('MDG42410350', 'MDG42410', 'Ampatakamaroreny'),
('MDG42410371', 'MDG42410', 'Ankiabe-Salohy'),
('MDG42410372', 'MDG42410', 'Pont Sofia'),
('MDG42410391', 'MDG42410', 'Ambodiadabo'),
('MDG42410392', 'MDG42410', 'Amborondolo'),
('MDG42410410', 'MDG42410', 'Antanambaon\'amberina'),
('MDG42411011', 'MDG42411', 'Analalava'),
('MDG42411012', 'MDG42411', 'Ambarijeby Sud'),
('MDG42411030', 'MDG42411', 'Ambolobozo'),
('MDG42411050', 'MDG42411', 'Befotaka Nord'),
('MDG42411070', 'MDG42411', 'Ambaliha'),
('MDG42411090', 'MDG42411', 'Maromandia'),
('MDG42411110', 'MDG42411', 'Marovatolena'),
('MDG42411131', 'MDG42411', 'Andribavontsona'),
('MDG42411132', 'MDG42411', 'Angoaka Sud'),
('MDG42411150', 'MDG42411', 'Marovantaza'),
('MDG42411170', 'MDG42411', 'Ankaramy'),
('MDG42411190', 'MDG42411', 'Antonibe'),
('MDG42411210', 'MDG42411', 'Mahadrodroka'),
('MDG42412010', 'MDG42412', 'Befandriana Nord'),
('MDG42412030', 'MDG42412', 'Morafeno'),
('MDG42412050', 'MDG42412', 'Ambodimotso Sud'),
('MDG42412070', 'MDG42412', 'Tsiamalao'),
('MDG42412090', 'MDG42412', 'Maroamalona'),
('MDG42412110', 'MDG42412', 'Tsarahonenana'),
('MDG42412130', 'MDG42412', 'Antsakanalabe'),
('MDG42412150', 'MDG42412', 'Ambararata'),
('MDG42412170', 'MDG42412', 'Ambolidibe Est'),
('MDG42412190', 'MDG42412', 'Ankarongana'),
('MDG42412210', 'MDG42412', 'Antsakabary'),
('MDG42412230', 'MDG42412', 'Matsondakana'),
('MDG42413010', 'MDG42413', 'Antsohihy'),
('MDG42413030', 'MDG42413', 'Ankerika'),
('MDG42413051', 'MDG42413', 'Ampandriankilandy'),
('MDG42413052', 'MDG42413', 'Anjalazala'),
('MDG42413070', 'MDG42413', 'Anahidrano'),
('MDG42413090', 'MDG42413', 'Ambodimandresy'),
('MDG42413110', 'MDG42413', 'Anjiamangirana'),
('MDG42413130', 'MDG42413', 'Ambodimanary'),
('MDG42413150', 'MDG42413', 'Antsahabe'),
('MDG42413171', 'MDG42413', 'Ambodimadiro'),
('MDG42413172', 'MDG42413', 'Andreba'),
('MDG42413190', 'MDG42413', 'Maroala'),
('MDG42414010', 'MDG42414', 'Bealanana'),
('MDG42414031', 'MDG42414', 'Beandrarezona'),
('MDG42414032', 'MDG42414', 'Antananivo Haut'),
('MDG42414050', 'MDG42414', 'Antsamaka'),
('MDG42414071', 'MDG42414', 'Ambatosia'),
('MDG42414072', 'MDG42414', 'Ambodiampana'),
('MDG42414090', 'MDG42414', 'Ambatoriha Est'),
('MDG42414110', 'MDG42414', 'Ambovonomby'),
('MDG42414131', 'MDG42414', 'Analila'),
('MDG42414132', 'MDG42414', 'Anjozoromadosy'),
('MDG42414151', 'MDG42414', 'Mangindrano'),
('MDG42414152', 'MDG42414', 'Ambararatabe Nord'),
('MDG42414171', 'MDG42414', 'Ambodisikidy'),
('MDG42414172', 'MDG42414', 'Ambararata Sofia'),
('MDG42414190', 'MDG42414', 'Marotolana'),
('MDG42414211', 'MDG42414', 'Ambodiadabo M'),
('MDG42414212', 'MDG42414', 'Ankazotokana'),
('MDG42414213', 'MDG42414', 'Ambalaromba'),
('MDG41415011', 'MDG41415', 'Belobaka'),
('MDG41415012', 'MDG41415', 'Boanamary'),
('MDG41415031', 'MDG41415', 'Ambalakida'),
('MDG41415032', 'MDG41415', 'Betsako'),
('MDG41415050', 'MDG41415', 'Mariarano'),
('MDG41415071', 'MDG41415', 'Bekobay'),
('MDG41415072', 'MDG41415', 'Andranoboka'),
('MDG41415091', 'MDG41415', 'Mahajamba Usine'),
('MDG41415092', 'MDG41415', 'Ambalabe Befanjava'),
('MDG43416011', 'MDG43416', 'Kandreho'),
('MDG43416012', 'MDG43416', 'Ambaliha'),
('MDG43416013', 'MDG43416', 'Behazomaty'),
('MDG43416051', 'MDG43416', 'Betaimboay'),
('MDG43416052', 'MDG43416', 'Andasibe'),
('MDG44417011', 'MDG44417', 'Ambatomainty'),
('MDG44417012', 'MDG44417', 'Bemarivo'),
('MDG44417031', 'MDG44417', 'Sarodrano'),
('MDG44417032', 'MDG44417', 'Marotsialeha'),
('MDG44420010', 'MDG44420', 'Antsalova'),
('MDG44420030', 'MDG44420', 'Soahany'),
('MDG44420050', 'MDG44420', 'Masoarivo'),
('MDG44420070', 'MDG44420', 'Trangahy'),
('MDG44420090', 'MDG44420', 'Bekopaka'),
('MDG44421010', 'MDG44421', 'Maintirano'),
('MDG44421030', 'MDG44421', 'Mafaijijo'),
('MDG44421050', 'MDG44421', 'Andabotoka'),
('MDG44421070', 'MDG44421', 'Betanatanana'),
('MDG44421090', 'MDG44421', 'Andrea'),
('MDG44421110', 'MDG44421', 'Ankisatra'),
('MDG44421130', 'MDG44421', 'Marohazo'),
('MDG44421150', 'MDG44421', 'Antsondrodava'),
('MDG44421170', 'MDG44421', 'Belitsaky'),
('MDG44421191', 'MDG44421', 'Tambohorano'),
('MDG44421192', 'MDG44421', 'Veromanga'),
('MDG44421193', 'MDG44421', 'Maromavo'),
('MDG44421194', 'MDG44421', 'Andranovao'),
('MDG44421210', 'MDG44421', 'Antsaidoha Bebao'),
('MDG44421231', 'MDG44421', 'Berevo/ranobe'),
('MDG44421232', 'MDG44421', 'Bebaboky Sud'),
('MDG44421233', 'MDG44421', 'Bemokotra Sud'),
('MDG44422010', 'MDG44422', 'Morafenobe'),
('MDG44422030', 'MDG44422', 'Andramy'),
('MDG44422050', 'MDG44422', 'Beravina'),
('MDG42423010', 'MDG42423', 'Mampikony I'),
('MDG42423030', 'MDG42423', 'Mampikony II'),
('MDG42423051', 'MDG42423', 'Ambohitoaka'),
('MDG42423052', 'MDG42423', 'Ankiririky'),
('MDG42423071', 'MDG42423', 'Bekoratsaka'),
('MDG42423072', 'MDG42423', 'Malakialina'),
('MDG42423073', 'MDG42423', 'Betaramahamay'),
('MDG42423090', 'MDG42423', 'Komajia'),
('MDG42423111', 'MDG42423', 'Ampasimatera'),
('MDG42423112', 'MDG42423', 'Ambodihazoambo'),
('MDG51501001', 'MDG51501', 'Tanambao I'),
('MDG51501002', 'MDG51501', 'Tanambao II Tsf Nord'),
('MDG51501003', 'MDG51501', 'Mahavatse I'),
('MDG51501004', 'MDG51501', 'Mahavatse II'),
('MDG51501005', 'MDG51501', 'Betania'),
('MDG51501006', 'MDG51501', 'Besakoa'),
('MDG54502010', 'MDG54502', 'Manja'),
('MDG54502030', 'MDG54502', 'Beharona'),
('MDG54502050', 'MDG54502', 'Anontsibe Centre'),
('MDG54502070', 'MDG54502', 'Soaserana'),
('MDG54502090', 'MDG54502', 'Ankiliabo'),
('MDG54502110', 'MDG54502', 'Andranopasy'),
('MDG51503011', 'MDG51503', 'Beroroha'),
('MDG51503012', 'MDG51503', 'Bemavo'),
('MDG51503030', 'MDG51503', 'Fanjakana'),
('MDG51503050', 'MDG51503', 'Behisatsy'),
('MDG51503070', 'MDG51503', 'Marerano'),
('MDG51503091', 'MDG51503', 'Mandronarivo'),
('MDG51503092', 'MDG51503', 'Tanamary'),
('MDG51503093', 'MDG51503', 'Sakena'),
('MDG51504010', 'MDG51504', 'Cu Morombe'),
('MDG51504030', 'MDG51504', 'Befandefa'),
('MDG51504050', 'MDG51504', 'Ambahikily'),
('MDG51504070', 'MDG51504', 'Antongo Vaovao'),
('MDG51504090', 'MDG51504', 'Nosy Ambositra');
INSERT INTO `commune` (`ID_COMMUNE`, `ID_DISTRICT`, `LIBELLE_COMMUNE`) VALUES
('MDG51504110', 'MDG51504', 'Befandriana Sud'),
('MDG51504130', 'MDG51504', 'Antanimieva'),
('MDG51504150', 'MDG51504', 'Basibasy'),
('MDG51505011', 'MDG51505', 'Ankazoabo Sud'),
('MDG51505012', 'MDG51505', 'Fotivolo'),
('MDG51505030', 'MDG51505', 'Tandrano'),
('MDG51505050', 'MDG51505', 'Andranomafana'),
('MDG51505071', 'MDG51505', 'Berenty'),
('MDG51505072', 'MDG51505', 'Ilemby'),
('MDG51506011', 'MDG51506', 'Betioky Atsimo'),
('MDG51506012', 'MDG51506', 'Sakamasay'),
('MDG51506013', 'MDG51506', 'Ambatry Mitsinjo'),
('MDG51506014', 'MDG51506', 'Ankazomanga Ouest'),
('MDG51506015', 'MDG51506', 'Maroarivo Ankazomanga'),
('MDG51506030', 'MDG51506', 'Beantake'),
('MDG51506050', 'MDG51506', 'Masiaboay'),
('MDG51506070', 'MDG51506', 'Antohabato'),
('MDG51506090', 'MDG51506', 'Tameantsoa'),
('MDG51506111', 'MDG51506', 'Tongobory'),
('MDG51506112', 'MDG51506', 'Besely'),
('MDG51506113', 'MDG51506', 'Vatolatsaka'),
('MDG51506130', 'MDG51506', 'Ankazombalala'),
('MDG51506150', 'MDG51506', 'Bezaha'),
('MDG51506170', 'MDG51506', 'Manalobe'),
('MDG51506191', 'MDG51506', 'Andranomangatsiaka'),
('MDG51506192', 'MDG51506', 'Ankilivalo'),
('MDG51506210', 'MDG51506', 'Soamanonga'),
('MDG51506230', 'MDG51506', 'Fenoandala'),
('MDG51506251', 'MDG51506', 'Soaserana'),
('MDG51506252', 'MDG51506', 'Marosavoa'),
('MDG51506270', 'MDG51506', 'Salobe'),
('MDG51506290', 'MDG51506', 'Tanambao Haut'),
('MDG51506311', 'MDG51506', 'Belamoty'),
('MDG51506312', 'MDG51506', 'Antsavoa'),
('MDG51506313', 'MDG51506', 'Montifeno'),
('MDG51506330', 'MDG51506', 'Lazarivo'),
('MDG51507010', 'MDG51507', 'Ampanihy Ouest'),
('MDG51507030', 'MDG51507', 'Ankiliabo'),
('MDG51507050', 'MDG51507', 'Amborompotsy'),
('MDG51507070', 'MDG51507', 'Ankilizato'),
('MDG51507090', 'MDG51507', 'Maniry'),
('MDG51507110', 'MDG51507', 'Antaly'),
('MDG51507130', 'MDG51507', 'Ankilimivory'),
('MDG51507150', 'MDG51507', 'Ejeda'),
('MDG51507170', 'MDG51507', 'Belafike Haut'),
('MDG51507190', 'MDG51507', 'Beahitse'),
('MDG51507210', 'MDG51507', 'Gogogogo'),
('MDG51507230', 'MDG51507', 'Androka'),
('MDG51507250', 'MDG51507', 'Vohitany'),
('MDG51507270', 'MDG51507', 'Beroy Atsimo'),
('MDG51507290', 'MDG51507', 'Fotadrevo'),
('MDG51507310', 'MDG51507', 'Itampolo'),
('MDG54508010', 'MDG54508', 'Morondava'),
('MDG54508059', 'MDG54508', 'Bemanonga'),
('MDG54508079', 'MDG54508', 'Analaiva'),
('MDG54508159', 'MDG54508', 'Befasy'),
('MDG54508179', 'MDG54508', 'Belo Sur Mer'),
('MDG54509010', 'MDG54509', 'Mahabo'),
('MDG54509030', 'MDG54509', 'Ankilivalo'),
('MDG54509051', 'MDG54509', 'Analamitsivalana'),
('MDG54509052', 'MDG54509', 'Befotaka'),
('MDG54509070', 'MDG54509', 'Ampanihy'),
('MDG54509091', 'MDG54509', 'Ankilizato'),
('MDG54509092', 'MDG54509', 'Ambia'),
('MDG54509110', 'MDG54509', 'Mandabe'),
('MDG54509130', 'MDG54509', 'Malaimbandy'),
('MDG54509150', 'MDG54509', 'Beronono'),
('MDG54509170', 'MDG54509', 'Mazavasoa'),
('MDG54510011', 'MDG54510', 'Belo Sur Tsiribihina'),
('MDG54510012', 'MDG54510', 'Andimaky Manambolo'),
('MDG54510013', 'MDG54510', 'Bemarivo Ankirondro'),
('MDG54510031', 'MDG54510', 'Tsimafana'),
('MDG54510032', 'MDG54510', 'Beroboka Nord'),
('MDG54510050', 'MDG54510', 'Tsaraotana'),
('MDG54510070', 'MDG54510', 'Masoarivo'),
('MDG54510090', 'MDG54510', 'Aboalimena'),
('MDG54510111', 'MDG54510', 'Ankalalobe'),
('MDG54510112', 'MDG54510', 'Ambiky'),
('MDG54510131', 'MDG54510', 'Berevo'),
('MDG54510132', 'MDG54510', 'Antsoha'),
('MDG54510151', 'MDG54510', 'Belinta'),
('MDG54510152', 'MDG54510', 'Ankiroroky'),
('MDG54511011', 'MDG54511', 'Miandrivazo'),
('MDG54511012', 'MDG54511', 'Dabolava'),
('MDG54511031', 'MDG54511', 'Bemahatazana'),
('MDG54511032', 'MDG54511', 'Ampanihy'),
('MDG54511033', 'MDG54511', 'Anosimena'),
('MDG54511050', 'MDG54511', 'Manandaza'),
('MDG54511071', 'MDG54511', 'Ankotrofotsy'),
('MDG54511072', 'MDG54511', 'Isalo'),
('MDG54511091', 'MDG54511', 'Ambatolahy'),
('MDG54511092', 'MDG54511', 'Manambina'),
('MDG54511110', 'MDG54511', 'Itondy'),
('MDG54511130', 'MDG54511', 'Ankavandra'),
('MDG54511150', 'MDG54511', 'Soaloka'),
('MDG54511170', 'MDG54511', 'Betsipolitra'),
('MDG54511210', 'MDG54511', 'Ankondromena'),
('MDG51512011', 'MDG51512', 'Sakaraha'),
('MDG51512012', 'MDG51512', 'Miary Taheza'),
('MDG51512030', 'MDG51512', 'Miary Lamatihy'),
('MDG51512050', 'MDG51512', 'Mahaboboka'),
('MDG51512070', 'MDG51512', 'Amboronabo'),
('MDG51512090', 'MDG51512', 'Bereketa'),
('MDG51512111', 'MDG51512', 'Andamasiny Vineta'),
('MDG51512112', 'MDG51512', 'Mihavatsy'),
('MDG51512130', 'MDG51512', 'Andranolava'),
('MDG51512150', 'MDG51512', 'Ambinany'),
('MDG51512171', 'MDG51512', 'Mikoboka'),
('MDG51512172', 'MDG51512', 'Mitsinjo'),
('MDG52513010', 'MDG52513', 'Beloha'),
('MDG52513030', 'MDG52513', 'Tranovaho'),
('MDG52513050', 'MDG52513', 'Kopoky'),
('MDG52513070', 'MDG52513', 'Marolinta'),
('MDG52513091', 'MDG52513', 'Tranoroa'),
('MDG52513092', 'MDG52513', 'Behabobo'),
('MDG52514011', 'MDG52514', 'Tsihombe'),
('MDG52514012', 'MDG52514', 'Nikoly'),
('MDG52514031', 'MDG52514', 'Betanty (Faux Cap)'),
('MDG52514032', 'MDG52514', 'Anjampaly'),
('MDG52514050', 'MDG52514', 'Marovato'),
('MDG52514071', 'MDG52514', 'Antaritarika'),
('MDG52514072', 'MDG52514', 'Imongy'),
('MDG43416030', 'MDG43416', 'Antanimbaribe'),
('MDG53515010', 'MDG53515', 'Fort-Dauphin'),
('MDG53515031', 'MDG53515', 'Ampasy Nahampoana'),
('MDG53515032', 'MDG53515', 'Mandromondromotra'),
('MDG53515033', 'MDG53515', 'Soanierana'),
('MDG53515051', 'MDG53515', 'Ifarantsa'),
('MDG53515052', 'MDG53515', 'Isaka-Ivondro'),
('MDG53515053', 'MDG53515', 'Mandiso'),
('MDG53515071', 'MDG53515', 'Manambaro'),
('MDG53515072', 'MDG53515', 'Sarisambo'),
('MDG53515090', 'MDG53515', 'Ankaramena'),
('MDG53515111', 'MDG53515', 'Ranopiso'),
('MDG53515112', 'MDG53515', 'Ambatoabo'),
('MDG53515113', 'MDG53515', 'Ankariera'),
('MDG53515114', 'MDG53515', 'Analapatsy'),
('MDG53515115', 'MDG53515', 'Andranobory'),
('MDG53515131', 'MDG53515', 'Mahatalaky'),
('MDG53515132', 'MDG53515', 'Iaboakoho'),
('MDG53515151', 'MDG53515', 'Enaniliha'),
('MDG53515152', 'MDG53515', 'Fenoevo-Efita'),
('MDG53515170', 'MDG53515', 'Enakara-Haut'),
('MDG53515191', 'MDG53515', 'Ranomafana'),
('MDG53515192', 'MDG53515', 'Emagnobo'),
('MDG53515210', 'MDG53515', 'Bevoay'),
('MDG53515230', 'MDG53515', 'Ampasimena'),
('MDG53515251', 'MDG53515', 'Manantenina'),
('MDG53515252', 'MDG53515', 'Analamary'),
('MDG53515253', 'MDG53515', 'Soavary'),
('MDG52516011', 'MDG52516', 'Ambovombe'),
('MDG52516012', 'MDG52516', 'Tsimananada'),
('MDG52516013', 'MDG52516', 'Erada'),
('MDG52516014', 'MDG52516', 'Anjeky Ankilikira'),
('MDG52516031', 'MDG52516', 'Ambanisarika'),
('MDG52516032', 'MDG52516', 'Analamary'),
('MDG52516033', 'MDG52516', 'Ambohimalaza'),
('MDG52516050', 'MDG52516', 'Ambonaivo'),
('MDG52516071', 'MDG52516', 'Maroalomainty'),
('MDG52516072', 'MDG52516', 'Maroalopoty'),
('MDG52516091', 'MDG52516', 'Ambondro'),
('MDG52516092', 'MDG52516', 'Ambazoa'),
('MDG52516111', 'MDG52516', 'Sihanamaro'),
('MDG52516112', 'MDG52516', 'Marovato Befeno'),
('MDG52516130', 'MDG52516', 'Antanimora Atsimo'),
('MDG52516151', 'MDG52516', 'Andalatanosy'),
('MDG52516152', 'MDG52516', 'Ampamata'),
('MDG52516170', 'MDG52516', 'Jafaro'),
('MDG52516190', 'MDG52516', 'Imanombo'),
('MDG53517010', 'MDG53517', 'Betroka'),
('MDG53517050', 'MDG53517', 'Naninora'),
('MDG53517070', 'MDG53517', 'Ambalasoa'),
('MDG53517090', 'MDG53517', 'Ivahona'),
('MDG53517110', 'MDG53517', 'Analamary'),
('MDG53517130', 'MDG53517', 'Ianabinda'),
('MDG53517150', 'MDG53517', 'Benato Toby'),
('MDG53517170', 'MDG53517', 'Mahabo'),
('MDG53517190', 'MDG53517', 'Beampombo I'),
('MDG53517210', 'MDG53517', 'Jangany'),
('MDG53517230', 'MDG53517', 'Mahasoa Est'),
('MDG53517250', 'MDG53517', 'Bekorobo'),
('MDG53517270', 'MDG53517', 'Iaborotra'),
('MDG53517291', 'MDG53517', 'Isoanala'),
('MDG53517292', 'MDG53517', 'Beampombo II'),
('MDG53517293', 'MDG53517', 'Nanarena Besakoa'),
('MDG53517310', 'MDG53517', 'Ianakafy'),
('MDG53517331', 'MDG53517', 'Andriandampy'),
('MDG53517332', 'MDG53517', 'Sakamahily'),
('MDG53517350', 'MDG53517', 'Ambatomivary'),
('MDG52518010', 'MDG52518', 'Morafeno Bekily'),
('MDG52518031', 'MDG52518', 'Ankaranabo Nord'),
('MDG52518032', 'MDG52518', 'Besakoa'),
('MDG52518050', 'MDG52518', 'Anja Nord'),
('MDG52518070', 'MDG52518', 'Antsakoamaro'),
('MDG52518091', 'MDG52518', 'Ambatosola'),
('MDG52518092', 'MDG52518', 'Tsirandrany'),
('MDG52518110', 'MDG52518', 'Tsikolaky'),
('MDG52518130', 'MDG52518', 'Manakompy'),
('MDG52518151', 'MDG52518', 'Ambahita'),
('MDG52518152', 'MDG52518', 'Maroviro'),
('MDG52518170', 'MDG52518', 'Belindo Mahasoa'),
('MDG52518190', 'MDG52518', 'Beteza'),
('MDG52518210', 'MDG52518', 'Tanandava'),
('MDG52518230', 'MDG52518', 'Bekitro'),
('MDG52518251', 'MDG52518', 'Beraketa'),
('MDG52518252', 'MDG52518', 'Vohimanga'),
('MDG52518270', 'MDG52518', 'Bevitiky'),
('MDG52518290', 'MDG52518', 'Anivorano Mitsinjo'),
('MDG53519010', 'MDG53519', 'Amboasary Atsimo'),
('MDG53519030', 'MDG53519', 'Behara'),
('MDG53519050', 'MDG53519', 'Tanandava Sud'),
('MDG53519070', 'MDG53519', 'Sampona'),
('MDG53519090', 'MDG53519', 'Ifotaka'),
('MDG53519110', 'MDG53519', 'Tranomaro'),
('MDG53519130', 'MDG53519', 'Maromby'),
('MDG53519150', 'MDG53519', 'Elonty'),
('MDG53519170', 'MDG53519', 'Esira'),
('MDG53519190', 'MDG53519', 'Mahaly'),
('MDG53519210', 'MDG53519', 'Manevy'),
('MDG53519230', 'MDG53519', 'Tsivory'),
('MDG53519250', 'MDG53519', 'Marotsiraka'),
('MDG53519270', 'MDG53519', 'Tomboarivo'),
('MDG53519291', 'MDG53519', 'Ebelo'),
('MDG53519292', 'MDG53519', 'Ranobe'),
('MDG51520010', 'MDG51520', 'Mitsinjo Betanimena'),
('MDG51520030', 'MDG51520', 'Belalanda'),
('MDG51520050', 'MDG51520', 'Betsinjaka'),
('MDG51520071', 'MDG51520', 'Miary Ambohibola'),
('MDG51520072', 'MDG51520', 'Behompy'),
('MDG51520090', 'MDG51520', 'Maromiandra'),
('MDG51520111', 'MDG51520', 'Ambohimahavelona'),
('MDG51520112', 'MDG51520', 'Andranohinaly'),
('MDG51520131', 'MDG51520', 'Saint Augustin'),
('MDG51520132', 'MDG51520', 'Anakao'),
('MDG51520133', 'MDG51520', 'Soalara Sud'),
('MDG51520150', 'MDG51520', 'Ambolofoty'),
('MDG51520170', 'MDG51520', 'Ankilimalinike'),
('MDG51520191', 'MDG51520', 'Antanimena Onilahy'),
('MDG51520192', 'MDG51520', 'Manorofify'),
('MDG51520210', 'MDG51520', 'Marofoty'),
('MDG51520230', 'MDG51520', 'Tsianisiha'),
('MDG51520250', 'MDG51520', 'Manombo Sud'),
('MDG51520270', 'MDG51520', 'Andranovory'),
('MDG51520290', 'MDG51520', 'Milenaka'),
('MDG51520310', 'MDG51520', 'Ankililoaka'),
('MDG51520330', 'MDG51520', 'Analamisampy'),
('MDG51520358', 'MDG51520', 'Beheloka'),
('MDG51521010', 'MDG51521', 'Benenitra'),
('MDG51521031', 'MDG51521', 'Ianapera'),
('MDG51521032', 'MDG51521', 'Ambalavato'),
('MDG51521050', 'MDG51521', 'Ehara'),
('MDG72710010', 'MDG72710', 'Antalaha Ambonivohitra'),
('MDG72710030', 'MDG72710', 'Ampahana'),
('MDG72710050', 'MDG72710', 'Ampohibe'),
('MDG72710070', 'MDG72710', 'Antombana'),
('MDG72710090', 'MDG72710', 'Antsahanoro'),
('MDG72710110', 'MDG72710', 'Antananambo'),
('MDG72710130', 'MDG72710', 'Marofinaritra'),
('MDG72710151', 'MDG72710', 'Sarahandrano'),
('MDG72710152', 'MDG72710', 'Andampy'),
('MDG72710170', 'MDG72710', 'Ambalabe'),
('MDG72710190', 'MDG72710', 'Ambinanifaho'),
('MDG72710210', 'MDG72710', 'Ambohitralanana'),
('MDG72710230', 'MDG72710', 'Lanjarivo'),
('MDG72710250', 'MDG72710', 'Antsambalahy'),
('MDG72710271', 'MDG72710', 'Vinanivao'),
('MDG72710272', 'MDG72710', 'Ampanavoana'),
('MDG72711010', 'MDG72711', 'Sambava Cu'),
('MDG72711059', 'MDG72711', 'Ambohimalaza'),
('MDG72711079', 'MDG72711', 'Farahalana'),
('MDG72711090', 'MDG72711', 'Nosiarina'),
('MDG72711130', 'MDG72711', 'Ambodivoara'),
('MDG72711150', 'MDG72711', 'Anjinjaomby'),
('MDG72711170', 'MDG72711', 'Morafeno'),
('MDG72711190', 'MDG72711', 'Analamaho'),
('MDG72711210', 'MDG72711', 'Ambohimitsinjo'),
('MDG72711230', 'MDG72711', 'Anjangoveratra'),
('MDG72711250', 'MDG72711', 'Andratamarina'),
('MDG72711270', 'MDG72711', 'Marogaona'),
('MDG72711290', 'MDG72711', 'Marojala'),
('MDG72711310', 'MDG72711', 'Antsambaharo'),
('MDG72711350', 'MDG72711', 'Bemanevika'),
('MDG72711371', 'MDG72711', 'Amboangibe'),
('MDG72711372', 'MDG72711', 'Andrembona'),
('MDG72711390', 'MDG72711', 'Antindra'),
('MDG72711410', 'MDG72711', 'Ambodiampana'),
('MDG72711430', 'MDG72711', 'Maroambihy'),
('MDG72711450', 'MDG72711', 'Ambatoafo'),
('MDG72711470', 'MDG72711', 'Anjialava'),
('MDG72711490', 'MDG72711', 'Tanambao Daoud'),
('MDG72711510', 'MDG72711', 'Antsahavaribe'),
('MDG72711530', 'MDG72711', 'Bevonotra'),
('MDG72712010', 'MDG72712', 'Andapa'),
('MDG72712030', 'MDG72712', 'Tanandava'),
('MDG72712050', 'MDG72712', 'Ankiakabe Nord'),
('MDG72712070', 'MDG72712', 'Belaoka Marovato'),
('MDG72712090', 'MDG72712', 'Ambodimanga I'),
('MDG72712110', 'MDG72712', 'Marovato'),
('MDG72712130', 'MDG72712', 'Andrakata'),
('MDG72712150', 'MDG72712', 'Bealampona'),
('MDG72712170', 'MDG72712', 'Matsohely'),
('MDG72712190', 'MDG72712', 'Andranomena'),
('MDG72712210', 'MDG72712', 'Ambalamanasy II'),
('MDG72712230', 'MDG72712', 'Ambodiangezoka'),
('MDG72712250', 'MDG72712', 'Betsakotsako Andranotsara'),
('MDG72712270', 'MDG72712', 'Belaoka Lokoho'),
('MDG72712290', 'MDG72712', 'Anoviara'),
('MDG72712310', 'MDG72712', 'Doany'),
('MDG72712330', 'MDG72712', 'Anjialavabe'),
('MDG72712350', 'MDG72712', 'Antsahamena'),
('MDG71713010', 'MDG71713', 'Ramena'),
('MDG71713031', 'MDG71713', 'Sakaramy'),
('MDG71713032', 'MDG71713', 'Antanamitarana'),
('MDG71713033', 'MDG71713', 'Joffre Ville'),
('MDG71713050', 'MDG71713', 'Antsahampano'),
('MDG71713070', 'MDG71713', 'Mahavanona'),
('MDG71713090', 'MDG71713', 'Mangaoka'),
('MDG71713110', 'MDG71713', 'Andrafiabe'),
('MDG71713130', 'MDG71713', 'Anketrakabe'),
('MDG71713151', 'MDG71713', 'Sadjoavato'),
('MDG71713152', 'MDG71713', 'Antsalaka'),
('MDG71713170', 'MDG71713', 'Andranovondronina'),
('MDG71713191', 'MDG71713', 'Andranofanjava'),
('MDG71713192', 'MDG71713', 'Mahalina'),
('MDG71713210', 'MDG71713', 'Ankarongana'),
('MDG71713231', 'MDG71713', 'Anivorano Nord'),
('MDG71713232', 'MDG71713', 'Antsoha'),
('MDG71713251', 'MDG71713', 'Bobasakoa'),
('MDG71713252', 'MDG71713', 'Ambondrona'),
('MDG71713253', 'MDG71713', 'Bobakilandy'),
('MDG71713254', 'MDG71713', 'Mosorolava'),
('MDG71715009', 'MDG71715', 'Diego Suarez'),
('MDG72716030', 'MDG72716', 'Ampondra'),
('MDG72716050', 'MDG72716', 'Fanambana'),
('MDG72716070', 'MDG72716', 'Milanoa'),
('MDG72716090', 'MDG72716', 'Bobakindro'),
('MDG72716110', 'MDG72716', 'Daraina'),
('MDG72716130', 'MDG72716', 'Ambalasatrana'),
('MDG72716170', 'MDG72716', 'Nosibe'),
('MDG72716190', 'MDG72716', 'Andravory'),
('MDG72716210', 'MDG72716', 'Andrafainkona'),
('MDG72716231', 'MDG72716', 'Ampanefena'),
('MDG72716232', 'MDG72716', 'Ambodisambalahy'),
('MDG72716250', 'MDG72716', 'Ambinanin\'andravory'),
('MDG72716270', 'MDG72716', 'Amboriala'),
('MDG72716290', 'MDG72716', 'Maromokotra Loky'),
('MDG72716310', 'MDG72716', 'Antsirabe Nord'),
('MDG72716330', 'MDG72716', 'Ampisikinana'),
('MDG72716350', 'MDG72716', 'Belambo'),
('MDG71717010', 'MDG71717', 'Ambilobe'),
('MDG71717030', 'MDG71717', 'Mantaly'),
('MDG71717050', 'MDG71717', 'Ampondralava'),
('MDG71717070', 'MDG71717', 'Tanambao Marivorahona'),
('MDG71717090', 'MDG71717', 'Ambakirano'),
('MDG71717110', 'MDG71717', 'Ambatoben\'anjavy'),
('MDG71717130', 'MDG71717', 'Antsaravibe'),
('MDG71717150', 'MDG71717', 'Antsohimbondrona'),
('MDG71717171', 'MDG71717', 'Anjiabe Ambony'),
('MDG71717172', 'MDG71717', 'Ambodibonara'),
('MDG71717190', 'MDG71717', 'Beramanja'),
('MDG71717210', 'MDG71717', 'Betsiaka'),
('MDG71717231', 'MDG71717', 'Ambarakaraka'),
('MDG71717232', 'MDG71717', 'Anaborano Ifasy'),
('MDG71717233', 'MDG71717', 'Manambato'),
('MDG71718001', 'MDG71718', 'Hell-Ville'),
('MDG71718002', 'MDG71718', 'Ampangorina'),
('MDG71718003', 'MDG71718', 'Ambatozavavy'),
('MDG71718004', 'MDG71718', 'Bemanondrobe'),
('MDG71718005', 'MDG71718', 'Dzamandzar'),
('MDG71719010', 'MDG71719', 'Ambanja'),
('MDG71719030', 'MDG71719', 'Benavony'),
('MDG71719050', 'MDG71719', 'Ambohimena'),
('MDG71719070', 'MDG71719', 'Antsatsaka'),
('MDG71719091', 'MDG71719', 'Antranokarany'),
('MDG71719092', 'MDG71719', 'Djangoa'),
('MDG71719110', 'MDG71719', 'Antsakoamanondro'),
('MDG71719130', 'MDG71719', 'Ambalahonko'),
('MDG71719150', 'MDG71719', 'Ankingameloka'),
('MDG71719171', 'MDG71719', 'Bemaneviky Haut Sambirano'),
('MDG71719172', 'MDG71719', 'Ambodimanga Ramena'),
('MDG71719173', 'MDG71719', 'Maevatanana'),
('MDG71719190', 'MDG71719', 'Antafiambotry'),
('MDG71719210', 'MDG71719', 'Maherivaratra'),
('MDG71719231', 'MDG71719', 'Marovato'),
('MDG71719232', 'MDG71719', 'Ambohitrandriana'),
('MDG71719233', 'MDG71719', 'Ambohimarina'),
('MDG71719250', 'MDG71719', 'Ambaliha'),
('MDG71719270', 'MDG71719', 'Marotolana'),
('MDG71719290', 'MDG71719', 'Bemaneviky Ouest'),
('MDG71719310', 'MDG71719', 'Anorontsangana'),
('MDG71719330', 'MDG71719', 'Antsirabe'),
('MDG71719350', 'MDG71719', 'Ankatafa'),
('MDG33313193', 'MDG33313', 'Antanandava'),
('MDG72711330', 'MDG72711', 'Andrahanjo'),
('MDG72716010', 'MDG72716', 'Vohemar'),
('MDG72716150', 'MDG72716', 'Tsarabaria'),
('MDG53517999', 'MDG53517', 'Name Unknown');

-- --------------------------------------------------------

--
-- Structure de la table `detail_planification`
--

DROP TABLE IF EXISTS `detail_planification`;
CREATE TABLE IF NOT EXISTS `detail_planification` (
  `ID_PLANIFICATION` varchar(6) NOT NULL,
  `ID_ACTEUR` varchar(6) NOT NULL,
  `ID_COMMUNE` varchar(6) NOT NULL,
  `ID_OBJECTIF_RPF` varchar(6) NOT NULL,
  `CAMPAGNE` varchar(25) DEFAULT NULL,
  `SURFACE_OBJECTIF` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`ID_PLANIFICATION`,`ID_ACTEUR`,`ID_COMMUNE`,`ID_OBJECTIF_RPF`),
  KEY `FK_DETAIL_PLANIFICATION2` (`ID_ACTEUR`),
  KEY `FK_DETAIL_PLANIFICATION3` (`ID_COMMUNE`),
  KEY `FK_DETAIL_PLANIFICATION4` (`ID_OBJECTIF_RPF`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `ID_DISTRICT` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ID_REGION` varchar(6) NOT NULL,
  `LIBELLE_DISTRICT` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_DISTRICT`),
  KEY `FK_APPARTENIR_REGION` (`ID_REGION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `district`
--

INSERT INTO `district` (`ID_DISTRICT`, `ID_REGION`, `LIBELLE_DISTRICT`) VALUES
('MDG11101', 'MDG11', 'Antananarivo Renivohitra'),
('MDG11102', 'MDG11', 'Antananarivo Avaradrano'),
('MDG11103', 'MDG11', 'Ambohidratrimo'),
('MDG11104', 'MDG11', 'Ankazobe'),
('MDG13105', 'MDG13', 'Arivonimamo'),
('MDG11106', 'MDG11', 'Manjakandriana'),
('MDG11107', 'MDG11', 'Anjozorobe'),
('MDG12108', 'MDG12', 'Antsirabe I'),
('MDG12109', 'MDG12', 'Betafo'),
('MDG12110', 'MDG12', 'Ambatolampy'),
('MDG14111', 'MDG14', 'Tsiroanomandidy'),
('MDG13112', 'MDG13', 'Miarinarivo'),
('MDG13113', 'MDG13', 'Soavinandriana'),
('MDG12114', 'MDG12', 'Antanifotsy'),
('MDG11115', 'MDG11', 'Andramasina'),
('MDG12116', 'MDG12', 'Faratsiho'),
('MDG11117', 'MDG11', 'Antananarivo Atsimondrano'),
('MDG12118', 'MDG12', 'Antsirabe II'),
('MDG14119', 'MDG14', 'Fenoarivobe'),
('MDG12120', 'MDG12', 'Mandoto'),
('MDG21201', 'MDG21', 'Fianarantsoa I'),
('MDG22202', 'MDG22', 'Ambatofinandrahana'),
('MDG22203', 'MDG22', 'Ambositra'),
('MDG22204', 'MDG22', 'Fandriana'),
('MDG21205', 'MDG21', 'Ambalavao'),
('MDG23206', 'MDG23', 'Ifanadiana'),
('MDG23207', 'MDG23', 'Nosy-Varika'),
('MDG21208', 'MDG21', 'Ambohimahasoa'),
('MDG23209', 'MDG23', 'Mananjary'),
('MDG23210', 'MDG23', 'Manakara Atsimo'),
('MDG23211', 'MDG23', 'Ikongo'),
('MDG23212', 'MDG23', 'Vohipeno'),
('MDG25213', 'MDG25', 'Farafangana'),
('MDG25214', 'MDG25', 'Vangaindrano'),
('MDG25215', 'MDG25', 'Midongy-Atsimo'),
('MDG24216', 'MDG24', 'Ihosy'),
('MDG25217', 'MDG25', 'Vondrozo'),
('MDG24218', 'MDG24', 'Ivohibe'),
('MDG21219', 'MDG21', 'Ikalamavony'),
('MDG21220', 'MDG21', 'Lalangina'),
('MDG24221', 'MDG24', 'Iakora'),
('MDG25222', 'MDG25', 'Befotaka'),
('MDG22223', 'MDG22', 'Manandriana'),
('MDG21224', 'MDG21', 'Vohibato'),
('MDG21225', 'MDG21', 'Isandra'),
('MDG31301', 'MDG31', 'Toamasina I'),
('MDG32302', 'MDG32', 'Sainte Marie'),
('MDG32303', 'MDG32', 'Maroantsetra'),
('MDG32304', 'MDG32', 'Mananara-Avaratra'),
('MDG32305', 'MDG32', 'Fenerive Est'),
('MDG31306', 'MDG31', 'Brickaville'),
('MDG31307', 'MDG31', 'Vatomandry'),
('MDG31308', 'MDG31', 'Mahanoro'),
('MDG31309', 'MDG31', 'Marolambo'),
('MDG31310', 'MDG31', 'Toamasina II'),
('MDG31311', 'MDG31', 'Antanambao Manampontsy'),
('MDG33312', 'MDG33', 'Amparafaravola'),
('MDG33313', 'MDG33', 'Ambatondrazaka'),
('MDG33314', 'MDG33', 'Moramanga'),
('MDG32315', 'MDG32', 'Vavatenina'),
('MDG33316', 'MDG33', 'Andilamena'),
('MDG33317', 'MDG33', 'Anosibe-An\'ala'),
('MDG32318', 'MDG32', 'Soanierana Ivongo'),
('MDG41401', 'MDG41', 'Mahajanga I'),
('MDG44402', 'MDG44', 'Besalampy'),
('MDG41403', 'MDG41', 'Soalala'),
('MDG43404', 'MDG43', 'Maevatanana'),
('MDG41405', 'MDG41', 'Ambato Boeni'),
('MDG41406', 'MDG41', 'Marovoay'),
('MDG41407', 'MDG41', 'Mitsinjo'),
('MDG43408', 'MDG43', 'Tsaratanana'),
('MDG42409', 'MDG42', 'Port-Berge (Boriziny-Vaovao)'),
('MDG42410', 'MDG42', 'Mandritsara'),
('MDG42411', 'MDG42', 'Analalava'),
('MDG42412', 'MDG42', 'Befandriana Nord'),
('MDG42413', 'MDG42', 'Antsohihy'),
('MDG42414', 'MDG42', 'Bealanana'),
('MDG41415', 'MDG41', 'Mahajanga II'),
('MDG43416', 'MDG43', 'Kandreho'),
('MDG44417', 'MDG44', 'Ambatomainty'),
('MDG44420', 'MDG44', 'Antsalova'),
('MDG44421', 'MDG44', 'Maintirano'),
('MDG44422', 'MDG44', 'Morafenobe'),
('MDG42423', 'MDG42', 'Mampikony'),
('MDG51501', 'MDG51', 'Toliary I'),
('MDG54502', 'MDG54', 'Manja'),
('MDG51503', 'MDG51', 'Beroroha'),
('MDG51504', 'MDG51', 'Morombe'),
('MDG51505', 'MDG51', 'Ankazoabo'),
('MDG51506', 'MDG51', 'Betioky Atsimo'),
('MDG51507', 'MDG51', 'Ampanihy Ouest'),
('MDG54508', 'MDG54', 'Morondava'),
('MDG54509', 'MDG54', 'Mahabo'),
('MDG54510', 'MDG54', 'Belo Sur Tsiribihina'),
('MDG54511', 'MDG54', 'Miandrivazo'),
('MDG51512', 'MDG51', 'Sakaraha'),
('MDG52513', 'MDG52', 'Beloha'),
('MDG52514', 'MDG52', 'Tsihombe'),
('MDG53515', 'MDG53', 'Taolagnaro'),
('MDG52516', 'MDG52', 'Ambovombe-Androy'),
('MDG53517', 'MDG53', 'Betroka'),
('MDG52518', 'MDG52', 'Bekily'),
('MDG53519', 'MDG53', 'Amboasary-Atsimo'),
('MDG51520', 'MDG51', 'Toliara II'),
('MDG51521', 'MDG51', 'Benenitra'),
('MDG72710', 'MDG72', 'Antalaha'),
('MDG72711', 'MDG72', 'Sambava'),
('MDG72712', 'MDG72', 'Andapa'),
('MDG71713', 'MDG71', 'Antsiranana II'),
('MDG71715', 'MDG71', 'Antsiranana I'),
('MDG72716', 'MDG72', 'Vohemar'),
('MDG71717', 'MDG71', 'Ambilobe'),
('MDG71718', 'MDG71', 'Nosy-Be'),
('MDG71719', 'MDG71', 'Ambanja');

-- --------------------------------------------------------

--
-- Structure de la table `ecosysteme`
--

DROP TABLE IF EXISTS `ecosysteme`;
CREATE TABLE IF NOT EXISTS `ecosysteme` (
  `ID_ECOSYSTEME` varchar(6) NOT NULL,
  `LIBELLE_ECOSYSTEME` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_ECOSYSTEME`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entretien_sylvicole`
--

DROP TABLE IF EXISTS `entretien_sylvicole`;
CREATE TABLE IF NOT EXISTS `entretien_sylvicole` (
  `ID_PLANTATION` varchar(20) NOT NULL,
  `REGARNISSAGE` varchar(250) DEFAULT NULL,
  `DATE_REGARNISSAGE` date DEFAULT NULL,
  `NETTOYAGE_` varchar(250) DEFAULT NULL,
  `DATENETTOYAGE` date DEFAULT NULL,
  `ELAGAGE` varchar(3) DEFAULT NULL,
  `DATEELAGAGE` date DEFAULT NULL,
  `QUANTITE_BOIS_ELAGAGE` decimal(10,0) DEFAULT NULL,
  `SUIVI_HAUTEUR_` decimal(10,0) DEFAULT NULL,
  `SUIVI_DIAMETRE_` decimal(10,0) DEFAULT NULL,
  `DATE_SUIVI` date DEFAULT NULL,
  KEY `FK_ASSOCIATION_38` (`ID_PLANTATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `espece`
--

DROP TABLE IF EXISTS `espece`;
CREATE TABLE IF NOT EXISTS `espece` (
  `ID_ESPECE` varchar(6) NOT NULL,
  `LIBELLE_ESPECE` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `NOM_SCIENTIFIQUE` varchar(250) DEFAULT NULL,
  `NOM_VERNACULAIRE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_ESPECE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `espece`
--

INSERT INTO `espece` (`ID_ESPECE`, `LIBELLE_ESPECE`, `NOM_SCIENTIFIQUE`, `NOM_VERNACULAIRE`) VALUES
('ES0001', 'Eucalyptus robusta casuarina', '', ''),
('ES0002', 'Acacia mangium', '', ''),
('ES0003', 'Eucalyptus camalcunessis', '', ''),
('ES0004', 'Moringa olifera', '', ''),
('ES0005', 'Terminalia mentalis', '', ''),
('ES0006', 'Mangue', '', ''),
('ES0007', 'Moringa olifera', '', ''),
('ES0008', 'Anacardium occidental', '', ''),
('ES0009', 'Terminalia catappa', '', ''),
('ES0010', 'Konokono', '', ''),
('ES0011', 'Anacardium occidental', '', ''),
('ES0012', 'Adenanthera', '', ''),
('ES0013', ' Canarium', '', ''),
('ES0014', ' Trachylobium', '', ''),
('ES0015', 'Fatsiolotse', '', ''),
('ES0016', ' Baobab', '', ' '),
('ES0017', 'Albizia', '', ''),
('ES0018', ' Jacaranda', '', ''),
('ES0019', 'Bonara mamy', '', ''),
('ES0020', 'Eucalyptus', '', ''),
('ES0021', 'Mandrorofo', '', ''),
('ES0022', 'Acacia', '', ''),
('ES0023', 'Eucalyptus Eitriodora', '', ''),
('ES0024', ' Fr', '', ''),
('ES0025', 'Corymbia', '', ''),
('ES0026', 'Pinus', '', ''),
('ES0027', 'Jacaranda', '', ''),
('ES0028', 'Mantalys', '', ''),
('ES0029', 'Tamarin', '', ''),
('ES0030', ' Karabo', '', ''),
('ES0031', 'Lucena', '', ''),
('ES0032', ' Palissandre ', '', ''),
('1', 'KLLLA', '1', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fokontany`
--

DROP TABLE IF EXISTS `fokontany`;
CREATE TABLE IF NOT EXISTS `fokontany` (
  `ID_FOKONTANY` varchar(6) NOT NULL,
  `ID_COMMUNE` varchar(6) NOT NULL,
  `LIBELLE_FOKONTANY` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_FOKONTANY`),
  KEY `FK_APPARTENIR_COMMUNE` (`ID_COMMUNE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lutte_active_feu`
--

DROP TABLE IF EXISTS `lutte_active_feu`;
CREATE TABLE IF NOT EXISTS `lutte_active_feu` (
  `ID_FEU` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PLANTATION` varchar(20) NOT NULL,
  `SURFACE_BRULEE` decimal(8,0) DEFAULT NULL,
  `DATE_CONSTAT` date DEFAULT NULL,
  `COORDONNEES` varchar(1024) DEFAULT NULL,
  `DATE_INTERVENTION` date DEFAULT NULL,
  `RESPONSABLE` varchar(250) DEFAULT NULL,
  `ORIGINE_FEU` varchar(250) DEFAULT NULL,
  `NOMBRE_TOUCHE` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`ID_FEU`),
  KEY `FK_ASSOCIATION_36` (`ID_PLANTATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lutte_preventive_feu`
--

DROP TABLE IF EXISTS `lutte_preventive_feu`;
CREATE TABLE IF NOT EXISTS `lutte_preventive_feu` (
  `ID_COMMUNAUTE` varchar(6) NOT NULL,
  `ID_PLANTATION` varchar(20) NOT NULL,
  `ID_TYPE_PARE_FEU` varchar(6) NOT NULL,
  `CADRE_REGLEMENTAIRE` varchar(250) DEFAULT NULL,
  `PARAFEU` decimal(8,0) DEFAULT NULL,
  `COUT_MISE_EN_PLACE` decimal(8,0) DEFAULT NULL,
  KEY `FK_ASSOCIATION_33` (`ID_PLANTATION`),
  KEY `FK_ASSOCIATION_34` (`ID_TYPE_PARE_FEU`),
  KEY `FK_ASSOCIATION_35` (`ID_COMMUNAUTE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mode_preparation_sol`
--

DROP TABLE IF EXISTS `mode_preparation_sol`;
CREATE TABLE IF NOT EXISTS `mode_preparation_sol` (
  `ID_PREPRARATION_SOL` varchar(6) NOT NULL,
  `LIBELLE_PREPARATION_SOL` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_PREPRARATION_SOL`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `objectif_rpf`
--

DROP TABLE IF EXISTS `objectif_rpf`;
CREATE TABLE IF NOT EXISTS `objectif_rpf` (
  `ID_OBJECTIF_RPF` varchar(6) NOT NULL,
  `LIBELLE_OBJECTIF_SPECIFIQUE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_OBJECTIF_RPF`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `objectif_specifique`
--

DROP TABLE IF EXISTS `objectif_specifique`;
CREATE TABLE IF NOT EXISTS `objectif_specifique` (
  `ID_OBJECTIF_RPF` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `LIBELLE_OBJECTIF_SPECIFIQUE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_OBJECTIF_RPF`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pepiniere`
--

DROP TABLE IF EXISTS `pepiniere`;
CREATE TABLE IF NOT EXISTS `pepiniere` (
  `ID_PEPINIERE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_COMMUNE` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FOKONTANY` varchar(250) NOT NULL,
  `LIBELLE_PEPINIERE` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `LONGITUDE` decimal(11,7) DEFAULT NULL,
  `LATITUDE` decimal(11,7) DEFAULT NULL,
  PRIMARY KEY (`ID_PEPINIERE`),
  KEY `FK_ASSOCIATION_39` (`ID_COMMUNE`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pepiniere`
--

INSERT INTO `pepiniere` (`ID_PEPINIERE`, `ID_COMMUNE`, `FOKONTANY`, `LIBELLE_PEPINIERE`, `LONGITUDE`, `LATITUDE`) VALUES
(2, 'MDG11101005', 'KALOBA256 ', 'pepini', '46.8308880', '-17.7785705'),
(3, 'MDG11101001', 'KALOBA ', 'pepi', '46.8308880', '-18.7785705'),
(4, 'MDG33312012', 'Madiotsifafana', 'Alotra', '48.4378900', '-17.8334560');

-- --------------------------------------------------------

--
-- Structure de la table `pepiniere_production`
--

DROP TABLE IF EXISTS `pepiniere_production`;
CREATE TABLE IF NOT EXISTS `pepiniere_production` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PEPINIERE` varchar(6) NOT NULL,
  `ID_ESPECE` varchar(6) NOT NULL,
  `ID_SEMIS` varchar(6) NOT NULL,
  `NOMBRE_PRODUCTION` decimal(8,0) DEFAULT NULL,
  `DATE_PRODUCTION` date DEFAULT NULL,
  `SUBSTRAT_SABLE` int(11) DEFAULT NULL,
  `SUBSTRAT_TERREAU` int(11) NOT NULL,
  `SUBSTRAT_FUMIER` int(11) NOT NULL,
  `HAUTEUR_JEUNES_PLANTS` decimal(8,0) DEFAULT NULL,
  `NOMBRE_FEUILLE` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_PEPINIERE_PRODUCTION2` (`ID_ESPECE`),
  KEY `FK_PEPINIERE_PRODUCTION3` (`ID_SEMIS`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pepiniere_production`
--

INSERT INTO `pepiniere_production` (`ID`, `ID_PEPINIERE`, `ID_ESPECE`, `ID_SEMIS`, `NOMBRE_PRODUCTION`, `DATE_PRODUCTION`, `SUBSTRAT_SABLE`, `SUBSTRAT_TERREAU`, `SUBSTRAT_FUMIER`, `HAUTEUR_JEUNES_PLANTS`, `NOMBRE_FEUILLE`) VALUES
(1, '2', 'ES0001', 'SEM03', '12', '0000-00-00', 0, 0, 0, '0', '0'),
(2, '4', 'ES0008', 'SEM01', '3500', '2022-04-01', 0, 0, 0, '0', '0'),
(3, '2', 'ES0007', 'SEM01', '12222', '2022-04-06', 0, 0, 0, '0', '0'),
(4, '2', 'ES0010', 'SEM01', '1500', '2022-04-03', 0, 0, 0, '0', '0'),
(5, '3', 'ES0016', 'SEM02', '100', '2022-04-02', 0, 0, 0, '0', '0'),
(6, '2', 'ES0001', 'SEM01', '300', '2022-03-29', 0, 0, 0, '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `pepiniere_sortie`
--

DROP TABLE IF EXISTS `pepiniere_sortie`;
CREATE TABLE IF NOT EXISTS `pepiniere_sortie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ESPECE` varchar(6) NOT NULL,
  `ID_PEPINIERE` varchar(6) NOT NULL,
  `DATE_SORTIE` date NOT NULL,
  `NOMBRE_SORTIE` decimal(8,0) DEFAULT NULL,
  `NOM_BENEFICIAIRE` varchar(250) DEFAULT NULL,
  `CONTACT` varchar(250) DEFAULT NULL,
  `OBJET_SORTIE` varchar(240) NOT NULL,
  `COMMENTAIRE` varchar(2000) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_PEPINIERE_SORTIE2` (`ID_PEPINIERE`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pepiniere_sortie`
--

INSERT INTO `pepiniere_sortie` (`ID`, `ID_ESPECE`, `ID_PEPINIERE`, `DATE_SORTIE`, `NOMBRE_SORTIE`, `NOM_BENEFICIAIRE`, `CONTACT`, `OBJET_SORTIE`, `COMMENTAIRE`) VALUES
(1, 'ES0001', '2', '2022-04-01', '123', 'Rakoto', '034', 'vv', 'Z'),
(2, 'ES0001', '4', '2022-04-06', '123', 'AAZ', '', '', ''),
(3, 'ES0001', '2', '0000-00-00', '2022', 'RABE', '', ' Pour reboisement', ' Pour reboisement');

-- --------------------------------------------------------

--
-- Structure de la table `planification_annuelle`
--

DROP TABLE IF EXISTS `planification_annuelle`;
CREATE TABLE IF NOT EXISTS `planification_annuelle` (
  `ID_PLANIFICATION_ANNUELLE` varchar(6) NOT NULL,
  `ID_ESPECE` varchar(6) NOT NULL,
  `ID_COMMUNE` varchar(6) NOT NULL,
  `ID_ACTEUR` varchar(6) NOT NULL,
  `ID_OBJECTIF_RPF` varchar(6) NOT NULL,
  `ID_PEPINIERE` varchar(6) NOT NULL,
  `LIBELLE_PLANIFICATION_ANNUELLE` varchar(250) DEFAULT NULL,
  `ANNEE_PLANIFICATION` decimal(8,0) DEFAULT NULL,
  `NOMBRE_PLANTS` decimal(8,0) DEFAULT NULL,
  `SURFACE` decimal(8,0) DEFAULT NULL,
  `LONGITUDE` decimal(11,7) DEFAULT NULL,
  `LATITUDE` decimal(11,7) DEFAULT NULL,
  PRIMARY KEY (`ID_PLANIFICATION_ANNUELLE`),
  KEY `FK_AVOIR_OBJECTIF` (`ID_OBJECTIF_RPF`),
  KEY `FK_AVOIR_PLANIFICATION_ANNUELLE` (`ID_PEPINIERE`),
  KEY `FK_PLANIFICATION_PLANTATION` (`ID_COMMUNE`),
  KEY `FK_R2` (`ID_ACTEUR`),
  KEY `FK_R3` (`ID_ESPECE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `planification_pluriannuelle_reboisement`
--

DROP TABLE IF EXISTS `planification_pluriannuelle_reboisement`;
CREATE TABLE IF NOT EXISTS `planification_pluriannuelle_reboisement` (
  `ID_PLANIFICATION` varchar(6) NOT NULL,
  `ID_ACTEUR` varchar(6) NOT NULL,
  `TOTAL_OBJECTIF` decimal(8,0) DEFAULT NULL,
  `DESCRIPTION_PLANIFICATION` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_PLANIFICATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plantation`
--

DROP TABLE IF EXISTS `plantation`;
CREATE TABLE IF NOT EXISTS `plantation` (
  `ID_PLANTATION` varchar(20) NOT NULL,
  `ID_ACTEUR` varchar(6) NOT NULL,
  `ID_TYPE_REBOISMENT` varchar(6) NOT NULL,
  `ID_PLANIFICATION_ANNUELLE` varchar(6) DEFAULT NULL,
  `ID_ESPECE` varchar(6) NOT NULL,
  `ID_STRUCTURE` varchar(6) NOT NULL,
  `ID_COMMUNAUTE` varchar(6) NOT NULL,
  `ID_COMMUNE` varchar(6) NOT NULL,
  `ID_PREPRARATION_SOL` varchar(6) NOT NULL,
  `ID_BASSIN_VERSANT` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ID_PEPINIERE` varchar(6) NOT NULL,
  `ID_ECOSYSTEME` varchar(6) NOT NULL,
  `ID_OBJECTIF_RPF` varchar(6) NOT NULL,
  `NOMBRE_PLANTS` decimal(8,0) DEFAULT NULL,
  `DATE_PLANTATION` date DEFAULT NULL,
  `SUPERFICIE` decimal(10,0) DEFAULT NULL,
  `LONGITUDE` decimal(11,7) DEFAULT NULL,
  `LATITUDE` decimal(11,7) DEFAULT NULL,
  `RESPONSABLE` varchar(250) DEFAULT NULL,
  `APPROCHE` varchar(250) DEFAULT NULL,
  `SOURCE_FINANCEMENT` varchar(250) DEFAULT NULL,
  `SURFACE_PREVUE` decimal(10,0) DEFAULT NULL,
  `COORDONNEES_DELIMITATION_PREVUE` varchar(250) DEFAULT NULL,
  `MAIN_OEUVRE` decimal(8,0) DEFAULT NULL,
  `COUT_PREPARATION` decimal(8,0) DEFAULT NULL,
  `FERTILISATION` varchar(250) DEFAULT NULL,
  `SOURCE_PLANTS` varchar(250) DEFAULT NULL,
  `COORDONNEES_DELIMITATION_REALISATION` varchar(250) DEFAULT NULL,
  `FOKONTANY` varchar(250) DEFAULT NULL,
  `LOCALITE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_PLANTATION`),
  KEY `FK_AVOIR_ESPCE` (`ID_ESPECE`),
  KEY `FK_AVOIR_OBJECTIF_RPF` (`ID_OBJECTIF_RPF`),
  KEY `FK_AVOIR_TYPE_REBOISEMENT` (`ID_TYPE_REBOISMENT`),
  KEY `FK_DANS_COMMUNE` (`ID_COMMUNE`),
  KEY `FK_DEPUIS_PEPENIERE` (`ID_PEPINIERE`),
  KEY `FK_FAIT_PAR_COMMUNAUTE` (`ID_COMMUNAUTE`),
  KEY `FK_PREPARER_SOL` (`ID_PREPRARATION_SOL`),
  KEY `FK_PRES_DE` (`ID_BASSIN_VERSANT`),
  KEY `FK_PREVU_PAR` (`ID_PLANIFICATION_ANNUELLE`),
  KEY `FK_RATTACHEE_A` (`ID_STRUCTURE`),
  KEY `FK_SUR_ECOSYSTEM` (`ID_ECOSYSTEME`),
  KEY `ID_ACTEUR` (`ID_ACTEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `production`
--

DROP TABLE IF EXISTS `production`;
CREATE TABLE IF NOT EXISTS `production` (
  `ID_PLANTATION` varchar(20) NOT NULL,
  `ECLARCIE1` varchar(3) DEFAULT NULL,
  `NOMBRE_PIED_ECLARCIE1` decimal(8,0) DEFAULT NULL,
  `HAUTEUR_ECLARCIE1` decimal(10,0) DEFAULT NULL,
  `DIAMETRE_ECLARCIE1` decimal(10,0) DEFAULT NULL,
  `DATE_ECLARCIE1` date DEFAULT NULL,
  `ECLARCIE2` varchar(3) DEFAULT NULL,
  `DATE_ECLARCIE2` date DEFAULT NULL,
  `SUIVI_HAUTEUR_` decimal(10,0) DEFAULT NULL,
  `SUIVI_DIAMETRE_` decimal(10,0) DEFAULT NULL,
  `PLAN_DE_COUPE` varchar(250) DEFAULT NULL,
  `NOMBRE_PIED_ECLARCIE2` decimal(8,0) DEFAULT NULL,
  `RENOUVELLEMENT` varchar(3) DEFAULT NULL,
  `TYPE_RENOUVELLEMENT` varchar(250) DEFAULT NULL,
  KEY `FK_FAIT_OBJET_PRODUCTION` (`ID_PLANTATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `ID_REGION` varchar(6) NOT NULL,
  `LIBELLE_REGION` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID_REGION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`ID_REGION`, `LIBELLE_REGION`) VALUES
('MDG22', 'Amoron I Mania'),
('MDG24', 'Ihorombe'),
('MDG42', 'Sofia'),
('MDG33', 'Alaotra Mangoro'),
('MDG54', 'Menabe'),
('MDG11', 'Analamanga'),
('MDG21', 'Haute Matsiatra'),
('MDG13', 'Itasy'),
('MDG23', 'Vatovavy Fitovinany'),
('MDG31', 'Atsinanana'),
('MDG72', 'Sava'),
('MDG44', 'Melaky'),
('MDG41', 'Boeny'),
('MDG53', 'Anosy'),
('MDG51', 'Atsimo Andrefana'),
('MDG25', 'Atsimo Atsinanana'),
('MDG71', 'Diana'),
('MDG32', 'Analanjirofo'),
('MDG12', 'Vakinankaratra'),
('MDG52', 'Androy'),
('MDG14', 'Bongolava'),
('MDG43', 'Betsiboka');

-- --------------------------------------------------------

--
-- Structure de la table `structure_administrative`
--

DROP TABLE IF EXISTS `structure_administrative`;
CREATE TABLE IF NOT EXISTS `structure_administrative` (
  `ID_STRUCTURE` varchar(6) NOT NULL,
  `LIBELLE_STRUCTURE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_STRUCTURE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sujet_discussion`
--

DROP TABLE IF EXISTS `sujet_discussion`;
CREATE TABLE IF NOT EXISTS `sujet_discussion` (
  `ID_SUJET` int(11) NOT NULL AUTO_INCREMENT,
  `LIBELLE_SUJET` varchar(500) NOT NULL,
  `DATE_SAISIE` datetime NOT NULL,
  `UTILISATEUR` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  KEY `ID_SUJET` (`ID_SUJET`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sujet_discussion`
--

INSERT INTO `sujet_discussion` (`ID_SUJET`, `LIBELLE_SUJET`, `DATE_SAISIE`, `UTILISATEUR`) VALUES
(6, 'sss', '2022-03-29 11:47:11', 'rado'),
(5, 'SDF', '2022-03-29 10:21:13', 'rado'),
(7, 'azehhOO', '2022-03-31 17:07:02', 'rado');

-- --------------------------------------------------------

--
-- Structure de la table `sujet_discussion_details`
--

DROP TABLE IF EXISTS `sujet_discussion_details`;
CREATE TABLE IF NOT EXISTS `sujet_discussion_details` (
  `ID_DISCUSSION` int(11) NOT NULL AUTO_INCREMENT,
  `UTILISATEUR` varchar(100) NOT NULL,
  `MESSAGE` varchar(4000) NOT NULL,
  `DATE_SAISIE` datetime NOT NULL,
  `ID_SUJET` int(11) NOT NULL,
  PRIMARY KEY (`ID_DISCUSSION`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sujet_discussion_details`
--

INSERT INTO `sujet_discussion_details` (`ID_DISCUSSION`, `UTILISATEUR`, `MESSAGE`, `DATE_SAISIE`, `ID_SUJET`) VALUES
(1, 'rado', 'reboisment', '2022-03-29 00:00:00', 5),
(2, 'bozy', 'ok', '2022-03-29 12:11:43', 5),
(3, 'rado', 'ouiiddd', '2022-03-29 12:37:58', 6),
(4, 'beloha', 'test', '0000-00-00 00:00:00', 7),
(16, 'rado', 'io ary', '2022-03-29 18:49:31', 6),
(11, 'rado', 'ETYj', '2022-03-31 22:02:25', 6),
(12, 'rado', 'zay fa mety', '0000-00-00 00:00:00', 6),
(15, 'rado', 'Mandeha daholo', '2022-03-29 17:17:28', 6),
(14, 'rado', 'zay fa mety', '0000-00-00 00:00:00', 6),
(17, 'rado', 'io ary', '2022-03-29 18:50:39', 6),
(18, 'rado', 'io ary 123', '2022-03-29 18:52:07', 6),
(19, 'rado', 'io ary XXX', '2022-03-29 18:53:45', 6),
(20, 'rado', 'ndao', '2022-03-29 18:58:03', 6),
(21, 'rado', 'ndao 11111', '2022-03-29 19:07:20', 6),
(22, 'rado', 'ndao 11111', '2022-03-29 19:07:21', 6),
(23, 'rado', 'ndao 11', '2022-03-29 19:08:52', 6),
(24, 'rado', 'ndao 11rttyy', '2022-03-29 19:10:38', 6),
(25, 'rado', 'testo', '2022-03-30 09:38:17', 6),
(26, 'rado', 'yyyy', '2022-03-30 09:55:33', 6),
(27, 'rado', 'yyyy', '2022-03-30 09:55:36', 6),
(28, 'rado', 'op', '2022-03-30 09:56:08', 6),
(29, 'rado', 'vv', '2022-03-30 09:56:42', 6),
(30, 'rado', 'gt', '2022-03-30 10:01:25', 6),
(31, 'rado', 'gthtjknbkj', '2022-03-30 10:14:29', 6),
(32, 'rado', 'kkkkk', '2022-03-30 10:15:16', 6);

-- --------------------------------------------------------

--
-- Structure de la table `type_acteur`
--

DROP TABLE IF EXISTS `type_acteur`;
CREATE TABLE IF NOT EXISTS `type_acteur` (
  `ID_TYPE_ACTEUR` varchar(6) NOT NULL,
  `LIBELLETYPE_ACTEUR` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_TYPE_ACTEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_menace`
--

DROP TABLE IF EXISTS `type_menace`;
CREATE TABLE IF NOT EXISTS `type_menace` (
  `ID_MENACE` varchar(6) NOT NULL,
  `LIBELLE_MENACE` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_MENACE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_parfeu`
--

DROP TABLE IF EXISTS `type_parfeu`;
CREATE TABLE IF NOT EXISTS `type_parfeu` (
  `ID_TYPE_PARE_FEU` varchar(6) NOT NULL,
  `LIBELLE__PARE_FEU` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`ID_TYPE_PARE_FEU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_reboisement`
--

DROP TABLE IF EXISTS `type_reboisement`;
CREATE TABLE IF NOT EXISTS `type_reboisement` (
  `ID_TYPE_REBOISMENT` varchar(6) NOT NULL,
  `LIBELLE_TYPE_REBOISMENT` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_TYPE_REBOISMENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_semis`
--

DROP TABLE IF EXISTS `type_semis`;
CREATE TABLE IF NOT EXISTS `type_semis` (
  `ID_SEMIS` varchar(6) NOT NULL,
  `LIBELLE_SEMIS` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_SEMIS`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type_semis`
--

INSERT INTO `type_semis` (`ID_SEMIS`, `LIBELLE_SEMIS`) VALUES
('SEM01', 'En pot'),
('SEM02', 'Semis direct'),
('SEM03', 'Germoir');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `actif` varchar(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `actif`) VALUES
(1, 'rado', 'rrazanatsimba@gmail.com', '202cb962ac59075b964b07152d234b70', 'O'),
(5, 'test', 'aff@h.com', 'c4ca4238a0b923820dcc509a6f75849b', 'N'),
(6, 'test1', 'aff@h.com', '28c8edde3d61a0411511d3b1866f0636', 'N'),
(8, 'rakptp', 'rrazanatsimba@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'N'),
(9, 'RAso', 'rrazanatsimba@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'N'),
(10, 'RADE', 'rrazanatsimba@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'N'),
(11, 'rabe123', 'rrazanatsimba@gmail.com', 'bc554ecf2b33458ff1f152433cd4c813', 'N'),
(12, 'hoby', 'hobyravaka@gmail.com', '202cb962ac59075b964b07152d234b70', 'N');

--
-- Déclencheurs `users`
--
DROP TRIGGER IF EXISTS `trg`;
DELIMITER $$
CREATE TRIGGER `trg` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
SET NEW.pass = MD5(NEW.pass);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trgPass`;
DELIMITER $$
CREATE TRIGGER `trgPass` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
	SET new.pass=MD5(new.pass);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_catalogue_pepiniere`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `v_catalogue_pepiniere`;
CREATE TABLE IF NOT EXISTS `v_catalogue_pepiniere` (
`ID_PEPINIERE` varchar(6)
,`ID_ESPECE` varchar(6)
,`QTE_PRODUIT` decimal(30,0)
,`QTE_SORTIE` decimal(30,0)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_production_pepiniere`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `v_production_pepiniere`;
CREATE TABLE IF NOT EXISTS `v_production_pepiniere` (
`ID_PEPINIERE` varchar(6)
,`ID_ESPECE` varchar(6)
,`QTE_PRODUIT` decimal(30,0)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_sortie_pepiniere`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `v_sortie_pepiniere`;
CREATE TABLE IF NOT EXISTS `v_sortie_pepiniere` (
`ID_PEPINIERE` varchar(6)
,`ID_ESPECE` varchar(6)
,`QTE_SORTIE` decimal(30,0)
);

-- --------------------------------------------------------

--
-- Structure de la vue `v_catalogue_pepiniere`
--
DROP TABLE IF EXISTS `v_catalogue_pepiniere`;

CREATE ALGORITHM=UNDEFINED DEFINER=`medd`@`localhost` SQL SECURITY DEFINER VIEW `v_catalogue_pepiniere`  AS  select `v_production_pepiniere`.`ID_PEPINIERE` AS `ID_PEPINIERE`,`v_production_pepiniere`.`ID_ESPECE` AS `ID_ESPECE`,`v_production_pepiniere`.`QTE_PRODUIT` AS `QTE_PRODUIT`,`v_sortie_pepiniere`.`QTE_SORTIE` AS `QTE_SORTIE` from (`v_production_pepiniere` left join `v_sortie_pepiniere` on(((`v_production_pepiniere`.`ID_PEPINIERE` = `v_sortie_pepiniere`.`ID_PEPINIERE`) and (`v_sortie_pepiniere`.`ID_ESPECE` = `v_production_pepiniere`.`ID_ESPECE`)))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_production_pepiniere`
--
DROP TABLE IF EXISTS `v_production_pepiniere`;

CREATE ALGORITHM=UNDEFINED DEFINER=`medd`@`localhost` SQL SECURITY DEFINER VIEW `v_production_pepiniere`  AS  select `pepiniere_production`.`ID_PEPINIERE` AS `ID_PEPINIERE`,`pepiniere_production`.`ID_ESPECE` AS `ID_ESPECE`,sum(`pepiniere_production`.`NOMBRE_PRODUCTION`) AS `QTE_PRODUIT` from `pepiniere_production` group by `pepiniere_production`.`ID_PEPINIERE`,`pepiniere_production`.`ID_ESPECE` ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_sortie_pepiniere`
--
DROP TABLE IF EXISTS `v_sortie_pepiniere`;

CREATE ALGORITHM=UNDEFINED DEFINER=`medd`@`localhost` SQL SECURITY DEFINER VIEW `v_sortie_pepiniere`  AS  select `pepiniere_sortie`.`ID_PEPINIERE` AS `ID_PEPINIERE`,`pepiniere_sortie`.`ID_ESPECE` AS `ID_ESPECE`,sum(`pepiniere_sortie`.`NOMBRE_SORTIE`) AS `QTE_SORTIE` from `pepiniere_sortie` group by `pepiniere_sortie`.`ID_PEPINIERE`,`pepiniere_sortie`.`ID_ESPECE` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
