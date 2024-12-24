-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2024 at 09:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mindloops`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_report_table`
--

CREATE TABLE `article_report_table` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `report_comment` text NOT NULL,
  `level` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `badge_table`
--

CREATE TABLE `badge_table` (
  `badge_id` int(11) NOT NULL COMMENT 'Unique identifier for the badge',
  `badge_name` varchar(255) NOT NULL COMMENT 'Name of the badge',
  `badge_description` text DEFAULT NULL COMMENT 'Description of the badge',
  `badge_image` varchar(255) DEFAULT NULL COMMENT 'Path to the badge image',
  `badge_issue_count` int(11) DEFAULT NULL COMMENT 'Total number of times the badge has been issued',
  `status` int(11) DEFAULT NULL COMMENT 'Status of the badge (1 for active, 0 for inactive)',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Date and time when the badge was created'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to store information about badges';

--
-- Dumping data for table `badge_table`
--

INSERT INTO `badge_table` (`badge_id`, `badge_name`, `badge_description`, `badge_image`, `badge_issue_count`, `status`, `created_date`) VALUES
(1, 'Enterprise Design Thinking Practitioner', 'The earner has acquired knowledge of applying Enterprise Design Thinking and its value. As a Practitioner, the badge earner finds opportunities to try it out in their every day work.', '1696568129.png', NULL, 1, '2023-10-06 04:40:45'),
(2, 'Cloud Core', 'This badge holder understands the basics of cloud technology and is able to describe cloud platforms and models including IaaS, PaaS, SaaS, Public, Private and Hybrid Multi clouds. The badge earner is familiar with essentials of cloud applications and terms like Virtualization, VMs, Containers, Object Storage, Microservices, Serverless, Cloud Native, and DevOps. The individual has also gained hands-on experience at creating a Cloud account and provisioning services on IBM Cloud.\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nW\r\nThis badge holder understands the basics of cloud technology and is able to describe cloud platforms and models including IaaS, PaaS, SaaS, Public, Private and Hybrid Multi clouds. The badge earner is familiar with essentials of cloud applications and terms like Virtualization, VMs, Containers, Object Storage, Microservices, Serverless, Cloud Native, and DevOps. The individual has also gained hands-on experience at creating a Cloud account and provisioning services on IBM Cloud.\r\n', '1696589246.png', NULL, 1, '2023-10-06 04:45:52'),
(3, 'Testing 3vv', 'Testing 3vv', '1696587004.jpeg', NULL, 0, '2023-10-06 04:46:21'),
(4, 'IBM Garage Essentials', 'This badge earner is able to demonstrate understanding of IBM Garage Methodology, assets and platforms.', '1696586776.png', NULL, 1, '2023-10-06 10:06:16'),
(5, 'Python Project for Data Science', 'This badge earner demonstrates foundational Python skills for working with data. This includes: understanding the role of a Data Scientist / Data Analyst; applying Python fundamentals, working with Python data structures, and working with data in Python; and how to build a dashboard using Python and popular Python libraries using Jupyter notebook.', '1696589197.png', NULL, 1, '2023-10-06 10:46:37'),
(6, 'TYT', 'Tun Tun Bak', '1698826600.png', NULL, 1, '2023-11-01 08:16:40'),
(7, 'Sample badge', 'this is a sample badge', '1698828408.jpg', NULL, 0, '2023-11-01 08:46:48'),
(8, 'Tajuk Badges 1', 'Penerangan bagi anda  1', '1698829337.jpg', NULL, 0, '2023-11-01 09:02:17'),
(9, 'Siapa', 'Tak boleh delete pule', '1698878681.jpg', NULL, 0, '2023-11-01 22:44:41'),
(10, '1', '1', '1698878848.jpg', NULL, 0, '2023-11-01 22:47:28'),
(11, 'TEST', 'SAMPLE', '1698885003.png', NULL, 1, '2023-11-02 00:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `published_by` varchar(100) DEFAULT NULL,
  `published_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `title`, `content`, `thumbnail`, `category_id`, `created_at`, `status`, `created_by`, `updated_date`, `updated_by`, `published_by`, `published_date`) VALUES
(22, 'Kenali Istilah Cuaca', '\r\n              \r\n            <p class=\"community-text py-3 article-title temp\">Melalui tajuk, pasti pembaca sudah dapat agak apa pengetahuan am baharu yang akan dikongsikan kali ini, bukan? Percaya atau tidak, hampir semua golongan pembaca mengetahui cara atau teknik membaca cuaca, namun hanya segelintir yang mengambil tahu istilah-istilah cuaca. Tahukah anda, ada beberapa perkataan yang jarang disebut atau diguna pakai oleh rata-rata lapisan masyarakat, antaranya meteorologi, kerpasan dan langkisau. </p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1699860762.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><p class=\"community-text py-3 article-title temp\">Meteorologi ialah satu perkataan yang merujuk kepada ilmu sains yang mengkaji tentang atmosfera dan fenomena yang berkait dengannya, khususnya cuaca dan ramalannya. Di Malaysia, organisasi yang bertanggungjawab dalam bidang ini ialah Jabatan Meteorologi Malaysia (MET Malaysia), dan individu yang bekerja dalam bidang ini digelar Pegawai Meteorologi. </p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1699860779.jpeg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><p class=\"community-text py-3 article-title temp\">Pernah dengar istilah gerimis? Gerimis ialah salah satu contoh kerpasan yang merupakan cecair hasil daripada pemeluwapan wap air dari awan yang termendap pada permukaan bumi. Contoh lain bagi kerpasan berbentuk cecair ialah hujan salji dan hujan batu. Manakala, kerpasan berbentuk pepejal ialah seperti kristal ais atau dipanggil sebagai hablur ais. </p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1699860797.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><p class=\"community-text py-3 article-title temp\">Langkisau pula merupakan angin kencang yang berlaku serta-merta dalam waktu yang singkat iaitu kurang daripada 20 saat. Angin langkisau yang terbentuk daripada awan kumulonimbus, kebiasaannya disertai bersama ribut petir. Ia boleh mengakibatkan kerosakan struktur di permukaan bumi termasuklah tumbuh-tumbuhan. </p>', '1699860815.jpg', 29, '2023-11-13 15:33:35', 1, 1, NULL, NULL, 'Mindloops', '2023-11-13 15:33:35'),
(23, 'Gajet dan Obesiti', '\r\n            \r\n            \r\n              \r\n            <p class=\"community-text py-3 article-title temp\">Tahukah kawan-kawan, obesiti dan ketagihan gajet tidak dapat dipisahkan? Sebelum itu, ketahui maksud sebenar obesiti. Obesiti ialah kegemukan atau berat badan yang berlebihan disebabkan oleh pengumpulan lemak yang tidak normal di dalam badan. Individu yang obes berisiko tinggi untuk mengalami gangguan kesihatan, dan obesiti ini berupaya untuk mempengaruhi kualiti hidup seseorang seperti cepat letih, tidur berdengkur dan sukar bernafas. </p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1699865112.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><p class=\"community-text py-3 article-title temp\">Bagaimana pula dengan ketagih gajet? Mereka yang bersifat ketagih terhadap penggunaan gajet akan memperuntukkan masa yang sangat lama untuk bermain alatan gajet tersebut sehingga sanggup mengabaikan tanggungjawab dalam kehidupan harian. Sikap leka dan terpaku dengan gajet membuatkan seseorang berasa malas untuk bergerak ke mana-mana dan akhirnya meletakkan semua yang diperlukan di depan mata! </p><h4 class=\"py-2 display-7 fw-bolder temp\">Ikuti 5 punca obesiti akibat daripada ketagihan gajet </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1699865499.avif\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">                        <div class=\"community-text py-1 article-title temp\"><p>1. Penggunaan gajet secara duduk atau berbaring melebihi had masa yang disyorkan dalam sehari.&nbsp;</p><p>2. Tabiat makan sambil bermain gajet.&nbsp;</p><p>3. Jadual makan yang tidak teratur akibat terlalu sayang meninggalkan gajet.</p><p>4. Rasa kurang berminat untuk keluar rumah bagi memanaskan badan.&nbsp;</p><p>5. Pergerakan seharian yang terhad di satu tempat mendorong kelesuan badan dan menimbulkan rasa malas bersenam.</p> </div>', '1699865517.jpg', 29, '2023-11-13 16:51:57', 1, 1, '2023-11-16 17:19:08', 1, 'Mindloops', '2023-11-13 00:00:00'),
(25, 'Sekolah Pertama untuk Pelajar Lelaki', '\r\n              \r\n            <h4 class=\"py-2 display-7 fw-bolder temp\">Tahukah anda di Malaysia mempunyai sebuah sekolah yang ditubuhkan pada tahun 205 yang lalu dan masih digunakan sehingga sekarang? </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700635580.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Sekolah tersebut adalah Penang Free School (PFS) yang terletak di Pulau Pinang. Ia ditubuhkan pada tahun 1816 oleh Rev. Robert Sparke Hutchings. Ia juga merupakan sekolah pertama untuk pelajar lelaki sejak ia mula ditubuhkan. Pengetua pertamanya ialah William Cox yang mentadbir sehingga tahun 1821. Sekolah tersebut telah melahirkan beberapa personaliti terkenal di Malaysia dan Singapura iaitu Tunku Abdul Rahman (Perdana Menteri pertama Malaysia), Seniman P.Ramlee, Wee Chong Jin (ketua hakim negara pertama Singapura) dan Dr. Wu Lien-teh (pakar berubatan Malaya).</p> </div>', '1700635598.jpg', 29, '2023-11-22 14:46:38', 1, 1, NULL, NULL, 'MindLoops', '2022-03-22 00:00:00'),
(26, 'Adakah Rawatan Gigi Membatalkan Puasa?', '\r\n            \r\n              \r\n            <h4 class=\"py-2 display-7 fw-bolder temp\">Tahukah anda rawatan gigi yang dilakukan dalam bulan Ramadan tidak membatalkan puasa? </h4><div class=\"community-text py-1 article-title temp\"><p>Sakit gigi merupakan penyakit yang boleh mengganggu aktiviti seharian sekiranya tidak dirawat terutamanya pada bulan puasa. Oleh itu, rawatan gigi tidak akan membatalkan puasa selagi benda-benda yang terkumpul ketika menjalani rawatan tidak masuk ke dalam kerongkong secara sengaja.</p> </div>            <h4 class=\"py-2 display-7 fw-bolder temp\">Prosedur yang tidak melibatkan bendalir: </h4><div class=\"community-text py-1 article-title temp\"><ul><li>Rawatan pemeriksaan gigi&nbsp;</li><li>Pengambilan sinar-x kedudukan gigi</li></ul> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700635991.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Prosedur yang melibatkan bendalir tetapi tidak membatalkan puasa selagi bendalir tersebut tidak ditelan secara sengaja: </h4><div class=\"community-text py-1 article-title temp\"><ul><li>Menampal gigi</li><li>Memberus gigi</li><li>Mencuci gigi</li></ul> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700636011.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">', '1700636024.jpg', 29, '2023-11-22 14:52:01', 1, 1, '2023-11-22 14:53:43', 1, 'MindLoops', '2022-04-01 00:00:00'),
(27, 'Kepelbagaian Budaya di Malaysia', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Malaysia merupakan sebuah negara yang terdiri daripada masyarakat majmuk yang mempunyai pelbagai bangsa dan kaum seperti Melayu, Cina, India dan etnik-etnik Sabah Sarawak. Oleh itu, Malaysia menjadi sebuah negara yang kaya dengan budaya dan adat resam kaum mengikut kepercayaan masing-masing. Antara amalan budaya bangsa dan kaum di Malaysia ialah:</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">1.	Perayaan </h4><div class=\"community-text py-1 article-title temp\"><p>Terdapat beberapa perayaan yang disambut di&nbsp;Malaysia seperti Hari Raya Aidilfitri oleh kaum Melayu, Tahun Baru Cina oleh kaum Cina, Deepavali oleh kaum India, Pesta Kaamatan (menuai) oleh kaum Kadazandusun dan Perayaan Gawai oleh kaum Iban.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700636250.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">2.	Pakaian </h4><div class=\"community-text py-1 article-title temp\"><p>Pakaian tradisional bagi setiap kaum di Malaysia mempunyai pelbagai gaya dan&nbsp;warna.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700637157.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">3.	Makanan </h4><div class=\"community-text py-1 article-title temp\"><p>Terdapat pelbagai makanan tradisional mengikut kaum di Malaysia dan popular dalam kalangan masyarakat.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700637244.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">', '1700637354.jpg', 29, '2023-11-22 15:15:54', 1, 1, NULL, NULL, 'MindLoops', '2022-05-09 00:00:00'),
(28, 'Kerjaya dalam Bidang Kejuruteraan', '\r\n              \r\n            <h4 class=\"py-2 display-7 fw-bolder temp\">Apa itu Kejuruteraan? </h4><div class=\"community-text py-1 article-title temp\"><p>Kejuruteraan merupakan aplikasi sains dan matematik untuk menyelesaikan masalah. Bidang kejuruteraan di Malaysia sering mendapat permintaan yang sangat tinggi. Ini selari dengan sasaran kerajaan untuk memperkasakan bidang Pendidikan dan Latihan Teknikal dan Vokasional (TVET) dalam memenuhi permintaan pekerja keperluan industri. Antara bidang kejuruteraan yang mendapat permintaan tertinggi dalam Malaysia ialah kejuruteraan mekanikal, kejuruteraan elektrik dan kejuruteraan awam.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Kejuruteraan Mekanikal </h4><div class=\"community-text py-1 article-title temp\"><p>Antara sebab utama kejuruteraan mekanikal mendapat permintaan tertinggi ialah bidangnya yang fleksibel dan cabang yang meluas. Graduan kejuruteraan mekanikal boleh bekerja dalam industri penerbangan, automotif, pembuatan dan sebagainya.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700637728.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Kejuruteraan Elektrik </h4><div class=\"community-text py-1 article-title temp\"><p>Seorang jurutera elektrik bekerja dengan pelbagai jenis komponen, peranti, cip mikro kecil sehingga penjana stesen janakuasa yang besar dan mereka mahir dalam pemasangan pendawaian elektrik. Bidang ini mempunyai peluang pekerjaan yang sangat banyak kerana permintaan tenaga kerja dalam bidang kejuruteraan elektrik daripada industri yang tinggi.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700637759.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Kejuruteraan Awam </h4><div class=\"community-text py-1 article-title temp\"><p>Tugas seorang jurutera dalam bidang kejuruteraan awam ialah mereka bentuk bangunan, jalan raya dan jambatan yang akan dibangunkan. Negara Malaysia dan negara luar sentiasa berkembang dengan pesat melalui pembangunan yang semakin canggih. Kepakaran jurutera awam dalam mereka bentuk sangat diperlukan oleh banyak syarikat sama ada dalam atau luar negara.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700637788.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">', '1700637807.png', 29, '2023-11-22 15:23:27', 1, 1, NULL, NULL, 'MindLoops', '2022-06-08 00:00:00'),
(30, 'Penggunaan Dadah Dalam Perubatan', '\r\n              \r\n            <h4 class=\"py-2 display-7 fw-bolder temp\">Tahukah Anda? </h4><div class=\"community-text py-1 article-title temp\"><p>Dadah digunakan bagi menghasilkan ubat-ubatan demi memastikan kesembuhan dan keberkesanan ubat terhadap pesakit. Namun, manusia sering melakukan penyalahgunaan dadah yang boleh menyebabkan kesengsaraan dan penyesalan hanya untuk mendapatkan kepuasan sementara semata-mata.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Steroid </h4><div class=\"community-text py-1 article-title temp\"><p>Steroid merupakan sejenis ubat hormon testeron sintetik yang digunakan oleh para doktor dan pakar bagi merawat pesakit yang menghidapi penyakit lelah dan sebagainya. Namun, kebanyakan kes penyalahgunaan dadah jenis Steroid ini melibatkan golongan atlet di seluruh dunia antaranya ialah atlet bina badan yang menggunakan Steroid berkenaan bagi mempercepatkan proses pembesaran otot.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700638389.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Tablet Methadone </h4><div class=\"community-text py-1 article-title temp\"><p>Methadone merupakan sejenis dadah yang digunakan dalam perubatan bagi tujuan melegakan kesakitan pesakit atau nama lainnya dikenali sebagai ubat tahan sakit. Selain itu, Methadone juga digunakan bagi tujuan merawat penagihan dadah itu sendiri.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700638417.jpeg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Kodein </h4><div class=\"community-text py-1 article-title temp\"><p>Kodein dalam perubatan digunakan sebagai ubat batuk dan juga sebagai ubat melegakan kesakitan yang sederhana. Kodein dalam perubatan dicipta melalui dua bentuk fizikal yang berbeza. Pertama sekali adalah berbentuk pil manakala yang kedua adalah cecair. Penggunaan Kodein dalam perubatan sentiasa dikaji dan dianalisis dari segi kuantitinya sebelum dimasukkan dalam ubatan.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700638542.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">', '1700638545.jpg', 29, '2023-11-22 15:35:45', 1, 1, NULL, NULL, 'MindLoops', '2022-07-01 00:00:00'),
(31, 'Melaka Bandaraya Bersejarah', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Melaka merupakan negeri bersejarah setelah ia dianggap sebagai tempat asas tamadun Melayu kerana sejarah gemilang kesultanan Melayu pada abad ke-15. Pada tanggal 7 Julai 2008, UNESCO telah mengiktiraf Bandar Melaka sebagai Bandaraya Bersejarah dan sebagai Tapak Warisan Dunia. Tahukah anda, terdapat pelbagai peninggalan bersejarah di Melaka yang masih kekal sehingga hari ini? Peninggalan bersejarah Kota A Famosa merupakan daya tarikan utama pelancong luar dan dalam negara.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Kota A\'Famosa </h4><div class=\"community-text py-1 article-title temp\"><p>Kota A Famosa yang terletak di tengah Bandaraya Melaka merupakan salah satu peninggalan bersejarah sejak ratusan tahun dahulu. Kota A Famosa telah dibina pada tahun 1511 apabila Portugis berjaya menawan Melaka. Ia telah dibina hasil dari keringat buruh paksa Portugis pada ketika itu dengan tujuan menjadikan ia sebagai kubu sementara atau tembok pertahanan mereka daripada serangan orang-orang Melayu. Mereka megambil masa selama 5 bulan untuk menyiapkan Kota A Famosa berkenaan dan telah mengakibatkan beberapa buruh paksa yang terkorban semasa pembinaan kerana cuaca yang panas dan kekurangan bekalan makanan.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700638786.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Antara Peninggalan Sejarah di Bandaraya Melaka </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700638933.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Gereja Christ dibina pada 1753</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700638952.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Kubur Belanda Sejak tahun 1641</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700638966.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Muzium Kapal Flor De La Mar</p> </div>', '1700638986.jpg', 29, '2023-11-22 15:43:06', 1, 1, NULL, NULL, 'MindLoops', '2022-08-22 00:00:00'),
(32, 'Hari Sukan Negara', '\r\n              \r\n            <h4 class=\"py-2 display-7 fw-bolder temp\">Tahukah Anda? </h4><div class=\"community-text py-1 article-title temp\"><p>Pada setiap tahun, Hari Sukan Negara akan disambut di Malaysia. Terdapat pelbagai program, aktiviti serta pertandingan-pertandingan sukan yang dianjurkan bagi memeriahkan lagi sambutan Hari Sukan Negara di seluruh Malaysia.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Sejarah sambutan Hari Sukan Negara </h4><div class=\"community-text py-1 article-title temp\"><p>10 Oktober 2015 merupakan tarikh bersejarah buat Malaysia kerana tarikh berkenaan telah berlangsungnya sambutan Hari Sukan Negara buat julung kalinya. Jutaan rakyat Malaysia telah melibatkan diri dalam pelbagai jenis pertandingan dan aktiviti sukan yang diadakan pada sambutan hari tersebut. Aktiviti sukan yang berlangsung pada sambutan Hari Sukan Negara meliputi golongan dari bandar mahupun luar bandar. Sambutan ini merupakan satu langkah inisiatif Khairy Jamaludin yang merupakan Menteri Belia dan Sukan pada ketika itu demi memastikan rakyat Malaysia mengamalkan gaya hidup sihat</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700639301.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Mengapa Malaysia menyambut Hari Sukan Negara pada setiap tahun? </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700639321.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Sambutan ini bertujuan memupuk semangat kesukanan serta meningkatkan kesedaran amalan gaya hidup sihat dalam kalangan rakyat Malaysia. Walaupun ianya disambut hanya sekali dalam setahun, namun budaya dan amalan gaya hidup sihat mampu diterap dan diperkenalkan kepada seluruh rakyat Malaysia menerusi sambutan ini. Selain itu, sambutan ini dilaksanakan bagi meningkatkan kadar penglibatan rakyat Malaysia dalam aktiviti sukan memandangkan kadar penglibatan aktiviti sukan dalam kalangan rakyat Malaysia pada tahap yang rendah, apatah lagi ingin menuju ke arah gelaran negara bersukan.</p> </div>', '1700639335.png', 29, '2023-11-22 15:48:55', 1, 1, NULL, NULL, 'MindLoops', '2022-09-06 00:00:00'),
(33, 'Haiwan-haiwan yang Telah Pupus pada Tahun 2019', '\r\n              \r\n            <h4 class=\"py-2 display-7 fw-bolder temp\">Tahukah Anda? </h4><div class=\"community-text py-1 article-title temp\"><p>Terdapat beberapa haiwan yang telah diisytiharkan pupus pada zaman moden. Antara punca banyak haiwan pupus di dunia adalah kerana sikap tidak bertanggungjawab manusia itu sendiri. Pembalakan haram, pembuangan sisa toksik dan pencemaran udara antara aktiviti yang menyebabkan kepupusan haiwan.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">1.	Badak Sumbu Sumatera </h4><div class=\"community-text py-1 article-title temp\"><p>Badak sumbu Sumatera terakhir di Malaysia telah disahkan mati pada November tahun 2019. Badak sumbu Sumatera merupakan spesies yang sangat jarang ditemui di Malaysia. Badak terakhir yang diberikan nama Iman itu telah disahkan mati akibat penyakit kanser.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700639578.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">2.	Ikan Dayung Cina (Chinese paddlefish) </h4><div class=\"community-text py-1 article-title temp\"><p>Ikan dayung Cina adalah salah satu ikan air tawar yang terbesar di dunia dan ia biasa ditemui di Sungai Yangtze di Asia. Walau bagaimanapun, ia telah diisytiharkan pupus pada Disember 2019 apabila tinjauan yang telah dilakukan gagal mengesan kehadiran spesies tersebut.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700639607.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">3.	Spix Macaw </h4><div class=\"community-text py-1 article-title temp\"><p>Spix Macaw merupakan spesies burung yang jarang ditemui yang kebanyakkannya ditemui di Brazil. Penampakan terakhir Spix Macaw adalah pada tahun 2016 dan ia telah diisytiharkan pupus beberapa tahun selepas itu.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700639631.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">', '1700639640.jpg', 29, '2023-11-22 15:54:00', 1, 1, NULL, NULL, 'MindLoops', '2022-10-03 00:00:00'),
(34, 'Kiblat Pertama Umat Islam Berada di Negara Palestin', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Tahukah anda bahawa Kaabah bukanlah arah kiblat yang asal bagi umat Islam? Kiblat Muslim yang pertama ialah Masjid Al-Aqsa yang terletak di Negara Palestin untuk tempoh masa yang sangat lama pada ketika itu. Masjid Al-Aqsa masih merupakan masjid yang sangat bermakna bagi umat Islam walaupun pada hakikatnya ia bukan lagi arah kiblat pada masa kini. Sejak Islam diwahyukan kepada Nabi Muhammad SAW di Mekah, Masjid Al-Aqsa telah berfungsi sebagai kiblat pertama. Apabila baginda dan para sahabatnya r.a. berada di Mekah, mereka solat di hadapan Masjid Al-Aqsa setelah diwajibkan solat ke atas mereka ketika peristiwa Israk dan Mikraj yang berlaku pada tahun sebelum Hijrah.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700639762.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Sebelum arah kiblat ditukarkan ke arah Kaabah, Umat Islam menunaikan solat menghala Masjid Al-Aqsa selama 16 bulan lamanya. Namun, Rasulullah SAW kerap berdoa kepada Allah SWT untuk menukarkan arah kiblat kerana baginda lebih menyukai kiblat menghala ke Kaabah. Firman Allah SWT dalam Surah Al-Baqarah, Ayat 144:</p><p>“Kerap kali Kami melihat engkau (wahai Muhammad), berulang-ulang menengadah ke langit, maka Kami benarkan engkau berpaling mengadap kiblat yang engkau sukai. Oleh itu palingkanlah mukamu ke arah masjid Al-Haram (tempat letaknya Kaabah); dan di mana sahaja kamu berada maka hadapkanlah muka kamu ke arahnya. Dan sesungguhnya orang-orang (Yahudi dan Nasrani) yang telah diberikan Kitab, mereka mengetahui bahawa perkara (berkiblat ke Kaabah) itu adalah perintah yang benar dari Tuhan mereka; dan Allah tidak sekali-kali lalai akan apa yang mereka lakukan.”</p> </div>', '1700639792.jpg', 29, '2023-11-22 15:56:32', 1, 1, NULL, NULL, 'MindLoops', '2022-11-01 00:00:00'),
(35, 'Sambutan Hari Orang Kurang Upaya (OKU) Sedunia', '\r\n              \r\n            <h4 class=\"py-2 display-7 fw-bolder temp\">Apa Itu Sambutan Hari Orang Kurang Upaya (OKU) Sedunia? </h4><div class=\"community-text py-1 article-title temp\"><p>Hari OKU Sedunia telah diisytiharkan pada tahun 1992 oleh Pertubuhan Bangsa-bangsa Bersatu. Sambutan Hari OKU Sedunia ini bertujuan untuk menggalakkan pemahaman masyarakat tentang isu-isu kecacatan golongan kurang upaya di samping menyokong hak, maruah dan kesejahteraan golongan tersebut. Ia juga disambut sebagai menghargai dan mengiktiraf kelebihan serta kebolehan yang mereka ada untuk disumbangkan kepada masyarakat dan negara. Hal ini secara tidak langsung dapat memupuk kesedaran awal masyarakat untuk lebih peka terhadap isu dan masalah yang dihadapi oleh golongan tersebut yang mungkin tidak dihiraukan selama ini.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700639986.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><i>Perdana Menteri Malaysia, Ismail Sabri Yaakob (tengah) menyerahkan Anugerah Khas Paralimpik pada Majlis Sambutan Hari OKU Sedunia Peringkat Kebangsaan Tahun 2021</i></p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Tahukah Anda? </h4><div class=\"community-text py-1 article-title temp\"><ul><li>OKU ialah mereka yang menghadapi masalah atau kekurangan dari segi pendengaran, penglihatan, pertuturan, pembelajaran, fizikal atau mental.</li><li>Lebih 1 bilion manusia iaitu 15 peratus daripada penduduk bumi mengalami kecacatan yang pelbagai. 93 juta daripadanya adalah golongan kanak-kanak, manakala 720 juta daripadanya merupakan golongan dewasa.&nbsp;</li><li>Kecacatan merupakan isu kesihatan awam yang melibatkan satu dari setiap tujuh orang di dunia.</li><li>Kecacatan merupakan isu hak asasi manusia kerana golongan kurang upaya sering dipandang rendah dan tidak diberikan perhatian sepenuhnya.&nbsp;</li></ul> </div>', '1700640023.png', 29, '2023-11-22 16:00:23', 1, 1, NULL, NULL, 'MindLoops', '2022-12-22 00:00:00'),
(36, 'Perpustakaan Terbesar Dunia', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Perpustakaan merupakan sebuah pusat ilmu yang menempatkan ribuan jenis buku atau bahan rujukan untuk dibaca oleh orang ramai. Perpustakaan juga menjadi tumpuan bagi para pelajar yang ingin mengulangkaji pelajaran dan belajar secara tenang kerana perpustakaan merupakan tempat yang dilarang untuk berbuat bising. Perpustakaan juga sering menjadi tumpuan bagi orang ramai untuk menjalankan sebarang mesyuarat kerana ia juga mempunyai bilik-bilik khas bagi aktiviti tersebut.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700640227.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><i>Library of Congress</i></p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Library of Congress </h4><div class=\"community-text py-1 article-title temp\"><p><i>Library of Congress</i> merupakan sebuah perpustakaan yang telah dinobatkan sebagai perpustakaan terbesar di dunia. Ia terletak di Washington D.C, Amerika Syarikat.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Fakta Menarik Tentang Library of Congress </h4><div class=\"community-text py-1 article-title temp\"><ul><li><i>Library of Congress</i> merupakan perpustakaan terbesar di muka bumi dan keluasannya mencecah 1.5 juta kaki persegi.</li><li>Jumlah dan koleksi <i>Library of Congress</i> memenuhi kira-kira 1349 km rak buku.</li><li>Terdapat lebih daripada 167 juta barang dan lebih 39 juta buku serta bahan bercetak yang lain.</li><li><i>Library of Congress</i> mempunyai bahan bacaan dari seluruh dunia.</li></ul> </div>', '1700640329.jpg', 29, '2023-11-22 16:05:29', 1, 1, NULL, NULL, 'MindLoops', '2023-01-02 00:00:00'),
(37, 'Sihat Atau Tidak?', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Kesihatan diri sangat penting dan perlu dijaga dengan sebaiknya supaya seseorang itu mampu menjauhkan diri mereka daripada sebarang jenis penyakit. Namun, adakah badan kita sentiasa dalam keadaan sihat? Adakah kita tahu bahawa sebenarnya badan kita sedang menunjukkan petanda-petanda yang negatif?&nbsp;</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Petanda Badan Tidak Sihat dan Tidak Normal </h4><div class=\"community-text py-1 article-title temp\"><p>Tahukah anda, terdapat banyak petanda atau simptom yang ditunjukkan oleh badan kita bahawa mungkin diri kita sedang berada dalam keadaan yang tidak normal atau tidak sihat? Jom kenali petanda atau simptom badan anda tidak sihat!</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">1.	Berdengkur ketika tidur </h4><div class=\"community-text py-1 article-title temp\"><p>Siapa sangka berdengkur ketika tidur merupakan salah satu petanda mungkin anda mengalami masalah kesihatan yang serius. Berdengkur dikatikan dengan masalah kesihatan seperti apnea tidur, berat badan berlebihan, penyakit jantung, strok dan banyak lagi. Sekiranya anda berdengkur ketika tidur, sila berjumpa dengan doktor-doktor perubatan bagi tujuan pemeriksaan kesihatan.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700640602.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">2.	Kulit tidak bersih </h4><div class=\"community-text py-1 article-title temp\"><p>Jerawat adalah petanda bahawa anda mungkin tidak sihat seperti yang anda fikirkan. Melakukan <i>Face Mapping</i> dapat membantu anda mengenal pasti punca sebenar kulit anda tidak bersih dan berjerawat</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700640623.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">3.	Kuku yang kelihatan pelik </h4><div class=\"community-text py-1 article-title temp\"><p>Jika kuku kaki atau tangan anda kelihatan pelik dari kebiasaan, anda perlu melakukan pemeriksaan kesihatan. Bentuk, warna kuku dan kuku kaki anda boleh memberi petunjuk kepada anda sama ada anda mempunyai masalah kesihatan atau tidak.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700640646.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">', '1700640656.jpg', 29, '2023-11-22 16:10:56', 1, 1, NULL, NULL, 'MindLoops', '2023-02-01 00:00:00'),
(38, 'Kepentingan Kempen Go Green', '\r\n              \r\n            <h4 class=\"py-2 display-7 fw-bolder temp\">Apakah yang dimaksudkan dengan Go Green? </h4><div class=\"community-text py-1 article-title temp\"><p><i>Go Green</i> merupakan satu kempen kesedaran yang bertujuan untuk memelihara dan melindungi bumi daripada bahaya pemanasan global. Ia merangkumi usaha dalam mengurangkan kesan negatif manusia terhadap bumi melalui pengurangan pelepasan gas rumah hijau, pemuliharaan sumber semula jadi dan amalan berkesan dalam pengurusan sampah.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700641626.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Kepentingan Kempen Go Green </h4><h4 class=\"py-2 display-7 fw-bolder temp\">1.	Manfaat terhadap kesihatan </h4><div class=\"community-text py-1 article-title temp\"><p>Sekiranya pemanasan global bumi meningkat, proses perubahan iklim akan berlaku lebih cepat dan boleh mengakibatkan suhu di bumi meningkat secara pantas. Oleh itu, dengan kempen <i>go green</i> ini, ia mampu melindungi kesihatan seluruh manusia di muka bumi ini. Hal ini demikian, kerana ia dapat mengurangkan kadar pencemaran dan melindungi diri manusia daripada terdedah kepada udara yang mengandungi bahan kimia yang membahayakan.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700641732.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">2.	Manfaaat terhadap ekonomi </h4><div class=\"community-text py-1 article-title temp\"><p>Tanpa kita sedari, kempen <i>go green</i> mampu meningkatkan ekonomi negara dengan melabur kepada tenaga-tenaga yang boleh diperbaharui. Selain itu, industri kemampanan (<i>sustainable industry</i>) yang berkaitan mampu berkembang dengan lebih maju dan menyediakan peluang pekerjaan yang banyak.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700641769.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">3.	Melindungi sumber semula jadi </h4><div class=\"community-text py-1 article-title temp\"><p>Kempen ini juga penting dan mampu melindungi sumber semula jadi dengan meningkatkan lagi penggunaan sumber yang boleh diperbaharui dan tidak hanya bergantung kepada sumber yang tidak boleh diperbaharui seperti bahan api fosil.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700641795.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">', '1700641800.jpg', 29, '2023-11-22 16:30:00', 1, 1, NULL, NULL, 'MindLoops', '2023-03-01 00:00:00'),
(39, 'Dialek di Malaysia', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Malaysia terkenal dengan pelbagai budaya, sejarah dan masyarakat yang berbilang kaum. Selain kaya dari segi etnik, budaya, makanan, tempat-tempat menarik, Malaysia juga turut dikenali dengan kepelbagaian bahasanya. Loghat ataupun dialek merupakan satu bahasa yang mudah difahami bagi seseorang pada sesuatu tempat. Jadi, mari kita kenali dialek yang ada di Malaysia.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Perak </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Dialek Perak</strong></td><td><strong>Maksud</strong></td></tr><tr><td>“Adi tengah meroloh tu”</td><td>“Adi tengah tidur tu”</td></tr><tr><td>“Ate abahnye pon…dengan anak pun nak bengkin”</td><td>“Habis tu abahnya pun… dengan anak pun nak garang”</td></tr><tr><td>“Tok tu dah toben...renti kan le kluor…dudok romah aje le”</td><td>“Tok tu dah tua bangka…sudah-sudah lah keluar, duduk rumah sahaja la”</td></tr></tbody></table></figure> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Pulau Pinang, Kedah dan Perlis </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Dialek Pulau Pinang, Kedah dan Perlis</strong></td><td><strong>Maksud</strong></td></tr><tr><td>“Hang ni baloq liat sunggoh, kira nak lena ja dari cerah sampai kelam”</td><td>“Awak ni pemalas betul, asyik tidur saja dari siang ke malam”</td></tr><tr><td>“Kucin tu dok tak dok tiba-tiba mai rengau ceq taksat”</td><td>“Kucing itu tidak semena-mena datang mencakar saya sebentar tadi”</td></tr><tr><td>“Tak sangka laki Che Nab tu jenih rabung, masuk ayaq macam kita jugak noh”</td><td>“Tak sangka suami Che Nab itu jenis ramah, masuk air macam kita juga”</td></tr></tbody></table></figure> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Pahang </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Dialek Pahang</strong></td><td><strong>Maksud</strong></td></tr><tr><td>“Mak, koi nak keluor kejak jumpa ghodong”</td><td>“Mak, saya nak keluar kejap jumpa kawan-kawan”</td></tr><tr><td>“Mbeng bebeno koi makan kenuri semalam”</td><td>“Berselera sungguh saya makan nasi di kenduri semalam”</td></tr><tr><td>“Toksoh, toksoh ikut aku. Ghembek je”</td><td>“Jangan, jangan ikut aku. Leceh ja”</td></tr></tbody></table></figure> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Kelantan </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Dialek Kelantan</strong></td><td><strong>Maksud</strong></td></tr><tr><td>“Pok Me bekwoh besa pasa anok tino sulung diyo nok nikoh”</td><td>“Pak Man mengadakan kenduri secara besar-besaran kerana anak perempuan sulungnya akan berkahwin”</td></tr><tr><td>“Budok tu barok bena kapong diyo”</td><td>“Budak itu jahat sungguh di kampung dia”</td></tr><tr><td>“Woh moktey blake rumoh tu, berrak doh”</td><td>“Buah rambutan belakang rumah itu dah mula masak”</td></tr></tbody></table></figure> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Terengganu </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Dialek Terengganu</strong></td><td><strong>Maksud</strong></td></tr><tr><td>“Aku dok pelawok pung”</td><td>“Saya tak tipu pun”</td></tr><tr><td>“Bakpe mung keghah keng ngak?”</td><td>“Kenapa kamu degil sangat?”</td></tr><tr><td>“Sedak the cakak…”</td><td>“Sedapnya bercakap…”</td></tr></tbody></table></figure> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Sabah </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Dialek Sabah</strong></td><td><strong>Maksud</strong></td></tr><tr><td>“Siti kena bubut dengan anjing”</td><td>“Siti kena kejar dengan anjing”</td></tr><tr><td>“Jangan taru tu pasu di siring tingkap nanti jatuh”</td><td>“Jangan letak pasu itu di tepi tingkap nanti jatuh”</td></tr><tr><td>“Siapa yang limping di atas katil saya tu?</td><td>“Siapa yang baring atas katil saya itu?”</td></tr></tbody></table></figure> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Sarawak </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Dialek Sarawak</strong></td><td><strong>Maksud</strong></td></tr><tr><td>“Angol na kamek..”</td><td>“Bosannya saya..”</td></tr><tr><td>“Jaik na perangenya eh”</td><td>“Buruk betul&nbsp; perangai dia”</td></tr><tr><td>“Kitak ada nagga sik surat kabar aritok?</td><td>“Awak ada lihat tak surat khabar hari ini?”</td></tr></tbody></table></figure> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Johor </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Dialek Johor</strong></td><td><strong>Maksud</strong></td></tr><tr><td>“Budak Usen tu maseh kolop lagi”</td><td>“Budak hussien itu masih belum berkhatan lagi”</td></tr><tr><td>“Jom sarap?”</td><td>“Jom sarapan?”</td></tr><tr><td>“Demam biyase aje, belom melintap”</td><td>“Dia demam biasa sahaja, belum demam kuat”</td></tr></tbody></table></figure> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Melaka </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Dialek Melaka</strong></td><td><strong>Maksud</strong></td></tr><tr><td>“Eh budak ni makan, koweng betul mulut kau”</td><td>“Eh budak ini makan comot betul mulut dia”</td></tr><tr><td>“Kau pergi amek kengsal, kau mandi sekarang!”</td><td>“Kamu pergi ambil tuala, kamu mandi sekarang!”</td></tr><tr><td>“Kau tengok Cik Atan duduk kat pangkin tu, dengan belenggengnya, malu kat orang aje la”</td><td>“Kamu tengok Cik Atan duduk dekat pondok tu, dengan tidak berbajunya, malu kat orang sahaja”</td></tr></tbody></table></figure> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Negeri Sembilan </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Dialek Negeri Sembilan&nbsp;</strong></td><td><strong>Maksud</strong></td></tr><tr><td>“Dari sonjo sampai ko tongah malam bobenta kito bocarian tapi tak yo solosai”</td><td>“Dari senja hingga ke tengah malam, beria-ria kita mencari jalan penyelesaian, tetapi tidak juga selesai”</td></tr><tr><td>“Kok Pak Lobai ada, mereko bocongkehlah sampai ko pagi”</td><td>“Kalau Pak Lebai ada, mereka berbuallah sampai ke pagi”</td></tr><tr><td>“Ko duduk ontok-ontok!”</td><td>“Kamu duduk diam-diam”</td></tr></tbody></table></figure> </div>', '1700642201.png', 29, '2023-11-22 16:36:41', 1, 1, NULL, NULL, 'MindLoops', '2023-04-03 00:00:00'),
(40, 'Angkasaku', '\r\n              \r\n            <h4 class=\"py-2 display-7 fw-bolder temp\">Tahukah Anda? </h4><div class=\"community-text py-1 article-title temp\"><p>Jarak antara Bumi dan angkasa lepas boleh berbeza-beza bergantung pada ketinggian dan takrifan ruang tinggi yang digunakan. Walau bagaimanapun, secara amnya, jarak purata antara Bumi dan angkasa lepas adalah kira-kira 100 km (62 batu).&nbsp;</p> </div><div class=\"community-text py-1 article-title temp\"><p>Di angkasa lepas, tidak ada udara atau molekul gas lain untuk mengalirkan haba, jadi tidak ada suhu dalam pengertian konvensional.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700642610.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Oleh kerana tiada udara atau molekul gas lain di angkasa lepas, tiada bunyi boleh dihantar. Oleh itu, angkasa lepas dianggap sebagai tempat yang sangat sunyi dan tenang.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Fakta! </h4><div class=\"community-text py-1 article-title temp\"><p>Jarak purata antara Matahari dan Bumi adalah kira-kira 149.6 juta kilometer (93 juta batu).</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700642679.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Komet Halley ialah komet terkenal yang mempunyai tempoh orbit kira-kira 76 tahun. Komet ini boleh dilihat dari Bumi dengan mata kasar pada masa-masa tertentu.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700642693.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Fenomena Transit Venus yang jarang berlaku di mana planet Venus melintasi di hadapan Matahari, dilihat dari perspektif Bumi. Transit Venus berlaku dua kali setiap abad, dengan selang kira-kira lapan tahun antara peralihan.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700642708.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">', '1700642717.jpg', 29, '2023-11-22 16:45:17', 1, 1, NULL, NULL, 'MindLoops', '2023-05-02 00:00:00'),
(41, 'Apa itu Fauna?', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Fauna ialah istilah menarik yang menggambarkan haiwan menakjubkan yang terdapat di sekeliling kita. Ia merangkumi sekecil-kecil haiwan seperti serangga sehingga sebesar-besar haiwan seperti gajah, zirafah dan sebagainya. Jom kita pelajari tentang fauna!</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Informasi Menarik Tentang Fauna </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700642835.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><ul><li>Fauna merujuk kepada semua jenis haiwan yang mendiami tempat tertentu, seperti hutan, padang pasir, atau lautan. Fauna juga merangkumi haiwan-haiwan yang berterbangan di udara seperti burung-burung.</li><li>Fauna adalah penting untuk ekosistem bumi kerana ia juga merupakan sumber makanan semula jadi manusia seperti ikan, ketam ayam, lembu dan sebagainya.</li><li>Menjadi satu kepentingan untuk kita memelihara sumber fauna di muka bumi ini bagi memastikan persekitaran yang sihat.</li><li>Fauna boleh ditemukan dalam pelbagai habitat di muka bumi ini seperti hutan hujan yang dipenuhi dengan burung-burung, serangga eksotik dan kucing hutan. Manakala di lautan adalah merupakan tempat tinggal kepada ikan paus, ikan lumba-lumba dan banyak lagi.</li></ul> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Fakta Menarik </h4><div class=\"community-text py-1 article-title temp\"><p>Tahukah anda, ikan paus biru atau <i>blue whale&nbsp;</i>merupakan haiwan terbesar yang pernah dibuktikan kewujudannya? Ikan paus biru boleh membesar sehingga sepanjang tiga bas sekolah.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700642956.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">', '1700642961.jpg', 29, '2023-11-22 16:49:21', 1, 1, NULL, NULL, 'MindLoops', '2023-06-05 00:00:00'),
(42, 'Terokai Kisah Salahuddin Al-Ayubi dalam Siri Animasi', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Pernahkah anda menonton siri animasi Saladin? Siri animasi dengan 13 episod ini telah mula disiarkan di saluran TV3 dan Astro Ria sejak tahun 2010. Ia diilhamkan daripada kisah hidup seorang tokoh pahlawan Islam, iaitu Sultan Salahuddin Al-Ayubi yang telah berjaya membebaskan kota suci Baitul Maqdis pada abad ke-12. Antara watak utama dalam siri animasi ini ialah Saladin, Tarik, Anisa, Duncan dan Omar.</p> </div><div class=\"community-text py-1 article-title temp\"><p>Namun, tahukah anda bahawa terdapat perbezaan watak dan perwatakan antara biografi Salahuddin Al-Ayubi dengan Saladin dalam jalan cerita siri animasi tersebut? Jom kita ikuti perbezaannya di bawah!</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1700643676.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Saladin, watak utama. </h4><div class=\"community-text py-1 article-title temp\"><p>Perwatakan Saladin dalam siri animasi ini yang takut akan kematian sememangnya bercanggah dengan perwatakan sebenar Salahuddin Al-Ayubi yang tidak gentar untuk syahid di medan perang.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Tarik, sahabat Saladin. </h4><div class=\"community-text py-1 article-title temp\"><p>Perwatakan Tarik yang penakut dan sentiasa menghalang Saladin daripada mencuba perkara baharu amat berbeza dengan perwatakan sebenar sahabat Salahudin Al-Ayubi yang sanggup berjuang bersama-sama beliau.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Duncan, sahabat Saladin. </h4><div class=\"community-text py-1 article-title temp\"><p>Watak Duncan dalam siri animasi ini telah menenggelami watak hero utama iaitu Saladin. Duncan digambarkan gagah perkasa dengan senjata berbanding dengan Saladin yang kelihatan cemas dan tidak terurus. Watak ini juga tidak terdapat dalam biografi Salahuddin Al-Ayubi.</p> </div><div class=\"community-text py-1 article-title temp\"><p>Sudah jelas, bukan? Walau bagaimanapun, terdapat banyak lagi unsur dalam siri tersebut yang bercanggah dengan riwayat hidup sebenar Salahuddin Al-Ayubi. Pengajarannya di sini ialah, berhati-hatilah dalam menonton cerita khususnya yang berunsurkan sejarah Islam. Sebaiknya, perbanyakkan bacaan sejarah hidup tokoh pahlawan Islam supaya kita tidak mudah tertipu atau keliru dengan cerita adaptasi yang ditayangkan di kaca televisyen.&nbsp;</p> </div>', '1700643803.jpg', 29, '2023-11-22 17:03:23', 1, 1, NULL, NULL, 'MindLoops', '2023-08-08 00:00:00'),
(43, 'Cara Memuji Kanak-Kanak Dengan Kata-Kata', '\r\n            \r\n            \r\n            \r\n            \r\n              \r\n            <img src=\"https://amirali.mindloops.org/assets/images/blogs/1701244181.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">                                    <div class=\"community-text py-1 article-title temp\"><p><br>Terdapat banyak cara untuk memuji kanak-kanak, tetapi tidak semua kata-kata yang menggalakkan adalah sama. Jika digunakan secara berlebihan, ia akan mendatangkan lebih banyak kemudaratan kepada kanak-kanak. Berikut merupakan tip untuk memuji kanak-kanak.&nbsp;</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">1. Memberi Pujian Dengan Ikhlas Dan Jujur </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Jangan</strong>&nbsp;</td><td><strong>Buat</strong>&nbsp;</td></tr><tr><td>Awak seorang yang genius untuk menyelesaikan masalah itu!&nbsp;</td><td>Tahniah, untuk soalan terakhir ini awak memberikan jawapan yang sangat baik.&nbsp;</td></tr><tr><td>Bagus, saya pasti awak akan berjaya lagi pada masa akan datang. (manipulasi)&nbsp;</td><td>Saya suka dengan penyelesaian yang awak berikan.&nbsp;</td></tr></tbody></table></figure> </div>            <h4 class=\"py-2 display-7 fw-bolder temp\">2. Elakkan Pujian Bersyarat </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Jangan</strong>&nbsp;</td><td><strong>Buat</strong>&nbsp;</td></tr><tr><td>Saya yakin awak akan lakukan lebih bagus pada masa akan datang.&nbsp;</td><td>Awak sudah berkerja keras minggu ini dan saya suka lihat awak mewarna dengan warna yang cerah begini.&nbsp;</td></tr><tr><td>Awak sudah bekerja keras untuk ini, seperti yang saya harapkan.&nbsp;</td><td>Awak buat dengan bagus dalam mengutip data.&nbsp;</td></tr></tbody></table></figure> </div><h4 class=\"py-2 display-7 fw-bolder temp\">3. Elakkan Perbandingan </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Jangan</strong>&nbsp;</td><td><strong>Buat</strong>&nbsp;</td></tr><tr><td>Awak sangat bagus, sama macam kakak.&nbsp;</td><td>Awak sangat berbakat dalam permainan ini.&nbsp;</td></tr><tr><td>Awak sangat bangus berbanding kawan awak yang lain!&nbsp;</td><td>Awak selesaikan masalah dengan sangat fokus.&nbsp;&nbsp;</td></tr></tbody></table></figure> </div><h4 class=\"py-2 display-7 fw-bolder temp\">4. Menjadi Ibu Bapa Yang Lebih Spesifik Dan Deskriptif </h4><div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><strong>Jangan</strong>&nbsp;</td><td><strong>Buat</strong>&nbsp;</td></tr><tr><td>Lukisan yang sangat menarik!&nbsp;</td><td>Saya suka cara awak menggunakan warna yang berbeza semasa mewarna.&nbsp;</td></tr><tr><td>Bagus!&nbsp;</td><td>Awak berikan jawapan yang sangat bernas dan benar-benar memahami soalan itu!&nbsp;&nbsp;</td></tr></tbody></table></figure> </div>', '1701244195.jpg', 24, '2023-11-29 15:49:55', 1, 1, '2023-11-29 16:09:48', 1, 'MindLoops', '2023-07-05 00:00:00');
INSERT INTO `blogs` (`blog_id`, `title`, `content`, `thumbnail`, `category_id`, `created_at`, `status`, `created_by`, `updated_date`, `updated_by`, `published_by`, `published_date`) VALUES
(44, 'Membentuk Kerangka Minda', '\r\n            \r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p><strong>Kerangka Minda</strong> adalah corak pemikiran yang menjadi asas dan dasar kepada pembentukan sikap, tingkah laku dan perbuatan seseorang manusia. Menurut Carol Dweck, seorang ahli psikologi di Universiti Standfort mengatakan bahawa kerangka minda terbahagi kepada dua; kerangka minda bercambah (<i>growth mindset</i>) dan kerangka minda terbelenggu (<i>fixed mindset</i>).&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701306007.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Seseorang yang mempunyai <strong>kerangka minda bercambah</strong> mempercayai dan menganggap bakat, potensi dan keupayaan boleh dipertingkatkan dan dibangunkan selagi mana masih ada kemahuan, kegigihan dan usaha yang berterusan. Malah, mereka melihat setiap kesalahan sebagai peluang untuk mempelajari sesuatu yang baru dan menambah pengalaman.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701306101.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Manakala, seseorang yang mempunyai <strong>kerangka minda terbelenggu</strong> pula mengatakan seseorang manusia itu lahir dengan bakat dan potensi sedia ada dalam diri. Ia telah ditetapkan dan tidak berubah. Seseorang yang mempunyai pola pemikiran sedemikian akan sentiasa pasrah dan tidak berdaya saing.&nbsp;</p> </div><div class=\"community-text py-1 article-title temp\"><p>Kerangka minda memainkan peranan dalam membentuk corak pemikiran anak-anak sejak daripada awal usia. Melalui kerangka minda itulah menentukan bagaimana seseorang itu menangani kegagalan, halangan dan cabaran, teguran serta kejayaan orang di sekelilingnya.&nbsp;</p> </div><div class=\"community-text py-1 article-title temp\"><p>Mari kita lihat <strong>TIGA</strong> aktiviti yang dapat membantu untuk membentuk kerangka minda bercambah dalam pemikiran anak-anak.&nbsp;</p><ol><li><strong>Membaca buku atau menonton cerita</strong> – Membaca cerita yang menceritakan tentang cabaran atau kesusahan. Ajak anak-anak anda untuk mengenal pasti cabaran dan bagaimana individu tersebut mengatasi dan menangani situasi tersebut.&nbsp;<br>&nbsp;</li><li><strong>Ambil tahu masalah anak-anak</strong> – Sebagai ibu bapa, kita hendaklah meluangkan satu masa bersama dengan anak-anak untuk bertanyakan kepada mereka masalah yang mereka hadapi sepanjang hari tersebut dan cara mereka mengatasi serta refleksi terhadap apa yang mereka lalui.<br>&nbsp;</li><li><strong>Cuba sesuatu yang baharu</strong> – Galakkan anak-anak anda untuk mencuba atau melakukan sesuatu yang baharu sama ada permainan baharu atau sukan baharu atau melawati tempat baharu atau apa saja yang baharu untuk membantu pencambahan fikiran mereka.</li></ol> </div>            ', '1701306324.jpg', 22, '2023-11-30 09:05:24', 1, 1, '2023-12-12 11:52:42', 1, 'MindLoops', '2023-07-03 00:00:00'),
(45, 'Tips Penjagaan Kulit Muka Untuk Remaja', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Menjaga kulit sewaktu remaja merupakan perkara yang amat penting untuk mengurangkan jerawat. Hal ini adalah disebabkan mereka melalui fasa akil baligh yang menyebabkan perubahan hormon di dalam badan. Perubahan hormon menyebabkan kelenjar minyak di dalam kulit menjadi aktif dan akan menyebabkan muka berminyak dan berjerawat.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701309253.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Antara faktor perkara ini terjadi adalah disebabkan oleh corak pemakanan yang tidak seimbang dan stres yang dihadapi. Penjagaan kulit muka seharusnya dimulakan sejak awal dengan menggunakan produk yang sesuai dengan kulit muka remaja.&nbsp;</p><p>Berikut adalah langkah yang sesuai dilakukan untuk menjaga kulit muka.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701309281.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><br>&nbsp;</p><ol><li><strong>Pencuci muka</strong><br>- Gunakan produk yang mempunyai skala pH yang seimbang antara skala 4.5 hingga 5.5.<br>- Cari pencuci muka yang lembut dan tidak mempunyai kandungan bahan yang terlalu banyak.&nbsp;<br>&nbsp;</li><li><strong>&nbsp;Exfoliator</strong><br>- Pakai <i>exfoliator</i> 2 ke 3 kali seminggu.<br>- <i>Exfoliator</i> yang mengandungi <i>Salicylic Acid</i> bagus untuk kulit yang berminyak.&nbsp;<br>- Pilih <i>exfoliator</i> yang lembut.<br>&nbsp;</li><li><strong>&nbsp;Menggunakan Pelembap</strong><br>- Cari pelembap yang bebas minyak atau oil-free.<br>- Menggunakan pelembap yang mempunyai bahan tambahan yang bagus untuk kelembapan kulit seperti <i>Hyaluronic Acid</i>.<br>&nbsp;</li><li><strong>&nbsp;Gunakan Krim Pelindung Matahari (</strong><i><strong>sunscreen</strong></i><strong>)</strong><br>- Gunakan sunscreen setiap hari pada waktu siang.<br>- Pilih sunscreen yang tidak melekit, oil-free dan SPF 30<br>&nbsp;</li><li><strong>&nbsp;Spot Treatment</strong><br>- Kulit yang berminyak boleh mendatangkan jerawat.<br>- Tidak digalakkan untuk memicit jerawat tersebut.<br>- Gunakan produk spot treatment yang mempunyai bahan Benzoyl Peroxide.</li></ol> </div>', '1701310357.jpg', 23, '2023-11-30 10:12:37', 1, 1, NULL, NULL, 'MindLoops', '2023-07-18 00:00:00'),
(46, 'Tips Memupuk Pertumbuhan dan Perkembangan Remaja ', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Memupuk pertumbuhan dan perkembangan remaja merupakan satu cabaran yang perlu dihadapi oleh ibu bapa. Namun apabila seseorang remaja dibimbing dan mendapat sokongan penuh daripada ibu bapa mereka, maka perkembangan remaja tersebut berlaku dengan baik dan berkesan. Jadi, jom kita pelajari tip dalam memupuk pertumbuhan dan perkembangan remaja!&nbsp;</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Mewujudkan Komunikasi Secara Terbuka Dan Jujur </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701311588.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Wujudkan komunikasi secara terbuka dengan anak anda. Galakkan mereka untuk berkongsi pendapat dan perasaan mereka tanpa menghakimi perbuatan dan pendapat mereka secara terburu-buru. Mendengar dengan aktif dan bersikap empati dapat memupuk pertumbuhan para remaja.&nbsp;</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Mewujudkan Peraturan </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701312714.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Sebagai ibubapa yang bertanggungjawab, anda perlu mewujudkan peraturan yang perlu mereka patuhi. Seperti contoh, had masa untuk keluar rumah, tanggungjawab yang perlu mereka jalankan dan pergaulan antara rakan.&nbsp;&nbsp;</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Menyokong Impian Mereka </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701312976.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Galakkan anak remaja anda untuk meneroka dan mengenali minat mereka. Sokong impian dan aspirasi mereka dengan menyediakan peluang terutama dalam bidang pembelajaran. Bantu mereka menetapkan matlamat yang realistik dan bimbing mereka ke arah kebaikan.&nbsp;</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Menjadi Contoh Yang Terbaik </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701313274.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Ibu bapa perlu menjadi contoh yang terbaik jika ingin memastikan anak-anak mereka membesar dalam persekitaran yang positif. Anda perlu menunjukkan sikap dan perbuatan yang baik untuk mereka contohi. Justeru, anda perlu berhati-hati dengan pengaruh tindakan anda terhadap mereka.</p> </div>', '1701313309.jpg', 23, '2023-11-30 11:01:49', 1, 1, NULL, NULL, 'MindLoops', '2023-06-01 00:00:00'),
(47, 'Adab Terhadap Haiwan', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Tahukah anda kita juga perlu menghormati haiwan seperti mana kita menghormati makhluk hidup yang lain. Pentingnya kita beradab sesama makhluk di muka bumi ini demi kesejahteraan kita bersama.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701318761.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><br><br>Ada beberapa adab terhadap haiwan yang perlu kita ketahui. Antaranya adalah:</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701319030.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><strong>Tidak Boleh Mengasari:</strong> Jangan sekali-kali mengasari haiwan seperti memukul, menendang, atau menyakiti mereka. Haiwan juga mempunyai perasaan dan hak-hak yang kita perlu hormati.&nbsp;</p><p><strong>Menunjukkan Rasa Hormat:</strong> Tunjukkan rasa hormat terhadap haiwan dengan bersikap lembut terhadap mereka. Jangan berteriak atau mengancam mereka. Sapa haiwan dengan penuh kasih sayang dan hormat.&nbsp;</p><p><strong>Memberikan Perlindungan:</strong> Jadilah pengawal yang baik bagi haiwan-haiwan yang berada di sekeliling anda. Pastikan mereka dalam keadaan selamat dan dilindungi. Jangan biarkan mereka terlantar atau terdedah kepada bahaya.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701319266.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><strong>Berikan Perhatian dan Kasih Sayang:</strong> Tunjukkan perhatian dan kasih sayang terhadap haiwan-haiwan yang anda jaga. Bermain dengan mereka, berinteraksi secara positif dan berikan sentuhan lembut. Mereka akan merasa disayangi dan dihargai.&nbsp;</p><p><strong>Bantu Haiwan yang Memerlukan Pertolongan:</strong> Jika anda melihat haiwan yang sakit atau dalam keadaan bahaya, cubalah membantu atau hubungi pihak berkuasa atau organisasi haiwan untuk memberikan bantuan yang diperlukan.&nbsp;&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701319484.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><strong>Jangan Menyakiti atau Mengganggu Haiwan Liar:</strong> Jika anda berjumpa dengan haiwan liar, seperti burung, monyet, gajah atau binatang liar lain, jangan mengganggu mereka. Hargai habitat semula jadi mereka dan biarkan mereka hidup dalam keadaan yang aman dan tenteram.&nbsp;</p> </div>', '1701319530.jpg', 22, '2023-11-30 12:45:30', 1, 1, NULL, NULL, 'MindLoops', '2023-06-18 00:00:00'),
(48, 'Atasi Konflik Dengan Anak Tanpa Emosi', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Hubungan ibu bapa dengan anak tentu tidak terlepas daripada pertengkaran atau konflik. Pertengkaran atau konflik dengan anak biasanya muncul kerana adanya perbezaan pendapat atau plilihan antara anak dan ibu bapa. Konflik dapat dipengaruhi oleh cara ibu bapa menangani dan mengelola interaksi yang terjadi dengan anak. Berikut merupakan cara ibu bapa menghadapi konflik dengan anak agar tidak berlanjutan.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701320103.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>&nbsp;</p><ol><li><strong>Kendali emosi.&nbsp;</strong><br>Perilaku anak ketika konflik sedang terjadi akan membuatkan ibu bapa berasa kesal. Namun, menyingkap hal ini, sebagai ibu bapa, anda perlu tenang. Sekiranya anda mengekspresikan emosi pada waktu yang salah akan menyebabkan situasi menjadi lebih rumit. Sebaiknya, apabila emosi anak anda sedang memuncak, minta mereka masuk ke bilik terlebih dahulu bagi mengambil waktu untuk menenangkan diri.<br><br>&nbsp;</li><li><strong>Berkomunikasi dengan baik.&nbsp;</strong><br>Ibu bapa dan anak perlu saling mengutarakan pandangan dan harapan masing-masing dan jelaskan mengapa anda mempunyai pemikiran yang berbeza. Pastikan anak anda juga menyampaikan pendapat dan pandangannya. Sebagai ibu bapa, hargai apa jua pendapatnya dengan tidak memotong perbicaraannya, walaupun mungkin anda sudah mengetahui jawapannya. Anda sebaiknya menjadi pendengar yang baik ketika mereka mengutarakan pandangan.&nbsp;&nbsp;<br><br>&nbsp;</li><li><strong>Biar anak terima akibat.&nbsp;</strong><br>Sebagai ibu bapa, anda pasti akan menentukan hal-hal yang baik untuk anak-anak anda. Namun demi kepentingan diri anda dan anak, ibu bapa juga harus memberikan kebebasan kepada mereka untuk memilih. Ini kerana, sekiranya anak anda menginginkan sesuatu perkara yang berbeza dengan anda, maka anda perlu mengizinkannya. Perkara ini akan membuatkan anak menjadi lebih mendengar walaupun anda harus merelakan kesan daripada pilihannya nanti.&nbsp;<br><br>&nbsp;</li><li><strong>Cari penyelesaian bersama-sama.&nbsp;</strong><br>Sebarang konflik anda dengan anak, cari jalan penyelesaiannya bersama. Penyelesaian ini boleh berupa kesepakatan antara ibu bapa dan anak seperti “Boleh belajar sebentar hari ini, tapi esok harus belajar lebih lama.” Ia membangunkan kesepakatan yang dipersetujui antara kedua-dua belah pihak, harapannya agar dapat menjadi penyelesaian terbaik untuk anda dan anak anda. &nbsp;<br><br>&nbsp;</li><li><strong>Saling memaafkan.&nbsp;</strong><br>Ibu bapa dan anak, kedua-duanya pasti pernah melakukan kesalahan, baik yang sengaja mahupun tidak sengaja. Oleh kerana itu, anda sebagai ibu bapa harus belajar menerima dan sentiasa bersifat terbuka untuk saling memaafkan setiap kesalahan yang dilakukan. Begitu juga dengan peranan anak, ibu bapa perlu memberikan perhatian bahawa memaafkan orang lain termasuk ibu bapa itu penting agar konflik dapat diredakan dengan cepat.&nbsp;</li></ol> </div>', '1701320271.jpg', 25, '2023-11-30 12:57:51', 1, 1, NULL, NULL, 'MindLoops', '2023-06-18 00:00:00'),
(49, 'Pupuk Rasa Ingin Tahu dan Motivasi Kanak-Kanak ', '\r\n              \r\n            <img src=\"https://amirali.mindloops.org/assets/images/blogs/1701325909.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><br><br>Sebagai ibu bapa, kita memainkan peranan yang amat penting dalam memupuk rasa ingin tahu dan motivasi dalam diri anak-anak. Dengan adanya penerapan ini, kita secara tidak langsung membuka peluang kepada mereka ke arah pembelajaran sepanjang hayat. Jom, kita ikuti panduan di bawah!&nbsp;<br>&nbsp;</p><ol><li><strong>Galakkan Penerokaan&nbsp;</strong><br>Sokong perasaan ingin tahu yang terjadi secara semula jadi dalam diri anak-anak anda dengan menyediakan peluang untuk mereka terokai lebih dalam sifat ingin tahu tersebut. Galakkan mereka untuk bertanya soalan, mencari jawapan dan mencari minat baharu.<br><br>&nbsp;</li><li><strong>Raikan Kesilapan dan Peluang Pembelajaran</strong>&nbsp;<br>Melakukan kesilapan merupakan salah satu daripada proses pembelajaran. Maka, ibu bapa harus sentiasa mengambil sisi positif daripada kesilapan yang dilakukan anak-anak anda. Berikan peluang serta galakkan mereka untuk belajar daripada kesilapan.&nbsp;<br><br>&nbsp;</li><li><strong>Wujudkan Persekitaran yang Positif&nbsp;</strong><br>Ibu bapa perlu memupuk persekitaran yang menghargai dan menggalakkan rasa ingin tahu dan motivasi anak-anak. Sediakan ruang dan peluang untuk anak-anak anda selesa menyatakan minat mereka, bertanya soalan dan mendapatkan bimbingan. Raikan pencapaian dan usaha mereka sepanjang tempoh pembelajaran.&nbsp;<br><br>&nbsp;</li><li><strong>Hubung Kait Pembelajaran dengan Aplikasi Dunia Sebenar&nbsp;</strong><br>Bantu anak remaja anda melihat aplikasi praktikal apa yang mereka pelajari. Tunjukkan kepada mereka bagaimana subjek akademik berkait dengan cabaran dunia sebenar, profesion dan kehidupan seharian. Dengan membuat perkaitan ini, anak remaja anda akan memahami perkaitan pendidikan mereka. Ia membantu untuk mencetuskan rasa ingin tahu dan motivasi mereka agar meneroka pembelajaran dengan lebih mendalam</li></ol> </div>', '1701325960.jpg', 24, '2023-11-30 14:32:40', 1, 1, NULL, NULL, 'MindLoops', '2023-05-18 00:00:00'),
(50, 'Tips Membina Jadual Harian', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Tahukah anda jadual harian dapat membantu meningkatkan produktivi menjadikan anda lebih fokus dan teratur dalam menyelesaikan tugas setiap hari? Terdapat beberapa tips di bawah yang boleh anda gunakan dalam menghasilkan jadual harian anda tersendiri.&nbsp;<br><br>&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701327756.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ol><li><strong>Tetapkan keutamaan:</strong> Tentukan tugas yang paling penting untuk diselesaikan pada hari itu dan utamakan tugas tersebut dalam jadual harian anda.<br>&nbsp;</li><li><strong>Waktu terbaik:</strong> Identifikasi waktu terbaik dalam sehari untuk menyelesaikan tugas-tugas tertentu. Contohnya, jika anda lebih produktif di siang hari, tetapkan waktu tersebut untuk menyelesaikan tugas yang paling penting di pagi hari.<br>&nbsp;</li><li><strong>Tetapkan waktu</strong>: Tentukan jangka waktu yang diperlukan untuk menyelesaikan setiap tugas dan tetapkan waktu yang spesifik dalam jadual harian anda.<br>&nbsp;</li><li><strong>Waktu rehat:</strong> Tetapkan waktu rehat dalam jadual harian anda. Istirahat yang cukup dapat membantu mengekalkan prestasi dan fokus anda.&nbsp;<br>&nbsp;</li><li><strong>Fleksibiliti:</strong> Berikan fleksibiliti dalam jadual harian anda untuk membolehkan perubahan yang tidak dijangka dalam rancangan.&nbsp;&nbsp;<br>&nbsp;</li><li><strong>Menilai:</strong> Menilai jadual harian anda pada penghujung setiap hari untuk melihat apa yang berkesan dan apa yang tidak berkesan. Ini boleh membantu anda melaraskan jadual harian anda agar lebih berkesan pada masa hadapan.&nbsp;<br>&nbsp;</li><li><strong>Elakkan Overload:</strong> Pastikan jadual harian anda tidak terlalu padat dan memberi anda masa yang cukup untuk menjalankan tugas dengan betul. Jangan terlalu bekerja sendiri dan akhiri hari dengan tekanan dan keletihan&nbsp;</li></ol> </div>', '1701327960.jpg', 22, '2023-11-30 15:06:00', 1, 1, NULL, NULL, 'MindLoops', '2023-05-24 00:00:00'),
(51, 'Kedudukan Planet', '\r\n            \r\n              \r\n            <img src=\"https://amirali.mindloops.org/assets/images/blogs/1701328758.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><br><strong>Planet-planet dalam sistem suria</strong>&nbsp;</p><figure class=\"table\"><table><tbody><tr><td><p><strong>Planet Utarid</strong>&nbsp;</p><p>Paling dekat dengan matahari.&nbsp;</p><p>Planet terkecil dalam sistem suria.&nbsp;</p><p>Permukaan Utarid lebih kurang sama dengan permukaan bulan.&nbsp;</p><p>Tiada atmosfera.&nbsp;</p></td><td><p><strong>Planet Zuhrah</strong>&nbsp;</p><p>Planet kedua paling dekat dengan matahari.&nbsp;</p><p>Dikenali sebagai planet rumah hijau.&nbsp;</p><p>Berputar dari timur ke barat.&nbsp;</p><p>Saiz dan usia sama dengan Bumi.&nbsp;</p></td></tr><tr><td><p><strong>Planet Bumi</strong>&nbsp;</p><p>Planet ketiga dari matahari.&nbsp;</p><p>Merupakan satu-satunya planet di alam semesta yang dihuni makhluk hidup.&nbsp;</p><p>Mempunyai lapisan udara.&nbsp;</p><p>Lebih 71% kawasan diliputi air dan 29% merupakan daratan.&nbsp;</p></td><td><p><strong>Planet Marikh</strong>&nbsp;</p><p>Planet keempat yang dikenali sebagai Planet Merah.&nbsp;</p><p>Mempunyai dua bulan, iaitu Phobos dan Demos.&nbsp;</p><p>Hanya mempunyai keluasan 25% permukaan bumi dan 10% jisim bumi&nbsp;</p><p>Kawasan lebih cerah dilitupi oleh debu dan pasir kemerahan. Kawasan kutub mengandungi ais beku dan karbon dioksida.&nbsp;</p></td></tr><tr><td><p><strong>Planet Musytari</strong>&nbsp;</p><p>Planet kelima dari matahari dan planet terbesar.&nbsp;</p><p>Jisimnya hampir 320 kali ganda daripada jisim Bumi.&nbsp;</p><p>Menjadi pelindung kepada bumi kerana mampu memesongkan objek besar daripada melanggar bumi dengan daya graviti yang sangat kuat.&nbsp;</p></td><td><p><strong>Planet Zuhal</strong>&nbsp;</p><p>Planet keenam dari matahari dan planet kedua terbesar.&nbsp;</p><p>Planet gergasi bergas.&nbsp;</p><p>Mempunyai sistem gelang atau cecincin yang terdiri daripada ais dengan sejumlah kecil serpihan batuan dan debu.&nbsp;</p><p>Sebanyak 62 bulan yang ditemukan.&nbsp;</p></td></tr><tr><td><p><strong>Planet Uranus&nbsp;</strong>&nbsp;</p><p>Planet ketujuh dari matahari.&nbsp;</p><p>Unsur pertama di bahagian dalam Uranus ialah ais dan batu.&nbsp;</p><p>Paksi putarannya condong ke sisi iaitu hampir selari dengan orbitnya.&nbsp;</p><p>Mengambil masa 84 tahun (waktu bumi) untuk mengelilingi matahari.&nbsp;&nbsp;</p></td><td><p><strong>Planet Neptun</strong>&nbsp;</p><p>Planet kelapan dari matahari.&nbsp;</p><p>Planet gergasi bergas.&nbsp;</p><p>Mengambil masa 165 tahun (waktu bumi) untuk mengelilingi matahari.&nbsp;</p></td></tr></tbody></table></figure> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701329042.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><br><strong>Cara menghafal kedudukan planet</strong>&nbsp;</p><p>Cara mudah untuk menghafal kedudukan planet daripada matahari adalah dengan menggunakan akronim iaitu dengan menggunakan huruf awal untuk mengingati sesuatu perkara.&nbsp;</p><figure class=\"table\"><table><tbody><tr><td><strong>Planet</strong>&nbsp;</td><td><strong>Cara1&nbsp;</strong>&nbsp;</td><td><strong>Cara 2</strong>&nbsp;</td><td><strong>Cara 3</strong>&nbsp;</td></tr><tr><td>Utarid&nbsp;</td><td>Ustazah&nbsp;</td><td>Ustaz&nbsp;</td><td>Ustazah&nbsp;</td></tr><tr><td>Zuhrah&nbsp;</td><td>Zuraidah&nbsp;</td><td>Zuraidah&nbsp;</td><td>Zuhrah&nbsp;</td></tr><tr><td>Bumi&nbsp;</td><td>Bungkus&nbsp;</td><td>Bawa&nbsp;</td><td>Bungkus&nbsp;</td></tr><tr><td>Marikh&nbsp;</td><td>Makanan&nbsp;</td><td>Motor&nbsp;</td><td>Mi&nbsp;</td></tr><tr><td>Musytari&nbsp;</td><td>Masa&nbsp;</td><td>Merah&nbsp;</td><td>Masa&nbsp;</td></tr><tr><td>Zuhal&nbsp;</td><td>Zohor&nbsp;</td><td>Ziarah&nbsp;</td><td>Zohor&nbsp;</td></tr><tr><td>Uranus&nbsp;</td><td>Untuk&nbsp;</td><td>Ustazah&nbsp;</td><td>Untuk&nbsp;</td></tr><tr><td>Neptun&nbsp;</td><td>Nenek&nbsp;</td><td>Nur&nbsp;</td><td>Noraini&nbsp;</td></tr></tbody></table></figure> </div>            <div class=\"community-text py-1 article-title temp\"><figure class=\"table\"><table><tbody><tr><td><p><strong>Planet Utarid</strong></p><ul><li>Paling dekat dengan matahari.</li><li>Planet terkecil dalam sistem suria.</li><li>Permukaan Utarid lebih kurang sama dengan permukaan bulan.</li><li>Tiada atmosfera.</li></ul></td><td><p><strong>Planet Zuhrah</strong></p><ul><li>Planet kedua paling dekat dengan matahari.</li><li>Dikenali sebagai planet rumah hijau.</li><li>Berputar dari timur ke barat.</li><li>Saiz dan usia sama dengan Bumi.</li></ul></td></tr><tr><td><p><strong>Planet Bumi</strong></p><ul><li>Planet ketiga dari matahari.</li><li>Merupakan satu-satunya planet di alam semesta yang dihuni makhluk hidup.</li><li>Mempunyai lapisan udara.</li><li>Lebih 71% kawasan diliputi air dan 29% merupakan daratan.</li></ul></td><td><p><strong>Planet Marikh</strong></p><ul><li>Planet keempat yang dikenali sebagai Planet Merah.</li><li>Mempunyai dua bulan, iaitu Phobos dan Demos.</li><li>Hanya mempunyai keluasan 25% permukaan bumi dan 10% jisim bumi</li><li>Kawasan lebih cerah dilitupi oleh debu dan pasir kemerahan. Kawasan kutub mengandungi ais beku dan karbon dioksida.</li></ul></td></tr><tr><td><p><strong>Planet Musytari</strong></p><ul><li>Planet kelima dari matahari dan planet terbesar.</li><li>Jisimnya hampir 320 kali ganda daripada jisim Bumi.</li><li>Menjadi pelindung kepada bumi kerana mampu memesongkan objek besar daripada melanggar bumi dengan daya graviti yang sangat kuat.</li></ul></td><td><p><strong>Planet Zuhal</strong></p><ul><li>Planet keenam dari matahari dan planet kedua terbesar.</li><li>Planet gergasi bergas.</li><li>Mempunyai sistem gelang atau cecincin yang terdiri daripada ais dengan sejumlah kecil serpihan batuan dan debu.</li><li>Sebanyak 62 bulan yang ditemukan.</li></ul></td></tr><tr><td><p><strong>Planet Uranus&nbsp;</strong></p><ul><li>Planet ketujuh dari matahari.</li><li>Unsur pertama di bahagian dalam Uranus ialah ais dan batu.</li><li>Paksi putarannya condong ke sisi iaitu hampir selari dengan orbitnya.</li><li>Mengambil masa 84 tahun (waktu bumi) untuk mengelilingi matahari.&nbsp;</li></ul></td><td><p><strong>Planet Neptun</strong></p><ul><li>Planet kelapan dari matahari.</li><li>Planet gergasi bergas.</li><li>Mengambil masa 165 tahun (waktu bumi) untuk mengelilingi matahari.</li></ul></td></tr></tbody></table></figure> </div>', '1701329100.jpg', 23, '2023-11-30 15:25:00', 1, 1, '2023-12-14 16:28:52', 1, 'MindLoops', '2023-05-07 00:00:00'),
(52, 'Tip Mempelajari Bahasa Baru', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Mempelajari bahasa baharu merupakan satu usaha yang penting terutamanya apabila kita menetap dalam negara yang mempunyai kepelbagaian bangsa dan kaum. Selain itu, bahasa merupakan alat komunikasi yang penting untuk berinteraksi dengan orang lain. Oleh itu, jika anda yang mempunyai kemahiran bercakap lebih daripada satu bahasa, ia dapat memudahkan aktiviti dan kehidupan seharian anda. Jom kita pelajari tips-tips penting untuk mempelajari bahasa baharu!&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701330421.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>&nbsp;<strong>Tips Mempelajari Bahasa Baharu</strong>&nbsp;</p><p>&nbsp;</p><ul><li><strong>Menetapkan sasaran yang betul</strong><br>Sebelum anda mula mempelajarai bahasa baharu, anda perlu menetapkan sasaran yang betul dan realistik. Sasaran yang betul mampu membantu anda untuk kekal fokus dan mengenal pasti tujuan utama anda mempelajari bahasa baharu. Sasaran realitistik perlu ditetapkan kerana mempelajari bahasa baharu bukan satu proses pembelajaran kemahiran yang singkat dan mudah.&nbsp;<br><br>&nbsp;</li></ul> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701330738.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ul><li><strong>Membina asas yang kukuh</strong><br>Setelah mengenal pasti bahasa yang anda minat untuk pelajari, anda perlu mengukuhkan asas dalam bahasa tersebut. Pastikan anda mahir dan fahami setiap kosa kata dan tatabahasa bahasa tersebut untuk membina asas yang kukuh.&nbsp;<br><br>&nbsp;</li></ul> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701330790.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ul><li><strong>Gunakan teknologi</strong><br>Gunakan teknologi sebagai alat yang boleh membantu anda mempelajari bahasa baharu dengan lebih efektif.&nbsp; Seperti contoh, anda boleh gunakan aplikasi-aplikasi pembelajaran bahasa dan sumber pembelajaran dalam talian untuk membantu anda memperoleh kefahaman dan latihan yang lebih baik.<br><br>&nbsp;</li></ul> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701330815.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ul><li><strong>Berlatih secara konsisten dan kekal bermotivasi</strong><br>Berlatih secara konsisten dengan cara menjadikan bahasa baharu sebagai bahasa kedua anda dan gunakan bahasa tersebut dalam komunikasi harian anda. Selain itu, anda juga perlu mengenal pasti sesuatu yang dapat mendorong anda untuk belajar bahasa baharu dan gunakan faktor tersebut sebagai sumber motivasi anda.&nbsp;</li></ul> </div>', '1701330870.jpg', 23, '2023-11-30 15:54:30', 1, 1, NULL, NULL, 'MindLoops', '2023-04-07 00:00:00'),
(53, 'Teknik Komunikasi dengan Anak', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Komunikasi memainkan peranan penting dalam membina hubungan yang kukuh dalam sesebuah keluarga. Jika anda mendapati terdapat halangan komunikasi antara anda dan anak anda, jangan risau! Berikut adalah beberapa cara yang berkesan untuk menghapuskan halangan tersebut serta meningkatkan komunikasi efektif:&nbsp;<br>&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701331182.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ol><li><strong>Gemar mendengar</strong>: Amalkan pendengaran aktif apabila anak-anak anda sedang bercakap. Beri perhatian penuh kepada anak-anak dengan menunjukkan minat terhadap perkara yang mereka katakan, dan tanya soalan susulan untuk menunjukkan penglibatan anda.<br><br>&nbsp;</li><li><strong>Luahkan perasaan</strong>: Kongsi fikiran, perasaan dan pendapat anda secara terbuka kepada anak anda. Amalan ini akan menyebabkan anak anda selesa untuk meluahkan perasaan mereka juga. Komunikasi yang jelas dan mesra boleh membantu merapatkan jurang dan menggalakkan dialog terbuka.<br><br>&nbsp;</li><li><strong>Cari persamaan</strong>: Teroka minat atau topik untuk dikongsikan bersama dengan anak-anak. Ia boleh menjadi hobi, rancangan TV kegemaran atau isu sosial. Gunakan minat bersama ini sebagai titik permulaan untuk perbualan dan membina hubungan yang lebih kukuh.<br><br>&nbsp;</li><li><strong>Gunakan teknologi untuk berhubung</strong>: Jika komunikasi bersemuka terasa mencabar, pertimbangkan untuk menggunakan teknologi untuk merapatkan jurang. Gunakan aplikasi <i>Whatsapp</i> untuk mesej atau membuat panggilan video agar dapat berkomunikasi dengan kerap.<br><br>&nbsp;</li><li><strong>Cipta ruang selamat</strong>: Wujudkan persekitaran di mana komunikasi terbuka ​​dialu-alukan di rumah. Pastikan semua orang berasa selesa untuk meluahkan fikiran dan emosi mereka tanpa rasa takut akan penghakiman. Ruang yang selamat membolehkan perbualan yang sihat dan bermakna.&nbsp;</li></ol> </div>', '1701331275.jpg', 25, '2023-11-30 16:01:15', 1, 1, NULL, NULL, 'MindLoops', '2023-05-28 00:00:00'),
(54, 'Tips Penjagaan Songkok', '\r\n              \r\n            <img src=\"https://amirali.mindloops.org/assets/images/blogs/1701331616.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><br><br>Terdapat beberapa tips penjagaan songkok yang boleh diamalkan untuk memastikan songkok kekal cantik dan dapat digunakan dalam jangka masa yang lebih lama. Berikut ialah beberapa tips tersebut:&nbsp;</p><p>&nbsp;</p><ul><li>Elakkan daripada menjemur songkok terlalu lama di bawah sinaran cahaya matahari. Hal ini kerana, ia boleh menyebabkan warna songkok menjadi pudar dan merosakkan serat kainnya.<br><br>&nbsp;</li><li>Simpan songkok di tempat yang kering dan sejuk. Elakkan daripada meletakkan songkok di tempat yang lembap dan panas kerana ia boleh merosakkan kain songkok tersebut.&nbsp;<br><br>&nbsp;</li><li>Jangan biarkan songkok berdebu terlalu lama. Bersihkan songkok secara berkala dengan menggunakan berus lembut untuk mengelakkan debu bertompok dan merosakkan kainnya.&nbsp;<br><br>&nbsp;</li></ul> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701331863.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ul><li>Simpan songkok di dalam kotak yang sesuai. Hal ini demikian kerana, ia boleh membantu menjaga kebersihan songkok dan dapat mengekalkan bentuk asalnya.&nbsp;</li></ul><p>&nbsp;</p> </div>', '1701331902.jpg', 22, '2023-11-30 16:11:42', 1, 1, NULL, NULL, 'MindLoops', '2023-05-30 00:00:00'),
(55, 'Cara Mengatur Jadual Kerja Sekolah ', '\r\n              \r\n            <img src=\"https://amirali.mindloops.org/assets/images/blogs/1701334425.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Tahukah anda dengan adanya aturan jadual kerja sekolah, kita dapat membantu anak-anak mengelakkan stres dengan bebanan kerja sekolah yang melampau.&nbsp;</p><p>&nbsp;</p><p>Terdapat beberapa cara untuk membantu anak-anak mengatur jadual kerja sekolah mereka secara efektif.&nbsp;<br>&nbsp;</p><ul><li><strong>Bina Jadual atau Rutin Harian:</strong> Sediakan jadual harian yang teratur untuk kerja sekolah. Tentukan waktu yang diperuntukkan untuk setiap subjek atau tugasan. Tulis jadual tersebut dan ikutinya dengan disiplin.&nbsp;<br><br>&nbsp;</li><li><strong>Beri Contoh dan Tunjukkan Pentingnya Pengaturan Waktu:</strong> Berikan contoh kepada anak anda tentang pentingnya mengatur waktu dengan baik. Tunjukkan bagaimana pengurusan waktu yang baik dapat membantu dalam menyelesaikan tugas-tugas sekolah secara efisien.<br><br>&nbsp;</li><li><strong>Ajar Keutamaan:</strong> Tekankan kepentingan mengatur waktu dengan baik dalam menjalani kehidupan sebagai seorang murid. Jelaskan bagaimana mengatur waktu dengan bijak akan membantu mencapai prestasi yang baik dan mengurangi tekanan.<br><br>&nbsp;</li><li><strong>Pecahkan Tugasan yang Kompleks:</strong> Jika anak anda memiliki tugas yang kompleks atau besar, ajarkan mereka untuk memecahkannya menjadi tugas-tugas yang lebih kecil dan dapat dikerjakan secara bertahap. Bantu mereka membuat jadual khusus untuk menyelesaikan bahagian tugas tersebut.&nbsp;<br><br>&nbsp;</li><li><strong>Galakkan Rehat yang Mencukupi:</strong> Selain mengatur waktu untuk belajar, penting juga untuk mengatur waktu istirahat yang mencukupi. Ajar anak anda untuk mengambil istirahat yang singkat di antara sesi belajar agar otak mereka dapat beristirahat dan memulihkan tenaga.<br><br>&nbsp;</li><li><strong>Tetapkan Prioriti:</strong> Bantu anak anda mengenal pasti tugas-tugas yang paling penting atau mendesak. Ajar mereka untuk menyelesaikan tugas-tugas tersebut terlebih dahulu sebelum beralih ke tugas-tugas lain yang kurang penting.<br><br>&nbsp;</li><li><strong>Hindari Penangguhan:</strong> Ajar anak anda untuk menghindari kebiasaan menunda-nunda pekerjaan. Jelaskan bahwa menyelesaikan tugas tepat waktu akan mengurangi stres dan memberikan rasa kepuasan.&nbsp;<br><br>&nbsp;</li><li><strong>Penilaian dan Pelarasan:</strong> Jalankan penilaian secara berkala terhadap jadual kerja sekolah anak anda. Jika terdapat perubahan atau pelarasan yang perlu dibuat, bantu mereka membuat perubahan yang diperlukan.&nbsp;</li></ul> </div>', '1701334637.jpg', 24, '2023-11-30 16:57:17', 1, 1, NULL, NULL, 'MindLoops', '2023-03-09 00:00:00'),
(56, 'Tips Menanam Pokok', '\r\n            \r\n              \r\n            <h4 class=\"py-2 display-7 fw-bolder temp\">Info Menarik </h4><div class=\"community-text py-1 article-title temp\"><p>Tahukah anda, pokok menyerap karbon dioksida dan menghasilkan oksigen melalui proses fotosintesis? Satu pokok yang matang mampu menghasilkan oksigen yang secukupnya untuk dua orang manusia bernafas.&nbsp;</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Tips Menanam Pokok </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701652102.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ul><li><strong>Memilih tempat yang sesuai</strong><br>Pilih tempat penanaman yang mempunyai pendedahan terhadap cahaya matahari dengan baik. Pokok memerlukan cahaya matahari untuk terus hidup dan membesar.&nbsp;<br>&nbsp;<br>&nbsp;</li></ul> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701652892.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ul><li><strong>Pilih pokok yang sesuai</strong><br>Pilih pokok yang sesuai ditanam mengikut iklim di Malaysia. Hal ini demikian, kerana setiap pokok mempunyai tahap pendedahan cahaya matahari yang sesuai serta keadaan tanah yang berbeza-beza.<br>&nbsp;<br>&nbsp;</li></ul> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701652931.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ul><li><strong>Sediakan tanah&nbsp;</strong>&nbsp;<br>Sebelum memulakan penanaman, pastikan anda telah menggali lubang terlebih dahulu dan pastikan lubang berkenaan bersaiz dua kali ganda lebih besar dari saiz bola akar pokok. Campurkan dengan beberapa kompos atau bahan organik yang sesuai untuk memastikan pokok mendapat nutrien yang cukup.<br>&nbsp;<br>&nbsp;</li></ul> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701652964.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ul><li><strong>Mulakan penanaman&nbsp;</strong><br>Tanam pokok tersebut dengan berhati-hati dan pastikan air disiram selepas proses penanaman selesai.&nbsp;<br>&nbsp;<br>&nbsp;</li></ul> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701653008.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ul><li><strong>Menjaga tanaman berkenaan</strong><br>Pokok yang ditanam mestilah dijaga dengan baik. Pastikan ianya disiram setiap hari dan cantas jika perlu.<br>&nbsp;<br>&nbsp;</li></ul> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701653105.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ul><li><strong>Promosikan tanaman anda&nbsp;</strong><br>Dalam usaha untuk menggalakkan dan mempromosikan gaya hidup <i>go green</i>, anda boleh berkongsikan pengalaman anda dalam menanam pokok. Ini dapat memberi kesedaran kepada orang ramai tentang kepentingan menanam pokok.<br>&nbsp;</li></ul> </div>            ', '1701653147.jpg', 22, '2023-12-04 09:25:47', 1, 1, '2023-12-04 10:51:46', 1, 'MindLoops', '2023-03-12 00:00:00'),
(57, 'Cara Bijak Menjimatkan Tenaga Elektrik di Rumah ', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Amalan menjimatkan tenaga elektrik dapat menyumbang kepada pengurangan karbon dioksida dan perubahan kepada iklim. Jadi mari kita amalkan tips untuk menjimatkan tenaga elektrik di rumah.<br><br>&nbsp;</p><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701655016.jpg\" alt=\"blog image\" width=\"100%\"></p><p><br>Keringkan pakaian dengan cahaya matahari. Ini akan membuatkan pakaian anda tahan lebih lama dan bau juga lebih segar.&nbsp;&nbsp;</p><p>&nbsp;</p><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701656121.jpg\" alt=\"blog image\" width=\"100%\"></p><p><br>Tutup suis komputer anda jika tidak digunakan. Selain manusia, komputer juga perlu mempunyai waktu untuk berehat.&nbsp;</p><p>&nbsp;</p><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701656152.jpg\" alt=\"blog image\" width=\"100%\"></p><p><br>Tutup lampu di siang hari. Gunakan cahaya semula jadi. Ini kerana pencahayaan semula jadi baik untuk kesihatan mata anda.&nbsp;</p><p>&nbsp;</p><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701656350.jpg\" alt=\"blog image\" width=\"100%\"></p><p><br>Luangkan lebih masa bersama keluarga. Lupakan seketika kesemua gajet yang anda perolehi.&nbsp;</p><p>&nbsp;</p><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701656439.webp\" alt=\"blog image\" width=\"100%\"></p><p><br>Kumpulkan dan gosok baju dengan kuantiti yang banyak setiap minggu.&nbsp;</p><p>&nbsp;</p><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701656949.jpg\" alt=\"blog image\" width=\"100%\"></p><p><br>Pastikan cucian penuh. Kumpulkan baju untuk penggunaan mesin basuh yang optimum.&nbsp;</p><p>&nbsp;</p><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701657684.jpg\" alt=\"blog image\" width=\"100%\"></p><p><br>Jimatkan tenaga, pastikan barangan di dalam peti sejuk anda tersusun kemas dan kurangkan kekerapan membuka peti sejuk.&nbsp;&nbsp;</p><p>&nbsp;</p><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701657861.jpg\" alt=\"blog image\" width=\"100%\"></p><p><br>Gunakan lampu LED untuk penjimatan dan kelestarian bersama.&nbsp;<br>&nbsp;</p><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701658030.jpg\" alt=\"blog image\" width=\"100%\"></p><p><br>Pastikan semua pintu dan tingkap tertutup rapi ketika menggunakan penghawa dingin.&nbsp;<br>&nbsp;</p> </div>', '1701658291.jpg', 23, '2023-12-04 10:51:31', 1, 1, NULL, NULL, 'MindLoops', '2023-03-19 00:00:00'),
(58, 'Bagaimana Menjadi Pendengar yang Aktif?', '\r\n              \r\n            <h4 class=\"py-2 display-7 fw-bolder temp\">Tip Menjadi Pendengar yang Aktif </h4><div class=\"community-text py-1 article-title temp\"><p>Komunikasi yang berkesan dalam kalangan keluarga adalah penting untuk membina hubungan yang kukuh. Satu aspek penting dalam komunikasi ialah menjadi pendengar yang aktif. &nbsp;Ibu bapa perlu menjadi seorang pendengar yang aktif dalam membentuk peribadi positif dalam diri anak-anak mereka. Jadi, jom kita pelajari tip untuk menjadi pendengar yang aktif!&nbsp;<br>&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701658959.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><ol><li><strong>Berikan perhatian yang penuh.</strong><br>Apabila kita bercakap atau berkomunikasi dengan ahli keluarga terutama anak-anak, kita hendaklah memberikan perhatian yang penuh tentang apa yang mereka perkatakan. Selain itu, kita juga mestilah menunjukkan sikap ambil berat terhadap mereka. Komunikasi yang berkesan adalah apabila seseorang itu menunjukkan sikap empati dan sentiasa memberi sokongan.<br><br>&nbsp;</li><li><strong>Elakkan daripada mengganggu.</strong><br>Sekiranya seseorang sedang bercakap dengan kita, elakkan untuk mengganggu percakapan tersebut. Anda perlu tunggu sehingga apa yang ingin diperkatakan selesai. Untuk menjadi pendengar yang baik, anda perlu mendengar rintihan dan luahan perasaan mereka. Kemudian, berikan nasihat dan pendapat yang terbaik buat mereka.&nbsp;<br><br>&nbsp;</li><li><strong>Amalkan komunikasi bukan lisan.</strong><br>Komunikasi bukan lisan membantu anda untuk menjadi seorang pendengar yang baik. Contohnya, melontarkan senyuman, mengangguk kepala sambil mendengar luahan mereka dan menunjukkan mimik muka yang positif. Ini dapat membantu anda untuk menjadi seorang pendengar yang aktif kerana orang lain akan berasa sangat selesa dan senang untuk bercakap dengan kita.<br><br>&nbsp;</li><li><strong>Melatih sikap empati</strong><br>Empati memainkan peranan penting supaya kita dapat mendengar secara aktif. Cuba fahami perspektif, emosi dan kebimbangan mereka. Letakkan diri anda pada kedudukan mereka dan fahami perasaan mereka. Balas dengan empati dan sokongan dapat mewujudkan ruang yang selamat untuk mereka meluahkan perasaan mereka.&nbsp;</li></ol> </div>', '1701659194.jpg', 25, '2023-12-04 11:06:34', 1, 1, NULL, NULL, 'MindLoops', '2023-02-08 00:00:00'),
(59, 'Petua Kawal Kemarahan', '\r\n            \r\n            \r\n            \r\n            \r\n            \r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Petua mengawal kemarahan bertujuan untuk mengurangkan perasaan emosi anda dan rangsangan fisiologi yang disebabkan oleh kemarahan. Anda tidak boleh mengelak daripada individu atau perkara yang membuatkan anda marah, walau bagaimanapun anda boleh pelajari cara-cara mengatasi dan meredakan kemarahan tersebut.&nbsp;</p> </div><div class=\"community-text py-1 article-title temp\"><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701664105.jpg\" alt=\"blog image\" width=\"100%\"></p><p>&nbsp;</p><p><strong>Sibukkan diri dengan perkara yang menyeronokkan</strong>.&nbsp;&nbsp;</p><p>Lakukan sesuatu aktiviti yang dapat membantu anda untuk melupakan segala masalah yang menyebabkan anda marah seperti menonton televisyen.&nbsp;</p><p><br>&nbsp;</p><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701664135.jpg\" alt=\"blog image\" width=\"100%\"></p><p>&nbsp;</p><p><strong>Tenangkan fikiran.&nbsp;</strong></p><p>Tenangkan fikiran anda sekiranya anda marah dan lakukan latihan pernafasan yang dalam.&nbsp;</p><p><br>&nbsp;</p><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701664147.jpg\" alt=\"blog image\" width=\"100%\"></p><p>&nbsp;</p><p><strong>Mendengar Muzik.&nbsp;</strong></p><p>Kajian menunjukkan bahawa mendengar muzik bukan sahaja dapat mengurangkan dan meredakan kemarahan, malah muzik juga mampu membantu mengurangkan stres dan tekanan.&nbsp;</p><p><br>&nbsp;</p><p><img src=\"https://amirali.mindloops.org/assets/images/blogs/1701664164.jpg\" alt=\"blog image\" width=\"100%\"></p><p><br><strong>Berkomunikasi.&nbsp;</strong></p><p>Jika anda berasa marah, lakukan sesuatu yang dapat meredakan kemarahan anda seperti berkomunikasi dengan rakan dan ahli keluarga. Anda juga boleh meluahkan segala masalah yang terpendam kepada mereka.&nbsp;<br>&nbsp;</p> </div>                                                            ', '1701664336.jpg', 23, '2023-12-04 12:32:16', 1, 1, '2023-12-12 11:42:34', 1, 'MindLoops', '2023-02-02 00:00:00'),
(60, '5 langkah mengambil nota ', '\r\n            \r\n              \r\n                        <div class=\"community-text py-1 article-title temp\"><p>Mencatat nota ialah salah satu cara pembelajaran yang paling berkesan untuk kegunaan anda. Mari kita terokai bersama langkah-langkah mengambil nota.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">1. Mencatat nota </h4><div class=\"community-text py-1 article-title temp\"><p>Ketika anda berada dalam sesi pembelajaran atau membaca bahan rujukan, ambil nota dengan aktif. Tuliskan point penting, idea utama dan contoh-contoh yang berkaitan. Pastikan nota anda mudah difahami dan tersusun dengan baik.&nbsp;</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">2. Meringkaskan </h4><div class=\"community-text py-1 article-title temp\"><p>Selepas sesi pembelajaran, ambil masa untuk meringkaskan nota anda. Ringkaskan point penting menjadi ayat-ayat ringkas. Ini membantu anda memahami dan mengingat maklumat dengan baik.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">3. Membaca tanpa melihat nota </h4><div class=\"community-text py-1 article-title temp\"><p>Setelah anda membuat ringkasan, cuba membaca semula bahan sambil tidak melihat nota anda. Ini akan menguji kefahaman anda dan membantu anda mengingati maklumat dengan lebih baik. Jika terdapat sebarang bahagian yang tidak difahami, rujuk nota anda semula untuk mendapatkan penjelasan.&nbsp;</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">4. Merenung pembelajaran yang telah diperlajari </h4><div class=\"community-text py-1 article-title temp\"><p>Setelah sesi pembelajaran selesai, ambil masa untuk merenungkan apa yang telah anda pelajari. Fikirkan bagaimana pengetahuan baru tersebut berkaitan dengan pengetahuan yang sedia ada dan aplikasinya dalam kehidupan seharian. Ini dapat membantu memperkuatkan pemahaman dan menghubungkan konsep-konsep yang baru dipelajari dengan pengetahuan yang telah ada.&nbsp;</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">5. Membuat semakan nota </h4><div class=\"community-text py-1 article-title temp\"><p>Seterusnya, lakukan semakan berkala terhadap nota anda. Buat semakan pada waktu-waktu tertentu untuk memastikan nota anda masih relevan dan mudah difahami. Jika perlu, buat penambahbaikan atau penyesuaian kepada nota anda. Ini membantu memastikan bahawa nota anda sentiasa terkini dan berguna untuk pengulangan atau rujukan di masa hadapan.&nbsp;</p> </div>', '1702513819.jpg', 30, '2023-12-14 08:22:06', 1, 1, '2023-12-14 08:30:19', 1, 'Mindloops', '2023-07-07 00:00:00');
INSERT INTO `blogs` (`blog_id`, `title`, `content`, `thumbnail`, `category_id`, `created_at`, `status`, `created_by`, `updated_date`, `updated_by`, `published_by`, `published_date`) VALUES
(61, 'Lilin Emergency! ', '\r\n              \r\n            <img src=\"https://amirali.mindloops.org/assets/images/blogs/1702514072.jpeg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Pernahkah bekalan elektrik terputus di rumah anda? Jika tiada lilin atau lampu suluh, bagaimanakah anda mendapatkan sumber cahaya? Jom kita pelajari cara membuat lilin <i>emergency</i>! Syaratnya, anda perlu mempunyai beras, minyak masak, tisu atau seumpamanya, pemetik api dan bekas kecil.&nbsp;</p> </div><div class=\"community-text py-1 article-title temp\"><ol><li>Pertama sekali, masukkan segenggam beras dan secawan minyak masak ke dalam bekas atau mangkuk kecil.&nbsp;</li><li>Gulung tisu dan letakkan di tengah-tengah mangkuk yang berisi beras dan minyak tadi untuk dijadikan sebagai sumbu.&nbsp;</li><li>Selepas itu, cucuhkan api pada tisu tersebut.&nbsp;</li><li>Lilin <i>emergency</i> anda telah pun siap! Api tersebut mampu bertahan lama dari malam hingga ke pagi.&nbsp;</li></ol> </div><div class=\"community-text py-1 article-title temp\"><p>Peraturan keselamatan: Pastikan anda meletakkan lilin <i>emergency</i> ini di tempat yang selamat. Jauhkan ia daripada langsir dan benda yang mudah terbakar.&nbsp;</p> </div>', '1702514204.webp', 20, '2023-12-14 08:36:44', 1, 1, NULL, NULL, 'Mindloops', '2023-07-07 00:00:00'),
(62, 'Kemahiran Komunikasi', '\r\n              \r\n            <img src=\"https://amirali.mindloops.org/assets/images/blogs/1702514480.jpeg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Mampu berkomunikasi dengan berkesan adalah salah satu kemahiran hidup yang paling penting untuk dipelajari. Komunikasi itu sendiri ditakrifkan sebagai memindahkan maklumat untuk menghasilkan pemahaman yang lebih mendalam. Mempunyai kemahiran berkomunikasi yang baik membantu kita dalam semua aspek kehidupan daripada kehidupan profesional kepada kehidupan peribadi. Kemahiran komunikasi yang baik adalah penting untuk membolehkan orang lain dan diri anda memahami maklumat dengan lebih tepat dan cepat. Sebaliknya, kemahiran komunikasi yang lemah membawa kepada salah faham dan kekecewaan yang kerap.&nbsp;</p> </div><div class=\"community-text py-1 article-title temp\"><h4><strong>Teknik Penting Dalam Berkomunikasi&nbsp;</strong></h4> </div><div class=\"community-text py-1 article-title temp\"><ol><li><strong>Bahasa badan (</strong><i><strong>Body Language</strong></i><strong>)</strong><ol><li>&nbsp;Berkomunikasi bukan sahaja daripada perkataan yang keluar daripada mulut atau tulisan yang ditulis, malah bahasa badan juga merupakan salah satu teknik yang penting dalam berkomunikasi. Gunakan bahasa badan dengan baik dan sentiasa memandang ke arah mata orang yang anda sedang bercakap.&nbsp;</li></ol></li><li><strong>Mendengar</strong>&nbsp;<ol><li>Bagi mengelakkan diri anda dari dilihat gagal dalam berkomunikasi dengan baik, anda perlu menjadi pendengar yang baik. Mendengar dengan teliti setiap perkataan yang keluar dari mulut seseorang yang anda sedang berkomunikasi sangat penting dalam kehidupan. Anda perlulah mendengar serta memahami setiap apa yang cuba mereka sampaikan.&nbsp;</li></ol></li><li><strong>Berfikir sebelum mula berkomunikasi&nbsp;</strong><ol><li>Sebelum anda melontarkan sebarang pandangan ataupun mula untuk berbicara, anda perlu berfikir kerana dikhuatiri perkataan atau pandangan yang ingin dilontarkan akan merosakkan perbualan antara kedua-dua belah pihak.&nbsp;</li></ol></li></ol> </div>', '1702514657.webp', 20, '2023-12-14 08:44:17', 1, 1, NULL, NULL, 'Mindloops', '2023-07-07 00:00:00'),
(63, 'Cara Bersikap Empati ', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Empati bermaksud sikap meletakkan perasaan kita pada orang lain atau mencuba untuk meletakkan diri di tempat mereka.</p> </div><div class=\"community-text py-1 article-title temp\"><ol><li>Dengar secara aktif&nbsp;<ul><li>Berlatih mendengar secara aktif dengan memberikan perhatian yang penuh kepada seseorang apabila mereka bercakap. Tunjukkan minat yang mendalam terhadap apa yang mereka katakan. Ini menunjukkan bahawa anda menghargai fikiran dan perasaan mereka.&nbsp;</li></ul></li><li>Letakkan diri anda di tempat mereka.<ul><li>Cuba fahami emosi, cabaran dan pendapat mereka. Apakah perasaan anda jika anda berada di kedudukan mereka? Latihan ini membantu anda meningkatkan empati dan belas kasihan dalam diri anda.&nbsp;</li></ul></li><li>Tunjukkan sokongan dan kebaikan anda kepada mereka&nbsp;<ul><li>Tawarkan bantuan atau kata-kata semangat yang baik kepada seseorang yang memerlukan. Perbuatan kebaikan yang kecil boleh membawa kepada perubahan yang besar.&nbsp;&nbsp;</li></ul></li><li>Latih diri anda untuk tidak mudah membuat andaian.<ul><li>Jangan membuat andaian dengan cepat tentang orang lain. Elakkan menghukum seseorang tanpa berfikir panjang.&nbsp;</li></ul></li><li>Tunjukkan empati anda kepada mereka&nbsp;<ul><li>Jelaskan kepada orang lain bahawa anda memahami dan mengambil berat tentang perasaan mereka. Tunjukkan empati melalui kata-kata dan tindakan anda.&nbsp;</li></ul></li></ol><p>&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702522505.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">', '1702522538.jpg', 21, '2023-12-14 10:55:38', 1, 1, NULL, NULL, 'Mindloops', '2023-12-14 00:00:00'),
(64, 'Kemahiran Mengurus Masa', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Pengurusan masa amat penting bagi memastikan diri kita sentiasa berada di landasan yang tepat dan betul. Saintis terkenal dunia iaitu Benjamin Franklin mengeluarkan satu kenyataan iaitu masa yang telah lepas tidak dapat dikembalikan semula. Pengurusan masa yang baik juga membantu seseorang itu untuk mencapai kejayaan. Jom ikuti teknik pengurusan masa yang baik!&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702523051.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><strong>1. Kenali diri dan gaya hidup anda&nbsp;</strong></p><p>Anda perlu kenal diri anda sendiri kerana hanya anda yang tahu bilakah masa dan waktu yang paling produktif bagi anda. Setelah itu, buat dan susun jadual tugasan mengikut hari-hari produktif anda.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702523099.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><strong>2. Ketahui Cara Mengurus Tekanan Hidup</strong>&nbsp;</p><p>Tekanan atau stres yang dihadapi boleh memberi kesan yang buruk terhadap pengurusan masa seseorang. Jika anda tidak melakukan sebarang tindakan yang sewajarnya, anda berkemungkinan akan kehilangan banyak masa yang sepatutnya boleh dimanfaatkan.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702523187.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><strong>3. Utamakan yang Utama</strong>&nbsp;</p><p>Anda perlu mengenal pasti tugasan yang paling penting dan utama. Utamakan segala tugasan yang perlu anda selesaikan dengan kadar segera.&nbsp;&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702523245.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><strong>4. Mula Dengan Awal</strong>&nbsp;</p><p>Masa ibarat emas yang sangat bernilai harganya. Oleh itu, lakukan segala tugasan yang perlu diselesaikan dengan awal. Elakkan daripada menangguh sebarang tugasan yang perlu anda siapkan.&nbsp;</p> </div>', '1702523289.jpg', 20, '2023-12-14 11:08:09', 1, 1, NULL, NULL, 'Mindloops', '2023-02-02 00:00:00'),
(65, 'Panduan Membina Jadual Waktu Kendiri Menarik Menggunakan Canva ', '\r\n              \r\n            <img src=\"https://amirali.mindloops.org/assets/images/blogs/1702523385.webp\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Panduan Membina Jadual Waktu Kendiri Menarik Menggunakan Canva </h4><div class=\"community-text py-1 article-title temp\"><p><strong>1. Log Masuk </strong><i><strong>Canva</strong></i><strong>&nbsp;</strong></p><ul><li>Buka laman sesawang <i>Canva</i> (<a href=\"http://www.canva.com/\">www.canva.com</a> ) dan log masuk secara percuma. Jangan risau, ia selamat dan mesra kanak-kanak! Anda disarankan untuk menggunakan komputer meja atau komputer riba.&nbsp;</li></ul><p>&nbsp;</p> </div><div class=\"community-text py-1 article-title temp\"><p><strong>2. Pilih Templat Kegemaran dan Ubah Suai Mengikut Kreativiti&nbsp;</strong></p><ul><li>Sebaik sahaja anda log masuk, <i>Canva</i> akan memaparkan pelbagai jenis templat untuk dipilih. Pilih templat \"Jadual Waktu\" dalam kategori \"Pendidikan\".&nbsp;</li><li>Ubah suai templat mengikut kreativiti anda sehingga ia kelihatan menarik.&nbsp;</li></ul><p>&nbsp;</p> </div><div class=\"community-text py-1 article-title temp\"><p><strong>3. Pastikan Mata Pelajaran Seimbang&nbsp;</strong></p><ul><li>Pastikan anda membuat jadual kendiri dengan mengisi slot atau masa untuk anda mengulang kaji pelajaran. Suaikan mata pelajaran yang hendak anda ulang kaji secara seimbang.&nbsp;</li></ul> </div><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p><strong>4. Tambah Slot Rehat &amp; Ganjaran&nbsp;&nbsp;</strong></p><ul><li>Pastikan slot rehat dalam jadual kendiri anda mencukupi dan bersesuaian.&nbsp;</li><li>Tambah elemen ganjaran kendiri seperti beriadah, bersukan, meluangkan masa bersama keluarga dan sebagainya.&nbsp;</li></ul><p>&nbsp;</p> </div><div class=\"community-text py-1 article-title temp\"><p><strong>5. Simpan dan Muat turun&nbsp;</strong></p><ul><li>Simpan jadual anda dengan mengklik butang <i>Save </i>dan jangan lupa untuk muat turun jadual anda!&nbsp;</li></ul> </div>', '1702523953.webp', 30, '2023-12-14 11:19:13', 1, 1, NULL, NULL, 'Mindloops', '2023-01-01 00:00:00'),
(66, 'Kitar Semula', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Tahukah anda, kangkung ialah tanaman yang mudah dijaga dan tidak memerlukan tanah untuk hidup. Mari kita ketahui cara untuk menanam kangkung dengan hanya menggunakan baldi dan bakul penapis di rumah.&nbsp;&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702524123.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><strong>Bahan-bahan:&nbsp;</strong></p><ul><li>Benih kangkung&nbsp;&nbsp;</li><li>Baldi&nbsp;</li><li>Bakul penapis&nbsp; &nbsp;</li></ul><p>&nbsp;</p><p>Tips: Jika lubang pada bakul penapis itu besar, letakkan kapas supaya benih tidak terjatuh melalui lubang tersebut.&nbsp;</p><p>&nbsp;</p><p><strong>Cara-caranya:&nbsp;</strong></p><ol><li>Rendam benih kangkung selama tiga hari menggunakan air paip sahaja.&nbsp;</li><li>Toskan benih kangkung yang telah siap direndam dan masukkan ke dalam bakul. Pastikan kuantiti benih kangkung tidak begitu padat.&nbsp;</li><li>Letakkan bakul penapis pada bahagian atas baldi.&nbsp;</li><li>Masukkan air paip ke dalam baldi sehingga mencecah dasar bakul penapis.&nbsp;</li><li>Tutup bakul penapis yang berisi benih kangkung dengan menggunakan kain bewarna gelap selama dua hingga tiga hari.&nbsp;</li><li>Selepas akar dan pucuk kangkung mula keluar, buka penutup dan dedahkan anak kangkung kepda cahaya matahari untuk tumbesaran.&nbsp;&nbsp;</li><li>Pantau paras air dan pastikan air bersentuhan dengan akar pokok.&nbsp;&nbsp;</li><li>Selepas 3-4 minggu, kangkung sudah sedia untuk dituai dan dimasak.&nbsp;</li></ol> </div>', '1702524234.jpg', 20, '2023-12-14 11:23:54', 1, 1, NULL, NULL, 'Mindloops', '2023-03-03 00:00:00'),
(67, 'Cara Atasi Kebimbangan Menghadapi Peperiksaan ', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Setiap orang mesti pernah merasakan gusar lebih-lebih lagi apabila musim peperiksaan semakin tiba. Di sini ada beberapa langkah yang boleh anda praktikkan jika anda mengalami kebimbangan untuk menghadapi peperiksaan.&nbsp;</p><p><strong>Bahan Rujukan&nbsp;</strong></p><ul><li>Susun dan atur bahan-bahan pembelajaran seperti buku, nota dan rujukan untuk memudahkan akses. Buat jadual pembelajaran yang tetap. Pastikan anda memahami dan menguasai topik yang akan diuji di dalam peperiksaan.&nbsp;</li></ul><p>&nbsp;</p><p><strong>Pengurusan Masa</strong>&nbsp;</p><ul><li>Urus masa anda dengan berkesan. Tetapkan jadual belajar berstruktur, peruntukkan masa untuk setiap mata pelajaran. Pastikan anda mengambil rehat yang mencukupi untuk mengekalkan keseimbangan fizikal dan mental.&nbsp;</li></ul><p>&nbsp;</p><p><strong>Pembelajaran Kondusif</strong>&nbsp;</p><ul><li>Cari tempat yang tenang dan bebas gangguan untuk belajar. Pastikan bilik belajar anda mempunyai pencahayaan yang mencukupi, meja yang selesa, dan suasana yang kondusif. Elakkan gangguan seperti panggilan telefon atau media sosial yang boleh mengganggu tumpuan.&nbsp;</li></ul><p>&nbsp;</p><p><strong>Teknik Pernafasan dan Relaksasi</strong>&nbsp;</p><ul><li>Amalkan teknik pernafasan dalam dan perlahan untuk mengurangkan kebimbangan dan menenangkan fikiran anda. Latihan relaksasi seperti meditasi, yoga atau mendengar muzik santai juga boleh membantu melegakan tekanan.&nbsp;</li></ul><p>&nbsp;</p><p><strong>Percaya Diri</strong>&nbsp;</p><ul><li>Elakkan membandingkan diri anda dengan orang lain, kerana setiap individu mempunyai kekuatan dan kelemahan yang berbeza. Fokus pada peningkatan diri dan cuba lakukan yang terbaik tanpa membandingkan dengan pencapaian orang lain. Gunakan peperiksaan sebagai peluang untuk memperbaiki diri dan mengukur kemajuan peribadi.&nbsp;</li></ul><p>&nbsp;</p><p>Semoga bermanfaat dan selamat menghadapi peperiksaan!&nbsp;</p> </div>', '1702524432.webp', 30, '2023-12-14 11:27:12', 1, 1, NULL, NULL, 'Mindloops', '2023-03-03 00:00:00'),
(68, 'Kemahiran Memaku Kayu', '\r\n            \r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Kemahiran memaku kayu ialah salah satu kemahiran yang penting terutama dalam pembuatan produk kayu yang kuat dan tahan lama. Dengan menggunakan teknik yang betul dan alatan yang sesuai, memaku kayu dapat menjadi satu tugas yang mudah dan menyeronokkan. Jom kita pelajari kemahiran dan teknik memaku kayu dengan betul!&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702524792.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Alatan yang diperlukan untuk memaku kayu: </h4><div class=\"community-text py-1 article-title temp\"><p><strong>1. Tukul Kuku Kambing&nbsp;</strong></p><ul><li>Terdapat 4 bahagian penting pada tukul kuku kambing iaitu bahagian kepala, muka, kuku dan hulu. Bahagian kuku digunakan untuk mencabut paku, manakala bahagian muka digunakan untuk mengetuk paku. Hulu adalah pemegang ketika proses mengetuk paku.&nbsp;</li></ul> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702524846.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><strong>2. Paku&nbsp;&nbsp;</strong></p><ul><li>Paku kayu terdapat beberapa variasi ukuran iaitu bermula 2 cm sehingga 12 cm. Pemilihan saiz dan ukuran yang bersesuaian bergantung kepada ketebalan kayu.&nbsp;</li></ul> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Langkah-langkah memaku kayu dengan betul: </h4><div class=\"community-text py-1 article-title temp\"><p>1. Pilih ukuran atau saiz paku kayu yang bersesuaian.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702524928.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>2. Letakkan kayu yang hendak dipaku pada permukaan yang rata.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702524958.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>3. Pegang paku dengan jari tangan yang tidak memegang penukul. Kemudian, pukul paku berkenaan secara perlahan-lahan dan berhati-hati.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702525031.webp\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>4. Pastikan paku tersebut telah terbenam sepenuhnya di dalam kayu. Sekiranya anda tersilap paku, cabut paku tersebut menggunakan bahagian kuku penukul.&nbsp;</p> </div>            ', '1702525055.jpg', 20, '2023-12-14 11:37:35', 1, 1, '2023-12-14 11:37:45', 1, 'Mindloops', '2023-04-04 00:00:00'),
(69, 'Cara Menjadi Jiran yang Baik ', '\r\n              \r\n            <h4 class=\"py-2 display-7 fw-bolder temp\">Tips Menjadi Jiran yang Baik </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702525193.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Menjadi jiran yang baik adalah penting untuk membina komuniti yang harmoni dan mesra. Mari kita pelajari beberapa cara mudah untuk meningkatkan hubungan kejiranan!&nbsp;</p><p><strong>Perkenalkan diri&nbsp;&nbsp;</strong></p><p>Perkenalkan diri anda kepada jiran-jiran anda. Senyuman mesra dan ucapan mesra boleh membantu dalam mewujudkan hubungan yang positif dari awal perkenalan.&nbsp;</p><p>&nbsp;</p><p><strong>Bertimbang rasa&nbsp;</strong></p><p>Hormati privasi dan utamakan keselesaan jiran-jiran anda seperti tidak membuat bising pada waktu malam dan mewujudkan persekitaran rumah yang kemas dan bersih.&nbsp;</p><p>&nbsp;</p><p><strong>Bantu-membantu&nbsp;</strong></p><p>Anda perlu sentiasa ringan tulang dan menawarkan sebarang pertolongan kepada jiran-jiran anda yang memerlukan bantuan. Sikap suka bantu-membantu dapat meningkatkan dan mengeratkan hubungan silaturrahim sesama jiran.&nbsp;</p><p>&nbsp;</p><p><strong>Sentiasa mendengar dan berkomunikasi&nbsp;</strong></p><p>Kunci utama dalam mengukuhkan hubungan kejiranan adalah komunikasi yang baik. Luangkan masa seketika dengan berbual dan mendengar sebarang rintihan atau kebimbangan mereka.&nbsp;</p><p>&nbsp;</p><p><strong>Peka terhadap keselamatan&nbsp;</strong></p><p>Anda perlu sentiasa peka dengan keselamatan jiran-jiran anda. Sekiranya anda terlihat seseorang yang mencurigakan memasuki rumah jiran, laporkan kepada pihak berkuasa. Selain itu, anda juga perlu sentiasa mengambil berat tentang kesihatan jiran-jiran anda.&nbsp;</p> </div>', '1702525250.jpg', 21, '2023-12-14 11:40:50', 1, 1, NULL, NULL, 'Mindloops', '2023-04-04 00:00:00'),
(70, 'Tips menjaga kebersihan di tapak perkhemahan ', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Perkhemahan merupakan salah satu aktiviti rekreasi luar. Aktiviti seperti ini antara yang menyeronokkan untuk dilakukan bersama ahli keluarga atau rakan-rakan. Anda bukan sahaja berpeluang untuk menikmati flora dan fauna, malah anda juga dapat menghirup udara segar sambil mendengar bunyi deruan air dan burung sebagai rawatan untuk menyegarkan fikiran. Dalam keseronokan melakukan aktiviti perkhemahan, diingatkan juga bahawa, kita perlu menjaga kebersihan tapak perkhemahan bagi mengelakkan daripada perkara yang tidak diingini.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702525648.avif\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>1. Sentiasa membuang sampah ke dalam tong sampah yang disediakan oleh pihak pengurusan kem atau bawa plastik sampah tambahan untuk memudahkan pengumpulan sampah di tapak perkhemahan anda.&nbsp;</p><p>&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702525722.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>2. Selepas makan atau memasak, pastikan anda mencuci peralatan makan dan memasak dengan sabun dan air yang bersih.&nbsp;</p><p>&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702525779.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>3. Jangan merokok di kawasan perkhemahan kerana ia boleh meninggalkan putung rokok dan meningkatkan risiko kebakaran.&nbsp;</p><p>&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702525977.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>4. Jangan buang sisa cecair seperti minyak atau sabun ke dalam sungai, tasik atau laut. Ini akan merosakkan alam sekitar dan membahayakan haiwan dan tumbuhan di sekitar tapak perkhemahan.&nbsp;&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702526145.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>5. Jangan buang sisa makanan di tapak perkhemahan kerana ia boleh menarik haiwan liar dan menyebabkan bau yang tidak menyenangkan.&nbsp;&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702526355.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>6. Elakkan diri daripada memetik bunga atau merosakkan tumbuhan di sekitar tapak perkhemahan.&nbsp;&nbsp;</p> </div>', '1702526389.jpg', 20, '2023-12-14 11:59:49', 1, 1, NULL, NULL, 'Mindloops', '2023-05-05 00:00:00'),
(71, 'Teknik belajar secara berkumpulan yang berkesan ', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Belajar bersama rakan boleh menjadikan pembelajaran lebih menyeronokkan dan produktif. Jom kita lihat beberapa petua untuk menjadikan sesi pembelajaran secara berkumpulan anda berkesan.&nbsp;&nbsp;</p><ol><li><strong>Tetapkan matlamat yang jelas</strong>: Sebelum mula sesi pembelajaran berkumpulan, bincangkan matlamat yang jelas untuk sesi tersebut dengan menentukan topik atau subjek yang ingin dipelajari dalam tempoh masa yang ditetapkan.&nbsp;</li><li><strong>Kekal teratur</strong>: Pastikan bahan pembelajaran anda teratur. Bawa buku teks, buku nota dan sebarang sumber lain yang anda perlukan. Ini akan membantu anda berada di landasan yang betul dan mengelakkan pembaziran masa ketika mencari bahan.&nbsp;</li><li><strong>Penyertaan aktif</strong>: Galakkan semua orang dalam kumpulan untuk mengambil bahagian secara aktif. Tanya soalan, terangkan konsep, dan libatkan diri dalam perbincangan. Perkongsian idea dan perspektif antara ahli kumpulan boleh meningkatkan pemahaman.&nbsp;</li><li><strong>Tetap fokus</strong>: Elakkan gangguan semasa sesi pembelajaran. Simpan telefon anda atau gunakannya hanya untuk tugasan yang berkaitan dengan kajian. Tetapkan ruang yang tenang di mana anda boleh menumpukan perhatian tanpa gangguan.&nbsp;</li></ol> </div>', '1702526535.jpg', 30, '2023-12-14 12:02:15', 1, 1, NULL, NULL, 'Mindloops', '2023-05-05 00:00:00'),
(72, 'Cara memelihara kucing di rumah', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Kucing adalah antara haiwan peliharaan yang boleh kita pelihara di rumah. Berikut adalah beberapa tips untuk menjaga haiwan peliharaan anda di rumah:&nbsp;</p><p>&nbsp;</p><p><strong>Makanan yang Seimbang</strong>&nbsp;</p><ul><li>Pilih makanan kucing yang sesuai dengan usia dan keperluan pemakanannya. Hindari daripada memberi makanan manusia yang berbahaya seperti coklat, bawang, dan makanan berlemak.&nbsp;</li></ul><p>&nbsp;</p><p><strong>Air Bersih</strong>&nbsp;</p><ul><li>Selalu sediakan air bersih untuk kucing anda. Pastikan bekas air sentiasa bersih dan segar. Tukar air setiap hari.&nbsp;</li></ul><p>&nbsp;</p><p><strong>Jaga Kebersihan Bulu</strong>&nbsp;</p><ul><li>Sisir bulu kucing secara berkala untuk mengeluarkan bulu yang gugur dan mengurangkan masalah berbulu. Untuk kucing berbulu, pertimbangkan untuk mencukur bulu di sekitar duburnya supaya mudah dibersihkan selepas membuang air.&nbsp;</li></ul><p>&nbsp;</p><p><strong>Rawatan Kesihatan Rutin</strong>&nbsp;</p><ul><li>Pastikan kucing anda mendapat rawatan kesihatan yang berkala seperti vaksinasi, pemeriksaan gigi, dan pencegahan penyakit seperti cacing dan kutu. Sekiranya ada masalah kesihatan, bawa kucing ke doctor haiwan secepat mungkin.&nbsp;</li></ul><p>&nbsp;</p><p><strong>Mainan dan Latihan</strong>&nbsp;</p><ul><li>Sediakan mainan dan latihan yang sesuai untuk menggalakkan aktiviti fizikal dan mental kucing. Mainan seperti bola, gelongsor, dan papan berlekuk boleh membantu menghiburkan kucing anda.&nbsp;</li></ul><p>&nbsp;</p><p>Semoga bermanfaat!&nbsp;</p> </div>', '1702526699.jpg', 20, '2023-12-14 12:04:59', 1, 1, NULL, NULL, 'Mindloops', '2023-06-06 00:00:00'),
(73, 'Ambil Tanggungjawab Terhadap Ahli Keluarga ', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Tanggungjawab ialah satu peranan yang harus dilakukan oleh setiap individu terhadap sesuatu perkara. Berikut ialah beberapa petua yang boleh membantu anda memenuhi tanggungjawab terhadap ahli keluarga anda:&nbsp;</p><ol><li><strong>Sopan santun dan saling menghormati</strong>: Layan ahli keluarga anda dengan baik seperti merendahkan nada suara dan menggunakan perkataan yang baik semasa bercakap. Amalan saling menghormati antara ahli keluarga mampu membina hubungan kekeluargaan yang kukuh dan mewujudkan keluarga yang harmoni.&nbsp;&nbsp;</li><li><strong>Saling bantu-membantu</strong>: Ringankan beban kerja ahli keluarga anda di rumah dengan membantu melakukan kerja-kerja rumah seperti membasuh pinggan mangkuk, melipat pakaian atau membuang sampah. Melakukan kerja rumah bersama ahli keluarga anda mampu mengeratkan hubungan silaturahim antara ahli keluarga.&nbsp;</li><li><strong>Boleh dipercayai</strong>: Jadilah seseorang yang boleh digantung harap oleh ahli keluarga anda. Tepati janji anda dan ikuti komitmen. Jika anda berkata anda akan melakukan sesuatu, pastikan anda menyelesaikannya. Sifat kebolehpercayaan ini akan memberi anda rasa hormat.&nbsp;</li><li><strong>Menghargai ahli keluarga</strong>: Hargai usaha, bantuan dan sumbangan ahli keluarga anda dengan ucapan \"terima kasih\" apabila seseorang melakukan sesuatu yang baik kepada anda. Penghargaan yang nampak kecil ini mampu memberikan perubahan yang besar dalam memupuk dinamik keluarga yang positif.&nbsp;</li><li><strong>Selesaikan konflik secara aman</strong>: Konflik ialah perkara biasa dalam institusi kekeluargaan. Apabila perselisihan timbul, berusahalah untuk menyelesaikannya dengan aman. Berlatih untuk mendengar secara aktif, berkompromi dan mencari penyelesaian yang sesuai untuk semua orang yang terlibat.&nbsp;&nbsp;</li></ol> </div>', '1702526797.jpg', 21, '2023-12-14 12:06:37', 1, 1, NULL, NULL, 'Mindloops', '2023-06-06 00:00:00'),
(74, 'Terapi Tingkah Laku Kognitif', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Terapi Tingkah Laku Kognitif (CBT) ialah satu bentuk terapi yang berkesan dan telah diiktiraf secara meluas. CBT memfokuskan hubungan antara pemikiran, perasaan dan tingkah laku. Ia membantu individu untuk mengenal pasti dan mengubah corak pemikiran negatif kepada pembangunan strategi daya tindak yang lebih sihat.&nbsp;</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Berikut ialah perkara utama mengenai CBT: </h4><h4 class=\"py-2 display-7 fw-bolder temp\">1.	Memahami pemikiran dan kepercayaan </h4><div class=\"community-text py-1 article-title temp\"><p>CBT menekankan pemahaman bahawa pemikiran dan kepercayaan kita mempengaruhi emosi dan tingkah laku kita. Ia membantu individu menyedari bahawa corak pemikiran negatif mereka boleh menyumbang kepada emosi yang menyedihkan dan tingkah laku yang tidak membantu.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">2.	Mencabar pemikiran negatif </h4><div class=\"community-text py-1 article-title temp\"><p>CBT melibatkan pemikiran negatif yang mencabar dan mempersoal serta menggantikannya dengan pemikiran yang lebih realistik dan seimbang. Proses ini membantu individu membangunkan pandangan yang lebih rasional dan membina terhadap pengalaman dan diri mereka sendiri.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">3.	Kemahiran Menyelesaikan Masalah </h4><div class=\"community-text py-1 article-title temp\"><p>CBT mengajar individu kemahiran menyelesaikan masalah dalam menangani cabaran khusus yang mereka hadapi. Ia menggalakkan mereka untuk mampu membahagikan masalah kepada langkah yang boleh diurus, menjana penyelesaian yang realistik dan menilai keberkesanannya.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">4.	Panduan Profesional </h4><div class=\"community-text py-1 article-title temp\"><p>CBT akan lebih berkesan apabila dikendalikan oleh profesional kesihatan mental yang terlatih dan berlesen, seperti ahli psikologi atau ahli terapi berlesen. Golongan profesional ini mempunyai kepakaran untuk membimbing individu melalui proses dan menyesuaikan rawatan dengan keperluan khusus mereka.</p> </div>', '1702528191.jpeg', 27, '2023-12-14 12:29:51', 1, 1, NULL, NULL, 'MindLoops', '2023-07-02 00:00:00'),
(75, 'Persediaan Pengembaraan Luar', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Aktiviti kokurikulum seperti mengembara pasti menjadi satu perkara yang menyeronokkan untuk guru dan murid, apatah lagi ia melibatkan aktiviti-aktiviti yang lasak seperti masuk ke hutan dan seumpamanya. Namun, sekiranya anda tidak mempunyai perancangan atau persediaan yang rapi sebelum mengembara, aktiviti bermakna tersebut mungkin akan berubah menjadi satu mimpi ngeri. Justeru, berikut merupakan antara langkah yang boleh diikuti oleh guru pembimbing, seperti kata pepatah, sediakan payung sebelum hujan. Tanpa persediaan yang cukup, kita mungkin akan mengalami kesukaran kelak.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">1.	Peta dan navigasi </h4><div class=\"community-text py-1 article-title temp\"><p>Pastikan anda memiliki peta lokasi yang akan anda jelajahi. Anda juga boleh menggunakan GPS atau aplikasi peta di telefon bimbit sebagai bantuan navigasi.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702528761.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">2.	Kelengkapan dan pakaian </h4><div class=\"community-text py-1 article-title temp\"><p><strong>Tenda:</strong> Pilih tenda yang sesuai dengan keperluan anda dan sesuai dengan iklim tempat yang akan anda kunjungi.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702528857.jpeg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><strong>Beg tidur:</strong> Pilih beg tidur (<i>sleeping bag</i>) yang sesuai dengan suhu di kawasan tersebut.</p> </div><div class=\"community-text py-1 article-title temp\"><p><strong>Peralatan Memasak</strong>: Bawa peralatan memasak ringan seperti kompor mudah alih, panci dan alat makan.</p> </div><div class=\"community-text py-1 article-title temp\"><p><strong>Pakaian:</strong> Sesuaikan pakaian dengan kondisi cuaca. Bawa pakaian hangat jika cuaca dingin dan pakaian ringan serta alat pelindung sinar matahari jika cuaca panas.</p> </div><div class=\"community-text py-1 article-title temp\"><p><strong>Kasut dan Kelengkapan Kalis Air:</strong> Pastikan anda memakai kasut yang selesa untuk berjalan di lokasi yang berbeza-beza. Begitu juga dengan kelengkapan kalis air yang lain seperti baju hujan dan penutup kasut.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">3.	Makanan dan minuman </h4><div class=\"community-text py-1 article-title temp\"><p><strong>Makanan: </strong>Bawa makanan ringan dan makanan yang mudah dimasak seperti bar tenaga, kekacang dan makanan segera.</p> </div><div class=\"community-text py-1 article-title temp\"><p><strong>Air:</strong> Pastikan anda memiliki bekalan air minuman yang mencukupi. Sekiranya terdapat sumber air di sekitar lokasi yang anda menetap, anda juga boleh membawa sistem tapisan air.&nbsp;</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">4.	Peralatan keselamatan </h4><div class=\"community-text py-1 article-title temp\"><p>Bawa kit pertolongan cemas untuk digunakan sekiranya berlaku kecederaan yang kecil.&nbsp;</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702528983.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">5.	Kelengkapan tambahan </h4><div class=\"community-text py-1 article-title temp\"><p><strong>Pisau lipat</strong>: Berguna untuk pelbagai keperluan apabila berada dalam situasi yang tidak dijangka.</p> </div><div class=\"community-text py-1 article-title temp\"><p><strong>Lampu suluh kepala</strong>: Penting untuk memberikan pencahayaan ketika melakukan kegiatan di malam hari.</p> </div><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702529102.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p><i><strong>Powerbank</strong></i><strong>:</strong> Pastikan anda mempunyai <i>powerbank</i> untuk mengecas bateri GPS atau telefon bimbit.</p> </div>', '1702529196.png', 28, '2023-12-14 12:46:36', 1, 1, NULL, NULL, 'MindLoops', '2023-06-01 00:00:00'),
(76, 'Tips Meningkatkan Penglibatan Murid Dalam Kelas', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Pengurusan bilik darjah adalah penting bagi mewujudkan persekitaran pembelajaran yang berkesan serta dapat menarik minat murid. Jom kita pelajari teknik berkesan untuk meningkatkan penglibatan murid dalam kelas.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">1.	Melaksanakan aktiviti Hands-on </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702535215.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>Aktiviti ini sangat membantu dalam meningkatkan penglibatan murid. Hal ini demikian kerana, murid mudah bosan dengan pembelajaran teori di dalam kelas apatah lagi jika pendekatan pengajaran guru ialah kaedah tradisional. Aktiviti-aktiviti <i>hands-on</i> ini ialah seperti eksperimen sains, projek dan sebagainya. Ia merupakan pembelajaran melalui pengalaman langsung dan dapat meningkatkan kefahaman serta minat murid.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">2. Menggabungkan penggunaan teknologi dalam pengajaran </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702535280.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Kaedah atau pendekatan pengajaran tradisional dilihat kurang berkesan terhadap para murid kerana ia sangat membosankan. Sekiranya pendekatan atau strategi pengajaran itu tidak menarik, maka penglibatan murid tidak dapat ditingkatkan. Oleh itu, penggunaan teknologi yang sesuai sangat membantu untuk meningkatkan penglibatan murid di dalam kelas. Antara teknologi yang boleh digunakan oleh guru ialah perisian pembelajaran interaktif, permainan digital berasaskan subtopik, video, animasi dan sebagainya.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">3.	Gunakan pendekatan pembelajaran secara berkumpulan </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702535310.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Pembelajaran secara berkumpulan atau <i>cooperative learning</i> ialah suatu kaedah pengajaran yang melibatkan murid untuk bekerjasama dalam kumpulan-kumpulan kecil bagi mencapai matlamat yang sama. Pembelajaran secara berkumpulan dapat membantu meningkatkan keterlibatan murid dalam kelas kerana mereka dapat belajar daripada rakan sebaya dan mempunyai kesempatan untuk berinteraksi dan berkongsi idea dengan yang lain.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">4.	Gunakan strategi pengajaran yang pelbagai </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702535331.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Setiap murid mempunyai gaya pembelajaran yang berbeza-beza. Oleh itu, strategi yang pelbagai perlu digunakan oleh guru bergantung kepada situasi, tahap dan kemampuan murid. Apabila murid didedahkan kepada kaedah pengajaran yang berbeza, mereka lebih cenderung untuk terus terlibat dan bermotivasi sepanjang pembelajaran berlangsung.&nbsp;</p> </div>', '1702535354.jpg', 26, '2023-12-14 14:29:14', 1, 1, NULL, NULL, 'MindLoops', '2023-05-01 00:00:00'),
(77, 'Cara Dekati Mangsa Buli', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Acap kali kita terdengar kes-kes buli berlaku terutamanya di sekolah. Sebagai seorang guru, kita perlu memberikan sokongan dan perlindungan kepada pelajar yang menjadi mangsa buli sama ada di sekolah mahupun di luar sekolah. Golongan ini sering berasa tersisih lebih-lebih lagi apabila masalah mereka tidak didengari. Terkadang perkara sebeginilah menjadi punca berlakunya kes-kes berat seperti bunuh diri.</p> </div><div class=\"community-text py-1 article-title temp\"><p>Terdapat beberapa cara yang boleh digunakan oleh para guru dalam menghadapi situasi buli tersebut:</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Dengar dengan empati: </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702536099.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Mulakan dengan mendengar secara aktif dan tunjukkan rasa empati kepada mangsa buli. Beri mereka peluang untuk bercakap tentang pengalaman mereka dan meluahkan perasaan mereka. Jangan salahkan mereka atau ambil mudah masalah mereka.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Jangan salahkan mangsa </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702536113.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Pastikan anda tidak menyalahkan mangsa dalam situasi ini. Fokus dalam memberi sokongan dan memahami mereka. Yakinkan mereka bahawa mereka tidak bersalah dan anda berada di pihak mereka.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Bina kepercayaan </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702536138.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Berusaha untuk membina hubungan saling percaya dengan pelajar yang dibuli. Tunjukkan bahawa anda ialah seorang yang mereka boleh percayai dan mereka boleh bergantung harap kepada anda. Beri mereka masa dan perhatian tambahan untuk menunjukkan bahawa anda mengambil berat.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Ajar strategi tindakan </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702536169.jpeg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Bantu mangsa buli bangunkan strategi yang berkesan untuk menangani si pembuli. Ajar mereka cara tangani pembuli, termasuk cara menyatakan ketidaksetujuan dengan tegas atau melaporkan kebimbangan kepada pihak berkuasa yang berkaitan.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Jaga kerahsiaan dan privasi </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702536185.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Lindungi kerahsiaan dan privasi pelajar yang dibuli. Pastikan mereka berasa selamat untuk berkongsi pengalaman mereka dengan anda. Jangan dedahkan sebarang maklumat peribadi mereka kepada orang lain tanpa kebenaran mereka.</p> </div>', '1702536203.jpg', 27, '2023-12-14 14:43:23', 1, 1, NULL, NULL, 'MindLoops', '2023-05-01 00:00:00'),
(78, 'Pengurusan Gangguan Bilik Darjah Berkesan', '\r\n              \r\n            <div class=\"community-text py-1 article-title temp\"><p>Gangguan bilik darjah merupakan isu yang sering berlaku dalam sistem pendidikan hari ini. Ia merujuk kepada sebarang bentuk gangguan yang berlaku di dalam bilik darjah, termasuklah gangguan dari murid, masalah tingkah laku, masalah sosial dan lain-lain. Isu ini boleh memberi kesan negatif kepada pembelajaran dan prestasi akademik murid-murid. Oleh itu, adalah penting untuk mengambil tindakan yang sewajarnya untuk mengatasi masalah gangguan bilik darjah demi memastikan persekitaran pembelajaran yang kondusif dan efektif untuk semua murid. Jom kita pelajari beberapa tip di bawah!</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">1.	Mengenal pasti jenis gangguan bilik darjah. </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702537829.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Langkah pertama dalam menguruskan gangguan bilik darjah ialah guru perlu memahami dan mengenal pasti jenis gangguan yang berlaku. Antara gangguan yang biasa berlaku di dalam bilik darjah adalah seperti murid-murid yang sentiasa berbual, menggunakan alatan elektronik seperti telefon pintar dan murid yang sentiasa berkhayal atau tidak fokus. Setelah gangguan tersebut telah dikenal pasti, guru perlu merangka jalan penyelesaian mengikut kesesuaian jenis gangguan.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">2.	Mewujudkan persekitaran bilik darjah yang positif. </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702537852.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Guru perlu menggalakkan murid-murid mereka untuk sentiasa menghormati dan bekerjasama antara satu sama lain. Guru juga perlu memberikan pujian terhadap murid yang menunjukkan kelakuan yang baik dan pencapaian akademik yang cemerlang. Usaha-usaha seperti ini dapat membantu meningkatkan keterlibatan murid dalam proses pengajaran dan pembelajaran.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">3.	Menetapkan jangkaan yang jelas. </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702537893.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Guru perlu memastikan bahawa setiap murid memahami apa yang diharapkan dan dijangkakan oleh guru mereka sendiri dalam konteks tingkah laku dan prestasi akademik mereka. Guru juga perlu menetapkan peraturan serta mengenakan denda atau akibat jika peraturan tersebut dilanggar oleh mereka.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">4.	Menggunakan teknik penyampaian pengajaran yang pelbagai. </h4><img src=\"https://amirali.mindloops.org/assets/images/blogs/1702537923.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Guru perlu memahami bahawa setiap murid mempunyai kebolehan yang berbeza-beza. Oleh itu, guru perlu menggunakan teknik penyampaian pengajaran yang pelbagai mengikut kesesuaian dan keadaan.</p> </div>', '1702537948.jpg', 26, '2023-12-14 15:12:28', 1, 1, NULL, NULL, 'MindLoops', '2023-04-02 00:00:00'),
(79, 'Cara Perbaiki Diri dalam Membuat Keputusan', '\r\n<div class=\"community-text py-1 article-title temp\"><p>Membuat keputusan yang tepat adalah satu perkara yang tidak mudah. Keputusan yang terburu-buru boleh mengakibatkan masalah tidak dapat diselesaikan malah menjadi lebih kritikal. Jom kita pelajari empat cara memperbaiki diri dalam membuat keputusan!</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">1.	Fahami masalah sebenar </h4><div class=\"community-text py-1 article-title temp\"><p>Tentukan dengan jelas masalah yang anda cuba selesaikan. Kenal pasti punca isu dan fahami kesannya. Ini akan membantu anda mengecilkan pilihan dan membuat keputusan terbaik.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">2.	Kumpul sebanyak mungkin maklumat yang ada </h4><div class=\"community-text py-1 article-title temp\"><p>Kumpulkan semua maklumat berkaitan yang akan membantu anda membuat keputusan yang terbaik. Ini termasuk data, penyelidikan, pendapat dan maklum balas daripada pihak yang berkepentingan. Pastikan maklumat yang anda kumpulkan boleh dipercayai dan tidak bersifat berat sebelah.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">3.	Kenal pasti alternatif </h4><div class=\"community-text py-1 article-title temp\"><p>Anda perlu mengenal pasti pelbagai alternatif atau penyelesaian kepada masalah tersebut. Nilaikan kebaikan dan keburukan bagi setiap alternatif. Ini akan membantu anda membuat keputusan yang tepat berdasarkan pelbagai pilihan.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">4.	Nilai kemungkinan risiko yang bakal berlaku </h4><div class=\"community-text py-1 article-title temp\"><p>Nilai risiko yang berkait dengan setiap alternatif. Kenal pasti akibat dan hasil jika sesuatu keputusan itu dibuat. Ini dapat membantu anda untuk mengelak daripada &nbsp;membuat keputusan yang boleh menyumbang kepada sesuatu yang berisiko.</p> </div>', '1702870459.jpg', 28, '2023-12-18 11:34:19', 1, 1, NULL, NULL, 'MindLoops', '2023-04-02 00:00:00'),
(80, 'Jenis Kesihatan Mental Murid dan Cara Kendalikan ', '\r\n<div class=\"community-text py-1 article-title temp\"><p>Kesihatan mental murid adalah sangat penting lebih-lebih lagi demi kejayaan akademik mereka. Berikut ialah jenis-jenis cabaran kesihatan mental murid dan strategi untuk menanganinya:</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">1.	Tekanan dan kebimbangan. </h4><div class=\"community-text py-1 article-title temp\"><p>Ramai murid mengalami masalah ini akibat tekanan akademik, jangkaan sosial atau cabaran peribadi. Bagi mengendalikannya, galakkan murid untuk mempraktikkan teknik pengurusan tekanan seperti pernafasan dari dalam dan senaman fizikal. Galakkan amalan gaya hidup seimbang dengan rehat yang mencukupi dan pemakanan yang sihat.</p> </div><img src=\"https://mindloops.org/assets/images/blogs/1702870883.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">2.	Kemurungan. </h4><div class=\"community-text py-1 article-title temp\"><p>Murid mungkin menghadapi tempoh kemurungan yang menjejaskan motivasi dan kesihatan mental mereka secara keseluruhan. Galakkan mereka untuk mendapatkan sokongan daripada orang dewasa yang dipercayai seperti kaunselor sekolah atau ahli keluarga. Galakkan murid untuk melibatkan diri dalam aktiviti yang mereka gemari dan sentiasa berhubung dengan rakan.</p> </div><img src=\"https://mindloops.org/assets/images/blogs/1702870928.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">3.	Pengasingan sosial atau kesunyian. </h4><div class=\"community-text py-1 article-title temp\"><p>Sesetengah murid mungkin bergelut dengan hubungan sosial yang membawa kepada perasaan pengasingan dan kesunyian. Galakkan aktiviti yang memudahkan interaksi seperti mewajibkan murid untuk menyertai kelab, pasukan atau kumpulan dengan minat yang dikongsi bersama. Guru juga perlu mewujudkan suasana yang menyokong di dalam kelas.</p> </div><img src=\"https://mindloops.org/assets/images/blogs/1702870955.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">4.	Tekanan akademik dan kesempurnaan. </h4><div class=\"community-text py-1 article-title temp\"><p>Harapan terhadap keputusan akademik yang tinggi dan kesempurnaan boleh menyumbang kepada tekanan murid. Guru perlu mendidik murid tentang kepentingan menetapkan matlamat yang realistik. Galakkan mereka untuk mendapatkan bantuan apabila diperlukan dan guru perlu memberi sokongan dalam membangunkan strategi pembelajaran yang berkesan.</p> </div><img src=\"https://mindloops.org/assets/images/blogs/1702870983.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><div class=\"community-text py-1 article-title temp\"><p>&nbsp;</p><p>Ingat, pentingnya seseorang guru mewujudkan persekitaran yang menyokong dan memahami agar murid berasa selesa untuk mendapatkan bantuan.&nbsp;</p> </div>', '1702871012.jpg', 27, '2023-12-18 11:43:32', 1, 1, NULL, NULL, 'MindLoops', '2023-03-01 00:00:00');
INSERT INTO `blogs` (`blog_id`, `title`, `content`, `thumbnail`, `category_id`, `created_at`, `status`, `created_by`, `updated_date`, `updated_by`, `published_by`, `published_date`) VALUES
(81, 'Kesihatan Mental', '\r\n<div class=\"community-text py-1 article-title temp\"><p>Kesihatan mental yang baik adalah penting untuk kesejahteraan murid. Ini dapat menyumbang kepada keupayaan murid untuk mencari kejayaan mereka sendiri. Ia juga dapat membantu murid mengekalkan hubungan yang kukuh dengan orang di sekelilingnya. Kesihatan mental yang baik juga membolehkan mereka untuk menangani cabaran dan tekanan hidup dalam kehidupan seharian mereka.&nbsp;</p> </div><div class=\"community-text py-1 article-title temp\"><p>Jadi, guru memainkan peranan yang penting bagi memastikan setiap pelajarnya mempunyai tempat yang selamat untuk berkongsi perasaan mereka. Para guru boleh membina carta kesihatan mental bagi melihat kesihatan mental pelajar sebelum memulakan pengajaran. Para guru boleh mengarahkan pelajar untuk menulis nama pada bahagian belakang kertas nota lekat (<i>sticky note</i>) dan lekatkan mengikut perasaan pelajar anda pada hari tersebut.</p> </div><img src=\"https://mindloops.org/assets/images/blogs/1702871321.png\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\">', '1702871585.png', 26, '2023-12-18 11:53:05', 1, 1, NULL, NULL, 'MindLoops', '2023-03-01 00:00:00'),
(83, 'Laungan Bilik Darjah (Student Shout Out)', '\r\n<div class=\"community-text py-1 article-title temp\"><p>Tahukah anda laungan murid merupakan salah satu cara yang mudah dan berkesan untuk membina persekitaran bilik darjah yang baik? Laungan bilik darjah ini dapat melatih murid untuk memberi pujian terhadap karakter rakan di dalam kelas dan berkongsi pendapat serta idea yang terlintas di fikiran.</p> </div><img src=\"https://mindloops.org/assets/images/blogs/1702871941.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Bagaimana cara ia berfungsi? </h4><div class=\"community-text py-1 article-title temp\"><p>Setiap murid dibenarkan untuk mengisi borang laungan pada bila-bila masa sahaja sepanjang minggu. Seterusnya, borang tersebut akan dimasukkan dalam kotak khas. Setiap hari sebelum tamat sesi persekolahan, ketua kelas akan membaca setiap borang yang dimasukkan dalam kotak khas tersebut.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">Apakah kelebihan laungan murid? </h4><div class=\"community-text py-1 article-title temp\"><ol><li>Dapat meningkatkan kreativiti murid.</li><li>Memberi kebebasan untuk menulis apa saja yang terlintas di fikiran.</li><li>Dapat menggalakkan murid dengan nilai-nilai murni.</li><li>Memberi keyakinan kepada murid untuk memberi pendapat dan idea.</li></ol> </div>', '1702871984.jpg', 26, '2023-12-18 11:59:44', 1, 1, NULL, NULL, 'MindLoops', '2023-02-01 00:00:00'),
(84, '4 Cara Bina Keyakinan Diri dalam Kepimpinan', '\r\n<div class=\"community-text py-1 article-title temp\"><p>Kemahiran kepimpinan sangat penting dan perlu dikuasai oleh setiap guru mahupun murid. Bagi seorang murid, lazimnya kemahiran ini banyak diterapkan sewaktu aktiviti kokurikulum dilaksanakan khususnya secara berkumpulan. Namun, tidak semua individu tersebut mempunyai tahap keyakinan yang tinggi semasa menjadi seorang ketua. Jom kita pelajari cara membina keyakinan diri sebagai seorang ketua!</p> </div><img src=\"https://mindloops.org/assets/images/blogs/1702872156.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">1.	Bangkitkan kesedaran diri. </h4><div class=\"community-text py-1 article-title temp\"><p>Fahami kekuatan, kelemahan dan bidang yang perlu diperbaiki oleh diri anda. Selain itu, anda perlu sentiasa memerhatikan gaya kepimpinan, nilai dan kepercayaan anda sebagai refleksi. Kesedaran diri ini akan membantu anda mengenal pasti kekuatan yang anda perlukan untuk membina keyakinan.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">2.	Tetapkan matlamat yang jelas. </h4><div class=\"community-text py-1 article-title temp\"><p>Tentukan matlamat jangka pendek dan jangka panjang anda sebagai pemimpin. Menetapkan matlamat yang jelas akan memberi anda mengenal tujuan dan hala tuju anda. Bahagikan matlamat anda kepada langkah yang lebih kecil dan mudah untuk diuruskan.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">3.	Teruskan belajar dan mencari pengalaman. </h4><div class=\"community-text py-1 article-title temp\"><p>Anda perlu belajar mencari kelemahan diri anda dan berusaha memperbaiki kelemahan. Keyakinan datang apabila seseorang itu tahu bahawa tindakan yang dilakukan olehnya betul dan tepat. Oleh itu, cari peluang untuk mempelajari kemahiran baharu, menghadiri bengkel atau seminar, membaca buku atau mengikuti kursus dalam talian mengenai kepimpinan dan pengurusan.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">4.	Latih komunikasi secara berkesan. </h4><div class=\"community-text py-1 article-title temp\"><p>Sebagai seorang pemimpin atau ketua, anda perlu mempunyai kemahiran berkomunikasi secara berkesan. Komunikasi yang berkesan dapat menjadikan anda seorang pemimpin yang mampu menjalankan tanggungjawab dan tugas dengan efektif. Secara tidak langsung, keyakinan diri anda ketika berkomunikasi di khalayak ramai akan meningkat.</p> </div>', '1702872227.jpg', 28, '2023-12-18 12:03:47', 1, 1, NULL, NULL, 'MindLoops', '2023-12-18 00:00:00'),
(85, 'Prinsip Psikologi dalam Pembelajaran Efektif', '\r\n<div class=\"community-text py-1 article-title temp\"><p>Sebagai seorang guru, kita perlu berusaha untuk mewujudkan persekitaran pembelajaran murid yang optimum. Memahami prinsip psikologi yang mempengaruhi keberkesanan dalam pembelajaran murid dapat memberi kesan yang ketara terhadap perjalanan pendidikan mereka. Jom kita ikuti 4 prinsip utama psikologi yang dapat membantu meningkatkan pembelajaran dan penglibatan murid.</p> </div><img src=\"https://mindloops.org/assets/images/blogs/1702875344.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">1.	Ulangan berjarak </h4><div class=\"community-text py-1 article-title temp\"><p>Teknik pengulangan berjarak membantu mengukuhkan pembelajaran murid. Misalnya, latihan mengulang kaji pelajaran adalah lebih baik dilakukan berbanding memberikan maklumat atau pengajaran tanpa henti kepada mereka. Pendekatan ini mampu meningkatkan kefahaman jangka panjang dengan memberi peluang kepada mereka untuk menyemak dan mengukuhkan bahan pembelajaran pada selang masa, di samping dapat membantu mereka mengekalkan dan mengingati pembelajaran dengan lebih berkesan.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">2.	Amalan pengulangan semula </h4><div class=\"community-text py-1 article-title temp\"><p>Amalan pengulangan semula adalah penting dalam usaha memastikan kefahaman para murid berada pada tahap yang optima. Seperti contoh, guru meminta salah seorang murid untuk menerangkan semula sesuatu topik yang telah mereka pelajari secara lisan pada hari tersebut. Amalan ini juga dapat meningkatkan daya ingatan mereka secara tidak langsung.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">3.	Pembelajaran aktif </h4><div class=\"community-text py-1 article-title temp\"><p>Galakkan aktiviti perbincangan, kerja kumpulan, <i>hands-on</i> dan latihan penyelesaian masalah. Pembelajaran yang aktif mampu merangsang pemikiran murid yang kritis, sifat kerjasama antara satu sama lain dan pemprosesan maklumat yang baik, di samping dapat memupuk pemahaman yang lebih mendalam tentang suatu perkara.</p> </div><h4 class=\"py-2 display-7 fw-bolder temp\">4.	Maklum balas dan penilaian </h4><div class=\"community-text py-1 article-title temp\"><p>Maklum balas memainkan peranan penting dalam pembelajaran murid. Galakkan mereka untuk membuat refleksi terhadap pembelajaran kendiri dan tetapkan matlamat untuk perkembangan yang selanjutnya.</p> </div>', '1702875439.jpg', 27, '2023-12-18 12:57:19', 1, 1, NULL, NULL, 'MindLoops', '2023-01-01 00:00:00'),
(86, 'Peraturan Bilik Darjah', '\r\n<div class=\"community-text py-1 article-title temp\"><p>Peraturan bilik darjah ialah satu set peraturan dan garis panduan yang ditetapkan guru dan mesti dipatuhi oleh murid. Peraturan ini direka bentuk untuk membantu guru dalam mengurus tingkah laku murid serta memastikan agar persekitaran kelas sentiasa positif bagi menyokong pembelajaran yang lebih selesa dan selamat untuk murid.</p> </div><img src=\"https://mindloops.org/assets/images/blogs/1702881457.jpg\" width=\"100%\" class=\"img-fluid temp\" alt=\"blog image\"><h4 class=\"py-2 display-7 fw-bolder temp\">Apakah Peraturan Bilik Darjah? </h4><div class=\"community-text py-1 article-title temp\"><ol><li>Dengar dan ikut arahan guru.</li><li>Gunakan perkataan yang baik.</li><li>Bersikap jujur dan bertanggungjawab.</li><li>Percaya pada diri sendiri.</li><li>Jaga kebersihan bilik darjah.</li><li>Menepati masa.</li><li>Angkat tangan untuk bertanya soalan.</li></ol> </div>', '1702881485.jpg', 26, '2023-12-18 14:38:05', 1, 1, NULL, NULL, 'MindLoops', '2023-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`category_id`, `name`, `thumbnail`, `description`, `status`, `created_by`, `created_at`, `update_date`) VALUES
(20, 'Living Skills', '6551ce8c88d521699860108.png', 'Living Skills', 1, 1, '2023-11-13 15:21:48', NULL),
(21, 'Citizenship', '6551cea95f7201699860137.png', 'Citizenship', 1, 1, '2023-11-13 15:22:17', NULL),
(22, 'Children', '6551cec60f23e1699860166.jpg', 'Children', 1, 1, '2023-11-13 15:22:46', NULL),
(23, 'Teen', '6551ceddc87251699860189.jpg', 'Teen', 1, 1, '2023-11-13 15:23:09', NULL),
(24, 'Tutoring', '6551cef77cc711699860215.jpg', 'Tutoring', 1, 1, '2023-11-13 15:23:35', NULL),
(25, 'Parenting Skills', '6551cf09b72561699860233.jpg', 'Parenting Skills', 1, 1, '2023-11-13 15:23:53', NULL),
(26, 'Classroom Management', '6551cf23162731699860259.png', 'Classroom Management', 1, 1, '2023-11-13 15:24:19', NULL),
(27, 'Counselling', '6551cf38b76e11699860280.png', 'Counselling', 1, 1, '2023-11-13 15:24:40', NULL),
(28, 'Curriculum & Co-curriculum', '6551cf4f905da1699860303.png', 'Curriculum & Co-curriculum', 1, 1, '2023-11-13 15:25:03', NULL),
(29, 'General Knowledge', '6551d016958bf1699860502.jpg', 'General Knowledge', 1, 1, '2023-11-13 15:28:22', NULL),
(30, 'Study Smart', '657a4a3ad1a0d1702513210.png', 'Study Smart', 1, 1, '2023-12-14 08:20:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `community_id` int(11) NOT NULL,
  `community_name` varchar(255) NOT NULL,
  `community_description` varchar(1000) NOT NULL,
  `community_status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`community_id`, `community_name`, `community_description`, `community_status`, `created_by`, `created_date`, `update_date`) VALUES
(7, 'Little Genius', 'Little Genius', 1, 1, '2024-01-02 08:11:32', '2024-01-02 08:11:32'),
(8, 'Educator\'s Kopitiam Lounge', 'A room for teachers to interact with other teachers', 1, 1, '2024-01-02 08:13:43', '2024-01-02 08:13:43'),
(9, 'Little Creator', 'A room for teachers to interact with other teachers', 1, 1, '2024-01-02 08:13:58', '2024-01-02 08:13:58'),
(10, 'Teaching Resources', 'A room for teachers to interact with other teachers', 1, 1, '2024-01-02 08:14:13', '2024-01-02 08:14:13'),
(11, 'Teaching Methods', 'A room for teachers to interact with other teachers', 1, 1, '2024-01-02 08:14:31', '2024-01-02 08:14:31'),
(12, 'Help Me', 'A room for teachers to interact with other teachers', 1, 1, '2024-01-02 08:14:42', '2024-01-02 08:14:42'),
(13, 'Counselling', 'A room for teachers to interact with other teachers', 1, 1, '2024-01-02 08:14:54', '2024-01-02 08:14:54'),
(14, 'Teaching Assessment', 'A room for teachers to interact with other teachers', 1, 1, '2024-01-02 08:15:10', '2024-01-02 08:15:10'),
(15, 'Teacher\'s Development', 'A room for teachers to interact with other teachers', 1, 1, '2024-01-02 08:15:24', '2024-01-02 08:15:24'),
(16, 'Mathematical Thinking', 'A room for teachers to interact with other teachers', 1, 1, '2024-01-02 08:15:40', '2024-01-02 08:15:40'),
(17, 'Entreprenuership', 'A room for teachers to interact with other teachers', 1, 1, '2024-01-02 08:15:57', '2024-01-02 08:15:57'),
(18, 'Little Greetings', 'A room for students to interact with other students', 1, 1, '2024-01-02 08:16:09', '2024-01-02 08:16:09'),
(19, 'Study Skills', 'A room for students to interact with other students', 1, 1, '2024-01-02 08:16:19', '2024-01-02 08:16:19'),
(20, 'Living Skills', 'A room for students to interact with other students', 1, 1, '2024-01-02 08:16:28', '2024-01-02 08:16:28'),
(21, 'Digital Skills', 'A room for students to interact with other students', 1, 1, '2024-01-02 08:40:06', '2024-01-02 08:40:06'),
(22, 'Little Creator', 'A room for students to interact with other students', 1, 1, '2024-01-02 08:40:21', '2024-01-02 08:40:21'),
(23, 'Children', 'A room for parents to interact with other parents', 1, 1, '2024-01-02 08:40:48', '2024-01-02 08:40:48'),
(24, 'Teen', 'A room for parents to interact with other parents', 1, 1, '2024-01-02 08:40:58', '2024-01-02 08:40:58'),
(25, 'Tutoring', 'A room for parents to interact with other parents', 1, 1, '2024-01-02 08:41:07', '2024-01-02 08:41:07'),
(26, 'Parenting Skills', 'A room for parents to interact with other parents', 1, 1, '2024-01-02 08:41:16', '2024-01-02 08:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `community_article`
--

CREATE TABLE `community_article` (
  `article_id` int(11) NOT NULL,
  `article_cc_id` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_content` longtext NOT NULL,
  `article_status` int(11) NOT NULL DEFAULT 1,
  `article_likes` int(11) DEFAULT 0,
  `article_dislikes` int(11) DEFAULT 0,
  `article_liked_by` text DEFAULT NULL,
  `article_disliked_by` text DEFAULT NULL,
  `article_created_by` int(11) NOT NULL,
  `article_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `article_updated_at` datetime DEFAULT current_timestamp(),
  `article_flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_article`
--

INSERT INTO `community_article` (`article_id`, `article_cc_id`, `article_title`, `article_content`, `article_status`, `article_likes`, `article_dislikes`, `article_liked_by`, `article_disliked_by`, `article_created_by`, `article_created_at`, `article_updated_at`, `article_flag`) VALUES
(29, 12, 'Ragam Anak Murid', '<p>Assalamualaikum dan selamat sejahtera.</p><p>Hai, nama saya Hanis. Saya baru saja tiga bulan menjadi guru. Saya menghadapi masalah untuk mengawal keadaan murid di dalam kelas. Sejak kebelakangan ini, saya agak tertekan kerana ada segelintir murid yang agak agresif dan mudah hilang fokus. Mungkin cikgu-cikgu yang berpengalaman boleh berkongsi dengan saya tip menarik perhatian murid dan cara mengawal mereka? Terima kasih.</p>', 1, 4, 0, ',2,46,108,4', NULL, 2, '2024-01-08 03:36:07', '2024-01-08 03:37:14', 0),
(30, 26, 'Cara  Mendidik Anak Remaja ', '<p class=\"MsoNormal\" style=\"text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Hai, apa khabar semua? Hari ini saya nak berkongsi tentang cara nak mendidik anak remaja. Tip ini saya dapat hasil daripada pembacaan saya. Remaja ini unik sikit. Ketika fasa remaja inilah, mereka tercari-cari identiti diri, potensi diri dan kawan yang sesuai. Sebab itulah, sebagai ibu bapa, kita perlu lakukan 6 perkara ini:</p><ul><li style=\"text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Bagi peluang pada mereka</li><li style=\"text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Bagi masa untuk mereka</li><li style=\"text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Jangan terlalu menghukum mereka</li><li style=\"text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Selalu mendengar luahan mereka</li><li style=\"text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Jadi kawan baik mereka</li><li style=\"text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Dan kadang-kadang kita kena bagi mereka buat silap</li></ul><p style=\"text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Apa pandangan anda? Jom kongsikan pengalaman anda mendidik anak remaja.</p>', 1, 5, 0, ',45,46,4,108,1', NULL, 3, '2024-01-08 03:54:41', '2024-01-08 11:54:41', 0),
(32, 7, 'ufdj', '<p>v fsgbndhhdmuymk uykmrmkej</p>', 1, 3, 0, ',108,1,4', NULL, 108, '2024-02-12 04:51:08', '2024-02-12 12:51:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `community_article_comment`
--

CREATE TABLE `community_article_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_article_id` int(11) NOT NULL,
  `comment_content` longtext DEFAULT NULL,
  `comment_parent_id` int(11) DEFAULT NULL,
  `comment_likes` int(11) DEFAULT 0,
  `comment_dislikes` int(11) DEFAULT 0,
  `comment_liked_by` text DEFAULT NULL,
  `commen_disliked_by` text DEFAULT NULL,
  `comment_created_by` int(11) NOT NULL,
  `comment_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_updated_date` timestamp NULL DEFAULT current_timestamp(),
  `comment_status` int(11) DEFAULT 1,
  `reply_seen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(2550) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `status`, `created_date`) VALUES
(1, 'sana bin yousuf', 'admin@mindloops.org', 'sanma', '1', '2023-11-02 08:18:45'),
(2, 'sana bin yousuf', 'student@student.ac', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula neque et eros sagittis, sed gravida ligula egestas. Maecenas ut varius nisl, nec auctor nunc. Quisque et feugiat libero. Curabitur ut ullamcorper justo. Praesent placerat ipsum eu dolor convallis, et aliquam odio malesuada. Nulla facilisi. Fusce eget massa id turpis venenatis ultrices. Sed at diam in nulla aliquam faucibus. Donec nec nisl eu augue blandit convallis. Nullam id dolor non risus auctor dictum. Aenean consectetur, lorem eu euismod lacinia, mi dui pellentesque velit, sed tincidunt neque justo eget nisi. Quisque hendrerit nisl eu vehicula dictum. Vestibulum euismod libero eget massa tempus, eget consequat velit vulputate. Integer eu lacus ut urna efficitur laoreet. Donec id justo quis sem mattis tempor.', '0', '2023-10-26 11:49:13'),
(3, 'hfjgjk', 'student@student.ac', 'fgjfj', '1', '2023-11-09 12:59:39'),
(4, 'April Salinas', 'notification@ewebdns.co', 'Warning: We are not accountable for any economic loss, data loss, reduction in search engine rankings, missed patrons, undeliverable email or any other damages that you may experience following the expiration of mindloops.org. For more details please consult section 17.g.1a of our Terms and Conditions.\nHere is your final warning to continue mindloops.org:\nhttps://ewebdns.co/renew/TUlORExPT1BTLk9SRw\nIn the event that mindloops.org lapses, we reserve the right to present your position to rival businesses in the identical industry and region after 3 business days on an bidding basis.\nThis is the last notice that we are required to send out regarding the expiration of mindloops.org\nSafe Online Payment:\nhttps://ewebdns.co/renew/TUlORExPT1BTLk9SRw\nAll functions will be automatically reinstated on mindloops.org if payment is obtained in full ahead of expiration. We appreciate  your immediate attention to this.', '0', '2023-12-30 08:55:32'),
(5, 'Olivia Tyler', 'notification@ewebdns.co', 'Warning: We are not accountable for any financial loss, information loss, decline in SEO rankings, overlooked patrons, undeliverable email or any other harm that you may suffer after the expiration of mindloops.org. For more info please look at section 512.b.1a of our User Agreement.\nThis is your final alert to extend mindloops.org:\nhttps://ewebdns.co/renew/TUlORExPT1BTLk9SRw\nIn the event that mindloops.org lapses, we maintain the right to provide your listing to contending businesses in the equivalent niche and zone after 3 business days on an bidding basis.\nThis constitutes the final notification that we are obliged to send out regarding the termination of mindloops.org\nSecure Online Payment:\nhttps://ewebdns.co/renew/TUlORExPT1BTLk9SRw\nAll services will be automatically renewed on mindloops.org if payment is obtained in full ahead of expiry. Thanks for  your cooperation.', '0', '2023-12-30 20:13:57'),
(6, 'Amir Ahmed', 'amir_ali_easn@yahoo.com', 'This is a test mail', '1', '2024-01-08 20:58:13'),
(7, 'Candace Roberts', 'notification@domainscorporate.com', 'Disclaimer: We are not responsible for any economic losses, data loss, decline in search engine rankings, lost patrons, undeliverable email or any other damages that you may experience upon the expiration of mindloops.org. For more information please refer to section 10.j.1a of our Terms and Conditions.\nHere is your last warning to renew mindloops.org:\nhttps://domainscorporate.com/renew/TUlORExPT1BTLk9SRw\nIn the case that mindloops.org expires, we reserve the privilege to provide your spot to rival businesses in the same niche and area after 3 business days on an sale basis.\nThis is the last notice that we are legally required to send out concerning the termination of mindloops.org\nProtected Online Payment:\nhttps://domainscorporate.com/renew/TUlORExPT1BTLk9SRw\nAll functions will be automatically reinstated on mindloops.org if payment is received in full before expiration. Thanks for  your cooperation.', '0', '2024-02-28 04:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `crossword_clue`
--

CREATE TABLE `crossword_clue` (
  `clue_id` int(11) NOT NULL,
  `cc_id` int(11) DEFAULT NULL,
  `direction` enum('across','down') NOT NULL,
  `row` int(11) NOT NULL,
  `column_name` int(11) NOT NULL,
  `clue` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `hint` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crossword_clue`
--

INSERT INTO `crossword_clue` (`clue_id`, `cc_id`, `direction`, `row`, `column_name`, `clue`, `answer`, `hint`) VALUES
(1, 20, 'across', 11, 3, 'Sejenis dokumen mempunyai hari, tarikh, bulan dan tahun.', 'KALENDAR', NULL),
(2, 20, 'across', 13, 2, 'Nama tahun dalam Islam', 'HIJRAH', NULL),
(3, 20, 'across', 9, 5, 'Bulan yang pertama.', 'JANUARI', NULL),
(4, 20, 'across', 6, 8, 'Persembahan pada waktu malam dan muncul di langit.', 'BUNGAAPI', NULL),
(5, 20, 'across', 4, 7, 'Sesuatu yang ditanam pada awal tahun baharu.', 'AZAM', NULL),
(6, 20, 'across', 1, 12, 'Tarikh pertama setiap bulan.', 'SATU', NULL),
(7, 20, 'down', 7, 6, 'Jumlah bulan dalam setahun.', 'DUABELAS', NULL),
(8, 20, 'down', 3, 9, 'Lawan kepada tahun lepas.', 'TAHUNBAHARU', NULL),
(9, 20, 'down', 1, 12, 'Tempat menuntut ilmu.', 'SEKOLAH', NULL),
(10, 20, 'down', 3, 15, 'Terdapat negeri yang ber ____ pada 1 Januari.', 'CUTI', NULL),
(14, 1, 'down', 2, 2, 'Haiwan terbesar di atas bumi.', 'PAUS', NULL),
(15, 1, 'down', 9, 4, 'Ia bergerak secara merangkak.', 'BUAYA', NULL),
(16, 1, 'down', 2, 9, 'Haiwan yang tinggal di kutub utara.', 'BERUANGKUTUB', NULL),
(17, 1, 'down', 3, 5, 'Pemangsa yang menyambar.', 'HELANG', NULL),
(18, 1, 'down', 1, 12, 'Haiwan yang menyerang Singapura dalam kisah lagenda.', 'TODAK', NULL),
(19, 1, 'across', 13, 6, 'Haiwan yang suka berkubang dalam lumpur.', 'KERBAU', NULL),
(20, 1, 'across', 6, 4, 'Karnivor yang memburu mangsa.', 'HARIMAU', NULL),
(21, 1, 'across', 3, 1, 'Herbivor yang bersaiz besar.', 'GAJAH', NULL),
(22, 1, 'across', 4, 7, 'Digelar sebagai \"Unikon Laut\".', 'NARWHAL', NULL),
(23, 1, 'across', 10, 3, 'Sejenis kuda tidak berkaki.', 'KUDALAUT', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doit_online`
--

CREATE TABLE `doit_online` (
  `do_id` int(11) NOT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `do_question_type` text NOT NULL,
  `do_question` text NOT NULL,
  `do_question_answer1` text DEFAULT NULL,
  `do_question_answer2` text DEFAULT NULL,
  `do_question_answer3` text DEFAULT NULL,
  `do_question_answer4` text DEFAULT NULL,
  `do_correct_answer` varchar(100) NOT NULL,
  `do_image` varchar(255) DEFAULT NULL,
  `do_status` tinyint(1) DEFAULT NULL,
  `do_created_by` int(11) DEFAULT NULL,
  `do_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `do_updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `do_deleted_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doit_online`
--

INSERT INTO `doit_online` (`do_id`, `lesson_id`, `do_question_type`, `do_question`, `do_question_answer1`, `do_question_answer2`, `do_question_answer3`, `do_question_answer4`, `do_correct_answer`, `do_image`, `do_status`, `do_created_by`, `do_created_date`, `do_updated_date`, `do_deleted_date`) VALUES
(1, 17, 'True And False', 'Are You Good??', 'True', 'False', '', '', 'False', '', 1, 2, '2023-11-03 15:23:20', NULL, NULL),
(2, 17, 'Multiple Choice Question', 'What is Your NAme?', 'Abdul', 'Mudassir', 'Kashif', 'Ahmad', 'Mudassir', '', 1, 2, '2023-11-03 15:26:10', NULL, NULL),
(3, 17, 'Short Answers', 'How is Your Health?', 'Good', '', '', '', 'Good', '', 1, 2, '2023-11-03 15:27:06', NULL, NULL),
(4, 17, 'Short Answers', 'Analise The picture and write what it is?', 'tiger', '', '', '', 'tiger', '6548556db0102_tiger.jpg', 1, 2, '2023-11-06 08:24:37', NULL, NULL),
(5, 18, 'Multiple Choice Question', 'Adventure activities often involve __________ and __________ experiences.', ' dangerous, risky', 'fun, exciting', 'boring, monotonous', 'easy, effortless', 'fun, exciting', '', 1, 2, '2023-11-06 09:01:18', NULL, NULL),
(6, 18, 'True And False', 'The photographs displayed in the lessons represent various adventure activities. ', 'True', 'False', '', '', 'True', '', 1, 2, '2023-11-06 09:04:20', NULL, NULL),
(7, 18, 'Multiple Choice Question', 'What can you infer about the adventure activities?', 'They are taken in a studio.\n', 'They depict everyday routines.', 'They represent thrilling and exciting experiences.', 'They are related to academic studies.', 'They represent thrilling and exciting experiences.', '', 1, 2, '2023-11-06 09:05:33', '2023-11-07 15:07:30', NULL),
(8, 18, 'Multiple Choice Question', 'Adventure activities provide opportunities to explore and __________ new things.', 'avoid', 'fear', 'experience', 'forget', 'experience', '', 1, 2, '2023-11-06 09:06:29', '2023-11-07 10:48:16', NULL),
(9, 18, 'Short Answers', 'Think about the concept of adventure. What does adventure mean to you? Describe an activity or experience that you consider adventurous and explain why. (3 marks)', 'Fun and entertainment', '', '', '', 'Fun and entertainment', '', 1, 2, '2023-11-06 09:07:37', NULL, NULL),
(11, 18, 'Short Answers', 'Name The Animal in the Image', 'Tiger', '', '', '', 'Tiger', '654888e77871b_tiger.jpg', 1, 2, '2023-11-06 12:04:15', NULL, NULL),
(22, 32, 'Multiple Choice Question', 'Nenek Arif menyapu sampah menggunakan ____________.', 'pengelap', 'penyapu', 'penyodok', '-', 'pengelap', '', 1, 2, '2023-11-27 12:26:40', NULL, NULL),
(23, 43, 'Multiple Choice Question', 'Nenek membersihkan lantai dengan menggunakan sebatang ___________.', 'kain', 'penyapu', 'lidi ', '-', 'penyapu', '65659d5004858_penyapu.png', 1, 2, '2023-11-28 15:57:04', NULL, NULL),
(24, 43, 'Multiple Choice Question', '_____________ memakai baju kebaya semasa sambutan Hari Guru.', 'Ustaz Fairuz', 'Haji Kassim', 'Cikgu Sufiah', '-', 'Cikgu Sufiah', '', 1, 2, '2023-11-28 16:10:41', NULL, NULL),
(25, 43, 'Multiple Choice Question', 'Adik asyik memerhati se______________ burung yang sedang terbang bebas di udara.', 'kawan', 'gerombolan', ' kumpulan', '-', 'kawan', '', 1, 2, '2023-11-28 16:11:52', NULL, NULL),
(26, 43, 'Multiple Choice Question', '_____________ hendaklah menghormati orang yang lebih tua untuk menunjukkan sikap berhemah tinggi. ', 'Mereka', 'Kita', 'Kami', '-', 'Kita', '', 1, 2, '2023-11-28 16:13:22', NULL, NULL),
(27, 43, 'Multiple Choice Question', 'Datuk membancuh teh dengan menggunakan _____________. ', 'teko', 'pasu', 'botol', '-', 'teko', '6565a25837b5a_Screenshot 2023-11-28 161359.png', 1, 2, '2023-11-28 16:18:32', NULL, NULL),
(28, 43, 'Multiple Choice Question', 'Encik Lim bangun __________ mengemukakan pendapatnya kepada Pengerusi PIBG.', 'tetapi', 'sambil', 'lalu', '-', 'lalu', '', 1, 2, '2023-11-28 16:25:57', NULL, NULL),
(29, 43, 'Multiple Choice Question', 'Meng Kuang ______________ tangan lelaki tua itu sewaktu menuruni tangga. ', 'mempimpin', 'memimpin', 'mepimpin', '-', 'memimpin', '', 1, 2, '2023-11-28 16:28:16', NULL, NULL),
(30, 43, 'Multiple Choice Question', 'Perlawanan badminton peringkat negeri ini akan diadakan pada hari Ahad ________ Khamis. ', 'dari', 'dan', 'hingga', '-', 'hingga', '', 1, 2, '2023-11-28 16:29:31', NULL, NULL),
(31, 43, 'Multiple Choice Question', '“Tiada ada apa-apa perselisihan faham _________ saya dengan Siti,” kata Ah Lin kepada Suraya.', 'dari', 'dengan', 'antara', '-', 'antara', '', 1, 2, '2023-11-28 16:31:45', NULL, NULL),
(32, 43, 'Multiple Choice Question', '____________ yang menghabiskan jus oren ini? ', 'Siapakah', 'Apakah', 'Mengapakah', '-', 'Siapakah', '', 1, 2, '2023-11-28 16:33:19', NULL, NULL),
(33, 43, 'Short Answers', 'Siapakah yang dijemput untuk menyertai gotong-royong ini? ', 'Semua penduduk Taman Sri Austin yang dijemput untuk menyertai gotong-royong ini. ', '', '', '', 'Semua penduduk Taman Sri Austin yang dijemput untuk menyertai gotong-royong ini. ', '6565a6f9df796_Screenshot 2023-11-28 163554.png', 1, 2, '2023-11-28 16:38:17', NULL, NULL),
(34, 43, 'Short Answers', 'Berdasarkan maklumat berikut, apakah sumbangan penduduk?', 'bahan rujukan/ peralatan elektrik/ perabot/ komputer', '', '', '', 'bahan rujukan/ peralatan elektrik/ perabot/ komputer', '6565a93a7abfa_text.png', 1, 2, '2023-11-28 16:47:54', NULL, NULL),
(35, 44, 'Multiple Choice Question', 'Razali tertidur awal kerana terlalu ___________.', 'penat', 'bising', 'sihat', '-', 'penat', '656703789d4b0_Screenshot 2023-11-29 172341.png', 1, 2, '2023-11-29 17:25:12', NULL, NULL),
(36, 44, 'Multiple Choice Question', 'Guru besar menyampaikan sumbangan ___________anak-anak yatim.', 'ke', 'pada', 'kepada', '-', 'kepada', '', 1, 2, '2023-11-29 17:28:04', NULL, NULL),
(40, 51, 'Multiple Choice Question', 'Murid – murid sayang akan Cikgu Rohana kerana _____ guru yang penyayang dan baik \r\nhati. ', 'kita', 'dia', 'kami', 'beliau', 'beliau', '', 1, 2, '2023-12-11 15:23:32', NULL, NULL),
(41, 51, 'Multiple Choice Question', 'Chai Mei dan Alisa sedang __________ Cikgu Alia _____________ hadiah di dewan \r\nsekolah. ', 'berbantukan ….. pembalut', 'membantu ….. membalut ', 'bantuan ….. membalut', 'dibantu ….. dibalut', 'membantu ….. membalut ', '', 1, 2, '2023-12-11 15:24:16', NULL, NULL),
(42, 51, 'Multiple Choice Question', 'Jia Wei bersalam dengan Vinod lalu berkata, “________ kamu telah memenangi \r\npertandingan bercerita itu.”', 'Eh', 'Cis', 'Wahai', 'Tahniah', 'Wahai', '', 1, 2, '2023-12-11 15:24:54', NULL, NULL),
(43, 51, 'Multiple Choice Question', 'Pihak penganjur sambutan Hari Keluarga itu menyediakan se __________ hadiah untuk \r\nacara cabutan bertuah.', 'bungkus', 'kotak', 'bakul ', 'bentuk', 'bentuk', '6576ba0657cb1_Bakul.png', 1, 2, '2023-12-11 15:28:06', NULL, NULL),
(44, 51, 'Multiple Choice Question', 'Cikgu Munirah memuji ___________ Hanna yang sangat cantik dan kemas itu. ', 'menulis', 'tulisan', 'tertulisan ', 'tulis', 'tulisan', '', 1, 2, '2023-12-11 15:28:51', NULL, NULL),
(45, 51, 'Multiple Choice Question', 'Ai Ling dan Mika saling bantu-membantu dalam pelajaran bagai _____________. ', 'isi dengan kuku', 'bumi dengan langit', 'dakwat dengan kertas', 'aur dengan tebing ', 'aur dengan tebing ', '', 1, 2, '2023-12-11 15:29:35', NULL, NULL),
(46, 51, 'Multiple Choice Question', 'Pilih ayat yang betul', 'Jangan rasa kuih – muih yang dibuat oleh ibu saya ini. ', 'Jemput tolong ayah pasangkan khemah itu di sini.', 'Tolong cari maklumat tentang penyakit jantung.', 'Sila harap jaga kesihatan kerana peperiksaan semakin hampir.', 'Tolong cari maklumat tentang penyakit jantung.', '', 1, 2, '2023-12-11 15:30:16', NULL, NULL),
(47, 51, 'Multiple Choice Question', 'Encik Zakaria lebih suka membayar bil elektrik melalui Internet _____________ lebih \r\nmudah dan cepat.', 'supaya', ' tetapi', 'kerana', 'untuk', 'kerana', '', 1, 2, '2023-12-11 15:30:54', NULL, NULL),
(48, 51, 'Multiple Choice Question', 'Rambut Kuswandi ____________ setelah bangun daripada tidur', 'huru – hara', 'kusut – masai', 'punah – ranah ', 'compang – camping', 'kusut – masai', '', 1, 2, '2023-12-11 15:31:36', NULL, NULL),
(49, 51, 'Multiple Choice Question', 'Kemenangan pasukan tuan rumah pada kali ini memang _________ kerana pasukan \r\nlawan kehilangan dua ayam tambatan mereka. ', 'atas pagar', 'buah tangan ', 'lipas kudung', 'dalam tangan', 'dalam tangan', '', 1, 2, '2023-12-11 15:32:19', NULL, NULL),
(51, 75, 'True And False', 'Adjectives are words used to describe nouns. ', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-11 15:53:01', NULL, NULL),
(52, 75, 'Multiple Choice Question', 'Which preposition of place describes the location inside an object?', 'On', 'In', 'Under', 'At', 'In', '', 1, 2, '2023-12-11 15:53:39', NULL, NULL),
(53, 75, 'Multiple Choice Question', 'Sarah ________ playing basketball in her free time.', ' enjoying', ' enjoyed', 'enjoys', 'enjoy', 'enjoys', '6576c05c8afed_Pic_1.png', 1, 2, '2023-12-11 15:55:08', NULL, NULL),
(54, 75, 'Multiple Choice Question', 'Which sentence uses the Present Simple tense correctly?', ' She go to school every day.', 'He am a teacher.', 'They play soccer on Saturdays.', 'She playing badminton on Fridays.', 'They play soccer on Saturdays.', '', 1, 2, '2023-12-11 15:55:48', NULL, NULL),
(55, 75, 'Short Answers', 'The cat is ________ the box.', 'on', '', '', '', 'on', '6576c1270e9df_cat.png', 1, 2, '2023-12-11 15:58:31', NULL, NULL),
(56, 75, 'Multiple Choice Question', 'Which adjective describes the size of an object?', 'Blue', 'Heavy', 'Round', ' Ugly', 'Heavy', '', 1, 2, '2023-12-11 15:59:47', NULL, NULL),
(57, 75, 'True And False', 'Describing objects using prepositions of place helps us communicate more \r\nclearly. ', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-11 16:00:14', NULL, NULL),
(58, 75, 'Multiple Choice Question', 'Which sentence is in the present simple affirmative form?', 'They don\'t eat vegetables.', 'We are playing soccer.', 'He sings in the choir.', 'I will go to the park tomorrow.', 'He sings in the choir.', '', 1, 2, '2023-12-11 16:01:02', NULL, NULL),
(59, 75, 'Multiple Choice Question', 'Which preposition of place completes the sentence correctly?\r\n\"The bookshelf is _______ the wall.\"', 'in', 'on', 'above', 'beside', 'on', '', 1, 2, '2023-12-11 16:01:48', NULL, NULL),
(60, 75, 'True And False', '\"My brother has his own guitar\" is an example of a possessive adjective.', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-11 16:02:14', NULL, NULL),
(62, 124, 'Multiple Choice Question', 'Berapakah kemahiran proses sains?', '6', '8', '10', '12', '12', '', 1, 2, '2023-12-11 16:29:45', NULL, NULL),
(63, 124, 'Multiple Choice Question', 'Antara berikut yang manakah bukan kemahiran proses sains?', 'Mengelas', 'Mentafsir data', 'Membuat inferens', 'Merekod tempoh eksperimen', 'Merekod tempoh eksperimen', '', 1, 2, '2023-12-11 16:31:14', NULL, NULL),
(65, 124, 'Multiple Choice Question', 'Apakah kemahiran proses sains itu?', 'Meramal', 'Mengelas ', 'Membuat inferens', 'Mentafsir data', 'Membuat inferens', '6577b1b0f0af3_Screenshot_2023-12-12_090424.png', 1, 2, '2023-12-11 16:33:52', '2023-12-12 09:04:48', NULL),
(66, 124, 'Multiple Choice Question', 'Antara alat berikut, yang manakah digunakan untuk menyukat isi padu cecair?', 'Jam randik', 'Tabung uji', 'Termometer', 'Silinder penyukat', 'Silinder penyukat', '', 1, 2, '2023-12-11 16:34:49', NULL, NULL),
(67, 124, 'Multiple Choice Question', 'Rajah 1 menunjukkan suatu alat yang dapat membantu dalam satu penyiasatan. \r\nAntara kemahiran proses sains yang berikut, yang manakah melibatkan penggunaan\r\nalat tersebut?', 'Meramal', 'Mengelas', 'Memerhati', 'Membuat hipotesis', 'Memerhati', '6576ca9fa55d4_Screenshot_2023-12-11_163528.png', 1, 2, '2023-12-11 16:38:55', NULL, NULL),
(68, 124, 'Multiple Choice Question', 'Syahmi ingin menjalankan satu penyiasatan untuk mengenal pasti sifat asid. Apakah yang perlu dilakukan oleh Syahmi sebelum menjalankan penyiasatan tersebut?', 'Mengumpul data', 'Membuat kesimpulan', 'Menjalankan eksperimen', 'Merancang eksperimen', 'Merancang eksperimen', '', 1, 2, '2023-12-11 16:39:54', NULL, NULL),
(69, 124, 'Multiple Choice Question', 'Jadual berikut menunjukkan keputusan sebuah penyiasatan.\r\nRamalkan masa yang diambil untuk garam melarut ke dalam air bagi suhu 55 Darjah Celcius.', '15 saat', '25 saat', '35 saat', '45 saat', '35 saat', '', 1, 2, '2023-12-11 16:43:40', NULL, NULL),
(70, 124, 'Multiple Choice Question', 'Apakah inferens bagi pernyataan di atas?', 'Jumlah harimau berkurangan kerana pemburuan haram.', 'Bilangan harimau berkurangan kerana sukar membiak.', 'Habitat harimau musnah kerana pemburuan haram.', 'Kepupusan harimaau sudah dijangka.', 'Jumlah harimau berkurangan kerana pemburuan haram.', '6576ce26afa7b_pernyataan.png', 1, 2, '2023-12-11 16:53:58', NULL, NULL),
(71, 124, 'Multiple Choice Question', 'Pernyataan berikut adalah mengenai satu penyiasatan.\r\nApakah pemboleh ubah yang terlibat dalam penyiasatan ini?', 'Pemboleh ubah dimanipulasi: Suhu air, Pemboleh ubah bergerak balas: Masa gula melarut', 'Pemboleh ubah dimanipulasi: Suhu air, Pemboleh ubah bergerak balas: Jisim gula', 'Pemboleh ubah dimanipulasi: Masa gula melarut, Pemboleh ubah bergerak balas: Suhu air', 'Pemboleh ubah dimanipulasi: Masa gula melarut, Pemboleh ubah bergerak balas: Jisim gula', 'Pemboleh ubah dimanipulasi: Suhu air, Pemboleh ubah bergerak balas: Masa gula melarut', '6577b0c6b53f4_Screenshot_2023-12-12_090038.png', 1, 2, '2023-12-11 16:58:06', '2023-12-12 09:00:54', NULL),
(72, 100, 'Multiple Choice Question', 'Cerakinkan nombor 409 105 mengikut nilai digitnya.', '40 000 + 900 + 10 + 5 ', '400 000 + 900 + 10 + 5', '40 000 + 9 000 + 100 + 5', '400 000 + 9 000 + 100 + 5', '400 000 + 9 000 + 100 + 5', '', 1, 2, '2023-12-12 08:18:59', NULL, NULL),
(73, 100, 'Multiple Choice Question', 'Antara berikut, yang manakah mempunyai nilai bagi digit 3 yang paling kecil?', '243 195', '501 936', '856 273', '938 570', '856 273', '', 1, 2, '2023-12-12 08:19:39', NULL, NULL),
(74, 100, 'Multiple Choice Question', 'Bundarkan 625 073 kepada puluh ribu yang terdekat.', '600 000', '620 000', '625 000', '630 000', '630 000', '', 1, 2, '2023-12-12 08:20:33', NULL, NULL),
(75, 100, 'Multiple Choice Question', 'Antara nombor berikut, yang manakah lebih besar daripada 215 880?', '214 796', '217 001', '201 905', '210 851', '217 001', '', 1, 2, '2023-12-12 08:21:15', NULL, NULL),
(76, 100, 'True And False', 'Tulis nilai tempat bagi digit yang bergaris ialah ribu.\r\nAdakah pernyataan berikut benar atau salah?', 'True', 'False', '', '', 'True', '6577a7f2e4ac4_Screenshot_2023-12-12_082218.png', 1, 2, '2023-12-12 08:23:14', '2023-12-12 08:26:47', NULL),
(77, 100, 'True And False', 'Nilai digit bagi digit yang bergaris ialah 500.\r\nAdakah pernyataan berikut benar atau salah?', 'True', 'False', '', '', 'False', '6577a9349c895_gambar_1.png', 1, 2, '2023-12-12 08:28:36', '2023-12-12 08:30:17', NULL),
(78, 100, 'Multiple Choice Question', '802 390 – 443 395 – 7 611 =', '351 384', '351 420', '369 384', '751 384', '351 384', '', 1, 2, '2023-12-12 08:31:08', NULL, NULL),
(79, 100, 'Multiple Choice Question', 'M + 4 636 + 713 + 365 128 = 900 204. Cari nilai M.', '529 709', '529 727', '529 763', '538 727', '529 727', '', 1, 2, '2023-12-12 08:32:05', NULL, NULL),
(80, 100, 'Multiple Choice Question', '781 063 – 240 312 ÷ 10 =', '784 462.0', '783 465.8', '540 751.3', '757 031.8', '757 031.8', '', 1, 2, '2023-12-12 08:32:47', NULL, NULL),
(81, 100, 'Multiple Choice Question', '(10 132 + 610) × 48 =', '39 412', '302 932', '515 616', '522 532', '515 616', '', 1, 2, '2023-12-12 08:33:29', NULL, NULL),
(82, 100, 'Short Answers', 'Tuliskan 805 302 dalam perkataan.', 'Lapan ratus ribu lima tiga ratus dua', '', '', '', 'Lapan ratus ribu lima tiga ratus dua', '', 1, 2, '2023-12-12 08:33:57', NULL, NULL),
(83, 100, 'Short Answers', 'Nyatakan nilai tempat bagi digit 2 dalam nombor berikut 412 354.', 'Ribu', '', '', '', 'Ribu', '', 1, 2, '2023-12-12 08:34:23', NULL, NULL),
(84, 100, 'Short Answers', 'Nyatakan nilai digit bagi digit 6 dalam nombor berikut 460 123.', '60 000', '', '', '', '60 000', '', 1, 2, '2023-12-12 08:34:46', NULL, NULL),
(85, 124, 'Multiple Choice Question', 'Rajah di bawah menunjukkan bacaan jisim bagi empat objek, W, X, Y dan Z daripada \r\nsatu neraca spring. Manakah bacaan yang betul?', 'W-60, X-40, Y-80, Z-20', 'W-40, X-80, Y-60, Z-20', 'W-80, X-40, Y-20, Z-60', 'W-20, X-40, Y-60, Z-80', 'W-40, X-80, Y-60, Z-20', '6577adde812db_Screenshot_2023-12-12_084053.png', 1, 2, '2023-12-12 08:48:30', NULL, NULL),
(86, 124, 'Short Answers', 'Berdasarkan jadual di atas, nyatakan pemerhatian anda.', 'Bilangan harimau semakin menurun setiap tahun', '', '', '', 'Bilangan harimau semakin menurun setiap tahun', '6577ae1c26de6_Screenshot_2023-12-12_084856.png', 1, 2, '2023-12-12 08:49:32', NULL, NULL),
(87, 124, 'Short Answers', '2 (a) Ramalkan bilangan harimau pada tahun 2022', 'Jawapan kurang daripada 41', '', '', '', 'Jawapan kurang daripada 41', '6577ae5e751b4_Screenshot_2023-12-12_084856.png', 1, 2, '2023-12-12 08:50:38', NULL, NULL),
(88, 124, 'Short Answers', 'Nyatakan inferens anda berdasarkan jawapan anda di 2 (a).', 'Semakin banyak harimau diburu/ Pembalakan semakin berleluasa', '', '', '', 'Semakin banyak harimau diburu/ Pembalakan semakin berleluasa', '6577ae82f114c_Screenshot_2023-12-12_084856.png', 1, 2, '2023-12-12 08:51:14', NULL, NULL),
(89, 124, 'Short Answers', 'Cadangkan satu cara untuk menghalang harimau daripada kepupusan.', 'Kuatkuasakan undang-undang/ Banyakkan pemantauan pihak berkuasa/ Mana-mana jawapan yang sesuai.', '', '', '', 'Kuatkuasakan undang-undang/ Banyakkan pemantauan pihak berkuasa/ Mana-mana jawapan yang sesuai.', '6577aeb25e9cc_Screenshot_2023-12-12_084856.png', 1, 2, '2023-12-12 08:52:02', NULL, NULL),
(91, 55, 'Multiple Choice Question', 'Romzi pergi ke ___________ untuk mengepos surat kepada abangnya.', 'Pejabat pos Rawang', ' Pejabat Pos Rawang', 'pejabat pos Rawang', 'Pejabat Pos rawang', ' Pejabat Pos Rawang', '', 1, 2, '2023-12-12 09:14:17', NULL, NULL),
(92, 55, 'Multiple Choice Question', 'Bon Hong suka belajar pecahan. Dia belajar ____________ daripada Cikgu Amizah.', 'Bahasa Melayu', 'Sains', 'Matematik ', 'P. Islam', 'Matematik ', '', 1, 2, '2023-12-12 09:15:02', NULL, NULL),
(93, 55, 'Multiple Choice Question', 'Pak Hamid menggalas se ____________ senapang lalu menuju ke dusun duriannya.', 'gugus', 'pucuk', 'batang', ' laras', ' laras', '', 1, 2, '2023-12-12 09:15:46', NULL, NULL),
(94, 55, 'Multiple Choice Question', 'Jika kita selalu bersenam, kita dapat __________ otak.', 'mencerdaskan', 'mencergaskan', 'mengergaskan', 'membantutkan', 'mencerdaskan', '', 1, 2, '2023-12-12 09:16:21', NULL, NULL),
(95, 55, 'Multiple Choice Question', 'Amin dan Rohani lemah dalam mata pelajaran Bahasa Melayu. Mereka berjumpa dengan Cikgu Mirza untuk _____________ tentang puncanya.', 'mebincang', 'membincang', 'berbincang', 'bincang', 'berbincang', '', 1, 2, '2023-12-12 09:17:16', NULL, NULL),
(96, 55, 'Multiple Choice Question', 'Sungai itu ___________akibat musim kemarau yang melanda kawasan tersebut.', 'kering – kontang', 'kontang – kanting', 'compang – camping ', 'lintang – pukang', 'kering – kontang', '', 1, 2, '2023-12-12 09:18:02', NULL, NULL),
(97, 55, 'Multiple Choice Question', '“Beta __________ mengurniakan anugerah kepada rakyat yang berjasa kepada negara,” titah baginda sultan. ', 'bertitah', 'berangkat', 'berkenan', 'berdaulat', 'berkenan', '', 1, 2, '2023-12-12 09:18:54', NULL, NULL),
(98, 55, 'Multiple Choice Question', 'Sekumpulan _____________ dari Universiti Kebangsaan Malaysia menyertai program Khidmat Masyarakat itu. ', 'maharaja ', 'maharani ', 'mahaguru', 'mahasiswa', 'mahasiswa', '', 1, 2, '2023-12-12 09:19:37', NULL, NULL),
(99, 55, 'Multiple Choice Question', 'Syahmi berasa gerun apabila berada di tempat yang tinggi. \r\nPilih perkataan sinonim kepada gerun. ', 'hiba', 'takut', 'geram', 'seksa', 'takut', '', 1, 2, '2023-12-12 09:20:20', NULL, NULL),
(100, 55, 'Multiple Choice Question', 'Pilih ayat yang betul.', 'E-mel itu dihantar dari Loke Yew. ', 'Ardel rindu ke neneknya di kampung.', 'Jay Hong dilantik sebagai ketua kelas.', 'Penceramah itu sedang menyampaikan ceramah terhadap amalan menabung. ', 'Jay Hong dilantik sebagai ketua kelas.', '', 1, 2, '2023-12-12 09:21:00', NULL, NULL),
(101, 82, 'Multiple Choice Question', 'Nenek Arif menyapu sampah menggunakan ____________.\r\n', 'pengelap', 'penyapu', 'penyodok', '-', 'penyapu', '6580e2be4f16c_Screenshot_2023-12-19_082214.png', 1, 2, '2023-12-19 08:24:30', NULL, NULL),
(102, 82, 'Multiple Choice Question', 'Kakak minum ____________ sebelum pergi ke sekolah.', 'susu', 'surat khabar', 'kopi', '-', 'susu', '6580e451c6c65_Picture1.png', 1, 2, '2023-12-19 08:31:13', NULL, NULL),
(103, 82, 'Multiple Choice Question', '_____________ merawat pesakit di hospital.', 'Tentera', 'Doktor', 'Polis', '-', 'Doktor', '', 1, 2, '2023-12-19 08:32:54', NULL, NULL),
(104, 82, 'Multiple Choice Question', 'Aiman dan sepupunya tinggal di __________________.', 'Taman Permai', 'Balai Polis Permai', 'Taman Rekreasi Permai', '-', 'Taman Permai', '', 1, 2, '2023-12-19 08:34:58', NULL, NULL),
(105, 82, 'Multiple Choice Question', 'Aleeya ada seekor kucing bernama ______________.', 'Si Comel', 'Pak Belang', 'Proton Saga', '-', 'Si Comel', '6580e595af344_Picture2.jpg', 1, 2, '2023-12-19 08:36:37', NULL, NULL),
(106, 82, 'Multiple Choice Question', 'Murid-murid sedang membuat persembahan _____________di atas pentas.', 'Tarian Singa', 'Tarian Kipas', 'Tarian Sumazau', '-', 'Tarian Sumazau', '6580e5f2cd4f6_Picture3.jpg', 1, 2, '2023-12-19 08:38:10', NULL, NULL),
(107, 82, 'Multiple Choice Question', 'Puan Siti menyediakan cakoi dan tapai untuk tetamu ________.', 'dia', '-nya', 'mereka', '-', '-nya', '', 1, 2, '2023-12-19 08:40:11', NULL, NULL),
(108, 82, 'Multiple Choice Question', 'Pilih perkataan yang mengandungi digraf.', 'piano', 'merah', 'ungu', '-', 'ungu', '', 1, 2, '2023-12-19 08:45:11', NULL, NULL),
(109, 82, 'Multiple Choice Question', 'Pilih perkataan yang mengandungi konsonan bergabung.', 'peria', 'pantai', 'aiskrim', '-', 'aiskrim', '', 1, 2, '2023-12-19 08:46:07', NULL, NULL),
(110, 82, 'Multiple Choice Question', 'Pilih ayat yang betul.', 'Ibu membeli buku cerita di pasar.', 'Abang dan sepupu duduk di kereta sorong sambil berbual-bual.', 'Kakak memakai tudung yang berwarna merah.', '-', 'Kakak memakai tudung yang berwarna merah.', '', 1, 2, '2023-12-19 09:44:59', NULL, NULL),
(111, 82, 'Short Answers', 'Siapakah yang sedang membaca buku di bawah pohon rendang? (2 markah)\r\n\r\n(Sani,  Kakak, Ibu) yang sedang membaca buku di bawah pohon rendang.', 'Sani', '', '', '', 'Sani', '', 1, 2, '2023-12-19 09:51:14', NULL, NULL),
(112, 82, 'Short Answers', 'Sani berasa gembira kerana __________________________________________. (4 markah)', 'dapat menghirup udara yang segar', '', '', '', 'dapat menghirup udara yang segar', '6580f7720f927_Screenshot_2023-12-19_094637.png', 1, 2, '2023-12-19 09:52:50', NULL, NULL),
(113, 82, 'Short Answers', 'Senaraikan dua kata nama am yang terdapat pada teks. (4 markah)\r\n\r\n(i)	_____________________\r\n(ii)	_____________________', 'burung/ibu/rumah/pokok bunga/ikan/kolam/dan kata nama am yang terdapat dalam teks.', '', '', '', 'burung/ibu/rumah/pokok bunga/ikan/kolam/dan kata nama am yang terdapat dalam teks.', '6580f85fe84d7_Screenshot_2023-12-19_094637.png', 1, 2, '2023-12-19 09:56:47', NULL, NULL),
(114, 62, 'Multiple Choice Question', 'Which letter comes first in the alphabet?', 'A', 'Z', 'M', 'L', 'A', '6580fbfbcbcdd_Screenshot_2023-12-19_100144.png', 1, 2, '2023-12-19 10:12:11', NULL, NULL),
(115, 62, 'True And False', 'Uppercase letters are bigger than lowercase letters.', 'True', 'False', '', '', 'True', '6580fc47baf33_Screenshot_2023-12-19_100144.png', 1, 2, '2023-12-19 10:13:27', NULL, NULL),
(116, 62, 'Short Answers', 'The shape of the letter C is a _______.', 'curved line', '', '', '', 'curved line', '6580fca53847d_Screenshot_2023-12-19_100144.png', 1, 2, '2023-12-19 10:15:01', NULL, NULL),
(117, 62, 'Multiple Choice Question', 'What is the lowercase form of the letter B?', 'b', 'D', 'P', 'H', 'b', '6580fd84b8772_Screenshot_2023-12-19_100144.png', 1, 2, '2023-12-19 10:18:44', NULL, NULL),
(118, 62, 'True And False', 'The letter G has both an uppercase and a lowercase form.', 'True', 'False', '', '', 'False', '6580fdd528708_Screenshot_2023-12-19_100144.png', 1, 2, '2023-12-19 10:20:05', NULL, NULL),
(119, 62, 'Short Answers', ' The uppercase form of the letter y is _______.', 'Y', '', '', '', 'Y', '', 1, 2, '2023-12-19 10:21:09', NULL, NULL),
(120, 62, 'Multiple Choice Question', 'Which letter has a similar shape to the letter O?', 'Q', 'L', 'V', 'W', 'Q', '', 1, 2, '2023-12-19 10:21:53', NULL, NULL),
(121, 62, 'Multiple Choice Question', 'Which phrase is used to greet someone in a formal setting?', 'Goodbye', 'Thank you', 'Hello', 'Hey', 'Hello', '', 1, 2, '2023-12-19 10:23:16', NULL, NULL),
(122, 62, 'Multiple Choice Question', 'What is a suitable phrase to use when introducing yourself to a new friend?', 'How are you?', ' Nice to meet you.', 'Where are you from?', 'Thank you.', ' Nice to meet you.', '', 1, 2, '2023-12-19 10:25:08', NULL, NULL),
(123, 62, 'Multiple Choice Question', 'Which word has the same beginning sound as banana and the same ending sound as cat?', 'Elephant', 'Dog', 'Ant', 'Bat', 'Bat', '', 1, 2, '2023-12-19 10:26:17', NULL, NULL),
(124, 62, 'Short Answers', 'Write one object that starts with the letter B and write a sentence using the object. (2 marks)', 'Ball. I can play with a ball in the park. (Any suitable answer)', '', '', '', 'Ball. I can play with a ball in the park. (Any suitable answer)', '', 1, 2, '2023-12-19 10:27:05', NULL, NULL),
(125, 62, 'Short Answers', 'Write the uppercase letter for q, w, and z.', 'Q, W, Z', '', '', '', 'Q, W, Z', '', 1, 2, '2023-12-19 10:28:11', NULL, NULL),
(126, 62, 'Short Answers', 'In your opinion, why is it important to greet and introduce yourself when meeting new people? How can these simple gestures contribute to building strong friendships? (4 marks)', 'Any suitable answers.', '', '', '', 'Any suitable answers.', '', 1, 2, '2023-12-19 10:28:59', NULL, NULL),
(127, 108, 'True And False', 'Deria bagi hidung ialah deria pendengaran.', 'True', 'False', '', '', 'False', '658100d98e59e_Picture1.png', 1, 2, '2023-12-19 10:32:57', NULL, NULL),
(128, 108, 'True And False', 'Pernyataan di atas ialah _____.', 'True', 'False', '', '', 'True', '6581012c14e1b_Screenshot_2023-12-19_103338.png', 1, 2, '2023-12-19 10:34:20', NULL, NULL),
(129, 108, 'True And False', 'Berikut ialah cara penyimpanan kanta pembesar dengan betul.', 'True', 'False', '', '', 'False', '658101756f12f_Picture2.png', 1, 2, '2023-12-19 10:35:33', NULL, NULL),
(130, 108, 'Multiple Choice Question', 'Kita memerhati menggunakan ________.', 'kanta pembesar', 'teropong', 'deria', '-', 'deria', '', 1, 2, '2023-12-19 10:37:04', NULL, NULL),
(131, 108, 'Multiple Choice Question', 'Memerhati menggunakan deria ________________________________.', 'penglihatan, bau, sentuhan dan naluri hati', 'penglihatan, pendengaran, bau, sentuhan dan rasa', 'penglihatan, pendengaran, tangan, kaki dan rasa', '-', 'penglihatan, pendengaran, bau, sentuhan dan rasa', '', 1, 2, '2023-12-19 10:38:59', NULL, NULL),
(132, 108, 'Multiple Choice Question', 'Ibrahim membawa semua tabung uji yang digunakannya ke sinki untuk dicuci.\r\n\r\nApakah kemahiran manipulatif yang terdapat di atas?', 'Mengendalikan spesimen', 'Membersihkan peralatan', 'Menyimpan alatan', '-', 'Membersihkan peralatan', '', 1, 2, '2023-12-19 10:40:16', NULL, NULL),
(133, 108, 'Multiple Choice Question', 'Gambar berikut menunjukkan peralatan sains yang digunakan oleh murid selepas satu eksperimen.\r\n\r\nApakah tindakan yang perlu diambil oleh murid selepas mereka selesai menggunakan peralatan sains?', 'Melakar spesimen dengan betul', 'Membersihkan peralatan sains dengan betul', 'Serahkan kepada guru', '-', 'Membersihkan peralatan sains dengan betul', '6581030c01441_Picture3.png', 1, 2, '2023-12-19 10:42:20', NULL, NULL),
(134, 108, 'Multiple Choice Question', 'Antara berikut, yang manakah menunjukkan cara yang SALAH semasa mengendalikan spesimen hidup?\r\nI.	Kendalikan spesimen dengan berhati-hati.\r\nII.	Bunuh spesimen sebelum memulakan eksperimen.\r\nIII.	Letakkan spesimen dalam bekas tanpa sebarang ruang udara.\r\nIV.	Bilas spesimen dengan air.', 'I, II dan III', 'I, III dan IV', 'II, III dan IV', '-', 'II, III dan IV', '', 1, 2, '2023-12-19 10:44:07', NULL, NULL),
(135, 108, 'Multiple Choice Question', 'Berikut merupakan sebuah situasi yang berlaku di rumah Ali. Berdasarkan situasi di atas, susun deria yang digunakan oleh Ali.', 'Deria bau - Deria sentuhan - Deria rasa', 'Deria sentuhan - Deria rasa - Deria penglihatan', 'Deria bau - Deria penglihatan - Deria sentuhan', '-', 'Deria bau - Deria penglihatan - Deria sentuhan', '6581041b9fd6d_Screenshot_2023-12-19_104441.png', 1, 2, '2023-12-19 10:46:51', NULL, NULL),
(136, 108, 'Multiple Choice Question', 'Gambar berikut menunjukkan situasi di Bilik Sains di Sekolah X.\r\n\r\nBerdasarkan situasi tersebut, apakah Kemahiran Manipulatif yang TIDAK diamalkan oleh Sekolah X?\r\n\r\nI. Menggunakan dan mengendalikan peralatan sains dan bahan dengan betul.\r\nII. Membersihkan peralatan sains dengan cara yang betul.\r\nIII. Menyimpan peralatan sains dan bahan dengan betul dan selamat.\r\n', 'I dan II', 'II dan III', 'I, II dan III', '-', 'I, II dan III', '65810532b3a83_Picture4.png', 1, 2, '2023-12-19 10:51:30', NULL, NULL),
(137, 108, 'Short Answers', 'Berdasarkan Gambar 1, nyatakan deria-deria yang terlibat.\r\n\r\n_________________________________________________________________________', 'Deria rasa/sentuhan/bau/penglihatan', '', '', '', 'Deria rasa/sentuhan/bau/penglihatan', '658105b858c29_Screenshot_2023-12-19_105218.png', 1, 2, '2023-12-19 10:53:44', '2023-12-19 11:13:54', NULL),
(138, 108, 'Short Answers', 'Nyatakan dua cara kita berkomunikasi.\r\n\r\n_________________________________________________________________________', 'Lisan/Lakaran/Tulisan', '', '', '', 'Lisan/Lakaran/Tulisan', '', 1, 2, '2023-12-19 10:55:01', '2023-12-19 11:13:35', NULL),
(139, 108, 'Short Answers', 'Gambar 2 di bawah menunjukkan situasi di sekolah Y.\r\n\r\nBerdasarkan Gambar 2, nyatakan kemahiran manipulatif yang telah diamalkan di sekolah Y.\r\n\r\n_________________________________________________________________________', 'Menggunakan dan mengendalikan peralatan sains dan bahan dengan betul. Mana mana jawapan yang sesuai.', '', '', '', 'Menggunakan dan mengendalikan peralatan sains dan bahan dengan betul. Mana mana jawapan yang sesuai.', '6581077852390_Screenshot_2023-12-19_105523.png', 1, 2, '2023-12-19 11:01:12', '2023-12-19 11:13:16', NULL),
(140, 84, 'True And False', 'Lima belas jika ditulis dalam angka ialah 15.\r\n\r\nAdakah pernyataan di atas benar atau salah?', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-19 11:32:09', NULL, NULL),
(141, 84, 'True And False', '58 jika ditulis dalam ayat matematik menjadi empat puluh lapan.\r\n\r\nAdakah pernyataan di atas benar atau salah?', 'True', 'False', '', '', 'False', '', 1, 2, '2023-12-19 11:35:12', NULL, NULL),
(142, 84, 'Short Answers', 'Tuliskan ayat matematik bagi rajah berikut.', 'Sepuluh; Dua belas', '', '', '', 'Sepuluh; Dua belas', '65810ffb9607f_Screenshot_2023-12-19_113550.png', 1, 2, '2023-12-19 11:37:31', NULL, NULL),
(143, 79, 'Multiple Choice Question', 'Personality refers to a person\'s __________ and __________ traits.', 'physical, mental', 'emotional, behavioural', 'social, cultural', ' intellectual, academic', 'emotional, behavioural', '', 1, 2, '2023-12-19 11:40:52', '2023-12-19 15:02:01', NULL),
(144, 79, 'True And False', 'Personality does not affect our behaviour or interactions with others.', 'True', 'False', '', '', 'False', '', 1, 2, '2023-12-19 11:42:18', NULL, NULL),
(145, 79, 'Multiple Choice Question', 'Which of the following is an example of a personality trait?', 'Running fast', ' Having good eyesight', 'Being kind', 'Singing loudly', 'Being kind', '', 1, 2, '2023-12-19 11:43:12', NULL, NULL),
(146, 79, 'Multiple Choice Question', 'Personal information helps us understand others and __________ connections.', 'break', ' avoid', ' strengthen', 'confuse', ' strengthen', '', 1, 2, '2023-12-19 11:44:29', NULL, NULL),
(147, 79, 'True And False', 'Personal information is not important for building relationships. ', 'True', 'False', '', '', 'False', '', 1, 2, '2023-12-19 11:47:36', NULL, NULL),
(148, 79, 'Multiple Choice Question', 'When observing a picture or object representing a family or group, what can we do to gather more information?', 'Ignore it', 'Make assumptions without asking questions', 'Ask questions', ' Keep our thoughts to ourselves', 'Ask questions', '', 1, 2, '2023-12-19 11:48:33', NULL, NULL),
(149, 84, 'Short Answers', 'Tuliskan bilangan objek dalam angka dan perkataan.', '4, empat; 12, dua belas', '', '', '', '4, empat; 12, dua belas', '65811296c0f25_Screenshot_2023-12-19_113813.png', 1, 2, '2023-12-19 11:48:38', NULL, NULL),
(150, 84, 'Short Answers', 'Tuliskan bilangan objek dalam angka.', '27; 32', '', '', '', '27; 32', '6581131af2361_Screenshot_2023-12-19_113845.png', 1, 2, '2023-12-19 11:50:50', NULL, NULL),
(152, 84, 'Short Answers', 'Tuliskan nombor yang akan menjadi 30 jika dibundarkan kepada puluh yang terdekat.\r\n\r\n_______________________________', '26; 28; 30', '', '', '', '26; 28; 30', '65811466ca10d_Screenshot_2023-12-19_115516.png', 1, 2, '2023-12-19 11:56:22', '2023-12-19 11:56:47', NULL),
(153, 84, 'Multiple Choice Question', 'Nombor 56 jika dibundarkan kepada puluh yang terdekat menjadi __________.', '50', '60', '55', '-', '60', '', 1, 2, '2023-12-19 11:57:55', NULL, NULL),
(154, 84, 'Multiple Choice Question', 'Nombor 78 jika dibundarkan kepada puluh yang terdekat menjadi __________.', '75', '70', '80', '-', '80', '', 1, 2, '2023-12-19 11:58:38', NULL, NULL),
(155, 84, 'Multiple Choice Question', 'Nilai tempat bagi digit 9 dalam nombor 89 ialah __________.', '9', 'sa', 'puluh', '-', 'sa', '', 1, 2, '2023-12-19 12:00:46', NULL, NULL),
(156, 79, 'True And False', 'Professions and roles can vary based on different cultures and societies. ', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-19 12:02:13', NULL, NULL),
(157, 79, 'Multiple Choice Question', 'Which of the following is NOT a profession?', 'Doctor', 'Teacher', 'Chef', ' Unicorn trainer', ' Unicorn trainer', '', 1, 2, '2023-12-19 12:07:42', NULL, NULL),
(158, 79, 'Multiple Choice Question', 'Each profession requires specific __________ and __________ to perform the job effectively.', 'skills, knowledge', 'clothes, shoes', 'friends, connections', 'colours, patterns', 'skills, knowledge', '', 1, 2, '2023-12-19 12:10:15', NULL, NULL),
(159, 84, 'Multiple Choice Question', 'Digit yang manakah dalam nombor 52 berada di nilai tempat puluh?', '2', '5', '50', '-', '5', '', 1, 2, '2023-12-19 12:26:32', NULL, NULL),
(160, 84, 'Short Answers', 'Tuliskan nombor berikut dalam bentuk perkataan.\r\n\r\n85 = ______________________________________________\r\n73 = ______________________________________________\r\n62 = ______________________________________________\r\n59 = ______________________________________________', 'Lapan puluh lima; Tujuh puluh tiga; Enam puluh dua; Lima puluh sembilan', '', '', '', 'Lapan puluh lima; Tujuh puluh tiga; Enam puluh dua; Lima puluh sembilan', '', 1, 2, '2023-12-19 12:29:52', NULL, NULL),
(161, 84, 'Short Answers', 'Isikan tempat kosong pada kombinasi nombor yang berikut.', '9; 5; 10; 10; 10; 7', '', '', '', '9; 5; 10; 10; 10; 7', '65811d0cd2f25_Screenshot_2023-12-19_123122.png', 1, 2, '2023-12-19 12:33:16', NULL, NULL),
(162, 84, 'Short Answers', 'Lengkapkan jadual yang berikut. ', '50; 30; 30; 90', '', '', '', '50; 30; 30; 90', '65811defc2408_Screenshot_2023-12-19_123630.png', 1, 2, '2023-12-19 12:37:03', NULL, NULL),
(164, 39, 'Multiple Choice Question', 'Yahya menyediakan sebuah ________________ untuk ibunya.', 'hadiah', 'kek', 'bunga', '-', 'hadiah', '6581350fd869a_Picture1.png', 1, 2, '2023-12-19 14:15:43', NULL, NULL),
(165, 39, 'Multiple Choice Question', 'Soo Mei membeli ___________ dan _____________ di Kedai Kek Permai untuk membuat kuih bahulu.', 'kamus, majalah', 'tepung gandum, telur', 'baju, seluar', '-', 'tepung gandum, telur', '658135a0deec5_Picture2.png', 1, 2, '2023-12-19 14:18:08', NULL, NULL),
(166, 39, 'Multiple Choice Question', 'Keluarga Hana singgah di _______________ untuk makan malam.', 'Restoran Enak Rasa', 'Kedai Baju Akimi', 'Balai Polis Bukit Bintang', '-', 'Restoran Enak Rasa', '', 1, 2, '2023-12-19 14:19:33', NULL, NULL),
(167, 39, 'Multiple Choice Question', 'Hobi abang Raju ialah bermain _______________.', 'kasut roda', 'papan selaju', 'pelampung', '-', 'papan selaju', '65813809c670d_Picture3.jpg', 1, 2, '2023-12-19 14:28:25', NULL, NULL),
(168, 39, 'Multiple Choice Question', 'Pravin seorang yang _______________ kerana cepat memahami pengajaran guru.', 'berat tulang', 'anak kandung', 'otak cair', '-', 'otak cair', '', 1, 2, '2023-12-19 14:29:32', NULL, NULL),
(169, 39, 'Multiple Choice Question', 'Pilih ayat yang betul.', 'Hana buah hati kerana suka membantu orang lain.', 'Rahimi merupakan anak buah dalam keluarganya.', 'Ravin seorang yang ringan tulang, dia sentiasa membantu ibunya membuat kerja rumah.', '-', 'Ravin seorang yang ringan tulang, dia sentiasa membantu ibunya membuat kerja rumah.', '', 1, 2, '2023-12-19 14:30:47', NULL, NULL),
(171, 39, 'Multiple Choice Question', '____________ dibawa ke Klinik Haiwan Desa kerana kakinya tercedera.', 'Si Putih', 'Lageswari', 'Malaysia', '-', 'Si Putih', '', 1, 2, '2023-12-19 14:35:40', NULL, NULL),
(173, 39, 'Multiple Choice Question', 'Ibu Hana menutup makanan dengan tudung saji __________ tidak dihinggapi lalat.', 'tetapi', 'untuk', 'supaya', '-', 'supaya', '', 1, 2, '2023-12-19 14:37:33', NULL, NULL),
(174, 39, 'Multiple Choice Question', 'Datuk memakai se_____________ cermin mata semasa membaca surat khabar.', 'buah', 'pasang', 'batang', '-', 'pasang', '65813a6bebe7c_Picture4.jpg', 1, 2, '2023-12-19 14:38:35', NULL, NULL),
(175, 39, 'Multiple Choice Question', 'Pilih ayat yang betul.', 'Lelaki itu menghadiahi isterinya sebentuk cincin emas.', 'Nenek membawa sebatang payung semasa hari hujan.', 'Datuk memakai sebuah cermin mata semasa membaca surat khabar.', '-', 'Lelaki itu menghadiahi isterinya sebentuk cincin emas.', '', 1, 2, '2023-12-19 14:39:29', NULL, NULL),
(176, 39, 'Short Answers', 'Bilakah Helmi sekeluarga pulang ke kampung datuk? (2 markah)\r\n\r\n_________________________________________________________________________', 'Helmi sekeluarga pulang ke kampung datuk pada cuti sekolah yang lalu.', '', '', '', 'Helmi sekeluarga pulang ke kampung datuk pada cuti sekolah yang lalu.', '65813b0cb2f10_Screenshot_2023-12-19_125902.png', 1, 2, '2023-12-19 14:41:16', NULL, NULL),
(177, 39, 'Short Answers', 'Senaraikan buah-buahan yang terdapat di dusun datuk Helmi. (4 markah)\r\n(i)	__________________________  (ii) _____________________________\r\n(iii)	__________________________  (iv) _____________________________\r\n', 'durian / rambutan / langsat / manggis', '', '', '', 'durian / rambutan / langsat / manggis', '65813b9022ffb_Screenshot_2023-12-19_125902.png', 1, 2, '2023-12-19 14:43:28', '2023-12-19 14:47:18', NULL),
(178, 39, 'Short Answers', 'Adakah Helmi berasa gembira di dusun datuk? Mengapa? (4 markah)\r\n__________________________________________________________________________________________________________________________________________________\r\n', 'Ya, Helmi berasa gembira di dusun datuk kerana dapat menikmati buah-buahan yang enak. ', '', '', '', 'Ya, Helmi berasa gembira di dusun datuk kerana dapat menikmati buah-buahan yang enak. ', '65813c529f5d1_Screenshot_2023-12-19_125902.png', 1, 2, '2023-12-19 14:46:42', NULL, NULL),
(179, 63, 'Multiple Choice Question', 'Saturday comes after __________.', 'Friday', 'Sunday', 'Monday', 'Wednesday', 'Friday', '65813e1276562_Screenshot_2023-12-19_145114.png', 1, 2, '2023-12-19 14:54:10', NULL, NULL),
(180, 63, 'True And False', 'We have seven days a week. ', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-19 14:54:54', NULL, NULL),
(181, 63, 'Multiple Choice Question', 'Which day comes before Thursday?', 'Wednesday', 'Friday', 'Monday', 'Saturday', 'Wednesday', '', 1, 2, '2023-12-19 14:55:32', NULL, NULL),
(182, 63, 'Multiple Choice Question', 'Saturday and Sunday are ________.', 'weekdays', 'weekends', 'months', 'years', 'weekends', '', 1, 2, '2023-12-19 14:56:53', NULL, NULL),
(183, 63, 'True And False', 'Friday is the third day of the week. ', 'True', 'False', '', '', 'False', '', 1, 2, '2023-12-19 15:01:19', NULL, NULL),
(184, 79, 'Multiple Choice Question', 'A person\'s __________ and __________ can influence the choice of their profession.\r\n', 'hobbies, interests', 'height, weight', 'birth date, birthplace', 'diet, physical appearance', 'hobbies, interests', '', 1, 2, '2023-12-19 15:04:51', NULL, NULL),
(185, 63, 'Multiple Choice Question', 'Which day is two days after Tuesday?', 'Wednesday', 'Thursday', 'Monday', 'Sunday', 'Thursday', '658140a7ee02f_Screenshot_2023-12-19_145129.png', 1, 2, '2023-12-19 15:05:11', NULL, NULL),
(186, 63, 'Multiple Choice Question', '______ Saturday, I like to go to the park with my friends.', 'At', 'On', 'In', '-', 'On', '', 1, 2, '2023-12-19 15:06:19', NULL, NULL),
(187, 63, 'True And False', 'The weekend starts on Monday. ', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-19 15:07:27', NULL, NULL),
(188, 63, 'Multiple Choice Question', 'Which day is often considered a rest day or a day off?', 'Monday', 'Wednesday', 'Thursday', 'Saturday', 'Saturday', '', 1, 2, '2023-12-19 15:08:57', NULL, NULL),
(189, 63, 'Multiple Choice Question', '_________ comes after Wednesday.', 'Wednesday', 'Monday', 'Thursday', 'Friday', 'Thursday', '', 1, 2, '2023-12-19 15:09:49', NULL, NULL),
(190, 63, 'Short Answers', 'Which day is your favourite day of the week? Why is it your favourite day?', 'Any suitable answers by students', '', '', '', 'Any suitable answers by students', '6581425d20a92_Screenshot_2023-12-19_145149.png', 1, 2, '2023-12-19 15:12:29', '2023-12-19 15:13:22', NULL),
(191, 63, 'Short Answers', 'Describe one activity you enjoy doing during your free time. When do you usually do it?\r\n\r\n______________________________________________________________________________________________________________________________________________________', 'Any suitable answers by students', '', '', '', 'Any suitable answers by students', '658142d92a0a9_Screenshot_2023-12-19_145149.png', 1, 2, '2023-12-19 15:14:33', '2023-12-19 15:14:53', NULL),
(192, 63, 'Short Answers', 'If you could add an extra day to the week, what would you name it and what activities would you do on that day?\r\n\r\n______________________________________________________________________________________________________________________________________________________', 'Any suitable answers by students', '', '', '', 'Any suitable answers by students', '6581431aa40d1_Screenshot_2023-12-19_145149.png', 1, 2, '2023-12-19 15:15:38', '2023-12-19 15:15:58', NULL),
(193, 112, 'True And False', 'Mengelas adalah Kemahiran Proses Sains.', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-19 15:18:09', NULL, NULL),
(194, 112, 'True And False', '“Kemahiran manipulatif ialah kemahiran menggunakan dan mengendalikan peralatan dan bahan sains dengan betul ketika menjalankan penyiasatan sains.”\r\n\r\nPernyataan di atas adalah _____.\r\n', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-19 15:19:32', NULL, NULL),
(195, 112, 'Multiple Choice Question', 'Apakah alat yang sesuai untuk mengukur berat?', 'Pembaris', 'Jam randik', 'Penimbang', '-', 'Penimbang', '', 1, 2, '2023-12-19 15:20:24', NULL, NULL),
(196, 112, 'Multiple Choice Question', 'Kucing itu berwarna kelabu dan putih. Saya memerhati kucing itu dengan deria ___________.', 'penglihatan', 'pendengaran', 'sentuhan', '-', 'penglihatan', '', 1, 2, '2023-12-19 15:21:32', NULL, NULL),
(197, 112, 'Multiple Choice Question', 'Tangan Amin berasa sakit apabila tersentuh duri kaktus. Apakah deria yang terlibat?', 'Penglihatan', 'Pendengaran', 'Sentuhan', '-', 'Sentuhan', '658144da2ab50_Picture1.png', 1, 2, '2023-12-19 15:23:06', NULL, NULL),
(198, 112, 'Multiple Choice Question', 'Berapakah panjang pensel tersebut?', '15 cm', '16 cm', '16 mm', '-', '16 cm', '65814561f0e96_Picture2.png', 1, 2, '2023-12-19 15:25:21', NULL, NULL),
(199, 112, 'Multiple Choice Question', 'Berdasarkan jadual di atas, berapakah berat Ah Meng? ', '45', '145', '39', '-', '39', '658145a4b2fea_Picture3.png', 1, 2, '2023-12-19 15:26:28', NULL, NULL),
(200, 112, 'Multiple Choice Question', 'Gambar tersebut menunjukkan tiga jenis haiwan. Apakah persamaan ketiga-tiga haiwan itu?', 'Warna', 'Tempat tinggal', 'Bentuk badan ', '-', 'Tempat tinggal', '65814620604d3_Picture4.png', 1, 2, '2023-12-19 15:28:32', NULL, NULL),
(201, 112, 'Multiple Choice Question', 'Apakah deria yang digunakan untuk membuat pemerhatian dengan bantuan alat tersebut?', 'Deria penglihatan; Deria sentuhan', 'Deria pendengaran; Deria penglihatan', 'Deria sentuhan; Deria rasa', '-', 'Deria pendengaran; Deria penglihatan', '658146e467913_Screenshot_2023-12-19_153013.png', 1, 2, '2023-12-19 15:31:48', NULL, NULL),
(202, 112, 'Multiple Choice Question', 'Gambar berikut menunjukkan haiwan yang telah dikelaskan mengikut ciri anggota badan.\r\n\r\nPilih ciri-ciri berbeza yang betul bagi pengelasan di atas.  ', 'Haiwan X tidak mempunyai kepak, manakala Haiwan Y mempunyai kepak.', 'Haiwan X mempunyai 2 kaki, manakala Haiwan Y mempunyai 4 kaki.', 'Haiwan X mempunyai pelepah, manakala Haiwan Y tidak mempunyai pelepah.', '-', 'Haiwan X tidak mempunyai kepak, manakala Haiwan Y mempunyai kepak.', '65814ac8e7643_Screenshot_2023-12-19_153232.png', 1, 2, '2023-12-19 15:48:24', '2023-12-19 16:07:25', NULL),
(203, 112, 'Short Answers', 'Berdasarkan Gambar 1, nyatakan spesimen, peralatan dan bahan sains yang digunakan oleh Rahim.\r\nSpesimen	: _____________________________________\r\nBahan		: _____________________________________\r\nPeralatan Sains: ____________________________________\r\n', 'Anak pokok; Pasu plastik; Kanta Pembesar', '', '', '', 'Anak pokok; Pasu plastik; Kanta Pembesar', '65815046018d0_Screenshot_2023-12-19_160946.png', 1, 2, '2023-12-19 16:11:50', NULL, NULL),
(204, 112, 'Short Answers', 'Cadangkan apa yang patut dibuat oleh Rahim setelah selesai melakukan eksperimen.\r\n\r\n_________________________________________________________________________\r\n', 'Membasuh peralatan sains/menyimpan peralatan sains/Mana-mana jawapan yang sesuai', '', '', '', 'Membasuh peralatan sains/menyimpan peralatan sains/Mana-mana jawapan yang sesuai', '658150ad82ff4_Screenshot_2023-12-19_160946.png', 1, 2, '2023-12-19 16:13:33', NULL, NULL),
(205, 112, 'Short Answers', 'Berdasarkan senarai haiwan di bawah, kelaskan dan tulis haiwan-haiwan berdasarkan peta buih berganda berikut.', 'Darat - Gajah, kambing, arnab; Air - Penyu, paus, ikan emas; Darat dan air - Katak, buaya', '', '', '', 'Darat - Gajah, kambing, arnab; Air - Penyu, paus, ikan emas; Darat dan air - Katak, buaya', '658152a6f3538_Screenshot_2023-12-19_162043.png', 1, 2, '2023-12-19 16:21:58', NULL, NULL),
(206, 88, 'True And False', '“Empat ratus jika ditulis dalam angka ialah 400.“\r\n\r\nAdakah pernyataan di atas benar atau salah?', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-19 16:33:04', NULL, NULL),
(207, 88, 'True And False', '\"158 jika ditulis dalam ayat matematik menjadi empat puluh lapan.”\r\n\r\nAdakah pernyataan di atas benar atau salah?', 'True', 'False', '', '', 'False', '', 1, 2, '2023-12-19 16:33:47', NULL, NULL),
(208, 88, 'Short Answers', 'Tuliskan bilangan bagi rajah berikut.', 'seratus dua puluh lapan; seratus enam puluh empat', '', '', '', 'seratus dua puluh lapan; seratus enam puluh empat', '658155e0db930_Screenshot_2023-12-19_163417.png', 1, 2, '2023-12-19 16:35:44', NULL, NULL),
(209, 88, 'Short Answers', 'Tuliskan bilangan objek dalam angka dan perkataan.', '4, empat; 12, dua belas', '', '', '', '4, empat; 12, dua belas', '6581563b2e431_Screenshot_2023-12-19_113813.png', 1, 2, '2023-12-19 16:37:15', NULL, NULL),
(210, 88, 'Short Answers', 'Tuliskan bilangan objek dalam angka.', '27; 32', '', '', '', '27; 32', '6581567d63c3d_Screenshot_2023-12-19_113845.png', 1, 2, '2023-12-19 16:38:21', NULL, NULL),
(211, 88, 'Short Answers', 'Tuliskan bilangan objek berikut dalam bentuk perkataan.\r\n\r\n________________________________________________________________', 'Lapan belas; tiga puluh', '', '', '', 'Lapan belas; tiga puluh', '65815711c7e94_Screenshot_2023-12-19_163920.png', 1, 2, '2023-12-19 16:40:49', '2023-12-19 16:41:15', NULL),
(212, 88, 'Multiple Choice Question', 'Bulatkan jawapan yang betul.', '304', '380', '308', '-', '308', '658157ede9dcd_Screenshot_2023-12-19_164148.png', 1, 2, '2023-12-19 16:44:00', '2023-12-19 16:44:29', NULL),
(213, 88, 'Multiple Choice Question', 'Bulatkan jawapan yang betul.', '352', '752', '796', '-', '796', '6581582743ee7_Screenshot_2023-12-19_164209.png', 1, 2, '2023-12-19 16:45:27', NULL, NULL),
(214, 88, 'Multiple Choice Question', 'Bulatkan jawapan yang betul.', '244', '204', '240', '-', '240', '6581586474a32_Screenshot_2023-12-19_164224.png', 1, 2, '2023-12-19 16:46:28', NULL, NULL),
(215, 88, 'Multiple Choice Question', 'Antara berikut yang manakah merupakan kombinasi yang betul? ', '533', '543', '534', '-', '534', '658159248f53e_Screenshot_2023-12-19_164235.png', 1, 2, '2023-12-19 16:49:40', NULL, NULL),
(216, 88, 'Short Answers', 'Tuliskan nombor berikut dalam bentuk perkataan.\r\n\r\n850 = ____________________________________________________________', 'Lapan ratus lima puluh', '', '', '', 'Lapan ratus lima puluh', '', 1, 2, '2023-12-19 16:53:15', NULL, NULL);
INSERT INTO `doit_online` (`do_id`, `lesson_id`, `do_question_type`, `do_question`, `do_question_answer1`, `do_question_answer2`, `do_question_answer3`, `do_question_answer4`, `do_correct_answer`, `do_image`, `do_status`, `do_created_by`, `do_created_date`, `do_updated_date`, `do_deleted_date`) VALUES
(217, 88, 'Short Answers', 'Tuliskan nombor berikut dalam bentuk angka. \r\n\r\nTiga ratus sembilan puluh tujuh = __________\r\nDua ratus tiga puluh lima = __________\r\nEnam ratus empat = __________\r\nTujuh ratus tiga belas = __________', '397; 235; 604; 713', '', '', '', '397; 235; 604; 713', '', 1, 2, '2023-12-19 16:54:46', NULL, NULL),
(218, 88, 'Short Answers', 'Isikan nilai tempat dan nilai digit bagi nombor yang bergaris.', 'Puluh, 20; Sa, 2; Ratus, 300; Puluh, 70', '', '', '', 'Puluh, 20; Sa, 2; Ratus, 300; Puluh, 70', '65815ace48520_Screenshot_2023-12-19_165517.png', 1, 2, '2023-12-19 16:56:46', NULL, NULL),
(219, 44, 'Multiple Choice Question', 'Meng Kai ____________ tangan selepas memanjat pokok mangga di halaman rumah. ', 'mengelap', 'mencuci', 'memupuk', '-', 'mencuci', '6582a2fb3ae99_Screenshot_2023-12-20_161014.png', 1, 2, '2023-12-20 16:16:59', NULL, NULL),
(220, 44, 'Multiple Choice Question', 'Haris dan ayahnya ______________ kasut but dan sarung tangan ketika berkebun.', 'mengelap', 'menggilap', 'memakai', '-', 'memakai', '', 1, 2, '2023-12-20 16:19:44', NULL, NULL),
(221, 44, 'Multiple Choice Question', 'Nanas Sawit berasal ____________ negeri Sarawak.', 'dari', 'daripada', 'di', '-', 'dari', '', 1, 2, '2023-12-20 16:21:19', NULL, NULL),
(222, 44, 'Multiple Choice Question', '“___________ harus mencuci tangan selepas pergi ke tandas,” kata Cikgu Taha kepada \r\nHasnah.', 'Mereka', 'Saya', 'Kamu', '-', 'Kamu', '', 1, 2, '2023-12-20 16:22:43', NULL, NULL),
(223, 44, 'Multiple Choice Question', 'Encik Lim menjemput ___________ tetamu yang hadir ke rumah terbukanya untuk menikmati juadah yang disediakan. ', 'seorang', 'semua ', 'separuh', '-', 'semua ', '', 1, 2, '2023-12-20 16:24:00', NULL, NULL),
(224, 44, 'Multiple Choice Question', 'Pak Cik Lim menjual se ______________ pisang kepada Ali yang berniaga di pasar. ', 'sikat', 'biji', 'tandan ', '-', 'tandan ', '6582a51617b50_Screenshot_2023-12-20_162509.png', 1, 2, '2023-12-20 16:25:58', NULL, NULL),
(225, 44, 'Multiple Choice Question', 'Thong Seng membacakan surat khabar kepada datuknya yang __________ itu. ', 'buta huruf', 'buta mata ', 'mata tajam ', '-', 'buta huruf', '', 1, 2, '2023-12-20 16:27:26', NULL, NULL),
(226, 44, 'Multiple Choice Question', 'Pengambilan terlalu banyak makanan ringan akan ___________ kesihatan. ', 'menjejaskan', 'menyihatkan', 'merimaskan ', '-', 'menjejaskan', '', 1, 2, '2023-12-20 16:28:16', NULL, NULL),
(227, 44, 'Short Answers', 'Berdasarkan emel di atas, mengapakah kita harus menjaga kebersihan persekitaran rumah? (2 markah)', 'Kita haruslah menjaga kebersihan persekitaran rumah untuk pencegahan pembiakan  nyamuk.', '', '', '', 'Kita haruslah menjaga kebersihan persekitaran rumah untuk pencegahan pembiakan  nyamuk.', '6582a79562e05_Screenshot_2023-12-20_163537.png', 1, 2, '2023-12-20 16:36:37', NULL, NULL),
(228, 44, 'Short Answers', 'Apakah unsur makanan yang berkhasiat harus kita makan setiap hari? (4 markah)', 'Karbohidrat / protein / vitamin /serat tumbuhan / mineral', '', '', '', 'Karbohidrat / protein / vitamin /serat tumbuhan / mineral', '6582a7fac1522_Screenshot_2023-12-20_163537.png', 1, 2, '2023-12-20 16:38:18', NULL, NULL),
(229, 44, 'Short Answers', 'Nyatakan langkah-langkah lain yang dapat menyihatkan badan selain daripada mengamalkan gaya pemakanan yang sihat. (4 markah)\r\n', 'rajin bersenam / menjaga  kebersihan anggota badan', '', '', '', 'rajin bersenam / menjaga  kebersihan anggota badan', '6582aa032294a_Screenshot_2023-12-20_163537.png', 1, 2, '2023-12-20 16:46:59', NULL, NULL),
(230, 43, 'Short Answers', 'Pada pendapat kamu, apakah kebaikan mengadakan gotong-royong tersebut? (4 markah)\r\n', 'menghasilkan suasana yang ceria / mengeratkan hubungan sesama jiran ', '', '', '', 'menghasilkan suasana yang ceria / mengeratkan hubungan sesama jiran ', '6582ab0932ac0_text.png', 1, 2, '2023-12-20 16:51:21', NULL, NULL),
(231, 45, 'Multiple Choice Question', 'Acara sukaneka itu akan diadakan ___________ pukul sepuluh pagi.', 'ke', 'di', 'pada', '-', 'pada', '', 1, 2, '2023-12-20 16:57:09', NULL, NULL),
(232, 45, 'Multiple Choice Question', 'Kita mestilah mematuhi arahan ____________ di jalan raya.', 'lampu tiga warna', 'lampu isyarat', 'lampu bomba', '-', 'lampu isyarat', '6582ace55f7dc_Screenshot_2023-12-20_165837.png', 1, 2, '2023-12-20 16:59:17', NULL, NULL),
(233, 45, 'Multiple Choice Question', 'Sup yang disediakan oleh emak itu sungguh ___________.', 'busuk', 'lemau', 'enak', '-', 'enak', '', 1, 2, '2023-12-20 17:00:37', NULL, NULL),
(234, 45, 'Multiple Choice Question', 'Kanak-kanak tidak boleh bermain di dalam bilik air ________ agak licin.', 'kerana', 'tetapi', 'lalu', '-', 'kerana', '', 1, 2, '2023-12-20 17:01:35', NULL, NULL),
(235, 45, 'Multiple Choice Question', 'Salina mengucapkan terima kasih kepada pemandu bas ______________ menuruni bas. ', 'sementara', 'sebelum', 'selepas', '-', 'sebelum', '', 1, 2, '2023-12-20 17:02:50', NULL, NULL),
(236, 45, 'Multiple Choice Question', 'Atikah ___________ayahnya datang menjemputnya untuk pulang ke rumah.', 'menunggu', 'tertunggu', 'ditunggu', '-', 'menunggu', '', 1, 2, '2023-12-20 17:03:42', NULL, NULL),
(237, 45, 'Multiple Choice Question', '______________ harga seikat bayam dan sekilo ikan bawal ini? ', 'Siapakah', 'Mengapakah ', 'Berapakah', '-', 'Berapakah', '', 1, 2, '2023-12-20 17:05:48', NULL, NULL),
(238, 45, 'Multiple Choice Question', 'Keadaan penunggang motosikal itu ___________ dan harus menerima rawatan segera.', 'lintang pukang', 'cedera parah', 'cedera pukat', '-', 'cedera parah', '', 1, 2, '2023-12-20 17:06:50', NULL, NULL),
(239, 45, 'Multiple Choice Question', 'Kebetulan jalan raya itu amat sibuk kerana waktu ___________ orang pulang dari tempat kerja. ', 'senang', 'kemuncak', 'malam', '-', 'kemuncak', '', 1, 2, '2023-12-20 17:07:41', NULL, NULL),
(240, 45, 'Multiple Choice Question', 'Mangsa yang ____________ dalam kemalangan itu ialah seorang penunggang motosikal dan seorang pemandu kereta. ', 'melibat', 'dilibat', 'terlibat', '-', 'terlibat', '', 1, 2, '2023-12-20 17:08:29', NULL, NULL),
(241, 45, 'Short Answers', 'Bagaimanakah Hafiz menjaga keselamatan diri semasa menunggang motosikal? (3 markah)', 'Hafiz memakai topi keledar dan mengikat tali keledar dengan kemas semasa menuggang motosikal.', '', '', '', 'Hafiz memakai topi keledar dan mengikat tali keledar dengan kemas semasa menuggang motosikal.', '6582af90d97eb_Screenshot_2023-12-20_170914.png', 1, 2, '2023-12-20 17:10:40', NULL, NULL),
(242, 45, 'Short Answers', 'Bagaimanakah Haikal balik ke rumah? (3 markah)', 'Haikal balik ke rumah dengan berjalan kaki.', '', '', '', 'Haikal balik ke rumah dengan berjalan kaki.', '6582b0105a9a1_Screenshot_2023-12-20_170914.png', 1, 2, '2023-12-20 17:12:48', NULL, NULL),
(243, 45, 'Short Answers', 'Pada pendapat kamu, mengapakah kita tidak boleh mengikut orang yang tidak dikenali? (4 markah)', 'Kerana bimbang diculik oleh orang berniat jahat. ', '', '', '', 'Kerana bimbang diculik oleh orang berniat jahat. ', '6582b4155809a_Screenshot_2023-12-20_170914.png', 1, 2, '2023-12-20 17:29:57', NULL, NULL),
(244, 46, 'Multiple Choice Question', 'Julia gemar mengumpul ___________ dan duit syiling lama.', 'pensel', 'setem', 'makanan', '-', 'setem', '65838a77b169a_Screenshot_2023-12-21_084359.png', 1, 2, '2023-12-21 08:43:23', '2023-12-21 08:44:39', NULL),
(245, 46, 'Multiple Choice Question', 'Hari ini, Penduduk Taman Bestari mengadakan _______________ untuk membersihkan taman perumahan mereka. ', 'gotong-royong', 'aktiviti-aktiviti ', 'himpun-himpunan', '-', 'gotong-royong', '', 1, 2, '2023-12-21 08:46:28', NULL, NULL),
(246, 46, 'Multiple Choice Question', 'Kita haruslah ____________ gigi dua kali sehari untuk memastikan gigi kita sihat.', 'menebas', 'memberus', 'mencuci', '-', 'memberus', '65838b2eb6f49_Screenshot_2023-12-21_084702.png', 1, 2, '2023-12-21 08:47:42', NULL, NULL),
(247, 46, 'Multiple Choice Question', 'Amirul memotong rumput dengan menggunakan se___________sabit yang tajam.', 'bilah', 'batang', 'buah', '-', 'bilah', '65838b8138ecd_Screenshot_2023-12-21_084814.png', 1, 2, '2023-12-21 08:49:05', NULL, NULL),
(248, 46, 'Multiple Choice Question', '“Bukan ______________ yang pecahkan pasu bunga itu,” kata Ali dan Abu serentak. ', 'saya', 'kamu', 'kami', '-', 'kami', '', 1, 2, '2023-12-21 08:50:11', NULL, NULL),
(249, 46, 'Multiple Choice Question', 'Kita harus _____________ jasa para pemimpin negara.', 'menghargai', 'harga', 'dihargai', '-', 'menghargai', '', 1, 2, '2023-12-21 08:51:25', NULL, NULL),
(250, 46, 'Multiple Choice Question', 'Cikgu Atikah memasukkan semua buku latihan ke dalam beg _____________ buku teksnya.', 'atau', 'kecuali', 'dan', '-', 'kecuali', '', 1, 2, '2023-12-21 08:52:39', NULL, NULL),
(251, 46, 'Multiple Choice Question', 'Encik Lim yang sering ____________ketika waktu bekerja itu telah dipecat oleh majikannya. ', 'ayam tambatan ', 'ringan tulang', 'curi tulang', '-', 'curi tulang', '', 1, 2, '2023-12-21 08:53:53', NULL, NULL),
(252, 46, 'Multiple Choice Question', 'Helmi bagai ______________ ketika mengetahui neneknya masuk ke hospital.', 'aur dengan tebing', 'semut di atas cerek panas', 'telur di atas tanduk', '-', 'semut di atas cerek panas', '', 1, 2, '2023-12-21 08:55:12', NULL, NULL),
(253, 46, 'Multiple Choice Question', '_______________ budak perempuan itu dimarahi oleh ayahnya?', 'Bilakah', 'Apakah', 'Mengapakah', '-', 'Mengapakah', '', 1, 2, '2023-12-21 08:56:32', NULL, NULL),
(254, 46, 'Short Answers', 'Siapakah jiran? (2 markah)', 'Jiran ialah orang yang tinggal berhampiran dengan rumah kita.', '', '', '', 'Jiran ialah orang yang tinggal berhampiran dengan rumah kita.', '65838dbb48686_Screenshot_2023-12-21_085711.png', 1, 2, '2023-12-21 08:58:35', NULL, NULL),
(255, 46, 'Short Answers', 'Berdasarkan petikan, jiran boleh terdiri daripada kaum (4 markah)', 'Melayu/ Cina/ India/ Kadazan', '', '', '', 'Melayu/ Cina/ India/ Kadazan', '65838e2343b7f_Screenshot_2023-12-21_085711.png', 1, 2, '2023-12-21 09:00:19', NULL, NULL),
(256, 46, 'Short Answers', 'Apakah maksud peribahasa “bagai aur dengan tebing”? (4 markah)', 'Orang yang suka tolong-menolong (boleh menerima jawapan lain yang berkaitan)', '', '', '', 'Orang yang suka tolong-menolong (boleh menerima jawapan lain yang berkaitan)', '65838e6854888_Screenshot_2023-12-21_085711.png', 1, 2, '2023-12-21 09:01:28', NULL, NULL),
(257, 47, 'Multiple Choice Question', 'Suara juruhebah itu kurang ___________. ', 'jelas', 'gopoh', 'kasar', 'kuat', 'jelas', '', 1, 2, '2023-12-21 09:06:32', NULL, NULL),
(258, 47, 'Multiple Choice Question', 'Sazali, Kamal dan Yahya berlatih menyanyi sambil ____________ alat muzik untuk menyertai Pertandingan Bintang Kecil di sekolah. ', 'bermain', 'permainan', 'memainkan', 'memetik', 'bermain', '65839001aa1f1_Screenshot_2023-12-21_090800.png', 1, 2, '2023-12-21 09:08:17', NULL, NULL),
(259, 47, 'Multiple Choice Question', 'Tun Haji Abdul Razak bin Dato’ Hussein ialah Perdana Menteri Malaysia yang kedua. Beliau berasal _____________ negeri Pahang.', 'pada', 'dari', 'kepada', 'daripada', 'dari', '', 1, 2, '2023-12-21 09:10:40', NULL, NULL),
(260, 47, 'Multiple Choice Question', 'Saleh berlari ____________ menjinjing beg plastik berisi buah-buahan kerana dikejar oleh anjing.', 'kusut-masai', 'haru-biru', 'lintang-pukang', 'takik-tabik', 'lintang-pukang', '', 1, 2, '2023-12-21 09:13:06', NULL, NULL),
(261, 47, 'Multiple Choice Question', 'Terdapat se _____________ sampah di tepi Taman Sri Damai. ', 'gerombolan', 'pasukan', 'genggam', 'timbun', 'timbun', '658391e6aa7a2_Screenshot_2023-12-21_091439.png', 1, 2, '2023-12-21 09:16:22', NULL, NULL),
(262, 47, 'Multiple Choice Question', '“Saya _______________ membeli sepasang baju kurung,” kata Melati kepada Puteri.', 'harus', 'dapat', 'boleh', 'hendak', 'hendak', '', 1, 2, '2023-12-21 09:17:23', NULL, NULL),
(263, 47, 'Multiple Choice Question', 'Rosidah membeli sebuah kereta __________________ di Kuala Lumpur dengan harga RM15,000.', 'terlaris', 'terbaru', 'terbuang', 'terpakai', 'terpakai', '', 1, 2, '2023-12-21 09:18:32', NULL, NULL),
(264, 47, 'Multiple Choice Question', 'Suhaila berasa ___________________ meninggalkan ayahnya yang sakit tenat di rumah seorang diri.', 'jauh hati', 'berat hati', 'besar hati', 'berkat hat', 'berat hati', '', 1, 2, '2023-12-21 09:19:32', NULL, NULL),
(265, 47, 'Multiple Choice Question', 'Setelah berjaya dalam perniagaannya, Ahmad telah melupakan jasa ibu bapanya. sikap Ahmad ________________________.', 'bagai menatang minyak yang penuh', 'seperti kacang lupakan kulit', 'bagai kaduk naik junjung', 'seperti aur dengan tebing', 'seperti kacang lupakan kulit', '', 1, 2, '2023-12-21 09:20:41', NULL, NULL),
(266, 47, 'Multiple Choice Question', 'Rejab mengambil kesempatan untuk melarikan diri daripada penculik yang sedang tidur. Perkataan seerti bagi kesempatan ialah', 'peluang', 'peranan', 'kehendak', 'kesanggupan', 'peluang', '', 1, 2, '2023-12-21 09:21:39', NULL, NULL),
(267, 47, 'Short Answers', 'Di manakah pokok buluh boleh diperoleh? (2 markah)', 'Pokok buluh boleh diperoleh di kawasan pinggir hutan.', '', '', '', 'Pokok buluh boleh diperoleh di kawasan pinggir hutan.', '658393666db89_Screenshot_2023-12-21_092159.png', 1, 2, '2023-12-21 09:22:46', NULL, NULL),
(268, 47, 'Short Answers', 'Apakah yang boleh diperbuat daripada buluh? (4 markah)', 'Angklung/ serunai/ bakul/ tudung saji/ kipas hiasan/ payung', '', '', '', 'Angklung/ serunai/ bakul/ tudung saji/ kipas hiasan/ payung', '658393cc35fe9_Screenshot_2023-12-21_092159.png', 1, 2, '2023-12-21 09:24:28', NULL, NULL),
(269, 47, 'Short Answers', 'Selain daripada membuat payung buluh di China, apakah kegunaan buluh di negara China pada zaman dulu? (4 markah)', 'Mana-mana jawapan yang sesuai.', '', '', '', 'Mana-mana jawapan yang sesuai.', '658394d681b46_Screenshot_2023-12-21_092159.png', 1, 2, '2023-12-21 09:28:54', NULL, NULL),
(270, 48, 'Multiple Choice Question', 'Para pengguna ___________ dinasihati supaya mematuhi undang-undang. ', 'gincu bibir', 'ringan tulang', 'kapal terbang', 'jalan raya ', 'jalan raya ', '', 1, 2, '2023-12-21 09:34:44', NULL, NULL),
(271, 48, 'Multiple Choice Question', 'Kakak mengelap meja makan _____________ ibu memasak di dapur. ', 'dan', 'tetapi', 'walaupun', 'manakala', 'manakala', '65839690bc295_Screenshot_2023-12-21_093601.png', 1, 2, '2023-12-21 09:36:16', NULL, NULL),
(272, 48, 'Multiple Choice Question', '__________Mohan sedang menyiasat kes rompakan yang berlaku baru-baru ini. ', 'Datuk ', 'Puan', 'Saudara', 'Inspektor', 'Inspektor', '', 1, 2, '2023-12-21 09:39:31', NULL, NULL),
(273, 48, 'Multiple Choice Question', 'Kita akan disenangi oleh ramai ___________ bersikap ramah __________ tidak sombong terhadap orang lain.', 'jika …. dan', 'dan …. jika', 'atau …. lalu', 'serta …. atau', 'jika …. dan', '', 1, 2, '2023-12-21 09:40:25', NULL, NULL),
(274, 48, 'Multiple Choice Question', 'Pegawai farmasi itu berpesan supaya se _______________ ubat yang mengandungi 14 biji tablet perlu dimakan dan dihabiskan. ', 'keping', 'biji', 'helai', 'papan', 'papan', '', 1, 2, '2023-12-21 09:41:18', NULL, NULL),
(275, 48, 'Multiple Choice Question', ' Setiap ibu bapa akan ____________akan kesihatan anak mereka. ', 'esak', 'sedu', 'khuatir', 'kencang', 'khuatir', '', 1, 2, '2023-12-21 09:42:42', NULL, NULL),
(276, 48, 'Multiple Choice Question', 'Kasim seorang murid yang lemah dalam pelajaran, ___________________ dia sentiasa berusaha untuk berjaya.', 'namun begitu', 'selain itu', 'walaupun', 'sekiranya', 'namun begitu', '', 1, 2, '2023-12-21 09:43:55', NULL, NULL),
(277, 48, 'Multiple Choice Question', 'Sayur-sayuran yang dijual di pasar sangat segar dan murah harganya. Perkataan berlawan bagi segar ialah', 'layu', 'lemah', 'mahal', 'jernih', 'layu', '', 1, 2, '2023-12-21 09:44:55', NULL, NULL),
(278, 48, 'Multiple Choice Question', 'Pilih ayat sama maksud dengan ayat yang diberikan. \r\n\r\n\"Oleh sebab tidak memakai lencana, Mei Sin didenda oleh guru disiplin.\"', 'Guru disiplin tidak memakai lencana sekolah didenda oleh Mei Sin.', 'Mei Sin didenda oleh guru disiplin kerana tidak memakai lencana sekolah.', 'Mei Sin dan guru disiplinnya didenda kerana tidak memakai lencana sekolah. ', 'Guru disiplin itu didenda oleh Mei Sin kerana tidak memakai lencana sekolah. ', 'Mei Sin didenda oleh guru disiplin kerana tidak memakai lencana sekolah.', '', 1, 2, '2023-12-21 09:46:11', NULL, NULL),
(279, 48, 'Multiple Choice Question', 'Pilih ayat yang menggunakan perkataan bergaris dengan betul. \r\nI. Lembu yang tertambat pada pokok itu telah hilang. \r\nII. Saya tertambat ke sekolah kerana bangun lewat.\r\nIII. Para penonton tertambat dengan gelagat badul yang lucu itu. \r\nIV. Tandas itu tidak boleh digunakan lagi kerana telah tertambat.', 'I dan II sahaja', 'I dan III sahaja', 'I dan IV sahaja', 'I, III dan IV sahaja', 'I dan III sahaja', '', 1, 2, '2023-12-21 09:47:55', NULL, NULL),
(280, 48, 'Short Answers', 'Apakah tujuan program Kempen Derma Darah ini diadakan? (3 markah)', 'Untuk memastikan bekalan darah sentiasa  mencukupi dan berada pada paras yang selamat.', '', '', '', 'Untuk memastikan bekalan darah sentiasa  mencukupi dan berada pada paras yang selamat.', '65839a8b0d6e1_Screenshot_2023-12-21_094818.png', 1, 2, '2023-12-21 09:53:15', '2023-12-21 09:54:10', NULL),
(281, 48, 'Short Answers', 'Senarai penyakit jangkitan yang disebut di berita ini. (4 markah)', 'Hepatitis B, Hepatitis C, HIV, Sifilis.', '', '', '', 'Hepatitis B, Hepatitis C, HIV, Sifilis.', '65839af6863cf_Screenshot_2023-12-21_094818.png', 1, 2, '2023-12-21 09:55:02', NULL, NULL),
(282, 48, 'Short Answers', 'Perkataan paras boleh digantikan dengan perkataan apa? (3 markah)', 'Perkataan paras boleh digantikan dengan perkataan tahap.', '', '', '', 'Perkataan paras boleh digantikan dengan perkataan tahap.', '65839b21a65a4_Screenshot_2023-12-21_094818.png', 1, 2, '2023-12-21 09:55:45', NULL, NULL),
(283, 49, 'Multiple Choice Question', 'Encik Azlan ___________ terima kasih kerana dibantu oleh budak lelaki itu.', 'merasakan', 'memberikan', 'mengucapkan', 'mengamalkan', 'mengucapkan', '', 1, 2, '2023-12-21 09:59:32', NULL, NULL),
(284, 49, 'Multiple Choice Question', 'Pukul _____________ kamu akan sampai ke rumah Mei Sin? ', 'apa', 'berapa', 'apakah', 'berapakah', 'berapakah', '', 1, 2, '2023-12-21 10:03:12', NULL, NULL),
(285, 49, 'Multiple Choice Question', 'Kakak gemar memakai ____________ yang berwarna merah. ', 'bibir mulut', 'gincu bibir', 'batang bibir', 'pandu bibir', 'gincu bibir', '65839d330df4b_Screenshot_2023-12-21_100425.png', 1, 2, '2023-12-21 10:04:35', NULL, NULL),
(286, 49, 'Multiple Choice Question', 'Adriana _________________ apabila mengetahui abangnya telah masuk ke hospital.', 'bagai semut di atas cerek panas', 'seperti ikan pulang ke lubuk', 'bagai kambing dihalau ke air', 'seperti helang menyongsong angin ', 'bagai semut di atas cerek panas', '', 1, 2, '2023-12-21 10:11:09', NULL, NULL),
(287, 49, 'Multiple Choice Question', 'Encik Lim yang ___________ itu boleh mengangkat barang yang beratnya 20kg.', 'gagah seperti ribut', 'gagah macam gergasi ', 'gagah macam merpati ', 'gagah macam bandul', 'gagah macam gergasi ', '', 1, 2, '2023-12-21 10:17:56', NULL, NULL),
(288, 49, 'Multiple Choice Question', 'Rafiq memandu kereta dengan perlahan sambil ______________ mesra. ', 'meratah', 'melambang', 'melambai', 'mengopak', 'melambai', '6583a102b94fb_Screenshot_2023-12-21_101947.png', 1, 2, '2023-12-21 10:20:50', NULL, NULL),
(289, 49, 'Multiple Choice Question', 'Cikgu Sham memaklumkan _____________ aktiviti latihan bomba akan diadakan pada hari Ahad.', 'kerana', 'lalu', 'ini', 'bahawa', 'bahawa', '', 1, 2, '2023-12-21 10:21:44', NULL, NULL),
(290, 49, 'Multiple Choice Question', 'Encik Husin amat kagum kerana melihat penduduk Taman Impian berganding bahu mengusahakan kebun itu.\r\n\r\nberganding bahu bermaksud _____________________.', 'hasil usaha sendiri ', 'bekerjasama', 'bekerja kuat dan bersungguh-sungguh', 'bekerja dengan bermandi peluh', 'bekerjasama', '', 1, 2, '2023-12-21 10:22:56', NULL, NULL),
(291, 49, 'Multiple Choice Question', 'Vincent _____________ apabila pertama kali tiba di Australia.', 'seperti kera mendapat bunga', 'seperti lembu dicucuk hidung', 'seperti kera kena belacan', 'seperti rusa masuk ke kampung', 'seperti rusa masuk ke kampung', '', 1, 2, '2023-12-21 10:23:47', NULL, NULL),
(292, 49, 'Multiple Choice Question', 'Mulut bomoh itu ___________ sewaktu membaca jampi.', 'keluh – kesah ', 'terumbang – ambing', 'kumat – kamit', 'senget – menget', 'kumat – kamit', '', 1, 2, '2023-12-21 10:24:33', NULL, NULL),
(293, 49, 'Short Answers', 'Apakah tujuan program COMBI yang disertai oleh Mei San? (2 markah)', 'Untuk menyedarkan dan mengubah sikap masyarakat  terhadap keselamatan di kawasan tempat tinggal. ', '', '', '', 'Untuk menyedarkan dan mengubah sikap masyarakat  terhadap keselamatan di kawasan tempat tinggal. ', '6583a23321dc5_Screenshot_2023-12-21_102514.png', 1, 2, '2023-12-21 10:25:55', NULL, NULL),
(294, 49, 'Short Answers', 'Apakah aktiviti yang dijalankan bagi program ini? (4 markah)', 'memasang lampu di kawasan taman, menampalkan nombor telefon balai  polis di sekitar taman. ', '', '', '', 'memasang lampu di kawasan taman, menampalkan nombor telefon balai  polis di sekitar taman. ', '6583a2b8d1c7d_Screenshot_2023-12-21_102514.png', 1, 2, '2023-12-21 10:28:08', NULL, NULL),
(295, 49, 'Short Answers', 'Pada pendapat kamu, mengapakah penduduk taman hendak menampal maklumat dan nombor balai polis di sekitar taman? (4 markah)', 'Dapat membantu kita ketika menghadapi masalah keselamatan di kawasan  taman.', '', '', '', 'Dapat membantu kita ketika menghadapi masalah keselamatan di kawasan  taman.', '6583a3093e642_Screenshot_2023-12-21_102514.png', 1, 2, '2023-12-21 10:29:29', NULL, NULL),
(296, 50, 'Multiple Choice Question', 'Hanisah sedang asyik menonton televisyen di _____________.', 'ruang makan', 'ruang keluarga', 'ruang tamu', 'ruang dapur', 'ruang tamu', '', 1, 2, '2023-12-21 11:24:09', NULL, NULL),
(297, 50, 'Multiple Choice Question', '“Pak Seman menggunakan _____________ untuk menebang sepohon pokok rambutan yang berdekatan dengan rumahnya,” kata Samad kepada Encik Musa.', 'pisau', 'parang', 'gergaji', 'kapak', 'gergaji', '6583b2abeeb9e_Screenshot_2023-12-21_113546.png', 1, 2, '2023-12-21 11:36:11', NULL, NULL),
(298, 50, 'Multiple Choice Question', 'Ibu bapa perlu mengawasi anak-anak mereka ketika bermain ____________ tidak ditimpa kemalangan.', 'agar', 'serta', 'apabila', 'tetapi', 'agar', '', 1, 2, '2023-12-21 11:36:58', NULL, NULL),
(299, 50, 'Multiple Choice Question', 'Selvi _________ bimbang sekiranya dia gagal dalam peperiksaan.', 'betul', 'lalu', 'benar', 'agak', 'agak', '', 1, 2, '2023-12-21 11:37:53', NULL, NULL),
(300, 50, 'Multiple Choice Question', '____________, malang nasib pengemis itu!', 'Hai', 'Aduhai', 'Aduh', 'Wahai', 'Aduhai', '', 1, 2, '2023-12-21 11:38:44', NULL, NULL),
(301, 50, 'Multiple Choice Question', 'Pilih ayat dengan menggunakan tanda baca yang betul.', '“Saya pasti pergi ke rumah awak jika ada masa lapang”, kata Ahmad kepada Rusdi.', '“Saya pasti pergi ke rumah awak jika ada masa lapang,” kata Ahmad kepada Rusdi.', '“Saya pasti pergi ke rumah awak jika ada masa lapang.” Kata Ahmad kepada Rusdi.', '“Saya pasti pergi ke rumah awak jika ada masa lapang”. kata Ahmad kepada Rusdi.', '“Saya pasti pergi ke rumah awak jika ada masa lapang,” kata Ahmad kepada Rusdi.', '', 1, 2, '2023-12-21 11:39:58', NULL, NULL),
(302, 50, 'Multiple Choice Question', 'Wajah pasangan kembar itu (seiras).\r\nPerkataan seperti bagi perkataan yang di dalam kurungan ialah', 'sekata', 'sejenis', 'selaras', 'serupa', 'serupa', '', 1, 2, '2023-12-21 11:42:07', NULL, NULL),
(303, 50, 'Multiple Choice Question', 'Rumah saya menjadi ____________ apabila bekalan elektrik terputus.', 'gelap – gelap', 'gelap – gelita', 'gelap – gempur', 'gelita – gempur', 'gelap – gelita', '', 1, 2, '2023-12-21 11:43:02', NULL, NULL),
(304, 50, 'Multiple Choice Question', 'Pemandangan di pantai ini indah ___________. ', 'paling', 'terlalu', 'agak', 'sekali', 'sekali', '', 1, 2, '2023-12-21 11:43:43', NULL, NULL),
(305, 50, 'Multiple Choice Question', 'Tayar kereta ayah ____________ ke dalam lumpur dan tidak dapat bergerak. ', 'terbebam', 'terdedam', 'terbedam', 'terbenam', 'terbenam', '6583b5b5f18d3_Screenshot_2023-12-21_114856.png', 1, 2, '2023-12-21 11:46:14', '2023-12-21 11:49:09', NULL),
(306, 50, 'Short Answers', 'Apakah matlamat Sekolah Wawasan diwujudkan? (2 markah)', 'Memupuk integrasi di kalangan pelajar bagi melahirkan perpaduan di peringkat sekolah.', '', '', '', 'Memupuk integrasi di kalangan pelajar bagi melahirkan perpaduan di peringkat sekolah.', '6583ba8cc3340_Screenshot_2023-12-21_114944.png', 1, 2, '2023-12-21 12:09:48', NULL, NULL),
(307, 50, 'Short Answers', 'Mengapakah Sekolah Wawasan perlu meningkatkan tahap perpaduan rakyat? (4 markah) ', 'memberikan sumbangan yang positif ke arah perpaduan nasional/ menjamin kestabilan politik', '', '', '', 'memberikan sumbangan yang positif ke arah perpaduan nasional/ menjamin kestabilan politik', '6583bac7110cb_Screenshot_2023-12-21_114944.png', 1, 2, '2023-12-21 12:10:47', NULL, NULL),
(308, 50, 'Short Answers', 'Adakah anda bersetuju bahawa sekolah adalah tempat yang melahirkan perpaduan di kalangan murid? Mengapa? (4 markah)', 'Mana-mana jawapan yang  sesuai', '', '', '', 'Mana-mana jawapan yang  sesuai', '6583bafb92999_Screenshot_2023-12-21_114944.png', 1, 2, '2023-12-21 12:11:39', NULL, NULL),
(309, 67, 'Multiple Choice Question', 'The possessive pronoun \"hers\" is used to describe something that belongs to a ________.', 'boy', 'girl', 'dog', '-', 'girl', '6583bbc1e132c_Screenshot_2023-12-21_121434.png', 1, 2, '2023-12-21 12:14:57', NULL, NULL),
(310, 67, 'True And False', 'The word \"beautiful\" is an adjective used to describe people or objects.', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-21 12:15:58', NULL, NULL),
(311, 67, 'Multiple Choice Question', 'Which sentence correctly uses the possessive pronoun?', 'His sister\'s book is on the table.', 'Mine sister\'s book is on the table.', 'Hers sister\'s book is on the table.', 'Theirs sister\'s book is on the table.', 'His sister\'s book is on the table.', '', 1, 2, '2023-12-21 12:17:46', NULL, NULL),
(312, 67, 'Multiple Choice Question', 'The contraction for \"he is\" is ________.', 'he\'s', 'his', 'heis', '-', 'he\'s', '', 1, 2, '2023-12-21 12:18:38', NULL, NULL),
(313, 67, 'True And False', 'The phrase \"have got\" can be used to describe possession or characteristics of people and objects.', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-21 12:19:17', NULL, NULL),
(314, 67, 'Multiple Choice Question', 'Which one of the sentences below is correct?', 'I have got a cat.', 'I has got a cat.', 'I having got a cat.', '-', 'I have got a cat.', '6583bd1caca95_Screenshot_2023-12-21_122021.png', 1, 2, '2023-12-21 12:20:44', NULL, NULL),
(315, 68, 'Multiple Choice Question', 'What is the activity that is commonly done after waking up in the morning? \r\n_______.', 'Eating breakfast', 'Doing homework', 'Watching television', 'Playing outside', 'Eating breakfast', '6583c51d4fb40_Screenshot_2023-12-21_125346.png', 1, 2, '2023-12-21 12:54:53', NULL, NULL),
(316, 128, 'Multiple Choice Question', 'Antara berikut yang manakah bukan kemahiran proses sains?', 'Mengelas', 'Mentafsir data', 'Membuat inferens', 'Merekod tempoh eksperimen', 'Merekod tempoh eksperimen', '', 1, 2, '2023-12-21 14:13:37', NULL, NULL),
(317, 128, 'Multiple Choice Question', 'Antara berikut yang manakah merupakan kemahiran manipulatif yang perlu diamalkan oleh murid semasa melakukan amali di bilik \r\n sains?', 'Memastikan tingkap di buka bagi memberikan pengudaraan yang baik.', 'Mematuhi arahan guru dan tidak melakukan apa yang tidak disuruh oleh guru.', 'Menyimpan peralatan dan bahan sains dengan betul dan selamat.', 'Tidak bergurau dan bermain-main di dalam bilik sains.', 'Menyimpan peralatan dan bahan sains dengan betul dan selamat.', '', 1, 2, '2023-12-21 14:14:43', NULL, NULL),
(318, 128, 'Multiple Choice Question', 'Apakah kemahiran proses sains itu?', 'Meramal', 'Mengelas', 'Membuat inferens', 'Mentafsir data', 'Membuat inferens', '6583d82a2e8ad_Screenshot_2023-12-21_141458.png', 1, 2, '2023-12-21 14:15:46', '2023-12-21 14:16:10', NULL),
(319, 128, 'Multiple Choice Question', 'Fatini ingin menjalankan penyiasatan tentang hubungan antara saiz garam dengan masa untuk garam melarut. Apakah pemboleh ubah yang dimalarkan?', 'Saiz bikar.', 'Isi padu air.', 'Saiz garam.', 'Masa garam melarut.', 'Isi padu air.', '', 1, 2, '2023-12-21 14:17:47', NULL, NULL),
(320, 128, 'Multiple Choice Question', 'Seekor berudu diletakkan ke dalam botol berisi air. Botol itu kemudiannya ditutup rapat dengan penutup botol. Ramalkan apa yang akan berlaku kepada berudu itu selepas 3 hari?', 'Berudu akan mati.', 'Berudu semakin besar.', 'Bilangan berudu bertambah.', 'Berudu bertukar menjadi katak.', 'Berudu akan mati.', '', 1, 2, '2023-12-21 14:18:59', NULL, NULL),
(321, 128, 'Multiple Choice Question', 'Antara berikut, yang manakah melibatkan pemerhatian secara kuantitatif sahaja?', 'Span menyerap air.', 'Lilitan bola ialah 10 cm.', 'Burung mempunyai sayap dan paruh.', 'Magnet menarik objek yang diperbuat daripada besi.', 'Lilitan bola ialah 10 cm.', '', 1, 2, '2023-12-21 14:19:47', NULL, NULL),
(322, 128, 'Multiple Choice Question', 'Rafi ingin menjalankan satu penyiasatan untuk mengenal pasti sifat asid. Apakah yang perlu dilakukan oleh Rafi sebelum menjalankan penyiasatan tersebut?', 'Mengumpul data', 'Membuat kesimpulan', 'Menjalankan eksperimen ', 'Merancang eksperimen', 'Merancang eksperimen', '', 1, 2, '2023-12-21 14:20:29', NULL, NULL),
(323, 128, 'Multiple Choice Question', 'Apakah kesimpulan bagi penyiasatan ini?', 'saiz bayang-bayang berkurang apabila jarak antara objek dengan sumber cahaya bertambah.', 'saiz bayang-bayang berkurang apabila jarak antara objek dengan sumber cahaya berkurang..', 'saiz bayang-bayang bertambah apabila jarak antara objek dengan sumber cahaya bertambah.', 'saiz bayang-bayang tidak berubah apabila jarak antara objek dengan sumber cahaya bertambah.', 'saiz bayang-bayang berkurang apabila jarak antara objek dengan sumber cahaya berkurang..', '6583d96e4e835_Screenshot_2023-12-21_142038.png', 1, 2, '2023-12-21 14:21:34', NULL, NULL),
(324, 128, 'Multiple Choice Question', 'Apakah bentuk komunikasi yang paling sesuai untuk mempersembahkan maklumat di atas?', 'Jadual', 'Carta pai', 'Carta palang', 'Gambar rajah', 'Gambar rajah', '6583e5aba0538_Screenshot_2023-12-21_151234.png', 1, 2, '2023-12-21 15:13:47', NULL, NULL),
(325, 128, 'Multiple Choice Question', 'Jadual 2 menunjukkan keputusan bagi satu penyiasatan.', 'Pemboleh ubah dimanipulasi: bilangan sel kering, Pemboleh ubah bergerak balas: bilangan mentol.', 'Pemboleh ubah dimanipulasi: jenis litar, Pemboleh ubah bergerak balas: bilangan mentol.', 'Pemboleh ubah dimanipulasi: bilangan mentol, Pemboleh ubah bergerak balas: kecerahan mentol.', 'Pemboleh ubah dimanipulasi: bilangan sel kering, Pemboleh ubah bergerak balas: kecerahan mentol.', 'Pemboleh ubah dimanipulasi: bilangan mentol, Pemboleh ubah bergerak balas: kecerahan mentol.', '6583e6e3c2d90_Screenshot_2023-12-21_151604.png', 1, 2, '2023-12-21 15:18:59', NULL, NULL),
(326, 128, 'Short Answers', 'Rajah 1 menunjukkan tiga ekor arnab, X, Y dan Z yang berlainan saiz.\r\nBerdasarkan Rajah 1, nyatakan satu pemerhatian.', 'Arnab Z lebih besar daripada arnab X dan Y.', '', '', '', 'Arnab Z lebih besar daripada arnab X dan Y.', '', 1, 2, '2023-12-21 15:24:18', NULL, NULL),
(327, 128, 'Short Answers', 'Rajah 1 menunjukkan tiga ekor arnab, X, Y dan Z yang berlainan saiz.\r\nBerikan satu inferens untuk pemerhatian di 1(a).', 'Arnab-arnab itu mendapat jumlah makanan yang berbeza / Mana-mana jawapan yang sesuai.', '', '', '', 'Arnab-arnab itu mendapat jumlah makanan yang berbeza / Mana-mana jawapan yang sesuai.', '6583e84fe4e92_Screenshot_2023-12-21_152156.png', 1, 2, '2023-12-21 15:25:03', NULL, NULL),
(328, 128, 'Short Answers', 'Jadual 1 menunjukkan jisim arnab-arnab itu.\r\nNamakan satu alat yang boleh digunakan untuk mengukur jisim arnab-arnab itu.', 'Alat penimbang berat', '', '', '', 'Alat penimbang berat', '6583e8e59efa8_Screenshot_2023-12-21_152521.png', 1, 2, '2023-12-21 15:27:33', '2023-12-21 15:27:52', NULL),
(329, 128, 'Short Answers', 'Jadual 1 menunjukkan jisim arnab-arnab itu.\r\nBerdasarkan maklumat di Jadual 1, nyatakan satu pemerhatian secara kuantitatif.', 'Perbezaan berat Arnab Z dan arnab X ialah 500 g.', '', '', '', 'Perbezaan berat Arnab Z dan arnab X ialah 500 g.', '6583e93810980_Screenshot_2023-12-21_152521.png', 1, 2, '2023-12-21 15:28:56', NULL, NULL),
(330, 51, 'Short Answers', 'Apakah punca gangguan emosi?\r\n', 'Ketidakupayaan individu untuk menangani tekanan yang  dihadapi dalam kehidupan seharian.', '', '', '', 'Ketidakupayaan individu untuk menangani tekanan yang  dihadapi dalam kehidupan seharian.', '6583f3811cf2d_Screenshot_2023-12-21_161040.png', 1, 2, '2023-12-21 16:12:49', NULL, NULL),
(331, 51, 'Short Answers', 'Apakah tanda-tanda yang menunjukkan seseorang itu mengalami gangguan emosi?', 'hilang selera makan, sering mengasingkan diri daripada keluarga dan rakan &ndash; rakan ', '', '', '', 'hilang selera makan, sering mengasingkan diri daripada keluarga dan rakan &ndash; rakan ', '6583f46368b13_Screenshot_2023-12-21_161040.png', 1, 2, '2023-12-21 16:16:35', NULL, NULL),
(332, 51, 'Short Answers', 'Pada pendapat anda, bagaimanakah kita dapat mengelakkan diri daripada mengalami gangguan emosi?', 'Mana-mana jawapan yang sesuai', '', '', '', 'Mana-mana jawapan yang sesuai', '', 1, 2, '2023-12-21 16:19:18', NULL, NULL),
(333, 67, 'Multiple Choice Question', 'The number that comes after 35 is ________.', '33', '34', '36', '37', '36', '6583f61b76b2a_Screenshot_2023-12-21_162341.png', 1, 2, '2023-12-21 16:23:55', NULL, NULL),
(334, 67, 'True And False', 'The number 78 is in between 77 and 79.', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-21 16:24:38', NULL, NULL),
(335, 67, 'Multiple Choice Question', 'What is the number between 58 and 60?', '49', '59', '61', '66', '59', '', 1, 2, '2023-12-21 16:25:18', NULL, NULL),
(336, 67, 'Multiple Choice Question', 'Counting aloud from 1 to 10, the number that comes after 10 is ________.', '11', '12', '9', '20', '11', '6583f6bae79ae_Screenshot_2023-12-21_162540.png', 1, 2, '2023-12-21 16:26:34', NULL, NULL),
(337, 55, 'Short Answers', 'Apakah hak – hak pengguna terhadap sesuatu barangan yang dibeli?', 'Mendapat  barangan yang tidak rosak dan barangan itu selamat untuk digunakan.', '', '', '', 'Mendapat  barangan yang tidak rosak dan barangan itu selamat untuk digunakan.', '6583f6cde299e_Screenshot_2023-12-21_162336.png', 1, 2, '2023-12-21 16:26:53', NULL, NULL),
(338, 55, 'Short Answers', 'Berikan dua cara pengguna mendapatkan barangan yang berkualiti dan selamat untuk digunakan. ', 'Periksa tarikh luput, Pastikan barang dalam keadaan baik.', '', '', '', 'Periksa tarikh luput, Pastikan barang dalam keadaan baik.', '6583f7f05c3ca_Screenshot_2023-12-21_162336.png', 1, 2, '2023-12-21 16:31:44', NULL, NULL),
(339, 55, 'Short Answers', 'Pada pendapat kamu, apakah yang perlu dilakukan sekiranya barang yang dibeli rosak dan tidak dapat digunakan?', 'Mana-mana jawapan yang sesuai.', '', '', '', 'Mana-mana jawapan yang sesuai.', '6583f830835ed_Screenshot_2023-12-21_162336.png', 1, 2, '2023-12-21 16:32:48', NULL, NULL),
(340, 79, 'Short Answers', 'How would you define the concept of personality? Provide an example to support your definition?', 'Any suitable answer', '', '', '', 'Any suitable answer', '', 1, 2, '2023-12-21 16:39:53', NULL, NULL),
(341, 79, 'Short Answers', 'Think about a person you know who has a different personality trait than yours. \r\nDescribe how their personality trait influences their behaviour and interactions with others.', 'Any suitable answer', '', '', '', 'Any suitable answer', '', 1, 2, '2023-12-21 16:40:22', NULL, NULL),
(342, 79, 'Short Answers', 'Imagine you are meeting someone for the first time. What are three questions you could ask to gather more information about their personality and interests? \r\nExplain why you think these questions would be helpful. ', 'Any suitable answer', '', '', '', 'Any suitable answer', '', 1, 2, '2023-12-21 16:40:56', NULL, NULL),
(343, 75, 'Short Answers', 'What is your favourite leisure activity? Why do you enjoy it?', 'Any suitable answers', '', '', '', 'Any suitable answers', '', 1, 2, '2023-12-21 16:42:58', NULL, NULL),
(344, 75, 'Short Answers', 'Imagine you have a whole day of free time. Describe how you would spend it in detail, including the activities you would engage in and why you would choose them.', 'Any suitable answers', '', '', '', 'Any suitable answers', '', 1, 2, '2023-12-21 16:43:25', NULL, NULL),
(345, 75, 'Short Answers', 'Choose an object in your room and describe its location using prepositions of place. For example, you can describe where your bookshelf is in relation to your bed.\r\n', 'Any suitable answers', '', '', '', 'Any suitable answers', '', 1, 2, '2023-12-21 16:44:01', NULL, NULL),
(346, 104, 'Multiple Choice Question', 'Digit ‘5’ pada nombor yang manakah antara berikut mempunyai nilai 500?', '57 384', '25 519', '35 697', '53 870', '25 519', '', 1, 2, '2023-12-21 16:48:55', NULL, NULL),
(347, 104, 'Multiple Choice Question', 'Bundarkan 508 477 kepada puluh ribu yang hampir.', '51 000', '58 500', '59 000', '58 000', '51 000', '', 1, 2, '2023-12-21 16:49:37', NULL, NULL),
(348, 104, 'Multiple Choice Question', '540 758 – 10 126 =', '530 373', '440 121', '446 320', '530 632', '530 632', '', 1, 2, '2023-12-21 16:50:15', NULL, NULL),
(349, 104, 'Multiple Choice Question', 'Bahagikan 60 424 dengan 8.\r\n', '8 009', ' 8 120', '7 553', '8 030', '7 553', '', 1, 2, '2023-12-21 16:50:50', NULL, NULL),
(350, 104, 'Multiple Choice Question', '5 836 – 3 170 + 431 =', '3 075', '3 035', '3 097', '3 007', '3 097', '', 1, 2, '2023-12-21 16:52:17', NULL, NULL),
(351, 104, 'Multiple Choice Question', 'Ahmad membungkus 15 keping biskut dalam satu bungkusan.\r\nJika dia perlu membungkus 60 bungkusan, berapa keping biskutkah yang dia perlu?\r\n', '850', '865', '880', '900', '900', '', 1, 2, '2023-12-21 16:53:03', NULL, NULL),
(352, 104, 'Multiple Choice Question', 'Antara berikut yang manakah benar?', '25 000 &divide; 10 = 25 000', '25 005 &divide; 10 = 2 050', '25 000 &divide; 100 = 250', '20 500 &divide; 1 000 = 205', '25 000 &divide; 100 = 250', '', 1, 2, '2023-12-21 16:53:52', NULL, NULL),
(353, 104, 'Multiple Choice Question', '50 285 + 5 432 + 12 430 =', '27 771', '24 871', '23 901', '68 147', '23 901', '', 1, 2, '2023-12-21 17:00:47', NULL, NULL),
(354, 104, 'Multiple Choice Question', '6 271 + 3 890 – 256 =', '9 905', '9 915', '9 095', '9 195', '9 905', '', 1, 2, '2023-12-21 17:01:18', NULL, NULL),
(355, 104, 'Multiple Choice Question', '759 673 – 109 473 – 32 182 =', '618 018', '608 118', '618 118', '618 108', '618 018', '', 1, 2, '2023-12-21 17:01:52', NULL, NULL),
(356, 104, 'Short Answers', 'Farihin mempunyai 3 608 keping setem. Rizul ada 317 keping setem lebih daripada Farihin. Berapakah bilangan setem Rizul?', '3 925', '', '', '', '3 925', '', 1, 2, '2023-12-21 17:02:15', NULL, NULL),
(357, 104, 'Short Answers', 'Darabkan 345 dengan 45.', '15 525', '', '', '', '15 525', '', 1, 2, '2023-12-21 17:02:34', NULL, NULL),
(358, 104, 'Short Answers', '561 624 ÷ 8 =', '70 203', '', '', '', '70 203', '', 1, 2, '2023-12-21 17:03:13', '2023-12-21 17:03:23', NULL),
(359, 67, 'Short Answers', 'Think of a person you know well. Describe them using three adjectives.', 'funny/ kind/ intelligent/ any suitable answers with explanation.', '', '', '', 'funny/ kind/ intelligent/ any suitable answers with explanation.', '', 1, 2, '2023-12-25 16:52:23', NULL, NULL),
(360, 67, 'Short Answers', 'Choose an object in the classroom. Describe it using the possessive pronoun \"its.\" Explain why this object is important or useful.', 'any suitable answers.', '', '', '', 'any suitable answers.', '', 1, 2, '2023-12-25 16:53:38', NULL, NULL),
(361, 67, 'Short Answers', 'Imagine you have a pet. Describe your pet using the phrase \"have got.\" Include details about its appearance and personality.', 'Any suitable answer. ', '', '', '', 'Any suitable answer. ', '', 1, 2, '2023-12-25 16:55:24', NULL, NULL),
(362, 68, 'True And False', 'Daily routines are activities that we do regularly every day.', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-27 08:27:36', NULL, NULL),
(363, 68, 'Multiple Choice Question', 'What is the activity usually done after you come home from school at 1 o’clock in the afternoon?', 'Go to bed', 'Eat dinner', 'Go to the park', 'Take a shower', 'Take a shower', '', 1, 2, '2023-12-27 08:28:39', NULL, NULL),
(364, 68, 'Multiple Choice Question', 'How often should you brush your teeth?', 'Never', 'Once a day', 'Once a week', 'Twice a day', 'Twice a day', '658b7048d0435_Screenshot_2023-12-27_082956.png', 1, 2, '2023-12-27 08:31:04', NULL, NULL),
(365, 68, 'Multiple Choice Question', 'Which activity is usually done before going to bed?', 'reading a book', 'eating lunch', 'playing video games', 'cycling', 'reading a book', '', 1, 2, '2023-12-27 08:32:35', NULL, NULL),
(366, 68, 'Multiple Choice Question', 'Which of the following is not a daily routine activity?', 'doing homework', 'taking a shower', 'eating breakfast', 'visiting a museum', 'visiting a museum', '', 1, 2, '2023-12-27 08:33:55', NULL, NULL),
(367, 68, 'Multiple Choice Question', 'Brushing teeth is usually done in the _______.', 'kitchen', 'bathroom', 'bedroom', 'living room', 'bathroom', '658b71440bd3a_Screenshot_2023-12-27_083420.png', 1, 2, '2023-12-27 08:35:16', NULL, NULL),
(368, 68, 'True And False', 'Daily routines can vary from person to person.\r\n', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-27 08:36:50', NULL, NULL),
(369, 68, 'Multiple Choice Question', 'Which of the following is an evening routine activity for students?', 'having lunch', 'doing homework', 'eating breakfast', 'going to work', 'doing homework', '', 1, 2, '2023-12-27 08:37:50', NULL, NULL),
(370, 68, 'Multiple Choice Question', 'Daily routines are activities that we do _______.', 'once a week', 'every now and then', 'every day or regularly', 'only on special occasions', 'every day or regularly', '', 1, 2, '2023-12-27 08:39:11', NULL, NULL),
(371, 68, 'Short Answers', 'Describe the daily routine activities you see. What do you think the person is doing at each step?', 'Any suitable answers.', '', '', '', 'Any suitable answers.', '658b72bf65c0e_Screenshot_2023-12-27_084054.png', 1, 2, '2023-12-27 08:41:35', NULL, NULL),
(372, 68, 'Short Answers', 'Imagine you are the character in the picture. Write a short paragraph describing your daily routine. Include at least three activities and explain why they are important to you.\r\n', 'Any suitable answer. ', '', '', '', 'Any suitable answer. ', '658b72f98aa1b_Screenshot_2023-12-27_084054.png', 1, 2, '2023-12-27 08:42:33', NULL, NULL),
(373, 68, 'Short Answers', 'Create a story based on the daily routine activities depicted. Create a character and describe his or her typical day from morning to night. Be creative and include specific details about the actions and emotions.\r\n', 'Any suitable answer. ', '', '', '', 'Any suitable answer. ', '658b7336d522f_Screenshot_2023-12-27_084054.png', 1, 2, '2023-12-27 08:43:34', NULL, NULL),
(374, 71, 'True And False', 'The maple leaf flag represents Canada.', 'True', 'False', '', '', 'True', '658b73fee00c1_Screenshot_2023-12-27_084623.png', 1, 2, '2023-12-27 08:46:54', NULL, NULL),
(375, 71, 'Multiple Choice Question', 'Which country is represented by the Eiffel Tower?\r\n', 'Italy', 'France', 'Spain', 'United Kingdom', 'France', '658b744f908fb_Screenshot_2023-12-27_084752.png', 1, 2, '2023-12-27 08:48:15', NULL, NULL),
(376, 71, 'Short Answers', 'A person from Japan is called a _________.', 'Japanese', '', '', '', 'Japanese', '', 1, 2, '2023-12-27 08:49:01', NULL, NULL),
(377, 71, 'True And False', 'The Pyramids of Giza are located in India.', 'True', 'False', '', '', 'False', '', 1, 2, '2023-12-27 08:49:37', NULL, NULL),
(378, 71, 'Multiple Choice Question', 'Which country does the Taj Mahal represent?', 'China', 'India', 'Russia', 'Brazil', 'India', '658b75139145f_Screenshot_2023-12-27_085031.png', 1, 2, '2023-12-27 08:51:31', NULL, NULL),
(379, 71, 'True And False', 'The Great Wall of China is the longest wall in the world.', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-27 08:52:35', NULL, NULL),
(380, 71, 'Multiple Choice Question', 'Which country does the kangaroo represent?', 'Australia', 'New Zealand', 'South Africa', 'Brazil', 'Australia', '658b75ae5fa33_Screenshot_2023-12-27_085323.png', 1, 2, '2023-12-27 08:54:06', NULL, NULL),
(381, 71, 'Short Answers', 'The _________ is an ancient Egyptian burial site.', 'pyramid', '', '', '', 'pyramid', '658b75f1ddb28_Screenshot_2023-12-27_085447.png', 1, 2, '2023-12-27 08:55:13', NULL, NULL),
(382, 71, 'Short Answers', 'A person from Brazil is called a _________.', 'Brazilian', '', '', '', 'Brazilian', '', 1, 2, '2023-12-27 08:55:44', NULL, NULL),
(383, 71, 'Multiple Choice Question', 'Which country does the maple leaf represent?', 'Canada', 'Mexico', 'Japan', 'India', 'Canada', '', 1, 2, '2023-12-27 08:56:35', NULL, NULL),
(384, 92, 'True And False', '“Empat ribu jika ditulis dalam angka ialah 4000.“\r\n\r\nAdakah pernyataan di atas benar atau salah?', 'True', 'False', '', '', 'True', '', 1, 2, '2023-12-27 09:06:49', NULL, NULL),
(385, 92, 'True And False', '“15801 jika ditulis dalam ayat matematik menjadi satu lima lapan satu.”\r\n\r\nAdakah pernyataan di atas benar atau salah?', 'True', 'False', '', '', 'False', '', 1, 2, '2023-12-27 09:21:54', '2023-12-27 09:22:05', NULL),
(386, 92, 'Short Answers', 'Tuliskan bilangan objek dalam rajah berikut.', 'Seratus dua puluh lapan, serautus enam puluh empat', '', '', '', 'Seratus dua puluh lapan, serautus enam puluh empat', '658b7d20546ea_Screenshot_2023-12-27_092512.png', 1, 2, '2023-12-27 09:25:52', NULL, NULL),
(387, 92, 'Short Answers', 'Tuliskan bilangan objek dalam angka dan perkataan.', '4, Empat dan 10, sepuluh', '', '', '', '4, Empat dan 10, sepuluh', '658b7d5e4fd30_Screenshot_2023-12-27_092634.png', 1, 2, '2023-12-27 09:26:54', NULL, NULL),
(388, 92, 'Short Answers', 'Tuliskan bilangan objek dalam angka.\r\n', '27, 32', '', '', '', '27, 32', '658b7d99716d9_Screenshot_2023-12-27_092725.png', 1, 2, '2023-12-27 09:27:53', NULL, NULL),
(389, 92, 'Short Answers', 'Tuliskan jawapan yang betul.', '3326', '', '', '', '3326', '658b7de9dfd36_Screenshot_2023-12-27_092840.png', 1, 2, '2023-12-27 09:29:13', NULL, NULL),
(390, 92, 'Short Answers', 'Tuliskan jawapan yang betul.', '1014', '', '', '', '1014', '658b7e76d5b0e_Screenshot_2023-12-27_093104.png', 1, 2, '2023-12-27 09:31:34', NULL, NULL),
(391, 92, 'Short Answers', 'Tuliskan jawapan yang betul.', '5042', '', '', '', '5042', '658b7eb0284e7_Screenshot_2023-12-27_093206.png', 1, 2, '2023-12-27 09:32:32', NULL, NULL),
(392, 92, 'Short Answers', 'Cerakinkan nombor di bawah kepada nilai tempat. \r\n11056', '1 puluh ribu + 1 ribu + 5 puluh + 6 sa', '', '', '', '1 puluh ribu + 1 ribu + 5 puluh + 6 sa', '', 1, 2, '2023-12-27 09:34:58', '2023-12-27 09:36:05', NULL),
(393, 92, 'Short Answers', 'Cerakinkan nombor di bawah kepada nilai tempat.\r\n33200', '3 puluh ribu + 3 ribu + 2 ratus', '', '', '', '3 puluh ribu + 3 ribu + 2 ratus', '', 1, 2, '2023-12-27 09:35:56', NULL, NULL),
(395, 92, 'Short Answers', 'Tuliskan nombor berikut dalam bentuk perkataan.\r\n2850', 'dua ribu lapan ratus lima puluh', '', '', '', 'dua ribu lapan ratus lima puluh', '', 1, 2, '2023-12-27 09:39:12', NULL, NULL),
(396, 92, 'Short Answers', 'Tuliskan nombor berikut dalam bentuk perkataan.\r\n4731', 'empat ribu tujuh ratus tiga puluh satu', '', '', '', 'empat ribu tujuh ratus tiga puluh satu', '', 1, 2, '2023-12-27 09:39:58', NULL, NULL),
(397, 92, 'Short Answers', 'Tuliskan nombor berikut dalam bentuk perkataan.\r\n5622', 'lima ribu enam ratus dua puluh dua', '', '', '', 'lima ribu enam ratus dua puluh dua', '', 1, 2, '2023-12-27 09:41:00', NULL, NULL),
(398, 92, 'Short Answers', 'Tuliskan nombor berikut dalam bentuk perkataan.\r\n6593', 'enam ribu lima ratus sembilan puluh tiga', '', '', '', 'enam ribu lima ratus sembilan puluh tiga', '', 1, 2, '2023-12-27 09:41:52', NULL, NULL),
(399, 92, 'Short Answers', 'Tuliskan nombor berikut dalam bentuk angka. \r\n\r\nSatu ribu tiga ratus sembilan puluh tujuh', '1397', '', '', '', '1397', '', 1, 2, '2023-12-27 09:42:34', NULL, NULL),
(400, 92, 'Short Answers', 'Tuliskan nombor berikut dalam bentuk angka. \r\n\r\nEmpat ribu dua ratus tiga puluh lima', '4235', '', '', '', '4235', '', 1, 2, '2023-12-27 09:43:27', NULL, NULL),
(401, 92, 'Short Answers', 'Tuliskan nombor berikut dalam bentuk angka. \r\n\r\nTujuh ratus tiga belas', '713', '', '', '', '713', '', 1, 2, '2023-12-27 09:44:13', NULL, NULL),
(402, 92, 'Short Answers', 'Tuliskan nilai tempat dan nilai digit untuk nombor yang bergaris berikut. ', 'Nilai tempat = ratus / Nilai digit = 200', '', '', '', 'Nilai tempat = ratus / Nilai digit = 200', '658b829ae968e_Screenshot_2023-12-27_094818.png', 1, 2, '2023-12-27 09:49:14', NULL, NULL),
(403, 92, 'Short Answers', 'Tuliskan nilai tempat dan nilai digit untuk nombor yang bergaris berikut. ', 'Nilai tempat = Sa / Nilai digit = 2', '', '', '', 'Nilai tempat = Sa / Nilai digit = 2', '658b831cbc242_Screenshot_2023-12-27_095037.png', 1, 2, '2023-12-27 09:51:24', NULL, NULL),
(404, 92, 'Short Answers', 'Tuliskan nilai tempat dan nilai digit untuk nombor yang bergaris berikut. ', 'Nilai tempat = Ribu / Nilai digit = 3000', '', '', '', 'Nilai tempat = Ribu / Nilai digit = 3000', '658b83a5cf8a1_Screenshot_2023-12-27_095258.png', 1, 2, '2023-12-27 09:53:41', NULL, NULL);
INSERT INTO `doit_online` (`do_id`, `lesson_id`, `do_question_type`, `do_question`, `do_question_answer1`, `do_question_answer2`, `do_question_answer3`, `do_question_answer4`, `do_correct_answer`, `do_image`, `do_status`, `do_created_by`, `do_created_date`, `do_updated_date`, `do_deleted_date`) VALUES
(405, 92, 'Short Answers', 'Tuliskan nilai tempat dan nilai digit untuk nombor yang bergaris berikut. ', 'Nilai tempat = Puluh / Nilai digit = 70', '', '', '', 'Nilai tempat = Puluh / Nilai digit = 70', '658b83ff4cdd3_Screenshot_2023-12-27_095433.png', 1, 2, '2023-12-27 09:55:11', NULL, NULL),
(406, 96, 'Multiple Choice Question', 'Digit ‘5’ pada nombor yang manakah mempunyai nilai 500?', '57 384', '25 519', '35 697', '53 870', '25 519', '', 1, 2, '2023-12-27 10:09:19', NULL, NULL),
(407, 96, 'Multiple Choice Question', 'Bundarkan 58 477 kepada puluh ribu yang hampir.', '60 000', '58 500', '59 000', '58 000', '60 000', '', 1, 2, '2023-12-27 10:10:06', NULL, NULL),
(408, 96, 'Multiple Choice Question', '54 758 – 10 126 =\r\n', '43 373', '44 121', '44 632', '48 121', '44 632', '', 1, 2, '2023-12-27 10:10:56', NULL, NULL),
(409, 96, 'Multiple Choice Question', 'Bahagikan 6 424 dengan 8.', '809', '812', '804', '803', '803', '', 1, 2, '2023-12-27 10:12:23', NULL, NULL),
(410, 96, 'Multiple Choice Question', '5 836 – 3 170 + 431 =', '3 075', '3 035', '3 097', '3 007', '3 097', '', 1, 2, '2023-12-27 10:13:04', NULL, NULL),
(411, 96, 'Multiple Choice Question', 'Ahmad membungkus 15 keping biskut dalam satu bungkusan. Jika dia perlu membungkus 60 bungkusan, berapa keping biskutkah yang dia perlukan?', '850', '865', '880', '900', '900', '', 1, 2, '2023-12-27 10:16:11', NULL, NULL),
(412, 96, 'Multiple Choice Question', 'Antara berikut yang manakah benar?', '25 000 ÷ 10 = 25 000', '25 005 ÷ 10 = 2 050', '25 000 ÷ 100 = 250', '20 500 ÷ 1 000 = 205', '25 000 ÷ 100 = 250', '', 1, 2, '2023-12-27 10:19:11', NULL, NULL),
(413, 96, 'Multiple Choice Question', '5 285 + 5 432 + 12 430 =', '27 771', '24 871', '23 901', '23 147', '23 147', '', 1, 2, '2023-12-27 10:20:40', NULL, NULL),
(414, 96, 'Multiple Choice Question', '6 271 + 3 890 – 256 =', '9 905', '9 950', '9 955', '9 900', '9 905', '', 1, 2, '2023-12-27 10:21:44', NULL, NULL),
(415, 96, 'Multiple Choice Question', 'Darabkan 1 523 dengan 12.', '18 266', '18 276', '18 267', '18 277', '18 276', '', 1, 2, '2023-12-27 10:22:35', NULL, NULL),
(416, 96, 'Short Answers', 'Farihin mempunyai 3 608 keping setem. Rizul ada 317 keping setem lebih daripada Farihin. Berapakah bilangan setem Rizul?', '3 925', '', '', '', '3 925', '', 1, 2, '2023-12-27 10:23:12', '2023-12-27 10:23:21', NULL),
(417, 96, 'Short Answers', 'Darabkan 345 dengan 45.', '15 525', '', '', '', '15 525', '', 1, 2, '2023-12-27 10:24:25', NULL, NULL),
(418, 96, 'Short Answers', '34 584 ÷ 8 =', '4 323', '', '', '', '4 323', '', 1, 2, '2023-12-27 10:25:14', NULL, NULL),
(419, 116, 'Multiple Choice Question', 'Antara berikut, yang manakah bukan kemahiran proses sains?', 'Mengelas', 'Berkomunikasi', 'Membersih', '-', 'Membersih', '', 1, 2, '2023-12-27 10:28:23', NULL, NULL),
(420, 116, 'Multiple Choice Question', 'Gambar berikut menunjukkan seorang murid yang sedang menjalankan kemahiran proses sains.\r\nApakah jenis kemahiran proses sains yang digunakan?', 'Mengukur menggunakan nombor', 'Memerhati', 'Mengelas', '-', 'Memerhati', '658b8c3434589_Screenshot_2023-12-27_102945.png', 1, 2, '2023-12-27 10:30:12', NULL, NULL),
(421, 116, 'Multiple Choice Question', 'Antara berikut, radas yang manakah dipadankan dengan kegunaannya yang betul?', 'A', 'B', 'C', '-', 'B', '658b8c9426b6b_Screenshot_2023-12-27_103126.png', 1, 2, '2023-12-27 10:31:48', NULL, NULL),
(422, 116, 'Multiple Choice Question', 'Terdapat _______ kemahiran proses sains.', 'lima', 'enam', 'tujuh', '-', 'enam', '', 1, 2, '2023-12-27 10:32:32', NULL, NULL),
(423, 116, 'Multiple Choice Question', 'Memerhati ialah kemahiran mengggunakan _________.', 'Pergerakan', 'Pertuturan', 'Semua deria', '-', 'Semua deria', '', 1, 2, '2023-12-27 10:34:58', NULL, NULL),
(424, 116, 'Multiple Choice Question', 'Gambar di bawah menunjukkan suasana melihat bunga api.\r\n\r\nApakah deria yang digunakan untuk memerhati dalam situasi tersebut?', 'Satu deria', 'Dua deria', 'Semua deria', '-', 'Dua deria', '658b8db39c843_Screenshot_2023-12-27_103614.png', 1, 2, '2023-12-27 10:36:35', NULL, NULL),
(425, 116, 'Multiple Choice Question', 'Gambar di bawah menunjukkan salah satu peralatan yang digunakan oleh Cikgu Faris dalam satu pertandingan larian.\r\nAlat tersebut digunakan untuk mengukur _____________.', 'bacaan jarak', 'kelajuan jarak', 'bacaan minit dan saat', '-', 'bacaan minit dan saat', '658b8e27614ab_Screenshot_2023-12-27_103726.png', 1, 2, '2023-12-27 10:38:31', NULL, NULL),
(426, 116, 'Multiple Choice Question', 'Gambar di bawah menunjukkan sebuah pokok yang layu.\r\n\r\nApakah inferens atau kesimpulan awal sekiranya daun pokok berwarna kuning?', 'Pokok tidak mencukupi air', 'Tanamannya sentiasa dibaja', 'Pokok dibiar tumbuh sendiri', '-', 'Pokok tidak mencukupi air', '658b8e86b44c0_Screenshot_2023-12-27_103924.png', 1, 2, '2023-12-27 10:40:06', NULL, NULL),
(427, 116, 'Multiple Choice Question', 'Gambar di bawah menunjukkan satu situasi dalam kehidupan harian kita.\r\nRamalkan apa yang akan berlaku berdasarkan gambar di atas.', 'Gempa bumi', 'Hujan lebat', 'Ribut taufan', '-', 'Hujan lebat', '', 1, 2, '2023-12-27 10:41:30', NULL, NULL),
(428, 116, 'Multiple Choice Question', 'Tentukan pernyataan yang menunjukkan kemahiran manipulatif yang betul.\r\nI. Buang spesimen ke dalam singki.\r\nII. Gunakan penyepit kayu untuk memegang tabung uji yang panas.\r\nIII. Gunakan kuantiti spesimen yang banyak.\r\nIV. Labelkan setiap lakaran spesimen, peralatan dan bahan sains.', 'I & II', 'I & III', 'II & IV', '-', 'II & IV', '', 1, 2, '2023-12-27 10:44:19', NULL, NULL),
(429, 116, 'Short Answers', 'Rajah X dan Y di bawah menunjukkan dua jenis kemahiran proses sains yang dilakukan oleh murid-murid tahun tiga. \r\nNyatakan kemahiran proses sains yang dilakukan oleh murid- murid di dalam rajah. ', ' X: Membuat inferens/Meramal/Memerhati, Y: Berkomunikasi', '', '', '', ' X: Membuat inferens/Meramal/Memerhati, Y: Berkomunikasi', '658b9167952d1_Screenshot_2023-12-27_105109.png', 1, 2, '2023-12-27 10:52:23', NULL, NULL),
(430, 116, 'Short Answers', 'Murid di X menyatakan bola terapung di atas air kerana ia ringan. Apakah jenis kemahiran proses sains yang terlibat?', 'Meramal', '', '', '', 'Meramal', '658b919fdb0f9_Screenshot_2023-12-27_105109.png', 1, 2, '2023-12-27 10:53:19', NULL, NULL),
(431, 116, 'Short Answers', 'Nyatakan kemahiran manipulatif yang perlu dilakukan oleh murid X semasa aktiviti di atas dijalankan. Tandakan ( ✓ ) pada jawapan yang betul dan ( ✗ ) pada jawapan yang salah.\r\n', 'a ( ✓), b (✓), c (✓), d (✗)', '', '', '', 'a ( ✓), b (✓), c (✓), d (✗)', '658b91fbb6d3c_Screenshot_2023-12-27_105423.png', 1, 2, '2023-12-27 10:54:51', NULL, NULL),
(432, 120, 'Multiple Choice Question', 'Gambar di bawah menunjukkan keadaan sejenis tumbuhan selepas seminggu.\r\nMengapakah tumbuhan itu menjadi layu selepas seminggu?', 'Tumbuhan itu tidak mendapat cahaya matahari', 'Tumbuhan itu tidak mendapat udara', 'Tumbuhan itu tidak mendapat air', '-', 'Tumbuhan itu tidak mendapat cahaya matahari', '658b92e6b6450_Screenshot_2023-12-27_103924.png', 1, 2, '2023-12-27 10:58:46', NULL, NULL),
(433, 120, 'Multiple Choice Question', 'Antara berikut, yang manakah melibatkan kemahiran proses sains ‘mengelas’?', 'Meramalkan keadaan cuaca hari esok', 'Mengukur ketinggian sepohon pokok', 'Membahagikan haiwan kepada dua kumpulan', '-', 'Membahagikan haiwan kepada dua kumpulan', '', 1, 2, '2023-12-27 11:14:01', NULL, NULL),
(434, 120, 'Multiple Choice Question', 'Antara berikut, yang manakah merupakan alat pengukur yang paling sesuai untuk mengukur panjang dan lebar sebuah padang bola?', 'Pita pengukur', 'Pembaris', 'Selinder penyukat', '-', 'Pita pengukur', '', 1, 2, '2023-12-27 11:14:58', NULL, NULL),
(435, 120, 'Multiple Choice Question', 'Antara alat berikut, yang manakah sesuai digunakan untuk menyukat isi padu cecair?', ' Tabung uji', 'Silinder penyukat', 'Jam randik', '-', ' Tabung uji', '', 1, 2, '2023-12-27 11:15:53', NULL, NULL),
(436, 120, 'Multiple Choice Question', 'Berikut merupakan kemahiran proses sains kecuali', 'memerhati', 'melukis', 'mengelas', '-', 'melukis', '', 1, 2, '2023-12-27 11:16:31', NULL, NULL),
(437, 120, 'Multiple Choice Question', 'Gambar di bawah menunjukkan sebatang magnet.\r\nRamalkan apa yang akan berlaku jika sebatang paku didekatkan pada magnet itu.', 'Paku menjauhi magnet bar', 'Paku tertarik pada magnet bar', 'Tiada apa-apa yang berlaku pada paku itu', '-', 'Paku tertarik pada magnet bar', '658b97835cdf1_Screenshot_2023-12-27_111815.png', 1, 2, '2023-12-27 11:18:27', NULL, NULL),
(438, 120, 'Multiple Choice Question', 'Gambar di bawah menunjukkan secawan kopi panas.\r\nApakah yang akan berlaku apabila seketul ais dimasukkan ke dalam cawan itu? ', 'Kopi menjadi sejuk dengan cepat', 'Kopi menjadi lebih panas', 'Kopi menjadi beku', '-', 'Kopi menjadi sejuk dengan cepat', '658b97d9ba3e1_Screenshot_2023-12-27_111935.png', 1, 2, '2023-12-27 11:19:53', NULL, NULL),
(439, 120, 'Multiple Choice Question', 'Rajah di atas menunjukkan panjang sebatang penyedut minuman yang diukur menggunakan skru. Berapakah jumlah panjang 4 batang penyedut minuman yang sama? ', '12 batang skru', '18 batang skru', '24 batang skru', '-', '24 batang skru', '658b987a6faed_Screenshot_2023-12-27_112203.png', 1, 2, '2023-12-27 11:22:34', NULL, NULL),
(440, 120, 'Multiple Choice Question', 'Rajah di bawah menunjukkan sebuah eksperimen yang dijalankan.\r\nDalam satu eksperimen seorang murid menggunakan beberapa klip kertas dan sebatang magnet. Magnet itu dilabelkan pada tiga kedudukan yang berbeza P, Q dan R. Rajah di atas menunjukkan keputusan eksperimen itu. Apakah pemboleh ubah yang bergerak balas? ', 'Bahagian magnet', 'Bilangan klip kertas yang dapat ditarik', 'Kekuatan magnet', '-', 'Kekuatan magnet', '658b98e8ca68a_Screenshot_2023-12-27_112358.png', 1, 2, '2023-12-27 11:24:24', NULL, NULL),
(441, 120, 'Multiple Choice Question', 'Rajah di bawah menunjukkan satu penyiasatan. Apakah kesimpulan yang boleh dibuat berdasarkan penyiasatan itu?', 'Akar tumbuhan bergerak balas terhadap sentuhan', 'Akar tumbuhan bergerak balas terhadap graviti', 'Akar tumbuhan bergerak balas terhadap air', '-', 'Akar tumbuhan bergerak balas terhadap air', '658b994f07b0d_Screenshot_2023-12-27_112556.png', 1, 2, '2023-12-27 11:26:07', NULL, NULL),
(442, 120, 'Short Answers', 'Rajah 1 menunjukkan radas yang disediakan untuk menjalankan satu penyiasatan bagi mengukur tumbesaran sebatang anak pokok selama dua bulan. Nyatakan alat-alat yang boleh digunakan untuk mengukur\r\nketinggian anak pokok.', 'Z', '', '', '', 'Z', '658b99d455a90_Screenshot_2023-12-27_112752.png', 1, 2, '2023-12-27 11:28:20', NULL, NULL),
(443, 120, 'Short Answers', 'Rajah 2 menunjukkan ketinggian anak pokok selepas dua bulan. Nyatakan bacaan ketinggian anak pokok tersebut.\r\n', '20 cm', '', '', '', '20 cm', '658b9a38ca692_Screenshot_2023-12-27_112950.png', 1, 2, '2023-12-27 11:30:00', NULL, NULL),
(444, 120, 'Short Answers', 'Rajah 2 menunjukkan ketinggian anak pokok selepas dua bulan.\r\nRamalkan apa yang akan berlaku pada anak pokok selepas 4 bulan.', 'Ketinggian pokok bertambah/Bilangan daun bertambah/ Mana-mana jawapan yang  sesuai', '', '', '', 'Ketinggian pokok bertambah/Bilangan daun bertambah/ Mana-mana jawapan yang  sesuai', '658b9afb35b66_Screenshot_2023-12-27_112950.png', 1, 2, '2023-12-27 11:33:15', NULL, NULL),
(445, 120, 'Short Answers', 'Rajah 3 menunjukkan sebuah situasi. Berdasarkan rajah 3, nyatakan inferens anda.', 'Pokok tersebut tidak diberikan air/ Pokok itu diserang serangga perosak', '', '', '', 'Pokok tersebut tidak diberikan air/ Pokok itu diserang serangga perosak', '658b9b4e84105_Screenshot_2023-12-27_113358.png', 1, 2, '2023-12-27 11:34:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `game_category`
--

CREATE TABLE `game_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_category`
--

INSERT INTO `game_category` (`category_id`, `category_name`, `category_image`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Animals', '6551ccba07c80_Puzzle4.png', 1, 1, '2023-10-12 08:42:12', '2023-11-14 15:04:52'),
(2, 'Culture', '6551ccc695640_Puzzle7.png', 1, 1, '2023-10-12 08:42:41', '2023-11-14 15:05:04'),
(3, 'Food', '6551ccdb8976a_Puzzle2.png', 1, 1, '2023-10-12 08:42:52', '2023-11-14 15:05:12'),
(4, 'Geography', '6551ccebb0296_Puzzle1.png', 1, 1, '2023-10-12 08:43:04', '2023-11-14 15:05:18'),
(5, 'History', '6551ccf85a806_Puzzle3.png', 1, 1, '2023-10-12 08:43:15', '2023-11-14 15:05:24'),
(6, 'Sports', '6551cd0403fc8_Puzzle5.png', 1, 1, '2023-10-12 08:43:32', '2023-11-14 15:05:29'),
(7, 'STEM', '6551cd3fa8ddd_Puzzle6.png', 1, 1, '2023-10-12 08:43:46', '2024-02-19 09:10:03'),
(20, 'General Knowledge', '65d2aa5d7d879_general_knowledge.jpg', 1, 1, '2024-02-19 09:09:49', '2024-02-20 09:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `grade_table`
--

CREATE TABLE `grade_table` (
  `grade_id` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `grade_name` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `grade_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade_table`
--

INSERT INTO `grade_table` (`grade_id`, `grade`, `grade_name`, `created_date`, `updated_date`, `grade_status`) VALUES
(1, '1', 'Darjah', '2023-11-10 21:08:43', '2023-11-13 14:18:19', '1'),
(2, '2', 'Darjah', '2023-11-10 21:09:12', '2023-11-13 15:35:03', '1'),
(3, '3', 'Darjah', '2023-11-10 21:09:21', '2023-11-13 15:35:10', '1'),
(4, '4', 'Darjah', '2023-11-10 21:09:31', '2023-11-13 15:35:16', '1'),
(5, '5', 'Darjah', '2023-11-10 21:09:40', '2023-11-13 15:35:21', '1'),
(6, '6', 'Darjah', '2023-11-10 21:09:55', '2023-11-13 15:35:27', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jigsaw_image`
--

CREATE TABLE `jigsaw_image` (
  `ji_id` int(11) NOT NULL,
  `ji_c_id` int(11) NOT NULL,
  `ji_name` varchar(255) NOT NULL,
  `ji_image` text NOT NULL,
  `ji_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `ji_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ji_status` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jigsaw_image`
--

INSERT INTO `jigsaw_image` (`ji_id`, `ji_c_id`, `ji_name`, `ji_image`, `ji_created`, `ji_updated`, `ji_status`, `created_by`) VALUES
(18, 7, 'Plant Tree', '6551dce8b4cc3_July_Spot The Difference.jpg', '2023-11-13 08:23:04', NULL, '1', 1),
(19, 1, 'Bee', '6551dcfc8e0df_June_Spot The Difference.jpg', '2023-11-13 08:23:24', NULL, '1', 1),
(20, 2, 'Malaysia', '6551dd1fbe812_Mari Mewarna Images_1.jpg', '2023-11-13 08:23:59', NULL, '1', 1),
(21, 7, 'Anti Dadah', '6551dd3850a4e_Mari Mewarna Images_2.jpg', '2023-11-13 08:24:24', NULL, '1', 1),
(22, 7, 'Anti Rasuah', '6551dd49b3b5a_Mari Mewarna Images_3.jpg', '2023-11-13 08:24:41', NULL, '1', 1),
(23, 6, 'Hari Sukan', '6551dd5a46f50_Mari Mewarna Images_4.jpg', '2023-11-13 08:24:58', NULL, '1', 1),
(24, 5, 'Mari Membaca', '6551dd7a88ccb_Mari Mewarna Images_5.jpg', '2023-11-13 08:25:30', NULL, '1', 1),
(25, 7, 'Go Green', '6551dd928b35f_Mari Mewarna Images_6.jpg', '2023-11-13 08:25:54', NULL, '1', 1),
(26, 7, 'Derma Darah', '6551ddac9ee2a_Mari Mewarna Images_7.jpg', '2023-11-13 08:26:20', NULL, '1', 1),
(27, 1, 'Kasawari', '6551ddbd04f0a_Mari Mewarna Images_8.jpg', '2023-11-13 08:26:37', NULL, '1', 1),
(28, 2, 'Bahasa', '6551ddd420400_Mari Mewarna Images_9.jpg', '2023-11-13 08:27:00', NULL, '1', 1),
(29, 5, 'Palestine', '6551dde2a3e0d_Mari Mewarna Images_10.jpg', '2023-11-13 08:27:14', NULL, '1', 1),
(30, 2, 'Merdeka', '6551ddfd69123_Ogos_Spot The Difference.jpg', '2023-11-13 08:27:41', NULL, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_download`
--

CREATE TABLE `lesson_download` (
  `lesson_download_id` int(11) NOT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `lesson_type` varchar(30) DEFAULT NULL,
  `downloaded_by` int(11) DEFAULT NULL,
  `downloaded_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lesson_download`
--

INSERT INTO `lesson_download` (`lesson_download_id`, `lesson_id`, `lesson_type`, `downloaded_by`, `downloaded_date`) VALUES
(51, 79, 'worksheet', 50, '2023-11-29 09:25:47'),
(53, 76, 'worksheet', 55, '2023-12-12 08:30:23'),
(54, 124, 'worksheet', 4, '2023-12-14 14:40:17'),
(55, 85, 'lesson_plan', 68, '2023-12-22 11:28:20'),
(56, 56, 'worksheet', 68, '2023-12-22 11:29:55'),
(57, 40, 'worksheet', 68, '2023-12-22 11:30:35'),
(58, 92, 'lesson_plan', 68, '2023-12-22 11:35:00'),
(59, 107, 'worksheet', 68, '2023-12-22 11:35:25'),
(60, 122, 'worksheet', 4, '2024-01-03 15:32:30'),
(61, 92, 'worksheet', 50, '2024-01-03 16:23:08'),
(62, 82, 'worksheet', 2, '2024-01-03 16:28:24'),
(63, 94, 'worksheet', 2, '2024-01-08 20:26:02'),
(64, 60, 'lesson_plan', 113, '2024-01-09 09:30:37'),
(65, 60, 'worksheet', 113, '2024-01-09 09:38:46'),
(66, 56, 'supplementary_note', 4, '2024-01-09 15:35:50'),
(67, 131, 'supplementary_note', 4, '2024-01-09 18:25:51'),
(68, 77, 'worksheet', 2, '2024-02-01 15:53:14'),
(69, 124, 'supplementary_note', 50, '2024-02-05 12:12:31'),
(70, 101, 'worksheet', 50, '2024-02-05 12:13:13'),
(71, 101, 'worksheet', 50, '2024-02-05 12:14:10'),
(72, 101, 'worksheet', 50, '2024-02-05 12:14:22'),
(73, 101, 'quiz', 50, '2024-02-05 12:14:37'),
(74, 101, 'supplementary_note', 50, '2024-02-05 12:15:08'),
(75, 126, 'worksheet', 50, '2024-02-05 12:15:32'),
(76, 124, 'worksheet', 50, '2024-02-05 12:15:54'),
(77, 112, 'supplementary_note', 48, '2024-02-05 12:43:58'),
(78, 112, 'worksheet', 48, '2024-02-07 14:30:49'),
(79, 108, 'worksheet', 48, '2024-02-07 14:31:15'),
(80, 109, 'worksheet', 48, '2024-02-07 14:32:06'),
(81, 110, 'worksheet', 48, '2024-02-07 14:32:18'),
(82, 111, 'worksheet', 48, '2024-02-07 14:32:44'),
(83, 113, 'worksheet', 48, '2024-02-07 14:33:26'),
(84, 114, 'worksheet', 48, '2024-02-07 14:33:36'),
(85, 115, 'worksheet', 48, '2024-02-07 14:33:54'),
(86, 116, 'worksheet', 48, '2024-02-07 14:34:16'),
(87, 117, 'worksheet', 48, '2024-02-07 14:35:01'),
(88, 126, 'quiz', 48, '2024-02-07 14:41:57'),
(89, 85, 'worksheet', 120, '2024-02-07 17:03:58'),
(90, 115, 'supplementary_note', 4, '2024-02-13 11:16:31'),
(91, 61, 'supplementary_note', 4, '2024-02-13 11:58:57'),
(92, 88, 'worksheet', 122, '2024-02-20 10:48:12'),
(93, 90, 'worksheet', 123, '2024-02-20 11:10:00'),
(94, 105, 'lesson_plan', 124, '2024-02-20 14:44:19'),
(95, 75, 'worksheet', 125, '2024-02-20 21:13:06'),
(96, 126, 'worksheet', 126, '2024-02-23 13:17:48'),
(97, 126, 'worksheet', 126, '2024-02-23 13:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_table`
--

CREATE TABLE `lesson_table` (
  `lesson_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `lesson_plan` varchar(255) DEFAULT NULL,
  `worksheet` varchar(255) DEFAULT NULL,
  `supplementary_note` varchar(255) DEFAULT NULL,
  `quiz` varchar(255) DEFAULT NULL,
  `performance_based_activity` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lesson_table`
--

INSERT INTO `lesson_table` (`lesson_id`, `title`, `description`, `images`, `subject_id`, `grade_id`, `lesson_plan`, `worksheet`, `supplementary_note`, `quiz`, `performance_based_activity`, `created_date`, `updated_date`, `status`, `created_by`) VALUES
(36, 'Tema 2 - Masyarakat Muhibah', 'Masyarakat Muhibah', '20231126062243_BM_Thumbnail_Orange.jpg', 19, 1, '20231126062243_RPH_Bahasa_Melayu_Darjah_1_Tema_2.docx', '20231126062243_LEMBAR~1.PDF', '20240212084918_20231126062243_NOTAMU~1.pptx', '20231126062243_KUIZBA~1.PDF', '20231126062243_PERFOR~1.PDF', '2023-11-26 14:22:43', '2024-02-12 16:49:18', '1', 1),
(37, 'Tema 3 - Pentingkan Kebersihan dan Kesihatan', 'Pentingkan Kebersihan dan Kesihatan', '20231126062636_BM_Thumbnail_Red.jpg', 19, 1, '20231126062636_RPHBAH~1.DOC', '20231126062636_LEMBAR~1.PDF', '20231126062636_NOTAMU~1.PPT', '20231126062636_KUIZBA~1.PDF', '20231126062636_PERFOR~1.PDF', '2023-11-26 14:26:36', '2023-11-26 14:26:36', '1', 1),
(38, 'Tema 4 - Keselamatan', 'Keselamatan', '20231126062919_BM_Thumbnail_Yellow.jpg', 19, 1, '20231126062919_RPH_Bahasa_Melayu_Darjah_1_Tema_4.docx', '20231126062919_LEMBAR~1.PDF', '20231126062919_NOTAMU~1.PPT', '20231126062919_Kuiz_Bahasa_Melayu_Darjah_1_Tema_4.docx.pdf', '20231126062919_PERFOR~1.PDF', '2023-11-26 14:29:19', '2023-11-26 14:29:19', '1', 1),
(39, 'Tema 1 - Kekeluargaan', 'Kekeluargaan', '20231126063807_BM_Thumbnail_Blue.jpg', 19, 2, '20231126063807_RPH_Bahasa_Melayu_Darjah_2_Tema_1.docx', '20231126063807_LEMBAR~1.PDF', '20231126063807_NOTAMU~1.PPT', '20231126063807_Kuiz_Bahasa_Melayu_Darjah_2_Tema_1.docx.pdf', '20231126063807_PERFOR~1.PDF', '2023-11-26 14:38:07', '2023-11-26 14:38:07', '1', 1),
(40, 'Tema 2 - Perpaduan', 'Perpaduan', '20231126064641_BM_Thumbnail_Orange.jpg', 19, 2, '20231126064641_RPH_Bahasa_Melayu_Darjah_2_Tema_2.docx', '20231126064641_LEMBAR~1.PDF', '20231126064641_Nota_Multimedia_Bahasa_Melayu_Darjah_2_Tema_2_.pptx', '20231126064641_Kuiz_Bahasa_Melayu_Darjah_2_Tema_2.docx.pdf', '20231126064641_PERFOR~1.PDF', '2023-11-26 14:46:41', '2023-11-26 14:46:41', '1', 1),
(41, 'Tema 3 - Kebersihan dan Kesihatan', 'Kebersihan dan Kesihatan', '20231126065235_BM_Thumbnail_Red.jpg', 19, 2, '20231126065203_RPHBAH~1.DOC', '20231126065203_LEMBAR~1.PDF', '20231126065203_NOTAMU~1.PPT', '20231126065203_KUIZBA~1.PDF', '20231126065203_PERFOR~1.PDF', '2023-11-26 14:52:03', '2023-11-26 14:52:35', '1', 1),
(42, 'Tema 4 - Kebudayaan Kita', 'Kebudayaan Kita', '20231126065518_BM_Thumbnail_Yellow.jpg', 19, 2, '20231126065518_RPHBAH~1.DOC', '20231126065518_LEMBAR~1.PDF', '20231126065518_NOTAMU~1.PPT', '20231126065518_Kuiz_Bahasa_Melayu_Darjah_2_Tema_4.docx.pdf', '20231126065518_PERFOR~1.PDF', '2023-11-26 14:55:18', '2023-11-26 14:55:18', '1', 1),
(43, 'Tema 1 - Kekeluargaan', 'Kekeluargaan', '20231126070947_BM_Thumbnail_Blue.jpg', 19, 3, '20231126070947_RPH_Bahasa_Melayu_Darjah_3_Tema_1_Unit_1.docx', '20231126070947_LEMBAR~1.PDF', '20231126070947_NOTAMU~1.PPT', '20231126070947_Kuiz_Bahasa_Melayu_Darjah_3_Tema_1.docx.pdf', '20231126070947_PERFOR~1.PDF', '2023-11-26 15:09:47', '2023-11-26 15:09:47', '1', 1),
(44, 'Tema 2 - Kesihatan dan Kebersihan', 'Kesihatan dan Kebersihan', '20231126071211_BM_Thumbnail_Orange.jpg', 19, 3, '20231126071211_RPHBAH~1.DOC', '20231126071211_LEMBAR~1.PDF', '20231126071211_NOTAMU~1.PPT', '20231126071211_KUIZBA~1.PDF', '20231126071211_PERFOR~1.PDF', '2023-11-26 15:12:11', '2023-11-26 15:12:11', '1', 1),
(45, 'Tema 3 - Keselamatan', 'Keselamatan', '20231126071502_BM_Thumbnail_Red.jpg', 19, 3, '20231126071502_RPH_Bahasa_Melayu_Darjah_3_Tema_3_Unit_7.docx', '20231126071502_Lembaran_Kerja_Bahasa_Melayu_Darjah_3_Tema_3.pdf', '20231126071502_NOTAMU~1.PPT', '20231126071502_Kuiz_Bahasa_Melayu_Darjah_3_Tema_3.docx.pdf', '20231126071502_PERFOR~1.PDF', '2023-11-26 15:15:02', '2023-11-26 15:15:02', '1', 1),
(46, 'Tema 4 - Perpaduan', 'Perpaduan', '20231126071653_BM_Thumbnail_Yellow.jpg', 19, 3, '20231126071653_RPH_Bahasa_Melayu_Darjah_3_Tema_4_Unit_10.docx', '20231126071653_Lembaran_Kerja_Bahasa_Melayu_Darjah_3_Tema_4_.pdf', '20231126071653_Nota_Multimedia_Bahasa_Melayu_Darjah_3_Tema_4_.pptx', '20231126071653_Kuiz_Bahasa_Melayu_Darjah_3_Tema_4.docx.pdf', '20231126071653_PERFOR~1.PDF', '2023-11-26 15:16:53', '2023-11-26 15:16:53', '1', 1),
(47, 'Tema 1 - Kemasyarakatan', 'Kemasyarakatan', '20231126071845_BM_Thumbnail_Blue.jpg', 19, 4, '20231126071845_RPH_Bahasa_Melayu_Darjah_4_Tema_1_Unit_1.docx', '20231126071845_LEMBAR~1.PDF', '20231126071845_NOTAMU~1.PPT', '20231126071845_Kuiz_Bahasa_Melayu_Darjah_4_Tema_1.docx.pdf', '20231126071845_PERFOR~1.PDF', '2023-11-26 15:18:45', '2023-11-26 15:18:45', '1', 1),
(48, 'Tema 2 - Kesihatan dan Kebersihan', 'Kesihatan dan Kebersihan', '20231126072039_BM_Thumbnail_Orange.jpg', 19, 4, '20231126072039_RPHBAH~1.DOC', '20231126072039_LEMBAR~1.PDF', '20231126072039_NOTAMU~1.PPT', '20231126072039_KUIZBA~1.PDF', '20231126072039_PERFOR~1.PDF', '2023-11-26 15:20:39', '2023-11-26 15:20:39', '1', 1),
(49, 'Tema 3 - Keselamatan', 'Keselamatan', '20231126072215_BM_Thumbnail_Red.jpg', 19, 4, '20231126072215_RPH_Bahasa_Melayu_Darjah_4_Tema_3_Unit_7.docx', '20231126072215_LEMBAR~1.PDF', '20231126072215_NOTAMU~1.PPT', '20231126072215_Kuiz_Bahasa_Melayu_Darjah_4_Tema_3.docx.pdf', '20231126072215_PERFOR~1.PDF', '2023-11-26 15:22:15', '2023-11-26 15:22:15', '1', 1),
(50, 'Tema 4 - Kebudayaan, Kesenian dan Estetika', 'Kebudayaan, Kesenian dan Estetika', '20231126072712_BM_Thumbnail_Yellow.jpg', 19, 4, '20231126072712_RPHBAH~1.DOC', '20231126072712_LEMBAR~1.PDF', '20231126072712_NOTAMU~1.PPT', '20231126072712_KUIZBA~1.PDF', '20231126072712_PERFOR~1.PDF', '2023-11-26 15:27:12', '2023-11-26 15:27:12', '1', 1),
(51, 'Tema 1 - Kemasyarakatan', 'Kemasyarakatan', '20231126072945_BM_Thumbnail_Blue.jpg', 19, 5, '20231126072945_RPH_Bahasa_Melayu_Darjah_5_Tema_1_.docx', '20231126072945_LEMBAR~1.PDF', '20231126072945_NOTAMU~1.PPT', '20231126072945_Kuiz_Bahasa_Melayu_Darjah_5_Tema_1.docx.pdf', '20231126072945_PERFOR~1.PDF', '2023-11-26 15:29:45', '2023-11-26 15:29:45', '1', 1),
(52, 'Tema 2 - Kesihatan dan Kebersihan', 'Kesihatan dan Kebersihan', '20231126073213_BM_Thumbnail_Orange.jpg', 19, 5, '20231126073213_RPHBAH~1.DOC', '20231126073213_LEMBAR~1.PDF', '20231126073213_NOTAMU~1.PPT', '20231126073213_KUIZBA~1.PDF', '20231126073213_PERFOR~1.PDF', '2023-11-26 15:32:13', '2023-11-26 15:32:13', '1', 1),
(53, 'Tema 3 - Keselamatan', 'Keselamatan', '20231126073401_BM_Thumbnail_Red.jpg', 19, 5, '20231126073401_RPH_Bahasa_Melayu_Darjah_5_Tema_3_.docx', '20231126073401_LEMBAR~1.PDF', '20231126073401_NOTAMU~1.PPT', '20231126073401_Kuiz_Bahasa_Melayu_Darjah_5_Tema_3.docx.pdf', '20231126073401_PERFOR~1.PDF', '2023-11-26 15:34:01', '2023-11-26 15:34:01', '1', 1),
(54, 'Tema 4 - Perpaduan', 'Perpaduan', '20231126074426_BM_Thumbnail_Yellow.jpg', 19, 5, '20231126074426_RPH_Bahasa_Melayu_Darjah_5_Tema_4_.docx', '20231126074426_LEMBAR~1.PDF', '20231126074426_Nota_Multimedia_Bahasa_Melayu_Darjah_5_Tema_4_.pptx', '20231126074426_Kuiz_Bahasa_Melayu_Darjah_5_Tema_4.docx.pdf', '20231126074426_PERFOR~1.PDF', '2023-11-26 15:44:26', '2023-11-26 15:44:26', '1', 1),
(55, 'Tema 1 - Kekeluargaan', 'Kekeluargaan', '20231126075240_BM_Thumbnail_Blue.jpg', 19, 6, '20231126075240_RPH_Bahasa_Melayu_Darjah_6_Tema_1.docx', '20231126075240_LEMBAR~1.PDF', '20231126075240_NOTAMU~1.PPT', '20231126075240_Kuiz_Bahasa_Melayu_Darjah_6_Tema_1.docx.pdf', '20231126075240_PERFOR~1.PDF', '2023-11-26 15:52:40', '2023-11-26 15:52:40', '1', 1),
(56, 'Tema 2 - Kesihatan dan Kebersihan', 'Kesihatan dan Kebersihan', '20231126075544_BM_Thumbnail_Orange.jpg', 19, 6, '20231126075544_RPHBAH~1.DOC', '20231126075544_LEMBAR~1.PDF', '20231126075544_NOTAMU~1.PPT', '20231126075544_KUIZBA~1.PDF', '20231126075544_PERFOR~1.PDF', '2023-11-26 15:55:44', '2023-11-26 15:55:44', '1', 1),
(57, 'Tema 3 - Keselamatan', 'Keselamatan', '20231126075727_BM_Thumbnail_Red.jpg', 19, 6, '20231126075727_RPH_Bahasa_Melayu_Darjah_6_Tema_3.docx', '20231126075727_LEMBAR~1.PDF', '20231126075727_NOTAMU~1.PPT', '20231126075727_Kuiz_Bahasa_Melayu_Darjah_6_Tema_3.docx.pdf', '20231126075727_PERFOR~1.PDF', '2023-11-26 15:57:27', '2023-11-26 15:57:27', '1', 1),
(58, 'Tema 4 - Perpaduan', 'Perpaduan', '20231126075925_BM_Thumbnail_Yellow.jpg', 19, 6, '20231126075925_RPH_Bahasa_Melayu_Darjah_6_Tema_4.docx', '20231126075925_LEMBAR~1.PDF', '20231126075925_Nota_Multimedia_Bahasa_Melayu_Darjah_6_Tema_4_.pptx', '20231126075925_Kuiz_Bahasa_Melayu_Darjah_6_Tema_4.docx.pdf', '20231126075925_PERFOR~1.PDF', '2023-11-26 15:59:25', '2023-11-26 15:59:25', '1', 1),
(59, 'Module 1 - At School', 'At School', '20231126085144_Eng_-_Blue.png', 20, 1, '20231126085144_RPH_English_Year_1_Module_1.docx', '20231126085144_Worksheet_English_Year_1_Module_1.pdf', '20240129040357_Notes_English_Year_1_Module_1.pptx', '20231126085144_Quiz_English_Year_1_Module_1.pdf', '20231126085144_PERFOR~1.PDF', '2023-11-26 16:51:44', '2024-01-29 12:03:57', '1', 1),
(60, 'Module 2 - Let\'s Play', 'Let\'s Play', '20231126085512_Eng_-_Orange.png', 20, 1, '20231126085512_RPH_English_Year_1_Module_2.docx', '20231126085512_Worksheet_English_Year_1_Module_2.pdf', '20231126085512_Notes_English_Year_1_Module_2.pptx', '20231126085512_Quiz_English_Year_1_Module_2.pdf', '20231126085512_PERFOR~1.PDF', '2023-11-26 16:55:12', '2023-11-26 16:55:12', '1', 1),
(61, 'Module 3 - Pet Show', 'Pet Show', '20231126085700_Eng_-_Red.png', 20, 1, '20231126085700_RPH_English_Year_1_Module_3.docx', '20231126085700_Worksheet_English_Year_1_Module_3.pdf', '20231126085700_Notes_English_Year_1_Module_3.pptx', '20231126085700_Quiz_English_Year_1_Module_3.pdf', '20231126085700_PERFOR~1.PDF', '2023-11-26 16:57:00', '2023-11-26 16:57:00', '1', 1),
(62, 'Starter Module - Friends', 'Friends', '20231126085852_Eng_-_Yellow.png', 20, 1, '20231126085852_RPH_English_Year_1_Starter_Module.docx', '20231126085852_Worksheet_English_Year_1_Starter_Module.pdf', '20231126085852_Notes_English_Year_1_Starter_Module.pptx', '20231126085852_Quiz_English_Year_1_Starter_Module.pdf', '20231126085852_PERFOR~1.PDF', '2023-11-26 16:58:52', '2023-11-26 16:58:52', '1', 1),
(63, 'Module 5 - Free Time', 'Free Time', '20231126090131_Eng_-_Blue.png', 20, 2, '20231126090131_RPH_English_Year_2_Module_5.docx', '20231126090131_Worksheet_English_Year_2_Module_5.pdf', '20231126090131_Notes_English_Year_2_Module_5.pptx', '20231126090131_Quiz_English_Year_2_Module_5.pdf', '20231126090131_PERFOR~1.PDF', '2023-11-26 17:01:31', '2023-11-26 17:01:31', '1', 1),
(64, 'Module 6 - The Old House', 'The Old House', '20231126090410_Eng_-_Orange.png', 20, 2, '20231126090410_RPH_English_Year_2_Module_6.docx', '20231126090410_Worksheet_English_Year_2_Module_6.pdf', '20231126090410_Notes_English_Year_2_Module_6.pptx', '20231126090410_Quiz_English_Year_2_Module_6.pdf', '20231126090410_PERFOR~1.PDF', '2023-11-26 17:04:10', '2023-11-26 17:04:10', '1', 1),
(65, 'Module 7 - Get Dressed', 'Get Dressed', '20231126090645_Eng_-_Red.png', 20, 2, '20231126090645_RPH_English_Year_2_Module_7.docx', '20231126090645_Worksheet_English_Year_2_Module_7.pdf', '20231126090645_Notes_English_Year_2_Module_7.pptx', '20231126090645_Quiz_English_Year_2_Module_7.pdf', '20231126090645_PERFOR~1.PDF', '2023-11-26 17:06:45', '2023-11-26 17:06:45', '1', 1),
(66, 'Module 8 - The Robot', 'The Robot', '20231126090813_Eng_-_Yellow.png', 20, 2, '20231126090813_RPH_English_Year_2_Module_8.docx', '20231126090813_Worksheet_English_Year_2_Module_8.pdf', '20231126090813_Notes_English_Year_2_Module_8.pptx', '20231126090813_Quiz_English_Year_2_Module_8.pdf', '20231126090813_PERFOR~1.PDF', '2023-11-26 17:08:13', '2023-11-26 17:08:13', '1', 1),
(67, 'Module 1 - Welcome!', 'Welcome!', '20231127012550_Eng_-_Blue.png', 20, 3, '20231127012550_RPH_English_Year_3_Module_1.docx', '20231127012550_Worksheet_English_Year_3_Module_1.pdf', '20231127012550_Notes_English_Year_3_Module_1.pptx', '20231127012550_Quiz_English_Year_3_Module_1.pdf', '20231127012550_PERFOR~1.PDF', '2023-11-27 09:25:50', '2023-11-27 09:25:50', '1', 1),
(68, 'Module 2 - Every Day', 'Every Day', '20231127013420_Eng_-_Orange.png', 20, 3, '20231127013420_RPH_English_Year_3_Module_2.docx', '20231127013420_Worksheet_English_Year_3_Module_2.pdf', '20231127013420_Notes_English_Year_3_Module_2.pptx', '20231127013420_Quiz_English_Year_3_Module_2.pdf', '20231127013420_PERFOR~1.PDF', '2023-11-27 09:34:20', '2023-11-27 09:34:20', '1', 1),
(69, 'Module 3 - Right Now', 'Right Now', '20231127013556_Eng_-_Red.png', 20, 3, '20231127013556_RPH_English_Year_3_Module_3.docx', '20231127013556_Worksheet_English_Year_3_Module_3.pdf', '20231127013556_Notes_English_Year_3_Module_3.pptx', '20231127013556_Quiz_English_Year_3_Module_3.pdf', '20231127013556_PERFOR~1.PDF', '2023-11-27 09:35:56', '2023-11-27 09:35:56', '1', 1),
(70, 'Module 4 - Year In, Year Out', 'Year In, Year Out', '20231127013744_Eng_-_Red.png', 20, 3, '20231127013744_RPH_English_Year_3_Module_4.docx', '20231127013744_Worksheet_English_Year_3_Module_4.pdf', '20231127013744_Notes_English_Year_3_Module_4.pptx', '20231127013744_Quiz_English_Year_3_Module_4.pdf', '20231127013744_PERFOR~1.PDF', '2023-11-27 09:37:44', '2023-11-27 09:37:44', '1', 1),
(71, 'Module 1 - Where are you from?', 'Where are you from?', '20231127014017_Eng_-_Blue.png', 20, 4, '20231127014017_RPH_English_Year_4_Module_1.docx', '20231127014017_Worksheet_English_Year_4_Module_1.pdf', '20231127014017_Notes_English_Year_4_Module_1.pptx', '20231127014017_Quiz_English_Year_4_Module_1.pdf', '20231127014017_PERFOR~1.PDF', '2023-11-27 09:40:17', '2023-11-27 09:40:17', '1', 1),
(72, 'Module 2 - My Week', 'My week', '20231127014200_Eng_-_Orange.png', 20, 4, '20231127014200_RPH_English_Year_4_Module_2.docx', '20231127014200_Worksheet_English_Year_4_Module_2.pdf', '20231127014200_Notes_English_Year_4_Module_2.pptx', '20231127014200_Quiz_English_Year_4_Module_2.pdf', '20231127014200_PERFOR~1.PDF', '2023-11-27 09:42:00', '2023-11-27 09:42:00', '1', 1),
(73, 'Module 3 - In the past', 'In the past', '20231127014344_Eng_-_Red.png', 20, 4, '20231127014344_RPH_English_Year_4_Module_3.docx', '20231127014344_Worksheet_English_Year_4_Module_3.pdf', '20231127014344_Notes_English_Year_4_Module_3.pptx', '20231127014344_Quiz_English_Year_4_Module_3.pdf', '20231127014344_PERFOR~1.PDF', '2023-11-27 09:43:44', '2023-11-27 09:43:44', '1', 1),
(74, 'Module 4 - Celebrations', 'Celebrations', '20231127014517_Eng_-_Yellow.png', 20, 4, '20231127014517_RPH_English_Year_4_Module_4.docx', '20231127014517_Worksheet_English_Year_4_Module_4.pdf', '20231127014517_Notes_English_Year_4_Module_4.pptx', '20231127014517_Quiz_English_Year_4_Module_4.pdf', '20231127014517_PERFOR~1.PDF', '2023-11-27 09:45:17', '2023-11-27 09:45:17', '1', 1),
(75, 'Starter Unit - Free Time', 'Free Time', '20231127014748_Eng_-_Blue.png', 20, 5, '20231127014748_RPH_English_Year_5_Starter_Unit.docx', '20231127014748_Worksheet_English_Year_5_Starter_Unit.pdf', '20231127014748_Notes_English_Year_5_Starter_Unit.pptx', '20231127014748_Quiz_English_Year_5_Starter_Unit.pdf', '20231127014748_PERFOR~1.PDF', '2023-11-27 09:47:48', '2023-11-27 09:47:48', '1', 1),
(76, 'Unit 1 - Towns and Cities', 'Town and Cities', '20231127014928_Eng_-_Orange.png', 20, 5, '20231127014928_RPH_English_Year_5_Unit_1.docx', '20231127014928_Worksheet_English_Year_5__Unit_1.pdf', '20231127014928_Notes_English_Year_5_Unit_1.pptx', '20231127014928_Quiz_English_Year_5_Unit_1.pdf', '20231127014928_PERFOR~1.PDF', '2023-11-27 09:49:28', '2023-11-27 09:49:28', '1', 1),
(77, 'Unit 2 - Days', 'Days', '20231127015430_Eng_-_Yellow.png', 20, 5, '20231127015129_RPH_English_Year_5_Unit_2.docx', '20231127015129_Worksheet_English_Year_5_Unit_2.pdf', '20231127015129_Notes_English_Year_5_Unit_2.pptx', '20231127015129_Quiz_English_Year_5_Unit_2.pdf', '20231127015129_PERFOR~1.PDF', '2023-11-27 09:51:29', '2023-11-27 09:54:30', '1', 1),
(78, 'Unit 3 - Wild Life', 'Wild Life', '20231127015334_Eng_-_Red.png', 20, 5, '20231127015334_RPH_English_Year_5_Unit_3.docx', '20231127015334_Worksheet_English_Year_5_Unit_3.pdf', '20231127015334_Notes_English_Year_5_Unit_3.pptx', '20231127015334_Quiz_English_Year_5_Unit_3.pdf', '20231127015334_PERFOR~1.PDF', '2023-11-27 09:53:34', '2023-11-27 09:53:34', '1', 1),
(79, 'Starter Unit - Welcome', 'Welcome', '20231127022115_Eng_-_Blue.png', 20, 6, '20231127022115_RPH_English_Year_6_Starter_Unit.docx', '20231127022115_Worksheet_English_Year_6_Starter_Unit.pdf', '20231127022115_Notes_English_Year_6_Starter_Unit_.pptx', '20231127022115_Quiz_English_Year_6_Starter_Unit.pdf', '20231127022115_PERFOR~1.PDF', '2023-11-27 10:21:15', '2023-11-27 10:21:15', '1', 1),
(80, 'Unit 1 - It\'s an emergency!', 'It\'s an emergency!', '20231127022918_Eng_-_Orange.png', 20, 6, '20231127022918_RPH_English_Year_6_Unit_1.docx', '20231127022918_Worksheet_English_Year_6_Unit_1.pdf', '20231127022918_Notes_English_Year_6_Unit_1.pptx', '20231127022918_Quiz_English_Year_6_Unit_1.pdf', '20231127022918_PERFOR~1.PDF', '2023-11-27 10:29:18', '2023-11-27 10:29:18', '1', 1),
(81, 'Unit 2 - Life in the past', 'Life in the past', '20231127023058_Eng_-_Red.png', 20, 6, '20231127023058_RPH_English_Year_6_Unit_2.docx', '20231127023058_Worksheet_English_Year_6_Unit_2.pdf', '20231127023058_Notes_English_Year_6_Unit_2.pptx', '20231127023058_Quiz_English_Year_6_Unit_2.pdf', '20231127023058_PERFOR~1.PDF', '2023-11-27 10:30:58', '2023-11-27 10:30:58', '1', 1),
(82, 'Tema 1 - Keluarga Penyayang', 'Keluarga Penyayang', '20231127043436_BM_Thumbnail_Blue.jpg', 19, 1, '20231127043436_RPH_Bahasa_Melayu_Darjah_1_Tema_1.docx', '20231127043436_LEMBAR~1.PDF', '20231127043436_NOTAMU~1.PPT', '20231127043436_KUIZBA~1.PDF', '20231127043436_PERFOR~1.PDF', '2023-11-27 12:34:36', '2023-11-27 12:34:36', '1', 1),
(83, 'Unit 3 - Adventure Time', 'Adventure Time', '20231127045325_Eng_-_Yellow.png', 20, 6, '20231127045325_RPH_English_Year_6_Unit_3.docx', '20231127045325_Worksheet_English_Year_6_Unit_3.pdf', '20231127045325_Notes_English_Year_6_Unit_3.pptx', '20231127045325_Quiz_English_Year_6_Unit_3.pdf', '20231127045325_PERFOR~1.PDF', '2023-11-27 12:53:25', '2023-11-27 12:53:25', '1', 1),
(84, 'Topik 1 - Nombor hingga 100', 'Nombor hingga 100', '20231127045940_Math_-_Blue.png', 22, 1, '20231127045940_RPH_Matematik_Tahun_1_Unit_1.docx', '20231127045940_Lembaran_Kerja_Matematik_Tahun_1_Unit_1.pdf', '20231127045940_Nota_Multimedia_Matematik_Tahun_1_Unit_1.pptx', '20231127045940_Kuiz_Matematik_Tahun_1_Unit_1.pdf', '20231127045940_PERFOR~1.PDF', '2023-11-27 12:59:40', '2023-11-27 12:59:40', '1', 1),
(85, 'Topik 2 - Tambah dan Tolak', 'Tambah dan Tolak', '20231129063117_Math_-_Orange.png', 22, 1, '20231129063024_RPH_Matematik_Tahun_1_Unit_2.docx', '20231129063024_Lembaran_Kerja_Matematik_Tahun_1_Unit_2.pdf', '20231129063024_Nota_Multimedia_Matematik_Tahun_1_Unit_2_.pptx', '20231129063024_Kuiz_Matematik_Tahun_1_Unit_2.pdf', '20231129063024_PERFOR~1.PDF', '2023-11-29 14:30:24', '2023-11-29 14:31:17', '1', 1),
(86, 'Topik 3 - Pecahan', 'Pecahan', '20231129063331_Math_-_Red.png', 22, 1, '20231129063331_RPH_Matematik_Tahun_1_Unit_3.docx', '20231129063331_Lembaran_Kerja_Matematik_Tahun_1_Unit_3.pdf', '20231129063331_Nota_Multimedia_Matematik_Tahun_1_Unit_3_.pptx', '20231129063331_Kuiz_Matematik_Tahun_1_Unit_3.pdf', '20231129063331_PERFOR~1.PDF', '2023-11-29 14:33:31', '2023-11-29 14:33:31', '1', 1),
(87, 'Topik 4 - Wang', 'Wang', '20231129063523_Math_-_Yellow.png', 22, 1, '20231129063523_RPH_Matematik_Tahun_1_Unit_4.docx', '20231129063523_Lembaran_Kerja_Matematik_Tahun_1_Unit_4.pdf', '20231129063523_Nota_Multimedia_Matematik_Tahun_1_Unit_4.pptx', '20231129063523_Kuiz_Matematik_Tahun_1_Unit_4.pdf', '20231129063523_PERFOR~1.PDF', '2023-11-29 14:35:23', '2023-11-29 14:35:23', '1', 1),
(88, 'Topik 1 - Nombor Hingga 1000', 'Nombor hingga 1000', '20231129063707_Math_-_Blue.png', 22, 2, '20231129063707_RPH_Matematik_Tahun_2_Unit_1.docx', '20231129063707_Lembaran_Kerja_Matematik_Tahun_2_Unit_1.pdf', '20231129063707_Nota_Multimedia_Matematik_Tahun_2_Unit_1.pptx', '20231129063707_Kuiz_Matematik_Tahun_2_Unit_1.pdf', '20231129063707_PERFOR~1.PDF', '2023-11-29 14:37:07', '2023-11-29 14:37:07', '1', 1),
(89, 'Topik 2 - Tambah, tolak, darab dan bahagi', 'Tambah, tolak, darab dan bahagi', '20231129063845_Math_-_Orange.png', 22, 2, '20231129063845_RPHMAT~1.DOC', '20231129063845_LEMBAR~1.PDF', '20231129063845_NOTAMU~1.PPT', '20231129063845_KUIZMA~1.PDF', '20231129063845_PERFOR~1.PDF', '2023-11-29 14:38:45', '2023-11-29 14:38:45', '1', 1),
(90, 'Topik 3 - Pecahan dan Perpuluhan', 'Pecahan dan Perpuluhan', '20231203034219_Math_-_Red.png', 22, 2, '20231203034135_RPH_Matematik_Tahun_2_Unit_2.docx', '20231203034135_LEMBAR~1.PDF', '20231203034135_NOTAMU~1.PPT', '20231203034135_Kuiz_Matematik_Tahun_2_Unit_3.pdf', '20231203034135_PERFOR~1.PDF', '2023-12-03 11:41:35', '2023-12-03 11:42:19', '1', 1),
(91, 'Topik 4 - Wang', 'Wang', '20231203034342_Math_-_Yellow.png', 22, 2, '20231203034342_RPH_Matematik_Tahun_2_Unit_4.docx', '20231203034342_Lembaran_Kerja_Matematik_Tahun_2_Unit_4.pdf', '20231203034342_Nota_Multimedia_Matematik_Tahun_2_Unit_4.pptx', '20231203034342_Kuiz_Matematik_Tahun_2_Unit_4.pdf', '20231203034342_PERFOR~1.PDF', '2023-12-03 11:43:42', '2023-12-03 11:43:42', '1', 1),
(92, 'Topik 1 - Nombor hingga 10,000', 'Nombor hingga 10,000', '20231203035638_Math_-_Blue.png', 22, 3, '20231203035638_RPH_Matematik_Tahun_3_Unit_1.docx', '20231203035638_Lembaran_kerja_Matematik_Tahun_3_Unit_1.pdf', '20231203035638_NOTAMU~1.PPT', '20231203035638_Kuiz_Matematik_Tahun_3_Unit_1.pdf', '20231203035638_PERFOR~1.PDF', '2023-12-03 11:56:38', '2023-12-03 11:56:38', '1', 1),
(93, 'Topik 2 - Tambah, tolak, darab dan bahagi', 'Tambah, tolak, darab dan bahagi', '20231203035846_Math_-_Orange.png', 22, 3, '20231203035846_RPHMAT~1.DOC', '20231203035846_LEMBAR~1.PDF', '20231203035846_NOTAMU~1.PPT', '20231203035846_KUIZMA~1.PDF', '20231203035846_PERFOR~1.PDF', '2023-12-03 11:58:46', '2023-12-03 11:58:46', '1', 1),
(94, 'Topik 3 - Pecahan, perpuluhan dan peratus', 'Pecahan, perpuluhan dan peratus', '20231203040055_Math_-_Red.png', 22, 3, '20231203040055_RPHMAT~1.DOC', '20231203040055_LEMBAR~1.PDF', '20231203040055_NOTAMU~1.PPT', '20231203040055_KUIZMA~1.PDF', '20231203040055_PERFOR~1.PDF', '2023-12-03 12:00:55', '2023-12-03 12:01:10', '1', 1),
(95, 'Topik 4 - Wang', 'Wang', '20231203040239_Math_-_Yellow.png', 22, 3, '20231203040239_RPH_Matematik_Tahun_3_Unit_4.docx', '20231203040239_Lembaran_kerja_Matematik_Tahun_3_Unit_4.pdf', '20231203040239_Nota_Multimedia_Matematik_Tahun_3_Unit_4.pptx', '20231203040239_Kuiz_Matematik_Tahun_3_Unit_4.pdf', '20231203040239_PERFOR~1.PDF', '2023-12-03 12:02:39', '2023-12-03 12:02:39', '1', 1),
(96, 'Topik 1 - Nombor dan operasi', 'Nombor dan operasi', '20231203040426_Math_-_Blue.png', 22, 4, '20231203040426_RPH_Matematik_Tahun_4_Unit_1.docx', '20231203040426_Lembaran_Kerja_Matematik_Tahun_4_Unit_1.pdf', '20231203040426_Nota_Multimedia_Tahun_4_Unit_1.pptx', '20231203040426_Kuiz_Matematik_Tahun_4_Unit_1.pdf', '20231203040426_PERFOR~1.PDF', '2023-12-03 12:04:26', '2023-12-03 12:04:26', '1', 1),
(97, 'Topik 2 - Pecahan, perpuluhan dan peratus', 'Pecahan, perpuluhan dan peratus', '20231203041037_Math_-_Orange.png', 22, 4, '20231203041037_RPHMAT~1.DOC', '20231203041037_LEMBAR~1.PDF', '20231203041037_NOTAMU~1.PPT', '20231203041037_KUIZMA~1.PDF', '20231203041037_PERFOR~1.PDF', '2023-12-03 12:10:37', '2023-12-03 12:10:37', '1', 1),
(98, 'Topik 3 - Wang', 'Wang', '20231203041203_Math_-_Red.png', 22, 4, '20231203041203_RPH_Matematik_Tahun_4_Unit_3.docx', '20231203041203_Lembaran_Kerja_Matematik_Tahun_4_Unit_3.pdf', '20231203041203_NOTA_MULTIMEDIA_MATEMATIK_TAHUN_4_(WANG).pptx', '20231203041203_Kuiz_Matematik_Tahun_4_Unit_3.pdf', '20231203041203_PERFOR~1.PDF', '2023-12-03 12:12:03', '2023-12-03 12:12:03', '1', 1),
(99, 'Topik 4 - Masa dan waktu', 'Masa dan waktu', '20231203041456_Math_-_Yellow.png', 22, 4, '20231203041456_RPH_Matematik_Tahun_1_Unit_4.docx', '20231203041456_Lembaran_kerja_Matematik_Tahun_4_Unit_4.pdf', '20231203041456_NOTAMU~1.PPT', '20231203041456_Kuiz_Matematik_Tahun_4_Unit_4.pdf', '20231203041456_PERFOR~1.PDF', '2023-12-03 12:14:56', '2023-12-03 12:14:56', '1', 1),
(100, 'Topik 1 - Nombor bulat dan operasi', 'Nombor bulat dan operasi', '20231203041755_Math_-_Blue.png', 22, 5, '20231203041755_RPH_Matematik_Tahun_5_Unit_1.docx', '20231203041755_LEMBAR~1.PDF', '20231203041755_NOTAMU~1.PPT', '20231203041755_Kuiz_Matematik_Tahun_5_Unit_1.pdf', '20231203041755_PERFOR~1.PDF', '2023-12-03 12:17:55', '2023-12-03 12:17:55', '1', 1),
(101, 'Topik 2 - Pecahan, perpuluhan dan peratus', 'Pecahan, perpuluhan dan peratus', '20231203041932_Math_-_Orange.png', 22, 5, '20231203041932_RPHMAT~1.DOC', '20231203041932_LEMBAR~1.PDF', '20231203041932_NOTAMU~1.PPT', '20231203041932_KUIZMA~1.PDF', '20231203041932_PERFOR~1.PDF', '2023-12-03 12:19:32', '2023-12-03 12:19:32', '1', 1),
(102, 'Topik 3 - Wang', 'Wang', '20231203042115_Math_-_Red.png', 22, 5, '20231203042115_RPH_Matematik_Tahun_5_Unit_3.docx', '20231203042115_Lembaran_Kerja_Matematik_Tahun_5_Unit_3.pdf', '20231203042115_Nota_Multimedia_Matematik_Tahun_5_Unit_3.pptx', '20231203042115_Kuiz_Matematik_Tahun_5_Unit_3.pdf', '20231203042115_PERFOR~1.PDF', '2023-12-03 12:21:15', '2023-12-03 12:21:15', '1', 1),
(103, 'Topik 4 - Masa dan waktu', 'Masa dan waktu', '20231203042300_Math_-_Yellow.png', 22, 5, '20231203042300_RPH_Matematik_Tahun_5_Unit_4.docx', '20231203042300_Lembaran_Kerja_Matematik_Tahun_5_Unit_4.pdf', '20231203042300_NOTA_MULTIMEDIA_TAHUN_5_(MASA_DAN_WAKTU).pptx', '20231203042300_Kuiz_Matematik_Tahun_5_Unit_4.pdf', '20231203042300_PERFOR~1.PDF', '2023-12-03 12:23:00', '2023-12-03 12:23:00', '1', 1),
(104, 'Topik 1 - Nombor bulat dan operasi', 'Nombor bulat dan operasi', '20231203042445_Math_-_Blue.png', 22, 6, '20231203042445_RPH_Matematik_Tahun_6_Unit_1.docx', '20231203042445_LEMBAR~1.PDF', '20231203042445_NOTAMU~1.PPT', '20231203042445_Kuiz_Matematik_Tahun_6_Unit_1.pdf', '20231203042445_PERFOR~1.PDF', '2023-12-03 12:24:45', '2023-12-03 12:24:45', '1', 1),
(105, 'Topik 2 - Pecahan, perpuluhan dan peratus', 'Pecahan, perpuluhan dan peratus', '20231203042632_Math_-_Orange.png', 22, 6, '20231203042632_RPHMAT~1.DOC', '20231203042632_LEMBAR~1.PDF', '20231203042632_NOTAMU~1.PPT', '20231203042632_KUIZMA~1.PDF', '20231203042632_PERFOR~1.PDF', '2023-12-03 12:26:32', '2023-12-03 12:26:32', '1', 1),
(106, 'Topik 3 - Wang', 'Wang', '20231203042754_Math_-_Red.png', 22, 6, '20231203042754_RPH_Matematik_Tahun_6_Unit_3.docx', '20231203042754_Lembaran_Kerja_Matematik_Tahun_6_Unit_3.pdf', '20231203042754_Nota_Multimedia_Matematik_Tahun_6_Unit_3.pptx', '20231203042754_Kuiz_Matematik_Tahun_6_Unit_3.pdf', '20231203042754_PERFOR~1.PDF', '2023-12-03 12:27:54', '2023-12-03 12:27:54', '1', 1),
(107, 'Topik 4 - Masa dan waktu', 'Masa dan waktu', '20231203042912_Math_-_Yellow.png', 22, 6, '20231203042912_RPH_Matematik_Tahun_6_Unit_4.docx', '20231203042912_Lembaran_Kerja_Matematik_Tahun_6_Unit_4.pdf', '20231203042912_Nota_Multimedia_Matematik_Tahun_6_Unit_4.pptx', '20231203042912_Kuiz_Bertahap_Matematik_Tahun_6_Unit_4.pdf', '20231203042912_PERFOR~1.PDF', '2023-12-03 12:29:12', '2023-12-03 12:29:12', '1', 1),
(108, 'Unit 1 - Kemahiran Saintifik', 'Kemahiran Saintifik', '20231203043610_Sains_Thumbnail_Blue.jpg', 21, 1, '20231203043610_RPH_Sains_Darjah_1_Unit_1.docx', '20231203043610_Lembaran_Kerja_Sains_Darjah_1_Unit_1.pdf', '20231203043610_Nota_Multimedia_Sains_Darjah_1_Unit_1.pptx', '20231203043610_Kuiz_Sains_Darjah_1_Unit_1.pdf', '20231203043610_PERFOR~1.PDF', '2023-12-03 12:36:10', '2023-12-03 12:36:10', '1', 1),
(109, 'Unit 2 - Peraturan bilik sains', 'Peraturan bilik sains', '20231203043911_Sains_Thumbnail_Orange.jpg', 21, 1, '20231203043911_RPH_Sains_Darjah_1_Unit_2.docx', '20231203043911_Lembaran_Kerja_Sains_Darjah_1_Unit_2.pdf', '20231203043911_Nota_Multimedia_Sains_Darjah_1_Unit_2.pptx', '20231203043911_Kuiz_Sains_Darjah_1_Unit_2.pdf', '20231203043911_PERFOR~1.PDF', '2023-12-03 12:39:11', '2023-12-03 12:39:11', '1', 1),
(110, 'Unit 3 - Benda hidup dan benda bukan hidup', 'Benda hidup dan benda bukan hidup', '20231203044128_Sains_Thumbnail_Red.jpg', 21, 1, '20231203044128_RPH_Sains_Darjah_1_Unit_3.docx', '20231203044128_LEMBAR~1.PDF', '20231203044128_NOTAMU~1.PPT', '20231203044128_Kuiz_Sains_Darjah_1_Unit_3.pdf', '20231203044128_PERFOR~1.PDF', '2023-12-03 12:41:28', '2023-12-03 12:41:28', '1', 1),
(111, 'Unit 4 - Manusia', 'Manusia', '20231203044257_Sains_Thumbnail_Yellow.jpg', 21, 1, '20231203044257_RPH_Sains_Darjah_1_Unit_4.docx', '20231203044257_Lembaran_Kerja_Sains_Darjah_1_Unit_4.pdf', '20231203044257_Nota_Multimedia_Sains_Darjah_1_Unit_4.pptx', '20231203044257_Kuiz_Sains_Darjah_1_Unit_4.pdf', '20231203044257_PERFOR~1.PDF', '2023-12-03 12:42:57', '2023-12-03 12:42:57', '1', 1),
(112, 'Unit 1 - Kemahiran Saintifik', 'Kemahiran Saintifik', '20231203044506_Sains_Thumbnail_Blue.jpg', 21, 2, '20231203044506_RPH_Sains_Darjah_2_Unit_1.docx', '20231203044506_Lembaran_Kerja_Sains_Darjah_2_Unit_1.pdf', '20231203044506_Nota_Multimedia_Sains_Darjah_2_Unit_1.pptx', '20231203044506_Kuiz_Sains_Darjah_2_Unit_1.pdf', '20231203044506_PERFOR~1.PDF', '2023-12-03 12:45:06', '2023-12-03 12:45:06', '1', 1),
(113, 'Unit 2 - Peraturan Bilik Sains', 'Peraturan Bilik Sains', '20231203044706_Sains_Thumbnail_Orange.jpg', 21, 2, '20231203044706_RPH_Sains_Darjah_2_Unit_2.docx', '20231203044706_Lembaran_Kerja_Sains_Darjah_2_Unit_2.pdf', '20231203044706_Nota_Multimedia_Sains_Darjah_2_Unit_2.pptx', '20231203044706_Kuiz_Sains_Darjah_2_Unit_2.pdf', '20231203044706_PERFOR~1.PDF', '2023-12-03 12:47:06', '2023-12-03 12:47:06', '1', 1),
(114, 'Unit 3 - Manusia', 'Manusia', '20231203044841_Sains_Thumbnail_Red.jpg', 21, 2, '20231203044841_RPH_Sains_Darjah_2_Unit_3.docx', '20231203044841_Lembaran_Kerja_Sains_Darjah_2_Unit_3.pdf', '20231203044841_Nota_Multimedia_Sains_Darjah_2_Unit_3.pptx', '20231203044841_Kuiz_Sains_Darjah_2_Unit_3.pdf', '20231203044841_PERFOR~1.PDF', '2023-12-03 12:48:42', '2023-12-03 12:48:42', '1', 1),
(115, 'Unit 4 - Haiwan', 'Haiwan', '20231203045035_Sains_Thumbnail_Yellow.jpg', 21, 2, '20231203045035_RPH_Sains_Darjah_2_Unit_4.docx', '20231203045035_Lembaran_Kerja_Sains_Darjah_2_Unit_4.pdf', '20231203045035_Nota_Multimedia_Sains_Darjah_2_Unit_4.pptx', '20231203045035_Kuiz_Sains_Darjah_2_Unit_4.pdf', '20231203045035_PERFOR~1.PDF', '2023-12-03 12:50:35', '2023-12-03 12:50:35', '1', 1),
(116, 'Unit 1 - Kemahiran Saintifik', 'Kemahiran Saintifik', '20231203045437_Sains_Thumbnail_Blue.jpg', 21, 3, '20231203045437_RPH_Sains_Darjah_3_Unit_1.docx', '20231203045437_Lembaran_Kerja_Sains_Darjah_3_Unit_1.pdf', '20231203045437_Nota_Multimedia_Sains_Darjah_3_Unit_1.pptx', '20231203045437_Kuiz_Sains_Darjah_3_Unit_1.pdf', '20231203045437_PERFOR~1.PDF', '2023-12-03 12:54:37', '2023-12-03 12:54:37', '1', 1),
(117, 'Unit 2 - Peraturan Bilik Sains', 'Peraturan bilik sains', '20231203050137_Sains_Thumbnail_Orange.jpg', 21, 3, '20231203050137_RPH_Sains_Darjah_3_Unit_2.docx', '20231203050137_Lembaran_Kerja_Sains_Darjah_3_Unit_2.pdf', '20231203050137_Nota_Multimedia_Sains_Darjah_3_Unit_2.pptx', '20231203050137_Kuiz_Sains_Darjah_3_Unit_2.pdf', '20231203050137_PERFOR~1.PDF', '2023-12-03 13:01:37', '2023-12-03 13:01:37', '1', 1),
(118, 'Unit 3 - Manusia', 'Manusia', '20231203050346_Sains_Thumbnail_Red.jpg', 21, 3, '20231203050346_RPH_Sains_Darjah_3_Unit_3.docx', '20231203050346_Lembaran_Kerja_Sains_Darjah_3_Unit_3.pdf', '20231203050346_Nota_Multimedia_Sains_Darjah_3_Unit_3.pptx', '20231203050346_Kuiz_Sains_Darjah_3_Unit_3.pdf', '20231203050346_PERFOR~1.PDF', '2023-12-03 13:03:46', '2023-12-03 13:03:46', '1', 1),
(119, 'Unit 4 - Haiwan', 'Haiwan', '20231203050513_Sains_Thumbnail_Yellow.jpg', 21, 3, '20231203050513_RPH_Sains_Darjah_3_Unit_4.docx', '20231203050513_Lembaran_Kerja_Sains_Darjah_3_Unit_4.pdf', '20231203050513_Nota_Multimedia_Sains_Darjah_3_Unit_4.pptx', '20231203050513_Kuiz_Sains_Darjah_3_Unit_4.pdf', '20231203050513_PERFOR~1.PDF', '2023-12-03 13:05:13', '2023-12-03 13:05:13', '1', 1),
(120, 'Unit 1 - Kemahiran Saintifik', 'Kemahiran Saintifik', '20231203061105_Sains_Thumbnail_Blue.jpg', 21, 4, '20231203061105_RPH_Sains_Darjah_4_Unit_1.docx', '20231203061105_Lembaran_Kerja_Sains_Darjah_4_Unit_1.pdf', '20231203061105_Nota_Multimedia_Sains_Darjah_4_Unit_1.pptx', '20231203061105_Kuiz_Sains_Darjah_4_Unit_1.pdf', '20231203061105_PERFOR~1.PDF', '2023-12-03 14:11:05', '2023-12-03 14:11:05', '1', 1),
(121, 'Unit 2 - Manusia', 'Manusia', '20231203061324_Sains_Thumbnail_Orange.jpg', 21, 4, '20231203061324_RPH_Sains_Darjah_4_Unit_2.docx', '20231203061324_Lembaran_Kerja_Sains_Darjah_4_Unit_2.pdf', '20231203061324_Nota_Multimedia_Sains_Darjah_4_Unit_2.pptx', '20231203061324_Kuiz_Sains_Darjah_4_Unit_2.pdf', '20231203061324_PERFOR~1.PDF', '2023-12-03 14:13:24', '2023-12-03 14:13:24', '1', 1),
(122, 'Unit 3 - Haiwan', 'Haiwan', '20231203061548_Sains_Thumbnail_Red.jpg', 21, 4, '20231203061548_RPH_Sains_Darjah_4_Unit_3.docx', '20231203061548_Lembaran_Kerja_Sains_Darjah_4_Unit_3.pdf', '20231203061548_Nota_Multimedia_Sains_Darjah_4_Unit_3.pptx', '20231203061548_Kuiz_Sains_Darjah_4_Unit_3.pdf', '20231203061548_PERFOR~1.PDF', '2023-12-03 14:15:48', '2023-12-03 14:15:48', '1', 1),
(123, 'Unit 4 - Tumbuh-tumbuhan', 'Tumbuh-tumbuhan', '20231203061748_Sains_Thumbnail_Yellow.jpg', 21, 4, '20231203061748_RPH_Sains_Darjah_4_Unit_4.docx', '20231203061748_Lembaran_Kerja_Sains_Darjah_4_Unit_4.pdf', '20231203061748_Nota_Multimedia_Sains_Darjah_4_Unit_4.pptx', '20231203061748_Kuiz_Sains_Darjah_4_Unit_4.pdf', '20231203061748_PERFOR~1.PDF', '2023-12-03 14:17:48', '2023-12-03 14:17:48', '1', 1),
(124, 'Unit 1 - Kemahiran Saintifik', 'Kemahiran Saintifik', '20231203061948_Sains_Thumbnail_Blue.jpg', 21, 5, '20231203061948_RPH_Sains_Darjah_5_Unit_1.docx', '20231203061948_Lembaran_Kerja_Sains_Darjah_5_Unit_1.pdf', '20231203061948_Nota_Multimedia_Sains_Darjah_5_Unit_1.pptx', '20231203061948_Kuiz_Sains_Darjah_5_Unit_1.pdf', '20231203061948_PERFOR~1.PDF', '2023-12-03 14:19:48', '2023-12-03 14:19:48', '1', 1),
(125, 'Unit 2 - Manusia', 'Manusia', '20231203062311_Sains_Thumbnail_Orange.jpg', 21, 5, '20231203062311_RPH_Sains_Darjah_5_Unit_2.docx', '20231203062311_Lembaran_Kerja_Sains_Darjah_5_Unit_2.pdf', '20231203062311_Nota_Multimedia_Sains_Darjah_5_Unit_2.pptx', '20231203062311_Kuiz_Sains_Darjah_5_Unit_2.pdf', '20231203062311_PERFOR~1.PDF', '2023-12-03 14:23:11', '2023-12-03 14:23:11', '1', 1),
(126, 'Unit 3 - Haiwan', 'Haiwan', '20231203062451_Sains_Thumbnail_Red.jpg', 21, 5, '20231203062451_RPH_Sains_Darjah_5_Unit_3.docx', '20231203062451_Lembaran_Kerja_Sains_Darjah_5_Unit_3.pdf', '20231203062451_Nota_Multimedia_Sains_Darjah_5_Unit_3.pptx', '20231203062451_Kuiz_Sains_Darjah_5_Unit_3.pdf', '20231203062451_PERFOR~1.PDF', '2023-12-03 14:24:51', '2023-12-03 14:24:51', '1', 1),
(127, 'Unit 4 - Tumbuh-tumbuhan', 'Tumbuh-tumbuhan', '20231203062735_Sains_Thumbnail_Yellow.jpg', 21, 5, '20231203062735_RPH_Sains_Darjah_5_Unit_4.docx', '20231203062735_Lembaran_Kerja_Sains_Darjah_5_Unit_4.pdf', '20231203062735_Nota_Multimedia_Sains_Darjah_5_Unit_4.pptx', '20231203062735_Kuiz_Sains_Darjah_5_Unit_4.pdf', '20231203062735_PERFOR~1.PDF', '2023-12-03 14:27:35', '2023-12-03 14:27:35', '1', 1),
(128, 'Unit 1 - Kemahiran Saintifik', 'Kemahiran Saintifik', '20231203062954_Sains_Thumbnail_Blue.jpg', 21, 6, '20231203062954_RPH_Sains_Darjah_6_Unit_1.docx', '20231203062954_Lembaran_Kerja_Sains_Darjah_6_Unit_1.pdf', '20231203062954_Nota_Multimedia_Sains_Darjah_6_Unit_1.pptx', '20231203062954_Kuiz_Sains_Darjah_6_Unit_1.pdf', '20231203062954_PERFOR~1.PDF', '2023-12-03 14:29:54', '2023-12-03 14:29:54', '1', 1),
(129, 'Unit 2 - Manusia', 'Manusia', '20231203063103_Sains_Thumbnail_Orange.jpg', 21, 6, '20231203063103_RPH_Sains_Darjah_6_Unit_2.docx', '20231203063103_Lembaran_Kerja_Sains_Darjah_6_Unit_2.pdf', '20231203063103_Nota_Multimedia_Sains_Darjah_6_Unit_2.pptx', '20231203063103_Kuiz_Sains_Darjah_6_Unit_2.pdf', '20231203063103_PERFOR~1.PDF', '2023-12-03 14:31:03', '2023-12-03 14:31:03', '1', 1),
(130, 'Unit 3 - Mikroorganisma', 'Mikroorganisma', '20231203063504_Sains_Thumbnail_Red.jpg', 21, 6, '20231203063504_RPH_Sains_Darjah_6_Unit_3.docx', '20231203063504_Lembaran_Kerja_Sains_Darjah_6_Unit_3.pdf', '20231203063504_Nota_Multimedia_Sains_Darjah_6_Unit_3.pptx', '20231203063504_Kuiz_Sains_Darjah_6_Unit_3.pdf', '20231203063504_PERFOR~1.PDF', '2023-12-03 14:35:05', '2023-12-03 14:35:05', '1', 1),
(131, 'Unit 4 - Interaksi antara hidupan', 'Interaksi antara hidupan', '20231203091553_Sains_Thumbnail_Yellow.jpg', 21, 6, '20231203091553_RPH_Sains_Darjah_6_Unit_4.docx', '20231203091553_Lembaran_Kerja_Sains_Darjah_6_Unit_4.pdf', '20231203091553_NOTAMU1.pptx', '20231203091553_Kuiz_Sains_Darjah_6_Unit_4.pdf', '20231203091553_PERFOR~1.PDF', '2023-12-03 17:15:53', '2024-01-09 18:29:37', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loops_category`
--

CREATE TABLE `loops_category` (
  `id` int(11) NOT NULL,
  `loop_category` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `image_url` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loops_category`
--

INSERT INTO `loops_category` (`id`, `loop_category`, `description`, `created_by`, `created_date`, `image_url`, `status`, `updated_date`) VALUES
(12, 'Animals', 'Explore animals world', 1, '2023-11-13 16:52:51', '6551e3e3aa62a_Puzzle 4.png', 1, NULL),
(13, 'Culture', 'Discover other world', 1, '2023-11-13 16:54:43', '6551e45399501_Puzzle 7.png', 1, NULL),
(14, 'Food', 'Boost you energy', 1, '2023-11-13 16:55:48', '6551e494f105a_Puzzle 2.png', 1, NULL),
(15, 'Geography', 'What\'s on the map', 1, '2023-11-13 16:56:14', '6551e4ae60abe_Puzzle 1.png', 1, NULL),
(16, 'History', 'Learn how past societies, systems, ideologies, governments, cultures and technologies were built, how they operated, and how they have changed.', 1, '2023-11-13 16:57:15', '6551e4ebc9bf6_Puzzle 3.png', 1, NULL),
(17, 'Sports', 'Boost your health', 1, '2023-11-13 16:58:21', '6551e52d23fc2_Puzzle 5.png', 1, NULL),
(18, 'STREAM', 'Become a little scientist', 1, '2023-11-13 16:59:41', '6551e57db4420_Puzzle 6.png', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `magazine`
--

CREATE TABLE `magazine` (
  `magazine_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cover_image_url` varchar(255) DEFAULT NULL,
  `magazine_path` varchar(250) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `magazine`
--

INSERT INTO `magazine` (`magazine_id`, `title`, `publish_date`, `created_by`, `category`, `description`, `cover_image_url`, `magazine_path`, `status`, `created_date`, `updated_date`) VALUES
(7, 'Iklim dan Cuaca', '2023-07-01', 1, NULL, 'The Malay proverb \"Get umbrella ready before rain\" means that we need to plan in case anything happens. This theme will trigger them to play their role even with a small effort during climate and weather changes.', '6551c78e476fc_Front Page JULY 23.jpg', '6551c78e48243_MindLoops_JULY 23 (Full Version)_compressed.pdf', 1, '2021-07-02 09:30:30', '2023-11-13 06:51:58'),
(8, 'Wira Dunia!', '2023-08-01', 1, NULL, 'Through this theme, children will get to know and appreciate individuals who are involved in contributing to the \r\ncountry and the world in various fields. The forms of contribution made by the individual concerned, will encourage them to do the same in helping others, this is because of the nature of children who are easily influenced by what they see and read, especially when it is displayed in the form of attractive infographics and comics.', '6551cc81387b4_Front Page AUGUST 23.jpg', '6551cc8139642_MindLoops_AUG 23 (Full Version)_compressed.pdf', 1, '2022-10-05 09:32:18', '2023-11-13 07:13:05'),
(9, 'Teknologi Masa Kini', '2023-09-02', 1, NULL, 'In the era of rapidly developing Malaysia, the use of technology is expanding to all groups, not limited to adults only, but children are also not left behind in following the pace of globalization. This theme will open their minds about the sophistication of the technology used to speed up the processes experienced by humans, not only limited to computers and smartphones.', '6551c816c1a27_Front Page Sept 23.jpg', '6551c816c29a6_MindLoops_SEPT 23 (Full Version)_compressed.pdf', 1, '2023-10-05 09:33:55', '2023-11-13 06:54:14'),
(13, 'Badan Sihat, Otak Cerdas', '2023-10-05', 8, NULL, 'Aim to give knowledge and exposure to children about healthy and balanced food considering that the younger \r\ngeneration should be educated and applied about the importance of good nutrition from an early age in kindergarten. Through the segment presented, it can instill awareness about healthy lifestyle practices among children and encourage them to learn to prepare nutritious and balanced meals easily at home.', '6551c87d64c92_Front Page Oct 23.jpg', '6551c87d6634f_MindLoops_OCT 23 (Full Version)_compressed.pdf', 1, '2023-10-06 09:43:32', '2023-11-13 06:55:57'),
(16, 'Dunia Fauna', '2023-06-01', 1, NULL, 'Aim to enable children to identify animals based on their type and group, and find out interesting facts about animals that are rarely found in other sources or sometimes they are easy to find but in a language that is relatively high for children to understand. An interesting revelations about animals in the segment will open children\'s eyes that animals are not only a source of food, but also used in sports activities, and there are career opportunities involving animals in this world.', '6551c92ba6694_Front Page JUNE 23.jpg', '6551c92ba6f26_MindLoops_JUNE 23 (Full Version)_compressed.pdf', 1, '2023-10-12 04:29:29', '2023-11-13 06:58:51'),
(17, 'Mari ke Angkasa!', '2023-05-01', 1, NULL, 'The knowledge about the solar system is not limited to adults only, this is because today\'s children are a fast-learning generation. They need to know things outside of the Earth such as facts about planets, life in space, rockets and more. Through this theme, the curiosity of children will be unravelled and can develop their minds. They can also practice living skills such as determining the direction of Qibla using the constellations in the sky, and learn how the navigator', '6551c9d405252_Front Page MAY 23.jpg', '6551c9d406125_MindLoops_MAY 23 (Full Version)_compressed.pdf', 1, '2023-10-12 04:33:59', '2023-11-13 07:01:40'),
(28, 'Berat Sama Dipikul, Ringan Sama Dijinjing', '2023-11-01', 1, NULL, 'Empathy, Gratefulness and Awareness of the existence of people with disabilities should be fostered from a young age. This theme allows children to instil an element of love in themselves so that they do not feel afraid or threatened when approaching the group. When awareness related to the existence of the disabled group is given, this indirectly gives love and affection to young children and forms an attitude of helping those who are more in need among them.', '6551c73e75c03_cover.jpg', '6551c73e75c06_magazine.pdf', 1, '2023-11-13 06:50:38', NULL),
(29, 'Budaya, Bahasa dan Bangsa', '2023-04-01', 1, NULL, 'Culture refer to the way of life. A rich culture is the culture that brings together various traditions, languages and races. This theme aims to give exposure and understanding to children about the diversity of races in Malaysia and abroad, as well as being introduced to the customs, culture, languages, foods and traditional clothing of each race.', '6551ca39b28ee_cover.jpg', '6551ca39b28f1_magazine.pdf', 1, '2023-11-13 07:03:21', NULL),
(30, '\'Go Green\'', '2023-03-01', 1, NULL, 'Aim to create awareness among readers especially students to play their role towards environmental conservation.\r\nThis environmental theme promotes kids\' critical and creative thinking skills through the various of segments provided by the authors team, and also inspires them to become more engaged with their communities.', '6551ca9d38561_cover.jpg', '6551ca9d38564_magazine.pdf', 1, '2023-11-13 07:05:01', NULL),
(31, 'Wacana', '2023-02-01', 1, NULL, 'The theme embarks a journey for our little readers to explore languages other than our mother tongue. ', '6551cb2897a7a_cover.jpg', '6551cb2897a7d_magazine.pdf', 1, '2023-11-13 07:07:20', NULL),
(32, 'Intelek', '2023-01-01', 1, NULL, 'As school break is almost over, the theme helps our readers to catch up from where they left off. The theme also provides the necessity we need to start our school journey. ', '6551cbb084199_cover.jpg', '6551cbb08419b_magazine.pdf', 1, '2023-11-13 07:09:36', NULL),
(33, 'Magazine Layout 2024', '2023-11-15', 1, NULL, 'Sample Magazine for 2024 Layout', '65547fba0c61f_230906 ML Magazine Layout 2024.jpg', '65547fba0d3f8_231115 ML Magazine Layout 2024.pdf', 0, '2023-11-15 07:38:36', '2024-01-08 17:27:41'),
(34, 'Kembali Ke Sekolah', '2022-03-01', 1, NULL, 'As learners enter a new age, a new school era, they will need to know what this year holds for them. This theme shows them what challenges they will face.', '655abab3be8aa_cover.jpg', '655abab3be8ad_magazine.pdf', 1, '2023-11-20 01:47:31', NULL),
(35, 'Iqra\'', '2022-04-01', 1, NULL, 'Reading and gaining knowledge is a virtue and a privilege for anyone. The theme encourages readers to grab a book and explore their minds to what the sheets of paper have to offer. ', '655abb99309c5_cover.jpg', '655abb99309c8_magazine.pdf', 1, '2023-11-20 01:51:21', NULL),
(36, 'Apresiasi', '2022-05-01', 1, NULL, 'Appreciation towards our everyday heroes is a must as they sacrifice and do so much to shape and inspire youngsters. The theme shows their everyday tasks and why do we need to appreciate our everyday hero. ', '655abc66f3c33_cover.jpg', '655abc66f3c35_magazine.pdf', 1, '2023-11-20 01:54:47', NULL),
(37, 'Hero', '2022-06-01', 1, NULL, 'Our father is our knight in shining armour. Anything we need, they will provide. The theme shows what we can do to show our love and admiration to our loving fathers. ', '655abd929b6d9_cover.jpg', '655abd929b6dc_magazine.pdf', 1, '2023-11-20 01:59:46', NULL),
(38, 'Kasih Sayang', '2022-07-01', 1, NULL, 'Human bonds are what keeps us together and in harmony. The themes show how we should treat our friends and humans all around. ', '655ad70538d1c_2207_covermag.jpg', '655ad70539cfa_9. Mindloops Julai 2022 FULL V2.pdf', 1, '2023-11-20 02:06:42', '2023-11-20 03:48:21'),
(39, 'Kemerdekaan', '2022-08-01', 1, NULL, 'In celebration of Independence Day in Malaysia, the themes show us the journey to achieve and contribute towards Independence.', '655ac13a1c1af_cover.jpg', '655ac13a1c1b1_magazine.pdf', 1, '2023-11-20 02:15:22', NULL),
(40, 'Sejarah', '2022-09-01', 1, NULL, 'Malaysia Day is where we celebrate the union and creation of Malaysia. The theme embarks the journey for our fellow citizens in achieving union in Malaysia. ', '655ad07ff2f2d_cover.jpg', '655ad07ff2f30_magazine.pdf', 1, '2023-11-20 03:20:32', NULL),
(41, 'Dunia', '2022-10-01', 1, NULL, 'The theme shows the greatness and talents around the world. ', '655ad6aab7c8a_2210_covermag.jpg', '655ad6aab8e5a_Mindloops Okt 2021_compressed V2.pdf', 1, '2023-11-20 03:22:26', '2023-11-20 03:46:50'),
(42, 'Kemanusiaan', '2022-11-01', 1, NULL, 'The theme showcases empathy, sympathy and humanity in our society.', '655ad177d211c_cover.jpg', '655ad177d211f_magazine.pdf', 1, '2023-11-20 03:24:39', NULL),
(43, 'Cuti Sekolah', '2022-12-01', 1, NULL, 'Once again, the school holiday is here! This month\'s magazine shows activities and things we can do to occupy our time usefully. ', '655ad74c31a74_2212_covermag.jpg', '655ad74c337bf_14. MindLoops December 2022 FULL V2.pdf', 1, '2023-11-20 03:27:21', '2023-11-20 03:49:32'),
(44, 'Raya', '2021-06-20', 1, NULL, 'Having a blast Raya with Aliff and family.', '655ad4e578e05_2106_covermag.png', '655ad4e57ad4a_Magazine Raya V2_compressed.pdf', 1, '2023-11-20 03:29:27', '2023-11-20 03:39:17'),
(45, 'Kemerdekaan 2021', '2021-08-01', 1, NULL, 'Celebrate Malaysia Independence Day with MindLoops!', '655ad3f33def2_2108_covermag.jpg', '655ad3f33f92a_Mindloops Ogos 2021_compressed V2.pdf', 1, '2023-11-20 03:31:52', '2023-11-20 03:35:15'),
(46, 'Hari Kanak-Kanak', '2021-10-01', 1, NULL, 'Celebrate Children\'s Day with MindLoops!', '655ad42020724_2110_covermag.jpg', '655ad42022965_Mindloops Okt 2021_compressed V2.pdf', 1, '2023-11-20 03:33:16', '2023-11-20 03:36:00'),
(47, 'Cuti Sekolah 2021', '2021-12-01', 1, NULL, 'Spend the school holidays with MindLoops!', '655ad463365e0_cover.jpg', '655ad463365e3_magazine.pdf', 1, '2023-11-20 03:37:07', NULL),
(48, 'Hip Hip Hooray!', '2023-12-01', 1, NULL, ' theme contains interesting informations children can do during the school holidays. Through an attractive way of academic segments provided, children\'s learning will not simply stop during the holiday season. They also can follow tips on holiday preparation and safety tips before leaving the house during school holidays.', '657033ba00013_cover.jpg', '657033ba00015_magazine.pdf', 1, '2023-12-06 08:41:30', '2023-12-12 03:43:28'),
(50, 'Tahun Baharu, Saya yang Baharu', '2024-01-01', 1, NULL, 'Every day given is an opportunity for you to improve yourself and enhance your self-worth. New year theme aims \r\nto help the children create a memorable start to the year by discovering and exploring new things and encourage them to look forward a better future through various topics. ', '6593ca72f3d93_cover.png', '6593ca72f3d97_magazine.pdf', 1, '2024-01-02 08:33:55', NULL),
(51, 'Dunia Belajar yang Menyeronokkan', '2024-02-01', 1, NULL, 'Terangi minda dengan jambatan ilmu.', '65d2d0537439e_cover.jpg', '65d2d053743a0_magazine.pdf', 1, '2024-02-19 03:51:47', '2024-02-27 00:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `magazine_download`
--

CREATE TABLE `magazine_download` (
  `download_id` int(11) NOT NULL,
  `magazine_id` int(11) NOT NULL,
  `downloaded_by` int(11) NOT NULL,
  `download_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `magazine_download`
--

INSERT INTO `magazine_download` (`download_id`, `magazine_id`, `downloaded_by`, `download_date`) VALUES
(1, 16, 4, '2023-10-24 06:09:21'),
(2, 16, 4, '2023-10-24 06:09:24'),
(3, 9, 4, '2023-10-24 06:09:27'),
(4, 8, 4, '2023-10-24 06:09:28'),
(5, 7, 4, '2023-10-24 06:09:31'),
(6, 17, 4, '2023-10-24 06:09:33'),
(7, 16, 3, '2023-10-25 09:43:34'),
(8, 16, 4, '2023-10-31 04:06:32'),
(9, 16, 4, '2023-10-31 04:07:11'),
(10, 16, 4, '2023-10-31 04:07:22'),
(11, 16, 44, '2023-11-02 07:37:37'),
(12, 16, 44, '2023-11-02 07:40:02'),
(13, 16, 44, '2023-11-02 07:41:01'),
(14, 13, 44, '2023-11-02 07:41:04'),
(15, 9, 44, '2023-11-02 07:41:10'),
(16, 7, 44, '2023-11-02 07:41:21'),
(17, 13, 45, '2023-11-02 07:48:32'),
(18, 16, 51, '2023-11-02 07:51:44'),
(19, 16, 46, '2023-11-02 07:52:36'),
(20, 16, 46, '2023-11-02 07:52:39'),
(21, 16, 46, '2023-11-02 07:52:42'),
(22, 16, 46, '2023-11-02 07:53:43'),
(23, 16, 46, '2023-11-02 07:53:44'),
(24, 16, 46, '2023-11-02 07:53:46'),
(25, 16, 46, '2023-11-02 07:53:48'),
(26, 16, 46, '2023-11-02 07:54:12'),
(27, 17, 46, '2023-11-02 07:55:22'),
(28, 13, 46, '2023-11-02 08:01:47'),
(29, 16, 52, '2023-11-05 03:44:28'),
(30, 8, 52, '2023-11-05 03:47:06'),
(31, 8, 52, '2023-11-05 03:47:14'),
(32, 16, 4, '2023-11-06 05:53:52'),
(33, 13, 4, '2023-11-06 05:54:06'),
(34, 16, 4, '2023-11-06 05:58:15'),
(35, 16, 4, '2023-11-06 05:59:51'),
(36, 16, 45, '2023-11-06 07:30:16'),
(37, 13, 32, '2023-11-06 09:34:51'),
(38, 16, 45, '2023-11-07 04:43:01'),
(39, 16, 4, '2023-11-09 02:50:19'),
(40, 16, 4, '2023-11-09 02:52:44'),
(41, 28, 32, '2023-11-14 09:37:11'),
(42, 33, 4, '2023-11-15 10:37:06'),
(43, 33, 2, '2023-11-15 11:10:16'),
(44, 8, 49, '2023-12-03 03:28:28'),
(45, 48, 68, '2023-12-22 03:30:59'),
(46, 48, 50, '2023-12-25 04:25:29'),
(47, 48, 48, '2023-12-25 04:28:19'),
(48, 28, 4, '2023-12-27 06:39:33'),
(49, 48, 3, '2023-12-27 08:13:46'),
(50, 50, 106, '2024-01-08 09:21:54'),
(51, 48, 106, '2024-01-08 09:22:12'),
(52, 50, 4, '2024-01-08 15:46:57'),
(53, 50, 63, '2024-01-09 05:25:53'),
(54, 50, 4, '2024-01-10 03:47:07'),
(55, 50, 63, '2024-01-22 03:35:37'),
(56, 50, 63, '2024-01-22 03:35:40'),
(57, 50, 63, '2024-01-22 03:35:47'),
(58, 48, 63, '2024-01-22 03:35:52'),
(59, 48, 63, '2024-01-22 03:36:08'),
(60, 28, 63, '2024-01-22 03:36:13'),
(61, 48, 63, '2024-01-22 03:55:36'),
(62, 28, 63, '2024-01-22 03:55:40'),
(63, 28, 63, '2024-01-22 03:55:44'),
(64, 28, 63, '2024-01-22 03:55:47'),
(65, 28, 63, '2024-01-22 03:55:48'),
(66, 28, 63, '2024-01-22 03:55:48'),
(67, 13, 63, '2024-01-22 03:55:50'),
(68, 13, 63, '2024-01-22 07:11:53'),
(69, 8, 63, '2024-01-22 07:13:22'),
(70, 8, 63, '2024-01-22 07:13:27'),
(71, 8, 63, '2024-01-22 07:13:33'),
(72, 51, 4, '2024-02-19 04:25:36'),
(73, 50, 4, '2024-02-19 04:36:20'),
(74, 48, 4, '2024-02-19 04:37:03'),
(75, 28, 4, '2024-02-19 04:37:07'),
(76, 13, 4, '2024-02-19 04:37:08'),
(77, 9, 4, '2024-02-19 04:37:09'),
(78, 8, 4, '2024-02-19 04:37:11'),
(79, 7, 4, '2024-02-19 04:37:12'),
(80, 16, 4, '2024-02-19 04:37:14'),
(81, 17, 4, '2024-02-19 04:37:16'),
(82, 29, 4, '2024-02-19 04:37:17'),
(83, 30, 4, '2024-02-19 04:37:18'),
(84, 31, 4, '2024-02-19 04:37:20'),
(85, 32, 4, '2024-02-19 04:37:21'),
(86, 51, 118, '2024-02-20 02:11:14'),
(87, 51, 118, '2024-02-20 02:11:22'),
(88, 51, 46, '2024-02-21 01:42:10'),
(89, 51, 4, '2024-02-25 06:10:43'),
(90, 51, 3, '2024-02-25 06:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qno` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `ans1` varchar(255) DEFAULT NULL,
  `ans2` varchar(255) DEFAULT NULL,
  `ans3` varchar(255) DEFAULT NULL,
  `ans4` varchar(255) DEFAULT NULL,
  `correct_answer` varchar(1) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qno`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_answer`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'What is the capital city of Malaysia?1', 'Jakarta', 'Kuala Lumpur', 'Bangkok', 'Singapore', 'b', 1, 1, '2023-10-16 08:52:14', '2023-10-24 08:13:20'),
(2, 'Which of the following is a famous Malaysian dish made from rice, coconut milk, and pandan leaves?', 'Dim Sum', 'Sushi', ' Nasi Lemak', 'Pho', 'c', 1, 1, '2023-10-16 08:53:59', '2023-10-19 12:19:51'),
(4, 'Test tyhfghfghfgh', 'A', 'B', 'C', 'D', 'b', 1, 0, '2023-10-16 09:15:12', '2023-10-20 08:43:50'),
(6, 'What is the chemical symbol for gold?', 'Go', 'Au', 'Ag', 'Gd', 'b', 6, 1, '2023-10-16 10:41:08', '2023-10-19 12:22:03'),
(9, 'Malaysia is known for its diverse culture and ethnic groups. Which of the following is one of the major ethnic groups in Malaysia?', 'Maori', 'Zulu', 'Malay', 'Inuit', 'c', 1, 1, '2023-10-19 12:20:40', NULL),
(10, 'Which gas do plants absorb from the atmosphere and convert into oxygen during photosynthesis?', 'Carbon dioxide (CO2)', 'Oxygen (O2)', 'Nitrogen (N2)', 'Hydrogen (H2)', 'a', 6, 1, '2023-10-19 12:22:50', NULL),
(11, 'What is the process by which an organism\'s genetic material is copied before cell division?', 'Mutation', 'Translation', 'Replication', 'Transcription', 'c', 6, 1, '2023-10-19 12:23:34', NULL),
(12, 'What is 2 + 3?', '4', '5', '6', '7', 'b', 7, 1, '2023-10-19 16:51:14', NULL),
(13, 'What is 4 x 6?', '16', '24', '30', '36', 'b', 7, 1, '2023-10-19 16:51:48', NULL),
(14, 'How many sides does a triangle have?', '2', '3', '4', '5', 'b', 7, 1, '2023-10-19 16:52:15', NULL),
(15, 'What comes after 8 in the counting sequence?', '7', '9', '10', '11', 'b', 7, 1, '2023-10-19 16:52:57', NULL),
(16, ' If you have 3 apples and you eat 2, how many apples do you have left?', '0', '1', '2', '3', 'a', 7, 1, '2023-10-19 16:53:21', NULL),
(17, 'Test 1', 'A', 'B', 'C', 'D', 'b', 1, 0, '2023-10-20 08:41:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `score_table`
--

CREATE TABLE `score_table` (
  `score_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `doitonline_id` int(11) DEFAULT NULL,
  `mark_answer` text DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score_table`
--

INSERT INTO `score_table` (`score_id`, `user_id`, `lesson_id`, `doitonline_id`, `mark_answer`, `score`) VALUES
(1, 4, 128, 322, 'Membuat kesimpulan', 0),
(2, 4, 128, 318, 'Membuat inferens', 1),
(3, 4, 128, 321, 'Burung mempunyai sayap dan paruh.', 0),
(4, 4, 128, 319, 'Isi padu air.', 1),
(5, 4, 128, 326, '56546', 0),
(6, 4, 128, 320, 'Berudu semakin besar.', 0),
(7, 4, 128, 328, '456546', 0),
(8, 4, 128, 317, 'Menyimpan peralatan dan bahan sains dengan betul dan selamat.', 1),
(9, 4, 128, 316, 'Mentafsir data', 0),
(10, 4, 128, 329, '56546', 0),
(11, 4, 128, 327, '54656', 0),
(12, 4, 128, 325, 'Pemboleh ubah dimanipulasi: jenis litar, Pemboleh ubah bergerak balas: bilangan mentol.', 0),
(13, 4, 128, 324, 'Carta pai', 0),
(14, 4, 128, 323, 'saiz bayang-bayang berkurang apabila jarak antara objek dengan sumber cahaya berkurang..', 1),
(15, 4, 48, 280, 'Testing', 1),
(16, 4, 48, 282, 'dfgdfg', 1),
(17, 4, 48, 270, 'gincu bibir', 1),
(18, 4, 48, 276, 'namun begitu', 1),
(19, 4, 48, 281, '', 1),
(20, 4, 48, 275, 'sedu', 1),
(21, 4, 48, 271, 'tetapi', 1),
(22, 4, 48, 274, 'biji', 1),
(23, 4, 48, 273, 'dan …. jika', 1),
(24, 4, 48, 272, '', 1),
(25, 4, 48, 277, '', 1),
(26, 4, 48, 278, '', 1),
(27, 4, 48, 279, '', 1),
(28, 4, 63, 190, '1', 0),
(29, 4, 63, 185, 'Sunday', 0),
(30, 4, 63, 179, 'Friday', 1),
(31, 4, 63, 191, '12', 0),
(32, 4, 63, 183, 'False', 1),
(33, 4, 63, 188, 'Saturday', 1),
(34, 4, 63, 180, 'True', 1),
(35, 4, 63, 187, 'False', 0),
(36, 4, 63, 182, 'weekends', 1),
(37, 4, 63, 192, '21', 0),
(38, 4, 63, 181, 'Wednesday', 1),
(39, 4, 63, 189, 'Thursday', 1),
(40, 4, 63, 186, 'On', 1),
(41, 4, 62, 126, 'gjk', 0),
(42, 4, 62, 123, 'Ant', 0),
(43, 4, 62, 122, 'Where are you from?', 0),
(44, 4, 62, 125, 'ghjk', 0),
(45, 4, 62, 117, 'P', 0),
(46, 4, 62, 114, 'M', 0),
(47, 4, 62, 124, 'jhk', 0),
(48, 4, 62, 120, 'L', 0),
(49, 4, 62, 118, 'False', 1),
(50, 4, 62, 121, 'Hello', 1),
(51, 4, 62, 116, 'ghjk', 0),
(52, 4, 62, 115, 'False', 0),
(53, 4, 62, 119, 'ghjk', 0),
(54, 4, 50, 301, '“Saya pasti pergi ke rumah awak jika ada masa lapang”, kata Ahmad kepada Rusdi.', 0),
(55, 4, 50, 308, 'dfghgfh', 0),
(56, 4, 50, 302, 'sekata', 0),
(57, 4, 50, 297, 'pisau', 0),
(58, 4, 50, 296, 'ruang makan', 0),
(59, 4, 50, 304, 'paling', 0),
(60, 4, 50, 298, 'agar', 1),
(61, 4, 50, 300, 'Hai', 0),
(62, 4, 50, 299, 'betul', 0),
(63, 4, 50, 303, 'gelap – gelap', 0),
(64, 4, 50, 307, 'dghfgh', 0),
(65, 4, 50, 306, ' yhfgh', 0),
(66, 4, 50, 305, 'terbebam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`student_id`, `user_id`, `parent_id`, `date_of_birth`, `grade`, `gender`, `created_date`, `updated_date`) VALUES
(2, 4, 3, '2023-10-10', 1, 'female', '2023-10-12 12:36:26', NULL),
(3, 16, 3, '2023-10-16', 3, 'male', '2023-10-12 12:38:46', NULL),
(4, 17, 3, '2015-10-16', 5, 'female', '2023-10-12 16:07:43', NULL),
(5, 46, 45, '2016-06-07', 14, 'female', '2023-11-02 15:17:10', NULL),
(6, 48, 45, '2015-08-04', 15, 'male', '2023-11-02 15:18:59', NULL),
(7, 51, 44, '2001-01-19', 16, 'female', '2023-11-02 15:32:06', NULL),
(9, 82, 73, '2013-09-04', 3, 'male', '2023-12-25 12:57:24', NULL),
(10, 94, 50, '2011-01-01', 6, 'male', '2024-01-03 16:30:49', NULL),
(15, 106, 50, '2014-12-12', 4, 'male', '2024-01-04 10:35:10', NULL),
(16, 109, 3, '1999-12-05', 3, 'male', '2024-01-04 17:08:20', NULL),
(17, 110, 3, '2021-10-03', 1, 'male', '2024-01-04 19:30:14', NULL),
(18, 112, 3, '2018-07-14', 2, 'female', '2024-01-04 19:35:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_table`
--

CREATE TABLE `subject_table` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `subject_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_table`
--

INSERT INTO `subject_table` (`subject_id`, `subject_code`, `subject_name`, `type`, `created_date`, `updated_date`, `subject_status`) VALUES
(19, 'BM', 'Bahasa Melayu', NULL, '2023-11-08 17:07:00', '2023-11-08 17:07:00', '1'),
(20, 'BI', 'Bahasa Inggeris', NULL, '2023-11-13 15:37:01', '2023-11-13 15:37:01', '1'),
(21, 'SC', 'Sains', NULL, '2023-11-13 15:37:10', '2023-11-13 15:37:10', '1'),
(22, 'MT', 'Matematik', NULL, '2023-11-13 15:37:19', '2023-11-13 15:37:19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_quiz_category`
--

CREATE TABLE `tb_quiz_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_quiz_category`
--

INSERT INTO `tb_quiz_category` (`category_id`, `category_name`, `category_image`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'General-Knowledge', '6530ce9085998_General-Knowledge.png', 1, 1, '2023-10-13 12:02:01', '2023-10-19 12:07:04'),
(6, 'Science', '6530cee59c760_Science.jpeg', 1, 1, '2023-10-16 10:39:42', '2023-10-19 12:08:29'),
(7, 'Mathematics', '6530cf1f098d6_mathematics.webp', 1, 1, '2023-10-16 10:39:57', '2023-10-19 12:09:27'),
(8, 'Sports', '6530cfb33d23c_Sports.jpeg', 1, 1, '2023-10-19 10:27:51', '2023-10-19 12:11:55'),
(9, 'Literature', '6530d04e38d26_Literature.jpg', 1, 1, '2023-10-19 12:14:30', NULL),
(10, 'Technology', '6530d0c49c740_Technology.jpg', 1, 1, '2023-10-19 12:16:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_wordsearch`
--

CREATE TABLE `tb_wordsearch` (
  `wordsearch_id` int(11) NOT NULL,
  `wordsearch_level` enum('easy','medium','hard') DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `wordsearch_words` text DEFAULT NULL,
  `wordsearch_image` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `wordsearch_created_at` datetime DEFAULT current_timestamp(),
  `wordsearch_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_wordsearch`
--

INSERT INTO `tb_wordsearch` (`wordsearch_id`, `wordsearch_level`, `cat_id`, `wordsearch_words`, `wordsearch_image`, `created_by`, `wordsearch_created_at`, `wordsearch_updated_at`) VALUES
(7, 'medium', 1, 'Tiger,Lion,Cheetah,Elephant,Monkey,Hen,Deer,Bear,Dog,Cat', '20231018044119_Animal_kingdom_nzwbda.PNG', 1, '2023-10-18 08:11:19', NULL),
(15, 'easy', 3, 'Nasi lemak,Lokum,Taco,Susyi,Batagor,Somtam,Khaja,Piza', '20231113085910_P Loops Bonding TIme Thumbnail 1.jpg', 1, '2023-11-13 16:59:10', NULL),
(16, 'medium', 4, 'Teluk,Selat,Delta,Benua,Muara,Pinggir,Tanjung,Khatulistiwa', '20240128011703_geo.png', 1, '2024-01-28 09:17:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tf_categories`
--

CREATE TABLE `tf_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `true_false_questions`
--

CREATE TABLE `true_false_questions` (
  `tf_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `true` int(11) DEFAULT NULL,
  `false` int(11) DEFAULT NULL,
  `is_true` tinyint(1) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `tf_image` varchar(255) NOT NULL,
  `tf_status` int(11) NOT NULL,
  `tf_created_by` int(11) NOT NULL,
  `tf_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tf_updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `true_false_questions`
--

INSERT INTO `true_false_questions` (`tf_id`, `question`, `true`, `false`, `is_true`, `category_id`, `tf_image`, `tf_status`, `tf_created_by`, `tf_created_at`, `tf_updated_at`) VALUES
(1, 'Butterflies are not birds.12', 1, 0, 0, 1, '6537314085a65_6181bf7c0728865bf853a108f75a05ab73fa61f9.webp', 0, 1, '2023-10-20 04:47:00', '2023-10-24 02:52:12'),
(2, ' There are four lungs found in the human body.', 1, 0, 0, 1, '65320660ad656_d0918ba728baf2c034cf521c333c9cd4.jpg', 1, 1, '2023-10-20 04:47:28', '2023-10-20 05:34:37'),
(3, 'The human body consists of 150 bones.', 1, 0, 0, 1, '6537314989249_design-amazing-youtube-thumbnail-in-2-hours.jpg', 1, 1, '2023-10-20 04:47:51', '2023-10-24 02:51:53'),
(4, 'There are 7 continents in the world. ', 1, 0, 1, 1, '653206ba8075b_a-catchy-youtube-thumbnail.jpg', 1, 1, '2023-10-20 04:48:58', NULL),
(11, 'b or c', 1, 0, 1, 17, '6542ed00ddeca_P3_T2_I7-Q3_gambar bola warna oren.png', 1, 1, '2023-11-02 00:27:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `created_date`, `updated_date`, `deleted_date`, `status`) VALUES
(1, 'Admin', '2023-10-03 11:15:13', '2023-10-12 04:10:40', '0000-00-00 00:00:00', NULL),
(2, 'Teacher', '2023-10-03 11:15:13', '2023-10-11 08:52:40', '0000-00-00 00:00:00', NULL),
(3, 'Parent', '2023-10-03 11:15:13', '2023-10-11 08:52:56', '0000-00-00 00:00:00', NULL),
(4, 'Student', '2023-10-03 11:15:13', '2023-10-11 08:53:05', '0000-00-00 00:00:00', NULL),
(5, 'editor', '2023-10-03 11:15:13', '2023-10-03 11:15:13', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_vcode` varchar(50) DEFAULT NULL,
  `user_status` varchar(25) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'active',
  `token_id` varchar(255) DEFAULT NULL,
  `verifiedEmail` int(11) DEFAULT NULL,
  `security_code` varchar(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_date` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`uid`, `username`, `full_name`, `email`, `user_vcode`, `user_status`, `mobile`, `password`, `profile_pic`, `status`, `token_id`, `verifiedEmail`, `security_code`, `created_date`, `updated_date`, `deleted_date`, `role_id`) VALUES
(1, 'admin', 'Mindloops Admin ', 'admin@mindloops.org', '666201', 'Not Verified', '917992827', '$2y$10$3p36VgrnZCU4lffg4bT2b.F89hL9MV0BAfT5u/snn1FOw6idGgAyO', 'Avatar 6.png', 'active', NULL, NULL, NULL, '2023-10-04 04:57:20', '2024-02-29 03:30:42', '0000-00-00 00:00:00', 1),
(2, 'Cikgu Hanis', 'teacher', 'teacher@teacher.net', NULL, NULL, '890123456', '$2y$10$wlKu66ultgqtNIPp4vMHQOe05DTGFGvuFKB5zrsyXQanY4khwCe5a', 'Avatar 7.png', 'active', NULL, NULL, NULL, '2023-10-05 03:50:08', '2024-01-08 06:47:31', '0000-00-00 00:00:00', 2),
(3, 'Salina', 'parent', 'parent@parent.net', NULL, NULL, '987654321', '$2y$10$34UAlOGVYX.Ef8rmkc7QLe16TTVx.M5E.Hi8vnf84HeQBXzkWfUMq', 'Avatar 5.png', 'active', NULL, NULL, NULL, '2023-10-06 00:29:49', '2024-01-08 04:04:57', '0000-00-00 00:00:00', 3),
(4, 'sana', 'Testing student', 'student@student.ac', '804258', 'Not Verified', '917992827', '$2y$10$385Jv0YtnPUvkGjEKaXaROj8KwbeYhxBOEUsc6SBpNsS8eG22CXQO', 'Avatar 7.png', 'active', NULL, NULL, NULL, '2023-10-04 04:57:20', '2024-01-13 11:02:46', '0000-00-00 00:00:00', 4),
(5, 'Editor', 'EDITOR', 'editor@editormindloops.org', NULL, NULL, '917992827', '$2y$10$385Jv0YtnPUvkGjEKaXaROj8KwbeYhxBOEUsc6SBpNsS8eG22CXQO', 'Avatar 4.png', 'active', NULL, NULL, NULL, '2023-10-04 04:57:20', '2023-10-19 05:35:07', '0000-00-00 00:00:00', 5),
(15, 'sanabinyousuf', 'Sana bin ', 'sanabinyou@sif.ac', NULL, NULL, '250258520', '$2y$10$RuqA1Wtk6jnBOw/uLJXoIOxBizQQGmOFfoLUyxqi3k1Z79B434Oku', NULL, 'inactive', NULL, NULL, NULL, '2023-10-12 07:06:26', '2023-10-12 11:09:59', '0000-00-00 00:00:00', 4),
(16, 'sana bin yousuf', '', 'sana@gg.sc', NULL, NULL, '252025202', '$2y$10$TSxUqT6g4BhKni8BXj0TGuGQUnvjqO7SCs8fbIk9d8tQVVIHH0rVK', NULL, 'active', NULL, NULL, NULL, '2023-10-12 07:08:46', '2024-01-04 10:47:42', '0000-00-00 00:00:00', 4),
(17, 'total', '', 'total@student.com', NULL, NULL, '123454567', '$2y$10$Du8Q1R0TJI5q5sYq/GkbV.rETVSh2M3G6n7mCNWLlW/Pf4U6DtFl2', NULL, 'active', NULL, NULL, NULL, '2023-10-12 10:37:43', '2024-01-04 10:48:29', '0000-00-00 00:00:00', 4),
(32, NULL, 'Abdul', 'mudassir@gmail.com', NULL, NULL, '1234567', '$2y$10$DnePxgvmJ7YQq3nHFg/Ud.Hv6780Fiy55vFZ81B1/pnAc6qxZeYVO', '1699954009_tiger.jpg', 'active', NULL, NULL, NULL, '2023-10-30 08:58:00', '2023-11-14 09:26:49', NULL, 3),
(33, NULL, 'fgfdg', 'dgdfg@gmail.com', NULL, NULL, '65757', '$2y$10$w40W34lUkDiLJKdcTkhHRej1RFq/7A59wmtM9ROsNb5Oykpj00CrW', NULL, 'active', NULL, NULL, NULL, '2023-10-30 09:01:35', '2023-10-30 09:01:43', NULL, 3),
(34, NULL, 'mohd mudassir', 'mudassir.intelcode@gmail.com', '554998', 'Verified', NULL, '$2y$10$vvAqDkM3Ri/TgKJ1aFM9Jus0XH5s3wkDQ9hGAK848ox8v4arEReee', 'Avatar 1.png', 'active', '104445288676411245051', 1, NULL, '2023-10-30 09:01:55', '2023-12-13 09:21:53', NULL, 3),
(36, NULL, 'Admin Mindloops ', 'adminmindloopsamirul@gmail.com', NULL, NULL, '0123456789', '$2y$10$yetHN4DiUNVBQzO30DOR6uboWZQsff/Ea4e50cA3xYY.N/IEp42pm', NULL, 'active', NULL, NULL, NULL, '2023-11-01 07:09:22', '2023-11-01 07:09:22', NULL, NULL),
(37, 'admin@mindloops.org', 'dgfd', 'dsfag@edess.asia', NULL, NULL, '018092141', '$2y$10$/aQpLTKDZuODEBEUm61MbORYrsfyp0VHiSf/z7l2olvdg/ne0qEnG', '1698825854.png', 'inactive', NULL, NULL, NULL, '2023-11-01 08:04:14', '2023-11-01 08:04:57', NULL, 5),
(38, 'Hjhkh', 'Testo', 'student@gmail.com', NULL, NULL, '01', '$2y$10$e2vq6N4H6wdNlI6edpN0ietR.0D0ftLTPhhhTYz.XfBvMuE1AAus6', '1698826892.png', 'active', NULL, NULL, NULL, '2023-11-01 08:21:32', '2023-11-01 08:21:32', NULL, 5),
(39, 'Biarlah rahsia', 'Molla Molla', 'admin5@gmail.com', NULL, NULL, '0125264966', '$2y$10$RCTL8AgonAvwlZMIX4GUeeMg92uT4DFblLzaFSqm27V9KqRqKLKym', '1698826906.png', 'active', NULL, NULL, NULL, '2023-11-01 08:21:46', '2023-11-01 08:22:37', NULL, 5),
(40, 'Princess01', 'Princess', 'princess@mindloops.org', NULL, NULL, '12345678', '$2y$10$NSWjUSULQ0L5XVp.z3ZJoeC9j4eqUDvU8dhiW7Q1rsJMLUgGRWCtS', '1698828722.jpg', 'active', NULL, NULL, NULL, '2023-11-01 08:52:02', '2023-11-01 08:52:28', NULL, 5),
(41, 'kata nama 1', 'Nama  11', 'hehe1@mindloops.org', NULL, NULL, '0111111111', '$2y$10$LS/Ik4QzKXX92mmH3cKYB.LUvOsCx8kwsTa6WarNPzb1xw5NKje.G', '1698829545.jpg', 'active', NULL, NULL, NULL, '2023-11-01 09:05:46', '2023-11-01 09:06:24', NULL, 5),
(42, 'kiukiu binti bokjeru', 'kiukiu', 'kiukiu@mindloops.edess', NULL, NULL, '0101101010101', '$2y$10$bc4.H4h6Bjipnii0X4ZX0.EGiHtDi6MA4yndGhnPYshKGN8Oh1te6', '1698879047.jpg', 'inactive', NULL, NULL, NULL, '2023-11-01 22:50:47', '2023-11-01 22:51:07', NULL, 5),
(43, 'timoh', 'Fatimah binti Ali', 'timoh@gmail.com', NULL, NULL, '01239494838', '$2y$10$VaGxvyPFwcFoYE6jMZ10sORU180JbadvGA4ZU1fGT.u.yNhO1QH36', '1698885119.png', 'inactive', NULL, NULL, NULL, '2023-11-02 00:32:00', '2023-11-02 00:32:25', NULL, 5),
(44, 'nama saya hehe', 'Nama Penuh ', 'masukemelanda@mindloops.org', NULL, NULL, '01112345678', '$2y$10$Mx4lgzAXwgMdOZmvg4lqduQsRZ.CRuLXPFRQLHgORIcTAAN/sQSPy', 'Avatar 5.png', 'active', NULL, NULL, NULL, '2023-11-02 07:09:51', '2023-11-02 08:02:22', NULL, 3),
(45, 'rdzhosmn', 'radziah', 'radziah.edess@gmail.com', NULL, NULL, '0116970983', '$2y$10$cNCMAh3Nf7qz2MlV6VIgGuHANmSht2WJ/3Antrq2Yt6H4L/fgbt.S', 'Avatar 5.png', 'active', NULL, NULL, NULL, '2023-11-02 07:11:34', '2023-11-15 08:29:23', NULL, 3),
(46, 'Indicolite', 'siti nurain', 'ainzz@gmail.com', NULL, NULL, '01169718496', '$2y$10$kycZFGVHcjnQPdWExnqKMu38Oab.wofqV1n9nzKdG1OHv3SgliPni', 'Avatar 1.png', 'active', NULL, NULL, NULL, '2023-11-02 07:17:10', '2023-11-02 08:12:42', NULL, 4),
(47, NULL, 'bilkis', 'bilkis718@gmail.com', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocIcOQ5d8AVmI7wzOjPDf87l_venD0zYwq73vvsOW3KjNg=s96-c', 'active', '116297980910743927882', 1, NULL, '2023-11-02 07:17:36', '2023-11-02 07:17:39', NULL, 3),
(48, 'amirulhakimms', 'amirul hakim', 'amirulhak@gmail.com', NULL, NULL, '01169718496', '$2y$10$rIcHttW2EJ7jOPIwC4sA/uzLIkLhggWdgaq7md3M11ETdANzlrgr6', 'Avatar 2.png', 'active', NULL, NULL, NULL, '2023-11-02 07:18:59', '2023-11-02 08:10:53', NULL, 4),
(49, 'fat', 'Siti Fatimah binti Ibrahim', 'sitirahim0123@gmail.com', NULL, NULL, '01239494838', '$2y$10$Q1h9oECsYKqkXjcI5/EYROdXqeLKlauxVjKtJAweg98EQN7dMcmDK', 'Avatar 2.png', 'active', NULL, NULL, NULL, '2023-11-02 07:19:34', '2023-11-05 02:13:00', NULL, 2),
(50, 'hehe', 'Amir Ridzwan', 'marketing.edess@gmail.com', '137721', 'Verified', '0189597330', '$2y$10$6z8a7w/xnPTYRqGGIsuaZewa7QrIiJkAZMAQwE1.BYAkuK1G0upWW', NULL, 'active', '102785081906095536497', 1, NULL, '2023-11-02 07:23:53', '2024-01-03 08:43:58', NULL, 3),
(51, 'Bilkis Musa', 'Bilkis Musa', 'bilkis@nod.net', NULL, NULL, '01111111111', '$2y$10$/YLr6ZWb322KJ91qftZd8eH3w5en61Tx0hNzzWoWf3UKVc58t3PrK', 'Avatar 2.png', 'active', NULL, NULL, NULL, '2023-11-02 07:32:06', '2023-11-02 08:16:00', NULL, 4),
(52, 'Madihah Rehana', 'Madihah Rehana', 'madihahrehana@gmail.com', NULL, NULL, '0186627109', '$2y$10$zs/PjrdUvrtvA9TKPdEHPO7t8OlwYOQ7jWUy7FhZp.fkUKC3jZcpC', '1699151518_Math - Orange.png', 'active', NULL, NULL, NULL, '2023-11-02 07:43:46', '2023-11-05 02:31:58', NULL, 2),
(53, NULL, 'Bilkis ', 'bilkis@gmail.com', NULL, NULL, '0190931311', '$2y$10$rWToZH8VHoioD7pthVY3Yut1vQtfivZJxcSqlu5/eLCR4UNoQb8jm', NULL, 'active', NULL, NULL, NULL, '2023-11-02 07:49:41', '2023-11-02 07:49:41', NULL, NULL),
(55, NULL, 'Nama Penuh', 'namapenuh@penuh.org', NULL, NULL, '0122334455', '$2y$10$hVEcPdTgFIrcXYscNCzB4.qO3nqjOqKzlTaZp0IUJpoL1P/xcZaRK', NULL, 'active', NULL, NULL, NULL, '2023-12-12 00:23:22', '2023-12-12 00:23:35', NULL, 3),
(56, NULL, 'sanu bin yousuf', 'sana.intelcode@gmail.com', '404317', 'Not Verified', '83596596565', '$2y$10$3kVvu65MTES8DzY306aYRu1Zk/6Sv0g4RY4FaP79dEDhjW2AWhdma', 'Avatar 1.png', 'active', NULL, NULL, NULL, '2023-12-13 04:00:34', '2023-12-13 04:01:23', NULL, 2),
(57, NULL, 'sanu bin yousufrgh', 'sanabinyousufrgh@gmail.com', NULL, NULL, '75575465', '$2y$10$M/wPf.uiOfUH0SUikREWP.T.iTVX4mOpDGML9.La3r9ow8/7fSMfq', NULL, 'active', NULL, NULL, NULL, '2023-12-13 04:08:53', '2023-12-13 04:08:56', NULL, 2),
(58, NULL, 'fghgf', 'admghghin@gmail.com', NULL, NULL, '7678678', '$2y$10$jeKaax6WSNsAVJko7BJ4We3AGWFyc0TW0NPIZFnI4MweEa9NZNbWG', NULL, 'active', NULL, NULL, NULL, '2023-12-13 08:58:42', '2023-12-13 08:58:44', NULL, 2),
(59, NULL, 'Balaraju Intelcode', 'balaraju.intelcode@gmail.com', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocKha9Knkv3fM6qxGvHUYSnadYbigIs_py15WiK4UwcX=s96-c', 'active', '113103355858387258512', 1, NULL, '2023-12-13 09:02:38', '2023-12-13 09:02:38', NULL, NULL),
(60, NULL, 'Sunderjeet Kumar', 'sunderjeetkr@gmail.com', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocK6XGZJDiZCuQvqYZT-mUpJFllRKw8ZeLRizKnuK_hxptU=s96-c', 'active', '115615708904303674293', 1, NULL, '2023-12-13 09:04:10', '2024-01-10 09:07:45', NULL, 2),
(61, 'ahyaulm', 'Ahya\'Ul Maghfiroh', 'ahyaulmaghfiroh1999@gmail.com', NULL, NULL, '082242050848', '$2y$10$ZKM9FAxw3yyeHqQhZatFo.zSdbpRNWYM.2G6M7bMneFRzcgCkF3sC', NULL, 'active', NULL, NULL, NULL, '2023-12-18 02:49:35', '2023-12-18 02:50:37', NULL, NULL),
(62, NULL, 'Sunil khobragade (Naman)', 'naman.intelcode@gmail.com', NULL, NULL, NULL, NULL, 'Avatar 1.png', 'active', '109224740083777653165', 1, NULL, '2023-12-18 09:28:54', '2023-12-18 09:29:26', NULL, 2),
(63, NULL, 'Adi', 'yahyaadi282@gmail.com', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocKZqHuOR7OOv2iJnowjzh3TTDxq9Y4Z0c2xg1tSSrIWvnsf=s96-c', 'active', '114880131580240721284', 1, NULL, '2023-12-20 00:17:55', '2023-12-20 00:18:00', NULL, 2),
(64, NULL, 'Shahdan Norhadi', 'shah.dannie@gmail.com', NULL, NULL, '88515854', '$2y$10$r5veILYaIb/WBLmcTLmVuOv9m1OX5RScDc3rJJxE0cgMOfv3xWb0K', NULL, 'active', NULL, NULL, NULL, '2023-12-20 04:25:38', '2023-12-20 04:25:41', NULL, 2),
(68, NULL, 'Sharifah Md Kassim', 'ifah03@yahoo.com', NULL, NULL, '81126279', '$2y$10$icmDU11qaNrkEP2dzZgLKOqo7sMoWIXsCfAoId/iK2VSi4UWw1Pea', NULL, 'active', NULL, NULL, NULL, '2023-12-22 03:26:34', '2023-12-22 03:27:11', NULL, 2),
(69, 'amine', 'Amine Abdelhedi', 'amine@edess.asia', NULL, NULL, '0167727330', '$2y$10$AZmgmDCqmfZVS3l92v4PBuOah2vdiDZz2RfGBrxmS.WfBiow9CB.K', '1703476063_DALL·E 2023-12-05 11.31.33 - A diagram with no pictures, only text and simple geometric shapes, illustrating 21st Century Educational Trends and their alignment with the Albayen s.png', 'active', NULL, NULL, NULL, '2023-12-25 03:45:30', '2024-01-04 05:31:23', NULL, 2),
(70, NULL, 'Durraemon ', 'mutiaraimangemilang@gmail.com', NULL, NULL, '1139704899', '$2y$10$Aee5FSIKIs5N.JdaQVD7buLic8nNunu8w5Zonaz1sLSwhgMSJxdmG', NULL, 'active', NULL, NULL, NULL, '2023-12-25 03:53:05', '2023-12-25 03:53:05', NULL, NULL),
(71, 'adibah', 'ADIBAH BINTI ABDUL LATIF FP', 'p-adibah@utm.my', NULL, NULL, '0189421008', '$2y$10$4o8aoUPxL7CMIA5O/ywAc.YlRAW0k86xHEBX7E6ftOc.VPAVgCLr.', 'Avatar 1.png', 'active', '101207769151823307292', 1, NULL, '2023-12-25 03:55:35', '2023-12-25 04:58:10', NULL, 3),
(72, 'rdzh', 'Radziah Osman', 'rdzhosmn@gmail.com', NULL, NULL, '', '$2y$10$i63eMgJwKMV7cJbRtjKY3.foR/tumB6LpEB2Owchyyv8uF0kJ7Ieq', 'https://lh3.googleusercontent.com/a/ACg8ocIyMVY4RZibm3_m0hGOyiQQDVyU2d5Qbzvq7rlvvELZO98=s96-c', 'active', '101253278529660166535', 1, NULL, '2023-12-25 04:05:46', '2023-12-26 03:21:00', NULL, 3),
(73, 'amineab', 'Amine Abdelhedi', 'dramineabdelhedi@gmail.com', NULL, NULL, '', '$2y$10$9T4huIbSLgq8oYCXoYysXOuLTtToodg1UneZArp/pbmdpH1wX8x6O', 'Avatar 1.png', 'active', '108316725324590609772', 1, NULL, '2023-12-25 04:13:49', '2024-01-04 05:31:34', NULL, 3),
(82, 'Asuf', 'Yousef Abdelhedi', 'Asuf330@gmail.com', NULL, NULL, '', '$2y$10$xrXZKpghM.ZmT7bDLCiDG.w4qEQVY3aNp7oVH3MtddIgIu/CXH9Je', NULL, 'active', NULL, NULL, NULL, '2023-12-25 04:57:24', '2023-12-25 05:01:44', NULL, 4),
(92, 'Icha', 'ARNISYA RAMLI', 'arnisya@gmail.com', NULL, NULL, '60183594294', '$2y$10$4UfCks1atAYvQncs/A3Nhe3hkvJSYfhAhfOe7BGZ13MOb4rNaVM9W', NULL, 'active', NULL, NULL, NULL, '2023-12-29 09:53:48', '2023-12-29 09:54:14', NULL, 2),
(93, 'respectramadhan', 'Muhammad Ramadhan', 'respectramadhan@gmail.com', NULL, NULL, '', '$2y$10$8sQRETJJhZ7XPiKcuVOzGOjELS6uXR9yB03dYDDIvVWKyIaslvHWe', '1704171416_IMG_2709.JPG', 'active', '100544594838392528727', 1, NULL, '2024-01-02 04:55:25', '2024-01-02 04:56:56', NULL, 2),
(106, '123', '123', '', NULL, NULL, '123', '$2y$10$D20dAOcLO6yhV9Dlpf4/vugfClGGoWhkv22fXKoJ1T/8qlU5rUmCq', NULL, 'active', NULL, NULL, NULL, '2024-01-04 02:35:10', '2024-01-08 08:36:47', NULL, 4),
(108, 'Siti', 'gjghj', 'admin@gmail.com', NULL, NULL, '9179928275', '$2y$10$pxlyD0jGjXUTZlgiTMpE1ORcv.3zh5W53CeUVEzQSUq5KbrwVkseW', NULL, 'active', NULL, NULL, NULL, '2024-01-04 05:38:06', '2024-01-08 07:34:08', NULL, 2),
(109, 'kuch bhi', 'Testing student', 'kuchbhi@gmail.com', NULL, NULL, '09438509348', '$2y$10$8UMSIsyLVGvWgChxbdIWV.IImvdkRy7jX9UA4LnhIp/Lz4hLNXCje', 'Avatar 1.png', 'active', NULL, NULL, NULL, '2024-01-04 09:08:20', '2024-01-05 11:52:22', NULL, 4),
(110, 'Izaan', 'Izaan Ali', '', NULL, NULL, '654789654', '$2y$10$zQry55bnjdQdwvs8PRLolOGQ0myYL3i4L1nRFVhCAmQp1Mbm09PxW', NULL, 'active', NULL, NULL, NULL, '2024-01-04 11:30:14', '2024-01-04 11:30:14', NULL, 4),
(112, 'innu', 'Inaaya Amir', '', NULL, NULL, '09438509348', '$2y$10$VKrVk0tbJ77JBFPf4HJLEelMWeKbscn2pAVxeuep5FOnPI3Hh5Zom', NULL, 'active', NULL, NULL, NULL, '2024-01-04 11:35:40', '2024-01-04 11:35:40', NULL, 4),
(113, NULL, 'MOHD ERMY BIN MOHD KASAH', 'ermy_jb@yahoo.com', NULL, NULL, '0127314121', '$2y$10$JYAgql/.57uVyqutLIQrvuOb7LWoU1wiEnY.RSv7RVEmpWl4MU11m', NULL, 'active', NULL, NULL, NULL, '2024-01-09 01:29:55', '2024-01-09 01:29:59', NULL, 2),
(114, NULL, 'Amir Ridzwan ', 'amirridzwan@edess.asia', NULL, NULL, '011111111', '$2y$10$9pj7ZmK5zopHRwwfpU/jCevB0cAK8of5eEeXZsi5bP/gwk92K5gZ2', NULL, 'active', NULL, NULL, NULL, '2024-01-09 01:38:39', '2024-01-09 01:38:48', NULL, 2),
(115, 'easnamir', 'Amir Ahmed', 'easn.aliamir@gmail.com', NULL, NULL, '9179928275', '$2y$10$n0XnNyT0QzJwNgawoNIfAOP.pA.nQFJabCIc1n/gJ485oK9x/mC8C', 'https://lh3.googleusercontent.com/a/ACg8ocLOHYFDxfOPuYiUcb2PZ5N7ScHozxC1sus6BZnci5DWLy4=s96-c', 'active', '116499287888446740676', 1, NULL, '2024-01-09 04:48:45', '2024-01-09 05:46:08', NULL, 3),
(117, 'parent12', 'Amir Ali Ahmed', 'easnamirali@gmail.com', NULL, NULL, '9998887771', '$2y$10$tx/s6KOMgSB1bhV/xRnQyOYbc8L1ofgON0yticY7CzZjBHaCLVRMq', NULL, 'active', 'EAAU1KXdzX5EBOZC0LjZC6SZBPWNYrp6q0RloZBNlS7vZCIn6YHzxS3gFE1Og6Hw6aHzMToZBkB8ZChCjAOawQSZCiVFPZBlXZBRybX10OvY9RxLZAFZApGijZCmGZCYPeSI55ScVgwEAefE2z9ARaZBCfoypQX5xVEMnVTIFwlawFWrJih9Caar9cxXSSYkYjGkrOjoJtpZAJCwLcRye', NULL, NULL, '2024-01-09 05:04:00', '2024-01-09 05:41:25', NULL, 3),
(118, NULL, 'Muhammad Aizuddin Bin Mohd Amin', 'm.aizuddin65@gmail.com', NULL, NULL, '01136006627', '$2y$10$MeTVDsvp4YLV5kyy48XtVuZyyqR5HOV7.gHlgxKoQEl7dl5yMjhtO', NULL, 'active', NULL, NULL, NULL, '2024-01-21 07:28:56', '2024-01-21 07:29:20', NULL, 3),
(119, NULL, 'Nur Shahirah Binti Ahmad Faris', 'shahirahfaris6@gmail.com', NULL, NULL, '0146317560', '$2y$10$vI7Xn9G4qdu2AF50zkTbReWLBSWzuVqSRmzmGVmqj3rFZsFlxgWHa', NULL, 'active', NULL, NULL, NULL, '2024-01-26 04:56:56', '2024-01-26 04:57:03', NULL, 3),
(120, NULL, 'Siti Zuraidah Md Osman', 'sitizuraidah@usm.my', NULL, NULL, '0194745358', '$2y$10$KPpUG2mEaD6pSUZCn65CxOq8q8pVdRjHUD1YgRDBRLn7au/lXBsw.', NULL, 'active', NULL, NULL, NULL, '2024-02-07 09:03:34', '2024-02-07 09:03:38', NULL, 2),
(121, NULL, 'Isa', '29isasyed@gmail.com', '500012', 'Not Verified', '7411174623', '$2y$10$TqkxgNydvfrcUZ4JyQZE1.6Ov5BcIWgVi7QvL.ChdlarZjrhjDb/y', NULL, 'active', NULL, NULL, NULL, '2024-02-13 09:06:24', '2024-02-13 09:07:19', NULL, 2),
(122, NULL, 'Nor Afidah Abu Hanipah', 'fyda.yus@gmail.com', NULL, NULL, '0129298864', '$2y$10$zcHFBb0d69XmeLhNExJjReGmV0WgAgHdf8deFyA1Q2wg.rX70Uulq', NULL, 'active', NULL, NULL, NULL, '2024-02-20 02:46:08', '2024-02-20 02:46:14', NULL, 3),
(123, NULL, 'Siti aishah binti ahmad akhir zaman', 'aisyaviolet85@gmail.com', NULL, NULL, '0173940021', '$2y$10$cyUu/QaHNrCX4Uhsbjv87uYbQuAfzWt6jydA53SYJu6aG5ud3t6cG', NULL, 'active', NULL, NULL, NULL, '2024-02-20 03:07:56', '2024-02-20 03:08:04', NULL, 3),
(124, NULL, 'Lydia Marina Abd Moid', 'marinamoid@yahoo.com', NULL, NULL, '0127873061', '$2y$10$/bnamFO63REhT2SMQ9Rhwehgjn84K1wIG7YwO6m8ANHY/wBBd5rky', NULL, 'active', NULL, NULL, NULL, '2024-02-20 06:43:12', '2024-02-20 06:43:15', NULL, 2),
(125, NULL, 'Muhammad Hasif', 'mh.hasiff@gmail.com', NULL, NULL, '-1', '$2y$10$kTf1GgrU1YCgHMdGd9F7B.rklieEi2Vq6TdrUGpRhQbP2NmnRHh3e', NULL, 'active', NULL, NULL, NULL, '2024-02-20 13:12:16', '2024-02-20 13:12:21', NULL, 2),
(126, NULL, 'lin da', 'sodaku41@gmail.com', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocJrI8IOFWofgly5S_K1qhXrGPt7Q4maNJl4rdhhswKZ=s96-c', 'active', '108716363257246369933', 1, NULL, '2024-02-23 05:16:57', '2024-02-23 05:17:01', NULL, 2),
(127, NULL, 'satya sai', 'saisatya51@gmail.com', NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocKpDUOnzvxUEI56iiLVRi0fTxNitEbkcmnqfMe74xIb-Q=s96-c', 'active', '104354376075088736848', 1, NULL, '2024-02-23 05:20:04', '2024-02-23 05:20:12', NULL, 2),
(128, NULL, 'Umawathy Techanamurthy', 't.umawathy@ukm.edu.my', NULL, NULL, '0122271291', '$2y$10$KosW/W0Ni.OytB4O3wONouJxLWTRRwDJ1zUG1tG5Ulmys30ccHPgO', NULL, 'active', NULL, NULL, NULL, '2024-02-27 06:26:12', '2024-02-27 06:26:18', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `video_title` varchar(255) DEFAULT NULL,
  `video_description` text DEFAULT NULL,
  `video_thumbnail` varchar(255) DEFAULT NULL,
  `video_category_id` int(11) NOT NULL,
  `video_audience_id` int(11) NOT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(90) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `video_title`, `video_description`, `video_thumbnail`, `video_category_id`, `video_audience_id`, `video_url`, `youtube_link`, `created_date`, `updated_date`, `deleted_date`) VALUES
(34, 'Panduan Membina Jadual Waktu Kendiri Menarik Menggunakan Canva', '1.	Log Masuk Canva•	Buka laman sesawang Canva (www.canva.com ) dan log masuk secara percuma. Jangan risau, ia selamat dan mesra kanak-kanak! Anda disarankan untuk menggunakan komputer meja atau komputer riba.2.	Pilih Templat Kegemaran dan Ubah Suai Mengikut Kreativiti•	Sebaik sahaja anda log masuk, Canva akan memaparkan pelbagai jenis templat untuk dipilih. Pilih templat \"Jadual Waktu\" dalam kategori \"Pendidikan\".•	Ubah suai templat mengikut kreativiti anda sehingga ia kelihatan menarik.3.	Pastikan Mata Pelajaran Seimbang•	Pastikan anda membuat jadual kendiri dengan mengisi slot atau masa untuk anda mengulang kaji pelajaran. Suaikan mata pelajaran yang hendak anda ulang kaji secara seimbang.4.	Tambah Slot Rehat & Ganjaran •	Pastikan slot rehat dalam jadual kendiri anda mencukupi dan bersesuaian.•	Tambah elemen ganjaran kendiri seperti beriadah, bersukan, meluangkan masa bersama keluarga dan sebagainya.5.	Simpan dan Muat turun•	Simpan jadual anda dengan mengklik butang Sa', 'fb_cover-1.webp', 30, 4, '6551d3e6a3767_1699861478.mp4', NULL, '2023-11-13 07:40:06', '2023-11-13 07:44:38', NULL),
(35, 'Pupuk Rasa Ingin Tahu dan Motivasi Kanak-Kanak', 'Sebagai ibu bapa, kita memainkan peranan yang amat penting dalam memupuk rasa ingin tahu dan motivasi dalam diri anak-anak. Dengan adanya penerapan ini, kita secara tidak langsung membuka peluang kepada mereka ke arah pembelajaran sepanjang hayat. Jom tonton video ini!', 'boy-and-girl-with-magnifying-glass-illustration.jpg', 35, 3, '6551d3c72e600_1699861447.mp4', '', '2023-11-13 07:44:07', NULL, NULL),
(41, 'Projek Binaan Menggunakan Pencungkil Gigi', '<p>Credit to: Fauzan Aziz&nbsp;</p><p>&nbsp;</p><p>Mari menjayakan projek binaan menggunakan pencungkil gigi dan tanah liat bersama murid-murid anda!</p>', 'pexels-alena-darmel-7750752.jpg', 43, 2, '659c52992ab6a_1704743577.mp4', '', '2024-01-08 19:52:57', '2024-01-08 20:33:33', NULL),
(42, 'Kereta Idaman', '<p>Credit to: Cikgu Sidi</p><p>&nbsp;</p><p>Dengan menggunakan kadbod, anda boleh menghasilkan kereta idaman anda. Jom cuba jayakan projek ini bersama murid-murid anda!</p>', 'atish-sewmangel-pozVMXlZaA4-unsplash.jpg', 42, 2, '659c577347e97_1704744819.mp4', '', '2024-01-08 20:13:39', '2024-01-08 20:34:38', NULL),
(43, 'Pelangi Dalam Air', '<p>Credit to: Rose Kids Academy</p><p>&nbsp;</p><p>Pelangi dalam air? Jom ajak murid-murid anda lakukan eksperimen ini! Eksperimen ini pasti akan membuatkan mereka teruja disamping meningkatkan pengetahuan mereka.</p>', 'joyce-hankins-gpiKdZmDQig-unsplash.jpg', 41, 2, '659c59968f8de_1704745366.mp4', '', '2024-01-08 20:22:46', '2024-01-08 20:35:54', NULL),
(44, 'Tanglung Planet', '<p>Credit to: Nur Adilah</p><p>&nbsp;</p><p>Ingin belajar tentang planet dengan cara yang lebih menarik? Mari hasilkan tanglung planet ini! Selamat mencuba.</p>', 'planets.jpeg', 41, 2, '659c5bc8e0475_1704745928.mp4', '', '2024-01-08 20:32:08', '2024-01-08 20:36:38', NULL),
(45, 'Apa itu Catapult?', '<p>Credit to: Amirul Anwar</p><p>&nbsp;</p><p>Jom hasilkan catapult bersama murid-murid dengan hanya menggunakan batang aiskrim.</p>', 'popsicle.webp', 42, 2, '659c5eabcd051_1704746667.mp4', '', '2024-01-08 20:44:27', NULL, NULL),
(46, 'Kaedah Mudah Tambah', '<p>Credit to: Cikgu Lo</p><p>&nbsp;</p><p>Video ini membantu anda untuk mempelajari cara mudah dan cepat untuk operasi tambah. Jom tonton video ini!</p>', 'pexels-keira-burton-6623827.jpg', 44, 2, '659c61601d256_1704747360.mp4', '', '2024-01-08 20:56:00', NULL, NULL),
(47, 'Aktiviti Lampu Lava', '<p>Credit to: MindCare</p><p>&nbsp;</p><p>Itulah lampu lava! Mari tonton video ini, kemudian ajak murid-murid untuk lakukan aktiviti lampu lava ini, pasti mereka akan teruja!</p>', 'lava lamp.jpeg', 43, 2, '659c62da57524_1704747738.mp4', '', '2024-01-08 21:02:18', NULL, NULL),
(48, 'Belajar Bahagi', '<p>Credit to:CkguZul</p><p>&nbsp;</p><p>Matematik akan menjadi sesuatu yang menyeronokkan apabila kita memahami konsep dan cara yang betul. Video ini menunjukkan cara ,mudah untuk operasi bahagi.&nbsp;</p>', 'matematik.jpeg', 44, 2, '659c64551c182_1704748117.mp4', '', '2024-01-08 21:08:37', '2024-01-08 21:25:26', NULL),
(49, 'Jom Buat Oobleck', '<p>Credit to: Mohd Farhan bin Mokhtar</p><p>&nbsp;</p><p>Tahukah anda, anda boleh menghasilkan sendiri ‘oobleck’? Jom tonton video ini. Selamat mencuba!</p>', 'oobleck.jpg', 43, 4, '659c67031a39a_1704748803.mp4', '', '2024-01-08 21:20:03', '2024-01-08 21:25:11', NULL),
(50, 'Jom Lakukan Eksperimen', '<p>Credit to: BB Math Channel</p><p>Video ini menunjukkan beberapa eksperimen yang anda boleh cuba lakukan di rumah atau di sekolah bersama dengan rakan, guru atau ibu bapa anda.</p><p>&nbsp;</p>', 'experiments.jpeg', 41, 4, '659c6994d9156_1704749460.mp4', '', '2024-01-08 21:31:00', NULL, NULL),
(51, 'Kipas Solar', '<p>Credit to: Cikgu Rashid</p><p>&nbsp;</p><p>Jom ikuti langkah dalam video ini untuk menghasilkan kipas solar. Selamat mencuba!</p>', 'pexels-vanessa-loring-7869235.jpg', 42, 4, '659c6c6040d7b_1704750176.mp4', '', '2024-01-08 21:42:56', NULL, NULL),
(52, 'Lampu Suluh Ajaib', '', '2401 Lampu Suluh Ajaib TB.png', 41, 4, '65d1beb710187_1708244663.mp4', '', '2024-02-18 08:24:23', '2024-02-18 08:24:36', NULL),
(53, 'Tenggelam atau Terapung?', '', '2402 tenggelam atau terapung TB.png', 41, 4, '65de82f2cdba2_1709081330.mp4', '', '2024-02-28 00:48:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_categories`
--

CREATE TABLE `video_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_categories`
--

INSERT INTO `video_categories` (`category_id`, `category_name`) VALUES
(30, 'Study Skills'),
(31, 'Living Skills'),
(32, 'Citizenship'),
(33, 'Children'),
(34, 'Teen'),
(35, 'Tutoring'),
(36, 'Parenting Skills'),
(37, 'Classroom Management'),
(38, 'Counselling'),
(39, 'Curriculum & Co-curriculum'),
(40, 'How To'),
(41, 'Science'),
(42, 'Technology'),
(43, 'Engineering'),
(44, 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `video_comment`
--

CREATE TABLE `video_comment` (
  `vc_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `vc_content` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `approved_vc` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_comment`
--

INSERT INTO `video_comment` (`vc_id`, `video_id`, `vc_content`, `created_by`, `approved_vc`, `created_date`, `updated_date`) VALUES
(3, 13, 'A top comment is a comment that has received the greatest number of likes on a video. Though it may sound simple, getting your comment to trend and hit the top requires strategy, which will be outlined throughout this article.', 4, 1, '2023-10-24 06:44:55', '2023-10-24 06:45:39'),
(7, 13, 'A top comment is a comment that has received the greatest number of likes on a video. Though it may sound simple, getting your comment to trend and hit the top requires strategy, which will be outlined throughout this article.', 3, 1, '2023-10-24 07:22:35', '2023-10-24 09:44:00'),
(8, 13, 'A top comment is a comment that has received the greatest number of likes on a video. Though it may sound simple, getting your comment to trend and hit the top requires strategy, which will be outlined throughout this article.', 2, 1, '2023-10-24 07:22:41', '2023-10-24 07:23:08'),
(18, 14, 'A top comment is a comment that has received the greatest number of likes on a video. Though it may sound simple, getting your comment to trend and hit the top requires strategy, which will be outlined throughout this article.', 3, 1, '2023-10-25 08:36:36', NULL),
(20, 123, 'A top comment is a comment that has received the greatest number of likes on a video. Though it may sound simple, getting your comment to trend and hit the top requires strategy, which will be outlined throughout this article.', 3, 1, '2023-10-25 10:19:48', NULL),
(24, 14, 'Awesome buddy', 4, 1, '2023-10-30 03:51:51', '2023-10-30 03:52:10'),
(25, 14, 'What kind of video is this?', 48, 1, '2023-11-02 07:49:05', NULL),
(26, 13, 'what are the birds doing? are they migrating or circling around?', 45, 1, '2023-11-02 08:05:40', NULL),
(28, 13, 'hai, burung. Seronoknya dapat terbang. Hmm, bahagianya.', 46, 1, '2023-11-02 08:12:57', NULL),
(29, 13, 'burung berterbangan riang ria', 49, 1, '2023-11-05 02:04:23', NULL),
(30, 32, 'hello everyone', 45, 1, '2023-11-06 03:57:43', NULL),
(31, 34, 'hello everyone', 45, 1, '2023-11-15 07:49:04', NULL),
(32, 34, 'hi ho', 48, 1, '2023-11-16 06:49:34', NULL),
(33, 34, 'hello everyone', 72, 1, '2023-12-26 03:21:20', NULL),
(35, 34, 'jjhkhjk', 91, 1, '2023-12-27 12:59:22', NULL),
(36, 39, 'hi', 72, 1, '2023-12-29 10:42:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_like_dislike`
--

CREATE TABLE `video_like_dislike` (
  `vld_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `vld_liked_by` int(11) DEFAULT NULL,
  `vld_disliked_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_like_dislike`
--

INSERT INTO `video_like_dislike` (`vld_id`, `video_id`, `vld_liked_by`, `vld_disliked_by`) VALUES
(1, 17, 3, NULL),
(7, 14, NULL, 4),
(15, 14, NULL, 48),
(16, 13, 44, NULL),
(18, 32, NULL, 45),
(19, 13, NULL, 45),
(25, 13, 46, NULL),
(29, 14, NULL, 51),
(34, 13, 49, NULL),
(35, 15, 52, NULL),
(43, 35, 71, NULL),
(44, 34, 71, NULL),
(46, 35, 4, NULL),
(50, 34, 4, NULL),
(51, 52, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_view`
--

CREATE TABLE `video_view` (
  `view_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `viewer_id` int(11) NOT NULL,
  `view_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `deleted_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_view`
--

INSERT INTO `video_view` (`view_id`, `video_id`, `viewer_id`, `view_date`, `status`, `deleted_date`) VALUES
(69, 34, 2, '2024-01-01 19:38:49', 0, NULL),
(85, 40, 2, '2024-01-08 08:48:45', 0, NULL),
(89, 41, 2, '2024-01-08 12:33:42', 0, NULL),
(91, 42, 2, '2024-01-08 12:34:54', 0, NULL),
(90, 43, 2, '2024-01-08 18:36:13', 0, NULL),
(99, 44, 2, '2024-01-09 02:36:29', 0, NULL),
(97, 50, 2, '2024-01-09 02:35:59', 0, NULL),
(111, 52, 2, '2024-02-19 06:21:14', 0, NULL),
(20, 34, 4, '2024-02-18 22:35:08', 0, '2023-12-27 20:27:06'),
(24, 35, 4, '2024-02-28 21:28:55', 0, '2023-12-27 20:27:06'),
(83, 39, 4, '2024-01-08 05:13:02', 0, NULL),
(95, 49, 4, '2024-01-08 21:22:28', 0, NULL),
(113, 51, 4, '2024-02-28 21:43:05', 0, NULL),
(110, 52, 4, '2024-02-25 23:00:57', 0, NULL),
(123, 53, 4, '2024-03-04 02:14:23', 0, NULL),
(82, 38, 48, '2024-01-08 03:00:36', 0, NULL),
(100, 43, 48, '2024-02-04 23:29:13', 0, NULL),
(96, 44, 48, '2024-02-04 23:30:15', 0, NULL),
(101, 50, 48, '2024-02-04 23:30:12', 0, NULL),
(109, 52, 48, '2024-02-18 08:25:08', 0, NULL),
(118, 53, 48, '2024-02-28 00:52:12', 0, NULL),
(61, 39, 72, '2023-12-29 02:42:41', 0, NULL),
(74, 34, 73, '2024-01-07 01:15:32', 0, NULL),
(73, 35, 73, '2024-01-06 17:19:25', 0, NULL),
(75, 38, 73, '2024-01-06 17:26:29', 0, NULL),
(77, 39, 73, '2024-01-06 17:26:24', 0, NULL),
(32, 34, 91, '2023-12-27 05:14:41', 0, NULL),
(31, 35, 91, '2023-12-27 12:52:12', 0, NULL),
(27, 39, 91, '2023-12-27 04:52:04', 0, NULL),
(105, 34, 120, '2024-02-07 09:06:59', 0, NULL),
(106, 35, 120, '2024-02-07 09:07:14', 0, NULL),
(107, 43, 120, '2024-02-07 09:07:25', 0, NULL),
(108, 46, 120, '2024-02-07 09:10:59', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `word_match`
--

CREATE TABLE `word_match` (
  `id` int(11) NOT NULL,
  `game_level` enum('EASY','MEDIUM','HARD') DEFAULT NULL,
  `word_name` varchar(255) DEFAULT NULL,
  `word_image` varchar(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `word_match`
--

INSERT INTO `word_match` (`id`, `game_level`, `word_name`, `word_image`, `cat_id`, `created_by`, `created_at`, `updated_at`) VALUES
(7, 'EASY', 'Monkey', '652f47f9e18e0_monkey.jpg', 1, 1, '2023-10-18 08:20:33', NULL),
(8, 'EASY', 'Tiger', '652f480956901_tiger.jpg', 1, 1, '2023-10-18 08:20:49', NULL),
(12, 'EASY', 'Elephant', '6530bd4d7c904_elephant.jpg', 1, 1, '2023-10-19 10:53:25', NULL),
(13, 'EASY', 'Banana', '6530c0a6bd0c2_Banana.png', 3, 1, '2023-10-19 11:07:42', NULL),
(14, 'EASY', 'Pineapple', '6530c0c921b2b_Pineapple.png', 3, 1, '2023-10-19 11:08:17', NULL),
(15, 'EASY', 'Apple', '6530c0e4d281b_Apple.png', 3, 1, '2023-10-19 11:08:44', '2023-10-19 11:14:10'),
(16, 'MEDIUM', 'Tiger', '6530c10e9fde5_Tiger.png', 1, 1, '2023-10-19 11:09:26', NULL),
(17, 'MEDIUM', 'Chimpanzee', '6530c16b2f5d7_Chimpanzee.png', 1, 1, '2023-10-19 11:10:59', NULL),
(18, 'MEDIUM', 'Snake', '6530c181bb372_Snake.png', 1, 1, '2023-10-19 11:11:21', NULL),
(19, 'MEDIUM', 'Giraffe', '6530c19c2238b_Giraffe.png', 1, 1, '2023-10-19 11:11:48', NULL),
(20, 'MEDIUM', 'Elephant', '6530c1b2995a2_Elephant.png', 1, 1, '2023-10-19 11:12:10', NULL),
(21, 'HARD', 'Red Pepper', '6530c32b17f4d_Red Pepper.png', 3, 1, '2023-10-19 11:18:27', NULL),
(22, 'HARD', 'Onion', '6530c3500c511_Onion.png', 3, 1, '2023-10-19 11:19:04', NULL),
(23, 'HARD', 'Red Chilli', '6530c36e024c1_Red Chilli.png', 3, 1, '2023-10-19 11:19:34', NULL),
(24, 'HARD', 'Cucumber', '6530c39a60745_Cucumber.png', 3, 1, '2023-10-19 11:20:18', NULL),
(25, 'HARD', 'Carrot', '6530c3b1e54c2_Carrot.png', 3, 1, '2023-10-19 11:20:41', NULL),
(26, 'HARD', 'Pumpkin', '6530c3ca1203f_Pumpkin.png', 3, 1, '2023-10-19 11:21:06', NULL),
(27, 'HARD', 'Beetroot', '6530c3e7a1501_Beetroot.png', 3, 1, '2023-10-19 11:21:35', NULL),
(28, 'HARD', 'Corn', '6530c405a3e43_Corn.png', 3, 1, '2023-10-19 11:22:05', NULL),
(29, 'HARD', 'Johar', '6530c43bbffdb_Johar.png', 4, 1, '2023-10-19 11:22:59', NULL),
(30, 'HARD', 'Kelantan', '6530c45655684_Kelantan.png', 4, 1, '2023-10-19 11:23:26', NULL),
(31, 'HARD', 'Nigeri Sembilan', '6530c480eed95_Nigerin Sembilan.png', 4, 1, '2023-10-19 11:24:08', NULL),
(32, 'HARD', 'Perak', '6530c498df420_Perak.png', 4, 1, '2023-10-19 11:24:32', NULL),
(33, 'HARD', 'Pulau Pinang', '6530c4bc41176_Pulau Pinang.png', 4, 1, '2023-10-19 11:25:08', NULL),
(34, 'HARD', 'Sarawak', '6530c4d855f8f_Sarawak.png', 4, 1, '2023-10-19 11:25:36', NULL),
(35, 'HARD', 'Terengganu', '6530c4f54fbf6_Terengganu.png', 4, 1, '2023-10-19 11:26:05', NULL),
(36, 'HARD', 'Kedah', '6530c50fa64c8_Kedah.png', 4, 1, '2023-10-19 11:26:31', NULL),
(37, 'HARD', 'Melaka', '6530c528f264a_Melaka.png', 4, 1, '2023-10-19 11:26:56', NULL),
(39, 'HARD', 'Perlis', '6530c55f571da_Perlis.png', 4, 1, '2023-10-19 11:27:51', NULL),
(40, 'HARD', 'Sebah', '6530c57dc8287_Sebah.png', 4, 1, '2023-10-19 11:28:21', NULL),
(41, 'HARD', 'Selangor', '6530c5949ed51_Selangor.png', 4, 1, '2023-10-19 11:28:44', NULL),
(42, 'HARD', 'Wilayah Persekutuan', '6530c5bc3b7ad_Wilayah Persekutuan.png', 4, 1, '2023-10-19 11:29:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_report_table`
--
ALTER TABLE `article_report_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badge_table`
--
ALTER TABLE `badge_table`
  ADD PRIMARY KEY (`badge_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `FK_CREATED_BY` (`created_by`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`community_id`);

--
-- Indexes for table `community_article`
--
ALTER TABLE `community_article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `community_fk` (`article_cc_id`);

--
-- Indexes for table `community_article_comment`
--
ALTER TABLE `community_article_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_article_id` (`comment_article_id`) USING BTREE;

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crossword_clue`
--
ALTER TABLE `crossword_clue`
  ADD PRIMARY KEY (`clue_id`),
  ADD KEY `cc_id` (`cc_id`);

--
-- Indexes for table `doit_online`
--
ALTER TABLE `doit_online`
  ADD PRIMARY KEY (`do_id`);

--
-- Indexes for table `game_category`
--
ALTER TABLE `game_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `grade_table`
--
ALTER TABLE `grade_table`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `jigsaw_image`
--
ALTER TABLE `jigsaw_image`
  ADD PRIMARY KEY (`ji_id`),
  ADD KEY `jigsaw_image_ibfk_1` (`ji_c_id`);

--
-- Indexes for table `lesson_download`
--
ALTER TABLE `lesson_download`
  ADD PRIMARY KEY (`lesson_download_id`),
  ADD KEY `downloaded_by_fk` (`downloaded_by`),
  ADD KEY `lesson_id_fk` (`lesson_id`);

--
-- Indexes for table `lesson_table`
--
ALTER TABLE `lesson_table`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `grade_id` (`grade_id`);

--
-- Indexes for table `loops_category`
--
ALTER TABLE `loops_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`magazine_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `magazine_download`
--
ALTER TABLE `magazine_download`
  ADD PRIMARY KEY (`download_id`),
  ADD KEY `magazine_id` (`magazine_id`),
  ADD KEY `downloaded_by` (`downloaded_by`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `score_table`
--
ALTER TABLE `score_table`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lesson_id` (`lesson_id`),
  ADD KEY `doitonline_id` (`doitonline_id`);

--
-- Indexes for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `parent_fk_id` (`parent_id`),
  ADD KEY `student_profile_ibfk_1` (`user_id`),
  ADD KEY `student_grade_fk` (`grade`);

--
-- Indexes for table `subject_table`
--
ALTER TABLE `subject_table`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tb_quiz_category`
--
ALTER TABLE `tb_quiz_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `quiz_created_by_fk` (`created_by`);

--
-- Indexes for table `tb_wordsearch`
--
ALTER TABLE `tb_wordsearch`
  ADD PRIMARY KEY (`wordsearch_id`),
  ADD KEY `fk_category_id` (`cat_id`);

--
-- Indexes for table `tf_categories`
--
ALTER TABLE `tf_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `true_false_questions`
--
ALTER TABLE `true_false_questions`
  ADD PRIMARY KEY (`tf_id`),
  ADD KEY `true_false_questions_ibfk_1` (`category_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `category_id_fk` (`video_category_id`),
  ADD KEY `role_id_fk` (`video_audience_id`);

--
-- Indexes for table `video_categories`
--
ALTER TABLE `video_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `video_comment`
--
ALTER TABLE `video_comment`
  ADD PRIMARY KEY (`vc_id`);

--
-- Indexes for table `video_like_dislike`
--
ALTER TABLE `video_like_dislike`
  ADD PRIMARY KEY (`vld_id`);

--
-- Indexes for table `video_view`
--
ALTER TABLE `video_view`
  ADD PRIMARY KEY (`viewer_id`,`video_id`) USING BTREE,
  ADD KEY `view_id` (`view_id`) USING BTREE;

--
-- Indexes for table `word_match`
--
ALTER TABLE `word_match`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CAT_ID` (`cat_id`),
  ADD KEY `fk_wordmatch_created_by` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_report_table`
--
ALTER TABLE `article_report_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `badge_table`
--
ALTER TABLE `badge_table`
  MODIFY `badge_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for the badge', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `community_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `community_article`
--
ALTER TABLE `community_article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `community_article_comment`
--
ALTER TABLE `community_article_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `crossword_clue`
--
ALTER TABLE `crossword_clue`
  MODIFY `clue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `doit_online`
--
ALTER TABLE `doit_online`
  MODIFY `do_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;

--
-- AUTO_INCREMENT for table `game_category`
--
ALTER TABLE `game_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `grade_table`
--
ALTER TABLE `grade_table`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jigsaw_image`
--
ALTER TABLE `jigsaw_image`
  MODIFY `ji_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `lesson_download`
--
ALTER TABLE `lesson_download`
  MODIFY `lesson_download_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `lesson_table`
--
ALTER TABLE `lesson_table`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `loops_category`
--
ALTER TABLE `loops_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `magazine`
--
ALTER TABLE `magazine`
  MODIFY `magazine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `magazine_download`
--
ALTER TABLE `magazine_download`
  MODIFY `download_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `score_table`
--
ALTER TABLE `score_table`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `student_profile`
--
ALTER TABLE `student_profile`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subject_table`
--
ALTER TABLE `subject_table`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_quiz_category`
--
ALTER TABLE `tb_quiz_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_wordsearch`
--
ALTER TABLE `tb_wordsearch`
  MODIFY `wordsearch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tf_categories`
--
ALTER TABLE `tf_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `true_false_questions`
--
ALTER TABLE `true_false_questions`
  MODIFY `tf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `video_categories`
--
ALTER TABLE `video_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `video_comment`
--
ALTER TABLE `video_comment`
  MODIFY `vc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `video_like_dislike`
--
ALTER TABLE `video_like_dislike`
  MODIFY `vld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `video_view`
--
ALTER TABLE `video_view`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `word_match`
--
ALTER TABLE `word_match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`category_id`);

--
-- Constraints for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `FK_CREATED_BY` FOREIGN KEY (`created_by`) REFERENCES `user_table` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `community_article`
--
ALTER TABLE `community_article`
  ADD CONSTRAINT `community_fk` FOREIGN KEY (`article_cc_id`) REFERENCES `community` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `community_article_comment`
--
ALTER TABLE `community_article_comment`
  ADD CONSTRAINT `comment_fk` FOREIGN KEY (`comment_article_id`) REFERENCES `community_article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game_category`
--
ALTER TABLE `game_category`
  ADD CONSTRAINT `game_category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user_table` (`uid`);

--
-- Constraints for table `jigsaw_image`
--
ALTER TABLE `jigsaw_image`
  ADD CONSTRAINT `jigsaw_image_ibfk_1` FOREIGN KEY (`ji_c_id`) REFERENCES `game_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lesson_download`
--
ALTER TABLE `lesson_download`
  ADD CONSTRAINT `downloaded_by_fk` FOREIGN KEY (`downloaded_by`) REFERENCES `user_table` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lesson_id_fk` FOREIGN KEY (`lesson_id`) REFERENCES `lesson_table` (`lesson_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lesson_table`
--
ALTER TABLE `lesson_table`
  ADD CONSTRAINT `lesson_table_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject_table` (`subject_id`),
  ADD CONSTRAINT `lesson_table_ibfk_2` FOREIGN KEY (`grade_id`) REFERENCES `grade_table` (`grade_id`);

--
-- Constraints for table `loops_category`
--
ALTER TABLE `loops_category`
  ADD CONSTRAINT `loops_category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user_table` (`uid`);

--
-- Constraints for table `magazine_download`
--
ALTER TABLE `magazine_download`
  ADD CONSTRAINT `magazine_download_ibfk_1` FOREIGN KEY (`magazine_id`) REFERENCES `magazine` (`magazine_id`),
  ADD CONSTRAINT `magazine_download_ibfk_2` FOREIGN KEY (`downloaded_by`) REFERENCES `user_table` (`uid`);

--
-- Constraints for table `score_table`
--
ALTER TABLE `score_table`
  ADD CONSTRAINT `score_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`uid`),
  ADD CONSTRAINT `score_table_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lesson_table` (`lesson_id`),
  ADD CONSTRAINT `score_table_ibfk_3` FOREIGN KEY (`doitonline_id`) REFERENCES `doit_online` (`do_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
