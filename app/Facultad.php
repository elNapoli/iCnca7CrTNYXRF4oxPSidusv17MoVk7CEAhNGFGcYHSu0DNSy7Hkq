<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultad';
    public $timestamps = false;
    protected $fillable = ['nombre',
    					   'telefono',
    					   'campus_sede'];

 

    public function campusSedeR()
    {
    	return $this->belongsTo('App\CampusSede','campus_sede'); //Id local
    }

}
