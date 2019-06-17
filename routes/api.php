<?php

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
Route::group([
    'prefix' => 'schedule',
    'namespace' =>  'Admin',
], function () {
    Route::get('user/{id}', 'ScheduleController@getUserSchedule')->name('schedule.get.user');
    Route::get('personal-trainer-admin/{id}', 'ScheduleController@getPTSchedule')->name('schedule.get.pt');
    Route::post('get-personal-trainer', 'ScheduleController@getOnePT')->name('pt.getOne');
    Route::post('get-curriculum', 'ScheduleController@getOneCur')->name('cur.getOne');
});

Route::post('upload-image', 'UploadController@up')->name('upload.up');
Route::get('test', 'UploadController@test');

Route::group([
    'middleware' => ['auth:admin-api']
], function () {
    Route::post('feedback', 'Admin\FeedbackController@apiGet')->name('api.feedback.get');

});