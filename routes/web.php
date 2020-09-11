<?php

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

Route::get('/','FontendController@index');
Route::get('/category/{id}','FontendController@category');
Route::get('/category','FontendController@search')->name('search');
Route::get('/contact','FontendController@contact')->name('message');
Route::post('/contact','FontendController@message');
Route::get('/about','FontendController@about');


Route::group(['middleware' => ['admin_auth']], function () {
    Route::prefix('admin')->group(function(){
        //login reg
        
        Route::get('/profile/','AuthController@profile')->name('profile');
        Route::get('/logout/','AuthController@logoutuser')->name('logoutuser');
        Route::get('/login/','AuthController@loginuser')->name('loginuser');
        Route::post('/login/','AuthController@loginprocess');
        Route::get('/register/','AuthController@registration')->name('registration');
        Route::post('/register/','AuthController@processregistration');
        
        //contect
        Route::get('/message','AdminController@message')->name('inbox');
        Route::get('/message/delete/{id}','AdminController@messageDelete')->name('messageDelete');
        Route::get('/message/reply/{id}','AdminController@messageReply')->name('messageReply');
        Route::post('/message/send/','AdminController@messageSend')->name('messageSend');
        
            Route::get('/','AdminController@index')->name('admin.index');
           
            
            //catagory
            Route::get('/categories/','CategoryController@index')->name('category.index');
            Route::get('/categories/add','CategoryController@create')->name('category.create');
            Route::post('/categories/','CategoryController@store')->name('category.store');
            Route::get('/categories/edit/{id}','CategoryController@edit')->name('category.edit');
            Route::get('/categories/show/{id}','CategoryController@show')->name('category.show');
            Route::post('/categories/update/{id}','CategoryController@update')->name('category.update');
            Route::get('/categories/delete/{id}','CategoryController@destroy')->name('category.destroy');
        
        
            Route::resource('/post', 'PostController')->except('show');
        });
});


//backend controller
Route::prefix('admin')->group(function(){
//login reg

Route::get('/profile/','AuthController@profile')->name('profile');
Route::get('/logout/','AuthController@logoutuser')->name('logoutuser');
Route::get('/login/','AuthController@loginuser')->name('loginuser');
Route::post('/login/','AuthController@loginprocess');
Route::get('/register/','AuthController@registration')->name('registration');
Route::post('/register/','AuthController@processregistration');
 
});


Route::get('/details/{slug}','PostController@show')->name('post.show');
Route::post('/comment/{id}','CommentController@store')->name('comment.store');
Route::get('/verify/{token}','AuthController@verifymail')->name('verify');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
