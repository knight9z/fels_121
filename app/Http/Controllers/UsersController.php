<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\User;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends CommonsController
{
    protected $userRepository;

    /*
     * List role of user
     */
    protected $roleData;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
        $this->viewFolder = 'backend.user';
        $this->roleData = [
            User::USER_ROLE_ADMIN => trans('user.role.admin'),
            User::USER_ROLE_MEMBER => trans('user.role.member'),
        ];
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->getAllWithPage([]);
        return $this->_renderView('index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->_renderView('create', ['roles' => $this->roleData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $rawData = $request->all();
        $responseFromRepository = $this->userRepository->createItem($rawData);

        if ($responseFromRepository['error']) {
            return $this->_redirectWithAction('UsersController', 'create', $rawData, [$responseFromRepository['message']]);

        } else {
            Session::flash('success', trans('backend/layout.message_success'));
            return $this->_redirectWithAction('UsersController', 'index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->getDetail($id);
        return $this->_renderView('edit', ['user' => $user, 'roles' => $this->roleData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $rawData = $request->all();
        $responseFromRepository = $this->userRepository->updateItem($id, $rawData);

        if ($responseFromRepository['error']) {
            return back()->withErrors([$responseFromRepository['message']])->withInput($rawData);

        } else {
            Session::flash('success', trans('backend/layout.message_success'));
            return $this->_redirectWithAction('UsersController','index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = Auth::user()->id;
        if ($userId == $id) {
            $errors[] = trans('user.destroy.remove_mine');

            return $this->_redirectWithAction('UsersController', 'index', [], $errors);
        }

        $object = $this->userRepository->deleteItem($id);
        Session::flash('success', trans('backend/layout.message_success'));

        return $this->_redirectWithAction('UsersController', 'index');
    }
}
