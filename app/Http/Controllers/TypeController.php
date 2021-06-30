<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Type;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $types = Type::all();

        return view('admin.pages.types',compact('types'));
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

    public function insert_type(Request $request)
    {
         $rules = [
            'name' => 'required|string|min:1|max:255|unique:types,name',
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
                $types = new Type;
                $types->name = $data['name'];
                $types->save();
                return redirect()->back()->with('status',"Type added successfully");
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

    public function update_status($id)
    {
        $type = Type::find($id);

        if ($type->is_active == 1) {
            $type->is_active = 0;
            $type->save();
            return redirect()->back()->with('status',"Type inactivated successfully");
        }

        else if ($type->is_active == 0) {
            $type->is_active = 1;
            $type->save();
            return redirect()->back()->with('status',"Type activated successfully");
        }

        else
        {
            return redirect()->back()->with('status',"Operation failed");
        }
    }

    public function edit_type($id)
    {
        $types_info = Type::find($id);

        return view('admin.pages.edit_type',compact('types_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_type(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|min:1|max:255|unique:types,name',
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
                $type = Type::find($id);
                $type->name = $data['name'];
                $type->save();
                return redirect()->back()->with('status',"Types information updated successfully");
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
    public function delete_types_information($id)
    {
            try{
                Type::find($id)->delete();
                return redirect()->back()->with('status',"Types information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }
}
