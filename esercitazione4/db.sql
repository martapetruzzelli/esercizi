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

-- Dump della struttura di tabella quiz_app.answer
CREATE TABLE IF NOT EXISTS `answer` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int unsigned NOT NULL,
  `answer_text` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_correct` tinyint(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__question` (`question_id`),
  CONSTRAINT `FK__question` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella quiz_app.answer: ~40 rows (circa)
INSERT INTO `answer` (`id`, `question_id`, `answer_text`, `is_correct`) VALUES
	(1, 1, 'Oro', 0),
	(2, 1, 'Argento', 0),
	(3, 1, 'Ossigeno', 1),
	(4, 1, 'Rame', 0),
	(5, 2, 'Fotosintesi', 1),
	(6, 2, 'Respirazione', 0),
	(7, 2, 'Digestione', 0),
	(8, 2, 'Traspirazione', 0),
	(9, 3, 'Squalo', 0),
	(10, 3, 'Balena', 1),
	(11, 3, 'Serpente', 0),
	(12, 3, 'Rana', 0),
	(13, 4, 'Gravità', 0),
	(14, 4, 'Magnetismo', 0),
	(15, 4, 'Legame chimico', 1),
	(16, 4, 'Elettricità', 0),
	(17, 5, '1776', 0),
	(18, 5, '1789', 1),
	(19, 5, '1815', 0),
	(20, 6, 'Giorgio VI', 1),
	(21, 6, 'Elisabetta II', 0),
	(22, 6, 'Winston Churchill', 0),
	(23, 7, 'Greci', 0),
	(24, 7, 'Romani', 1),
	(25, 7, 'Egizi', 0),
	(26, 8, 'Giuseppe Garibaldi', 1),
	(27, 8, 'Camillo Benso', 0),
	(28, 8, 'Vittorio Emanuele II', 0),
	(29, 9, 'echo()', 1),
	(30, 9, 'console_log()', 0),
	(31, 9, 'display()', 0),
	(32, 10, '.', 1),
	(33, 10, '+', 0),
	(34, 10, ',', 0),
	(35, 11, 'strlen()', 1),
	(36, 11, 'strlenght()', 0),
	(37, 11, 'lenght()', 0),
	(38, 12, 'variable $nomeVariabile;', 0),
	(39, 12, '$nomeVariabile;', 1),
	(40, 12, 'var $nomeVariabile;', 0);

-- Dump della struttura di tabella quiz_app.question
CREATE TABLE IF NOT EXISTS `question` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `question_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_question_subject` (`subject_id`),
  CONSTRAINT `FK_question_subject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella quiz_app.question: ~12 rows (circa)
INSERT INTO `question` (`id`, `question_text`, `subject_id`) VALUES
	(1, 'Quale dei seguenti elementi non è un metallo?', 1),
	(2, 'Qual è il processo attraverso il quale le piante producono il loro cibo?', 1),
	(3, 'Quale dei seguenti animali è un mammifero?', 1),
	(4, 'Qual è la forza che tiene uniti gli atomi in una molecola?', 1),
	(5, 'In che anno è iniziata la Rivoluzione Francese?', 2),
	(6, 'Chi era il re d\'Inghilterra durante la Seconda Guerra Mondiale?', 2),
	(7, 'Quale antica civiltà ha costruito il Colosseo?', 2),
	(8, 'Chi ha guidato la spedizione dei Mille?', 2),
	(9, 'Quale delle seguenti funzioni PHP viene utilizzata per stampare un output a schermo?', 3),
	(10, 'Quale simbolo viene utilizzato per concatenare le stringhe in PHP?', 3),
	(11, 'Quale funzione PHP viene utilizzata per ottenere la lunghezza di una stringa?', 3),
	(12, 'Come si dichiara una variabile in PHP?', 3);

-- Dump della struttura di tabella quiz_app.subject
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella quiz_app.subject: ~3 rows (circa)
INSERT INTO `subject` (`id`, `name`) VALUES
	(1, 'science'),
	(2, 'storia'),
	(3, 'PHP');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
