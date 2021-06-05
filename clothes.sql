-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2021-06-01 17:30:34
-- 服务器版本： 10.4.13-MariaDB
-- PHP 版本： 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `clothes`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `adv`
--

CREATE TABLE `adv` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `adv`
--

INSERT INTO `adv` (`id`, `name`, `keywords`, `picture`, `link`) VALUES
(2, '广告1', '广告', 'images/banner1.jpg', '#'),
(7, '广告2', '广告', 'images/banner2.jpg', '#'),
(8, '广告3', '广告', 'images/banner3.jpg', '#');

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `price` varchar(10) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- 转存表中的数据 `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `goods_id`, `price`, `count`) VALUES
(38, 10, 3, '148', 1);

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `goods_name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `description` text DEFAULT NULL,
  `old_price` float(11,2) DEFAULT 0.00,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `goods_name`, `type`, `price`, `description`, `old_price`, `picture`) VALUES
(1, '  美特斯邦威狮子王联名短袖T恤  ', '上衣 ', 185, '美特斯邦威狮子王联名短袖T恤男2021夏季新款假两件纯棉情侣体恤', 288.00, 'images/pi.png'),
(2, ' 美特斯邦威狮子王联名短袖衬衫男 ', '上衣 ', 99, '美特斯邦威狮子王联名短袖T恤男2021夏季新款假两件纯棉情侣体恤', 339.00, 'images/pi1.png'),
(3, ' 美特斯邦威连帽卫衣女2021夏季新款 ', '上衣 ', 148, '美特斯邦威狮子王联名短袖T恤男2021夏季新款假两件纯棉情侣体恤', 329.00, 'images/pi2.png'),
(4, ' 美特斯邦威短袖t恤上衣纯色简约打底衫潮白色  ', '上衣 ', 269, '美特斯邦威狮子王联名短袖T恤男2021夏季新款假两件纯棉情侣体恤', 349.00, 'images/pi3.png'),
(14, ' 美特斯邦威狮子王联名短袖衬衫男2021夏季新款染整慵懒风男士衬衣 ', '上衣 ', 99, '美特斯邦威狮子王联名短袖T恤男2021夏季新款假两件纯棉情侣体恤', 888.00, 'images/pi4.png'),
(15, ' 美特斯邦威潮流字母小印花短袖t恤 ', '上衣 ', 199, '美特斯邦威狮子王联名短袖T恤男2021夏季新款假两件纯棉情侣体恤', 299.00, 'images/pi5.png'),
(16, ' 美特斯邦威休闲裤男新款夏季休闲  ', '裤子', 139, '美特斯邦威休闲裤女2021夏季新款纯棉黑色宽松运动百搭女针织裤ZZ', 499.00, 'images/pi6.png'),
(17, ' 美特斯邦威t恤男夏季男装圆领简洁印花 ', '上衣 ', 238, '美特斯邦威狮子王联名短袖T恤男2021夏季新款假两件纯棉情侣体恤', 555.00, 'images/pi7.png');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `goods_id`, `count`) VALUES
(23, 10, 2, 1),
(31, 10, 1, 1),
(32, 10, 1, 2),
(37, 10, 14, 1),
(38, 10, 3, 1);

-- --------------------------------------------------------

--
-- 表的结构 `pay`
--

CREATE TABLE `pay` (
  `id` int(11) NOT NULL,
  `pay_method` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `pay`
--

INSERT INTO `pay` (`id`, `pay_method`) VALUES
(1, '支付宝'),
(2, '微信支付'),
(3, '财付通'),
(4, '银联支付'),
(5, '百度钱包');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `uname`, `pwd`, `tel`, `sex`, `email`, `address`, `avatar`) VALUES
(10, 'admin', 'admin1', '201858501224', '男', '5718473@qq.com', '1223', 'touxiang/DingYang.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `wenzhang`
--

CREATE TABLE `wenzhang` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `adv`
--
ALTER TABLE `adv`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 表的索引 `wenzhang`
--
ALTER TABLE `wenzhang`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `adv`
--
ALTER TABLE `adv`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用表AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用表AUTO_INCREMENT `pay`
--
ALTER TABLE `pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用表AUTO_INCREMENT `wenzhang`
--
ALTER TABLE `wenzhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
