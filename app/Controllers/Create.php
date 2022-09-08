<?php

namespace App\Controllers;

class Create extends BaseController
{
    public function index()
    {
        $data = [
            "site_title"=> "Grow To Be Me"
        ];

        if ($this->request->getMethod() == 'post'){
            helper(['form']);

            $rules = [
                'email' => 'required'
            ];

            if ($this->validate($rules)){
                //db insertion
            }else{
                $data = [
                    "site_title" => "Grow To Be Me",
                    'validation' => $this->validator
                ];
            }
        }

        return view("create", $data);
    }

}