-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2025 at 12:30 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `takenlijst`
--

CREATE DATABASE takenlijst;
USE takenlijst;

--
-- Table structure for table `taken`
--

CREATE TABLE `taken` (
  `id` int NOT NULL,
  `titel` varchar(255) NOT NULL,
  `beschrijving` text NOT NULL,
  `afdeling` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'todo',
  `deadline` DATETIME NOT NULL,
  `user` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `taken`
--

INSERT INTO `taken` (`id`, `titel`, `beschrijving`, `afdeling`, `status`, `deadline`, `user`, `created_at`) VALUES
(1, 'Website update', 'Herontwerpen van de homepage', 'IT', 'doing', '2025-04-10', 1, '2025-04-01 09:17:08'),
(2, 'Klantmeeting', 'Afspraak met klant over nieuwe features', 'Sales', 'to-do', '2025-04-12', 2, '2025-04-01 09:17:08'),
(3, 'Bug fix API', 'Oplossen van kritieke bug in backend', 'Development', 'review', '2025-04-08', 3, '2025-04-01 09:17:08'),
(4, 'Nieuwe campagne', 'Opzetten van een marketingcampagne', 'Marketing', 'to-do', '2025-04-15', 4, '2025-04-01 09:17:08'),
(5, 'Pen test uitvoeren', 'Beveiligingstesten uitvoeren op het netwerk', 'Cybersecurity', 'doing', '2025-04-18', 5, '2025-04-01 09:17:08'),
(6, 'Rapportage Q1', 'Opstellen kwartaalrapportage', 'Finance', 'done', '2025-04-05', 6, '2025-04-01 09:17:08'),
(7, 'Nieuwe medewerkers onboarden', 'Introductie voor nieuwe teamleden', 'HR', 'review', '2025-04-20', 7, '2025-04-01 09:17:08'),
(8, 'Server upgrade', 'Upgraden van productieserver naar nieuwste versie', 'IT', 'doing', '2025-04-15', 1, '2025-04-01 09:37:25'),
(9, 'SEO optimalisatie', 'Verbeteren van zoekmachine optimalisatie', 'Marketing', 'to-do', '2025-04-22', 2, '2025-04-01 09:37:25'),
(10, 'Database backup', 'Back-up maken van klantendatabase', 'IT', 'review', '2025-04-10', 3, '2025-04-01 09:37:25'),
(11, 'Interne training', 'Organiseren van security awareness training', 'HR', 'to-do', '2025-04-25', 4, '2025-04-01 09:37:25'),
(12, 'Productlancering', 'Voorbereiden van nieuwe productrelease', 'Sales', 'doing', '2025-04-30', 5, '2025-04-01 09:37:25'),
(13, 'Security audit', 'Uitvoeren van penetratietest', 'Cybersecurity', 'review', '2025-04-18', 6, '2025-04-01 09:37:25'),
(14, 'Software patch', 'Uitrollen van beveiligingsupdate', 'Development', 'done', '2025-04-12', 7, '2025-04-01 09:37:25'),
(15, 'Teamvergadering', 'Wekelijkse project update meeting', 'HR', 'to-do', '2025-04-11', 1, '2025-04-01 09:37:25'),
(16, 'Factuurcontrole', 'Controle van inkoopfacturen', 'Finance', 'doing', '2025-04-14', 2, '2025-04-01 09:37:25'),
(17, 'Bug tracking', 'Inventariseren van gemelde bugs', 'Development', 'review', '2025-04-20', 3, '2025-04-01 09:37:25'),
(18, 'Personeelsfeest', 'Planning en organisatie', 'HR', 'to-do', '2025-05-05', 4, '2025-04-01 09:37:25'),
(19, 'Grafisch ontwerp', 'Nieuwe visuele stijl ontwikkelen', 'Marketing', 'doing', '2025-04-27', 5, '2025-04-01 09:37:25'),
(20, 'Testomgeving opzetten', 'Nieuwe testomgeving configureren', 'IT', 'review', '2025-04-21', 6, '2025-04-01 09:37:25'),
(21, 'Code review', 'Controleren van nieuwe pull requests', 'Development', 'done', '2025-04-17', 7, '2025-04-01 09:37:25'),
(22, 'Nieuwe software testen', 'Testfase voor interne applicatie', 'IT', 'to-do', '2025-04-28', 1, '2025-04-01 09:37:25'),
(23, 'Klanttevredenheidsonderzoek', 'Uitvoeren van klanttevredenheid enquête', 'Sales', 'doing', '2025-04-29', 2, '2025-04-01 09:37:25'),
(24, 'Nieuwe social media strategie', 'Social media campagne ontwikkelen', 'Marketing', 'review', '2025-05-02', 3, '2025-04-01 09:37:25'),
(25, 'Brandveiligheidscontrole', 'Naleving van veiligheidsvoorschriften checken', 'HR', 'to-do', '2025-05-07', 4, '2025-04-01 09:37:25'),
(26, 'VPN-configuratie', 'Beheer van remote access policy', 'Cybersecurity', 'doing', '2025-04-26', 5, '2025-04-01 09:37:25'),
(27, 'Jaarlijkse belastingaangifte', 'Voorbereiding en indiening', 'Finance', 'review', '2025-04-19', 6, '2025-04-01 09:37:25'),
(28, 'Nieuwe leverancier evalueren', 'Vergelijken van offertes', 'Sales', 'done', '2025-04-22', 7, '2025-04-01 09:37:25'),
(29, 'Product demo', 'Voorbereiden en presenteren van een demo', 'Sales', 'to-do', '2025-04-24', 1, '2025-04-01 09:37:25'),
(30, 'Webshop update', 'Toevoegen van nieuwe functies', 'IT', 'doing', '2025-04-20', 2, '2025-04-01 09:37:25'),
(31, 'Netwerksegmentatie', 'Scheiding van interne en externe netwerken', 'Cybersecurity', 'review', '2025-04-23', 3, '2025-04-01 09:37:25'),
(32, 'E-learning platform uitbreiden', 'Nieuwe modules toevoegen', 'Development', 'done', '2025-04-30', 4, '2025-04-01 09:37:25'),
(33, 'Vacatures plaatsen', 'Nieuwe vacatures publiceren', 'HR', 'to-do', '2025-05-01', 5, '2025-04-01 09:37:25'),
(34, 'Contractbesprekingen', 'Onderhandelen over nieuwe contracten', 'Sales', 'doing', '2025-04-16', 6, '2025-04-01 09:37:25'),
(35, 'Nieuwsbrief maken', 'Voorbereiden en verzenden van maandelijkse nieuwsbrief', 'Marketing', 'review', '2025-05-03', 7, '2025-04-01 09:37:25'),
(36, 'Bugfix release', 'Kleine bugfixes doorvoeren en releasen', 'Development', 'done', '2025-04-13', 1, '2025-04-01 09:37:25'),
(37, 'Nieuwe API ontwikkelen', 'Ontwikkelen van REST API voor nieuwe app', 'Development', 'to-do', '2025-04-20', 15, '2025-04-01 09:47:39'),
(38, 'Bugfix sprint', 'Oplossen van kritieke bugs uit backlog', 'Development', 'doing', '2025-04-18', 15, '2025-04-01 09:47:39'),
(39, 'Code review sessie', 'Review van alle openstaande pull requests', 'Development', 'review', '2025-04-22', 15, '2025-04-01 09:47:39'),
(40, 'Refactoring', 'Verbeteren en opschonen van oude code', 'Development', 'done', '2025-04-25', 15, '2025-04-01 09:47:39');


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'Testgebruiker 1', 'user1', '$2y$10$XQwbcsOWgM0KvAbya2Ad2efBwTLra2CzeduJtAuY8.BW9EHx.cFKa', '2025-03-17 09:56:00'),
(2, 'Testgebruiker 2', 'user2', '$2y$10$HoDxSJa/4NcFcJ.U.kj9N.cSBgcm75IwUkdgxJhLjRXY/K2cP8Fl.', '2025-03-17 09:56:00'),
(3, 'Testgebruiker 3', 'user3', '$2y$10$M7vkYfdWMYqLzvCqjlOh7.nPc79zwDxtItUOh/91teGikS/XrpNuO', '2025-03-17 09:56:00'),
(11, 'swendewit@hotmail.com', 'swen', '$2y$10$K4HQJkRASBv9nsAhHQ3B2u4mHL/QVmEZ/rP/Gh38Q7ZeyFcAcFLLW', '2025-03-18 09:51:17'),
(12, 'Ryandewit@hotmail.com', 'Ryan', '$2y$10$taSbp9dfCw9au3wa25SLp.cqYQDpwgq6YGCHepiYM7O2HqQVh9OzK', '2025-03-18 10:25:24'),
(13, 'swendewit@hotmail.com', 'Swen', '$2y$10$8u0TZCLfyzxE5u.mLERZROUd7w/rnhSrecoIJssDp/IgHwqfGg1zy', '2025-03-20 19:42:33'),
(14, 'rgrizell467@gmail.com', 'Roy', '$2y$10$9rebeqU2e1j2kMPu43L04.KcJN8NeqVpWfdUfR6T3ttbJ7DmpvN0a', '2025-03-20 19:43:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taken`
--
ALTER TABLE `taken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taken`
--
ALTER TABLE `taken`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
