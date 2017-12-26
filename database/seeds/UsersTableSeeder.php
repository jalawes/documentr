<?php

use App\User;
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
        create(User::class, [
            'first_name' => 'Jamal',
            'last_name'  => 'Alawes',
            'email'      => 'jamal.alawes@gmail.com',
            'password'   => bcrypt('jamal'),
        ]);
    }
}
