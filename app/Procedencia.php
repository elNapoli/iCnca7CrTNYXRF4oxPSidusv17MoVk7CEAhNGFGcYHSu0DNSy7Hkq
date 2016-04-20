<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedencia extends Model {

    protected $table      = 'procedencias';
    public $timestamps    = false;
    protected $primaryKey = 'id';
    protected $fillable   = ['id','nombre'];

    public function pregradoR()
    {
        return $this->hasMany('App\Pregrado','procedencia','id'); //Campo en tabla foranea
    }

    public function postgradoR()
    {
        return $this->hasMany('App\Postgrado','procedencia','id'); //Campo en tabla foranea
    }



}
