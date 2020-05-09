<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CultureSite;
use App\Imports\CultureSiteImport;
use Yajra\Datatables\Datatables;
use Excel;
use Redirect;
class CultureController extends Controller
{
      public function culture (){
        return view("situsbudaya");
    }

    public function createBudaya(Request $request){
    	$photo=$request->photo;
         if(isset($photo)){
            $ext = $photo->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar_path = public_path()."/gambar/budaya/situs";
            $photo->move($gambar_path, $newName);
            $data = array(
            	 "register_number"=>$request->register_number,
                 "register_date"=>$request->reqister_date,
                 "object_name"=>$request->name,
                 "object_address"=>$request->address,
                 "object_exist"=>$request->exist,
                 "object_category"=>$request->kategori,
                 "kelurahan"=>$request->kelurahan,
                 "kecamatan"=>$request->kecamatan,
                 "provinsi" => $request->provinsi,
                 "photo"=>$newName            
             );
         }else{
               $data = array(
               	"register_number"=>$request->register_number,
                 "register_date"=>$request->reqister_date,
                 "object_name"=>$request->name,
                 "object_address"=>$request->address,
                 "object_exist"=>$request->exist,
                 "object_category"=>$request->kategori,
                 "kelurahan"=>$request->kelurahan,
                 "kecamatan"=>$request->kecamatan,
                 "provinsi" => $request->provinsi,         
             ); 
         }      
         return CultureSite::create($data);
    }


    public function showBudaya(){
  return  Datatables::of(CultureSite::select("id","object_name", "object_category","object_exist","photo","object_address"))

       ->addColumn('action','
            <center>
            <a href="#"  data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit-budaya"  data-toggle="modal" data-target="#ajax-crud-modal">
            <i class="fa fa-edit"></i>
            
            </a>
           <a href="#" class="btn btn-danger" onclick="deleteBudaya({{$id}})"><i class="fa fa-trash"></i></a>
              </center>')
        ->rawColumns(['action','role'])
        ->addIndexColumn()
        ->make(true);
    
  }

  public function deleteBudaya($id){
  	$site=CultureSite::find($id);
    $site->delete();
  	return $site;
  }

  public function profileBudaya($id){
  	$site=CultureSite::find($id);
  	return $site;
  }

  public function editBudaya(Request $request){
  	  $site=CultureSite::find($request->budaya_id);
  	  $site->register_number=$request->register_number;
  	  $site->register_date=$request->register_date; 
  	  $site->object_exist=$request->exist;
  	  $site->object_category=$request->category;
      $site->object_name=$request->name;
      $site->object_address=$request->address;
      $site->kelurahan=$request->kelurahan;
      $site->provinsi=$request->provinsi;
     
      
     if(isset($photo)){
            $ext = $logo->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar_path = public_path()."/gambar/event";
            $photo->move($gambar_path, $newName);
            $site->photo=$newName;
            $check = $site->save();
            if($check && !empty($oldPoster)){
              $path = public_path()."/gambar/event/".$oldPoster;
              if(file_exists($path)){
                 unlink($path);
              }
            }
          return $site;
        }

          $site->save();         
        return $site;
  }

  public function uploadBudaya(Request $request){
    try {
        $uploadedFile = $request->file('file'); 
          Excel::import(new CultureSiteImport, $uploadedFile);
          return Redirect::back();
      } catch (Exception $e) {
              return Redirect::back();
      }
  }
}
