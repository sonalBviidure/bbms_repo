-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2024 at 11:48 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `t_admin_id` int(11) NOT NULL,
  `t_admin_nm` varchar(30) NOT NULL,
  `t_admin_email` varchar(30) NOT NULL,
  `t_admin_pwd` varchar(15) NOT NULL,
  `t_admin_ph_no` bigint(10) NOT NULL,
  `t_admin_gender` enum('male','female','other') NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`t_admin_id`, `t_admin_nm`, `t_admin_email`, `t_admin_pwd`, `t_admin_ph_no`, `t_admin_gender`, `enabled`) VALUES
(1, 'Admin', 'admin@gmail.com', 'adminghjd@849', 8578988486, 'male', 1),
(2, 'Kartiki', 'kartiki@gmail.com', 'Kartikib@05', 7588374116, 'male', 1),
(3, 'Vishal', 'vishal@gmail.com', 'Vishal@03', 9373807623, 'male', 1),
(4, 'Admin', 'admin@gmail.com', 'admin200', 7898588486, 'male', 1),
(5, 'Jaydeep', 'jaydeep@gmail.com', 'jay@03', 7584865985, 'male', 1),
(6, 'Jaydeep', 'jaydeep@gmail.com', 'jay@03', 7584865985, 'male', 1),
(7, 'yogi', 'yogi@gmail.com', 'sh@07', 1234567890, 'male', 1),
(8, 'Jaydya', 'jay@gmail.com', 'jay@10', 8574962551, 'male', 1),
(9, 'Kartiki', 'k@gmail.com', 'kar@08', 7588374116, 'male', 1),
(10, 'Nikita', 'n@gmail.com', 'n@123', 8888754896, 'male', 0);

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
  `t_Center_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`t_Center_id`, `t_Center_name`, `t_Location`, `t_Contact_person_nm`, `t_Contact_email`, `t_Contact_number`, `t_Center_img`) VALUES
(1, 'Tilak Road', 'Tilak road pune', 'Priyanka ', 'sanity@gmail.com', 9669633656, '1926481.png'),
(2, 'Tilak Road', 'Tilak road', 'Priyanka ', 'admin@gmail.com', 7896541235, '1926481.png'),
(3, 'Prime', 'kothrud', 'Priyanka', 'prime@gmail.com', 7898588486, 'photo-1533610067042-1cee3c403282.jpg'),
(4, 'Prime', 'kothrud', 'Priyanka', 'prime@gmail.com', 7898588486, 'photo-1533610067042-1cee3c403282.jpg'),
(5, 'Prime', 'Tilak Road', 'Priyanka', 'prime@gmail.com', 6587495211, 'center_upload/frontend.png');

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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `t_course_id` int(11) NOT NULL,
  `t_course_name` varchar(30) NOT NULL,
  `t_course_desc` varchar(50) NOT NULL,
  `t_course_duration` varchar(30) NOT NULL,
  `t_course_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `t_employe_dob` date NOT NULL,
  `t_employe_address` varchar(50) NOT NULL,
  `t_employe_city` varchar(15) NOT NULL,
  `t_employe_state` varchar(15) NOT NULL,
  `t_pincode` int(6) NOT NULL,
  `t_upload_id_prof` varchar(50) NOT NULL,
  `t_employe_resume` blob NOT NULL,
  `t_education_doc` blob NOT NULL,
  `t_profile_photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_sign_up`
--

INSERT INTO `employee_sign_up` (`t_employe_id`, `t_employe_nm`, `t_employe_email`, `employee_gender`, `t_employe_password`, `t_employe_contact`, `t_employe_dob`, `t_employe_address`, `t_employe_city`, `t_employe_state`, `t_pincode`, `t_upload_id_prof`, `t_employe_resume`, `t_education_doc`, `t_profile_photo`) VALUES
(1, 'kartiki', 'karu@gmail.com', 'male', 'kartiki@io89', 7584865928, '0000-00-00', 'Karve nagar', 'pune', 'Maharashtra', 431001, 'Aadhar card.pdf', 0x524553554d452e706466, 0x6365742073636f72652e706466, 0x313932363438312e706e67),
(2, 'kartiki', 'karu@gmail.com', 'male', 'karu@gmail.com', 7588374116, '0000-00-00', 'karve', 'pune', 'Maharashtra', 431002, 'Aadhar card.pdf', 0x524553554d452e706466, 0x4578616d207369676e2e706e67, 0x313932363438312e706e67);

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
  `t_emp_dob` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer_signup`
--

INSERT INTO `employer_signup` (`t_emp_id`, `t_company_nm`, `t_emp_name`, `t_emp_email`, `t_emp_gender`, `t_emp_contact`, `t_emp_address`, `t_emp_city`, `t_pincode`, `t_emp_current_post`, `t_password`, `t_emp_dob`) VALUES
(1, 'Tcs', 'Kartiki', 'karu@gmail.com', 'female', 7588374116, 'karve nagar', 'pune', 431002, 'manger', 'Kartiki@829j', '2024-04-01 00:00:00.000000'),
(2, 'TCS', 'Pavan', 'pavan@gmail.com', 'male', 7584865952, 'Karve', 'pune', 431002, 'Developer', 'pavan@00', '2024-04-04 00:00:00.000000'),
(3, 'Wipro', 'Abhishek', 'abhi@gmail.com', 'male', 7584865952, 'Vanaz', 'pune', 431002, 'Developer', 'abhi@gmail09', '2024-04-03 00:00:00.000000'),
(4, 'Infosys', 'Kartiki', 'kartiki@gmail.com', 'female', 7588374116, 'Karve nagar pune', 'pune', 411368, 'Developer', 'kartiki@03', '2024-04-12 00:00:00.000000');

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
  `event_name` varchar(20) NOT NULL,
  `event_image` blob NOT NULL,
  `event_contact` int(10) NOT NULL,
  `event_location` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `event_time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_name`, `event_image`, `event_contact`, `event_location`, `start_date`, `end_date`, `event_time`) VALUES
('Seminar on Python', 0x75706c6f61642f313932363438312e706e67, 2147483647, 'Tilak Road', '2024-04-12', '2024-04-14', '12:00:00.000000'),
('Bootcamp on Java', 0x75706c6f61642f3432373430382e6a7067, 2147483647, 'Kothrud', '2024-04-05', '2024-04-06', '13:30:00.000000'),
('Bootcamp on Java', 0x75706c6f61642f3432373430382e6a7067, 2147483647, 'Kothrud', '2024-04-05', '2024-04-06', '13:30:00.000000'),
('Java', 0x6576656e745f75706c6f61642f7363686f6f6c2d6769726c2d6c6f6f6b696e672d75702d61742d7468652d6e696768742d616e696d652d736b792d75646c756461686736716a6b396e71642e6a7067, 2147483647, 'Kothrud', '2024-04-05', '2024-04-07', '14:47:00.000000');

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
  `t_gallery_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`t_gallery_id`, `t_gallery_img`, `t_gallery_desc`) VALUES
(1, '', 'ewdsf'),
(2, '', 'ewdsf'),
(3, '', 'ewdsf'),
(4, '', 'ewdsf'),
(5, '', 'hfdjkldx'),
(6, '', 'hfdjkldx'),
(7, '', 'hfdjkldx'),
(8, '', 'hfdjkldx'),
(9, '', 'eydsjssai'),
(10, '', 'yfdshjn'),
(11, '', 'ydjskA.'),
(12, 'gallery_upload/', 'etbsdanaskrajdk'),
(13, 'gallery_upload/', 'jdjfkd'),
(14, 'gallery_upload/', 'duhhbymfhxisk');

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
  `t_stud_city` varchar(15) NOT NULL,
  `t_pincode` int(6) NOT NULL,
  `t_stud_state` varchar(15) NOT NULL,
  `t_clg_name` varchar(100) NOT NULL,
  `t_qualification` varchar(20) NOT NULL,
  `t_passout_year` year(4) NOT NULL,
  `t_cgpa` float NOT NULL,
  `t_upload_docs` blob NOT NULL,
  `t_university_nm` varchar(50) NOT NULL,
  `t_stud_profile` blob NOT NULL,
  `t_SSC_passout_yr` year(4) NOT NULL,
  `t_SSC_percent` float NOT NULL,
  `t_HSC_passout_yr` year(4) NOT NULL,
  `t_HSC_percent` float NOT NULL,
  `t_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`t_reg_id`, `t_stud_nm`, `t_stud_email`, `t_stud_contact`, `t_stud_DOB`, `t_stud_gender`, `t_stud_address`, `t_stud_city`, `t_pincode`, `t_stud_state`, `t_clg_name`, `t_qualification`, `t_passout_year`, `t_cgpa`, `t_upload_docs`, `t_university_nm`, `t_stud_profile`, `t_SSC_passout_yr`, `t_SSC_percent`, `t_HSC_passout_yr`, `t_HSC_percent`, `t_password`) VALUES
(1, 'Kartiki', 'kartiki@gmail.com', 7588374116, '2024-04-02 00:00:00.000000', 'female', 'Karve nagar', 'pune', 431001, 'Maharashtra', 'Orchid', 'Under Graduate', '2024', 7.9, 0x6d61726b73686565742066652e706466, 'Dbatu', 0x313932363438312e706e67, '2018', 82, '0000', 0, 'kartiki@05'),
(2, 'Vishal', 'vishal@gmail.com', 9373804523, '2024-04-03 00:00:00.000000', 'male', 'Upper depo', 'pune', 431001, 'Maharashtra', 'Orchid', 'Under Graduate', '2024', 7.9, 0x6d61726b73686565742066652e706466, 'Dbatu', 0x76697368616c312e706e67, '2018', 78, '0000', 0, 'vishal@03'),
(3, 'Vishal', 'vishal@gmail.com', 9373806523, '2024-04-02 00:00:00.000000', 'male', 'Upper depo', 'pune', 431001, 'Maharashtra', 'Orchid', 'Under Graduate', '2024', 7.9, 0x6d61726b73686565742066652e706466, 'Dbatu', 0x76697368616c312e706e67, '2018', 78, '2020', 62, 'vishal@03');

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
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `t_Tr_id` int(11) NOT NULL,
  `t_Tr_name` varchar(30) NOT NULL,
  `t_tr_gender` enum('male','female','other') NOT NULL,
  `T_tr_Specialization` text NOT NULL,
  `t_Tr_contact` bigint(10) NOT NULL,
  `t_Tr_email` varchar(30) NOT NULL,
  `T_tr_Experience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`t_Tr_id`, `t_Tr_name`, `t_tr_gender`, `T_tr_Specialization`, `t_Tr_contact`, `t_Tr_email`, `T_tr_Experience`) VALUES
(1, 'Kartiki', 'female', 'Python', 7588374116, 'kartiki@gmail.com', 1),
(2, 'Kartiki', 'female', 'Python', 7588374116, 'kartiki@gmail.com', 1),
(3, 'Yogesh', 'male', 'Java', 9790456525, 'Yogi@gmail.com', 1),
(4, 'Yogesh', 'male', 'Java', 9790456525, 'Yogi@gmail.com', 1),
(5, 'Yogesh', 'male', 'Java', 9790456525, 'Yogi@gmail.com', 1),
(6, 'Kartiki', 'female', 'Python', 8657488652, 'kartiki@gmail.com', 0),
(7, 'Yogesh', 'male', 'ww2w', 9584758625, 'yogesh@gmail.com', 9);

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
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`t_course_id`);

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
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`t_Tr_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `t_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `t_Center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `t_course_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `t_employe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employer_signup`
--
ALTER TABLE `employer_signup`
  MODIFY `t_emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `t_gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `t_reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `t_report_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `t_Tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
