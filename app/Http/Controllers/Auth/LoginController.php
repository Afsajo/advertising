<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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
    // protected $redirectTo = '/home';
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request): RedirectResponse
    {
        $input = $request->all();
        $this->validate($request, [
            'emailORusername' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['emailORusername'], 'password' => $input['password'])) ||
        auth()->attempt(array('username' => $input['emailORusername'], 'password' => $input['password'])))
        {
            return redirect()->route('awal');
            // if (auth()->user()->level == 'admin') {
            //     return redirect()->route('home.admin');
            // }else{
            //     return redirect()->route('home.member');
            // }
        }else{
            return redirect()->route('login')
            ->with('error','Email-Address - Username And Password Are Wrong.');
        }

    }
}
