<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria1 = Categoria::create(['nombre' => 'Hamburguesas', 'orden' => 1]);
        $categoria2 = Categoria::create(['nombre' => 'Jugos', 'orden' => 2]);
        $categoria3 = Categoria::create(['nombre' => 'Carnes', 'orden' => 3]);
        $categoria4 = Categoria::create(['nombre' => 'Sandwiches', 'orden' => 4]);
    }
}
