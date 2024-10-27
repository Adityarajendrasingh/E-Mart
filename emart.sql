-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 10:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `card_payment`
--

CREATE TABLE `card_payment` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_payment`
--

INSERT INTO `card_payment` (`id`, `payment_id`, `user_id`, `order_id`, `total_amt`) VALUES
(1, 'card_1IZFnnSDDIFZ40GRvUmGTkjM', 25, 2, 408442);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `item_qty`) VALUES
(13, 25, 6, 1),
(14, 25, 3, 1),
(15, 25, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` int(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(3, 'Mobile', 1),
(4, 'Tablet', 1),
(5, 'Laptop', 1),
(8, 'PC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chatbot_hints`
--

CREATE TABLE `chatbot_hints` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatbot_hints`
--

INSERT INTO `chatbot_hints` (`id`, `question`, `reply`) VALUES
(1, 'HI||Hello||Hola||hey', 'Hi! I m Alpha! I m the Support assistant .I am here to help you and will connect you to a customer support agent.\r\n'),
(2, 'How are you', 'Good to see you again!'),
(3, 'what is your name||whats your name', 'My name is Alpha'),
(4, 'what should I call you', 'You can call me Vishal Bot'),
(5, 'Where are your from', 'I m from India'),
(6, 'Bye||See you later||Have a Good Day', 'Sad to see you are going. Have a nice day'),
(7, 'where is my order?\r\n', 'Your order is being processed and will reach you soon.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `user_id`, `item_id`) VALUES
(42, 25, 6),
(44, 25, 3),
(45, 25, 11);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'Demo', 'demo@gmail.com', '0987654321', 'DEMO COMMENT', '2021-02-04 08:17:59'),
(8, 'n', 'n', 'n', 'k', '2021-02-21 08:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `laptop_brand`
--

CREATE TABLE `laptop_brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laptop_brand`
--

INSERT INTO `laptop_brand` (`id`, `brand_name`, `status`) VALUES
(1, 'Acer', 1),
(2, 'Apple', 1),
(3, 'Asus', 1),
(4, 'Mi', 1),
(5, 'Dell', 1),
(6, 'HP', 1),
(7, 'lenovo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `added_on` datetime NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `message`, `added_on`, `type`) VALUES
(1, 25, 'Hello', '2021-03-09 08:24:37', 'user'),
(2, 25, 'Hello, how are you.', '2021-03-09 08:24:37', 'bot'),
(3, 25, 'hey', '2021-03-09 08:24:41', 'user'),
(4, 25, 'Hello, how are you.', '2021-03-09 08:24:41', 'bot'),
(5, 25, 'hello', '2021-03-09 08:32:32', 'user'),
(6, 25, 'Hello, how are you.', '2021-03-09 08:32:32', 'bot'),
(7, 25, 'hello', '2021-03-09 08:37:46', 'user'),
(8, 25, 'Hello, how are you.', '2021-03-09 08:37:46', 'bot'),
(9, 25, 'hey', '2021-03-09 08:37:59', 'user'),
(10, 25, 'Hello, how are you.', '2021-03-09 08:37:59', 'bot'),
(11, 25, 'hellp', '2021-03-09 08:40:40', 'user'),
(12, 25, 'Sorry not be able to understand you', '2021-03-09 08:40:40', 'bot'),
(13, 25, 'hey', '2021-03-09 09:34:10', 'user'),
(14, 25, 'hey', '2021-03-09 09:37:53', 'user'),
(15, 25, 'hey', '2021-03-09 09:39:37', 'user'),
(16, 25, 'hello', '2021-03-09 09:41:28', 'user'),
(17, 25, 'hello', '2021-03-09 09:42:38', 'user'),
(18, 25, 'hell', '2021-03-09 09:44:34', 'user'),
(19, 25, 'hello', '2021-03-09 09:46:09', 'user'),
(20, 25, 'hello', '2021-03-09 09:46:53', 'user'),
(21, 25, 'hello', '2021-03-09 09:47:02', 'user'),
(22, 25, 'hey', '2021-03-09 09:47:58', 'user'),
(23, 25, 'Where are your from', '2021-03-09 09:49:39', 'user'),
(24, 25, 'I m from India', '2021-03-09 09:49:39', 'bot'),
(25, 25, 'hey', '2021-03-09 09:50:27', 'user'),
(26, 25, 'hey', '2021-03-09 09:51:11', 'user'),
(27, 25, 'where', '2021-03-09 09:51:42', 'user'),
(28, 25, 'I m from India', '2021-03-09 09:51:42', 'bot'),
(29, 25, 'how', '2021-03-09 09:51:48', 'user'),
(30, 25, 'Good to see you again!', '2021-03-09 09:51:48', 'bot'),
(31, 25, 'hello', '2021-03-09 09:51:54', 'user'),
(32, 25, 'hello', '2021-03-09 09:52:33', 'user'),
(33, 25, '', '2021-03-09 09:52:33', 'bot'),
(34, 25, 'hello', '2021-03-09 09:53:10', 'user'),
(35, 25, 'Hi! I m Alpha! I m the Support assistant .I am here to help you and will connect you to a customer support agent.\r\n', '2021-03-09 09:53:10', 'bot'),
(36, 25, 'hello', '2021-03-09 09:53:33', 'user'),
(37, 25, 'Hi! I m Alpha! I m the Support assistant .I am here to help you and will connect you to a customer support agent.\r\n', '2021-03-09 09:53:33', 'bot'),
(38, 25, 'hello', '2021-03-09 22:13:27', 'user'),
(39, 25, 'Hi! I m Alpha! I m the Support assistant .I am here to help you and will connect you to a customer support agent.\r\n', '2021-03-09 22:13:27', 'bot'),
(40, 25, 'hello', '2022-06-23 20:26:48', 'user'),
(41, 25, 'Hi! I m Alpha! I m the Support assistant .I am here to help you and will connect you to a customer support agent.\r\n', '2022-06-23 20:26:48', 'bot'),
(42, 25, 'where is my order?', '2022-06-23 20:26:58', 'user'),
(43, 25, 'Your order is being processed and will reach you soon.\r\n', '2022-06-23 20:26:58', 'bot'),
(44, 25, 'ok thankyou', '2022-06-23 20:27:09', 'user'),
(45, 25, 'Sorry not be able to understand you', '2022-06-23 20:27:09', 'bot'),
(46, 25, 'thankyou', '2022-06-23 20:27:18', 'user'),
(47, 25, 'Sorry not be able to understand you', '2022-06-23 20:27:18', 'bot'),
(48, 1, 'Hey', '2022-09-17 15:49:47', 'user'),
(49, 1, 'Hi! I m Alpha! I m the Support assistant .I am here to help you and will connect you to a customer support agent.\r\n', '2022-09-17 15:49:47', 'bot'),
(50, 1, 'where is my order', '2022-09-17 15:49:59', 'user'),
(51, 1, 'Your order is being processed and will reach you soon.\r\n', '2022-09-17 15:49:59', 'bot');

-- --------------------------------------------------------

--
-- Table structure for table `order_checkout`
--

CREATE TABLE `order_checkout` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `order_status` int(255) NOT NULL,
  `order_deliverydate` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_checkout`
--

INSERT INTO `order_checkout` (`id`, `user_id`, `payment_type`, `total_price`, `payment_status`, `order_status`, `order_deliverydate`, `added_on`) VALUES
(1, 25, 'Card/Debit Card/ATM Card', 173453, 'pending', 5, '21-03-2021', '2022-09-17 10:05:15'),
(2, 25, 'Card/Debit Card/ATM Card', 408442, 'Successful', 1, '29-03-2021', '2021-03-26 13:34:19'),
(3, 1, 'Card/Debit Card/ATM Card', 124990, 'pending', 5, '26-07-2022', '2022-09-17 10:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_price` float NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `user_id`, `order_id`, `item_id`, `item_qty`, `item_price`, `added_on`) VALUES
(1, 25, 1, 6, 1, 173453, '2021-03-14 12:09:54'),
(2, 25, 2, 6, 1, 173453, '2021-03-26 13:33:43'),
(3, 25, 2, 3, 1, 124999, '2021-03-26 13:33:43'),
(4, 25, 2, 11, 1, 109990, '2021-03-26 13:33:43'),
(5, 1, 3, 8, 1, 124990, '2022-07-15 10:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Cancelled'),
(5, 'Complete\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(255) NOT NULL,
  `categories_id` int(255) NOT NULL,
  `item_brand` int(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_mrp` double(16,2) NOT NULL,
  `item_price` double(16,2) NOT NULL,
  `item_qty` int(255) NOT NULL,
  `item_images` varchar(255) NOT NULL,
  `item_shortdesc` varchar(2000) NOT NULL,
  `item_longdesc` text NOT NULL,
  `best_seller` int(11) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `item_register` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `categories_id`, `item_brand`, `item_name`, `item_mrp`, `item_price`, `item_qty`, `item_images`, `item_shortdesc`, `item_longdesc`, `best_seller`, `meta_title`, `meta_desc`, `meta_keyword`, `status`, `item_register`) VALUES
(1, 5, 1, 'Acer Nitro 5 Thin and Light Gaming Laptop', 199000.00, 109000.00, 1, '1.jfif', 'Acer Nitro 5 Core i7 10th Gen - (8 GB/1 TB HDD/256 GB SSD/Windows 10 Home/4 GB Graphics/NVIDIA GeForce GTX 1650 Ti/144 Hz) AN515-55 Gaming Laptop  (15.6 inch, Black, 2.3 kg)', '', 1, '', '', '', 1, '2021-02-03 12:46:18'),
(2, 5, 1, 'Acer Swift 5 Premium Ultra-Thin Laptop', 130000.00, 96999.00, 1, '2.png', 'Acer ConceptD 5 Core i7 8th Gen - (16 GB/1 TB SSD/Windows 10 Home/4 GB Graphics) CN515-51 Thin and Light Laptop  (15.6 inch, White, 1.5 kg)\r\n\r\n', '', 0, '', '', '', 1, '2021-02-03 12:46:18'),
(3, 5, 1, 'Acer ConceptD 5 Premium Ultra-Thin Laptop', 150500.00, 124999.00, 1, '3.png', 'Acer ConceptD 5 Core i7 8th Gen - (16 GB/1 TB SSD/Windows 10 Home/4 GB Graphics) CN515-51 Thin and Light Laptop  (15.6 inch, White, 1.5 kg)', '', 1, '', '', '', 1, '2021-02-03 12:46:18'),
(4, 5, 5, 'New Inspiron 15 5509 Laptop', 110999.00, 93989.97, 1, '4.webp', '11th Generation Intel® Core™ i5-1135G7 Processor (8MB Cache, up to 4.2 GHz),8GB, 1x8GB, DDR4, 3200MHz', '', 0, '', '', '', 1, '2021-02-03 12:46:18'),
(5, 5, 5, 'New Inspiron 15 7501 Laptop', 149999.00, 126989.98, 1, '5.png', '11th Generation Intel® Core™ i5-1135G7 Processor Windows 10 Home Single Language Intel® Iris® Xe Graphics with shared graphics memory 8GB, 1x8GB, DDR4, 3200MHz 512GB M.2 PCIe NVMe Solid State Drive', '', 0, '', '', '', 1, '2021-02-03 12:46:18'),
(6, 5, 6, 'HP ENVY Laptop 15-ep0123TX', 245690.00, 173453.00, 1, '6.webp', 'HP 15-ep0123tx Laptop (10th Gen Intel Core i7-10750H/16 GB/1 TB SSD/6 GB GTX 1660 Ti Graphics/MSO/FHD), 39.62 cm (15.6 inch)', '', 0, '', '', '', 1, '2021-02-03 12:46:18'),
(7, 5, 7, 'Lenovo Legion 7i Gaming Laptop', 320000.00, 245990.00, 1, '7.jpeg', 'Lenovo Legion 7i Core i7 10th Gen - (16 GB/1 TB SSD/Windows 10 Home/8 GB Graphics/NVIDIA GeForce RTX 2070) 15IMHg05 Gaming Laptop  (15.6 inch, Slate Grey, 2.25 kg, With MS Office)', '', 0, '', '', '', 1, '2021-02-03 12:46:18'),
(8, 5, 3, 'Asus ROG Zephyrus G15 Gaming Laptop', 130350.00, 124990.00, 1, '8.jpeg', 'Asus ROG Zephyrus G15 (2020) Ryzen 9 Octa Core 4900HS - (16 GB/1 TB SSD/Windows 10 Home/6 GB Graphics/NVIDIA GeForce RTX 2060 with Max-Q Design/240 Hz) GA502IV-AZ040T Gaming Laptop  (15.6 inch, Black Plastic, 2.10 kg)', '', 0, '', '', '', 1, '2021-02-03 12:46:18'),
(9, 5, 4, 'Mi Notebook 14 Thin and Light Laptop', 60890.00, 44999.00, 1, '9.jpeg', 'Mi Notebook 14 Core i5 10th Gen - (8 GB/256 GB SSD/Windows 10 Home) JYU4298IN Thin and Light Laptop  (14 inch, Silver, 1.50 kg)', '', 0, '', '', '', 1, '2021-02-03 12:46:18'),
(10, 5, 5, 'Dell G5 15 SE Gaming Laptop', 100500.00, 89990.00, 1, '10.jpeg', 'Dell G5 15 SE Ryzen 7 Octa Core 4800H - (16 GB/512 GB SSD/Windows 10 Home/6 GB Graphics/AMD Radeon RX 5600M/120 Hz) G5 5505 Gaming Laptop  (15.6 inch, Silver, 2.5 kg)', '', 0, '', '', '', 1, '2021-02-03 12:46:18'),
(11, 5, 1, 'Acer Predator Helios 300  Gaming Laptop', 130000.00, 109990.00, 1, '1.jpeg', 'Acer Predator Helios 300 Core i7 10th Gen - (16 GB/1 TB HDD/256 GB SSD/Windows 10 Home/6 GB Graphics/NVIDIA GeForce RTX 2060/144 Hz) PH315-53-72E9 Gaming Laptop  (15.6 inch, Abyssal Black, 2.5 kg)\r\n', '', 0, '', '', '', 1, '2021-02-03 12:46:18'),
(12, 5, 3, 'Asus ROG Zephyrus Duo Gaming Laptop', 465990.00, 339800.00, 1, '12.jpeg', 'Asus ROG Zephyrus Duo 15 Core i7 10th Gen - (32 GB/2 TB SSD/Windows 10 Home/8 GB Graphics/NVIDIA GeForce RTX 2080 Super with Max-Q Design) GX550LXS-HC145TS Gaming Laptop  (15.6 inch, Gray, 2.48 kg, With MS Office)', '', 0, '', '', '', 1, '2021-02-10 18:58:59'),
(13, 5, 2, 'Apple MacBook Pro', 194900.00, 182990.00, 1, '13.jpeg', 'Apple MacBook Pro with Touch Bar Core i5 10th Gen - (16 GB/1 TB SSD/Mac OS Catalina) MWP82HN/A  (13 inch, Silver, 1.4 kg)', '', 1, '', '', '', 1, '2021-02-10 19:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `gender`, `email`, `password`, `mobile`, `token`, `status`, `register_date`) VALUES
(1, 'Kaptaan', 'Ji', 'male', 'kaptaanji08@gmail.com', '123456', '9876543210', '0', 'verified', '2022-07-06 08:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `userlogs`
--

CREATE TABLE `userlogs` (
  `id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogs`
--

INSERT INTO `userlogs` (`id`, `uid`, `username`, `userip`, `status`, `logintime`, `logout`) VALUES
(1, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-04 10:44:44', ''),
(2, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-04 14:59:38', ''),
(3, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-05 14:28:29', ''),
(4, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-05 15:47:32', ''),
(5, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-06 14:05:46', ''),
(6, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-07 07:40:19', '07-03-2021 01:12:34 PM'),
(7, 0, '', '::1', '0', '2021-03-07 10:17:07', ''),
(8, 0, '', '::1', '0', '2021-03-07 10:17:36', ''),
(9, 0, '', '::1', '0', '2021-03-07 10:21:15', ''),
(10, 0, '', '::1', '0', '2021-03-07 10:22:54', ''),
(11, 0, '', '::1', '0', '2021-03-07 10:23:56', ''),
(12, 0, '', '::1', '0', '2021-03-07 10:24:10', '22-06-2022 08:22:55 PM'),
(13, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-07 18:52:25', '08-03-2021 12:22:42 AM'),
(14, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-07 18:52:57', ''),
(15, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-08 15:24:00', ''),
(16, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-09 12:26:29', ''),
(17, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-09 16:15:50', ''),
(18, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-10 06:53:03', ''),
(19, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-10 07:12:42', ''),
(20, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-11 14:23:48', ''),
(21, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-11 14:30:05', ''),
(22, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-12 06:35:55', ''),
(23, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-12 09:36:05', ''),
(24, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-12 14:42:35', ''),
(25, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-13 09:11:06', ''),
(26, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-13 14:50:59', ''),
(27, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-13 15:26:11', ''),
(28, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-14 04:58:27', ''),
(29, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-14 11:16:49', ''),
(30, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-14 12:05:23', ''),
(31, 25, 'kaptaanji08@gmail.com', '::1', '1', '2021-03-26 13:27:52', ''),
(32, 25, 'kaptaanji08@gmail.com', '::1', '1', '2022-06-22 14:53:12', ''),
(33, 0, 'kaptaanji08@gmail.com', '::1', '0', '2022-07-06 08:17:56', ''),
(34, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-06 08:22:53', ''),
(35, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-06 08:36:52', ''),
(36, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-06 08:52:21', ''),
(37, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-07 08:32:01', ''),
(38, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-11 09:19:46', ''),
(39, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-12 12:10:04', ''),
(40, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-12 14:58:49', ''),
(41, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-12 15:05:37', ''),
(42, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-12 15:41:22', ''),
(43, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-12 18:18:58', ''),
(44, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-14 07:40:33', ''),
(45, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-14 14:24:15', ''),
(46, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-15 10:04:07', ''),
(47, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-15 16:01:31', ''),
(48, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-15 16:05:03', ''),
(49, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-21 15:33:14', ''),
(50, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-22 14:53:41', '23-07-2022 01:14:09 PM'),
(51, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-23 07:44:32', ''),
(52, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-27 07:50:52', ''),
(53, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-07-27 07:54:29', ''),
(54, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-08-06 06:21:29', ''),
(55, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-09-12 07:18:58', ''),
(56, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-09-12 08:20:34', ''),
(57, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-09-12 11:48:48', ''),
(58, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-09-12 15:06:02', ''),
(59, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-09-17 08:22:14', '17-09-2022 01:52:38 PM'),
(60, 0, 'kaptaanji08@gmail', '::1', '0', '2022-09-17 08:55:11', ''),
(61, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-09-17 08:55:29', '17-09-2022 03:51:08 PM'),
(62, 0, 'kaptaannji08@gmail.com', '::1', '0', '2022-09-17 10:21:29', ''),
(63, 0, 'kaptaanji@gmail.com', '::1', '0', '2022-09-17 14:53:02', ''),
(64, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-09-17 14:53:19', '17-09-2022 08:24:17 PM'),
(65, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-09-17 18:06:19', ''),
(66, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-09-18 08:20:47', ''),
(67, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-09-18 14:30:29', ''),
(68, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-11-27 08:29:23', ''),
(69, 1, 'kaptaanji08@gmail.com', '::1', '1', '2022-11-28 15:00:49', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pcode` int(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `mobile2` varchar(255) NOT NULL,
  `addrtype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_id`, `user_id`, `pcode`, `locality`, `address`, `city`, `state`, `landmark`, `mobile2`, `addrtype`) VALUES
(1, 1, 2241235, 'Sai Nagar ', ' Ram Janmabhoomi, Sai Nagar, Ayodhya, Uttar Pradesh 224123 ', 'Ayodhya', 'Uttar Pradesh', 'Ram Janmabhoomi', '8877665544', 'home');

-- --------------------------------------------------------

--
-- Table structure for table `user_card`
--

CREATE TABLE `user_card` (
  `user_id` int(255) NOT NULL,
  `cnumber` int(255) NOT NULL,
  `valid` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cfname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_pancard`
--

CREATE TABLE `user_pancard` (
  `user_id` int(11) NOT NULL,
  `pnumber` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_pancard`
--

INSERT INTO `user_pancard` (`user_id`, `pnumber`, `name`, `pimage`) VALUES
(1, '21', 'Hr', 'hello/lll');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `item_id`) VALUES
(7, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_payment`
--
ALTER TABLE `card_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot_hints`
--
ALTER TABLE `chatbot_hints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptop_brand`
--
ALTER TABLE `laptop_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_checkout`
--
ALTER TABLE `order_checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userlogs`
--
ALTER TABLE `userlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_payment`
--
ALTER TABLE `card_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chatbot_hints`
--
ALTER TABLE `chatbot_hints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laptop_brand`
--
ALTER TABLE `laptop_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `order_checkout`
--
ALTER TABLE `order_checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
