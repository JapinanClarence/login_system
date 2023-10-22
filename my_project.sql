-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 12:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `birthday`, `gender`, `email`, `phone_number`, `password`) VALUES
(27, 'Clarence', 'Japinan', '2023-10-04', 'female', 'test@test.com', '09510312859', '$2y$10$HBHh.CL1HNGHh5zJcOKSLeB5gqqO7p0EHOivZV1ppstGUmAMNd2Be'),
(28, 'Diane', 'Doe', '2023-09-10', 'male', 'dianne@gmail.com', '09128347865', '$2y$10$lRIKpkUvh8en48ihHm.EwuA0pwrnOGXy0SiQg9Y0BpjtCvG2SJMsG'),
(29, 'Clarence', 'Japinan', '2023-10-21', 'female', 'japinanclarence@gmail.com', '09510312859', '$2y$10$GiCMe7VXiXVVsfOJAPjFTeeb86x2fjhJo3yzv6XalaG9qNkHTk7yC'),
(31, 'Rayan', 'Celestino', '2023-10-20', 'female', 'rayan@gmail.com', '09123456789', '$2y$10$2rIoAYXSvQI1CSKMiT1IKu76C4du.E2nkZ8ki/z112Jn0gMHOnZUy'),
(32, 'Diane', 'Doe', '2023-09-10', 'male', 'dianne2@gmail.com', '09128347865', '$2y$10$xSkxGhmblfSObtjVdwp0CO8pZp5UfKQZfHN.Yv6ADYn3Xf2tyvd6i'),
(33, 'Diane', 'Doe', '2023-09-10', 'male', 'diane@gmail.com', '09128347865', '$2y$10$jiMIqsdc3o4tmoX73Vs7O./gIevnQzX6L1vgIle4Ui2FehyGuKdny'),
(34, 'New', 'Samp', '2023-10-05', 'male', 'new@gmail.com', '09123645454', '$2y$10$Mu.PYgdceXRYE7lE0jmGbu00YoU91LqiBSXmvqWVVrNkebODCGuf6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
