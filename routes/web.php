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
/* Phượng */
//Client
Route::get('/','HomeController@index' );
Route::get('/404','HomeController@error_page');
Route::get('/trang-chu', 'HomeController@index')->name('trang-chu');

//Admin login
Route::get('/admin', 'LoginController@index');
Route::get('/dashboard', 'LoginController@show_dashboard');
Route::post('/admin-dashboard', 'LoginController@dashboard');
Route::get('/logout-admin', 'LoginController@logout_admin');

//Admin
Route::get('/add-admin', 'AdminController@add_admin');
Route::post('/save-admin', 'AdminController@save_admin');
Route::get('/all-admin', 'AdminController@all_admin');
Route::get('/edit-admin/{admin_id}', 'AdminController@edit_admin');
Route::post('/update-admin/{admin_id}', 'AdminController@update_admin');
Route::get('/delete-admin/{admin_id}', 'AdminController@delete_admin');

//Customer
// Route::get('/add-customer', 'CustomerController@add_customer');
// Route::post('/save-customer', 'CustomerController@save_customer');
Route::get('/all-customer', 'CustomerController@all_customer');
Route::get('/edit-customer/{customer_id}', 'CustomerController@edit_customer');
Route::post('/update-customer/{customer_id}', 'CustomerController@update_customer');
Route::get('/delete-customer/{customer_id}', 'CustomerController@delete_customer');


//Profile
Route::get('/profile/{id}', 'CustomerController@profile')->name('profile');
Route::post('/changeprofile/{id}', 'CustomerController@postprofile')->name('changepro');

Route::get('dangxuat','CustomerController@dangxuat')->name('dangxuat');
//Location
Route::get('/add-location', 'LocationController@add_location');
Route::post('/save-location', 'LocationController@save_location');
Route::get('/all-location', 'LocationController@all_location');
Route::get('/unactive-location/{location_id}', 'LocationController@unactive_location');
Route::get('/active-location/{location_id}', 'LocationController@active_location');
Route::get('/edit-location/{location_id}', 'LocationController@edit_location');
Route::post('/update-location/{location_id}', 'LocationController@update_location');
Route::get('/delete-location/{location_id}', 'LocationController@delete_location');

//Category
Route::get('/add-category', 'CategoryController@add_category');
Route::post('/save-category', 'CategoryController@save_category');
Route::get('/all-category', 'CategoryController@all_category');
Route::get('/unactive-category/{category_id}', 'CategoryController@unactive_category');
Route::get('/active-category/{category_id}', 'CategoryController@active_category');
Route::get('/edit-category/{category_id}', 'CategoryController@edit_category');
Route::post('/update-category/{category_id}', 'CategoryController@update_category');
Route::get('/delete-category/{category_id}', 'CategoryController@delete_category');

//Review
Route::get('/add-review', 'ReviewController@add_review');
Route::post('/save-review', 'ReviewController@save_review');
Route::get('/all-review', 'ReviewController@all_review');
Route::get('/show-review-images/{review_id}', 'ReviewController@show_review_images');
Route::get('/unactive-review/{review_id}', 'ReviewController@unactive_review');
Route::get('/active-review/{review_id}', 'ReviewController@active_review');
Route::get('/edit-review/{review_id}', 'ReviewController@edit_review');
Route::post('/update-review/{review_id}', 'ReviewController@update_review');
Route::get('/delete-review/{review_id}', 'ReviewController@delete_review');
Route::get('/edit-review-image/{review_id}', 'ReviewController@edit_review');
Route::post('/update-review-image/{review_id}', 'ReviewController@update_review');
Route::get('/delete-review-image/{review_id}', 'ReviewController@delete_review');

//Customer Login
Route::get('/login', 'LoginCustomerController@index')->name('login');
Route::post('/pagehome', 'LoginCustomerController@pagehome');
Route::get('/logout-customer', 'LoginCustomerController@logout_customer');

//Customer Register
Route::get('dangky','LoginCustomerController@getDangKy');
Route::post('dangky','LoginCustomerController@postDangKy')->name('dangkycus');


//Page Location
Route::get('/location/{location_slug}', 'HomeController@show_location_page');

//Page Region
Route::get('/region/{region_slug}', 'HomeController@show_region_page');

//Page Review
Route::get('/review/{review_slug}', 'HomeController@show_review_page');

//Page Category
Route::get('/{category_slug}', 'HomeController@show_category_page');


/* End Phượng */


