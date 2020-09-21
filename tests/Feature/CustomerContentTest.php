<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Content;
use App\Models\Customer;
use Tests\TestCase;

class CustomerContentTest extends TestCase
{
    // テストケースごとにデータベースをリフレッシュしてマイグレーションを再実行する
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        // テストケース実行前にコンテンツデータを作成する
        $this->seed('CustomersTableSeeder');
        $this->seed('ContentsTableSeeder');
    }

    public function test_customer_access()
    {
        // メッセージがわかりやすくなることがあります
        $this->withoutExceptionHandling();

        // ログインユーザー定義
        $customer = Customer::find(1);
        // ログインして店舗一覧にいけるか
        $response = $this->actingAs($customer,'customer')->get('customer/contents/index')->assertStatus(200);
        $response = $this->get('customer/contents/1/edit')->assertStatus(200);
        $response = $this->post('customer/contents/1/destroy')->assertRedirect('customer/contents/index');

        // ログインしてIDの店舗一覧にいけるか
        $response = $this->get('customer/contents/1')->assertStatus(200);
        $response = $this->get('customer/contents/1000')->assertStatus(404);
    } 
}
