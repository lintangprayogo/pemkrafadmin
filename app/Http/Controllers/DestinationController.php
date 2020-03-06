<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Destination;
use App\Model\DestinationCategory;
use Yajra\Datatables\Datatables;
use DB;
use App\Imports\DestinationImport;
use Excel;
class DestinationController extends Controller
{
    //
       public function index(){
        $categories=DestinationCategory::select("name","id")->get();
     
    	return view("destinasiwisata",["categories"=>$categories]);
      }


      public function create(Request $request){
          $photo=$request->photo;
         if(isset($photo)){
            $ext = $photo->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar_path = public_path()."/gambar/pariwisata/destinasi";
            $photo->move($gambar_path, $newName);
            $data = array(
                 "destination_name"=>$request->name,
                 "address"=>$request->address,
                 "kelurahan"=>$request->kelurahan,
                 "kecamatan"=>$request->kecamatan,
                 "provinsi" => $request->provinsi,
                 "destination_category_id"=>$request->kategori,
                 "photo"=>$newName            
             );
         }else{
              $data = array(
                 "destination_name"=>$request->name,
                 "address"=>$request->address,
                 "kelurahan"=>$request->kelurahan,
                 "kecamatan"=>$request->kecamatan,
                 "provinsi" => $request->provinsi,
                 "destination_category_id"=>$request->kategori
             );  
         }      
         return Destination::create($data);
      }


      public function show(){
 $left = DB::table('destinations')->select("destinations.id","destination_name","address","kecamatan","kelurahan","provinsi","destination_category.name as kategori","photo")
            ->leftJoin('destination_category', 'destinations.destination_category_id', '=', 'destination_category.id')->get();

         return  Datatables::of($left)
       ->addColumn('action','
            <center>
              <a href="{{ URL::to("/umkm/$id") }}"   data-id="{{ $id }}" data-original-title="Detail" class="detail btn btn-primary detail-umkm" >
              <i class="fa fa-eye"></i>
             </a>

           
           <a href="#" class="btn btn-danger" onclick="deleteDestination({{$id}})"><i class="fa fa-trash"></i></a>
              </center>')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
      }

      public function delete($id){
         $destination = Destination::find($id);
         if($destination){
           $destination->delete();
           return abort(200,"Data Telah Dihapus");
          }
          return abort(404,"Destinasi Tidak Ditemukan");
      }
  


   public function upload(Request $request){
     try {
        $uploadedFile = $request->file('file'); 
          Excel::import(new DestinationImport, $uploadedFile);
          return Redirect::back();
      } catch (Exception $e) {
              return Redirect::back();
      }
   }




}
