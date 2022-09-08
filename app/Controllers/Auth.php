<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $username = $_POST['username'];
        $password = $_POST['password']; //TODO: set up validation rules

        echo "working";
    }
}
