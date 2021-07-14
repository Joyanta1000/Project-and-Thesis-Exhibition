<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\University;
use App\Models\Department;
use App\Models\AllUsers;
use App\Models\Student;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Mail;

use Haruncpi\LaravelIdGenerator\IdGenerator;

use Illuminate\Support\Str;

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

        return view('authentication.student_register',compact('universities', 'departments'));
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
            'email' => 'required|string|min:1|max:255|unique:all_users,email',
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

$id = IdGenerator::generate(['table' => 'all_users', 'length' => 10, 'prefix' =>date('ym')]);
//output: 1910000001

$to_email = $data['email'];
$to_name = $data['name'];

                $user = new AllUsers;
                $user->id = $id;
                $user->email = $to_email;
                $user->role_id = 1;
                $user->is_active = 0;
                $user->password = md5($data['password']);
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



$code = Str::random(30);
$confirmation_code = array('confirmation_code' => $code);

                Mail::send('emailverify', $confirmation_code, function($message) use ($to_email, $to_name) {
         $message->to( $to_email , $to_name )->subject
            ('Email verification mail');
         $message->from('example@gmail.com','Example');
      });

                return redirect()->back()->with('status',"You registered successfully");
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


    public function show($id)
    {
        //
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
