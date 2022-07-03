<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;
    protected $table = "vehicles";
    public $primaryKey = "id"; //Mandatory..!

    public function usersUsingThisVehicle(){
        //return $this->hasMany('App\Models\UserData','vehicleid','id');
        return $this->belongsToMany('App\Models\User','users_vehicles','vehicleid','userid');
    }
}
