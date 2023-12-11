<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class BaseController extends UserController
{
    public function __construct()
    {
        parent::__construct(); 
    }


    public function home()
    {
        return redirect('user/dashboard');
    }

    public function index()
    {
        return view('user.index');
    }
}
