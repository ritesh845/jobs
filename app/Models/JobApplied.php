<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplied extends Model
{
    use HasFactory;
    protected $table = 'job_applied';
    protected $primaryKey=null;
    public $timestamps = false;
    protected $increments = false;
    protected $guarded = [];

    public function jobpost(){
    	return $this->belongsTo('App\Models\JobPost','job_id','job_id');
    }
    public function jobseeker(){
    	return $this->belongsTo('App\Models\Jobseeker','jobseeker_id','jobseeker_id');
    }
}
