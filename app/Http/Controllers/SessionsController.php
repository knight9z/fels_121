<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests\SessionsCreatRequest;
use Illuminate\Support\Facades\Auth;

class SessionsController extends CommonsController
{
    /**
     * object repository we will use
     * @var UserRepoInterface
     */
    protected $userRepository;

    /**
     * SessionController constructor.
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepositoryInterface $user)
    {
        parent::__construct();
        $this->userRepository = $user;
        $this->viewFolder = 'frontend.session';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create()
    {
        return $this->_checkLogin('create');
    }

    /**
     * @param SessionsCreatRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(SessionsCreatRequest $request)
    {
        $input = $request->only('email', 'password');

        if (Auth::attempt($input)) {
            if (Auth::user()->isAdmin()) {
                return $this->_redirectWithAction('AdminsController', 'index');
            }

            return $this->_redirectWithAction('ClientsController', 'index');
        }

        return redirect()->$this->_redirectWithAction('SessionsController', 'create', $request->all(), [trans('user.login.login_failed')]);

    }

    /**
     * logout function
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logOut()
    {
        Auth::logout();
        return $this->_redirectWithAction('SessionsController', 'create');
    }
}
