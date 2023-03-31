<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Socialite;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function redirectToGoole()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/')->with('success', 'Welcome back, ' . $finduser->name);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'level' => 'user',
                    'password'  => '0',
                    'google_id' => $user->id
                ]);
                Auth::login($newUser);
                return redirect('/')->with('success', 'Welcome, ' . $newUser->name);
            }
        } catch (Exception $e) {
            return redirect('/login');
        }
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function authenticate(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('toast_error', 'Login Failed! Invalid email or password!');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function store(StoreUserRequest $request)
    {

        $newUser = $request->all();
        $newUser['role_id'] = 2;
        $newUser['password'] = Hash::make($newUser['password']);
        $newUser = User::create($newUser);
        $newCart['user_id'] = $newUser->id;
        // dd($newCart);
        Cart::create($newCart);

        // $request->session()->with('success', 'Registration is successful, please login');

        return redirect('/login')->with('toast_success', 'Registration is successful, Please login!');
    }
}
