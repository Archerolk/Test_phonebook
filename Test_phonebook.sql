-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.31 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных Test_phonebook
CREATE DATABASE IF NOT EXISTS `Test_phonebook` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Test_phonebook`;


-- Дамп структуры для таблица Test_phonebook.phonebook
CREATE TABLE IF NOT EXISTS `phonebook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` char(50) DEFAULT NULL COMMENT 'Имя',
  `lastname` char(50) DEFAULT NULL COMMENT 'Фамилия',
  `phone` char(13) DEFAULT NULL COMMENT '№ Телефона',
  `email` char(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL COMMENT 'Дата рождения',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Test_phonebook.phonebook: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `phonebook` DISABLE KEYS */;
INSERT INTO `phonebook` (`id`, `firstname`, `lastname`, `phone`, `email`, `birthday`) VALUES
	(2, 'Михаил', 'Каразинко', '0661122233', 'mk@yu.1', '2004-02-04'),
	(3, 'Захар', '', '+380556611188', 'yu@jh.uu', '1952-01-05'),
	(4, 'Александр', '', '+380931234567', '', '2001-02-07'),
	(5, 'Ирина', '', '', '', '1948-11-11'),
	(6, 'Полина', '', '+3801321232', '', '2022-02-15'),
	(7, 'Полина', '', '0661122231', '', '2004-02-05'),
	(8, 'Лариса', '', '+380123456789', '', '2004-02-02'),
	(10, 'Анжелика', 'Фролова', '+380123456788', '', '2004-02-02'),
	(11, 'Ольга', 'Шаляпина', '+380501111111', 'yfs@g.mail', '2003-07-01');
/*!40000 ALTER TABLE `phonebook` ENABLE KEYS */;


-- Дамп структуры для таблица Test_phonebook.phones
CREATE TABLE IF NOT EXISTS `phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` char(13) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Name` (`name`),
  CONSTRAINT `Name` FOREIGN KEY (`name`) REFERENCES `phonebook` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Test_phonebook.phones: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `phones` DISABLE KEYS */;
INSERT INTO `phones` (`id`, `phone`, `name`) VALUES
	(1, '0661234567', 2),
	(2, '+380501234567', 2),
	(3, '+380581234567', 3);
/*!40000 ALTER TABLE `phones` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
