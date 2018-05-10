<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function index() {
      $msg = 'Running SQL Update.... <br>';
      $v = '1.0.0';
      $latest = '1.5.0';

      $find = app_config('SoftwareVersion');

      if ($find == '1.5.0') {
        $v = '1.5.0';
        $msg .= 'It seems, your version is up to date for version 1.5.0 <br>';
      } else {
        $msg .= 'Running update for Version 1.5.0 ..... <br>';

        $sql = <<<EOF
ALTER TABLE `sys_employee` CHANGE `role` `role_id` INT(11) NOT NULL;

UPDATE `sys_employee` SET `role_id`=0 WHERE `user_name`!='admin';

CREATE TABLE `sys_employee_roles` (
`id` int(10) UNSIGNED NOT NULL,
`role_name` text COLLATE utf8_unicode_ci NOT NULL,
`status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `sys_employee_roles_permission` (
`id` int(10) UNSIGNED NOT NULL,
`role_id` int(11) NOT NULL,
`perm_id` int(11) NOT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `sys_employee_training` (
`id` int(10) UNSIGNED NOT NULL,
`training_type` enum('Online Training','Seminar','Lecture','Workshop','Hands On Training','Webinar') COLLATE utf8_unicode_ci NOT NULL,
`training_subject` enum('HR Training','Employees Development','IT Training','Finance Training','Others') COLLATE utf8_unicode_ci NOT NULL,
`training_nature` enum('Internal','External') COLLATE utf8_unicode_ci NOT NULL,
`title` text COLLATE utf8_unicode_ci NOT NULL,
`trainer` int(11) DEFAULT NULL,
`training_location` text COLLATE utf8_unicode_ci,
`sponsored_by` text COLLATE utf8_unicode_ci,
`organized_by` text COLLATE utf8_unicode_ci,
`training_from` date NOT NULL,
`training_to` date NOT NULL,
`description` text COLLATE utf8_unicode_ci,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DELETE FROM `sys_language_data` WHERE `lan_id`='1';

INSERT INTO `sys_language_data` (`id`, `lan_id`, `lan_data`, `lan_value`, `created_at`, `updated_at`) VALUES
(null, 1, 'Login', 'Login', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Forget Password', 'Forget Password', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Sign to your account', 'Sign to your account', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'User Name', 'User Name', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Password', 'Password', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Remember Me', 'Remember Me', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Reset your password', 'Reset your password', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Email', 'Email', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Reset My Password', 'Reset My Password', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Back To Sign in', 'Back To Sign in', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Dashboard', 'Dashboard', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Departments', 'Departments', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Designations', 'Designations', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Employees', 'Employees', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'All Employees', 'All Employees', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Add Employee', 'Add Employee', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Job Application', 'Job Application', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Attendance', 'Attendance', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Attendance Report', 'Attendance Report', '2016-10-18 00:55:33', '2016-10-18 00:55:33'),
(null, 1, 'Update Attendance', 'Update Attendance', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Leave', 'Leave', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Holiday', 'Holiday', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Holiday Calender', 'Holiday Calender', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Add New Holiday', 'Add New Holiday', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Award', 'Award', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Notice Board', 'Notice Board', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Expense', 'Expense', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Payroll', 'Payroll', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Employee Salary List', 'Employee Salary List', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Make Payment', 'Make Payment', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Generate Payslip', 'Generate Payslip', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Task', 'Task', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Support Tickets', 'Support Tickets', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'All Support Tickets', 'All Support Tickets', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Create New Ticket', 'Create New Ticket', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Support Department', 'Support Department', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Settings', 'Settings', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'System Settings', 'System Settings', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Localization', 'Localization', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Email Templates', 'Email Templates', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Language Settings', 'Language Settings', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Recent 5 Leave Applications', 'Recent 5 Leave Applications', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'See All Applications', 'See All Applications', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Recent 5 Pending Tasks', 'Recent 5 Pending Tasks', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'See All Tasks', 'See All Tasks', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Recent 5 Pending Tickets', 'Recent 5 Pending Tickets', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'See All Tickets', 'See All Tickets', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Update Profile', 'Update Profile', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Change Password', 'Change Password', '2016-10-18 00:55:34', '2016-10-18 00:55:34'),
(null, 1, 'Logout', 'Logout', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Department', 'Department', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Add Department', 'Add Department', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Account Department', 'Account Department', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Add', 'Add', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'All Departments', 'All Departments', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'SL', 'SL', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Department Name', 'Department Name', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Actions', 'Actions', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Edit', 'Edit', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Delete', 'Delete', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Designations', 'Designations', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Add Designation', 'Add Designation', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Designation Name', 'Designation Name', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Software Engineer', 'Software Engineer', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'All Designations', 'All Designations', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Designation', 'Designation', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Code', 'Code', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Name', 'Name', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Username', 'Username', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Status', 'Status', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Active', 'Active', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Inactive', 'Inactive', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'First Name', 'First Name', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Last Name', 'Last Name', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Employee Code', 'Employee Code', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Unique For every User', 'Unique For every User', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Confirm Password', 'Confirm Password', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Select Department', 'Select Department', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'User Role', 'User Role', '2016-10-18 00:55:35', '2016-10-18 00:55:35'),
(null, 1, 'Admin', 'Admin', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Employee', 'Employee', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'View Profile', 'View Profile', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Phone', 'Phone', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Address', 'Address', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Personal Details', 'Personal Details', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Bank Info', 'Bank Info', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Document', 'Document', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Change Picture', 'Change Picture', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Leave blank if you no need to change password', 'Leave blank if you no need to change password', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Date Of Join', 'Date Of Join', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Date Of Leave', 'Date Of Leave', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Phone Number', 'Phone Number', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Alternative Phone', 'Alternative Phone', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Father Name', 'Father Name', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Mother Name', 'Mother Name', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Date Of Birth', 'Date Of Birth', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Present Address', 'Present Address', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Permanent Address', 'Permanent Address', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Update', 'Update', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Add Bank Account', 'Add Bank Account', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Bank Name', 'Bank Name', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Branch Name', 'Branch Name', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Account Name', 'Account Name', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Account Number', 'Account Number', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'IFSC Code', 'IFSC Code', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'PAN Number', 'PAN Number', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'All Bank Accounts', 'All Bank Accounts', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Branch', 'Branch', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Account No', 'Account No', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'PAN No', 'PAN No', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Add Document', 'Add Document', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Document Name', 'Document Name', '2016-10-18 00:55:36', '2016-10-18 00:55:36'),
(null, 1, 'Select Document', 'Select Document', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Browse', 'Browse', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'All Documents', 'All Documents', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Download', 'Download', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Job Applications', 'Job Applications', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Add New Job', 'Add New Job', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Position', 'Position', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Posted Date', 'Posted Date', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Apply Last Date', 'Apply Last Date', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Close Date', 'Close Date', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Open', 'Open', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Drafted', 'Drafted', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Closed', 'Closed', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Applicants', 'Applicants', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Number Of Post', 'Number Of Post', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Post Date', 'Post Date', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Last Date To Apply', 'Last Date To Apply', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Description', 'Description', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Close', 'Close', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Search Condition', 'Search Condition', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Date', 'Date', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Select Employee', 'Select Employee', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Select Designation', 'Select Designation', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Search', 'Search', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Employee Name', 'Employee Name', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Clock In', 'Clock In', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Clock Out', 'Clock Out', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Late', 'Late', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Early Leaving', 'Early Leaving', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Overtime', 'Overtime', '2016-10-18 00:55:37', '2016-10-18 00:55:37'),
(null, 1, 'Total Work', 'Total Work', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Absent', 'Absent', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Present', 'Present', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Set Overtime', 'Set Overtime', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Leave Application', 'Leave Application', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Leave Type', 'Leave Type', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Leave From', 'Leave From', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Leave To', 'Leave To', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Approved', 'Approved', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Pending', 'Pending', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Rejected', 'Rejected', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'View', 'View', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'View Application', 'View Application', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Applied On', 'Applied On', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Leave Reason', 'Leave Reason', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Current Status', 'Current Status', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Change Status', 'Change Status', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Remark', 'Remark', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Update', 'Update', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Prev', 'Prev', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'This Month', 'This Month', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Next', 'Next', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Occasion Name', 'Occasion Name', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Occasion', 'Occasion', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Award List', 'Award List', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Add New Award', 'Add New Award', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Award Name', 'Award Name', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Gift', 'Gift', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Month', 'Month', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Gift Item', 'Gift Item', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'Cash Price', 'Cash Price', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'January', 'January', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'February', 'February', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'March', 'March', '2016-10-18 00:55:38', '2016-10-18 00:55:38'),
(null, 1, 'April', 'April', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'May', 'May', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'June', 'June', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'July', 'July', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'August', 'August', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'September', 'September', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'October', 'October', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'November', 'November', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'December', 'December', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Year', 'Year', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Edit Award', 'Edit Award', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Add New Notice', 'Add New Notice', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Title', 'Title', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Published', 'Published', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Unpublished', 'Unpublished', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Notice Title', 'Notice Title', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Notice Status', 'Notice Status', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Edit Notice', 'Edit Notice', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Expense List', 'Expense List', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Add New Expense', 'Add New Expense', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Item Name', 'Item Name', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Purchase From', 'Purchase From', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Purchase Date', 'Purchase Date', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Amount', 'Amount', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Cancel', 'Cancel', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Bill Copy', 'Bill Copy', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Purchase By', 'Purchase By', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Edit Expense', 'Edit Expense', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Working Hourly Rate', 'Working Hourly Rate', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Overtime Hourly Rate', 'Overtime Hourly Rate', '2016-10-18 00:55:39', '2016-10-18 00:55:39'),
(null, 1, 'Edit Employee Salary', 'Edit Employee Salary', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Hourly Working Rate', 'Hourly Working Rate', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Hourly Overtime Rate', 'Hourly Overtime Rate', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Payment Amount', 'Payment Amount', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Details', 'Details', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Pay Payment', 'Pay Payment', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Payment For', 'Payment For', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Net Salary', 'Net Salary', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Overtime Salary', 'Overtime Salary', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Payment Type', 'Payment Type', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Cash Payment', 'Cash Payment', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Bank Payment', 'Bank Payment', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Cheque Payment', 'Cheque Payment', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Pay', 'Pay', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'All Payments', 'All Payments', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Payment Month', 'Payment Month', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Payment Date', 'Payment Date', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Paid Amount', 'Paid Amount', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Payslip', 'Payslip', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Task List', 'Task List', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Add New Task', 'Add New Task', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Created Date', 'Created Date', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Due Date', 'Due Date', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Completed', 'Completed', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Started', 'Started', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Task Title', 'Task Title', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Assign To', 'Assign To', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Start Date', 'Start Date', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Estimated Hour', 'Estimated Hour', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Progress', 'Progress', '2016-10-18 00:55:40', '2016-10-18 00:55:40'),
(null, 1, 'Edit Task', 'Edit Task', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Manage Task', 'Manage Task', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Task Basic Info', 'Task Basic Info', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Task Management', 'Task Management', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Task Details', 'Task Details', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Task Discussion', 'Task Discussion', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Task Files', 'Task Files', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Task Description', 'Task Description', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Task Members', 'Task Members', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Leave Comment', 'Leave Comment', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Reply', 'Reply', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Member', 'Member', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Comment', 'Comment', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Last Update', 'Last Update', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'File Title', 'File Title', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Files', 'Files', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Upload', 'Upload', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Size', 'Size', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Upload By', 'Upload By', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Select File', 'Select File', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Subject', 'Subject', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Answered', 'Answered', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Customer Reply', 'Customer Reply', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Department Email', 'Department Email', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Show in Client', 'Show in Client', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Yes', 'Yes', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'No', 'No', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Add New', 'Add New', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Manage', 'Manage', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'View Department', 'View Department', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Ticket For Client', 'Ticket For Client', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Message', 'Message', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Create Ticket', 'Create Ticket', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Manage Support Ticket', 'Manage Support Ticket', '2016-10-18 00:55:41', '2016-10-18 00:55:41'),
(null, 1, 'Change Basic Info', 'Change Basic Info', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Change Department', 'Change Department', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Ticket Management', 'Ticket Management', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Ticket Details', 'Ticket Details', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Ticket Discussion', 'Ticket Discussion', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Ticket Files', 'Ticket Files', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Ticket For', 'Ticket For', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Created By', 'Created By', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Closed By', 'Closed By', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Reply Ticket', 'Reply Ticket', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'General', 'General', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Office Time', 'Office Time', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Job', 'Job', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Application Name', 'Application Name', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Application Title', 'Application Title', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'System Email', 'System Email', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Remember: All Email Going to the Receiver from this Email', 'Remember: All Email Going to the Receiver from this Email', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Footer Text', 'Footer Text', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Application Logo', 'Application Logo', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Application Favicon', 'Application Favicon', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Email Gateway', 'Email Gateway', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'SMTP Host Name', 'SMTP Host Name', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'SMTP User Name', 'SMTP User Name', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'SMTP Password', 'SMTP Password', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'SMTP Port', 'SMTP Port', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'SMTP Secure', 'SMTP Secure', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Office In Time', 'Office In Time', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Office Out Time', 'Office Out Time', '2016-10-18 00:55:42', '2016-10-18 00:55:42'),
(null, 1, 'Add New Expense Title', 'Add New Expense Title', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Expense Title', 'Expense Title', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Employee Salary', 'Employee Salary', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Expense Title List', 'Expense Title List', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Leave Title', 'Leave Title', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Sick Leave', 'Sick Leave', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Leave Quota', 'Leave Quota', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Leave Title List', 'Leave Title List', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Best Employee', 'Best Employee', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Job File Extension', 'Job File Extension', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Supported File Extension', 'Supported File Extension', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Remember: File Extension Separated By Comma', 'Remember: File Extension Separated By Comma', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Award Name List', 'Award Name List', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Save', 'Save', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Default Country', 'Default Country', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Date Format', 'Date Format', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Default Language', 'Default Language', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Current Code', 'Current Code', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Current Symbol', 'Current Symbol', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Email Templates', 'Email Templates', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Template Name', 'Template Name', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Manage Email Template', 'Manage Email Template', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Language', 'Language', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Add Language', 'Add Language', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Language Name', 'Language Name', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Flag', 'Flag', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'All Languages', 'All Languages', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Translate', 'Translate', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'To', 'To', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'Current Password', 'Current Password', '2016-10-18 00:55:43', '2016-10-18 00:55:43'),
(null, 1, 'New Password', 'New Password', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'All Leave Details', 'All Leave Details', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Total Leave', 'Total Leave', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'New Leave', 'New Leave', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Request For New Leave', 'Request For New Leave', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Send', 'Send', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Published Date', 'Published Date', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Payment History', 'Payment History', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Payment Salary Details', 'Payment Salary Details', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Print Payslip', 'Print Payslip', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Salary Month', 'Salary Month', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Employee ID', 'Employee ID', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Payslip NO', 'Payslip NO', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Joining Date', 'Joining Date', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Payment By', 'Payment By', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Payment Details', 'Payment Details', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Earning', 'Earning', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Grand Total', 'Grand Total', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Overtime Amount', 'Overtime Amount', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Job Type', 'Job Type', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Contractual', 'Contractual', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Part Time', 'Part Time', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Full Time', 'Full Time', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Experience', 'Experience', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Age', 'Age', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Job Location', 'Job Location', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Salary Range', 'Salary Range', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Short Description', 'Short Description', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Edit Job', 'Edit Job', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'All Jobs', 'All Jobs', '2016-10-18 00:55:44', '2016-10-18 00:55:44'),
(null, 1, 'Home', 'Home', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Jobs', 'Jobs', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Deadline', 'Deadline', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Job Summary', 'Job Summary', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Published on', 'Published on', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Application Deadline', 'Application Deadline', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Apply Now', 'Apply Now', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Apply For', 'Apply For', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Upload Resume', 'Upload Resume', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Apply', 'Apply', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Language Manage', 'Language Manage', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'View All', 'View All', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Expense Request', 'Expense Request', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Recent', 'Recent', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Tasks', 'Tasks', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Timezone', 'Timezone', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Today is', 'Today is', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Time', 'Time', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Notice', 'Notice', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Total', 'Total', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Subtotal', 'Subtotal', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'TAX', 'TAX', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Edit Department', 'Edit Department', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Job Applicants', 'Job Applicants', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Unread', 'Unread', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Primary Selected', 'Primary Selected', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Call For Interview', 'Call For Interview', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Confirm', 'Confirm', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Rejected', 'Rejected', '2016-10-18 00:55:45', '2016-10-18 00:55:45'),
(null, 1, 'Resume', 'Resume', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Status', 'Status', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'View Holiday', 'View Holiday', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Tax Rules', 'Tax Rules', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Add Tax Rule', 'Add Tax Rule', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Tax Rule Name', 'Tax Rule Name', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Set Rules', 'Set Rules', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Save Values', 'Save Values', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Salary From', 'Salary From', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Salary To', 'Salary To', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Tax Percentage', 'Tax Percentage', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Additional Tax Amount', 'Additional Tax Amount', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Gender', 'Gender', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Both', 'Both', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Male', 'Male', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Female', 'Female', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Remove', 'Remove', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Add More', 'Add More', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Provident Fund', 'Provident Fund', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Provident Fund Type', 'Provident Fund Type', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Employee Share', 'Employee Share', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Organization Share', 'Organization Share', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Paid', 'Paid', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Unpaid', 'Unpaid', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Loan', 'Loan', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Repayment Start Date', 'Repayment Start Date', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Remaining Amount', 'Remaining Amount', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Ongoing', 'Ongoing', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Include Loan Amount in Payslip', 'Include Loan Amount in Payslip', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Monthly Repayment Amount', 'Monthly Repayment Amount', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Employee Salary Increment', 'Employee Salary Increment', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'SMS Gateways', 'SMS Gateways', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Gateway Name', 'Gateway Name', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'API Link', 'API Link', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Tax Template', 'Tax Template', '2016-10-18 00:55:46', '2016-10-18 00:55:46'),
(null, 1, 'Salary Type', 'Salary Type', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Monthly', 'Monthly', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Hourly', 'Hourly', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Basic Salary', 'Basic Salary', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Overtime Salary', 'Overtime Salary', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Reports', 'Reports', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Employee Payroll Summery', 'Employee Payroll Summery', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'No working hour', 'No working hour', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Add with basic salary', 'Add with basic salary', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Salary Statement', 'Salary Statement', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Date From', 'Date From', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Date To', 'Date To', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Find', 'Find', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Send Email', 'Send Email', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Send SMS', 'Send SMS', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'For', 'For', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Employee Summery', 'Employee Summery', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Set Working Rate', 'Set Working Rate', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Generate PDF', 'Generate PDF', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Training', 'Training', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Training Needs Assessment', 'Training Needs Assessment', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Training Events', 'Training Events', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Trainers', 'Trainers', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Trainer', 'Trainer', '2016-10-18 00:55:47', '2016-10-18 00:55:47'),
(null, 1, 'Training Evaluations', 'Training Evaluations', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Add New Trainer', 'Add New Trainer', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Organization', 'Organization', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'City', 'City', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'State', 'State', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Country', 'Country', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Zip Code', 'Zip Code', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Trainer Expertise', 'Trainer Expertise', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'View Trainer Info', 'View Trainer Info', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Employee Training', 'Employee Training', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Add New Training', 'Add New Training', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Training Type', 'Training Type', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Training From', 'Training From', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Training To', 'Training To', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Online Training', 'Online Training', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Seminar', 'Seminar', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Lecture', 'Lecture', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Workshop', 'Workshop', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Hands On Training', 'Hands On Training', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Webinar', 'Webinar', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'HR Training', 'HR Training', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Employees Development', 'Employees Development', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'IT Training', 'IT Training', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Finance Training', 'Finance Training', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Nature Of Training', 'Nature Of Training', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Internal', 'Internal', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'External', 'External', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Training Location', 'Training Location', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Sponsored By', 'Sponsored By', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Organized By', 'Organized By', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'View Employee Training', 'View Employee Training', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'Preferred', 'Preferred', '2016-10-18 00:55:48', '2016-10-18 00:55:48'),
(null, 1, 'End Date', 'End Date', '2016-10-18 00:55:49', '2016-10-18 00:55:49'),
(null, 1, 'Reason', 'Reason', '2016-10-18 00:55:49', '2016-10-18 00:55:49'),
(null, 1, 'Training Cost', 'Training Cost', '2016-10-18 00:55:49', '2016-10-18 00:55:49'),
(null, 1, 'Travel Cost', 'Travel Cost', '2016-10-18 00:55:49', '2016-10-18 00:55:49'),
(null, 1, 'Add New Event', 'Add New Event', '2016-10-18 00:55:49', '2016-10-18 00:55:49'),
(null, 1, 'Upcoming', 'Upcoming', '2016-10-18 00:55:49', '2016-10-18 00:55:49'),
(null, 1, 'Externals', 'Externals', '2016-10-18 00:55:49', '2016-10-18 00:55:49'),
(null, 1, 'Employee Roles', 'Employee Roles', '2016-10-18 00:55:49', '2016-10-18 00:55:49'),
(null, 1, 'Role Name', 'Role Name', '2016-10-18 00:55:49', '2016-10-18 00:55:49'),
(null, 1, 'Set Roles', 'Set Roles', '2016-10-18 00:55:49', '2016-10-18 00:55:49'),
(null, 1, 'My Portal', 'My Portal', '2016-10-18 00:55:49', '2016-10-18 00:55:49');




CREATE TABLE `sys_trainers` (
`id` int(10) UNSIGNED NOT NULL,
`first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
`last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
`designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
`organization` text COLLATE utf8_unicode_ci NOT NULL,
`address` text COLLATE utf8_unicode_ci,
`city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
`state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
`zip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
`country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
`email_address` text COLLATE utf8_unicode_ci NOT NULL,
`phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
`expertise` text COLLATE utf8_unicode_ci,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `sys_training_evaluations` (
`id` int(10) UNSIGNED NOT NULL,
`training_id` int(11) NOT NULL,
`description` text COLLATE utf8_unicode_ci NOT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `sys_training_events` (
`id` int(10) UNSIGNED NOT NULL,
`training_type` enum('Online Training','Seminar','Lecture','Workshop','Hands On Training','Webinar') COLLATE utf8_unicode_ci NOT NULL,
`training_subject` enum('HR Training','Employees Development','IT Training','Finance Training','Others') COLLATE utf8_unicode_ci NOT NULL,
`training_nature` enum('Internal','External') COLLATE utf8_unicode_ci NOT NULL,
`title` text COLLATE utf8_unicode_ci NOT NULL,
`training_location` text COLLATE utf8_unicode_ci,
`sponsored_by` text COLLATE utf8_unicode_ci,
`organized_by` text COLLATE utf8_unicode_ci,
`training_from` date NOT NULL,
`training_to` date NOT NULL,
`status` enum('upcoming','completed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'upcoming',
`externals` text COLLATE utf8_unicode_ci,
`description` text COLLATE utf8_unicode_ci,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `sys_training_events_employee` (
`id` int(10) UNSIGNED NOT NULL,
`training_id` int(11) NOT NULL,
`emp_id` int(11) NOT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `sys_training_events_trainers` (
`id` int(10) UNSIGNED NOT NULL,
`training_id` int(11) NOT NULL,
`trainer_id` int(11) NOT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `sys_training_members` (
`id` int(10) UNSIGNED NOT NULL,
`training_id` int(11) NOT NULL,
`emp_id` int(11) NOT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `sys_training_needs_assessment` (
`id` int(10) UNSIGNED NOT NULL,
`department` int(11) NOT NULL,
`training_type` enum('Online Training','Seminar','Lecture','Workshop','Hands On Training','Webinar') COLLATE utf8_unicode_ci NOT NULL,
`training_subject` enum('HR Training','Employees Development','IT Training','Finance Training','Others') COLLATE utf8_unicode_ci NOT NULL,
`training_nature` enum('Internal','External') COLLATE utf8_unicode_ci NOT NULL,
`title` text COLLATE utf8_unicode_ci NOT NULL,
`training_reason` text COLLATE utf8_unicode_ci,
`trainer` int(11) DEFAULT NULL,
`training_location` text COLLATE utf8_unicode_ci,
`training_from` date NOT NULL,
`training_to` date NOT NULL,
`training_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
`travel_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
`status` enum('pending','approved','rejected','completed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
`description` text COLLATE utf8_unicode_ci,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `sys_training_needs_assessment_members` (
`id` int(10) UNSIGNED NOT NULL,
`training_id` int(11) NOT NULL,
`emp_id` int(11) NOT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `sys_employee_roles`
ADD PRIMARY KEY (`id`);

ALTER TABLE `sys_employee_roles_permission`
ADD PRIMARY KEY (`id`);

ALTER TABLE `sys_employee_training`
ADD PRIMARY KEY (`id`);

ALTER TABLE `sys_trainers`
ADD PRIMARY KEY (`id`);

ALTER TABLE `sys_training_evaluations`
ADD PRIMARY KEY (`id`);

ALTER TABLE `sys_training_events`
ADD PRIMARY KEY (`id`);

ALTER TABLE `sys_training_events_employee`
ADD PRIMARY KEY (`id`);

ALTER TABLE `sys_training_events_trainers`
ADD PRIMARY KEY (`id`);

ALTER TABLE `sys_training_members`
ADD PRIMARY KEY (`id`);

ALTER TABLE `sys_training_needs_assessment`
ADD PRIMARY KEY (`id`);

ALTER TABLE `sys_training_needs_assessment_members`
ADD PRIMARY KEY (`id`);

ALTER TABLE `sys_employee_roles`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `sys_employee_roles_permission`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `sys_employee_training`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `sys_trainers`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `sys_training_evaluations`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `sys_training_events`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `sys_training_events_employee`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `sys_training_events_trainers`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `sys_training_members`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `sys_training_needs_assessment`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `sys_training_needs_assessment_members`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

UPDATE `sys_appconfig` SET `value` = '1.5.0' WHERE `sys_appconfig`.`id` = 4;

EOF;

        $msg .= 'Importing SQL Data....... <br>';

        // Execute SQL QUERY
        \DB::connection()->getPdo()->exec($sql);

        $msg .= 'Data import Completed....... <br>';
        $msg .= '===== Update Complete ======" <br>';
        $msg .= 'If you refresh this page now, you should see this message- "Your Version is Up to Date!" <br>';

      }

      if ($v == $latest) {
        echo 'Your Version is Up to Date!';
      } else {

        echo $msg;
      }

    }
}
