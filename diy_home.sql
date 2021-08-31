-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 04:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diy_home`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(20) NOT NULL,
  `OrderDate` datetime DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderDate`, `UserID`) VALUES
(1, '2021-08-26 19:48:51', 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `OrderDetailsID` int(50) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `OrderQuantity` float NOT NULL,
  `OrderStatus` varchar(50) NOT NULL,
  `OrderPayment` varchar(50) NOT NULL,
  `OrderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`OrderDetailsID`, `ProductID`, `OrderQuantity`, `OrderStatus`, `OrderPayment`, `OrderID`) VALUES
(1, 1, 500, 'delivered', 'paid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductDescription` varchar(300) NOT NULL,
  `ProductPrice` float NOT NULL,
  `ProductQuantity` int(11) DEFAULT NULL,
  `ProductManufacturer` varchar(150) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `ProductImage` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `ProductDescription`, `ProductPrice`, `ProductQuantity`, `ProductManufacturer`, `UserID`, `CategoryID`, `ProductImage`) VALUES
(1, 'Ceiling Fan ', 'Black Ceiling Fan with lighting.\r\n', 400, 50, 'spin industries', 1, 1, '54_CieloCeilingFan.jpg'),
(26, 'Vintage Lighting', 'Vintage wall Lighting. Dark', 234, 123, 'Light industries', 1, 1, 'VintageLighting.jpg'),
(27, 'Red Brick', 'Red clay bricks', 20, 2000, 'new', 1, 1, 'RedBricks.jpg'),
(28, 'Kasa Lamp', 'Kasa lamp. Vintage lamp', 50, 500, 'Light industries', 1, 1, 'kasalamp.jpg'),
(31, 'Marble Tile', 'Large Marble Tile', 45, 89, 'Tile Industries', 1, 1, 'MarbleTile.jpg'),
(32, 'Slate Roof', 'Grey slate roof\r\n', 340, 600, 'Brick Industries', 1, 1, 'slateroofing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `CategoryDescription` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`CategoryID`, `CategoryName`, `CategoryDescription`) VALUES
(1, 'Building', 'building category'),
(2, 'Furnishing', 'Furnishing category');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `ShippingID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Contact` int(15) NOT NULL,
  `City` varchar(200) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `AddressDesc` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`ShippingID`, `FullName`, `Contact`, `City`, `UserID`, `AddressDesc`) VALUES
(3, 'Jane Doe', 2147483647, 'Nairobi', 5, 'Monrovia street, Hazin towers, 5th floor, Hse20  '),
(4, '2', 2, '2', 8, '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `UserEmail` varchar(500) NOT NULL,
  `UserPhone` varchar(20) DEFAULT NULL,
  `UserRole` varchar(13) NOT NULL,
  `UserPassword` varchar(500) NOT NULL,
  `UserImage` varchar(200) DEFAULT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `vkey` varchar(150) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserEmail`, `UserPhone`, `UserRole`, `UserPassword`, `UserImage`, `createdDate`, `vkey`, `verified`) VALUES
(1, 'testuser1', 'testuser1@gmail.com', '0712345678', 'seller', '123456', 'WhatsApp Image 2021-08-23 at 2.11.42 PM (2).jpeg', '2021-08-28 21:51:20', NULL, NULL),
(2, 'testuser2', 'testuser2@email.com', '0718900900', 'seller', '123456', NULL, '2021-08-28 21:51:20', NULL, NULL),
(3, 'adminuser1', 'adminuser1@gmail.com', '0717890900', 'admin', '123456', 'WhatsApp Image 2021-08-23 at 2.11.42 PM (2).jpeg', '2021-08-28 21:51:20', NULL, NULL),
(5, 'customer1', 'customer@gmail.com', '0712345678', 'client', '00000', 'WhatsApp Image 2021-08-23 at 2.11.42 PM (2).jpeg', '2021-08-28 23:12:07', NULL, 1),
(6, 'admin2', 'admin2@gmail.com', '0712345678', 'admin', '00000', NULL, '2021-08-28 23:16:34', NULL, 1),
(7, '', 'customer@gmail.com', NULL, 'client', '00000', NULL, '2021-08-29 19:02:53', NULL, NULL),
(8, 'Customer Register', 'customerregister@gmail.com', NULL, 'client', '00000', NULL, '2021-08-29 19:08:18', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`OrderDetailsID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`ShippingID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `OrderDetailsID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `ShippingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `product_category` (`CategoryID`);

--
-- Constraints for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD CONSTRAINT `shipping_details_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
