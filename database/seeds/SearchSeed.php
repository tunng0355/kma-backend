<?php

use Illuminate\Database\Seeder;

class SearchSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i = 0; $i < 6; $i++){
            $data[] = [
                'id' => $i + 1,
                'listHistory' => randomString(5).",".randomString(6).",".randomString(10).",".randomString(15).",".randomString(8),
                'userId' => $i + 1,
            ];
        };
        \App\Search::insert($data);
    }
}
