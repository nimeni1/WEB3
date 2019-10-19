<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            [
                'creator_id' => '1',
                'quote' => 'Run forest',
                'author' => 'Forest Gump',
                'subject' => 'movies',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'creator_id' => '2',
                'quote' => 'Asta la Vista Baby',
                'author' => 'Arnold Schwarzenegger',
                'subject' => 'movies',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'creator_id' => '3',
                'quote' => 'I will be back',
                'author' => 'The terminator',
                'subject' => 'movies',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'creator_id' => '3',
                'quote' => 'Hakuna Matata',
                'author' => 'Timon',
                'subject' => 'movies',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'creator_id' => '3',
                'quote' => 'Its all gone Pete gone',
                'author' => 'not sure',
                'subject' => 'movies',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'creator_id' => '3',
                'quote' => 'There is no friend as loyal as a book',
                'author' => 'not sure',
                'subject' => 'books',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]

        ]);

    }
}
