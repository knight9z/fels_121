<?php
namespace App\Http\Controllers;

use App\Http\Requests;

class AdminController extends CommonsController
{
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = 'admin';
    }

    public function index ()
    {
        $this->_renderView('index');
    }
}
