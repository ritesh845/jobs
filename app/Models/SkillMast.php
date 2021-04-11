<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillMast extends Model
{
    use HasFactory;
    protected $table = 'skills_mast';
    protected $primaryKey='skill_id';
    protected $guarded = [];
    
    public function posts(){
    	return $this->hasMany('App\Models\JobSkills','skill_id','skill_id');
    }
}
