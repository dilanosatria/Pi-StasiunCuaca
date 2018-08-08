<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    // use AuthenticatesUsers;

    // *
    //  * Where to redirect users after login.
    //  *
    //  * @var string
     
    // protected $redirectTo = '/home';
   
    // Menggunakan Alert
    use AuthenticatesUsers {
    redirectPath as laravelRedirectPath;
    }

    public function redirectPath()
    {
    // Do your logic to flash data to session...
    alert()->success('Sukses!', 'Berhasil Masuk! Selamat Datang Admin Stasiun Cuaca.');

    // Return the results of the method we are overriding that we aliased.
    return $this->laravelRedirectPath();
    }



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
