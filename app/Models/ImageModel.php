<?php

namespace App\Models;

class ImageModel extends BaseModel
{
    protected $DBGroup = 'default';
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['user_id', 'img_path'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'int';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];


    protected static $_items = [
        'validation' => [
            'user_avatar' => [
                'userfile' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[userfile]'
                        . '|is_image[userfile]'
                        . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                        . '|max_size[userfile,100]'
                        . '|max_dims[userfile,1024,768]',
                ],
            ],
        ]
    ];


    /**
     * @param $user_id
     * @return bool|\CodeIgniter\Database\BaseResult
     */
    public function deleteFile($user_id)
    {
        $image = $this->where('user_id', $user_id)->first();
        $isDeleted = false;
        if ($image) {
            if (file_exists('uploads/' . $image['img_path'])) {
                $isFileDeleted = unlink('uploads/' . $image['img_path']);
            }
            $isDeleted = $this->delete($image['id']);
        }
        return $isDeleted;
    }


    /**
     * @param $user_id
     * @param $imageFile
     * @return string
     * @throws \ReflectionException
     */
    public function updateFile($user_id, $imageFile)
    {
        if ($imageFile) {
            $imgPath = $imageFile->getRandomName();
            $imageFile->move('uploads', $imgPath);
            $inserted = $this->insert([
                'img_path' => $imgPath,
                'user_id' => $user_id,
            ]);
            return $inserted;
        }
    }




}

