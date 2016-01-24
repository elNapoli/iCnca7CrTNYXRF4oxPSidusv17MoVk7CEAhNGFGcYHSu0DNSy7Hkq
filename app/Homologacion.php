<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homologacion extends Model
{
    protected $table = 'homologacion';
    public $timestamps = false;
    protected $fillable = ['pga',
    					   'motivo',
    					   'fecha'];

 

    public function PreUach()
    {
    	return $this->belongsTo('App\PreUach','id'); //Id local
    }

}
