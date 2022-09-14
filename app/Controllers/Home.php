<?php namespace App\Controllers;

use App\Models\GameModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new GameModel();
        $session = \Config\Services::session();

        $cards = $model->findAll();

        $data = [
            "site_title" => "Grow To Be Me",
            "cards" => $cards,
        ];


        if ($this->request->getMethod() == 'post'){
            if ($this->authenticate()){
                $data = [
                    'signin' => True,
                    'username' => $session->get('username'),
                    "site_title" => "Grow To Be Me",
                    "cards" => $cards
                ];
                return view('indexVeiw', $data);
            }else{
                $data = [
                    'signin' => False,
                    "site_title" => "Grow To Be Me",
                    "cards" => $cards,
                    'error' => "Username or Password is Incorrect"
                ];
                return view('indexVeiw', $data);
            }
        }

        if ($session->get('logedIn') == True){
            $data = [
                'signin' => $session->get("logedIn"),
                'username' => $session->get('username'),
                "site_title" => "Grow To Be Me",
                "cards" => $cards
            ];
            return view('indexVeiw', $data);
        }


        return view('indexVeiw', $data);
    }

    private function authenticate(){
        $session = \Config\Services::session();
        $username = esc(htmlspecialchars($_POST['username']));
        $spass = esc(htmlspecialchars($_POST['password']));

        $password = hash("sha256", $spass, False);
        
        $model = new UserModel();
        
        $dpass = $model->findColumn("password");
        $dusr = $model->findColumn("username");
        $ids = $model->findColumn('id');

        $success = False;
        $error = "";
        $id = 0;

        for ($i = 0; $i < count($ids); $i++){
            if ($password == $model->find($ids[$i])['password']){
                if ($username == $model->find($ids[$i])["username"]){
                    $success = True;
                    $id = $ids[$i];
                }
            }
        }


        if ($success){
            $data = [
                "username" => $model->find($id)["username"],
                "id" => $id,
                "logedIn" => True
            ];
            $session->set($data);
        }

        return $success;
    }
} 
