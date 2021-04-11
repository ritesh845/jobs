<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;
    protected $table = 'job_post';
    protected $primaryKey='job_id';
    protected $guarded = [];

    public function skills(){
    	return $this->hasMany('App\Models\JobSkills','job_id','job_id');
    }

    public function employeer(){
    	return $this->belongsTo('App\Models\Employeer','employeer_id','employeer_id');
    }
  	
  	public function city(){
    	return $this->belongsTo('App\Models\City','city_code','city_code')->select('city_code','city_name');
    }
    public function state(){
    	return $this->belongsTo('App\Models\State','state_code','state_code')->select('state_code','state_name');
    } 

    public function getShowStatusAttribute()
    {
        return $this->status == 'A' ? 'Active' : 'Pending';
    }  
}
