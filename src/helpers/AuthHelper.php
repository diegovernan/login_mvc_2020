<?php

namespace src\helpers;

use \src\models\User;

class AuthHelper
{
    public static function checkLogin()
    {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->first();

            if (count($data) > 0) {
                $loggedUser = new User();
                $loggedUser->id = $data['id'];
                $loggedUser->id = $data['name'];
                $loggedUser->id = $data['email'];

                return $loggedUser;
            }
        }

        return false;
    }
}
