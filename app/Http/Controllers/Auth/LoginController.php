<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

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

     public function index()
     {
        return view('admin/pages/index');
     }

public function redirectTo(Request $request){


    $email = $request->email;
    $password = md5($request->password);

    $obj = User::where('email','=',$email)
    ->where('password','=',$password)
    ->first();

    $request->session()->put('email',$obj->email);
    $request->session()->put('password',$obj->password);
    $request->session()->put('role_id',$obj->role_id);

    //Session::put('email', $value);

    switch ($obj->role_id) {
        case 0:
            return $this->index();
        break;
        case 1:
            $this->redirectTo = '/student';
            return $this->redirectTo;
        break;
        case 2:
            $this->redirectTo = '/supervisor';
            return $this->redirectTo;
        break;
        default:
        $this->redirectTo = '/User_Login';
            return $this->redirectTo;
        break;
    }
}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}