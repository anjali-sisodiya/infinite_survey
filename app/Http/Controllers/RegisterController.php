<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Productmodel;
use App\Models\User;


class RegisterController extends Controller
{
    public function showRegform(){
        return view('reg');
    }

    public function storereginfo(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique',
            'password' => 'required|confirmed'
        ]);
        
        User::create([
            'name'=>$request->name,
             'email'=>$request->email,
              'password'=>\Hash::make($request->password)
          ]);
        
   if(\Auth::attempt($request->only('email','password'))){
return redirect('addproduct');
   }

        return redirect('reg')->withErrors('Error');
    }

public function showLoginform(){
        return view('login');
    }

    public function storelogininfo(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
       if(\Auth::attempt($request->only('email','password'))){
return redirect('addproduct');
   }

        return redirect('login')->withErrors('Login details are not valid');
    }




    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('login');
    }
    public function addproduct(){
        return view('addproduct');
    }











}
