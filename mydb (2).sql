-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2016 at 03:32 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(100) DEFAULT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `application_layer`
--

CREATE TABLE `application_layer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อ',
  `develop_language` varchar(100) DEFAULT NULL COMMENT 'ภาษาที่ใช้พัฒนา',
  `app_database` varchar(255) DEFAULT NULL COMMENT 'ฐานข้อมูล',
  `develop_company` varchar(255) DEFAULT NULL COMMENT 'บริษัทที่ทำการพัฒนา',
  `getting_start_years` varchar(45) DEFAULT NULL COMMENT 'ปีที่เริ่มใช้งาน',
  `app_relation` varchar(255) DEFAULT NULL COMMENT 'ความสัมพันธ์กับแอพพลิเคชั่นอื่น',
  `remark` longtext COMMENT 'ข้อสังเกต',
  `ma_cost` double DEFAULT NULL COMMENT 'ค่าซ่อมบำรุง',
  `department_id` int(11) NOT NULL COMMENT 'หน่วยงานที่เกี่ยวข้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application_layer`
--

INSERT INTO `application_layer` (`id`, `name`, `develop_language`, `app_database`, `develop_company`, `getting_start_years`, `app_relation`, `remark`, `ma_cost`, `department_id`) VALUES
(1, 'a4', 'a4', 'a4', 'a4', 'a4', 'a4', 'a4', 0.2, 1),
(2, 'qweqwe', 'q', 'q', 'p', 'p', 'p', 'p', 0.1, 1),
(3, 'a5', 'a5', 'a5', 'a5', 'a5', 'a5', 'a5', 12.1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_layer`
--

CREATE TABLE `business_layer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อกระบวนการ',
  `workflow_path` longtext COMMENT 'ที่เก็บพาร์ทรูป Workflow',
  `remark` longtext COMMENT 'ข้อสังเกตุ',
  `department_id` int(11) NOT NULL COMMENT 'หน่วยงานที่เกี่ยวข้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business_layer`
--

INSERT INTO `business_layer` (`id`, `name`, `workflow_path`, `remark`, `department_id`) VALUES
(1, 'asdasd', '1.pdf', 'asd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_layer`
--

CREATE TABLE `data_layer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อ',
  `type` varchar(255) DEFAULT NULL COMMENT 'ประเภทการเก็บข้อมูล',
  `remark` longtext COMMENT 'ข้อเสนอแนะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_layer`
--

INSERT INTO `data_layer` (`id`, `name`, `type`, `remark`) VALUES
(1, 'asad', NULL, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อข้อมูล',
  `remark` longtext COMMENT 'ข้อสังเกต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `remark`) VALUES
(1, 'daada', 'adadad');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relation_table`
--

CREATE TABLE `relation_table` (
  `id` int(11) NOT NULL,
  `ea_id` int(11) DEFAULT NULL COMMENT 'ข้อมูลตั้งต้น',
  `ea_type` text COMMENT 'ประเภทข้อมูลตั้งต้น',
  `business_layer_id` int(11) DEFAULT NULL,
  `data_layer_id` int(11) DEFAULT NULL,
  `application_layer_id` int(11) DEFAULT NULL,
  `technology_layer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `technology_layer`
--

CREATE TABLE `technology_layer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อ',
  `brand` varchar(255) DEFAULT NULL COMMENT 'ยี่ห้อ',
  `model` varchar(255) DEFAULT NULL COMMENT 'รุ่น',
  `tech_spec` longtext COMMENT 'สเปค',
  `amount` int(11) DEFAULT NULL COMMENT 'จำนวน',
  `operating_system` varchar(45) DEFAULT NULL COMMENT 'ระบบปฏิบัติการ',
  `cpu_use` double DEFAULT NULL COMMENT 'ซีพียูที่ใช้',
  `memory_total` double DEFAULT NULL COMMENT 'เมมโมรีที่มี',
  `memory_used` double DEFAULT NULL COMMENT 'เมมโมรีที่ใช้',
  `hardisk_total` double DEFAULT NULL COMMENT 'หน่วยความจำที่มี',
  `hardisk_used` double DEFAULT NULL COMMENT 'หน่วยความจำที่ใช้',
  `utility_app` longtext COMMENT 'แอพพลิเคชั่นที่มี',
  `tech_location` longtext COMMENT 'สถานที่ตั้ง',
  `ma_cost` double DEFAULT NULL COMMENT 'ค่าซ่อมบำรุง',
  `remark` longtext COMMENT 'ข้อเสนอแนะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin1@gmail.com', '$2y$10$5y/W7ZM/WuFAZiZnosQKGuAYuXbp2jZAMYKpSgzUNHFeTg6YBRWm6', NULL, '2016-10-08 21:38:23', '2016-10-08 21:38:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_layer`
--
ALTER TABLE `application_layer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_application_layer_department1_idx` (`department_id`);

--
-- Indexes for table `business_layer`
--
ALTER TABLE `business_layer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_business_layer_department_idx` (`department_id`);

--
-- Indexes for table `data_layer`
--
ALTER TABLE `data_layer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `relation_table`
--
ALTER TABLE `relation_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_relation_table_business_layer1_idx` (`business_layer_id`),
  ADD KEY `fk_relation_table_data_layer1_idx` (`data_layer_id`),
  ADD KEY `fk_relation_table_application_layer1_idx` (`application_layer_id`),
  ADD KEY `fk_relation_table_technology_layer1_idx` (`technology_layer_id`);

--
-- Indexes for table `technology_layer`
--
ALTER TABLE `technology_layer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_layer`
--
ALTER TABLE `application_layer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `business_layer`
--
ALTER TABLE `business_layer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_layer`
--
ALTER TABLE `data_layer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `technology_layer`
--
ALTER TABLE `technology_layer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `application_layer`
--
ALTER TABLE `application_layer`
  ADD CONSTRAINT `fk_application_layer_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `business_layer`
--
ALTER TABLE `business_layer`
  ADD CONSTRAINT `fk_business_layer_department` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `relation_table`
--
ALTER TABLE `relation_table`
  ADD CONSTRAINT `fk_relation_table_application_layer1` FOREIGN KEY (`application_layer_id`) REFERENCES `application_layer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_relation_table_business_layer1` FOREIGN KEY (`business_layer_id`) REFERENCES `business_layer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_relation_table_data_layer1` FOREIGN KEY (`data_layer_id`) REFERENCES `data_layer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_relation_table_technology_layer1` FOREIGN KEY (`technology_layer_id`) REFERENCES `technology_layer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
