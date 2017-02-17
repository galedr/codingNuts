-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2017 at 04:19 AM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `codingnuts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_account` varchar(25) NOT NULL,
  `a_password` varchar(25) NOT NULL,
  `a_img` varchar(255) NOT NULL,
  `a_nickname` varchar(255) NOT NULL,
  `a_level` int(11) NOT NULL DEFAULT '1' COMMENT '1 = editor , 2 = master'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理者and編輯者資料' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `a_id` int(11) NOT NULL,
  `a_title` varchar(255) NOT NULL,
  `c_title` varchar(11) NOT NULL COMMENT 'FK - category',
  `a_content` varchar(8000) NOT NULL,
  `a_nickname` varchar(11) NOT NULL COMMENT 'FK - admin',
  `a_tag` varchar(255) NOT NULL,
  `a_datetime` datetime NOT NULL,
  `a_status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = 上架 , 2 = 下架'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章資料' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `c_id` int(11) NOT NULL COMMENT 'FK - category',
  `a_id` int(11) NOT NULL COMMENT 'FK - article'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章與分類的雙關聯資料表';

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章分類' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(11) NOT NULL,
  `m_account` varchar(25) NOT NULL,
  `m_password` varchar(25) NOT NULL,
  `m_img` varchar(255) NOT NULL,
  `m_nickname` varchar(25) NOT NULL,
  `m_status` enum('正常','停權') NOT NULL DEFAULT '正常'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='會員資料' ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;