<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Exceptions\AlertError;
use CodeIgniter\Model;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Types\False_;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'App\Entities\User';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['username', 'password'];

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

    public function readByUsername(User $user, bool $returnPassword = false)
    {
        if ($returnPassword) {
            return $this
                ->select()
                ->where('username', $user->username)
                ->first();
        } else {
            return $this
                ->select('id, username')
                ->where('username', $user->username)
                ->first();
        }

    }

    public function login(User $user)
    {
        $dbUser = $this->readByUsername($user, true);
        echo '<pre>';
        var_dump($dbUser);
        echo '</pre>';
        if ($dbUser) {
            if (password_verify($user->password, $dbUser->password)) {
                return new User([
                    'id' => $dbUser->id
                ]);
            } else {
                log_message('error','Credentials incorrect');
                return false;
            }
        } else {
            log_message('error','User does not exist');
            return false;
        }

        //Check if it exists
        //checks whether the password provided matches the pass in db

    }
}
