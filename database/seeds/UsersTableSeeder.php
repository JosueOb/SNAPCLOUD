<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //se ejectura el factory y se crean 20 usuario
        factory(App\User::class, 20)->create();
        //se crea un rol por defecto
        Role::create([
            'name'=>'Admin',
            'slug'=> 'admin',
            'special'=> 'all-access',
        ]);
    }
}
