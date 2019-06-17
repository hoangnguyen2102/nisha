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

//Auth::routes(['verify'=>true]);
Route::namespace('Admin')->prefix('admin')->group(function ($router) {

    // LOGIN & LOGOUT
    Route::post('login', 'Auth\LoginController@login');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login.show');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
    // VERIFY
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');
    Route::get('email/verify', 'Auth\VerificationController@show')->name('admin.verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('admin.verification.verify');
    Route::get('email/verify-information', 'Auth\VerificationController@showFormVerifyInformation')->name('admin.verification.informationNotice');
    Route::post('email/verify-information', 'Auth\VerificationController@verifyInformation')->name('admin.verification.verifyInformation');
    // FORGOT & RESET PASSWORD
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.admin.email');
    Route::post('password/reset/{id}', 'Auth\ResetPasswordController@showResetForm')->name('password.admin.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.admin.update');

    Route::group([[
        'middleware' => ['admin.verified', 'auth:admin']
    ],], function($router) {
        Route::get('/', 'HomeController@index')->name('admin.dashboard');

        // CRUD
        Route::resource('employee', 'AdminController');
        Route::resource('tag', 'TagController')->except(['show']);
        Route::resource('article', 'ArticleController')->except(['show']);
        Route::resource('customer', 'CustomerController')->except(['show']);
        Route::resource('feedback', 'FeedBackController')->only(['index', 'show', 'create']);
        Route::resource('slider', 'SliderController')->except(['show']);
        Route::resource('voucher', 'VoucherController')->except(['show']);
        Route::resource('curriculum', 'CurriculumController')->except(['show']);

        Route::get('customer/user', 'CustomerController@listUser');
        Route::get('customer/contract', 'CustomerController@listContract');
        Route::get('customer/request', 'CustomerController@listRequest');

        // SETTING
        Route::get('setting', 'SettingSystemController@edit')->name('setting');
        Route::put('setting/update/{id}', 'SettingSystemController@update')->name('setting.update');

        // CORE REQUEST TRAIN
        Route::get('work', 'ScheduleController@scheduleOfAdmin')->middleware('auth:admin');
        Route::get('trained', 'ScheduleController@scheduleOfAdminTrained')->middleware('auth:admin');
        Route::put('confirm-schedule', 'ScheduleController@scheduleOfAdminTrained')->middleware('auth:admin')->name('admin.schedule.confirm');

        Route::get('register-train', 'RequestController@index');
        Route::get('show-register-train/{id}', 'RequestController@show')->name('request.show');
        Route::post('register-train-confirm/{id}', 'RequestController@confirm')->name('request.confirm');

        Route::get('register-personal-trainer', 'ContractController@index');
        Route::get('show-register-personal-trainer/{id}', 'ContractController@show')->name('contract.show');
        Route::post('register-personal-trainer-confirm/{id}', 'ContractController@confirm')->name('contract.confirm');

        // ROUTE PASSWORD
        Route::get('account/change-password', 'Auth\AccountController@changePassword')->name('showFormChangePassword');
        Route::put('account/change-password', 'Auth\AccountController@postChangePassword')->name('changePassword');

        // ROUTE PROFILE
        Route::get('account/change-profile', 'Auth\AccountController@changeProfile')->name('showFormChangeProfile');
        Route::post('account/change-profile', 'Auth\AccountController@postChangeProfile')->name('changeProfile');
    });
});


Route::group(
 [
    'namespace' => 'Client',
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localize',], // Route translate middleware
 ],
 function() {
 	// -------------- Home (index) ------------------

     // STATIC
    Route::get('/', 'HomeController@index');

    //
    Route::get(LaravelLocalization::transRoute('routes.personal-trainer'), 'PersonalTrainerController@getBySlug')->name('client.single-personal-trainer');
    Route::get(LaravelLocalization::transRoute('routes.intro'), 'IntroController@index')->name('client.intro');
    Route::get(LaravelLocalization::transRoute('routes.list-personal-trainer'), 'PersonalTrainerController@index')->name('client.list-personal-trainer');
    Route::get(LaravelLocalization::transRoute('routes.blog'), 'ArticleController@index')->name('client.blog');
    Route::get(LaravelLocalization::transRoute('routes.voucher'), 'VoucherController@index')->name('client.voucher');
    Route::get(LaravelLocalization::transRoute('routes.feedback'), 'FeedbackController@index')->name('client.feedback');
    Route::post(LaravelLocalization::transRoute('routes.feedback'), 'FeedbackController@store')->name('client.feedback.store');
    Route::get(LaravelLocalization::transRoute('routes.article'), 'SingleArticleController@index')->name('client.single-article');

    // REGISTER
    Route::get(LaravelLocalization::transRoute('routes.register'), 'Auth\RegisterController@showRegistrationForm')->name('client.register.show');
    Route::post(LaravelLocalization::transRoute('routes.register'), 'Auth\RegisterController@register')->name('client.register');
    // VERIFY
    Route::get(LaravelLocalization::transRoute('routes.email-resend'), 'Auth\VerificationController@resend')->name('client.verification.resend');
    Route::get(LaravelLocalization::transRoute('routes.email-verify'), 'Auth\VerificationController@show')->name('client.verification.notice');
    Route::get(LaravelLocalization::transRoute('routes.email-verify-id'), 'Auth\VerificationController@verify')->name('client.verification.verify');
    // LOGIN
    Route::get(LaravelLocalization::transRoute('routes.login'), 'Auth\LoginController@showLoginForm')->name('client.login.show');
    Route::post(LaravelLocalization::transRoute('routes.login'), 'Auth\LoginController@login')->name('client.login');
    Route::post(LaravelLocalization::transRoute('routes.logout'), 'Auth\LoginController@logout')->name('client.logout');
    // FORGOT & RESET PASSWORD
    Route::post(LaravelLocalization::transRoute('routes.password-email'), 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.client.email');
    Route::post(LaravelLocalization::transRoute('routes.password-reset-token'), 'Auth\ResetPasswordController@showResetForm')->name('password.client.reset');
    Route::post(LaravelLocalization::transRoute('routes.password-reset'), 'Auth\ResetPasswordController@reset')->name('password.client.update');

    // DASHBOARD
    Route::get(LaravelLocalization::transRoute('routes.dashboard'), 'CoreBusinessController@index')->name('client.dashboard');
    Route::get(LaravelLocalization::transRoute('routes.my-schedule'), 'CoreBusinessController@showMySchedule')->name('client.show-my-schedule');
    Route::get(LaravelLocalization::transRoute('routes.my-list-schedule'), 'CoreBusinessController@showMyListSchedule')->name('client.my-list-schedule');
    Route::put(LaravelLocalization::transRoute('routes.confirm-schedule'), 'CoreBusinessController@confirmScheduleComplete')->name('client.schedule.confirm');

    // CORE BUSINESS
     Route::get(LaravelLocalization::transRoute('routes.register-train'), 'CoreBusinessController@showFormRegisterTrain')->name('client.show-register-train');
     Route::post(LaravelLocalization::transRoute('routes.register-train'), 'CoreBusinessController@registerTrain')->name('client.register-train');

     Route::get(LaravelLocalization::transRoute('routes.register-personal-trainer'), 'CoreBusinessController@showFormRegisterPersonalTrainer')->name('client.show-register-pt');
     Route::post(LaravelLocalization::transRoute('routes.register-personal-trainer'), 'CoreBusinessController@registerPersonalTrainer')->name('client.register-personal-trainer');

     Route::get(LaravelLocalization::transRoute('routes.schedule-choice'), 'CoreBusinessController@showFormChoosePT')->name('client.show-choice');
//     Route::post(LaravelLocalization::transRoute('routes.schedule-choice'), 'CoreBusinessController@choosePTHandle')->name('client.choice-handle');
     Route::get(LaravelLocalization::transRoute('routes.register-schedule'), 'CoreBusinessController@showFormRegisterTrainingSchedule')->name('client.show-register-schedule');
     Route::post(LaravelLocalization::transRoute('routes.register-schedule-post'), 'CoreBusinessController@registerTrainingSchedule')->name('client.register-training-schedule');

     Route::get(LaravelLocalization::transRoute('routes.history-register-train'), 'CoreBusinessController@showHistoryRegisterTrain')->name('client.history-register-train');
     Route::get(LaravelLocalization::transRoute('routes.history-register-contract'), 'CoreBusinessController@showHistoryRegisterContract')->name('client.history-register-contract');
     Route::get(LaravelLocalization::transRoute('routes.history-register-schedule'), 'CoreBusinessController@showHistoryRegisterSchedule')->name('client.history-register-schedule');

 });
Route::delete('delete-schedule/{id}', 'Admin\ScheduleController@delete')->name('client.schedule.delete');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

