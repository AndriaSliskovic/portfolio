<?php

use Illuminate\Database\Seeder;

class OblastTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Oblast::class,3)->create();
    }
}
