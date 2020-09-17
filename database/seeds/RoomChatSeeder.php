<?php

use Illuminate\Database\Seeder;

class RoomChatSeeder extends Seeder
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
                'listId' => "4,1",
                'created_at' => '2020-09-17 21:19:00',
                'updated_at' => '2020-09-17 21:19:00',
            ],
        ];
        \App\RoomChat::insert($data);
    }
}
