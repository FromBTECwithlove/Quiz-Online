-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 11:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(5) NOT NULL,
  `cate_title` varchar(255) DEFAULT NULL,
  `cate_des` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_title`, `cate_des`) VALUES
(1, 'Programing', 'Programing Description'),
(2, 'Security', 'Security Description'),
(3, 'SDLC', 'Software development lifecycle Description'),
(4, 'Advance Programing', 'Advance Programing Description'),
(5, 'Website Design And Development', 'Website Design And Development Description'),
(6, 'Networking', 'Networking Description'),
(7, 'DSA', 'Data Structures Algorithms Description'),
(8, 'Database', 'Database Description');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` varchar(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `date_time` datetime NOT NULL,
  `duration` time NOT NULL,
  `type` varchar(50) NOT NULL,
  `faculty_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `title`, `create_date`, `date_time`, `duration`, `type`, `faculty_id`) VALUES
('M01', 'Quiz Online PHP - Mid-Term Test', '2020-12-22 13:10:30', '2020-12-23 14:15:00', '00:30:00', 'Mid-term Test', 350004),
('M02', 'Quiz Test', '2020-12-28 15:17:53', '2020-12-29 06:20:00', '00:20:00', 'Mid-term Test', 350003);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(5) NOT NULL,
  `faculty_name` varchar(100) NOT NULL,
  `faculty_DoB` date NOT NULL,
  `faculty_gender` varchar(25) NOT NULL,
  `faculty_email` varchar(255) NOT NULL,
  `faculty_address` varchar(255) NOT NULL,
  `faculty_phone` varchar(15) NOT NULL,
  `faculty_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `faculty_DoB`, `faculty_gender`, `faculty_email`, `faculty_address`, `faculty_phone`, `faculty_password`) VALUES
(350001, 'LUU THI HOA', '2000-01-01', 'Female', 'HoaLT35001@fpt.edu.vn', 'HA NOI', '0987654310', '137#915'),
(350002, 'HO NGOC HA', '2000-01-01', 'Female', 'HaHN35002@fpt.edu.vn', 'HA NOI', '0987654311', '137#915'),
(350003, 'PHAN THI HONG NHUNG', '2000-01-01', 'Female', 'NhungPTH35003@fpt.edu.vn', 'HA NOI', '0987654312', '137#915'),
(350004, 'HUA VAN CUONG', '2000-01-01', 'Male', 'CUONGHV35004@fpt.edu.vn', 'HA NOI', '0987654313', '137#915'),
(350005, 'LUC TIEU PHUC', '2000-01-01', 'Male', 'PhucLT35005@fpt.edu.vn', 'HA NOI', '0987654314', '137#915');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ques_id` int(5) NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `correct_ans` varchar(50) NOT NULL,
  `a_ans` varchar(500) DEFAULT NULL,
  `b_ans` varchar(500) DEFAULT NULL,
  `c_ans` varchar(500) DEFAULT NULL,
  `d_ans` varchar(500) DEFAULT NULL,
  `mark` float DEFAULT NULL,
  `cate_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ques_id`, `content`, `type`, `correct_ans`, `a_ans`, `b_ans`, `c_ans`, `d_ans`, `mark`, `cate_id`) VALUES
(1, 'Which of the following function is used to get the length of a string?', 'Single Choice', 'B', 'size()', 'strlen()', 'length', 'None of the above.', 1.5, 1),
(2, 'Parent constructors are not called implicitly if the child class defines a constructor.', 'True / False', 'A', 'True', 'False', NULL, NULL, 1, 1),
(3, 'Interface constant can be override in class implementing the interface', 'True / False', 'B', 'True', 'False', NULL, NULL, 1, 1),
(4, 'Static methods can be call with class name and colon operator, $this is not available inside the method declared as static.', 'True / False', 'A', 'True', 'False', NULL, NULL, 1, 1),
(5, 'Static properties can be accessed through the object using the arrow operator ->.', 'True / False', 'B', 'True', 'False', NULL, NULL, 1, 1),
(6, 'If parent class has Final method abc(). Method abc() can be overridden in child class.', 'True / False', 'B', 'True', 'False', NULL, NULL, 1, 1),
(7, 'Parent constructors are not called implicitly if the child class defines a constructor.\r\n', 'True / False', 'A', 'True', 'False', NULL, NULL, 1, 1),
(8, 'In PHP, a class can be inherited from one base class and with multiple base classes.', 'True / False', 'B', 'True', 'False', NULL, NULL, 1, 1),
(9, 'To create instance of class new keyword is not required.', 'True / False', 'B', 'True', 'False', NULL, NULL, 1, 1),
(10, '$this is a reference to the calling object', 'True / False', 'A', 'True', 'False', NULL, NULL, 1, 1),
(11, 'The variable name is case-sensitive in PHP.', 'True / False', 'A', 'True', 'False', NULL, NULL, 1, 1),
(12, 'Which of the following variable is used to generate random numbers using PHP?', 'Single Choice', 'C', 'srand()', 'random()', 'rand()', 'None of the above.', 1.5, 1),
(13, 'Which of the following is not valid PHP code? \r\n', 'Multiple Choices', 'A,C,', '${“MyVar”} ', '$10', '$10_{“ABC”} ', '$something', 2, 1),
(14, 'What is the difference between print() and echo()?', 'Multiple Choices', 'A,B,', 'print() can be used as part of an expression, while echo() can’t', 'echo() can be used as part of an expression, while print() can’t ', 'echo() can be used in the CLI version of PHP, while print() can’t ', 'print() can be used in the CLI version of PHP, while echo() can’t ', 2, 1),
(15, 'Which of the following functions can be used to determine the integrity of a string?', 'Multiple Choices', 'A,B,C,', ' md5() ', 'sha1() ', 'crc32() ', 'str_rot13() ', 2, 1),
(16, 'Which of the following functions can be used to convert the binary data stored in a string into its hexadecimal representation?', 'Multiple Choices', 'B,D,', 'encode_hex()', 'pack() ', 'hex2bin() ', 'bin2hex()', 2, 1),
(17, '^[A-Za-z].* matches ', 'Multiple Choices', 'A,B,', ' play it again ', ' I ', '123 ', '?', 2, 1),
(18, 'What functions count elements in an array? ', 'Multiple Choices', 'A,B,', 'count ', ' Sizeof ', 'Array_Count ', 'Count_array ', 2, 1),
(19, 'Which of the following is not an SQL aggregate function?', 'Multiple Choices', 'A,B,', 'CURRENT_DATE()', 'DATE()', 'SUM ', 'AVG', 2, 1),
(20, 'The ......... function parses an English textual date or time into a Unix timestamp ', 'Multiple Choices', 'A,B,', ' strtodate() ', 'stroftime() ', ' strtotime() ', ' str_to_time() ', 2, 1),
(21, '................ Formats a local time or date according to locale settings. ', 'Multiple Choices', 'A,D,', ' strftime ', 'strgtime ', 'strhtime', 'stritime ', 2, 1),
(22, 'How will you concatenate two strings?', 'Single Choice', 'A', 'Using . operator.', 'Using + operator.', 'Using add() function', 'Using append() function', 1.5, 1),
(23, 'You must make a call to ................... to specify what time zone you want calculations to take place in before calling any date functions. ', 'Multiple Choices', 'C,D,', ' date_default_timezone_set() ', ' datedefault_timezone_set() ', 'date_defaulttimezone_set() ', 'date_default_timezoneset() ', 2, 1),
(24, '^[0-9]{5}(-[0-9]{4})?$ matches', 'Single Choice', 'A', '90001 and 90002-4323', ' 9001 and 12-4321', ' 9001 and 12-4325', ' 9001 and 12-4324', 1.5, 1),
(25, 'Which of the following function is used to check if a file exists or not?', 'Single Choice', 'D', 'fopen()', 'fread()', 'filesize()', 'file_exist()', 1.5, 1),
(26, 'Which of the following is an array containing information such as headers, paths, and script locations?', 'Single Choice', 'B', '$GLOBALS', '$_SERVER', '$_COOKIE', '$_SESSION', 1.5, 1),
(27, 'What PHP stands for?', 'Single Choice', 'B', 'Hypertext Preprocessor', 'Pre Hypertext Processor', 'Pre Hyper Processor', 'Pre Hypertext Process', 1.5, 1),
(28, 'Which of the following tags is not a valid way to begin and end a PHP code block?', 'Single Choice', 'B', '<% %>', '<? ?>', '<?=?>', '<! !>', 1.5, 1),
(29, 'Under what circumstance is it impossible to assign a default value to a parameter while declaring a function? ', 'Single Choice', 'B', 'When the parameter is Boolean', 'When the function is being declared as a member of a class', 'When the parameter is being declared as passed by reference', 'When the function contains only one parameter', 1.5, 1),
(30, 'How does the identity operator === compare two values? ', 'Single Choice', 'B', 'It converts them to a common compatible data type and then compares the resulting values', ' It returns True only if they are both of the same type and value', 'If the two values are strings, it performs a lexical comparison', 'It converts both values to strings and compares them', 1.5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ques_exam`
--

CREATE TABLE `ques_exam` (
  `exam_id` varchar(5) NOT NULL,
  `ques_id` int(5) NOT NULL,
  `id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ques_exam`
--

INSERT INTO `ques_exam` (`exam_id`, `ques_id`, `id`) VALUES
('M01', 2, 1),
('M01', 3, 2),
('M01', 4, 3),
('M01', 5, 4),
('M01', 6, 5),
('M01', 1, 6),
('M01', 12, 7),
('M01', 22, 8),
('M01', 24, 9),
('M01', 25, 10),
('M01', 26, 11),
('M01', 13, 12),
('M01', 14, 13),
('M01', 15, 14),
('M01', 16, 15),
('M01', 17, 16),
('M01', 18, 17),
('M01', 19, 18),
('M02', 2, 1),
('M02', 3, 2),
('M02', 4, 3),
('M02', 5, 4),
('M02', 6, 5),
('M02', 1, 6),
('M02', 12, 7),
('M02', 22, 8),
('M02', 24, 9),
('M02', 25, 10),
('M02', 26, 11),
('M02', 13, 12),
('M02', 14, 13),
('M02', 15, 14),
('M02', 16, 15),
('M02', 17, 16),
('M02', 18, 17),
('M02', 19, 18);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(6) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_DoB` date NOT NULL,
  `student_gender` varchar(25) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_phone` varchar(15) NOT NULL,
  `student_password` varchar(50) NOT NULL,
  `permission` int(5) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_DoB`, `student_gender`, `student_email`, `student_address`, `student_phone`, `student_password`, `permission`, `department`) VALUES
(180000, 'TRAN TRONG KIM', '1997-12-27', 'Male', 'Kimtt@fpt.edu.vn', 'HA NOI', '0355555555', '123@123a', 3, 'Student'),
(180001, 'TINH TAO TAU', '2020-11-01', 'Male', 'Tinhtv@fpt.edu.vn', 'BAC GIANG', '0999888999', '123@123a', 3, 'Student'),
(180002, 'DAT DU DON', '2000-12-10', 'Female', 'Dattt@fpt.edu.vn', 'HA NOI', '0123122121', '123@123a', 3, 'Student'),
(180003, 'TRAN TRONG KIM', '1997-12-27', 'Male', 'Kimtt@fpt.edu.vn', 'HA NOI', '0355555555', '123@123a', 3, 'Student'),
(180004, 'TINH TAO TAU', '2020-11-01', 'Male', 'Tinhtv@fpt.edu.vn', 'BAC GIANG', '0999888999', '123@123a', 3, 'Student'),
(180005, 'DAT DU DON', '2000-12-10', 'Female', 'Dattt@fpt.edu.vn', 'HA NOI', '0123122121', '123@123a', 3, 'Student'),
(180006, 'TRAN TRONG KIM', '1997-12-27', 'Male', 'Kimtt@fpt.edu.vn', 'HA NOI', '0355555555', '123@123a', 3, 'Student'),
(180007, 'TINH TAO TAU', '2020-11-01', 'Male', 'Tinhtv@fpt.edu.vn', 'BAC GIANG', '0999888999', '123@123a', 3, 'Student'),
(180008, 'DAT DU DON', '2000-12-10', 'Female', 'Dattt@fpt.edu.vn', 'HA NOI', '0123122121', '123@123a', 3, 'Student'),
(180009, 'TRAN TRONG KIM', '1997-12-27', 'Male', 'Kimtt@fpt.edu.vn', 'HA NOI', '0355555555', '123@123a', 3, 'Student'),
(180010, 'DAT DU DONNN', '2000-12-10', 'Male', 'Dattt@fpt.edu.vn', 'HA NOI', '0123122121', '123@123a', 3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `student_exam`
--

CREATE TABLE `student_exam` (
  `student_id` int(6) NOT NULL,
  `exam_id` varchar(5) NOT NULL,
  `mark` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tinhtv_admin`
--

CREATE TABLE `tinhtv_admin` (
  `id` int(5) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `img_dd` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `department` varchar(150) NOT NULL,
  `DoB` varchar(15) NOT NULL,
  `permission` varchar(1) NOT NULL,
  `note` varchar(200) NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tinhtv_admin`
--

INSERT INTO `tinhtv_admin` (`id`, `username`, `password`, `fullname`, `img_dd`, `gender`, `email`, `phone`, `department`, `DoB`, `permission`, `note`, `address`) VALUES
(1, 'admin', '191020', 'Unknow-Twizard', 'AnhT19.jpg', 'Male', 'Tinhtvbhaf180186@fpt.edu.vn', '0974959028', 'Admin', '19-10-2000', '1', 'TRUONG VAN TINH IS ADMIN', '418 Pham Van Dong Street, BTL, HN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `ques_exam`
--
ALTER TABLE `ques_exam`
  ADD KEY `ques_id` (`ques_id`),
  ADD KEY `ques_exam_ibfk_2` (`exam_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_exam`
--
ALTER TABLE `student_exam`
  ADD KEY `student_exam_ibfk_1` (`exam_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tinhtv_admin`
--
ALTER TABLE `tinhtv_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350006;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ques_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180013;

--
-- AUTO_INCREMENT for table `tinhtv_admin`
--
ALTER TABLE `tinhtv_admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`);

--
-- Constraints for table `ques_exam`
--
ALTER TABLE `ques_exam`
  ADD CONSTRAINT `ques_exam_ibfk_1` FOREIGN KEY (`ques_id`) REFERENCES `question` (`ques_id`),
  ADD CONSTRAINT `ques_exam_ibfk_2` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`);

--
-- Constraints for table `student_exam`
--
ALTER TABLE `student_exam`
  ADD CONSTRAINT `student_exam_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`),
  ADD CONSTRAINT `student_exam_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
