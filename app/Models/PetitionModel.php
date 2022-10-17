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
    protected $allowedFields = ['name', 'description', 'status', 'user_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'int';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    //Consts_status
    const STATUS_DRAFT = 'draft';
    const STATUS_PREMODERATING = 'premoderating';
    const STATUS_ACTIVE = 'active';
    const STATUS_UNSUPPORTED = 'unsupported';
    const STATUS_SUPPORTED = 'supported';
    const STATUS_INREVIEW = 'inreview';
    const STATUS_DECLINED = 'declined';
    const STATUS_ACCEPTED = 'accepted';

    const PER_PAGE = 5;


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

    protected static $_items = [
        'validation' => [
            'create' => [
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Enter the petition\'s name',
                    ],
                ],
                'description' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Enter the petition\'s description',
                    ],
                ]
            ]
        ],
        'all' => [
            self::STATUS_DRAFT => ['name' => 'Draft', 'class' => 'secondary', 'visibility' => ['my']],
            self::STATUS_PREMODERATING => ['name' => 'Premoderating', 'class' => 'secondary', 'visibility' => ['my']],
            self::STATUS_ACTIVE => ['name' => 'Active', 'class' => 'secondary', 'visibility' => ['allp', 'my', 'my-subs']],
            self::STATUS_UNSUPPORTED => ['name' => 'Unsupported', 'class' => 'secondary', 'visibility' => ['allp', 'my', 'my-subs']],
            self::STATUS_SUPPORTED => ['name' => 'Supported', 'class' => 'secondary', 'visibility' => ['allp', 'my', 'my-subs']],
            self::STATUS_INREVIEW => ['name' => 'Inreview', 'class' => 'secondary', 'visibility' => ['allp', 'my', 'my-subs']],
            self::STATUS_DECLINED => ['name' => 'Declined', 'class' => 'secondary', 'visibility' => ['allp', 'my', 'my-subs']],
            self::STATUS_ACCEPTED => ['name' => 'Accepted', 'class' => 'secondary', 'visibility' => ['allp', 'my', 'my-subs']],
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function setUserId($data)
    {
        $data['user_id'] = session()->get('user')['id'];
        return $data;
    }

    public function getPetitionsByUser(int $id)
    {
        return self::where('user_id', $id);
    }

    public function setStatus($data, $status)
    {
        $data['status'] = $status;
        return $data;
    }

    public static function allStatuses()
    {
        $statuses = [];
        foreach (self::itemAlias('all') as $key => $status) {
            if (in_array('allp', $status['visibility'])) {
                $statuses[$key] = $status;
            }
        }
        return $statuses;
    }

    public static function myStatuses()
    {
        $statuses = [];
        foreach (self::itemAlias('all') as $key => $status) {
            if (in_array('my', $status['visibility'])) {
                $statuses[$key] = $status;
            }
        }
        return $statuses;
    }

    public static function mySubStatuses()
    {
        $statuses = [];
        foreach (self::itemAlias('all') as $key => $status) {
            if (in_array('my-subs', $status['visibility'])) {
                $statuses[$key] = $status;
            }
        }
        return $statuses;
    }


    public function __construct()
    {
        parent::__construct();
    }

    public static function countMyPetitions()
    {
        $us_id = session()->get('user')['id'];
        $petition = new PetitionModel();
        $result = $petition
            ->select("status, count(*) as cnt")
            ->where('user_id', $us_id)
            ->groupBy('status')->findAll();
        $array = self::transformCounts($result);
        return $array;
    }

    public static function countMySubsPetitions($user_id)
    {
        $petition = new PetitionModel();
        $result = $petition
            ->select("status, count(*) as cnt")
            ->where('user_petition.user_id', $user_id)
            ->join('user_petition', 'user_petition.petition_id = petition.id')
            ->groupBy('status')->findAll();

        $array = self::transformCounts($result);
        return $array;
    }

    public static function countAllPetitions()
    {
        $petition = new PetitionModel();
        $result = $petition
            ->select("status, count(*) as cnt")
            ->groupBy('status')->findAll();
        $array = self::transformCounts($result);
        return $array;
    }

    private static function transformCounts($result)
    {
        $array = [];
        foreach (self::itemAlias('all') as $key => $status) {
            $array[$key] = 0;
        }
        foreach ($result as $value) {
            if ($value['status']) {
                $array[$value['status']] = $value['cnt'];
            }
        }
        return $array;
    }

    public static function topPetitions()
    {
        $top = new UserPetitionModel();
        $topPetition = $top
            ->select('petition.id,name,description')
            ->groupBy('petition_id')
            ->orderBy('count(petition_id)', 'DESC')
            ->join('petition', 'user_petition.petition_id = petition.id')
            ->findAll(5);
        return $topPetition;
    }



}
