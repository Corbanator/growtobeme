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

        // foreach($friendArray as $friend){
        // //     $score = [
        // //         "username" => $userModel->select("username")->where("id", $friend['friend2'])->get()->getResult(),
        // //         "game" => $scoreModel->select("gameid")->where("userid", $friend['friend2'])->get()->getResult(),
        // //         "score" => $scoreModel->select("score")->where("userid", $friend['friend2'])->get()->getResult()
        // //     ];

        // //     array_push($scores, $score);
        // }

        $stuff = $scoreModel->getScore(1);

        $data = [
            "site_title" => "Friends",
            "scores" => json_encode($stuff)
        ];
        
        return view("friends", $data);
    }
}
