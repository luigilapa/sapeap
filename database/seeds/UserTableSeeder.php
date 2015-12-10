<?php
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
    public function run() {
        
        factory(asoabo\User::class)->create([
                    'first_name' => 'Usuario',
                    'last_name' => 'Administrador',
                    'email' => '',
                    'user' => 'admin',
                    'password' => bcrypt('admin'),
                    'type' => 'admin',
                    ]);

        /*
        factory(asoabo\User::class)->create([
            'first_name' => 'Andrea',
            'last_name' => 'Chavez',
            'email' => 'andy@outlook.es',
            'user' => 'andy',
            'password' => bcrypt('123'),
            'type' => 'admin',
        ]);
        
        factory(asoabo\User::class, 30)->create();
        */
    }
}
