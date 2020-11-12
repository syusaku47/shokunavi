<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Customer;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        // テストケース実行前にコンテンツデータを作成する
        $this->seed('CustomersTableSeeder');
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_no_authenticate()
    {
        $response = $this->get('/customers/login');
        $response->assertStatus(200);
    }

    public function test_login()
    {
        $customer = Customer::find(1);

        //Customerサイトにログインができるか
        $response = $this->post(route('customers.auth.login'), [
            'email' => $customer->email,
            'password' => 'saiyotantou',
        ])->assertRedirect('customers/shops');
    }

    public function test_databaseHas()
    {
        //Customer情報にアクセスできるか
        $response = $this->get(route('customers.show', [
            'customer' => $customer->id
        ]))
            ->assertOk();

        //他のCustomer情報にアクセスできるか
        $response = $this->get(route('customers.show', [
            'customer' => 2
        ]))
            ->assertStatus(403);

        //他のCustomerのアカウントは削除できない
        $response = $this->post(route('customers.destroy', [
            'customer' => 2
        ]))
            ->assertStatus(403);

        //Customer情報は残っているか
        $customer = Customer::find(2)->toArray(); //Customerを配列に変換
        $this->assertDatabaseHas('customers', $customer); //テーブル名,連想配列
    }
}
