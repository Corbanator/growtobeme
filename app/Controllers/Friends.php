<?php

namespace App\Controllers;

use App\Models\ScoreModel;

use App\Models\FreindsModel;

use App\Models\UserModel;

class Friends extends BaseController
{
    public function index()
    {
        $model = new FreindsModel();

        $scoreModel = new ScoreModel();

        $session = session();

        $friends = $model->getFreindList($session->get("id"));
        $pendingFriends = $model->pendingFriends($session->get("id"));
        
        $friendArray = json_decode(json_encode($friends), true);

        $scores = array();
        $user = array();

        for($i = 0; $i < count($friendArray); $i++){
            $result = $scoreModel->getScore($friendArray[$i]["friend2"]);

            $result = json_decode(json_encode($result), true);


                $user = [
                    "username" => $result[0]['username']
                ];
                
                for ($j = 0; $j < count($result); $j++){
                    $gameName = $result[$j]["gameName"]; //TODO: if person has no scores submited it will break FIX: init all games with 0
                    $score = $result[$j]["score"];

                    $userscore = [
                        "game" => $gameName,
                        "score" => $score
                    ];

                    array_push($user, $userscore);
                }
                array_push($scores, $user);

        }

        $data = [
            "site_title" => "Friends",
            "scores" => $scores,
            // "result" => $scoreModel->getScore($friendArray[1]["friend2"]) TODO: Delete this (was for debugging)

        ];
        return view("friends", $data);

    }

    public function friendRequests(){
        $session = session();
        $model = new UserModel();
        $friendModel = new FreindsModel;
        $friendName = esc(htmlspecialchars($_POST["username"]));

        $userList = $model->findAll();

        $response = array();
        $success = false;

        foreach($userList as $user){
            if ($friendName == $user["username"]){
                $success = true;
                $friendModel->makeFriends($session->get("id"), $friendName);
            }
        }

        if ($success){
            $response = [
                "success" => $success,
                "message" => "Friend Request Sent"
            ];
        }else{
            $response = [
                "success" => $success,
                "err" => "Friend Not Found"
            ];
        }

        return json_encode($response);
    }
}
