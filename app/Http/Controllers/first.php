<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
class first extends Controller
{
    public function controllerMethod(Request $req){
        $user=User::where('email',$req->userEmail)->first();
        return response()->json($user,200);
    }

    public function controllerMethod2(Request $req){
        return response()->json("Working",200);
    }

    public function controllerMethod3(){
        return response()->json(array("message"=>"Got it","result"=>true),200);
    }

    public function controllerMethod4(Request $r){
        $fromModel=User::getPasswordOfUser($r->userEmail);
        return response()->json(array("Password"=>$fromModel,"result"=>true),200);
    }

    public function methodToCheckRelationship(Request $r){
        //$user=User::where('email',$req->userEmail)->first();
        $user = User::find($r->userid);
        return response()->json(array("userVehicles"=>$user->vehiclesUsedByThisUser),200);
        //vehiclesUsedByThisUser is a PROPERTY..! Not a Method :)
    }
    
}
