<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['和食', '洋食', 'タイ料理', 'そば', 'うどん', 'お好み焼き', 'しゃぶしゃぶ', '沖縄料理', '韓国料理','フレンチ','ピザ','パスタ','焼き鳥'];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
