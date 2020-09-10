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
                'name' => 'masu',
                'email' => 'masu@email.com',
                'password' => bcrypt('test1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
    }
}
