<?php

use App\Document;
use App\User;
use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->nth(random_int(2, 3));
        $documents = Document::public()->get();

        $users->each(function ($user) use ($documents) {
            Auth::login($user);
            $documents->random()->favorite();
        });
    }
}
