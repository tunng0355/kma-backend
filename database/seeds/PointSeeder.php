<?php

use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
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
            $data[] =            [
                'userId' => $i + 1,
                'total' => rand(500, 1000),
            ];
        };
        \App\Point::insert($data);
    }
}
