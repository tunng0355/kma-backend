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
        $data = [];
        for ($i = 0; $i < 15; $i++){
            $data[] = [
                'id' => $i + 1,
                'userId' => $i + 1,
                'friends' => rand(1,16).','.rand(1,16).','.rand(1,16).','.rand(1,16),
                'follows' => rand(1,16).','.rand(1,16).','.rand(1,16).','.rand(1,16),
                'follows_groups' => rand(1,16).','.rand(1,6),
            ];
        };
        \App\FriendsFollow::insert($data);
    }


}
