-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jun 25, 2023 at 02:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooldatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajournée`
--

CREATE TABLE `ajournée` (
  `id_etudiant` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ajournée`
--

INSERT INTO `ajournée` (`id_etudiant`, `id_niveau`) VALUES
(1, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230525154938', '2023-05-25 18:05:42', 16880);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `filiere_id` int(11) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` varchar(255) NOT NULL,
  `code_a` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cin` varchar(255) DEFAULT NULL,
  `cne` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `filiere_id`, `nom`, `prenom`, `date_naissance`, `code_a`, `email`, `cin`, `cne`, `picture`, `created_at`, `updated_at`) VALUES
(1, 1, 'El abadi', 'Mohamed', '15/02/2009', 'A25438', 'etudiant@gmail.com', 'DS1525895', 'Cd5454564654', '', '2023-05-26 18:05:54', '2023-05-26 18:05:54'),
(2, 2, 'Imrane', 'achbabou', '7/7/2001', 'R23463186', 'IMRANE@gmail.com', 'B673945', 'R4537208', NULL, NULL, NULL),
(3, 1, 'rhaiti', 'youssef', '20/05/2003', 'B34216', 'YOUSSEF@GMAIL.COM', 'W34891', NULL, NULL, NULL, NULL),
(4, 1, 'etudiant', '2EME', '13/11/2001', 'R453', 'R65432@gmail.com', 'B56453', 'R32452', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant_examen`
--

CREATE TABLE `etudiant_examen` (
  `etudiant_id` int(11) NOT NULL,
  `examen_id` int(11) NOT NULL,
  `note` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etudiant_examen`
--

INSERT INTO `etudiant_examen` (`etudiant_id`, `examen_id`, `note`) VALUES
(1, 1, 13),
(1, 2, 14),
(1, 3, 13),
(1, 4, 14),
(1, 5, 13),
(1, 6, 14),
(1, 7, 13),
(1, 8, 14),
(1, 9, 13),
(1, 10, 14),
(1, 11, 13),
(1, 12, 17),
(1, 13, 11),
(1, 14, 16),
(1, 15, 15),
(1, 16, 14),
(1, 17, 11),
(1, 18, 14),
(1, 19, 13),
(1, 20, 9),
(1, 21, 8),
(1, 22, 17),
(1, 23, 13),
(1, 24, 12),
(1, 25, 10),
(1, 26, 13),
(1, 27, 20),
(1, 28, 16),
(2, 1, 12),
(2, 2, 10),
(2, 3, 13),
(2, 4, 14),
(2, 5, 13),
(2, 6, 14),
(2, 7, 13),
(2, 8, 14),
(2, 9, 13),
(2, 10, 14),
(2, 11, 13),
(2, 12, 17),
(2, 13, 11),
(2, 14, 16),
(2, 15, 15),
(2, 16, 14),
(2, 17, 11),
(2, 18, 14),
(2, 19, 13),
(2, 20, 9),
(2, 21, 1),
(2, 22, 17),
(2, 23, 13),
(2, 24, 12),
(2, 25, 10),
(2, 26, 13),
(2, 27, 14),
(2, 28, 17),
(3, 1, 13),
(3, 2, 13),
(3, 3, 13),
(3, 4, 13),
(3, 5, 13),
(3, 6, 13),
(3, 7, 13),
(3, 8, 13),
(3, 9, 13),
(3, 10, 13),
(3, 11, 13),
(3, 12, 13),
(3, 13, 13),
(3, 14, 13),
(3, 15, 13),
(3, 16, 13),
(3, 17, 13),
(3, 18, 13),
(3, 19, 13),
(3, 20, 13),
(3, 21, 13),
(3, 22, 13),
(3, 23, 13),
(3, 24, 13),
(3, 25, 13),
(3, 26, 13),
(3, 27, 13),
(3, 28, 13),
(4, 29, 10),
(4, 30, 13),
(4, 31, 16),
(4, 32, 11),
(4, 33, 18),
(4, 34, 13),
(4, 35, 14),
(4, 36, 12);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant_seance`
--

CREATE TABLE `etudiant_seance` (
  `etudiant_id` int(11) NOT NULL,
  `seance_id` int(11) NOT NULL,
  `absence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etudiant_seance`
--

INSERT INTO `etudiant_seance` (`etudiant_id`, `seance_id`, `absence`) VALUES
(1, 1, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(2, 2, 1),
(2, 6, 1),
(2, 7, 1),
(2, 9, 1),
(2, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `examen`
--

CREATE TABLE `examen` (
  `id` int(11) NOT NULL,
  `matiere_id` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `date_exam` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examen`
--

INSERT INTO `examen` (`id`, `matiere_id`, `nom`, `picture`, `date_exam`, `created_at`, `updated_at`) VALUES
(1, 1, 'Exam 1', 'exam/ex1', '2022-02-03 11:12:00', '2023-05-26 17:49:54', '2023-05-26 17:49:54'),
(2, 1, 'Exam2', 'az', '2018-01-01 00:00:00', '2023-05-26 18:14:17', '2023-05-26 18:14:17'),
(3, 3, 'Exam 3', NULL, '2023-05-27 23:19:51', NULL, NULL),
(4, 4, 'Exam 4', NULL, '2023-05-27 23:19:51', NULL, NULL),
(5, 5, 'Exam 5', NULL, '2023-05-27 23:19:51', NULL, NULL),
(6, 6, 'Exam 6', NULL, '2023-05-27 23:19:51', NULL, NULL),
(7, 7, 'Exam 7', NULL, '2023-05-27 23:19:51', NULL, NULL),
(8, 8, 'Exam 8', NULL, '2023-05-27 23:19:51', NULL, NULL),
(9, 9, 'Exam 9', NULL, '2023-05-27 23:19:51', NULL, NULL),
(10, 10, 'Exam 10', NULL, '2023-05-27 23:19:51', NULL, NULL),
(11, 11, 'Exam 11', NULL, '2023-05-27 23:19:51', NULL, NULL),
(12, 12, 'Exam 12', NULL, '2023-05-27 23:19:51', NULL, NULL),
(13, 13, 'Exam 13', NULL, '2023-05-27 23:19:51', NULL, NULL),
(14, 14, 'Exam 14', NULL, '2023-05-27 23:19:51', NULL, NULL),
(15, 15, 'Exam 15', NULL, '2023-05-27 23:19:51', NULL, NULL),
(16, 16, 'Exam 16', NULL, '2023-05-27 23:19:51', NULL, NULL),
(17, 17, 'Exam 17', NULL, '2023-05-27 23:19:51', NULL, NULL),
(18, 18, 'Exam 18', NULL, '2023-05-27 23:19:51', NULL, NULL),
(19, 19, 'Exam 19', NULL, '2023-05-27 23:19:51', NULL, NULL),
(20, 20, 'Exam 20', NULL, '2023-05-27 23:19:51', NULL, NULL),
(21, 21, 'Exam 21', NULL, '2023-05-27 23:19:51', NULL, NULL),
(22, 22, 'Exam 22', NULL, '2023-05-27 23:19:51', NULL, NULL),
(23, 23, 'Exam 23', NULL, '2023-05-27 23:19:51', NULL, NULL),
(24, 24, 'Exam 24', NULL, '2023-05-27 23:19:51', NULL, NULL),
(25, 25, 'Exam 25', NULL, '2023-05-27 23:19:51', NULL, NULL),
(26, 26, 'EXAM 26', NULL, '2023-05-27 23:51:35', NULL, NULL),
(27, 27, 'EXAM 27', NULL, '2023-05-27 23:51:35', NULL, NULL),
(28, 28, 'EXAM 28', NULL, '2023-05-27 23:51:35', NULL, NULL),
(29, 29, 'AZERT', NULL, '2023-05-30 04:36:35', NULL, NULL),
(30, 30, 'AZERT', NULL, '2023-05-30 04:36:35', NULL, NULL),
(31, 31, 'AZERT', NULL, '2023-05-30 04:36:35', NULL, NULL),
(32, 32, 'AZERT', NULL, '2023-05-30 04:36:35', NULL, NULL),
(33, 33, 'AZERT', NULL, '2023-05-30 04:36:35', NULL, NULL),
(34, 34, 'AZERT', NULL, '2023-05-30 04:36:35', NULL, NULL),
(35, 35, 'AZERT', NULL, '2023-05-30 04:36:35', NULL, NULL),
(36, 36, 'AZERT', NULL, '2023-05-30 04:36:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `duree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id`, `nom`, `duree`) VALUES
(1, 'SSI', 3),
(2, 'GL', 3),
(3, '2SCL', 3);

-- --------------------------------------------------------

--
-- Table structure for table `filiere_niveau`
--

CREATE TABLE `filiere_niveau` (
  `filiere_id` int(11) NOT NULL,
  `niveau_id` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filiere_niveau`
--

INSERT INTO `filiere_niveau` (`filiere_id`, `niveau_id`, `id_etudiant`) VALUES
(1, 1, 1),
(2, 1, 2),
(1, 1, 3),
(1, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('ADMIN', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `coefficient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`id`, `module_id`, `nom`, `coefficient`) VALUES
(1, 1, 'Programmation procédurale', 1),
(2, 1, 'Structures de données', 1),
(3, 1, 'Algorithmique', 1),
(4, 2, 'Architecture des ordinateurs', 1),
(5, 2, 'Assembleur microprocesseur', 1),
(6, 3, 'Programmation linéaire', 1),
(7, 3, 'Théorie des graphes', 1),
(8, 4, 'Comptabilité générale et gestion financière', 1),
(9, 4, 'Economie d’entreprise', 1),
(10, 5, 'Communication et developpement personnel 1', 1),
(11, 5, 'General english 1', 1),
(12, 6, 'Probabilités', 1),
(13, 6, 'Statistique descriptive pour l’ingénieur', 1),
(14, 7, 'Bases de données 1', 1),
(15, 7, 'Bases de données 2', 1),
(16, 8, 'Comptabilité analytique', 1),
(17, 8, 'Economie générale', 1),
(18, 9, 'Logique des prédicats', 1),
(19, 9, 'Calculabilité et complexité', 1),
(20, 10, 'Modélisation des systèmes d’information', 1),
(21, 10, 'Programmation orienté objet', 1),
(22, 11, 'Transmission de données', 1),
(23, 11, 'Réseaux informatiques', 1),
(24, 11, 'Systèmes d’exploitation', 1),
(25, 12, 'Anglais 2', 1),
(26, 12, 'Communication et developpement personnel 2', 1),
(27, 13, 'Projet de 1a	', 1),
(28, 13, 'Séminaires découvertes métiers	', 1),
(29, 14, 'MAT', 1),
(30, 15, 'MAT', 1),
(31, 16, 'MAT', 1),
(32, 17, 'MAT', 1),
(33, 19, 'MATR', 1),
(34, 20, 'MATR', 1),
(35, 21, 'MATR', 1),
(36, 22, 'MATR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `semestre_id` int(11) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `semestre_id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 1, 'Algorithmique et structures de données', '2023-05-26 17:41:56', '2023-05-26 17:41:56'),
(2, 1, 'ARCHITECTURE DES ORDINATEURS', '2023-05-26 17:42:11', '2023-05-26 17:42:11'),
(3, 1, 'Eléments de recherche opérationnelle', NULL, NULL),
(4, 1, 'Gestion, economie et finance 1', NULL, NULL),
(5, 1, 'Langue, communication et développement personnel', NULL, NULL),
(6, 1, 'Statistiques et probabilite appliquee', NULL, NULL),
(7, 2, 'Base de donnees', NULL, NULL),
(8, 2, 'Economie, gestion et finance2 (gef2)', NULL, NULL),
(9, 2, 'Fondements de l’informatique', NULL, NULL),
(10, 2, 'Programmation orienté objet et si', NULL, NULL),
(11, 2, 'Réseaux et système', NULL, NULL),
(12, 2, 'Langue, communication et développement personnel 2', NULL, NULL),
(13, 2, 'Projet première année', NULL, NULL),
(14, 3, 'MODULE1', NULL, NULL),
(15, 3, 'MODULE2', NULL, NULL),
(16, 3, 'MODULE3', NULL, NULL),
(17, 3, 'MODULE4', NULL, NULL),
(19, 4, 'MODULE5', NULL, NULL),
(20, 4, 'MODULE6', NULL, NULL),
(21, 4, 'MODULE7', NULL, NULL),
(22, 4, 'MODULE8', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `niveau`
--

INSERT INTO `niveau` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '1er annéeee', '2023-02-03 02:01:00', '2023-03-02 01:01:00'),
(2, '2eme année', '2023-05-26 16:45:11', '2023-05-26 16:45:11'),
(3, '3eme annee', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

CREATE TABLE `seance` (
  `id` int(11) NOT NULL,
  `matiere_id` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `duree` int(11) NOT NULL,
  `salle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seance`
--

INSERT INTO `seance` (`id`, `matiere_id`, `nom`, `date`, `duree`, `salle`) VALUES
(1, 1, 'Seance 1', '2023-03-03 01:05:00', 3, 'tp1'),
(2, 3, 'seance 2', '2023-05-27 23:12:30', 2, 'L31'),
(3, 13, 'seance 3', '2023-05-27 23:12:30', 2, 'L20'),
(4, 5, 'seance 4', '2023-05-27 23:12:30', 3, 'TP1'),
(5, 7, 'seance 5', '2023-05-27 23:12:30', 3, 'A1'),
(6, 14, 'seance 6', '2023-05-27 23:12:30', 4, 'A4'),
(7, 17, 'seance 2', '2023-05-27 23:12:30', 1, 'L33'),
(8, 2, 'seance 7', '2023-05-27 23:12:30', 2, 'L32'),
(9, 8, 'seance 8', '2023-05-27 23:12:30', 4, 'A2'),
(10, 5, 'seance 9', '2023-05-27 23:12:30', 2, 'A1');

-- --------------------------------------------------------

--
-- Table structure for table `semestre`
--

CREATE TABLE `semestre` (
  `id` int(11) NOT NULL,
  `niveau_id` int(11) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semestre`
--

INSERT INTO `semestre` (`id`, `niveau_id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 1, 'Semestre 1', '2023-05-26 17:20:22', '2023-05-26 17:20:22'),
(2, 1, 'Semestre 2', '2023-05-26 17:20:42', '2023-05-26 17:20:42'),
(3, 2, 'Semestre 3', '2023-05-26 17:23:59', '2023-05-26 17:23:59'),
(4, 2, 'S4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `validé`
--

CREATE TABLE `validé` (
  `id_etudiant` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `validé`
--

INSERT INTO `validé` (`id_etudiant`, `id_niveau`) VALUES
(2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajournée`
--
ALTER TABLE `ajournée`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_717E22E3180AA129` (`filiere_id`);

--
-- Indexes for table `etudiant_examen`
--
ALTER TABLE `etudiant_examen`
  ADD PRIMARY KEY (`etudiant_id`,`examen_id`),
  ADD KEY `IDX_4532E98FDDEAB1A3` (`etudiant_id`),
  ADD KEY `IDX_4532E98F5C8659A` (`examen_id`);

--
-- Indexes for table `etudiant_seance`
--
ALTER TABLE `etudiant_seance`
  ADD PRIMARY KEY (`etudiant_id`,`seance_id`),
  ADD KEY `IDX_CB039B6DDDEAB1A3` (`etudiant_id`),
  ADD KEY `IDX_CB039B6DE3797A94` (`seance_id`);

--
-- Indexes for table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_514C8FECF46CD258` (`matiere_id`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filiere_niveau`
--
ALTER TABLE `filiere_niveau`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `IDX_7413A5F4180AA129` (`filiere_id`),
  ADD KEY `IDX_7413A5F4B3E9C81` (`niveau_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9014574AAFC2B591` (`module_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C2426285577AFDB` (`semestre_id`);

--
-- Indexes for table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DF7DFD0EF46CD258` (`matiere_id`);

--
-- Indexes for table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_71688FBCB3E9C81` (`niveau_id`);

--
-- Indexes for table `validé`
--
ALTER TABLE `validé`
  ADD PRIMARY KEY (`id_etudiant`) USING BTREE,
  ADD UNIQUE KEY `id_etudiant` (`id_etudiant`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seance`
--
ALTER TABLE `seance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_717E22E3180AA129` FOREIGN KEY (`filiere_id`) REFERENCES `filiere` (`id`);

--
-- Constraints for table `etudiant_examen`
--
ALTER TABLE `etudiant_examen`
  ADD CONSTRAINT `FK_4532E98F5C8659A` FOREIGN KEY (`examen_id`) REFERENCES `examen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4532E98FDDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `etudiant_seance`
--
ALTER TABLE `etudiant_seance`
  ADD CONSTRAINT `FK_CB039B6DDDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CB039B6DE3797A94` FOREIGN KEY (`seance_id`) REFERENCES `seance` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `FK_514C8FECF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Constraints for table `filiere_niveau`
--
ALTER TABLE `filiere_niveau`
  ADD CONSTRAINT `FK_7413A5F4180AA129` FOREIGN KEY (`filiere_id`) REFERENCES `filiere` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7413A5F4B3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_et` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `fk_etu` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `fk_filiere_niveau_et` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `fk_filires` FOREIGN KEY (`filiere_id`) REFERENCES `filiere` (`id`),
  ADD CONSTRAINT `fk_niveau` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`);

--
-- Constraints for table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `FK_9014574AAFC2B591` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `FK_C2426285577AFDB` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`);

--
-- Constraints for table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `FK_DF7DFD0EF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Constraints for table `semestre`
--
ALTER TABLE `semestre`
  ADD CONSTRAINT `FK_71688FBCB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
