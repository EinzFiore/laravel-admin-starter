<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(array('username' => $inputVal['username'], 'password' => $inputVal['password']))) {
            if (auth()->user()->role == 1) {
                return redirect()->route('admin.route')->with('message', 'Login Success');
            } else {
                return redirect()->route('home')->with('message', 'Login Success');
            }
        }
        return redirect()->route('login')
            ->with('error', 'Username & Password are incorrect.');
    }
}