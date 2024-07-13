<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;

use App\Http\Controllers\StripeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Jobs\JobsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\NewsController;


Route::get('/fetch-notifications', 'NotificationController@fetchNotifications')->middleware('auth:admin');

Route::get('/news', [NewsController::class, 'index'])->name('news');



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[App\Http\Controllers\HomeController::class,'index']);
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login',[AuthController::class,'login'])->name('login');
   
    Route::post('/login',[AuthController::class,'loginpost'])->name('login');
    Route::get('/register',[AuthController::class,'register_view'])->name('register');
    Route::post('/register',[AuthController::class,'register_post'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/forgot',[AuthController::class,'forgotpage'])->name('forgot');
Route::post('/send-email',[AuthController::class,'sendEmail'])->name('sendEmail');
Route::get('/contact',[App\Http\Controllers\HomeController::class,'contact'])->name('contact');
Route::get('/about',[App\Http\Controllers\HomeController::class,'about'])->name('about');
Route::get('/reset-password/{token}',[Authcontroller::class,'resetPage'])->name('resetPage');
Route::post('/update-password/{token}',[Authcontroller::class,'updatePassword'])->name('updatePassword');
Route::get('/policy',[App\Http\Controllers\HomeController::class,'policy'])->name('policy');
Route::get('/terms',[App\Http\Controllers\HomeController::class,'terms'])->name('terms');
Route::group(['prefix' => 'jobs'], function () {
Route::get('/single/{id}',[App\Http\Controllers\Jobs\JobsController::class,'single'])->name('single.job');
Route::post('/save',[App\Http\Controllers\Jobs\JobsController::class,'saveJob'])->name('save.job');
Route::post('/apply',[App\Http\Controllers\Jobs\JobsController::class,'jobApply'])->name('apply.job');
Route::any('search',[App\Http\Controllers\Jobs\JobsController::class,'search'])->name('search.job');
});

Route::group(['prefix' => 'catagories'], function () {
Route::get('/single/{name}',[App\Http\Controllers\Catagories\CatagoriesController::class,'singleCatagory'])->name('catagories.single');
});
Route::post('/contact', [App\Http\Controllers\Users\UsersController::class, 'submits'])->name('contact.submits');
Route::group(['prefix' => 'users'], function () {

Route::get('/profile',[App\Http\Controllers\Users\UsersController::class,'profile'])->name('profile');
Route::get('/applications',[App\Http\Controllers\Users\UsersController::class,'applications'])->name('applications');
Route::get('/savedjobs',[App\Http\Controllers\Users\UsersController::class,'savedJobs'])->name('saved.jobs');
Route::get('/edit-details',[App\Http\Controllers\Users\UsersController::class,'editDetails'])->name('edit.details');
Route::post('/edit-details',[App\Http\Controllers\Users\UsersController::class,'updateDetails'])->name('update.details');
Route::get('/edit-cv',[App\Http\Controllers\Users\UsersController::class,'editCv'])->name('edit.cv');
Route::get('/accept',[App\Http\Controllers\Users\UsersController::class,'accept'])->name('accept');
Route::get('/submit/{id}',[App\Http\Controllers\Users\UsersController::class,'submit'])->name('submit');

Route::post('/edit-cv',[App\Http\Controllers\Users\UsersController::class,'updateCv'])->name('update.cv');
});
Route::get('/admin/login',[App\Http\Controllers\Admins\AdminsController::class,'viewLogin'])->name('view.login');
Route::post('/admin/login',[App\Http\Controllers\Admins\AdminsController::class,'checkLogin'])->name('check.login');
Route::delete('/admin/login',[App\Http\Controllers\Admins\AdminsController::class,'logoutadmin'])->name('logoutadmin');


Route::group(['prefix' => 'admin','middleware'=>'auth:admin'], function () {
    Route::get('/admin/applications', [App\Http\Controllers\Admins\AdminsController::class, 'showApplications'])->name('admin.applications');


Route::get('/',[App\Http\Controllers\Admins\AdminsController::class,'index'])->name('admins.dashboard');
Route::get('/all-admins',[App\Http\Controllers\Admins\AdminsController::class,'admins'])->name('view.admins');
Route::get('/create-admins',[App\Http\Controllers\Admins\AdminsController::class,'createAdmins'])->name('create.admins');
Route::post('/create-admins',[App\Http\Controllers\Admins\AdminsController::class,'storeAdmins'])->name('store.admins');
Route::get('/display-catagories',[App\Http\Controllers\Admins\AdminsController::class,'displayCatagories'])->name('display.catagories');

Route::get('/create-catas',[App\Http\Controllers\Admins\AdminsController::class,'createCatagories'])->name('create.catagories');
Route::post('/create-catas',[App\Http\Controllers\Admins\AdminsController::class,'storeCatagories'])->name('store.catagories');

Route::get('/edit-catas/{id}',[App\Http\Controllers\Admins\AdminsController::class,'editCatagories'])->name('edit.catagories');
Route::post('/edit-catas/{id}',[App\Http\Controllers\Admins\AdminsController::class,'updateCatagories'])->name('update.catagories');

Route::get('/delete-catas/{id}',[App\Http\Controllers\Admins\AdminsController::class,'deleteCatagories'])->name('delete.catagories');

Route::get('/display-jobs',[App\Http\Controllers\Admins\AdminsController::class,'allJobs'])->name('display.jobs');
Route::get('/display-contacts',[App\Http\Controllers\Admins\AdminsController::class,'messages'])->name('display.contacts');

// Route::get('/all-work',[App\Http\Controllers\Admins\AdminsController::class,'swork'])->name('display.jobs');

Route::get('/create-jobs',[App\Http\Controllers\Admins\AdminsController::class,'createJobs'])->name('create.jobs');
Route::get('/all-work',[App\Http\Controllers\Admins\AdminsController::class,'paymentPage'])->name('payment');
Route::post('/create-jobs',[App\Http\Controllers\Admins\AdminsController::class,'storeJobs'])->name('store.jobs');
Route::get('/delete-jobs/{id}',[App\Http\Controllers\Admins\AdminsController::class,'deleteJobs'])->name('delete.jobs');
Route::get('/display-apps',[App\Http\Controllers\Admins\AdminsController::class,'displayApps'])->name('display.apps');


Route::get('/delete-apps/{id}',[App\Http\Controllers\Admins\AdminsController::class,'deleteApps'])->name('delete.apps');
Route::post('/accept-application/{id}', [App\Http\Controllers\Admins\AdminsController::class,'acceptApplication'])->name('accept.application');


});
// routes/web.php
Route::get('/all-work',[App\Http\Controllers\FileController::class,'index'])->name('ab');
Route::post('/submit-work/{id}',[App\Http\Controllers\FileController::class,'store'])->name('cd');

Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
Route::delete('/deleteUserInfo', 'App\Http\Controllers\StripeController@deleteUserInfo')->name('deleteUserInfo');
Route::delete('/deletemessage', 'App\Http\Controllers\Admins\AdminsController@deletemessage')->name('deletemessage');
//blog route
Route::get('/blogs',[BlogsController::class,'index'] )->name('blogs');