<?php

namespace src\controllers;

use \core\Controller;
use \src\helpers\AuthHelper;

class HomeController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = AuthHelper::checkLogin();

        if ($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->render('home');
    }
}
