<?php

namespace App\Http\Controllers;

class AdminController extends CommonsController
{
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = 'admin';
    }

    public function index ()
    {
        return $this->_renderView('index');
    }
}
