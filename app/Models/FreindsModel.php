<?php

namespace App\Models;

use CodeIgniter\Model;

class FreindsModel extends Model
{
    protected $table      = 'freinds';
    protected $primaryKey = 'freind1';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['freind1', 'freind2', 'accepted'];

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
        $union   = $db->table('friendList')->select('accepted, friend1')->where("friend2", $id)->where("accepted", 0);
        $builder = $db->table('friendLIst')->select('accepted, friend2')->where("friend1", $id)->where("accepted", 0);

        $query = $builder->union($union)->get()->getResult();

        return $query;
    }
}
