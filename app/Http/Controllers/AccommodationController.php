<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AccommodationImport;
use App\Model\Accommodation;
use App\Model\AccommodationCategory;
use Yajra\Datatables\Datatables;
use Excel;
use Response;
use Redirect;
class AccommodationController extends Controller
{
    
    public function index(){
        $accommodation_categories=AccommodationCategory::get();
    	return view("penginapan",["accommodation_categories"=>$accommodation_categories]);
    }

    public function upload(Request $request){
      try {
         $uploadedFile = $request->file('file'); 
          Excel::import(new AccommodationImport, $uploadedFile);
          return Redirect::back();
       } catch (Exception $e) {
              return Redirect::back();
      }
          
    }

   public function show(){

        return  Datatables::of(Accommodation::join('accommodation_categories', 'accommodation_categories.id', '=', 'accommodations.accommodation_category_id')->select("accommodations.id","accommodation_name","star","accommodation_categories.name as category","location","photo")->get())
       ->addColumn('action','
            <center>
             <a href="#"   data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit-penginapan"  data-toggle="modal" data-target="#ajax-crud-modal">
            <i class="fa fa-edit"></i>
              </a>
            
           <a href="#" class="btn btn-danger" onclick="deletePenginapan({{$id}})"><i class="fa fa-trash"></i></a>
              </center>')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }

    public function profile($id){
      $accommodation=Accommodation::find($id);
      return $accommodation;
    }

    public function create(Request $request){

      $fileName;
      $file=$request->photo;
      if($request->kategori==1){
           $fileName="hotel.jpg";
          }else {
           $fileName="villa.jpg";
      }
      if($file){
        $ext = $file->getClientOriginalExtension();
        $fileName = rand(100000,1001238912).".".$ext;
        $gambar_path = public_path() . "/gambar/penginapan/";
        $file->move($gambar_path, $fileName);
      }


      $penginapan=Accommodation::Create([
            "accommodation_name"=>$request->name,
            "star"=>$request->star,
            "accommodation_category_id"=>$request->kategori,
            "location"=>$request->location,
            "kelurahan"=>$request->kelurahan,
            "kecamatan"=>$request->kecamatan,
            "provinsi"=>"Jawa Barat",
            "cordinate"=>null,
            "photo"=>$fileName
            ]);
       return Response::json($penginapan);


    }

    public function edit(Request $request){
      $kecamatan=$request->kecamatan;
      $kelurahan=$request->kelurahan;
      $file = $request->photo;
      $kategori=$request->kategori;
      $star=$request->star;
      $penginapan =Accommodation::find($request->penginapan_id);
      $oldPhoto=$penginapan->photo;
      $isDefault=false;
      if($penginapan->photo==null||$penginapan->photo=="hotel.jpg"||$penginapan->photo=="villa.jpg"){
        $isDefault=true;
      }
      
      if($isDefault){
           if($kategori==1){
           $fileName="hotel.jpg";
          }else {
           $fileName="villa.jpg";
         }
      }
   

      if($file){
        $ext = $file->getClientOriginalExtension();
        $fileName = rand(100000,1001238912).".".$ext;
        $gambar_path = public_path() . "/gambar/penginapan/";
        $file->move($gambar_path, $fileName);
      }

       $penginapan->star=$star;
       $penginapan->kecamatan=$kecamatan;
       $penginapan->accommodation_category_id=$kategori;
       $penginapan->photo=$fileName;
       $penginapan->accommodation_name=$request->name;
       $penginapan->kelurahan=$request->kelurahan;
       $penginapan->save();

        if(!$isDefault){
         $path = public_path()."/gambar/penginapan/".$oldPhoto;
          if(file_exists($path)){
          unlink($path);
         }
        }
       return Response::json($penginapan);
    }


    public function delete($id){
      $penginapan=Accommodation::find($id);
      $isDefault=false;

      if($penginapan->photo==null||$penginapan->photo=="hotel.jpg"||$penginapan->photo=="villa.jpg"){
        $isDefault=true;
      }
      $oldPhoto=$penginapan->photo;
      $penginapan->delete();
      if(!$isDefault){
         $path = public_path()."/gambar/penginapan/".$oldPhoto;
          if(file_exists($path)){
          unlink($path);
         }
      }
      return Response::json($penginapan);
    }
 


}
