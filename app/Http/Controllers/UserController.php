<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
	{
	    $this->middleware('web');
	    $this->middleware('auth');
	    $this->middleware('checkMail');
	}
}
