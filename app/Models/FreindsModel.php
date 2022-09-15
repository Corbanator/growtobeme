<?php

namespace App\Models;

use CodeIgniter\Model;

class FreindsModel extends Model
{
    protected $table      = 'friends';
    protected $primaryKey = 'friend1';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['friend1', 'friend2', 'accepted'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function getFreindList($id){
        $db = \Config\Database::connect();
        $union   = $db->table('friendList')->select('accepted, friend1')->where("friend2", $id)->where("accepted", 1);
        $builder = $db->table('friendLIst')->select('accepted, friend2')->where("friend1", $id)->where("accepted", 1);

        $query = $builder->union($union)->get()->getResult();

        return $query;
    }

    public function pendingFriends($id)
    {
        $db = \Config\Database::connect();
        // $union   = $db->table('friendList')->select('accepted, friend1')->where("friend2", $id)->where("accepted", 0);
        // $builder = $db->table('friendLIst')->select('accepted, friend2')->where("friend1", $id)->where("accepted", 0);

        // $query = $builder->union($union)->get()->getResult();

        $builder = $db->table("friendList");
        $builder->select("friend1")->where("friend2", $id)->where("accepted", 0);
        
        $query = $builder->get()->getResult();

        return $query;
    }

    public function makeFriends($reqId, $frId){ //TODO: check if request is already sent
        $db = \Config\Database::connect();
        $builder = $db->table("friendlist");

        $data = [
            "friend1" => $reqId,
            "friend2" => $this->getIdFromUser($frId)
        ];

        $builder->insert($data);
    }

    public function getIdFromUser($username){
        $db = \Config\Database::connect();
        $builder = $db->table("users");
        $userList = $builder->get()->getResult();
        $userList = json_decode(json_encode($userList), true);

        $id = 0;

        foreach($userList as $user){
            if ($user["username"] == $username){
                $id = $user["id"];
            }
        }
        
        return $id;
    }
}
