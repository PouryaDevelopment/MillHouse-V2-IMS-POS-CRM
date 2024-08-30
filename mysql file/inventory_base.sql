-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 10:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `accreq`
--

CREATE TABLE `accreq` (
  `acc_req_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `phonenumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accreq`
--

INSERT INTO `accreq` (`acc_req_id`, `full_name`, `phonenumber`) VALUES
(1, 'pourya slami', '07474747474'),
(2, 'Sophie Janey', '07237123122'),
(3, 'dariush yapak', '03030300303'),
(4, 'Hamza Karin', '07575679133'),
(5, 'James Carrier', '07237123121'),
(6, 'Majid Sajed', '07556745174'),
(7, 'Mojin Kasio', '073755479133');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `name`, `location`) VALUES
(1, 'Downtown', '123 Coffee St.'),
(2, 'Uptown', '456 Java Ave.'),
(3, 'Midtown', '789 Espresso Rd.'),
(4, 'Eastside', '101 Latte Ln.');

-- --------------------------------------------------------

--
-- Table structure for table `employee_work_schedule`
--

CREATE TABLE `employee_work_schedule` (
  `schedule_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `work_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_work_schedule`
--

INSERT INTO `employee_work_schedule` (`schedule_id`, `user_id`, `work_date`, `start_time`, `end_time`) VALUES
(1, 1, '2024-04-17', '08:30:00', '20:00:00'),
(2, 4, '2024-04-14', '10:00:00', '14:00:00'),
(3, 6, '2024-04-14', '16:00:00', '21:00:00'),
(4, 3, '2024-04-16', '07:00:00', '14:00:00'),
(5, 8, '2024-04-18', '16:00:00', '21:00:00'),
(6, 5, '2024-04-17', '18:30:00', '23:30:00'),
(7, 3, '2024-04-07', '18:00:00', '23:00:00'),
(15, 15, '2024-04-19', '22:05:00', '07:03:00'),
(16, 15, '2024-04-21', '17:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_website_id` int(11) NOT NULL,
  `fullname` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `comment` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `notification_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_website_id`, `fullname`, `comment`, `rating`, `notification_read`, `created_at`) VALUES
(1, 'Desislav Cadhla', 'Great coffee, will definitely come back!', 5, 0, '2024-02-12 19:46:20'),
(2, 'Lucjan Sheamus', 'Loved the croissants, but the service was a bit slow.', 4, 0, '2024-03-19 08:10:11'),
(3, 'Xanthe Finees', 'Not the best latte I had, but decent overall.', 3, 0, '2024-04-06 20:44:26'),
(4, 'Juliana Ligaya', 'The ambiance is perfect for working or reading.', 5, 0, '2024-04-06 17:10:10'),
(5, 'Gulnaz Gethin', 'Espresso was too bitter for my taste.', 2, 0, '2024-04-06 05:35:34'),
(6, 'fatemeh anori', 'It was decent.', 3, 0, '2024-04-06 08:45:30'),
(7, 'Pourya Slami', 'Not bad not good.', 3, 0, '2024-04-06 11:06:08'),
(8, 'Mojgun Asheri', 'the coffee was very good', 5, 0, '2024-04-06 09:43:42'),
(9, 'Abraham jesi', 'the food wasn\'t good.', 1, 0, '2024-04-06 15:29:40'),
(10, 'Jesse loki', 'Wasn\'t as good as they advertised.', 1, 0, '2024-04-06 05:14:24'),
(11, 'Pasha Gandom', 'Not my preference.', 2, 0, '2024-04-06 15:26:39'),
(12, 'Illia Smith', 'Disgusting food.', 1, 0, '2024-03-13 14:49:14'),
(13, 'Jhon Watson', 'Please improve the tables, they are old.', 1, 0, '2024-04-06 13:51:41'),
(15, 'Samual yajub', 'Very friendly environment.', 4, 0, '2024-04-18 23:10:56'),
(16, 'Danial misco', 'Owner was rude.', 1, 0, '2024-04-18 23:11:25'),
(17, 'Shannon bRandon', 'Friendly cashier!', 4, 0, '2024-04-18 23:12:21'),
(18, 'Shamia Lindi', 'Exceptional service, will come again.', 4, 0, '2024-04-20 02:09:20'),
(19, 'Jason Smity', 'Horrible cashier, please fire him!', 1, 0, '2024-04-20 02:09:51'),
(20, 'Jason Smity', 'Horrible cashier, please fire him!', 1, 0, '2024-05-02 17:50:29'),
(21, 'Jason Smity', 'Horrible cashier, please fire him!', 1, 0, '2024-05-02 17:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `ingredient_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`ingredient_id`, `name`, `quantity`, `unit_price`, `total`) VALUES
(1, 'Coffee Beans', 119, 1.70, 202.30),
(2, 'Milk', 11, 2.00, 22.00),
(3, 'Bread', 151, 1.00, 151.00),
(4, 'Sugar', 51, 0.50, 25.50),
(5, 'Cheese', 76, 2.00, 152.00),
(6, 'Ham', 51, 3.00, 153.00);

--
-- Triggers `ingredient`
--
DELIMITER $$
CREATE TRIGGER `before_ingredient_insert` BEFORE INSERT ON `ingredient` FOR EACH ROW BEGIN
    SET NEW.total = NEW.quantity * NEW.unit_price;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_ingredient_update` BEFORE UPDATE ON `ingredient` FOR EACH ROW BEGIN
    SET NEW.total = NEW.quantity * NEW.unit_price;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `instore_feedback`
--

CREATE TABLE `instore_feedback` (
  `feedback_instore_id` int(255) NOT NULL,
  `product_id` varchar(30) DEFAULT NULL,
  `instore_comment` varchar(300) NOT NULL,
  `instore_rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `notification_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instore_feedback`
--

INSERT INTO `instore_feedback` (`feedback_instore_id`, `product_id`, `instore_comment`, `instore_rating`, `created_at`, `notification_read`) VALUES
(1, '1', 'The drink wasn\'t good.', 2, '2024-04-06 12:25:41', 0),
(2, '6', 'I found a hair on my muffin.', 2, '2024-04-07 04:24:41', 0),
(3, '3', 'too bitter', 2, '2024-04-08 15:20:42', 0),
(4, '6', 'good', 5, '2024-04-09 15:27:27', 0),
(5, '4', 'It was good. - jake', 3, '2024-04-12 07:42:27', 0),
(11, '8', 'Really good.', 5, '2024-04-18 15:13:33', 0),
(12, '13', 'Decent - Jake', 4, '2024-04-18 15:14:39', 0),
(13, '4', 'Not good - josh', 2, '2024-04-18 23:06:31', 0),
(14, '2', 'great - samual', 5, '2024-04-18 23:06:42', 0),
(15, '1', 'pretty good', 4, '2024-04-18 23:06:51', 0),
(16, '13', 'overcooked bacon. - shamia', 1, '2024-04-18 23:13:15', 0),
(17, '7', 'Enjoyed it - Brian', 5, '2024-04-18 23:13:50', 0),
(18, '3', 'good stuff', 5, '2024-04-20 02:07:14', 0),
(19, '7', 'it wasnt that nice!!', 2, '2024-04-20 02:07:32', 0),
(20, '5', 'Yummy - Jason', 4, '2024-04-20 02:07:50', 0),
(21, '13', 'Bacon is horrible', 2, '2024-04-20 02:08:04', 0),
(22, '13', 'Nice and crispy!', 5, '2024-04-20 02:08:39', 0),
(23, '3', 'was bad', 2, '2024-04-21 16:56:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `product_id`, `quantity`, `status`) VALUES
(1, 1, 62, 'In Stock'),
(2, 2, 48, 'In Stock'),
(3, 3, 66, 'In Stock'),
(4, 4, 66, 'In Stock'),
(5, 5, 72, 'In Stock'),
(6, 6, 74, 'In Stock'),
(14, 7, 67, 'In Stock'),
(31, 8, 81, 'In Stock'),
(33, 13, 76, 'In Stock');

--
-- Triggers `inventory`
--
DELIMITER $$
CREATE TRIGGER `BeforeInsertInventory` BEFORE INSERT ON `inventory` FOR EACH ROW BEGIN
    IF NEW.quantity > 20 THEN
        SET NEW.status = 'In Stock';
    ELSEIF NEW.quantity BETWEEN 5 AND 20 THEN
        SET NEW.status = 'Low Stock';
    ELSE
        SET NEW.status = 'Out of Stock';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BeforeInventoryInsert` BEFORE INSERT ON `inventory` FOR EACH ROW BEGIN
    SET NEW.status = CASE
        WHEN NEW.quantity > 20 THEN 'In Stock'
        WHEN NEW.quantity BETWEEN 10 AND 20 THEN 'Low Stock'
        WHEN NEW.quantity < 10 THEN 'Out of Stock'
        ELSE NEW.status
    END;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BeforeInventoryUpdate` BEFORE UPDATE ON `inventory` FOR EACH ROW BEGIN
    SET NEW.status = CASE
        WHEN NEW.quantity > 20 THEN 'In Stock'
        WHEN NEW.quantity BETWEEN 10 AND 20 THEN 'Low Stock'
        WHEN NEW.quantity < 10 THEN 'Out of Stock'
        ELSE NEW.status
    END;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BeforeUpdateInventory` BEFORE UPDATE ON `inventory` FOR EACH ROW BEGIN
    IF NEW.quantity > 20 THEN
        SET NEW.status = 'In Stock';
    ELSEIF NEW.quantity BETWEEN 5 AND 20 THEN
        SET NEW.status = 'Low Stock';
    ELSE
        SET NEW.status = 'Out of Stock';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_program`
--

CREATE TABLE `loyalty_program` (
  `program_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loyalty_program`
--

INSERT INTO `loyalty_program` (`program_id`, `name`, `description`) VALUES
(1, 'Family Promo', 'Free drinks whenever.'),
(2, 'Bronze Promo', 'free drink every month.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `items` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `items`, `total`, `order_date`) VALUES
(1, 'Espresso - £2.50 x 1, Espresso - £2.50 x 1, Espresso - £2.50 x 1, Espresso - £2.50 x 1, Espresso - £2.50 x 1, Espresso - £2.50 x ', 15.00, '2024-03-20 03:12:59'),
(2, 'Espresso - £2.50 x 1, Croissant - £2.75 x 1, Americano - £4.50 x 1', 9.75, '2024-03-06 03:16:58'),
(3, 'Espresso - £2.50 x 1, Espresso - v2.50 x 1, Espresso - £2.50 x 1 (Discount: Easter savings - 50%)', 3.75, '2024-03-14 03:38:26'),
(4, 'Espresso - £2.50 x 1', 2.50, '2024-04-05 02:56:48'),
(5, 'Espresso - £2.50 x 1', 2.50, '2024-04-05 02:57:30'),
(6, 'Espresso - £2.50 x 1', 2.50, '2024-04-05 03:01:27'),
(7, 'Espresso - £2.50 x 1, Espresso - £2.50 x 1 (Discount: Easter savings - 50%)', 2.50, '2024-04-05 03:08:50'),
(8, 'Croissant - £2.75 x 9 (Discount: Easter savings - 50%)', 12.38, '2024-04-05 03:24:18'),
(9, 'Croissant - £2.75 x 9 (Discount: Easter savings - 50%)', 12.38, '2024-04-05 04:15:17'),
(10, 'Espresso - £2.50 x 9 (Discount: Easter savings - 50%)', 11.25, '2024-04-05 04:16:07'),
(11, 'Croissant - £2.75 x 1', 2.75, '2024-04-05 04:17:01'),
(12, 'Espresso - £2.50 x 2', 5.00, '2024-04-05 04:20:36'),
(13, 'Croissant - £2.75 x 1, Americano - £4.50 x 9 (Discount: Easter savings - 50%)', 21.63, '2024-04-07 15:09:11'),
(14, 'Croissant - £2.75 x 1, Americano - £4.50 x 1 (Discount: Easter savings - 50%)', 3.63, '2024-04-07 18:03:05'),
(15, 'Croissant - £2.75 x 1 (Discount: Easter savings - 50%)', 1.38, '2024-04-08 00:17:50'),
(16, 'Americano - £4.50 x 2, Americano - £4.50 x 2', 18.00, '2024-04-08 00:27:06'),
(17, 'Croissant - £2.75 x 1, Americano - £4.50 x 2, Latte - £4.00 x 3 (Discount: Easter savings - 50%)', 11.88, '2024-04-08 04:26:11'),
(18, 'Americano - £4.50 x 1, Americano - £4.50 x 1, Americano - £4.50 x 1, Americano - £4.50 x 1, Bagel - £1.50 x 1, Bagel - £1.50 x 1 (Discount: Easter savings - 50%)', 10.50, '2024-04-09 07:42:15'),
(26, 'Americano - £4.50 x 2 (Discount: Easter savings - 70%)', 4.50, '2024-04-09 20:27:53'),
(27, 'Americano - £4.50 x 2 (Discount: Easter savings - 50%)', 4.50, '2024-04-12 02:42:27'),
(28, 'Croissant - £2.75 x 2 (Discount: Christmas savings - 50%)', 2.75, '2024-04-15 06:29:35'),
(29, 'Espresso - £2.50 x 2', 5.00, '2024-04-15 06:29:57'),
(30, 'Bagel - £1.50 x 2 (Discount: Easter savings - 50%)', 1.50, '2024-04-18 17:19:01'),
(31, 'Americano - £4.50 x 2 (Discount: Easter savings - 50%)', 4.50, '2024-04-18 23:25:42'),
(32, 'Bagel - £1.50 x 1, Muffin - £2.00 x 1, Scone - £4.50 x 1 (Discount: Easter savings - 50%)', 4.00, '2024-04-18 23:26:15'),
(33, 'Croissant - £2.75 x 1, Americano - £4.50 x 1, Latte - £4.00 x 1, Latte - £4.00 x 5', 31.25, '2024-04-18 23:26:50'),
(34, 'Espresso - £2.50 x 2, Muffin - £2.00 x 3', 11.00, '2024-04-18 23:27:20'),
(35, 'Bagel - £1.50 x 1, Croissant - £2.75 x 2', 7.00, '2024-04-18 23:27:45'),
(36, 'Espresso - £2.50 x 3, Espresso - £2.50 x 3, Muffin - £2.00 x 3', 21.00, '2024-04-20 02:10:56'),
(37, 'Espresso - £2.50 x 2', 5.00, '2024-04-20 02:11:06'),
(38, 'Espresso - £2.50 x 3, Scone - £4.50 x 3 (Discount: Easter savings - 50%)', 10.50, '2024-04-20 02:11:34'),
(39, 'Americano - £4.50 x 3', 13.50, '2024-04-21 16:47:49'),
(40, 'Bagel - £1.50 x 2', 3.00, '2024-04-21 16:47:58'),
(41, 'Cappuccino - £3.75 x 3', 11.25, '2024-04-21 16:48:08'),
(42, 'Scone - £4.50 x 2', 9.00, '2024-04-21 16:48:14'),
(43, 'Espresso - £2.50 x 2', 5.00, '2024-04-21 16:48:28'),
(44, 'Latte - £4.00 x 1 (Discount: Easter savings - 50%)', 2.00, '2024-04-21 16:48:39'),
(45, 'Bagel - £1.50 x 2 (Discount: Easter savings - 50%)', 1.50, '2024-04-21 16:55:31'),
(46, 'Americano - £4.50 x 4', 18.00, '2024-04-29 08:25:31'),
(47, 'Espresso - £2.50 x 2', 5.00, '2024-04-29 09:25:31'),
(48, 'Croissant - £2.75 x 2, Bagel - £1.50 x 2', 8.50, '2024-04-29 09:32:31'),
(49, 'Latte - £4.00 x 4, Cappuccino - £3.75 x 2, BLT - £3.50 x 2, Scone - £4.50 x 2', 39.50, '2024-04-29 10:54:31'),
(50, 'Espresso - £2.50 x 4, Muffin - £2.00 x 2', 14.00, '2024-04-29 10:08:31'),
(51, 'Americano - £4.50 x 4', 18.00, '2024-04-29 08:33:31'),
(52, 'Muffin - £2.00 x 3, Croissant - £2.75 x 5', 19.75, '2024-04-29 13:25:31'),
(53, 'Scone - £4.50 x 3, BLT - £3.50 x 3, Americano - £4.50 x 3', 37.50, '2024-04-29 11:44:31'),
(54, 'Latte - £4.00 x 2, Cappuccino - £3.75 x 2, Espresso - £2.50 x 2', 20.50, '2024-04-29 14:25:31'),
(55, 'Americano - £4.50 x 3, Espresso - £2.50 x 1, Bagel - £1.50 x 2, Muffin - £2.00 x 2, Scone - £4.50 x 2', 32.00, '2024-04-30 07:40:14'),
(56, 'Espresso - £2.50 x 2, Bagel - £1.50 x 2, Muffin - £2.00 x 2, Cappuccino - £3.75 x 2', 19.50, '2024-04-30 07:52:14'),
(57, 'Espresso - £2.50 x 2, BLT - £3.50 x 2, Espresso - £2.50 x 2, Americano - £4.50 x 2', 26.00, '2024-04-30 07:59:14'),
(58, 'Latte - £4.00 x 3, Croissant - £2.75 x 4, Scone - £4.50 x 2', 32.00, '2024-04-30 07:47:14'),
(59, 'Croissant - £2.75 x 3, Espresso - £2.50 x 3, BLT - £3.50 x 3', 26.25, '2024-04-30 07:43:14'),
(60, 'Espresso - £2.50 x 1, Muffin - £2.00 x 1, Scone - £4.50 x 1', 9.00, '2024-04-30 08:00:14'),
(61, 'BLT - £3.50 x 4, Latte - £4.00 x 5', 34.00, '2024-04-30 11:53:14'),
(62, 'Espresso - £2.50 x 2', 5.00, '2024-04-30 13:40:14'),
(63, 'Croissant - £2.75 x 3, Americano - £4.50 x 3, Latte - £4.00 x 3', 33.75, '2024-05-01 07:48:29'),
(64, 'Croissant - £2.75 x 5, Muffin - £2.00 x 5, Americano - £4.50 x 5', 46.25, '2024-05-01 11:48:29'),
(65, 'Americano - £4.50 x 2, Latte - £4.00 x 2', 17.00, '2024-05-01 12:48:29'),
(66, 'Espresso - £2.50 x 1', 2.50, '2024-05-01 14:48:29'),
(67, 'Americano - £4.50 x 3, Cappuccino - £3.75 x 3, Scone - £4.50 x 3', 38.25, '2024-05-01 13:48:29'),
(68, 'Croissant - £2.75 x 3, Muffin - £2.00 x 3', 14.25, '2024-05-02 06:50:46'),
(69, 'Espresso - £2.50 x 2, Americano - £4.50 x 2, Croissant - £2.75 x 2, BLT - £3.50 x 2', 26.50, '2024-05-02 06:59:46'),
(70, 'Croissant - £2.75 x 2, Muffin - £2.00 x 2, Cappuccino - £3.75 x 3', 20.75, '2024-05-02 06:50:46'),
(71, 'Espresso - £2.50 x 2, Cappuccino - £3.75 x 2, Croissant - £2.75 x 1', 15.25, '2024-05-02 06:50:46'),
(72, 'Bagel - £1.50 x 2, Americano - £4.50 x 2, Scone - £4.50 x 2', 21.00, '2024-05-02 06:50:46'),
(73, 'Croissant - £2.75 x 3, Latte - £4.00 x 3, Cappuccino - £3.75 x 3, BLT - £3.50 x 3 (Discount: Easter savings - 50%)', 21.00, '2024-05-03 06:53:43'),
(74, 'Espresso - £2.50 x 1, Latte - £4.00 x 1, Cappuccino - £3.75 x 1', 10.25, '2024-05-03 06:59:43'),
(75, 'Muffin - £2.00 x 2, Cappuccino - £3.75 x 2', 11.50, '2024-05-03 07:00:43'),
(76, 'Croissant - £2.75 x 3, Bagel - £1.50 x 3, Cappuccino - £3.75 x 3, Croissant - £2.75 x 3 (Discount: Easter savings - 50%)', 16.13, '2024-05-03 07:07:43'),
(77, 'Bagel - £1.50 x 2, Bagel - £1.50 x 3, Bagel - £1.50 x 3 (Discount: Christmas savings - 50%)', 6.00, '2024-05-03 07:13:43'),
(78, 'Bagel - £1.50 x 4', 6.00, '2024-05-03 07:23:43'),
(79, 'Americano - £4.50 x 3, Cappuccino - £3.75 x 5, Bagel - £1.50 x 6', 41.25, '2024-05-03 07:35:43'),
(80, 'Espresso - £2.50 x 2, Latte - £4.00 x 2, Cappuccino - £3.75 x 2, Scone - £4.50 x 2', 29.50, '2024-05-04 08:58:48'),
(81, 'Croissant - £2.75 x 2, Bagel - £1.50 x 2, Muffin - £2.00 x 2, BLT - £3.50 x 2', 19.50, '2024-05-04 08:59:48'),
(82, 'Croissant - £2.75 x 5, Bagel - £1.50 x 3, Espresso - £2.50 x 3 (Discount: Easter savings - 50%)', 12.88, '2024-05-04 09:08:48'),
(83, 'Latte - £4.00 x 3, Cappuccino - £3.75 x 3, BLT - £3.50 x 3', 33.75, '2024-05-04 09:17:48'),
(84, 'Croissant - £2.75 x 6', 16.50, '2024-05-04 09:30:48'),
(85, 'Americano - £4.50 x 2, Muffin - £2.00 x 2, Scone - £4.50 x 2', 22.00, '2024-05-04 09:39:48'),
(86, 'Espresso - £2.50 x 2', 5.00, '2024-05-04 09:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `category_id`) VALUES
(1, 'Americano', 4.50, 1),
(2, 'Croissant', 2.75, 2),
(3, 'Espresso', 2.50, 1),
(4, 'Bagel', 1.50, 2),
(5, 'Latte', 4.00, 1),
(6, 'Muffin', 2.00, 2),
(7, 'Cappuccino', 3.75, 1),
(8, 'Scone', 4.50, 2),
(13, 'BLT', 3.50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `name`) VALUES
(1, 'Beverage'),
(2, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `promolist`
--

CREATE TABLE `promolist` (
  `pl_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promolist`
--

INSERT INTO `promolist` (`pl_id`, `full_name`, `email`, `created_at`) VALUES
(1, 'pourya slami', 'pos0123@my.londonmet.ac.uk', '2024-04-04 07:46:25'),
(2, 'mojgun', 'mojojoj@moj.com', '2024-04-05 11:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `promotion_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promotion_id`, `name`, `discount`) VALUES
(1, 'Easter savings', '50%'),
(2, 'Christmas savings', '50%');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`, `branch_id`) VALUES
(1, 'Amiri', 'Cashni', 'AmirCashani@gmail.com', 'Pass', 'Manager', '2024-03-05 04:08:10', 1),
(2, 'Pouryai', 'Slami', 'Pouryaslami@gmail.com', 'Password', 'Manager', '2024-03-06 12:12:17', 1),
(3, 'Jack', 'Rings', 'jackrings@jackring.co.uk', 'Pass', 'Employee', '2024-03-04 06:12:17', 1),
(4, 'Kams', 'Wise', 'WiseeboyKam@gmail.com', 'Easy', 'Cashier', '2024-03-08 13:25:21', 1),
(5, 'Rose', 'Mane', 'ChefRose@gmail.com', 'Rose', 'Chef', '2024-03-07 08:23:25', 1),
(6, 'Jesse', 'Okuji', 'Jesse@okuji.com', 'password', 'Barista', '2024-03-09 17:11:17', 4),
(7, 'Alexa', 'Brandi', 'BrandiAlexa@gmail.com', 'Easy', 'Cashier', '2024-03-07 14:32:00', 1),
(8, 'Ruby', 'Brigss', 'RedRuby@gmail.com', 'pass', 'Cashier', '2024-03-07 08:16:12', 1),
(15, 'Pourya', 'Slami', 'pos0123@my.londonmet.ac.uk', 'asfasfa', 'Employee', '2024-04-18 13:36:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_loyalty_program`
--

CREATE TABLE `user_loyalty_program` (
  `id` int(11) NOT NULL,
  `pl_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `assigned_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_loyalty_program`
--

INSERT INTO `user_loyalty_program` (`id`, `pl_id`, `program_id`, `assigned_date`) VALUES
(1, 1, 1, '2024-04-11 01:00:40'),
(4, 2, 1, '2024-04-11 02:56:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accreq`
--
ALTER TABLE `accreq`
  ADD PRIMARY KEY (`acc_req_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `employee_work_schedule`
--
ALTER TABLE `employee_work_schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_website_id`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `instore_feedback`
--
ALTER TABLE `instore_feedback`
  ADD PRIMARY KEY (`feedback_instore_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD UNIQUE KEY `product_id_2` (`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `loyalty_program`
--
ALTER TABLE `loyalty_program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `promolist`
--
ALTER TABLE `promolist`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_branch_id` (`branch_id`);

--
-- Indexes for table `user_loyalty_program`
--
ALTER TABLE `user_loyalty_program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pl_id` (`pl_id`),
  ADD KEY `program_id` (`program_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accreq`
--
ALTER TABLE `accreq`
  MODIFY `acc_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `employee_work_schedule`
--
ALTER TABLE `employee_work_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_website_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `instore_feedback`
--
ALTER TABLE `instore_feedback`
  MODIFY `feedback_instore_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `loyalty_program`
--
ALTER TABLE `loyalty_program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `promolist`
--
ALTER TABLE `promolist`
  MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_loyalty_program`
--
ALTER TABLE `user_loyalty_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_work_schedule`
--
ALTER TABLE `employee_work_schedule`
  ADD CONSTRAINT `employee_work_schedule_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`);

--
-- Constraints for table `user_loyalty_program`
--
ALTER TABLE `user_loyalty_program`
  ADD CONSTRAINT `user_loyalty_program_ibfk_1` FOREIGN KEY (`pl_id`) REFERENCES `promolist` (`pl_id`),
  ADD CONSTRAINT `user_loyalty_program_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `loyalty_program` (`program_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
