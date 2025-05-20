-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 05:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee-ltk`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id_admin` int(10) NOT NULL,
  `nom_admin` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mot_de_passe` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrateurs`
--

INSERT INTO `administrateurs` (`id_admin`, `nom_admin`, `email`, `mot_de_passe`, `created_at`) VALUES
(3, 'Ltk-Mxz', 'a96.paul96@gmail.com', '$2y$10$rfARt.keK5P0EGF/O4ts5uIMkxymE7GmHsvfo2hkFnffbn3vjF85.', '2025-01-29 10:32:39'),
(4, 'Ltk', 'ltk@ltk.fr', '$2y$10$a8Q2t49GjOsuj7KUaDx8ReCAC8FoxhGqEiJYZeFuWIbs.72g.iAaG', '2025-02-10 16:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(10) NOT NULL,
  `commentaire` varchar(200) NOT NULL,
  `nom_utilisateur` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id_avis`, `commentaire`, `nom_utilisateur`, `created_at`) VALUES
(1, 'Holisticly coordinate real-time collaboration and idea-sharing whereas cross-media systems. ', 'user2@gmail.com', '2023-05-06 10:42:11'),
(2, 'Compellingly utilize excellent total linkage vis-a-vis client-based experiences. Competently underwhelm client-centered systems without intermandated ', 'user2@gmail.com', '2023-05-06 10:45:39'),
(3, 'HoHOHOHOHOHO', 'Ltk', '2025-01-29 16:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int(10) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `region` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `ville` varchar(200) NOT NULL,
  `code_postal` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `id_utilisateur` int(10) NOT NULL,
  `statut_commande` varchar(200) NOT NULL,
  `prix_total` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `prenom`, `nom`, `region`, `adresse`, `ville`, `code_postal`, `telephone`, `id_utilisateur`, `statut_commande`, `prix_total`, `created_at`) VALUES
(3, 'MOhamed', 'Hassan', 'France', 'tectures whereas cross-platform channels. Globally envision', 'Paris', '0199221', '019292322', 3, 'Pending', 14, '2023-05-07 10:51:05'),
(4, 'Mohamed ', 'Hassan', 'France', 'tionships after out-of-the-box resources. Professional', 'Paris', '0292932', '019298832', 3, 'Pending', 20, '2023-05-07 11:01:28'),
(5, 'Ltk', 'Mxz', 'France', 'Holo', 'Lome', '1234', '+228 93 80 96 80', 5, 'Pending', 277, '2025-01-29 16:42:57'),
(6, 'HOLO', 'HILI', 'Corée du Sud', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 7, 'En attente', 257, '2025-02-10 02:19:49'),
(7, 'Mxz', 'Ltk', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 7, 'En attente', 3560, '2025-02-10 02:43:11'),
(8, 'HOLO', 'Ltk', 'Japon', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 7, 'En attente', 3560, '2025-02-10 02:45:07'),
(9, 'HOLO', 'Ltk', 'Corée du Sud', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 7, 'En attente', 3560, '2025-02-10 03:16:50'),
(10, 'Mxz', 'HILI', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 7, 'En attente', 3560, '2025-02-10 13:25:44'),
(11, 'Mxz', 'HILI', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 7, 'En attente', 3605, '2025-02-10 15:13:16'),
(12, 'Mxz', 'HILI', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 7, 'En attente', 3605, '2025-02-10 15:13:48'),
(13, 'HOLO', 'Ltk', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 7, 'En attente', 4100, '2025-02-10 15:14:52'),
(14, 'HOLO', 'Ltk', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 4, 'En attente', 5234, '2025-02-10 16:34:35'),
(15, 'HOLO', 'Ltk', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 4, 'En attente', 15500, '2025-02-10 16:35:56'),
(16, 'HOLO', 'Ltk', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 4, 'En attente', 15500, '2025-02-10 16:43:51'),
(17, 'HOLO', 'Ltk', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 4, 'En attente', 15500, '2025-02-10 16:46:49'),
(18, 'HOLO', 'Ltk', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 4, 'En attente', 15500, '2025-02-10 16:46:56'),
(19, 'HOLO', 'Ltk', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 4, 'En attente', 15500, '2025-02-10 16:47:09'),
(20, 'HOLO', 'Ltk', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 4, 'En attente', 15500, '2025-02-10 16:47:27'),
(21, 'HOLO', 'Ltk', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 4, 'En attente', 15500, '2025-02-10 16:47:35'),
(22, 'HOLO', 'Ltk', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 4, 'En attente', 15500, '2025-02-10 16:48:40'),
(23, 'HOLO', 'Ltk', 'France', 'LLLL', 'nnmnmnm', 'mnnmmnnm', '909', 4, 'En attente', 15500, '2025-02-10 16:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(10) NOT NULL,
  `nom_produit` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `prix` varchar(10) NOT NULL,
  `id_produit` int(10) NOT NULL,
  `description_produit` text NOT NULL,
  `quantite` int(10) NOT NULL,
  `id_utilisateur` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id_panier`, `nom_produit`, `image`, `prix`, `id_produit`, `description_produit`, `quantite`, `id_utilisateur`, `created_at`) VALUES
(13, 'Ice Coffee', 'menu-2.jpg', '7', 2, 'A small river named Duden flows by their place and supplies', 1, 3, '2023-05-07 10:56:31'),
(14, 'Coffe Capuccino', 'menu-3.jpg', '6', 1, 'A small river named Duden flows by their place and supplies', 1, 3, '2023-05-07 10:59:55'),
(16, 'Hot Cake Honey', 'dessert-1.jpg', '3', 3, 'A small river named Duden flows by their place and supplies\r\n\r\n', 90, 5, '2025-01-29 16:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(10) NOT NULL,
  `nom_produit` varchar(200) NOT NULL,
  `image_produit` varchar(200) NOT NULL,
  `description_produit` text NOT NULL,
  `prix` varchar(10) NOT NULL,
  `type_produit` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `image_produit`, `description_produit`, `prix`, `type_produit`, `created_at`) VALUES
(1, 'Coffe Capuccino', 'menu-3.jpg', 'A small river named Duden flows by their place and supplies', '6', 'drink', '2023-05-04 10:40:16'),
(2, 'Ice Coffee', 'menu-2.jpg', 'A small river named Duden flows by their place and supplies', '7', 'drink', '2023-05-04 10:40:16'),
(3, 'Hot Cake Honey', 'dessert-1.jpg', 'A small river named Duden flows by their place and supplies\n\n', '3', 'dessert', '2023-05-06 09:08:34'),
(4, 'Pancake', 'dessert-2.jpg', 'A small river named Duden flows by their place and supplies\n\n', '3', 'dessert', '2023-05-06 09:08:34'),
(8, 'Yoooo', 'BOUDDHA-TOF.jpeg', 'jdskjkjdskjds', 'Holo', 'drink', '2025-02-05 18:52:34'),
(9, 'Poulet Braisé', 'cup-black-coffee-with-piece-chocolate.jpg', 'Tastefull !!!', '1200', 'boisson', '2025-02-10 16:09:57'),
(10, 'Poulet Braisé', 'fresh-sandwich-with-fresh-vegetables-coffee.jpg', 'HOLO', '1200', 'dessert', '2025-02-10 16:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(10) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `date_reservation` varchar(200) NOT NULL,
  `heure_reservation` varchar(200) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `message_reservation` text NOT NULL,
  `statut_reservation` varchar(200) NOT NULL DEFAULT 'En attente',
  `id_utilisateur` int(7) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(10) NOT NULL,
  `nom_utilisateur` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mot_de_passe` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom_utilisateur`, `email`, `mot_de_passe`, `created_at`) VALUES
(3, 'user2@gmail.com', 'user2@gmail.com', '$2y$10$nlhdvRV2AtBVcGwKkSzBM.qIh3rVVGzlyLDWHvNge9.8ZMPY9ZvMi', '2023-05-02 12:00:10'),
(4, 'paul', 'a96.paul96@gmail.com', '$2y$10$ByzkxB1DgicSWontixt0vOy6eL/qooJ6YbsUIbqS0GspgUwYRzLo2', '2025-01-29 10:18:24'),
(5, 'Ltk', 'ltk@ltk.fr', '$2y$10$wu2Inqhxs7rENHQKe6fBUeXjibapzPmepmYYlaLfFLf36Ms4ErvRy', '2025-01-29 16:33:28'),
(6, 'ltk', 'ltk@ltk.fr', '$2y$10$aeHjSSG5sl8nZujKRO6nXejLJjZ.0vjOoWAi7d8VeextqAlyW.uQ2', '2025-02-10 01:03:20'),
(7, 'MXZ', 'mxz@mxz.fr', '$2y$10$cnug2s0RTryMUJ5g1Rdbe.2sd3oQlFFRXD.9BiMOj4m8WoKR0eJbC', '2025-02-10 01:04:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `fk_commande_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `fk_panier_utilisateur` (`id_utilisateur`),
  ADD KEY `fk_panier_produit` (`id_produit`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `fk_reservation_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_commande` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_commande_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_panier_produit` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`),
  ADD CONSTRAINT `fk_panier_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_reservation_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
