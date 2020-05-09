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
    Route::get('/dashboard', "DashboardController@index");
    Route::get('/admin', "HomeController@index");
    Route::get('/umkm','EkrafController@umkm');
    Route::get('/event/{kind}','EventController@event');
    Route::get("/destinasiwisata","DestinationController@index");
    Route::get('/culture','CultureController@culture');
    Route::get("/admin/show","AdminController@displayAdmin")->name("show.admin");
    Route::get("/admin/profile/{id}","AdminController@profile")->name("profile.admin");  
    Route::get("umkm/show","EkrafController@showUMKM")->name("show.umkm");
    Route::get("event/show/{kind}","EventController@show")->name("show.event");


    Route::post("event/create","EventController@createEvent")->name("create.event");
    Route::delete("event/delete/{id}","EventController@deleteEvent")->name("delete.event");
    Route::get("event/profile/{id}","EventController@profileEvent")->name("profile.event");
    Route::post("event/edit","EkrafController@editPameran");

   


 Route::group(['middleware' => ['role:super']], function () {
    Route::post("/admin/create","AdminController@create")->name("create.admin");
      Route::post("/admin/edit","AdminController@edit")->name("edit.admin");
      Route::delete("/admin/delete/{id}","AdminController@delete")->name("delete.admin");
      Route::post("/admin/upload","AdminController@upload");
  });


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





  });


 Route::group(['middleware' => ['role:pariwisata']], function () {
         Route::post("/destinasiwisata/create","DestinationController@create")->name("create.destination");
         Route::get("/destinasiwisata/show","DestinationController@show")->name("show.destination");
         Route::get("/destinasiwisata/profile/{id}","DestinationController@profile")->name("show.destinationProfile");
         Route::delete("/destinasiwisata/delete/{id}","DestinationController@delete");
         Route::post("/destinasiwisata/upload","DestinationController@upload");
           Route::post("/destinasiwisata/edit","DestinationController@edit");
     
  });
 Route::get("/budaya/show","CultureController@showBudaya")->name("show.budaya");
 Route::group(['middleware' => ['role:budaya']], function () {
        Route::post("/budaya/create","CultureController@createBudaya")->name("create.budaya");
          Route::get("/budaya/profile/{id}","CultureController@profileBudaya");
         Route::delete("/budaya/delete/{id}","CultureController@deleteBudaya");
         Route::post("/budaya/upload","CultureController@uploadBudaya");
          Route::post("/budaya/edit","CultureController@editBudaya");
     
  });



});


