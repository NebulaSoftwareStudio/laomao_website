-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2022-06-29 15:30:24
-- 服务器版本： 5.7.36
-- PHP 版本： 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `laomao`
--
CREATE DATABASE IF NOT EXISTS `laomao` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laomao`;

-- --------------------------------------------------------

--
-- 表的结构 `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `image` varchar(1000) NOT NULL COMMENT '图像',
  `url` varchar(255) NOT NULL COMMENT '广告链接',
  `time` datetime NOT NULL COMMENT '提交时间',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `bad_word`
--

DROP TABLE IF EXISTS `bad_word`;
CREATE TABLE IF NOT EXISTS `bad_word` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `uname` varchar(255) NOT NULL COMMENT '来源用户',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `china_city_list_latest`
--

DROP TABLE IF EXISTS `china_city_list_latest`;
CREATE TABLE IF NOT EXISTS `china_city_list_latest` (
  `Location_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '位置ID',
  `Location_Name_EN` varchar(30) DEFAULT NULL,
  `Location_Name_ZH` varchar(16) DEFAULT NULL,
  `Country_Code` varchar(12) DEFAULT NULL,
  `Country_Name_EN` varchar(15) DEFAULT NULL,
  `Country_Name_ZH` varchar(15) DEFAULT NULL,
  `Adm1_Name_EN` varchar(32) DEFAULT NULL,
  `Adm1_Name_ZH` varchar(12) DEFAULT NULL,
  `Adm2_Name_EN` varchar(47) DEFAULT NULL,
  `Adm2_Name_ZH` varchar(12) DEFAULT NULL,
  `Timezone` varchar(13) DEFAULT NULL,
  `Latitude` varchar(8) DEFAULT NULL,
  `Longitude` varchar(9) DEFAULT NULL,
  `Adcode` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `kotoba`
--

DROP TABLE IF EXISTS `kotoba`;
CREATE TABLE IF NOT EXISTS `kotoba` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `content` varchar(5000) NOT NULL COMMENT '内容',
  `author` varchar(255) NOT NULL COMMENT '著者',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `news_2019_archive`
--

DROP TABLE IF EXISTS `news_2019_archive`;
CREATE TABLE IF NOT EXISTS `news_2019_archive` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `link` varchar(255) NOT NULL COMMENT '链接',
  `description` varchar(1000) NOT NULL COMMENT '概述',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `content` longtext NOT NULL COMMENT '内容',
  `source` varchar(255) NOT NULL COMMENT '新闻源',
  `classify` varchar(255) NOT NULL COMMENT '分类。多个用 "," 分割',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `news_2020_archive`
--

DROP TABLE IF EXISTS `news_2020_archive`;
CREATE TABLE IF NOT EXISTS `news_2020_archive` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `link` varchar(255) NOT NULL COMMENT '链接',
  `description` varchar(1000) NOT NULL COMMENT '概述',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `content` longtext NOT NULL COMMENT '内容',
  `source` varchar(255) NOT NULL COMMENT '新闻源',
  `classify` varchar(255) NOT NULL COMMENT '分类。多个用 "," 分割',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `news_2021_archive`
--

DROP TABLE IF EXISTS `news_2021_archive`;
CREATE TABLE IF NOT EXISTS `news_2021_archive` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `link` varchar(255) NOT NULL COMMENT '链接',
  `description` varchar(1000) NOT NULL COMMENT '概述',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `content` longtext NOT NULL COMMENT '内容',
  `source` varchar(255) NOT NULL COMMENT '新闻源',
  `classify` varchar(255) NOT NULL COMMENT '分类。多个用 "," 分割',
  `is_primary` tinyint(1) NOT NULL COMMENT '是否是主要新闻',
  `topic_image` varchar(255) NOT NULL COMMENT '封面图片',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `porn_site`
--

DROP TABLE IF EXISTS `porn_site`;
CREATE TABLE IF NOT EXISTS `porn_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `url` varchar(1000) NOT NULL COMMENT '网站链接地址',
  `title` varchar(1000) NOT NULL COMMENT '网站标题',
  `sourceUpdateTime` datetime NOT NULL COMMENT '数据源更新时间',
  `createTime` datetime NOT NULL COMMENT '创建时间',
  `updateTime` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `rss_news`
--

DROP TABLE IF EXISTS `rss_news`;
CREATE TABLE IF NOT EXISTS `rss_news` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `link` varchar(255) NOT NULL COMMENT '链接',
  `description` varchar(1000) NOT NULL COMMENT '概述',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `content` longtext NOT NULL COMMENT '内容',
  `source` varchar(255) NOT NULL COMMENT '新闻源',
  `classify` varchar(255) NOT NULL COMMENT '分类。多个用 "," 分割',
  `is_primary` tinyint(1) NOT NULL COMMENT '是否是主要新闻 ',
  `topic_image` varchar(255) NOT NULL COMMENT '封面图片 ',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `shigure_list`
--

DROP TABLE IF EXISTS `shigure_list`;
CREATE TABLE IF NOT EXISTS `shigure_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` longtext NOT NULL COMMENT '内容',
  `tags` varchar(255) NOT NULL COMMENT '标签。多个以","隔开。',
  `author` varchar(32) NOT NULL COMMENT '作者',
  `file_size` varchar(32) NOT NULL COMMENT '文件大小',
  `file_list` text NOT NULL COMMENT '文件清单',
  `file_hash` varchar(100) NOT NULL COMMENT '文件哈希',
  `magnet_url` varchar(255) NOT NULL COMMENT '磁力链URL',
  `torrent_url` varchar(255) NOT NULL COMMENT '种子文件URL',
  `source_url` varchar(255) NOT NULL COMMENT '来源URL',
  `create_time` date NOT NULL COMMENT '创建时间',
  `update_time` date NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `site_list`
--

DROP TABLE IF EXISTS `site_list`;
CREATE TABLE IF NOT EXISTS `site_list` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `description` varchar(255) NOT NULL COMMENT '介绍',
  `image` varchar(1000) NOT NULL COMMENT '图标',
  `methods` varchar(5) NOT NULL COMMENT '访问方式。HTTP或者HTTPS',
  `url` varchar(1000) NOT NULL COMMENT '链接',
  `classify` varchar(255) NOT NULL COMMENT '分类',
  `create_by` varchar(255) DEFAULT NULL COMMENT '创建者',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `site_review_list`
--

DROP TABLE IF EXISTS `site_review_list`;
CREATE TABLE IF NOT EXISTS `site_review_list` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `description` varchar(255) NOT NULL COMMENT '介绍',
  `image` varchar(1000) NOT NULL COMMENT '图标',
  `methods` varchar(5) NOT NULL COMMENT '访问方式。HTTP或者HTTPS',
  `url` varchar(1000) NOT NULL COMMENT '链接',
  `classify` varchar(255) NOT NULL COMMENT '分类',
  `create_by` varchar(255) NOT NULL COMMENT '创建者',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `tlds_alpha_by_domain_list`
--

DROP TABLE IF EXISTS `tlds_alpha_by_domain_list`;
CREATE TABLE IF NOT EXISTS `tlds_alpha_by_domain_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `tld` varchar(64) DEFAULT NULL COMMENT 'tld名称',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tld` (`tld`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
