<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected $primaryKey ='idser';

    public $timestamps= false;

    public function TipoServicios(){
        return $this -> belongsTo(tiposervicios::class ,'idtserv','idtserv');
    }
}
