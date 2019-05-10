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

Route::get('/', 'TopicsController@index')->name('root');

// 用户身份验证相关的路由
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 用户注册相关路由
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// 密码重置相关路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email 认证相关路由
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//用户主页相关路由
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
Route::get('userreset', 'UsersController@showreset')->name('users.request');
Route::post('userreset', 'UsersController@reset')->name('users.reset');

//无权限提醒
Route::get('permission-denied', 'PagesController@permissionDenied')->name('permission-denied');
//话题
Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);
//上传图片
Route::post('upload_image1', 'TopicsController@uploadImage')->name('topics.upload_image');
Route::post('upload_image2', 'DevicesController@uploadImage')->name('devices.upload_image');
//回复
Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);
//消息通知
Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);
//设备
Route::resource('devices', 'DevicesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
//分类列表
Route::resource('devcategories', 'DevCategoriesController', ['only' => ['show']]);
//状态列表
Route::resource('statuses', 'StatusesController', ['only' => ['show']]);
//状态列表
Route::get('search/index', 'SearchDevController@index')->name('search.index');
Route::post('search/show', 'SearchDevController@show')->name('search.show');
//申请
Route::post('applysave', 'AppliesController@save')->name('applies.save');
Route::resource('applies', 'AppliesController', ['only' => ['index']]);
Route::post('applyconfirm', 'AppliesController@confirm')->name('applies.confirm');
Route::post('applyreturn', 'AppliesController@return')->name('applies.return');
