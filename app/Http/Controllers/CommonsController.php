<?php
namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommonsController extends Controller
{
    /**
     * @var (array) :
     */
    protected $input = [];

    /**
     * @var String :  folder view name of controller
     */
    protected $viewFolder;

    protected $currentUser;

    /**
     * CommonsController constructor.
     */
    public function __construct()
    {
        $this->input = Input::get();
        //set locale for user
        $lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : config('constants.default_language');
        App::setLocale($lang);
        //ToDo : we will set $viewFolder in child classes
        $this->currentUser = Auth::user();
    }

    /**
     * @param $viewName
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function _renderView($viewName, $data = [])
    {
        return view($this->viewFolder . '.' . $viewName, $data);
    }

    /**
     * @param string $viewName
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    protected function _checkLogin ($viewName = 'create') {
        if (Auth::user()) {
            if (Auth::user()->isAdmin()) {
                return $this->_redirectWithAction('AdminController', 'index');
            }

            return $this->_redirectWithAction('ClientController', 'index');
        }

        return $this->_renderView($viewName);
    }

    /**
     * Set language
     * @param string $isoCode
     * @return $this
     */
    public function setLanguage($isoCode = 'vi')
    {
        $listLang = App\Language::lists('iso_code');
        $isoCode = $listLang->contains($isoCode) ? $isoCode : 'vi';
        $cookie = Cookie::forever('lang', $isoCode);

        return redirect('/')->withCookie($cookie);
    }

    /**
     * return new page
     * @param string $newRouter
     * @param array $inputData
     * @param array $errorData
     * @return $this
     */
    protected function _redirectPage($newRouter = '/', $inputData = [], $errorData = [])
    {
        return redirect($newRouter)
            ->withInput($inputData)
            ->withErrors($errorData);
    }

    /**
     * @param $controller
     * @param $action
     * @param array $inputData
     * @param array $errorData
     * @return $this
     */
    protected function _redirectWithAction($controller, $action, $inputData = [], $errorData= [])
    {
        return redirect()->action($controller . '@' . $action)
                        ->withInput($inputData)
                        ->withErrors($errorData);
    }
}
