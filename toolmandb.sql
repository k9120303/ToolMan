-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-01-15 09:56:22
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `toolmandb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `expertise` varchar(50) NOT NULL,
  `nick_name` varchar(50) NOT NULL,
  `ZongKong` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `account`
--

INSERT INTO `account` (`name`, `password`, `telephone`, `email`, `expertise`, `nick_name`, `ZongKong`) VALUES
('侑錦', '666', '0945612476', '00357116@mail.ntou.edu', '可能是BUG吧', 'Using', 1),
('柏禎', 'abc', '0912456387', '00357117@mail.ntou.edu', '資深工具人', '邊緣人', 1),
('G7', '777', '0965423548', '00357118@mail.ntou.edu', '抓電影', 'G7超級帥', 1),
('光明', '123', '0954312648', '00357122@mail.ntou.edu', '傻笑', 'Bright', 1),
('光明', '123', '0945142364', '00357122@mail.ntou.edu.tw', '耍廢', 'Bright', 1),
('Jade', 'dd117', '0978352187', '00357131@ntou.edu.tw', '洗澡遭', 'Jade', 1);

--
-- 觸發器 `account`
--
DELIMITER $$
CREATE TRIGGER `PersonInfo` AFTER INSERT ON `account` FOR EACH ROW INSERT INTO `personal_info`(`name`, `information`, `art`, `phy_stren`, `academic`, `communication`, `other`, `star1`, `star2`, `star3`, `star4`, `star5`) VALUES (NEW.email,0,0,0,0,0,0,0,0,0,0,0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 資料表結構 `job_list`
--

CREATE TABLE `job_list` (
  `job_id` varchar(20) NOT NULL,
  `job_name` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL,
  `salary` int(10) NOT NULL,
  `work_date` varchar(15) NOT NULL,
  `state` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `job_detail` varchar(1000) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `publish_date` varchar(20) NOT NULL,
  `take_date` varchar(20) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `worker` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `job_list`
--

INSERT INTO `job_list` (`job_id`, `job_name`, `type`, `salary`, `work_date`, `state`, `address`, `job_detail`, `phone`, `publish_date`, `take_date`, `publisher`, `worker`) VALUES
('1482416997', '做物聯網', 'information', 500, '2016-12-28', '已接案', 'INS205', '接電路', '', '2016-12-22', '2017-1-3', '00357122@mail.ntou.edu', '00357118@mail.ntou.edu\r\n'),
('1482417429', '做JAVA', 'information', 600, '2016-12-29', '未接案', '台北車站', '技術研究', '', '2016-12-22', ' ', '00357122@mail.ntou.edu', ''),
('1482417462', '寫機率論', 'academic', 10, '2016-12-15', '未接案', '家裡', '', '', '2016-12-22', ' ', '00357116@mail.ntou.edu', ''),
('1482417531', '算線性代數', 'academic', 100, '2016-12-24', '審核中', 'INS101', '', '', '2016-12-22', '2016-12-30', '00357117@mail.ntou.edu', '00357116@mail.ntou.edu'),
('1482417581', '算線性代數', 'academic', 100, '2017-1-10', '已結案', '', '', '', '2016-12-22', '2016-12-29', '00357122@mail.ntou.edu', '00357117@mail.ntou.edu'),
('1482419872', '幫忙做道具', 'art', 500, '2016-12-24', '未接案', '基隆市中正區北寧路2號', '', '09123456', '2016-12-22', ' ', '00357117@mail.ntou.edu', ''),
('1482419930', '回追求者訊息', 'communication', 1000, '2016-12-17', '已結案', '家裡', '隨便', '0912345678', '2016-12-22', '2017-1-1', '00357116@mail.ntou.edu', '00357118@mail.ntou.edu'),
('1482420102', '幫忙倒垃圾', 'phy_stren', 0, '2016-12-24', '已結案', '北寧加油站', '小雞雞銘峰的垃圾', '0000000000', '2016-12-22', '2017-1-10', '00357116@mail.ntou.edu', '00357117@mail.ntou.edu'),
('1484055512', '幫忙送情書', 'phy_stren', 1000, '2017-01-02', '已結案', '西子灣', '越快越好', '0945136482', '2017-01-10', '2017-01-10', '00357118@mail.ntou.edu', '00357117@mail.ntou.edu'),
('1484098083', '測試專案', 'information', 500, '2017-01-14', '未接案', '基隆市中正區北寧路2號', '軟功GG啦~', '0945213657', '2017-01-11  09:28:03', ' ', '00357122@mail.ntou.edu', ''),
('1484103050', '買飲料', 'phy_stren', 200, '2017-01-11', '已結案', '基隆火車站', '珍珠奶茶', '09254657893', '2017-01-11  10:50:50', '2017-01-11  10:53:25', '00357122@mail.ntou.edu.tw', '00357116@mail.ntou.edu');

-- --------------------------------------------------------

--
-- 資料表結構 `personal_info`
--

CREATE TABLE `personal_info` (
  `name` varchar(200) NOT NULL,
  `information` int(20) NOT NULL,
  `art` int(20) NOT NULL,
  `phy_stren` int(20) NOT NULL,
  `academic` int(20) NOT NULL,
  `communication` int(20) NOT NULL,
  `other` int(20) NOT NULL,
  `star1` int(20) NOT NULL,
  `star2` int(20) NOT NULL,
  `star3` int(20) NOT NULL,
  `star4` int(20) NOT NULL,
  `star5` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `personal_info`
--

INSERT INTO `personal_info` (`name`, `information`, `art`, `phy_stren`, `academic`, `communication`, `other`, `star1`, `star2`, `star3`, `star4`, `star5`) VALUES
('00357116@mail.ntou.edu', 5, 10, 7, 11, 2, 20, 0, 0, 1, 0, 0),
('00357117@mail.ntou.edu', 0, 0, 1, 0, 0, 0, 0, 0, 2, 0, 1),
('00357118@mail.ntou.edu', 5, 5, 5, 5, 5, 5, 0, 0, 1, 0, 0),
('00357122@mail.ntou.edu', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('00357122@mail.ntou.edu.tw', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
('00357131@ntou.edu.tw', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `work_evaluation`
--

CREATE TABLE `work_evaluation` (
  `job_id` varchar(200) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `worker` varchar(200) NOT NULL,
  `bossToMan` tinyint(2) DEFAULT NULL,
  `manToBoss` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `work_evaluation`
--

INSERT INTO `work_evaluation` (`job_id`, `publisher`, `worker`, `bossToMan`, `manToBoss`) VALUES
('1482417581', '00357122@mail.ntou.edu', '00357117@mail.ntou.edu', 5, 0),
('1482419930', '00357116@mail.ntou.edu', '00357118@mail.ntou.edu', 3, 5),
('1482420102', '00357116@mail.ntou.edu', '00357117@mail.ntou.edu', 3, 0),
('1484055512', '00357118@mail.ntou.edu', '00357117@mail.ntou.edu', 3, 5),
('1484098083', '00357122@mail.ntou.edu', '', 0, 0),
('1484103050', '00357122@mail.ntou.edu.tw', '00357116@mail.ntou.edu', 3, 3);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email`);

--
-- 資料表索引 `job_list`
--
ALTER TABLE `job_list`
  ADD PRIMARY KEY (`job_id`);

--
-- 資料表索引 `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`name`);

--
-- 資料表索引 `work_evaluation`
--
ALTER TABLE `work_evaluation`
  ADD PRIMARY KEY (`job_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
