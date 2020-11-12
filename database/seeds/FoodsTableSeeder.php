<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Food;
use Illuminate\Support\Facades\DB;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Food::class,100)->create();

        $food_names = ['いか', 'えび', 'うに', 'かき', 'サバ'];
        foreach ($food_names as $food) {
            DB::table('foods')->insert([
                'name' => $food,
                'price' => 100,
                'description' => 'おいしい',
                'tips' => random_int(0, 1),
                'category_id' => 1,
                'shop_id' => random_int(1, 2),
                'hot' => random_int(0, 1),
                'spice' => random_int(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $drink_names = ['オレンジ', 'リンゴ', 'ハイボール', 'サワー', 'カルーア'];
        foreach ($drink_names as $drink) {
            DB::table('foods')->insert([
                'name' => $drink,
                'price' => 100,
                'description' => 'おいしい',
                'tips' => random_int(0, 1),
                'category_id' => 2,
                'shop_id' => random_int(1, 2),
                'hot' => random_int(0, 1),
                'spice' => random_int(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
