<?php

use Illuminate\Database\Seeder;

class SubjectSeed extends Seeder
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
                'name' => 'Toán cao cấp A1',
                'tag' => 'tcca1',
            ],
            [
                'id' => 2,
                'name' => 'Toán cao cấp A2',
                'tag' => 'tcca2',
            ],
            [
                'id' => 3,
                'name' => 'Toán cao cấp A3',
                'tag' => 'tcca3',
            ],
            [
                'id' => 4,
                'name' => 'Phát triển ứng dụng web',
                'tag' => 'ptudw',
            ],
            [
                'id' => 5,
                'name' => 'Kỹ thuật lập trình',
                'tag' => 'ktlt',
            ],
            [
                'id' => 6,
                'name' => 'Thực tập cơ sở chuyên ngành',
                'tag' => 'ttcscn',
            ],
        ];
        \App\Subject::insert($data);
    }

}
