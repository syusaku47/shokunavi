<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Shop;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    public function setUp():void
    {
        parent::setUp();
        // テストケース実行前にコンテンツデータを作成する
        $this->seed('UsersTableSeeder');
    }

    public function test_user_no_login()
    {
        // ログイン画面にいけるか
        $response = $this->get('/login')->assertStatus(200);

        // ログインしていないので店舗一覧画面にアクセスは失敗する
        $response = $this->get('users/shops/user_index')->assertStatus(302);
    }

    public function test_user_no_register()
    {
        // ログイン画面にいけるか
        $response = $this->get('/register')->assertStatus(200);
    }
}
