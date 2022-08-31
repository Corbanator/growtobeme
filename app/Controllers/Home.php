<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $cards = [["title" => "Game1", "content"=> "This is Game 1", "id"=> 1], ["title"=> "Game2", "content"=> "This is Game 2", "id" => 2], ["title" => "Game3", "content" => "This is Game 3", "id" => 3], ["title" => "Game4", "content" => "This is Game 4", "id" => 4]];
        
        $data = [
            "site_title" => "Grow To Be Me",
            "cards" => $cards
        ];
        
        echo view('indexVeiw', $data);
    }
}
