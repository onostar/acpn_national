-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 10:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psn_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `booths`
--

CREATE TABLE `booths` (
  `booth_id` int(11) NOT NULL,
  `hall` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booth_price` int(11) NOT NULL,
  `booth_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booths`
--

INSERT INTO `booths` (`booth_id`, `hall`, `booth`, `booth_price`, `booth_status`) VALUES
(6, 'The Corridor', 'A15', 23000, 0),
(7, 'The Corridor', 'A23', 23000, 0),
(8, 'Asian Hall', 'B10', 2000, 0),
(9, 'The Corridor', 'D8', 20000, 0),
(10, 'The Corridor', 'D9', 25000, 0),
(11, 'Marquee', 'A25', 30000, 0),
(12, 'Marquee', 'A26', 27000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `booth_categories`
--

CREATE TABLE `booth_categories` (
  `hall_id` int(11) NOT NULL,
  `hall` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booth_categories`
--

INSERT INTO `booth_categories` (`hall_id`, `hall`) VALUES
(1, 'Marquee'),
(2, 'Asian Hall'),
(3, '2nd Hall'),
(4, 'The Corridor'),
(5, 'Bar Area');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(8, 'Contraceptives'),
(9, 'Supplements'),
(10, 'Poisons'),
(11, 'Multivitamins');

-- --------------------------------------------------------

--
-- Table structure for table `exhibitors`
--

CREATE TABLE `exhibitors` (
  `exhibitor_id` int(11) NOT NULL,
  `company_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_number` int(11) NOT NULL,
  `portal_manager` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booth` int(11) NOT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_slip` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL,
  `company_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel`, `website`, `hotel_address`) VALUES
(16, 'Uyi Grand Hotel', 'www.uyigrand.com', '23 Boundary Road, GRA, Benin City'),
(17, 'Baid', '', ''),
(18, '', 'www.baiden-baiden.com', '123 Sapele Road Opp Limit Road, Benin City'),
(19, 'Baiden Baiden', 'www.baiden-baiden.com', '124 Sapele Road Opposit Limit Junction, Benin City'),
(20, 'Morzi Hotels', 'www.morzi.com', '23 Ugbor Road, Benin City');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `item_category` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_prize` int(11) NOT NULL,
  `previous_price` int(11) NOT NULL,
  `item_foto` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_item` int(12) NOT NULL,
  `daily_deal` int(11) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `company`, `item_category`, `item_name`, `item_prize`, `previous_price`, `item_foto`, `item_description`, `featured_item`, `daily_deal`, `time_created`) VALUES
(34, 11, '11', 'Immune Boost', 2000, 0, '', '', 1, 0, '2022-03-19 10:09:51'),
(35, 11, '11', 'Amino Pep Forte', 3000, 0, '', '', 1, 0, '2022-03-19 10:10:02'),
(36, 11, '8', 'Vega 100', 500, 0, '', '', 1, 0, '2022-03-19 10:10:17'),
(37, 12, '9', 'Calimax', 750, 0, '', '', 1, 0, '2022-03-19 10:10:35'),
(38, 12, '9', 'Calcitone', 350, 0, '', '', 1, 0, '2022-03-19 10:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_email` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_number` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` int(11) NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paid_members`
--

CREATE TABLE `paid_members` (
  `payment_id` int(11) NOT NULL,
  `pcn_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paid_members`
--

INSERT INTO `paid_members` (`payment_id`, `pcn_number`, `first_name`, `last_name`, `whatsapp`, `res_state`, `user_email`, `gender`) VALUES
(7, '425716', 'kelly', 'Ikpefua', '07068897068', 'Edo', 'onostarkels@gmail.com', 'M'),
(8, '111122', 'james', 'john', '0806677777', 'Lagos', 'james@gmail.com', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `request_hotel`
--

CREATE TABLE `request_hotel` (
  `request_id` int(11) NOT NULL,
  `pcn_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_status` int(11) NOT NULL,
  `request_date` datetime NOT NULL DEFAULT current_timestamp(),
  `request_by` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_evidence` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in_date` date DEFAULT NULL,
  `bulk` int(11) NOT NULL,
  `bulk_evidence` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_hotel`
--

INSERT INTO `request_hotel` (`request_id`, `pcn_number`, `hotel`, `room`, `request_status`, `request_date`, `request_by`, `payment_evidence`, `check_in_date`, `bulk`, `bulk_evidence`, `amount`) VALUES
(23, '425716', 'Baiden Baiden', 'Standard Room', 1, '2022-03-21 05:22:12', '425716', 'cake_slide2.jpg', '2022-07-24', 1, 'cake_slide2.jpg', 0),
(24, '691141', 'Morzi Hotels', 'Standard Room', 1, '2022-03-21 05:33:43', '691141', 'cake_slide2.jpg', '2022-07-25', 0, '', 0),
(27, '688970', 'Baiden Baiden', 'Standard Room', 1, '2022-03-21 06:04:38', '425716', '', '2022-07-24', 0, '', 20000),
(28, '223344', 'Baiden Baiden', 'Standard Room', 1, '2022-03-21 06:07:31', '425716', '', '2022-07-24', 0, '', 20000),
(29, '002299', 'Uyi Grand Hotel', 'Basic Room', 1, '2022-03-21 07:47:13', '425716', '', '2022-07-24', 0, '', 17000),
(30, '003399', 'Uyi Grand Hotel', 'Basic Room', 1, '2022-03-21 07:47:25', '425716', '', '2022-07-24', 0, '', 17000),
(31, '001188', 'Morzi Hotels', 'Standard Room', 1, '2022-03-21 07:48:07', '425716', '', '2022-07-24', 0, '', 22000);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `hotel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `room_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `hotel`, `room`, `price`, `room_quantity`) VALUES
(22, 'Baiden Baiden', 'Standard Room', 20000, 3),
(23, 'Baiden Baiden', 'Business Suite', 40000, 5),
(24, 'Morzi Hotels', 'Standard Room', 22000, 8),
(25, 'Morzi Hotels', 'Exquisite Room', 43000, 3),
(26, 'Uyi Grand Hotel', 'Basic Room', 17000, 13),
(27, 'Uyi Grand Hotel', 'Royal Suite', 56000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shoppers`
--

CREATE TABLE `shoppers` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pharmacy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppers`
--

INSERT INTO `shoppers` (`user_id`, `first_name`, `last_name`, `user_password`, `phone_number`, `email`, `pharmacy`, `address`, `city`, `reg_date`) VALUES
(2, 'Kelly', 'Ikpefua', 'yMcmb@her0123', '07068897068', 'onostarkels@gmail.com', 'Onostar Pharmacy', '23 sapele road', 'Abuja', '2022-03-14 09:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcn_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_receipt` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_status` int(11) NOT NULL,
  `attendance` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `pcn_number`, `res_state`, `whatsapp`, `other_number`, `user_email`, `passport`, `payment_receipt`, `reg_number`, `reg_date`, `payment_status`, `attendance`, `gender`) VALUES
(76, '', 'Admin', '12345', '', '', '', '', '', '', '', '2022-03-14 08:54:45', 0, 0, ''),
(99, 'Kelly', 'Ikpefua', '425716', 'Edo', '07068897068', '07057456882', 'onostarkels@gmail.com', 'chef pee.png', '', 'EDO/2022/001/0099', '2022-03-20 13:15:49', 2, 1, 'M'),
(100, 'Kalvin', 'Paul', '223344', 'Edo', '08035716496', '0988888', 'paulinhonavas@gmail.com', 'akpu-egusi.jpg', 'cake_slide2.jpg', 'EDO/2022/002/00100', '2022-03-20 13:25:55', 2, 1, 'M'),
(101, 'James', 'Jimoh', '000011', 'Lagos', '08023232344', '08012334455', 'james@gmail.com', 'chef-pee-corporate-beans-plantain.jpg', 'cake_slide2.jpg', 'LAG/2022/001/00101', '2022-03-21 03:07:54', 2, 0, 'M'),
(104, 'James', 'John', '111122', 'Lagos', '0806677777', '0990099', 'james@gmail.com', 'beans-with-plantain.jpg', '', 'LAG/2022/002/00104', '2022-03-21 03:14:22', 2, 1, 'm'),
(106, 'Justice', 'Oseghae', '691141', 'Anambra', '08069114149', '0909998877', 'm.oseghae@appliedmacros.com', 'cake3.jpg', 'akpu-egusi.jpg', 'ANA/2022/001/00106', '2022-03-21 05:26:46', 2, 0, 'M'),
(107, 'Cynthia', 'Ikpefua', '688970', 'Edo', '07057456881', '', 'cy@gmail.com', 'akpu-egusi.jpg', 'sponge_bob cake.jpg', 'EDO/2022/003/00107', '2022-03-21 05:41:23', 2, 0, 'F'),
(108, 'Chima', 'Onyema', '002299', 'Edo', '08122334455', '08122334455', 'mexylj@yahoo.com', 'chef pee.png', 'akpu-egusi.jpg', 'EDO/2022/006/00108', '2022-03-21 07:36:53', 2, 0, 'M'),
(109, 'Kenneth', 'Okhuakhua', '003399', 'Edo', '09188776655', '0909998877', 'ken@gmail.com', 'banga-soup.jpg', 'cake_slide2.jpg', 'EDO/2022/004/00109', '2022-03-21 07:38:08', 2, 0, 'M'),
(110, 'Rufus', 'Ehizokhale', '001188', 'Edo', '089000111', '098111000', 'rufus@gmail.com', 'beddings7.jpg', 'cake_slide2.jpg', 'EDO/2022/005/00110', '2022-03-21 07:39:06', 2, 0, 'M'),
(111, 'Dorcas', 'Faniran', '653703', 'Osun', '08100653703', '0705442277', 'gazelle@gmail.com', 'akpu-egusi.jpg', 'cake_slide2.jpg', 'OSU/2022/001/00111', '2022-03-21 07:54:40', 2, 0, 'F');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booths`
--
ALTER TABLE `booths`
  ADD PRIMARY KEY (`booth_id`);

--
-- Indexes for table `booth_categories`
--
ALTER TABLE `booth_categories`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `exhibitors`
--
ALTER TABLE `exhibitors`
  ADD PRIMARY KEY (`exhibitor_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `paid_members`
--
ALTER TABLE `paid_members`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `request_hotel`
--
ALTER TABLE `request_hotel`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `shoppers`
--
ALTER TABLE `shoppers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booths`
--
ALTER TABLE `booths`
  MODIFY `booth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `booth_categories`
--
ALTER TABLE `booth_categories`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exhibitors`
--
ALTER TABLE `exhibitors`
  MODIFY `exhibitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `paid_members`
--
ALTER TABLE `paid_members`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request_hotel`
--
ALTER TABLE `request_hotel`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `shoppers`
--
ALTER TABLE `shoppers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
