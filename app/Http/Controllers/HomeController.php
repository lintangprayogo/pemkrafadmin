<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class HomeController extends Controller
{
    //



   public function index()
   {

    $roles=Role::get();
     return view("home",["roles"=>$roles]);
   }
}
