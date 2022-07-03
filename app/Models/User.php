<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;                 //Gajen Added
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "users";
    public $primaryKey = "id"; //Mandatory..!
    protected $fillable = ['name','email','password'];
    protected $hidden = ['password','remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];


    public function vehiclesUsedByThisUser(){
        //return $this->hasMany('App\Models\UserData','userid','id');
        return $this->belongsToMany('App\Models\Vehicles','users_vehicles','userid','vehicleid');
    }

    public function getPasswordOfUser($userEmail){
        $u=new User();
        return $u::select('password')->where('email',$userEmail)->value('password');
    }
    /*
In Laravel, eloquent relationships are defined as methods on your Eloquent model classes and they are very robust query builders. Eloquent makes managing and working with these relationships effortless, and helps a variety of common relationships.
    */
}
