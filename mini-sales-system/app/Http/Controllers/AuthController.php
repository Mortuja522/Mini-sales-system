<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Session\Session;
use Session;
class AuthController extends Controller
{
    //
    public function login()
    {

        return view('login');
    }

    public function signinPost(Request $request)
    {

        $request->validate([

            'email' => 'required|email',
            'password' => 'required|Min:5|Max:12'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {

            if (Hash::check($request->password, $user->password)) {


                $request->session()->put('loginId', $user->id);
                return redirect('index');


            }
            else {
                return back()->with('fail', 'password not matches.');

            }


        }
        else {
            return back()->with('fail', 'This email is not registered');

        }

    }



    public function signup()
    {

        return view('signup');
    }

    public function signupPost(Request $request)
    {


        $request->validate([

            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|Min:5|Max:12'

        ]);

        $users = new User();
        $users->name = $request->username;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $req = $users->save();
        if ($req) {

            return back()->with('success', 'you have registered successfully');

        }
        else {

            return back()->with('fail', 'something wrong');


        }

    }

    public function logout(Request $req)
    {

        if (Session::has('loginId')) {
            Session::pull('loginId');

            return redirect()->route('login');

        }



    }

}
