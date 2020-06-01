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
})->name("index");
Auth::routes();

Route::group(['middleware' => 'revalidate'], function()
{
  
Route::group(['middleware' => ['auth']], function () { 
    Route::get('/dashboard', "DashboardController@index");
    Route::get('/dashboard/eventCount', "DashboardController@getEventCount");
    Route::get("/dashboard/sectorCount","DashboardController@getAccomodationSectotCount");
    Route::get("/dashboard/kindCount","DashboardController@getAccomodationKindCount");
    Route::get("/dashboard/sekbid/rapatkindCount","DashboardController@getRapatSekbidKindCount");
    Route::get("/dashboard/sekbid/rapatsourceCount","DashboardController@getRapatSekbidSourceCount");
    Route::get("/dashboard/kadis/rapatkindCount","DashboardController@getRapatKadisKindCount");
    Route::get("/dashboard/kadis/rapatsourceCount","DashboardController@getRapatKadisSourceCount");

    Route::get('/admin', "HomeController@index");
    Route::get('/umkm','EkrafController@umkm');


    Route::get('/event/pariwisata','EventController@eventPariwisata');
    Route::get('/event/ekraf','EventController@eventEkraf');
    Route::get('/event/budaya','EventController@eventBudaya');
    



    Route::get("/destinasiwisata","DestinationController@index");
    Route::get('/culture','CultureController@culture');
    Route::get("/admin/show","AdminController@displayAdmin")->name("show.admin");
    Route::get("/admin/profile/{id}","AdminController@profile")->name("profile.admin");  
    Route::get("umkm/show","EkrafController@showUMKM")->name("show.umkm");
   
   
    
    Route::get("/penginapan","AccommodationController@index");
    Route::get("/penginapan/show","AccommodationController@show")->name("show.penginapan");
   Route::get("/destinasiwisata/show","DestinationController@show")->name("show.destination");



    Route::get("event/profile/{id}","EventController@profileEvent")->name("profile.event");
    Route::get("event/show","EventController@show")->name("show.event");

   


 Route::group(['middleware' => ['role:super']], function () {
    Route::post("/admin/create","AdminController@create")->name("create.admin");
      Route::post("/admin/edit","AdminController@edit")->name("edit.admin");
      Route::delete("/admin/delete/{id}","AdminController@delete")->name("delete.admin");
      Route::post("/admin/upload","AdminController@upload");
      Route::post("rapat/kadis/create","MeetingController@createKadis");
      Route::delete("rapat/kadis/delete/{id}","MeetingController@deleteKadis");
      Route::post("rapat/kadis/edit","MeetingController@editKadis");
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
    
    Route::get("event/show/ekraf","EventController@showEkraf")->name("show.event.ekraf");
    Route::post("event/create/ekraf","EventController@createEventEkraf")->name("create.event.ekraf");
    Route::delete("event/delete/ekraf/{id}","EventController@deleteEventEkraf")->name("delete.event.ekraf");
    Route::post("event/edit/ekraf","EventController@editEventEkraf");


  });


 Route::group(['middleware' => ['role:pariwisata']], function () {
         Route::post("/destinasiwisata/create","DestinationController@create")->name("create.destination");
       
         Route::get("/destinasiwisata/profile/{id}","DestinationController@profile")->name("show.destinationProfile");
         Route::delete("/destinasiwisata/delete/{id}","DestinationController@delete");
         Route::post("/destinasiwisata/upload","DestinationController@upload");
         Route::post("/destinasiwisata/edit","DestinationController@edit");
         Route::post("/penginapan/upload","AccommodationController@upload");
         Route::get("/penginapan/profile/{id}","AccommodationController@profile");
         Route::post("/penginapan/edit","AccommodationController@edit");
         Route::post("/penginapan/create","AccommodationController@create");
         Route::delete("/penginapan/delete/{id}","AccommodationController@delete");
         
         Route::get("event/show/pariwisata","EventController@showPariwisata")->name("show.event.pariwisata");
         Route::post("event/create/pariwisata","EventController@createEventPariwisata")->name("create.event.pariwisata");
         Route::delete("event/delete/pariwisata/{id}","EventController@deleteEventPariwisata")->name("delete.event.pariwisata");
         Route::post("event/edit/pariwisata","EventController@editEventPariwisata");
  });
   Route::get("/budaya/show","CultureController@showBudaya")->name("show.budaya");
 

 Route::group(['middleware' => ['role:budaya']], function () {
         Route::post("/budaya/create","CultureController@createBudaya")->name("create.budaya");
         Route::get("/budaya/profile/{id}","CultureController@profileBudaya");
         Route::delete("/budaya/delete/{id}","CultureController@deleteBudaya");
         Route::post("/budaya/upload","CultureController@uploadBudaya");
         Route::post("/budaya/edit","CultureController@editBudaya");
         
         Route::get("event/show/budaya","EventController@showBudaya")->name("show.event.budaya");
         Route::post("event/create/budaya","EventController@createEventBudaya")->name("create.event.budaya");
         Route::delete("event/delete/budaya/{id}","EventController@deleteEventBudaya")->name("delete.event.ekraf");
        Route::post("event/edit/budaya","EventController@editEventBudaya");
    
  });


  Route::get("rapat/kadis","MeetingController@kadis");
  Route::get("/rapat/kadis/kalender","MeetingController@kalenderKadis");
  Route::get("rapat/kadis/show","MeetingController@showKadis")->name("show.kadis");
  Route::get("rapat/kadis/download/{fileName}","MeetingController@getDownload");
  Route::get("rapat/kadis/load","MeetingController@loadKadis");
 
  Route::get("rapat/profile/{id}","MeetingController@profile");


  Route::get("rapat/sekbid","MeetingController@sekbid");
  Route::get("/rapat/sekbid/kalender","MeetingController@kalenderSekbid");
  Route::post("rapat/sekbid/create","MeetingController@createSekbid");
  Route::get("rapat/sekbid/show","MeetingController@showSekbid")->name("show.sekbid");
  Route::get("rapat/sekbid/download/{fileName}","MeetingController@getDownload");
  Route::delete("rapat/sekbid/delete/{id}","MeetingController@deleteSekbid");
  Route::get("rapat/sekbid/load","MeetingController@loadSekbid");
  Route::post("rapat/sekbid/edit","MeetingController@editSekbid");




});


});




