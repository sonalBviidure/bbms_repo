-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2024 at 08:57 AM
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
-- Database: `tnp`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `t_ach_id` int(11) NOT NULL,
  `t_ach_name` varchar(30) NOT NULL,
  `t_ach_dec` text NOT NULL,
  `t_date_achieved` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_employee`
--

CREATE TABLE `add_employee` (
  `emp_id` int(10) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `employee_email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `employee_contact` bigint(10) NOT NULL,
  `department` varchar(30) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_employee`
--

INSERT INTO `add_employee` (`emp_id`, `employee_name`, `employee_email`, `password`, `employee_contact`, `department`, `status`) VALUES
(1, 'Kartiki', 'karu@gmail.com', 'Karu@12344', 9565458555, 'Finance', 1),
(2, 'Kartiki', 'k@gmail.com', 'Kaser@890', 8455657799, 'HR', 1),
(3, 'Nikita', 'nick@gmail.com', 'Nik@123', 9685741425, 'Marketing', 1),
(4, 'Nikita', 'nick@gmail.com', 'Nik@123', 9685741425, 'Marketing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `t_admin_id` int(11) NOT NULL,
  `t_admin_nm` varchar(30) NOT NULL,
  `t_admin_email` varchar(30) NOT NULL,
  `t_admin_pwd` varchar(15) NOT NULL,
  `t_admin_ph_no` bigint(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`t_admin_id`, `t_admin_nm`, `t_admin_email`, `t_admin_pwd`, `t_admin_ph_no`, `status`) VALUES
(23, 'Yogesh', 'yogishinde@gmail.com', '$2y$10$KxN3.etL', 9096791898, 0),
(24, 'Kartiki', 'karu@gmail.com', '$2y$10$DXLZ6nwE', 7588374116, 0),
(25, 'Kaarya', 'karya@gmail.com', '$2y$10$.ft4frYp', 7586123222, 0),
(26, 'Kartiki', 'kartiki@gmail.com', 'Karu@05', 7542123265, 0),
(27, 'Yogesh', 'yogi@gmail.com', 'Yogishinde@123', 9098791898, 0),
(28, 'Yogesh', 'yogi@gmail.com', 'Yogesh@0709', 9890701880, 0),
(29, 'Yogesh', 'yogi@gmail.com', 'Yogesh@0709', 9890701880, 0),
(30, 'Akash', 'akash@gmail.com', '$2y$10$ZHtvcOa9', 7445658595, 0),
(31, 'Reshma', 'reshma@gmail.com', 'Reshma@123', 7542152688, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assesments`
--

CREATE TABLE `assesments` (
  `t_asses_id` int(11) NOT NULL,
  `t_course_id` int(11) NOT NULL,
  `t_asses_name` varchar(30) NOT NULL,
  `t_asses_desc` text NOT NULL,
  `t_date` datetime(6) NOT NULL,
  `t_max_marks` int(10) NOT NULL,
  `t_upload_asmt` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `t_attd_id` int(11) NOT NULL,
  `t_reg_id` int(11) NOT NULL,
  `t_attd_date` datetime(6) NOT NULL,
  `t_status` enum('Present','Absent','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`t_attd_id`, `t_reg_id`, `t_attd_date`, `t_status`) VALUES
(4, 1, '2024-04-05 00:00:00.000000', 'Present'),
(5, 2, '2024-04-05 00:00:00.000000', 'Present'),
(6, 3, '2024-04-05 00:00:00.000000', 'Present'),
(7, 4, '2024-04-05 00:00:00.000000', 'Present'),
(8, 1, '2024-04-05 00:00:00.000000', 'Present'),
(9, 2, '2024-04-05 00:00:00.000000', 'Present'),
(10, 3, '2024-04-05 00:00:00.000000', 'Present'),
(11, 4, '2024-04-05 00:00:00.000000', 'Present'),
(12, 1, '2024-04-19 00:00:00.000000', 'Present'),
(13, 2, '2024-04-19 00:00:00.000000', 'Present'),
(14, 3, '2024-04-19 00:00:00.000000', 'Present'),
(15, 4, '2024-04-19 00:00:00.000000', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `t_Center_id` int(11) NOT NULL,
  `t_Center_name` varchar(30) NOT NULL,
  `t_Location` varchar(30) NOT NULL,
  `t_Contact_person_nm` varchar(30) NOT NULL,
  `t_Contact_email` varchar(30) NOT NULL,
  `t_Contact_number` bigint(10) NOT NULL,
  `t_Center_img` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`t_Center_id`, `t_Center_name`, `t_Location`, `t_Contact_person_nm`, `t_Contact_email`, `t_Contact_number`, `t_Center_img`, `status`) VALUES
(1, 'Tilak Road', 'Tilak road pune', 'Priyanka ', 'sanity@gmail.com', 9669633656, '1926481.png', 0),
(2, 'Tilak Road', 'Tilak road', 'Priyanka ', 'admin@gmail.com', 7896541235, '1926481.png', 0),
(3, 'Prime', 'kothrud', 'Priyanka', 'prime@gmail.com', 7898588486, 'photo-1533610067042-1cee3c403282.jpg', 0),
(4, 'Prime', 'kothrud', 'Priyanka', 'prime@gmail.com', 7898588486, 'photo-1533610067042-1cee3c403282.jpg', 0),
(5, 'Prime', 'Tilak Road', 'Priyanka', 'prime@gmail.com', 6587495211, 'center_upload/frontend.png', 0),
(6, 'Sanity', 'Kothrud', 'Abhishek', 'abhi@gmail.com', 7586485955, 'center_upload/hd_dd3145238c280c4f3efc74c7fe26f046.', 0),
(7, 'Prime', 'Tilak Road', 'Yogesh', 'yogi@gmail.com', 8675485922, 'center_upload/DSCN2135.JPG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `center_courses`
--

CREATE TABLE `center_courses` (
  `t_center_id` int(11) NOT NULL,
  `t_course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `center_facilities`
--

CREATE TABLE `center_facilities` (
  `t_center_id` int(11) NOT NULL,
  `t_facility_id` int(11) NOT NULL,
  `t_facility_nm` varchar(20) NOT NULL,
  `t_quantity` int(11) NOT NULL,
  `t_facility_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `t_cf_id` int(11) NOT NULL,
  `t_cf_name` varchar(30) NOT NULL,
  `t_cf_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `com_tieup`
--

CREATE TABLE `com_tieup` (
  `id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_logo` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `com_tieup`
--

INSERT INTO `com_tieup` (`id`, `company_name`, `company_logo`, `location`, `website`, `status`) VALUES
(10, 'saf', 'logo_upload/nike_logo.png', 'pcmc', 'www.google.com', 0),
(11, 'sanity', 'logo_upload/sanity-techn.jpg', 'kothrud', 'https://sanitytechnologies.in/', 0),
(12, 'puma', 'logo_upload/pumascompany.png', 'pune', 'www.puma.com', 0),
(13, 'Tcs', 'logo_upload/violet.jpg', 'Hinjewadi, Pune', 'www.tcs.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `t_course_id` int(11) NOT NULL,
  `t_course_name` varchar(30) NOT NULL,
  `trainer_nm` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `syllabus` varchar(50) NOT NULL,
  `image_one` varchar(50) NOT NULL,
  `image_two` varchar(50) NOT NULL,
  `duration` time(4) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses_enq`
--

CREATE TABLE `courses_enq` (
  `t_enquiry_id` int(11) NOT NULL,
  `t_stud_nm` varchar(30) NOT NULL,
  `t_stud_email` varchar(20) NOT NULL,
  `t_stud_contact` bigint(10) NOT NULL,
  `t_enq_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses_enq`
--

INSERT INTO `courses_enq` (`t_enquiry_id`, `t_stud_nm`, `t_stud_email`, `t_stud_contact`, `t_enq_date`, `status`) VALUES
(50, 'Yogesh Mahadev Shinde', 'yogeshs72002@gmail.c', 9763330411, '0000-00-00 00:00:00.000000', 0),
(51, 'loki', 'yogeshs72002@gmail.c', 9763330411, '2024-05-08 18:06:04.024230', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_materials`
--

CREATE TABLE `course_materials` (
  `t_material_id` int(11) NOT NULL,
  `t_course_id` int(11) NOT NULL,
  `t_material_name` varchar(15) NOT NULL,
  `t_material_desc` text NOT NULL,
  `t_upload_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_services`
--

CREATE TABLE `course_services` (
  `t_course_id` int(11) NOT NULL,
  `t_service_nm` varchar(30) NOT NULL,
  `t_service_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `t_dept_id` int(11) NOT NULL,
  `t_dept_name` varchar(30) NOT NULL,
  `t_dept_dscrption` varchar(30) NOT NULL,
  `t_location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_sign_up`
--

CREATE TABLE `employee_sign_up` (
  `t_employe_id` int(11) NOT NULL,
  `t_employe_nm` varchar(20) NOT NULL,
  `t_employe_email` varchar(20) NOT NULL,
  `employee_gender` enum('male','female','other') NOT NULL,
  `t_employe_password` varchar(15) NOT NULL,
  `t_employe_contact` bigint(10) NOT NULL,
  `t_employe_address` varchar(50) NOT NULL,
  `t_employe_city` varchar(15) NOT NULL,
  `t_employe_state` varchar(15) NOT NULL,
  `t_pincode` int(6) NOT NULL,
  `t_upload_id_prof` varchar(50) NOT NULL,
  `t_employe_resume` varchar(50) NOT NULL,
  `t_education_doc` varchar(50) NOT NULL,
  `t_profile_photo` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `t_employe_country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_sign_up`
--

INSERT INTO `employee_sign_up` (`t_employe_id`, `t_employe_nm`, `t_employe_email`, `employee_gender`, `t_employe_password`, `t_employe_contact`, `t_employe_address`, `t_employe_city`, `t_employe_state`, `t_pincode`, `t_upload_id_prof`, `t_employe_resume`, `t_education_doc`, `t_profile_photo`, `status`, `t_employe_country`) VALUES
(1, 'kartiki', 'karu@gmail.com', 'male', 'kartiki@io89', 7584865928, 'Karve nagar', 'pune', 'Maharashtra', 431001, 'Aadhar card.pdf', 'RESUME.pdf', 'cet score.pdf', '1926481.png', 0, ''),
(4, 'Kartiki', 'kartiki@gmail.com', 'male', 'kartiki@123', 7588374116, 'Karve Nagar', 'pune', 'Maharashtra', 41120, '', '', '', '', 0, ''),
(6, 'Kartiki', 'kartiki@gmail.com', 'male', 'kartiki@123', 7588374116, 'Karve Nagar', 'pune', 'Maharashtra', 41120, 'employe_upload/Kartiki resume.pdf', 'employe_upload/New script.pdf', 'employe_upload/New script 2.pdf', 'employe_upload/WhatsApp Image 2024-04-12 at 10.57.', 0, ''),
(8, 'Nikita', 'nikki@gail.com', 'male', 'nick@23', 8888654525, 'vanaz', 'pune', 'Maharashtra', 41120, 'employe_upload/ID Proof/', 'employe_upload/Resume/', '', 'employe_upload/Profile Photo/', 0, ''),
(10, 'Akash', 'akki@gmail.com', 'male', 'akki@123', 7896547485, 'Hadapsar', 'pune', 'Maharashtra', 41131, 'employe_upload/ID Proof/', 'employe_upload/Resume/', '', 'employe_upload/Profile Photo/', 0, ''),
(12, 'Reshma', 'reshu@gmail.com', 'male', 'resh@123', 9307054950, 'Karve Nagar', 'pune', 'Maharashtra', 41120, 'New script 2.pdf', 'Internship Program Management System.pdf', 'Untitled document 1.pdf', 'school-girl-looking-up-at-the-night-anime-sky-udlu', 0, ''),
(15, 'karu', 'karu@gmail.com', 'male', 'k@1234', 8956748544, 'Karve nagar', 'pune', 'Maharashtra', 41120, '', '', '', '', 0, ''),
(19, 'Nicks', 'nicks@gmail.com', 'male', 'nicks@123', 8877445545, 'Karve nagar', 'pune', 'Maharashtra', 41123, '', '', '', '', 0, ''),
(26, 'Jaydeep', 'jay@gmail.com', 'male', 'jay@123', 7584958622, 'vanaz', 'solapur', 'maharashtra', 41120, 'employe_upload/ID Proof/WhatsApp Image 2024-02-20 ', 'employe_upload/Resume/Internship Program Managemen', '', 'employe_upload/Profile Photo/Screenshot (12).png', 0, ''),
(27, 'Akash', 'Akassh@gmail.com', 'male', 'akki@1298', 7895421236, 'Hadapsar', 'pune', 'maharashtra', 41120, 'employe_upload/ID Proof/Pink Illustrated Woman Wor', 'employe_upload/Resume/New script.pdf', '', 'employe_upload/Profile Photo/WhatsApp Image 2024-0', 0, ''),
(28, 'Akash', 'Akassh@gmail.com', 'male', 'akki@1298', 7895421236, 'Hadapsar', 'pune', 'maharashtra', 41120, 'employe_upload/ID Proof/Pink Illustrated Woman Wor', 'employe_upload/Resume/New script.pdf', '', 'employe_upload/Profile Photo/WhatsApp Image 2024-0', 0, ''),
(29, 'Suresh', 'suresh@gmail.com', 'male', 'suresh@123', 7586425311, 'Karve Nagar', 'Pune', 'Maharashtra', 41120, 'employe_upload/ID Proof/events-event_image.bin', 'employe_upload/Resume/Internship Program Managemen', '', 'employe_upload/Profile Photo/cld.png', 0, ''),
(30, 'Yogeshh', 'yogi@gmail.com', 'male', 'yogi@1234', 8965447755, 'Vanaz', 'Pune', 'Maharashtra', 41102, 'employe_upload/ID Proof/frontend.png', 'employe_upload/Resume/Internship Program Managemen', '', 'employe_upload/Profile Photo/images.png', 0, ''),
(31, 'kksmsrm', 'k@gmail.com', 'male', 'jek@1939dk', 7474745566, 'dmjwk', 'Pune', 'Maharashtra', 41120, 'employe_upload/ID Proof/IMG20230422161249.jpg', 'employe_upload/Resume/Untitled document (4).pdf', '', 'employe_upload/Profile Photo/WhatsApp Image 2023-0', 0, ''),
(32, 'Khala', 'khala@gmail.com', 'male', 'Khala@1234', 7588321456, 'Karve Nagar', 'Pune', 'Maharashtra', 411023, 'employe_upload/ID Proof/school-girl-looking-up-at-', 'employe_upload/Resume/resume_vishal.pdf', '', 'employe_upload/Profile Photo/Sign.jpg', 0, ''),
(33, 'Khala', 'khala@gmail.com', 'male', 'Khala@1234', 7588321456, 'Karve Nagar', 'Pune', 'Maharashtra', 411023, 'employe_upload/ID Proof/school-girl-looking-up-at-', 'employe_upload/Resume/resume_vishal.pdf', '', 'employe_upload/Profile Photo/Sign.jpg', 0, ''),
(34, 'Khala', 'khala@gmail.com', 'male', 'Khala@1234', 7588321456, 'Karve Nagar', 'Pune', 'Maharashtra', 411023, 'employe_upload/ID Proof/school-girl-looking-up-at-', 'employe_upload/Resume/resume_vishal.pdf', '', 'employe_upload/Profile Photo/Sign.jpg', 0, ''),
(35, 'Khala', 'khala@gmail.com', 'male', 'Khala@1234', 7588321456, 'Karve Nagar', 'Pune', 'Maharashtra', 411023, 'employe_upload/ID Proof/school-girl-looking-up-at-', 'employe_upload/Resume/resume_vishal.pdf', '', 'employe_upload/Profile Photo/Sign.jpg', 0, ''),
(36, 'Kartikiii', 'kartiki@gmail.com', 'male', '$2y$10$Iwr.XLWR', 7588374116, 'karve nagar', 'solapur', 'maharashtra', 411023, 'employe_upload/ID Proof/Internship Program Managem', 'employe_upload/Resume/b9d4baafc0f85db5655e5a8a95e2', '', 'employe_upload/Profile Photo/bblue.jpg', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `employer_signup`
--

CREATE TABLE `employer_signup` (
  `t_emp_id` int(11) NOT NULL,
  `t_company_nm` varchar(30) NOT NULL,
  `t_emp_name` varchar(30) NOT NULL,
  `t_emp_email` varchar(20) NOT NULL,
  `t_emp_gender` enum('male','female','other') NOT NULL,
  `t_emp_contact` bigint(10) NOT NULL,
  `t_emp_address` varchar(50) NOT NULL,
  `t_emp_city` varchar(20) NOT NULL,
  `t_pincode` int(8) NOT NULL,
  `t_emp_current_post` varchar(20) NOT NULL,
  `t_password` varchar(15) NOT NULL,
  `t_emp_dob` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer_signup`
--

INSERT INTO `employer_signup` (`t_emp_id`, `t_company_nm`, `t_emp_name`, `t_emp_email`, `t_emp_gender`, `t_emp_contact`, `t_emp_address`, `t_emp_city`, `t_pincode`, `t_emp_current_post`, `t_password`, `t_emp_dob`, `status`) VALUES
(1, 'Tcs', 'Kartiki', 'karu@gmail.com', 'female', 7588374116, 'karve nagar', 'pune', 431002, 'manger', 'Kartiki@829j', '2024-04-01', 1),
(2, 'TCS', 'Pavan', 'pavan@gmail.com', 'male', 7584865952, 'Karve', 'pune', 431002, 'Developer', 'pavan@00', '2024-04-04', 0),
(3, 'Wipro', 'Abhishek', 'abhi@gmail.com', 'male', 7584865952, 'Vanaz', 'pune', 431002, 'Developer', 'abhi@gmail09', '2024-04-03', 0),
(4, 'Infosys', 'Kartiki', 'kartiki@gmail.com', 'female', 7588374116, 'Karve nagar pune', 'pune', 411368, 'Developer', 'kartiki@03', '2024-04-12', 0),
(5, 'TCS', 'Abhi', 'abhi@gmail.com', 'male', 7788996655, 'Vanaz', 'pune', 854755, 'HR', 'ab@9090', '2024-05-23', 0),
(6, 'TCS', 'Akash', 'akki@gmail.com', 'male', 7548865955, 'Hadapsar', 'pune', 411023, 'HR', 'H@wdk90', '2024-05-01', 0),
(7, 'Infosys', 'Yogesh', 'yogi@gmail.com', 'male', 9685741232, 'Hinjewadi', 'Mysore', 412053, 'Manager', 'yogi@dj678', '2024-05-03', 0),
(8, 'TCS', 'Abhishek', 'abhi@gmail.com', 'male', 7744112200, 'Hinjewadi', 'Mysore', 412056, 'Developer', 'abhi@gma89', '2024-04-30', 0),
(9, 'Google', 'Nikita', 'nick@gmail.com', 'female', 9858746522, 'Karve Nagar', 'Chandigarh', 413058, 'HR', 'niki@90', '2024-05-11', 0),
(10, 'Hexaware', 'Kartiki', 'karu@gmail.com', 'female', 8574962522, 'Hinjewadi', 'Bangalore', 411203, 'Manager', 'Karti@1234', '2024-05-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `t_enquiry_id` int(11) NOT NULL,
  `t_stud_nm` varchar(30) NOT NULL,
  `t_stud_email` varchar(20) NOT NULL,
  `t_stud_contact` bigint(10) NOT NULL,
  `t_topic` varchar(50) NOT NULL,
  `t_enq_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`t_enquiry_id`, `t_stud_nm`, `t_stud_email`, `t_stud_contact`, `t_topic`, `t_enq_date`) VALUES
(1, 'Kartiki', 'karu@gmail.com', 9888546585, 'Python', '2024-04-01 00:00:00.000000'),
(2, 'Pavan', 'pavan@gmail.com', 8658958655, 'Web Dev.', '2024-04-04 00:00:00.000000'),
(3, 'Pavan', 'pavan@gmail.com', 8658958655, 'Web Dev.', '2024-04-04 00:00:00.000000'),
(4, 'Reshma', 'r@gmail.com', 9307054950, 'Python', '2024-04-04 00:00:00.000000'),
(5, 'Reshma', 'r@gmail.com', 9307054950, 'Python', '2024-04-04 00:00:00.000000'),
(6, 'Akash', 'akash@gmail.com', 7584865952, 'Python', '2024-04-04 00:00:00.000000'),
(7, 'Yogesh', 'yogi@gmail.com', 7586848655, 'Web dev', '2024-04-24 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `t_er_id` int(11) NOT NULL,
  `t_std_id` int(11) NOT NULL,
  `t_course_id` int(11) NOT NULL,
  `t_enrollment_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(20) NOT NULL,
  `event_image` varchar(50) NOT NULL,
  `event_contact` int(10) NOT NULL,
  `event_location` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `event_time` time(4) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_image`, `event_contact`, `event_location`, `start_date`, `end_date`, `event_time`, `status`) VALUES
(1, 'Seminar on Java', 'event_upload/WhatsApp Image 2024-04-12 at 10.57.11', 2147483647, 'Kothrud', '2024-04-27', '2024-05-01', '16:00:00.0000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_participants`
--

CREATE TABLE `event_participants` (
  `t_event_id` int(11) NOT NULL,
  `t_std_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `t_gallery_id` int(11) NOT NULL,
  `t_gallery_img` varchar(50) NOT NULL,
  `t_gallery_desc` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`t_gallery_id`, `t_gallery_img`, `t_gallery_desc`, `status`) VALUES
(14, 'gallery_upload/', 'duhhbymfhxisk', 0),
(15, 'gallery_upload/WhatsApp Image 2023-03-18 at 10.50.', 'kkkkkkkkkkkkkk', 0),
(16, 'gallery_upload/crop (1).jpg', 'fyhukjk', 0),
(17, 'gallery_upload/CoolShow_C000018.jpg', 'doooo', 0),
(18, 'gallery_upload/logo-info.png', 'jskfkd', 0),
(19, 'gallery_upload/Conversant_logo.png', 'sdfghj', 0),
(20, 'gallery_upload/Screenshot (189).png', 'dsf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hmenq`
--

CREATE TABLE `hmenq` (
  `t_enquiry_id` int(11) NOT NULL,
  `t_stud_nm` varchar(30) NOT NULL,
  `t_stud_email` varchar(20) NOT NULL,
  `t_stud_contact` bigint(10) NOT NULL,
  `t_state` varchar(30) NOT NULL,
  `t_pincode` int(11) NOT NULL,
  `t_topic` varchar(50) NOT NULL,
  `t_enq_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hmenq`
--

INSERT INTO `hmenq` (`t_enquiry_id`, `t_stud_nm`, `t_stud_email`, `t_stud_contact`, `t_state`, `t_pincode`, `t_topic`, `t_enq_date`, `status`) VALUES
(49, 'chekout', 'yogishere702@gmail.c', 9763330411, 'Maharashtra', 413601, 'webinar', '2024-05-14 06:20:56.423004', 0);

-- --------------------------------------------------------

--
-- Table structure for table `intern_projects`
--

CREATE TABLE `intern_projects` (
  `t_project_id` int(11) NOT NULL,
  `t_proj_name` varchar(30) NOT NULL,
  `t_proj_desc` text NOT NULL,
  `t_proj_status` varchar(10) NOT NULL,
  `t_proj_compl_date` datetime(6) NOT NULL,
  `t_trainer_id` int(11) NOT NULL,
  `t_stud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `t_app_id` int(11) NOT NULL,
  `t_st_id` int(11) NOT NULL,
  `t_std_resume` linestring NOT NULL,
  `t_app_date` datetime(6) NOT NULL,
  `t_job_role` varchar(20) NOT NULL,
  `t_job_salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_responses`
--

CREATE TABLE `job_responses` (
  `t_response_id` int(11) NOT NULL,
  `t_std_id` int(11) NOT NULL,
  `t_feedback_abt_stud` varchar(100) NOT NULL,
  `t_response_date` datetime(6) NOT NULL,
  `t_response_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `t_mgmt_id` int(11) NOT NULL,
  `t_Memp_nm` varchar(30) NOT NULL,
  `t_Memp_email` varchar(20) NOT NULL,
  `t_Memp_pwd` varchar(20) NOT NULL,
  `t_Memp_contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `management_schedule`
--

CREATE TABLE `management_schedule` (
  `id` int(11) NOT NULL,
  `team_member` varchar(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `management_task`
--

CREATE TABLE `management_task` (
  `t_mang_task_id` int(11) NOT NULL,
  `t_mang_task_nm` varchar(30) NOT NULL,
  `t_mang_task_team` varchar(30) NOT NULL,
  `t_deadline` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `management_team`
--

CREATE TABLE `management_team` (
  `t_mang_id` int(11) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `t_gender` enum('male','female','other','') NOT NULL,
  `t_dob` date NOT NULL,
  `t_email` varchar(30) NOT NULL,
  `t_contact` int(10) NOT NULL,
  `t_profile_photo` varchar(50) NOT NULL,
  `t_position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `management_team`
--

INSERT INTO `management_team` (`t_mang_id`, `t_name`, `t_gender`, `t_dob`, `t_email`, `t_contact`, `t_profile_photo`, `t_position`) VALUES
(1, 'Yogesh Mahadev Shinde', 'male', '2024-04-18', 'yogeshs72002@gmail.com', 2147483647, 'my_sign!.jpg', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `t_payment_id` int(11) NOT NULL,
  `t_std_id` int(11) NOT NULL,
  `t_course_fees` int(11) NOT NULL,
  `t_payment_status` varchar(30) NOT NULL,
  `t_date` datetime(6) NOT NULL,
  `t_course_nm` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placement_companies`
--

CREATE TABLE `placement_companies` (
  `t_company_id` int(11) NOT NULL,
  `t_company_name` varchar(30) NOT NULL,
  `t_location` varchar(30) NOT NULL,
  `t_hr_nm` varchar(30) NOT NULL,
  `t_contact_email` varchar(15) NOT NULL,
  `t_contact_number` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placement_events`
--

CREATE TABLE `placement_events` (
  `t_event_id` int(11) NOT NULL,
  `t_event_name` varchar(30) NOT NULL,
  `t_event_location` varchar(30) NOT NULL,
  `t_event_date` datetime(6) NOT NULL,
  `t_event_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placement_records`
--

CREATE TABLE `placement_records` (
  `t_record_id` int(11) NOT NULL,
  `t_std_id` int(11) NOT NULL,
  `t_company_id` int(11) NOT NULL,
  `t_job_id` int(11) NOT NULL,
  `t_placement_date` datetime(6) NOT NULL,
  `t_stud_job_role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `t_reg_id` int(11) NOT NULL,
  `t_stud_nm` varchar(30) NOT NULL,
  `t_stud_email` varchar(30) NOT NULL,
  `t_stud_contact` bigint(10) NOT NULL,
  `t_stud_DOB` datetime(6) NOT NULL,
  `t_stud_gender` enum('male','female','other') NOT NULL,
  `t_stud_address` varchar(100) NOT NULL,
  `t_stud_district` varchar(15) NOT NULL,
  `t_pincode` int(6) NOT NULL,
  `t_stud_state` varchar(15) NOT NULL,
  `t_clg_name` varchar(100) NOT NULL,
  `t_qualification` varchar(20) NOT NULL,
  `t_passout_year` int(4) NOT NULL,
  `t_cgpa` float NOT NULL,
  `t_upload_docs` varchar(50) NOT NULL,
  `t_university_nm` varchar(50) NOT NULL,
  `t_stud_profile` varchar(50) NOT NULL,
  `t_password` varchar(15) NOT NULL,
  `t_country` varchar(40) NOT NULL,
  `t_subdistrict` varchar(40) NOT NULL,
  `t_village` varchar(30) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`t_reg_id`, `t_stud_nm`, `t_stud_email`, `t_stud_contact`, `t_stud_DOB`, `t_stud_gender`, `t_stud_address`, `t_stud_district`, `t_pincode`, `t_stud_state`, `t_clg_name`, `t_qualification`, `t_passout_year`, `t_cgpa`, `t_upload_docs`, `t_university_nm`, `t_stud_profile`, `t_password`, `t_country`, `t_subdistrict`, `t_village`, `status`) VALUES
(19, 'Abhishek', 'abhi@gmail.com', 7586223311, '2024-05-08 00:00:00.000000', 'male', 'Vanaz', 'Osmanabad', 411023, '', 'Orchid', 'Under Graduate', 0, 7.9, '', 'Dbatu', 'stud_upload66433e63cb575.jpg', 'Adf@123', 'India', 'Tuljapur', 'Tuljapur', 0),
(20, 'Yogesh', 'yogi@gmail.com', 8854565211, '2024-05-07 00:00:00.000000', 'male', 'Karve Nagar', 'Dindori', 411025, '', 'Orchid', 'Under Graduate', 0, 7.6, '', 'Dbatu', 'stud_upload6643464c0b04f.png', 'Yogesh@1234', 'India', 'Dindori', 'Dindori', 0),
(21, 'Yogesh', 'yogya@gmail.com', 7586425311, '2024-05-17 00:00:00.000000', 'male', 'Vanaz', 'Solapur', 411023, '', 'Orchid', 'Under Graduate', 0, 7.9, '', 'Dbatu', 'stud_upload6647058ac4c8d.jpg', 'Yogi@123', 'India', 'Akkalkot', 'Akkalkot', 0),
(22, 'Nikita', 'nick@gmail.com', 8888759525, '2024-05-16 00:00:00.000000', 'female', 'Karve Nagar', 'Solapur', 413021, '', 'Orchid', 'Under Graduate', 0, 8.23, '', 'Dbatu', 'stud_upload/profile_photo/66484ca978714.jpg', 'Nick@16', 'India', 'Akkalkot', 'Akkalkot', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `t_report_id` int(11) NOT NULL,
  `t_std_id` int(11) NOT NULL,
  `t_course_id` int(11) NOT NULL,
  `t_report_type` varchar(30) NOT NULL,
  `t_report_content` text NOT NULL,
  `t_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `std_placed`
--

CREATE TABLE `std_placed` (
  `id` int(11) NOT NULL,
  `placement_date` date NOT NULL,
  `num_students` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `std_placed`
--

INSERT INTO `std_placed` (`id`, `placement_date`, `num_students`, `status`) VALUES
(4, '2024-05-12', 25, 0),
(5, '2024-05-17', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_certificates`
--

CREATE TABLE `student_certificates` (
  `t_std_id` int(11) NOT NULL,
  `t_cf_id` int(11) NOT NULL,
  `t_date_achieved` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_jobs`
--

CREATE TABLE `student_jobs` (
  `t_job_id` int(11) NOT NULL,
  `t_job_title` varchar(30) NOT NULL,
  `t_job_desc` varchar(30) NOT NULL,
  `t_job_location` varchar(30) NOT NULL,
  `t_job_req` varchar(30) NOT NULL,
  `t_job_sal` int(11) NOT NULL,
  `t_company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `t_st_id` int(11) NOT NULL,
  `t_st_name` varchar(30) NOT NULL,
  `t_st_email` varchar(30) NOT NULL,
  `t_reg_id` int(11) NOT NULL,
  `t_password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stud_feedback`
--

CREATE TABLE `stud_feedback` (
  `t_fb_id` int(11) NOT NULL,
  `t_st_id` int(11) NOT NULL,
  `t_fb_text` varchar(30) NOT NULL,
  `t_fb_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_schedule`
--

CREATE TABLE `support_schedule` (
  `id` int(11) NOT NULL,
  `team_member` varchar(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_task`
--

CREATE TABLE `support_task` (
  `t_supp_task_id` int(11) NOT NULL,
  `t_supp_task_nm` varchar(30) NOT NULL,
  `t_supp_task_team` varchar(30) NOT NULL,
  `t_deadline` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_team`
--

CREATE TABLE `support_team` (
  `t_support_id` int(11) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `t_gender` enum('male','female','other','') NOT NULL,
  `t_dob` date NOT NULL,
  `t_email` varchar(50) NOT NULL,
  `t_contact` int(10) NOT NULL,
  `t_profile_photo` varchar(50) NOT NULL,
  `t_dept` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_team`
--

INSERT INTO `support_team` (`t_support_id`, `t_name`, `t_gender`, `t_dob`, `t_email`, `t_contact`, `t_profile_photo`, `t_dept`) VALUES
(1, 'Yogesh Mahadev Shinde', 'female', '2024-04-04', 'yogeshs72002@gmail.com', 2147483647, 'my_sign!.jpg', ''),
(2, 'Yogesh Mahadev Shinde', 'female', '2024-04-04', 'yogeshs72002@gmail.com', 2147483647, 'my_sign!.jpg', ''),
(3, 'Yogesh Mahadev Shinde', 'female', '2024-04-04', 'yogeshs72002@gmail.com', 2147483647, 'my_sign!.jpg', 'lab_assistant');

-- --------------------------------------------------------

--
-- Table structure for table `technical_schedule`
--

CREATE TABLE `technical_schedule` (
  `id` int(11) NOT NULL,
  `team_member` varchar(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technical_task`
--

CREATE TABLE `technical_task` (
  `t_tech_task_id` int(11) NOT NULL,
  `t_tech_task_nm` varchar(30) NOT NULL,
  `t_tech_task_team` varchar(30) NOT NULL,
  `t_deadline` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technical_team`
--

CREATE TABLE `technical_team` (
  `t_tech_id` int(11) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `t_gender` enum('male','female','other','') NOT NULL,
  `t_dob` date NOT NULL,
  `t_email` varchar(30) NOT NULL,
  `t_contact` int(10) NOT NULL,
  `t_profile_photo` varchar(50) NOT NULL,
  `t_dept` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technical_team`
--

INSERT INTO `technical_team` (`t_tech_id`, `t_name`, `t_gender`, `t_dob`, `t_email`, `t_contact`, `t_profile_photo`, `t_dept`) VALUES
(1, 'Yogesh Mahadev Shinde', 'female', '2024-04-12', 'yogeshs72002@gmail.com', 2147483647, 'my_sign!.jpg', 'trainer');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `t_tr_id` int(11) NOT NULL,
  `t_tr_name` varchar(30) NOT NULL,
  `t_tr_gender` enum('Male','Female','Other') NOT NULL,
  `t_tr_specialization` text NOT NULL,
  `t_tr_contact` bigint(10) NOT NULL,
  `t_tr_email` varchar(30) NOT NULL,
  `t_tr_experience` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`t_tr_id`, `t_tr_name`, `t_tr_gender`, `t_tr_specialization`, `t_tr_contact`, `t_tr_email`, `t_tr_experience`, `status`) VALUES
(1, 'Kartiki', 'Female', 'Python', 7588374116, 'kartiki@gmail.com', 1, 0),
(2, 'Kartiki', 'Female', 'Python', 7588374116, 'kartiki@gmail.com', 1, 0),
(3, 'Yogesh', 'Male', 'Java', 9790456525, 'Yogi@gmail.com', 1, 0),
(4, 'Yogesh', 'Male', 'Java', 9790456525, 'Yogi@gmail.com', 1, 0),
(5, 'Yogesh', 'Male', 'Java', 9790456525, 'Yogi@gmail.com', 1, 0),
(6, 'Kartiki', 'Female', 'Python', 8657488652, 'kartiki@gmail.com', 0, 0),
(7, 'Yogesh', 'Male', 'ww2w', 9584758625, 'yogesh@gmail.com', 9, 0),
(8, 'Akash', 'Male', 'Java', 9685741232, 'akash@gmail.com', 2, 0),
(9, 'Nikita', 'Female', 'Python', 9645213255, 'nikita@gmail.com', 5, 0),
(10, 'Reshma', 'Female', 'Dot net', 7414552266, 'reshu@gmail.com', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trainer_availability`
--

CREATE TABLE `trainer_availability` (
  `t_availability_id` int(11) NOT NULL,
  `t_trainer_id` int(11) NOT NULL,
  `t_course_id` int(11) NOT NULL,
  `t_date` datetime(6) NOT NULL,
  `t_avail_status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_batches`
--

CREATE TABLE `t_batches` (
  `t_batch_id` int(11) NOT NULL,
  `t_batch_trainer_nm` varchar(30) NOT NULL,
  `t_batch_code` varchar(10) NOT NULL,
  `t_subject` varchar(30) NOT NULL,
  `t_no_students` int(11) NOT NULL,
  `t_trainer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_batches`
--

INSERT INTO `t_batches` (`t_batch_id`, `t_batch_trainer_nm`, `t_batch_code`, `t_subject`, `t_no_students`, `t_trainer_id`) VALUES
(3, 'lkjashf', ' asdf', 'asf', 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(11) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `recruitment` varchar(100) NOT NULL,
  `apply_link` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `experience`, `position`, `location`, `salary`, `recruitment`, `apply_link`, `deadline`, `status`) VALUES
(1, '3', 'UI developer', 'latur', '300000', ';lakdjadf;askj', 'fasd', '2024-05-30', 0),
(2, '5', 'Developer', 'Pune', '10 LPA', 'Cloud Dev', 'www.tcs.com', '2024-05-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `weekly_assesments`
--

CREATE TABLE `weekly_assesments` (
  `t_std_id` int(11) NOT NULL,
  `t_asses_id` int(11) NOT NULL,
  `t_w_asses_result` varchar(11) NOT NULL,
  `t_marks_obt` int(10) NOT NULL,
  `t_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`t_ach_id`);

--
-- Indexes for table `add_employee`
--
ALTER TABLE `add_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`t_admin_id`);

--
-- Indexes for table `assesments`
--
ALTER TABLE `assesments`
  ADD PRIMARY KEY (`t_asses_id`),
  ADD KEY `asses1` (`t_course_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`t_attd_id`),
  ADD KEY `atd2` (`t_reg_id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`t_Center_id`);

--
-- Indexes for table `center_courses`
--
ALTER TABLE `center_courses`
  ADD KEY `cc1` (`t_center_id`),
  ADD KEY `cc2` (`t_course_id`);

--
-- Indexes for table `center_facilities`
--
ALTER TABLE `center_facilities`
  ADD PRIMARY KEY (`t_facility_id`),
  ADD KEY `fac1` (`t_center_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`t_cf_id`);

--
-- Indexes for table `com_tieup`
--
ALTER TABLE `com_tieup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`t_course_id`);

--
-- Indexes for table `courses_enq`
--
ALTER TABLE `courses_enq`
  ADD PRIMARY KEY (`t_enquiry_id`);

--
-- Indexes for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD PRIMARY KEY (`t_material_id`),
  ADD KEY `cm1` (`t_course_id`);

--
-- Indexes for table `course_services`
--
ALTER TABLE `course_services`
  ADD KEY `test4` (`t_course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`t_dept_id`);

--
-- Indexes for table `employee_sign_up`
--
ALTER TABLE `employee_sign_up`
  ADD PRIMARY KEY (`t_employe_id`);

--
-- Indexes for table `employer_signup`
--
ALTER TABLE `employer_signup`
  ADD PRIMARY KEY (`t_emp_id`),
  ADD KEY `es1` (`t_company_nm`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`t_enquiry_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`t_er_id`),
  ADD KEY `st_id` (`t_std_id`),
  ADD KEY `er1` (`t_course_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD KEY `ep1` (`t_event_id`),
  ADD KEY `ep2` (`t_std_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`t_gallery_id`);

--
-- Indexes for table `hmenq`
--
ALTER TABLE `hmenq`
  ADD PRIMARY KEY (`t_enquiry_id`);

--
-- Indexes for table `intern_projects`
--
ALTER TABLE `intern_projects`
  ADD PRIMARY KEY (`t_project_id`),
  ADD KEY `ip1` (`t_trainer_id`),
  ADD KEY `ip2` (`t_stud_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`t_app_id`),
  ADD KEY `jb2` (`t_st_id`);

--
-- Indexes for table `job_responses`
--
ALTER TABLE `job_responses`
  ADD PRIMARY KEY (`t_response_id`),
  ADD KEY `jr1` (`t_std_id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`t_mgmt_id`);

--
-- Indexes for table `management_schedule`
--
ALTER TABLE `management_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management_team`
--
ALTER TABLE `management_team`
  ADD PRIMARY KEY (`t_mang_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`t_payment_id`),
  ADD KEY `pay1` (`t_std_id`);

--
-- Indexes for table `placement_companies`
--
ALTER TABLE `placement_companies`
  ADD PRIMARY KEY (`t_company_id`);

--
-- Indexes for table `placement_events`
--
ALTER TABLE `placement_events`
  ADD PRIMARY KEY (`t_event_id`);

--
-- Indexes for table `placement_records`
--
ALTER TABLE `placement_records`
  ADD PRIMARY KEY (`t_record_id`),
  ADD KEY `pr1` (`t_std_id`),
  ADD KEY `pr2` (`t_company_id`),
  ADD KEY `pr3` (`t_job_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`t_reg_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`t_report_id`),
  ADD KEY `rp1` (`t_course_id`),
  ADD KEY `rp2` (`t_std_id`);

--
-- Indexes for table `std_placed`
--
ALTER TABLE `std_placed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_certificates`
--
ALTER TABLE `student_certificates`
  ADD KEY `scf1` (`t_cf_id`) USING BTREE,
  ADD KEY `sd2` (`t_std_id`);

--
-- Indexes for table `student_jobs`
--
ALTER TABLE `student_jobs`
  ADD PRIMARY KEY (`t_job_id`),
  ADD KEY `jb` (`t_company_id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`t_st_id`),
  ADD KEY `sl1` (`t_reg_id`);

--
-- Indexes for table `stud_feedback`
--
ALTER TABLE `stud_feedback`
  ADD PRIMARY KEY (`t_fb_id`),
  ADD KEY `fb1` (`t_st_id`);

--
-- Indexes for table `support_schedule`
--
ALTER TABLE `support_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_team`
--
ALTER TABLE `support_team`
  ADD PRIMARY KEY (`t_support_id`);

--
-- Indexes for table `technical_schedule`
--
ALTER TABLE `technical_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technical_team`
--
ALTER TABLE `technical_team`
  ADD PRIMARY KEY (`t_tech_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`t_tr_id`);

--
-- Indexes for table `trainer_availability`
--
ALTER TABLE `trainer_availability`
  ADD PRIMARY KEY (`t_availability_id`),
  ADD KEY `ta1` (`t_course_id`),
  ADD KEY `ta2` (`t_trainer_id`);

--
-- Indexes for table `t_batches`
--
ALTER TABLE `t_batches`
  ADD PRIMARY KEY (`t_batch_id`),
  ADD KEY `tre` (`t_trainer_id`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekly_assesments`
--
ALTER TABLE `weekly_assesments`
  ADD KEY `stas1` (`t_asses_id`),
  ADD KEY `stas2` (`t_std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `t_ach_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_employee`
--
ALTER TABLE `add_employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `t_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `assesments`
--
ALTER TABLE `assesments`
  MODIFY `t_asses_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `t_attd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `t_Center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `center_facilities`
--
ALTER TABLE `center_facilities`
  MODIFY `t_facility_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `t_cf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `com_tieup`
--
ALTER TABLE `com_tieup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `t_course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses_enq`
--
ALTER TABLE `courses_enq`
  MODIFY `t_enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `course_materials`
--
ALTER TABLE `course_materials`
  MODIFY `t_material_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `t_dept_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_sign_up`
--
ALTER TABLE `employee_sign_up`
  MODIFY `t_employe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `employer_signup`
--
ALTER TABLE `employer_signup`
  MODIFY `t_emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `t_enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `t_er_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `t_gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hmenq`
--
ALTER TABLE `hmenq`
  MODIFY `t_enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `intern_projects`
--
ALTER TABLE `intern_projects`
  MODIFY `t_project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `t_app_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_responses`
--
ALTER TABLE `job_responses`
  MODIFY `t_response_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `t_mgmt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `management_schedule`
--
ALTER TABLE `management_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `management_team`
--
ALTER TABLE `management_team`
  MODIFY `t_mang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `t_payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placement_companies`
--
ALTER TABLE `placement_companies`
  MODIFY `t_company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placement_events`
--
ALTER TABLE `placement_events`
  MODIFY `t_event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placement_records`
--
ALTER TABLE `placement_records`
  MODIFY `t_record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `t_reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `t_report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `std_placed`
--
ALTER TABLE `std_placed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_jobs`
--
ALTER TABLE `student_jobs`
  MODIFY `t_job_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `t_st_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stud_feedback`
--
ALTER TABLE `stud_feedback`
  MODIFY `t_fb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_schedule`
--
ALTER TABLE `support_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_team`
--
ALTER TABLE `support_team`
  MODIFY `t_support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `technical_schedule`
--
ALTER TABLE `technical_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technical_team`
--
ALTER TABLE `technical_team`
  MODIFY `t_tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `t_tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trainer_availability`
--
ALTER TABLE `trainer_availability`
  MODIFY `t_availability_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_batches`
--
ALTER TABLE `t_batches`
  MODIFY `t_batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assesments`
--
ALTER TABLE `assesments`
  ADD CONSTRAINT `asses1` FOREIGN KEY (`t_course_id`) REFERENCES `courses` (`t_course_id`);

--
-- Constraints for table `center_courses`
--
ALTER TABLE `center_courses`
  ADD CONSTRAINT `cc1` FOREIGN KEY (`t_center_id`) REFERENCES `centers` (`t_Center_id`),
  ADD CONSTRAINT `cc2` FOREIGN KEY (`t_course_id`) REFERENCES `courses` (`t_course_id`);

--
-- Constraints for table `center_facilities`
--
ALTER TABLE `center_facilities`
  ADD CONSTRAINT `fac1` FOREIGN KEY (`t_center_id`) REFERENCES `centers` (`t_Center_id`);

--
-- Constraints for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD CONSTRAINT `cm1` FOREIGN KEY (`t_course_id`) REFERENCES `courses` (`t_course_id`);

--
-- Constraints for table `course_services`
--
ALTER TABLE `course_services`
  ADD CONSTRAINT `test4` FOREIGN KEY (`t_course_id`) REFERENCES `courses` (`t_course_id`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`t_std_id`) REFERENCES `student_login` (`t_st_id`),
  ADD CONSTRAINT `er1` FOREIGN KEY (`t_course_id`) REFERENCES `courses` (`t_course_id`);

--
-- Constraints for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD CONSTRAINT `ep1` FOREIGN KEY (`t_event_id`) REFERENCES `placement_events` (`t_event_id`),
  ADD CONSTRAINT `ep2` FOREIGN KEY (`t_std_id`) REFERENCES `student_login` (`t_st_id`);

--
-- Constraints for table `intern_projects`
--
ALTER TABLE `intern_projects`
  ADD CONSTRAINT `ip1` FOREIGN KEY (`t_trainer_id`) REFERENCES `trainers` (`t_Tr_id`),
  ADD CONSTRAINT `ip2` FOREIGN KEY (`t_stud_id`) REFERENCES `student_login` (`t_st_id`);

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `jb2` FOREIGN KEY (`t_st_id`) REFERENCES `student_login` (`t_st_id`);

--
-- Constraints for table `job_responses`
--
ALTER TABLE `job_responses`
  ADD CONSTRAINT `jr1` FOREIGN KEY (`t_std_id`) REFERENCES `student_login` (`t_st_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `pay1` FOREIGN KEY (`t_std_id`) REFERENCES `student_login` (`t_st_id`);

--
-- Constraints for table `placement_records`
--
ALTER TABLE `placement_records`
  ADD CONSTRAINT `pr1` FOREIGN KEY (`t_std_id`) REFERENCES `student_login` (`t_st_id`),
  ADD CONSTRAINT `pr2` FOREIGN KEY (`t_company_id`) REFERENCES `placement_companies` (`t_company_id`),
  ADD CONSTRAINT `pr3` FOREIGN KEY (`t_job_id`) REFERENCES `student_jobs` (`t_job_id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `rp1` FOREIGN KEY (`t_course_id`) REFERENCES `courses` (`t_course_id`),
  ADD CONSTRAINT `rp2` FOREIGN KEY (`t_std_id`) REFERENCES `reports` (`t_report_id`);

--
-- Constraints for table `student_certificates`
--
ALTER TABLE `student_certificates`
  ADD CONSTRAINT `scf1` FOREIGN KEY (`t_cf_id`) REFERENCES `certificates` (`t_cf_id`),
  ADD CONSTRAINT `sd2` FOREIGN KEY (`t_std_id`) REFERENCES `student_login` (`t_st_id`);

--
-- Constraints for table `student_jobs`
--
ALTER TABLE `student_jobs`
  ADD CONSTRAINT `jb` FOREIGN KEY (`t_company_id`) REFERENCES `placement_companies` (`t_company_id`);

--
-- Constraints for table `student_login`
--
ALTER TABLE `student_login`
  ADD CONSTRAINT `sl1` FOREIGN KEY (`t_reg_id`) REFERENCES `registration` (`t_reg_id`);

--
-- Constraints for table `stud_feedback`
--
ALTER TABLE `stud_feedback`
  ADD CONSTRAINT `fb1` FOREIGN KEY (`t_st_id`) REFERENCES `student_login` (`t_st_id`);

--
-- Constraints for table `trainer_availability`
--
ALTER TABLE `trainer_availability`
  ADD CONSTRAINT `ta1` FOREIGN KEY (`t_course_id`) REFERENCES `courses` (`t_course_id`),
  ADD CONSTRAINT `ta2` FOREIGN KEY (`t_trainer_id`) REFERENCES `trainers` (`t_Tr_id`);

--
-- Constraints for table `t_batches`
--
ALTER TABLE `t_batches`
  ADD CONSTRAINT `tre` FOREIGN KEY (`t_trainer_id`) REFERENCES `trainers` (`t_Tr_id`);

--
-- Constraints for table `weekly_assesments`
--
ALTER TABLE `weekly_assesments`
  ADD CONSTRAINT `stas1` FOREIGN KEY (`t_asses_id`) REFERENCES `assesments` (`t_asses_id`),
  ADD CONSTRAINT `stas2` FOREIGN KEY (`t_std_id`) REFERENCES `weekly_assesments` (`t_asses_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
