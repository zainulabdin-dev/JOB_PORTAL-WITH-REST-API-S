<?php

namespace App\Http\Controllers;

use App\Models\job;
use Exception;
use Illuminate\Http\Request;

class jobController extends Controller
{
 function upload(Request $req){
       try{
        $data=job::create($req->all());
        return response()->json([
            "status"=>true,
            "message"=>"data is inserted",
            "data"=>$data
        ]);
    }
    catch(Exception $error){
        return response()->json([
            "status"=>false,
            "message"=>"data is not inserted please check your server or code....",
            "error"=>$error->getMessage()

        ]);
        
    } 
 }   
 function alljob(){
    try{
        $data=job::all();
        return response()->json([
            "status"=>true,
            "data"=>$data
        ]);
    }
    catch(Exception $error){
        return response()->json([
            "status"=>false,
            "message"=>"data not found...",
            "error"=>$error->getMessage()
        ]);
    }
}
function job_by_id($id){
    try{
        // $data=job::findorfail($id);
        $data=job::with(['jobtype','user'])->findorfail($id);
               return response()->json([
        "status"=>true,
        "message"=>"USER HERE",
        "data"=>$data
       ]);
        }
        catch(Exception $error){
            return response()->json([
                "status"=>false,
                "message"=>"data is not found",
                "error"=>$error->getMessage()
            ]);
        
    }

}
}
