<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //   return view('home');
        return view('admin.bord');
    }


    public function bord(){

       // dd(Auth::id());


        return view('admin.bord');

    }

    public function Ebord(){

        return view('admin.Eord');

    }


}
