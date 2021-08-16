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
        return redirect('admin');
     }

     public function IndexForStudent()
     {
        return redirect('student_dashboard');
     }

     public function IndexForSupervisor()
     {
        return redirect('supervisor_dashboard');
     }

public function redirectTo(Request $request){


    $email = $request->email;
    $password = md5($request->password);

    $obj = User::where('email','=',$email)
    ->where('password','=',$password)
    ->first();

    $request->session()->put('id',$obj->id);
    $request->session()->put('email',$obj->email);
    $request->session()->put('password',$obj->password);
    $request->session()->put('role_id',$obj->role_id);
    $request->session()->put('is_active',$obj->is_active);

    //Session::put('email', $value);

    switch ($obj->role_id) {
        case 0:
            return $this->index();
        break;
        case 1:
            return $this->IndexForStudent();
        break;
        case 2:
            return $this->IndexForSupervisor();
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
