<?php

use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

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
// tham số truyền lên route
// {} : tham so tren url
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('products/{slug}/{id?}',function($slug,$id=null)
        {
            echo "slug-".$slug .": id-".$id;
        })->where([
            'id'=>'\d+',
            'slug'=>'[a-zA-Z0-9]+'])->name("list.products");

        Route::get('watch-product',function()
        {
            return redirect()->route('list.products',[
                'slug'=>"cellphone",
                'id'=>1
            ]);
        });
        Route::get('home',function()
        {
          Return "home";
        })->name('home');
});

Route::get('admin/login',function()
{
    return redirect()->route('admin.home');
});
Route::domain('{account}.laravel.com')->group(function () {
    Route::get('docs', function () {
        return "docs";
    });
    Route::get('install', function () {
        return "install";
    });
});

Route::get('watch-film/{age}',function ($age)
{
    return "ban {$age} tuoi";
})->middleware(['check.age:admin']);
// : : được hiểu phía sau la tham số truyền lên là admin

Route::get('warning',function ()
{
    return "ban khong duoc phep xem";
})->name('warning.film');

Route::get('admin/login',[LoginController::class,'index']);

Route::get('admin/test',[LoginController::class,'test']);

Route::get('not-permistion',function()
{
    return "ban khong co quyen truy cap";
})->name('not.permision');



