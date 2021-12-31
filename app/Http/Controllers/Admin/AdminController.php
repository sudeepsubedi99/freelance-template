<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
   
    use AuthenticatesUsers, RedirectsUsers;
   
    public $redirectTo= 'admin/home';

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
     public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    public function home()
    {
        return view('admin.home');
    }

}
