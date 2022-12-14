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
        for ($i = 0; $i < 100; $i++){
            $data[] = [
                'id' => $i + 1,
                'userId' => rand(1, 5),
                'postId' => rand(1, 9),
                'commentId' => null,
                'active' => ACTIVE,
                'created_at' => '2020-07-20 12:'.rand(0,5).rand(0,9).':22',
                'updated_at' => '2020-07-20 12:42:22'
            ];
        };

        for ($i = 100; $i < 150; $i++){
            $data[] = [
                'id' => $i + 1,
                'userId' => rand(1, 5),
                'postId' => null,
                'active' => ACTIVE,
                'commentId' => rand(1, 90),
                'created_at' => '2020-07-25 12:'.rand(0,5).rand(0,9).':22',
                'updated_at' => '2020-07-25 12:42:22'
            ];
        };
        \App\Like::insert($data);
    }
}
