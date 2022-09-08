<?php namespace App\Controllers;

use App\Models\GameModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new GameModel();

        $cards = $model->findAll();

        $data = [
            "site_title" => "Grow To Be Me",
            "cards" => $cards
        ];
        return view('indexVeiw', $data);
    }
} 
