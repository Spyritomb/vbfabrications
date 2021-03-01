<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'App\Entities\User';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name', 'email'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = true;

    public function read(User $user)
    {
        return $this->find($user->id);
    }

    public function readByUsername(User $user)
    {
        return $this
            ->select('id, username')
            ->where('username',$user->username)
            ->first();
    }
}
