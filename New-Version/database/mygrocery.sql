-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 07:34 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mygrocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Athmeeya\'s Farm'),
(2, 'Mathur Dairy'),
(3, 'Adeep Pens'),
(4, 'Killer Snacks'),
(5, 'UnLoyal World');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Groceries'),
(2, 'Dairy'),
(3, 'Essentials'),
(4, 'Snacks'),
(5, 'Stationary');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` bigint(10) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'Adeep Keelar', 'eippeekeelar@gmail.com', 'adeep', 'India', 'Mysore', 9606740404, 'Yadavagiri Mysore', '', 0),
(8, 'Athmeeya', 'athmeeya@gmail.com', 'adeep', 'India', 'Mysore', 1234567895, 'NIE Mysore', 'sg.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` float NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `status`) VALUES
(1, 1, 1, '2022-01-09 09:08:53', 'Carrot', 'carrot1.jpg', 'carrot2.jfif', 'carrot3.jpg', 25, '<p>Very fresh, organic and pure Carrot grown in the farm</p>', 'Organic, AF, Carrot', 'on'),
(2, 1, 1, '2022-01-09 09:09:10', 'Tomato', 'tomato1.jfif', 'tomato2.jpg', 'tomato3.jfif', 40, '<p>Organic, Fresh and Hand Plucked Tomato</p>', 'Organic, AF, Tomato', 'on'),
(3, 1, 1, '2022-01-09 09:09:19', 'Potato', 'potato1.jfif', 'potato2.jfif', 'potato3.jpg', 20, '<p>Organic, fresh Potato</p>', 'Organic, AF, Potato', 'on'),
(6, 1, 1, '2022-01-09 09:09:26', 'Onion', 'Onion1.jpg', 'Onion2.jpg', 'Onion3.jpg', 50, '<p>Freshly Grown Onion</p>', 'Organic, AF, Onion', 'on'),
(7, 1, 1, '2022-01-09 09:09:35', 'Ladies Finger (Okra)', 'lf1.jpg', 'lf2.jpg', 'lf3.jfif', 45, '<p>Beautiful Healthy Organic Okra</p>', 'Organic, AF, Ladies Finger', 'on'),
(8, 1, 1, '2022-01-09 09:09:44', 'Cucumber', 'cucumber1.jfif', 'cucumber2.jfif', 'cucumber3.jfif', 60, '<p>Fresh, Juicy and Cool Cucumber</p>', 'Organic, AF, Cucumber', 'on'),
(9, 2, 2, '2022-01-09 09:10:02', 'Mathur Milk', 'milk1.jfif', 'milk2.jfif', 'milk3.jfif', 80, '<p>Fresh Cow Milk, Pausterized and Packed</p>', 'Milk, Mathur Dairy', 'on'),
(10, 2, 2, '2022-01-09 09:52:11', 'Panner', 'panner1.jfif', 'panner2.jfif', 'panner3.jpg', 125, '<p>Very healthy, pure milk used, tender and soft, protein</p>', 'Panner', 'on'),
(11, 5, 3, '2022-01-09 09:52:23', 'Ink Pen', 'inkpen1.jpg', 'inkpen2.jfif', 'inkpen3.jfif', 150, '<p>Best in Class, Hand-Made Ink Pen, Own the Best!</p>', 'Ink Pen', 'on'),
(12, 4, 4, '2022-01-09 18:29:51', 'Chips', 'chips3.jfif', 'chips2.jfif', 'chips1.jpg', 40, '<p>Pure Potato Chips, 40kcal per packet 100g, very low fried</p>', '', 'on'),
(13, 4, 4, '2022-01-09 18:31:06', 'Chocolate Cookies', 'cookies1.jfif', 'cookies2.jpg', 'cookies3.jfif', 65, '<p>Sweet snack, perfect for those who want some filling when down!</p>', '', 'on'),
(14, 1, 1, '2022-01-11 05:56:05', 'Capsicum', 'capsicum1.jfif', 'capsicum2.jpg', 'capsicum3.jpg', 30, '<p>Fresh Capsicum</p>', '', 'on'),
(15, 4, 4, '2022-01-11 06:01:00', 'Protein Bar', 'bar1.jfif', 'bar2.jpg', 'bar3.jpeg', 40, '<p>Healthy Weight Loss Diet snack, gyms loves this</p>', '', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
