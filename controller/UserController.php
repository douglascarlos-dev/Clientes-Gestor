<?php

require_once 'model/userModel.php';

class UserController{

    function isLoggedIn() {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            header("Location: ./user");
            #include_once 'view/user_login.php';
            #$this->visualizar();
        }
    }

    public function visualizar() {
        require_once 'view/user_login.php';
    }

    public function teste2() {
        unset($_SESSION['username']);
        require_once 'view/user_login.php';
    }

    //Load the view (checks for the file)
    public static function view($view, $data = []) {
        $user = new User();
        require_once 'view/user_view.php';
    }

    public function login() {
        $user = new User();
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => trim($_REQUEST['username']),
                'password' => trim($_REQUEST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];

            //Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $user->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';

                    require_once 'view/user_login.php';
                }
            } else {
                require_once 'view/user_login.php';
            }

        }
    }

    public function createUserSession($user) {
        $_SESSION['username'] = $user["username"];
        require_once 'view/user_view.php';
    }

    public function logout() {
        unset($_SESSION['username']);
        header("Location: ./");
    }
}
?>