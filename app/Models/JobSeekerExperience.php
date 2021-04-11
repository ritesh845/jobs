<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerExperience extends Model
{
    use HasFactory;
    protected $table = 'jobseeker_experience';
    protected $primaryKey=null;
    public $timestamps = false;
    protected $increments = false;
    protected $guarded = [];
}
