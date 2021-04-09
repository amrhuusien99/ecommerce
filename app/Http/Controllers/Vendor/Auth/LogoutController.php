<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | logout Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    /**
     * Where to redirect users after logout.
     *
     * @var string
     */
    // protected $redirectTo = '/logout';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function logout()
    {
        auth('vendor')->logout();
        return redirect(route('dashboard-login'));
    }

}
