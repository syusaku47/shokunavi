<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['個室','半個室','テーブル','カウンター'];
        foreach($array as $value){
            DB::table('types')->insert([
                'name' => $value,
            ]);
        }
    }
}
