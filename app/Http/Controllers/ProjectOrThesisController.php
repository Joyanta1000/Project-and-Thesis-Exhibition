<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Type;
use App\Models\Category;
use App\Models\User;
use App\Models\Project_or_Thesis;
use App\Models\File;
use App\Models\Assigned_Student;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ProjectOrThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        $categories = Category::all();
        $supervisors = User::where('role_id','=',2)->join('supervisors', 'users.id', '=', 'supervisors.supervisor_id')
    ->get();

        return view('student.pages.add_project_or_thesis',compact('types', 'categories', 'supervisors'));
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
    public function insert_project_or_thesis(Request $request)
    {
        $rules = [
            'name' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
            'reference' => 'required',
            'description' => 'required',
            'file_url' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
            // 'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{

                $id = IdGenerator::generate(['table' => 'project_or__theses', 'length' => 10, 'prefix' =>date('ym')]);
                
                $name = $data['name'];
                $type_id = $data['type_id'];
                $category_id = $data['category_id'];
                $reference = $data['reference'];
                $description = $data['description'];

                $Project_or_Thesis = new Project_or_Thesis;
                $Project_or_Thesis->id = $id;
                $Project_or_Thesis->name = $name;
                $Project_or_Thesis->type_id = $type_id;
                $Project_or_Thesis->category_id = $category_id;
                $Project_or_Thesis->reference = $reference;
                $Project_or_Thesis->save();
                
                $extra_1 = Str::random(32);

                $File = new File;
                $File->project_id = $id;
                $file = $request->file('file_url');
                $files_name = time() . '.' . $extra_1 . '.' . $file->getClientOriginalExtension();
                $files_path = public_path('/ProjectOrThesisFiles/');
                $file->move($files_path,$files_name);
                $File->file_url ='/ProjectOrThesisFiles/' . $files_name;
                $File->description = $description;
                $File->save();

                $Assigned_Student = new Assigned_Student;
                $Assigned_Student->project_id = $id;
                $Assigned_Student->student_id = Session::get('id');
                $Assigned_Student->is_active = 1;
                $Assigned_Student->save();

                return redirect()->back()->with('status',"Project or Thesis Added Successfully");
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
