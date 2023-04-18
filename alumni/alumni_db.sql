-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 01:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnus_bio`
--

CREATE TABLE `alumnus_bio` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `maidenname` varchar(250) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` varchar(250) NOT NULL,
  `birthplace` varchar(250) NOT NULL,
  `year_graduated` year(4) NOT NULL,
  `course` varchar(250) NOT NULL,
  `graduate_level` text NOT NULL,
  `department` varchar(250) NOT NULL,
  `occupation` varchar(250) NOT NULL,
  `civil_status` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contactno` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `alumni_id` varchar(8) NOT NULL,
  `avatar` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= Unverified, 1= Verified',
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `company` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnus_bio`
--

INSERT INTO `alumnus_bio` (`id`, `firstname`, `middlename`, `lastname`, `maidenname`, `gender`, `birthdate`, `birthplace`, `year_graduated`, `course`, `graduate_level`, `department`, `occupation`, `civil_status`, `address`, `contactno`, `email`, `alumni_id`, `avatar`, `status`, `date_created`, `company`, `position`) VALUES
(19, 'Landrei', 'Rafanan', 'Zerna', 'N/A', 'Male', '0000-00-00 00:00:00', 'Zamboanga City', 2023, 'BS Food Tech', 'College', 'CICS', 'Developer', 'Single', 'Zamboanga City', '09455868528', 'landrei062011@hotmail.com', '00000000', '1675597020_13-removebg-preview.png', 1, '2023-02-05', 'IMCO', 'Head Developer'),
(20, 'Aidal', 'Manarudiin', 'Kalim', 'N/A', 'Male', '02-05-2023', 'Zamboanga City', 2023, 'N/A', 'College', 'N/A', 'Web Developer', 'Single', 'Zamboanga City', '09123456789', 'aidalmanaruddin@gmail.com', '00000001', '1675604700_13-removebg-preview.png', 1, '2023-02-05', 'Google', 'Head Dev'),
(21, 'Jacob', 'Neo', 'Malik', 'N/A', 'Male', '07-28-1975', 'Zamboanga city', 1998, 'BS Info Tech', 'College', 'CICS', 'UNEMPLOYED', 'Single', 'Metro Manila', '09754321891', 'jacob46@gmail.com', 'Jacob', '1675649580_Seal PDB.jpg', 1, '2023-02-06', 'N/A', 'N/A'),
(22, 'Belyn', 'R', 'Enguerra', 'N/A', 'Female', '09-13-2345', 'Zamboanga City', 2019, 'N/A', 'High School', 'N/A', 'OII', 'Single', 'NNN', '9876554', 'zernalandrei@gmail.com', 'HJJ', '', 1, '2023-02-06', 'HHH', 'BBB'),
(23, 'Joshua', 'M', 'Dagohoy', 'N/A', 'Male', '07-07-2000', 'Zamboanga City', 2022, 'BS INFO TECH', 'College', 'AIDAL DEPARTMENT', 'Unemployed', 'Separated', 'kahit saan basta may pagkain', '09897645123', 'dagohoy@gmail.com', '007', '1675878000_received_1680584775692491.jpeg', 1, '2023-02-09', 'Bahay', 'Anak'),
(24, 'Belyn', 'R', 'Enguerra', '', 'Male', '02-15-2023', 'Panglima Sugala Balimbing Tawi-Tawi', 2020, 'BS Computer Technology', 'High School', 'College of Engineering and Technology', 'Employed', 'Single', 'NNN', '098989898989898', 'zernaland@gmail.com', '1234', '', 1, '2023-02-10', 'HHH', 'dgghh'),
(25, 'Erica Jane', 'Bonghanoy', 'Samon', 'N/A', 'Female', '06-08-2001', 'Zamboanga city', 2019, 'BS INFO TECH', 'College', 'CICS', 'Unemployed', 'Single', 'tugbungan', '09751528047', 'ericajanesamon@gmail.com', '16729837', '1676222760_received_1533290040494050.jpeg', 1, '2023-02-13', 'N/A', 'N/A'),
(26, 'jenny', 'marie', 'lamparan', 'N/A', 'Female', '09-25-2005', 'Zamboanga City', 2006, 'BS Computer Technology', 'College', 'Math', 'Employed', 'Married', 'G12 Purok IV-A Sta.Catalina Zamboanga City', '09675432123', 'jenny@gmail.com', '123456', '1676272500_received_1661094460973567.jpeg', 1, '2023-02-13', 'shoppe', 'supervisor'),
(27, 'Roland', 'Santos', 'Kalim', 'N/A', 'Male', '05-29-2000', 'Zamboanga city', 2020, 'BS Computer Technology', 'College', 'P.E', 'Employed', 'Single', 'Metro Manila', '09754321891', 'kalim@gmail.com', '0000000', '', 1, '2023-02-16', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(30) NOT NULL,
  `banner` text NOT NULL,
  `company` varchar(250) NOT NULL,
  `location` text NOT NULL,
  `job_title` text NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `banner`, `company`, `location`, `job_title`, `description`, `user_id`, `date_created`) VALUES
(1, '', 'IT Company', 'Home-Based', 'Web Developer', '&lt;p style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sagittis eu volutpat odio facilisis mauris sit amet massa vitae. In tellus integer feugiat scelerisque varius morbi enim. Orci eu lobortis elementum nibh tellus molestie nunc. Vulputate ut pharetra sit amet aliquam id diam maecenas ultricies. Lacus sed viverra tellus in hac habitasse platea dictumst vestibulum. Eleifend donec pretium vulputate sapien nec. Enim praesent elementum facilisis leo vel fringilla est ullamcorper. Quam adipiscing vitae proin sagittis nisl rhoncus. Sed viverra ipsum nunc aliquet bibendum. Enim ut sem viverra aliquet eget sit amet tellus. Integer feugiat scelerisque varius morbi enim nunc faucibus.&lt;/p&gt;&lt;p style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Viverra justo nec ultrices dui. Leo vel orci porta non pulvinar neque laoreet. Id semper risus in hendrerit gravida rutrum quisque non tellus. Sit amet consectetur adipiscing elit ut. Id neque aliquam vestibulum morbi blandit cursus risus. Tristique senectus et netus et malesuada. Amet aliquam id diam maecenas ultricies mi eget mauris. Morbi tristique senectus et netus et malesuada. Diam phasellus vestibulum lorem sed risus. Tempor orci dapibus ultrices in. Mi sit amet mauris commodo quis imperdiet. Quisque sagittis purus sit amet volutpat. Vehicula ipsum a arcu cursus. Ornare quam viverra orci sagittis eu volutpat odio facilisis. Id volutpat lacus laoreet non curabitur. Cursus euismod quis viverra nibh cras pulvinar mattis nunc. Id aliquet lectus proin nibh nisl condimentum id venenatis. Eget nulla facilisi etiam dignissim diam quis enim lobortis. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet.&lt;/p&gt;', 3, '2020-10-15 14:14:27'),
(2, '', 'Sample Company', 'Sample location', 'IT Specialist', '&lt;p style=&quot;margin-top: 1.5em; margin-bottom: 1.5em; margin-right: unset; margin-left: unset; color: rgb(68, 68, 68); font-family: &amp;quot;Open Sans&amp;quot;, sans-serif; font-size: 16px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sagittis eu volutpat odio facilisis mauris sit amet massa vitae. In tellus integer feugiat scelerisque varius morbi enim. Orci eu lobortis elementum nibh tellus molestie nunc. Vulputate ut pharetra sit amet aliquam id diam maecenas ultricies. Lacus sed viverra tellus in hac habitasse platea dictumst vestibulum. Eleifend donec pretium vulputate sapien nec. Enim praesent elementum facilisis leo vel fringilla est ullamcorper. Quam adipiscing vitae proin sagittis nisl rhoncus. Sed viverra ipsum nunc aliquet bibendum. Enim ut sem viverra aliquet eget sit amet tellus. Integer feugiat scelerisque varius morbi enim nunc faucibus.&lt;/p&gt;&lt;p style=&quot;margin-top: 1.5em; margin-bottom: 1.5em; margin-right: unset; margin-left: unset; color: rgb(68, 68, 68); font-family: &amp;quot;Open Sans&amp;quot;, sans-serif; font-size: 16px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Viverra justo nec ultrices dui. Leo vel orci porta non pulvinar neque laoreet. Id semper risus in hendrerit gravida rutrum quisque non tellus. Sit amet consectetur adipiscing elit ut. Id neque aliquam vestibulum morbi blandit cursus risus. Tristique senectus et netus et malesuada. Amet aliquam id diam maecenas ultricies mi eget mauris. Morbi tristique senectus et netus et malesuada. Diam phasellus vestibulum lorem sed risus. Tempor orci dapibus ultrices in. Mi sit amet mauris commodo quis imperdiet. Quisque sagittis purus sit amet volutpat. Vehicula ipsum a arcu cursus. Ornare quam viverra orci sagittis eu volutpat odio facilisis. Id volutpat lacus laoreet non curabitur. Cursus euismod quis viverra nibh cras pulvinar mattis nunc. Id aliquet lectus proin nibh nisl condimentum id venenatis. Eget nulla facilisi etiam dignissim diam quis enim lobortis. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet.&lt;/p&gt;', 1, '2020-10-15 15:05:37'),
(3, '', 'shopee', 'manila', 'lets', '&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: bolder; margin: 0px; padding: 0px; text-align: justify;&quot;&gt;Lorem Ipsum&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;', 10, '2023-01-30 11:23:59'),
(5, '', 'ASDASD', 'ASDSAD', 'ASDASD', 'ASDASD', 1, '2023-02-09 02:49:39'),
(6, '', 'ASDAS', 'ASDASD', 'ASDASD', 'ASDASD', 1, '2023-02-09 02:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(30) NOT NULL,
  `course` text NOT NULL,
  `department` varchar(250) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `department`, `about`) VALUES
(15, 'BS INFO TECH', 'AIDAL DEPARTMENT', ''),
(16, 'BS Computer Technology', 'College of Engineering and Technology', ''),
(17, 'BS Electrical Technology', 'College of Engineering and Technology', ''),
(18, 'BS Mechanical Technology', 'College of Engineering and Technology', ''),
(19, 'BS Electronics Technolgy', 'College of Engineering and Technology', ''),
(20, 'BS Computer Technology', 'CICS', ''),
(21, 'nursing', 'medtech', ''),
(22, 'BS EDUCATION', 'CTE', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(2, 'CICS'),
(3, 'AIDAL DEPARTMENT'),
(6, 'College of Engineering and Technology'),
(7, 'College of Engineering and Technology'),
(8, 'medtech'),
(9, 'CTE');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `education` varchar(500) NOT NULL,
  `pskills` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employed_data`
--

CREATE TABLE `employed_data` (
  `employed_data_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `employment_status` varchar(10) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `qualifications` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL,
  `skills` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `schedule` datetime NOT NULL,
  `banner` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `content`, `schedule`, `banner`, `date_created`) VALUES
(6, 'STARBUCKS WEEK', '&lt;p style=&quot;text-align: center;&quot;&gt;FREE STARBUKS LATTE THIS DAY&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;GRAB YOUR SELF A COFFE OF ONE&nbsp;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;AND KIND&lt;/p&gt;', '2023-02-16 09:00:00', '1675435920_starbucks.jpg', '2023-02-03 22:52:28'),
(8, 'PALARO', 'PALARO 2023', '2023-03-15 17:00:00', '1676271720_SealPDB.jpg', '2023-02-13 15:02:51'),
(9, 'dfdfd', 'dsgsdfdbdfdffh', '2023-02-09 17:00:00', '1676272680_MorayEELPDB.jpg', '2023-02-13 15:18:02'),
(10, 'gergergdfg', 'esgdfgdfdfbfdd', '2023-02-10 18:00:00', '1676272680_IMG_20230116_133431_171.jpg', '2023-02-13 15:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `event_commits`
--

CREATE TABLE `event_commits` (
  `id` int(30) NOT NULL,
  `event_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_commits`
--

INSERT INTO `event_commits` (`id`, `event_id`, `user_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 2, 5),
(4, 3, 1),
(5, 5, 19),
(6, 2, 21),
(7, 2, 1),
(8, 6, 25),
(9, 6, 27);

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE `forum_comments` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum_comments`
--

INSERT INTO `forum_comments` (`id`, `topic_id`, `comment`, `user_id`, `date_created`) VALUES
(1, 3, 'Sample updated Comment', 3, '2020-10-15 15:46:03'),
(3, 3, 'Sample', 1, '2020-10-16 08:48:02'),
(5, 0, '', 1, '2020-10-16 09:49:34'),
(6, 9, 'joke lang', 9, '2023-01-30 16:24:27'),
(8, 23, 'panget eel', 27, '2023-02-09 01:47:02'),
(9, 27, 'NJBDVDHVDS', 27, '2023-02-09 11:06:42'),
(10, 27, 'wanted', 30, '2023-02-13 15:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE `forum_topics` (
  `id` int(30) NOT NULL,
  `banner` text NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`id`, `banner`, `title`, `description`, `user_id`, `date_created`) VALUES
(19, '1675871400_received_425836359661057.jpeg', 'TITLE1', 'CONTENT 1', 23, '2023-02-08 23:50:15'),
(20, '1675871580_received_425836359661057.jpeg', 'SAVE 1', 'SAVE 1', 23, '2023-02-08 23:53:13'),
(21, '1675872480_13-removebg-preview.png', 'AIDAL', 'AIDAL BATAK', 23, '2023-02-09 00:08:06'),
(22, '1675872480_MorayEELPDB.jpg', 'SAMLE 2', 'SAMLE', 23, '2023-02-09 00:08:46'),
(24, '1675873020_USECASEL1.drawio.png', 'SAVE', 'SAVE', 23, '2023-02-09 00:17:18'),
(25, '1675878480_received_1680584775692491.jpeg', 'sino to ?', 'ang makahula may gcash&amp;nbsp;', 27, '2023-02-09 01:48:12'),
(26, '1675879020_received_907463663596884.jpeg', 'GAGGX', 'HVSSCVSGAS', 1, '2023-02-09 01:57:37'),
(27, '1675911960_received_1680584775692491.jpeg', 'SDFSF', 'njbdvDSVDVLJIB', 27, '2023-02-09 11:06:20'),
(28, '1676272860_received_556889499791253.jpeg', 'hiuhiupiu', 'kjbjhbjhhh', 30, '2023-02-13 15:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(30) NOT NULL,
  `about` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `about`, `created`) VALUES
(11, 'Fulbright scholarship opportunities to the faculty of ZPPSU.\r\n\r\nThe Philippine-American Educational Foundation is the world’s oldest and only continuously operating Fulbright Commission. It is responsible for the administration of the flagship foreign exchange scholarship program of the United States of America in the Philippines. This program’s goals are to increase binational research collaboration, cultural understanding, and the exchange of ideas between the two countries.', '2023-01-29 23:45:29'),
(12, 'To bring the College into an international standard in welding technology, ZCSPC has recently entered into a memorandum of understanding with Lincoln Electric Company on August 7, 2019. LINCOLN, founded in 1895 with its headquarter in Cleveland, Ohio USA, is a world leader in the manufacture of the highest quality welding, cutting and joining products. The company offers the most comprehensive group of equipment, electrodes, welding training systems, curriculum and resources available for the welding education market today. ', '2023-01-29 23:49:33'),
(13, 'ZPPSU community celebrated the 1st Anniversary of Dr. Nelson P. Cabral as University President', '2023-01-29 23:50:11'),
(14, 'President', '2023-01-29 23:50:51'),
(15, 'ZCSPC: Philippine Red Cross Mobile Blood Donation Partner\r\n', '2023-01-29 23:55:34'),
(16, 'ZPPSU Old Registrar', '2023-01-29 23:57:08'),
(17, 'ZPPSU Gymnasium', '2023-01-29 23:58:31'),
(18, 'ZPPSU Banner', '2023-01-29 23:59:03'),
(20, 'Great place to celebrate your vacation this coming summer ', '2023-01-30 16:20:25'),
(21, '2x2 picture example', '2023-02-09 01:53:05'),
(22, 'THESIS Gathering', '2023-02-13 15:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `generalinfo`
--

CREATE TABLE `generalinfo` (
  `general_info_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `permanent_address` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `telephone_number` varchar(11) NOT NULL,
  `civil_status` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `religion` varchar(50) NOT NULL,
  `region` varchar(10) NOT NULL,
  `province` varchar(50) NOT NULL,
  `residence` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selfemployed`
--

CREATE TABLE `selfemployed` (
  `self_employed_data_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `business` varchar(255) NOT NULL,
  `related` varchar(255) NOT NULL,
  `reasons` varchar(255) NOT NULL,
  `noofemployee` varchar(10) NOT NULL,
  `skills` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'ZPPSUAAII', 'zppsuaaii@gmail.com', '+639455868528', '1675001820_327445470_734513434904573_8817075163481706142_n (1).jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;b style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;Vision&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;Globally Leading Polytechnic University&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;b&gt;Mission&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;Produce world-class technical and professional human capital, global standard-compliant education, and science and technology research innovations for sustainable environment and quality lives.&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;b&gt;Goal&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;Develop and sustain the cultures of innovation, collaboration, responsiveness and excellence.&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;b&gt;Core Values&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;Love of God and Country&lt;/span&gt;&lt;br&gt;&lt;span style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;Social Responsibility&lt;/span&gt;&lt;br&gt;&lt;span style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;Commitment/Dedication to service&lt;/span&gt;&lt;br&gt;&lt;span style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;Accountability&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `unemployed`
--

CREATE TABLE `unemployed` (
  `unemployed_data_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `seek` varchar(10) NOT NULL,
  `doing` varchar(255) NOT NULL,
  `finance` varchar(100) NOT NULL,
  `desire` varchar(10) NOT NULL,
  `consider` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `username`, `password`) VALUES
(1, 'Gerwin', 'admin', 'admin'),
(2, 'lester sdssd lester', 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Alumni officer, 3= alumnus',
  `auto_generated_pass` text NOT NULL,
  `alumnus_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`, `auto_generated_pass`, `alumnus_id`) VALUES
(1, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 1, '', 0),
(23, 'Landrei Zerna', 'landrei062011@hotmail.com', '0192023a7bbd73250516f069df18b500', 3, '', 19),
(25, 'Jacob Malik', 'jacob46@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, '', 21),
(26, 'Belyn Enguerra', 'zernalandrei@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 3, '', 22),
(27, 'Joshua Dagohoy', 'dagohoy@gmail.com', 'da95b78f37f1f80fab425dadec280876', 3, '', 23),
(28, 'Belyn Enguerra', 'zernaland@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 3, '', 24),
(29, 'Erica Jane Samon', 'ericajanesamon@gmail.com', '25d55ad283aa400af464c76d713c07ad', 3, '', 25),
(30, 'jenny lamparan', 'jenny@gmail.com', '866edb65985fefe70f0321557773c4b7', 3, '', 26),
(31, 'Roland Kalim', 'kalim@gmail.com', '59b77d6d68357212533d737d8dd4219c', 3, '', 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnus_bio`
--
ALTER TABLE `alumnus_bio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `employed_data`
--
ALTER TABLE `employed_data`
  ADD PRIMARY KEY (`employed_data_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_commits`
--
ALTER TABLE `event_commits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalinfo`
--
ALTER TABLE `generalinfo`
  ADD PRIMARY KEY (`general_info_id`);

--
-- Indexes for table `selfemployed`
--
ALTER TABLE `selfemployed`
  ADD PRIMARY KEY (`self_employed_data_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unemployed`
--
ALTER TABLE `unemployed`
  ADD PRIMARY KEY (`unemployed_data_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnus_bio`
--
ALTER TABLE `alumnus_bio`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employed_data`
--
ALTER TABLE `employed_data`
  MODIFY `employed_data_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_commits`
--
ALTER TABLE `event_commits`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `generalinfo`
--
ALTER TABLE `generalinfo`
  MODIFY `general_info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `selfemployed`
--
ALTER TABLE `selfemployed`
  MODIFY `self_employed_data_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unemployed`
--
ALTER TABLE `unemployed`
  MODIFY `unemployed_data_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `unemployed`
--
ALTER TABLE `unemployed`
  ADD CONSTRAINT `unemployed_ibfk_1` FOREIGN KEY (`unemployed_data_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
