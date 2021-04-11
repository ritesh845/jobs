<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSkills extends Model
{
    use HasFactory;
    protected $table = 'job_skills';
    protected $primaryKey=null;
    protected $guarded = [];
    public $timestamps = false;

    public function jobs_posts(){
 		return $this->belongsToMany('App\Models\JobPost','job_skills','skill_name','job_id');
 	}
}

