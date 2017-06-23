-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2017 年 06 月 23 日 11:39
-- 伺服器版本: 5.7.18-0ubuntu0.16.04.1
-- PHP 版本： 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `invoice`
--

CREATE TABLE `invoice` (
  `Code` int(11) NOT NULL,
  `Member_Code` int(11) NOT NULL,
  `Recipient_GetTime` time NOT NULL,
  `Recipient_Data` datetime NOT NULL,
  `Recipient_Address` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `GetTimeHours` varchar(2) NOT NULL,
  `totalprice` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `invoice`
--

INSERT INTO `invoice` (`Code`, `Member_Code`, `Recipient_GetTime`, `Recipient_Data`, `Recipient_Address`, `status`, `GetTimeHours`, `totalprice`) VALUES
(37, 5, '18:00:33', '2017-06-06 17:06:50', '高雄市楠梓區高雄大學路700號', 'yes', '18', 43912),
(38, 6, '20:30:44', '2017-06-06 17:12:34', '忠孝東路走九遍', 'yes', '20', 51009),
(39, 1, '19:56:34', '2017-06-06 19:26:38', '北市', 'yes', '19', 19764),
(45, 4, '13:04:27', '2017-06-07 12:34:35', '高雄市楠梓區大學100號', 'yes', '13', 10729),
(41, 4, '00:36:14', '2017-06-07 00:06:28', '高雄市楠梓區大學100號', 'yes', '00', 130),
(42, 5, '18:25:37', '2017-06-07 00:55:57', '高雄市楠梓區高雄大學路200號', 'yes', '18', 550),
(43, 9, '02:03:15', '2017-06-07 01:33:42', '喜馬拉雅山', 'yes', '02', 10105),
(46, 2, '13:36:32', '2017-06-07 13:06:55', '高雄市楠梓區大學100號', 'no', '13', 10169),
(47, 2, '13:39:11', '2017-06-07 13:09:22', '台北市', 'no', '13', 239),
(48, 6, '13:50:06', '2017-06-07 13:20:09', '高雄市旗山區大德里中學路10號', 'no', '13', 1797),
(49, 5, '15:00:27', '2017-06-07 13:20:48', '圖資', 'no', '15', 520),
(50, 4, '14:59:00', '2017-06-07 13:29:54', '高雄市楠梓區大學100號', 'no', '14', 8830);

-- --------------------------------------------------------

--
-- 資料表結構 `list`
--

CREATE TABLE `list` (
  `Code` int(11) NOT NULL,
  `invoice_Code` int(11) NOT NULL,
  `Produce_Code` int(11) NOT NULL,
  `Total_Amount` int(11) NOT NULL,
  `Total_Sum` int(11) NOT NULL,
  `Remarks` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `list`
--

INSERT INTO `list` (`Code`, `invoice_Code`, `Produce_Code`, `Total_Amount`, `Total_Sum`, `Remarks`) VALUES
(48, 37, 20, 1, 52, '微糖去冰'),
(47, 37, 18, 1, 45, '無'),
(46, 37, 15, 5, 43500, '無'),
(45, 37, 11, 2, 100, '不要薑片'),
(49, 37, 22, 1, 50, '無'),
(50, 37, 25, 2, 80, '無'),
(51, 37, 26, 1, 55, '無'),
(52, 38, 9, 1, 30, '無'),
(53, 38, 10, 6, 240, '無'),
(54, 38, 11, 2, 100, '無'),
(55, 38, 11, 9, 450, '無'),
(56, 38, 13, 2, 100, '無'),
(57, 38, 14, 3, 240, '無'),
(58, 38, 15, 1, 8700, '無'),
(59, 38, 16, 2, 80, '無'),
(60, 38, 20, 4, 208, '無'),
(61, 38, 22, 2, 100, '無'),
(62, 38, 22, 3, 150, '無'),
(63, 38, 23, 3, 150, '無'),
(64, 38, 24, 1, 30, '無'),
(65, 38, 25, 6, 240, '無'),
(66, 38, 26, 3, 165, '無'),
(67, 38, 28, 4, 39996, '無'),
(68, 39, 9, 1, 30, '無'),
(69, 39, 10, 1, 40, '無'),
(70, 39, 11, 2, 100, '無'),
(71, 39, 12, 7, 490, '無'),
(72, 39, 13, 3, 150, '無'),
(73, 39, 14, 1, 80, '無'),
(74, 39, 15, 2, 17400, '無'),
(75, 39, 17, 2, 110, '無'),
(76, 39, 20, 12, 624, '無'),
(77, 39, 22, 8, 400, '無'),
(78, 39, 24, 1, 30, '無'),
(79, 39, 25, 7, 280, '無'),
(102, 45, 28, 1, 9999, '無'),
(101, 45, 13, 14, 700, '無'),
(82, 41, 22, 1, 50, '無'),
(83, 41, 27, 2, 50, '無'),
(84, 42, 13, 5, 250, '無'),
(85, 42, 16, 2, 80, '無'),
(86, 42, 19, 1, 25, '無'),
(87, 42, 21, 2, 80, '無'),
(88, 42, 24, 1, 30, '無'),
(89, 42, 26, 1, 55, '無'),
(90, 43, 11, 4, 200, '無'),
(91, 43, 15, 1, 8700, '無'),
(92, 43, 18, 7, 315, '無'),
(93, 43, 21, 3, 120, '無'),
(94, 43, 22, 8, 400, '無'),
(95, 43, 25, 3, 120, '無'),
(96, 43, 26, 4, 220, '無'),
(103, 46, 12, 2, 140, '無'),
(104, 46, 28, 1, 9999, '要大'),
(105, 47, 18, 1, 45, '無'),
(106, 47, 20, 2, 104, '無'),
(107, 47, 24, 2, 60, '無'),
(108, 48, 10, 4, 160, '無'),
(109, 48, 12, 1, 70, '無'),
(110, 48, 14, 9, 720, '無'),
(111, 48, 18, 2, 90, '無'),
(112, 48, 20, 1, 52, '無'),
(113, 48, 21, 3, 120, '無'),
(114, 48, 23, 2, 100, '無'),
(115, 48, 24, 6, 180, '無'),
(116, 48, 26, 5, 275, '無'),
(117, 49, 10, 1, 40, '不要小黃瓜'),
(118, 49, 12, 2, 140, '無'),
(119, 49, 14, 1, 80, '無'),
(120, 49, 19, 2, 50, '全糖正常冰'),
(121, 49, 22, 1, 50, '無'),
(122, 49, 23, 1, 50, '無'),
(123, 49, 26, 1, 55, '無'),
(124, 49, 27, 1, 25, '無'),
(125, 50, 9, 2, 60, '無'),
(126, 50, 10, 1, 40, '無'),
(127, 50, 15, 1, 8700, '無');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `code` int(3) NOT NULL,
  `UID` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `job` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `Bday` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `other` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`code`, `UID`, `pwd`, `name`, `gender`, `job`, `email`, `phone`, `Bday`, `address`, `other`) VALUES
(1, 'jack', '21427', '陳sss', 'male', '學生', '666@33', 99999999, '2017-05-09', '北市', 'user'),
(2, 'root', '123', 'admin', '.', '教師', '.', 1, '2017-05-14', '.', 'admin'),
(3, 'tina', '123', 'Tina', 'female', '上班族', 'tina@tina', 11, '2015-11-18', 'tina city', 'user'),
(4, 'tocyen', 'u06jo6bp4', '炎為認', '女', '瑜珈老師', 'tocyen@gmail.com', 978787878, '2017-05-16', '高雄市楠梓區大學100號', 'user'),
(5, 'ber0602', 'ber0602', '蔡芸庭', '女', '學生', 'joan86060202@gmail.com', 972602602, '1997-06-02', '高雄市楠梓區高雄大學路700號', 'user'),
(6, 'crazy', '13579', '王正義', '男', '設計師', 'crazy19970421@gmail.com', 988888888, '1997-04-21', '高雄市旗山區大德里中學路10號', 'user'),
(7, 'aaa', 'aaa', '嚴唯任', 'female', '教師', 'aaa@gmail.com', 741414141, '2017-06-26', '地球', 'user'),
(8, 'aaaa', 'aaaa', '嚴唯任', 'male', '教師', 'aaa@gmail.com', 7584251, '2017-06-04', 'aaa', 'user'),
(9, 'ccccc', 'zzzzz', '王王王', 'female', '瑜珈老師', 'crazy19970421@gmail.com', 988888888, '1997-04-21', '喜馬拉雅山', 'user');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `Code` int(3) NOT NULL,
  `Name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Price` int(4) NOT NULL,
  `Status` varchar(5) CHARACTER SET utf8 NOT NULL,
  `species` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`Code`, `Name`, `Price`, `Status`, `species`) VALUES
(9, '肉燥飯', 30, 'yes', '飯食'),
(10, '燒肉飯', 40, 'yes', '飯食'),
(11, '火雞肉飯', 50, 'yes', '飯食'),
(12, '丼飯', 70, 'yes', '飯食'),
(13, '爌肉飯', 50, 'yes', '飯食'),
(14, '牛肉麵', 80, 'yes', '麵食'),
(15, '日本拉麵', 8700, 'yes', '麵食'),
(16, '古早味乾麵', 40, 'yes', '麵食'),
(17, '餛飩麵', 55, 'yes', '麵食'),
(18, '榨菜肉絲麵', 45, 'yes', '麵食'),
(19, '紅茶', 25, 'yes', '飲料'),
(20, '綠茶', 52, 'yes', '飲料'),
(21, '奶茶', 40, 'yes', '飲料'),
(22, '珍珠奶茶', 50, 'yes', '飲料'),
(23, '水果茶', 50, 'yes', '飲料'),
(24, '薯條', 30, 'yes', '其他'),
(25, '雞塊', 40, 'yes', '其他'),
(26, '唐揚雞塊', 55, 'yes', '其他'),
(27, '小熱狗', 25, 'yes', '其他'),
(28, '鮑魚', 9999, 'yes', '其他'),
(32, '123', 12332, 'yes', '飯食');

-- --------------------------------------------------------

--
-- 資料表結構 `ramdom`
--

CREATE TABLE `ramdom` (
  `Code` int(3) NOT NULL,
  `ProductCode` int(3) NOT NULL,
  `RamdomChange` varchar(30) CHARACTER SET utf8 NOT NULL,
  `datetime` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `ramdom`
--

INSERT INTO `ramdom` (`Code`, `ProductCode`, `RamdomChange`, `datetime`) VALUES
(97, 17, '新增', '2017-05-01'),
(98, 16, '重選', '2017-05-01'),
(99, 12, '新增', '2017-05-09'),
(100, 18, '新增', '2017-05-08'),
(101, 14, '新增', '2017-05-02'),
(102, 14, '新增', '2017-05-10'),
(103, 21, '新增', '2017-06-04'),
(104, 19, '新增', '2017-06-04'),
(105, 20, '新增', '2017-06-04'),
(106, 19, '新增', '2017-06-04'),
(107, 29, '新增', '2017-06-04'),
(108, 20, '新增', '2017-06-04'),
(109, 18, '新增', '2017-06-04'),
(110, 11, '新增', '2017-06-04'),
(111, 11, '重選', '2017-06-04'),
(112, 12, '重選', '2017-06-04'),
(113, 13, '重選', '2017-06-04'),
(114, 9, '重選', '2017-06-04'),
(115, 11, '重選', '2017-06-04'),
(116, 13, '重選', '2017-06-04'),
(117, 12, '重選', '2017-06-04'),
(118, 11, '重選', '2017-06-04'),
(119, 9, '重選', '2017-06-04'),
(120, 11, '重選', '2017-06-04'),
(121, 22, '新增', '2017-06-04'),
(122, 12, '新增', '2017-06-04'),
(123, 21, '新增', '2017-06-04'),
(124, 13, '新增', '2017-06-04'),
(125, 13, '新增', '2017-06-04'),
(126, 13, '重選', '2017-06-04'),
(127, 13, '重選', '2017-06-04'),
(128, 10, '重選', '2017-06-04'),
(129, 9, '重選', '2017-06-04'),
(130, 12, '重選', '2017-06-04'),
(131, 12, '重選', '2017-06-04'),
(132, 11, '重選', '2017-06-04'),
(133, 13, '重選', '2017-06-04'),
(134, 9, '新增', '2017-06-04'),
(135, 13, '重選', '2017-06-04'),
(136, 10, '重選', '2017-06-04'),
(137, 12, '重選', '2017-06-04'),
(138, 13, '新增', '2017-06-04'),
(139, 14, '新增', '2017-06-04'),
(140, 18, '新增', '2017-06-04'),
(141, 20, '新增', '2017-06-04'),
(142, 24, '新增', '2017-06-04'),
(143, 22, '新增', '2017-06-04'),
(144, 13, '新增', '2017-06-04'),
(145, 15, '新增', '2017-06-04'),
(146, 11, '重選', '2017-06-04'),
(147, 10, '重選', '2017-06-04'),
(148, 11, '新增', '2017-06-04'),
(149, 16, '新增', '2017-06-04');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Code`);

--
-- 資料表索引 `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`Code`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`code`),
  ADD KEY `code` (`code`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Code`);

--
-- 資料表索引 `ramdom`
--
ALTER TABLE `ramdom`
  ADD PRIMARY KEY (`Code`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `invoice`
--
ALTER TABLE `invoice`
  MODIFY `Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- 使用資料表 AUTO_INCREMENT `list`
--
ALTER TABLE `list`
  MODIFY `Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `code` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `Code` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- 使用資料表 AUTO_INCREMENT `ramdom`
--
ALTER TABLE `ramdom`
  MODIFY `Code` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
