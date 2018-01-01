<?php

use App\Document;
use App\User;
use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->nth(random_int(2, 3));

        foreach ($users as $user) {
            auth()->login($user);
            create(Document::class);
        }
        foreach (makeMany(Document::class, 30) as $document) {
            auth()->login($document->owner);
            $document->save();
        };
    }
}
