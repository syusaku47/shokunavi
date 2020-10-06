<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ShopFormData
{
    public static function createImage($data){
        //画像があれば処理
        if ($file = $data->image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
            return $fileName;
        }
    }

    public static function search($data){
        $search = $data->input('search');

        // 検索フォーム
        $query = DB::table('shops');

        if($search !== null){//もしキーワードがあったら
            //全角スペースを半角に
            $search_split = mb_convert_kana($search,'s');

            //空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split,-1,PREG_SPLIT_NO_EMPTY);

            //単語をループで回す
            foreach($search_split2 as $value)
            {
                $query->where('name','like','%'.$value.'%');
            }
        };
        
        $query->select('id','name','catchcopy','recommend','image','updated_at');
        $query->orderBy('updated_at', 'desc');
        return $query->paginate(20);
    }

}
