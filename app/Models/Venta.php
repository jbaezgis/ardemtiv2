<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\VentaItem;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'total',
    ];
}
