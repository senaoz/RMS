-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2022 at 10:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MIS 233`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `Admins`
-- (See below for the actual view)
--
CREATE TABLE `Admins` (
`u_mail` varchar(250)
,`u_name` varchar(200)
,`u_surname` varchar(200)
,`u_phone` varchar(250)
,`u_country` varchar(250)
,`u_city` varchar(250)
,`u_uni` varchar(255)
,`u_password` varchar(200)
,`role` varchar(100)
,`u_activate` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `CourseCountByStudent`
-- (See below for the actual view)
--
CREATE TABLE `CourseCountByStudent` (
`Student Mail` varchar(250)
,`Course Count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `courseDetails`
--

CREATE TABLE `courseDetails` (
  `c_ID` varchar(250) NOT NULL,
  `s_mail` varchar(250) NOT NULL,
  `s_grade` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseDetails`
--

INSERT INTO `courseDetails` (`c_ID`, `s_mail`, `s_grade`) VALUES
('MIS251', 'deneme4@gmail.com', ''),
('MIS213', 'deneme4@gmail.com', ''),
('MIS233', 'deneme3@gmail.com', ''),
('MIS213', 'deneme2@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` varchar(10) NOT NULL,
  `c_name` varchar(250) NOT NULL,
  `c_description` text NOT NULL,
  `c_quota` int(11) NOT NULL,
  `c_final_date` date NOT NULL,
  `c_credits` int(11) NOT NULL,
  `c_consent` varchar(3) NOT NULL,
  `c_professor_mail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `c_name`, `c_description`, `c_quota`, `c_final_date`, `c_credits`, `c_consent`, `c_professor_mail`) VALUES
('MIS213', 'STATISTICS', 'Descriptive statistics; tabular, graphical, and numerical methods. Continuous and discrete probability distributions. Sampling theory, interval estimation of population mean and variance, hypothesis tests, inference about means and proportions, inference about population variances. Applications using SPSS.', 60, '2021-12-29', 4, 'NO', 'deneme@gmail.com'),
('MIS233', 'WEB BASED APPLICATION PROGRAMMING', '- Basic concepts of visual and event-oriented programming. Topics in client-site programming with a scripting language. DOM, and Ajax. Server-site programming techniques. Implementation of applications using current languages.  - Students should be expected to spend at least 4 to 6 extra hours a week outside of class time (mostly using a computer and/or reading and/or programming).', 0, '2022-01-01', 4, 'NO', 'professor@gmail.com'),
('MIS251', 'INFORMATION TECHNOLOGY INFRASTRUCTURES', 'In this course, we study theoretical and practical aspects of computer systems in business use including cloud computing, server virtualization, storage systems, client/server architectures, mainframe, and mobile systems. We then study computer architecture, including the organization of CPU, memory, peripheral devices, machine and assembly languages, digital design with combinational logic. Lastly, we cover the appropriate use and configuration of mobile and server operating systems for business environments.', 90, '2022-12-08', 4, 'YES', 'professor@gmail.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `CurrentParticipants`
-- (See below for the actual view)
--
CREATE TABLE `CurrentParticipants` (
`Course ID` varchar(250)
,`Name` varchar(250)
,`Quota` int(11)
,`Current Participant` bigint(21)
,`Consent` varchar(3)
,`Professor Mail` varchar(250)
);

-- --------------------------------------------------------

--
-- Table structure for table `parameters`
--

CREATE TABLE `parameters` (
  `Index` int(11) NOT NULL,
  `MinPwd` int(11) NOT NULL,
  `MaxPwd` int(11) NOT NULL,
  `MaxCourse` int(11) NOT NULL,
  `MaxStuCourse` int(11) NOT NULL,
  `MaxProfCourse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameters`
--

INSERT INTO `parameters` (`Index`, `MinPwd`, `MaxPwd`, `MaxCourse`, `MaxStuCourse`, `MaxProfCourse`) VALUES
(1, 2, 10, 12, 13, 14);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ParticipantList`
-- (See below for the actual view)
--
CREATE TABLE `ParticipantList` (
`s_mail` varchar(250)
,`ID` varchar(10)
,`c_name` varchar(250)
,`c_final_date` date
,`c_professor_mail` varchar(250)
,`u_name` varchar(200)
,`u_surname` varchar(200)
,`c_credits` int(11)
,`c_description` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `Professors`
-- (See below for the actual view)
--
CREATE TABLE `Professors` (
`u_mail` varchar(250)
,`u_name` varchar(200)
,`u_surname` varchar(200)
,`u_phone` varchar(250)
,`u_country` varchar(250)
,`u_city` varchar(250)
,`u_password` varchar(200)
,`u_activate` tinyint(1)
,`Course Count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `Students`
-- (See below for the actual view)
--
CREATE TABLE `Students` (
`u_mail` varchar(250)
,`u_name` varchar(200)
,`u_surname` varchar(200)
,`u_phone` varchar(250)
,`u_country` varchar(250)
,`u_city` varchar(250)
,`u_uni` varchar(255)
,`u_password` varchar(200)
,`role` varchar(100)
,`u_activate` tinyint(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_mail` varchar(250) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_surname` varchar(200) NOT NULL,
  `u_phone` varchar(250) NOT NULL,
  `u_country` varchar(250) NOT NULL DEFAULT 'Turkey',
  `u_city` varchar(250) NOT NULL,
  `u_uni` varchar(255) NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'Student',
  `u_activate` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_mail`, `u_name`, `u_surname`, `u_phone`, `u_country`, `u_city`, `u_uni`, `u_password`, `role`, `u_activate`) VALUES
('deneme2@gmail.com', 'Fatma', 'Akman', '05532704508', 'Turkey', 'İzmir', 'Boğaziçi Üniversitesi', 'sena', 'Student', 1),
('deneme3@gmail.com', 'Ayşe', 'Yılmaz', '05532704508', 'Turkey', 'İstanbul', 'Abant İzzet Baysal Üniversitesi', '2', 'Student', 0),
('deneme4@gmail.com', 'Sena', 'Oz', '05532704508', 'Turkey', 'İzmir', 'Boğaziçi Üniversitesi', '2', 'Student', 1),
('deneme@gmail.com', 'Ali', 'Veli', '', '', '', 'Abant İzzet Baysal Üniversitesi', 'deneme', 'Professor', 0),
('professor2@gmail.com', 'Professor', 'Demo', '05532704508', '', '', 'Adıyaman Üniversitesi', 'demo', 'Professor', 1),
('professor@gmail.com', 'Professor', 'Demo', '05532704508', '', '', 'Adıyaman Üniversitesi', 'demo', 'Professor', 1),
('tazeyta@gmail.com', 'Admin', 'Demo', '05532704508', 'Turkey', 'İzmir', 'Boğaziçi Üniversitesi', 'sena', 'Admin', 1);

-- --------------------------------------------------------

--
-- Structure for view `Admins`
--
DROP TABLE IF EXISTS `Admins`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Admins`  AS SELECT `users`.`u_mail` AS `u_mail`, `users`.`u_name` AS `u_name`, `users`.`u_surname` AS `u_surname`, `users`.`u_phone` AS `u_phone`, `users`.`u_country` AS `u_country`, `users`.`u_city` AS `u_city`, `users`.`u_uni` AS `u_uni`, `users`.`u_password` AS `u_password`, `users`.`role` AS `role`, `users`.`u_activate` AS `u_activate` FROM `users` WHERE `users`.`role` = 'Admin' ;

-- --------------------------------------------------------

--
-- Structure for view `CourseCountByStudent`
--
DROP TABLE IF EXISTS `CourseCountByStudent`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `CourseCountByStudent`  AS SELECT `users`.`u_mail` AS `Student Mail`, count(`courseDetails`.`c_ID`) AS `Course Count` FROM (`courseDetails` join `users` on(`courseDetails`.`s_mail` = `users`.`u_mail`)) GROUP BY `courseDetails`.`s_mail` ;

-- --------------------------------------------------------

--
-- Structure for view `CurrentParticipants`
--
DROP TABLE IF EXISTS `CurrentParticipants`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `CurrentParticipants`  AS SELECT `courseDetails`.`c_ID` AS `Course ID`, `courses`.`c_name` AS `Name`, `courses`.`c_quota` AS `Quota`, count(`courseDetails`.`s_mail`) AS `Current Participant`, `courses`.`c_consent` AS `Consent`, `courses`.`c_professor_mail` AS `Professor Mail` FROM (`courseDetails` join `courses` on(`courseDetails`.`c_ID` = `courses`.`ID`)) GROUP BY `courseDetails`.`c_ID` ;

-- --------------------------------------------------------

--
-- Structure for view `ParticipantList`
--
DROP TABLE IF EXISTS `ParticipantList`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ParticipantList`  AS SELECT `courseDetails`.`s_mail` AS `s_mail`, `courses`.`ID` AS `ID`, `courses`.`c_name` AS `c_name`, `courses`.`c_final_date` AS `c_final_date`, `courses`.`c_professor_mail` AS `c_professor_mail`, `Professors`.`u_name` AS `u_name`, `Professors`.`u_surname` AS `u_surname`, `courses`.`c_credits` AS `c_credits`, `courses`.`c_description` AS `c_description` FROM (`courseDetails` join (`Professors` join `courses` on(`courses`.`c_professor_mail` = `Professors`.`u_mail`))) WHERE `courseDetails`.`c_ID` = `courses`.`ID` ;

-- --------------------------------------------------------

--
-- Structure for view `Professors`
--
DROP TABLE IF EXISTS `Professors`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Professors`  AS SELECT `users`.`u_mail` AS `u_mail`, `users`.`u_name` AS `u_name`, `users`.`u_surname` AS `u_surname`, `users`.`u_phone` AS `u_phone`, `users`.`u_country` AS `u_country`, `users`.`u_city` AS `u_city`, `users`.`u_password` AS `u_password`, `users`.`u_activate` AS `u_activate`, count(`courses`.`c_professor_mail`) AS `Course Count` FROM (`users` join `courses` on(`users`.`u_mail` = `courses`.`c_professor_mail` and `users`.`role` = 'Professor')) GROUP BY `users`.`u_mail` ;

-- --------------------------------------------------------

--
-- Structure for view `Students`
--
DROP TABLE IF EXISTS `Students`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Students`  AS SELECT `users`.`u_mail` AS `u_mail`, `users`.`u_name` AS `u_name`, `users`.`u_surname` AS `u_surname`, `users`.`u_phone` AS `u_phone`, `users`.`u_country` AS `u_country`, `users`.`u_city` AS `u_city`, `users`.`u_uni` AS `u_uni`, `users`.`u_password` AS `u_password`, `users`.`role` AS `role`, `users`.`u_activate` AS `u_activate` FROM `users` WHERE `users`.`role` = 'Student' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`Index`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_mail`),
  ADD UNIQUE KEY `u_mail` (`u_mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
