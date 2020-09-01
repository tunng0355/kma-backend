<?php

use Illuminate\Database\Seeder;

class MessageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'message' => "Hello, I'm Nobita, and you?",
                'type' => 'text',
                'user_id' => 1,
                'created_at' => '2020-08-27 15:14:22'
            ],
            [
                'id' => 2,
                'message' => "I'm Doremon, how are you?",
                'type' => 'text',
                'user_id' => 2,
                'created_at' => '2020-08-28 12:42:22'
            ],
            [
                'id' => 3,
                'message' => "Hello every where, I'm xuka?",
                'type' => 'text',
                'user_id' => 3,
                'created_at' => '2020-08-29 12:42:22'
            ]

        ];
        \App\Message::insert($users);
    }
}
