SET NAMES utf8mb4;

INSERT INTO `general_setting` (`id`, `website_name`, `website_address`, `website_phone1`, `website_phone2`, `website_email1`, `website_email2`, `website_start`, `web_about`)
VALUES
  (1, 'MeRavi Education House', 'Lokanthali, Bhaktapur', '9800000000', '014400000', 'info@meravi.test', 'support@meravi.test', '2018', 'Demo school profile used for local development and testing.')
ON DUPLICATE KEY UPDATE
  `website_name` = VALUES(`website_name`),
  `website_address` = VALUES(`website_address`),
  `website_phone1` = VALUES(`website_phone1`),
  `website_phone2` = VALUES(`website_phone2`),
  `website_email1` = VALUES(`website_email1`),
  `website_email2` = VALUES(`website_email2`),
  `website_start` = VALUES(`website_start`),
  `web_about` = VALUES(`web_about`);

INSERT INTO `exam_term` (`id`, `name`) VALUES
  (1, 'first_term'),
  (2, 'mid_term')
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);

INSERT INTO `meadmin` (`id`, `admin_username`, `admin_password`, `t_staff_type`) VALUES
  (1, 'ravi@ravi', '$2y$12$euO4eoyudgn/JaNMlYqbGOEf9VdOQuTRoRMguhyxFSs4fR63idrp.', 'Admin')
ON DUPLICATE KEY UPDATE
  `admin_username` = VALUES(`admin_username`),
  `admin_password` = VALUES(`admin_password`),
  `t_staff_type` = VALUES(`t_staff_type`);

INSERT INTO `teacher_info` (`t_id`, `t_fullname`, `t_address`, `t_email`, `t_username`, `t_pass`, `t_father`, `t_mother`, `t_dob`, `t_qualification`, `t_contact`, `t_staff_type`, `t_gender`) VALUES
  (1, 'Ravi Khadka', 'Lokanthali, Bhaktapur', 'ravi@meravi.test', 'ravi@ravi', '$2y$12$euO4eoyudgn/JaNMlYqbGOEf9VdOQuTRoRMguhyxFSs4fR63idrp.', 'Hari Khadka', 'Sita Khadka', '12 Jan 1995', 'MCA', '9800000001', 'Admin', 'Male'),
  (2, 'Hari Parsad Thapa', 'Tinkune, Kathmandu', 'hari.teacher@meravi.test', 'hari.sir', '$2y$12$JeZzBxeLJr7eURcOYUDVOe7oAjAK9VYZRJVJ/nHDNFyckATQIkG.i', 'Balaram Thapa', 'Laxmi Thapa', '20 Feb 1978', 'M.Ed', '9868111111', 'Teacher', 'Male'),
  (3, 'Mina Shrestha', 'Madhyapur Thimi, Bhaktapur', 'mina.teacher@meravi.test', 'mina.teacher', '$2y$12$JeZzBxeLJr7eURcOYUDVOe7oAjAK9VYZRJVJ/nHDNFyckATQIkG.i', 'Ram Shrestha', 'Kumari Shrestha', '05 May 1988', 'B.Ed', '9851000000', 'Teacher', 'Female')
ON DUPLICATE KEY UPDATE
  `t_fullname` = VALUES(`t_fullname`),
  `t_address` = VALUES(`t_address`),
  `t_email` = VALUES(`t_email`),
  `t_pass` = VALUES(`t_pass`),
  `t_father` = VALUES(`t_father`),
  `t_mother` = VALUES(`t_mother`),
  `t_dob` = VALUES(`t_dob`),
  `t_qualification` = VALUES(`t_qualification`),
  `t_contact` = VALUES(`t_contact`),
  `t_staff_type` = VALUES(`t_staff_type`),
  `t_gender` = VALUES(`t_gender`);

INSERT INTO `st_info` (`st_id`, `st_fullname`, `st_username`, `st_password`, `st_grade`, `roll_no`, `st_dob`, `st_address`, `st_district`, `st_gender`, `st_father`, `st_mother`, `st_parents_contact`) VALUES
  (1, 'Ravi Khadka', 'ravi2056', '$2y$12$a6P5c5yQqyUndoKz6BbC1.TB4ox4QVD.jJJ60e9v3hdbJaGWtM9Dm', 10, 2, '11/17/2056', 'Lokanthali', 'Bhaktapur', 'Male', 'Abc Xyz', 'Bcd Xyz', '9800000000'),
  (2, 'Sita Rai', 'sita2060', '$2y$12$a6P5c5yQqyUndoKz6BbC1.TB4ox4QVD.jJJ60e9v3hdbJaGWtM9Dm', 9, 5, '03/20/2060', 'Kausaltar', 'Bhaktapur', 'Female', 'Ram Rai', 'Gita Rai', '9811111111')
ON DUPLICATE KEY UPDATE
  `st_fullname` = VALUES(`st_fullname`),
  `st_password` = VALUES(`st_password`),
  `st_grade` = VALUES(`st_grade`),
  `roll_no` = VALUES(`roll_no`),
  `st_dob` = VALUES(`st_dob`),
  `st_address` = VALUES(`st_address`),
  `st_district` = VALUES(`st_district`),
  `st_gender` = VALUES(`st_gender`),
  `st_father` = VALUES(`st_father`),
  `st_mother` = VALUES(`st_mother`),
  `st_parents_contact` = VALUES(`st_parents_contact`);

INSERT INTO `subjects_info` (`id`, `subject_name`, `t_fullname`, `t_email`, `grade`, `time`) VALUES
  (1, 'Computer', 'Ravi Khadka', 'ravi@meravi.test', '10', '10:00AM - 10:45AM'),
  (2, 'Math', 'Hari Parsad Thapa', 'hari.teacher@meravi.test', '10', '10:45AM - 11:30AM'),
  (3, 'English', 'Mina Shrestha', 'mina.teacher@meravi.test', '9', '11:30AM - 12:15PM')
ON DUPLICATE KEY UPDATE
  `subject_name` = VALUES(`subject_name`),
  `t_fullname` = VALUES(`t_fullname`),
  `t_email` = VALUES(`t_email`),
  `grade` = VALUES(`grade`),
  `time` = VALUES(`time`);

INSERT INTO `sub_class_name` (`id`, `subject`, `class`) VALUES
  (1, 'English', '1'),
  (2, 'Nepali', '2'),
  (3, 'Social', '3'),
  (4, 'Computer', '4'),
  (5, 'Math', '5'),
  (6, 'Optional Math', '6'),
  (7, 'Health', '7'),
  (8, 'Grammar', '8'),
  (9, 'GK', '9'),
  (10, 'Science', '10')
ON DUPLICATE KEY UPDATE
  `subject` = VALUES(`subject`),
  `class` = VALUES(`class`);

INSERT INTO `result` (`id`, `student_name`, `student_grade`, `english`, `english2`, `math`, `math2`, `Social`, `Health`, `GK`, `Computer`, `Science`, `Nepali`, `first_term`) VALUES
  (1, 'Ravi Khadka', '10', '78', '80', '85', '82', '74', '79', '81', '90', '84', '76', 'A')
ON DUPLICATE KEY UPDATE
  `student_name` = VALUES(`student_name`),
  `student_grade` = VALUES(`student_grade`),
  `english` = VALUES(`english`),
  `english2` = VALUES(`english2`),
  `math` = VALUES(`math`),
  `math2` = VALUES(`math2`),
  `Social` = VALUES(`Social`),
  `Health` = VALUES(`Health`),
  `GK` = VALUES(`GK`),
  `Computer` = VALUES(`Computer`),
  `Science` = VALUES(`Science`),
  `Nepali` = VALUES(`Nepali`),
  `first_term` = VALUES(`first_term`);
