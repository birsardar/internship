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
        $user = Auth::user();
        // dd($user->user_type);
        if ($user->is_active == 1 && $user->user_type == 'admin') {
            return view('admin.layouts.main', compact('user'));
        } elseif ($user->is_active == 1 && $user->user_type == 'manager') {
            return view('manager.layouts.main', compact('user'));
        } elseif ($user->is_active == 1 && $user->user_type == 'user') {
            return view('userdetail.details', compact('user'));
            // If user is not active or the user_type is not recognized, redirect to some other route or page.
            // Make sure to define the appropriate route or view to handle this case.
            return redirect()->route('welcome'); // Redirect to the 'welcome' route if it exists.
        }
    }
}
