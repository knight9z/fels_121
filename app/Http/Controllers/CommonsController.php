<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cookie;
use \Validator;

class CommonsController extends Controller
{

    /**
     * @var (array) :
     */
    protected $input = [];

    /**
     * @var Object : Repositories we use in this controller
     */
    protected $useRepo ;

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

        //ToDo : we will set $useRepo and $viewFolder in child classes
    }

    /**
     * data relate for view (Example : work need lesson and category)
     */
    protected function _providerDataBeforeGenerateView ()
    {
            //ToDo : we define this function in child classes
    }

    /**
     * redirect function
     *
     * @param string $action
     * @param array $inputData
     * @param array $errorData
     * @return $this
     */
    protected function _redirectFunction ($action = '/', $inputData = [], $errorData = [])
    {
        return redirect($action)
            ->withInput($inputData)
            ->withErrors($errorData);
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->useRepo->getAllWithPage($this->input);

        $responseData['relateData'] = $this->_providerDataBeforeGenerateView();
        $responseData['result'] = $data;

        $this->_renderView('index', $responseData);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response['relateData'] = $this->_providerDataBeforeGenerateView();

        $this->_renderView('create', $response);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->useRepo->getDetail($id);

        $responseData['relateData'] = $this->_providerDataBeforeGenerateView();
        $responseData['result'] = $data;

        $this->_renderView('index', $responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->useRepo->getDetail($id);
        $responseData['relateData'] = $this->_providerDataBeforeGenerateView();
        $responseData['result'] = $data;

        $this->_renderView('index', $responseData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responseData = $this->useRepo->deleteItem($id);

        return $responseData;
        //ToDo : we will define function in child class
    }


    /**
     * Set language
     * @param string $isoCode
     * @return $this
     */
    public function setLanguage($isoCode = 'vi')
    {
       //get list language
        $listLang = App\Language::lists('iso_code');

        $isoCode = $listLang->contains($isoCode) ? $isoCode : 'vi';

            $cookie = cookie()->forever('lang', $isoCode);

            return redirect('/')->withCookie($cookie);

    }




}
