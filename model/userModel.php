<?php
include_once 'connection.php';

class User extends Connection {
    private $id;
    private $username;
    private $password;

    function login($username, $password){

        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = '$username' LIMIT 1"); 
        $stmt->execute(); 
        $row = $stmt->fetch();

        $hashedPassword = $row["password"] ?? 'default value';

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

}
?>