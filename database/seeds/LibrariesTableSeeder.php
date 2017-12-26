<?php

use App\Library;
use Illuminate\Database\Seeder;

class LibrariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        createMany(Library::class, random_int(10, 20));
    }
}
