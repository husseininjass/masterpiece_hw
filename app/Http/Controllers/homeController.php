<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class homeController extends Controller
{
    public function index()
    {
        $category = categories::all(); 
        return view('front.index', ['category' => $category]);
    }
    public function show_categories()
    {
        $category = categories::all(); 
        $products = products::all(); 
        $test = products::find(1);
        $categoryId = $test->category->category_id;
        $categoryName = $test->category->category_Name;

        return view('front.category', ['category' => $category ,'products' => $products]);
    }
    // public function products()
    // {
    //     $products = products::all(); 
    //     $test = products::find(1);
    //     $categoryId = $test->category->category_id;
    //     $categoryName = $test->category->category_Name;
    
        
    
    //     return view('admin.layout.productsview', ['products' => $products  ]);
    // }
    public function CategoriesToProducts(Request $request, $category_id)
    {
        try {
            $category = categories::all();
            $products = products::where('category_id',$category_id)->get();
            // dd($obj);
            
            if ($products) {
                // return redirect()->route('categ' ,['category' => $category ,'products' =>$products])->with('success', 'Category is updated successfully.');
                return view('front.category', ['category' => $category ,'products' =>$products]);
            }
        } 
        catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function single_product(Request $request, $product_id)
{
    try {
        $products = products::where('product_id', $product_id)->get();
        // dd($products);
        if ($products) {
            return view('front.single-product', ['products' => $products]);
        }
    } catch (\Exception $e) {
        return back()->withInput()->withErrors(['error' => $e->getMessage()]);
    }
}


}
