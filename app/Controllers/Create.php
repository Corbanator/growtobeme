<?php

namespace App\Controllers;

class Create extends BaseController
{
    public function index()
    {
        $data = [
            "site_title"=> "Grow To Be Me"
        ];
        
        return view("create", $data);
    }
}
