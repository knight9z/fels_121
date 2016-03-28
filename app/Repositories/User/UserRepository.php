<?php
namespace App\Repositories\User;

use App\User;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Hash;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function createItem($rawData)
     {
         //check conform pass word
         if ($rawData['password'] != $rawData['password_repeat']) {
             return ['error' => true, 'message' => trans('user.register.compare_password')];
         }

        //upload image
        $dataUpLoad = $this->_uploadImage('user');

        if ($dataUpLoad['error']) {
            return ['error' => true, 'message' => $dataUpLoad['message']];
        }

         //add data
        $rawData['avatar'] = $dataUpLoad['data'];
        $rawData['password'] = Hash::make($rawData['password']);
        $rawData['role'] = User::USER_ROLE_MEMBER;
        $objectData = $this->model->createItem($rawData);

        return ['error' => false, 'data' => $objectData];
     }

    /**
    * check role
    *
    * @return bool
    */
    public function isAdmin()
    {
        return $this->model->isAdmin();
    }

    /**
    * check role
    *
    * @return bool
    */

    public function isUser()
    {
        return $this->model->isUser();
    }
}