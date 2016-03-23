<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionLoginRequest;
use App\Http\Requests;
use App\Http\Requests\SessionRegisterRequest;
use App\Repositories\User\UserRepoInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class SessionController extends Controller
{
    const USER_ROLE_ADMIN = 1;
    const USER_ROLE_CLIENT = 2;

    /**
     * object repository we will use
     * @var UserRepoInterface
     */
    protected $useRepo;

    /**
     * SessionController constructor.
     * @param UserRepoInterface $user
     */
    public function __construct(UserRepoInterface $user)
    {
        $this->useRepo = $user;

        //set locale for user
        $lang = Cookie::get('lang') ? Cookie::get('lang') : 'vi';
        App::setLocale($lang);

    }

    /**
     * Check login
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function _checkLogin () {
        if (Auth::user()) {
            if (Auth::user()->role == $this::USER_ROLE_ADMIN) {
                return redirect()->action('AdminController@index');
            }

            return redirect()->action('ClientController@index');
        }
    }

    /**
     * get view login
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin() {

        $this->_checkLogin();

        return view('session.login');
    }

    /**
     * process login data
     * @param SessionLoginRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postLogin(SessionLoginRequest $request) {
        $input = $request->only('email', 'password');

        // check
        if (Auth::attempt($input)) {
            $this->_checkLogin();

        }
        return view('session.login', ['messages' => trans('user.login.login_failed')]);
    }

    /**
     * logout function
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logOut ()
    {
        Auth::logout();

        return redirect()->action('SessionController@getLogin');
    }

    /**
     * get view register
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegister () {
        $this->_checkLogin();

        return view('session.register');

    }

    /**
     * process data register
     * @param SessionRegisterRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postRegister (SessionRegisterRequest $request)
    {
        $this->_checkLogin();

        $responseFromRepo = $this->useRepo->createItem($request->all());

        if($responseFromRepo['error']){
            return redirect()->action('SessionController@getRegister')
                             ->withErrors([trans('user.register.compare_password')])
                             ->withInput($request->all());

        } else {
            $userObject = $responseFromRepo['data'];
            Auth::attempt(['email' => $userObject->email, 'password' => $userObject->password]);

            return redirect()->action('ClientController@index');
        }

    }




}
