<?php

use Illuminate\Database\Seeder;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Shop::class,100)->create();
    }
}
