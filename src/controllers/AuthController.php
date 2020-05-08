<?php

namespace src\controllers;

use \core\Controller;
use \src\models\User;
use \src\helpers\AuthHelper;

class AuthController extends Controller
{
    public function login()
    {
        $msg = '';

        if (!empty($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];

            $_SESSION['msg'] = '';
        }

        $this->render('login', ['msg' => $msg]);
    }

    public function loginAction()
    {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if ($email && $password) {
            $token = AuthHelper::userVerify($email, $password);

            if (!$token) {
                $_SESSION['msg'] = 'Dados incorretos!';

                $this->redirect('/login');
            }

            $_SESSION['token'] = $token;

            $this->redirect('/');
        } else {
            $_SESSION['msg'] = 'Campos incorretos!';

            $this->redirect('/login');
        }
    }

    public function logout()
    {
        $_SESSION['token'] = '';
        
        $this->redirect('/login');
    }

    public function register()
    {
        $msg = '';

        if (!empty($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];

            $_SESSION['msg'] = '';
        }

        $this->render('register', ['msg' => $msg]);
    }

    public function registerAction()
    {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $passwordconfirm = filter_input(INPUT_POST, 'passwordconfirm');

        if ($name && $email && $password && $passwordconfirm) {
            if (AuthHelper::emailExists($email) === true) {
                $_SESSION['msg'] = 'E-mail já cadastrado!';

                $this->redirect('/register');
            }

            if ($password != $passwordconfirm) {
                $_SESSION['msg'] = 'Senhas incorretas!';

                $this->redirect('/register');
            }

            $token = AuthHelper::addUser($name, $email, $password);

            $_SESSION['token'] = $token;

            $this->redirect('/');
        } else {
            $_SESSION['msg'] = 'Campos incorretos!';

            $this->redirect('/register');
        }
    }
}
