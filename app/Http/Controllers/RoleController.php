<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Models\Role;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.pages.roles',compact('roles'));
    }

    public function update_status_of_role($id)
    {
        $role = Role::find($id);

        if ($role->is_active == 1) {
            $role->is_active = 0;
            $role->save();
            return redirect()->back()->with('status',"Role inactivated successfully");
        }

        else if ($role->is_active == 0) {
            $role->is_active = 1;
            $role->save();
            return redirect()->back()->with('status',"Role activated successfully");
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
    public function insert_roles_information(Request $request)
    {
         $rules = [
            'name' => 'required|string|min:1|max:255|unique:roles,name',
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
                $role = new Role;
                $role->name = $data['name'];
                $role->is_active = 1;
                $role->save();
                return redirect()->back()->with('status',"Role added successfully");
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
    public function edit_roles_info($id)
    {
        $roles_info = Role::find($id);

        return view('admin.pages.edit_roles_info',compact('roles_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_roles_information(Request $request, $id)
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
                $role = Role::find($id);
                $role->name = $data['name'];
                $role->save();
                return redirect()->back()->with('status',"Roles information updated successfully");
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
    public function delete_roles_information($id)
    {
            try{
                Role::find($id)->delete();
                return redirect()->back()->with('status',"Roles information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }
}
