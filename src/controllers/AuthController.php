<?php

namespace src\controllers;

use \core\Controller;
use \src\models\User;

class AuthController extends Controller
{
    public function login()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }
}
