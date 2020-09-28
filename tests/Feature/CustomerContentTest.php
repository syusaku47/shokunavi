<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Shop;
use App\Models\Customer;
use Tests\TestCase;

class CustomerShopTest extends TestCase
{
    // テストケースごとにデータベースをリフレッシュしてマイグレーションを再実行する
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        // テストケース実行前にコンテンツデータを作成する
        $this->seed('CustomersTableSeeder');
        $this->seed('ShopsTableSeeder');
    }

    public function test_customer_access()
    {
        // メッセージがわかりやすくなることがあります
        $this->withoutExceptionHandling();

        // ログインユーザー定義
        $customer = Customer::find(1);
        // ログインして店舗一覧にいけるか
        $response = $this->actingAs($customer,'customer')->get('customer/shops/index')->assertStatus(200);
        $response = $this->get('customer/shops/1/edit')->assertStatus(200);
        $response = $this->post('customer/shops/1/destroy')->assertRedirect('customer/shops/index');

        // ログインしてIDの店舗一覧にいけるか
        $response = $this->get('customer/shops/1')->assertStatus(200);
        $response = $this->get('customer/shops/1000')->assertStatus(404);
    } 
}
