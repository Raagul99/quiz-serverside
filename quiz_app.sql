-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 06:35 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `q_num` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `question_type` varchar(255) NOT NULL,
  `question_option_1` varchar(255) NOT NULL,
  `question_option_2` varchar(255) NOT NULL,
  `question_option_3` varchar(255) NOT NULL,
  `question_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `quiz_id`, `q_num`, `question_text`, `question_type`, `question_option_1`, `question_option_2`, `question_option_3`, `question_answer`) VALUES
(2416, 113, 1, 'Which automobile brand introduced the first mass-produced car?', 'MCQ', 'Chevrolet', 'Mercedes-Benz', 'Toyota', 'Ford'),
(2417, 113, 2, 'What is the primary function of a catalytic converter in a car?', 'MCQ', 'Increase fuel efficiency', 'Reduce engine noise', 'Enhance suspension', 'Convert harmful gases into less harmful ones'),
(2418, 113, 3, 'Which component of a car\'s transmission is responsible for changing gears?', 'MCQ', 'Clutch', 'Drive shaft', ' Differential', 'Gearbox'),
(2419, 113, 4, 'What type of engine does a hybrid car typically have?', 'MCQ', 'Diesel', 'Rotary', 'Electric', 'Combustion'),
(2420, 113, 5, 'Which safety feature in cars is designed to inflate upon collision impact to protect passengers?', 'MCQ', 'Seat belts', 'Roll bars', 'Side impact beams', 'Airbags'),
(2452, 123, 1, 'What is the largest animal on Earth by weight?', 'MCQ', 'African Elephant', 'Giraffe', 'Polar Bear', 'Blue Whale'),
(2453, 123, 2, 'Which of the following animals is not a marsupial?', 'MCQ', 'Kangaroo', ' Koala', 'Opossum', 'Platypus'),
(2454, 123, 3, 'What is the top speed of a cheetah, the fastest land animal?', 'MCQ', '50 mph (80 km/h)', '60 mph (97 km/h)', '80 mph (129 km/h)', '70 mph (113 km/h)'),
(2455, 123, 4, 'What is the natural habitat of a polar bear?', 'MCQ', 'Rainforest', ' Desert', 'Savannah', 'Arctic Tundra'),
(2456, 123, 5, 'How many legs does a spider have?', 'MCQ', '6', '10', '12', '8'),
(2457, 123, 6, 'Which of the following animals is cold-blooded?', 'MCQ', 'Dog', ' Cat', 'Rabbit', 'Snake'),
(2458, 123, 7, 'What is the largest species of big cat?', 'MCQ', 'Lion', 'Jaguar', 'Leopard', 'Tiger'),
(2459, 123, 8, 'Which bird is known for its ability to mimic human speech?', 'MCQ', 'Crow', ' Owl', 'Pigeon', 'Parrot'),
(2460, 123, 9, 'What is the only mammal capable of true flight?', 'MCQ', 'Flying Squirrel', ' Eagle', 'Hummingbird', 'Bat'),
(2461, 123, 10, 'Which of the following animals is not a herbivore?', 'MCQ', 'Cow', 'Horse', 'Rabbit', 'Lion'),
(2467, 113, 6, 'Which car manufacturer introduced the first mass-produced hybrid vehicle?', 'MCQ', 'Ford', 'Chevrolet', 'Honda', 'Toyota'),
(2468, 113, 7, 'What does ABS stand for in automotive terminology?', 'MCQ', 'Anti-Brake System', 'Advanced Brake Solution', 'Automatic Brake System', 'Anti-lock Braking System'),
(2469, 113, 8, 'Which country is known for producing the legendary sports car brand Ferrari?', 'MCQ', 'Germany', 'France', 'United Kingdom', ' Italy'),
(2470, 113, 9, 'In automotive engineering, what does the acronym \'MPG\' represent?', 'MCQ', 'Miles Per Gear', 'Minutes Per Gallon', 'Maximum Performance Gauge', 'Miles Per Gallon'),
(2471, 113, 10, 'What is the purpose of a turbocharger in an internal combustion engine?', 'MCQ', 'Increase fuel efficiency', 'Enhance engine sound', 'Reduce emissions', 'Improve acceleration'),
(2492, 127, 1, '', 'MCQ', '', '', '', ''),
(2493, 127, 2, '', 'MCQ', '', '', '', ''),
(2494, 127, 3, '', 'MCQ', '', '', '', ''),
(2495, 127, 4, '', 'MCQ', '', '', '', ''),
(2496, 127, 5, '', 'MCQ', '', '', '', ''),
(2497, 127, 6, '', 'MCQ', '', '', '', ''),
(2498, 127, 7, '', 'MCQ', '', '', '', ''),
(2499, 127, 8, '', 'MCQ', '', '', '', ''),
(2500, 127, 9, '', 'MCQ', '', '', '', ''),
(2501, 127, 10, '', 'MCQ', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_topic` varchar(255) NOT NULL,
  `quiz_timelimit` int(11) NOT NULL,
  `quiz_difficulty` int(11) NOT NULL,
  `quiz_scoringsystem` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_topic`, `quiz_timelimit`, `quiz_difficulty`, `quiz_scoringsystem`) VALUES
(113, 'Cars', 5, 1, 10),
(123, 'Animals', 10, 2, 10),
(127, 'Planets', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_history`
--

CREATE TABLE `quiz_history` (
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_history`
--

INSERT INTO `quiz_history` (`user_id`, `quiz_id`, `score`, `date`) VALUES
(5, 123, 9, '0000-00-00 00:00:00'),
(5, 113, 2, '0000-00-00 00:00:00'),
(5, 113, 2, '0000-00-00 00:00:00'),
(5, 113, 2, '0000-00-00 00:00:00'),
(5, 113, 2, '0000-00-00 00:00:00'),
(5, 123, 3, '0000-00-00 00:00:00'),
(5, 123, 3, '0000-00-00 00:00:00'),
(5, 123, 3, '0000-00-00 00:00:00'),
(5, 123, 5, '0000-00-00 00:00:00'),
(5, 123, 3, '0000-00-00 00:00:00'),
(5, 123, 3, '0000-00-00 00:00:00'),
(5, 113, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_review`
--

CREATE TABLE `quiz_review` (
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_review`
--

INSERT INTO `quiz_review` (`user_id`, `quiz_id`, `review`, `rating`) VALUES
(5, 113, 'Good', 5),
(5, 113, 'bad', 1),
(5, 113, 'Bad', 5),
(5, 113, 'Average', 5),
(5, 113, 'Average', 1),
(5, 113, 'Average', 1),
(5, 113, '', 1),
(5, 113, '', 1),
(5, 113, '', 1),
(5, 123, 'okay', 1),
(5, 123, 'bla', 1),
(5, 123, '', 1),
(5, 123, '', 1),
(5, 123, '', 1),
(5, 123, '', 1),
(5, 123, '11', 1),
(5, 123, '11', 1),
(5, 123, '11', 3),
(5, 123, '22', 1),
(5, 123, '22', 4),
(5, 123, '22', 4),
(5, 123, '', 1),
(5, 123, '', 1),
(5, 123, '', 1),
(5, 113, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`) VALUES
(3, 'Ragul', 'Ragul@gmail.com', 'Ragul@123'),
(5, 'nikky', 'nikky@gmail.com', '123'),
(6, 'hari', 'hari@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_history`
--
ALTER TABLE `quiz_history`
  ADD KEY `quizz` (`quiz_id`),
  ADD KEY `userr` (`user_id`);

--
-- Indexes for table `quiz_review`
--
ALTER TABLE `quiz_review`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2502;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_history`
--
ALTER TABLE `quiz_history`
  ADD CONSTRAINT `quizz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userr` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_review`
--
ALTER TABLE `quiz_review`
  ADD CONSTRAINT `quiz_review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_review_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
