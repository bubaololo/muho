<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = Auth::user();
        $credentialsCheck = $user->credential()->first();
        if($credentialsCheck) {
            $credentials = $credentialsCheck;
            return view('home', compact('credentials'));
        }
        
//        foreach($credentials as $item) {
//            info(print_r($item, true));
//        }
//        info(print_r($credentials->get()->name, true));
        return view('home');
    }
}
