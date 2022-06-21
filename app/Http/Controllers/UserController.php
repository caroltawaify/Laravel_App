<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User Created and logged in');

    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();   // this will remove the authentication information from the user session.

        $request->session()->invalidate();  // this will invalidate the user's session
        $request->session()->regenerateToken();  // this will regenerate the user's token

        return redirect('/')->with('message', 'You have been logged out!');

    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {  // we need to attempt to log the user in
            $request->session()->regenerate();  // regenerate a session id

            return redirect('/')->with('message', 'You are logged in!');
        }
        // If the attempt fails :
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

}
