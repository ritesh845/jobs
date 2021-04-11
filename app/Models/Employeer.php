<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeer extends Model
{
    use HasFactory;
    protected $table = 'employeer';
    protected $primaryKey='employeer_id';
    protected $guarded = [];

    public function state(){
    	return $this->belongsTo('App\Models\State','state_code','state_code')->select('state_code','state_name');
    } 
    public function city(){
    	return $this->belongsTo('App\Models\City','city_code','city_code')->select('city_code','city_name');
    }
    public function usertype(){
        return $this->belongsTo('App\Models\UserType','user_type','user_type');
    }

    public function getFullNameAttribute()
    {
        return "{$this->f_name} {$this->l_name}";
    }  
   
}
