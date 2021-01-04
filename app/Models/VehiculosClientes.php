<?php

namespace App\Models;

use App\Traits\HasVehiculosAndClientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculosClientes extends Model
{
    use  HasVehiculosAndClientes;
}
