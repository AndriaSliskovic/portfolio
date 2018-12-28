<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            OblastTableSeeder::class,
            MenuTableSeeder::class,
            OwnerTableSeeder::class,
            SkillTableSeeder::class,
            SettingsTableSeeder::class,
            UsersTableSeeder::class,
            CategoryTableSeeder::class,
            ProfileTableSeeder::class


            //Many to Many relacija
        ]);
        factory(App\Projekti::class, 6)->create()->each(function ($u) {
            $u->tag()->save(factory(App\Tag::class)->make());
        });


    }
}
