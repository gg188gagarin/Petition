<?php

namespace App\Models;

class PetitionModel extends BaseModel
{
    protected $DBGroup = 'default';
    protected $table = 'petition';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['name', 'description'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'int';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'name' => 'required',
        'description' => 'required'
    ];
    protected $validationMessages = [
        'name' => [
            'required' => "Please, write name of your petition"
        ],
        'description' => [
            'required' => "Please, write description of your petition"
        ]
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = ['setUserId', 'setStatus'];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    protected function setUserId(array $data):array
    {
        $data['data']['user_id'] = session()->get('user')['id'];
        return $data;
    }

    protected function setStatus(array $data):array
    {
        $data['data']['status'] = "DRAFT";
        return $data;
    }

    public function getPetitionsByUser(int $id)
    {
        return self::where('user_id', $id)->findAll();
    }
}