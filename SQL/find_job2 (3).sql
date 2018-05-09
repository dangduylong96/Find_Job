-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 04:58 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `find_job2`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` datetime NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` tinyint(4) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=>Chờ duyêt,1=>Duyệt,2=>Hủy',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `user_id`, `name`, `dob`, `image`, `sex`, `address`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'Đặng Duy Long', '1996-01-25 00:00:00', 'public/images/candidate/wnD3vsvhgkđặng duy long.jpg', 3, '54 Nguyễn Văn Linh, Tuy Hòa, Phú Yên', '0988936354', 1, '2018-03-13 22:16:50', '2018-03-16 21:47:46'),
(2, 6, 'Nguyễn Văn A', '1998-07-18 00:00:00', 'public/images/candidate/DxHdHzGLH3897e5e5bb6456d95269f32704ee42846.jpg', 3, '12 Nguyễn Văn Bảo, phường 5, quận Gò Vấp', '0988936354', 1, '2018-03-14 17:20:04', '2018-03-14 17:20:04'),
(3, 7, 'Nguyễn Văn B', '1997-01-12 00:00:00', 'public/images/candidate/6H5Nte0vdBtải xuống.png', 1, 'H3 Buidling, 384 Hoang Dieu, Ward 6 District 4 Ho Chi Minh', '0988936354', 1, '2018-03-21 06:50:13', '2018-04-20 04:06:04'),
(4, 8, 'Đặng Duy Long', '1970-01-01 00:00:00', 'public/images/public_image/default_image.gif', 1, '1523', '988936354', 1, '2018-04-19 13:58:57', '2018-04-20 04:06:02'),
(5, 15, 'Bùi Hoàng Sơn', '1995-01-30 00:00:00', 'public/images/public_image/default_image.gif', 1, '62/29 Huỳnh Khương An,Phường 5, Quận Gò Vấp, TPHCM', '01699305698', 0, '2018-04-21 14:46:15', '2018-04-21 19:53:34'),
(6, 19, 'Nguyễn Văn Thống', '1995-09-19 00:00:00', 'public/images/candidate/BK8RL9WPvUuser.png', 1, '54 Nguyễn Văn Linh, Tuy Hòa, Phú Yên', '0988936352', 1, '2018-05-09 05:24:58', '2018-05-09 14:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_profiles`
--

CREATE TABLE `candidate_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `candidate_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `level` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `slary` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `display` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_profiles`
--

INSERT INTO `candidate_profiles` (`id`, `candidate_id`, `title`, `category_id`, `level`, `experience`, `slary`, `city`, `view`, `display`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lập trình PHP', 1, 3, 2, 6, 3, 2, 1, 1, '2018-03-14 01:42:38', '2018-05-09 13:08:55'),
(2, 2, 'Lập trình Java', 4, 3, 5, 10, 3, 2, 1, 1, '2018-03-14 17:41:54', '2018-05-09 12:59:32'),
(3, 3, 'C++ Developer', 3, 1, 4, 9, 3, 2, 1, 1, '2018-03-21 06:50:53', '2018-05-09 13:03:38'),
(4, 5, 'Nhân viên ERP', 1, 1, 2, 2, 3, 0, 0, 1, '2018-04-21 14:47:02', '2018-05-09 14:27:30'),
(5, 6, 'Laravel Develop', 1, 1, 2, 5, 3, 1, 1, 1, '2018-05-09 12:51:34', '2018-05-09 14:28:21'),
(6, 6, 'C++', 3, 1, 5, 4, 3, 1, 1, 1, '2018-05-09 14:11:49', '2018-05-09 14:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Web Developer'),
(3, 'Desktop Developer'),
(4, 'Android Developer'),
(5, 'IOS Developer'),
(6, 'Khác'),
(7, 'Tester'),
(8, 'Xây dựng và quản lý dữ liệu'),
(9, 'Quản trị mạng'),
(10, 'Phát triển game (GD)'),
(11, 'SEO'),
(12, 'Trí tuệ nhân tạo'),
(13, 'Chuyên viên hỗ trợ kỹ thuật'),
(14, 'dịch vụ Internet'),
(15, 'An ninh mạng'),
(16, 'Bảo mật hệ thống');

-- --------------------------------------------------------

--
-- Table structure for table `check_jobs`
--

CREATE TABLE `check_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `check_jobs`
--

INSERT INTO `check_jobs` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, '2018-04-05 17:00:00', '2018-04-09 12:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `user_id`, `name`, `size`, `address`, `place`, `image`, `desc`, `website`, `phone`, `view`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Saigon Technology Solutions', 5, '12 Nguyễn Văn Bảo, phường 5, quận Gò Vấp', 3, 'public/images/company/jLO8y6pdcQthiet-ke-logo-cong-ty-thuong-mai-phuong-bac-pbc_thumb_1466496409.jpg', '-Đây là nội dung test', 'https://laravel.com', '0988936352', 5, 1, '2018-04-08 17:00:00', '2018-04-22 15:06:05'),
(2, 2, 'Công ty test 2', 4, '12 Nguyễn Văn Bảo, phường 5, quận Gò Vấp', 2, 'public/images/company/0LDdoZ5SPDthiet-ke-logo-cong-ty-dung-dong.jpg', 'sadasdasdasdasdasdasdasdasdasd', 'https://laravel.com', '988936354', 2, 1, '2018-04-08 17:00:00', '2018-05-09 11:57:47'),
(3, 4, 'RIKKEISOFT', 5, 'Nam Tu Liem, Ha Noi', 2, 'public/images/company/h1wqBo5CNcrikkeisoft-logo-170-151.png', 'RIKKEISOFT là một trong những công ty hàng đầu tại Việt Nam về sản xuất phần mềm, đặc biệt là ứng dụng trên nền web và smartphone. Làm việc cho 100% khách hàng Nhật Bản.\r\n\r\nTháng 10 năm 2014 Rikkeisoft đã trở thành một trong 30 doanh nghiệp CNTT hàng đầu của Việt Nam, vừa được VINASA công bố, giới thiệu và quảng bá tới các khách hàng, đối tác tiềm năng tại gần 100 quốc gia, vùng lãnh thổ trên thế giới!\r\n\r\nRIKKEISOFT được thành lập ngày 06 tháng 04 năm 2012. Kể từ khi thành lập, chúng tôi luôn nỗ lực để tạo ra những sản phẩm mang tính sáng tạo có chất lượng tốt, cống hiến cho sự phát triển của xã hội. Sứ mệnh của chúng tôi là xây dựng nên cuộc sống tốt đẹp hơn nhờ có di động và Internet. Tầm nhìn của chúng tôi là trở thành một trong những công ty lớn nhất tại Việt Nam trong lĩnh vực smartphone, web và di động trong 5 năm tới.', 'https://RIKKEISOFT.com', '0988936354', 3, 1, '2018-04-08 17:00:00', '2018-04-23 11:03:51'),
(4, 9, 'NEC Vietnam', 5, '364 Cong Hoa Tan Binh Ho Chi Minh', 3, 'public/images/company/HaVhBIbVEInec-vietnam-logo-170-151.png', 'NEC established its liaison office in Vietnam in the early 1990’s. In line with its growth strategy, it was re-organized as NEC Vietnam Co., Ltd. in 2006, with a newfound commitment to grow the business and contribute towards the people and society of Vietnam.\r\n\r\nIn a rapidly changing business environment, we have evolved to be a comprehensive solution provider, to deliver on our core strengths of providing Solutions for Society, which involves providing social infrastructure benefiting citizens and communities.\r\n\r\nToday, we are highly dependent on ICT technologies. We are proud to say that NEC is well-positioned to meet the needs of the market, to have the relevant technologies in-house and is ready to deliver.\r\nRefer to http://vn.nec.com/en_VN/about/necvn/recruitment/ for new chances and do not hesitate to apply to NEC VietNam.', 'http://vn.nec.com/', '0988936354', 3, 1, '2018-04-08 17:00:00', '2018-05-09 12:23:00'),
(5, 10, 'FPT Software', 2, 'F-Town Building, Lot T2, D1 Street District 9 Ho Chi Minh', 3, 'public/images/company/y6cddTBx7xfpt-software-logo-170-151.png', 'Join FPT Software – You can make it too! \r\n\r\nYou can catch up with unlimited opportunities to work and live in different countries over the world, join world class software projects with trendiest technologies, innovative products & services that bring great values to millions of people around the world, such as the world’s largest airplane brand, biggest broadcast satellite services in the US, the leading manufacturer of postage meter and mailroom equipment in EU, etc. \r\n\r\nYou can choose your career path to become a technology expert or a professional manager which best fits your desire, qualifications and characteristics in an equal opportunity and open-minded culture workplace. \r\n\r\nYou can balance your working and spiritual life in the environment of youth, multinational culture and creativity, improve impressively vital soft skills including English, Japanese, French… and communication skills through daily direct communication with global customers and employees. \r\n\r\nFPT Software is proud to accompany with thousands of individuals to continuously develop and explore their career path. \r\n\r\nYou can make it too!', 'https://fptshop.com.vn/', '0988936354', 2, 1, '2018-04-08 17:00:00', '2018-05-07 06:36:23'),
(6, 11, 'OHMYLAB VIET NAM', 2, 'H3 Buidling, 384 Hoang Dieu, Ward 6 District 4 Ho Chi Minh', 2, 'public/images/company/KBpN7mKvZUohmylab-viet-nam-logo-170-151.png', 'OHMYLAB VIETNAM COMPANY LIMITED\r\nWE ARE NOT OUT-SOURCING COMPANY. We develop and operate our products used by the group\'s subsidiaries and other travel companies in the form of services.\r\nWE ARE NOT A STARTUP. We work under a group that has a stable business. However, we work as creative and agile as start-ups.\r\nWE ARE EXPERTS. We work under the latest system development process with Microsoft MVP, Certified Scrum Master, Certified Information Systems Auditor. \r\n\r\nYour Journey Begins HERE\r\n\r\nOHMYLAB Co., Ltd. is a IT company under Orenge Partners of Japan, a professional travel management and hotel management group. We aim to become a travel IT company with unrivaled technology in Asia. We strive to build a sustainable high-level process and system to accomplish this.', 'https://OHMYLABVIETNAM.com', '988936354', 3, 1, '2018-04-08 17:00:00', '2018-04-19 11:08:35'),
(7, 13, 'GARENA VN/ Sea Group', 8, '65 Lê Lợi, SaiGon Center 2 - Takashimaya District 1 Ho Chi Minh', 3, 'public/images/company/cs2B7CBxfQgarena-vn-sea-group-logo-170-151.png', '+One of fastest-growing technology companies in Vietnam.\r\n+Found 2009 and reached 1,300+ employees in Aug, 2015.\r\n+50 Point of Customer Service nationwide besides 3 offices in Hanoi, Ho Chi Minh and Danang cities', 'https://www.garena.vn', '0168855861', 4, 1, '2018-04-08 17:00:00', '2018-05-07 06:33:54'),
(8, 14, 'Công ty test', 2, '12 Nguyễn Văn Bảo, phường 5, quận Gò Vấp', 2, 'public/images/company/JL9LA4AVvjkaopiz-sofware-logo-170-151.png', 'Sơ lược là đây', 'https://laravel.com', '988936354', 4, 1, '2018-04-18 14:21:17', '2018-04-21 17:24:05'),
(9, 16, 'Công ty TNHH MTV Phần mềm quản li', 4, '62/29 Huỳnh Khương An,Phường 5, Quận Gò Vấp, TPHCM', 3, 'public/images/public_image/default_image.gif', 'Công ty chuyên phát triển các phần mềm quản lí hệ thống cung cấp cho các doanh nghiệp', 'https://www.facebook.com/son.bui.7146557', '01699305698', 1, 1, '2018-04-21 20:09:19', '2018-04-21 20:32:28'),
(10, 18, 'Toshiba Software Development (Viet Nam) Co, Ltd', 5, '16th Floor, 519 Kim Ma, Ba Dinh, Hanoi', 2, 'public/images/company/vAvuRHaU1ctoshiba-software-development-viet-nam-co-ltd-logo-170-151.jpg', 'Established in April 2007, Toshiba Software Development (Vietnam) Co., Ltd is a software company with 100% capital invested from Toshiba Corporation (Japan). As one of oversea R& D centers of Toshiba Corporate in software development field, we are developing software for variety of Toshiba products & solutions. Besides, TSDV have been also working on R&D activities of cutting-edge fundamental software technogies. We aims to become a leading company in software development field.', 'https://www.toshiba.com.vn/', '0168855861', 6, 1, '2018-05-09 04:23:15', '2018-05-09 14:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `company_save_candidate`
--

CREATE TABLE `company_save_candidate` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `candidate_profile_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_save_candidate`
--

INSERT INTO `company_save_candidate` (`id`, `company_id`, `candidate_profile_id`, `status`) VALUES
(1, 6, 1, 1),
(2, 6, 2, 1),
(3, 5, 1, 1),
(4, 1, 1, 1),
(5, 10, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `manager_cadidate_and_posts`
--

CREATE TABLE `manager_cadidate_and_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `candidate_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `type_apply` int(11) NOT NULL,
  `candidate_profile_id` int(10) UNSIGNED DEFAULT NULL,
  `url_cv_out` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manager_cadidate_and_posts`
--

INSERT INTO `manager_cadidate_and_posts` (`id`, `candidate_id`, `post_id`, `type`, `type_apply`, `candidate_profile_id`, `url_cv_out`, `created_at`, `updated_at`) VALUES
(1, 1, 21, 0, 1, NULL, 'M50uEcdgoWLong_Đặng_Duy_CV.pdf', '2018-03-18 22:34:12', '2018-03-20 19:12:32'),
(2, 1, 20, 0, 0, NULL, '', '2018-03-18 22:38:31', '2018-03-19 10:20:29'),
(3, 1, 15, 0, 0, NULL, '', '2018-03-18 22:38:34', '2018-04-09 07:07:12'),
(4, 1, 16, 1, 0, NULL, '', '2018-03-19 03:36:18', '2018-03-19 03:36:18'),
(5, 1, 9, 1, 0, NULL, '', '2018-03-19 03:38:47', '2018-03-19 03:38:47'),
(6, 1, 1, 0, 0, NULL, '', '2018-03-19 03:39:16', '2018-03-19 20:46:56'),
(7, 1, 18, 1, 0, NULL, '', '2018-03-19 04:30:08', '2018-04-09 06:44:07'),
(9, 2, 21, 1, 1, 2, '', '2018-03-20 10:32:43', '2018-03-20 19:08:27'),
(10, 2, 17, 0, 1, 2, '', '2018-03-20 19:09:50', '2018-03-20 19:09:50'),
(12, 1, 23, 1, 1, 1, '', '2018-03-21 08:25:25', '2018-05-07 06:33:39'),
(13, 1, 22, 0, 1, 1, '', '2018-04-10 21:07:23', '2018-04-10 21:07:23'),
(14, 3, 25, 1, 0, NULL, '', '2018-04-19 13:24:37', '2018-04-19 13:24:48'),
(15, 2, 19, 1, 0, NULL, '', '2018-04-19 13:26:17', '2018-04-19 13:26:17'),
(16, 4, 25, 0, 1, NULL, 'DdLFP6vI7MDang-Duy-Long-CV.pdf', '2018-04-19 14:00:09', '2018-04-19 14:03:50'),
(17, 1, 25, 0, 1, 1, '', '2018-04-19 14:02:00', '2018-04-20 01:54:19'),
(18, 4, 19, 1, 0, NULL, '', '2018-04-19 14:10:30', '2018-04-19 14:10:30'),
(19, 3, 23, 0, 0, NULL, '', '2018-04-20 03:26:01', '2018-04-20 03:26:04'),
(20, 3, 11, 1, 1, 3, '', '2018-04-20 03:26:07', '2018-04-20 03:26:26'),
(21, 3, 18, 0, 0, NULL, '', '2018-04-20 03:32:27', '2018-04-20 03:32:29'),
(22, 1, 14, 0, 1, 1, '', '2018-05-07 06:30:04', '2018-05-07 06:30:04'),
(23, 1, 7, 0, 1, 1, '', '2018-05-07 06:32:15', '2018-05-07 06:32:15'),
(24, 6, 27, 1, 1, 6, '', '2018-05-09 05:44:38', '2018-05-09 14:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `manager_cv_company`
--

CREATE TABLE `manager_cv_company` (
  `id` int(10) UNSIGNED NOT NULL,
  `manager_cadidate_and_posts_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manager_cv_company`
--

INSERT INTO `manager_cv_company` (`id`, `manager_cadidate_and_posts_id`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, '2018-03-20 22:35:06', '2018-05-09 12:43:19'),
(2, 9, 6, 0, '2018-03-20 22:38:04', '2018-05-09 12:43:16'),
(3, 10, 5, 1, '2018-04-09 04:58:19', '2018-04-09 04:58:19'),
(4, 13, 1, 0, '2018-04-20 04:21:22', '2018-04-20 04:21:30'),
(5, 23, 1, 1, '2018-05-07 06:32:54', '2018-05-07 06:32:54'),
(6, 24, 10, 1, '2018-05-09 14:43:49', '2018-05-09 14:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_04_18_204653_create_table_company', 2),
(5, '2018_04_18_211429_create_table_setting', 3),
(6, '2018_04_18_213503_category', 4),
(13, '2018_04_18_213930_create_table_post_employers', 5),
(14, '2018_04_19_102314_tags', 5),
(18, '2018_04_19_112559_create_table_manager_candidate', 6),
(19, '2018_04_19_113107_create_table_candidate_profiles', 6),
(20, '2018_04_19_114412_create_table_manager_cadidate_and_posts', 7),
(21, '2018_04_19_211304_create_table_profile_cv', 8),
(22, '2018_04_20_104804_create_table_manager_cv_company', 9),
(23, '2018_04_20_113226_create_table_company_save_candidate', 10),
(24, '2018_04_20_114130_create_table_check_jobs', 11),
(25, '2018_04_22_214353_create_register_emails_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_employers`
--

CREATE TABLE `post_employers` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_candidate` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_form` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `slary` int(11) NOT NULL,
  `time_try` int(11) NOT NULL,
  `benefit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `workplace` int(11) NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_date` datetime NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=> Đang chờ duyệt,1=>Đã duyệt,2=>Hết hạn,3=>Không được duyệt',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_employers`
--

INSERT INTO `post_employers` (`id`, `company_id`, `title`, `qty_candidate`, `sex`, `desc`, `requirement`, `working_form`, `level`, `experience`, `slary`, `time_try`, `benefit`, `category_id`, `workplace`, `contact`, `expiration_date`, `tags`, `view`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tuyển dụng C#1', 2, 2, 'Mô tả công việc1', 'Yêu cầu công việc1', 1, 3, 4, 6, 3, 'Quyền LợiQuyền Lợi1', '[\"1\",\"4\"]', 3, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"c#\",\"Javascript\"]', 11, 1, '2018-03-12 10:42:59', '2018-04-22 15:06:05'),
(2, 1, 'Tuyển dụng PHP', 2, 1, 'Mô tả công việc', 'Yêu cầu công việc', 3, 4, 4, 5, 4, 'Quyền LợiQuyền Lợi', '[1]', 4, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"PHP\",\"webs\"]', 3, 1, '2018-03-12 10:43:49', '2018-05-09 11:57:47'),
(3, 1, 'Java Developers - Work in Da Nang', 5, 1, '-We are hiring 13 Java developers and 2 Java technical leaders for current and upcoming projects from US. \r\nCandidates must to work in Ho Chi Minh in 3-6 months before moving back to Da Nang \r\n\r\n-If you are looking for a professional working environment, a chance to work on hot technologies: full stack development with Java Spring MVC/Hibernate and AngularJS, let join us!\r\n\r\n-You will be the backbone of Formos and primarily responsible for the development of world-class software. You will work closely with local project teams including project managers, software architects, developers and testers. You will also communicate at times with our US based project managers so you must have good English communication skills.\r\n\r\n-Candidates must demonstrate a deep understanding best practices and have experience with key technology that we use on our projects. Attention to detail and willingness to learn are critical characteristics we are looking for. For the right candidates we offer a great career path to be promoted, very competitive benefits package, exciting projects, and a great team for you to be a part of.', '-Java development experience and skills\r\n-1 - 5 years for Junior and Senior Java developer position\r\n-5+ years for Java technical leader position\r\n-Experience with web enterprise-scale applications\r\n-Experience with Java Spring and related technologies in Spring such as Spring Data, Spring Security, Spring MVC, etc.,\r\n-Experience with Java SE 5-8, JDK, SDK\r\n-Experience or knowledge with AngularJS or other JavaScript frameworks (ReactJS/Node.js etc.)\r\n-Experience with JSON and RESTful Web services\r\n-Experience with Hibernate/JPA/iBatis (or another ORM framework)\r\n-Experience MySQL, or related SQL technologies\r\n-Honest, reliable, organized and detail oriented\r\n-For leader position\r\n-Able to provide technical solution\r\n-Must be seen as a leader and mentor to junior developers\r\n-Do code review for junior team members\r\n-Strong time management skills\r\n-Good English communication skills', 1, 1, 1, 10, 5, 'Formos provides an exciting, fun, open environment in which team members work with cutting edge software development tools and technologies to produce top-quality solutions for customers. We work hard and maintain a fast pace.', '[1]', 4, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"MySQL\",\"Javascript\",\"java\"]', 4, 1, '2018-03-13 02:25:15', '2018-04-23 11:03:51'),
(5, 1, 'Java Developers - Work in Da Nang', 5, 1, '-We are hiring 13 Java developers and 2 Java technical leaders for current and upcoming projects from US. \r\nCandidates must to work in Ho Chi Minh in 3-6 months before moving back to Da Nang \r\n\r\n-If you are looking for a professional working environment, a chance to work on hot technologies: full stack development with Java Spring MVC/Hibernate and AngularJS, let join us!\r\n\r\n-You will be the backbone of Formos and primarily responsible for the development of world-class software. You will work closely with local project teams including project managers, software architects, developers and testers. You will also communicate at times with our US based project managers so you must have good English communication skills.\r\n\r\n-Candidates must demonstrate a deep understanding best practices and have experience with key technology that we use on our projects. Attention to detail and willingness to learn are critical characteristics we are looking for. For the right candidates we offer a great career path to be promoted, very competitive benefits package, exciting projects, and a great team for you to be a part of.', '-Java development experience and skills\r\n-1 - 5 years for Junior and Senior Java developer position\r\n-5+ years for Java technical leader position\r\n-Experience with web enterprise-scale applications\r\n-Experience with Java Spring and related technologies in Spring such as Spring Data, Spring Security, Spring MVC, etc.,\r\n-Experience with Java SE 5-8, JDK, SDK\r\n-Experience or knowledge with AngularJS or other JavaScript frameworks (ReactJS/Node.js etc.)\r\n-Experience with JSON and RESTful Web services\r\n-Experience with Hibernate/JPA/iBatis (or another ORM framework)\r\n-Experience MySQL, or related SQL technologies\r\n-Honest, reliable, organized and detail oriented\r\n-For leader position\r\n-Able to provide technical solution\r\n-Must be seen as a leader and mentor to junior developers\r\n-Do code review for junior team members\r\n-Strong time management skills\r\n-Good English communication skills', 1, 1, 1, 10, 5, 'Formos provides an exciting, fun, open environment in which team members work with cutting edge software development tools and technologies to produce top-quality solutions for customers. We work hard and maintain a fast pace.', '[1]', 4, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"MySQL\",\"Javascript\"]', 3, 1, '2018-03-13 02:26:29', '2018-05-07 06:36:24'),
(6, 1, 'Web Developer (PHP/Java/JavaScript)', 2, 1, '-Lập kế hoạch phát triển và thiết kế website chuyên nghiệp.\r\n-Lập kế hoạch phát triển bản tin công ty thường niên, kỳ, tháng và theo chiến dịch để quảng bá sản phẩm của công ty.\r\n-Thu thập, phân tích thông tin thị trường, sản phẩm cập nhật xu hướng, các công cụ Marketing online, đề xuất với manager triển khai cho công ty\r\n-Quản lý và cập nhật thông tin trên các website công ty tin tuyển dụng, hình ảnh, banner, logo, video clip…\r\n-Hỗ trợ quản lý hệ thống phần cứng máy tính và các công việc liên quan đến vấn đề kỹ thuật tại văn phòng công ty.', '-Tốt nghiệp đại học chuyên ngành Công nghệ Thông tin, Bách khoa (quản trị, thiết kế website, thiết kế đồ họa, quản trị phần mềm, đa truyền thông…)\r\n-Có kinh nghiệm về lập trình website, các ứng dụng web.\r\n-Thành thạo một trong các ngôn ngữ lập trình: PHP/Java/JavaScript\r\n-Thành thạo HTML/CSS\r\n-Ưu tiên ứng viên đã có kinh nghiệm phát triển các website du lịch\r\n-Có kinh nghiệm về thiết kế website, sử dụng thành thạo các phần mềm thiết kế, tạo videos như Adobe, Photoshop, Illustrator, Indesign, Corel Draw, 3D, AI…là một lợi thế.\r\n-Ưu tiên ứng viên có thể sử dụng thành thạo tiếng anh', 1, 1, 3, 10, 1, '-Lương thỏa thuận\\\r\n-Có lương tháng 13\r\n-Thưởng theo hiệu quả công việc/thưởng quý.\r\n-Xét tăng lương hàng năm\r\n-Cơ hội thăng tiến lên Team Leader/Manager\r\n-Du lịch, company trip hàng năm.\r\n-Môi trường làm việc trẻ trung, chuyên nghiệp, năng động và quốc tế.\r\n-Các chế độ phúc lợi khác theo quy định của pháp luật.\r\n-Làm việc tại văn phòng Đà Nẵng.', '[1]', 3, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"PHP\",\"java\",\"Javascript\"]', 2, 3, '2018-03-13 02:32:17', '2018-04-09 05:39:25'),
(7, 1, 'PHP Developer (All levels)', 3, 1, 'Thiết kế, coding và kiểm thử hệ thống hoặc chức năng sau khi hoàn thành.\r\nXây dựng kế hoạch và quản lý tiến độ lập trình theo kế hoạch.\r\n\r\nNghiên cứu nắm bắt công nghệ mới.\r\n\r\nNơi làm việc: Hà Nội.', 'Kiến thức nền về PHP tốt, tư duy nhanh nhẹn, chăm chỉ.\r\n\r\nHiểu kiến thức về OOP, MVC, Coding conventions.\r\n\r\nCó kinh nghiệm làm việc với cơ sở dữ liệu (MySQL, PostgreSQL ...).\r\n\r\nCó kinh nghiệm làm việc với 1 trong các framework PHP (CakePHP, Yii, CodeIgniter, Laravel, Fuel ...).\r\n\r\nBiết các công cụ quản lý mã nguồn: SVN hoặc GIT.\r\n\r\nChủ động trong công việc, khả năng làm việc nhóm tốt.', 1, 2, 3, 9, 4, '- THƯỞNG: Tháng lương 13, thưởng tết, thưởng dự án, thưởng ngày lễ...\r\n- Xét TĂNG LƯƠNG 2 lần/ năm vào tháng 3 và tháng 9\r\n- PHỤ CẤP: tiếng Nhật hàng tháng (Nếu có bằng tiếng Nhật): N3: 1 triệu đồng ; N2: 3 triệu đồng , N1: 5 triệu đồng\r\n- Thưởng các ngày nghỉ Lễ, Tết\r\n- Nghỉ thứ 7, chủ nhật + 1 ngày phép/ tháng.\r\n- Có cơ hội đi onsite tại Nhật.\r\n- Tham gia lớp học tiếng Nhật với giáo viên người Nhật do công ty tổ chức.\r\n- MÔI TRƯỜNG LÀM VIỆC: năng động, thoải mái, chuyên nghiệp, công ty có bàn bóng bàn, máy chơi game, giờ phát nhạc theo yêu cầu giải lao giữa giờ và sau giờ làm việc căng thẳng, có thể tích lũy nhiều kinh nghiệm.\r\n- Các chế độ phúc lợi, chế độ của Công ty: Du lịch, sinh nhật, team building, relax,… tổ chức định kì và thường xuyên nhằm giúp nhân viên thoải mái sau những ngày làm việc căng thẳng.', '[1]', 2, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"PostgreSQL\",\"webs\"]', 4, 1, '2018-03-13 02:38:21', '2018-05-07 06:33:55'),
(8, 3, '02 PHP/Drupal Developers - Up to 20M', 10, 1, 'Tham gia xây dựng hệ thống ERP và CRM phục vụ startup vận tải', 'Tối thiểu 1 năm kinh nghiệm với HTML5, CSS và Javascript và có khả năng phát triển PHP/Drupal.\r\nCó kinh nghiệm tích hợp API là một lợi thế.\r\nCó kiến thức và kinh nghiệm phát triển dự án theo mô hình Scrum/Kanban.', 1, 1, 2, 1, 1, 'Mức lương thỏa thuận Up to 20.000.000 đồng\r\nCơ hội được đào tạo trở thành leader, PM trong 3-6 tháng, trở thành một phần của đội ngũ quản lý.\r\n15 ngày nghỉ phép hàng tháng.\r\nThưởng hiệu quả hàng quý, xét duyệt tăng lương mỗi 6 tháng.\r\nGói cổ phiếu thưởng VSOP cho các cá nhân có thành tích cao.\r\nVị trí: Hà Nội, Remote (dành cho ứng viên thật sự xuất xắc)\r\nThử việc: 1 tháng - FULL lương', '[\"3\",\"5\"]', 2, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"PHP\",\"oop\"]', 2, 3, '2018-03-13 02:52:48', '2018-04-19 12:43:46'),
(9, 3, 'Web Developer (PHP, AngularJS, knockout)', 1, 1, 'Develop company\'s plans.\r\nResearch new technology for the company\'s demands.\r\nAnalyze problems and suggest/provide solutions\r\nHave ability to work independently or in team', 'Being technically confident, flexibility, strong team spirit\r\nGood programming skills in the following technologies:\r\nStrong knowledge and experience in OOP and MVC Frameworks.\r\nExperience in usage one of the following modern PHP frameworks (CodeIgniter, Yii, Zend, CakePHP, Laravel)\r\nExperience with Angular 1.4 or Angular 2.0 or other javascript frameworks knocout,...\r\nExperience in SQL and Database: MongoDB, MySQL, PostgreSQL,NoSQL…\r\nGood knowledge in HTML5/XHTML/CSS/CSS3, Bootstrap, Foundation, SASS\r\nNice to have Node.js, React experienc', 1, 1, 3, 3, 3, 'Attractive salary and benefits;\r\nOpen-minded, young, and friendly working environment with promotion opportunities;\r\nEntitled to all social insurance benefits and high quality health insurance with many benefits for employees and their relatives', '[1]', 3, '{\"name_contact\":\"dangduylong\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"AngularJS\",\"Php\"]', 7, 1, '2018-03-13 03:00:50', '2018-04-23 11:04:29'),
(10, 4, 'Bridge System Engineer (BrSE)', 4, 3, 'This project is to develop system for customer in Japan. Join full life cycle of software development, including, but not limited. \r\n\r\nSupport and make sure the communication between Vietnam and Japan teams should be conducted smoothly.\r\nHand on the requirement and problem, etc.\r\nTo communicate with Japanese.\r\nTo do the project management like progress management etc.\r\nWilling to travel in Japan more than 3 months.', '1) Job Experience \r\n\r\nMust has software development experience: from Detail Design to Unit Test is indispensable.\r\nHave project management experience like as progress management, project management, Quality management etc., as well as more than 2 years of experience of managing the team of more than 10 members.\r\n2) Technical skills \r\nDevelopment language (one of languanges): C/C++ or VB.NET or Java (both web and application)\r\nExperience of Development Processes in at least: Detail Design, Coding, Unit Test.\r\n3) Human skills: \r\nGood interpersonal & teamwork skill, and take the Leadership.\r\nHave sense of responsibility.\r\nCapability for problem-solving.\r\nAble to work under high pressure.\r\n4) Others: \r\nVery good Japanese communication skills (equivalent to N2)\r\nCan read and write Japanese documents\r\nWilling to take business trip to Japan more than 3 months', 1, 1, 3, 11, 1, 'Opportunities for promotion and career-up\r\nSpecial allowance for TOEIC and Japanese (JLPT) certificates (up to $300/month excluded salary)\r\nPremium insurance.\r\nAnnual Heath Check.\r\n13th month salary guaranteed.\r\nPerformance bonus up to 15th month salary.\r\nBirthday allowance, 12 days annual leave.\r\nOpportunity to working onsite to Japan, Singapore, Malaysia, Thailand…\r\nMany activities to tight up the relationship between employees such as company trip, Christmas party, New Year\'s party, support for sport activities, etc.\r\nMany young people, friendly atmosphere, and excellent working facilities.\r\nAnd general C&B as Vietnamese labor law.', '[1]', 3, '{\"name_contact\":\"Nguy\\u1ec5n V\\u0103n V\\u0169\",\"email_contact\":\"ngvanvu@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"Project Manager\",\"Bridge Engineer\"]', 6, 1, '2018-03-17 18:56:11', '2018-05-09 14:38:40'),
(11, 4, 'Technical Leader (PHP, OOP, JavaScript)', 3, 1, 'About ITC\r\n\r\nIT Consultis is a digital agency in Shanghai, Ho Chi Minh City and Singapore strongly committed to researching, creating and executing the best digital solutions, ranging from strategic projects to entirely tailor-made web developments, applications, e-commerce, and in-store experiences.\r\n\r\nIT Consultis was established in 2011 and in only 6 years, it has rapidly expanded to reach over 60 employees, while working with some of the largest brands in the world including GAP, Zara, Porsche, Decathlon, Budweiser, Leica and many more.\r\n\r\nWhat you will get out of this position\r\n\r\nThe ITC development team is composed of developers from junior to senior, working with different strengths. In a dynamic, multi-project and multi-timeline environment, ITC needs someone with proven leading skills to liaison with our CTO, Project Director and team in order to constantly improve our team, our processes and our delivery.\r\n\r\nYou will work side by side with some of the most influential minds in the digital world, and approach the latest trends of advanced technologies. A great chance to practice in order to enhance your skills with solid process & techniques.\r\n\r\nDevelop a fine-tuned view of what you want for your future professional career\r\nPerformance based career evolution', 'Must Have\r\n\r\nProficiency in English\r\nProficiency with the google suite\r\nYou had a similar roles of leader/manager of a team composed of more than 5 members and you have had experience inside multicultural teams\r\nExperience with Git\r\nExperience with CLI\r\nDeep understanding of the Object Oriented Programming (OOP) pattern\r\nUnderstanding of web development best practices\r\nAble to understand business requirements and translate them into technical requirements\r\nExperience with PHP7.x\r\nExperience with JavaScript and modern web technologies\r\nGood understanding of SEO and accessibility best practices\r\nNice to Have\r\n\r\nAny additional programing language is a plus\r\nInvolvement in the development community is a big plus\r\nExperience in working with WeChat API\r\nDeveloping and deploying high availability solutions\r\nResponsibilities\r\n\r\nLeading team to deliver and execute on a project\r\nPerforming peer code reviews\r\nProducing clean, efficient code based on specifications and industry best practices\r\nAccountable for working with outside data sources and APIs\r\nEnsuring the performance, quality, and responsiveness of applications\r\nUnderstanding of continuous integration / continuous delivery concepts and the ability to troubleshoot related issues\r\nAccountable for working on bug fixing and assisting QA/QC Team\r\nLearning new technologies when required\r\nAccountable for continuously discovering, evaluating, and implementing new technologies to optimize development efficiency\r\nProviding architectural direction on behalf of the architect team\r\nActively participate in projects and understanding requirements\r\nCommunicating long-term technical strategies to the group\r\nProviding time estimates for new initiatives\r\nAccountable for unit tests implementation\r\nMaintaining code quality, organization and automatization', 1, 1, 4, 1, 1, 'Are you looking for an innovative and dynamic company that puts the emphasis on productive fun in an engaging work environment? If the answer is yes, then working at IT Consultis should be the right fit for you.\r\n\r\nWorking with us means nurturing your own career and investing in your future. Here are 3 reasons why you should join IT Consultis:\r\n\r\n1) We have a fun team and a great management\r\n\r\n2) You\'ll get an amazing experience working with us\r\n\r\n3) Our employees have great perks and benefits', '[1]', 2, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"oop\",\"PHP\",\"Javascript\"]', 3, 1, '2018-03-17 18:58:13', '2018-04-20 02:53:50'),
(12, 4, 'DevOps Lead (Linux, Java)', 3, 1, 'Design, support and enhance the automated DevOps release management pipeline which delivers tooling for next generation application development (“Dev”) efforts and on-going production operations (“Ops”).\r\nFoster a continuous delivery and cloud first mindset.\r\nPartner with development and operations teams to develop practical automation solutions and custom modules.\r\nTroubleshoot automation issues and find practical solutions that move projects forward in a timely manner.\r\nPerform complex application programming activities from coding, testing and troubles\r\nDrive delivery direction of the DevOps Teams\r\nAssess, identify, recommend DevOps policy and procedures impacted by change resulting from project assignments or day-to-day business process areas priorities.\r\nPlay an integral role in designing and developing continuous delivery, automation and build pipelines that will help the scrum teams delivery fast with minimal technical impediments.\r\nIdentify and develop opportunities to improve our processes and tools specifically for Automation.\r\nManage day-to-day workload and requests using Agile and Lean practices.\r\nMake sure the execution of the builds and deployments to all environments based on build schedule happens.', '5+ years in similar role, responsible for one of the following areas: DevOps, Continuous Delivery and Automation practices.\r\n5+ years of Linux system administration with experience in environment of 100+ servers\r\n3+ years of Software Development experience from architecture, development, QA, UAT through to Production\r\nPractice implementation experience of Continuous Integration and Deployment from development to production.\r\nExperience with DevOps processes and application lifecycle management tools.\r\nExperience with IaaS implementation in cloud-hosted (Azure, AWS) and on-premise server (VMWare)\r\nExpert knowledge of Docker containers, microservice architecture and automated deployment and management of containerized applications.\r\nExperience with continuous integration tools, such as Jenkins, TeamCity etc\r\nExperience with configuration management tools such as Ansible, Chef or Puppet.\r\nExperience with Linux / open systems packaging mechanisms like APT, RPM, PyPi or similar.\r\nKnowledge of non-relational databases like Cassandra or MongoDB, and relational databases like PostgreSQL\r\nDemonstrated ability to write programs using a high-level programming language with Java, Groovy, Shell script, etc.\r\nKnowledge of networking, firewalls, load balancers etc.\r\nExceptional communication skills in English and the ability to communicate effectively with business and technical teams.\r\nIndependently driven, proactive, accountable, reliable, team player.\r\nPeriodic after hours on-call support required.\r\nAbility to travel occasionally (up to 10% of the year)', 2, 1, 1, 5, 1, 'Excellent environment and team to help you grow.\r\nCompetitive salary and learning culture\r\nFortnightly and Monthly Fun Activitie', '[1]', 3, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"java\",\"Linux\",\"oop\"]', 4, 1, '2018-03-17 19:00:41', '2018-04-20 01:46:41'),
(13, 4, 'Back end Server Engineer (C# .NET)', 5, 1, 'Experience Live Stream (HLS, RTMP, RTSP, MPEG-DASH ).\r\nExperience about deploy and config project on AWS and check server performance.\r\nExperience in Cloud Service: AWS with EC2, RDS, S3, Cloudfront, Elastic Beanstalk.\r\nStrong analytical and problem solving skills.\r\nExcellent Teamwork, communication, and interpersonal skills.\r\nExperience in mobile development.', '2-3 years experience.\r\nBachelor’s Degree in Computer Science or any related discipline preferred.\r\nProvide technical architecture and technical vision for our mobile application platforms.\r\nStrong experience about server side .Net,C#.\r\nStrong experience about database MySQL or major Relational Database, optimization the SQL performance.\r\nExperience handle amount big data server side.\r\nSolid understanding of object-oriented programming.\r\nFamiliar with concepts of MVC, Mocking, ORM and RESTful.\r\nAble to create database schemas that represent and support business processes.\r\nExcellent Teamwork, communication, and interpersonal skills.\r\nExperience with server side performance scalability.', 1, 1, 4, 8, 1, '- 12 annual leave and 18 paid-sick leave per year\r\n- Modern, open and comfortable working environment\r\n- Well-equipped entertainment room ( Table tennis, billiards, weight …) \r\n- Creative and friendly colleagues, enthusiast and supportive management \r\n- Free drink and snack\r\n- Fruit party every Friday\r\n- Birthday party, Teambuilding, Company trip, Year End party\r\n\r\nWorking from 8.30 to 18.00 Mon to Fri (1.5 hour lunch break)', '[\"1\",\"3\"]', 3, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"c#\",\".NET\",\"MySQL\"]', 4, 1, '2018-03-17 19:02:34', '2018-04-20 02:59:47'),
(14, 5, '.NET Developer-Up to1500 (Work in Hanoi)', 10, 1, 'FPT Software - the Software Powerhouse\r\n\r\nVietnam\'s largest and one of the fastest growing software outsourcing companies.\r\nOver 8,000 software outsourcing projects and a total volume of 2.5 million man-days in the last 10 years.\r\nA broad presence in diverse global markets.\r\nSpecialist in shaping world-class networks of global delivery centers.\r\nJOB DESCRIPTIONS\r\n\r\nReceive and analyze requirements in local team with support and assignment from team leaders.\r\nDevelop enterprise application for customer worldwide.\r\nResponsible for quality of product, quality of code.\r\nCommunicate with customer under supervision of team leader.', 'Have knowledge of web technology\r\nStrong at OOP, object oriented design and analysis. Can understand and apply design patterns\r\nHave knowledge of ASP.NET MVC or JavaScript MVC or AngularJS\r\nOpen mind, good logical thinking and pro-active', 1, 1, 5, 10, 1, 'Working directly with foreign customer. Real Agile Scrum environment.\r\nRegular business trips to Czech, for training and meet Quadient members in Quadient office, for best Hanoi members\r\nRegular visits by best developers from Czech to HaNoi – trainings, discussions,..\r\nRegular Quadient days (games, dinner and karaoke in resort)\r\nFriendly, honest and open atmosphere\r\nOpportunity to learn from stable company, leader on the market and experienced developers\r\nLong term cooperation\r\nSuccessful candidates will be part of a friendly, open, motivated and committed talent teams in FPT Software with various benefits and attractive offers.\r\nSuccessful candidates will be offered a friendly, motivated working environment;\r\n“FPT care” health insurance provided by AON and is exclusive for FPT employees.\r\nAnnual Summer Vacation: following company’s policy and starts from May every year.', '[1]', 2, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"MVC\",\"ASP.NET\",\".NET\"]', 1, 1, '2018-03-17 19:06:19', '2018-04-09 04:45:44'),
(15, 5, '20 PHP Developers (MySQL, Linux)', 20, 1, 'Working locations: Ha Noi, Ho Chi Minh, Da Nang\r\nABOUT CUSTOMER\r\n\r\nDai Nippon Printing (DNP), established in 1876, is one of the most famous printing companies in Japan. The company operates its printing in three areas; Information Communications, Lifestyle and Industrial Supplies, and Electronics.\r\nDNP’s involved in a wide variety of printing processes, ranging from magazines through to shadow masks for the production of displays, as well as out-coupling enhancement structures for LCD displays and scattering for display backlights.\r\nThe company has more than 35,000 employees.\r\nJOB DESCRIPTIONS\r\n\r\nBeing a key team member/team leader of Project Unit which cooperates with Solution Department of DNP Corporation.\r\nBeing responsible for PHP technologies and solutions for the project.\r\nWill be assigned to following sub-projects using PHP programing language:\r\nMigration Project\r\nNew Development Project\r\nCreates and executes project work plans and revises as appropriate to meet changing needs and requirements.\r\nHave chance to participate in upcoming projects such as Detail Designing and Mobile Development.', 'Bachelor\'s Degree in Computer Science or related field.\r\nQualify the requirement of technical knowledge and experience:\r\nAt least 2 years’ experience in programming in PHP technologies\r\nCan resolve technical issues and ensure quality of design/source code\r\nStrong experience with PHP; LAMP; RESTFul Web service\r\nExperience with database\r\nExperienced with OOP/UML/Design Patterns\r\nGood in writing design document and approaching new technologies\r\nGood at analyzing & problem solving skill\r\nGood teamwork generates enthusiasm among team members.\r\nNice to have:\r\nExperienced with PHP frameworks such as Laravel; Yii; Symphony; etc. is a plus\r\nHave experience of working with Japanese Customer/Clients is a plus\r\nAbility to work under pressure and to deadline\r\nAbility to lead a small team', 1, 1, 5, 1, 1, 'Successful candidates will be part of a friendly, motivated and committed talent teams in FPT Software HCM (FSOFT) with various benefits and attractive offers:\r\n\r\nSuccessful candidates will be offered a friendly, motivated working environment;\r\nGet involve in major full-cycle project with large scale and opportunities to work directly with specialists and experts in system designing in Japanese top corporations in producing medical devices.\r\n“FPT care” health insurance provided by AON and is exclusive for FPT employees.\r\nCompany shuttle buses provide convenient way of transportation for all employees.\r\nAnnual Summer Vacation: following company’s policy and starts from May every year.\r\nOther allowances: transportation support by company bus, lunch allowance, working on-site allowance, etc. plus company support for housing in District 9.\r\nF-Town Campus provide many facilities for FPT Software employees such as football ground, basketball & volleyball, gym center, cafeteria, etc.', '[1]', 3, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"MySQL\",\"Linux\",\"PHP\"]', 1, 1, '2018-03-17 19:07:55', '2018-04-09 04:45:44'),
(16, 5, '05 Sr. Front-end HTML5, CSS, Javascript', 5, 1, 'Turning wireframes into reality for web and mobile/tablet projects.\r\nBuilding project structures and communicating it to your team.\r\nConvert PSD to HTML/CSS template with JavaScript integrated.\r\nWorking with UI, mobile, and backend teams to define and build next-generation reading experiences for a variety of devices.\r\nWorking with the QC team to define performance criteria and metrics for measuring the success of new projects.', '2+ years experience with HTML5/CSS3/Javascript\r\nProficient with a CSS Preprocessor such as SASS or LESS\r\nExperience: Bootstrap, JS, Angular JS, Ajax, jQuery, Responsive Web\r\nKnowledge of the DOM HTML objects and their properties\r\nExcellent problem solving and debugging skills\r\nComfortable working with existing code and writing code from scratch\r\nFamiliar with source control systems (Git or SVN) is preferred\r\nGood communication skills\r\nKnowledge about browsers, operating systems (Win, Mac, iOS, Android, WM…).\r\nExperience with Tomcat/Virgo, caching, continuous integration', 1, 1, 3, 1, 1, 'Successful candidates will be part of a friendly, motivated and committed talent teams with various benefits and attractive offers:\r\n\r\nVery Attractive offer plus annual compensation and performance bonus.\r\n“FPT care” health insurance provided by AON and is exclusive for FPT employees.\r\nCompany shuttle buses provide convenient way of transportation for all employees.\r\nAnnual Summer Vacation: follow company’s policy\r\nOther allowances: transportation allowance, lunch allowance, working on-site allowance, etc.\r\nF-Town Campus provides many facilities for FPT employees such as football ground, basketball & volleyball, gym centre, cafeteria, etc.', '[1]', 3, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"html5\",\"CSS\",\"Javascript\"]', 4, 1, '2018-03-17 19:09:09', '2018-04-23 08:59:06'),
(17, 5, '20 Android Developers – Up to 1500$', 20, 1, 'Work in Mobile Project as: Senior Developer under Management of Customer\r\nCustomized integration development with other software systems based on Customer requirements\r\nCollaborate closely with Project Manager and other team members to determine various application constraints and establish each element\r\nWorking locations: Ho Chi Minh, Ha Noi, Da Nang', 'Have at least 2+ years of experience in Android development using Android SDK, ADT\r\nMust have experience developing for multiple screen sizes\r\nExperience with developing custom UI for native Android component\r\nHave experience in integrating Android apps with web services; video streaming\r\nHave experience developing Java web application is a plus', 1, 1, 3, 3, 3, 'Competitive salary and Award based on performance ( $700- $1500)\r\nHave opportunity to be promoted to the higher positions\r\n“FPT care” health insurance provided by AON and is exclusive for FPT employees.\r\nAnnual Summer Vacation: follows company’s policy and starts from May every year\r\nSalary review 2 times/year or on excellent performance\r\nYou will be working in international environment with people from around the world, and therefore you will improve your expertise and English skills.\r\nOpen working environment with young and enthusiastic people', '[1]', 3, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"MobileApps\",\"java\",\"Android\"]', 5, 1, '2018-03-17 19:10:49', '2018-05-07 06:11:00'),
(18, 5, 'Senior Java Developer', 4, 1, 'We are seeking IT professionals with experience in applications development to serve as web developers for the Company\'s Internet/Intranet applications. This entails planning, designing, configuring, installing, testing, troubleshooting, and integrating applications; evaluating system performance, and providing technical support for computer application programs; and facilitating security management.\r\n\r\nDevelopment & maintenance of the Company\'s web/applications\r\nCustom application, or new module, specifications\r\nEnsuring quality of work through development and implementation of QA procedures and standards\r\nAccurately outlining work task breakdowns for programming side of new projects\r\nAccurately estimating time frames for work completion and hitting them\r\nAccurately and regularly completing timesheets\r\nWorking with team to educate project managers about programming solutions\r\nEducating and at times, coordinating, contract developers', 'Bachelor degree in Computer Science, Software Engineering.\r\nMust be highly experienced Java developer, having minimum of 3 years professional experience.\r\nWorking knowledge on Spring MVC, Spring JDBC, Spring Web service\r\nStrong SQL knowledge and development experience (MySQL, MS SQL, NonSQL).\r\nStrong knowledge of design patterns, refactoring and unit testing.\r\nJava Certified Programmer /Developer (SCJP/OCJP) is a plus.\r\nHaving experiences with cloud services (Amazon, Google,..) is a plus.\r\nStrong English skills as frequently communicate with US clients.\r\nExperienced working in Agile environment and methodologies such as Scrum.\r\nHaving working experiences in foreign companies is a plus.\r\nAbility to lead a small team.', 1, 1, 3, 3, 1, 'We\'re always looking for superstars to join our team in any of our three offices and we have 12 core values that make us who we are today and define where we are going tomorrow: \r\n• Build a family spirit \r\n• Focus on users and all else will follow \r\n• Recognize and reward results \r\n• Move fast \r\n• Keep things simple \r\n• Be honest and direct \r\n• Stay lean \r\n• Leverage technology \r\n• Embrace change \r\n• Don\'t take success for granted \r\n• Aspire to improve and change the world \r\n• Live Healthy', '[1]', 2, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"MySQL\",\"java\",\"Spring\"]', 4, 1, '2018-03-17 19:12:36', '2018-04-09 06:23:11'),
(19, 6, '10 Full-stack Dev (.NET, JavaScript, C#)', 3, 1, 'Produce fully functional programs writing clean, testable code\r\nCollaborate with VN team and KR team to identify system requirements\r\nUpgrade and repair existing programs\r\nPerform periodical tests and debugging to maximize program efficiency\r\nFollow security principles\r\nCreate technical documentation to share information with internal team\r\nTroubleshoot and debug applications…\r\nWork in real Agile scrum team', 'At least 2 years development experience with C#, ASP.NET MVC/ Web API or ASP.NET Core, Visual Studio Team Service, MS. Azure, Entity Framework and MS SQL Server.\r\nAt least 1-year development experience with JavaScript and Angular\r\nFamiliarity working with HTML/CSS\r\nKnowledge of Object-Oriented paradigm and web application development\r\nProject management skills within a fast-paced work environment\r\nIn-depth understanding of the entire web development process (design, development and deployment)\r\nPreferred Skills\r\n\r\nEnglish language proficiency\r\nAttention to detail\r\nTeamwork skills with a problem-solving attitude', 1, 1, 4, 1, 1, 'Attractive,13th salary, employee care allowance\r\nTechnical trainings & Full social Insurance\r\nAnnual checkup, medical cover & Company events', '[1]', 4, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"c#\",\".NET\",\"Javascript\"]', 5, 1, '2018-03-17 19:16:39', '2018-05-07 06:08:37'),
(20, 6, 'Senior JavaScript/ Java Developer (J2EE)', 4, 1, 'DFO Global Performance Commerce is a rapidly expanding online performance marketing and technology organization. We build e-commerce financial technology along with the most successful and innovative advertising for e-commerce. We combine expert marketing with technology. We want amazing people to help us with our continued global growth.\r\nDFO Global Performance Commerce is a global agency, with offices in Canada, United States, Netherlands, Hong Kong, Brazil and the Philippines. If you love either technology or marketing, join us.\r\nWe need an experienced javascript developer who can build functions for our content management system \"CMS\" for low code users, design and build plugins, components, dialogs, and workflows using our CMS architecture.\r\nYou will participate in the design, development and implementation of Javascript based solutions using our CMS. Such implementations include the development of custom web applications, e-commerce site templates, and other general improvements and feature additions to our CMS system.\r\nYou will provide support to our CMS white labeled enterprise customers, and will be responsible for overall escalation management and technical solutions when incidents are reported; provide technical leadership and education to colleagues and team members related to CMS platform.', 'Advanced user of Java and javascript\r\nExperience with content management systems, Liferay, Lucene, JSPs, CMIS, SOLR, Spring, Velocity, Struts, Dojo, OSGI.\r\n2+ years J2EE/ Java, javascript web experience\r\n2+ years development cycle experience using JavaScript, JQuery, JSON, AJAX, HTML, CSS and or Eclipse.\r\nJava servlets, JSPs, Struts, Hibernate, Velocity, Spring\r\nExperience with Git, Gradle, JIRA and CI preferred.\r\nExperience of Apache/Tomcat, Glassfish, Websphere preferred\r\nDatabases: Postgresql, MSSQL, MySQL\r\nThird-party API integration preferred: REST, Sling and SOAP in a production environment.\r\nNice to have:\r\n\r\nJava and JavaScript in the context of plugins and web apps\r\nExperience with cloud platforms (Azure, AWS, DigitalOcean, Google).\r\nVelocity, Elastic Search experience.\r\nKnowledge of Bootstrap, Foundation or other CSS responsive framework.\r\nSoft skills:\r\n\r\nGood communication skills in English or Chinese\r\nAbility and desire to travel\r\nExperience and desire to work within a fast-paced, iterative development environment\r\nexperience with Agile a strong plus.\r\nDegree in Computer Science, or relevant experience a plus', 1, 1, 3, 1, 1, '3th month salary as default, performance bonus yearly.\r\nFast growing agency; over 2x growth in 2017 alone. Early technology adopters.\r\nPremium Health Care.\r\nTraining Abroad. Education subsidy after 1 year of employment.\r\nOpportunity to travel globally.\r\nExciting and diverse team, spread all around the world!\r\nReputation in the advertising space for being professional, innovative, and disruptive.', '[1]', 2, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"Javascript\",\"J2EE\",\"java\"]', 4, 1, '2018-03-17 19:20:26', '2018-04-22 15:05:22'),
(21, 6, 'Web Developer-PHP, Laravel, Angular JS', 2, 1, 'Upgrade, optimize and automate the Southeast Asia Influencer Platform\r\nBuild Hiip app with React Native\r\nOpportunity to work with Big Data\r\nDevelop product by technologies: Boostrap 4, Angular 4, PHP Laravel 5. *, Python, Mysql, Mongodb', '+1-4 years of experience in Web technologies (HTML5, CSS3, Javascript), Responsive\r\n+1-2 years of Back-end experience in PHP / Java\r\n+Experience in Rest API\r\n+Experience in using Source Version Control (Github)\r\n+Experience in Angular 4 / Laravel is a plus\r\n+Want to step out of comfort zones and work on super-hard problems to learn new things\r\n+Good logical thinking, research skill and learn new technologies quickly\r\n+Eager to get things done\r\n+Good communicate and teamwork', 1, 2, 3, 8, 1, '+Salary ( base on your performance and follow the company policy)\r\n+Opportunity to join a dynamic, professional and venture-funded fast growing start-up. Hiip has three offices in Ho Chi Minh City, Hanoi and Thailand now\r\n+Opportunity to do with React Native, Big Data and other new technologies\r\n+Line manager is always ready to support and create best opportunities for employee to grow\r\n+Get free food & drink every day\r\n+Work time: 9:00 -18:00 from Monday to Friday, time is flexible as long as you deliver your task', '[1]', 2, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"PHP\",\"React Native\",\"Javascript\"]', 12, 1, '2018-03-17 19:21:46', '2018-05-09 05:39:24'),
(22, 1, 'Senior QA/QC Analyst', 10, 1, '+Validate that software performs to established guidelines\r\n+Write, review, revise and verify quality standards and test procedures for program design and product evaluation\r\n+Participate in review of standards, procedures, tools and process\r\n+Monitor, manage and communicate with developers on defects\r\n+Implement automated testing solutions\r\n+Prepare and develop test strategies and test plans\r\n+Assist project leaders in solving quality assurance issues\r\n+Work collectively to solve defects\r\n+Assist in disaster recovery testing', '+Familiarity with user acceptance test.\r\n+Deep understanding of continuous integration and deployment processes.\r\n+Familiarity with bugs reporting and tracking tools (Redmine, BugHerd).\r\n+Familiarity with user stories and SCRUM methodology.\r\n+Familiarity in testing REST APIs\r\n+You need to master these technologies:', 1, 1, 1, 1, 1, 'Are you looking for an innovative and dynamic company that puts the emphasis on productive fun in an engaging work environment? If the answer is yes, then working at IT Consultis should be the right fit for you.', '[\"6\"]', 2, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"webs\",\"Javascript\"]', 12, 1, '2018-03-20 08:44:40', '2018-05-07 12:48:50'),
(23, 7, '20 Sr/ Software Engineers (PHP/Java/C++)', 3, 1, '+Handle server side design & development of Garena products;\r\n+Be familiar with agile development, write high-quality, clean, simple, and maintainable code, build common libraries\r\n+Analyse requirements, design and develop functionality, according to product demands;\r\n+Acquire an in-depth understanding of products, constantly optimize the products, diagnose and fix problems, improve stability and user experience;\r\n+Design and implement various supporting tools as required;\r\n+Collaborate with other software engineers, product managers, user experience designers, and operation engineers to build new products.', '+Comprehensive knowledge in all areas of computer science (data structures and algorithms, operating systems, networks, security, databases, etc);\r\n+Familiar with C++/PHP/Python/Java, hands-on experience is preferred;\r\n+Familiar with common network protocols (TCP, UDP, HTTP), and network programming;\r\n+Familiar with Windows/Linux development environments, and multi-threaded programming;\r\n+Familiar with web technologies is preferred;\r\n+Experience in design and development of large-scale distributed systems is preferred', 1, 2, 3, 1, 1, '+Very attractive salary (2.000usd+)\r\n+13th month salary is guaranteed\r\n+Yearly allowance based-on performance.\r\n+Extra health insurance plan (include accident): Health insurance package & Private health insurance\r\n+Lunch & daily foods, compulsory insurance paid on 100% actual salary.\r\n+Annual health check, company trip\r\n+Onsite to Singapore office', '[3]', 3, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"nh0xpr0py2@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"C++\",\"java\",\"PHP\"]', 7, 1, '2018-03-21 06:46:45', '2018-05-07 06:33:49'),
(24, 8, '10 PHP Developers (Up to $1300)', 2, 1, '+Tham gia các dự án sử dụng ngôn ngữ lập trình PHP và các công nghệ liên quan cho các khách hàng lớn đến từ Nhật Bản.\r\n+Phân tích thiết kế và lập trình chức năng của các website.', '+Tốt nghiệp đại học, cao đẳng chuyên ngành IT\r\n+Biết sử dụng một trong các Framework PHP: CakePHP, Zend, CodeIgniter, Yii, Symfony, Laravel, Phalcon.\r\n+Thao tác tốt với HTML, CSS, JavaScript (Jquery, Ajax), Bootstrap, JSON, XML\r\n+Hiểu biết về MVC Framework, ORM, RESTful, OOP, DesignPattern\r\n+Viết code rõ ràng, dễ hiểu, dễ maintain, tuân thủ chặt chẽ convention\r\n+Có tư duy, thuật toán tốt, khả năng sáng tạo.\r\n+Có tinh thần chịu khó, ham học hỏi', 1, 1, 3, 1, 1, '+Mức lương thỏa thuận( Up to $1200).\r\n+Điều chỉnh lương: 2 lần/năm. (vào tháng 06 và tháng 12 hàng năm)\r\n+Thưởng dự án hàng tháng, Lương tháng 13 và thưởng hàng năm.\r\n+Trợ cấp ăn trưa: 800.000/tháng\r\n+Phụ cấp chứng chỉ IT (nếu có)\r\n+Phụ cấp tiếng Nhật ~2.000.000 (nếu có)', '[\"1\",\"5\"]', 3, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-05-31 00:00:00', '[\"PHP\",\"MySQL\",\"webs\"]', 4, 1, '2018-04-19 04:42:39', '2018-05-07 06:14:54');
INSERT INTO `post_employers` (`id`, `company_id`, `title`, `qty_candidate`, `sex`, `desc`, `requirement`, `working_form`, `level`, `experience`, `slary`, `time_try`, `benefit`, `category_id`, `workplace`, `contact`, `expiration_date`, `tags`, `view`, `status`, `created_at`, `updated_at`) VALUES
(25, 8, 'E-Commerce PHP Developer', 10, 1, '+Your mission is developing functional WAP sites to introduce and sell our excellent games to gamers around the world. We\'ve already had a big framework to support and speed up coding time, your job is working for the best solution to animate the WAP sites.\r\n+This is a job for those who love to write code; interact with big world-wide distribution system; ship new WAP sites and solve real time', '+ Bachelor’s degree in Computer Engineering, or strong Computer Science background;\r\n-+Experience in web/wap programming and having taken part in at least one major project;\r\n-+Good PHP and MySQL skills and familiar with other web technologies such as HTML/XHTML/XML…;\r\n-+Good in English (reading and writing), and very good interpersonal and communication skills;\r\n+Result-orientation, teamwork, and good analysis & multi-tasking skills;\r\n+Rigorous, reliability and autonomy;\r\n+Ability to work under pressure.', 2, 1, 1, 1, 1, '+You want to be part of an exceptional experience, within a company that is constantly growing.\r\n+ You want to work with talented people who are industry pioneers.\r\n+You want to join a global company and meet great people around the world from all walks of life.\r\n+Or, you are just looking for a fun place to work!', '[\"3\",\"5\"]', 4, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-06-08 00:00:00', '[\"PHP\",\"MySQL\"]', 22, 1, '2018-04-22 05:08:16', '2018-05-09 12:07:07'),
(26, 9, 'Nhân viên ERP', 10, 1, 'Thu thập yêu cầu khách hàng\r\nXây dựng một phần mềm quản lí về một lĩnh vực nào đó', 'Phải thành thạo các ngôn ngữ lập trình', 1, 1, 2, 5, 1, 'Tăng lương hàng quý\r\nBHXH', '[\"3\",\"1\"]', 3, '{\"name_contact\":\"B\\u00f9i Ho\\u00e0ng S\\u01a1n\",\"email_contact\":\"buison3001@gmail.com\",\"address_contact\":\"62\\/29 Hu\\u1ef3nh Kh\\u01b0\\u01a1ng An, Ph\\u01b0\\u1eddng 5, Qu\\u1eadn G\\u00f2 V\\u1ea5p, TPHCM\",\"mobile_contact\":\"01699305698\"}', '2018-06-20 00:00:00', '[\"PHP\",\"MySQL\"]', 5, 1, '2018-04-21 20:27:00', '2018-05-09 14:36:34'),
(27, 10, 'Software Engineer (C++, Java, C#)', 3, 3, '+Contribute in analyzing user needs and software requirements to determine feasibility of software solution.\r\n+Investigate & gather knowledge of new technologies & new industrial business domain to determine software solution and/or conduct domain-specific software engineering.\r\n+Contribute in complex low level design/program design and high-level design of less complex feature areas.\r\n+Responsible for implementing, customizing, maintaining & debugging software solution.\r\n+Contribute to test plan & test design; Develop & execute test cases for both low level and high level testing. \r\n+Create customer documentation & test reports.\r\n+Review of work done by peers.\r\n+Contribute in system integration, fixing of bugs reported by customer.\r\n+Maintain good relationship with customers and teamwork spirit with fellow team members.\r\n• Conduct training/coaching for junior members in software development if requested.', '+Firm knowledge of computer science & software engineering: fundamental computer science, general programming skills, software design, software debugging, software documentation, software testing, software development process.\r\n+Skillful at one of common programming languages: C/C++, Java, C#, etc.\r\n+Strong analytical skills, problem-solving skills and the ability to pay careful attention to detail.\r\n+High capability of self-studying/investigating new technologies & new business domains on demand.\r\n+Self-awareness, good sense of responsibility, result-oriented and deadline commitment.\r\n+Capacity to work well in groups and a willingness to understand the various roles played by fellow team members.\r\n+Appropriate English language fluency (verbal & written) is basic requirement; Japanese language is an advantage.\r\n+Working experiences in software development industry, especially, in offshore companies for Japanese customers is an advantage.', 1, 4, 1, 9, 1, 'Our philosophy of development is Culture Blending. TSDV is merging (i) Japanese advantage of integration knowledge and rigorous quality mindset with (ii) Vietnamese advantage of excellent capability and rapid understanding. As the result, we could develop software with breakthrough in Quality and Productivity and we could inherit and accumulate Toshiba knowledge. \r\nJoining TSDV as a software engineer, you have great chances to experience', '[\"1\",\"4\"]', 3, '{\"name_contact\":\"\\u0110\\u1eb7ng Duy Long\",\"email_contact\":\"dangduylong96@gmail.com\",\"address_contact\":\"12 Nguy\\u1ec5n V\\u0103n B\\u1ea3o, ph\\u01b0\\u1eddng 5, qu\\u1eadn G\\u00f2 V\\u1ea5p\",\"mobile_contact\":\"0988936354\"}', '2018-06-30 00:00:00', '[\"java\",\"c#\",\"C++\"]', 6, 1, '2018-05-09 04:41:32', '2018-05-09 14:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `profile_cv`
--

CREATE TABLE `profile_cv` (
  `id` int(10) UNSIGNED NOT NULL,
  `candidate_profile_id` int(10) UNSIGNED NOT NULL,
  `target` text COLLATE utf8mb4_unicode_ci,
  `experience` text COLLATE utf8mb4_unicode_ci,
  `level` text COLLATE utf8mb4_unicode_ci,
  `english` text COLLATE utf8mb4_unicode_ci,
  `advantages` text COLLATE utf8mb4_unicode_ci,
  `cv` text COLLATE utf8mb4_unicode_ci,
  `view` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_cv`
--

INSERT INTO `profile_cv` (`id`, `candidate_profile_id`, `target`, `experience`, `level`, `english`, `advantages`, `cv`, `view`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"target\":\"\\u0111\\u1eb7ng duy232\"}', '[{\"experience_name_company\":\"C\\u00f4ng ty NUS\",\"experience_title\":\"Nh\\u00e2n vi\\u00ean\",\"experience_time\":\"3\",\"experience_desc\":\"-\\u0110\\u00e2y l\\u00e0 m\\u00f4 t\\u1ea3 c\\u00f4ng vi\\u1ec7c\",\"experience_medal\":\"Hu\\u00e2n ch\\u01b0\\u01a1ng lao \\u0111\\u1ed9ng\"}]', '[{\"name_level\":\"1\",\"tranning_unit_level\":\"\\u0110ai h\\u1ecdc c\\u00f4ng nghi\\u1ec7p\",\"specialized_level\":\"H\\u1ec7 th\\u1ed1ng th\\u00f4ng tin\",\"type_level\":\"1\"},{\"name_level\":\"2\",\"tranning_unit_level\":\"Cao \\u0111\\u1eb3ng c\\u00f4ng th\\u01b0\\u01a1ng\",\"specialized_level\":\"Cao \\u0111\\u1eb3ng c\\u00f4ng th\\u01b0\\u01a1ng\",\"type_level\":\"1\"}]', '{\"english\":\"\\u0110\\u00e2y l\\u00e0 s\\u01a1 l\\u01b0\\u1ee3c v\\u1ec1 ti\\u1ebfng anh 1111\"}', '{\"advantages\":\"Li\\u1ec7t k\\u00ea k\\u0129 n\\u0103ng s\\u1edf tr\\u01b0\\u1eddng\\nLi\\u1ec7t k\\u00ea k\\u0129 n\\u0103ng s\\u1edf tr\\u01b0\\u1eddng\\nLi\\u1ec7t k\\u00ea k\\u0129 n\\u0103ng s\\u1edf tr\\u01b0\\u1eddng\\n123\"}', 'xiRJRsCDk0Long_Đặng_Duy_CV.pdf', 0, 0, '2018-03-14 19:11:43', '2018-04-23 08:57:06'),
(2, 2, '{\"target\":\"Mong mu\\u1ed1n c\\u00f3 c\\u01a1 h\\u1ed9i l\\u00e0m vi\\u1ec7c trong m\\u00f4i tr\\u01b0\\u1eddng chuy\\u00ean nghi\\u1ec7p, ch\\u1ebf \\u0111\\u1ed9 \\u0111\\u00e3i ng\\u1ed9 t\\u1ed1t.\\nM\\u1ee9c l\\u01b0\\u01a1ng th\\u1ecfa thu\\u1eadn \\u0111\\u1ec3 ph\\u00f9 h\\u1ee3p v\\u1edbi n\\u0103ng l\\u1ef1c b\\u1ea3n th\\u00e2n v\\u00e0 C\\u00f4ng ty.\\nPh\\u1ea5n \\u0111\\u1ea5u \\u0111\\u1ec3 t\\u01b0\\u01a1ng lai \\u0111\\u01b0\\u1ee3c l\\u00e0m vi\\u1ec7c \\u1edf m\\u1ed9t v\\u1ecb tr\\u00ed cao h\\u01a1n ph\\u00f9 h\\u1ee3p v\\u1edbi kh\\u1ea3 n\\u0103ng c\\u1ee7a m\\u00ecnh, nh\\u1eb1m ph\\u1ee5c v\\u1ee5 cho s\\u1ef1 ph\\u00e1t tri\\u1ec3n chung c\\u1ee7a c\\u00f4ng ty v\\u00e0 l\\u1ee3i \\u00edch c\\u00e1 nh\\u00e2n\\nT\\u1eadn t\\u00e2m v\\u1edbi c\\u00f4ng vi\\u1ec7c, y\\u00eau ngh\\u1ec1, t\\u00f4n tr\\u1ecdng \\u0111\\u1ed3ng nghi\\u1ec7p v\\u00e0 lu\\u00f4n \\u0111\\u1eb7t l\\u1ee3i \\u00edch c\\u1ee7a t\\u1eadp th\\u1ec3 l\\u00ean tr\\u00ean h\\u1ebft.1\"}', '{\"1\":{\"experience_name_company\":\"C\\u00f4ng ty TNHH H\\u01b0ng Ph\\u00e1t\",\"experience_title\":\"Tr\\u01b0\\u1edfng Ph\\u00f2ng\",\"experience_time\":\"3\",\"experience_desc\":\"+Qu\\u1ea3n l\\u00ed nh\\u00e2n s\\u1ef1\\n+Qu\\u1ea3n l\\u00ed kh\\u00e1ch h\\u00e0ng\\n+Gi\\u00fap ng\\u01b0\\u1eddi \\u0111\\u1ee1 nh\\u00e2n vi\\u00ean, x\\u00e2y d\\u1ef1ng h\\u1ec7 th\\u1ed1ng c\\u1ea5p d\\u01b0\\u1edbi\",\"experience_medal\":\"Kh\\u00f4ng c\\u00f3\"}}', '[{\"name_level\":\"1\",\"tranning_unit_level\":\"ghfghfhf\",\"specialized_level\":\"jhjghb\",\"type_level\":\"1\"}]', '{\"english\":\"+C\\u00f3 th\\u1ec3 nghe n\\u00f3i, \\u0111\\u1ecdc vi\\u1ebft t\\u1ed1t\\n+Hi\\u1ec3u \\u0111\\u01b0\\u1ee3c t\\u00e0i li\\u1ec7u\\n+Toiec 800\"}', '{\"advantages\":\"+Li\\u1ec7t k\\u00ea k\\u0129 n\\u0103ng s\\u1edf tr\\u01b0\\u1eddng\\n+Li\\u1ec7t k\\u00ea k\\u0129 n\\u0103ng s\\u1edf tr\\u01b0\\u1eddng\\n+Li\\u1ec7t k\\u00ea k\\u0129 n\\u0103ng s\\u1edf tr\\u01b0\\u1eddng\"}', 'TQbX4VBItbDang-Duy-Long-TopCV.vn-131017.144658.docx', 0, 0, '2018-03-15 22:35:19', '2018-04-19 14:18:25'),
(3, 3, '{\"target\":\"Mong mu\\u1ed1n c\\u00f3 c\\u01a1 h\\u1ed9i l\\u00e0m vi\\u1ec7c trong m\\u00f4i tr\\u01b0\\u1eddng chuy\\u00ean nghi\\u1ec7p, ch\\u1ebf \\u0111\\u1ed9 \\u0111\\u00e3i ng\\u1ed9 t\\u1ed1t.\\nM\\u1ee9c l\\u01b0\\u01a1ng th\\u1ecfa thu\\u1eadn \\u0111\\u1ec3 ph\\u00f9 h\\u1ee3p v\\u1edbi n\\u0103ng l\\u1ef1c b\\u1ea3n th\\u00e2n v\\u00e0 C\\u00f4ng ty.\\nPh\\u1ea5n \\u0111\\u1ea5u \\u0111\\u1ec3 t\\u01b0\\u01a1ng lai \\u0111\\u01b0\\u1ee3c l\\u00e0m vi\\u1ec7c \\u1edf m\\u1ed9t v\\u1ecb tr\\u00ed cao h\\u01a1n ph\\u00f9 h\\u1ee3p v\\u1edbi kh\\u1ea3 n\\u0103ng c\\u1ee7a m\\u00ecnh, nh\\u1eb1m ph\\u1ee5c v\\u1ee5 cho s\\u1ef1 ph\\u00e1t tri\\u1ec3n chung c\\u1ee7a c\\u00f4ng ty v\\u00e0 l\\u1ee3i \\u00edch c\\u00e1 nh\\u00e2n\\nT\\u1eadn t\\u00e2m v\\u1edbi c\\u00f4ng vi\\u1ec7c, y\\u00eau ngh\\u1ec1, t\\u00f4n tr\\u1ecdng \\u0111\\u1ed3ng nghi\\u1ec7p v\\u00e0 lu\\u00f4n \\u0111\\u1eb7t l\\u1ee3i \\u00edch c\\u1ee7a t\\u1eadp th\\u1ec3 l\\u00ean tr\\u00ean h\\u1ebft.\"}', '', '[{\"name_level\":\"1\",\"tranning_unit_level\":\"\\u0110\\u1ea1i h\\u1ecdc c\\u00f4ng nghi\\u1ec7p TPHCM\",\"specialized_level\":\"H\\u1ec7 th\\u1ed1ng th\\u00f4ng tin\",\"type_level\":\"1\"}]', '{\"english\":\"+Toiec 500\\n+Nghe n\\u00f3i \\u0111\\u1ecdc vi\\u1ebft t\\u00e0i li\\u1ec7u \\u1edf m\\u1ee9c c\\u01a1 b\\u1ea3n\"}', '{\"advantages\":\"+Y\\u00eau th\\u00edch l\\u1eadp tr\\u00ecnh\\n+Th\\u00edch \\u0111\\u00e1 b\\u00f3ng\"}', 'Ki6cCv6zg6Báo-cáo-đồ-án.docx', 0, 0, '2018-03-21 06:52:02', '2018-03-21 06:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `register_email`
--

CREATE TABLE `register_email` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register_email`
--

INSERT INTO `register_email` (`id`, `email`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dongkiemtra', 0, 1, '2018-04-21 15:58:19', '2018-05-09 03:35:52'),
(2, 'dangduylong96@gmail.com', 3, 0, '2018-04-22 17:04:13', '2018-04-22 17:04:13'),
(3, 'nh0xpr0py@gmail.com', 1, 0, '2018-04-22 17:04:28', '2018-04-22 17:04:28'),
(4, 'qtv@gmail.com', 4, 0, '2018-05-09 12:30:51', '2018-05-09 12:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` int(11) NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `key`, `value`) VALUES
(1, 'city', 11, '{\"2\":\"H\\u00e0 N\\u1ed9i\",\"3\":\"H\\u1ed3 Ch\\u00ed Minh\",\"4\":\"\\u0110\\u00e0 N\\u1eb5ng\",\"11\":\"Kh\\u00e1c\"}'),
(2, 'Size Company', 8, '{\"2\":\"D\\u01b0\\u1edbi 20 ng\\u01b0\\u1eddi\",\"4\":\"20-50 ng\\u01b0\\u1eddi\",\"5\":\"50-100 ng\\u01b0\\u1eddi\",\"6\":\"100-200 ng\\u01b0\\u1eddi\",\"7\":\"200-500 ng\\u01b0\\u1eddi\",\"8\":\"Tr\\u00ean 500 ng\\u01b0\\u1eddi\"}'),
(3, 'sex', 1, '{\"1\":\"Nam\",\"2\":\"N\\u1eef\",\"3\":\"Kh\\u00f4ng Y\\u00eau C\\u1ea7u\"}'),
(4, 'working_form', 5, '{\"1\":\"Nh\\u00e2n vi\\u00ean ch\\u00ednh th\\u1ee9c\",\"2\":\"Nh\\u00e2n vi\\u00ean th\\u1eddi v\\u1ee5\",\"3\":\"B\\u00e1n th\\u1eddi gian\",\"4\":\"L\\u00e0m th\\u00eam ngo\\u00e0i gi\\u1edd\",\"5\":\"Th\\u1ef1c t\\u1eadp sinh\"}'),
(5, 'level', 6, '{\"1\":\"\\u0110\\u1ea1i H\\u1ecdc\",\"2\":\"Cao \\u0110\\u1eb3ng\",\"3\":\"Trung C\\u1ea5p\",\"4\":\"Cao H\\u1ecdc\",\"5\":\"Ch\\u1ee9ng Ch\\u1ec9\",\"6\":\"Kh\\u00f4ng Y\\u00eau C\\u1ea7u\"}'),
(6, 'experience', 7, '{\"1\":\"Ch\\u01b0a c\\u00f3 kinh nghi\\u1ec7m\",\"2\":\"D\\u01b0\\u1edbi 1 n\\u0103m\",\"3\":\"1-2 n\\u0103m\",\"4\":\"2-3 n\\u0103m\",\"5\":\"3-4 n\\u0103m\",\"6\":\"4-5 n\\u0103m\",\"7\":\"Tr\\u00ean 5 n\\u0103m\"}'),
(7, 'slary', 11, '{\"1\":\"Th\\u1ecfa thu\\u1eadn khi ph\\u1ecfng v\\u1ea5n\",\"2\":\"D\\u01b0\\u1edbi 3 tri\\u1ec7u\",\"3\":\"3-5 tri\\u1ec7u\",\"4\":\"5-7 tri\\u1ec7u\",\"5\":\"7-10 tri\\u1ec7u\",\"6\":\"10-12 tri\\u1ec7u\",\"7\":\"12-15 tri\\u1ec7u\",\"8\":\"15-20 tri\\u1ec7u\",\"9\":\"20-25 tri\\u1ec7u\",\"10\":\"25-30 tri\\u1ec7u\",\"11\":\"Tr\\u00ean 30 tri\\u1ec7u\"}'),
(8, 'time_try', 5, '{\"1\":\"Nh\\u1eadn vi\\u1ec7c ngay\",\"2\":\"1 th\\u00e1ng\",\"3\":\"2 th\\u00e1ng\",\"4\":\"3 th\\u00e1ng\",\"5\":\"Trao \\u0111\\u1ed5i khi ph\\u1ecfng v\\u1ea5n\"}'),
(9, 'type_level', 4, '{\"1\":\"Gi\\u1ecfi\",\"2\":\"Kh\\u00e1\",\"3\":\"Trung b\\u00ecnh\",\"4\":\"Ch\\u1ee9ng ch\\u1ec9\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `post_id`, `name`) VALUES
(3, 2, 'PHP'),
(4, 2, 'webs'),
(5, 2, 'MySQL'),
(6, 5, 'MySQL'),
(7, 5, 'Javascript'),
(8, 5, 'java'),
(9, 6, 'Javascript'),
(10, 6, 'java'),
(11, 6, 'PHP'),
(12, 7, 'MySQL'),
(13, 7, 'PostgreSQL'),
(14, 7, 'PHP'),
(18, 9, 'MySQL'),
(19, 9, 'AngularJS'),
(20, 9, 'PHP'),
(27, 7, 'PostgreSQL'),
(28, 7, 'webs'),
(29, 7, 'PostgreSQL'),
(30, 7, 'PHP'),
(31, 7, 'PostgreSQL'),
(32, 7, 'webs'),
(33, 6, 'PHP'),
(34, 6, 'java'),
(35, 6, 'Javascript'),
(36, 5, 'MySQL'),
(37, 5, 'Javascript'),
(38, 5, 'MySQL'),
(39, 3, 'Javascript'),
(40, 3, 'MySQL'),
(41, 3, 'Javascript'),
(42, 3, 'java'),
(43, 10, 'Project Manager'),
(44, 10, 'Bridge Engineer'),
(45, 11, 'oop'),
(46, 11, 'PHP'),
(47, 11, 'Javascript'),
(48, 12, 'java'),
(49, 12, 'Linux'),
(50, 12, 'oop'),
(54, 14, 'MVC'),
(55, 14, 'ASP.NET'),
(56, 14, '.NET'),
(57, 15, 'MySQL'),
(58, 15, 'Linux'),
(59, 15, 'PHP'),
(60, 16, 'html5'),
(61, 16, 'CSS'),
(62, 16, 'Javascript'),
(63, 17, 'MobileApps'),
(64, 17, 'java'),
(65, 17, 'Android'),
(66, 18, 'MySQL'),
(67, 18, 'java'),
(68, 18, 'Spring'),
(69, 19, 'c#'),
(70, 19, '.NET'),
(71, 19, 'Javascript'),
(72, 20, 'Javascript'),
(73, 20, 'J2EE'),
(74, 20, 'java'),
(75, 21, 'PHP'),
(76, 21, 'React Native'),
(77, 21, 'Javascript'),
(78, 21, 'PHP'),
(79, 21, 'React Native'),
(80, 21, 'Javascript'),
(81, 21, 'PHP'),
(82, 21, 'React Native'),
(83, 21, 'Javascript'),
(84, 12, 'java'),
(85, 12, 'Linux'),
(86, 12, 'oop'),
(87, 12, 'java'),
(88, 12, 'Linux'),
(89, 12, 'oop'),
(90, 21, 'PHP'),
(91, 21, 'React Native'),
(92, 21, 'Javascript'),
(93, 21, 'PHP'),
(94, 21, 'React Native'),
(95, 21, 'Javascript'),
(96, 21, 'PHP'),
(97, 21, 'React Native'),
(98, 21, 'Javascript'),
(105, 23, 'C++'),
(106, 23, 'java'),
(107, 23, 'PHP'),
(108, 23, 'C++'),
(109, 23, 'java'),
(110, 23, 'PHP'),
(111, 23, 'C++'),
(112, 23, 'java'),
(113, 23, 'PHP'),
(114, 23, 'C++'),
(115, 23, 'java'),
(116, 23, 'PHP'),
(119, 21, 'PHP'),
(120, 21, 'React Native'),
(121, 21, 'Javascript'),
(122, 23, 'C++'),
(123, 23, 'java'),
(124, 23, 'PHP'),
(134, 24, 'PHP'),
(135, 24, 'MySQL'),
(136, 24, 'webs'),
(137, 8, 'PHP'),
(138, 8, 'oop'),
(143, 1, 'c#'),
(144, 1, 'Javascript'),
(145, 13, 'c#'),
(146, 13, '.NET'),
(147, 13, 'MySQL'),
(150, 25, 'PHP'),
(151, 25, 'MySQL'),
(152, 22, 'webs'),
(153, 22, 'Javascript'),
(163, 27, 'java'),
(164, 27, 'c#'),
(165, 27, 'C++'),
(166, 26, 'PHP'),
(167, 26, 'MySQL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', 'dangduylong96@gmail.com', '$2y$10$qRGfdzyM3WvZixLSw9ijuu6geyhDPIsCT/jnaWYGUPZ/bd0pjZzoG', 'Q9KsmlyzBYHeBRHy1LYVBGQHweKJgyNYTikb0Cg6xv33sK49AwydbA949oCt', '2018-03-09 23:21:09', '2018-03-09 23:21:09', 1),
(2, 'employer', 'nhatuyendung@gmail.com', '$2y$10$Ym6zJFvlvimx7.Ryid4NBuIanPKJ0rZMfSqsJQA0gW7xcix0pfh5K', 'e8FVeLDV3fEIIQMH6YssSKMliUvWtA2FGxwqBWPahrdQ4T7wHwjrx3o8HH9A', '2018-03-10 07:43:41', '2018-03-10 07:43:41', 1),
(3, 'employer', 'nhatuyendung1@gmail.com', '$2y$10$kW/d8sTx7Oyq2cy7I3UX4uwf/HrX7zKL/hw0UKVw536T/YpCyEm0q', 'tNOqdkhn6x857GlVFH1phvStdhoUgWdQTPoDAwptV4YvhQ0rpvo2ELzengGR', '2018-03-10 07:44:24', '2018-03-10 07:44:24', 1),
(4, 'employer', 'nhatuyendung5@gmail.com', '$2y$10$KI1Tr0BeqkEytIdYeeuPA.9Qzrgmeyxdxsk82kSqXFGFT6Z/OWmr2', NULL, '2018-03-10 07:47:03', '2018-03-10 07:47:03', 1),
(5, 'candidate', 'ungvien@gmail.com', '$2y$10$1J50.6KuuyRdNplAZ.yM4ePgHy9fmceBLnWoL90blJjgLXx044yPi', 'nG6218dPxvCbQKenqvv0JSnKwNODLaA8NTAWR5KbJ3fKdzbLhho5PVLxDg8u', '2018-03-13 20:46:28', '2018-03-13 20:46:28', 1),
(6, 'candidate', 'ungvien2@gmail.com', '$2y$10$Ew3nfqEvBnb7ZVjtZ2M3X.ZrwnSkRL1lYBSF0H88WJXccJjEhjDG.', NULL, '2018-03-13 20:48:08', '2018-03-13 20:48:08', 1),
(7, 'candidate', 'ungvien3@gmail.com', '$2y$10$hYP6Kr6EixnKlKlCymPVsOxnhvYDgee.jdnLSqnyHkNnmGpxPfbli', NULL, '2018-03-13 20:49:19', '2018-03-13 20:49:19', 1),
(8, 'candidate', 'ungvien4@gmail.com', '$2y$10$ZD8Lyv0nJFJhTMwluS79Ruou5DFc71Ax.JBg1B6f/3EzTPJcOs6Ty', 'expBo37jc23ByOF4FdPiEJfmjfEMa58d5zHkkMslHploHuZfvWfPaoE7BBcW', '2018-03-13 20:51:22', '2018-03-13 20:51:22', 1),
(9, 'employer', 'ntd@gmail.com', '$2y$10$eAF2AL6sPjgtpX4OFSbsSupTnB6eoEkzjqdE7gOPTzuktVSVFGlee', '4zMgaxvnMnDpcGDOXzoU0m8HqtWrQ9n9SwfF6jBGiI4GupLFlmnOGRQUppdK', '2018-03-17 18:51:26', '2018-03-17 18:51:26', 1),
(10, 'employer', 'ntd1@gmail.com', '$2y$10$fTI9bDI0EeGCTwdNiVC2VO0FpzfIaRTqbnxW7Lc98Vz9SifWZm.1e', 'UdbU9LpnoN4koJDfRFkW35h4MIhOkVWC2i7ORsUnOwiAcbrh2Hcy7QitQ9bg', '2018-03-17 19:03:01', '2018-03-17 19:03:01', 1),
(11, 'employer', 'ntd2@gmail.com', '$2y$10$SCUx0Sfu9icjUGni2pOeIOl4g70k18NA86XYPjRth2fUVupFwKrTy', 'cxhA9xvXOFTVNLfV81uOn4ZmCE6NeKHkmacmMAGSI3M3YxMRqhF1DO3xjM8z', '2018-03-17 19:13:06', '2018-03-17 19:13:06', 1),
(12, 'candidate', 'uv@gmail.com', '$2y$10$DvXw7EYQMgcvoHvwpb8hhO706RlBIL0iVMUCdc7cfq6/PbgP4vobG', NULL, '2018-03-18 21:04:44', '2018-03-18 21:04:44', 1),
(13, 'employer', 'nh0xpr0py2@gmail.com', '$2y$10$FvmwRLKWId0SlKKuTc2AQunVQOUjq7Hg7aTKdAiXEboINBCUPZ.ce', NULL, '2018-03-21 06:35:21', '2018-03-21 06:35:21', 1),
(14, 'employer', 'ntd3@gmail.com', '$2y$10$r0Hp6IAhU7/6jtmmoPOyye/6DyRPS9xlOgGKf0uB461K/PEfPDizm', NULL, '2018-04-18 14:13:16', '2018-04-18 14:13:16', 1),
(15, 'candidate', 'buison3001@gmail.com', '$2y$10$kLnJv6fCvi06j.Cu2WLPceDpkPTVuPhOxCDBSyBE.DdBJRf73Kxcu', 'A7ZVr7o8rNsJskMcUvWp8qL2OjU2WXe72MKTnGL3r5EQ8OXjv7KaBHDOrEZb', '2018-04-21 14:44:21', '2018-04-21 14:44:21', 1),
(16, 'employer', 'buihoangson30011995@gmail.com', '$2y$10$8JorMhuhPYEQ5mIdgRkhve5BnGoVdc999r.Y0d6vDyjae/SVeQXDK', NULL, '2018-04-21 19:28:39', '2018-04-21 19:28:39', 1),
(17, 'employer', 'sonhoangbui30011995@gmail.com', '$2y$10$Qrd7HKwjpG5l0O3552LerOwckccxU7niZOwWxM1IqrwSqxOWQjO8C', 'J2kH6BlMfIaPynhRbgPpGjWq0BNvw9rmiiRcv6VJIJgJLgvqg74XcE6czXxc', '2018-04-21 19:32:12', '2018-04-21 19:32:12', 1),
(18, 'employer', 'ntd4@gmail.com', '$2y$10$HW4Uzo3enxhl2RYBJpBD7uKHUbzbIZyCelsoZVFUFXyM1WGKpswt6', 'eXVDr0Qsy287s0HpFFGYBumplGEQrOstgPcAaKpUHS95C3U7VbxrmVRWldIc', '2018-05-09 04:21:04', '2018-05-09 04:21:04', 1),
(19, 'candidate', 'uv4@gmail.com', '$2y$10$uo.FDwcLGBc88481zHkBLujRdfBZ7RBij3hZLRiFRPmXxjtW.kHAC', 'gw066cP4eBfli7S0YrSJpPY4N0acEIfdgo8Twq3ba3dfkBIae1ke4IcG7hQP', '2018-05-09 05:03:28', '2018-05-09 05:03:28', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidates_user_id_foreign` (`user_id`);

--
-- Indexes for table `candidate_profiles`
--
ALTER TABLE `candidate_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_profiles_candidate_id_foreign` (`candidate_id`),
  ADD KEY `candidate_profiles_category_id_foreign` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_jobs`
--
ALTER TABLE `check_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_user_id_foreign` (`user_id`);

--
-- Indexes for table `company_save_candidate`
--
ALTER TABLE `company_save_candidate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_save_candidate_company_id_foreign` (`company_id`),
  ADD KEY `company_save_candidate_candidate_profile_id_foreign` (`candidate_profile_id`);

--
-- Indexes for table `manager_cadidate_and_posts`
--
ALTER TABLE `manager_cadidate_and_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_cadidate_and_posts_candidate_id_foreign` (`candidate_id`),
  ADD KEY `manager_cadidate_and_posts_post_id_foreign` (`post_id`),
  ADD KEY `manager_cadidate_and_posts_candidate_profile_id_foreign` (`candidate_profile_id`);

--
-- Indexes for table `manager_cv_company`
--
ALTER TABLE `manager_cv_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_cv_company_manager_cadidate_and_posts_id_foreign` (`manager_cadidate_and_posts_id`),
  ADD KEY `manager_cv_company_company_id_foreign` (`company_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `post_employers`
--
ALTER TABLE `post_employers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_employers_company_id_foreign` (`company_id`);

--
-- Indexes for table `profile_cv`
--
ALTER TABLE `profile_cv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_cv_candidate_profile_id_foreign` (`candidate_profile_id`);

--
-- Indexes for table `register_email`
--
ALTER TABLE `register_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_post_id_foreign` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `candidate_profiles`
--
ALTER TABLE `candidate_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `check_jobs`
--
ALTER TABLE `check_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company_save_candidate`
--
ALTER TABLE `company_save_candidate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manager_cadidate_and_posts`
--
ALTER TABLE `manager_cadidate_and_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `manager_cv_company`
--
ALTER TABLE `manager_cv_company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `post_employers`
--
ALTER TABLE `post_employers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `profile_cv`
--
ALTER TABLE `profile_cv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register_email`
--
ALTER TABLE `register_email`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `candidate_profiles`
--
ALTER TABLE `candidate_profiles`
  ADD CONSTRAINT `candidate_profiles_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `candidate_profiles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_save_candidate`
--
ALTER TABLE `company_save_candidate`
  ADD CONSTRAINT `company_save_candidate_candidate_profile_id_foreign` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_save_candidate_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `manager_cadidate_and_posts`
--
ALTER TABLE `manager_cadidate_and_posts`
  ADD CONSTRAINT `manager_cadidate_and_posts_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `manager_cadidate_and_posts_candidate_profile_id_foreign` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profiles` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `manager_cadidate_and_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post_employers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `manager_cv_company`
--
ALTER TABLE `manager_cv_company`
  ADD CONSTRAINT `manager_cv_company_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `manager_cv_company_manager_cadidate_and_posts_id_foreign` FOREIGN KEY (`manager_cadidate_and_posts_id`) REFERENCES `manager_cadidate_and_posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_employers`
--
ALTER TABLE `post_employers`
  ADD CONSTRAINT `post_employers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile_cv`
--
ALTER TABLE `profile_cv`
  ADD CONSTRAINT `profile_cv_candidate_profile_id_foreign` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post_employers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
