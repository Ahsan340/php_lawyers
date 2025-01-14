-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 07:49 PM
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
-- Database: `lawww`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `image` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `image`) VALUES
(1, 'Criminal', 'cr.jpg'),
(4, 'Divorce', 'dv.jpg'),
(5, 'Affidavit', 'af.jpg'),
(8, 'Civil', 'cv.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `rating` int(11) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `rating`, `date_submitted`) VALUES
(1, 'taha', 'sjkgdfyasda', 3, '2025-01-06 11:12:18'),
(2, 'ahsan', 'akla ca', 5, '2025-01-06 11:12:44'),
(3, 'ahsan', 'akla ca', 5, '2025-01-06 11:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `lawyerappointments`
--

CREATE TABLE `lawyerappointments` (
  `AppointmentID` int(11) NOT NULL,
  `ClientName` varchar(100) NOT NULL,
  `LawyerName` varchar(100) NOT NULL,
  `AppointmentDate` date NOT NULL,
  `AppointmentTime` time NOT NULL,
  `Purpose` varchar(255) DEFAULT NULL,
  `Status` enum('Scheduled','Completed','Cancelled') DEFAULT 'Scheduled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyerappointments`
--

INSERT INTO `lawyerappointments` (`AppointmentID`, `ClientName`, `LawyerName`, `AppointmentDate`, `AppointmentTime`, `Purpose`, `Status`) VALUES
(1, 'Ahmed', 'Muhammad', '2025-01-08', '08:00:00', 'marraige', 'Scheduled'),
(2, 'Ahmed', 'Muhammad', '2025-01-08', '08:00:00', '', 'Scheduled'),
(3, 'Ahmed', 'Muhammad', '2025-01-08', '08:00:00', '', 'Scheduled'),
(4, 'Ahmed', 'Muhammad', '2025-01-13', '18:44:00', 'for divorcing \r\n', 'Scheduled'),
(5, 'Ahmed', 'Muhammad', '2025-01-13', '18:44:00', 'for divorcing \r\n', 'Scheduled'),
(6, 'taha', 'ahsan', '2025-01-02', '18:55:00', 'marraige\r\n', 'Scheduled'),
(10, 'Ahmed', 'ahsan', '2025-01-14', '11:44:00', 'cjg', 'Scheduled'),
(11, 'Ali', 'ahmed`', '2025-01-02', '14:54:00', 'taha is ', 'Scheduled'),
(12, 'Ahmed', 'ahsan', '2025-01-08', '21:53:00', 'iidqp', 'Scheduled'),
(13, 'taha', 'ahsan', '2025-01-16', '19:29:00', 'he is a professional lawyer', 'Scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE `lawyers` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(5000) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`ID`, `name`, `location`, `category`, `description`, `image`, `c_id`) VALUES
(4, 'Asim', 'lahore', '5', 'An experienced lawyer specializing in affidavits, offering professional services to draft, verify, and execute legal affidavits with attention to detail. ', 'ee.jpg', 5),
(5, 'Ahmed', 'karachi', '1', 'A skilled criminal defense lawyer with expertise in representing clients in criminal cases. He provides strong legal advocacy and ensuring a fair trial.', 'i.jpg', 1),
(6, 'Muhammad', 'Islamabad', '5', 'A highly experienced lawyer specializing in affidavits. He offers reliable legal services in preparing and  ensuring accuracy and compliance with legal requirements.', 'o.jpg', 5),
(8, 'Amaan', 'lahore', '1', 'Specializing in criminal law, this lawyer provides expert defense for individuals facing criminal charges. Committed to delivering thorough legal counsel and securing favorable outcomes.', 'k.jpg', 1),
(9, 'Asif', 'karachi', '4', 'A skilled lawyer specializing in divorce cases. He provides expert legal guidance to help clients navigate the complexities of divorce proceedings.', 'y.jpg', 4),
(10, 'Raheel', 'lahore', '4', 'With expertise in divorce law, this lawyer offers dedicated services to help clients navigate family disputes. Providing professional advice and representation for a smooth legal process.', 'hh.jpg', 4),
(11, 'Daniyal', 'karachi ', '4', 'Specializing in divorce cases, this lawyer provides expert legal guidance to ensure a fair resolution. Committed to protecting your rights throughout the entire process.', 'nn.jpg', 4),
(12, 'Tariq', 'karachi', '4', 'With extensive experience in divorce law, this lawyer offers reliable support and legal counsel. Focused on achieving the best outcomes for clients navigating family disputes.', 'll.jpg', 4),
(13, 'Hamza', 'Islamabad', '4', 'Specializing in divorce cases, this lawyer provides compassionate guidance through the complexities of family law. Dedicated to securing favorable outcomes for clients in emotional and legal matters.', 'ww.jpg', 4),
(14, 'Rehman', 'karachi', '4', 'Focused on divorce law, this lawyer offers expert legal support to individuals navigating the challenges of separation. Committed to achieving fair and just resolutions for clients.', 'ee.jpg', 4),
(15, 'Subhan', 'Islamabad', '4', 'Specializing in divorce cases, this lawyer provides compassionate and skilled legal representation to clients seeking a fresh start. Dedicated to ensuring fair outcomes in family law matters.', 'hhh.jpg', 4),
(16, 'Hammad', 'karachi', '4', 'With extensive experience in divorce law, this lawyer offers strong legal support for individuals navigating complex family disputes. Committed to protecting clients\' rights and ensuring a smooth legal process.', 'mm.jpg', 4),
(17, 'Aslam', 'lahore', '1', 'Specializing in criminal law, this lawyer provides expert defense for clients facing criminal charges. With a focus on safeguarding rights, they offer strategic representation in criminal cases.', 'pp.jpg', 1),
(18, 'Yahya', 'karachi', '1', 'Experienced in criminal law, this lawyer offers strong defense strategies for clients accused of criminal offenses. Dedicated to protecting rights and ensuring fair trials in criminal cases.', 'qq.jpg', 1),
(19, 'Bilal', 'Islamabad', '1', 'Specialized in criminal law, this lawyer provides expert defense services for individuals charged with criminal offenses. Committed to achieving favorable outcomes through comprehensive legal strategies.', 'jj.jpg', 1),
(20, 'Khalil', 'lahore', '1', 'Experienced in criminal law, this lawyer offers dedicated representation for clients facing criminal charges. Known for delivering strong defenses and advocating for clients\' rights in court.', 'nnn.jpg', 1),
(21, 'Muzammil', 'karachi', '1', 'Specializing in criminal defense, this lawyer provides expert legal representation for those accused of criminal offenses. Committed to safeguarding clients\' rights and securing favorable outcomes in court.', 'eee.jpg', 1),
(22, 'Haseeb', 'karachi', '1', 'With a focus on criminal law, this lawyer offers dedicated representation for individuals facing criminal charges. Experienced in handling cases with precision to protect clients\' interests in legal proceedings.', 'ggg.jpg', 1),
(23, 'Asad', 'lahore', '5', 'Specializing in affidavit services, this lawyer provides expert assistance in drafting and verifying affidavits for various legal purposes. Ensuring accurate and legally sound documentation to meet client needs.', 'aa.jpg', 5),
(24, 'Ali', 'Islamabad', '5', 'This lawyer specializes in affidavit preparation, offering reliable services to assist clients with sworn statements and legal documents. Known for precision and thoroughness in handling affidavit-related matters.', 'aaa.jpg', 5),
(25, 'Wasif', 'lahore', '5', 'This lawyer specializes in creating and verifying affidavits, ensuring the accuracy and legal validity of sworn statements for various purposes.', 'www.jpg', 5),
(26, 'Sohail', 'Islamabad', '5', 'This lawyer offers expertise in preparing and validating affidavits, assisting clients with sworn declarations for legal and official matters.', 'qqq.jpg', 5),
(27, 'Saleem', 'karachi', '5', 'This lawyer specializes in affidavit services, helping clients with the preparation, verification, and submission of sworn statements for legal proceedings.', 'ttt.jpg', 5),
(28, 'Haris', 'lahore', '5', 'This lawyer is experienced in handling affidavit cases, assisting clients with drafting, signing, and verifying affidavits for legal matters.', 'sss.jpg', 5),
(29, 'Hadeed', 'karachi', '8', 'This lawyer specializes in civil cases, offering expert legal assistance in matters related to contracts, property disputes, and family law.', 'ff.jpg', 8),
(30, 'Maiz', 'Islamabad', '8', 'This lawyer specializes in civil law, providing legal services in areas such as property disputes, contracts, and inheritance matters.', 'asa.jpg', 8),
(31, 'ahsan', 'Karachi', '1', 'This lawyer specializes in criminal law, offering legal representation and advice for clients facing criminal charges, including defense strategies and case handling.', 'WeAreVenoM.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `regweb`
--

CREATE TABLE `regweb` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regweb`
--

INSERT INTO `regweb` (`id`, `username`, `pass`) VALUES
(1, 'ahsan', '$2y$10$qIRBYeKAST5lX54lI5dxUuFGTUxPgFmR8'),
(2, 'taha', '$2y$10$KtVhylG/mPFUPVjCgN71yuovB7e92gyfQ'),
(3, 'umer', '$2y$10$YuhY0E0PPY9OtOi5/01yte47fjemeFzRc'),
(4, 'taha', '$2y$10$DdZ0t3qwgrXtoOE2af8GxOx6J1MG78WQA'),
(5, 'ahsan', '$2y$10$bRKWQbUNXSJsaxft2Ke.1uKOg/ZaX1Q3v'),
(6, 'ahmed', '$2y$10$NyGwnpI7TMTRXJJAp1qM8e9fxTtIEVZjC'),
(7, 'Taha', '$2y$10$3yoIe05jzUADmBwTExIr2ONqd./AsoSrS'),
(8, 'asim', 'Ak2526'),
(9, 'Qasim', 'Q123'),
(10, 'aslam', 'A222'),
(11, 'taha', 't123'),
(12, 'haseeb', 'h123'),
(13, 'azam', 'a1234'),
(14, 'azan', 'a123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('lawyer','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(33, 'Muhammad', '$2y$10$.vqojNKWpbb2OKfXrfDumORgj365Vtq2e97rmxdj4JFrbH.VedJDe', '', '2024-12-31 09:24:22'),
(35, 'khatri', '$2y$10$1DLHxPcsQm/HlfirOrxGweAX33S3Su3VKD//wNVkjN5db08JiwGy6', 'lawyer', '2025-01-02 07:48:55'),
(37, 'raza', '$2y$10$q3RLUajpWeYhQuDAIKlv1efOO6xbZfX1InfLLj8S2YKlRvyGzDK1e', '', '2025-01-02 07:51:04'),
(38, 'kk', '$2y$10$tUsgQ.KXyYrIswT5ZFyOfOdIlmUgKe//XFW.Fuei6qSfP4gysykh6', 'lawyer', '2025-01-03 06:24:38'),
(39, 'huma', '$2y$10$cWHdb7knQihstKjXyC3VauOqO50uUJ1uTQR407NJ0/vv..WA0u4mK', '', '2025-01-04 08:15:18'),
(40, 'omais', '$2y$10$avZwkznvCQVDawwZCJW3..UcT/p0VQJQeY1WU90JVAiCSkiUUgVLi', '', '2025-01-04 18:14:00'),
(41, 'jerry', '$2y$10$bqu04sC4kf5jaNLinszT9uczKvEVsorRDVbNSzmALzdPg/RrgCPbq', 'lawyer', '2025-01-04 18:15:01'),
(44, 'abiha', '$2y$10$kBbPsMIxyrukYyDlFnSxA.q5AhGeEDxvpvcJ9pC55/AHjfXDcumCm', '', '2025-01-04 19:54:06'),
(45, 'qasim', '$2y$10$8Liy7A5OUUHYT/83lXi0ZeljVsR/Q5BNegZxSIwflVH22bHNi0POC', '', '2025-01-04 19:57:26'),
(46, 'saad', '$2y$10$BKgYt4KgVB8x2DsLiEq2jePuACLA8PC/fLgWTqQarVCzRIlBhGp62', 'lawyer', '2025-01-05 13:32:10'),
(47, 'alii', '$2y$10$48GzSNTdU3mUz3wbpLG2EufHhQ2rpbNB9OWelUhHg8h//rILrL/lS', '', '2025-01-05 13:34:23'),
(50, 'taha', '$2y$10$gUD9ipBIUWyRMBiw1Iif8uV3YA2GCXSqtx7Q2j7/L2DWOY0N/0loC', '', '2025-01-06 10:00:36'),
(53, 'aslam', '$2y$10$ZmEj19kjHayHqOLcZBA0Z.X6Go4xeCJGPJJyWg.3e1h1WadIIGGyW', 'lawyer', '2025-01-06 10:05:54'),
(54, 'azam', '$2y$10$jHbUzYYmnvnsUOGcES5eH.MikjBK2fnBsMtyp9SYf2/aOEwsYwi66', 'lawyer', '2025-01-06 10:09:04'),
(56, 'mustafa', '$2y$10$6SRH9YIekJhAGOPrGYYNeu28AjwgjU5W9hBn7ARMHj03oO9FDFZ.C', '', '2025-01-06 10:15:10'),
(57, 'moin', '$2y$10$AxvlJ8cj383iKahJvjMJpO7.uUo5EeHMv3P.K7WN/Y3Vjki8vwTaa', 'admin', '2025-01-06 10:17:35'),
(58, 'azan', '$2y$10$XOvl1ZKHzf0EzGi3NBUapOMhS0SkvPYWOZeipQ5Cu9ZStW781ePjK', 'lawyer', '2025-01-06 15:20:53'),
(59, 'azim', '$2y$10$8RU68z7rMijhCZtz7CkKH.pCbIg1qNV/zVKl8xgWdF8iG5wyHOmXG', 'lawyer', '2025-01-06 16:18:51'),
(60, 'azmat', '$2y$10$w4kPahZfK0fTALjN0ZPGz.sIDgIvXTp.Nd9M7UFYg1LSlS0aKFQIe', 'lawyer', '2025-01-06 16:31:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyerappointments`
--
ALTER TABLE `lawyerappointments`
  ADD PRIMARY KEY (`AppointmentID`);

--
-- Indexes for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `regweb`
--
ALTER TABLE `regweb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lawyerappointments`
--
ALTER TABLE `lawyerappointments`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `regweb`
--
ALTER TABLE `regweb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD CONSTRAINT `lawyers_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
