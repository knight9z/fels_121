<?php
namespace App\Repositories\User;

use App\Http\Controllers\SessionController;
use App\User;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Support\Facades\Hash;

class UserRepo extends AbstractEloquentRepository implements UserRepoInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param $rawData
     * @return array
     */
    public function createItem ($rawData)
    {
        //check conform pass word
        if ($rawData['password'] != $rawData['password_repeat']) {
            return ['error' => true, 'message' => trans('user.register.compare_password')];
        }
        // check mail is exist
        $email = $this->model->getUserByEmail($rawData['email']);

        if ($email) {
            return ['error' => true, 'message' => trans('user.register.mail_exist')];
        }
        //upload image
        $dataUpLoad = $this->_uploadImage('user');

        if ($dataUpLoad['error']) {
            return ['error' => true, 'message' => $dataUpLoad['message']];
        }
        //add data
        $rawData['avatar'] = $dataUpLoad['data'];
        $rawData['password'] = Hash::make($rawData['password']);
        $rawData['role'] = User::USER_ROLE_USER;
        $objectData = User::create($rawData);

        return ['error' => false, 'data' => $objectData];
    }

    /**
     * check role
     *
     * @return bool
     */
    public function isAdmin ()
    {
        return $this->model->isAdmin();
    }

    /**
     * check role
     *
     * @return bool
     */
    public function isUser ()
    {
        return $this->model->isUser();
    }
}