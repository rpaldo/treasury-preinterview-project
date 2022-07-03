<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    // Redirect to Registration page
    public function register()
    {
        return view('auth.registration');
    }

    // Redirect to Login page
    public function login()
    {
        return view('auth.login');
    }

    // Authenticate user.
    // Return error if authentication failed. Otherwise, redirect to another page.
    // If admin, redirect to User List. If not, redirect to Post List.
    public function authenticate()
    {
        $credentials = request()->validate(array(
            'email' => array('required', 'email'),
            'password' => array('required')
        ));

        if (auth()->attempt($credentials)) {
            if (auth()->user()->role == 'admin') {
                return redirect('/users');
            } else {
                return redirect('/posts');
            }

        }

        return back()
            ->withErrors(['login' => 'Failed to authenticate user. Please check email and/or password and try again.']);
    }

    // Logout user. Redirect to Login page.
    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
