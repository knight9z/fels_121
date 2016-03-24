<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionLoginRequest;
use App\Http\Requests;
use App\Http\Requests\SessionRegisterRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class SessionController extends Controller
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
        $this->userRepository = $user;
        //set locale for user
        $lang = Cookie::get('lang') ? Cookie::get('lang') : 'vi';
        App::setLocale($lang);
    }


    public function create ()
    {
        return $this->_checkLogin('session.login');
    }

    public function store (SessionLoginRequest $request)
    {
        $input = $request->only('email', 'password');

        if (Auth::attempt($input)) {
            if (Auth::user()->isAdmin()) {
                return redirect()->action('AdminController@index');
            }

            return redirect()->action('ClientController@index');
        }

        return redirect()->action('SessionController@getLogin')
                        ->withErrors([trans('user.login.login_failed')])
                        ->withInput($request->all());

    }

    /**
     * @param string $viewName
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    protected function _checkLogin ($viewName = 'session.login') {
        if (Auth::user()) {
            if (Auth::user()->isAdmin()) {
                return redirect()->action('AdminController@index');
            }

            return redirect()->action('ClientController@index');
        }

        return view($viewName);
    }

    /**
     * logout function
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logOut ()
    {
        Auth::logout();

        return redirect()->action('SessionController@create');
    }



    /**
     * get view register
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegister () {
        return $this->_checkLogin('session.register');

    }

    /**
     * process data register
     * @param SessionRegisterRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postRegister (SessionRegisterRequest $request)
    {
        $responseFromRepo = $this->userRepository->createItem($request->all());
        if($responseFromRepo['error']){
            return redirect()->action('SessionController@getRegister')
                             ->withErrors([$responseFromRepo['message']])
                             ->withInput($request->all());

        } else {
            $userObject = $responseFromRepo['data'];
            Auth::attempt(['email' => $userObject->email, 'password' => $userObject->password]);

            return redirect()->action('ClientController@index');
        }

    }
}
