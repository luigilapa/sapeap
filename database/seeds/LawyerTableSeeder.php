<?php

use Illuminate\Database\Seeder;

class LawyerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(asoabo\Lawyer::class, 666)->create();
    }
}
