<?php

namespace App\Http\Controllers;

use App\Models\jobtype;
use Exception;
use Illuminate\Http\Request;

class jobtypeController extends Controller
{
function insert(Request $req){
    try{
        $data=jobtype::create($req->all());
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
function fatch(){
    try{
        $data=jobtype::all();
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
function delete($id){
    try{
$data=jobtype::findorfail($id);
jobtype::destroy($data->id);
return response()->json([
    "status"=>true,
    "message"=>"data is deleted"
]);
    }
catch(Exception $error){
        return response()->json([
            "status"=>false,
            "message"=>"data is not deleted...",
            "error"=>$error->getMessage()
        ]);
}
}
function update($id,Request $req){
    try{
        $data=jobtype::findorfail($id);
        $data->update($req->all());
        return response()->json([
            "status"=>true,
            "message"=>"data is updated.."
            
        ]);
    }
    catch(Exception $error){
             return response()->json([
            "status"=>false,
            "message"=>"data is not updated...",
            "error"=>$error->getMessage()
        ]);
    }
}
}
    
