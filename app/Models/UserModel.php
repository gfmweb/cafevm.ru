<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['role_id','name','phone','birthday','deposits','actions','bonus','telegram','hash'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * @param string $name Имя пользователя
     * @param int $phone Телефон
     * @param string $birthday День рождения
     * @param string $hash Уникальный хэш
     * @return bool true - если записался
     * @throws \ReflectionException
     */
    public function storeUser(string $name, int $phone, string $birthday, string $hash): bool
    {
        $this->insert([
            'role_id'   =>  1,
            'name'      =>  $name,
            'phone'     =>  $phone,
            'birthday'  =>  $birthday,
            'deposits'  =>  0,
            'actions'=>json_encode([
                'action'    =>  'Безлимитный кофе',
                'start'     =>  null,
                'end'       =>  null
            ],256),
            'hash'      =>  $hash
        ]);
        return true;
    }

    /**
     * @param string $hash Хэш пользователя
     * @return array|object|null Объект пользователя
     */
    public function getInfo( string $hash)
    {
        return $this->where(['hash'=>$hash])->first();
    }

    public function getInfoQR( string $hash)
    {
        return $this->where(['hash'=>$hash])->first();
    }
}
