<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Excel;
use Redirect;
use App\Model\Event;

class DashboardController extends Controller
{
    public function index(){
       $events = DB::table('events')->count();
       $destinations=DB::table('destinations')->count();
       $culturesites = DB::table('culturesites')->count();
       $umkm = DB::table('umkm')->count();
        $accommodations = DB::table('accommodations')->count();
      

       return view("dashboard",["events"=>$events,"destinations"=>$destinations,"culturesites"=>$culturesites,"umkm"=>$umkm,"accommodations"=>$accommodations]);
    }

   public function getEventCount(){
   	$events = DB::table('events')->rightJoin('event_categories', 'event_categories.id', '=', 'events.event_category_id')
   	  ->select('events.event_category_id',"event_categories.name",DB::raw('count(*) as total'))
                 ->groupBy('event_categories.name')
                 ->groupBy('events.event_category_id')->get();

    foreach ($events as $data) {
         if(!$data->event_category_id){
         	$data->total=0;
         }        
    }             
 
    return  $events;
   }

  public function getAccomodationSectotCount(){
    $accommodations = DB::table('accommodations')->select('accommodations.kecamatan',DB::raw('count(*) as  total'))
          ->groupBy('accommodations.kecamatan')
           ->get();
           $label=[];
           $total=[];
           foreach ($accommodations as $accommodation) {
            if(!$accommodation->kecamatan){
                $accommodation->kecamatan="Lainya";
              }
              array_push($label, $accommodation->kecamatan);
              array_push($total, $accommodation->total);           
            }          
           $graph = [
              'label' => $label,
              'total' => $total,
            ];
                  
 
    return  $graph;
   }

     public function getAccomodationKindCount(){
    $accommodations = DB::table('accommodations')->rightJoin('accommodation_categories', 'accommodation_categories.id', '=', 'accommodations.accommodation_category_id')->select('accommodation_categories.name as category','accommodation_category_id',DB::raw('count(*) as  total'))
          ->groupBy('accommodation_categories.name')->groupBy('accommodation_category_id')
           ->get();

           $label=[];
           $total=[];

           foreach ($accommodations as $accommodation) {
            if(!$accommodation->category){
                $accommodation->category="Lainya";
              }
              if(!$accommodation->accommodation_category_id){
                $accommodation->total=0;
              }

              array_push($label, $accommodation->category);
              array_push($total, $accommodation->total);
            
            }
           
           $graph = [
              'label' => $label,
              'total' => $total,
            ];
                  
 
    return  $graph;
   }


     public function getRapatSekbidKindCount(){
      $meetings = DB::table('meetings')->where("meeting_category_id",2)->select('meetings.kind',DB::raw('count(*) as  total'))
          ->groupBy('meetings.kind')
           ->get();

           $label=[];
           $total=[];

           foreach ($meetings as $meeting) {
              array_push($label, $meeting->kind);
              array_push($total, $meeting->total);
            }
           
           $graph = [
              'label' => $label,
              'total' => $total,
            ];
                  
 
    return  $graph;
   }


     public function getRapatSekbidSourceCount(){
      $meetings = DB::table('meetings')->where("meeting_category_id",2)->select('meetings.data_source',DB::raw('count(*) as  total'))
          ->groupBy('meetings.data_source')
           ->get();
           $label=[];
           $total=[];
           foreach ($meetings as $meeting) {
              array_push($label, $meeting->data_source);
              array_push($total, $meeting->total);
            }
           $graph = [
              'label' => $label,
              'total' => $total,
            ];
                  
 
    return  $graph;
   }

      public function getRapatKadisKindCount(){
      $meetings = DB::table('meetings')->where("meeting_category_id",1)->select('meetings.kind',DB::raw('count(*) as  total'))
          ->groupBy('meetings.kind')
           ->get();

           $label=[];
           $total=[];

           foreach ($meetings as $meeting) {
              array_push($label, $meeting->kind);
              array_push($total, $meeting->total);
            }
           
           $graph = [
              'label' => $label,
              'total' => $total,
            ];
                  
 
    return  $graph;
   }


     public function getRapatKadisSourceCount(){
      $meetings = DB::table('meetings')->where("meeting_category_id",1)->select('meetings.data_source',DB::raw('count(*) as  total'))
          ->groupBy('meetings.data_source')
           ->get();
           $label=[];
           $total=[];
           foreach ($meetings as $meeting) {
              array_push($label, $meeting->data_source);
              array_push($total, $meeting->total);
            }
           $graph = [
              'label' => $label,
              'total' => $total,
            ];
                  
 
    return  $graph;
   }
}
