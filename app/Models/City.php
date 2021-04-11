<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $primaryKey='city_code';

    public function posts(){
    	return $this->hasMany('App\Models\JobPost','city_code','city_code');
    }
}
