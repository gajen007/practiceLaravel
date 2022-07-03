<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $table = "userdata";
    public $primaryKey = "relationid"; //Mandatory..!

    public function users(){
        return $this->belongsTo('App\Models\User','id','userid');
    }

    public function vehicles(){
        return $this->belongsTo('App\Models\Vehicles','vehicleid','vehicleid');
    }
    
}
