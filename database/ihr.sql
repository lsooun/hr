-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2018 at 10:19 AM
-- Server version: 5.7.22-0ubuntu0.17.10.1
-- PHP Version: 7.1.15-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ihr`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_04_23_104114_Create_Employee_Table', 1),
('2016_05_03_054932_Create_AppConfig_Table', 1),
('2016_05_08_031144_Create_Designation_Table', 1),
('2016_05_08_031315_Create_Department_Table', 1),
('2016_05_10_072042_Create_Jobs_Table', 1),
('2016_05_11_052103_Create_Job_Applicatans_Table', 1),
('2016_05_15_030642_Create_Expense_Title_Table', 1),
('2016_05_15_052304_Create_Leave_Type_Table', 1),
('2016_05_15_060320_Create_Award_Table', 1),
('2016_05_17_033109_Create_Award_List_Table', 1),
('2016_05_18_053547_Create_Leave_Table', 1),
('2016_05_18_095724_Create_Notice_Table', 1),
('2016_05_19_083955_Create_Expense_Table', 1),
('2016_05_25_054712_Create_Task_Table', 1),
('2016_05_25_081016_Create_Task_Employee_Table', 1),
('2016_05_25_081155_Create_Task_Comments_Table', 1),
('2016_05_25_081212_Create_Task_Files_Table', 1),
('2016_05_29_082935_Create_Attendance_Table', 1),
('2016_05_30_102055_Create_Ticket_Table', 1),
('2016_05_30_102221_Create_Ticket_Replies_Table', 1),
('2016_05_30_102324_Create_Support_Department_Table', 1),
('2016_05_31_040818_Create_Ticket_Files_Table', 1),
('2016_05_31_054434_Create_Holiday_Table', 1),
('2016_06_06_054455_Create_Payroll_Table', 1),
('2016_06_07_091352_Create_Employee_Bank_Accounts_Table', 1),
('2016_06_08_054356_Create_Employee_Files_Table', 1),
('2016_06_11_044412_Create_Email_Template_Table', 1),
('2016_06_27_070853_Create_Language_Table', 1),
('2016_06_27_071118_Create_Language_Data_Table', 1),
('2016_08_14_060701_Create_Tax_Rules_Tables', 1),
('2016_08_14_081647_Create_Tax_Rules_Details_Table', 1),
('2016_08_16_110543_Create_Provident_Fund_Table', 1),
('2016_08_18_040810_Create_Loan_Table', 1),
('2016_08_20_033239_Create_sms_gateways_Table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_appconfig`
--

CREATE TABLE `sys_appconfig` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_appconfig`
--

INSERT INTO `sys_appconfig` (`id`, `setting`, `value`, `created_at`, `updated_at`) VALUES
(1, 'AppName', '智慧HR', '2016-09-04 01:29:11', '2016-09-24 13:26:04'),
(2, 'Email', 'it@mw.life', '2016-09-04 01:29:11', '2016-09-24 13:26:04'),
(3, 'Address', '北京市北京经济技术开发区<div>地盛北街1号</div><div>36号楼205室</div>', '2016-09-04 01:29:11', '2016-09-24 13:26:04'),
(4, 'SoftwareVersion', '1.0.0', '2016-09-04 01:29:11', '2016-09-04 01:29:11'),
(5, 'AppTitle', '智慧HR', '2016-09-04 01:29:11', '2016-09-24 13:26:04'),
(6, 'FooterTxt', '© 2016 移动智慧', '2016-09-04 01:29:11', '2016-09-24 13:26:04'),
(7, 'AppLogo', 'assets/img/logo.png', '2016-09-04 01:29:11', '2016-09-04 01:29:11'),
(8, 'AppFav', 'assets/img/Favicon.ico', '2016-09-04 01:29:11', '2016-09-04 07:33:58'),
(9, 'Country', 'China', '2016-09-04 01:29:11', '2016-09-24 10:47:30'),
(10, 'Timezone', 'Asia/Shanghai', '2016-09-04 01:29:11', '2016-09-24 10:47:30'),
(11, 'Currency', 'CNY', '2016-09-04 01:29:11', '2016-09-24 10:47:30'),
(12, 'CurrencyCode', '¥', '2016-09-04 01:29:11', '2016-09-24 10:47:30'),
(13, 'Gateway', 'smtp', '2016-09-04 01:29:11', '2016-09-24 13:26:04'),
(14, 'SMTPHostName', 'smtp.exmail.qq.com', '2016-09-04 01:29:11', '2016-09-24 13:26:04'),
(15, 'SMTPUserName', 'it@mw.life', '2016-09-04 01:29:12', '2016-09-24 13:26:04'),
(16, 'SMTPPassword', '190For082', '2016-09-04 01:29:12', '2016-09-24 13:26:04'),
(17, 'SMTPPort', '587', '2016-09-04 01:29:12', '2016-09-24 13:26:04'),
(18, 'SMTPSecure', 'tls', '2016-09-04 01:29:12', '2016-09-24 13:26:04'),
(19, 'AppStage', 'Live', '2016-09-04 01:29:12', '2016-09-04 01:29:12'),
(20, 'OfficeInTime', '9:25 AM', '2016-09-04 01:29:12', '2016-09-24 10:45:55'),
(21, 'OfficeOutTime', '6:25 PM', '2016-09-04 01:29:12', '2016-09-24 10:45:55'),
(22, 'JobFileExtension', 'doc,pdf', '2016-09-04 01:29:12', '2016-09-04 01:29:12'),
(23, 'DateFormat', 'Y/m/d', '2016-09-04 01:29:12', '2016-09-24 10:47:30'),
(24, 'Language', '2', '2016-09-04 01:29:12', '2016-09-24 17:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `sys_attendance`
--

CREATE TABLE `sys_attendance` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `clock_in` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clock_in_optional` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clock_out` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `late` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `early_leaving` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `overtime` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Absent','Holiday','Present') COLLATE utf8_unicode_ci NOT NULL,
  `pay_status` enum('Paid','Unpaid') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unpaid',
  `clock_status` enum('Clock In','Clock Out') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Clock Out',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_attendance`
--

INSERT INTO `sys_attendance` (`id`, `emp_id`, `designation`, `department`, `date`, `clock_in`, `clock_in_optional`, `clock_out`, `late`, `early_leaving`, `overtime`, `total`, `status`, `pay_status`, `clock_status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2016-09-24', '8:00 AM', NULL, '12:00 PM', '0', '385', '0', '155', 'Present', 'Unpaid', 'Clock Out', '2016-09-24 15:28:52', '2016-09-25 02:34:50'),
(3, 2, 1, 1, '2016-09-25', '1:02 AM', NULL, NULL, NULL, NULL, '5', NULL, 'Present', 'Unpaid', 'Clock In', '2016-09-24 17:02:14', '2016-09-25 02:35:06'),
(4, 4, 5, 2, '2016-09-26', '10:48 AM', NULL, '10:48 AM', '83', '457', '0', '0', 'Present', 'Unpaid', 'Clock Out', '2016-09-26 02:48:35', '2016-09-26 02:48:38'),
(5, 2, 1, 1, '2016-09-26', '9:52 PM', NULL, NULL, NULL, NULL, NULL, NULL, 'Present', 'Unpaid', 'Clock In', '2016-09-26 13:52:03', '2016-09-26 13:52:03'),
(6, 4, 5, 2, '2016-09-27', '2:06 PM', NULL, '2:06 PM', '281', '259', '0', '0', 'Present', 'Unpaid', 'Clock Out', '2016-09-27 06:06:43', '2016-09-27 06:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `sys_award`
--

CREATE TABLE `sys_award` (
  `id` int(10) UNSIGNED NOT NULL,
  `award` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_award`
--

INSERT INTO `sys_award` (`id`, `award`, `created_at`, `updated_at`) VALUES
(1, '最佳员工奖', '2016-09-24 15:41:00', '2016-09-24 15:41:00'),
(2, '最勤劳员工奖', '2016-09-24 15:41:22', '2016-09-24 15:41:22'),
(3, '最智慧员工奖', '2016-09-24 15:41:33', '2016-09-24 15:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `sys_award_list`
--

CREATE TABLE `sys_award_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` text COLLATE utf8_unicode_ci NOT NULL,
  `award` int(11) NOT NULL,
  `gift` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cash` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_award_list`
--

INSERT INTO `sys_award_list` (`id`, `emp_id`, `award`, `gift`, `cash`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, '001', 1, '测试', '1000', 'September', 2016, '2016-09-24 21:26:33', '2016-09-24 21:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `sys_department`
--

CREATE TABLE `sys_department` (
  `id` int(10) UNSIGNED NOT NULL,
  `department` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_department`
--

INSERT INTO `sys_department` (`id`, `department`, `created_at`, `updated_at`) VALUES
(1, '人事部', '2016-09-24 13:21:00', '2016-09-24 13:21:00'),
(2, '研发部', '2016-09-24 13:21:06', '2016-09-24 13:21:06'),
(3, '财务部', '2016-09-24 13:50:50', '2016-09-24 13:50:50'),
(4, '支持部', '2016-09-24 13:51:01', '2016-09-24 13:51:01'),
(5, '行政部', '2016-09-24 13:51:09', '2016-09-24 13:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `sys_designation`
--

CREATE TABLE `sys_designation` (
  `id` int(10) UNSIGNED NOT NULL,
  `did` int(11) NOT NULL,
  `designation` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_designation`
--

INSERT INTO `sys_designation` (`id`, `did`, `designation`, `created_at`, `updated_at`) VALUES
(1, 5, '总经理', '2016-09-24 13:21:38', '2016-09-24 15:48:36'),
(2, 2, '软件工程师', '2016-09-24 13:50:17', '2016-09-24 13:50:17'),
(3, 1, '人事顾问', '2016-09-24 13:50:31', '2016-09-24 13:50:31'),
(4, 2, '技术总监', '2016-09-24 13:50:37', '2016-09-24 13:50:37'),
(5, 2, 'Web前端工程师', '2016-09-24 15:37:40', '2016-09-24 15:37:40'),
(6, 2, 'PHP工程师', '2016-09-24 15:37:54', '2016-09-24 15:37:54'),
(7, 2, 'iOS工程师', '2016-09-24 15:57:33', '2016-09-24 15:57:33'),
(8, 2, 'Android工程师', '2016-09-24 15:57:45', '2016-09-24 15:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `sys_email_templates`
--

CREATE TABLE `sys_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `tplname` text COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_email_templates`
--

INSERT INTO `sys_email_templates` (`id`, `tplname`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Employee SignUp', 'Welcome to {{business_name}}', '<div style=\"margin:0;padding:0\">\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#439cc8\">\n  <tbody><tr>\n    <td align=\"center\">\n            <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n              <tbody><tr>\n                <td height=\"95\" bgcolor=\"#439cc8\" style=\"background:#439cc8;text-align:left\">\n                <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                      <tbody><tr>\n                        <td width=\"672\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                      </tr>\n                      <tr>\n                        <td style=\"text-align:left\">\n                        <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                          <tbody><tr>\n                            <td width=\"37\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\">\n                            </td>\n                            <td width=\"523\" height=\"24\" style=\"text-align:left\">\n                            <div width=\"125\" height=\"23\" style=\"display:block;color:#ffffff;font-size:20px;font-family:Arial,Helvetica,sans-serif;max-width:557px;min-height:auto\">{{business_name}}</div>\n                            </td>\n                            <td width=\"44\" style=\"text-align:left\"></td>\n                            <td width=\"30\" style=\"text-align:left\"></td>\n                            <td width=\"38\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                          </tr>\n                        </tbody></table>\n                        </td>\n                      </tr>\n                      <tr><td width=\"672\" height=\"33\" style=\"font-size:33px;line-height:33px;height:33px;text-align:left\"></td></tr>\n                    </tbody></table>\n\n                </td>\n              </tr>\n            </tbody></table>\n     </td>\n    </tr>\n </tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#439cc8\"><tbody><tr><td height=\"5\" style=\"background:#439cc8;height:5px;font-size:5px;line-height:5px\"></td></tr></tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#e9eff0\">\n  <tbody><tr>\n    <td align=\"center\">\n      <table cellspacing=\"0\" cellpadding=\"0\" width=\"671\" border=\"0\" bgcolor=\"#e9eff0\" style=\"background:#e9eff0\">\n        <tbody><tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n          <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"596\" border=\"0\" bgcolor=\"#ffffff\">\n            <tbody><tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\" style=\"font-family:helvetica,arial,sans-seif;color:#666666;font-size:16px;line-height:22px\">\n                <tbody><tr>\n                  <td style=\"text-align:left\"></td>\n                </tr>\n                <tr>\n                  <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\">\n                    <tbody><tr><td style=\"font-family:helvetica,arial,sans-serif;font-size:30px;line-height:40px;font-weight:normal;color:#253c44;text-align:left\"></td></tr>\n                    <tr><td width=\"556\" height=\"20\" style=\"font-size:20px;line-height:20px;height:20px;text-align:left\"></td></tr>\n                    <tr>\n                      <td style=\"text-align:left\">\n                 Hi {{name}},<br>\n                 <br>\n                Welcome to {{business_name}}! This message is an automated reply to your Employee Access request. Login to your employee panel by using the details below:\n            <br>\n                <a target=\"_blank\" style=\"color:#ff6600;font-weight:bold;font-family:helvetica,arial,sans-seif;text-decoration:none\" href=\"{{sys_url}}\">{{sys_url}}</a>.<br>\n                                    User Name: {{username}}<br>\n                                    Password: {{password}}\n            <br>\n            Regards,<br>\n            {{business_name}}<br>\n            <br>\n          </td>\n                    </tr>\n                    <tr>\n                      <td width=\"556\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\">&nbsp;</td>\n                    </tr>\n                  </tbody></table></td>\n                </tr>\n              </tbody></table></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"556\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n            </tr>\n          </tbody></table></td>\n          <td width=\"37\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n      </tbody></table>\n  </td></tr>\n</tbody>\n</table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#273f47\"><tbody><tr><td align=\"center\">&nbsp;</td></tr></tbody></table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#364a51\">\n  <tbody><tr>\n    <td align=\"center\">\n       <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\" bgcolor=\"#364a51\">\n              <tbody><tr>\n              <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"569\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n              </tr>\n              <tr>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\">\n                </td>\n                <td valign=\"top\" style=\"font-family:helvetica,arial,sans-seif;font-size:12px;line-height:16px;color:#949fa3;text-align:left\">Copyright &copy; {{business_name}}, All rights reserved.<br><br><br></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n              <tr>\n              <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              <td width=\"569\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n            </tbody></table>\n     </td>\n  </tr>\n</tbody></table><div class=\"yj6qo\"></div><div class=\"adL\">\n\n</div></div>\n', '1', '2016-09-04 01:29:13', '2016-09-04 01:29:13'),
(2, 'Ticket For Employee', 'New Ticket From {{business_name}}', '<div style=\"margin:0;padding:0\">\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#439cc8\">\n  <tbody><tr>\n    <td align=\"center\">\n            <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n              <tbody><tr>\n                <td height=\"95\" bgcolor=\"#439cc8\" style=\"background:#439cc8;text-align:left\">\n                <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                      <tbody><tr>\n                        <td width=\"672\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                      </tr>\n                      <tr>\n                        <td style=\"text-align:left\">\n                        <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                          <tbody><tr>\n                            <td width=\"37\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\">\n                            </td>\n                            <td width=\"523\" height=\"24\" style=\"text-align:left\">\n                            <div width=\"125\" height=\"23\" style=\"display:block;color:#ffffff;font-size:20px;font-family:Arial,Helvetica,sans-serif;max-width:557px;min-height:auto\" >{{business_name}}</div>\n                            </td>\n                            <td width=\"44\" style=\"text-align:left\"></td>\n                            <td width=\"30\" style=\"text-align:left\"></td>\n                            <td width=\"38\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                          </tr>\n                        </tbody></table>\n                        </td>\n                      </tr>\n                      <tr><td width=\"672\" height=\"33\" style=\"font-size:33px;line-height:33px;height:33px;text-align:left\"></td></tr>\n                    </tbody></table>\n\n                </td>\n              </tr>\n            </tbody></table>\n     </td>\n    </tr>\n </tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#439cc8\"><tbody><tr><td height=\"5\" style=\"background:#439cc8;height:5px;font-size:5px;line-height:5px\"></td></tr></tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#e9eff0\">\n  <tbody><tr>\n    <td align=\"center\">\n      <table cellspacing=\"0\" cellpadding=\"0\" width=\"671\" border=\"0\" bgcolor=\"#e9eff0\" style=\"background:#e9eff0\">\n        <tbody><tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n          <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"596\" border=\"0\" bgcolor=\"#ffffff\">\n            <tbody><tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\" style=\"font-family:helvetica,arial,sans-seif;color:#666666;font-size:16px;line-height:22px\">\n                <tbody><tr>\n                  <td style=\"text-align:left\"></td>\n                </tr>\n                <tr>\n                  <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\">\n                    <tbody><tr><td style=\"font-family:helvetica,arial,sans-serif;font-size:30px;line-height:40px;font-weight:normal;color:#253c44;text-align:left\"></td></tr>\n                    <tr><td width=\"556\" height=\"20\" style=\"font-size:20px;line-height:20px;height:20px;text-align:left\"></td></tr>\n                    <tr>\n                      <td style=\"text-align:left\">\n                 Hi {{name}},<br>\n                 <br>\n                Thank you for stay with us! This is a Support Ticket For Yours.. Login to your account to view  your support tickets details:\n            <br>\n                <a target=\"_blank\" style=\"color:#ff6600;font-weight:bold;font-family:helvetica,arial,sans-seif;text-decoration:none\" href=\"{{sys_url}}\">{{sys_url}}</a>.<br>\n                Ticket ID: {{ticket_id}}<br>\n                Ticket Subject: {{ticket_subject}}<br>\n                Message: {{message}}<br>\n                Created By: {{create_by}}\n            <br>\n            Regards,<br>\n            {{business_name}}<br>\n            <br>\n          </td>\n                    </tr>\n                    <tr>\n                      <td width=\"556\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\">Â </td>\n                    </tr>\n                  </tbody></table></td>\n                </tr>\n              </tbody></table></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"556\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n            </tr>\n          </tbody></table></td>\n          <td width=\"37\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n      </tbody></table>\n  </td></tr>\n</tbody>\n</table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#273f47\"><tbody><tr><td align=\"center\">Â </td></tr></tbody></table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#364a51\">\n  <tbody><tr>\n    <td align=\"center\">\n       <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\" bgcolor=\"#364a51\">\n              <tbody><tr>\n              <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"569\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n              </tr>\n              <tr>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\">\n                </td>\n                <td valign=\"top\" style=\"font-family:helvetica,arial,sans-seif;font-size:12px;line-height:16px;color:#949fa3;text-align:left\">Copyright Â© {{business_name}}, All rights reserved.<br><br><br></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n              <tr>\n              <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              <td width=\"569\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n            </tbody></table>\n     </td>\n  </tr>\n</tbody></table><div class=\"yj6qo\"></div><div class=\"adL\">\n\n</div></div>\n\n                ', '1', '2016-09-04 01:29:13', '2016-09-04 01:29:13'),
(3, 'Admin Password Reset', '{{business_name}} New Password', '<div style=\"margin:0;padding:0\">\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#439cc8\">\n  <tbody><tr>\n    <td align=\"center\">\n            <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n              <tbody><tr>\n                <td height=\"95\" bgcolor=\"#439cc8\" style=\"background:#439cc8;text-align:left\">\n                <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                      <tbody><tr>\n                        <td width=\"672\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                      </tr>\n                      <tr>\n                        <td style=\"text-align:left\">\n                        <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                          <tbody><tr>\n                            <td width=\"37\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\">\n                            </td>\n                            <td width=\"523\" height=\"24\" style=\"text-align:left\">\n                            <p  style=\"display:block;color:#ffffff;font-size:20px;font-family:Arial,Helvetica,sans-serif;max-width:557px;min-height:auto\">{{business_name}}</p>\n                            </td>\n                            <td width=\"44\" style=\"text-align:left\"></td>\n                            <td width=\"30\" style=\"text-align:left\"></td>\n                            <td width=\"38\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                          </tr>\n                        </tbody></table>\n                        </td>\n                      </tr>\n                      <tr><td width=\"672\" height=\"33\" style=\"font-size:33px;line-height:33px;height:33px;text-align:left\"></td></tr>\n                    </tbody></table>\n\n                </td>\n              </tr>\n            </tbody></table>\n     </td>\n    </tr>\n </tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#439cc8\"><tbody><tr><td height=\"5\" style=\"background:#439cc8;height:5px;font-size:5px;line-height:5px\"></td></tr></tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#e9eff0\">\n  <tbody><tr>\n    <td align=\"center\">\n      <table cellspacing=\"0\" cellpadding=\"0\" width=\"671\" border=\"0\" bgcolor=\"#e9eff0\" style=\"background:#e9eff0\">\n        <tbody><tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n          <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"596\" border=\"0\" bgcolor=\"#ffffff\">\n            <tbody><tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\" style=\"font-family:helvetica,arial,sans-seif;color:#666666;font-size:16px;line-height:22px\">\n                <tbody><tr>\n                  <td style=\"text-align:left\"></td>\n                </tr>\n                <tr>\n                  <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\">\n                    <tbody><tr><td style=\"font-family:helvetica,arial,sans-serif;font-size:30px;line-height:40px;font-weight:normal;color:#253c44;text-align:left\"></td></tr>\n                    <tr><td width=\"556\" height=\"20\" style=\"font-size:20px;line-height:20px;height:20px;text-align:left\"></td></tr>\n                    <tr>\n                      <td style=\"text-align:left\">\n                 Hi {{name}},<br>\n                 <br>\n                Password Reset Successfully!   This message is an automated reply to your password reset request. Login to your account to set up your all details by using the details below:\n            <br>\n                <a target=\"_blank\" style=\"color:#ff6600;font-weight:bold;font-family:helvetica,arial,sans-seif;text-decoration:none\" href=\" {{sys_url}}\"> {{sys_url}}</a>.<br>\n                                    User Name: {{username}}<br>\n                                    Password: {{password}}\n            <br>\n            {{business_name}},<br>\n            <br>\n          </td>\n                    </tr>\n                    <tr>\n                      <td width=\"556\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\">&nbsp;</td>\n                    </tr>\n                  </tbody></table></td>\n                </tr>\n              </tbody></table></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"556\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n            </tr>\n          </tbody></table></td>\n          <td width=\"37\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n      </tbody></table>\n  </td></tr>\n</tbody>\n</table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#273f47\"><tbody><tr><td align=\"center\">&nbsp;</td></tr></tbody></table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#364a51\">\n  <tbody><tr>\n    <td align=\"center\">\n       <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\" bgcolor=\"#364a51\">\n              <tbody><tr>\n              <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"569\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n              </tr>\n              <tr>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\">\n                </td>\n                <td valign=\"top\" style=\"font-family:helvetica,arial,sans-seif;font-size:12px;line-height:16px;color:#949fa3;text-align:left\">Copyright &copy; {{business_name}}, All rights reserved.<br><br><br></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n              <tr>\n              <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              <td width=\"569\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n            </tbody></table>\n     </td>\n  </tr>\n</tbody></table><div class=\"yj6qo\"></div><div class=\"adL\">\n\n</div></div>\n', '1', '2016-09-04 01:29:13', '2016-09-04 01:29:13'),
(4, 'Forgot Admin Password', '{{business_name}} password change request', '<div style=\"margin:0;padding:0\">\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#439cc8\">\n  <tbody><tr>\n    <td align=\"center\">\n            <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n              <tbody><tr>\n                <td height=\"95\" bgcolor=\"#439cc8\" style=\"background:#439cc8;text-align:left\">\n                <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                      <tbody><tr>\n                        <td width=\"672\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                      </tr>\n                      <tr>\n                        <td style=\"text-align:left\">\n                        <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                          <tbody><tr>\n                            <td width=\"37\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\">\n                            </td>\n                            <td width=\"523\" height=\"24\" style=\"text-align:left\">\n                            <p  style=\"display:block;color:#ffffff;font-size:20px;font-family:Arial,Helvetica,sans-serif;max-width:557px;min-height:auto\" >{{business_name}}</p>\n                            </td>\n                            <td width=\"44\" style=\"text-align:left\"></td>\n                            <td width=\"30\" style=\"text-align:left\"></td>\n                            <td width=\"38\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                          </tr>\n                        </tbody></table>\n                        </td>\n                      </tr>\n                      <tr><td width=\"672\" height=\"33\" style=\"font-size:33px;line-height:33px;height:33px;text-align:left\"></td></tr>\n                    </tbody></table>\n\n                </td>\n              </tr>\n            </tbody></table>\n     </td>\n    </tr>\n </tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#439cc8\"><tbody><tr><td height=\"5\" style=\"background:#439cc8;height:5px;font-size:5px;line-height:5px\"></td></tr></tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#e9eff0\">\n  <tbody><tr>\n    <td align=\"center\">\n      <table cellspacing=\"0\" cellpadding=\"0\" width=\"671\" border=\"0\" bgcolor=\"#e9eff0\" style=\"background:#e9eff0\">\n        <tbody><tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n          <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"596\" border=\"0\" bgcolor=\"#ffffff\">\n            <tbody><tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\" style=\"font-family:helvetica,arial,sans-seif;color:#666666;font-size:16px;line-height:22px\">\n                <tbody><tr>\n                  <td style=\"text-align:left\"></td>\n                </tr>\n                <tr>\n                  <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\">\n                    <tbody><tr><td style=\"font-family:helvetica,arial,sans-serif;font-size:30px;line-height:40px;font-weight:normal;color:#253c44;text-align:left\"></td></tr>\n                    <tr><td width=\"556\" height=\"20\" style=\"font-size:20px;line-height:20px;height:20px;text-align:left\"></td></tr>\n                    <tr>\n                      <td style=\"text-align:left\">\n                 Hi {{name}},<br>\n                 <br>\n                Password Reset Successfully!   This message is an automated reply to your password reset request. Click this linke to reset your password:\n            <br>\n                <a target=\"_blank\" style=\"color:#ff6600;font-weight:bold;font-family:helvetica,arial,sans-seif;text-decoration:none\" href=\" {{forgotpw_link}} \"> {{forgotpw_link}} </a>.<br>\nNotes: Until your password has been changed, your current password will remain valid. The Forgot Password Link will be available for a limited time only.\n\n            <br>\n            On behalf of the {{business_name}},<br>\n            <br>\n          </td>\n                    </tr>\n                    <tr>\n                      <td width=\"556\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\">&nbsp;</td>\n                    </tr>\n                  </tbody></table></td>\n                </tr>\n              </tbody></table></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"556\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n            </tr>\n          </tbody></table></td>\n          <td width=\"37\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n      </tbody></table>\n  </td></tr>\n</tbody>\n</table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#273f47\"><tbody><tr><td align=\"center\">&nbsp;</td></tr></tbody></table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#364a51\">\n  <tbody><tr>\n    <td align=\"center\">\n       <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\" bgcolor=\"#364a51\">\n              <tbody><tr>\n              <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"569\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n              </tr>\n              <tr>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\">\n                </td>\n                <td valign=\"top\" style=\"font-family:helvetica,arial,sans-seif;font-size:12px;line-height:16px;color:#949fa3;text-align:left\">Copyright &copy; {{business_name}}, All rights reserved.<br><br><br></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n              <tr>\n              <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              <td width=\"569\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n            </tbody></table>\n     </td>\n  </tr>\n</tbody></table><div class=\"yj6qo\"></div><div class=\"adL\">\n\n</div></div>\n', '1', '2016-09-04 01:29:13', '2016-09-04 01:29:13'),
(5, 'Ticket Reply', 'Reply to Ticket [TID-{{ticket_id}}]', '<div style=\"margin:0;padding:0\">\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#439cc8\">\n  <tbody><tr>\n    <td align=\"center\">\n            <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n              <tbody><tr>\n                <td height=\"95\" bgcolor=\"#439cc8\" style=\"background:#439cc8;text-align:left\">\n                <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                      <tbody><tr>\n                        <td width=\"672\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                      </tr>\n                      <tr>\n                        <td style=\"text-align:left\">\n                        <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                          <tbody><tr>\n                            <td width=\"37\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\">\n                            </td>\n                            <td width=\"523\" height=\"24\" style=\"text-align:left\">\n                            <div width=\"125\" height=\"23\" style=\"display:block;color:#ffffff;font-size:20px;font-family:Arial,Helvetica,sans-serif;max-width:557px;min-height:auto\"  {{business_name}} ></div>\n                            </td>\n                            <td width=\"44\" style=\"text-align:left\"></td>\n                            <td width=\"30\" style=\"text-align:left\"></td>\n                            <td width=\"38\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                          </tr>\n                        </tbody></table>\n                        </td>\n                      </tr>\n                      <tr><td width=\"672\" height=\"33\" style=\"font-size:33px;line-height:33px;height:33px;text-align:left\"></td></tr>\n                    </tbody></table>\n\n                </td>\n              </tr>\n            </tbody></table>\n     </td>\n    </tr>\n </tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#439cc8\"><tbody><tr><td height=\"5\" style=\"background:#439cc8;height:5px;font-size:5px;line-height:5px\"></td></tr></tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#e9eff0\">\n  <tbody><tr>\n    <td align=\"center\">\n      <table cellspacing=\"0\" cellpadding=\"0\" width=\"671\" border=\"0\" bgcolor=\"#e9eff0\" style=\"background:#e9eff0\">\n        <tbody><tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n          <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"596\" border=\"0\" bgcolor=\"#ffffff\">\n            <tbody><tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\" style=\"font-family:helvetica,arial,sans-seif;color:#666666;font-size:16px;line-height:22px\">\n                <tbody><tr>\n                  <td style=\"text-align:left\"></td>\n                </tr>\n                <tr>\n                  <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\">\n                    <tbody><tr><td style=\"font-family:helvetica,arial,sans-serif;font-size:30px;line-height:40px;font-weight:normal;color:#253c44;text-align:left\"></td></tr>\n                    <tr><td width=\"556\" height=\"20\" style=\"font-size:20px;line-height:20px;height:20px;text-align:left\"></td></tr>\n                    <tr>\n                      <td style=\"text-align:left\">\n                 Hi {{name}},<br>\n                 <br>\n                Thank you for stay with us! This is a Support Ticket Reply. Login to your account to view  your support ticket reply details:\n            <br>\n                <a target=\"_blank\" style=\"color:#ff6600;font-weight:bold;font-family:helvetica,arial,sans-seif;text-decoration:none\" href=\"{{sys_url}}\">{{sys_url}}</a>.<br>\n                Ticket ID: {{ticket_id}}<br>\n                Ticket Subject: {{ticket_subject}}<br>\n                Message: {{message}}<br>\n                Replyed By: {{reply_by}} <br><br>\n                Should you have any questions in regards to this support ticket or any other tickets related issue, please feel free to contact the Support department by creating a new ticket from your Employee Portal\n            <br><br>\n            Regards,<br>\n            {{business_name}}<br>\n            <br>\n          </td>\n                    </tr>\n                    <tr>\n                      <td width=\"556\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\">&nbsp;</td>\n                    </tr>\n                  </tbody></table></td>\n                </tr>\n              </tbody></table></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"556\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n            </tr>\n          </tbody></table></td>\n          <td width=\"37\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n      </tbody></table>\n  </td></tr>\n</tbody>\n</table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#273f47\"><tbody><tr><td align=\"center\">&nbsp;</td></tr></tbody></table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#364a51\">\n  <tbody><tr>\n    <td align=\"center\">\n       <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\" bgcolor=\"#364a51\">\n              <tbody><tr>\n              <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"569\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n              </tr>\n              <tr>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\">\n                </td>\n                <td valign=\"top\" style=\"font-family:helvetica,arial,sans-seif;font-size:12px;line-height:16px;color:#949fa3;text-align:left\">Copyright &copy; {{business_name}}, All rights reserved.<br><br><br></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n              <tr>\n              <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              <td width=\"569\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n            </tbody></table>\n     </td>\n  </tr>\n</tbody></table><div class=\"yj6qo\"></div><div class=\"adL\">\n\n</div></div>\n', '1', '2016-09-04 01:29:13', '2016-09-04 01:29:13');
INSERT INTO `sys_email_templates` (`id`, `tplname`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Forgot Employee Password', '{{business_name}} password change request', '<div style=\"margin:0;padding:0\">\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#439cc8\">\n  <tbody><tr>\n    <td align=\"center\">\n            <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n              <tbody><tr>\n                <td height=\"95\" bgcolor=\"#439cc8\" style=\"background:#439cc8;text-align:left\">\n                <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                      <tbody><tr>\n                        <td width=\"672\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                      </tr>\n                      <tr>\n                        <td style=\"text-align:left\">\n                        <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                          <tbody><tr>\n                            <td width=\"37\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\">\n                            </td>\n                            <td width=\"523\" height=\"24\" style=\"text-align:left\">\n                            <p  style=\"display:block;color:#ffffff;font-size:20px;font-family:Arial,Helvetica,sans-serif;max-width:557px;min-height:auto\">{{business_name}} </p>\n                            </td>\n                            <td width=\"44\" style=\"text-align:left\"></td>\n                            <td width=\"30\" style=\"text-align:left\"></td>\n                            <td width=\"38\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                          </tr>\n                        </tbody></table>\n                        </td>\n                      </tr>\n                      <tr><td width=\"672\" height=\"33\" style=\"font-size:33px;line-height:33px;height:33px;text-align:left\"></td></tr>\n                    </tbody></table>\n\n                </td>\n              </tr>\n            </tbody></table>\n     </td>\n    </tr>\n </tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#439cc8\"><tbody><tr><td height=\"5\" style=\"background:#439cc8;height:5px;font-size:5px;line-height:5px\"></td></tr></tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#e9eff0\">\n  <tbody><tr>\n    <td align=\"center\">\n      <table cellspacing=\"0\" cellpadding=\"0\" width=\"671\" border=\"0\" bgcolor=\"#e9eff0\" style=\"background:#e9eff0\">\n        <tbody><tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n          <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"596\" border=\"0\" bgcolor=\"#ffffff\">\n            <tbody><tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\" style=\"font-family:helvetica,arial,sans-seif;color:#666666;font-size:16px;line-height:22px\">\n                <tbody><tr>\n                  <td style=\"text-align:left\"></td>\n                </tr>\n                <tr>\n                  <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\">\n                    <tbody><tr><td style=\"font-family:helvetica,arial,sans-serif;font-size:30px;line-height:40px;font-weight:normal;color:#253c44;text-align:left\"></td></tr>\n                    <tr><td width=\"556\" height=\"20\" style=\"font-size:20px;line-height:20px;height:20px;text-align:left\"></td></tr>\n                    <tr>\n                      <td style=\"text-align:left\">\n                 Hi {{name}},<br>\n                 <br>\n                Password Reset Successfully!   This message is an automated reply to your password reset request. Click this linke to reset your password:\n            <br>\n                <a target=\"_blank\" style=\"color:#ff6600;font-weight:bold;font-family:helvetica,arial,sans-seif;text-decoration:none\" href=\" {{forgotpw_link}} \"> {{forgotpw_link}} </a>.<br>\nNotes: Until your password has been changed, your current password will remain valid. The Forgot Password Link will be available for a limited time only.\n\n            <br>\n            {{business_name}}<br>\n            <br>\n          </td>\n                    </tr>\n                    <tr>\n                      <td width=\"556\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\">&nbsp;</td>\n                    </tr>\n                  </tbody></table></td>\n                </tr>\n              </tbody></table></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"556\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n            </tr>\n          </tbody></table></td>\n          <td width=\"37\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n      </tbody></table>\n  </td></tr>\n</tbody>\n</table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#273f47\"><tbody><tr><td align=\"center\">&nbsp;</td></tr></tbody></table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#364a51\">\n  <tbody><tr>\n    <td align=\"center\">\n       <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\" bgcolor=\"#364a51\">\n              <tbody><tr>\n              <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"569\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n              </tr>\n              <tr>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\">\n                </td>\n                <td valign=\"top\" style=\"font-family:helvetica,arial,sans-seif;font-size:12px;line-height:16px;color:#949fa3;text-align:left\">Copyright &copy; {{business_name}}, All rights reserved.<br><br><br></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n              <tr>\n              <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              <td width=\"569\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n            </tbody></table>\n     </td>\n  </tr>\n</tbody></table><div class=\"yj6qo\"></div><div class=\"adL\">\n\n</div></div>\n', '1', '2016-09-04 01:29:13', '2016-09-04 01:29:13'),
(7, 'Employee Password Reset', '{{business_name}} New Password', '<div style=\"margin:0;padding:0\">\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#439cc8\">\n  <tbody><tr>\n    <td align=\"center\">\n            <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n              <tbody><tr>\n                <td height=\"95\" bgcolor=\"#439cc8\" style=\"background:#439cc8;text-align:left\">\n                <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                      <tbody><tr>\n                        <td width=\"672\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                      </tr>\n                      <tr>\n                        <td style=\"text-align:left\">\n                        <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                          <tbody><tr>\n                            <td width=\"37\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\">\n                            </td>\n                            <td width=\"523\" height=\"24\" style=\"text-align:left\">\n                            <p  style=\"display:block;color:#ffffff;font-size:20px;font-family:Arial,Helvetica,sans-serif;max-width:557px;min-height:auto\" >{{business_name}}</p>\n                            </td>\n                            <td width=\"44\" style=\"text-align:left\"></td>\n                            <td width=\"30\" style=\"text-align:left\"></td>\n                            <td width=\"38\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                          </tr>\n                        </tbody></table>\n                        </td>\n                      </tr>\n                      <tr><td width=\"672\" height=\"33\" style=\"font-size:33px;line-height:33px;height:33px;text-align:left\"></td></tr>\n                    </tbody></table>\n\n                </td>\n              </tr>\n            </tbody></table>\n     </td>\n    </tr>\n </tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#439cc8\"><tbody><tr><td height=\"5\" style=\"background:#439cc8;height:5px;font-size:5px;line-height:5px\"></td></tr></tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#e9eff0\">\n  <tbody><tr>\n    <td align=\"center\">\n      <table cellspacing=\"0\" cellpadding=\"0\" width=\"671\" border=\"0\" bgcolor=\"#e9eff0\" style=\"background:#e9eff0\">\n        <tbody><tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n          <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"596\" border=\"0\" bgcolor=\"#ffffff\">\n            <tbody><tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\" style=\"font-family:helvetica,arial,sans-seif;color:#666666;font-size:16px;line-height:22px\">\n                <tbody><tr>\n                  <td style=\"text-align:left\"></td>\n                </tr>\n                <tr>\n                  <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\">\n                    <tbody><tr><td style=\"font-family:helvetica,arial,sans-serif;font-size:30px;line-height:40px;font-weight:normal;color:#253c44;text-align:left\"></td></tr>\n                    <tr><td width=\"556\" height=\"20\" style=\"font-size:20px;line-height:20px;height:20px;text-align:left\"></td></tr>\n                    <tr>\n                      <td style=\"text-align:left\">\n                 Hi {{name}},<br>\n                 <br>\n                Password Reset Successfully!   This message is an automated reply to your password reset request. Login to your account to set up your all details by using the details below:\n            <br>\n                <a target=\"_blank\" style=\"color:#ff6600;font-weight:bold;font-family:helvetica,arial,sans-seif;text-decoration:none\" href=\" {{sys_url}}\"> {{sys_url}}</a>.<br>\n                                    User Name: {{username}}<br>\n                                    Password: {{password}}\n            <br>\n            {{business_name}}<br>\n            <br>\n          </td>\n                    </tr>\n                    <tr>\n                      <td width=\"556\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\">&nbsp;</td>\n                    </tr>\n                  </tbody></table></td>\n                </tr>\n              </tbody></table></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"556\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n            </tr>\n          </tbody></table></td>\n          <td width=\"37\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n      </tbody></table>\n  </td></tr>\n</tbody>\n</table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#273f47\"><tbody><tr><td align=\"center\">&nbsp;</td></tr></tbody></table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#364a51\">\n  <tbody><tr>\n    <td align=\"center\">\n       <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\" bgcolor=\"#364a51\">\n              <tbody><tr>\n              <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"569\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n              </tr>\n              <tr>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\">\n                </td>\n                <td valign=\"top\" style=\"font-family:helvetica,arial,sans-seif;font-size:12px;line-height:16px;color:#949fa3;text-align:left\">Copyright &copy; {{business_name}}, All rights reserved.<br><br><br></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n              <tr>\n              <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              <td width=\"569\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n            </tbody></table>\n     </td>\n  </tr>\n</tbody></table><div class=\"yj6qo\"></div><div class=\"adL\">\n\n</div></div>\n', '1', '2016-09-04 01:29:13', '2016-09-04 01:29:13'),
(8, 'Ticket For Admin', 'New Ticket From {{business_name}} Employee', '<div style=\"margin:0;padding:0\">\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#439cc8\">\n  <tbody><tr>\n    <td align=\"center\">\n            <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n              <tbody><tr>\n                <td height=\"95\" bgcolor=\"#439cc8\" style=\"background:#439cc8;text-align:left\">\n                <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                      <tbody><tr>\n                        <td width=\"672\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                      </tr>\n                      <tr>\n                        <td style=\"text-align:left\">\n                        <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                          <tbody><tr>\n                            <td width=\"37\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\">\n                            </td>\n                            <td width=\"523\" height=\"24\" style=\"text-align:left\">\n                            <div width=\"125\" height=\"23\" style=\"display:block;color:#ffffff;font-size:20px;font-family:Arial,Helvetica,sans-serif;max-width:557px;min-height:auto\" >{{business_name}}</div>\n                            </td>\n                            <td width=\"44\" style=\"text-align:left\"></td>\n                            <td width=\"30\" style=\"text-align:left\"></td>\n                            <td width=\"38\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                          </tr>\n                        </tbody></table>\n                        </td>\n                      </tr>\n                      <tr><td width=\"672\" height=\"33\" style=\"font-size:33px;line-height:33px;height:33px;text-align:left\"></td></tr>\n                    </tbody></table>\n\n                </td>\n              </tr>\n            </tbody></table>\n     </td>\n    </tr>\n </tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#439cc8\"><tbody><tr><td height=\"5\" style=\"background:#439cc8;height:5px;font-size:5px;line-height:5px\"></td></tr></tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#e9eff0\">\n  <tbody><tr>\n    <td align=\"center\">\n      <table cellspacing=\"0\" cellpadding=\"0\" width=\"671\" border=\"0\" bgcolor=\"#e9eff0\" style=\"background:#e9eff0\">\n        <tbody><tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n          <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"596\" border=\"0\" bgcolor=\"#ffffff\">\n            <tbody><tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\" style=\"font-family:helvetica,arial,sans-seif;color:#666666;font-size:16px;line-height:22px\">\n                <tbody><tr>\n                  <td style=\"text-align:left\"></td>\n                </tr>\n                <tr>\n                  <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\">\n                    <tbody><tr><td style=\"font-family:helvetica,arial,sans-serif;font-size:30px;line-height:40px;font-weight:normal;color:#253c44;text-align:left\"></td></tr>\n                    <tr><td width=\"556\" height=\"20\" style=\"font-size:20px;line-height:20px;height:20px;text-align:left\"></td></tr>\n                    <tr>\n                      <td style=\"text-align:left\">\n                 Hi {{name}},<br>{{department_name}},<br>\n                 <br>\n\n                Ticket ID: {{ticket_id}}<br>\n                Ticket Subject: {{ticket_subject}}<br>\n                Message: {{message}}<br>\n                Created By: {{create_by}} <br><br>\n                Waiting for your quick response.\n            <br><br>\n            Thank you.\n            <br>\n            Regards,<br>\n            {{name}}<br>\n{{business_name}} Employee.\n            <br>\n          </td>\n                    </tr>\n                    <tr>\n                      <td width=\"556\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\">&nbsp;</td>\n                    </tr>\n                  </tbody></table></td>\n                </tr>\n              </tbody></table></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"556\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n            </tr>\n          </tbody></table></td>\n          <td width=\"37\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n      </tbody></table>\n  </td></tr>\n</tbody>\n</table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#273f47\"><tbody><tr><td align=\"center\">&nbsp;</td></tr></tbody></table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#364a51\">\n  <tbody><tr>\n    <td align=\"center\">\n       <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\" bgcolor=\"#364a51\">\n              <tbody><tr>\n              <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"569\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n              </tr>\n              <tr>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\">\n                </td>\n                <td valign=\"top\" style=\"font-family:helvetica,arial,sans-seif;font-size:12px;line-height:16px;color:#949fa3;text-align:left\">Copyright &copy; {{business_name}}, All rights reserved.<br><br><br></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n              <tr>\n              <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              <td width=\"569\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n            </tbody></table>\n     </td>\n  </tr>\n</tbody></table><div class=\"yj6qo\"></div><div class=\"adL\">\n\n</div></div>\n', '1', '2016-09-04 01:29:13', '2016-09-04 01:29:13'),
(9, 'Employee Ticket Reply', 'Reply to Ticket [TID-{{ticket_id}}]', '<div style=\"margin:0;padding:0\">\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#439cc8\">\n  <tbody><tr>\n    <td align=\"center\">\n            <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n              <tbody><tr>\n                <td height=\"95\" bgcolor=\"#439cc8\" style=\"background:#439cc8;text-align:left\">\n                <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                      <tbody><tr>\n                        <td width=\"672\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                      </tr>\n                      <tr>\n                        <td style=\"text-align:left\">\n                        <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\">\n                          <tbody><tr>\n                            <td width=\"37\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\">\n                            </td>\n                            <td width=\"523\" height=\"24\" style=\"text-align:left\">\n                            <div width=\"125\" height=\"23\" style=\"display:block;color:#ffffff;font-size:20px;font-family:Arial,Helvetica,sans-serif;max-width:557px;min-height:auto\">{{business_name}}</div>\n                            </td>\n                            <td width=\"44\" style=\"text-align:left\"></td>\n                            <td width=\"30\" style=\"text-align:left\"></td>\n                            <td width=\"38\" height=\"24\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n                          </tr>\n                        </tbody></table>\n                        </td>\n                      </tr>\n                      <tr><td width=\"672\" height=\"33\" style=\"font-size:33px;line-height:33px;height:33px;text-align:left\"></td></tr>\n                    </tbody></table>\n\n                </td>\n              </tr>\n            </tbody></table>\n     </td>\n    </tr>\n </tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#439cc8\"><tbody><tr><td height=\"5\" style=\"background:#439cc8;height:5px;font-size:5px;line-height:5px\"></td></tr></tbody></table>\n\n <table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#e9eff0\">\n  <tbody><tr>\n    <td align=\"center\">\n      <table cellspacing=\"0\" cellpadding=\"0\" width=\"671\" border=\"0\" bgcolor=\"#e9eff0\" style=\"background:#e9eff0\">\n        <tbody><tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n          <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"596\" border=\"0\" bgcolor=\"#ffffff\">\n            <tbody><tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n              <td width=\"556\" style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\" style=\"font-family:helvetica,arial,sans-seif;color:#666666;font-size:16px;line-height:22px\">\n                <tbody><tr>\n                  <td style=\"text-align:left\"></td>\n                </tr>\n                <tr>\n                  <td style=\"text-align:left\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"556\" border=\"0\">\n                    <tbody><tr><td style=\"font-family:helvetica,arial,sans-serif;font-size:30px;line-height:40px;font-weight:normal;color:#253c44;text-align:left\"></td></tr>\n                    <tr><td width=\"556\" height=\"20\" style=\"font-size:20px;line-height:20px;height:20px;text-align:left\"></td></tr>\n                    <tr>\n                      <td style=\"text-align:left\">\n                 Hi {{name}},<br>{{department_name}},<br>\n                 <br>\n                 This is a Support Ticket Reply From Cleint.\n            <br>\n                Ticket ID: {{ticket_id}}<br>\n                Ticket Subject: {{ticket_subject}}<br>\n                Message: {{message}}<br>\n                Replyed By: {{reply_by}}  <br><br>\n                Waiting for your quick response.\n            <br><br>\n            Thank you.\n            <br>\n            Regards,<br>\n            {{name}}<br>\n{{business_name}} Employee.\n            <br>\n          </td>\n                    </tr>\n                    <tr>\n                      <td width=\"556\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\">&nbsp;</td>\n                    </tr>\n                  </tbody></table></td>\n                </tr>\n              </tbody></table></td>\n              <td width=\"20\" height=\"26\" style=\"font-size:26px;line-height:26px;height:26px;text-align:left\"></td>\n            </tr>\n            <tr>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"556\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n              <td width=\"20\" height=\"2\" bgcolor=\"#d9dfe1\" style=\"background-color:#d9dfe1;font-size:2px;line-height:2px;height:2px;text-align:left\"></td>\n            </tr>\n          </tbody></table></td>\n          <td width=\"37\" height=\"40\" style=\"font-size:40px;line-height:40px;height:40px;text-align:left\"></td>\n        </tr>\n        <tr>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"596\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"37\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n        </tr>\n      </tbody></table>\n  </td></tr>\n</tbody>\n</table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#273f47\"><tbody><tr><td align=\"center\">&nbsp;</td></tr></tbody></table>\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#364a51\">\n  <tbody><tr>\n    <td align=\"center\">\n       <table cellspacing=\"0\" cellpadding=\"0\" width=\"672\" border=\"0\" bgcolor=\"#364a51\">\n              <tbody><tr>\n              <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"569\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n          <td width=\"38\" height=\"30\" style=\"font-size:30px;line-height:30px;height:30px;text-align:left\"></td>\n              </tr>\n              <tr>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\">\n                </td>\n                <td valign=\"top\" style=\"font-family:helvetica,arial,sans-seif;font-size:12px;line-height:16px;color:#949fa3;text-align:left\">Copyright &copy; {{business_name}}, All rights reserved.<br><br><br></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n              <tr>\n              <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              <td width=\"569\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n                <td width=\"38\" height=\"40\" style=\"font-size:40px;line-height:40px;text-align:left\"></td>\n              </tr>\n            </tbody></table>\n     </td>\n  </tr>\n</tbody></table><div class=\"yj6qo\"></div><div class=\"adL\">\n\n</div></div>\n', '1', '2016-09-04 01:29:13', '2016-09-04 01:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `sys_employee`
--

CREATE TABLE `sys_employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `role` enum('Admin','Employee') COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `dol` date DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre_address` text COLLATE utf8_unicode_ci,
  `per_address` text COLLATE utf8_unicode_ci,
  `avatar` text COLLATE utf8_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` enum('Monthly','Hourly') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Hourly',
  `basic_salary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `overtime_salary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `basic_salary_increment` decimal(10,2) NOT NULL DEFAULT '0.00',
  `overtime_salary_increment` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tax_id` int(11) NOT NULL,
  `working_hourly_rate` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `overtime_hourly_rate` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `working_hourly_increment_rate` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `overtime_hourly_increment_rate` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `passwordresetkey` text COLLATE utf8_unicode_ci,
  `remember_token` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_employee`
--

INSERT INTO `sys_employee` (`id`, `fname`, `lname`, `employee_code`, `designation`, `department`, `role`, `user_name`, `email`, `password`, `father_name`, `mother_name`, `dob`, `doj`, `dol`, `phone`, `phone2`, `pre_address`, `per_address`, `avatar`, `status`, `gender`, `payment_type`, `basic_salary`, `overtime_salary`, `basic_salary_increment`, `overtime_salary_increment`, `tax_id`, `working_hourly_rate`, `overtime_hourly_rate`, `working_hourly_increment_rate`, `overtime_hourly_increment_rate`, `passwordresetkey`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '管理员', '', '3839581079', 1, 1, 'Admin', 'admin', 'it@mw.life', '$2y$10$urt92/ZqNUJnxyj65hn1qu5MCP0AUjqPFGX9CTdIDa/7hu.cXW8mG', NULL, NULL, NULL, NULL, NULL, '+861067892022', NULL, NULL, NULL, 'logo.png', 'active', 'Male', 'Hourly', '0.00', '0.00', '0.00', '0.00', 1, '0', '0', '0', '0', NULL, 'DUv8eszgxbPaQJzvnXDavLWXA0Nrc49byGJmNgFMNKSiTr80doVVsqp5duMd', '2016-09-04 01:29:12', '2016-11-09 17:02:09'),
(2, '易斌', '', '001', 1, 1, 'Employee', 'yibin', 'yibin@mw.life', '$2y$10$P8xGP3NkOpScycYW/gCXC./RvJjGaBdpBuTyCmBtuJrR2cxrmlV5S', '', '', '1979-05-05', '2014-11-18', '0000-00-00', '', '', '', '', '3.jpg', 'active', 'Male', 'Monthly', '8000.00', '0.00', '228.00', '0.00', 1, '0', '0', '0', '0', NULL, '11NQ51Zt4og5Fd3jolOm3FtWy2BkONCOTwrurPs7PsGjTYNM0Ul0nNLTND0H', '2016-09-24 13:23:32', '2016-11-09 17:07:45'),
(3, '聂叶陈', '', '007', 5, 2, 'Employee', 'nieyechen', 'nieyechen@mw.life', '$2y$10$Ku.NTLmTCsq3r4mlfGAoHeMr2MPOlunDU5gNCIg7/ZWQHqDiV1Z0S', '', '', '2016-09-24', '2016-08-18', '0000-00-00', '', '', '', '', '7.jpg', 'active', 'Female', 'Monthly', '4800.00', '0.00', '4800.00', '0.00', 1, '0', '0', '0', '0', NULL, 'cWXJkfizDUkFnAKI7r5Ik4SdmiwLldgnBVLfqqC3odSmVPI337wUJDju4dKU', '2016-09-24 13:52:04', '2016-09-24 17:38:47'),
(4, '黄思园', '', '010', 5, 2, 'Employee', 'huangsiyuan', 'huangsiyuan@mw.life', '$2y$10$Tnx7wj9yfKY15u/jwT7a9umWNUj6udxPqdLEfv7MHu7wiB5DI54xu', '', '', '0000-00-00', '2016-08-26', '0000-00-00', '', '', '', '', '10.jpg', 'active', 'Female', 'Monthly', '4800.00', '0.00', '0.00', '0.00', 1, '0', '0', '0', '0', NULL, 'BrWcaz6xiMakeUBsfZC1hQIu6342IZt5a9AoXO9WfxT5avJStej7OkjH5Wji', '2016-09-24 15:23:32', '2016-10-08 03:17:02'),
(5, '测试管理员', '', '100', 4, 2, 'Admin', 'test', 'test@mw.life', '$2y$10$O3/S5N/dz0nUgKvwCo5X/.BVq96EkcyhhrA4hiyDicnhCynnsyDNC', '', '', '2016-09-26', '2016-09-26', '0000-00-00', '', '', '', '', NULL, 'active', 'Female', 'Hourly', '0.00', '0.00', '0.00', '0.00', 1, '0', '0', '0', '0', NULL, 'hPpCwVvD5RH4MbuQdsgmZ9kybG00MULd2AvI2csmFZlao7eiEP5Xh5glihYM', '2016-09-26 02:41:15', '2016-11-03 06:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `sys_employee_bank_accounts`
--

CREATE TABLE `sys_employee_bank_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `bank_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `account_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ifsc_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pan_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_employee_bank_accounts`
--

INSERT INTO `sys_employee_bank_accounts` (`id`, `emp_id`, `bank_name`, `branch_name`, `account_name`, `account_number`, `ifsc_code`, `pan_no`, `created_at`, `updated_at`) VALUES
(1, 3, '招商银行', '亦庄支行', '聂叶陈', '6214830160452271', '', '', '2016-09-24 14:23:50', '2016-09-24 14:23:50'),
(2, 2, '招商银行', '中关村支行', '易斌', '6225880100572297', '', '', '2016-09-25 02:06:35', '2016-09-25 02:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `sys_employee_files`
--

CREATE TABLE `sys_employee_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `file_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_expense`
--

CREATE TABLE `sys_expense` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_from` text COLLATE utf8_unicode_ci,
  `purchase_date` date NOT NULL,
  `purchase_by` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('Pending','Approved','Cancel') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `bill_copy` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_expense`
--

INSERT INTO `sys_expense` (`id`, `item_name`, `purchase_from`, `purchase_date`, `purchase_by`, `amount`, `status`, `bill_copy`, `created_at`, `updated_at`) VALUES
(1, '鼠标（测试）', '中关村', '2016-10-08', 4, '66.00', 'Pending', '', '2016-10-08 03:02:51', '2016-10-08 03:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `sys_expense_title`
--

CREATE TABLE `sys_expense_title` (
  `id` int(10) UNSIGNED NOT NULL,
  `expense` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_expense_title`
--

INSERT INTO `sys_expense_title` (`id`, `expense`, `created_at`, `updated_at`) VALUES
(1, '工资', '2016-09-24 15:45:27', '2016-09-24 15:45:27'),
(2, '奖金', '2016-09-24 15:45:32', '2016-09-24 15:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `sys_holiday`
--

CREATE TABLE `sys_holiday` (
  `id` int(10) UNSIGNED NOT NULL,
  `holiday` date NOT NULL,
  `occasion` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_holiday`
--

INSERT INTO `sys_holiday` (`id`, `holiday`, `occasion`, `created_at`, `updated_at`) VALUES
(1, '2016-10-01', '国庆节', '2016-09-24 15:25:30', '2016-09-24 15:25:30'),
(2, '2016-10-02', '国庆放假', '2016-09-24 15:26:43', '2016-09-24 15:26:43'),
(3, '2016-10-03', '国庆放假', '2016-09-24 15:27:23', '2016-09-24 15:27:23'),
(4, '2016-10-04', '国庆放假', '2016-09-24 15:27:39', '2016-09-24 15:27:39'),
(5, '2016-10-05', '国庆放假', '2016-09-24 15:28:05', '2016-09-24 15:28:05'),
(6, '2016-10-06', '国庆放假', '2016-09-24 15:28:15', '2016-09-24 15:28:15'),
(7, '2016-10-07', '国庆放假', '2016-09-24 15:28:24', '2016-09-24 15:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `sys_jobs`
--

CREATE TABLE `sys_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `no_position` int(11) NOT NULL,
  `job_type` enum('Contractual','Part Time','Full Time') COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` text COLLATE utf8_unicode_ci,
  `age` text COLLATE utf8_unicode_ci,
  `job_location` text COLLATE utf8_unicode_ci,
  `salary_range` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `post_date` date NOT NULL,
  `apply_date` date DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `status` enum('opening','closed','drafted') COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_jobs`
--

INSERT INTO `sys_jobs` (`id`, `position`, `no_position`, `job_type`, `experience`, `age`, `job_location`, `salary_range`, `short_description`, `post_date`, `apply_date`, `close_date`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Full Time', '5年', '大于20岁', '北京市', '5K到10K', 'Web前端工程师', '2016-09-24', '2016-09-30', '2016-10-28', 'opening', '<p>招募Web前端工程师。</p>', '2016-09-24 14:17:56', '2016-09-24 15:49:51'),
(2, 6, 2, 'Full Time', '5年以上', '22以上', '北京市', '5K到10K', '诚聘PHP工程师', '2016-09-24', '2016-09-30', '2016-11-25', 'opening', '<p>诚聘PHP工程师。<br></p>', '2016-09-24 15:51:23', '2016-09-24 15:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `sys_job_applicants`
--

CREATE TABLE `sys_job_applicants` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Unread','Rejected','Primary Selected','Call For Interview','Confirm') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unread',
  `resume` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_job_applicants`
--

INSERT INTO `sys_job_applicants` (`id`, `job_id`, `name`, `email`, `phone`, `status`, `resume`, `created_at`, `updated_at`) VALUES
(1, 2, '易斌', 'bruceyee@me.com', '15810601557', 'Primary Selected', '个人简历.pdf', '2016-09-24 15:54:57', '2016-09-24 15:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `sys_language`
--

CREATE TABLE `sys_language` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL,
  `icon` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_language`
--

INSERT INTO `sys_language` (`id`, `language`, `status`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'English', 'Active', 'us.gif', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(2, '中文', 'Active', 'china.jpg', '2016-09-24 10:41:19', '2016-09-24 10:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `sys_language_data`
--

CREATE TABLE `sys_language_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `lan_id` int(11) NOT NULL,
  `lan_data` text COLLATE utf8_unicode_ci NOT NULL,
  `lan_value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_language_data`
--

INSERT INTO `sys_language_data` (`id`, `lan_id`, `lan_data`, `lan_value`, `created_at`, `updated_at`) VALUES
(1, 1, 'Login', 'Login', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(2, 1, 'Forget Password', 'Forget Password', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(3, 1, 'Sign to your account', 'Sign to your account', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(4, 1, 'User Name', 'User Name', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(5, 1, 'Password', 'Password', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(6, 1, 'Remember Me', 'Remember Me', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(7, 1, 'Reset your password', 'Reset your password', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(8, 1, 'Email', 'Email', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(9, 1, 'Reset My Password', 'Reset My Password', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(10, 1, 'Back To Sign in', 'Back To Sign in', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(11, 1, 'Dashboard', 'Dashboard', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(12, 1, 'Departments', 'Departments', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(13, 1, 'Designations', 'Designations', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(14, 1, 'Employees', 'Employees', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(15, 1, 'All Employees', 'All Employees', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(16, 1, 'Add Employee', 'Add Employee', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(17, 1, 'Job Application', 'Job Application', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(18, 1, 'Attendance', 'Attendance', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(19, 1, 'Attendance Report', 'Attendance Report', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(20, 1, 'Update Attendance', 'Update Attendance', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(21, 1, 'Leave', 'Leave', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(22, 1, 'Holiday', 'Holiday', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(23, 1, 'Holiday Calender', 'Holiday Calender', '2016-09-04 01:29:14', '2016-09-04 01:29:14'),
(24, 1, 'Add New Holiday', 'Add New Holiday', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(25, 1, 'Award', 'Award', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(26, 1, 'Notice Board', 'Notice Board', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(27, 1, 'Expense', 'Expense', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(28, 1, 'Payroll', 'Payroll', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(29, 1, 'Employee Salary List', 'Employee Salary List', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(30, 1, 'Make Payment', 'Make Payment', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(31, 1, 'Generate Payslip', 'Generate Payslip', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(32, 1, 'Task', 'Task', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(33, 1, 'Support Tickets', 'Support Tickets', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(34, 1, 'All Support Tickets', 'All Support Tickets', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(35, 1, 'Create New Ticket', 'Create New Ticket', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(36, 1, 'Support Department', 'Support Department', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(37, 1, 'Settings', 'Settings', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(38, 1, 'System Settings', 'System Settings', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(39, 1, 'Localization', 'Localization', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(40, 1, 'Email Templates', 'Email Templates', '2016-09-04 01:29:15', '2016-09-04 01:29:15'),
(41, 1, 'Language Settings', 'Language Settings', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(42, 1, 'Recent 5 Leave Applications', 'Recent 5 Leave Applications', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(43, 1, 'See All Applications', 'See All Applications', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(44, 1, 'Recent 5 Pending Tasks', 'Recent 5 Pending Tasks', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(45, 1, 'See All Tasks', 'See All Tasks', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(46, 1, 'Recent 5 Pending Tickets', 'Recent 5 Pending Tickets', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(47, 1, 'See All Tickets', 'See All Tickets', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(48, 1, 'Update Profile', 'Update Profile', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(49, 1, 'Change Password', 'Change Password', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(50, 1, 'Logout', 'Logout', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(51, 1, 'Department', 'Department', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(52, 1, 'Add Department', 'Add Department', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(53, 1, 'Account Department', 'Account Department', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(54, 1, 'Add', 'Add', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(55, 1, 'All Departments', 'All Departments', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(56, 1, 'SL', 'SL', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(57, 1, 'Department Name', 'Department Name', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(58, 1, 'Actions', 'Actions', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(59, 1, 'Edit', 'Edit', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(60, 1, 'Delete', 'Delete', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(61, 1, 'Designations', 'Designations', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(62, 1, 'Add Designation', 'Add Designation', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(63, 1, 'Designation Name', 'Designation Name', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(64, 1, 'Software Engineer', 'Software Engineer', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(65, 1, 'All Designations', 'All Designations', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(66, 1, 'Designation', 'Designation', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(67, 1, 'Code', 'Code', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(68, 1, 'Name', 'Name', '2016-09-04 01:29:16', '2016-09-04 01:29:16'),
(69, 1, 'Username', 'Username', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(70, 1, 'Status', 'Status', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(71, 1, 'Active', 'Active', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(72, 1, 'Inactive', 'Inactive', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(73, 1, 'First Name', 'First Name', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(74, 1, 'Last Name', 'Last Name', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(75, 1, 'Employee Code', 'Employee Code', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(76, 1, 'Unique For every User', 'Unique For every User', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(77, 1, 'Confirm Password', 'Confirm Password', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(78, 1, 'Select Department', 'Select Department', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(79, 1, 'User Role', 'User Role', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(80, 1, 'Admin', 'Admin', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(81, 1, 'Employee', 'Employee', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(82, 1, 'View Profile', 'View Profile', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(83, 1, 'Phone', 'Phone', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(84, 1, 'Address', 'Address', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(85, 1, 'Personal Details', 'Personal Details', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(86, 1, 'Bank Info', 'Bank Info', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(87, 1, 'Document', 'Document', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(88, 1, 'Change Picture', 'Change Picture', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(89, 1, 'Leave blank if you no need to change password', 'Leave blank if you no need to change password', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(90, 1, 'Date Of Join', 'Date Of Join', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(91, 1, 'Date Of Leave', 'Date Of Leave', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(92, 1, 'Phone Number', 'Phone Number', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(93, 1, 'Alternative Phone', 'Alternative Phone', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(94, 1, 'Father Name', 'Father Name', '2016-09-04 01:29:17', '2016-09-04 01:29:17'),
(95, 1, 'Mother Name', 'Mother Name', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(96, 1, 'Date Of Birth', 'Date Of Birth', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(97, 1, 'Present Address', 'Present Address', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(98, 1, 'Permanent Address', 'Permanent Address', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(99, 1, 'Update', 'Update', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(100, 1, 'Add Bank Account', 'Add Bank Account', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(101, 1, 'Bank Name', 'Bank Name', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(102, 1, 'Branch Name', 'Branch Name', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(103, 1, 'Account Name', 'Account Name', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(104, 1, 'Account Number', 'Account Number', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(105, 1, 'IFSC Code', 'IFSC Code', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(106, 1, 'PAN Number', 'PAN Number', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(107, 1, 'All Bank Accounts', 'All Bank Accounts', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(108, 1, 'Branch', 'Branch', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(109, 1, 'Account No', 'Account No', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(110, 1, 'PAN No', 'PAN No', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(111, 1, 'Add Document', 'Add Document', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(112, 1, 'Document Name', 'Document Name', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(113, 1, 'Select Document', 'Select Document', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(114, 1, 'Browse', 'Browse', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(115, 1, 'All Documents', 'All Documents', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(116, 1, 'Download', 'Download', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(117, 1, 'Job Applications', 'Job Applications', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(118, 1, 'Add New Job', 'Add New Job', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(119, 1, 'Position', 'Position', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(120, 1, 'Posted Date', 'Posted Date', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(121, 1, 'Apply Last Date', 'Apply Last Date', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(122, 1, 'Close Date', 'Close Date', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(123, 1, 'Open', 'Open', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(124, 1, 'Drafted', 'Drafted', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(125, 1, 'Closed', 'Closed', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(126, 1, 'Applicants', 'Applicants', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(127, 1, 'Number Of Post', 'Number Of Post', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(128, 1, 'Post Date', 'Post Date', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(129, 1, 'Last Date To Apply', 'Last Date To Apply', '2016-09-04 01:29:18', '2016-09-04 01:29:18'),
(130, 1, 'Description', 'Description', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(131, 1, 'Close', 'Close', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(132, 1, 'Search Condition', 'Search Condition', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(133, 1, 'Date', 'Date', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(134, 1, 'Select Employee', 'Select Employee', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(135, 1, 'Select Designation', 'Select Designation', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(136, 1, 'Search', 'Search', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(137, 1, 'Employee Name', 'Employee Name', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(138, 1, 'Clock In', 'Clock In', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(139, 1, 'Clock Out', 'Clock Out', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(140, 1, 'Late', 'Late', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(141, 1, 'Early Leaving', 'Early Leaving', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(142, 1, 'Overtime', 'Overtime', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(143, 1, 'Total Work', 'Total Work', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(144, 1, 'Absent', 'Absent', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(145, 1, 'Present', 'Present', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(146, 1, 'Set Overtime', 'Set Overtime', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(147, 1, 'Leave Application', 'Leave Application', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(148, 1, 'Leave Type', 'Leave Type', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(149, 1, 'Leave From', 'Leave From', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(150, 1, 'Leave To', 'Leave To', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(151, 1, 'Approved', 'Approved', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(152, 1, 'Pending', 'Pending', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(153, 1, 'Rejected', 'Rejected', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(154, 1, 'View', 'View', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(155, 1, 'View Application', 'View Application', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(156, 1, 'Applied On', 'Applied On', '2016-09-04 01:29:19', '2016-09-04 01:29:19'),
(157, 1, 'Leave Reason', 'Leave Reason', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(158, 1, 'Current Status', 'Current Status', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(159, 1, 'Change Status', 'Change Status', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(160, 1, 'Remark', 'Remark', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(161, 1, 'Update', 'Update', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(162, 1, 'Prev', 'Prev', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(163, 1, 'This Month', 'This Month', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(164, 1, 'Next', 'Next', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(165, 1, 'Occasion Name', 'Occasion Name', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(166, 1, 'Occasion', 'Occasion', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(167, 1, 'Award List', 'Award List', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(168, 1, 'Add New Award', 'Add New Award', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(169, 1, 'Award Name', 'Award Name', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(170, 1, 'Gift', 'Gift', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(171, 1, 'Month', 'Month', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(172, 1, 'Gift Item', 'Gift Item', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(173, 1, 'Cash Price', 'Cash Price', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(174, 1, 'January', 'January', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(175, 1, 'February', 'February', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(176, 1, 'March', 'March', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(177, 1, 'April', 'April', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(178, 1, 'May', 'May', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(179, 1, 'June', 'June', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(180, 1, 'July', 'July', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(181, 1, 'August', 'August', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(182, 1, 'September', 'September', '2016-09-04 01:29:20', '2016-09-04 01:29:20'),
(183, 1, 'October', 'October', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(184, 1, 'November', 'November', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(185, 1, 'December', 'December', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(186, 1, 'Year', 'Year', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(187, 1, 'Edit Award', 'Edit Award', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(188, 1, 'Add New Notice', 'Add New Notice', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(189, 1, 'Title', 'Title', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(190, 1, 'Published', 'Published', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(191, 1, 'Unpublished', 'Unpublished', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(192, 1, 'Notice Title', 'Notice Title', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(193, 1, 'Notice Status', 'Notice Status', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(194, 1, 'Edit Notice', 'Edit Notice', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(195, 1, 'Expense List', 'Expense List', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(196, 1, 'Add New Expense', 'Add New Expense', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(197, 1, 'Item Name', 'Item Name', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(198, 1, 'Purchase From', 'Purchase From', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(199, 1, 'Purchase Date', 'Purchase Date', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(200, 1, 'Amount', 'Amount', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(201, 1, 'Cancel', 'Cancel', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(202, 1, 'Bill Copy', 'Bill Copy', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(203, 1, 'Purchase By', 'Purchase By', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(204, 1, 'Edit Expense', 'Edit Expense', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(205, 1, 'Working Hourly Rate', 'Working Hourly Rate', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(206, 1, 'Overtime Hourly Rate', 'Overtime Hourly Rate', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(207, 1, 'Edit Employee Salary', 'Edit Employee Salary', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(208, 1, 'Hourly Working Rate', 'Hourly Working Rate', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(209, 1, 'Hourly Overtime Rate', 'Hourly Overtime Rate', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(210, 1, 'Payment Amount', 'Payment Amount', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(211, 1, 'Details', 'Details', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(212, 1, 'Pay Payment', 'Pay Payment', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(213, 1, 'Payment For', 'Payment For', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(214, 1, 'Net Salary', 'Net Salary', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(215, 1, 'Overtime Salary', 'Overtime Salary', '2016-09-04 01:29:21', '2016-09-04 01:29:21'),
(216, 1, 'Payment Type', 'Payment Type', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(217, 1, 'Cash Payment', 'Cash Payment', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(218, 1, 'Bank Payment', 'Bank Payment', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(219, 1, 'Cheque Payment', 'Cheque Payment', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(220, 1, 'Pay', 'Pay', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(221, 1, 'All Payments', 'All Payments', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(222, 1, 'Payment Month', 'Payment Month', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(223, 1, 'Payment Date', 'Payment Date', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(224, 1, 'Paid Amount', 'Paid Amount', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(225, 1, 'Payslip', 'Payslip', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(226, 1, 'Task List', 'Task List', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(227, 1, 'Add New Task', 'Add New Task', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(228, 1, 'Created Date', 'Created Date', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(229, 1, 'Due Date', 'Due Date', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(230, 1, 'Completed', 'Completed', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(231, 1, 'Started', 'Started', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(232, 1, 'Task Title', 'Task Title', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(233, 1, 'Assign To', 'Assign To', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(234, 1, 'Start Date', 'Start Date', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(235, 1, 'Estimated Hour', 'Estimated Hour', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(236, 1, 'Progress', 'Progress', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(237, 1, 'Edit Task', 'Edit Task', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(238, 1, 'Manage Task', 'Manage Task', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(239, 1, 'Task Basic Info', 'Task Basic Info', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(240, 1, 'Task Management', 'Task Management', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(241, 1, 'Task Details', 'Task Details', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(242, 1, 'Task Discussion', 'Task Discussion', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(243, 1, 'Task Files', 'Task Files', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(244, 1, 'Task Description', 'Task Description', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(245, 1, 'Task Members', 'Task Members', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(246, 1, 'Leave Comment', 'Leave Comment', '2016-09-04 01:29:22', '2016-09-04 01:29:22'),
(247, 1, 'Reply', 'Reply', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(248, 1, 'Member', 'Member', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(249, 1, 'Comment', 'Comment', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(250, 1, 'Last Update', 'Last Update', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(251, 1, 'File Title', 'File Title', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(252, 1, 'Files', 'Files', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(253, 1, 'Upload', 'Upload', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(254, 1, 'Size', 'Size', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(255, 1, 'Upload By', 'Upload By', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(256, 1, 'Select File', 'Select File', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(257, 1, 'Subject', 'Subject', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(258, 1, 'Answered', 'Answered', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(259, 1, 'Customer Reply', 'Customer Reply', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(260, 1, 'Department Email', 'Department Email', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(261, 1, 'Show in Client', 'Show in Client', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(262, 1, 'Yes', 'Yes', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(263, 1, 'No', 'No', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(264, 1, 'Add New', 'Add New', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(265, 1, 'Manage', 'Manage', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(266, 1, 'View Department', 'View Department', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(267, 1, 'Ticket For Client', 'Ticket For Client', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(268, 1, 'Message', 'Message', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(269, 1, 'Create Ticket', 'Create Ticket', '2016-09-04 01:29:23', '2016-09-04 01:29:23'),
(270, 1, 'Manage Support Ticket', 'Manage Support Ticket', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(271, 1, 'Change Basic Info', 'Change Basic Info', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(272, 1, 'Change Department', 'Change Department', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(273, 1, 'Ticket Management', 'Ticket Management', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(274, 1, 'Ticket Details', 'Ticket Details', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(275, 1, 'Ticket Discussion', 'Ticket Discussion', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(276, 1, 'Ticket Files', 'Ticket Files', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(277, 1, 'Ticket For', 'Ticket For', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(278, 1, 'Created By', 'Created By', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(279, 1, 'Closed By', 'Closed By', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(280, 1, 'Reply Ticket', 'Reply Ticket', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(281, 1, 'General', 'General', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(282, 1, 'Office Time', 'Office Time', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(283, 1, 'Job', 'Job', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(284, 1, 'Application Name', 'Application Name', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(285, 1, 'Application Title', 'Application Title', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(286, 1, 'System Email', 'System Email', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(287, 1, 'Remember: All Email Going to the Receiver from this Email', 'Remember: All Email Going to the Receiver from this Email', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(288, 1, 'Footer Text', 'Footer Text', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(289, 1, 'Application Logo', 'Application Logo', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(290, 1, 'Application Favicon', 'Application Favicon', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(291, 1, 'Email Gateway', 'Email Gateway', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(292, 1, 'SMTP Host Name', 'SMTP Host Name', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(293, 1, 'SMTP User Name', 'SMTP User Name', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(294, 1, 'SMTP Password', 'SMTP Password', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(295, 1, 'SMTP Port', 'SMTP Port', '2016-09-04 01:29:24', '2016-09-04 01:29:24'),
(296, 1, 'SMTP Secure', 'SMTP Secure', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(297, 1, 'Office In Time', 'Office In Time', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(298, 1, 'Office Out Time', 'Office Out Time', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(299, 1, 'Add New Expense Title', 'Add New Expense Title', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(300, 1, 'Expense Title', 'Expense Title', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(301, 1, 'Employee Salary', 'Employee Salary', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(302, 1, 'Expense Title List', 'Expense Title List', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(303, 1, 'Leave Title', 'Leave Title', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(304, 1, 'Sick Leave', 'Sick Leave', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(305, 1, 'Leave Quota', 'Leave Quota', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(306, 1, 'Leave Title List', 'Leave Title List', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(307, 1, 'Best Employee', 'Best Employee', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(308, 1, 'Job File Extension', 'Job File Extension', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(309, 1, 'Supported File Extension', 'Supported File Extension', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(310, 1, 'Remember: File Extension Separated By Comma', 'Remember: File Extension Separated By Comma', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(311, 1, 'Award Name List', 'Award Name List', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(312, 1, 'Save', 'Save', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(313, 1, 'Default Country', 'Default Country', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(314, 1, 'Date Format', 'Date Format', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(315, 1, 'Default Language', 'Default Language', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(316, 1, 'Current Code', 'Current Code', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(317, 1, 'Current Symbol', 'Current Symbol', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(318, 1, 'Email Templates', 'Email Templates', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(319, 1, 'Template Name', 'Template Name', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(320, 1, 'Manage Email Template', 'Manage Email Template', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(321, 1, 'Language', 'Language', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(322, 1, 'Add Language', 'Add Language', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(323, 1, 'Language Name', 'Language Name', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(324, 1, 'Flag', 'Flag', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(325, 1, 'All Languages', 'All Languages', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(326, 1, 'Translate', 'Translate', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(327, 1, 'To', 'To', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(328, 1, 'Current Password', 'Current Password', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(329, 1, 'New Password', 'New Password', '2016-09-04 01:29:25', '2016-09-04 01:29:25'),
(330, 1, 'All Leave Details', 'All Leave Details', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(331, 1, 'Total Leave', 'Total Leave', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(332, 1, 'New Leave', 'New Leave', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(333, 1, 'Request For New Leave', 'Request For New Leave', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(334, 1, 'Send', 'Send', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(335, 1, 'Published Date', 'Published Date', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(336, 1, 'Payment History', 'Payment History', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(337, 1, 'Payment Salary Details', 'Payment Salary Details', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(338, 1, 'Print Payslip', 'Print Payslip', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(339, 1, 'Salary Month', 'Salary Month', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(340, 1, 'Employee ID', 'Employee ID', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(341, 1, 'Payslip NO', 'Payslip NO', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(342, 1, 'Joining Date', 'Joining Date', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(343, 1, 'Payment By', 'Payment By', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(344, 1, 'Payment Details', 'Payment Details', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(345, 1, 'Earning', 'Earning', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(346, 1, 'Grand Total', 'Grand Total', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(347, 1, 'Overtime Amount', 'Overtime Amount', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(348, 1, 'Job Type', 'Job Type', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(349, 1, 'Contractual', 'Contractual', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(350, 1, 'Part Time', 'Part Time', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(351, 1, 'Full Time', 'Full Time', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(352, 1, 'Experience', 'Experience', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(353, 1, 'Age', 'Age', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(354, 1, 'Job Location', 'Job Location', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(355, 1, 'Salary Range', 'Salary Range', '2016-09-04 01:29:26', '2016-09-04 01:29:26'),
(356, 1, 'Short Description', 'Short Description', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(357, 1, 'Edit Job', 'Edit Job', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(358, 1, 'All Jobs', 'All Jobs', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(359, 1, 'Home', 'Home', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(360, 1, 'Jobs', 'Jobs', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(361, 1, 'Deadline', 'Deadline', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(362, 1, 'Job Summary', 'Job Summary', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(363, 1, 'Published on', 'Published on', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(364, 1, 'Application Deadline', 'Application Deadline', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(365, 1, 'Apply Now', 'Apply Now', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(366, 1, 'Apply For', 'Apply For', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(367, 1, 'Upload Resume', 'Upload Resume', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(368, 1, 'Apply', 'Apply', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(369, 1, 'Language Manage', 'Language Manage', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(370, 1, 'View All', 'View All', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(371, 1, 'Expense Request', 'Expense Request', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(372, 1, 'Recent', 'Recent', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(373, 1, 'Tasks', 'Tasks', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(374, 1, 'Timezone', 'Timezone', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(375, 1, 'Today is', 'Today is', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(376, 1, 'Time', 'Time', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(377, 1, 'Notice', 'Notice', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(378, 1, 'Total', 'Total', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(379, 1, 'Subtotal', 'Subtotal', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(380, 1, 'TAX', 'TAX', '2016-09-04 01:29:27', '2016-09-04 01:29:27'),
(381, 1, 'Edit Department', 'Edit Department', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(382, 1, 'Job Applicants', 'Job Applicants', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(383, 1, 'Unread', 'Unread', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(384, 1, 'Primary Selected', 'Primary Selected', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(385, 1, 'Call For Interview', 'Call For Interview', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(386, 1, 'Confirm', 'Confirm', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(387, 1, 'Rejected', 'Rejected', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(388, 1, 'Resume', 'Resume', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(389, 1, 'Status', 'Status', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(390, 1, 'View Holiday', 'View Holiday', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(391, 1, 'Tax Rules', 'Tax Rules', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(392, 1, 'Add Tax Rule', 'Add Tax Rule', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(393, 1, 'Tax Rule Name', 'Tax Rule Name', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(394, 1, 'Set Rules', 'Set Rules', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(395, 1, 'Save Values', 'Save Values', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(396, 1, 'Salary From', 'Salary From', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(397, 1, 'Salary To', 'Salary To', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(398, 1, 'Tax Percentage', 'Tax Percentage', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(399, 1, 'Additional Tax Amount', 'Additional Tax Amount', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(400, 1, 'Gender', 'Gender', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(401, 1, 'Both', 'Both', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(402, 1, 'Male', 'Male', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(403, 1, 'Female', 'Female', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(404, 1, 'Remove', 'Remove', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(405, 1, 'Add More', 'Add More', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(406, 1, 'Provident Fund', 'Provident Fund', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(407, 1, 'Provident Fund Type', 'Provident Fund Type', '2016-09-04 01:29:28', '2016-09-04 01:29:28'),
(408, 1, 'Employee Share', 'Employee Share', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(409, 1, 'Organization Share', 'Organization Share', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(410, 1, 'Paid', 'Paid', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(411, 1, 'Unpaid', 'Unpaid', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(412, 1, 'Loan', 'Loan', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(413, 1, 'Repayment Start Date', 'Repayment Start Date', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(414, 1, 'Remaining Amount', 'Remaining Amount', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(415, 1, 'Ongoing', 'Ongoing', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(416, 1, 'Include Loan Amount in Payslip', 'Include Loan Amount in Payslip', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(417, 1, 'Monthly Repayment Amount', 'Monthly Repayment Amount', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(418, 1, 'Employee Salary Increment', 'Employee Salary Increment', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(419, 1, 'SMS Gateways', 'SMS Gateways', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(420, 1, 'Gateway Name', 'Gateway Name', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(421, 1, 'API Link', 'API Link', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(422, 1, 'Tax Template', 'Tax Template', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(423, 1, 'Salary Type', 'Salary Type', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(424, 1, 'Monthly', 'Monthly', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(425, 1, 'Hourly', 'Hourly', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(426, 1, 'Basic Salary', 'Basic Salary', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(427, 1, 'Overtime Salary', 'Overtime Salary', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(428, 1, 'Reports', 'Reports', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(429, 1, 'Employee Payroll Summery', 'Employee Payroll Summery', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(430, 1, 'No working hour', 'No working hour', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(431, 1, 'Add with basic salary', 'Add with basic salary', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(432, 1, 'Salary Statement', 'Salary Statement', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(433, 1, 'Date From', 'Date From', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(434, 1, 'Date To', 'Date To', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(435, 1, 'Find', 'Find', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(436, 1, 'Send Email', 'Send Email', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(437, 1, 'Send SMS', 'Send SMS', '2016-09-04 01:29:29', '2016-09-04 01:29:29'),
(438, 1, 'For', 'For', '2016-09-04 01:29:30', '2016-09-04 01:29:30'),
(439, 1, 'Employee Summery', 'Employee Summery', '2016-09-04 01:29:30', '2016-09-04 01:29:30'),
(440, 1, 'Set Working Rate', 'Set Working Rate', '2016-09-04 01:29:30', '2016-09-04 01:29:30'),
(22696, 1, 'Department Added Successfully', 'Department Updated Successfully', NULL, NULL),
(22697, 1, 'Fixed Amount', 'Fixed Amount', NULL, NULL),
(22698, 1, 'Percentage of Basic Salary', 'Percentage of Basic Salary', NULL, NULL),
(25464, 2, 'Login', '登录', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25465, 2, 'Forget Password', '忘记密码', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25466, 2, 'Sign to your account', '登录到您的账户', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25467, 2, 'User Name', '用户名', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25468, 2, 'Password', '密码', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25469, 2, 'Remember Me', '记住我', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25470, 2, 'Reset your password', '重置您的密码', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25471, 2, 'Email', '邮件', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25472, 2, 'Reset My Password', '重置我的密码', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25473, 2, 'Back To Sign in', '回到登录页', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25474, 2, 'Dashboard', '概览', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25475, 2, 'Departments', '部门', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25476, 2, 'Designations', '任职', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25477, 2, 'Employees', '员工', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25478, 2, 'All Employees', '所有员工', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25479, 2, 'Add Employee', '增加员工', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25480, 2, 'Job Application', '招聘', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25481, 2, 'Attendance', '出勤', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25482, 2, 'Attendance Report', '出勤报表', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25483, 2, 'Update Attendance', '更新出勤', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25484, 2, 'Leave', '请假', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25485, 2, 'Holiday', '节日', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25486, 2, 'Holiday Calender', '节日日历', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25487, 2, 'Add New Holiday', '新增节日', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25488, 2, 'Award', '奖励', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25489, 2, 'Notice Board', '公告板', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25490, 2, 'Expense', '费用', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25491, 2, 'Payroll', '工资', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25492, 2, 'Employee Salary List', '工资列表', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25493, 2, 'Make Payment', '付款', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25494, 2, 'Generate Payslip', '生成工资单', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25495, 2, 'Task', '任务', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25496, 2, 'Support Tickets', '工单', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25497, 2, 'All Support Tickets', '所有工单', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25498, 2, 'Create New Ticket', '新建工单', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25499, 2, 'Support Department', '客户服务', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25500, 2, 'Settings', '设置', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25501, 2, 'System Settings', '系统设置', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25502, 2, 'Localization', '地区设置', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25503, 2, 'Email Templates', '邮件模板', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25504, 2, 'Language Settings', '语言设置', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25505, 2, 'Recent 5 Leave Applications', '最近5个请假申请', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25506, 2, 'See All Applications', '所有申请', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25507, 2, 'Recent 5 Pending Tasks', '最近5个待完成的任务', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25508, 2, 'See All Tasks', '所有任务', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25509, 2, 'Recent 5 Pending Tickets', '最近5个工单', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25510, 2, 'See All Tickets', '所有工单', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25511, 2, 'Update Profile', '更新个人简介', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25512, 2, 'Change Password', '修改密码', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25513, 2, 'Logout', '注销', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25514, 2, 'Department', '部门', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25515, 2, 'Add Department', '增加部门', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25516, 2, 'Account Department', '财务部', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25517, 2, 'Add', '增加', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25518, 2, 'All Departments', '所有部门', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25519, 2, 'SL', 'SL', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25520, 2, 'Department Name', '部门名称', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25521, 2, 'Actions', '操作', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25522, 2, 'Edit', '编辑', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25523, 2, 'Delete', '删除', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25524, 2, 'Add Designation', '新增任职', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25525, 2, 'Designation Name', '职位名称', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25526, 2, 'Software Engineer', '软件工程师', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25527, 2, 'All Designations', '所有任职', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25528, 2, 'Designation', '任职', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25529, 2, 'Code', '工号', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25530, 2, 'Name', '姓名', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25531, 2, 'Username', '用户名', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25532, 2, 'Status', '状态', '2016-10-12 09:15:56', '2016-10-12 09:15:56'),
(25533, 2, 'Active', '已激活', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25534, 2, 'Inactive', '未激活', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25535, 2, 'First Name', '名字', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25536, 2, 'Last Name', '姓氏', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25537, 2, 'Employee Code', '工号', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25538, 2, 'Unique For every User', '每个用户唯一', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25539, 2, 'Confirm Password', '确认密码', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25540, 2, 'Select Department', '选择部门', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25541, 2, 'User Role', '用户角色', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25542, 2, 'Admin', '管理', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25543, 2, 'Employee', '员工', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25544, 2, 'View Profile', '查看简介', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25545, 2, 'Phone', '电话', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25546, 2, 'Address', '地址', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25547, 2, 'Personal Details', '个人详情', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25548, 2, 'Bank Info', '银行信息', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25549, 2, 'Document', '文档', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25550, 2, 'Change Picture', '修改头像', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25551, 2, 'Leave blank if you no need to change password', '如果您不需要修改密码请留空', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25552, 2, 'Date Of Join', '入职日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25553, 2, 'Date Of Leave', '请假日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25554, 2, 'Phone Number', '电话号码', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25555, 2, 'Alternative Phone', '其他电话', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25556, 2, 'Father Name', '父亲姓名', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25557, 2, 'Mother Name', '母亲姓名', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25558, 2, 'Date Of Birth', '生日', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25559, 2, 'Present Address', '当前地址', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25560, 2, 'Permanent Address', '固定地址', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25561, 2, 'Update', '更新', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25562, 2, 'Add Bank Account', '新增银行账号', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25563, 2, 'Bank Name', '银行名称', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25564, 2, 'Branch Name', '分行名称', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25565, 2, 'Account Name', '户名', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25566, 2, 'Account Number', '账号', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25567, 2, 'IFSC Code', 'IFSC代码', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25568, 2, 'PAN Number', 'PAN号码', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25569, 2, 'All Bank Accounts', '所有银行账号', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25570, 2, 'Branch', '分行', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25571, 2, 'Account No', '账号', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25572, 2, 'PAN No', 'PAN号码', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25573, 2, 'Add Document', '新增文档', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25574, 2, 'Document Name', '文档名称', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25575, 2, 'Select Document', '选择文档', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25576, 2, 'Browse', '浏览', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25577, 2, 'All Documents', '所有文档', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25578, 2, 'Download', '下载', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25579, 2, 'Job Applications', '招聘', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25580, 2, 'Add New Job', '新增职位', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25581, 2, 'Position', '职位', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25582, 2, 'Posted Date', '发布日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25583, 2, 'Apply Last Date', '最后申请日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25584, 2, 'Close Date', '关闭日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25585, 2, 'Open', '有效', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25586, 2, 'Drafted', '草稿', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25587, 2, 'Closed', '已关闭', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25588, 2, 'Applicants', '求职者', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25589, 2, 'Number Of Post', '发布号', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25590, 2, 'Post Date', '发布日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25591, 2, 'Last Date To Apply', '最后申请日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25592, 2, 'Description', '描述', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25593, 2, 'Close', '关闭', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25594, 2, 'Search Condition', '搜索条件', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25595, 2, 'Date', '日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25596, 2, 'Select Employee', '选择员工', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25597, 2, 'Select Designation', '选择任职', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25598, 2, 'Search', '搜索', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25599, 2, 'Employee Name', '员工姓名', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25600, 2, 'Clock In', '打卡上班', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25601, 2, 'Clock Out', '打卡下班', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25602, 2, 'Late', '迟到', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25603, 2, 'Early Leaving', '早退', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25604, 2, 'Overtime', '加班', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25605, 2, 'Total Work', '总工时', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25606, 2, 'Absent', '缺勤', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25607, 2, 'Present', '出勤', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25608, 2, 'Set Overtime', '设置加班', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25609, 2, 'Leave Application', '请假申请', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25610, 2, 'Leave Type', '请假类型', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25611, 2, 'Leave From', '从', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25612, 2, 'Leave To', '到', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25613, 2, 'Approved', '已批准', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25614, 2, 'Pending', '待审核', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25615, 2, 'Rejected', '拒绝', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25616, 2, 'View', '查看', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25617, 2, 'View Application', '查看申请', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25618, 2, 'Applied On', '申请日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25619, 2, 'Leave Reason', '请假原因', '2016-10-12 09:15:57', '2016-10-12 09:15:57');
INSERT INTO `sys_language_data` (`id`, `lan_id`, `lan_data`, `lan_value`, `created_at`, `updated_at`) VALUES
(25620, 2, 'Current Status', '当前状态', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25621, 2, 'Change Status', '变更状态', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25622, 2, 'Remark', '评论', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25623, 2, 'Prev', '前一页', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25624, 2, 'This Month', '本月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25625, 2, 'Next', '下一页', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25626, 2, 'Occasion Name', '节日名称', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25627, 2, 'Occasion', '节日', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25628, 2, 'Award List', '奖励列表', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25629, 2, 'Add New Award', '新增奖励', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25630, 2, 'Award Name', '奖励名称', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25631, 2, 'Gift', '礼物', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25632, 2, 'Month', '月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25633, 2, 'Gift Item', '礼物', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25634, 2, 'Cash Price', '价值', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25635, 2, 'January', '一月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25636, 2, 'February', '二月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25637, 2, 'March', '三月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25638, 2, 'April', '四月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25639, 2, 'May', '五月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25640, 2, 'June', '六月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25641, 2, 'July', '七月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25642, 2, 'August', '八月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25643, 2, 'September', '九月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25644, 2, 'October', '十月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25645, 2, 'November', '十一月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25646, 2, 'December', '十二月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25647, 2, 'Year', '年', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25648, 2, 'Edit Award', '编辑奖励', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25649, 2, 'Add New Notice', '新增公告', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25650, 2, 'Title', '标题', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25651, 2, 'Published', '已发布', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25652, 2, 'Unpublished', '未发布', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25653, 2, 'Notice Title', '通知标题', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25654, 2, 'Notice Status', '通知状态', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25655, 2, 'Edit Notice', '编辑通知', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25656, 2, 'Expense List', '费用列表', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25657, 2, 'Add New Expense', '新增费用', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25658, 2, 'Item Name', '名称', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25659, 2, 'Purchase From', '购买地', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25660, 2, 'Purchase Date', '购买日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25661, 2, 'Amount', '金额', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25662, 2, 'Cancel', '取消', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25663, 2, 'Bill Copy', '账单', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25664, 2, 'Purchase By', '购买人', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25665, 2, 'Edit Expense', '编辑费用', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25666, 2, 'Working Hourly Rate', '出勤率', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25667, 2, 'Overtime Hourly Rate', '加班率', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25668, 2, 'Edit Employee Salary', '编辑工资', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25669, 2, 'Hourly Working Rate', '出勤率', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25670, 2, 'Hourly Overtime Rate', '加班率', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25671, 2, 'Payment Amount', '付款金额', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25672, 2, 'Details', '详情', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25673, 2, 'Pay Payment', '付款', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25674, 2, 'Payment For', '付款', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25675, 2, 'Net Salary', '基本工资', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25676, 2, 'Overtime Salary', '加班工资', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25677, 2, 'Payment Type', '支付类型', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25678, 2, 'Cash Payment', '现金支付', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25679, 2, 'Bank Payment', '银行转账', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25680, 2, 'Cheque Payment', '支票支付', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25681, 2, 'Pay', '付款', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25682, 2, 'All Payments', '所有付款', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25683, 2, 'Payment Month', '付款月份', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25684, 2, 'Payment Date', '付款日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25685, 2, 'Paid Amount', '付款金额', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25686, 2, 'Payslip', '工资单', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25687, 2, 'Task List', '任务列表', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25688, 2, 'Add New Task', '新增任务', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25689, 2, 'Created Date', '创建日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25690, 2, 'Due Date', '结束日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25691, 2, 'Completed', '完成', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25692, 2, 'Started', '开始', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25693, 2, 'Task Title', '任务标题', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25694, 2, 'Assign To', '分配给', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25695, 2, 'Start Date', '开始日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25696, 2, 'Estimated Hour', '预计工时', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25697, 2, 'Progress', '进度', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25698, 2, 'Edit Task', '编辑任务', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25699, 2, 'Manage Task', '管理任务', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25700, 2, 'Task Basic Info', '任务基本信息', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25701, 2, 'Task Management', '任务管理', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25702, 2, 'Task Details', '任务详情', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25703, 2, 'Task Discussion', '任务讨论', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25704, 2, 'Task Files', '任务文件', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25705, 2, 'Task Description', '任务描述', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25706, 2, 'Task Members', '任务成员', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25707, 2, 'Leave Comment', '评论', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25708, 2, 'Reply', '回复', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25709, 2, 'Member', '成员', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25710, 2, 'Comment', '评论', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25711, 2, 'Last Update', '最后更新', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25712, 2, 'File Title', '文件标题', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25713, 2, 'Files', '文件', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25714, 2, 'Upload', '上传', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25715, 2, 'Size', '大小', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25716, 2, 'Upload By', '上传人', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25717, 2, 'Select File', '选择文件', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25718, 2, 'Subject', '标题', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25719, 2, 'Answered', '已答复', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25720, 2, 'Customer Reply', '客户回复', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25721, 2, 'Department Email', '部门邮件', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25722, 2, 'Show in Client', '显示给客户', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25723, 2, 'Yes', '是', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25724, 2, 'No', '否', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25725, 2, 'Add New', '新增', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25726, 2, 'Manage', '管理', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25727, 2, 'View Department', '查看部门', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25728, 2, 'Ticket For Client', '客户工单', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25729, 2, 'Message', '信息', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25730, 2, 'Create Ticket', '创建工单', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25731, 2, 'Manage Support Ticket', '管理支持工单', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25732, 2, 'Change Basic Info', '修改基本信息', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25733, 2, 'Change Department', '修改部门', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25734, 2, 'Ticket Management', '工单管理', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25735, 2, 'Ticket Details', '工单详情', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25736, 2, 'Ticket Discussion', '工单讨论', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25737, 2, 'Ticket Files', '工单文件', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25738, 2, 'Ticket For', '工单', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25739, 2, 'Created By', '创建者', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25740, 2, 'Closed By', '关闭者', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25741, 2, 'Reply Ticket', '回复工单', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25742, 2, 'General', '通用', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25743, 2, 'Office Time', '办公时间', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25744, 2, 'Job', '职位', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25745, 2, 'Application Name', '应用名称', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25746, 2, 'Application Title', '应用标题', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25747, 2, 'System Email', '系统邮件', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25748, 2, 'Remember: All Email Going to the Receiver from this Email', '注意: 所有邮件都会从这个邮件地址接收', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25749, 2, 'Footer Text', '页脚', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25750, 2, 'Application Logo', '应用LOGO', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25751, 2, 'Application Favicon', '应用Favicon', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25752, 2, 'Email Gateway', '邮件网关', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25753, 2, 'SMTP Host Name', 'SMTP主机名', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25754, 2, 'SMTP User Name', 'SMTP用户名', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25755, 2, 'SMTP Password', 'SMT密码', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25756, 2, 'SMTP Port', 'SMTP端口', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25757, 2, 'SMTP Secure', 'SMTP加密', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25758, 2, 'Office In Time', '上班时间', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25759, 2, 'Office Out Time', '下班时间', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25760, 2, 'Add New Expense Title', '新增费用标题', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25761, 2, 'Expense Title', '费用标题', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25762, 2, 'Employee Salary', '工资', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25763, 2, 'Expense Title List', '费用标题列表', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25764, 2, 'Leave Title', '请假标题', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25765, 2, 'Sick Leave', '病假', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25766, 2, 'Leave Quota', '请假限额', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25767, 2, 'Leave Title List', '请假标题列表', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25768, 2, 'Best Employee', '最佳员工', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25769, 2, 'Job File Extension', '职位文件扩展名', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25770, 2, 'Supported File Extension', '支持文件扩展名', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25771, 2, 'Remember: File Extension Separated By Comma', '注意: 文件扩展名用逗号分隔', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25772, 2, 'Award Name List', '奖励名称列表', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25773, 2, 'Save', '保存', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25774, 2, 'Default Country', '默认国家', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25775, 2, 'Date Format', '日期格式', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25776, 2, 'Default Language', '默认语言', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25777, 2, 'Current Code', '货币代码', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25778, 2, 'Current Symbol', '货币符号', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25779, 2, 'Template Name', '模板名称', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25780, 2, 'Manage Email Template', '管理邮件模板', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25781, 2, 'Language', '语言', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25782, 2, 'Add Language', '新增语言', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25783, 2, 'Language Name', '语言名称', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25784, 2, 'Flag', '国旗', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25785, 2, 'All Languages', '所有语言', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25786, 2, 'Translate', '翻译', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25787, 2, 'To', '到', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25788, 2, 'Current Password', '当前密码', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25789, 2, 'New Password', '新密码', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25790, 2, 'All Leave Details', '可请假列表', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25791, 2, 'Total Leave', '可请假总计', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25792, 2, 'New Leave', '请假', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25793, 2, 'Request For New Leave', '申请请假', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25794, 2, 'Send', '发送', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25795, 2, 'Published Date', '发布日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25796, 2, 'Payment History', '付款记录', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25797, 2, 'Payment Salary Details', '工资支付详情', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25798, 2, 'Print Payslip', '打印工资单', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25799, 2, 'Salary Month', '工资月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25800, 2, 'Employee ID', '工号', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25801, 2, 'Payslip NO', '工资单号', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25802, 2, 'Joining Date', '入职日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25803, 2, 'Payment By', '支付者', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25804, 2, 'Payment Details', '支付详情', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25805, 2, 'Earning', '获得', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25806, 2, 'Grand Total', '共计', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25807, 2, 'Overtime Amount', '加班次数', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25808, 2, 'Job Type', '职位类型', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25809, 2, 'Contractual', '临时工', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25810, 2, 'Part Time', '兼职', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25811, 2, 'Full Time', '全职', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25812, 2, 'Experience', '经验', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25813, 2, 'Age', '年龄', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25814, 2, 'Job Location', '工作地点', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25815, 2, 'Salary Range', '工资范围', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25816, 2, 'Short Description', '简单描述', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25817, 2, 'Edit Job', '编辑职位', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25818, 2, 'All Jobs', '所有职位', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25819, 2, 'Home', '主页', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25820, 2, 'Jobs', '应聘', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25821, 2, 'Deadline', '最后期限', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25822, 2, 'Job Summary', '职位描述', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25823, 2, 'Published on', '发布日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25824, 2, 'Application Deadline', '最后期限', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25825, 2, 'Apply Now', '申请', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25826, 2, 'Apply For', '申请', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25827, 2, 'Upload Resume', '上传简历', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25828, 2, 'Apply', '申请', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25829, 2, 'Language Manage', '语言管理', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25830, 2, 'View All', '所有', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25831, 2, 'Expense Request', '费用请求', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25832, 2, 'Recent', '最近的', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25833, 2, 'Tasks', '任务', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25834, 2, 'Timezone', '时区', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25835, 2, 'Today is', '今天是', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25836, 2, 'Time', '时间', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25837, 2, 'Notice', '通知', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25838, 2, 'Total', '合计', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25839, 2, 'Subtotal', '小计', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25840, 2, 'TAX', '税', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25841, 2, 'Edit Department', '编辑部门', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25842, 2, 'Job Applicants', '求职者', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25843, 2, 'Unread', '未读', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25844, 2, 'Primary Selected', '优先选择', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25845, 2, 'Call For Interview', '邀请面试', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25846, 2, 'Confirm', '确认', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25847, 2, 'Resume', '简历', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25848, 2, 'View Holiday', '查看节日', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25849, 2, 'Tax Rules', '税收规则', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25850, 2, 'Add Tax Rule', '新增税收规则', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25851, 2, 'Tax Rule Name', '税收规则名', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25852, 2, 'Set Rules', '设置规则', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25853, 2, 'Save Values', '保存数值', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25854, 2, 'Salary From', '开始', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25855, 2, 'Salary To', '结束', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25856, 2, 'Tax Percentage', '税率', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25857, 2, 'Additional Tax Amount', '附加税额', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25858, 2, 'Gender', '性别', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25859, 2, 'Both', '全部', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25860, 2, 'Male', '男', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25861, 2, 'Female', '女', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25862, 2, 'Remove', '移除', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25863, 2, 'Add More', '更多', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25864, 2, 'Provident Fund', '公积金', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25865, 2, 'Provident Fund Type', '类型', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25866, 2, 'Employee Share', '个人缴纳', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25867, 2, 'Organization Share', '公司缴纳', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25868, 2, 'Paid', '已支付', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25869, 2, 'Unpaid', '未支付', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25870, 2, 'Loan', '借款', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25871, 2, 'Repayment Start Date', '开始日期', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25872, 2, 'Remaining Amount', '余额', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25873, 2, 'Ongoing', '持续的', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25874, 2, 'Include Loan Amount in Payslip', '借款从工资中扣减', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25875, 2, 'Monthly Repayment Amount', '月度支付额', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25876, 2, 'Employee Salary Increment', '加薪', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25877, 2, 'SMS Gateways', '短信网关', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25878, 2, 'Gateway Name', '网关名称', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25879, 2, 'API Link', 'API链接', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25880, 2, 'Tax Template', '税率模板', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25881, 2, 'Salary Type', '工资类型', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25882, 2, 'Monthly', '月', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25883, 2, 'Hourly', '小时', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25884, 2, 'Basic Salary', '基本工资', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25885, 2, 'Reports', '报表', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25886, 2, 'Employee Payroll Summery', '工资单', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25887, 2, 'No working hour', '非工时', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25888, 2, 'Add with basic salary', '基本工资', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25889, 2, 'Salary Statement', '工资明细', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25890, 2, 'Date From', '开始日', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25891, 2, 'Date To', '结束日', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25892, 2, 'Find', '查找', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25893, 2, 'Send Email', '发送邮件', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25894, 2, 'Send SMS', '发送短信', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25895, 2, 'For', '为', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25896, 2, 'Employee Summery', '员工简介', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25897, 2, 'Set Working Rate', '设置出勤率', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25898, 2, 'Apply Job', '应聘', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25899, 2, 'Fixed Amount', '定额', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25900, 2, 'Percentage of Basic Salary', '比例', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25901, 2, 'Logout Successfully', '成功退出', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25902, 2, 'Profile Updated Successfully', '成功更新个人简介', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25903, 2, 'Department Added Successfully', '成功更新部门', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25904, 2, 'Employee SignUp', '员工注册', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25905, 2, 'Ticket For Employee', '员工工单', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25906, 2, 'Admin Password Reset', '管理员密码重置', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25907, 2, 'Forgot Admin Password', '忘记管理员密码', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25908, 2, 'Ticket Reply', '工单答复', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25909, 2, 'Forgot Employee Password', '忘记员工密码', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25910, 2, 'Employee Password Reset', '员工密码重置', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25911, 2, 'Ticket For Admin', '管理员工单', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25912, 2, 'Employee Ticket Reply', '员工工单答复', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25913, 2, 'Are you sure?', '您确定吗？', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25914, 2, 'Award Updated Successfully', '成功更新奖励', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25915, 2, 'Notice Updated Successfully', '成功更新公告', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25916, 2, 'Salary Updated Successfully', '成功更新工资', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25917, 2, 'Language updated Successfully', '成功更新语言', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25918, 2, 'Bank Account Added Successfully', '成功增加银行账号', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25919, 2, 'Bank Account Deleted Successfully', '成功删除银行账号', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25920, 2, 'Set Overtime (In Hour)?', '设置加班（小时）？', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25921, 2, 'Invalid Access', '没有访问权限', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25922, 2, 'e.g.', '例如', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25923, 2, 'Days', '天数', '2016-10-12 09:15:57', '2016-10-12 09:15:57'),
(25924, 2, 'Status Changed Successfully', '成功更新状态', '2016-10-12 09:15:57', '2016-10-12 09:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `sys_leave`
--

CREATE TABLE `sys_leave` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `ltype_id` int(11) NOT NULL,
  `applied_on` date NOT NULL,
  `leave_reason` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('approved','pending','rejected') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `remark` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_leave`
--

INSERT INTO `sys_leave` (`id`, `emp_id`, `leave_from`, `leave_to`, `ltype_id`, `applied_on`, `leave_reason`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 2, '2016-09-26', '2016-09-26', 1, '2016-09-25', '<p>外出办事。<br></p>', 'approved', '这个是测试', '2016-09-24 16:47:55', '2016-09-24 16:48:40'),
(2, 2, '2016-09-27', '2016-09-27', 2, '2016-09-25', '<p>还是测试。<br></p>', 'pending', '', '2016-09-24 16:51:23', '2016-09-25 04:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `sys_leave_type`
--

CREATE TABLE `sys_leave_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `leave` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `leave_quota` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_leave_type`
--

INSERT INTO `sys_leave_type` (`id`, `leave`, `leave_quota`, `created_at`, `updated_at`) VALUES
(1, '事假', 3, '2016-09-24 15:40:30', '2016-09-24 15:40:30'),
(2, '病假', 3, '2016-09-24 15:40:49', '2016-09-24 15:40:49'),
(3, '年假', 5, '2016-09-24 15:45:42', '2016-09-24 15:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `sys_loan`
--

CREATE TABLE `sys_loan` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `loan_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `enable_payslip` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `repayment_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `remaining_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `repayment_start_date` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` enum('ongoing','completed','rejected','pending') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_notice`
--

CREATE TABLE `sys_notice` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Published','Unpublished') COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_notice`
--

INSERT INTO `sys_notice` (`id`, `title`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, '国庆长假注意事项', 'Published', '<p>请大家注意安全。</p><p>下班时记得锁好门。</p>', '2016-09-24 15:58:27', '2016-09-24 21:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `sys_payroll`
--

CREATE TABLE `sys_payroll` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `payment_month` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_date` date NOT NULL DEFAULT '2016-09-04',
  `net_salary` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `provident_fund` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `loan` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `overtime_salary` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total_salary` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` enum('Cash Payment','Bank Payment','Cheque Payment') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_payroll`
--

INSERT INTO `sys_payroll` (`id`, `emp_id`, `department`, `designation`, `payment_month`, `payment_date`, `net_salary`, `tax`, `provident_fund`, `loan`, `overtime_salary`, `total_salary`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 5, 'September, 2016', '2016-09-24', '4800', '0', '0', '0', '0', '4800', 'Bank Payment', '2016-09-24 08:16:19', '2016-09-24 08:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `sys_provident_fund`
--

CREATE TABLE `sys_provident_fund` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `provident_fund_type` enum('Fixed Amount','Percentage of Basic Salary') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Percentage of Basic Salary',
  `employee_share` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `organization_share` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_type` enum('Cash Payment','Bank Payment','Cheque Payment') COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Paid','Unpaid') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_provident_fund`
--

INSERT INTO `sys_provident_fund` (`id`, `emp_id`, `provident_fund_type`, `employee_share`, `organization_share`, `description`, `total`, `payment_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Fixed Amount', '258', '258', '<p>公积金</p>', '0.00', NULL, 'Unpaid', '2016-09-24 08:26:32', '2016-09-24 08:26:32'),
(2, 2, 'Fixed Amount', '258', '258', '', '0.00', NULL, 'Unpaid', '2016-09-24 09:49:28', '2016-09-24 09:49:28'),
(3, 3, 'Fixed Amount', '258', '258', '', '0.00', NULL, 'Unpaid', '2016-09-24 09:49:42', '2016-09-24 09:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `sys_sms_gateways`
--

CREATE TABLE `sys_sms_gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `api_link` text COLLATE utf8_unicode_ci,
  `user_name` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `api_id` text COLLATE utf8_unicode_ci,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_sms_gateways`
--

INSERT INTO `sys_sms_gateways` (`id`, `name`, `api_link`, `user_name`, `password`, `api_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Twilio', NULL, 'User id', 'Auth Token', '', 'Active', '2016-09-04 01:29:30', '2016-09-04 07:36:30'),
(2, 'Route SMS', 'http://smsplus1.routesms.com:8080/bulksms/bulksms', 'User Name', 'Password', '', 'Inactive', '2016-09-04 01:29:30', '2016-09-04 07:36:25'),
(3, 'Bulk SMS', 'http://bulksms.2way.co.za', 'User Name', 'Password', '', 'Inactive', '2016-09-04 01:29:30', '2016-09-04 01:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `sys_support_departments`
--

CREATE TABLE `sys_support_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `show` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_support_departments`
--

INSERT INTO `sys_support_departments` (`id`, `name`, `email`, `order`, `show`, `created_at`, `updated_at`) VALUES
(1, '技术支持', 'it@mw.life', 1, 'Yes', '2016-09-24 17:17:16', '2016-09-24 17:17:16'),
(2, '售前支持', 'bs@mw.life', 2, 'Yes', '2016-09-24 17:23:38', '2016-09-24 17:23:38'),
(3, '售后支持', 'as@mw.life', 3, 'Yes', '2016-09-24 17:23:58', '2016-09-24 17:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `sys_task`
--

CREATE TABLE `sys_task` (
  `id` int(10) UNSIGNED NOT NULL,
  `task` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `estimated_hour` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `progress` int(11) NOT NULL DEFAULT '0',
  `status` enum('pending','started','completed') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_task`
--

INSERT INTO `sys_task` (`id`, `task`, `start_date`, `due_date`, `estimated_hour`, `description`, `progress`, `status`, `created_at`, `updated_at`) VALUES
(1, '测试任务', '2016-09-25', '2016-09-25', 6, '<p>测试任务</p>', 10, 'pending', '2016-09-24 16:07:17', '2016-09-24 16:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `sys_task_comments`
--

CREATE TABLE `sys_task_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_task_employee`
--

CREATE TABLE `sys_task_employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_task_employee`
--

INSERT INTO `sys_task_employee` (`id`, `task_id`, `emp_id`, `emp_name`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '易斌 ', '2016-09-24 16:07:17', '2016-09-24 16:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `sys_task_files`
--

CREATE TABLE `sys_task_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `file_title` text COLLATE utf8_unicode_ci NOT NULL,
  `file_size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_tax_rules`
--

CREATE TABLE `sys_tax_rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_name` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_tax_rules`
--

INSERT INTO `sys_tax_rules` (`id`, `tax_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '税率1', 'active', '2016-09-04 01:29:30', '2016-09-24 14:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `sys_tax_rules_details`
--

CREATE TABLE `sys_tax_rules_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_id` int(11) NOT NULL,
  `salary_from` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `salary_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_percentage` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `additional_tax_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `gender` enum('Both','Male','Female') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Both',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_tax_rules_details`
--

INSERT INTO `sys_tax_rules_details` (`id`, `tax_id`, `salary_from`, `salary_to`, `tax_percentage`, `additional_tax_amount`, `gender`, `created_at`, `updated_at`) VALUES
(5, 1, '0', '3500', '0', '0', 'Both', '2016-09-24 17:11:57', '2016-09-24 17:11:57'),
(6, 1, '3500', '5000', '3', '0', 'Both', '2016-09-24 17:11:57', '2016-09-24 17:11:57'),
(7, 1, '5000', '8000', '20', '0', 'Both', '2016-09-24 17:11:57', '2016-09-24 17:11:57'),
(8, 1, '8000', '12500', '25', '0', 'Both', '2016-09-24 17:11:57', '2016-09-24 17:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `sys_tickets`
--

CREATE TABLE `sys_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `did` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Pending','Answered','Customer Reply','Closed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `admin` text COLLATE utf8_unicode_ci NOT NULL,
  `replyby` text COLLATE utf8_unicode_ci,
  `closed_by` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_tickets`
--

INSERT INTO `sys_tickets` (`id`, `did`, `emp_id`, `name`, `email`, `date`, `subject`, `message`, `status`, `admin`, `replyby`, `closed_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '易斌 ', 'yibin@mw.life', '2016-09-25', '测试', '<ol><li>测试</li><li>再次测试<br></li></ol>', 'Pending', '0', '', '', '2016-09-24 17:18:50', '2016-09-24 17:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `sys_ticket_files`
--

CREATE TABLE `sys_ticket_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `file_title` text COLLATE utf8_unicode_ci NOT NULL,
  `file_size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_ticket_replies`
--

CREATE TABLE `sys_ticket_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `tid` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `admin` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sys_appconfig`
--
ALTER TABLE `sys_appconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_attendance`
--
ALTER TABLE `sys_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_award`
--
ALTER TABLE `sys_award`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_award_list`
--
ALTER TABLE `sys_award_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_department`
--
ALTER TABLE `sys_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_designation`
--
ALTER TABLE `sys_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_email_templates`
--
ALTER TABLE `sys_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_employee`
--
ALTER TABLE `sys_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_employee_bank_accounts`
--
ALTER TABLE `sys_employee_bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_employee_files`
--
ALTER TABLE `sys_employee_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_expense`
--
ALTER TABLE `sys_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_expense_title`
--
ALTER TABLE `sys_expense_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_holiday`
--
ALTER TABLE `sys_holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_jobs`
--
ALTER TABLE `sys_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_job_applicants`
--
ALTER TABLE `sys_job_applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_language`
--
ALTER TABLE `sys_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_language_data`
--
ALTER TABLE `sys_language_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_leave`
--
ALTER TABLE `sys_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_leave_type`
--
ALTER TABLE `sys_leave_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_loan`
--
ALTER TABLE `sys_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_notice`
--
ALTER TABLE `sys_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_payroll`
--
ALTER TABLE `sys_payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_provident_fund`
--
ALTER TABLE `sys_provident_fund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_sms_gateways`
--
ALTER TABLE `sys_sms_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_support_departments`
--
ALTER TABLE `sys_support_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_task`
--
ALTER TABLE `sys_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_task_comments`
--
ALTER TABLE `sys_task_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_task_employee`
--
ALTER TABLE `sys_task_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_task_files`
--
ALTER TABLE `sys_task_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_tax_rules`
--
ALTER TABLE `sys_tax_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_tax_rules_details`
--
ALTER TABLE `sys_tax_rules_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_tickets`
--
ALTER TABLE `sys_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_ticket_files`
--
ALTER TABLE `sys_ticket_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_ticket_replies`
--
ALTER TABLE `sys_ticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sys_appconfig`
--
ALTER TABLE `sys_appconfig`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sys_attendance`
--
ALTER TABLE `sys_attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sys_award`
--
ALTER TABLE `sys_award`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sys_award_list`
--
ALTER TABLE `sys_award_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_department`
--
ALTER TABLE `sys_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sys_designation`
--
ALTER TABLE `sys_designation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sys_email_templates`
--
ALTER TABLE `sys_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sys_employee`
--
ALTER TABLE `sys_employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sys_employee_bank_accounts`
--
ALTER TABLE `sys_employee_bank_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_employee_files`
--
ALTER TABLE `sys_employee_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_expense`
--
ALTER TABLE `sys_expense`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_expense_title`
--
ALTER TABLE `sys_expense_title`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_holiday`
--
ALTER TABLE `sys_holiday`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sys_jobs`
--
ALTER TABLE `sys_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_job_applicants`
--
ALTER TABLE `sys_job_applicants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_language`
--
ALTER TABLE `sys_language`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_language_data`
--
ALTER TABLE `sys_language_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25925;

--
-- AUTO_INCREMENT for table `sys_leave`
--
ALTER TABLE `sys_leave`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_leave_type`
--
ALTER TABLE `sys_leave_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sys_loan`
--
ALTER TABLE `sys_loan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_notice`
--
ALTER TABLE `sys_notice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_payroll`
--
ALTER TABLE `sys_payroll`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_provident_fund`
--
ALTER TABLE `sys_provident_fund`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sys_sms_gateways`
--
ALTER TABLE `sys_sms_gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sys_support_departments`
--
ALTER TABLE `sys_support_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sys_task`
--
ALTER TABLE `sys_task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_task_comments`
--
ALTER TABLE `sys_task_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_task_employee`
--
ALTER TABLE `sys_task_employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_task_files`
--
ALTER TABLE `sys_task_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_tax_rules`
--
ALTER TABLE `sys_tax_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_tax_rules_details`
--
ALTER TABLE `sys_tax_rules_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sys_tickets`
--
ALTER TABLE `sys_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_ticket_files`
--
ALTER TABLE `sys_ticket_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_ticket_replies`
--
ALTER TABLE `sys_ticket_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
