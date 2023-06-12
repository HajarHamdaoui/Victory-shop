-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 12 juin 2023 à 11:14
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Coca-cola'),
(2, 'Calipatra'),
(3, 'nike');

-- --------------------------------------------------------

--
-- Structure de la table `card`
--

CREATE TABLE `card` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `demand_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `card`
--

INSERT INTO `card` (`product_id`, `ip_address`, `quantity`, `demand_date`) VALUES
(2, '::1', 1, '0000-00-00'),
(3, '::1', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(19, 'Men clothes'),
(20, 'women clothes'),
(21, 'shoes');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(30) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_keywords` varchar(30) NOT NULL,
  `category_title` varchar(30) NOT NULL,
  `brand_title` varchar(30) NOT NULL,
  `product_image1` varchar(200) NOT NULL,
  `product_image2` varchar(200) NOT NULL,
  `product_image3` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_title`, `brand_title`, `product_image1`, `product_image2`, `product_image3`, `price`, `date`, `state`) VALUES
(2, 'juice', 'delicious orange juice ', 'orange fresh', 'women clothes', 'Calipatra', 'juice.jpeg', 'juice.jpeg', 'juice.jpeg', 10, '2023-03-23 16:50:13', 'true'),
(3, 'juice', 'delicious orange juice ', 'orange fresh', 'women clothes', 'Calipatra', 'juice.jpeg', 'juice.jpeg', 'juice.jpeg', 10, '2023-03-23 17:08:50', 'true'),
(4, 'cup', 'beautiful black cup', 'nike beauty cup ', 'Men clothes', 'nike', 'nikecup.jpg', 'cup2.jpg', 'cup3.jpg', 20, '2023-03-23 17:09:42', 'true');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`username`, `user_password`, `user_email`, `user_ip`, `user_image`, `user_address`, `user_mobile`) VALUES
('Hajar', 'Mia@ump2021', 'hamdaouihajar@gmail.com', '::1', 'mulipleArray.png', 'zegzel', 6317310),
('Hiba', '$2y$10$Fng2gWeRUzxWMqwHCRih4eU8bZHRlytBfZ/lS4k.auH.GifSSrmuW', 'g', '::1', 'mulipleArray.png', 'qsh', 6317310),
('Hibara', '$2y$10$AVI849IQbYfIxrKQs2/Swua/BK0vqNGqnyBo/0p5ILWKhX/3E69WC', 'rtkl', '::1', 'mulipleArray.png', 'qsh', 6317310),
('', '', '', '', '', '', 0),
('Assia', '$2y$10$kG/gyrGdAUfluPhKXTUqy.z99Hyiir9kGAPNAdIYAOMvVZtFReQz.', 'hamdaouihajar200@gmail.com', '::1', 'mulipleArray.png', 'qsh', 21222);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Index pour la table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
