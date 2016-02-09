<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $table = 'convenio';
    public $timestamps = false;
    protected $fillable = ['nombre',
                           'bilateral',
                           'universidad'];

 
    ########### N:1 ###########

    //Un Convenio pertenece a una Universidad
    public function Universidad()
    {
    	return $this->belongsTo('App\Universidad','id'); //Id local
    }

}
