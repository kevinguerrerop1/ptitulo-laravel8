<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected $primaryKey ='id';

    public $timestamps= false;

    public function TipoServicios(){
        return $this -> belongsTo(tiposervicios::class ,'idtiposervicio','id');
    }

    public function Empleados(){
        return $this-> belongsTo(Empleados::class,'idempleado','id');
    }

    public function Vehiculos(){
        return $this->belongsTo(Vehiculos::class,'idvehiculo','id');
    }
}
