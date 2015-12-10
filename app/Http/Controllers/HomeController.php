<?php

namespace asoabo\Http\Controllers;

use Illuminate\Http\Request;

use asoabo\Http\Requests;
use asoabo\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view ('home.home');
    }
}
