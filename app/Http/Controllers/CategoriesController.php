<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = categories::all(); 
        return view('admin.layout.Categoriesview', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layout.CategoriesAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //photo category_Name
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'category_Name' => 'required ',
        ]);
        $ext = $request->file('photo')->extension();
        $final_name = time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);

        $obj = new categories();
        $obj->photo = $final_name;
        $obj->category_Name = $request->category_Name;
        $obj->save();
        if ($obj) {
            return redirect()->route('view_Categories')->with('success', 'Add Category is successfully.');
            // return $request->input();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories ,$category_id)
    {
        // $categories_data = categories::where('id', $id)->first();
        // return route('admin_category_edit', ['id' => $categories_data]);
        $categories_data = categories::where('category_id', $category_id)->first();
        return view('admin.layout.CategoriesEdit', compact('categories_data'));
       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        try {
            $obj = categories::where('category_id',$category_id)->first();
            // dd($obj);
            if($request->hasFile('photo')) {
                $request->validate([
                    // 'photo' => 'image'
                    'photo' => 'image|mimes:jpg,jpeg,png,gif'
                ]);
                unlink(public_path('uploads/'.$obj->photo));
                $ext = $request->file('photo')->extension();
                $final_name = time().'.'.$ext;
                $request->file('photo')->move(public_path('uploads/'),$final_name);
                $obj->photo = $final_name;
            }
            
            // $obj->photo = $final_name;
            $obj->category_Name = $request->category_Name;
            $obj->update();
            if ($obj) {
                return redirect()->route('view_Categories')->with('success', 'Category is updated successfully.');
            }
        } 
        catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories, $category_id)
    {
        categories::findorFail($category_id)->delete();

        return redirect()->back()->with('success', 'Category is deleted successfully.');
    }
}
