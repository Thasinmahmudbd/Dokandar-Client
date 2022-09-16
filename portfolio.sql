-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 05:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `AL_ID` int(11) NOT NULL,
  `Logs` longtext DEFAULT NULL,
  `Location` longtext DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`AL_ID`, `Logs`, `Location`, `Timestamp`) VALUES
(247, 'dem - Article Uploaded', NULL, '2022-06-18 13:30:06'),
(248, 'Login successful to admin panel.', NULL, '2022-06-18 15:37:12'),
(249, 'Failed attempt to login.', NULL, '2022-06-18 15:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Ad_AI_ID` int(11) NOT NULL,
  `Password` longtext DEFAULT NULL,
  `Panel_Call` longtext DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Ad_AI_ID`, `Password`, `Panel_Call`, `Timestamp`) VALUES
(1, 'thasin13913', 'c@ll_@dmin_p@nel', '2022-06-18 13:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `Art_ID` int(11) NOT NULL,
  `Art_Title` longtext DEFAULT NULL,
  `Art_Summary` longtext DEFAULT NULL,
  `Art_Tag` longtext DEFAULT NULL,
  `Art_Views` int(11) DEFAULT 0,
  `Art_Date` date DEFAULT NULL,
  `Art_Reference` longtext DEFAULT NULL,
  `Art_More` tinyint(4) DEFAULT 0,
  `Art_Image` longtext DEFAULT NULL,
  `Sorting` int(11) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`Art_ID`, `Art_Title`, `Art_Summary`, `Art_Tag`, `Art_Views`, `Art_Date`, `Art_Reference`, `Art_More`, `Art_Image`, `Sorting`, `Timestamp`) VALUES
(20, 'dem', NULL, NULL, 0, NULL, NULL, 0, NULL, 0, '2022-06-18 13:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `Edu_ID` int(11) NOT NULL,
  `Degree` longtext DEFAULT NULL,
  `Subject` longtext DEFAULT NULL,
  `CGPA` longtext DEFAULT NULL,
  `Type` longtext DEFAULT NULL,
  `Skill_Genre` longtext DEFAULT NULL,
  `Skill` longtext DEFAULT NULL,
  `Extra_Skill` longtext DEFAULT NULL,
  `Efficiency` longtext DEFAULT NULL,
  `Sorting` int(11) DEFAULT 0,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`Edu_ID`, `Degree`, `Subject`, `CGPA`, `Type`, `Skill_Genre`, `Skill`, `Extra_Skill`, `Efficiency`, `Sorting`, `Timestamp`) VALUES
(3, 'B.Sc', 'Computer Science & Engineering.', '3.36', 'edu', NULL, NULL, NULL, NULL, 1, '2022-06-15 11:17:47'),
(4, 'HSC', 'Science.', '5.00', 'edu', NULL, NULL, NULL, NULL, 2, '2022-06-15 11:18:30'),
(5, 'SSC', 'Science.', '5.00', 'edu', NULL, NULL, NULL, NULL, 3, '2022-06-15 11:18:56'),
(6, NULL, NULL, NULL, 'skill', 'Programming', 'PHP, Javascript, SQL', NULL, NULL, 4, '2022-06-15 11:19:53'),
(7, NULL, NULL, NULL, 'skill', 'Front-End', 'HTML 5, CSS 3, Js/DOM', NULL, NULL, 5, '2022-06-15 11:20:35'),
(8, NULL, NULL, NULL, 'skill', 'Framework', 'Laravel, Sass, Bootstrap', NULL, NULL, 6, '2022-06-15 11:21:02'),
(9, NULL, NULL, NULL, 'skill', 'Tools', 'Git, VS Code, Atom, GitHub, CodePen', NULL, NULL, 7, '2022-06-15 11:21:27'),
(10, NULL, NULL, NULL, 'skill', 'Database', 'MySQL', NULL, NULL, 8, '2022-06-15 11:21:53'),
(11, NULL, NULL, NULL, 'skill', 'Office Tools', 'MS Word, PowerPoint, Visio', NULL, NULL, 9, '2022-06-15 11:22:17'),
(12, NULL, NULL, NULL, 'skill', 'Languages', 'Bengali, English', NULL, NULL, 10, '2022-06-15 11:22:38'),
(13, NULL, NULL, NULL, 'extra', NULL, NULL, 'Graphic Design', 'Industry Level', 11, '2022-06-15 11:24:08'),
(14, NULL, NULL, NULL, 'extra', NULL, NULL, 'Photoshop', 'Basic Level', 12, '2022-06-15 11:24:32'),
(15, NULL, NULL, NULL, 'extra', NULL, NULL, 'Video Editing', 'Basic Level', 13, '2022-06-15 11:24:48'),
(16, NULL, NULL, NULL, 'extra', NULL, NULL, '3D Modeling', 'Basic Level', 14, '2022-06-15 11:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `Ex_ID` int(11) NOT NULL,
  `Ex_Name` longtext DEFAULT NULL,
  `Ex_Type` longtext DEFAULT NULL,
  `Ex_Version` longtext DEFAULT NULL,
  `Ex_IDE` longtext DEFAULT NULL,
  `Ex_Use` longtext DEFAULT NULL,
  `Ex_Tag` longtext DEFAULT NULL,
  `Ex_Git` longtext DEFAULT NULL,
  `Ex_Article` int(11) DEFAULT 0,
  `Ex_Liveview` longtext DEFAULT NULL,
  `Ex_Video` int(11) DEFAULT 0,
  `Ex_Image` longtext DEFAULT NULL,
  `Sorting` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `frameworks`
--

CREATE TABLE `frameworks` (
  `Fw_ID` int(11) NOT NULL,
  `Fw_Title` longtext DEFAULT NULL,
  `Fw_Summary` longtext DEFAULT NULL,
  `Fw_Tag` longtext DEFAULT NULL,
  `Fw_Image` longtext DEFAULT NULL,
  `Fw_Name` longtext DEFAULT NULL,
  `Fw_Type` longtext DEFAULT NULL,
  `Fw_Version` longtext DEFAULT NULL,
  `Fw_Documentation` longtext DEFAULT NULL,
  `Fw_Extension` longtext DEFAULT NULL,
  `Fw_Git` longtext DEFAULT NULL,
  `Fw_Article` int(11) DEFAULT 0,
  `Fw_Liveview` longtext DEFAULT NULL,
  `Fw_Video` int(11) DEFAULT 0,
  `Sorting` int(11) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `full_articles`
--

CREATE TABLE `full_articles` (
  `Unique_ID` int(11) NOT NULL,
  `Art_ID` int(11) NOT NULL,
  `Section` longtext DEFAULT NULL,
  `Main_Title` longtext DEFAULT NULL,
  `Sub_Title` longtext DEFAULT NULL,
  `Para` longtext DEFAULT NULL,
  `ImgPara_Img` longtext DEFAULT NULL,
  `ImgPara_Para` longtext DEFAULT NULL,
  `ParaImg_Img` longtext DEFAULT NULL,
  `ParaImg_Para` longtext DEFAULT NULL,
  `Image` longtext DEFAULT NULL,
  `Code` longtext DEFAULT NULL,
  `Language` longtext DEFAULT NULL,
  `Link_Name` longtext DEFAULT NULL,
  `Link_URL` longtext DEFAULT NULL,
  `Sorting` int(11) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_infos`
--

CREATE TABLE `personal_infos` (
  `ID` int(11) NOT NULL,
  `Name` longtext DEFAULT NULL,
  `DP` longtext DEFAULT NULL,
  `Interested_In` longtext DEFAULT NULL,
  `Organization` longtext DEFAULT NULL,
  `Fiver_Link` longtext DEFAULT NULL,
  `Objective` longtext DEFAULT NULL,
  `CV` longtext DEFAULT NULL,
  `Phone_One` longtext DEFAULT NULL,
  `Phone_Two` longtext DEFAULT NULL,
  `Github` longtext DEFAULT NULL,
  `Linkedin` longtext DEFAULT NULL,
  `Youtube` longtext DEFAULT NULL,
  `Facebook` longtext DEFAULT NULL,
  `Twitter` longtext DEFAULT NULL,
  `Email` longtext DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_infos`
--

INSERT INTO `personal_infos` (`ID`, `Name`, `DP`, `Interested_In`, `Organization`, `Fiver_Link`, `Objective`, `CV`, `Phone_One`, `Phone_Two`, `Github`, `Linkedin`, `Youtube`, `Facebook`, `Twitter`, `Email`, `Timestamp`) VALUES
(1, 'Thasin Mahmud', 'Thasin Mahmud.jpg', 'Wed-Design, Web-Development & UX/UI-Design.', 'Currently looking for a job.', 'https://www.fiverr.com/thasin_bd?up_rollout=true', 'Web development gives me the opportunity to express myself creatively on the internet. If you have an idea you would like to try out let me know. I\'m constantly looking for challenges. I would love to work with you.', 'Thasin Mahmud CV.pdf', '01984983948', '01757758904', 'https://github.com/Thasinmahmudbd', 'https://www.linkedin.com/in/thasinmahmudbd', 'https://www.youtube.com/channel/UCSd8a-GJlke-MpqGJDZMssQ', 'https://www.facebook.com/thasinmahmud.bd/', 'https://twitter.com/ThasinMahmudBD', 'thasinmahmud.bd@gmail.com', '2022-06-13 15:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Pro_ID` int(11) NOT NULL,
  `Pro_Title` longtext DEFAULT NULL,
  `Pro_Summary` longtext DEFAULT NULL,
  `Pro_Tag` longtext DEFAULT NULL,
  `Pro_Git` longtext DEFAULT NULL,
  `Pro_Article` int(11) DEFAULT 0,
  `Pro_Liveview` longtext DEFAULT NULL,
  `Pro_Video` int(11) DEFAULT 0,
  `Sorting` int(11) DEFAULT NULL,
  `Pro_Image` longtext DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `Vid_ID` int(11) NOT NULL,
  `Vid_Name` longtext DEFAULT NULL,
  `Gallery_Tag` longtext DEFAULT NULL,
  `Video_Tag` longtext DEFAULT NULL,
  `Embed` longtext DEFAULT NULL,
  `Sorting` int(11) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`AL_ID`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Ad_AI_ID`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Art_ID`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`Edu_ID`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`Ex_ID`);

--
-- Indexes for table `frameworks`
--
ALTER TABLE `frameworks`
  ADD PRIMARY KEY (`Fw_ID`);

--
-- Indexes for table `full_articles`
--
ALTER TABLE `full_articles`
  ADD PRIMARY KEY (`Unique_ID`);

--
-- Indexes for table `personal_infos`
--
ALTER TABLE `personal_infos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`Pro_ID`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`Vid_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `AL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Ad_AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `Art_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `Edu_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `Ex_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `frameworks`
--
ALTER TABLE `frameworks`
  MODIFY `Fw_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `full_articles`
--
ALTER TABLE `full_articles`
  MODIFY `Unique_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_infos`
--
ALTER TABLE `personal_infos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `Pro_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `Vid_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
