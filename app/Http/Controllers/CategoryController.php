<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Category;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.pages.categories',compact('categories'));
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
    public function insert_category(Request $request)
    {
         $rules = [
            'name' => 'required|string|min:1|max:255|unique:categories,name',
            'slug' => 'required|string|min:1|max:255|unique:categories,slug',
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
                $categories = new Category;
                $categories->name = $data['name'];
                $categories->slug = $data['slug'];
                $categories->is_active = 1;
                $categories->save();
                return redirect()->back()->with('status',"Category added successfully");
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
    public function edit_category($id)
    {
        $categories_info = Category::find($id);

        return view('admin.pages.edit_category',compact('categories_info'));
    }

    public function update_status_of_category($id)
    {
        $category = Category::find($id);

        if ($category->is_active == 1) {
            $category->is_active = 0;
            $category->save();
            return redirect()->back()->with('status',"Category inactivated successfully");
        }

        else if ($category->is_active == 0) {
            $category->is_active = 1;
            $category->save();
            return redirect()->back()->with('status',"Category activated successfully");
        }

        else
        {
            return redirect()->back()->with('status',"Operation failed");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_category(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|min:1|max:255',
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
                $category = Category::find($id);
                $category->name = $data['name'];
                $category->slug = $data['slug'];
                $category->save();
                return redirect()->back()->with('status',"Categories information updated successfully");
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
    public function delete_categories_information($id)
    {
            try{
                Category::find($id)->delete();
                return redirect()->back()->with('status',"Categories information deleted successfully");
            }
            catch(Exception $e){
                return redirect()->back()->with('failed',"operation failed");
            }
    }
}
