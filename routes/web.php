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



/*
|--------------------------------------------------------------------------
| Admin route start from here
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->group(function () {

    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthController@login')->name('admin.login.submit');

    Route::get('/register', 'AuthController@showRegistationPage');
    Route::post('/register', 'AuthController@register')->name('admin.register');
});

// Menu area start

Route::namespace('Admin')->prefix('admin')->group(function () {

    Route::get('/menu', 'AdminController@menuSetting')->name('admin.menu.setting');
    Route::get('/url/setting', 'AdminController@urlSetting')->name('admin.url.setting');
    Route::get('/get/url/name/{id}', 'AdminController@getUrlName');
});



Route::group(['prefix' => 'admin/category', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/', 'CategoryController@index')->name('category.index');
    Route::post('store', 'CategoryController@store')->name('admin.category.store');
    Route::patch('update', 'CategoryController@update')->name('admin.category.update');
    Route::get('status/change/{categoryId}', 'CategoryController@changeStatus')->name('admin.category.status.update');
    Route::get('soft/delete/{categoryId}', 'CategoryController@softDelete')->name('admin.category.soft.delete');
    Route::get('hard/delete/{categoryId}', 'CategoryController@hardDelete')->name('admin.category.hard.delete');
    Route::post('multiple/soft/delete', 'CategoryController@multipleSoftDelete')->name('admin.category.multiple.soft.delete');
    Route::post('multiple/hard/delete', 'CategoryController@multipleHardDelete')->name('admin.category.multiple.hard.delete');
    Route::get('trashes', 'CategoryController@trashes')->name('admin.category.trashes');
    Route::get('refactor/{categoryId}', 'CategoryController@refactor')->name('admin.category.refactor');
    Route::post('multiple/refactor', 'CategoryController@multipleRefactor')->name('admin.category.multiple.refactor');

    // Ajax Routes
    Route::get('/edit/{categoryId}', 'CategoryController@getCategoryNameByAjax');
});

Route::group(['prefix' => 'admin/academic', 'namespace' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::group(['prefix' => 'class'], function () {
        Route::get('/', 'ClassController@index')->name('admin.class.index');
        Route::post('store', 'ClassController@store')->name('admin.class.store');

        Route::patch('update/{classId}', 'ClassController@update')->name('admin.class.update');



        Route::get('status/change/{classId}', 'ClassController@changeStatus')->name('admin.class.status.update');
        Route::get('soft/delete/{classId}', 'ClassController@softDelete')->name('admin.class.soft.delete');
        Route::post('multiple/delete', 'ClassController@multipleSoftDelete')->name('admin.class.multiple.soft.delete');

        Route::get('trashes', 'ClassController@trashes')->name('admin.class.trashes');
        Route::get('refactor/{classId}', 'ClassController@refactor')->name('admin.class.refactor');
        Route::post('multiple/refactor', 'ClassController@multipleRefactor')->name('admin.class.multiple.refactor');
        Route::get('hard/delete/{classId}', 'ClassController@hardDelete')->name('admin.class.hard.delete');
        Route::post('multiple/hard/delete', 'ClassController@multipleHardDelete')->name('admin.class.multiple.hard.delete');

        // Ajax Route
        Route::get('edit/{classId}', 'ClassController@edit')->name('admin.class.edit');

    });

    Route::group(['prefix' => 'subject'], function () {
        Route::get('/', 'SubjectController@index')->name('admin.academic.subject.index');
        Route::post('store', 'SubjectController@store')->name('admin.academic.subject.store');
        Route::get('change/status/{subjectId}', 'SubjectController@changeStatus')->name('admin.academic.subject.status.update');
        Route::get('delete/{subjectId}', 'SubjectController@delete')->name('admin.academic.subject.delete');
        Route::post('multiple/delete', 'SubjectController@multipleDelete')->name('admin.academic.subject.multiple.delete');
        Route::get('edit/{subjectId}', 'SubjectController@edit')->name('admin.academic.subject.edit');
        Route::patch('update/{subjectId}', 'SubjectController@update')->name('admin.academic.subject.update');

        // Ajax Route
        Route::get('edit/{subjectId}', 'SubjectController@edit')->name('admin.academic.subject.edit');
    });

    Route::group(['prefix' => 'section'], function () {
        Route::get('/', 'SectionController@index')->name('admin.academic.section.index');
        Route::post('store', 'SectionController@store')->name('admin.academic.section.store');
        Route::patch('update', 'SectionController@update')->name('admin.academic.section.update');
        Route::get('delete/{section}', 'SectionController@delete')->name('admin.academic.delete');
        Route::post('multiple/delete', 'SectionController@multipleDelete')->name('admin.academic.section.multiple.delete');
        Route::get('change/status/{section}', 'SectionController@changeStatus')->name('admin.academic.section.status.update');


         // Ajax Routes
         Route::get('/edit/{sectionId}', 'SectionController@getSectionByAjax');
    });

    Route::group(['prefix' => 'assign/subjects'], function () {
        Route::get('/', 'AcademicAssignController@allAssignedSubject')->name('admin.academic.assign.all.assigned.subject');
        Route::post('assign', 'AcademicAssignController@subjectAssign')->name('admin.academic.assign.subject.class');
        Route::patch('update', 'AcademicAssignController@subjectAssignUpdate')->name('admin.academic.assign.subject.class.update');
        Route::get('delete/{classSectionId}', 'AcademicAssignController@subjectAssignDelete')->name('admin.academic.assign.subject.class.delete');

        // Ajax Routes
        Route::get('get/sections/by/{classId}', 'AcademicAssignController@getSectionByAjax');
        Route::get('get/assigned/subject/{classSectionId}', 'AcademicAssignController@getAssignedSubjectByAjax');

    });

    Route::group(['prefix' => 'assign/class/teachers'], function () {

        Route::get('/', 'AssignClassTeacherController@index')->name('academic.assign.class.teacher.index');
    });

});

Route::group(['prefix' => 'admin/transport', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {

    Route::group(['prefix' => 'route'], function () {
        Route::get('/', 'RouteController@index')->name('admin.route.index');
        Route::post('store', 'RouteController@store')->name('admin.route.store');
        Route::get('status/change/{routeId}', 'RouteController@changeStatus')->name('admin.route.status.update');
        Route::patch('update', 'RouteController@update')->name('admin.route.update');
        Route::get('delete/{routeId}', 'RouteController@delete')->name('admin.route.delete');
        Route::post('multiple/delete', 'RouteController@multipleDelete')->name('admin.route.multiple.delete');

        // Ajax Routes
        Route::get('/edit/{routeId}', 'RouteController@getRouteByAjax');
    });

    Route::group(['prefix' => 'vehicles'], function () {
        Route::get('/', 'VehicleController@index')->name('admin.vehicle.index');
        Route::post('store', 'VehicleController@store')->name('admin.vehicle.store');
        Route::get('edit/{vehicleId}', 'VehicleController@edit')->name('admin.vehicle.edit');
        Route::post('update/{vehicleId}', 'VehicleController@update')->name('admin.vehicle.update');
        Route::get('delete/{vehicleId}', 'VehicleController@delete')->name('admin.vehicle.delete');
        Route::get('status/update/{vehicleId}', 'VehicleController@statusUpdate')->name('admin.route.status.update');
        Route::post('multiple/delete', 'VehicleController@multipleDelete')->name('admin.vehicle.multiple.delete');
    });

    Route::group(['prefix' => 'assign/vehicle'], function () {
        Route::get('/', 'TransportController@index')->name('admin.assign.vehicle.index');
        Route::post('store', 'TransportController@store')->name('admin.assign.vehicle.store');
        Route::get('edit/{routeId}', 'TransportController@edit')->name('admin.assign.vehicle.edit');
        Route::post('update/{routeId}', 'TransportController@update')->name('admin.assign.vehicle.update');
        Route::get('delete/{routeId}', 'TransportController@delete')->name('admin.assign.vehicle.delete');
        Route::post('multiple/delete', 'TransportController@multipleDelete')->name('admin.assign.vehicle.multiple.delete');
    });

});

Route::group(['prefix' => 'admin/expanses', 'middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {

    Route::group(['prefix' => '/'], function () {

        Route::get('all', 'ExpanseController@index')->name('admin.expanse.index');
        Route::post('store', 'ExpanseController@store')->name('admin.expanse.store');
        Route::get('edit/{expanseId}', 'ExpanseController@edit')->name('admin.expanse.edit');
        Route::post('update/{expanseId}', 'ExpanseController@update')->name('admin.expanse.update');
        Route::get('status/change/{expanseId}', 'ExpanseController@statusChange')->name('admin.expanse.status.update');
        Route::get('delete/{expanseId}', 'ExpanseController@delete')->name('admin.expanse.delete');
        Route::post('multiple/delete', 'ExpanseController@multipleDelete')->name('admin.expanse.multiple.delete');
        Route::get('search', 'ExpanseController@search')->name('admin.expanse.search');
        Route::get('search/action', 'ExpanseController@searchAction')->name('admin.expanse.search.action');

    });

    Route::group(['prefix' => 'headers'], function () {
        Route::get('/', 'ExpanseHeaderController@index')->name('admin.expanse.header.all');
        Route::post('store', 'ExpanseHeaderController@store')->name('admin.expanse.header.store');
        Route::get('status/update/{headerId}', 'ExpanseHeaderController@changeStatus')->name('admin.expanse.header.status.update');
        Route::get('delete/{headerId}', 'ExpanseHeaderController@delete')->name('admin.expanse.header.delete');
        Route::post('multiple/delete', 'ExpanseHeaderController@multipleDelete')->name('admin.expanse.header.multiple.delete');
        Route::patch('update', 'ExpanseHeaderController@update')->name('admin.expanse.header.update');

        // Ajax Routes
        Route::get('edit/{headerId}', 'ExpanseHeaderController@getHeaderByAjax');
    });

});


// Hostel  area start


Route::group(['prefix'=>'admin/hostel','namespace'=>'Admin'],function(){

    Route::get('/','HostelController@index')->name('admin.hostel');
    Route::post('/store','HostelController@store')->name('hostel.store');
    Route::get('/edit/{id}','HostelController@edit')->name('hostel.edit');
    Route::PATCH('/update','HostelController@update')->name('hostel.update');
    Route::get('/status/update/{id}','HostelController@statusUpdate')->name('hostel.status.update');
    Route::post('/hostel/multidelete','HostelController@hostelMultiDelete')->name('hostel.multidelete');
    Route::get('/delete/{id}','HostelController@destroy')->name('hostel.destroy');


    Route::get('/add/room/','HostelController@hostelroom')->name('hostel.addroom');
    Route::post('/submit/room/','HostelController@hostelroomstore')->name('hostelroom.store');
    Route::get('/hostelroom/active/{id}','HostelController@hostelroomactive');
    Route::get('/hostelroom/deactive/{id}','HostelController@hostelroomdeactive');
    Route::get('/hostelroom/delete/{id}','HostelController@hostelroomdelete');
    Route::get('/hostelroom/edit/{id}','HostelController@hostelroomedit');
    Route::post('/hostelroom/update','HostelController@hostelroomupdate')->name('hostelroom.update');
    Route::post('/hostelroom/multidelete','HostelController@hostelroommultidel')->name('hostelroom.multidelete');








    Route::group(['prefix'=>'room/type'],function(){
        Route::get('/','RoomTypeController@index')->name('room.type');
        Route::post('/store','RoomTypeController@store')->name('hostel.room.type.store');
        Route::get('/edit/{id}','RoomTypeController@edit');
        Route::PATCH('/update','RoomTypeController@update')->name('room.type.update');
        Route::post('/multidelete','RoomTypeController@multipleDelete')->name('room.type.multidelete');
        Route::get('/status/update/{id}','RoomTypeController@changeStatus')->name('room.type.status.update');
        Route::get('/delete/{id}','RoomTypeController@destroy')->name('room.type.delete');

    });

});
// Hostel area end


Route::group(['prefix' => 'admin/student', 'namespace' => 'Admin'], function () {

    Route::get('/create', 'StudentAdmissionController@create')->name('student.create');
    Route::get('/section/all/{id}', 'StudentAdmissionController@getsection');
    Route::get('/route/{id}', 'StudentAdmissionController@getbus');
    Route::get('/get/hostel/{id}','StudentAdmissionController@getroom');

});

// Inventory area start
Route::group(['prefix'=>'admin/inventory','namespace'=>'Admin'],function(){
    Route::group(['prefix'=>'category'],function(){
        Route::get('/','InventoryController@categoryIndex')->name('category.index');
        Route::post('/store','InventoryController@categoryStore')->name('category.store');
        Route::get('/edit/{id}','InventoryController@categoryEdit');
        Route::patch('/update','InventoryController@categoryUpdate')->name('inventory.category.update');
        Route::get('/delete/{id}','InventoryController@categoryDelete')->name('inventory.category.delete');
        Route::post('/category/multidelete','InventoryController@categoryMultiDelete')->name('inventory.category.multidelete');
    });
   
});
// Inventory area end



Auth::routes();
