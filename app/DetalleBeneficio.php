<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleBeneficio extends Model {

    protected $table = 'detalle_beneficio';
    public $timestamps = false;
    protected $fillable = ['id_a',
                           'beneficio'];

 
    public function beneficioR()
    {
    	return $this->belongsTo('App\Beneficio','beneficio'); // donde voy, con que voy
    }

    public function asistenteR()
    {
    	return $this->belongsTo('\App\Asistente', 'id'); //id local
    }
}