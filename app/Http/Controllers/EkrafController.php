<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Umkm;
use App\Model\Product;
use App\Model\Exhibition;
use Yajra\Datatables\Datatables;
use Response;
use Excel;
use App\Imports\UmkmImport;
use Redirect;
class EkrafController extends Controller
{
    
    public function umkm(){
    	return view("ekraf");
    }




    public function createUMKM(Request $request){
    $file = $request->logo;
        if(isset($file)){
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $gambar_path = public_path() . "/gambar/umkm/";
        $file->move($gambar_path, $newName);
        $umkmData= array(
    		"umkm_name"=>$request->umkm,
             "owner"=>$request->owner,
             "business_form"=>$request->business,
             "address"=>$request->address,
             "year"=>$request->year,
             "logo" =>  url("/")."/gambar/umkm/".$newName,
             "phone"=>$request->phone
         );

       }else {
        $umkmData= array(
    		"umkm_name"=>$request->umkm,
             "owner"=>$request->owner,
             "business_form"=>$request->business,
             "address"=>$request->address,
             "year"=>$request->year,
             "phone"=>$request->phone
            );
       }

    		
    
        Umkm::create($umkmData);
        return Response::json($umkmData);

    }

    public function deleteUMKM($id){
     $umkm = Umkm::find($id);
     if($umkm->delete()){
       if(isset($umkm->logo)){
        $url_image = explode("/", $umkm->logo);
        if(count($url_image)>0){
        $path = public_path()."/gambar/umkm/".$url_image[count($url_image)-1];
        if(file_exists($path)){
          unlink($path);
          }
        }
       }
     }
     
     return Response::json($umkm);
    }



    public function  profileUMKM($id){
    	$umkm=Umkm::find($id);
    	return Response::json($umkm);
    }



    public  function editUMKM(Request $request){
        $umkm= Umkm::find($request->umkm_id);  
    	$oldPath=explode("/", $umkm->logo);
      $oldLogo=$umkm->logo;
    	$logo=$request->logo;
    	$year=$request->year;
    	$umkm_name=$request->umkm;
    	$owner=$request->owner;
    	$phone=$request->phone;
    	$address=$request->address;
    	$business_form=$request->business_form;
      $business_sector=$request->business_sector;
      $rt=$request->RT;
      $rw=$request->RW;
      $female_labor=$request->female_labor;
      $male_labor=$request->male_labor;
      $female_employe=$request->female_employe;
      $male_employe=$request->male_employe;
      $kecamatan=$request->kecamatan;
      $kelurahan=$request->kelurahan;
      $kabupaten=$request->kabupaten;
      $fax=$request->fax;
      $website=$request->website;
      $provinsi=$request->provinsi;



    	$umkm->umkm_name=$umkm_name;
    	$umkm->year=$year;
    	$umkm->owner=$owner;
    	$umkm->address=$address;
    	$umkm->business_form=$business_form;
    	$umkm->business_sector=$business_sector;
      $umkm->phone=$phone;
      $umkm->RT=$rt;
      $umkm->RW=$rw;
      $umkm->female_labor=$female_labor;
      $umkm->male_labor=$male_labor;
      $umkm->female_employe=$female_employe;
      $umkm->male_employe=$male_employe;




		    if(isset($logo)){
		        $ext = $logo->getClientOriginalExtension();
		        $newName = rand(100000,1001238912).".".$ext;
		        $gambar_path = public_path()."/gambar/umkm";
		        $logo->move($gambar_path, $newName);
		        $umkm->logo= url("/gambar/umkm/".$newName);
		        $check = $umkm->save();
		        if($check && !empty($oldLogo)){
		          $path = public_path()."/gambar/umkm/".$oldPath[count($oldPath)-1];
		          if(file_exists($path)){
		             unlink($path);
		          }
		        }
		      return Response::json($umkm);
		    }

			$umkm->save();         
		    return Response::json($umkm);
    }

    public function showUMKM(){
    	  return  Datatables::of(Umkm::select("id","umkm_name","phone","business_form","logo","address","year","owner"))
       ->addColumn('action','
            <center>
              <a href="{{ URL::to("/umkm/$id") }}"   data-id="{{ $id }}" data-original-title="Detail" class="detail btn btn-primary detail-umkm" >
              <i class="fa fa-eye"></i>
             </a>

             <a href="#"   data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit-umkm"  data-toggle="modal" data-target="#ajax-crud-modal">
            <i class="fa fa-edit"></i>
              </a>
           <a href="#" class="btn btn-danger" onclick="deleteUMKM({{$id}})"><i class="fa fa-trash"></i></a>
              </center>')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }

    public function detailUMKM ($id){
       $umkm=Umkm::find($id);
       return view("umkmdetail",["umkm"=>$umkm]);
    }


    public function createProduct(Request $request){
       $foto=$request->photo;

       $produkData;

           if(isset($foto)){
                $ext = $foto->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $gambar_path = public_path()."/gambar/umkm/produk";
                $foto->move($gambar_path, $newName);
                $produkData=array(
                     "name"=>$request->name,
                     "umkm_id"=>$request->umkm_id,
                     "photo"=> url("/")."/gambar/umkm/produk/".$newName,
                     "price"=>$request->price
                  );

           }else{
                $produkData=array(
                    "name"=>$request->name,
                     "umkm_id"=>$request->umkm_id,
                     "price"=>$request->price
                 );

           }

              $produk=Product::create($produkData);
              return $produk;

    }

    public function showProduct($id){
         return  Datatables::of(Product::select("id","photo","name","price")->where("umkm_id","=",$id))
       ->addColumn('action','
            <center>
             <a href="#"   data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit-product"  data-toggle="modal" data-target="#ajax-crud-modal">
            <i class="fa fa-edit"></i>
              </a>
           <a href="#" class="btn btn-danger" onclick="deleteProduct({{$id}})"><i class="fa fa-trash"></i></a>
              </center>')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }

    public function deleteProduct($id){
          $produk=Product::find($id);
          $produk->delete();
          return $produk;
    }

    public function  profileProduct($id){
      $produk=Product::find($id);
      return Response::json($produk);
    }

    public function editProduct(Request $request){
    $produk= Product::find($request->product_id);
    $produk->name=$request->name;
    $produk->price=$request->price;
    $photo=$request->photo;
    $oldPath=explode("/", $produk->logo);
  
    
        if(isset($photo)){
            $ext = $photo->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar_path = public_path()."/gambar/umkm/produk";
            $photo->move($gambar_path, $newName);
            $produk->photo= url("/gambar/umkm/produk/".$newName);
            $check = $produk->save();
            if($check && isset($oldPath)){
              $path = public_path()."/gambar/umkm/produk/".$oldPath[count($oldPath)-1];
              if(file_exists($path)){
                 unlink($path);
              }
            }
          return Response::json($produk);
        }

      $produk->save();         
        return Response::json($produk);
    }

    public function upload(Request $request){
      try {
        $uploadedFile = $request->file('file'); 
          Excel::import(new UmkmImport, $uploadedFile);
          return Redirect::back();
      } catch (Exception $e) {
              return Redirect::back();
      }
    }



    public function pameran (){
        return view("exhibition");
    }



     public function showPameran(){
        return  Datatables::of(Exhibition::select("id","exhibition_name","description","start_date","end_date","price","poster"))
       ->addColumn('action','
            <center>
             <a href="#"   data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit-pameran"  data-toggle="modal" data-target="#ajax-crud-modal">
            <i class="fa fa-edit"></i>
              </a>
            
           <a href="#" class="btn btn-danger" onclick="deletePameran({{$id}})"><i class="fa fa-trash"></i></a>
              </center>')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }


    public function createPameran(Request $request){
        $poster=$request->poster;

        $pameranData;

           if(isset($poster)){
                $ext = $poster->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $gambar_path = public_path()."/gambar/umkm/pameran";
                $poster->move($gambar_path, $newName);
                $pameranData=array(
                     "exhibition_name"=>$request->pameran,
                     "start_date"=>$request->mulai,
                     "end_date"=>$request->akhir,
                     "description"=>$request->deskripsi,
                     "poster"=> $newName,
                     "location"=>$request->location,
                     "price"=>$request->price
                  );

           }else{
               $pameranData=array(
                     "exhibition_name"=>$request->pameran,
                     "start_date"=>$request->mulai,
                     "end_date"=>$request->akhir,
                     "description"=>$request->deskripsi,
                     "location"=>$request->location,
                     "price"=>$request->price
                  );
           }

              $exhibition=Exhibition::create($pameranData);
              return $exhibition;

    }


    public function deletePameran($id){
     $pameran = Exhibition::find($id);
     if($pameran->delete()){
       if(isset($pameran->poster)){
        $poster = $pameran->poster;
        if(isset($poster)){
        $path = public_path()."/gambar/umkm/pameran".$poster;
        if(file_exists($path)){
          unlink($path);
          }
        }
       }
      return Response::json($pameran);

     }
   }


   public function profilePameran($id){
     $pameran = Exhibition::find($id);
     return $pameran;
   }


   public function editPameran(Request $request){
      $pameran=Exhibition::find($request->pameran_id);
      $pameran->exhibition_name=$request->pameran;
      $pameran->start_date=$request->mulai;
      $pameran->end_date=$request->akhir;
      $pameran->description=$request->deskripsi;
      $pameran->location=$request->location;
      $pameran->price=$request->price;
      $poster=$request->poster;
      $oldPoster=$pameran->poster; 
     if(isset($poster)){
            $ext = $logo->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar_path = public_path()."/gambar/umkm/pameran";
            $pameran->move($gambar_path, $newName);
            $pameran->poster=$newName;
            $check = $pameran->save();
            if($check && !empty($oldPoster)){
              $path = public_path()."/gambar/umkm/pameran".$oldPoster;
              if(file_exists($path)){
                 unlink($path);
              }
            }
          return Response::json($pameran);
        }

          $pameran->save();         
        return Response::json($pameran);

   }

}
