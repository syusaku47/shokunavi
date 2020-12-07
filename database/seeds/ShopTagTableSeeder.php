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
        $n = 3;
        for ($i = 0; $i < $n; $i++) {
            DB::table('shop_tag')->insert([
                'shop_id' => 1,
                'tag_id' => $i+1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        for ($i = 0; $i < $n; $i++) {
            DB::table('shop_tag')->insert([
                'shop_id' => 2,
                'tag_id' => $i+2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
