<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Customer;
use Tests\TestCase;

class CustomerFoodTest extends TestCase
{
    // テストケースごとにデータベースをリフレッシュしてマイグレーションを再実行する
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        // テストケース実行前にコンテンツデータを作成する
        $this->seed('CustomersTableSeeder');
        $this->seed('ShopsTableSeeder');
        $this->seed('FoodsTableSeeder');
    }

    public function test_create_success()
    {
        $customer = new Customer();
        $customer->name = 'saori';
        $customer->email = 'saori@gmail.com';
        $customer->password = 'saoriHasegawa';
        $result = $customer->save();
        $this->assertTrue($result);

        //データベースに存在するか？
        $this->assertDatabaseHas('customers',[
            'name' => 'saori',
            'email' => 'saori@gmail.com',
            'password' => 'saoriHasegawa'
        ]);
    }
}
