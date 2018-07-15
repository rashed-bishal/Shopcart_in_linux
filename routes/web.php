<?php
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
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('admin.dashboard');
});
Route::get('/admin/dashboard','DashboardController@home')->name('admin.dashboard');
Route::get('/admin/dashboard/category/list','DashboardController@categoryList')->name('admin.dashboard.category.list');
Route::get('/admin/dashboard/category/management','DashboardController@categoryManage')->name('admin.dashboard.category.manage');
Route::get('/admin/dashboard/subcategory/list','DashboardController@subCategoryList')->name('admin.dashboard.subcategory.list');
Route::get('/admin/dashboard/subcategory/management','DashboardController@subCategoryManage')->name('admin.dashboard.subcategory.manage');
Route::get('/admin/product/create', 'DashboardController@createProduct')->name('admin.products.create');
Route::get('/admin/getMobileBrands', 'BrandsController@getMobileBrands');
Route::resource('/admin/category','CategoryController');
Route::resource('/admin/subcategory','SubCategoryController');
Route::resource('/admin/product/mobile','MobileController');
