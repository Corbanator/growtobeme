<?php

namespace App\Controllers;

use App\Models\ScoreModel;

use App\Models\FreindsModel;

class Freinds extends BaseController
{
    public function index()
    {
        $model = new FreindsModel();

        $scoreModel = new ScoreModel();

        $session = \Config\Services::session();

        $friends = $model->getFreindList($session->get("id"));
        $pendingFriends = $model->pendingFriends($session->get("id"));
        
        $friendArray = json_decode(json_encode($friends), true);

        $scores = array();

        for($i = 0; $i < count($friendArray); $i++){
            $result = $scoreModel->getScore($friendArray[$i]["friend2"]);

            $result = json_decode(json_encode($result), true);

            $username = $result[0]["username"];
            $gameName = $result[0]["gameName"];
            $score = $result[0]["score"];

            $score = [
                "username" => $username,
                "game" => $gameName,
                "score" => $score
            ];

            array_push($scores, $score);
        }

        $data = [
            "site_title" => "Friends",
            "scores" => json_encode($scores)
        ];
        
        return view("friends", $data);
    }
}
