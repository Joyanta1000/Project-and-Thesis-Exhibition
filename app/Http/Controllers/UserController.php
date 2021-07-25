<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\University;
use App\Models\Department;
use App\Models\User;
use App\Models\AllUsers;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\Designation;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Mail;

use Haruncpi\LaravelIdGenerator\IdGenerator;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::all();

        $departments = Department::all();

        return view('authentication.student_register',compact('universities', 'departments',));
    }

    public function university_and_departments_info_for_supervisor_registration()
    {
        $universities = University::all();

        $departments = Department::all();

        $designations = Designation::all();

        return view('authentication.supervisor_register',compact('universities', 'departments', 'designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function student_registration(Request $request)
    {
         $rules = [
            'name' => 'required|string|min:1|max:255|unique:students,name',
            'email' => 'required|string|min:1|max:255|unique:users,email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'batch' => 'required|string|min:1|max:255',
            'session' => 'required|string|min:1|max:255',
            'roll' => 'required|string|min:1|max:255',
            'university_id' => 'required',
            'department_id' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:confirm_password',
            'confirm_password' => 'min:6'
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{

set_time_limit(1000);

$id = IdGenerator::generate(['table' => 'users', 'length' => 10, 'prefix' =>date('ym')]);
//output: 1910000001
$code = Str::random(30);

$to_email = $data['email'];
$to_name = $data['name'];

                $user = new User;
                $user->id = $id;
                $user->email = $to_email;
                $user->role_id = 1;
                $user->is_active = 0;
                $user->password = md5($data['password']);
                $user->token = $code;
                $user->save();

                $student = new Student;
                $student->name = $to_name;
                $student->student_id = $id;
                $student->phone = $data['phone'];
                $student->slug = $data['roll'].'_'.$data['name'];
                $student->batch = $data['batch'];
                $student->session = $data['session'];
                $student->roll = $data['roll'];
                $student->university_id = $data['university_id'];
                $student->department_id = $data['department_id'];
                $student->save();




$confirmation_code = array('confirmation_code' => $code);

                Mail::send('emailverify', $confirmation_code, function($message) use ($to_email, $to_name) {
         $message->to( $to_email , $to_name )->subject
            ('Email verification mail');
         $message->from('example@gmail.com','Example');
      });

                return redirect()->back()->with('status',"You registered successfully, verify first");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
        }
    }

    public function supervisor_registration(Request $request)
    {
         $rules = [
            'name' => 'required|string|min:1|max:255|unique:students,name',
            'email' => 'required|string|min:1|max:255|unique:users,email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'university_id' => 'required',
            'department_id' => 'required',
            'designation_id' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:confirm_password',
            'confirm_password' => 'min:6'
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{

set_time_limit(1000);

$id = IdGenerator::generate(['table' => 'users', 'length' => 10, 'prefix' =>date('ym')]);
//output: 1910000001
$code = Str::random(30);

$to_email = $data['email'];
$to_name = $data['name'];

                $user = new User;
                $user->id = $id;
                $user->email = $to_email;
                $user->role_id = 2;
                $user->is_active = 0;
                $user->password = md5($data['password']);
                $user->token = $code;
                $user->save();

                $supervisor = new Supervisor;
                $supervisor->name = $to_name;
                $supervisor->supervisor_id = $id;
                $supervisor->phone = $data['phone'];
                $supervisor->slug = 'Supervisor'.'_'.$data['name'];
                $supervisor->university_id = $data['university_id'];
                $supervisor->department_id = $data['department_id'];
                $supervisor->designation_id = $data['designation_id'];
                $supervisor->save();




$confirmation_code = array('confirmation_code' => $code);

                Mail::send('emailverify', $confirmation_code, function($message) use ($to_email, $to_name) {
         $message->to( $to_email , $to_name )->subject
            ('Email verification mail');
         $message->from('example@gmail.com','Example');
      });

                return redirect()->back()->with('status',"You registered successfully, verify first");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function verify()
    {
        return view('emailverify');
    }

    public function verified($token)
    {
        $verified = DB::table('users')->where('token', $token)->update([ 'is_active'=> 1 ]);
        if ($verified) {
            
        }
        return view('authentication.verification_message')->with('status', 'You verified your email id successfully');
    }

    public function login()
    {
        return view('authentication.login');
    }

    public function verification_message()
    {
        return view('authentication.verification_message')->with('failed', 'Check your mail to verify or register first');
    }

    public function send_mail_to_reset_password(Request $request)
    {
        $rules = [
            'email' => 'required|string|min:1|max:255|exists:users,email',
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{

set_time_limit(1000);



$to_email = $data['email'];


$user = User::where('email','=',$to_email)
    ->first();

               $token = $user->token;




$token = array('token' => $token);

                Mail::send('reset_password_mail', $token, function($message) use ($to_email) {
         $message->to( $to_email )->subject
            ('Reset Your Password');
         $message->from('example@gmail.com','Example');
      });

                return redirect()->back()->with('status',"Your mail send successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
        }
    }

    public function reset_password_mail()
    {
        return view('reset_password_mail');
    }

    public function reset_password($token)
    {

        $user = User::where('token','=',$token)->first();

        return view('reset_password',compact('user'));
               
    }

    public function reset_user_password(Request $request, $email)
    {
        $rules = [
            'password' => 'min:6|required_with:password_confirmation|same:confirm_password',
            'confirm_password' => 'min:6'
            // 'city_name' => 'required|string|min:3|max:255',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{

set_time_limit(1000);

$code = Str::random(30);

$user = DB::table('users')->where('email', $email)->update([ 'password'=> md5($data['password']), 'token' =>  $code]);

 return view('authentication.login')->with('status',"Your password updated successfully");

            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
