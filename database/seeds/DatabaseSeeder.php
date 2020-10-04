<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeds::class);
        $this->call(UserInfoSeed::class);
        $this->call(SubjectSeed::class);
        $this->call(PostSeed::class);
        $this->call(CommentSeed::class);
//        $this->call(LikeSeed::class);
        $this->call(RoomChatSeeder::class);
        $this->call(MessageSeed::class);
    }
}
