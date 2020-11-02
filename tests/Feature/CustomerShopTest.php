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

    public function setUp(): void
    {
        parent::setUp();
        // テストケース実行前にコンテンツデータを作成する
        $this->seed('CustomersTableSeeder');
        $this->seed('ShopsTableSeeder');
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
        $this->assertDatabaseHas('customers', [
            'name' => 'saori',
            'email' => 'saori@gmail.com',
            'password' => 'saoriHasegawa'
        ]);
    }


    public function test_customer_access_success()
    {
        // メッセージがわかりやすくなることがあります
        $this->withoutExceptionHandling();

        // ログインユーザー定義
        $customer = Customer::findOrFail(1);
        $shop = Shop::findOrFail(2);

        // ログインして店舗一覧にいけるか
        $response = $this->actingAs($customer, 'customer')
            ->get(route('shops.index'))->assertStatus(200);

        $response = $this->get(route('shops.create'))
            ->assertStatus(200);

        $response = $this->get(route('shops.edit', [
            'shop' => $shop->id
        ]))->assertStatus(200);

        $response = $this->get(route('shops.show', [
            'shop' => $shop->id
        ]))->assertStatus(200);


        // $response = $this->put('customers/shops/'.$shop->id,[
        //     'name' => 'ビアホール',
        //     'catchcopy' => 'おいしいよ！',
        //     'recommend' => 'すごくおいしいよ！'
        //     ])->assertRedirect(route('shops.index'));

        // ログインしてIDの店舗一覧にいけるか
        $response = $this->get('customers/shops/1')
            ->assertStatus(200);

        $response = $this->delete(route('shops.destroy', ['shop' => $shop->id]))
            ->assertRedirect(route('shops.index'));

        /**
         * @expectedException \Illuminate\Database\Eloquent\ModelNotFoundException
         */
        // $response = $this->get('customer/shops/1000')
        //                 ->assertStatus(404);

    }
}
