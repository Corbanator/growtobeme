<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        $username = $_POST['username'];
        $spass = $_POST['password']; //TODO: set up sanitazation rules

        $password = hash("sha256", $spass, False);

        $model = new UserModel();
        
        $dpass = $model->findColumn("password");
        $dusr = $model->findColumn("username");

        $success = False;
        $error = "";

        for ($i = 0;$i < count($dusr); $i++){
            
            if ($dpass[$i] == $password){
                $success = True;
            }else{
                $error = "Password is incorrect";
                break;
            }

            if ($success == True){
                if ($dusr[$i] == $username){
                    $success = True;
                }else{
                    $success = False;
                    $error = "Username is Incorrect";
                    break;
                }
            }
        }


        $response = [
            "success"=> $success,
            "error"=> $error
        ];

        return json_encode($response);
    }
}
