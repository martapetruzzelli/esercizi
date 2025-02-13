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


-- Dump della struttura del database api_crud_ristorante
CREATE DATABASE IF NOT EXISTS `api_crud_ristorante` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `api_crud_ristorante`;

-- Dump della struttura di tabella api_crud_ristorante.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.cache: ~0 rows (circa)

-- Dump della struttura di tabella api_crud_ristorante.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.cache_locks: ~0 rows (circa)

-- Dump della struttura di tabella api_crud_ristorante.dishes
CREATE TABLE IF NOT EXISTS `dishes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) NOT NULL,
  `available` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.dishes: ~3 rows (circa)
INSERT INTO `dishes` (`id`, `name`, `description`, `price`, `available`, `created_at`, `updated_at`, `img`) VALUES
	(2, 'Tomato Pasta', 'pasta with tomato sauce', 5.00, 1, '2025-02-13 09:33:20', '2025-02-13 09:33:20', 'sugo.jpg'),
	(3, 'Caesar salad', 'salad with grilled chicken', 3.00, 0, '2025-02-13 09:33:20', '2025-02-13 09:33:20', 'caesar.jpg'),
	(4, 'Mushroom risotto', 'creamy risotto with mushroom', 7.00, 1, '2025-02-13 09:33:20', '2025-02-13 09:33:20', 'risotto.jpg');

-- Dump della struttura di tabella api_crud_ristorante.dish_ingredient
CREATE TABLE IF NOT EXISTS `dish_ingredient` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dish_id` bigint unsigned NOT NULL,
  `ingredient_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dish_ingredient_dish_id_foreign` (`dish_id`),
  KEY `dish_ingredient_ingredient_id_foreign` (`ingredient_id`),
  CONSTRAINT `dish_ingredient_dish_id_foreign` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `dish_ingredient_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.dish_ingredient: ~13 rows (circa)
INSERT INTO `dish_ingredient` (`id`, `dish_id`, `ingredient_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(2, 2, 2, '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(3, 2, 3, '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(4, 2, 4, '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(5, 2, 5, '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(6, 2, 7, '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(7, 2, 8, '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(8, 3, 2, '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(9, 3, 3, '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(10, 3, 5, '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(11, 3, 6, '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(12, 3, 8, '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(13, 4, 1, '2025-02-13 09:33:20', '2025-02-13 09:33:20');

-- Dump della struttura di tabella api_crud_ristorante.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.failed_jobs: ~0 rows (circa)

-- Dump della struttura di tabella api_crud_ristorante.ingredients
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.ingredients: ~8 rows (circa)
INSERT INTO `ingredients` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'pasta', '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(2, 'tomato', '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(3, 'salad', '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(4, 'chicken', '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(5, 'rice', '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(6, 'mushroom', '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(7, 'oil', '2025-02-13 09:33:20', '2025-02-13 09:33:20'),
	(8, 'salt', '2025-02-13 09:33:20', '2025-02-13 09:33:20');

-- Dump della struttura di tabella api_crud_ristorante.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.jobs: ~0 rows (circa)

-- Dump della struttura di tabella api_crud_ristorante.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.job_batches: ~0 rows (circa)

-- Dump della struttura di tabella api_crud_ristorante.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.migrations: ~6 rows (circa)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_02_12_144838_create_dishes_table', 1),
	(5, '2025_02_12_152427_add_img_column_to_dishes_table', 1),
	(6, '2025_02_12_160955_create_personal_access_tokens_table', 1);

-- Dump della struttura di tabella api_crud_ristorante.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.password_reset_tokens: ~0 rows (circa)

-- Dump della struttura di tabella api_crud_ristorante.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.personal_access_tokens: ~2 rows (circa)
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 3, 'access_token', '7b3a2170883fee75a255f8ddb0c33a6e162fdffd15e80b0633d6f60dcfe7d8d3', '["*"]', NULL, NULL, '2025-02-13 10:40:33', '2025-02-13 10:40:33'),
	(2, 'App\\Models\\User', 3, 'access_token', 'dbd84d1e4372cb0a7cfea90ac4ea0c341573f665b52a903099917fa597da678e', '["*"]', NULL, NULL, '2025-02-13 12:04:21', '2025-02-13 12:04:21');

-- Dump della struttura di tabella api_crud_ristorante.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.sessions: ~0 rows (circa)

-- Dump della struttura di tabella api_crud_ristorante.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella api_crud_ristorante.users: ~1 rows (circa)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(3, 'admin', 'test@example.com', '2025-02-13 09:33:20', '$2y$12$YPq7vrSq9NNy4xz7vF1V1eY6m9taAbMpxxjPQz./ElPQp/FyzKQSy', 'bANFWyT2ad', '2025-02-13 09:33:20', '2025-02-13 09:33:20');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
