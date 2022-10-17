<?php


namespace App\Models;

class UserPetitionModel extends BaseModel
{
    protected $DBGroup = 'default';
    protected $table = 'user_petition';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['user_id', 'petition_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'int';
    protected $createdField = 'created_at';

    public function uniq($user_id, $petition_id)
    {
        $userPetition = $this
            ->where('user_id', $user_id)
            ->where('petition_id', $petition_id)
            ->findAll();
        return !$userPetition;
    }

}