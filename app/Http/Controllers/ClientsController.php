<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Lesson\LessonRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests;
use App\Repositories\Word\WordRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ClientsController extends CommonsController
{

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = 'frontend';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $currentUser = Auth::user();
        return $this->_renderView('index', compact('currentUser'));
    }




}
