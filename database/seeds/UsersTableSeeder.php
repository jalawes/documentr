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
            'email'      => 'jamal@jamal.com',
            'password'   => bcrypt('jamal'),
        ]);

        create(User::class, [
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
        ]);
    }
}
