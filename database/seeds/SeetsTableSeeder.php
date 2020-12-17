<?php

use Illuminate\Database\Seeder;

class SeetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seets')->insert([
            'type' => 'テーブル',
            'num_of_seets' => 2,
            'discription' => '窓からの景色が最高です',
            'shop_id' => 1,
        ]);
    }
}
