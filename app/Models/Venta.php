<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\VentaItem;

class Venta extends Model
{
    use HasFactory;

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }

    public function ventaItems()
    {
        return $this->belongsToMany(VentaItem::class);
    }
}
