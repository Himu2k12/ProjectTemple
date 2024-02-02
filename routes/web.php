<?php

use Illuminate\Support\Facades\Route;






Route::get('/','WelcomeController@index');

Route::get('locale/{locale}',function ($locale){

    Session::put('locale',$locale);

    return redirect()->back();
});
Auth::routes();

Route::get('/home', 'WelcomeController@index')->name('home');
Route::get('/dashboard', 'SuperAdminController@dashboard');


//Routes for Role controlling
Route::get('/view-add-role-page', 'SuperAdminController@addRolePage');
Route::post('/add-role', 'SuperAdminController@CreateRole');
Route::get('/inactive-role/{id}', 'SuperAdminController@inactiveRoleInfo');
Route::get('/active-role/{id}', 'SuperAdminController@activeRoleInfo');
Route::get('/edit-role/{id}', 'SuperAdminController@editRole');
Route::post('/update-role', 'SuperAdminController@updateRoleInfo');
//Routes for Role controlling ends here

Route::get('/manager-registration-page', 'SuperAdminController@viewEmployeePage');
Route::post('/create-manager', 'SuperAdminController@newEmployee')->name('create-manager');
Route::get('/edit-manager/{id}', 'SuperAdminController@editEmployee');
Route::post('update-manager', 'SuperAdminController@UpdateEmployee')->name('update-manager');
Route::get('active-manager/{id}', 'SuperAdminController@activeEmployeeInfo')->name('active-manager');
Route::get('deActive-manager/{id}', 'SuperAdminController@inactiveEmployeeInfo')->name('Inactive-manager');
Route::get('home-video', 'SuperAdminController@HomeVideo');
Route::post('new-home-video', 'SuperAdminController@CreateHomeVideo');



Route::get('upload-photo-form', 'SuperAdminController@uploadForm');
Route::post('new-photo', 'SuperAdminController@newphoto');
Route::get('/delete-photo/{id}', 'SuperAdminController@deletePhoto');


Route::get('/blog-form', 'SuperAdminController@blogPage');
Route::post('/create-blog', 'SuperAdminController@createBlog');
Route::post('/update-blog', 'SuperAdminController@updateBlog');
Route::get('/edit-blog/{slug}', 'SuperAdminController@editBlog');

Route::get('/event-form', 'SuperAdminController@EventPage');
Route::post('/create-event', 'SuperAdminController@createEvent');
Route::post('/update-event', 'SuperAdminController@updateEvent');
Route::get('/edit-event/{slug}', 'SuperAdminController@editEvent');


Route::get('contact-us', 'WelcomeController@contactus');
Route::get('blogs', 'WelcomeController@blogs');
Route::get('events', 'WelcomeController@events');
Route::get('/blog-details/{slug}', 'WelcomeController@detailsBlog');
Route::get('/event-details/{slug}', 'WelcomeController@detailsEvent');
