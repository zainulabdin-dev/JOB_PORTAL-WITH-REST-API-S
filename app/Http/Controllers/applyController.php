<?php

namespace App\Http\Controllers;

use App\Models\applie;
use App\Models\apply;
use Exception;
use Illuminate\Http\Request;

class applyController extends Controller
{
            function insert(Request $request){
        try{
$data=applie::create($request->all());
return response()->json([
    "status"=>true,
    "message"=>"data is inserted successfully",
    "data"=>$data
]);
        }
        catch(Exception $error){
            return response()->json([
                "status"=>false,
                "message"=>"data is not inserted",
                "error"=>$error->getMessage()
            ]);
        }
    }
    function fatch(){
        try{
       $data = applie::with(['user', 'job'])->get();
       return response()->json([
        "status"=>true,
        "message"=>"ALL USER HERE",
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
