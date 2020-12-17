<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ShopTagTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(SeetsTableSeeder::class);
    }
}
