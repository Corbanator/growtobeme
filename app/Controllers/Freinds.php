<?php

namespace App\Controllers;
use App\Models\FreindsModel;

class Freinds extends BaseController
{
    public function index()
    {
        $model = new FreindsModel();
        $session = \Config\Services::session();

        $friends = $model->getFreindList($session->get("id"));
        $pendingFriends = $model->pendingFriends($session->get("id"));

        $data = [
            "site_title" => "Friends",
            
        ];
        
        return view("friends", $data);
    }
}
