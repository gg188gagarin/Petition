<?php

namespace App\Models;

class PetitionStatuses extends BaseModel
{
    protected $table = 'petition_statuses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['petition_id','status','updated_at'];

    protected $useTimestamps = true;
    protected $dateFormat = 'int';
    protected $createdField = 'updated_at';
}