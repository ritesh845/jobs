<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRoles extends Model
{
    use HasFactory;

    protected $table = 'job_roles';
    protected $primaryKey='job_role_id';
    protected $guarded = [];
}
