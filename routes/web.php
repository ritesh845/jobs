<?php

use Illuminate\Support\Facades\Route;
use App\Models\City;
use App\Models\SkillMast;
use App\Models\JobPost;
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

Route::get('/', function () {
	$posts = JobPost::has('employeer')->select('job_id','title','job_type','salary_min','salary_max','exp_min','exp_max','employeer_id','negotiable','start_date','city_code','state_code','created_at')->where('end_date','>=', date('Y-m-d'))->orderBy('created_at','desc')->where('status','A')->get()->take(10);
	$skills =  SkillMast::orderBy('skill_name')->get()->take(12);
	$cities =  City::has('posts')->orderBy('city_code')->get()->take(12);
	
    return view('welcome',compact('skills','cities','posts'));
});
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/job_details/{id}', [App\Http\Controllers\FrontendController::class, 'job_details'])->name('job_details');
Route::get('/find_jobs', [App\Http\Controllers\FrontendController::class, 'find_jobs'])->name('find_jobs');

Route::get('/filterJobs',[App\Http\Controllers\FrontendController::class,'filterJobs'])->name('filterJobs');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/get_user_type/{id}', [App\Http\Controllers\FrontendController::class, 'get_user_type'])->name('get_user_type');

Route::get('/get_cities/{id}', [App\Http\Controllers\FrontendController::class, 'get_cities'])->name('get_cities');

Route::get('/verify/{token}','App\Http\Controllers\VerifyController@verifyUser');


Route::group(['middleware' => ['role:employeer']],function(){
	Route::resource('/postjob','App\Http\Controllers\PostJobController');

	Route::get('/employeer/profile/{id}',[App\Http\Controllers\HomeController::class, 'employeer_profile'])->name('employeer.profile');

	Route::post('/employeer/profile',[App\Http\Controllers\HomeController::class, 'employeer_profile_update'])->name('employeer.profile_update');

	Route::get('/applied_resume',[App\Http\Controllers\PostJobController::class,'applied_resume'])->name('applied_resume');
	Route::get('/applier_profile/{id}',[App\Http\Controllers\PostJobController::class,'applier_profile'])->name('applier_profile');

	Route::get('/search_resume',[App\Http\Controllers\PostJobController::class,'searchResumeIndex'])->name('search_resume.index');
});



Route::group(['middleware' => ['role:job_seeker']],function(){
	//Jobseeker Profile Routes
	Route::get('/jobseeker/profile/{id}',[App\Http\Controllers\HomeController::class, 'jobseeker_profile'])->name('jobseeker.profile');

	Route::get('/jobseeker/profile/{id}/edit',[App\Http\Controllers\HomeController::class, 'jobseeker_editProfile'])->name('jobseeker.editProfile');
	Route::post('/jobseeker/profile',[App\Http\Controllers\HomeController::class, 'jobseeker_profile_update'])->name('jobseeker.profile_update');
	Route::post('/apply_job',[App\Http\Controllers\PostJobController::class,'apply_job'])->name('apply_job');

	Route::get('/applied_job',[App\Http\Controllers\PostJobController::class,'applied_job'])->name('applied_job');

});




Route::get('/get_qualification/{id}',[App\Http\Controllers\HomeController::class,'get_qualification'])->name('get_qualification');



// Route::get('/employeer/profile/{id}/edit',[App\Http\Controllers\HomeController::class, 'employeerProfileEdit'])->name('employeer.profile_edit');


Route::group(['middleware' => ['role:super_admin','auth'],'prefix' => '/admin'],function(){

	Route::get('/employeer',[App\Http\Controllers\AdminController::class,'get_employeer'])->name('admin.employeer');

	Route::get('/employeer_active/{id}',[App\Http\Controllers\AdminController::class,'employeer_active'])->name('admin.employeer_active');

	Route::get('/jobseeker',[App\Http\Controllers\AdminController::class,'get_jobseeker'])->name('admin.jobseeker');
	Route::get('/job_post',[App\Http\Controllers\AdminController::class,'get_jobPosts'])->name('admin.job_post');



});


Route::group(['middleware' => ['auth'] ],function(){
	Route::get('notification_read/{id}',[App\Http\Controllers\HomeController::class,'notification_read'])->name('notification_read');
});