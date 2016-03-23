<?php
namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cookie;

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

    /**
     * CommonsController constructor.
     */
    public function __construct()
    {
        $this->input = Input::get();
        //set locale for user
        $lang = Cookie::get('lang') ? Cookie::get('lang') : 'vi';

        App::setLocale($lang);
        //ToDo : we will set $viewFolder in child classes
    }

    /**
     * @param $viewName
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function _renderView ($viewName, $data = [])
    {
        return view($this->viewFolder . '.' .$viewName, $data);
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
        $cookie = cookie()->forever('lang', $isoCode);

        return redirect('/')->withCookie($cookie);
    }

    /**
     * return new page
     * @param string $newRouter
     * @param array $inputData
     * @param array $errorData
     * @return $this
     */
    public static function redirectPage ($newRouter = '/', $inputData = [], $errorData = [])
    {
        return redirect($newRouter)
            ->withInput($inputData)
            ->withErrors($errorData);
    }

    /**
     * @param $controller
     * @param $action
     * @param $outputData
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function redirectWithAction ($controller, $action, $outputData = [])
    {
        return redirect()->action($controller . '@' . $action, $outputData);
    }
}
