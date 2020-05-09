<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Excel;
use Redirect;

class DashboardController extends Controller
{
    public function index(){
       $events = DB::table('events')->count();
       $destinations=DB::table('destinations')->count();
       $culturesites = DB::table('culturesites')->count();
       $umkm = DB::table('umkm')->count();
      

       return view("dashboard",["events"=>$events,"destinations"=>$destinations,"culturesites"=>$culturesites,"umkm"=>$umkm]);
    }
}
