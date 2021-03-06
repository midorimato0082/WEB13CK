-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th7 07, 2021 lúc 08:00 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `homestayreview`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_last_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_first_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_last_name`, `admin_first_name`, `admin_email`, `admin_password`, `admin_phone`, `admin_avatar`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thị Bích', 'Phượng', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '0123456789', 'FB_IMG_158988859296697.jpg', '2021-07-06 08:04:03', '2021-07-06 08:04:03'),
(2, 'abc', 'dvs', 'abc', 'e10adc3949ba59abbe56e057f20f883e', NULL, '16.jpg', '2021-07-07 00:12:36', '2021-07-07 00:12:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_slug` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Homestay', 'homestay', 1, '2021-07-06 08:09:07', '2021-07-06 08:09:07'),
(2, 'Khách sạn', 'khach-san', 1, '2021-07-06 08:09:13', '2021-07-06 08:09:13'),
(3, 'Resort', 'resort', 1, '2021-07-06 08:09:21', '2021-07-06 08:09:21'),
(4, 'Tin tức', 'tin-tuc', 1, '2021-07-06 08:09:26', '2021-07-06 08:09:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_last_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_first_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_last_name`, `customer_first_name`, `customer_email`, `customer_password`, `customer_avatar`, `created_at`, `updated_at`) VALUES
(1, 'Vương Tuấn', 'Khải', 'customer', 'e10adc3949ba59abbe56e057f20f883e', '96129013_304051853918504_3171417397693251584_n19.jpg', NULL, NULL),
(2, 'Nguyễn', 'A', 'a', 'e10adc3949ba59abbe56e057f20f883e', 'no_avatar35.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_location`
--

DROP TABLE IF EXISTS `tbl_location`;
CREATE TABLE IF NOT EXISTS `tbl_location` (
  `location_id` int(10) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_slug` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region_id` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`location_id`),
  KEY `fk_location` (`region_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_location`
--

INSERT INTO `tbl_location` (`location_id`, `location_name`, `location_slug`, `region_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Khánh Hòa', 'khanh-hoa', 1, 1, '2021-07-06 08:08:12', '2021-07-06 08:08:12'),
(2, 'Đà Lạt', 'da-lat', 3, 1, '2021-07-06 08:08:21', '2021-07-06 08:08:21'),
(3, 'Đà Nẵng', 'da-nang', 1, 1, '2021-07-06 08:08:32', '2021-07-06 08:08:32'),
(4, 'Cà Mau', 'ca-mau', 2, 1, '2021-07-06 08:08:39', '2021-07-06 08:08:39'),
(5, 'Phú Yên', 'phu-yen', 3, 0, '2021-07-06 08:08:50', '2021-07-06 08:08:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_region`
--

DROP TABLE IF EXISTS `tbl_region`;
CREATE TABLE IF NOT EXISTS `tbl_region` (
  `region_id` int(10) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region_slug` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_region`
--

INSERT INTO `tbl_region` (`region_id`, `region_name`, `region_slug`, `status`) VALUES
(1, 'Miền Bắc', 'mien-bac', 1),
(2, 'Miền Nam', 'mien-nam', 1),
(3, 'Miền Trung', 'mien-trung', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_review`
--

DROP TABLE IF EXISTS `tbl_review`;
CREATE TABLE IF NOT EXISTS `tbl_review` (
  `review_id` int(10) NOT NULL AUTO_INCREMENT,
  `review_title` tinytext COLLATE utf8_unicode_ci,
  `review_slug` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `review_desc` text COLLATE utf8_unicode_ci,
  `review_content` text COLLATE utf8_unicode_ci,
  `review_images` text COLLATE utf8_unicode_ci,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(1) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `location_id` int(10) DEFAULT NULL,
  `admin_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `view_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`review_id`),
  KEY `fk_review1` (`category_id`),
  KEY `fk_review2` (`location_id`),
  KEY `fk_review3` (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_title`, `review_slug`, `review_desc`, `review_content`, `review_images`, `tags`, `status`, `category_id`, `location_id`, `admin_id`, `created_at`, `updated_at`, `view_count`) VALUES
(11, 'eview Tula Homestay Thơ Mộng Ngay Ngoại Thành Hà', 'eview-tula-homestay-', 'Tula Hardin homestay đặc biệt không chỉ ở tên gọi mà còn bởi không gian nơi đây. Địa điểm lý tưởng cho chuyến nghỉ dưỡng cuối tuần, hãy cùng Review Homestay khám phá nhé!', '<p>Tula Hardin homestay đặc biệt kh&ocirc;ng chỉ ở t&ecirc;n gọi m&agrave; c&ograve;n bởi kh&ocirc;ng gian nơi đ&acirc;y. Địa điểm l&yacute; tưởng cho chuyến nghỉ dưỡng cuối tuần, h&atilde;y c&ugrave;ng&nbsp;<a href=\"\">Review Homestay</a>&nbsp;kh&aacute;m ph&aacute; nh&eacute;!&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>Địa chỉ: Th&ocirc;n Vật Lại, x&atilde; Ph&uacute; Minh, huyện Kỳ Sơn, H&ograve;a B&igrave;nh</em></strong></p>\r\n\r\n<h2>Tula Hardin homestay ở đ&acirc;u?&nbsp;<a href=\"https://thehappystay.vn/vi/hosts/3424/\">(đặt ngay)&nbsp;</a></h2>\r\n\r\n<p>Tula Hardin toạ lạc ở x&atilde; Ph&uacute; Minh, Kỳ Sơn, Ho&agrave; B&igrave;nh. Homestay ở gần Nh&agrave; m&aacute;y nước sạch s&ocirc;ng Đ&agrave;, c&aacute;ch nội th&agrave;nh chỉ chừng 45km. Bạn c&oacute; thể dễ d&agrave;ng đi xe m&aacute;y hoặc xe &ocirc; t&ocirc; tới đ&acirc;y!&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/94280215-e982-4094-bff8-0f1361899a4b\" width=\"1024\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/31b633e1-69d2-4745-ae90-8c7d7e8621e1\" width=\"1024\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Tula Hardin trong tiếng Philippines mang &yacute; nghĩa l&agrave; khu vườn thơ mộng. Quả đ&uacute;ng như t&ecirc;n gọi, Tula Hardin rất y&ecirc;n tĩnh, ri&ecirc;ng tư, view 3 g&oacute;c hầu hết l&agrave; đồi n&uacute;i, suối, hồ.&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/5cb3130d-7742-4d5d-9dbe-8f0b81f29dad\" width=\"1024\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/df09f5d3-276c-4fd6-b23f-04f861556a4a\" width=\"1024\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Kh&ocirc;ng gian rộng đến 23 ng&agrave;n m2 đầy trong l&agrave;nh, y&ecirc;n b&igrave;nh với 3 khu nh&agrave; homestay. Kh&ocirc;ng chỉ h&agrave;i h&ograve;a trong tổng thể m&agrave; Tula c&ograve;n mang n&eacute;t đặc biệt ri&ecirc;ng. Homestay hướng tới h&agrave;i h&ograve;a tiện &iacute;ch sinh hoạt/ thư gi&atilde;n tiện nghi, hiện đại, bản sắc địa phương v&agrave; khung cảnh thi&ecirc;n nhi&ecirc;n sinh động.</p>\r\n\r\n<h2>C&aacute;c căn nh&agrave; tại Tula Hardin homestay&nbsp;</h2>\r\n\r\n<p>Tula Hardin c&oacute; một căn villa M&ugrave;a H&egrave; cho đo&agrave;n 20 kh&aacute;ch v&agrave; một căn nh&agrave; s&agrave;n M&ugrave;a Thu cho đo&agrave;n khoảng 10 kh&aacute;ch. Tuỳ thuộc v&agrave;o số lượng người trong đo&agrave;n m&agrave; c&aacute;c bạn c&oacute; thể lựa chọn địa điểm ph&ugrave; hợp.&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/ef35e350-5871-41af-8223-f67f54bf6fea\" width=\"1024\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/ac5ff7f4-7993-40c4-80f3-920ae9b8ccef\" width=\"1024\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Khu&ocirc;n vi&ecirc;n tại Tula rất rộng n&ecirc;n d&ugrave; ở villa hay nh&agrave; s&agrave;n bạn đều được sử dụng thoải m&aacute;i. Kh&aacute;ch ở villa v&agrave; nh&agrave; s&agrave;n sẽ c&ugrave;ng chia sẻ khu vực bể bơi v&ocirc; cực rộng 100m2 v&agrave; khu giải tr&iacute;.&nbsp;</p>\r\n\r\n<h3>Villa M&ugrave;a H&egrave;: Hiện đại v&agrave; ấn tượng!&nbsp;<a href=\"https://thehappystay.vn/rooms/35852\">(đặt ngay)&nbsp;</a></h3>\r\n\r\n<p>Villa c&oacute; tổng diện t&iacute;ch sử dụng đến 400m2. Villa c&oacute; 4 ph&ograve;ng ngủ kh&eacute;p k&iacute;n, đều c&oacute; điều h&ograve;a. 2 ph&ograve;ng đơn rộng 20m2, 1 ph&ograve;ng giường đ&ocirc;i rộng 40m2 c&ugrave;ng 1 ph&ograve;ng ngủ tập thể 4 giường c&ugrave;ng với 2 đệm dự ph&ograve;ng. Villa c&oacute; đến 5 nh&agrave; vệ sinh rất sạch sẽ v&agrave; tiện dụng.&nbsp;</p>\r\n\r\n<p>1 ph&ograve;ng ngủ tập thể tầng 2 rộng 80m2 k&ecirc; 4 giường v&agrave; 2 đệm dự ph&ograve;ng.&nbsp;</p>\r\n\r\n<p>Tầng hầm 80m2 c&aacute;ch &acirc;m, bar kết hợp karaoke, c&oacute; thiết kế s&acirc;n khấu ph&ocirc;ng đ&egrave;n led quầy bar,&hellip; xinh xắn theo phong c&aacute;ch rustic ấn tượng. C&aacute;c thiết bị trong villa của Tula Hardin homestay đều rất hiện đại v&agrave; tiện nghi.&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/fea8c9c2-f198-43de-a8f2-910ffa79facc\" width=\"768\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/84c5bab6-15d0-4f43-b6b1-a49ff5f1009d\" width=\"768\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Ph&ograve;ng kh&aacute;ch kết hợp ph&ograve;ng ăn rộng 80m2 với 2 mặt k&iacute;nh lớn. Villa c&oacute; view hướng ra bể bơi, vườn hoa v&agrave; suối để du kh&aacute;ch check-in. Ngo&agrave;i ra, ở đ&acirc;y cũng c&oacute; 3 b&agrave;n ăn lớn đủ cho hơn 20 người ngồi c&ugrave;ng nhau.&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/f0b0b79e-01d1-4636-b0b3-15873dbc032d\" width=\"1024\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/89436ad8-1fc8-4ad5-b0d2-712362013fdb\" width=\"1024\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Đối với những đo&agrave;n kh&aacute;ch y&ecirc;u th&iacute;ch nấu nướng th&igrave; c&oacute; thể tận dụng nh&agrave; bếp của homestay. Ph&ograve;ng bếp rộng 50m2 với đủ nồi chảo, dao thớt, b&aacute;t đũa, cốc ch&eacute;n&hellip; phục vụ cho việc nấu nướng.&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/b3989ddb-15f2-40d8-b712-dd81098746bb\" width=\"768\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/6f64257c-8914-44f6-9574-e7f47509ebb0\" width=\"768\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<h2>Gi&aacute; ph&ograve;ng tại Tula Hardin homestay:</h2>\r\n\r\n<p>Villa M&ugrave;a H&egrave; ph&ugrave; hợp đo&agrave;n 20 người:</p>\r\n\r\n<ul>\r\n	<li>Tối thứ 7: 7tr9 đồng</li>\r\n	<li>Tối thứ 6, chủ nhật: 7tr2 đồng</li>\r\n	<li>Tối thứ 2, 3, 4, 5: 6,5tr đồng</li>\r\n	<li>Ph&ograve;ng Karaoke: 300k đồng/ giờ</li>\r\n	<li>Phụ thu số lượng người vượt ti&ecirc;u chuẩn: 200k đồng/người lớn; 100k/ trẻ em từ 2-12 tuổi, trẻ em từ 12 tuổi trở l&ecirc;n được t&iacute;nh l&agrave; một người lớn, trẻ em dưới 2 tuổi: Miễn ph&iacute;.</li>\r\n</ul>\r\n\r\n<p>Xem th&ecirc;m c&aacute;c căn&nbsp;<a href=\"#\">homestay gần H&agrave; Nội</a>&nbsp;<a href=\"#\">tại đ&acirc;y!&nbsp;</a></p>', '33.jpg|488.jpg|580.jpg', 'Homestay Hòa Bình, Tula hardin hoà bình, Homestay gần Hà Nội', 1, 2, 1, 1, '2021-07-06 11:35:02', '2021-07-06 12:41:20', NULL),
(12, 'Khám Phá The Galaxy Home Hà Nội – Tổ Hợp Căn Hộ Cao Cấp, Hiện Đại', 'kham-pha-the-galaxy-', 'Bạn đang cần tìm một nơi lưu trú lâu dài ở Hà Nội? Vậy thì hãy thử đến The Galaxy Home ngay để lựa chọn một căn phòng phù hợp cho mình nhé! Vị trí thuận tiện, thiết kế hiện đại cùng với mức giá hợp lý là những ưu điểm lớn của khu căn hộ này! Cùng Homestay Review dạo một vòng tham quan bạn nhé!', '<p>&nbsp;</p>\r\n\r\n<p>Bạn đang cần t&igrave;m một nơi lưu tr&uacute; l&acirc;u d&agrave;i ở H&agrave; Nội? Vậy th&igrave; h&atilde;y thử đến The Galaxy Home ngay để lựa chọn một căn ph&ograve;ng ph&ugrave; hợp cho m&igrave;nh nh&eacute;! Vị tr&iacute; thuận tiện, thiết kế hiện đại c&ugrave;ng với mức gi&aacute; hợp l&yacute; l&agrave; những ưu điểm lớn của khu căn hộ n&agrave;y! C&ugrave;ng&nbsp;<a href=\"https://www.facebook.com/reviewhomestay\">Homestay Review</a>&nbsp;dạo một v&ograve;ng tham quan bạn nh&eacute;!</p>\r\n\r\n<p><em>Địa chỉ: 36E Dịch Vọng, Cầu Giấy, H&agrave; Nội&nbsp;</em></p>\r\n\r\n<h3><strong>Vị tr&iacute; của The Galaxy Home H&agrave; Nội&nbsp;</strong></h3>\r\n\r\n<p>Khu căn hộ kh&aacute;ch sạn cao cấp The Galaxy Home tọa lạc tại quận Cầu Giấy, th&agrave;nh phố H&agrave; Nội. Galaxy c&aacute;ch Bảo t&agrave;ng D&acirc;n tộc học Việt Nam chỉ hơn 1 km, c&aacute;ch Vincom Center Nguyễn Ch&iacute; Thanh khoảng 3 km. The Galaxy Home Hotel &amp; Apartment H&agrave; Nội nằm ở đường Dịch Vọng, v&ocirc; c&ugrave;ng tiện cho việc đi lại.</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/d0ac4fab-7c42-42cb-8bbc-467bf6f68cd4\" width=\"1000\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Kh&aacute;ch lưu tr&uacute; chỉ mất v&agrave;i ph&uacute;t ngắn ngủi để gh&eacute; thăm c&aacute;c địa điểm gần đ&oacute; như C&ocirc;ng vi&ecirc;n Cầu Giấy, Keangnam H&agrave; Nội, Lotte Center, s&acirc;n vận động Mỹ Đ&igrave;nh&hellip; Kh&ocirc;ng chỉ tiện gọi xe m&agrave; kh&aacute;ch cũng dễ d&agrave;ng sử dụng xe bus để di chuyển với những tuyến xe bus đi khắp th&agrave;nh phố chạy qua.&nbsp;&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/186153f6-d72f-495e-80a6-6147e604c5d4\" width=\"445\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Từ Galaxy du kh&aacute;ch cũng c&oacute; thể đến Ch&ugrave;a Một Cột v&agrave; Lăng Chủ tịch Hồ Ch&iacute; Minh tham quan chỉ c&aacute;ch khoảng 5 km. S&acirc;n bay quốc tế Nội B&agrave;i chỉ c&aacute;ch kh&aacute;ch sạn khoảng 26 km. The Galaxy Home Hotel &amp; Apartment cũng cung cấp th&ecirc;m dịch vụ đưa đ&oacute;n s&acirc;n bay cho du kh&aacute;ch c&oacute; t&iacute;nh ph&iacute;.&nbsp;</p>\r\n\r\n<h3><strong>C&aacute;c loại ph&ograve;ng v&agrave; căn hộ tại The Galaxy Home H&agrave; Nội&nbsp;</strong></h3>\r\n\r\n<p>Hướng đến đối tượng l&agrave; những du kh&aacute;ch c&oacute; nhu cầu lưu tr&uacute; l&acirc;u d&agrave;i,&nbsp; The Galaxy Home c&oacute; c&aacute;c loại ph&ograve;ng v&agrave; căn hộ d&agrave;nh cho 2 &ndash; 4 người. C&aacute;c loại ph&ograve;ng v&agrave; căn hộ tại Galaxy bao gồm: Ph&ograve;ng Suite, Ph&ograve;ng Junior Suite, Ph&ograve;ng Deluxe.&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/01329e40-0ee8-470b-9ee9-129db8f84a5f\" width=\"1024\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>To&agrave;n bộ khu kh&aacute;ch sạn v&agrave; căn hộ c&oacute; thiết kế hiện đại, tone m&agrave;u ấm chủ đạo tạo cảm gi&aacute;c gần gũi cho du kh&aacute;ch. Khi một người đi c&ocirc;ng t&aacute;c xa hoặc sống tại một th&agrave;nh phố xa lạ trong một thời gian th&igrave; điều họ cần l&agrave; sự quen thuộc, ấm &aacute;p như ở nh&agrave;. Đ&oacute; ch&iacute;nh l&agrave; điều m&agrave; The Galaxy Home H&agrave; Nội hướng đến.&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/aeb27da5-00e4-44ef-acfc-f889e0dbb974\" width=\"1000\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '152.jpg|287.jpg|330.jpeg|414.jpg|562.jpg|623.jpg', 'căn hộ Hà Nội,du lịch Hà Nội', 1, 1, 3, 1, '2021-07-06 22:30:34', '2021-07-06 22:30:34', NULL),
(13, 'Khám Phá Khu Du Lịch Hồ Đồng Đò Sóc Sơn Đang Hot Gần Đây!', 'kham-pha-khu-du-lich', 'Du lịch hồ Đồng Đò Sóc Sơn trở nên thu hút khách du lịch hơn bao giờ hết. Khi ta càng bận rộn và ít có thời gian nghỉ ngơi thì những chuyến đi ngắn ngày ở ngoại thành được ưu tiên lựa chọn. Cùng Homestay Review ghé thăm hồ Đồng Đò để xem địa điểm này có gì thú vị thu hút khách du lịch tới vậy nhé!', '<p>Du lịch hồ Đồng Đ&ograve; S&oacute;c Sơn trở n&ecirc;n thu h&uacute;t kh&aacute;ch du lịch hơn bao giờ hết. Khi ta c&agrave;ng bận rộn v&agrave; &iacute;t c&oacute; thời gian nghỉ ngơi th&igrave; những chuyến đi ngắn ng&agrave;y ở ngoại th&agrave;nh được ưu ti&ecirc;n lựa chọn. C&ugrave;ng&nbsp;<a href=\"https://www.facebook.com/reviewhomestay/\">Homestay Review</a>&nbsp;gh&eacute; thăm hồ Đồng Đ&ograve; để xem địa điểm n&agrave;y c&oacute; g&igrave; th&uacute; vị thu h&uacute;t kh&aacute;ch du lịch tới vậy nh&eacute;!</p>\r\n\r\n<h3><strong>Hồ Đồng Đ&ograve; nằm ở đ&acirc;u?</strong></h3>\r\n\r\n<p>Đập hồ Đồng Đ&ograve; nằm ở Minh Tr&iacute;, S&oacute;c Sơn, H&agrave; Nội c&aacute;ch nội th&agrave;nh khoảng 45km. Từ hồ Đồng Đ&ograve; bạn cũng c&oacute; thể gh&eacute; thăm hồ Đại Lải c&aacute;ch đ&oacute; khoảng 7km. Hay gh&eacute; thăm s&acirc;n golf H&agrave; Nội chỉ c&aacute;ch đ&oacute; chừng 2km.</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/22fc8586-809f-4250-9c4a-8b00c594e76f\" width=\"1280\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Hồ nằm ở vị tr&iacute; tương đối đẹp ở giữa thung lũng. Hai b&ecirc;n hồ l&agrave; đồi n&uacute;i tương đối cao, xung quanh được phủ bởi rừng th&ocirc;ng xanh. Hồ Đồng Đ&ograve; tương đối lớn với chiều rộng l&ecirc;n tới 60 ha v&agrave; chiều d&agrave;i hơn 2km.</p>\r\n\r\n<p>Kh&ocirc;ng kh&iacute; trong l&agrave;nh c&ugrave;ng với rừng th&ocirc;ng, c&acirc;y cối xanh tốt đem lại sự thoải m&aacute;i v&agrave; thư gi&atilde;n khi gh&eacute; tới đ&acirc;y.&nbsp;</p>\r\n\r\n<h3><strong>C&aacute;ch đi đến hồ Đồng Đ&ograve;</strong></h3>\r\n\r\n<p>Du lịch hồ Đồng Đ&ograve; v&ocirc; c&ugrave;ng dễ d&agrave;ng chỉ với xe m&aacute;y, xe bus hay &ocirc; t&ocirc;. Tuỳ v&agrave;o tiện &iacute;ch v&agrave; số người m&agrave; bạn c&oacute; thể lựa chọn phương tiện ph&ugrave; hợp.</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost:8000/bb70d3ae-d16c-4a7e-8c87-0ca8ddedb8ee\" width=\"1280\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '165.jpg|268.jpg|399.jpg|441.jpg', NULL, 1, 1, 2, 1, '2021-07-06 22:33:01', '2021-07-06 22:33:01', NULL),
(14, 'Top 3 Homestay Giúp Bạn Có Chuyến Du Lịch Sapa Trọn Vẹn', 'top-3-homestay-giup-', 'Bây giờ là thời điểm tốt nhất để du hí Sapa-vùng đất ẩn chứa những điều kỳ diệu về cảnh sắc thiên nhiên, con người. Để cảm nhận rõ hơn điều này, những homestay Sapa được đề cập trong bài viết với không gian hòa cùng bản sắc dân tộc và con người vùng núi phía Bắc sẽ là gợi ý lý tưởng cho du khách.', '<p>B&acirc;y giờ l&agrave; thời điểm tốt nhất để du h&iacute;<strong>&nbsp;Sapa-v&ugrave;ng đất ẩn chứa những điều kỳ diệu về cảnh sắc thi&ecirc;n nhi&ecirc;n, con người</strong>. Để cảm nhận r&otilde; hơn điều n&agrave;y, những homestay Sapa được đề cập trong b&agrave;i viết với kh&ocirc;ng gian h&ograve;a c&ugrave;ng bản sắc d&acirc;n tộc v&agrave; con người v&ugrave;ng n&uacute;i ph&iacute;a Bắc sẽ l&agrave; gợi &yacute; l&yacute; tưởng cho du kh&aacute;ch.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><a href=\"https://homestay.review/review-50-homestay-sapa-lac-troi-giua-troi-may.html\">Review 50 homestay Sapa &ldquo;lạc tr&ocirc;i&rdquo; giữa trời m&acirc;y</a></p>\r\n	</li>\r\n	<li>\r\n	<p><a href=\"https://homestay.review/top-20-homestay-sapa-hap-dan-danh-cho-ban.html\">Top 20 homestay Sapa hấp dẫn d&agrave;nh cho bạn</a></p>\r\n	</li>\r\n</ul>\r\n\r\n<h3><strong>1. The Little Hmong House</strong></h3>\r\n\r\n<p><strong>Địa chỉ:</strong>&nbsp;Giang Tả Ch&agrave;i M&ocirc;ng, l&agrave;ng Bản Đ&egrave;n, Sứ P&aacute;n, L&agrave;o Cai, Sapa</p>\r\n\r\n<p>&nbsp;</p>', '115.jpg|235.jpg|344.jpg', NULL, 1, 1, 2, 1, '2021-07-06 22:34:17', '2021-07-06 22:34:17', NULL),
(15, 'ttttt', 'ttttt', 'gẻger', '<p>rgerhaer</p>', '136.jpg|236.jpg|315.jpg', 'dvsdv, sfsevsw', 1, 1, 2, 1, '2021-07-07 00:15:37', '2021-07-07 00:15:59', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
