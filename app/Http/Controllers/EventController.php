<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;
use App\Model\EventCategory;
use Yajra\Datatables\Datatables;
class EventController extends Controller
{
    
    public function event ($kind){
        return view("event",["kind"=>$kind]);
    }


     public function show(){
        return  Datatables::of(Event::join('event_categories', 'event_categories.id', '=', 'events.event_category_id')->select("events.id","event_name","description","start_date","end_date","price","poster"))
        ->make(true);
    }




    public function eventPariwisata (){
        return view("event_pariwisata",["kind"=>"Pariwisata"]);
    }

    public function showPariwisata(){
        return  Datatables::of(Event::join('event_categories', 'event_categories.id', '=', 'events.event_category_id')->select("events.id","event_name","description","start_date","end_date","price","poster")->where("event_categories.name","Pariwisata"))
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

       public function createEventPariwisata(Request $request){
        $poster=$request->poster;
        $eventCategoryId=EventCategory::where('name',"Pariwisata")->get()->pluck("id")->first();
        $eventData;
           if(isset($poster)){
                $ext = $poster->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $gambar_path = public_path()."/gambar/event";
                $poster->move($gambar_path, $newName);
                $eventData=array(
                     "event_name"=>$request->event,
                     "start_date"=>$request->mulai,
                     "end_date"=>$request->akhir,
                     "description"=>$request->deskripsi,
                     "poster"=> $newName,
                     "location"=>$request->location,
                     "price"=>$request->price,
                     "event_category_id"=>$eventCategoryId
                  );

           }else{
               $eventData=array(
                     "event_name"=>$request->event,
                     "start_date"=>$request->mulai,
                     "end_date"=>$request->akhir,
                     "description"=>$request->deskripsi,
                     "location"=>$request->location,
                     "price"=>$request->price,
                     "event_category_id"=>$eventCategoryId
                  );
           }

              $event=Event::create($eventData);
             return $event;

    }

    public function deleteEventPariwisata($id){
     $eventCategoryId=EventCategory::where('name',"Pariwisata")->get()->pluck("id")->first();
     $event = Event::where('event_category_id',$eventCategoryId)->where('id',$id)->first();
     if($event->delete()){
       if(isset($event->poster)){
        $poster = $event->poster;
        if(isset($poster)){
        $path = public_path()."/gambar/event/".$poster;
        if(file_exists($path)){
          unlink($path);
          }
        }
       }
         return $event;

     }
   }

   public function editEventPariwisata(Request $request){
      $eventCategoryId=EventCategory::where('name',"Pariwisata")->get()->pluck("id")->first();
      $pameran = Event::where('event_category_id',$eventCategoryId)->where('id',$request->pameran_id)->first();
      $pameran->event_name=$request->event;
      $pameran->start_date=$request->mulai;
      $pameran->end_date=$request->akhir;
      $pameran->description=$request->deskripsi;
      $pameran->location=$request->location;
      $pameran->price=$request->price;
      $poster=$request->poster;
      $oldPoster=$pameran->poster; 
     if(isset($poster)){
            $ext = $poster->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar_path = public_path()."/gambar/event";
            $poster->move($gambar_path, $newName);
            $pameran->poster=$newName;
            $check = $pameran->save();
            if($check && !empty($oldPoster)){
              $path = public_path()."/gambar/event/".$oldPoster;
              if(file_exists($path)){
                 unlink($path);
              }
            }
          return $pameran;
        }

        $pameran->save();         
        return $pameran;

   }













    public function eventEkraf (){
        return view("event_ekraf",["kind"=>"Ekraf"]);
    }

    public function showEkraf(){
        return  Datatables::of(Event::join('event_categories', 'event_categories.id', '=', 'events.event_category_id')->select("events.id","event_name","description","start_date","end_date","price","poster")->where("event_categories.name","Ekraf"))
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

       public function createEventEkraf(Request $request){
        $poster=$request->poster;
        $eventCategoryId=EventCategory::where('name',"Ekraf")->get()->pluck("id")->first();
        $eventData;
           if(isset($poster)){
                $ext = $poster->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $gambar_path = public_path()."/gambar/event";
                $poster->move($gambar_path, $newName);
                $eventData=array(
                     "event_name"=>$request->event,
                     "start_date"=>$request->mulai,
                     "end_date"=>$request->akhir,
                     "description"=>$request->deskripsi,
                     "poster"=> $newName,
                     "location"=>$request->location,
                     "price"=>$request->price,
                     "event_category_id"=>$eventCategoryId
                  );

           }else{
               $eventData=array(
                     "event_name"=>$request->event,
                     "start_date"=>$request->mulai,
                     "end_date"=>$request->akhir,
                     "description"=>$request->deskripsi,
                     "location"=>$request->location,
                     "price"=>$request->price,
                     "event_category_id"=>$eventCategoryId
                  );
           }

              $event=Event::create($eventData);
             return $event;

    }

    public function deleteEventEkraf($id){
     $eventCategoryId=EventCategory::where('name',"Ekraf")->get()->pluck("id")->first();
     $event = Event::where('event_category_id',$eventCategoryId)->where('id',$id)->first();
     if($event->delete()){
       if(isset($event->poster)){
        $poster = $event->poster;
        if(isset($poster)){
        $path = public_path()."/gambar/event/".$poster;
        if(file_exists($path)){
          unlink($path);
          }
        }
       }
         return $event;

     }
   }

   public function editEventEkraf(Request $request){
      $eventCategoryId=EventCategory::where('name',"Ekraf")->get()->pluck("id")->first();
      $pameran = Event::where('event_category_id',$eventCategoryId)->where('id',$request->pameran_id)->first();
      $pameran->event_name=$request->event;
      $pameran->start_date=$request->mulai;
      $pameran->end_date=$request->akhir;
      $pameran->description=$request->deskripsi;
      $pameran->location=$request->location;
      $pameran->price=$request->price;
      $poster=$request->poster;
      $oldPoster=$pameran->poster; 
     if(isset($poster)){
            $ext = $poster->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar_path = public_path()."/gambar/event";
            $poster->move($gambar_path, $newName);
            $pameran->poster=$newName;
            $check = $pameran->save();
            if($check && !empty($oldPoster)){
              $path = public_path()."/gambar/event/".$oldPoster;
              if(file_exists($path)){
                 unlink($path);
              }
            }
          return $pameran;
        }

        $pameran->save();         
        return $pameran;

   }


    public function eventBudaya (){
        return view("event_ekraf",["kind"=>"Budaya"]);
    }

    public function showBudaya(){
        return  Datatables::of(Event::join('event_categories', 'event_categories.id', '=', 'events.event_category_id')->select("events.id","event_name","description","start_date","end_date","price","poster")->where("event_categories.name","Budaya"))
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

       public function createEventBudaya(Request $request){
        $poster=$request->poster;
        $eventCategoryId=EventCategory::where('name',"Budaya")->get()->pluck("id")->first();
        $eventData;
           if(isset($poster)){
                $ext = $poster->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $gambar_path = public_path()."/gambar/event";
                $poster->move($gambar_path, $newName);
                $eventData=array(
                     "event_name"=>$request->event,
                     "start_date"=>$request->mulai,
                     "end_date"=>$request->akhir,
                     "description"=>$request->deskripsi,
                     "poster"=> $newName,
                     "location"=>$request->location,
                     "price"=>$request->price,
                     "event_category_id"=>$eventCategoryId
                  );

           }else{
               $eventData=array(
                     "event_name"=>$request->event,
                     "start_date"=>$request->mulai,
                     "end_date"=>$request->akhir,
                     "description"=>$request->deskripsi,
                     "location"=>$request->location,
                     "price"=>$request->price,
                     "event_category_id"=>$eventCategoryId
                  );
           }

              $event=Event::create($eventData);
             return $event;

    }

    public function deleteEventBudaya($id){
     $eventCategoryId=EventCategory::where('name',"Budaya")->get()->pluck("id")->first();
     $event = Event::where('event_category_id',$eventCategoryId)->where('id',$id)->first();
     if($event->delete()){
       if(isset($event->poster)){
        $poster = $event->poster;
        if(isset($poster)){
        $path = public_path()."/gambar/event/".$poster;
        if(file_exists($path)){
          unlink($path);
          }
        }
       }
         return $event;

     }
   }

   public function editEventBudaya(Request $request){
      $eventCategoryId=EventCategory::where('name',"Budaya")->get()->pluck("id")->first();
      $pameran = Event::where('event_category_id',$eventCategoryId)->where('id',$request->pameran_id)->first();
      $pameran->event_name=$request->event;
      $pameran->start_date=$request->mulai;
      $pameran->end_date=$request->akhir;
      $pameran->description=$request->deskripsi;
      $pameran->location=$request->location;
      $pameran->price=$request->price;
      $poster=$request->poster;
      $oldPoster=$pameran->poster; 
     if(isset($poster)){
            $ext = $poster->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar_path = public_path()."/gambar/event";
            $poster->move($gambar_path, $newName);
            $pameran->poster=$newName;
            $check = $pameran->save();
            if($check && !empty($oldPoster)){
              $path = public_path()."/gambar/event/".$oldPoster;
              if(file_exists($path)){
                 unlink($path);
              }
            }
          return $pameran;
        }

        $pameran->save();         
        return $pameran;

   }








 



   public function profileEvent($id){
     $event = Event::find($id);
     return $event;
   }


   
}
