<?php

use Illuminate\Database\Seeder;

class PublicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ejecute el factory y cree 80 publicaciones
        factory(App\Publication::class, 80)->create();
    }
}
