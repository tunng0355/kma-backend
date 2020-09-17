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
        $data = [
            [
                'id' => 1,
                'message' => "Hello, I'm Nobita, and you?",
                'roomId' => 1,
                'type' => POST_TYPE_STATUS,
                'userId' => 1,
                'created_at' => '2020-08-27 15:14:22'
            ],
            [
                'id' => 2,
                'message' => "I'm Doremon, how are you?",
                'roomId' => 1,
                'type' => POST_TYPE_STATUS,
                'userId' => 4,
                'created_at' => '2020-08-28 12:42:22'
            ],
        ];
        \App\Message::insert($data);
    }
}
