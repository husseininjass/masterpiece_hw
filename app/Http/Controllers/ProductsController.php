<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\categories;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::all(); 
        $test = products::find(1);
        $categoryId = $test->category->category_id;
        $categoryName = $test->category->category_Name;
    
        
    
        return view('admin.layout.productsview', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $products = products::all(); 
        // dd($products->categories->category_Name);
        $category = categories::get();
        return view('admin.layout.productsAdd', compact('category'));
        // return view('admin.layout.productsAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'product_Name' => 'required ',
            'category_id' => 'required ',
            'price' => 'required ',
            'discount' => 'required ',
            'rating' => 'required ',
            'description' => 'required ',
            'quantity' => 'required ',
        ]);
        $ext = $request->file('photo')->extension();
        $final_name = time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);

        $obj = new products();
        $obj->photo = $final_name;
        $obj->product_Name = $request->product_Name;
        $obj->category_id = $request->category_id;
        $obj->price = $request->price;
        $obj->discount = $request->discount;
        $obj->rating = $request->rating;
        $obj->description = $request->description;
        $obj->stock = 0;
        $obj->quantity = $request->quantity;
        // dd($obj);
        $obj->save();
        if ($obj) {
            return redirect()->route('view_Products')->with('success', 'Add product is successfully.');
        }
    }
    public function change_stock($product_id)//to check if is active or not
    {
        $products = products::where('product_id',$product_id)->first();
        if($products->stock == 1) {
            $products->stock = 0;
        } else {
            $products->stock = 1;
        }
        $products->update();
        return redirect()->back()->with('success', 'stock is changed successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products, $product_id)
    {
        // $categories_data = products::where('product_id', $product_id)->first();
        // return view('admin.layout.CategoriesEdit', compact('categories_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products, $product_id)
    {
        // try {
        //     $obj = products::where('product_id',$product_id)->first();

        //     if($request->hasFile('photo')) {
        //         $request->validate([
                 
        //             'photo' => 'image|mimes:jpg,jpeg,png,gif'
        //         ]);
        //         unlink(public_path('uploads/'.$obj->photo));
        //         $ext = $request->file('photo')->extension();
        //         $final_name = time().'.'.$ext;
        //         $request->file('photo')->move(public_path('uploads/'),$final_name);
        //         $obj->photo = $final_name;
        //     }
            

        //     $obj->category_Name = $request->category_Name;
        //     $obj->update();
        //     if ($obj) {
        //         return redirect()->route('view_Categories')->with('success', 'product is updated successfully.');
        //     }
        // } 
        // catch (\Exception $e) {
        //     return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products ,$product_id)
    {
        // products::findorFail($product_id)->delete();

        // return redirect()->back()->with('success', 'product is deleted successfully.');

    }
}
