<?php

namespace App\Models;

use CodeIgniter\Model;

class ScoreModel extends Model
{
    protected $table      = 'scores';
    protected $primaryKey = 'userid';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['userid', 'gameid', 'score'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function getScoreForUser($id){
        $db = \Config\Database::connect();

        $builder = $db->table('users');
        $builder->select("username, score, gameName");
        $builder->join('scores', 'scores.userid=users.id');
        $builder->join('games', 'scores.gameId=games.id')->where("userid", $id);
        $query = $builder->get()->getResult();

        return json_decode(json_encode($query), true);
    }

    public function getScoresForGameId($id){
        $db = \Config\Database::connect();

        $builder = $db->table('scores');
        $builder->select("username, score");
        $builder->join("users", "scores.userid = users.id")->where("scores.gameid", $id);

        $query = $builder->get()->getResult();

        return json_decode(json_encode($query), true);
    }
}