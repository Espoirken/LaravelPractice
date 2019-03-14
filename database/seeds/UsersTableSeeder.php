<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->states('admin')->create();
        factory(App\User::class, 1)->states('client')->create();
        factory(App\User::class, 1)->states('coach')->create();
        factory(App\Child::class, 50)->create();
        factory(App\Event::class, 5)->create();
    }
}
