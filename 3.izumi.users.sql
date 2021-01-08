-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 1 月 08 日 23:09
-- サーバのバージョン： 5.7.30
-- PHP のバージョン: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `gs_chat_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_users_table`
--

CREATE TABLE `gs_users_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_users_table`
--

INSERT INTO `gs_users_table` (`id`, `name`, `email`, `password`, `register_datetime`) VALUES
(1, 'koji', 'test@test.com', '$2y$10$3CWtTCekn/THsEJormj8Q.aNOtm/EiJbbfGu2LG6O5.Xq5VVF7MRK', '2020-12-31 16:08:55'),
(3, 'イズミコウジ', 'aaaa@test.com', '$2y$10$CtzvqP8jHAjlrbc1q1z.SeQxFFwFX4oso2H1VaIb.tg8QSclsZUyO', '2020-12-31 16:10:18'),
(4, 'イズミコウジ', 'cicji@test.com', '$2y$10$V0rbHLBRkA9MLsFIRcDT4eZNb4Tl3hVI4zui7yXiNzgLduWTZKHLy', '2020-12-31 16:14:16'),
(5, 'あいうえお', 'abcd@test.com', '$2y$10$hus6QouodchzLODmEHrAF.ubc1i.Td0BFLRV6BI6hle47FO9MPtuG', '2021-01-03 18:59:57'),
(6, 'あかさたな', 'test1@test.com', '$2y$10$c7OaZqMd6jJUyRiiemNTAucKoUGZInNeYFNhboKHSOri8YjWlIrh2', '2021-01-04 23:21:52');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_users_table`
--
ALTER TABLE `gs_users_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_users_table`
--
ALTER TABLE `gs_users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
