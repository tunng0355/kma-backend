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
        for ($i = 0; $i < 60; $i++){
            $data[] = [
                'id' => $i + 1,
                'userId' => rand(1, 5),
                'postId' => rand(1, 8),
                'content' => "Hello this is my comment ".($i + 1),
                'created_at' => '2020-07-20 12:'.($i < 10 ? "0".$i : $i).':22',
                'updated_at' => '2020-07-20 12:42:22'
            ];
        };
        \App\Comment::insert($data);
    }
}
