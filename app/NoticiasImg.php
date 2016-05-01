<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticiasImg extends Model
{
    protected $table = 'noticias_img';
    public $timestamps = false;
    protected $fillable = ['nombre',
    					   'path',
                           'autor'];

}
