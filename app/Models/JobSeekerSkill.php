<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerSkill extends Model
{
    use HasFactory;
    protected $table = 'jobseeker_skill';
    protected $primaryKey=null;
    public $timestamps = false;
    protected $increments = false;
    protected $guarded = [];

}
