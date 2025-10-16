<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function register()
    {
        return view('test.register');
    }

    public function store_register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:test', // Check uniqueness in the 'test' table
            'age' => 'required|integer', // Ensure 'age' is an integer
            'gender' => 'required', // Check if 'gender' is 'Male' or 'Female'
            'password' => 'required|confirmed',
        ]);

        $user = TestModel::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'password' => $validated['password'], // Hash the password
        ]);

        if ($user) {
            return redirect('/login')->with('success', 'Registration successful!');
        } else {
            return redirect('/home')->with('error', 'Registration failed. Please try again.');
        }
    }

    public function login()
    {
        return view('test.login');
    }

    public function store_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session(['name' => $user->name]);
            return redirect('/show_user')->with('success', 'Login successful');
        } else {
            return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully');
    }

    public function show()
    {
        return view('test.show');
    }

    public function show_user()
    {
        $data = TestModel::all();
        return view('test.show', ['data' => $data]);
    }
}
