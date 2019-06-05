<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission; 

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos de usuarios
        Permission::create([
            'name'=> 'Navegar usuarios',
            'slug'=> 'users.index',//permisos sobre una ruta
            'description'=>'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'=> 'Ver detalle de usuario',
            'slug'=> 'users.show',//permisos sobre una ruta
            'description'=>'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
            'name'=> 'Edición de usuario',
            'slug'=> 'users.edit',//permisos sobre una ruta
            'description'=>'Editar cualquier datos de un usuario del sistema',
        ]);
        Permission::create([
            'name'=> 'Eliminar usuario',
            'slug'=> 'users.destroy',//permisos sobre una ruta
            'description'=>'Eliminar cualquier usuario del sistema',
        ]);

        //Roles
        Permission::create([
            'name'=> 'Navegar roles',
            'slug'=> 'roles.index',//permisos sobre una ruta
            'description'=>'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name'=> 'Ver detalle de rol',
            'slug'=> 'roles.show',//permisos sobre una ruta
            'description'=>'Ver en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'=> 'Creación de roles',
            'slug'=> 'roles.create',//permisos sobre una ruta
            'description'=>'Crear a los roles del sistema',
        ]);
        Permission::create([
            'name'=> 'Edición de roles',
            'slug'=> 'roles.edit',//permisos sobre una ruta
            'description'=>'Editar cualquier datos de un rol del sistema',
        ]);
        Permission::create([
            'name'=> 'Eliminar roles',
            'slug'=> 'roles.destroy',//permisos sobre una ruta
            'description'=>'Eliminar cualquier rol del sistema',
        ]);

        //Productos
        Permission::create([
            'name'=> 'Navegar productos',
            'slug'=> 'products.index',//permisos sobre una ruta
            'description'=>'Lista y navega todos los productos del sistema',
        ]);
        Permission::create([
            'name'=> 'Ver detalle de producto',
            'slug'=> 'products.show',//permisos sobre una ruta
            'description'=>'Ver en detalle cada producto del sistema',
        ]);
        Permission::create([
            'name'=> 'Creación de productos',
            'slug'=> 'products.create',//permisos sobre una ruta
            'description'=>'Crear a los productos del sistema',
        ]);
        Permission::create([
            'name'=> 'Edición de productos',
            'slug'=> 'products.edit',//permisos sobre una ruta
            'description'=>'Editar cualquier datos de un producto del sistema',
        ]);
        Permission::create([
            'name'=> 'Eliminar productos',
            'slug'=> 'products.destroy',//permisos sobre una ruta
            'description'=>'Eliminar cualquier producto del sistema',
        ]);
    }
}
