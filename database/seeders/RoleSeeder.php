<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Gerente']);
        $role3 = Role::create(['name' => 'Vendedor']);
        $role4 = Role::create(['name' => 'Contable']);

        Permission::create(['name' => 'admin.inicio'])->syncRoles([$role1,$role2,$role3,$role4]);

        Permission::create(['name' => 'admin.ventas.index'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'admin.ventas.create'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'admin.ventas.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.ventas.destroy'])->syncRoles([$role1,]);

        Permission::create(['name' => 'admin.clientes.index'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name' => 'admin.clientes.create'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name' => 'admin.clientes.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clientes.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.proveedores.index'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name' => 'admin.proveedores.create'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name' => 'admin.proveedores.edit'])->syncRoles([$role1,]);
        Permission::create(['name' => 'admin.proveedores.destroy'])->syncRoles([$role1,]);

        Permission::create(['name' => 'admin.productos.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.productos.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.productos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.productos.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categorias.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.categorias.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.categorias.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.gastos.index'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name' => 'admin.gastos.create'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name' => 'admin.gastos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.gastos.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.provincias.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.provincias.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.provincias.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.provincias.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.municipios.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.municipios.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.municipios.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.municipios.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy'])->syncRoles([$role1]);

    }
}
