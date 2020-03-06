<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;
use Hash;
use Excel;
use App\Imports\AdminImport;
use Response;
use Spatie\Permission\Models\Role;
use Redirect;

class AdminController extends Controller{
    //




public function displayAdmin(){
  return  Datatables::of(User::select("id","name","email","phone","photo","address"))

       ->addColumn("role",function($user){
           if($user->hasRole('ekraf')){
             return "Ekraf";
           }
           else if($user->hasRole('budaya')){
             	return "Budaya";
           }
            else if($user->hasRole('pariwisata')){
           	  return "Pariwisata";
           }
            else if($user->hasRole('super')){
           	return "Super Admin";
           }else  if($user->hasRole('guest')){
            return "Guest";
           }


       })
       ->addColumn('action','
            <center>
            <a href="#"  data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit-admin"  data-toggle="modal" data-target="#ajax-crud-modal">
            <i class="fa fa-edit"></i>
            
            </a>
           <a href="#" class="btn btn-danger" onclick="deleteAdmin({{$id}})"><i class="fa fa-trash"></i></a>
              </center>')
        ->rawColumns(['action','role'])
        ->addIndexColumn()
        ->make(true);
   }



  public function create(Request $request){
    $file = $request->photo;
        if(isset($file)){
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).$request->name.".".$ext;
        $gambar_path = public_path() . "/gambar/admin";
        $file->move($gambar_path, $newName);
        $admin_data = array(
           "name" => $request->name,
           "email"  => $request->email,
           "photo" =>  url("/")."/gambar/admin/".$newName,
           "phone"=>$request->phone,
           "address"=>$request->address,
           "remember_token"=>str_random(10),
           "password"=>Hash::make($request->password),
       );

       }else {
         $admin_data = array(
           "name" => $request->name,
           "email"  => $request->email,
           "phone"=>$request->phone,
           "address"=>$request->address,
           "remember_token"=>str_random(10),
           "password"=>Hash::make($request->password),
       );
       }
      
        $user=User::create($admin_data);
        $user->assignRole($request->roles);
       return Response::json($admin_data);
  }


  public  function delete($id){
      $user=User::find($id);
      if(isset($user->photo)){
        $url_image = explode("/", $user->photo);
        if(count($url_image)>0){
        $path = public_path()."/gambar/admin/".$url_image[count($url_image)-1];
        if(file_exists($path)){
          unlink($path);
         }
       }
      }
      
       $user->delete();
       return Response::json($user);
  }

   public function profile($id){
     $user=User::find($id);
           if($user->hasRole('ekraf')){
             $user->role="ekraf";
           }
           if($user->hasRole('budaya')){
             $user->role="budaya";
           }
            if($user->hasRole('pariwisata')){
             $user->role="pariwisata";
           }
            if($user->hasRole('super')){
              $user->role="super";
           }
      return Response::json($user);
   }

   public function  edit(Request $request){
     
     $id    = $request->admin_id;
     $user=User::find($id);
     $name  = $request->name;
     $photo = $request->photo;
     $oldphoto=$user->photo;
     $email = $request->email;
     $phone = $request->phone;
     $user->name=$name;
     $user->email=$email;
     $user->phone=$phone;

    if(isset($photo)){
        $ext = $photo->getClientOriginalExtension();
        $newName = rand(100000,1001238912).$name.".".$ext;
        $gambar_path = public_path()."/gambar/admin";
        $photo->move($gambar_path, $newName);
        $user->photo= url("/gambar/admin/".$newName);
        $check = $user->save();
        if($check && isset($oldphoto)){
          $old_url=explode("/", $oldphoto);
          $path = public_path()."/gambar/admin/".$old_url[count($old_url)-1];
          if(file_exists($path)){
             unlink($path);
          }
        }
       return Response::json($user);

    } 

   $oldroles=$user->getRoleNames();
   
   foreach ($oldroles as $role) {
     $user->removeRole($role);
   }



    $user->assignRole($request->roles);
    $user->save();         
    return Response::json($user);
   }



   public function upload(Request $request){
        
      try {
        $uploadedFile = $request->file('file'); 
          Excel::import(new AdminImport, $uploadedFile);
          return Redirect::back();
      } catch (Exception $e) {
              return Redirect::back();
      }
    }


    
  
}
