<?php


namespace App\Models;

class UserModel extends BaseModel
{
    protected $DBGroup = 'default';
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['firstname', 'lastname', 'email', 'password', 'hash_key', 'hash_expire'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'int';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation


    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = true;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = ['hashPassword'];
    protected $afterInsert = [];
    protected $beforeUpdate = ['hashPassword'];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    protected static $_items = [
        'validation' => [
            'register' => [
                "firstname" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "The firstname field is required"
                    ]
                ],
                "lastname" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "The lastname field is required"
                    ]
                ],
                "email" => [
                    "rules" => "required|valid_email|min_length[5]|is_unique[user.email]",
                    "errors" => [
                        "required" => "The email field is required",
                        "valid_email" => "Please provide a valid email address",
                        "min_length" => "Please enter more than 5 characters in email field",
                        "is_unique" => "Your email has already registered"
                    ]
                ],
                "password" => [
                    "rules" => "required|min_length[5]|max_length[12]",
                    "errors" => [
                        "required" => "The password field is required",
                        "min_length" => "Please enter more than 5 characters in password field",
                        "max_length" => "Please enter less than 12 characters in password field"
                    ]
                ],
                "conf_password" => [
                    "rules" => "required|min_length[5]|max_length[12]|matches[password]",
                    "errors" => [
                        "required" => "The confirm password field is required",
                        "min_length" => "Please enter more than 5 characters in confirm password field",
                        "max_length" => "Please enter less than 12 characters in confirm password field",
                        "matches" => "Confirm password is not match"
                    ]
                ]
            ],
            'login' => [
                "email" => [
                    "rules" => "required|valid_email|is_not_unique[user.email]",
                    "errors" => [
                        "required" => "The email field is required",
                        "valid_email" => "Please provide a valid email address",
                        "is_not_unique" => "Your email doesn't exists in our system, you should register now"
                    ]
                ],
                "password" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "The password field is required",
                        "min_length" => "Please enter more than 5 characters in password field",
                        "max_length" => "Please enter less than 12 characters in password field"
                    ]
                ]
            ],
            'forgot' => [
                "email" => [
                    "rules" => "required|valid_email|is_not_unique[user.email]",
                    "errors" => [
                        "required" => "The email field is required",
                        "valid_email" => "Please provide a valid email address",
                        "is_not_unique" => "Your email doesn't exists in our system, you should register now"
                    ]
                ]
            ]
        ],
    ];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) {
            return $data;
        }
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }
}
