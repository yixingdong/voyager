<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOMeta::setTitle('index');
        SEOMeta::setDescription('This is my index page description');
        SEOMeta::setCanonical('https://codecasts.com.br/index');

        return view('home');
    }

    public function welcome()
    {
        SEOMeta::setTitle('Welcome');
        SEOMeta::setDescription('This is my welcome page description');
        SEOMeta::setCanonical('https://codecasts.com.br/welcome');
        return view('welcome');
    }
}
