-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 12:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u126463643_ltor_academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `about_us_text` text NOT NULL,
  `about_us_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about_us_text`, `about_us_image`) VALUES
(8, 'Welcome To LTOR Education, A Leading Professional Training Institute In Pune Since 2011. We Are Dedicated To Providing High-Quality Education And Skill Development Opportunities To Our Students. At LTOR, We Offer A Range Of Courses, Including Spoken English, Public Speaking, Study Skills, Business Skill Development, And Soft Skills Training. Our Experienced Instructors And Comprehensive Curriculum Ensure That Our Students Acquire The Knowledge And Skills Needed To Excel In Their Chosen Fields. <br>Our Commitment Extends Beyond The Classroom. We Actively Engage In Various Business Activities, Such As Training, Placement, Marketing, Business Meet-Ups, Exhibitions, And Seminars. Additionally, We Offer Franchise Opportunities For Those Interested In Partnering With Us To Spread Quality Education. Explore Our Website To Learn More About Our Courses, Events, Volunteer Opportunities, And How LTOR Can Contribute To Your Personal And Professional Growth.', 'image/aboutus.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `agreementdetails`
--

CREATE TABLE `agreementdetails` (
  `t_id` int(11) NOT NULL,
  `t_partyaname` varchar(255) NOT NULL,
  `t_partybname` varchar(255) NOT NULL,
  `t_agreementcopypdf` varchar(255) NOT NULL,
  `t_startdate` date NOT NULL,
  `t_enddate` date NOT NULL,
  `t_feeofjoining` varchar(30) NOT NULL,
  `t_revenueofA` varchar(10) NOT NULL,
  `t_revenueofB` varchar(10) NOT NULL,
  `t_renewaldate` date NOT NULL,
  `t_partybcontact` varchar(20) NOT NULL,
  `t_partybemail` varchar(255) NOT NULL,
  `t_partybphoto` varchar(255) NOT NULL,
  `t_franchiseid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agreementdetails`
--

INSERT INTO `agreementdetails` (`t_id`, `t_partyaname`, `t_partybname`, `t_agreementcopypdf`, `t_startdate`, `t_enddate`, `t_feeofjoining`, `t_revenueofA`, `t_revenueofB`, `t_renewaldate`, `t_partybcontact`, `t_partybemail`, `t_partybphoto`, `t_franchiseid`, `status`) VALUES
(222, 'Saurabha', 'Akshay', 'Akshay _Kamble (1).pdf', '2024-03-09', '2024-03-10', '85850', '78', '22', '2024-03-17', '9421057758', 'teju123@gmail.com', 'icon.jpeg', 101, 1),
(3232, 'Eknath khale', 'Akshay kamlbe', 'Akshay _Kamble (1).pdf', '2024-02-26', '2024-04-07', '6767676', '23', '67', '2024-03-01', '7447330324', 'khaleekanth@gmail.com', 'icon.jpeg', 101, 1);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `t_no` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_startingdate` date NOT NULL,
  `t_endingdate` date NOT NULL,
  `t_facultyname` varchar(255) NOT NULL,
  `t_duration` varchar(20) NOT NULL,
  `t_mode` varchar(20) NOT NULL,
  `t_capacity` int(11) NOT NULL,
  `t_franchiseid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`t_no`, `t_name`, `t_startingdate`, `t_endingdate`, `t_facultyname`, `t_duration`, `t_mode`, `t_capacity`, `t_franchiseid`, `status`) VALUES
(0, 'c12', '2024-09-23', '2024-11-12', 'pornima ', '3 Month', 'Offline', 70, 102, 1),
(10, 'HR ', '2024-09-23', '2024-09-24', 'ruhiii RAY khan', '4 Month', 'Online', 60, 103, 1),
(78, 'java 1', '2023-12-22', '2024-02-23', 'prajkta sans', '6 Month', 'Online', 20, 103, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_duration` varchar(20) NOT NULL,
  `t_member` int(11) NOT NULL,
  `t_image` varchar(255) NOT NULL,
  `t_syllabus` text NOT NULL,
  `t_mode` varchar(20) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`t_id`, `t_name`, `t_duration`, `t_member`, `t_image`, `t_syllabus`, `t_mode`, `status`) VALUES
(1, 'Spoken English', '1 Month', 20, 'spokenenglish.jpeg', 'syllabus/spoken english.pdf', 'offline', 1),
(22, 'Public Speaking', '1 Month', 26, 'publicspeaking.jpeg', 'syllabus/public speaking.pdf', 'online', 1),
(90, 'Time Management', '1 Month', 4, 'TimeManagement.jpeg', 'syllabus/time management.pdf', 'offline', 1),
(92, 'Good Relationship', '1 Month', 3, 'goodrelationship1.jpeg', 'syllabus/good relation .pdf', 'offline', 1),
(93, 'Personality Development', '1 Month', 3, 'personalitydevelopment.jpeg', 'syllabus/personality development.pdf', 'online', 1),
(94, 'Discipline', '1 Month', 3, 'discipline.jpeg', 'syllabus/discipline.pdf', 'online', 1),
(95, 'Study Skills', '1 Month', 5, 'studyskill.jpeg', 'syllabus/Study skills.pdf', 'offline', 1),
(101, 'Confidence Building', '1 Month', 8, 'confidencebuilding.jpeg', 'syllabus/confidence-building course.pdf', 'offline', 1),
(152, 'Success Key', '1 Month', 5, 'successkey.jpeg', 'syllabus/success skills.pdf', 'offline', 1),
(777, 'Leadership Quality', '1 Month', 2, 'leadershipquality.jpeg', 'syllabus/leadership development course.pdf', 'offline', 1),
(999, 'LR Brain', '1 Month', 8, 'LRBrain.jpg', 'syllabus/left and right brain development.pdf', 'offline', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_image1` varchar(255) DEFAULT NULL,
  `event_image2` varchar(255) DEFAULT NULL,
  `event_image3` varchar(255) DEFAULT NULL,
  `event_image4` varchar(255) DEFAULT NULL,
  `event_image5` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_date`, `event_location`, `event_image1`, `event_image2`, `event_image3`, `event_image4`, `event_image5`, `status`) VALUES
(1, 'Seminar', '2024-02-21', 'pune', 'uploads/65cf46dbc5a06_IMG-20240203-WA0011.jpg', 'uploads/65cf46dbc5a7d_IMG-20240203-WA0019.jpg', 'uploads/65cf46dbc5acc_IMG-20240203-WA0013.jpg', 'uploads/65cf46dbc5b19_IMG-20240111-WA0025.jpg', 'uploads/65cf46dbc5b64_IMG-20240203-WA0014.jpg', 1),
(2, 'joining ', '2023-12-22', 'Tilk road', 'image/testi1.jpg', 'image/testmio2.jpg', 'image/testi1.jpg', 'image/', 'image/', 0),
(3, 'seminar', '2024-02-27', 'tilk road', 'image/inter.jpg', 'image/inter6.jpg', 'image/', 'image/', 'image/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `facultyinfo`
--

CREATE TABLE `facultyinfo` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_gender` varchar(10) NOT NULL,
  `t_contact` varchar(20) NOT NULL,
  `t_dob` date NOT NULL,
  `t_experienceyear` varchar(20) NOT NULL,
  `t_skills1` varchar(255) NOT NULL,
  `t_skills2` varchar(255) NOT NULL,
  `t_skills3` varchar(255) NOT NULL,
  `t_achievement1` varchar(255) NOT NULL,
  `t_achievement2` varchar(255) NOT NULL,
  `t_achievement3` varchar(255) NOT NULL,
  `t_maximumstudent` int(11) NOT NULL,
  `t_education` varchar(255) NOT NULL,
  `t_qualification` varchar(255) NOT NULL,
  `t_franchiseid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facultyinfo`
--

INSERT INTO `facultyinfo` (`t_id`, `t_name`, `t_gender`, `t_contact`, `t_dob`, `t_experienceyear`, `t_skills1`, `t_skills2`, `t_skills3`, `t_achievement1`, `t_achievement2`, `t_achievement3`, `t_maximumstudent`, `t_education`, `t_qualification`, `t_franchiseid`, `status`) VALUES
(2, 'rudhr  jadhv', 'male', '6767676789', '2012-08-02', '6', 'java full stack', 'pthon', 'python', 'c1', 'c2', 'c3', 22, 'B.E', 'B.E (Computer Engg)', 103, 1),
(6, 'priya lokhnade', 'female', '7878787890', '2001-04-24', 'fresher', 'j', 'j1', 'j1', 'c1', 'c2', 'c3', 89, 'B.Ed.', 'B.A. (Bachelor of Arts)', 103, 1),
(29, 'gaurii', 'female', '8978789808', '2001-09-23', 'fresher', 'java', 'python', 'core java', 'bsc', 'bsc certificate', 'specification', 89, 'Other', 'Other', 103, 1),
(90, 'ruhiii chwala', 'female', '9878676521', '2003-09-22', 'fresher', 'c2', 'c3', 'c4', 'a1', 'a2', 'a3', 90, 'B.E', 'B.E (Computer Engg)', 101, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facultypayments`
--

CREATE TABLE `facultypayments` (
  `t_facultyid` int(11) DEFAULT NULL,
  `t_paymentid` int(11) NOT NULL,
  `t_workingdays` int(11) NOT NULL,
  `t_leaveallowed` int(11) NOT NULL,
  `t_absentday` int(11) NOT NULL,
  `t_paymentcutted` decimal(10,2) NOT NULL,
  `t_attendance` int(11) NOT NULL,
  `t_totalpayment` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `franchise`
--

CREATE TABLE `franchise` (
  `t_id` int(11) NOT NULL,
  `t_ownername` varchar(255) NOT NULL,
  `t_email` varchar(255) NOT NULL,
  `t_contact` varchar(20) NOT NULL,
  `t_image` varchar(225) NOT NULL,
  `t_frimname` varchar(255) NOT NULL,
  `t_state` varchar(255) NOT NULL,
  `t_district` varchar(255) NOT NULL,
  `t_taluka` varchar(255) NOT NULL,
  `t_location` varchar(255) NOT NULL,
  `t_pincode` varchar(10) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `franchise`
--

INSERT INTO `franchise` (`t_id`, `t_ownername`, `t_email`, `t_contact`, `t_image`, `t_frimname`, `t_state`, `t_district`, `t_taluka`, `t_location`, `t_pincode`, `status`) VALUES
(101, 'Priyanka mam', 'primestudystart@gmail.com', ' 9309907928', 'WhatsApp Image 2024-02-09 at 4.30.43 PM.jpeg', 'Prime Infotech solutions', 'Maharashtra', 'Pune', 'Haveli', 'Kothrud, Near Jai Bhawani', ' 411038', 1),
(102, 'Gaurav Sir', 'mytimestart@gmail.com', '9403090958 ', 'WhatsApp Image 2024-02-09 at 4.34.01 PM.jpeg', 'LTOR Academy', 'Maharashtra', 'Pune', 'Pune City', 'Madhav Heritage, Near Shakti Sports, Tilak Road', '411030', 1),
(103, 'Rohit Sir', 'demo@gmail.com', '9890117868', 'WhatsApp Image 2024-02-09 at 4.24.59 PM.jpeg', 'Dynamic Infotech Solutions', 'Maharashtra', 'Pune', 'Haveli', 'Near Ichapurti Ganapati, Backside of Bharati Vidyapeeth, Katraj ', '411043', 1),
(104, 'rudhr pawar', 'rudhr122@gmail.com', '9090898789', 'Screenshot (9).png', 'IT solution', 'Maharashtra', 'Latur', 'Nilanga', 'raygav', '411090', 0);

-- --------------------------------------------------------

--
-- Table structure for table `franchiseinfodetails`
--

CREATE TABLE `franchiseinfodetails` (
  `t_id` int(11) NOT NULL,
  `t_no` int(11) NOT NULL,
  `t_spaceinsqrft` int(11) NOT NULL,
  `t_staffno` int(11) NOT NULL,
  `t_business_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gallery_image` varchar(255) NOT NULL,
  `gallery_description` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_image`, `gallery_description`, `status`) VALUES
(1, 'image/IMG_20231019_180652_905.jpg', 'Session on study skills ', 1),
(3, 'image/IMG_20231019_180820_823.jpg', 'Offline session on public speaking ', 1),
(4, 'image/IMG_20231019_181938_920.jpg', 'Session on spoken English ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_countrycode` varchar(5) NOT NULL,
  `t_contact` varchar(20) NOT NULL,
  `t_email` varchar(255) NOT NULL,
  `t_country` varchar(30) NOT NULL,
  `t_state` varchar(255) NOT NULL,
  `t_district` varchar(255) NOT NULL,
  `t_subdistrict` varchar(255) NOT NULL,
  `t_taluka` varchar(255) NOT NULL,
  `t_pincode` varchar(10) NOT NULL,
  `t_inquirysubject` varchar(255) NOT NULL,
  `timestamp_column` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`t_id`, `t_name`, `t_countrycode`, `t_contact`, `t_email`, `t_country`, `t_state`, `t_district`, `t_subdistrict`, `t_taluka`, `t_pincode`, `t_inquirysubject`, `timestamp_column`) VALUES
(1, 'Ashwini waghmare', '91', '7447330324', 'teju1234@gmail.com', 'India', 'Meghalaya', 'South West Khasi Hills', 'Leshka', 'ghorpade peth', '898989', 'course inquiry', '2024-03-09 17:25:57'),
(2, 'tejuu', '91', '7447330324', 'teju1234@gmail.com', 'India', 'Maharashtra', 'Nagpur', 'Hingna', 'morwadii', '411789', 'franchises inquiry', '2024-03-11 05:54:33'),
(3, 'Hh', '91999', '999', 'mainltor@ltorhosting.com', 'India', 'Assam', 'Hailakandi', 'Lala', 'Gg', '६5555', 'Fra', '2024-03-13 17:24:03'),
(4, 'Yashwant Sudhakar Ingle', '91', '8888762408', 'yashwant.ingle218@viit.ac.in', 'India', 'Maharashtra', 'Buldhana', 'Buldana', 'Buldhana', '443001', 'All the best', '2024-03-13 17:48:19'),
(5, 'Pratiksha Patil', '91', '8010603155', 'pratikshatpatil2704@gmail.com', 'India', 'Maharashtra', 'Solapur', 'Madha', 'Kurduvadi', '413208', 'To Enhance my skills', '2024-03-13 18:04:48'),
(6, 'Gaurav Nawale', '91', '8788495214', 'gauravnawale.8788@gmail.com', 'India', 'Maharashtra', 'Nashik', 'Sinnar', 'Chincholi', '422102', ' Spoken English', '2024-03-13 18:11:10'),
(7, 'Onkar', '91', '7', 'onkarmarbe2003@gmail.com', 'India', 'Maharashtra', 'Solapur', 'Solapur South', 'Solapur', '413002', 'LTOR', '2024-03-13 18:19:04'),
(8, 'Nikhil Khilare ', '91', '8856005442', 'nikhilkhilare17@gmail.com', 'India', 'Maharashtra', 'Pune', 'Mulshi', 'Sathesai', '411038', 'Spoken English ', '2024-03-13 19:22:23'),
(9, 'Priyanka Khandagale', '91', '8080037506', 'khandagalepriyanka900@gmail.com', 'India', 'Maharashtra', 'Beed', 'Georai', 'Georai', '431127', 'Data science ', '2024-03-13 23:23:29'),
(10, 'Akanksha Rajendra Jadhav ', '91', '8010621390', 'akankshajadhav340@gmail.com', 'India', 'Maharashtra', 'Satara', 'Patan', 'Bambawade ', '415014', 'Online class ', '2024-03-14 02:10:35'),
(11, 'Priyanka lekurwale', '91969', '9699639293', 'lekurwale.priyanka2012@gmail.com', 'India', 'Maharashtra', 'Ahmednagar', 'Jamkhed', 'Halgaon ', '415615', 'Inquiry For franchise.', '2024-04-11 10:39:49'),
(12, 'Priyanka lekurwale', '91969', '0000000000', 'lekurwale.priyanka2012@gmail.com', 'India', 'Maharashtra', 'Pune', 'Haveli', 'Keshavnagar ', '411036', 'Inquiry for franchies.', '2024-04-11 10:42:19'),
(13, 'Daivshala pawar', '91', '8484936768', 'daivshalapawar10@gmail.com', 'India', 'Maharashtra', 'Satara', 'Satara', 'sataraa', '411046', 'java developer', '2024-06-08 05:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `education` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `skills` varchar(20) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `resume` varchar(1000) NOT NULL,
  `application_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_application`
--

INSERT INTO `job_application` (`id`, `name`, `contact`, `dob`, `education`, `college`, `experience`, `skills`, `qualification`, `position`, `resume`, `application_datetime`) VALUES
(1, 'Eknath', '9090909090', '2024-03-03', 'be', 'exdrgvh', '566565', 'dtfgvh', 'rftgyh', 'tfghj', '7142f015-3fc6-4f48-84a7-f9d5ab61582e.jpeg', '2024-03-09 10:22:33'),
(2, 'Tejasvi Mandhare', '7447330324', '2024-03-22', 'B.E', 'UNIVERASAL COLLEGE SASEWADI PUNE', 'FRESHER', 'JAVA', 'B.E', 'SOFTWARE ENGG', 'tejasvi Rajendra  mandhare.pdf', '2024-03-09 17:27:04'),
(3, 'Ashwini waghmare', '9876453201', '2001-09-20', 'B.E COMPUTER', 'UNIVERASAL COLLEGE SASEWADI PUNE', 'FRESHER', 'JAVA', 'B.E', 'SOFTWARE ENGG', 'tejasvi Rajendra  mandhare.pdf', '2024-03-11 07:43:26'),
(4, 'Baman ', '91727277378', '2024-07-24', 'Ysus', 'UUs', 'Usu', 'Yzus', 'Jsus', 'Hsjss', 'a.php', '2024-07-24 04:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancies`
--

CREATE TABLE `job_vacancies` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `skills_required` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `late_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_vacancies`
--

INSERT INTO `job_vacancies` (`id`, `job_title`, `skills_required`, `location`, `salary`, `late_date`, `status`) VALUES
(4, 'Digital Marketing', 'Social media marketing', 'Tilak Road', '8k', '2024-03-31', 1),
(5, 'Event management trainee', 'Communication skills and event management', 'Tilk road, Pune ', '10k', '2024-09-14', 1),
(6, 'Online classes Marketing', 'communication skill and marketing of classes\r\n', 'Pune', ', 15k', '2024-09-28', 1),
(7, 'Spoken English teachers', 'Experience in spoke English teaching ', 'Pune', '10k', '2024-04-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `l_email` varchar(255) DEFAULT NULL,
  `l_phone` varchar(255) DEFAULT NULL,
  `l_state` varchar(255) DEFAULT NULL,
  `l_district` varchar(255) DEFAULT NULL,
  `l_subdistrict` varchar(255) DEFAULT NULL,
  `l_pincode` varchar(255) DEFAULT NULL,
  `l_message` text DEFAULT NULL,
  `l_timestamp_column` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`l_id`, `l_name`, `l_email`, `l_phone`, `l_state`, `l_district`, `l_subdistrict`, `l_pincode`, `l_message`, `l_timestamp_column`) VALUES
(1, 'Eknath', 'test@gmail.com', '8765432276', NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:00:12'),
(2, 'Akshay Kamble', 'abhijeet@gmail.com', '8765432276', NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:10:18'),
(3, 'akash', 'test@gmail.com', '8765432276', NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:11:18'),
(4, 'neha123', 'khaleeknath@gmail.com', '8765432276', NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:12:10'),
(5, 'Jaydeep', 'admin@gmail.com', '8765432276', NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:13:31'),
(6, 'Jaydeep', 'test@gmail.com', '9881291065', NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:14:13'),
(7, 'Jaydeep', 'abhijeet@gmail.com', '8765432276', NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:15:19'),
(8, 'iuygd', 'jaydeep123@gamil.com', '8765432276', NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:16:04'),
(9, 'akash', 'jaydeep123@gamil.com', '8765432276', NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:16:53'),
(10, 'Eknath', 'test@gmail.com', '9881291065', NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:17:20'),
(11, 'akash', 'abhijeet@gmail.com', '7898456512', NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:17:58'),
(12, 'akash123456', 'khaleeknath@gmail.com', '9881291065', NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:27:05'),
(13, 'Gaurav Nawale', 'gauravnawale.8788@gmail.com', '8788495214', 'Maharashtra', 'Nashik', 'Sinnar', '422102', 'Entrepreneurship training enquiry', '2024-03-09 10:40:12'),
(14, 'Sarth sheth', 'sarthsheth17@gmail.com', '+91 7420082272', 'Maharashtra', 'Pune', 'Pune City', '411009', 'I am sarth sheth', '2024-03-09 11:58:26'),
(15, 'Karan Ananta Tonde', 'karantonde007@gmail.com', '7498784583', 'Maharashtra', 'Pune', 'Pune City', '411038', 'Spoken English Course ', '2024-03-09 13:28:23'),
(16, 'Gitesh kharat', 'kharatgitesh430@gmail.com', '07620424514', 'Maharashtra', 'Pune', 'Haveli', '411023', 'mobile application course ', '2024-03-09 13:29:10'),
(17, 'Akanksha Rajendra Jadhav', 'akankshajadhav340@gmail.com', '8010621390', 'Maharashtra', 'Pune', 'Pune City', '411038', 'mobile application', '2024-03-09 13:30:00'),
(18, 'Yashraj Malhari Ghaytadak', 'ghaytadakyashraj@gmail.com', '09730691509', 'Maharashtra', 'Pune', 'Pune City', '411046', 'Spoken English', '2024-03-09 13:30:36'),
(19, 'ABHIJEET JAGTAP', 'jagtapabhijit185@gmail.com', '8530189694', 'Maharashtra', 'Pune', 'Haveli', '411058', 'spoken english\r\n', '2024-03-09 14:15:33'),
(20, 'RAJVARDHAN PRAMOD NAIK', 'rajpnaik3@gmail.com', '7517357000', NULL, NULL, NULL, NULL, NULL, '2024-03-09 14:18:40'),
(21, 'RAJVARDHAN PRAMOD NAIK', 'rajpnaik3@gmail.com', '7517357000', NULL, NULL, NULL, NULL, NULL, '2024-03-09 14:23:05'),
(22, 'Ashwini waghmare', 'ashwini@gmail.com', '9090909090', NULL, NULL, NULL, NULL, NULL, '2024-03-09 17:25:01'),
(23, 'Saurabh Kolekar', 'saurabhkolekar54@gmail.com', '8788169810', 'Maharashtra', 'Solapur', 'Malshiras', '413101', 'I want to joine', '2024-03-10 04:39:10'),
(24, 'Eknath khale', 'khale@gmail.com', '9658471296', 'Maharashtra', 'Chandrapur', 'Korpana', '345788', 'Join java', '2024-03-10 15:56:24'),
(25, 'Ashwini waghmare', 'rani@gmail.com', '7447330324', NULL, NULL, NULL, NULL, NULL, '2024-03-11 05:51:26'),
(26, 'rupali', 'sai123@gmail.com', '8734678902', NULL, NULL, NULL, NULL, NULL, '2024-03-11 05:52:07'),
(27, 'riyash', 'riyash12@gmail.com', '6767676789', NULL, NULL, NULL, NULL, NULL, '2024-03-11 05:52:32'),
(28, 'abhishek', 'p@gmail.com', '8087629442', NULL, NULL, NULL, NULL, NULL, '2024-03-11 06:45:11'),
(29, 'Omkar Ashok Salvi', 'omkarsalvi309@gmail.com', '8767151309', 'Maharashtra', 'Pune', 'Haveli', '411038', 'Spoken English ', '2024-03-12 06:29:43'),
(30, 'Samruddhi Shinde', 'samruddhishinde2702@gmail.com', '7796252066', 'Maharashtra', 'Pune', 'Haveli', '411038', 'Spoken English', '2024-03-12 06:29:44'),
(31, 'Shubham Bharat Mane', 'shubhammane2292@gmail.com', '9529952292', 'Maharashtra', 'Pune', 'Daund', '413802', 'Spoken English', '2024-03-12 06:30:23'),
(32, 'Maheshwari Thorat', 'mahithorat96@gmail.com', '9270038574', 'Maharashtra', 'Sangli', '', '416313', 'Spoken English ', '2024-03-12 06:30:53'),
(33, 'Sandip Sarjerao Patil', 'patilsandip1879@gmail.com', '8010080165', 'Maharashtra', 'Sangli', 'Shirala', '415410', 'Spoken English ', '2024-03-12 06:35:40'),
(34, 'Pankaj Mahaev Mohie', 'pankajmohite13@gmail.com', '08956264841', 'Maharashtra', 'Sangli', 'Kadegaon', '415303', 'Spoken English ', '2024-03-12 06:41:05'),
(35, 'Nikhil Khilare ', 'nikhilkhilare17@gmail.com', '8856005442', 'Maharashtra', 'Pune', 'Haveli', '411038', 'Spoken English ', '2024-03-12 07:06:03'),
(36, 'Prathmesh Dhokale', 'prathmeshdhokale87@gmail.com', '8999554580', 'Maharashtra', 'Pune', 'Haveli', '411038', 'Spoken English ', '2024-03-12 07:06:13'),
(37, 'Reshma Arjun Dhadake', 'dhadakereshma@gmail.com', '9307054950', 'Maharashtra', 'Solapur', 'Akkalkot', '413216', '.', '2024-03-12 08:04:15'),
(38, 'Kartiki Badagu', 'badagukartiki@gmail.com', '123211', 'Maharashtra', 'Solapur', 'Solapur North', '413006', 'Spoken English', '2024-03-12 08:07:02'),
(39, 'Yogesh Shinde', 'xyz@gmail.com', '9096791898', 'Maharashtra', 'Solapur', 'Mohol', '413216', 'I want enquiry about digital marketing.', '2024-03-12 08:07:29'),
(40, 'Vishal Bhutada', 'vishalbhutada.s5@gmail.com', '9373807623', 'Maharashtra', 'Solapur', 'Akkalkot', '413002', 'Spoken English', '2024-03-12 08:07:52'),
(41, 'GORE AKASH', 'gore19912@gmail.com', '7709969163', 'Maharashtra', 'Osmanabad', 'Osmanabad', '413501', 'Spoken English ', '2024-03-12 08:07:56'),
(42, 'Nandini Shradhanand Swami', 'nandiniswami93@gmail.com', '7499213181', 'Maharashtra', 'Osmanabad', 'Osmanabad', '413602', 'Spoken English', '2024-03-12 08:08:47'),
(43, 'Pooja gajanan bhise', 'Poojabhise273@gmail.com', '9156716162', 'Maharashtra', 'Pune', '', '411037', 'Spoken English ', '2024-03-12 08:40:04'),
(44, 'Amogh Tambe', 'tambeamogh84@gmail.com', '9527528970', 'Maharashtra', 'Pune', 'Pune City', '411038', 'sopken english', '2024-03-12 14:02:20'),
(45, 'Fhh', 'surajbagal22@gmail.com', '9152689005', NULL, NULL, NULL, NULL, NULL, '2024-04-10 16:06:37'),
(46, 'Shubham', 'abc@gmail.com', '9865321245', NULL, NULL, NULL, NULL, NULL, '2024-04-10 16:06:47'),
(47, '६४४६७७४३५७८', 'hdfhgh@gmail.com', '2876698726', NULL, NULL, NULL, NULL, NULL, '2024-04-10 16:07:15'),
(48, 'Dhgd', 'duurryi2@gmail.com', '9088624335', NULL, NULL, NULL, NULL, NULL, '2024-04-10 16:07:40'),
(49, 'TobiasBop', 'no.reply.Lars-GoranVisser@gmail.com', '85537781234', 'TamilNadu', '', '', '122411', 'Greetings! ltortraining.com \r\n \r\nDid you know that it is possible to send appeal lawfully and legitimately? We provide a new method of sending commercial offers through contact forms. \r\nYou don’t need to be concerned that Contact Form messages will end up in spam, since they’re seen as important. \r\nWe are inviting you to take advantage of our service without any charge. \r\nOn your behalf, we can send up to 50,000 messages. \r\n \r\nThe cost of sending one million messages is $59. \r\n \r\nThis offer is automatically generated. \r\nPlease use the contact details below to get in touch with us. \r\n \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nSkype  live:feedbackform2019 \r\nWhatsApp  +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\n \r\nWe only use chat for communication.', '2024-04-23 20:57:12'),
(50, 'TobiasBop', 'no.reply.JacquesSmit@gmail.com', '83287993427', 'MadhyaPradesh', '', '', '124432', 'What’s up? ltortraining.com \r\n \r\nDid you know that it is possible to send business proposals completely legal? We suggest a legal method of sending appeals through contact forms. \r\nMessages sent via Feedback Forms are not regarded as spam, since they are thought of as important. \r\nWe offer you the chance to try out our service for free. \r\nWe can transmit up to 50,000 messages in your behalf. \r\n \r\nThe cost of sending one million messages is $59. \r\n \r\nThis message was automatically generated. \r\nPlease use the contact details below to get in touch with us. \r\n \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nSkype  live:feedbackform2019 \r\nWhatsApp  +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\n \r\nWe only use chat for communication.', '2024-05-01 00:18:45'),
(51, 'Mike Becker\r\n', 'mikeMupt@gmail.com', '83815773473', 'Jharkhand', '', '', '121241', 'Hi \r\n \r\nThis is Mike Becker\r\n \r\nLet me show you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nThe new Semrush Backlinks, which will make your ltortraining.com SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nCheap and effective \r\n \r\nTry it anytime soon \r\n \r\nRegards \r\nMike Becker\r\n \r\nmike@strictlydigital.net', '2024-05-10 06:07:29'),
(52, 'Mike Haig\r\n', 'mikeeverbamn@gmail.com', '89817846549', 'Maharashtra', '', '', '124223', 'This service is perfect for boosting your local business\' visibility on the map in a specific location. \r\n \r\nWe provide Google Maps listing management, optimization, and promotion services that cover everything needed to rank in the Google 3-Pack. \r\n \r\nMore info: \r\nhttps://www.speed-seo.net/ranking-in-the-maps-means-sales/ \r\n \r\n \r\nThanks and Regards \r\nMike Haig\r\n \r\n \r\nPS: Want a ONE-TIME comprehensive local plan that covers everything? \r\nhttps://www.speed-seo.net/product/local-seo-bundle/', '2024-05-15 02:02:02'),
(53, 'Michael Yoshioka', 'crypto.adviser00004@gmail.com', '81411525561', 'Nagaland', '', '', '151113', 'Hallo, ich bin Michael Y. von Crypto Adviser LTD. Hier ist eine Wallet und Debitkarte für Kryptowährungen. \r\n \r\nRedotPay WALLET: \r\nRedotPay bietet in Partnerschaft mit Binance eine Krypto-Wallet und VISA-Debitkarte. Bezahlen Sie direkt mit Krypto. Beantragen Sie die Karte über die Wallet-App. \r\n \r\nWallet-Gebühr: Kostenlos \r\nKartengebühr: Virtuelle VISA $5 / Physische VISA $100 \r\nURL: https://redotpay.cards/register/ \r\nOCTPASS WALLET: \r\nDie JDB Bank in Laos arbeitet mit der \"Octopus\" Wallet zusammen. Beantragen Sie eine VISA-Debitkarte, heben Sie Bargeld ab und tätigen Sie internationale Überweisungen. \r\n \r\nWallet-Gebühr: Kostenlos \r\nBankkontogebühr: $800 ($300 Kaution) \r\nURL: JDB Bank](https://laos-bank.jp/en/ \r\nVerwenden Sie diese Karten weltweit bei VISA-Akzeptanzstellen. Erhalten Sie ein Affiliate-Konto über die oben genannten URLs. \r\n \r\nAffiliate-Belohnungen: Bis zu $40/Karte + bis zu 0,25% Gebühr für RedotPay und bis zu $150/Karte für JDB Bank. \r\nBei Fragen kontaktieren Sie uns: \r\n \r\nE-Mail: info@crypto-adviser.co \r\n \r\n \r\nCrypto Adviser LTD \r\nMichael Yoshioka \r\nE-Mail: info@crypto-adviser.co', '2024-05-18 13:08:19'),
(54, 'Mike Enderson\r\n', 'mikeMupt@gmail.com', '87224243134', 'Meghalaya', '', '', '143324', 'Hi there \r\n \r\nJust checked your ltortraining.com baclink profile, I noticed a moderate percentage of toxic links pointing to your website \r\n \r\nWe will investigate each link for its toxicity and perform a professional clean up for you free of charge. \r\n \r\nStart recovering your ranks today: \r\nhttps://www.hilkom-digital.de/professional-linksprofile-clean-up-service/ \r\n \r\nRegards \r\nMike Enderson\r\nHilkom Digital SEO Experts \r\nhttps://www.hilkom-digital.de/', '2024-05-26 20:06:01'),
(55, 'Mike King\r\n', 'mikeSulpara@gmail.com', '84792795156', 'Meghalaya', '', '', '152152', 'Hi there, \r\n \r\nI have reviewed your domain in MOZ and have observed that you may benefit from an increase in authority. \r\n \r\nOur solution guarantees you a high-quality domain authority score within a period of three months. This will increase your organic visibility and strengthen your website authority, thus making it stronger against Google updates. \r\n \r\nCheck out our deals for more details. \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\nNEW: Ahrefs Domain Rating \r\nhttps://www.monkeydigital.co/ahrefs-seo/ \r\n \r\nGet back to us by replying with a SMS, or by Whatsapp or on our website. We can offer you great deals and guaranteed services. \r\n \r\n \r\nThanks and regards \r\nMike King\r\n \r\nMonkey Digital \r\nWhatsapp: https://wa.link/8lvv0o', '2024-05-28 09:32:19'),
(56, 'Julia Schneider', 'wmgirl75@yahoo.com', '85815174551', 'Mizoram', '', '', '154323', 'Du hast auch einen Impfschaden oder Nebenwirkungen nach der Corona-Impfung? \r\n \r\nIch leite dir diese Nachricht vom Verein BÜRGERSCHUTZ weiter, weil ich gehört habe, dass du und einige deiner Freunde Impfnebenwirkungen habt oder befürchtet, welche zu bekommen. Als Geimpfte könnten wir jetzt 6.000 € Schadenersatz vom Impfarzt erhalten. \r\n \r\nDer Verein Bürgerschutz, Österreichs größter „Impfopfer-Verein“, unterstützt dich bei Impfschäden nach deiner mRNA-Behandlung oder IMPFAUSLEITUNG. \r\n \r\nZusätzlich erhalten alle Mitglieder vom https://www.buergerschutz.org kostenlos eine Anleitung zur Impfausleitung. \r\n \r\nLeite diese Nachricht weiter, um den Druck auf die Impfärzte und die Regierung zu erhöhen. \r\n \r\nLG \r\nJulia \r\n \r\n \r\nPartnerprogramm Wohncontainer \r\nhttps://skycontainer.at/', '2024-05-29 20:09:26'),
(57, 'Mike Blare\r\n', 'mikeornari@gmail.com', '82444491786', 'AndamanNicobar', '', '', '112123', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.monkey-digital.com/affiliates/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Blare\r\n \r\nMonkey Digital', '2024-05-30 13:29:14'),
(58, 'Mike Dutton\r\n', 'peterornari@gmail.com', '88818618311', 'TamilNadu', '', '', '144442', 'Hi \r\n \r\nI have just took an in depth look on your  ltortraining.com for the ranking keywords and saw that your website could use a push. \r\n \r\nWe will enhance your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://digitalx.press/unbeatable-seo/ \r\nWhatsapp us: https://wa.link/fqchim \r\n \r\nRegards \r\nMike Dutton\r\n \r\nDigital X SEO Experts', '2024-05-30 21:28:31'),
(59, 'Divya', 'divyadate1@gmail.com', '87545698', NULL, NULL, NULL, NULL, NULL, '2024-05-31 06:58:06'),
(60, 'Julia Schneider', 'wmgirl75@yahoo.com', '85653839137', 'HimachalPradesh', '', '', '134545', 'Dein Weg zu Eigentum und WERTANLAGEN ab nur 1.500 €/m² - Entdecke die Möglichkeiten auf https://skycontainer.at! \r\n \r\nDie Wohnungsnot eskaliert, und Immobilien sind heute unverzichtbar. Ein eigenes Zuhause, eine lohnende Investition oder ein modernes Büro – all das ist dringender denn je. Was, wenn all das erschwinglich, flexibel und nachhaltig sein könnte? Unsere Container-Häuser ab 1.500 €/m² bieten diese Rettung. Die Vermietung verspricht zudem hervorragende Geschäftschancen mit hohen Renditen. In Zeiten, in denen Geld auf der Bank rapide an Wert verliert und Banken immer unsicherer werden, ist eine Investition in Immobilien die einzig sichere Entscheidung. Handle jetzt, bevor es zu spät ist! \r\n \r\n5 Schritte zu deinem NEUEN HAUS oder deiner WERTANLAGE: \r\n \r\nKAUFEN ALS EIGENHEIM: \r\nEin individuelles, modernes Zuhause, das perfekt zu deinem Lebensstil passt. \r\n \r\nKAUF ALS WERTANLAGE: \r\nEine Investition in die Zukunft, die sowohl Wertstabilität als auch Wertsteigerungspotenzial bietet. \r\n \r\nVERMIETEN ÜBER AIRBNB: \r\nNutze die Möglichkeit, durch Kurzzeitvermietungen attraktive Renditen zu erzielen und ein lukratives Geschäft aufzubauen. (ca. 1.500 € monatliche Einnahmen) \r\n \r\nFÜR DAUERMIETER: \r\nEine sichere Einkommensquelle durch langfristige Vermietungen. \r\n \r\nKAUF FÜR EIN NEUES BÜRO: \r\nGestalte ein kreatives und flexibles Arbeitsumfeld, das deine Produktivität steigert. \r\n \r\nFür detaillierte Informationen, BILDER UND PREISE besuche die Webseite unseres Herstellers: https://skycontainer.at \r\n \r\nErlebe die Vielfalt unserer Modelle und lass dich von inspirierenden Videos auf unseren Social-Media-Kanälen begeistern: \r\n \r\nINSTAGRAM: https://www.instagram.com/skycontainer_container_home/ \r\n \r\nTIKTOK: https://www.tiktok.com/@skycontainer.at \r\n \r\nFACEBOOK: https://www.facebook.com/skycontainer.at \r\n \r\nDEIN DIY-PROJEKT: \r\nMit den Plänen unserer beliebtesten Modelle kannst du deinen Design-Wohncontainer in jeder Größe selbst Stück für Stück aufbauen und gestalten. \r\n \r\nVerpasse nicht die Chance, deinen Traum zu verwirklichen und zugleich eine kluge Investition zu tätigen. Entdecke die Möglichkeiten mit SkyContainer. \r\n \r\nMit einem Klick zu deinem neuen Zuhause oder deiner Wertanlage!', '2024-06-05 08:28:34'),
(61, 'Mike Owen\r\n', 'mikeMupt@gmail.com', '83937531325', 'Uttarakhand', '', '', '155332', 'Greetings \r\n \r\nThis is Mike Owen\r\n \r\nLet me introduce to you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nThe new Semrush Backlinks, which will make your ltortraining.com SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictlydigital.co/semrush-backlinks/ \r\n \r\nCheap and effective \r\nTry it anytime soon \r\n \r\nRegards \r\nMike Owen\r\n https://www.strictlydigital.co/whatsapp-us/', '2024-06-08 13:38:49'),
(62, 'Mike Larkins\r\n', 'mikeeverbamn@gmail.com', '87235615939', 'Uttarakhand', '', '', '151122', 'This service is perfect for boosting your local business\' visibility on the map in a specific location. \r\n \r\nWe provide Google Maps listing management, optimization, and promotion services that cover everything needed to rank in the Google 3-Pack. \r\n \r\nMore info: \r\nhttps://www.speed-seo.co/ranking-in-the-maps-means-sales/ \r\n \r\nThanks and Regards \r\nMike Larkins\r\n \r\nhttps://www.speed-seo.co/whatsapp-us/', '2024-06-12 10:21:46'),
(63, 'EBRAHIM BIN MOHAMED', 'intl.law7@aol.com', '83769594348', 'ArunachalPradesh', '', '', '132123', 'Salaam Sir, \r\n \r\nHow are you doing? Are you an entrepreneur/business owner or chief executive officer seeking capital for your business growth or expansion? \r\n \r\nI am contacting you to know if you are open to investors into your company as we are currently providing financial support to companies and individuals for business and project expansion. \r\n \r\nWe also pay success fee commission to individuals who direct clients to us for financing. \r\n \r\nWe. will be willing to partner with you for your business growth. \r\n \r\nReply for further discussions if interested with your business plan or executive summary and Whats App number for an introductory call. \r\n \r\nPlease use the following email to reach me, projectoffice@intltrinvestment.com \r\n \r\nIgnore if not interested. \r\n \r\nAllah Bless, \r\nEBRAHIM BIN MOHAMED \r\nprojectoffice@intltrinvestment.com \r\nInternational Trading & Investment Co', '2024-06-16 20:25:29'),
(64, 'Mike Oliver\r\n', 'mikeornari@gmail.com', '89765673255', 'Assam', '', '', '144115', 'Hi there, \r\n \r\nJust checked your ltortraining.com backlink profile and found a moderate percentage of toxic links pointing to your website. \r\n \r\nBad links happen, and when they do, they put your site at risk. With our free links clean up service, you can take control of your backlink profile through unnatural backlink removal and avoid painful penalties. \r\n \r\nStart recovering your ranks today: \r\nhttps://www.freeseocleanup.com/ \r\n \r\nRegards \r\nMike Oliver\r\n SEO Expert', '2024-06-17 12:36:18'),
(65, 'Mike Bishop\r\n', 'peterornari@gmail.com', '86117163929', 'JammuKashmir', '', '', '142132', 'Howdy \r\n \r\nI have just took a look on your SEO for  ltortraining.com for the ranking keywords and saw that your website could use a push. \r\n \r\nWe will improve your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digital-x-press.co/unbeatable-seo/ \r\n \r\nRegards \r\nMike Bishop\r\n \r\nDigital X SEO Experts \r\nhttps://www.digital-x-press.co/whatsapp-us/', '2024-06-24 13:38:06'),
(66, 'Mike Miln\r\n', 'mikeLaubs@gmail.com', '85255117712', 'JammuKashmir', '', '', '115511', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.monkeydigital.co/join-affiliates/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Miln\r\n \r\nMonkey Digital \r\nhttps://www.monkeydigital.co/whatsapp-affiliates/', '2024-06-24 19:46:44'),
(67, 'Mike MacDonald\r\n', 'mikeornari@gmail.com', '81487318122', 'Jharkhand', '', '', '124213', 'Hi there, \r\n \r\nI have reviewed your domain in MOZ and have observed that you may benefit from an increase in authority. \r\n \r\nOur solution guarantees you a high-quality domain authority score within a period of three months. This will increase your organic visibility and strengthen your website authority, thus making it stronger against Google updates. \r\n \r\nCheck out our deals for more details. \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\n \r\nThanks and regards \r\nMike MacDonald\r\n \r\nMonkey Digital \r\nhttps://www.monkeydigital.co/whatsapp-us/', '2024-06-25 08:16:30'),
(68, 'Pranav kale ', 'pranavkale2878@gmail.com', '7083823382', NULL, NULL, NULL, NULL, NULL, '2024-06-27 03:40:08'),
(69, 'Mike Babcock\r\n', 'mikeLaubs@gmail.com', '86476883955', 'Rajasthan', '', '', '111455', 'Good Day \r\n \r\nThis is Mike Babcock\r\n \r\nLet me introduce to you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nThe new Semrush Backlinks, which will make your ltortraining.com SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictly-seo.com/semrush-backlinks/ \r\n \r\nCheap and effective \r\nTry it anytime soon \r\n \r\nRegards \r\nMike Babcock\r\n https://www.strictly-seo.com/whatsapp-us/', '2024-07-02 14:56:50'),
(70, 'Amandagrardy2', 'amandainjund3@gmail.com', '81118152563', 'WestBengal', '', '', '122541', 'Hey darling, want to hang out? -  http://surl.li/ulebc?Agibiab', '2024-07-08 12:13:26'),
(71, 'Amandagrardy2', 'amandainjund2@gmail.com', '84524289264', 'Meghalaya', '', '', '151251', 'Hey darling, want to hang out? -  http://surl.li/ulebc?Agibiab', '2024-07-11 00:59:31'),
(72, 'Amandagrardya', 'amandainjundc@gmail.com', '81314117186', 'Sehore', '', '', '135514', 'Hey darling, want to hang out? -  https://is.gd/2xVU7z?Agibiab', '2024-07-13 00:27:00'),
(73, 'Joshuagox', 'no.reply.ArneRouxson@gmail.com', '88891472459', 'WestBengal', '', '', '132553', 'Salutations! \r\n \r\nDid you know that it is possible to send a proposal legally and ethically? We are proposing a new, lawful method of submitting appeals through feedback forms. \r\nMessages from Feedback Forms are not classified as spam due to the fact that they are considered important. \r\nWe offer you to try our service for free. \r\nWe guarantee you up to 50,000 messages. \r\n \r\nThe cost of sending one million messages is $59. \r\n \r\nThis offer is automatically generated. \r\nPlease use the contact details below to get in touch with us. \r\n \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nSkype  live:feedbackform2019 \r\nWhatsApp  +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\n \r\nWe only use chat for communication.', '2024-07-13 09:15:54'),
(74, 'Amandagrardya', 'amandainjund2@gmail.com', '81364859191', 'Goa', '', '', '125351', 'Hey darling, want to hang out? -  https://is.gd/2xVU7z?Agibiab', '2024-07-14 22:55:14'),
(75, 'David Colebatch', 'brianna.colebatch@yahoo.com', '', 'Manipur', '', '', '3243', 'Hello,\r\n\r\nSecuring the necessary funding to fuel growth and bring ideas to life is one of the most significant challenges for startups and established businesses. At our company, we specialize in providing customized financing solutions for both startups and existing enterprises. \r\n\r\nWe offer debt financing with a competitive interest rate designed to support capital growth without placing undue burden on business owners.\r\n\r\nOur loan interest rate is set at an advantageous 3% annually, with no early repayment penalties, offering you the flexibility to manage your finances smoothly. \r\nFor those interested in equity financing, our venture capital funding option provides the capital needed for expansion. By offering a modest 10% equity stake, you can access essential resources to scale your business while retaining control and ownership. \r\n\r\nWe understand these challenges and are dedicated to offering startups flexible financing options tailored to their specific needs.\r\n\r\nWe would be delighted to review your pitch deck or executive summary to better understand your business. \r\nThis will help us determine the best possible investment structure, which we can then discuss in detail.\r\n\r\nI look forward to further communication.\r\n\r\nBest regards,\r\nOman Rook\r\nExecutive Investment Consultant/Director\r\nCateus Investment Company (CIC)\r\n2401 AlMoayyed Tower, Seef District Manama,\r\nKingdom of Bahrain\r\n\r\nPhone: +973-17-585338\r\nEmail: oman.rook@cateusgroup.org, cateusgroup@gmail.com\r\nWebsite: https://cateusinvestmentgroup.com', '2024-07-15 12:32:22'),
(76, 'Mike Nelson\r\n', 'mikeornari@gmail.com', '84348591462', 'Nagaland', '', '', '142114', 'Hi there, \r\n \r\nWhile checking your ltortraining.com for its ranks, I have noticed that there are some toxic links pointing towards it. \r\n \r\nGrab your free clean up and improve ranks in no time \r\nhttps://www.hilkom-digital.de/professional-linksprofile-clean-up-service/ \r\n \r\nIt really works, get a free backlinks clean up with us today \r\n \r\n \r\nRegards \r\nMike Nelson\r\n \r\nWhatsapp: https://www.hilkom-digital.de/whatsapp-us/', '2024-07-16 01:12:52'),
(77, 'Bella Pope', 'bella.pope@outlook.com', '0363 0292462', 'Puducherry', '', '', '70010', 'If you are reading this message, That means my marketing is working. I can make your ad message reach 5 million sites in the same manner for just $50. It\'s the most affordable way to market your business or services. Contact me by email virgo.t3@gmail.com or skype me at live:.cid.dbb061d1dcb9127a\r\n\r\nP.S: Speical Offer - Only for 2 days - 10 Million Sites for the same money $50', '2024-07-16 13:41:10'),
(78, 'Amandagrardya', 'amandainjundb@gmail.com', '84636599283', 'Nagaland', '', '', '151314', 'Hey darling, want to hang out? -  http://surl.li/ulebc?Agibiab', '2024-07-16 22:58:57'),
(79, 'Vida Surratt', 'vida.surratt@gmail.com', '(48) 8544-3710', 'Gujarat', '', '', '88062-422', 'We are thrilled to introduce you to Minew, a leading provider of cutting-edge IoT hardware. At Minew, we excel in designing, developing, and delivering top-quality IoT devices that incorporate the latest technologies such as Bluetooth®LE, LoRa, LTE-M, NB-IoT, Wi-Fi, UWB, 4G, 5G, and more.\r\n\r\nOur extensive product line includes BLE sensors, personnel tags, asset trackers, Bluetooth® beacons, IoT gateways, and an array of upcoming innovations. These devices are designed to meet the needs of virtually any commercial and industrial setting.\r\n\r\nBeyond our exceptional hardware, we offer comprehensive customization services, including product engineering, rapid prototyping, flexible manufacturing, and regulatory compliance. Our commitment to quality and customer satisfaction sets us apart from other IoT manufacturers.\r\n\r\nFor more details about our products and services, please visit our website at www.minew.com. If you have any questions or need personalized support, don\'t hesitate to reach out to us at info@minew.com.\r\n\r\nWe look forward to the opportunity to work with you.', '2024-07-17 14:59:29'),
(80, 'Amandagrardy3', 'amandainjundb@gmail.com', '88466381384', 'Lakshadweep', '', '', '153121', 'Hey darling, want to hang out? -  https://rb.gy/7rnhss?gemsQuig', '2024-07-17 17:58:42'),
(81, 'Amandagrardya', 'amandainjunda@gmail.com', '89198583615', 'Odisha', '', '', '144542', 'Hey darling, want to hang out? -  https://rb.gy/7rnhss?gemsQuig', '2024-07-19 21:42:27'),
(82, 'Amandagrardy3', 'amandainjundb@gmail.com', '88831525337', 'Delhi', '', '', '121133', 'Hey darling, want to hang out? -  https://is.gd/2xVU7z?Agibiab', '2024-07-20 10:21:39'),
(83, 'Dorthea Ertel', 'dorthea.ertel@msn.com', '0475 16 24 31', 'Assam', '', '', '9520', 'Work From Home With This 100% FREE Training..., I Promise...You Will Never Look Back\r\n$500+ per day, TRUE -100% Free Training, go here:\r\n\r\nezwayto1000aday.com', '2024-07-20 16:54:46'),
(84, 'Amandagrardy1', 'amandainjundb@gmail.com', '86372689864', 'Uttarakhand', '', '', '151253', 'Hey darling, want to hang out? -  https://rb.gy/7rnhss?gemsQuig', '2024-07-21 07:29:14'),
(85, 'Mike Aldridge\r\n', 'peterornari@gmail.com', '82534621343', 'Tripura', '', '', '123442', 'Hello \r\n \r\nI have just checked  ltortraining.com for its SEO Trend and saw that your website could use an upgrade. \r\n \r\nWe will increase your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digitalxpresscom.net/monthly-seo/ \r\n \r\nRegards \r\nMike Aldridge\r\n \r\nDigital X SEO Experts \r\nhttps://www.digitalxpresscom.net/whatsapp-us/', '2024-07-22 18:20:27'),
(86, 'Amandagrardy1', 'amandainjund1@gmail.com', '82988394869', 'Assam', '', '', '155342', 'Can’t wait to show you a good time tonight. -  https://goo.su/zARWg?Agibiab', '2024-07-22 23:09:10'),
(87, 'Amandagrardy3', 'amandainjundc@gmail.com', '89542442623', 'HimachalPradesh', '', '', '154435', 'Can’t wait to show you a good time tonight. -  https://rb.gy/7rnhss?gemsQuig', '2024-07-23 19:28:06'),
(88, 'Mike Roberts\r\n', 'mikeornari@gmail.com', '82831791594', 'Assam', '', '', '144411', 'Hello, \r\n \r\nHey, I\'m Mike from Monkey Digital. We offer a highly popular service that costs only 10$ per 5000 social ads visits. \r\n \r\nMore info:  \r\nhttps://www.monkeyseo.net/get-started/ \r\n \r\nTracking will be sent the same day, the advertisement goes live within a few hours, effective and cheap marketing, try it out, it will be worth every penny. \r\n \r\nRegards \r\nMonkey Digital \r\nhttps://www.monkeyseo.net/whatsapp-us/', '2024-07-24 13:07:14'),
(89, 'Amandagrardy2', 'amandainjund2@gmail.com', '86661338442', 'Sikkim', '', '', '131534', 'I’ve been naughty, want to help me with that?) -  https://rb.gy/7rnhss?gemsQuig', '2024-07-25 01:31:03'),
(90, 'Mike Walker\r\n', 'mikeLaubs@gmail.com', '85649115493', 'Punjab', '', '', '113553', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.monkeyseo.net/JOIN-AFFILIATES/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Walker\r\n \r\nMonkey Digital \r\nhttps://www.monkeyseo.net/whatsapp-affiliates/', '2024-07-25 03:47:09'),
(91, 'Amandagrardyc', 'amandainjunda@gmail.com', '85388653744', 'Rajasthan', '', '', '144145', 'Can’t wait to show you a good time tonight. -  https://goo.su/zARWg?Agibiab', '2024-07-26 21:58:21'),
(92, 'Amandagrardya', 'amandainjundc@gmail.com', '87252735437', 'Uttarakhand', '', '', '112131', 'I’ve been naughty, want to help me with that?) -  https://rb.gy/7rnhss?gemsQuig', '2024-07-27 21:45:52'),
(93, 'Amandagrardyb', 'amandainjunda@gmail.com', '89938362121', 'Gujarat', '', '', '125114', 'Can’t wait to show you a good time tonight. -  https://rb.gy/7rnhss?gemsQuig', '2024-07-30 04:20:39'),
(94, 'Amandagrardy3', 'amandainjunda@gmail.com', '84214262278', 'AndamanNicobar', '', '', '142241', 'I’ve been naughty, want to help me with that?) -  https://rb.gy/7rnhss?gemsQuig', '2024-07-31 15:35:51'),
(95, 'Spring Finance LTD', 'harissalome37@gmail.com', '83891759377', 'Sehore', '', '', '144315', 'Hi, \r\n \r\nIs your company looking for short-term or long-term finance or debt consolidation? Our company offers finance with reasonable interest rates as low as 2.5% on the loan-to-value ratio. Contact us now via email at loan@cgcredits.com or WhatsApp  +44 7404911756 for  more information. Our commitment to solving financial problems is our utmost priority. \r\n \r\nThank you, \r\nSpring Finance LTD', '2024-07-31 16:04:38'),
(96, 'Mike Little\r\n', 'mikeLaubs@gmail.com', '86935998722', 'Kerala', '', '', '125314', 'Hello \r\nThis is Mike Little\r\nfrom Strictly Digital \r\n \r\nLet me present to you our latest discovered from the SEO environment. \r\nWe have noticed that getting backlinks from websites that have high SEO metrics values doesn\'t always help, and in fact, what is more important is to have backlinks from sites that are actually ranking for many keywords. \r\n \r\nThus, we have built this service especially to meet these new discoveries and the results are astonishing. \r\n \r\nPlease check more details here: \r\nhttps://www.strictly-digital.net/semrush-backlinks/ \r\n \r\n \r\n \r\nRegards, \r\nStrictly Digital SEO Team \r\n \r\nWhatsapp us for more details: \r\nhttps://www.strictly-digital.net/whatsapp-us/', '2024-08-03 23:12:50'),
(97, 'Mike Bawerman\r\n', 'mikeornari@gmail.com', '88311629367', 'Haryana', '', '', '124351', 'Hi there \r\nI just checked ltortraining.com ranks and am sorry to bring this up, but it lacks in many areas. \r\n \r\nUnfortunately, building a bunch of links won\'t solve the issue in this case, and a more comprehensive strategy is required. Google has undergone significant changes over the past year, making it nearly impossible to compete for favorable rankings without a well-designed website. \r\n \r\nWe recommend a search engine-friendly website layout to resolve all issues and propel your site to the top. \r\n \r\nYou can check more details here:https://www.speed-seo.org/web-design/ \r\n \r\nThanks for your consideration \r\nMike Bawerman\r\nSpeed Designs \r\nhttps://www.speed-seo.org/whatsapp-us/', '2024-08-09 20:30:36'),
(98, 'armidacacukipodema+8ubkvd6d6ukq@gmail.com', 'armidacacukipodema+8ubkvd6d6ukq@gmail.com', 'armidacacukipodema+8ubkvd6d6ukq@gmail.com', 'Puducherry', 'Select District', 'Select Sub District', 'armidacacukipodema+8ubkvd6d6ukq@gmail.com', 'magnam iure laborum quasi provident facilis dolor consequatur explicabo expedita aut provident eum a aut. voluptate blanditiis libero omnis nihil nemo assumenda rerum eveniet deserunt natus unde qui a', '2024-08-10 20:30:55'),
(99, 'Mike Fitzgerald\r\n', 'mikeornari@gmail.com', '82142646113', 'Punjab', '', '', '142353', 'Hi there, \r\n \r\nWhile checking your ltortraining.com for its ranks, I have noticed that there are some toxic links pointing towards it. \r\n \r\nGrab your free clean up and improve ranks in no time \r\nhttps://www.freeseocleanups.com/get-started/ \r\n \r\nIt really works, get a free backlinks clean up with us today \r\n \r\n \r\nRegards \r\nMike Fitzgerald\r\n \r\nWhatsapp:https://www.freeseocleanups.com/whatapp-us/', '2024-08-18 05:34:20'),
(100, 'Amandagrardyc', 'amandainjund1@gmail.com', '81185877749', 'DamanDiu', '', '', '152342', 'Can’t wait to show you a good time tonight. -  https://rb.gy/7rnhss?gemsQuig', '2024-08-19 04:35:00'),
(101, 'Amandagrardyb', 'amandainjunda@gmail.com', '88611257266', 'Meghalaya', '', '', '154325', 'I’ve been naughty, want to help me with that?) -  https://goo.su/zARWg?Agibiab', '2024-08-20 06:04:11'),
(102, 'Amandagrardyc', 'amandainjundc@gmail.com', '84329595716', 'Goa', '', '', '141245', 'I’ve been naughty, want to help me with that?) -  https://rb.gy/7rnhss?gemsQuig', '2024-08-21 10:52:44'),
(103, 'Mike Fraser\r\n', 'peterornari@gmail.com', '86168391411', 'ArunachalPradesh', '', '', '144353', 'Greetings \r\n \r\nI have just verified your SEO on  ltortraining.com for  the current search visibility and saw that your website could use a push. \r\n \r\nWe will enhance your ranks organically and safely, using only state of the art AI and whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nMore info: \r\nhttps://www.digitalxpresscom.net/monthly-seo/ \r\n \r\nRegards \r\nMike Fraser\r\n \r\nDigital X SEO Experts \r\nhttps://www.digitalxpresscom.net/whatsapp-us/', '2024-08-21 18:25:10'),
(104, 'Mike Oliver\r\n', 'mikeornari@gmail.com', '85613369524', 'Sehore', '', '', '132222', 'Hello, \r\n \r\nHey, I\'m Mike from Monkey Digital. We offer a highly popular service that costs only 10$ per 5000 social ads visits. \r\n \r\nMore info:  \r\nhttps://www.monkeyseo.net/get-started/ \r\n \r\nTracking will be sent the same day, the advertisement goes live within a few hours, effective and cheap marketing, try it out, it will be worth every penny. \r\n \r\nRegards \r\nMonkey Digital \r\nhttps://www.monkeyseo.net/whatsapp-us/', '2024-08-22 06:47:50'),
(105, 'Amandagrardy1', 'amandainjundc@gmail.com', '88456337632', 'HimachalPradesh', '', '', '133534', 'Can’t wait to show you a good time tonight. -  https://goo.su/zARWg?Agibiab', '2024-08-22 22:25:18'),
(106, 'Amandagrardyb', 'amandainjundb@gmail.com', '84511527943', 'Gujarat', '', '', '135434', 'Can’t wait to show you a good time tonight. -  https://goo.su/zARWg?Agibiab', '2024-08-24 04:43:42'),
(107, 'Amandagrardy2', 'amandainjundc@gmail.com', '86876551525', 'Puducherry', '', '', '153452', 'I’ve been naughty, want to help me with that?) -  https://goo.su/zARWg?Agibiab', '2024-08-25 22:05:30'),
(108, 'Amandagrardya', 'amandainjund1@gmail.com', '84159149815', 'Rajasthan', '', '', '112444', 'I’ve been naughty, want to help me with that?) -  https://goo.su/zARWg?Agibiab', '2024-08-27 06:43:44'),
(109, 'Amandagrardy3', 'amandainjundc@gmail.com', '84959179977', 'MadhyaPradesh', '', '', '114525', 'Can’t wait to show you a good time tonight. -  https://goo.su/zARWg?Agibiab', '2024-08-28 08:59:25'),
(110, 'Amandagrardy1', 'amandainjund3@gmail.com', '83877646171', 'Sikkim', '', '', '145133', 'Want to see more? Check my profile now. -  https://goo.su/zARWg?Agibiab', '2024-08-29 07:55:31'),
(111, 'Amandagrardya', 'amandainjundc@gmail.com', '81249329989', 'Bihar', '', '', '134311', 'Want to see more? Check my profile now. -  https://rb.gy/7rnhss?gemsQuig', '2024-08-31 06:00:47'),
(112, 'Amandagrardy2', 'amandainjundc@gmail.com', '88683525811', 'Mizoram', '', '', '145351', 'Explore my profile, let’s make it unforgettable. -  https://rb.gy/7rnhss?gemsQuig', '2024-08-31 14:02:31'),
(113, 'Amandagrardy2', 'amandainjund1@gmail.com', '83794669374', 'Meghalaya', '', '', '113124', 'Want to see more? Check my profile now. -  https://goo.su/zARWg?Agibiab', '2024-09-01 17:48:24'),
(114, 'Amandagrardyb', 'amandainjundc@gmail.com', '89338124873', 'JammuKashmir', '', '', '155513', 'Explore my profile, let’s make it unforgettable. -  https://goo.su/zARWg?Agibiab', '2024-09-02 18:00:27'),
(115, 'Amandagrardyb', 'amandainjund3@gmail.com', '84319272688', 'Haryana', '', '', '123214', 'Want to see more? Check my profile now. -  https://rb.gy/7rnhss?gemsQuig', '2024-09-04 04:45:07'),
(116, 'Adam', 'fredrikalfredsson76@gmail.com', '83464972839', 'Lakshadweep', '', '', '115313', 'Hello, \r\n \r\nAdam here from Deletify (https://deletify.com/) \r\n \r\nI\'m wondering if your business has a review on Google that you perceive as misleading, false, or perhaps even written by a competitor? If so, I can help you remove it, and you only pay if I succeed. My teams success rate is over 99%, and it takes us less than a week to get it removed. \r\n \r\nInterested? \r\n \r\nIf you prefer to call me, you can reach me at +1 917 720 3356. My Whatsapp number is +46 72-4473401 (you can also call me at that number too), or you can book a quick videocall at https://calendly.com/aw--u2_r/15min', '2024-09-05 15:18:12'),
(117, 'Mike Stevenson\r\n', 'mikeornari@gmail.com', '89611924168', 'Lakshadweep', '', '', '135224', 'Hi there \r\nI just checked ltortraining.com ranks and am sorry to bring this up, but it lacks in many areas. \r\n \r\nUnfortunately, building a bunch of links won\'t solve the issue in this case, and a more comprehensive strategy is required. Google has undergone significant changes over the past year, making it nearly impossible to compete for favorable rankings without a well-designed website. \r\n \r\nWe recommend a search engine-friendly website layout to resolve all issues and propel your site to the top. \r\n \r\nYou can check more details here:https://www.seo-speed.net/seo-friendly-webdesign/ \r\n \r\nThanks for your consideration \r\nMike Stevenson\r\nSpeed Designs \r\nhttps://www.seo-speed.net/whatapp-us/', '2024-09-06 08:07:51'),
(118, 'Amandagrardy2', 'amandainjundb@gmail.com', '88665823947', 'Nagaland', '', '', '131345', 'Want to see more? Check my profile now. -  https://rb.gy/7rnhss?gemsQuig', '2024-09-06 16:49:55'),
(119, 'Amandagrardy1', 'amandainjund3@gmail.com', '84397966589', 'Punjab', '', '', '144552', 'Explore my profile, let’s make it unforgettable. -  https://rb.gy/7rnhss?gemsQuig', '2024-09-07 13:44:22'),
(120, 'Mike Edwards\r\n', 'szombo@mail.mil\r\n', '81667262825', 'Haryana', '', '', '141534', 'Hi there, \r\n \r\nWhile checking your ltortraining.com for its ranks, I have noticed that there are some toxic links pointing towards it. \r\n \r\nGrab your free clean up and improve ranks in no time \r\nhttps://www.hilkomseo.com/free-cleanup/ \r\n \r\nIt really works, get a free backlinks clean up with us today \r\n \r\n \r\nRegards \r\nMike Edwards\r\n \r\nWhatsapp:https://www.hilkomseo.com/whatsapp-us/', '2024-09-09 21:16:50'),
(121, 'Amandagrardy3', 'amandainjundc@gmail.com', '87441461377', 'Tripura', '', '', '154514', 'Want to see more? Check my profile now. -  https://goo.su/zARWg?Agibiab', '2024-09-10 10:05:21'),
(122, 'Amandagrardya', 'amandainjund2@gmail.com', '84254345231', 'AndamanNicobar', '', '', '123424', 'Explore my profile, let’s make it unforgettable. -  https://rb.gy/7rnhss?gemsQuig', '2024-09-11 15:08:55'),
(123, 'Amandagrardy3', 'amandainjund2@gmail.com', '81118114673', 'MadhyaPradesh', '', '', '154253', 'Explore my profile, let’s make it unforgettable. -  https://goo.su/zARWg?Agibiab', '2024-09-13 02:12:05'),
(124, 'Amandagrardy3', 'amandainjundc@gmail.com', '88888625221', 'Maharashtra', '', '', '114253', 'Want to see more? Check my profile now. -  https://rb.gy/7rnhss?gemsQuig', '2024-09-14 02:48:51'),
(125, 'Amandagrardy2', 'amandainjund3@gmail.com', '87544218563', 'Delhi', '', '', '135143', 'Explore my profile, let’s make it unforgettable. -  https://rb.gy/7rnhss?gemsQuig', '2024-09-14 19:23:46'),
(126, 'Akshay Kamble', 'mainltor@ltorhosting.com', '7898789878', 'Mizoram', 'Saiha', 'Saiha', '411029', 'wdwdwd', '2024-09-16 11:24:29'),
(127, 'Akshay Kamble', 'admin@gmail.com', '7898789878', 'Kerala', 'Thiruvananthapuram', '', '411029', 'eeee', '2024-09-16 11:33:39'),
(128, 'hello ', 'ak234@gmail.com', '4516486454', 'Goa', 'North Goa', 'Bardez', '411029', 'aaaaaaaaaaaaaaa', '2024-09-16 11:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'neha@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `t_id` int(11) NOT NULL,
  `t_first_name` varchar(255) NOT NULL,
  `t_middle_name` varchar(100) NOT NULL,
  `t_last_name` varchar(100) NOT NULL,
  `t_contact` varchar(20) NOT NULL,
  `t_emailid` varchar(255) NOT NULL,
  `t_password` varchar(255) NOT NULL,
  `t_state` varchar(255) NOT NULL,
  `t_district` varchar(255) NOT NULL,
  `t_subdistrict` varchar(255) NOT NULL,
  `t_village` varchar(10) NOT NULL,
  `t_pincode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`t_id`, `t_first_name`, `t_middle_name`, `t_last_name`, `t_contact`, `t_emailid`, `t_password`, `t_state`, `t_district`, `t_subdistrict`, `t_village`, `t_pincode`) VALUES
(1, 'Neha', 'Pratap', 'Jadhav', '9421057751', 'nehajadhav0412@gmail.com', '123456789', 'Maharashtra', 'Chandrapur', 'Korpana', 'dhankwadi', '411043'),
(3, 'Gayatri', 'Chandrakant', 'Chavan', '9022816303', 'gayatric814@gmail.com', 'Gayatri@9916', 'Maharashtra', 'Solapur', 'Malshiras', 'Akluj', '413112'),
(4, 'Sachin', 'H', 'Jadhav', '9309907928', 'primestudystart@gmail.com', 'admin123', 'Maharashtra', 'Latur', 'Jalkot', 'Latur', '411038'),
(5, 'tejasvi', 'rajendra', 'mandhare', '9878676521', 'teju1234@gmail.com', 'teju1234', 'Maharashtra', 'Solapur', 'Sangole', 'bhivdii', '411090'),
(6, 'Pratibha ', 'Prabhu ', 'Panchal', '9156012281', 'pratibhapanchal081@gmail.com', 'Pratibha@1234', 'Maharashtra', 'Pune', '', 'Theur', '412110'),
(7, 'Gayatri', 'Chandrakant', 'Chavan', '9022816303', 'gayatric814@gmail.com', 'GAyatri@9916', 'Maharashtra', 'Solapur', 'Malshiras', 'Akluj', '411013'),
(8, 'tejasvi', 'rajendra', 'mandhare', '9878676521', 'teju1234@gmail.com', 'teju1234', 'Maharashtra', 'Jalgaon', 'Pachora', 'bhivdii', '411090'),
(9, 'Ajinkya', 'Bandu', 'jagtap', '7030202410', 'jagtapajinkya2001@gmail.com', '703020', 'Maharashtra', 'Pune', 'Haveli', 'Warje', '411058'),
(10, 'Ajinkya', 'Bandu', 'jagtap', '7030202410', 'jagtapajinkya2001@gmail.com', '703020', 'Maharashtra', 'Pune', 'Haveli', 'Warje', '411058'),
(11, 'tejasvi', 'rajendra', 'mandhare', '9878676521', 'teju1234@gmail.com', 'ketu1234', 'Maharashtra', 'Kolhapur', 'Panhala', 'pachwad', '411090'),
(12, 'Balu', 'S', 'Dawakar', '9309907928', 'mainltor@ltorhosting.com', 'abcd1235', 'Maharashtra', 'Thane', 'Thane', 'Railway st', '400080'),
(13, 'Sharvari ', 'Vijay ', 'Shelke ', '9762579479', 'chikushelke666@gmail.com', 'Sharushelke101', 'Maharashtra', 'Pune', 'Haveli', 'New Sanghv', '411061'),
(14, 'Sharvari ', 'Vijay ', 'Shelke ', '9762579479', 'chikushelke666@gmail.com', 'Sharushelke101', 'Maharashtra', 'Pune', 'Haveli', 'New Sanghv', '411061'),
(15, 'ABHISHEK', 'SANJAY', 'PUJARI', '8087629442', 'pujaria458@gmail.com', 'Abhi@12', 'Maharashtra', 'Osmanabad', 'Tuljapur', 'Tuljapur', '413601'),
(16, 'ABHISHEK', 'SANJAY', 'PUJARI', '8087629442', 'pujaria458@gmail.com', 'Abhi@12', 'Maharashtra', 'Osmanabad', 'Tuljapur', 'Tuljapur', '413601'),
(17, 'Pratibha ', 'Prabhu ', 'Panchal', '9156012281', 'pratibhapanchal081@gmail.com', 'Pass@1234', 'Maharashtra', 'Pune', 'Haveli', 'Theur', '412110'),
(18, 'Pratibha ', 'Prabhu ', 'Panchal', '9156012281', 'pratibhapanchal081@gmail.com', 'Pass@1234', 'Maharashtra', 'Pune', 'Haveli', 'Theur', '412110'),
(19, 'aaaa', 'eeee', 'cddd', '232322323', 'sk123@gmail.com', '22', 'Meghalaya', 'East Garo Hills', 'Samanda', '22', '333333'),
(20, 'Abhishek', 'SANJAY', 'PUJARI', '8087629442', 'pujaria458@gmail.com', '12344321', 'Maharashtra', 'Osmanabad', 'Tuljapur', 'Tuljapur', '413601'),
(21, 'Abhishek', 'SANJAY', 'PUJARI', '8087629442', 'pujaria458@gmail.com', '12344321', 'Maharashtra', '', '', 'Tuljapur', '413601'),
(22, 'ABHISHEK', 'SANJAY', 'PUJARI', '8087629442', 'pujaria458@gmail.com', '12344321', 'Maharashtra', 'Hingoli', 'Basmath', 'Tuljapur', '413601'),
(23, 'Shivratna ', 'Raju', 'Dhoble ', '7972704288', 'Shivratnadhoble9@gmail.com', 'pass@123', 'Maharashtra', 'Beed', 'Ashti', 'Kada', '414202'),
(24, 'SHARVARI ', 'VIJAY', 'SHELKE ', '9762579479', 'chikushelke666@gmail.com', 'Sppupune@99', 'Maharashtra', 'Pune', 'Haveli', 'New Sanghv', '411061'),
(25, 'Kk', 'Mm', 'Hh', '9309907928', 'mainlror@ltorhosting.com', 'pass123', 'Maharashtra', 'Beed', 'Ashti', 'Kada', '400080'),
(26, 'Balukk', 'Hgg', 'Kkk', '9999999999', 'abc@gmail.com', 'abc123', 'Maharashtra', 'Beed', 'Bid', 'Kada', '555555'),
(27, 'Balukk', 'Hgg', 'Kkk', '9999999999', 'abc@gmail.com', 'abc123', 'Maharashtra', 'Beed', 'Bid', 'Kada', '555555'),
(28, 'ketaki', 'rajendra', 'mandhare', '7575764768', 'teju1234@gmail.com', 'ketu1234', 'Maharashtra', 'Kolhapur', 'Hatkanangle', 'povai naka', '7878767'),
(29, 'tejasvi', 'rajendra', 'mandhare', '9878676521', 'teju1234@gmail.com', 'kety1234', 'Maharashtra', 'Kolhapur', 'Panhala', 'hh', '411090'),
(30, 'omkar ', 'Prabhu ', 'Panchal', '91560122222222', 'admin@gmail.com', 'Pass@1234', 'Maharashtra', 'Pune', 'Haveli', 'Theur', '411225'),
(31, 'Hshe', '', 'Hdhd', '67046464846464218181', 'surajbagal22@gmail.com', 'hsjjs', 'Chhattisgarh', 'Gariaband', '', 'Jshsh', 'G'),
(32, 'Pratibha ', 'Prabhu ', 'Panchal', '9156012281', 'faculty@gmail.com', '1234', 'Maharashtra', 'Pune', 'Haveli', 'Theur', '412110'),
(33, 'Priyanka ', 'Maruti ', 'Lekurwale ', '+919699639293', 'lekurwale.priyanka2012@gmail.com', 'Prity@12345', 'Maharashtra', 'Ahmednagar', 'Jamkhed', 'Halgaon ', '415615'),
(34, 'Pratiksha ', 'Shahaji ', 'Ingale ', '7038088397', 'ingalepratiksha845@gmail.com', 'pr@tu5', 'Maharashtra', 'Pune', 'Haveli', 'Pune', '411036'),
(35, ' Hrushali ', 'Uttam ', 'Patil', '6284466549', 'hrushalipatil2002@gmail.com', 'Hrush', 'Maharashtra', 'Pune', 'Haveli', 'Keshavnaga', '411036'),
(36, 'Nandini netaji panchal', 'Netaji ', 'Panchal ', '+919699639293', 'lekurwale.priyanka2012@gmail.com', 'Nandini@5', 'Maharashtra', 'Pune', 'Haveli', 'Keshavnaga', '411036'),
(37, 'Vrushali', 'Ashok', 'Sontle', '8010910463', 'dadusontle@gamli.com', '123456789', 'Maharashtra', 'Pune', 'Pune City', 'Lakshmi to', '412307'),
(38, 'Omeshwari ', 'Sudesh ', 'Gaikwad ', '7378839969', 'omeshwarigaikwad1203@gmail.com', '1211203', 'Maharashtra', 'Pune', 'Haveli', 'Keshavnaga', '411036'),
(39, 'Omeshwari ', 'Sudesh ', 'Gaikwad ', '7378839969', 'omeshwarigaikwad1203@gmail.com', '1211203', 'Maharashtra', 'Pune', 'Haveli', 'Keshavnaga', '411036'),
(40, 'Sakshi ', 'Nagesh', 'Sonawane ', '91195610015', 'sonavanesonali51@gmail.com', 'sakshi@911', 'Maharashtra', 'Pune', 'Haveli', 'Mundhawa ', '411036'),
(41, 'Namrata ', 'Balaji ', 'Sarne', '9022742423', 'sarnenamrata10@gamil.com', 'namrataaaa', 'Maharashtra', 'Pune', 'Pune City', 'Mundhwa', '411036'),
(42, 'Sakshi ', 'Nagesh', 'Sonawane ', '9119561015', 'sonavanesonali51@gmail.com', 'sakshi@911', 'Maharashtra', 'Pune', 'Haveli', 'Mundhawa ', '411036'),
(43, 'Rutuja ', 'Shridhar', 'Gaikwad', '9765556375', 'rutuja.gaikwad1930@gmail.com', 'Paßsword@123', 'Maharashtra', 'Osmanabad', '', 'Arali', '413011'),
(44, 'Renuka', 'Hirulal', 'chaudhari', '09322078836', 'renukachaudhari84@gmail.com', 'renuka14', 'Maharashtra', 'Wardha', '', 'Wardha', '442001'),
(45, 'Pratik', 'Sunil', 'Shinde', '9529409469', 'pratik.shinde9529@gmail.com', 'mmeena123@', 'Maharashtra', 'Pune', 'Haveli', 'Hadapsar ', '411028'),
(46, 'r6drt', '7gty7g', 'ygugyu', '77777777777777777777', 'bgyubgyu@gmail.com', 'fgfghcf', 'Meghalaya', 'East Garo Hills', 'Williamnagar', 'hvghv', 'ggvh'),
(47, 'hgjvgj', 'dgsdg', 'dfsdfd', '88888888888888888888', 'a@gmail.com', 'bxdfbdxgdxg', 'Nagaland', 'Kohima', 'Jakhama', 'gdgdfg', 'hfgdfdsfsdf'),
(48, 'Akshay', 'Ashok', 'Kamble', '07385458136', 'akshaybkamble777@gmail.com', '99887655544321', 'Maharashtra', 'Chandrapur', 'Korpana', 'Lkm', '411037'),
(49, 'Akshay', 'Ashok', 'Kamble', '07385458136', 'akshaybkamble777@gmail.com', '99887655544321', 'Maharashtra', 'Chandrapur', 'Korpana', 'Lkm', '411037'),
(50, 'hrushali', 'uttam', 'patil', '6284466549', 'hrushalipatil2002@gmail.com', 'Hrush@2002', 'Maharashtra', 'Pune', 'Pune City', 'keshavnaga', '411036'),
(51, 'pratiksha', 'shahaji', 'ingale', '7038088397', 'ingalepratiksha845@gmail.com', 'Pratu@29', 'Maharashtra', 'Pune', 'Pune City', 'keshavnaga', '411036'),
(52, 'Bhagyashri ', 'Sanjay', 'Patil', '9518937379', 'Userid1998@gmail.com', 'bhagya@2024', 'Maharashtra', 'Pune', 'Pune City', 'Wagholi', '412207'),
(53, ' Hrushali ', 'Uttam ', 'Patil', '9325755374', 'hrushalipatil2002@gmail.com', 'hru@2002', 'Maharashtra', 'Pune', 'Pune City', 'Keshavnaga', '411036'),
(54, 'Namrata ', 'Balaji ', 'Sarne ', '9657683813', 'sarnenamrata10@gamil.com', '@namrata', 'Maharashtra', 'Pune', 'Pune City', 'Pune', '411036'),
(55, 'Nandini', 'Netaji', 'Panchal', '8055533427', 'panchalnandini805@gmail.com', 'Nandini@5', 'Maharashtra', 'Osmanabad', 'Tuljapur', 'Pune', '413011'),
(56, 'Sakshi ', 'Nagesh', 'Sonawane ', '91195610015', 'sonavanesonali51@gmail.com', 'sakshi9119', 'Maharashtra', 'Pune', 'Haveli', 'Mundhawa ', '411036'),
(57, 'Sakshi ', 'Nagesh', 'Sonawane ', '9119561015', 'sonavanesonali51@gmail.com', 'sakshi9119', 'Maharashtra', 'Pune', 'Haveli', 'Mundhawa ', '411036'),
(58, 'Vishnu ', 'Gahininath ', 'Bhorade ', '9545939638', 'vishnu.bhorade001@gmail.com', 'Vish@2598', 'Maharashtra', 'Beed', 'Ashti', 'Pargaon Jo', '414203'),
(59, 'Nishikant', 'Raghunandan ', 'Jadhav', '8080652076', 'nishikantj2108@gmail.com', 'Nishikant@123', 'Maharashtra', 'Pune', 'Pune City', 'Saswad', '412301'),
(60, 'Subhash ', 'Sundardas ', 'Pathade ', '7386103021', 'pathadesubhash93@gmail.com', '123456', 'Maharashtra', 'Beed', 'Ashti', 'Ashta Hari', '414203'),
(61, 'Nandini ', 'Netaji ', 'Panchal ', '8055533427', 'panchalnandini805@gmail.com', 'Nandini@5', 'Maharashtra', 'Pune', 'Pune City', 'Pune ', '413011'),
(62, 'Nandini ', 'Netaji ', 'Panchal ', '8055533427', 'panchalnandini805@gmail.com', 'Paßsword@123', 'Maharashtra', '', '', 'Pune ', '413011'),
(63, 'Nandini ', 'Netaji ', 'Panchal ', '8055533427', 'panchalnandini805@gmail.com', 'Paßsword@123', 'Maharashtra', '', '', 'Pune ', '413011'),
(64, ' Hrushali ', 'Uttam ', 'Patil', '9325755374', 'hrushalipatil2002@gmail.com', 'hru@2002', 'Maharashtra', 'Pune', 'Pune City', 'Keshavnaga', '411036'),
(65, 'Shubham', 'Ramesh', 'Gaikwad', '09021560092', 'shubhamgaikwad4995@gmail.com', 'Shubham@8055', 'Maharashtra', 'Pune', 'Haveli', 'Chikhali', '411062'),
(66, 'Shivratna', 'Raju ', 'Dhoble ', '7972704288', 'Shivratnadhoble9@gmail.com', '503688', 'Maharashtra', 'Ahmednagar', 'Nagar', 'Kada', '414202'),
(67, 'Swarali ', 'Balasaheb ', 'Jadhav', '9764764104', 'balasahebgj77@gmail.com', 'swarali04.', 'Maharashtra', 'Beed', 'Bid', 'Babhulakhu', '431122'),
(68, 'Rohini', 'Santosh', 'Khatpe', '9767258028', 'rohinikhatpe234@gmail.com', 'Ruhi@20', 'Maharashtra', '', '', 'Narhe', '411041'),
(69, 'Rohini', 'Santosh', 'Khatpe', '9767258028', 'rohinikhatpe234@gmail.com', 'Ruhi@20', 'Maharashtra', 'Pune', 'Haveli', 'Narhe', '411041'),
(70, 'Daivshala ', 'Ganesh ', 'Pawar ', '8484936768', 'daivshalapawar10@gmail.com', 'Daiva@1995', 'Maharashtra', 'Pune', 'Haveli', 'Katraj Pun', '411046'),
(71, 'Daivshala ', 'Ganesh ', 'Pawar ', '8484936768', 'daivshalapawar10@gmail.com', 'Daiva@1995', 'Maharashtra', 'Pune', 'Haveli', 'Katraj Pun', '411046'),
(72, 'Shivansh', '', 'Khampariya', '09496947006', 'shivansh@gmail.com', '123456', 'Maharashtra', 'Gadchiroli', 'Mulchera', 'Pune', '411046'),
(73, 'Bhagyashri ', 'Sanjay ', 'Patil', '9518937379', 'Userid1998@gmail.com', 'bhagya@2024', 'Maharashtra', 'Pune', 'Pune City', 'Wagholi pu', '412207'),
(74, 'Shubham', 'sunil', 'Kale', '8208565985', 'kaleshubham602@gmail.com', 'Shubham@123', 'Maharashtra', 'Beed', 'Georai', 'malegaon b', '431122'),
(75, 'Jaydeep', 'Rajaram ', 'Sutar', '9022869184', 'jaydeepsutar001@gmail.com', 'Jaydeep@#414', 'Maharashtra', 'Pune', 'Haveli', 'Ambegaon', '411046'),
(76, 'Nakul', '', 'Khandelwal', '9579365540', 'nakulkhandelwal18@gmail.com', 'Nakul@195', 'Maharashtra', '', '', 'Malkapur', '443101'),
(77, 'test', 'test', 'test', '5616464994', 'test@gmail.com', 'test12', 'Goa', 'South Goa', 'Quepem', 'test', '62627');

-- --------------------------------------------------------

--
-- Table structure for table `studentfee`
--

CREATE TABLE `studentfee` (
  `t_no` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_totalfee` decimal(10,2) NOT NULL,
  `t_installment1` decimal(10,2) NOT NULL,
  `t_installment2` decimal(10,2) NOT NULL,
  `t_installment3` decimal(10,2) NOT NULL,
  `t_balanceamount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_email` varchar(255) NOT NULL,
  `t_contact` varchar(20) NOT NULL,
  `t_gender` varchar(10) NOT NULL,
  `t_courseid` int(11) DEFAULT NULL,
  `t_batchid` int(11) DEFAULT NULL,
  `t_franchiseid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`t_id`, `t_name`, `t_email`, `t_contact`, `t_gender`, `t_courseid`, `t_batchid`, `t_franchiseid`, `status`) VALUES
(1, 'tanishka mane', 'tanishka2@gmail.com', '9897678898', 'female', 22, 10, 103, 1),
(3, 'riya mate', 'riyumate@gmail.com', '9090909090', 'female', 22, 78, 103, 1),
(32, 'radhika', 'radhika@gmail.com', '9087678902', 'female', 777, 78, 103, 1),
(34, 'Akshay Kamble', 'ak234@gmail.com', '9421058875', 'male', 101, 78, 101, 1);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_role` varchar(255) NOT NULL,
  `member_image` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `member_name`, `member_role`, `member_image`, `status`) VALUES
(7, 'Nitin Kale', 'Founder & CEO', 'image/NitinKale.jpeg', 0),
(13, 'Ajinkya Jagtap', 'Management Head', 'image/AjinkyaJagtap.jpeg', 0),
(14, 'Abhijeet Japtap', 'Technical Head ', 'image/AbhijeetJagtap.jpeg', 0),
(15, 'Gaurav Nawale.', 'Marketing  Head .', 'image/GauravNawale.png', 0),
(16, 'Rajvardhan Naik', 'Digital Marketing Head', 'image/RajvardhanNaik.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `studentImage` varchar(255) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `testimonialText` text NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `studentImage`, `studentName`, `courseName`, `testimonialText`, `status`) VALUES
(4, 'image/IMG-20240316-WA0024.jpg', 'Priyanka', 'Study Skills', 'I am incredibly grateful for the fantastic learning experience I had with this platform. The courses offered, especially in soft skill, were comprehensive and well-structured. The instructors were knowledgeable, engaging, and always ready to assist. The practice sessions and hands-on exercises greatly contributed to my skill development.', 1),
(5, 'image/IMG-20240316-WA0025.jpg', 'Abhineet', 'Study Skills', 'Great experience of learning, I impressed by teaching methods, I learn mind map , key words techniques, notes preparation for exam, time management', 1),
(6, 'image/IMG-20240316-WA0023.jpg', 'Aishwariya         ', 'Public speaking', 'Best public speaking training center, with good experienced trainers,to become a good public speaker step by step programs are well designed, on stage practice, events and exposure to big audience', 1),
(7, 'image/IMG-20240316-WA0021.jpg', 'Saurabh', 'Personality Development ', 'I am incredibly grateful for the fantastic learning experience I had with this platform.i learned What is personality, where we are, what we are to importance of AIM, Success, imotional intelligence ,time management  , goal achievement', 1),
(8, 'image/IMG_20240316_123936.jpg', 'Nikhil khilare', 'Leadership and public speaking', 'I thank full to all LTOR academy trainers. The great team of trainers available, proper syllabus and practical training with daily practice. \"Who have the plan they are the leaders\" I like leadership development and planning sessions, public speaking sessions', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agreementdetails`
--
ALTER TABLE `agreementdetails`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `t_franchiseid` (`t_franchiseid`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`t_no`),
  ADD KEY `t_franchiseid` (`t_franchiseid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `facultyinfo`
--
ALTER TABLE `facultyinfo`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `t_franchiseid` (`t_franchiseid`);

--
-- Indexes for table `facultypayments`
--
ALTER TABLE `facultypayments`
  ADD PRIMARY KEY (`t_paymentid`),
  ADD KEY `t_facultyid` (`t_facultyid`);

--
-- Indexes for table `franchise`
--
ALTER TABLE `franchise`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `franchiseinfodetails`
--
ALTER TABLE `franchiseinfodetails`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_vacancies`
--
ALTER TABLE `job_vacancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `studentfee`
--
ALTER TABLE `studentfee`
  ADD PRIMARY KEY (`t_no`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `t_courseid` (`t_courseid`),
  ADD KEY `t_batchid` (`t_batchid`),
  ADD KEY `t_franchiseid` (`t_franchiseid`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_vacancies`
--
ALTER TABLE `job_vacancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agreementdetails`
--
ALTER TABLE `agreementdetails`
  ADD CONSTRAINT `agreementdetails_ibfk_1` FOREIGN KEY (`t_franchiseid`) REFERENCES `franchise` (`t_id`) ON DELETE CASCADE;

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`t_franchiseid`) REFERENCES `franchise` (`t_id`) ON DELETE CASCADE;

--
-- Constraints for table `facultyinfo`
--
ALTER TABLE `facultyinfo`
  ADD CONSTRAINT `facultyinfo_ibfk_1` FOREIGN KEY (`t_franchiseid`) REFERENCES `franchise` (`t_id`) ON DELETE CASCADE;

--
-- Constraints for table `facultypayments`
--
ALTER TABLE `facultypayments`
  ADD CONSTRAINT `facultypayments_ibfk_1` FOREIGN KEY (`t_facultyid`) REFERENCES `facultyinfo` (`t_id`) ON DELETE CASCADE;

--
-- Constraints for table `franchiseinfodetails`
--
ALTER TABLE `franchiseinfodetails`
  ADD CONSTRAINT `franchiseinfodetails_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `franchise` (`t_id`) ON DELETE CASCADE;

--
-- Constraints for table `studentfee`
--
ALTER TABLE `studentfee`
  ADD CONSTRAINT `studentfee_ibfk_1` FOREIGN KEY (`t_no`) REFERENCES `studentinfo` (`t_id`) ON DELETE CASCADE;

--
-- Constraints for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD CONSTRAINT `studentinfo_ibfk_1` FOREIGN KEY (`t_courseid`) REFERENCES `course` (`t_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studentinfo_ibfk_2` FOREIGN KEY (`t_batchid`) REFERENCES `batch` (`t_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `studentinfo_ibfk_3` FOREIGN KEY (`t_franchiseid`) REFERENCES `franchise` (`t_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
