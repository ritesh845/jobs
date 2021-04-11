<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerQualification extends Model
{
    use HasFactory;
    protected $table = 'jobseeker_qualification';
    protected $primaryKey=null;
    public $timestamps = false;
    public $increments = false;
    protected $guarded = [];
}
