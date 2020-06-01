<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Meeting;
use Yajra\Datatables\Datatables;
use Excel;
use Response;
use Redirect;
use Auth;
class MeetingController extends Controller
{

	public function kadis(){
		return view("rapat_kadis");
	}


    public function kalenderKadis(){
        return view("kalender_kadis");
    }
    public function createKadis(Request $request){
    	$notulensi=$request->notulensi;
    	$fileName=null;
    	if($notulensi){
    		$ext = $notulensi->getClientOriginalExtension();
            $fileName = $request->name.rand(100000,1001238912).".".$ext;
            $notulensi_path = public_path()."/rapat/dokumen";
            $notulensi->move($notulensi_path, $fileName);
    	}
    	$meeting=Meeting::create([
        "meeting_name"=>$request->name,
        "initiator"=>Auth::user()->name,
        "meeting_date"=>$request->tgl_rapat,
        "meeting_agenda"=>$request->agenda,
        "kind"=>$request->kind,
        "participant"=>$request->participant,
        "data_source"=>$request->data_source,
        "documentation_report"=>$fileName,
        "documentation_url"=>$request->url,
        "meeting_category_id"=>1
    	]);  	
    	return Response::json($meeting);
    }

    public function showKadis(Request $request){
        return  Datatables::of(Meeting::where("meeting_category_id",1)->get())
       ->addColumn('action','
            <center>
             <a href="#"   data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit-rapat"  data-toggle="modal" data-target="#ajax-crud-modal">
            <i class="fa fa-edit"></i>
              </a>
            
           <a href="#" class="btn btn-danger" onclick="deleteKadis({{$id}})"><i class="fa fa-trash"></i></a>
              </center>')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }


    public function deleteKadis($id){
    	$meeting=Meeting::find($id);
    	$meeting->delete();
        if($meeting->documentation_report){
        	$path = public_path()."/gambar/penginapan/".$meeting->documentation_report;
	        if(file_exists($path)){
	          unlink($path);
	         }
        } 
        return Response::json($meeting);
    }



    public function getDownload($fileName){
		 $file_path= public_path(). "/rapat/".$fileName;
		 return Response::download($file_path);
	}

    public function loadKadis(){
        $result = array();
        $meetings=Meeting::where("meeting_category_id",1)->get();
        foreach($meetings as $row){
             $data=[
              'id'   => $row->id,
              'title'   => $row->meeting_name,
              'start'   => $row->meeting_date,
              'end'   => $row->meeting_date
             ];
             array_push($result, $data);
        }
        return Response::json($result);
    }
    public function profile($id){
        $meeting = Meeting::find($id);
        return $meeting;
    }

    public function editKadis(Request $request){

        $rapat_id=$request->rapat_id;
        $meeting_name=$request->name;
        $meeting_date=$request->tgl_rapat;
        $meeting_agenda=$request->agenda;
        $kind=$request->kind;
        $initiator=$request->initiator;
        $participant=$request->participant;
        $data_source=$request->data_source;
        $documentation_url=$request->url;

        $notulensi=$request->notulensi;
        $meeting=Meeting::find($rapat_id);
        $oldpath=$meeting->documentation_report;

        $fileName=null;
        if($notulensi){
            $ext = $notulensi->getClientOriginalExtension();
            $fileName = $request->name.rand(100000,1001238912).".".$ext;
            $notulensi_path = public_path()."/rapat/dokumen";
            $notulensi->move($notulensi_path, $fileName);
        }
        $meeting->meeting_name=$meeting_name;
        $meeting->meeting_date=$meeting_date;
        $meeting->meeting_agenda=$meeting_agenda;
        $meeting->documentation_report=$fileName;
        $meeting->participant=$participant;
        $meeting->documentation_url=$documentation_url;
        $meeting->kind=$kind;
       /* $meeting->initiator=$initiator;*/
        $meeting->data_source=$data_source;
        $meeting->save();

    
        if($oldpath){
            $path = public_path()."/gambar/penginapan/".$oldpath;
            if(file_exists($path)){
              unlink($path);
             }
        }
        return Response::json($meeting); 

    }

    public function sekbid(){
        return view("rapat_sekbid");
    }


    public function kalenderSekbid(){
        return view("kalender_sekbid");
    }
    public function createSekbid(Request $request){
        $notulensi=$request->notulensi;
        $fileName=null;
        if($notulensi){
            $ext = $notulensi->getClientOriginalExtension();
            $fileName = $request->name.rand(100000,1001238912).".".$ext;
            $notulensi_path = public_path()."/rapat/dokumen";
            $notulensi->move($notulensi_path, $fileName);
        }
        $meeting=Meeting::create([
        "meeting_name"=>$request->name,
        "initiator"=>Auth::user()->name,
        "meeting_date"=>$request->tgl_rapat,
        "meeting_agenda"=>$request->agenda,
        "kind"=>$request->kind,
        "participant"=>$request->participant,
        "data_source"=>$request->data_source,
        "documentation_report"=>$fileName,
        "documentation_url"=>$request->url,
        "meeting_category_id"=>2
        ]);     
        return Response::json($meeting);
    }

    public function showSekbid(Request $request){
        return  Datatables::of(Meeting::where("meeting_category_id",2)->get())
       ->addColumn('action','
            <center>
             <a href="#"   data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit-rapat"  data-toggle="modal" data-target="#ajax-crud-modal">
            <i class="fa fa-edit"></i>
              </a>
            
           <a href="#" class="btn btn-danger" onclick="deleteSekbid({{$id}})"><i class="fa fa-trash"></i></a>
              </center>')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }


    public function deleteSekbid($id){
        $meeting=Meeting::find($id);
        $meeting->delete();
        if($meeting->documentation_report){
            $path = public_path()."/gambar/penginapan/".$meeting->documentation_report;
            if(file_exists($path)){
              unlink($path);
             }
        } 
        return Response::json($meeting);
    }

     public function loadSekbid(){
        $result = array();
        $meetings=Meeting::where("meeting_category_id",2)->get();
        foreach($meetings as $row){
             $data=[
              'id'   => $row->id,
              'title'   => $row->meeting_name,
              'start'   => $row->meeting_date,
              'end'   => $row->meeting_date
             ];
             array_push($result, $data);
        }
        return Response::json($result);
    }


}
