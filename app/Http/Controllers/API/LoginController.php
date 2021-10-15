<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Redirect for authenticated user
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    // Login Page
    public function index()
    {
        // login.blade.php page
        return view('login');
    }

    // Login Method
    public function store(Request $request)
    {
        // Validate
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Authentication
        if (!auth()->attempt($request->only('email', 'password'), $request->remember))
        {
            return back()->with('status', 'Your email or password is incorrect.');
        }

        // Redirect
        return redirect()->route('list');

    }
}
