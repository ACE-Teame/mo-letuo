-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-01-18 01:39:07
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mo-letuo`
--

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(36) DEFAULT NULL,
  `phone` varchar(24) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `contect` varchar(128) NOT NULL,
  `time` int(10) NOT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `c` varchar(48) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`id`, `username`, `phone`, `city_id`, `shop_id`, `contect`, `time`, `ip`, `c`) VALUES
(1, '陈陈', '18336344625', 1, 9, '0', 1516081068, '127.0.0.1', ''),
(2, '陈啊陈', '18336345124', 1, 9, '是的 为', 1516081204, '127.0.0.1', ''),
(3, '里啊', '13898654578', 2, 12, '辅导费施肥是否', 1516081250, '127.0.0.1', 'test');

-- --------------------------------------------------------

--
-- 表的结构 `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `city_name` varchar(32) DEFAULT NULL,
  `shop_name` varchar(128) DEFAULT NULL,
  `shop_address` varchar(128) DEFAULT NULL,
  `shop_mobile` varchar(64) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shop`
--

INSERT INTO `shop` (`shop_id`, `city_name`, `shop_name`, `shop_address`, `shop_mobile`, `pid`) VALUES
(1, '重庆', NULL, NULL, NULL, 0),
(2, '佛山', NULL, NULL, NULL, 0),
(3, '中山', NULL, NULL, NULL, 0),
(4, '深圳', NULL, NULL, NULL, 0),
(5, '惠州', NULL, NULL, NULL, 0),
(6, '天门', NULL, NULL, NULL, 0),
(7, '秦皇岛', NULL, NULL, NULL, 0),
(8, '南宁', NULL, NULL, NULL, 0),
(9, NULL, '沙坪坝店', '重庆市沙坪坝区炫地商城5楼', '023-65749379', 1),
(10, NULL, '合川店', '重庆市合川区双牌坊街9号南洋百货2楼', '023-85181877', 1),
(11, NULL, '巴南店', '重庆市巴南区鱼洞街道新市街80号协信购物广场3楼', '023-62335896', 1),
(12, NULL, '江北店', '重庆市江北区观音桥星天广场5楼', '023-67737030', 1),
(13, NULL, '南岸店', '重庆市南岸区南坪万达广场1号门16号观光电梯2楼', '023-62661135', 1),
(14, NULL, '璧山店', '重庆市璧山区中医院巷12号建设宾馆对面', '023-41770477', 1),
(15, NULL, '九龙坡店', '重庆市九龙坡区杨家坪西郊路3号大洋百货5楼', '023-68854105', 1),
(16, NULL, '渝北店', '重庆市渝北区两路街道金港国际商场美西百货1楼', '023-88958092', 1),
(17, NULL, '桂城店', '佛山市南海区桂城街道桂澜中路23号万科金域国际花园8座一层', '0757-86221567/89955309', 2),
(18, NULL, '西南店', '佛山市三水区西南街道兴达路7号汇丰豪园121铺', '0757-87731599/88517480', 2),
(19, NULL, '大沥店', '佛山市南海区大沥镇金贸大道6号中盈广场6层6A01室', '0757-85578553/18934313469', 2),
(20, NULL, '荷城店', '佛山市高明区荷城街道沧江路422号之11', '0757-88261000', 2),
(21, NULL, '普澜店', '佛山市禅城区普澜二路33号新荣大厦D座202', '0757-83963120/83961082', 2),
(22, NULL, '东方店', '佛山市禅城区锦华路85号东方广场明珠城组团四层A02号铺', '0757-82256356/18923147714', 2),
(23, NULL, '大良店', '佛山市顺德区大良街道中区社区宜新路26号新红棉大厦8号铺', '0757-22911059/88517382', 2),
(24, NULL, '容桂店', '佛山市顺德区容桂街道幸福居委会桂州大道中51号首层之三', '18100262446/0757-22909426', 2),
(25, NULL, '龙江店', '佛山市顺德区龙江镇西溪居委会东华路西溪花园38-39号商铺', ' 0757- 88537496', 2),
(26, NULL, '北滘店', '佛山市顺德区北滘镇北滘社区居委会南源路169号铺', '0757-29892400', 2),
(27, NULL, '乐从店', '佛山市顺德区乐从镇乐从居委会信德大厦首层商铺6', '0757- 8853 7345/28903920', 2),
(28, NULL, '百花店', '佛山市禅城区卫国路118号百花大厦首层7号', '0757-82251962', 2),
(29, NULL, '石岐店', '中山市石岐区莲塘北路2号11卡', '0760-88161899', 3),
(30, NULL, '三乡店', '中山市三乡镇雅居乐新城E75-76', '0760-86362418', 3),
(31, NULL, '坦洲店', '中山市坦洲镇皇爵假日广场1楼', '0760-87133012', 3),
(32, NULL, '东区店', '中山市东区街道体育路恒信花园D区38卡', '0760-88633966', 3),
(33, NULL, '小榄店', '中山市小榄镇民安中路111号', '0760-88636299', 3),
(34, NULL, '古镇店', '中山市古镇灯都华廷华庭路A型10号D20卡', '0760-88822693', 3),
(35, NULL, '龙华店', '深圳市宝安区龙华华润万家旁3A北座9楼', '0755-27706695', 4),
(36, NULL, '布吉店', '深圳市龙岗区布吉老街吉华路82号（维也纳酒店1楼隔壁）', '0755-28276616', 4),
(37, NULL, '松岗店', '深圳市宝安区107国道松岗星港城百佳后门出口2楼', '0755-27716996', 4),
(38, NULL, '新安店', '深圳市宝安区新安街道建安一路香槟广场1楼', '0755-27750567', 4),
(39, NULL, '横岗店', '深圳市龙岗区横岗镇2013时尚广场1楼', '0755-28636695', 4),
(40, NULL, '大运店', '深圳市龙岗区爱南路666号大运星河cocopark四楼13号', '0755-84615251', 4),
(41, NULL, '沙井店', '深圳市宝安区沙井中心路凯丰大厦2楼', '0755-29931539', 4),
(42, NULL, '西乡店', '深圳市宝安区西乡街道坪洲地铁站时代城3楼', '0755-85255574', 4),
(43, NULL, '惠东店', '惠州市惠东县平山镇华侨城大道怡景花园', '15916371888', 5),
(44, NULL, '天门店', '天门市竟陵街道新城中山大街21号', '18872629218', 6),
(45, NULL, '抚宁店', '秦皇岛市抚宁区健康大街路北日化2楼', '18630303966', 7),
(46, NULL, '南宁店', '广西南宁市西乡塘区友爱南路22号振宁商厦126号商铺', '15077195501', 8);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(128) NOT NULL,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) DEFAULT NULL,
  `login_time` int(10) DEFAULT NULL,
  `ip` varchar(48) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `create_time`, `update_time`, `login_time`, `ip`, `status`) VALUES
(1, 'admin', '$2y$10$BMX/JDTSpXLSHZ/kjUjSmu3JyepTKS4UrTQIGD8NG0Qur.MaZQakC', 1509690166, 1510730719, 1516237503, '::1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
