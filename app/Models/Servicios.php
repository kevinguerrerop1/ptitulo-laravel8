<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    
    public function Vehiculos(){
        return $this-> belongsTo(Vehiculos::class,'vehiculo_id','id');
    }
}
