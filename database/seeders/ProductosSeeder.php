<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto1 = Producto::create(['nombre' => 'Producto 1', 'categoria' => 1]);
        $Producto2 = Producto::create(['nombre' => 'Producto 2', 'categoria' => 2]);
        $Producto3 = Producto::create(['nombre' => 'Producto 3', 'categoria' => 3]);
        $Producto4 = Producto::create(['nombre' => 'Producto 4', 'categoria' => 4]);
    }
}
