<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Models\Achievement;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements = Achievement::all();

        return view('admin.pages.achievements',compact('achievements'));
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
    public function insert_achievements_information(Request $request)
    {
         $rules = [
            'name' => 'required|string|min:1|max:255|unique:achievements,name',
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
                $achievement = new Achievement;
                $achievement->name = $data['name'];
                $achievement->save();
                return redirect()->back()->with('status',"Achievement added successfully");
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
    public function edit_achievements_info($id)
    {
        $achievements_info = Achievement::find($id);

        return view('admin.pages.edit_achievements_info',compact('achievements_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_achievements_information(Request $request, $id)
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
                $achievement = Achievement::find($id);
                $achievement->name = $data['name'];
                $achievement->save();
                return redirect()->back()->with('status',"Achievement information updated successfully");
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
    public function delete_achievements_information($id)
    {
            try{
                Achievement::find($id)->delete();
                return redirect()->back()->with('status',"Achievements information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }
}
