<?php

use Illuminate\Database\Seeder;

class CommentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i = 0; $i < 90; $i++){
            $data[] = [
                'id' => $i + 1,
                'userId' => rand(1, 5),
                'postId' => rand(1, 9),
                'content' => "Hello this is my comment ".($i + 1),
                'created_at' => '2020-07-20 12:'.rand(0,5).rand(0,9).':22',
                'updated_at' => '2020-07-20 12:42:22'
            ];
        };
        \App\Comment::insert($data);
    }
}
