<?php

use Illuminate\Database\Seeder;

class PostSeed extends Seeder
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
                'userId' => 1,
                'type' => POST_TYPE_STATUS,
                'subjectId' => 1,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => null,
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-20 12:42:22',
                'updated_at' => '2020-07-20 12:42:22'
            ],
            [
                'userId' => 4,
                'type' => POST_TYPE_IMAGE,
                'subjectId' => 2,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://lh3.googleusercontent.com/proxy/nEARFlOORYHiOmNZ0PMPCSgGkAoD9FYR8YN53MFvgVtncHtg2XH9EvI1-iQaqPLAr4J4HR23V8uGvUXACns3uN-aYuf9SghQ_AbxS0flX23orzy0VmJbTdv-MXIY0vQIDeMHq7sYcbhGEkAfmF_kzbpGbcqj',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-19 12:42:22',
                'updated_at' => '2020-07-19 12:42:22'
            ],
            [
                'userId' => 1,
                'type' => POST_TYPE_IMAGE,
                'subjectId' => 2,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://lh3.googleusercontent.com/proxy/nEARFlOORYHiOmNZ0PMPCSgGkAoD9FYR8YN53MFvgVtncHtg2XH9EvI1-iQaqPLAr4J4HR23V8uGvUXACns3uN-aYuf9SghQ_AbxS0flX23orzy0VmJbTdv-MXIY0vQIDeMHq7sYcbhGEkAfmF_kzbpGbcqj,https://lh3.googleusercontent.com/proxy/_p5aYP1bQMRFRzE6dIyZrnt793V8GIKADk8tqHmaFEsR0ijw0Hn5aFGE9zhuasnGDvXNWZtH5wEzkik8xZfTDNa2PeilFWFfe0c4iKtLkrHaBMMpi1KKYqQiRMv7nkgaVdfssTbxaydVIL1JfYfro0jwpS6Phqg,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF-0Ace1036bc8oh1Ndrc3_QahoKvhE4jI0g&usqp=CAU',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'userId' => 1,
                'type' => POST_TYPE_IMAGE,
                'subjectId' => 2,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://lh3.googleusercontent.com/proxy/nEARFlOORYHiOmNZ0PMPCSgGkAoD9FYR8YN53MFvgVtncHtg2XH9EvI1-iQaqPLAr4J4HR23V8uGvUXACns3uN-aYuf9SghQ_AbxS0flX23orzy0VmJbTdv-MXIY0vQIDeMHq7sYcbhGEkAfmF_kzbpGbcqj,https://lh3.googleusercontent.com/proxy/_p5aYP1bQMRFRzE6dIyZrnt793V8GIKADk8tqHmaFEsR0ijw0Hn5aFGE9zhuasnGDvXNWZtH5wEzkik8xZfTDNa2PeilFWFfe0c4iKtLkrHaBMMpi1KKYqQiRMv7nkgaVdfssTbxaydVIL1JfYfro0jwpS6Phqg,',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'userId' => 1,
                'type' => POST_TYPE_IMAGE,
                'subjectId' => 2,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://lh3.googleusercontent.com/proxy/nEARFlOORYHiOmNZ0PMPCSgGkAoD9FYR8YN53MFvgVtncHtg2XH9EvI1-iQaqPLAr4J4HR23V8uGvUXACns3uN-aYuf9SghQ_AbxS0flX23orzy0VmJbTdv-MXIY0vQIDeMHq7sYcbhGEkAfmF_kzbpGbcqj,https://lh3.googleusercontent.com/proxy/_p5aYP1bQMRFRzE6dIyZrnt793V8GIKADk8tqHmaFEsR0ijw0Hn5aFGE9zhuasnGDvXNWZtH5wEzkik8xZfTDNa2PeilFWFfe0c4iKtLkrHaBMMpi1KKYqQiRMv7nkgaVdfssTbxaydVIL1JfYfro0jwpS6Phqg,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF-0Ace1036bc8oh1Ndrc3_QahoKvhE4jI0g&usqp=CAU,https://phunugioi.com/wp-content/uploads/2020/04/nhung-hinh-anh-dep-ve-que-huong-dat-nuoc-con-nguoi-viet-nam.jpg,',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'userId' => 4,
                'type' => POST_TYPE_IMAGE,
                'subjectId' => 2,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://lh3.googleusercontent.com/proxy/nEARFlOORYHiOmNZ0PMPCSgGkAoD9FYR8YN53MFvgVtncHtg2XH9EvI1-iQaqPLAr4J4HR23V8uGvUXACns3uN-aYuf9SghQ_AbxS0flX23orzy0VmJbTdv-MXIY0vQIDeMHq7sYcbhGEkAfmF_kzbpGbcqj,https://lh3.googleusercontent.com/proxy/_p5aYP1bQMRFRzE6dIyZrnt793V8GIKADk8tqHmaFEsR0ijw0Hn5aFGE9zhuasnGDvXNWZtH5wEzkik8xZfTDNa2PeilFWFfe0c4iKtLkrHaBMMpi1KKYqQiRMv7nkgaVdfssTbxaydVIL1JfYfro0jwpS6Phqg,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF-0Ace1036bc8oh1Ndrc3_QahoKvhE4jI0g&usqp=CAU,https://phunugioi.com/wp-content/uploads/2020/04/nhung-hinh-anh-dep-ve-que-huong-dat-nuoc-con-nguoi-viet-nam.jpg,https://bizweb.dktcdn.net/100/202/714/articles/201678154543244.jpg?v=1493007042240',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'userId' => 4,
                'type' => POST_TYPE_IMAGE,
                'subjectId' => 2,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://lh3.googleusercontent.com/proxy/nEARFlOORYHiOmNZ0PMPCSgGkAoD9FYR8YN53MFvgVtncHtg2XH9EvI1-iQaqPLAr4J4HR23V8uGvUXACns3uN-aYuf9SghQ_AbxS0flX23orzy0VmJbTdv-MXIY0vQIDeMHq7sYcbhGEkAfmF_kzbpGbcqj,https://lh3.googleusercontent.com/proxy/_p5aYP1bQMRFRzE6dIyZrnt793V8GIKADk8tqHmaFEsR0ijw0Hn5aFGE9zhuasnGDvXNWZtH5wEzkik8xZfTDNa2PeilFWFfe0c4iKtLkrHaBMMpi1KKYqQiRMv7nkgaVdfssTbxaydVIL1JfYfro0jwpS6Phqg,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF-0Ace1036bc8oh1Ndrc3_QahoKvhE4jI0g&usqp=CAU,https://phunugioi.com/wp-content/uploads/2020/04/nhung-hinh-anh-dep-ve-que-huong-dat-nuoc-con-nguoi-viet-nam.jpg,https://bizweb.dktcdn.net/100/202/714/articles/201678154543244.jpg?v=1493007042240,https://danviet.mediacdn.vn/upload/3-2013/images/2013-09-08/1434778795-lht_9142.jpg',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
        ];
        \App\Posts::insert($data);
    }
}
