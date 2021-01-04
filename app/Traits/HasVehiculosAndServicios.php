<?php

namespace App\Traits;

use App\Models\Vehiculos;
use App\Models\Servicios;


trait HasVehiculosAndServicios
{
 
    public function vehiculos(){
        return $this -> belongsToMany(Vehiculos::class,'vehiculo_servicio');
    }

    public function servicios(){
        return $this->belongsToMany(Servicios::class,'vehiculo_servicio');
    }
    

}

