<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShopTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = 10;
        for ($i = 0; $i < $n; $i++) {
            DB::table('shop_tag')->insert([
                'shop_id' => random_int(1, 3),
                'tag_id' => random_int(1, 4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
