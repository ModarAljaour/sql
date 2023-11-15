<?php
// modar
// asd
session_start();
require('conn.php');
class user
{
    private $db;
    private $username;
    private $password;
    private $role;
    public function __construct()
    {
        $db = Database::getInstance();
        $this->db = $db->getConnection();
    }
    public function register($username, $password, $role) //... Register 
    {
        $this->username = $username;
        $this->password = $password;

        $this->role = ($role == 'normal') ? 0 : 1;

        $existingUser = $this->db->get('users', "username = '{$this->username}'");

        if (!empty($existingUser)) {
            return false; // المستخدم موجود بالفعل
        }

        // إذا وصلنا هنا، يمكننا إجراء عملية الإدراج
        $data = [
            'username' => $this->username,
            'password' => $this->password,
            'role' => $this->role ? 1 : 0, // تحويل القيمة إلى 1 أو 0
        ];

        return $this->db->insert('users', $data);
    }

    public function login($username, $password) // ........ Log In ...........
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $user = $this->db->get("users");
        if (!empty($user)) {
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['username'];
            $_SESSION['password'] = $user[0]['password'];
            $_SESSION['role'] = ($user[0]['role'] == 'user') ? 0 : 1; // حفظ الدور في الجلسة
            return true;
        } else {
            return false;
        }
    }
    public function getOneUser($username)
    {
        $this->db->where("username", $username);
        return $this->db->getOne("users");
    }
}
// $u = new user();
// $u->login('rana', 'rrrr');
