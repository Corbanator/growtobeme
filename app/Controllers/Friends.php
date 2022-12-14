<?php

namespace App\Controllers;

use App\Models\ScoreModel;

use App\Models\FreindsModel;

use App\Models\UserModel;

class Friends extends BaseController
{
    public function index()
    {
        $friendModel = new FreindsModel();
        $userModel = new UserModel();
        $scoreModel = new ScoreModel();

        $session = session();
        $id = $session->get("id");

        $friends = $friendModel->getFreindList($session->get("id"));
        $pendingFriends = $friendModel->pendingFriends($session->get("id"));
        
        $pendingFriends = json_decode(json_encode($pendingFriends), true);

        $requestedFriends = array();

        foreach($pendingFriends as $maybeFriend){
            $friend = [
                "username" => $userModel->find($maybeFriend["friend1"])["username"]
            ];
            array_push($requestedFriends, $friend);
        }

        //gets the scores for already friends
        $friendArray = json_decode(json_encode($friends), true);
    
        $scores = array();
        $user = array();

        for($i = 0; $i < count($friendArray); $i++){
            $result = $scoreModel->getScoreForUser($friendArray[$i]["friend2"]);


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
            "pendingFreinds" => $requestedFriends

        ];
        return view("friends", $data);

    } 

    public function friendRequests(){
        $session = session();
        $model = new UserModel();
        $friendModel = new FreindsModel;
        if (isset($_POST["type"])){
            $friendName = esc(htmlspecialchars($_POST["username"]));
            $id = $session->get("id");

            if ($_POST['type'] == "request"){

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

            if ($_POST['type'] == "accept") {
                $friendId = $friendModel->getIdFromUser($friendName);
                $thing = $friendModel->acceptFriends($session->get("id"), $friendId);

                return $thing;
            }

            if ($_POST['type'] == "decline") {
                $friendId = $friendModel->getIdFromUser($friendName);
                $thing = $friendModel->declineFriends($session->get("id"), $friendId);

                return "success";
            }
        }
    }
}
