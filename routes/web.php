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

Route::get('/', function () {
    return view('index');
});
Auth::routes();
Route::group(['middleware' => ['auth']], function () { 
    Route::get('/admin', "HomeController@index");
    Route::get('/umkm','EkrafController@umkm');
    Route::get('/pameran','EkrafController@pameran');
    Route::get("/destinasiwisata","DestinationController@index");
    Route::get("/admin/show","AdminController@displayAdmin")->name("show.admin");
   	Route::get("/admin/profile/{id}","AdminController@profile")->name("profile.admin"); 


 Route::group(['middleware' => ['role:super']], function () {
		Route::post("/admin/create","AdminController@create")->name("create.admin");
	    Route::post("/admin/edit","AdminController@edit")->name("edit.admin");
	    Route::delete("/admin/delete/{id}","AdminController@delete")->name("delete.admin");
	    Route::post("/admin/upload","AdminController@upload");
  });


    Route::get("umkm/show","EkrafController@showUMKM")->name("show.umkm");
    Route::get("pameran/show","EkrafController@showPameran")->name("show.pameran");
   
    Route::group(['middleware' => ['role:ekraf']], function () {
    Route::get("umkm/profile/{id}","EkrafController@profileUMKM")->name("show.profileumkm");
    Route::get("umkm/{id}","EkrafController@detailUMKM");    
	Route::post("umkm/create","EkrafController@createUMKM")->name("create.umkm");
    Route::delete("/umkm/delete/{id}","EkrafController@deleteUMKM")->name("delete.umkm");
    Route::post("umkm/edit","EkrafController@editUMKM")->name("edit.umkm");
    Route::post("product/create","EkrafController@createProduct");
    Route::get("product/show/{id}","EkrafController@showProduct")->name("show.product");
    Route::delete("product/delete/{id}","EkrafController@deleteProduct")->name("delete.product");
    Route::get("product/profile/{id}","EkrafController@profileProduct")->name("show.profileproduct");
    Route::post("product/edit","EkrafController@editProduct")->name("edit.product");
    Route::post("/umkm/upload","EkrafController@upload");

 
    Route::post("pameran/create","EkrafController@createPameran")->name("create.pameran");
    Route::delete("pameran/delete/{id}","EkrafController@deletePameran")->name("delete.pameran");
    Route::get("pameran/profile/{id}","EkrafController@profilePameran")->name("profile.pameran");
    Route::post("pameran/edit","EkrafController@editPameran");




  });


 Route::group(['middleware' => ['role:pariwisata']], function () {
        Route::post("/destinasiwisata/create","DestinationController@create")->name("create.destination");
         Route::get("/destinasiwisata/show","DestinationController@show")->name("show.destination");
         Route::delete("/destinasiwisata/delete/{id}","DestinationController@delete");
         Route::post("/destinasiwisata/upload","DestinationController@upload");
     
  });



});

