<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\first;
use App\Models\Vehicles;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//for model's usage
Route::get('firstRoute/firstEndPoint',[first::class, 'controllerMethod']);

//for testing
Route::get('secondRoute/secondEndPoint',[first::class, 'controllerMethod2']);
Route::get('thirdRoute/thirdEndPoint',[first::class, 'controllerMethod3']);

//for model's function
Route::get('fourthRoute/fourthEndPoint',[first::class, 'controllerMethod4']);

//to check Model's Relationship

Route::get('fifthRoute/checkThis',[first::class, 'methodToCheckRelationship']);

//Model is directly used in this route without controller..!
//requiredParameter is 'vehicleId'
Route::get('sixthRoute/directModel',function(Request $r){
    $v = Vehicles::find($r->vehicleId);
    return response()->json(array("users"=>$v->usersUsingThisVehicle),200);
});