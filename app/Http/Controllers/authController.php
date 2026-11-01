<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Models\user;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
        function register(Request $request){
        try{
$data=user::create($request->all());
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
        $data=user::all();
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
    function delete($id){
        try{
$data=user::findorfail($id);
user::destroy($data->id);
return response()->json([
    "status"=>true,
    "message"=>"user is deleted successfuly"
    
]);
        }
 catch(Exception $error){
            return response()->json([
                "status"=>false,
                "message"=>"data is not deleted",
                "error"=>$error->getMessage()
            ]);
    }
    }
    function update($id,Request $req){
        try{
            $data=user::findorfail($id);
            $data->update($req->all());
            return response()->json([
                "status"=>true,
                "message"=>"user is updated",
           
            ]);
        }
        catch(Exception $error){
            return response()->json([
            "status"=>false,
            "message"=>"data is not updated",
            "error"=>$error->getMessage()
            ]);
        }
    }
    function login(Request $req){
        try{
$check=Auth::attempt($req->only('email','password'));
        if($check){
                return response()->json([
"status"=>true,
"message"=>"user is login",

                ]);
            }
            else{
                return response()->json([
                    "status"=>false,
                    "message"=>"email or user is invald"
                ]);
            }
        }
        catch(Exception $error){
            return response()->json([
                "status"=>false,
                "message"=>"user not found",
                "error"=>$error->getMessage()
            ]);
        }
    }
       function userbyid($id){
        try{
        $data=user::findorfail($id);
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
