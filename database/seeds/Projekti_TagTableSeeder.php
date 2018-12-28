<?php

use Illuminate\Database\Seeder;

class Projekti_TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Many to Many relacija
        factory(App\Projekti::class, 6)->create()->each(function ($u) {
            $u->tags()->save(factory(App\Tag::class)->make());
        });
    }
}
