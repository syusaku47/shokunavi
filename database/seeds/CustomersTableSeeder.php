<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('customers')->insert([
                'name' => '鍋ぞう',
                'email' => "sarryppp@gmail.com",
                'password'=>"12345",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
    }
}
