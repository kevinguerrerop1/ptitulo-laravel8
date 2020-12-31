<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    public function usuario(){
        return $this->belongsToMany(User::class, 'vehiculo_cliente');
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicios::class,'vehiculo_servicio');
    }

}
