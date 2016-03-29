<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AdminsController extends CommonsController
{

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = 'backend';
    }

    public function index()
    {
        return $this->_renderView('index');
    }
}
