<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    public function TipoServicios(){
        return $this -> belongsTo(tiposervicios::class ,'idtiposervicio','id');
    }

    public function vehiculos()
    {
        return $this -> belongsToMany(Vehiculos::class,'vehiculo_servicio');
    }

}
