<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function isAdult($birthdate) {
        $age = date_diff(date_create($birthdate), date_create("today"))->y;
        return $age >= 18;
    }

    public function register($data) {
        $first = $data['first'];
        $last = $data['last'];
        $birthdate = $data['birthdate'];
        $email = $data['email'];
        $username = $data['username'];
        $pass = password_hash($data['password'], PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO users(first_name,last_name,birthdate,email,username,password)
                                      VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $first, $last, $birthdate, $email, $username, $pass);

        return $stmt->execute();
    }

    public function login($usernameOrEmail, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users 
            WHERE username=? OR email=? LIMIT 1");
        $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
?>
