<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Afp extends Model {

	protected $fillable =[
      'nombre',
      'rut',
      'fono',
      'comision',
      'sitio',
    ];

}
