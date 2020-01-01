<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('dashboard');
Route::get('/home', 'HomeController@index')->name('dashboard');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('about', 'HomeController@index');

Route::resource('roles', 'RoleController');

Route::resource('modules', 'ModuleController');

Route::get('/module/step1/{id?}', 'ModuleController@getStep1')->name('modules.create');
Route::get('/module/step2/{tablename?}', 'ModuleController@getStep2')->name('modules.create');
Route::get('/getJoinFields/{tablename?}', 'ModuleController@getJoinFields');
Route::get('/module/step3/{tablename?}', 'ModuleController@getStep3')->name('modules.create');

Route::post('/step1', 'ModuleController@postStep1');
Route::post('/step2', 'ModuleController@postStep2');
Route::post('/step3', 'ModuleController@postStep3');


Route::get('/users/add/{id?}', 'UserController@showWorkerForm')->name('users.add');
Route::post('/users/add/', 'UserController@storeWorker')->name('users.storeWorker');

Route::resource('users', 'UserController');

Route::resource('permissions', 'PermissionController');

//Route::resource('profile', 'UserController');

Route::get('user/profile', 'UserController@profile')->name('users.profile');
Route::get('profiles', 'UserController@profile')->name('profiles');
//Route::patch('users/profile-update/{id}', 'UserController@profileUpdate')->name('users.profile-update');

Route::resource('languages', 'LanguageController');

Route::resource('pages', 'PageController');

Route::resource('contactus', 'ContactUsController');

Route::resource('notifications', 'NotificationController');

Route::resource('menus', 'MenuController');

//Menu #TODO need to be fixed
Route::get('statusChange/{id}', 'MenuController@statusChange');

Route::post('/tasks/complete/', 'TaskController@taskComplete')->name('tasks.taskComplete');

Route::resource('settings', 'SettingController');

Route::resource('attendances', 'AttendanceController');

Route::resource('tasks', 'TaskController');

Route::resource('task-categories', 'TaskCategoryController');

Route::resource('task-comments', 'TaskCommentController');

//Route::post('/home/ajax', 'HomeController@clock');

Route::post('home/clock', 'HomeController@clock')->name('clock');

Route::post('home/notification', 'HomeController@getNotification');
Route::post('{id}/home/notification', 'HomeController@getNotification');
Route::post('home/alert', 'HomeController@getAlertNotification');
Route::post('{id}/home/alert', 'HomeController@getAlertNotification');
Route::get('home/unread/{id}', 'HomeController@markRead');
Route::get('{idd}/home/unread/{id}', 'HomeController@markRead');


// ======== Junaid Edited Code ===========

Route::post('/uploadfile', 'TaskController@uploadFile');

Route::post('/uploaduserfile', 'UserController@uploadFile');


Route::post('/quickorders/itemstotal', 'QuickorderController@calculate');

Route::post('/quickorders/invoice', 'QuickorderController@invoice');

// ======== Junaid Edited Code Ends Here===========



Route::resource('orders', 'OrderController');

Route::resource('order-items', 'OrderItemController');

Route::resource('orderitems', 'OrderitemController');

Route::resource('quickorders', 'QuickorderController');

Route::resource('quickorderitems', 'QuickorderitemController');

Route::resource('facilitators', 'FacilitatorController');

Route::resource('facilitator-tracks', 'FacilitatorTrackController');