<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleBeneficio extends Model {

    protected $table = 'detalle_beneficio';
    public $timestamps = false;
    protected $fillable = ['id',
                           'beneficio'];

 
    public function beneficioR()
    {
    	return $this->hasMany('App\Beneficio','id'); //Campo en tabla foranea
    }

    public function asistenteR()
    {
    	return $this->belongsTo('\App\Asistente', 'id_a'); //id local
    }
}