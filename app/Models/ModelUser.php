<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email', 'username', 'fullname', 'user_image', 'password_hash', 'active', 'level', 'token'

    ];

    //backend
    public function list()
    {
        return $this->table('users')
            ->orderBy('id', 'ASC')
            ->get()->getResultArray();
    }

    public function getaktif()
    {
        return $this->table('users')
            ->like('active', '1')
            ->orderBy('id', 'ASC')
            ->get()->getResultArray();
    }

    public function getnonaktif()
    {
        return $this->table('users')
            ->where('active', 0)
            ->orderBy('id', 'ASC')
            ->get()->getResultArray();
    }
    
    public function getUpdate($token)
    {
        return $this->table('users')
            ->where('token', $token)
            ->orderBy('id', 'ASC')
            ->get()->getResultArray();
    }
     //total blm dibaca
    public function totnotifikasi()
    {
        return $this->table('users')
            ->where(array('active'    => '0'))
            ->get()->getNumRows();
    }
}
