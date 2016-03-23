<?php
/**
 * Created by PhpStorm.
 * User: FRAMGIA\nguyen.viet.anhb
 * Date: 22/03/2016
 * Time: 14:12
 */

namespace App\Repositories\User;

use App\Http\Controllers\SessionController;
use App\User;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
        //upload image
        $dataUpLoad = $this->_uploadImage('user');

        //check conform pass word
        if ($rawData['password'] != $rawData['password_repeat']) {
            return ['error' => true, 'message' => trans('user.register.compare_password')];

        }

        // check mail is exist
        $email = $this->model->getUserByEmail($rawData['email']);
        if ($email) {
            return ['error' => true, 'message' => trans('user.register.mail_exist')];

        }


        if ($dataUpLoad['error']) {
            return ['error' => true, 'message' => $dataUpLoad['message']];
        }


        //add data
        $rawData['avatar'] = $dataUpLoad['data'];
        $rawData['password'] = Hash::make($rawData['password']);
        $rawData['role'] = SessionController::USER_ROLE_CLIENT;

        $objectData = User::create($rawData);

        return ['error' => false, 'data' => $objectData];

    }
}