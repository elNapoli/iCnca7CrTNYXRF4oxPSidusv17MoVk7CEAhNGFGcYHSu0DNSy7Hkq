<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    protected $table     = 'universidad';
    public $timestamps   = false;
    protected $fillable = ['nombre'];

    public function conveniosR()
    {
        return $this->hasMany('App\Convenio','universidad');
    }

    public function campusSedesR()

    {
        return $this->hasMany('App\CampusSede','universidad');
    }

    public function paisR()
    {
        return $this->belongsTo('App\Pais','pais');
    }




}
