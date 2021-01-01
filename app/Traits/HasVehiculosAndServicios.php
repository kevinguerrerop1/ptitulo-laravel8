<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;


trait HasVehiculosAndServicios
{
 
    public function vehiculos(){
        return $this -> belongsToMany(Vehiculos::class,'vehiculo_servicio');
    }

    public function servicios(){
        return $this->belongsToMany(Servicios::class,'vehiculo_servicio');
    }
    

}