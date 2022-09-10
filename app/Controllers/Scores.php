<?php

namespace App\Controllers;

class Scores extends BaseController
{
    public function index()
    {
       redirect(base_url() . "/");
    }

    public function game($id){
        return $id; //TODO: Sanitization here otherwise bad things
    }
}