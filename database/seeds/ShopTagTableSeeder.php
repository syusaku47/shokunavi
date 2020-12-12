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
        $array = range(1, 10);
        shuffle($array);
        $array1 = array_slice($array,0 ,$n );
        for ($i = 0; $i < $n; $i++) {
            DB::table('shop_tag')->insert([
                'shop_id' => 1,
                'tag_id' => $array1[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
            }
            
        shuffle($array);
        $array2 = array_slice($array,0 ,$n );
        for ($i = 0; $i < $n; $i++) {
            DB::table('shop_tag')->insert([
                'shop_id' => 2,
                'tag_id' => $array2[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
