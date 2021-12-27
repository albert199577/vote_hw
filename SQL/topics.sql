-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-27 04:18:51
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `topics`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ad`
--

CREATE TABLE `ad` (
  `id` int(10) UNSIGNED NOT NULL,
  `sh` tinyint(4) NOT NULL,
  `intro` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `ad`
--

INSERT INTO `ad` (`id`, `sh`, `intro`, `name`) VALUES
(25, 1, '', 'pexels-matia-malenica-10383114.jpg'),
(26, 0, '', 'pexels-kasia-palitava-10391671.jpg'),
(27, 1, '', 'pexels-eberhard-grossgasteiger-6439013.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `opt` varchar(128) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `count` varchar(11) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `options`
--

INSERT INTO `options` (`id`, `opt`, `topic_id`, `count`) VALUES
(103, '火鍋', 22, '4'),
(104, 'hrthr', 22, '23'),
(106, 'gegvrve', 22, '1'),
(107, 'gewgew', 25, '2'),
(108, 'gewgewegewge', 25, '0'),
(109, '火雞', 24, '0'),
(110, '你好', 24, '0'),
(111, '肯得G', 24, '0'),
(112, '火雞', 23, '4'),
(113, '雞肉飯', 23, '1'),
(116, '爬山', 27, '0'),
(117, 'coding', 27, '0'),
(118, '上班', 27, '0'),
(119, '健身', 27, '0'),
(120, '非常好', 28, '0'),
(121, '激好', 28, '0'),
(122, '一級棒', 28, '0'),
(168, '', 24, '0'),
(169, '', 23, '0');

-- --------------------------------------------------------

--
-- 資料表結構 `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic` varchar(128) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `designer` varchar(35) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `viewers` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '0',
  `vote_sum` varchar(11) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `img_name` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `topics`
--

INSERT INTO `topics` (`id`, `topic`, `designer`, `status`, `viewers`, `vote_sum`, `img_name`) VALUES
(22, '肯得基', '高柏弘', 0, '6', '', ''),
(23, '晚上吃什麼', '高柏弘', 1, '9', '', ''),
(24, '肯得基', '高柏弘', 1, '8', '', ''),
(25, 'fwegewg', '高柏弘', 1, '6', '', ''),
(27, '明天要幹嘛', '高柏弘', 1, '2', '', ''),
(28, '作者做得好嗎', 'alberto', 1, '3', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `account` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(24) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` varchar(12) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `birthday` date NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `email`, `name`, `gender`, `birthday`, `mobile`) VALUES
(1, '444', 'dd', 'mso729049@yahoo.com.tw', 'alberto', '女', '2021-12-29', '0968766995'),
(2, '444', 'dd', 'mso729049@yahoo.com.tw', '高柏弘', '男', '2021-12-15', '0968766995'),
(3, '444', 'dd', 'mso729049@yahoo.com.tw', '高柏弘', '男', '2021-12-21', '0968766995'),
(4, '444', 'dd', 'mso729049@yahoo.com.tw', '高柏弘', '男', '2021-12-21', '0968766995'),
(5, 'mack', '1', 'mso729049@yahoo.com.tw', '高柏弘', '女', '2021-12-22', '0968766995'),
(6, '444', 'dd', 'mso729049@yahoo.com.tw', '高柏弘', '男', '2021-12-22', '0968766995'),
(7, '444', 'dd', 'mso729049@yahoo.com.tw', '高柏弘', '男', '2021-12-30', '0968766995'),
(8, 'me@fwef', 'fewf', 'fds@d', 'few', '男', '2021-12-29', 'fewf'),
(9, '444', 'dd', 'mso729049@yahoo.com.tw', '高柏弘', '男', '2021-12-30', '0968766995'),
(10, 'alen', '111', 'fds@d', 'alberto', '男', '2021-03-02', '0968766995'),
(11, '1234', '1234', '1234@yahoo.com.tw', '1234', '男', '1995-07-09', '1234'),
(12, '1111', '1111', 'hel@jdk', '嘻嘻', '男', '2021-12-22', '83739'),
(13, '1111', '1111', 'hel@jdk', '嘻嘻', '男', '2021-12-22', '83739'),
(14, 'helen', '1111', 'mso729049@yahoo.com.tw', '53564', '女', '2021-12-08', '5643'),
(15, '333', '333', 'mso729049@gmail.com', '53564', '男', '2021-12-21', '0215546342');

-- --------------------------------------------------------

--
-- 資料表結構 `user_vote`
--

CREATE TABLE `user_vote` (
  `id` int(11) NOT NULL,
  `user_id` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `topic_id` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `user_vote`
--

INSERT INTO `user_vote` (`id`, `user_id`, `topic_id`) VALUES
(1, '1', '23'),
(2, '1', '25');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_vote`
--
ALTER TABLE `user_vote`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_vote`
--
ALTER TABLE `user_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
