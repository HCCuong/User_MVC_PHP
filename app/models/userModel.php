<?php

class userModel extends Model
{
    private $id;
    private $fullname;
    private $email;
    private $password;
    private $role;
    protected $_table = 'users';

    public function __construct()
    {
        parent::__construct();
    }


    public function set($id, $fullname, $email, $password, $role)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    // Get user id
    public function getId()
    {
        return $this->id;
    }

    // Set user id
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    // Get fullname
    public function getFullName()
    {
        return $this->fullname;
    }

    // Set fullname
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    // Get email
    public function getEmail()
    {
        return $this->email;
    }

    // Set email
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    // Get password
    public function getPassword()
    {
        return $this->password;
    }

    // Set password
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    // Get role
    public function getRole()
    {
        return $this->role;
    }

    // Set role
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }



    // Get all users
    public function getList()
    {
        $data = $this->db->query("SELECT * FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Add new user
    public static function addNew($user)
    {
        $fullname = $user->getFullname();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $conn = connectDB::connect("root", "");
        $sql = "INSERT INTO users VALUES (NULL, '{$fullname}', '{$email}', '{$password}', 1)";
        $value = $conn->query($sql);

        $conn->close();

        if ($value) return 1;
        return 0;
    }

    // Login user
    public static function login($email, $password)
    {
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";

        $result = $conn->query($sql);

        $row = $result->fetch_array();

        if ($result->num_rows == 1) return 1;
        return 0;
    }

    // Get user by id
    public static function getByID($id)
    {
        $conn = connectDB::connect("root", "");

        $sql = "SELECT * FROM users WHERE id = $id";

        $result = $conn->query($sql);

        $conn->close();

        return $result;
    }


    // Update user
    public static function updateUser($user)
    {
        $id = $user->getId();
        $fullname = $user->getfullname();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $role = $user->getRole();

        $conn = connectDB::connect("root", "");

        $sql = "UPDATE users SET fullname = '{$fullname}', email = '{$email}', password = '{$password}', role = $role 
                WHERE id = $id";
        $value = $conn->query($sql);

        if ($value) return 1;
        return 0;
    }

    // Update role for user
    public static function updateRole($user_id, $role)
    {
        $conn = connectDB::connect("root", "");
        $updated_at = date("Y-m-d");
        $sql = "UPDATE users SET role = $role, WHERE id=$user_id";
        $result = $conn->query($sql);
        $conn->close();
        if ($result) return 1;
        return 0;
    }

    // Delete user by id
    public static function deleteUserById($id)
    {
        $conn = connectDB::connect("root", "");

        $sql = "DELETE FROM users WHERE id = $id";

        $result = $conn->query($sql);

        $conn->close();

        if ($result) return 1;
        return 0;
    }
}
