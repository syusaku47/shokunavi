<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Shop;
use App\Models\User;
use Tests\TestCase;

class UserShopTest extends TestCase
{
    // テストケースごとにデータベースをリフレッシュしてマイグレーションを再実行する
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        // テストケース実行前にコンテンツデータを作成する
        $this->seed('UsersTableSeeder');
        $this->seed('ShopsTableSeeder');
    }

    public function test_user_access()
    {
        // メッセージがわかりやすくなることがあります
        // $this->withoutExceptionHandling();

        // ログインユーザー定義
        $user = User::find(1);
        
        // ログインして店舗一覧にいけるか
        $response = $this->actingAs($user)->get('users/shops/user_index')->assertStatus(200);

        // ログインしてIDの店舗一覧にいけるか
        $response = $this->actingAs($user)->get('users/shops/1')->assertStatus(200);
        $response = $this->actingAs($user)->get('users/shops/1000')->assertStatus(404);
    } 

    public function test_user_likes()
    {
            // ログインユーザー定義
            $user = User::find(1);

            // いいねをして同じ画面に戻るか
            $response = $this->actingAs($user)->post('users/shops/1/likes',[
                'user_id' => 1,
                'shop_id' => 1
            ]);
            $response->assertRedirect('users/shops/1');
    
            // いいねを削除して同じ画面に戻るか
            $response = $this->post('users/shops/1/likes/1')->assertRedirect('users/shops/1');
    }
}
