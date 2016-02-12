<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    protected $table     = 'universidad';
    public $timestamps   = false;
    protected $fillable = ['nombre'];

    public function convenios()
    {
        return $this->hasMany('App\Convenio','universidad');
    }

<<<<<<< HEAD
    public function campusSedeR()
=======
    public function campusSedesR()
>>>>>>> 8e3c2b91dce247aac02dc161338ffcad17a28add
    {
        return $this->hasMany('App\CampusSede','universidad');
    }

    public function paisR()
    {
        return $this->belongsTo('App\Pais','pais');
    }




}
