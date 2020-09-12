<?php

use Illuminate\Database\Seeder;

class LikeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [];
        for ($i = 0; $i < 150; $i++){
            $data[] = [
                'userId' => rand(1, 4),
                'postId' => rand(1, 7),
                'created_at' => '2020-07-20 12:'.rand(0,5).rand(0,9).':22',
                'updated_at' => '2020-07-20 12:42:22'
            ];
        };
        \App\Like::insert($data);
    }
}
