<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Exceptions\AlertError;
use CodeIgniter\Model;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Types\False_;

class UserModel extends Model
{

    /**Name of the table in the database.
     *
     * @var string
     */
    protected $table = 'user';

    /**Primary key of the table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'App\Entities\User';
    protected $useSoftDeletes = false;

    /** Allows on the specified fields to be alternated.
     *
     * @var string[]
     */
    protected $allowedFields = ['username', 'password'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = true;


    /** Finds all the users where the id matches.
     *
     *
     * @param User $user
     * @return array|object|null
     */
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

    /** If the user exists in the database, checks their password
     *  whether it matches in the database.
     *
     *
     * @param User $user
     * @return User|false
     */
    public function login(User $user)
    {
        $dbUser = $this->readByUsername($user, true);
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

    }
}
