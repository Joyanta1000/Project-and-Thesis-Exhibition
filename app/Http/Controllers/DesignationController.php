<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Designation;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::all();

        return view('admin.pages.designations',compact('designations'));
    }

    public function update_status_of_designation($id)
    {
        $designation = Designation::find($id);

        if ($designation->is_active == 1) {
            $designation->is_active = 0;
            $designation->save();
            return redirect()->back()->with('status',"Designation inactivated successfully");
        }

        else if ($designation->is_active == 0) {
            $designation->is_active = 1;
            $designation->save();
            return redirect()->back()->with('status',"Designation activated successfully");
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
    public function insert_designation(Request $request)
    {
         $rules = [
            'name' => 'required|string|min:1|max:255|unique:designations,name',
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
                $designation = new Designation;
                $designation->name = $data['name'];
                $designation->is_active = 1;
                $designation->save();
                return redirect()->back()->with('status',"Designation added successfully");
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
    public function edit_designations_info($id)
    {
        $designations_info = Designation::find($id);

        return view('admin.pages.edit_designations_info',compact('designations_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_designations_information(Request $request, $id)
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
                $designation = Designation::find($id);
                $designation->name = $data['name'];
                $designation->save();
                return redirect()->back()->with('status',"Designations information updated successfully");
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
    public function delete_designations_information($id)
    {
            try{
                Designation::find($id)->delete();
                return redirect()->back()->with('status',"Designations information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }
}
