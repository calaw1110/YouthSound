-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-05-06 17:36:36
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `musicweb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `tmember`
--

CREATE TABLE `tmember` (
  `mID` int(10) UNSIGNED NOT NULL COMMENT '會員編號',
  `mUsername` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT '會員帳號',
  `mPwd` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT '會員密碼',
  `mEmail` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT '會員信箱',
  `mSignUpDate` date NOT NULL COMMENT '會員註冊日',
  `mProfilePic` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT '會員照片',
  `mNickname` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT '會員暱稱',
  `mIntro` varchar(500) CHARACTER SET utf8mb4 NOT NULL COMMENT '會員介紹'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `tmember`
--

INSERT INTO `tmember` (`mID`, `mUsername`, `mPwd`, `mEmail`, `mSignUpDate`, `mProfilePic`, `mNickname`, `mIntro`) VALUES
(2, 'calaw1110', '79cdafb6293341b8cd9eb75bba8502cf', 'calaw1110@gmail.com', '2020-05-05', 'assets/images/profile-pic/10444149-1.jpg', 'calaw1110', ''),
(3, 'calaw1111', '79cdafb6293341b8cd9eb75bba8502cf', 'calaw1111@gmail.com', '2020-05-05', 'assets/images/profile-pic/10444149-1.jpg', 'æ²æ™º', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `tmember`
--
ALTER TABLE `tmember`
  ADD PRIMARY KEY (`mID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `tmember`
--
ALTER TABLE `tmember`
  MODIFY `mID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '會員編號', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
