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
            'name' => 'Jamal',
            'email' => 'jamal@jamal.com',
            'password' => bcrypt('jamal')
        ]);
    }
}
