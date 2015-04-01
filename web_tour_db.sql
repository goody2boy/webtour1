-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2015 at 07:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web_tour_db`
--

-- DELIMITER $$
-- --
-- -- Procedures
-- --
-- CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
--     DETERMINISTIC
-- begin
--         select user() as first_col;
--         select user() as first_col, now() as second_col;
--         select user() as first_col, now() as second_col, now() as third_col;
--         end$$

-- DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` varchar(100) NOT NULL,
  `description` text,
  `joinTime` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `lastTime` int(11) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT '0',
  `rememberKey` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ws_administrator` (`id`,`active`,`rememberKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `description`, `joinTime`, `active`, `lastTime`, `role`, `rememberKey`) VALUES
('bapcai.vn29@gmail.com', 'Tên : bắp cải , giới tính : male', 1418719454, 1, 1421723564, 0, NULL),
('bientran.hust@gmail.com', 'Tên : , giới tính : male', 1418785470, 1, 1427419528, 0, NULL),
('hoaot@peacesoft.net', 'Tên : Hoa Ong The , giới tính : male', 1418694614, 1, 1419040127, 0, NULL),
('quang.nh94@gmail.com', 'Tên : Quang Nguyễn Huy , giới tính : undefined', 1418712401, 1, 1419385268, 0, NULL),
('xuanlap93@gmail.com', 'Tên : Dam Lap , giới tính : male', 1418785470, 1, 1427419528, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrator_assignment', 'xuanlap93@gmail.com', 1419834934),
('administrator_changeactive', 'xuanlap93@gmail.com', 1419834934),
('administrator_getcode', 'xuanlap93@gmail.com', 1419834934),
('administrator_grid', 'xuanlap93@gmail.com', 1419834934),
('category_grid', 'xuanlap93@gmail.com', 1419834934),
('newscategory_changeactive', 'xuanlap93@gmail.com', 1419834934),
('newscategory_grid', 'xuanlap93@gmail.com', 1419834934);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `alias` varchar(50) NOT NULL,
  `groupId` int(11) NOT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_group`
--

CREATE TABLE IF NOT EXISTS `auth_item_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category_tour`
--

CREATE TABLE IF NOT EXISTS `category_tour` (
  `cate_id` int(12) unsigned NOT NULL,
  `tour_id` int(12) unsigned NOT NULL,
  PRIMARY KEY (`cate_id`,`tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(12) unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `code` varchar(3) NOT NULL,
  `country_id` int(12) NOT NULL,
  `description` longtext NOT NULL,
  `language` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(3) NOT NULL,
  `language` varchar(3) NOT NULL,
  PRIMARY KEY (`id`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `targetId` varchar(220) NOT NULL,
  `position` int(11) DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT '_DEFAULT',
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `extension` varchar(50) NOT NULL,
  `imageId` varchar(220) NOT NULL,
  PRIMARY KEY (`targetId`,`imageId`),
  KEY `ws_image` (`targetId`,`position`,`type`,`imageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`targetId`, `position`, `type`, `width`, `height`, `extension`, `imageId`) VALUES
('33', 0, 'news', 0, 0, '', '/upload/news/target_33/avt-1427431536.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE IF NOT EXISTS `money` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `language` varchar(3) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`id`, `code`, `name`, `create_time`, `update_time`, `language`, `active`) VALUES
(1, 'USD', 'Đô la mỹ', 1427909306, 1427909306, 'VI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `money_convert`
--

CREATE TABLE IF NOT EXISTS `money_convert` (
  `from_id` int(12) unsigned NOT NULL,
  `to_id` int(12) unsigned NOT NULL,
  `rate` decimal(10,0) unsigned NOT NULL,
  PRIMARY KEY (`from_id`,`to_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(220) NOT NULL,
  `name` varchar(220) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `createTime` int(11) NOT NULL DEFAULT '0',
  `createEmail` varchar(220) NOT NULL,
  `updateTime` int(11) NOT NULL DEFAULT '0',
  `updateEmail` varchar(220) NOT NULL,
  `description` text,
  `detail` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `categoryName` varchar(220) NOT NULL,
  `viewCount` int(11) NOT NULL DEFAULT '0',
  `home` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `naima_news_unique` (`alias`),
  KEY `naima_news_info` (`alias`,`categoryId`,`active`),
  KEY `naima_news_time` (`createTime`,`updateTime`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `alias`, `name`, `categoryId`, `createTime`, `createEmail`, `updateTime`, `updateEmail`, `description`, `detail`, `active`, `categoryName`, `viewCount`, `home`) VALUES
(21, 'lacoste', 'Lacoste', 40, 1417503742, 'quang.nh94@gmail.com', 1423791742, 'xuanlap93@gmail.com', 'Tin tức Tin tức Tin tức Tin tức Tin tức Tin tức Tin tức Tin tức Tin tức Tin tức Tin tức Tin tức ', '<h3>&nbsp;</h3>\n\n<div>\n<p><a href="http://naima.vn/tim-kiem/Lacoste.html">Lacoste</a> được thế giới biết tới với h&igrave;nh ảnh của ch&uacute; c&aacute; s&acirc;u nhỏ m&agrave;u xanh v&ocirc; c&ugrave;ng nổi tiếng, biểu tượng đ&atilde; đi s&acirc;u v&agrave;o trong t&acirc;m tr&iacute; của kh&aacute;ch h&agrave;ng khi nhắc đến c&aacute;i t&ecirc;n <a href="http://naima.vn/tim-kiem/Lacoste.html">Lacoste</a>.<br />\n<br />\nNgười khai s&aacute;ng ra thương hiệu nổi tiếng <a href="http://naima.vn/tim-kiem/Lacoste.html">Lacoste</a> l&agrave; Jean Rene Lacoste, &ocirc;ng l&agrave; một vận động vi&ecirc;n thể thao v&agrave; ch&iacute;nh niềm đam m&ecirc; với thể thao năm 1993, &ocirc;ng đ&atilde; s&aacute;ng lập ra c&ocirc;ng ty thời trang chuy&ecirc;n sản xuất về thể thao như quần &aacute;o, gi&agrave;y d&eacute;p, sau n&agrave;y c&ograve;n c&oacute; nước hoa cũng l&agrave; một trong những d&ograve;ng sản phẩm cực k&igrave; nổi tiếng của <a href="http://naima.vn/tim-kiem/Lacoste.html">Lacoste,</a> được lấy từ biệt danh của &ocirc;ng Alligator (c&aacute; sấu), c&aacute;i t&ecirc;n v&agrave; thương hiệu, biểu tượng ch&uacute; c&aacute; sấu nhỏ n&agrave;y đ&atilde; được cả thế giới biết đến. Người ta biết đến chiếc &aacute;o<a href="http://naima.vn/tim-kiem/Lacoste.html"> LACOSTE</a> như một trong những chiếc &aacute;o ph&ocirc;ng nổi tiếng nhất thế giới.<br />\n<br />\nNhững sản phẩm của<a href="http://naima.vn/tim-kiem/Lacoste.html"> Lacoste</a> l&agrave; sự kết hợp ho&agrave;n hảo v&agrave; c&aacute; t&iacute;nh tr&ecirc;n tinh thần thể thao v&agrave; sự lịch l&atilde;m truyền thống của người Ph&aacute;p. Năm 1930 khi c&aacute;c biểu tượng thời trang bắt đầu lan ra tr&ecirc;n khắp thế giới, đi&ecirc;nhr điểm l&agrave; tại c&aacute;c trường TH của Mỹ, biểu tượng c&aacute; sấu đ&atilde; trở th&agrave;nh thương hiệu y&ecirc;u th&iacute;ch v&agrave; nổi tiếng của c&aacute;c tầng lớp h&acirc;m mộ thể thao qu&yacute; tộc tr&ecirc;n thế giới.<br />\n<br />\nNgo&agrave;i c&aacute;c sản phẩm &aacute;o tennis, <a href="http://naima.vn/tim-kiem/Lacoste.html">Lacoste</a> sản xuất th&ecirc;mcả &aacute;o đ&aacute;nh golf v&agrave; &aacute;o lướt s&oacute;ng. Vị tr&iacute; thương hiệu của họ được đ&aacute;nh gi&aacute; cao như l&agrave; sản phẩm m&agrave; vận động vi&ecirc;n sang trọng, gi&agrave;u c&oacute; cần phải c&oacute;. V&agrave; chiến dịch quảng b&aacute; sản phẩm của họ đ&atilde; l&ecirc;n tới đỉnh cao của sự th&agrave;nh c&ocirc;ng. Sau đ&oacute;, Lacoste đ&atilde; mở rộng sản xuất th&ecirc;m cả nước thơm, k&iacute;nh r&acirc;m v&agrave; gi&agrave;y, d&eacute;p, tất. Lợi nhuận của h&atilde;ng lu&ocirc;n tăng theo cấp số nh&acirc;n.</p>\n\n<p>&nbsp;</p>\n\n<p style="text-align:center">&nbsp;</p>\n\n<p style="text-align:center">&nbsp;</p>\n\n<p style="text-align:center">&nbsp;</p>\n\n<p style="text-align:center">&nbsp;</p>\n\n<p style="text-align:center">&nbsp;</p>\n\n<p style="text-align:center">&nbsp;</p>\n\n<p style="text-align:center">&nbsp;</p>\n</div>\n', 1, 'Tin tức', 1, 1),
(24, 'sang-che-boi-nasa', 'Sáng chế bởi NASA', 40, 1423620777, 'xuanlap93@gmail.com', 1423791736, 'xuanlap93@gmail.com', 'Công nghệ diệt khuẩn kép PCO xúc tác TiO2 và UV (254nm) sáng chế bởi NASA được sử dụng đầu tiên trên tàu vũ trụ con thoi Columbia STS-73', '<p>C&ocirc;ng nghệ diệt khuẩn k&eacute;p PCO x&uacute;c t&aacute;c TiO2 v&agrave; UV (254nm) s&aacute;ng chế bởi NASA được sử dụng đầu ti&ecirc;n tr&ecirc;n t&agrave;u vũ trụ con thoi Columbia STS-73</p>\n', 1, 'Tin tức', 1, 1),
(27, 'gioi-thieu', 'Giới thiệu', 40, 1423792550, 'xuanlap93@gmail.com', 1423795619, 'xuanlap93@gmail.com', 'Airocide được các tổ chức Y tế hàng đầu tin dùng trong kiểm soát nhiễm khuẩn không khí như loại bỏ bệnh than ở Mỹ năm 2002, H1N1 ở Ấn Độ...', '<div>\n<div>\n<div>\n<h1>Giới thiệu chung</h1>\n</div>\n\n<div>\n<p>My name is Conrad Feagin and over the past 8 years, I&rsquo;ve taught over 30,370 people to make more money using the best web design tools on the market. Now I&rsquo;ll teach you the techniques for quickly and easily building websites so you can make 4 times more than other web designers. Plus, my income-increasing methods are simple, easy-to-follow, and work for beginning or advanced web designers</p>\n\n<p>My name is Conrad Feagin and over the past 8 years, I&rsquo;ve taught over 30,370 people to make more money using the best web design tools on the market. Now I&rsquo;ll teach you the techniques for quickly and easily building websites so you can make 4 times more than other web designers. Plus, my income-increasing methods are simple, easy-to-follow, and work for beginning or advanced web designers</p>\n\n<p>&nbsp;</p>\n</div>\n</div>\n</div>\n', 1, 'Tin tức', 12, 1),
(28, 'to-chuc-le-gioi-thieu-san-pham-chuyen-de-noi-that-2015', 'Tổ chức lễ giới thiệu sản phẩm chuyên đề nội thất 2015', 43, 1423793017, 'xuanlap93@gmail.com', 1427422442, 'xuanlap93@gmail.com', 'Tổ chức lễ giới thiệu sản phẩm có tính quyết định đến thành công của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...', '<p>Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...</p>\n', 1, 'Ứng dụng', 1, 1),
(29, 'cach-trang-tri-nha-trong-ngay-tet-co-truyen', 'Cách trang trí nhà trong ngày tết cổ truyền', 43, 1423793074, 'xuanlap93@gmail.com', 1427422457, 'xuanlap93@gmail.com', 'Tổ chức lễ giới thiệu sản phẩm có tính quyết định đến thành công của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...', '<p>Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...</p>\n\n<p><iframe frameborder="0" height="315" src="https://www.youtube.com/embed/VQ-29nqJ0J8" width="560"></iframe></p>\n\n<p>&nbsp;</p>\n', 1, 'Ứng dụng', 2, 0),
(30, 'cach-trang-tri-nha-trong-ngay-tet-co-truyen-2015', 'Cách trang trí nhà trong ngày tết cổ truyền 2015', 43, 1423793074, 'xuanlap93@gmail.com', 1423793074, 'xuanlap93@gmail.com', 'Tổ chức lễ giới thiệu sản phẩm có tính quyết định đến thành công của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...', '<p>Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...</p>\r\n', 1, 'Ứng dụng', 4, 1),
(31, 'do-chieu-sang-trong-nha', 'Đồ chiếu sáng trong nhà', 43, 1423793017, 'xuanlap93@gmail.com', 1423795466, 'xuanlap93@gmail.com', 'Tổ chức lễ giới thiệu sản phẩm có tính quyết định đến thành công của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...', '<p>Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...Tổ chức lễ giới thiệu sản phẩm c&oacute; t&iacute;nh quyết định đến th&agrave;nh c&ocirc;ng của sản phẩm, bởi buổi lễ giới thiệu sản phẩm...</p>\r\n', 1, 'Ứng dụng', 0, 1),
(25, 'loi-ich-tu-airocide', 'Lợi ích từ Airocide', 40, 1423620924, 'xuanlap93@gmail.com', 1423791730, 'xuanlap93@gmail.com', 'Ứng dụng trong bệnh viện: Airocide kiểm soát nhiễm khuẩn hiệu quả môi trường không khí bệnh viện nhờ khả năng khử mùi, loại bỏ nấm mốc, diệt vi khuẩn, lao…', '<p>Ứng dụng trong bệnh viện: Airocide kiểm so&aacute;t nhiễm khuẩn hiệu quả m&ocirc;i trường kh&ocirc;ng kh&iacute; bệnh viện nhờ khả năng khử m&ugrave;i, loại bỏ nấm mốc, diệt vi khuẩn, lao&hellip;</p>\n', 1, 'Tin tức', 1, 1),
(26, 'su-dung-va-cam-nhan', 'Sử dụng và Cảm nhận', 40, 1423621901, 'xuanlap93@gmail.com', 1423791724, 'xuanlap93@gmail.com', 'Airocide được các tổ chức Y tế hàng đầu tin dùng trong kiểm soát nhiễm khuẩn không khí như loại bỏ bệnh than ở Mỹ năm 2002, H1N1 ở Ấn Độ...', '<p>Airocide được c&aacute;c tổ chức Y tế h&agrave;ng đầu tin d&ugrave;ng trong kiểm so&aacute;t nhiễm khuẩn kh&ocirc;ng kh&iacute; như loại bỏ bệnh than ở Mỹ năm 2002, H1N1 ở Ấn Độ...</p>\n', 1, 'Tin tức', 5, 1),
(33, 'lap-dam', 'Lap Dam', 43, 1427424335, 'xuanlap93@gmail.com', 1427431474, 'xuanlap93@gmail.com', 'a', '<p>a</p>\n', 1, 'Ứng dụng', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(220) NOT NULL,
  `name` varchar(220) NOT NULL,
  `description` text NOT NULL,
  `parentId` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `createTime` int(11) NOT NULL DEFAULT '0',
  `updateTime` int(11) NOT NULL DEFAULT '0',
  `createEmail` varchar(100) NOT NULL,
  `updateEmail` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `naima_newscategory_unique` (`alias`),
  KEY `naima_newcategory_info` (`alias`,`active`,`position`),
  KEY `naima_newcategory_time` (`createTime`,`updateTime`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`id`, `alias`, `name`, `description`, `parentId`, `active`, `position`, `createTime`, `updateTime`, `createEmail`, `updateEmail`) VALUES
(40, 'tin-tuc', 'Tin tức', 'Tin tức giới trẻ', 0, 1, 1, 1417420068, 1423791669, 'quang.nh94@gmail.com', 'xuanlap93@gmail.com'),
(45, 'gia-dinh', 'Gia đình', 'fa fa-rocket', 43, 1, 1, 1423792023, 1423792034, 'xuanlap93@gmail.com', 'xuanlap93@gmail.com'),
(44, 'ung-dung-moi', 'Ứng dụng mới', 'fa fa-rocketfa fa-rocketfa fa-rocket', 43, 1, 2, 1423791984, 1423791984, 'xuanlap93@gmail.com', 'xuanlap93@gmail.com'),
(43, 'ung-dung', 'Ứng dụng', 'Ứng dụng', 0, 1, 0, 1423791700, 1423791700, 'xuanlap93@gmail.com', 'xuanlap93@gmail.com'),
(46, 'y-te---benh-vien', 'Y Tế - Bệnh Viện', 'fa fa-rocket', 43, 1, 3, 1423792090, 1423792196, 'xuanlap93@gmail.com', 'xuanlap93@gmail.com'),
(47, 'thong-tin-cap-nhat', 'Thông tin cập nhật', 'fa fa-rocket', 40, 1, 1, 1423792125, 1423792125, 'xuanlap93@gmail.com', 'xuanlap93@gmail.com'),
(48, 'thong-tin-can-biet', 'Thông tin cần biết', 'fa fa-rocket', 40, 1, 2, 1423792144, 1423792186, 'xuanlap93@gmail.com', 'xuanlap93@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `value` varchar(2000) NOT NULL,
  `auto_load` int(1) NOT NULL DEFAULT '1',
  `name` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`id`, `key`, `value`, `auto_load`, `name`) VALUES
(1, 'EMAIL_CONTACT', 'contact123@gmail.com', 1, 'Email liên lạc'),
(2, 'ADMIN_EMAIL', 'admin@gmail.com', 1, 'Email admin'),
(3, 'SLOGAN', 'đây là slogan của chúng tôi', 1, 'Slogan'),
(4, 'HOTLINE', '1663598168', 1, 'Hotline'),
(7, 'PHONE', '1663598168', 1, 'Số điện thoại'),
(8, 'FACEBOOK', '#', 1, 'Link Facebook'),
(9, 'BANK_INFO', '<h4>T&agrave;i khoản ng&acirc;n h&agrave;ng :</h4>\n\n<ol>\n	<li>Ng&acirc;n h&agrave;ng Techcombank :</li>\n	<li>Ng&acirc;n h&agrave;ng Techcombank :</li>\n	<li>Ng&acirc;n h&agrave;ng Techcombank :</li>\n	<li>Ng&acirc;n h&agrave;ng Techcombank :</li>\n	<li>Ng&acirc;n h&agrave;ng Techcombank :</li>\n	<li>Ng&acirc;n h&agrave;ng Techcombank :</li>\n	<li>Ng&acirc;n h&agrave;ng Techcombank :</li>\n	<li>Ng&acirc;n h&agrave;ng Techcombank :</li>\n</ol>\n', 1, 'Thông tin ngân hàng'),
(10, 'YOUTUBE', '#', 1, 'Link Youtube'),
(11, 'TWITTER', '#', 1, 'Link twitter');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(12) unsigned NOT NULL,
  `user_id` int(12) unsigned NOT NULL,
  `price_id` int(12) unsigned NOT NULL,
  `number_adult` int(2) NOT NULL,
  `number_child` int(2) NOT NULL,
  `number_nochild` int(2) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `date_departure` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `promo_code` varchar(12) DEFAULT NULL,
  `payment_method` varchar(12) NOT NULL,
  `status_payment` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` int(12) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(12) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `tour_id` int(12) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `discount_price` decimal(10,0) NOT NULL,
  `discount_percent` decimal(10,0) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(12) NOT NULL,
  `rate` int(1) NOT NULL,
  `review_title` varchar(100) NOT NULL,
  `review_comment` longtext NOT NULL,
  `submit_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE IF NOT EXISTS `tour` (
  `id` int(12) unsigned NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `city_id` int(12) NOT NULL,
  `description` longtext NOT NULL,
  `full_initerary` longtext NOT NULL,
  `inclusion` longtext NOT NULL,
  `exclusion` longtext NOT NULL,
  `note` longtext NOT NULL,
  `mapp_address` varchar(100) NOT NULL,
  `price_id` int(12) NOT NULL,
  `duration_time` int(11) NOT NULL,
  `money_id` int(12) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `author_id` int(12) NOT NULL,
  `laguage` varchar(3) NOT NULL,
  `status` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `registered_time` int(11) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `active_key` varchar(50) NOT NULL,
  `contact_id` int(12) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` varchar(50) NOT NULL,
  `name` varchar(220) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `home` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
