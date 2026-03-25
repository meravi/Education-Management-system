<?php

if (!defined('APP_BASE_PATH')) {
    define('APP_BASE_PATH', dirname(__DIR__));
}

if (!function_exists('app_path')) {
    function app_path($path = '')
    {
        $basePath = APP_BASE_PATH;

        if ($path === '') {
            return $basePath;
        }

        return $basePath . '/' . ltrim($path, '/');
    }
}

if (!function_exists('app_load_env')) {
    function app_load_env($filePath)
    {
        static $loaded = false;

        if ($loaded || !is_file($filePath) || !is_readable($filePath)) {
            return;
        }

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($lines === false) {
            return;
        }

        foreach ($lines as $line) {
            $line = trim($line);

            if ($line === '' || strpos($line, '#') === 0) {
                continue;
            }

            $parts = explode('=', $line, 2);

            if (count($parts) !== 2) {
                continue;
            }

            $name = trim($parts[0]);
            $value = trim($parts[1]);

            if ($name === '') {
                continue;
            }

            $valueLength = strlen($value);

            if (
                $valueLength >= 2 &&
                (
                    ($value[0] === '"' && $value[$valueLength - 1] === '"') ||
                    ($value[0] === "'" && $value[$valueLength - 1] === "'")
                )
            ) {
                $value = substr($value, 1, -1);
            }

            if (getenv($name) === false) {
                putenv($name . '=' . $value);
            }

            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }

        $loaded = true;
    }
}

app_load_env(app_path('.env'));

if (!function_exists('app_env')) {
    function app_env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false || $value === null || $value === '') {
            if (array_key_exists($key, $_ENV) && $_ENV[$key] !== '') {
                return $_ENV[$key];
            }

            return $default;
        }

        return $value;
    }
}

if (!function_exists('app_session_start')) {
    function app_session_start()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            return;
        }

        $secure = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';

        ini_set('session.use_only_cookies', '1');
        ini_set('session.use_strict_mode', '1');

        if (PHP_VERSION_ID >= 70300) {
            session_set_cookie_params(
                array(
                    'lifetime' => 0,
                    'path' => '/',
                    'domain' => '',
                    'secure' => $secure,
                    'httponly' => true,
                    'samesite' => 'Lax',
                )
            );
        } else {
            session_set_cookie_params(0, '/; samesite=Lax', '', $secure, true);
        }

        session_start();
    }
}

if (!function_exists('app_redirect')) {
    function app_redirect($path)
    {
        header('Location: ' . $path);
        exit;
    }
}

if (!function_exists('app_post')) {
    function app_post($key, $default = '')
    {
        if (!isset($_POST[$key])) {
            return $default;
        }

        return is_string($_POST[$key]) ? trim($_POST[$key]) : $_POST[$key];
    }
}

if (!function_exists('app_get')) {
    function app_get($key, $default = '')
    {
        if (!isset($_GET[$key])) {
            return $default;
        }

        return is_string($_GET[$key]) ? trim($_GET[$key]) : $_GET[$key];
    }
}

if (!function_exists('app_get_int')) {
    function app_get_int($key, $default = 0)
    {
        $value = app_get($key, $default);

        return filter_var($value, FILTER_VALIDATE_INT) !== false ? (int) $value : (int) $default;
    }
}

if (!function_exists('app_title_label')) {
    function app_title_label($value)
    {
        return strtoupper(str_replace(array('-', '_'), ' ', trim((string) $value)));
    }
}

if (!function_exists('e')) {
    function e($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

class project2
{
    public $server;
    public $port;
    public $username;
    public $password;
    public $dbname;
    public $connectdb;

    public function __construct()
    {
        $this->server = app_env('DB_HOST', '127.0.0.1');
        $this->port = (int) app_env('DB_PORT', '3306');
        $this->username = app_env('DB_USER', 'root');
        $this->password = app_env('DB_PASS', '');
        $this->dbname = app_env('DB_NAME', 'project2');

        mysqli_report(MYSQLI_REPORT_OFF);
        $this->connectdb = @new mysqli(
            $this->server,
            $this->username,
            $this->password,
            $this->dbname,
            $this->port
        );

        if ($this->connectdb->connect_errno) {
            die('Database connection failed. Check your .env settings and imported database.');
        }

        $this->connectdb->set_charset('utf8mb4');
    }

    public function hackme()
    {
        return $this->connectdb;
    }

    private function inferTypes(array $params)
    {
        $types = '';

        foreach ($params as $value) {
            if (is_int($value)) {
                $types .= 'i';
            } elseif (is_float($value)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }
        }

        return $types;
    }

    private function bindParams($stmt, array $params)
    {
        if (empty($params)) {
            return true;
        }

        $bindValues = array($this->inferTypes($params));

        foreach ($params as $index => $value) {
            $bindValues[$index + 1] = $value;
        }

        $references = array();

        foreach ($bindValues as $index => $value) {
            $references[$index] = &$bindValues[$index];
        }

        return call_user_func_array(array($stmt, 'bind_param'), $references);
    }

    private function runStatement($sql, array $params = array())
    {
        $stmt = $this->connectdb->prepare($sql);

        if ($stmt === false) {
            return false;
        }

        if (!$this->bindParams($stmt, $params)) {
            $stmt->close();

            return false;
        }

        if (!$stmt->execute()) {
            $stmt->close();

            return false;
        }

        return $stmt;
    }

    private function fetchResult($sql, array $params = array())
    {
        $stmt = $this->runStatement($sql, $params);

        if ($stmt === false) {
            return false;
        }

        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }

    private function fetchRow($sql, array $params = array())
    {
        $result = $this->fetchResult($sql, $params);

        if ($result === false) {
            return false;
        }

        return $result->fetch_assoc();
    }

    private function execute($sql, array $params = array())
    {
        $stmt = $this->runStatement($sql, $params);

        if ($stmt === false) {
            return false;
        }

        $success = $stmt->affected_rows >= 0;
        $stmt->close();

        return $success;
    }

    private function hasActiveTransaction()
    {
        return method_exists($this->connectdb, 'begin_transaction');
    }

    private function begin()
    {
        if ($this->hasActiveTransaction()) {
            $this->connectdb->begin_transaction();
        }
    }

    private function commit()
    {
        if ($this->hasActiveTransaction()) {
            $this->connectdb->commit();
        }
    }

    private function rollback()
    {
        if ($this->hasActiveTransaction()) {
            $this->connectdb->rollback();
        }
    }

    private function isPasswordHash($value)
    {
        return is_string($value) && preg_match('/^\$(2y|argon2i|argon2id)\$/', $value) === 1;
    }

    private function passwordHash($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }

    private function verifyPassword($plainPassword, $storedPassword)
    {
        if ($this->isPasswordHash($storedPassword)) {
            return password_verify($plainPassword, $storedPassword);
        }

        return hash_equals((string) $storedPassword, (string) $plainPassword);
    }

    private function maybeUpgradePassword($table, $idColumn, $idValue, $passwordColumn, $plainPassword, $usernameColumn = null, $username = null)
    {
        if ($plainPassword === '') {
            return;
        }

        $hashedPassword = $this->passwordHash($plainPassword);
        $sql = 'UPDATE `' . $table . '` SET `' . $passwordColumn . '` = ? WHERE `' . $idColumn . '` = ?';
        $params = array($hashedPassword, $idValue);

        $this->execute($sql, $params);

        if ($table === 'meadmin' && $usernameColumn !== null && $username !== null) {
            $this->execute(
                'UPDATE teacher_info SET t_pass = ? WHERE `' . $usernameColumn . '` = ? AND t_staff_type = ?',
                array($hashedPassword, $username, 'Admin')
            );
        }
    }

    private function normalizeIdentifier($value, $prefix)
    {
        $normalized = strtolower(trim((string) $value));
        $normalized = preg_replace('/[^a-z0-9_]+/', '_', $normalized);
        $normalized = trim($normalized, '_');

        if ($normalized === '') {
            $normalized = $prefix;
        }

        if (preg_match('/^[0-9]/', $normalized) === 1) {
            $normalized = $prefix . '_' . $normalized;
        }

        return $normalized;
    }

    public function student_login_check($st_username, $st_password)
    {
        $student = $this->fetchRow(
            'SELECT st_id, st_username, st_password FROM st_info WHERE st_username = ? LIMIT 1',
            array($st_username)
        );

        if (!$student || !$this->verifyPassword($st_password, $student['st_password'])) {
            return 0;
        }

        if (!$this->isPasswordHash($student['st_password']) || password_needs_rehash($student['st_password'], PASSWORD_DEFAULT)) {
            $this->maybeUpgradePassword('st_info', 'st_id', (int) $student['st_id'], 'st_password', $st_password);
        }

        return 1;
    }

    public function student_info_select($st_username)
    {
        return $this->fetchResult(
            'SELECT * FROM st_info WHERE st_username = ? LIMIT 1',
            array($st_username)
        );
    }

    public function student_count()
    {
        return $this->connectdb->query('SELECT st_id FROM st_info');
    }

    public function meadmin_check($admin_username, $admin_password)
    {
        $admin = $this->fetchRow(
            'SELECT id, admin_username, admin_password FROM meadmin WHERE admin_username = ? LIMIT 1',
            array($admin_username)
        );

        if (!$admin || !$this->verifyPassword($admin_password, $admin['admin_password'])) {
            return 0;
        }

        if (!$this->isPasswordHash($admin['admin_password']) || password_needs_rehash($admin['admin_password'], PASSWORD_DEFAULT)) {
            $this->maybeUpgradePassword(
                'meadmin',
                'id',
                (int) $admin['id'],
                'admin_password',
                $admin_password,
                't_username',
                $admin_username
            );
        }

        return 1;
    }

    public function meadmin_username($adminname)
    {
        return $this->fetchResult(
            'SELECT * FROM meadmin WHERE admin_username = ? LIMIT 1',
            array($adminname)
        );
    }

    public function meadmin_updatepassword($currentUsername, $newUsername, $newPassword)
    {
        $admin = $this->fetchRow(
            'SELECT id FROM meadmin WHERE admin_username = ? LIMIT 1',
            array($currentUsername)
        );

        if (!$admin) {
            return false;
        }

        $hashedPassword = $this->passwordHash($newPassword);

        $this->begin();

        $updatedAdmin = $this->execute(
            'UPDATE meadmin SET admin_username = ?, admin_password = ? WHERE id = ?',
            array($newUsername, $hashedPassword, (int) $admin['id'])
        );

        $updatedTeacher = $this->execute(
            'UPDATE teacher_info SET t_username = ?, t_pass = ? WHERE t_username = ? AND t_staff_type = ?',
            array($newUsername, $hashedPassword, $currentUsername, 'Admin')
        );

        if ($updatedAdmin === false || $updatedTeacher === false) {
            $this->rollback();

            return false;
        }

        $this->commit();

        return true;
    }

    public function teacher_info($adminname, $t_staff_type)
    {
        if ($t_staff_type !== 'Admin' && $t_staff_type !== 'Teacher') {
            return $this->connectdb->query('SELECT * FROM teacher_info WHERE 1 = 0');
        }

        return $this->fetchResult(
            'SELECT * FROM teacher_info WHERE t_staff_type = ? AND t_username = ? LIMIT 1',
            array($t_staff_type, $adminname)
        );
    }

    public function teacher_info_display_admin()
    {
        return $this->connectdb->query('SELECT * FROM teacher_info ORDER BY t_fullname ASC');
    }

    public function teacher_info_instudent($st_grade)
    {
        return $this->fetchResult(
            'SELECT * FROM subjects_info WHERE grade = ? ORDER BY subject_name ASC',
            array((string) $st_grade)
        );
    }

    public function student_password_change($st_password_update, $st_username)
    {
        $hashedPassword = $this->passwordHash($st_password_update);

        return $this->execute(
            'UPDATE st_info SET st_password = ? WHERE st_username = ?',
            array($hashedPassword, $st_username)
        );
    }

    public function subject_info()
    {
        return $this->connectdb->query('SELECT * FROM subjects_info ORDER BY grade ASC, subject_name ASC');
    }

    public function edit_teacherid($teacher_id)
    {
        return $this->fetchResult(
            'SELECT * FROM teacher_info WHERE t_id = ? LIMIT 1',
            array((int) $teacher_id)
        );
    }

    public function update_teacher_info($up_fullname, $up_address, $up_email, $up_father, $up_mother, $up_dob, $up_qualification, $up_contact, $up_staff, $up_gender, $teacher_id)
    {
        return $this->execute(
            'UPDATE teacher_info SET t_fullname = ?, t_address = ?, t_email = ?, t_father = ?, t_mother = ?, t_dob = ?, t_qualification = ?, t_contact = ?, t_staff_type = ?, t_gender = ? WHERE t_id = ?',
            array(
                $up_fullname,
                $up_address,
                $up_email,
                $up_father,
                $up_mother,
                $up_dob,
                $up_qualification,
                $up_contact,
                $up_staff,
                $up_gender,
                (int) $teacher_id
            )
        );
    }

    public function add_teacher($add_t_fullname, $add_t_address, $add_t_email, $add_t_username, $add_t_pass, $add_t_father, $add_t_mother, $add_t_dob, $add_t_qualification, $add_t_contact, $add_t_staff, $add_t_gender)
    {
        $hashedPassword = $this->passwordHash($add_t_pass);
        $staffType = trim($add_t_staff);

        $this->begin();

        $teacherAdded = $this->execute(
            'INSERT INTO teacher_info (t_fullname, t_address, t_email, t_username, t_pass, t_father, t_mother, t_dob, t_qualification, t_contact, t_staff_type, t_gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            array(
                $add_t_fullname,
                $add_t_address,
                $add_t_email,
                $add_t_username,
                $hashedPassword,
                $add_t_father,
                $add_t_mother,
                $add_t_dob,
                $add_t_qualification,
                $add_t_contact,
                $staffType,
                $add_t_gender
            )
        );

        if ($teacherAdded === false) {
            $this->rollback();

            return false;
        }

        if (strcasecmp($staffType, 'Admin') === 0) {
            $existingAdmin = $this->fetchRow(
                'SELECT id FROM meadmin WHERE admin_username = ? LIMIT 1',
                array($add_t_username)
            );

            if ($existingAdmin) {
                $adminSaved = $this->execute(
                    'UPDATE meadmin SET admin_password = ?, t_staff_type = ? WHERE id = ?',
                    array($hashedPassword, 'Admin', (int) $existingAdmin['id'])
                );
            } else {
                $adminSaved = $this->execute(
                    'INSERT INTO meadmin (admin_username, admin_password, t_staff_type) VALUES (?, ?, ?)',
                    array($add_t_username, $hashedPassword, 'Admin')
                );
            }

            if ($adminSaved === false) {
                $this->rollback();

                return false;
            }
        }

        $this->commit();

        return true;
    }

    public function delete_teacher($del_teacher)
    {
        $teacher = $this->fetchRow(
            'SELECT t_username, t_staff_type FROM teacher_info WHERE t_id = ? LIMIT 1',
            array((int) $del_teacher)
        );

        if (!$teacher) {
            return false;
        }

        $this->begin();

        $teacherDeleted = $this->execute(
            'DELETE FROM teacher_info WHERE t_id = ?',
            array((int) $del_teacher)
        );

        if ($teacherDeleted === false) {
            $this->rollback();

            return false;
        }

        if (strcasecmp($teacher['t_staff_type'], 'Admin') === 0) {
            $adminDeleted = $this->execute(
                'DELETE FROM meadmin WHERE admin_username = ?',
                array($teacher['t_username'])
            );

            if ($adminDeleted === false) {
                $this->rollback();

                return false;
            }
        }

        $this->commit();

        return true;
    }

    public function grade($grade)
    {
        return $this->connectdb->query('SELECT class FROM sub_class_name ORDER BY CAST(class AS UNSIGNED), class ASC');
    }

    public function grade_st_info($grade_st_data)
    {
        return $this->fetchResult(
            'SELECT * FROM st_info WHERE st_grade = ? ORDER BY roll_no ASC, st_fullname ASC',
            array((int) $grade_st_data)
        );
    }

    public function student_info_display_admin($class_students_data)
    {
        return $this->fetchResult(
            'SELECT * FROM st_info WHERE st_grade = ? ORDER BY roll_no ASC, st_fullname ASC',
            array((int) $class_students_data)
        );
    }

    public function add_student($std_fullname, $std_username, $std_password, $std_grade, $std_roll, $std_dob, $std_address, $std_district, $std_gender, $std_father, $std_mother, $std_parent_contact)
    {
        $hashedPassword = $this->passwordHash($std_password);

        return $this->execute(
            'INSERT INTO st_info (st_fullname, st_username, st_password, st_grade, roll_no, st_dob, st_address, st_district, st_gender, st_father, st_mother, st_parents_contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            array(
                $std_fullname,
                $std_username,
                $hashedPassword,
                (int) $std_grade,
                (int) $std_roll,
                $std_dob,
                $std_address,
                $std_district,
                $std_gender,
                $std_father,
                $std_mother,
                $std_parent_contact
            )
        );
    }

    public function general_setting($web_name, $web_address, $web_phone1, $web_phone2, $web_email1, $web_email2, $web_start, $web_about)
    {
        return $this->execute(
            'INSERT INTO general_setting (website_name, website_address, website_phone1, website_phone2, website_email1, website_email2, website_start, web_about) VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
            array($web_name, $web_address, $web_phone1, $web_phone2, $web_email1, $web_email2, $web_start, $web_about)
        );
    }

    public function general_setting_check()
    {
        return $this->connectdb->query('SELECT * FROM general_setting ORDER BY id DESC LIMIT 1');
    }

    public function general_setting_update($upweb_name, $upweb_address, $upweb_phone1, $upweb_phone2, $upweb_email1, $upweb_email2, $upweb_start, $upweb_about)
    {
        $currentSettings = $this->fetchRow('SELECT id FROM general_setting ORDER BY id DESC LIMIT 1');

        if (!$currentSettings) {
            return $this->general_setting(
                $upweb_name,
                $upweb_address,
                $upweb_phone1,
                $upweb_phone2,
                $upweb_email1,
                $upweb_email2,
                $upweb_start,
                $upweb_about
            );
        }

        return $this->execute(
            'UPDATE general_setting SET website_name = ?, website_address = ?, website_phone1 = ?, website_phone2 = ?, website_email1 = ?, website_email2 = ?, website_start = ?, web_about = ? WHERE id = ?',
            array(
                $upweb_name,
                $upweb_address,
                $upweb_phone1,
                $upweb_phone2,
                $upweb_email1,
                $upweb_email2,
                $upweb_start,
                $upweb_about,
                (int) $currentSettings['id']
            )
        );
    }

    public function meravi_add_table($Nepdev_table_Name, $Nepdev_student_name, $Nepdev_student_grade, $Nepdev_subject1, $Nepdev_subject2, $Nepdev_subject3, $Nepdev_subject4, $Nepdev_subject5, $Nepdev_subject6, $Nepdev_subject7, $Nepdev_subject8, $Nepdev_subject9, $Nepdev_subject10, $Nepdev_subject11)
    {
        $tableName = $this->normalizeIdentifier($Nepdev_table_Name, 'result_table');
        $columns = array(
            $this->normalizeIdentifier($Nepdev_student_name, 'student_name'),
            $this->normalizeIdentifier($Nepdev_student_grade, 'student_grade'),
            $this->normalizeIdentifier($Nepdev_subject1, 'subject_1'),
            $this->normalizeIdentifier($Nepdev_subject2, 'subject_2'),
            $this->normalizeIdentifier($Nepdev_subject3, 'subject_3'),
            $this->normalizeIdentifier($Nepdev_subject4, 'subject_4'),
            $this->normalizeIdentifier($Nepdev_subject5, 'subject_5'),
            $this->normalizeIdentifier($Nepdev_subject6, 'subject_6'),
            $this->normalizeIdentifier($Nepdev_subject7, 'subject_7'),
            $this->normalizeIdentifier($Nepdev_subject8, 'subject_8'),
            $this->normalizeIdentifier($Nepdev_subject9, 'subject_9'),
            $this->normalizeIdentifier($Nepdev_subject10, 'subject_10'),
            $this->normalizeIdentifier($Nepdev_subject11, 'subject_11'),
        );

        if (count($columns) !== count(array_unique($columns))) {
            return false;
        }

        $query = 'CREATE TABLE `' . $tableName . '` (`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY';

        foreach ($columns as $column) {
            $query .= ', `' . $column . '` VARCHAR(250) NULL';
        }

        $query .= ') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4';

        return $this->connectdb->query($query);
    }

    public function Nepdev_Exam_Term($Nepdev_exam_term)
    {
        $existingTerm = $this->fetchRow(
            'SELECT id FROM exam_term WHERE name = ? LIMIT 1',
            array($Nepdev_exam_term)
        );

        if ($existingTerm) {
            return false;
        }

        return $this->execute(
            'INSERT INTO exam_term (name) VALUES (?)',
            array($Nepdev_exam_term)
        );
    }
}

$ravi = new project2();
