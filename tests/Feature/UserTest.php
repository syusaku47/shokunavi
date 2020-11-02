<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Shop;
use App\Models\User;
use Auth;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        // テストケース実行前にコンテンツデータを作成する
        $this->seed('UsersTableSeeder');
    }

    public function test_user_can_login()
    {
        // ユーザーを１つ作成
        $user = factory(User::class)->create([
            'password'  => bcrypt('test1111')
        ]);

        // まだ、認証されていない
        $this->assertFalse(Auth::check());

        // ログインを実行
        $response = $this->post('login', [
            'email'    => $user->email,
            'password' => 'test1111'
        ]);

        // 認証されている
        $this->assertTrue(Auth::check());

        // ログイン後にホームページにリダイレクトされるのを確認
        $response->assertRedirect(route('shops.user_index'));
    }

    public function test_user_cannot_login()
    {
        // ログイン画面にいけるか
        $response = $this->get('/login')->assertStatus(200);

        // ログインしていないので店舗一覧画面にアクセスは失敗する
        $response = $this->get('users/shops/user_index')->assertStatus(302);
    }

    public function test_user_can_register()
    {
        $this->withoutExceptionHandling();
        // ログイン画面にいけるか
        $response = $this->get('register')->assertStatus(200);
        $response = $this->post(route('register', [
            'name' => 'sirasunnnnnnn',
            'email' => 'sirasu@gmail.com',
            'password' => 'sirasusan',
            'password_confirmation' => 'sirasusan'
        ]))->assertRedirect('users/shops/user_index');
    }


    public function test_user_access()
    {
        // $this->withoutExceptionHandling();

        $user = User::findOrFail(1);

        $response = $this->actingAs($user)->get(route('users.show', [
            'user' => $user->id
        ]))->assertStatus(200);

        $this->assertTrue(Auth::check());
        $response = $this->get(route('users.edit', [
            'user' => $user->id
        ]))->assertStatus(200);

        $response = $this->get(route('users.edit_password', [
            'user' => $user->id
        ]))->assertStatus(200);

        $response = $this->post(route('users.destroy', [
            'user' => $user->id
        ]))->assertRedirect('login');
    }

    public function test_user_cannot_access()
    {
        $user = User::findOrFail(2);

        //User認証していないのでlogin画面にリダイレクト
        $response = $this->get(route('users.edit', [
            'user' => 2
        ]))->assertRedirect('login');

        //User認証済なのでlogin画面アクセス出来ない
        // $user = factory(User::class)->create();
        // $response = $this->actingAs($user)->get(route('users.edit', [
        //     'user' => $user->id
        // ]))->assertStatus(200);

        //ログインユーザーが他ユーザーの情報画面にアクセス出来ない
    }

    public function test_user_can_edit()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();


        $response = $this->actingAs($user)->post(route('users.edit', [
            'user' => $user->id,
            'name' => 'tanabe',
            'email' => 'tanabe@gmail.com',
        ]))->assertRedirect(route('users.show', [
            'user' => $user->id
        ]));
    }

    public function test_user_cannot_edit()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();


        $response = $this->actingAs($user)->post(route('users.edit', [
            'user' => $user->id,
            'name' => 'tanabe',
            'email' => 'tanabe',
        ]))->assertRedirect(route('users.show', [
            'user' => $user->id
        ]));
    }
}
