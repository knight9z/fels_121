<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests;

class UsersController extends CommonsController
{
    protected $userRepository;

    protected $roleData;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
        $this->viewFolder = 'backend.user';
        $this->roleData = [
                            User::USER_ROLE_ADMIN => 'Admin',
                            User::USER_ROLE_MEMBER => 'Member',
                          ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->userRepository->getAllWithPage([]);
        return $this->_renderView('index', ['users' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->_renderView('create', ['role' => $this->roleData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $responseFromRepo = $this->userRepository->updateItem($id, $rawData);
        if($responseFromRepo['error']){
            return redirect()->action('UsersController@update')
                ->withErrors([$responseFromRepo['message']])
                ->withInput($rawData);

        } else {
            return redirect()->action('UsersController@index');

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
        //
    }
}
