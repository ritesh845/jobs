<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobseeker extends Model
{
    use HasFactory;
    protected $table = 'jobseeker';
    protected $primaryKey='jobseeker_id';
    protected $guarded = [];

    public function userTypes(){
    	return $this->belongsTo('App\Models\UserType','user_type');
    }

    public function qualifications(){
		return $this->hasMany('App\Models\JobSeekerQualification','jobseeker_id','jobseeker_id');    	
    }
    public function experiences(){
		return $this->hasMany('App\Models\JobSeekerExperience','jobseeker_id','jobseeker_id');    	
    } 
    public function skills(){
		return $this->hasMany('App\Models\JobSeekerSkill','jobseeker_id','jobseeker_id');    	
    }

     public function getFullNameAttribute()
    {
        return "{$this->f_name} {$this->l_name}";
    }  

}
