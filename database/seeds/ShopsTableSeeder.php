<?php

use Illuminate\Database\Seeder;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Shop::class,10)->create();

        DB::table('shops')->insert([
            'name' => '川崎鍋ぞう',
            'image' => '/nabezo_top.jpg',
            'catchcopy' => 'しゃぶしゃぶ、すきやき専門店】
            厳選したお肉に合わせた最適なお出汁とタレは化学調味料・着色料不使用と食材にもこだわっております。',
            'recommend' => '10月「期間限定！～牛骨白だしと3種のタレで食べる～ “岩手山形村短角牛 しゃぶすき鍋”」がおすすめです',
            'customer_id' => 1,
        ]);

        DB::table('shops')->insert([
            'name' => '恵比寿ビアホール',
            'image' => '/ebisubeerhall_top.png',
            'catchcopy' => '「恵比寿」の街は、「ヱビスビール」から生まれました！
            【店内】テーマは、新しいビアホール。ウッディ―な店内は広々134席
            【お料理】肉・ｼｰﾌｰﾄﾞ・季節野菜・ﾁｰｽﾞ料理を中心に、9種類の生ﾋﾞｰﾙ合ったお料理をご用意
            【お食事】終日お食事メニューご用意しております。',
            'recommend' => '名物！ｻｰﾛｲﾝのｵｰﾀﾞｰｶｯﾄ。！お好みの厚さに！',
            'customer_id' => 1,
        ]);

        DB::table('shops')->insert([
            'name' => '恵比寿ビアホール',
            'image' => '/default.jpg',
            'catchcopy' => '「恵比寿」の街は、「ヱビスビール」から生まれました！
            【店内】テーマは、新しいビアホール。ウッディ―な店内は広々134席
            【お料理】肉・ｼｰﾌｰﾄﾞ・季節野菜・ﾁｰｽﾞ料理を中心に、9種類の生ﾋﾞｰﾙ合ったお料理をご用意
            【お食事】終日お食事メニューご用意しております。',
            'recommend' => '名物！ｻｰﾛｲﾝのｵｰﾀﾞｰｶｯﾄ。！お好みの厚さに！',
            'customer_id' => 1,
        ]);
    }
}
