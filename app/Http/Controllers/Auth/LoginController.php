<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
//     protected function redirectTo()
//     {
        
//         if (auth()->user()->hasRole('super_admin'))
//         {
//             return '/admin/dashboard';
//         }
//         if (auth()->user()->hasRole('admin'))
//         {
//             return ''.auth()->user()->uid.'/dashboard';
//         }
//         if (auth()->user()->hasRole('staff'))
//         {
          
//             return '/'.auth()->user()->uid.'/dashboard';
//         }   
//         // return '/';

//    }
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function showLoginForm()
    // {
    //     return view('auth.login');

    // }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
