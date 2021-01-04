<?php

namespace App\Traits;

use App\Models\Vehiculos;
use App\Models\User;


trait HasVehiculosAndClientes
{
 
    public function vehiculos(){
        return $this->belongsToMany(Vehiculos::class,'vehiculos_clientes');
    }

    public function usuario(){
        return $this->belongsToMany(User::class,'vehiculos_clientes');
    }
    
}