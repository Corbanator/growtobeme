<?php

namespace App\Controllers;

class Hashtest extends BaseController
{
    public function index()
    {
       echo hash("sha256", "129034", False);
    }
}
