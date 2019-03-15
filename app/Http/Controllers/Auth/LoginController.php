<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

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
    protected $redirectTo = '/admin/events';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {        
        return ['username' => $request->{$this->username()}, 'password' => $request->password];
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->expiration != NULL) {
            if($user->expiration->lt(Carbon::now('Asia/Manila'))) {
                Auth::logout($request);
                throw ValidationException::withMessages([
                    $this->username() => [trans('auth.expired')],
                ]);
            } 
        }

        if($user->status == 'Inactive') {
            Auth::logout($request);
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.inactive')],
            ]);
        } 
        
        if($user->roles == 'Admin') {
            return redirect()->intended('admin/events');
        } 

        if($user->roles == 'Client') {
            return redirect()->intended('admin/events');
        }
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }
}
