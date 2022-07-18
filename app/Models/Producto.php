<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Venta;
use App\Models\Item;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'nombre',
        'descripcion',
        'precio',
        'categoria',
        'estado',
        'creado_por',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'creado_por');
    }

    public function categoriaId()
    {
        return $this->belongsTo(Categoria::class, 'categoria');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
