<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Department;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        return view('admin.pages.departments',compact('departments'));
    }

    public function update_status_of_department($id)
    {
        $department = Department::find($id);

        if ($department->is_active == 1) {
            $department->is_active = 0;
            $department->save();
            return redirect()->back()->with('status',"Department inactivated successfully");
        }

        else if ($department->is_active == 0) {
            $department->is_active = 1;
            $department->save();
            return redirect()->back()->with('status',"Department activated successfully");
        }

        else
        {
            return redirect()->back()->with('status',"Operation failed");
        }
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
    public function insert_departments_information(Request $request)
    {
         $rules = [
            'name' => 'required|string|min:1|max:255|unique:departments,name',
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
                $department = new Department;
                $department->name = $data['name'];
                $department->is_active = 1;
                $department->save();
                return redirect()->back()->with('status',"Department added successfully");
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
    public function edit_departments_info($id)
    {
        $departments_info = Department::find($id);

        return view('admin.pages.edit_departments_info',compact('departments_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_departments_information(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|min:1|max:255',
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
                $department = Department::find($id);
                $department->name = $data['name'];
                $department->save();
                return redirect()->back()->with('status',"Departments information updated successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_departments_information($id)
    {
            try{
                Department::find($id)->delete();
                return redirect()->back()->with('status',"Departments information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }
}
