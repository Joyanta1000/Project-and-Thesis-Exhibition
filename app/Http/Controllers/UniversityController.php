<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\University;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::all();

        return view('admin.pages.universities',compact('universities'));
    }

    public function update_status_of_university($id)
    {
        $university = University::find($id);

        if ($university->is_active == 1) {
            $university->is_active = 0;
            $university->save();
            return redirect()->back()->with('status',"University inactivated successfully");
        }

        else if ($university->is_active == 0) {
            $university->is_active = 1;
            $university->save();
            return redirect()->back()->with('status',"University activated successfully");
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
    public function insert_university(Request $request)
    {
         $rules = [
            'name' => 'required|string|min:1|max:255|unique:universities,name',
            'email' => 'required|string|min:1|max:255|unique:universities,email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'slug' => 'required|string|min:1|max:255|unique:universities,slug',
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
                $university = new University;
                $university->name = $data['name'];
                $university->email = $data['email'];
                $university->phone = $data['phone'];
                $university->slug = $data['slug'];
                $university->is_active = 1;
                $university->save();
                return redirect()->back()->with('status',"University added successfully");
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
    public function edit_university($id)
    {
        $universities_info = University::find($id);

        return view('admin.pages.edit_university',compact('universities_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_university(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|min:1|max:255',
            'email' => 'required|string|min:1|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'slug' => 'required|string|min:1|max:255',
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
                $university = University::find($id);
                $university->name = $data['name'];
                $university->email = $data['email'];
                $university->phone = $data['phone'];
                $university->slug = $data['slug'];
                $university->save();
                return redirect()->back()->with('status',"Universities information updated successfully");
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
    public function delete_universities_information($id)
    {
            try{
                University::find($id)->delete();
                return redirect()->back()->with('status',"Universities information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }
}
