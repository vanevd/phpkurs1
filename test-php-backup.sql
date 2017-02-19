-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия на сървъра:            5.7.14 - MySQL Community Server (GPL)
-- ОС на сървъра:                Win64
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дъмп структура за таблица test-php.clients
DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Дъмп данни за таблица test-php.clients: 5 rows
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `first_name`, `last_name`, `phone`, `email`) VALUES
	(7, 'Peter', 'Petrov2', '0878150777', 'peter@abv.bg'),
	(5, 'Venesa', 'Ivanova', '8972453', 'venesa@abv.bg'),
	(6, 'Vasko', 'Ivanov', '8972434', 'vasko@abv.bg'),
	(15, 'Ivan', 'Ivanov', '98070787', 'ivan@abv.bg'),
	(16, 'Dimitar2', 'Petrov', '98070787', 'ivan@abv.bg');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Дъмп структура за таблица test-php.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(15) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_sum` decimal(8,2) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Дъмп данни за таблица test-php.orders: 7 rows
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `order_number`, `order_date`, `order_sum`, `client_id`) VALUES
	(1, '25', '2017-02-16', 8987.00, 6),
	(3, '26', '2017-01-29', NULL, 7),
	(5, '27', '2017-01-28', 200.00, 5),
	(6, '28', '2017-01-20', NULL, 5),
	(7, '29', '2017-01-21', NULL, 7),
	(8, '30', '2017-01-21', NULL, 6),
	(9, '31', '2017-02-20', NULL, 5);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Дъмп структура за таблица test-php.order_details
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` decimal(8,2) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `product_sum` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Дъмп данни за таблица test-php.order_details: 12 rows
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `product_sum`) VALUES
	(25, 5, 1, 1.00, 200.00, 200.00),
	(3, 0, 4, 1.00, 200.00, 200.00),
	(4, 0, 0, 0.00, 0.00, 0.00),
	(14, 1, 2, 22.00, 100.00, 2200.00),
	(7, 1, 3, 1.00, 200.00, 200.00),
	(13, 1, 1, 2.00, 50.00, 100.00),
	(12, 1, 2, 11.00, 123.00, 1353.00),
	(21, 3, 1, 1.00, 100.00, 100.00),
	(17, 1, 3, 22.00, 222.00, 4884.00),
	(20, 1, 2, 2.00, 100.00, 200.00),
	(22, 3, 2, 2.00, 200.00, 400.00),
	(24, 1, 1, 1.00, 50.00, 50.00);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;

-- Дъмп структура за таблица test-php.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Дъмп данни за таблица test-php.products: 4 rows
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `product_name`, `product_code`, `price`) VALUES
	(8, 'Samsung', '2345', 129.00),
	(2, 'Tablet Lenovo', '4556', 95.00),
	(3, 'GSM Samsung', '2478', 199.00),
	(4, 'Tablet Asus 12', '7878', 350.00);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
