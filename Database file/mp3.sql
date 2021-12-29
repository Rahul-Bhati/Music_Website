-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 02:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `pass`) VALUES
('rahul@gmail.com', 'rahul123');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `sn` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `album_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`sn`, `code`, `album_name`, `description`, `category_code`, `status`) VALUES
(1, 'Aa4589_1', 'Top 10 2019', 'All Time Favorite Punjabi Song', 'a12349', '0'),
(2, 'Aa1458_2', 'Age 19', 'Jass Manak\'s Debut Album', 'a12349', '0'),
(3, '045689_3', 'Akhil ', 'Akhil Top Punjabi Songs', 'a12349', '0'),
(4, 'a01249_4', 'Guru Randhawa', 'Superhit Song Of Guru', 'a12349', '0'),
(5, 'a12345_5', 'Top 10', 'Haryanvi Top 10 Hits', 'Aa1459', '0'),
(6, 'Aa3568_6', 'Top 10 2019 Haryanvi Song', 'Haryanvi Top Music', 'Aa1459', '0'),
(7, 'a45679_7', 'Top 40 Hits', 'Haryanvi Best Of Songs', 'Aa1459', '0'),
(8, 'a03579_8', 'Haryanvi DJ song', 'Top Haryanvi dj superhit', 'Aa1459', '0'),
(9, 'Aa2347_9', 'Hariyala Banna', 'Ravindra Upadhyay,\r\nKamal Choudhary', 'A02378', '0'),
(10, 'a13579_10', 'Moruda', 'DJ Rajasthani Song', 'A02378', '0'),
(11, '012379_11', 'Keshriyo', 'Red Ribbon Ent Pvt Ltd', 'A02378', '0'),
(12, '023489_12', 'Ghoomar', 'Veena Music\r\nSeema Mishra', 'A02378', '0'),
(13, '134679_13', 'Sukh-E', 'Sukh-E Punjabi singer Top Songs Album', 'a12349', '0'),
(14, 'Aa2359_14', 'Top 10 2019', 'Bollywood Best Songs', 'a04567', '0'),
(15, 'A14789_15', 'Sad Songs', 'Bollywood Top Sad Songs', 'a04567', '0'),
(16, '345678_16', 'Old Hits', 'old 90\'s song', 'a04567', '0'),
(17, 'Aa1279_17', 'Top 10 2020', 'Bollywood Top Songs', 'a04567', '0'),
(18, 'a56789_18', 'Kabir Singh', 'Kabir Singh Movie Songs', 'a04567', '0'),
(19, 'a01589_19', 'Gulzaar ChhaniWale ', 'Best Haryanvi Song', 'Aa1459', '0'),
(20, 'Aa4567_20', 'DJ Song', 'Rajasthni DJ Song', 'A02378', '0'),
(21, 'A01689_21', 'Top 5 ', 'Hollywood Song', 'a02678', '0'),
(22, 'Aa0478_22', 'Alan Walker', 'Alan Top Songs', 'a02678', '0'),
(23, 'Aa0235_23', 'Top 2018', 'Op English Song', 'a02678', '0');

-- --------------------------------------------------------

--
-- Table structure for table `album_category`
--

CREATE TABLE `album_category` (
  `sn` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album_category`
--

INSERT INTO `album_category` (`sn`, `code`, `category_name`, `status`) VALUES
(1, 'a12349', 'Punjabi', '0'),
(2, 'a04567', 'Bollywood', '0'),
(3, 'Aa1459', 'Haryanvi', '0'),
(4, 'A02378', 'Rajasthani', '0'),
(5, 'a02678', 'Hollywood', '0');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `album_code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `sn` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `album_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`sn`, `code`, `song_name`, `description`, `album_code`, `status`) VALUES
(1, 'A02678_1', 'Badnam', 'Mankirt Aulakh and Parmish Verma', 'Aa4589_1', '0'),
(2, 'Aa3678_2', 'Nira Ishq', 'Guri song', 'Aa4589_1', '0'),
(3, 'Aa4678_3', 'Relation', 'Bang Music by Nikk', 'Aa4589_1', '0'),
(4, 'a01457_4', 'Viah', 'Jass Manak', 'Aa4589_1', '0'),
(5, 'A04578_5', 'Sarkar', 'Jaura Phagwara', 'Aa4589_1', '0'),
(6, 'a02579_6', 'She Don\'t Know', 'Millind Gaba', 'Aa4589_1', '0'),
(7, 'A01238_7', 'Girlfriend', 'jass Manak song', 'Aa4589_1', '0'),
(8, 'a13489_8', 'Sheh', 'Singga and Ellde Fazilka', 'Aa4589_1', '0'),
(9, 'A13469_9', 'Wang Da Naap', 'Ammy Virk', 'Aa4589_1', '0'),
(10, 'a23589_10', '8 Parche', 'Baani Sandhu and Ghur Sandhu', 'Aa4589_1', '0'),
(11, 'A01347_11', 'Viah', 'Jass Manak', 'Aa1458_2', '0'),
(12, 'Aa0368_12', 'Kali Range(Manak Da Munda)', 'Jass Manak Age 19 and Bhomia', 'Aa1458_2', '0'),
(13, 'A03456_13', 'Age 19', 'Divine and Jass Manak', 'Aa1458_2', '0'),
(14, 'a01679_14', 'Parada', 'Satti Dhillon and Jass Manak', 'Aa1458_2', '0'),
(15, '145689_15', 'Girlfriend', 'Jass Manak Song', 'Aa1458_2', '0'),
(16, 'a01235_16', 'Lehanga', 'Jass Song', 'Aa1458_2', '0'),
(17, '234689_17', 'Zindagi', 'Akhil Song', '045689_3', '0'),
(18, 'Aa0157_18', 'Teri Kami', 'Akhil Best song', '045689_3', '0'),
(19, 'Aa4568_19', 'Rukh', 'Best of Akhil Song', '045689_3', '0'),
(20, 'Aa2358_20', 'Life', 'Akhil Song', '045689_3', '0'),
(21, '013459_21', 'Khaab', 'All time Favorite', '045689_3', '0'),
(22, 'A01789_22', 'Gani', 'Akhil Song', '045689_3', '0'),
(23, 'a01249_23', 'Akh Lagdi', 'Song of Akhil', '045689_3', '0'),
(24, '245689_24', 'Rang Gora', 'Akhil Best Song', '045689_3', '0'),
(25, '023456_25', 'Yaar Mod Do', 'Guru ft Mallind Gaba', 'a01249_4', '0'),
(26, 'a02368_26', 'Suit', 'Guru and Arjun', 'a01249_4', '0'),
(27, '023569_27', 'Lahore', 'Guru Best Song', 'a01249_4', '0'),
(28, 'Aa1678_28', 'Ishq Tera', 'Guru Randhawa', 'a01249_4', '0'),
(29, 'a01689_29', 'High Rated Gabru', 'Guru Randhawa Song', 'a01249_4', '0'),
(30, '136789_30', 'Banja Tu Meri Rani', 'Guru Randhawa Song', 'a01249_4', '0'),
(31, '023469_31', 'Mahendi Wale Hath', 'Guru Randhawa Song', 'a01249_4', '0'),
(32, 'A23678_32', 'Insane', 'Sukh-E and Bhomiea', '134679_13', '0'),
(33, 'Aa3469_33', 'Jaguar', 'Sukh-E Bhomia Song', '134679_13', '0'),
(34, 'a01569_34', 'Bamb', 'Sukh-E Muzical Doctorz', '134679_13', '0'),
(35, 'A14589_35', 'All Black Su', 'Sukh-E Raftar', '134679_13', '0'),
(36, '235678_36', 'Video Bana DE', 'Sukh-E Muzical Doctorz Astha Gill', '134679_13', '0'),
(37, '012489_37', 'Sniper', 'Sukh-E Muzical Doctorz ft Raftar', '134679_13', '0'),
(38, '013456_38', 'Superstar', 'Sukh-E Song', '134679_13', '0'),
(39, '234678_39', 'Suicide', 'Sukh-E Muzical Doctorz', '134679_13', '0'),
(40, 'a13478_40', 'Sad Song', 'Sukh-E Song', '134679_13', '0'),
(41, '045678_41', '440 volt', 'Vishal Dadlani Sultan Movie Song', 'Aa2359_14', '0'),
(42, 'A04578_42', 'Aaj Unse Milna hai', 'Pream Ratan Dhan Payo', 'Aa2359_14', '0'),
(43, 'Aa0479_43', 'Bekhayali', 'Kabir Singh Movie Song', 'A14789_15', '0'),
(44, 'A03478_44', 'Teri Meri', 'Bodygard Salman khan movie song', 'A14789_15', '0'),
(45, 'a25689_45', 'Khat Mene', 'best of 90\'s', '345678_16', '0'),
(46, 'A01367_46', 'Gaa Rah Hoon', 'Dil ka kya kasoor Movie song', '345678_16', '0'),
(47, 'a01359_47', 'Apna Time Aayega', 'Gully Boy Movie Song', 'Aa1279_17', '0'),
(48, '012359_48', 'Lo Safar', 'Baaghi 2 Movie Song', 'Aa1279_17', '0'),
(49, 'A12478_49', 'Tujhe Kitna Chhane ', 'Kabir singh movie song', 'Aa1279_17', '0'),
(50, 'Aa2346_50', 'Muqabla', 'Street Dancer 3D movie Song', 'Aa1279_17', '0'),
(51, 'a12345_51', 'Tera Ban Jauga', 'Shahid ', 'a56789_18', '0'),
(52, '123458_52', 'Tujhe Kitna Chhane ', 'Kabir Singh song', 'a56789_18', '0'),
(53, 'A24679_53', 'Bekhayali', 'Kabir Singh Song', 'a56789_18', '0'),
(54, 'A13489_54', 'Middle Class', 'Gulzaar Song', 'a01589_19', '0'),
(55, 'A05789_55', 'GodFather', 'Gulzaar Song', 'a01589_19', '0'),
(56, 'a01569_56', 'Desi PUBG', 'Gillzaar Song (Kartoohs)', 'a01589_19', '0'),
(57, 'A02479_57', 'Binna Baat', 'DJ Song', 'Aa4567_20', '0'),
(58, '134679_58', 'Mere Ser Per', 'DJ song', 'Aa4567_20', '0'),
(59, 'A13679_59', 'Hey Mama', 'David Guetta', 'A01689_21', '0'),
(60, '012459_60', 'Hey Mama', 'David Guetta', 'A01689_21', '0'),
(61, 'A04578_61', 'Bad Boy', 'Best Song', 'A01689_21', '0'),
(62, 'a23789_62', 'Not Gonna Die', 'Skillet', 'A01689_21', '0'),
(63, '245678_63', 'Safari', 'artist-Serena ', 'A01689_21', '0'),
(64, 'A45678_64', 'Faded', 'Alan Walker', 'A01689_21', '0'),
(65, 'Aa3568_65', 'On My Way', 'Alan Walker', 'Aa0478_22', '0'),
(66, 'A01235_66', 'Alex_Rus', 'Alex', 'Aa0478_22', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sn` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sn`, `code`, `name`, `email`, `pass`, `phone`, `dob`, `gender`) VALUES
(1, '013579_1', 'Rahul Bhati', 'rb083380@gmail.com', 'rahul123', '09001285492', '2001-06-08', 'Male');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
