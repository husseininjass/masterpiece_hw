<?php

use App\Models\products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/aa', function () {
    return view('welcome');
});
Route::get('/s', function () {
    return view('admin.admin2');
});
Route::get('/admin_users', function () {
    return view('admin.layout.users');
});
Route::get('/dashboard', function () {
    return view('admin.includes.app');
});
// Route::view('/admin_users', 'admin.layout.users')->name('view_users');
Route::view('/dashboard', 'admin.layout.main')->name('dashboard');
// Route::view('/admin', 'admin.dashboard')->name('dashboard');


// Route::resource('/admin/usersview/',UsersController::class);



// admin
Route::get('/admin/usersview', [UsersController::class, 'index'])->name('view_users');
Route::get('/admin/users/change-status/{id}', [UsersController::class, 'change_status'])->name('admin_users_change_status');
Route::get('/admin/users/change-userState/{id}', [UsersController::class, 'change_userState'])->name('admin_users_change_userState');

// Route::get('/admin/userss/ads', [UsersController::class, 'index'])->name('admin_users_add');
Route::get('/admin/users/add', [UsersController::class, 'create'])->name('admin_users_add');//admin_users_add
Route::post('/admin/users/store', [UsersController::class, 'store'])->name('admin_users_store');
Route::get('/admin/users/edit/{id}', [UsersController::class, 'edit'])->name('admin_users_edit');//admin_users_edit
Route::post('/admin/users/update/{id}', [UsersController::class, 'update'])->name('admin_users_update');
Route::delete('/admin/users/delete/{id}', [UsersController::class, 'destroy'])->name('admin_users_delete');//admin_users_delete


Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('view_Categories');
Route::get('/admin/category/add', [CategoriesController::class, 'create'])->name('admin_category_add');//admin_category_add
Route::post('/admin/category/store', [CategoriesController::class, 'store'])->name('admin_category_store');
Route::get('/admin/category/edit/{id}', [CategoriesController::class, 'edit'])->name('admin_category_edit');//admin_category_edit
Route::post('/admin/category/update/{id}', [CategoriesController::class, 'update'])->name('admin_category_update');
Route::delete('/admin/category/delete/{id}', [CategoriesController::class, 'destroy'])->name('admin_category_delete');//admin_category_delete


Route::get('/admin/Products', [ProductsController::class, 'index'])->name('view_Products');
Route::get('/admin/Products/add', [ProductsController::class, 'create'])->name('admin_Products_add');//admin_Products_add
Route::post('/admin/Products/store', [ProductsController::class, 'store'])->name('admin_Products_store');
Route::get('/admin/Products/edit/{id}', [ProductsController::class, 'edit'])->name('admin_Products_edit');//admin_Products_edit
Route::post('/admin/Products/update/{id}', [ProductsController::class, 'update'])->name('admin_Products_update');
Route::delete('/admin/Products/delete/{id}', [ProductsController::class, 'destroy'])->name('admin_Products_delete');//admin_Products_delete
Route::get('/admin/Products/change-stock/{id}', [ProductsController::class, 'change_stock'])->name('admin_Products_change_stock');

// Route::get('/x/{id}',function($id){
    // $product = products::find($id); 
    // $category = $product->category->category_Name;

    // $x = products::findOrfail($id);
    // dd($category);
    // $product = products::findOrfail($id);

    // if ($product) {
    //     $category = $product->category;
    //     if ($category) {
    //         $categoryName = $category->category_Name;
    //         dd($categoryName);
    //     } else {
    //         dd('Product is not associated with any category.');
    //     }
    // } else {
    //     dd('Product not found.');
    // }
    
// });
// $test = $products->category->category_Name;
//         dd($test);




// frontend

Route::get('/', [homeController::class, 'index'])->name('home_view_Categories');
Route::get('/categories', [homeController::class, 'show_categories'])->name('all_Categories');
Route::get('/categories/products/{id}', [homeController::class, 'CategoriesToProducts'])->name('Categories_products');
Route::get('/categories/products', function () {
    return view('front.Category')->name('categ');
});
Route::get('/singleproduct/{id}', [homeController::class, 'single_product'])->name('single_product');
Route::get('/login', [LoginController::class, 'customLogin'])->name('login');

Route::get('/login', [LoginController::class, 'login'])->name('customer_login');
Route::post('/customer/login/submit', [LoginController::class, 'login_submit'])->name('customer_login_submit');
Route::get('/customer/logout', [LoginController::class, 'logout'])->name('customer_logout');
Route::get('/signup', [LoginController::class, 'signup'])->name('customer_signup');
Route::post('/signup-submit', [LoginController::class, 'signup_submit'])->name('customer_signup_submit');

Route::get('/blog', function () {
    return view('front.blog');
});
Route::get('/single-blog', function () {
    return view('front.single-blog');
});