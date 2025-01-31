-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              8.0.30 - MySQL Community Server - GPL
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dump della struttura di tabella ecommerce.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__users` (`user_id`),
  CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.orders: ~3 rows (circa)
INSERT INTO `orders` (`id`, `user_id`, `date`) VALUES
	(4, 15, '2025-01-30'),
	(18, 16, '2025-01-30'),
	(19, 16, '2025-01-30'),
	(21, 15, '2025-01-31');

-- Dump della struttura di tabella ecommerce.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `order_id` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `quantity` int unsigned NOT NULL,
  KEY `FK__orders` (`order_id`),
  KEY `FK_order_items_products` (`product_id`),
  CONSTRAINT `FK__orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `FK_order_items_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.order_items: ~7 rows (circa)
INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`) VALUES
	(4, 1, 4),
	(4, 3, 1),
	(4, 4, 7),
	(4, 8, 1),
	(18, 1, 1),
	(18, 4, 4),
	(19, 2, 1),
	(21, 6, 1);

-- Dump della struttura di tabella ecommerce.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.products: ~9 rows (circa)
INSERT INTO `products` (`id`, `name`, `description`, `price`, `img`) VALUES
	(1, 'Tomato Pasta', 'Pasta with tomato sauce', 5.00, 'includes/img/sugo.jpg'),
	(2, 'Carbonara Pasta', 'Pasta with egg yolk and bacon', 8.00, 'includes/img/carbonara.jpg'),
	(3, 'Steak', 'Grilled steak', 8.00, 'includes/img/Bistecca.jpg'),
	(4, 'Grilled Vegetables', 'Seasonal vegetables', 5.00, 'includes/img/verdure.jpg'),
	(5, 'Today\'s fish', 'Grilled Fish', 15.00, 'includes/img/pescato.jpg'),
	(6, 'Caesar Salad', 'Salad with grilled chicken and parmesan', 7.00, 'includes/img/caesar.jpg'),
	(7, 'Caprese Salad', 'Tomato and mozzarella salad', 6.00, 'includes/img/caprese.jpg'),
	(8, 'Mushroom Risotto', 'Creamy risotto with mushrooms', 9.00, 'includes/img/risotto.jpg'),
	(9, 'Bread', 'Sourdough homemade bread', 2.00, 'includes/img/pane.jpg');

-- Dump della struttura di tabella ecommerce.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce.users: ~2 rows (circa)
INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
	(15, 'marta', '$2y$10$8ldZlK/6Pscm36W4pnKzP.txDbtnsemlKkFW8FK1E4Cy3ELlgVa9S', 'martapetruzzelli1@gmail.com'),
	(16, 'oksana', '$2y$10$tVH0eCnVm.27wp67ZoBcbu2hpkd7rGkQirZiiJDfryZ9b2w4D18vS', 'oksana@oksana.com'),
	(17, 'Batman', '$2y$10$a9bVDK3hoHxY/YhqcEtfLeXmeK8PpkP04U5ar5amsP8FlAuG0tL8O', 'batman@batman.it');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
