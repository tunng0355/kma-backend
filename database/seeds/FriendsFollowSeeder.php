<?php

use Illuminate\Database\Seeder;

class FriendsFollowSeeder extends Seeder
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
                'userId' => 4,
                'friends' => '1,2,3,7',
                'follows' => '5,10',
                'follows_groups' => '1,3'
            ]
        ];
        \App\FriendsFollow::insert($data);
    }
}
