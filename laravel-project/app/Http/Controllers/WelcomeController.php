<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['home']]);
    }

    public function index()
    {
        return view('index');
    }

    public function home()
    {
        return view('home');
    }
}
