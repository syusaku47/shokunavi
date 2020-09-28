<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShop;
use App\Http\Requests\EditShop;
use App\Models\Shop;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shops = Shop::all();
        $shops = DB::table('shops')
        ->select('id','name','catchcopy','recommend','image','updated_at')
        ->orderBy('updated_at','desc')
        ->paginate(20);
    
        return view('shops/index', [
            'shops' => $shops,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = new Shop();
        $shop->name = $request->name;
        $shop->image = 'default.jpg';
        $shop->catchcopy = $request->catchcopy;
        $shop->recommend = $request->recommend;
        $shop->customer_id = Auth::user()->id;
        $shop->created_at = Carbon::now();
        $shop->updated_at = Carbon::now();
        $shop->save(); 

        return redirect()->route('shops.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::find($id);
        $foods = $shop->foods()->get();

        return view('shops/show',[
        'shop' => $shop,
        'foods' => $foods
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::find($id);
        $foods = $shop->foods()->get();

        return view('shops/edit',[
        'shop' => $shop,
        'foods' => $foods
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($file = $request->image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        $shop = Shop::find($id);
        $shop->name = $request->name;
        $shop->catchcopy = $request->catchcopy;
        $shop->recommend = $request->recommend;
        $shop->image = $fileName;
        $shop->updated_at = Carbon::now();
        $shop->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);
        $shop->delete();
        return redirect()->route('shops.index');
    }


    //閲覧ユーザーコントローラー
    public function user_index(Request $request)
    {
        $search = $request->input('search');

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
        $shops = $query->paginate(20);

        return view('shops/user_index', [
            'shops' => $shops,
        ]);
    }

    public function user_show(int $id)
    {
        $shop = Shop::findOrFail($id); // findOrFail 見つからなかった時の例外処理
        $like = $shop->likes()->where('user_id', Auth::user()->id)->first();
        $foods = $shop->foods()->get();

        return view('shops.user_show')->with(array('shop' => $shop, 'like' => $like, 'foods'=>$foods));
            // return view('shops/user_show',[
            // 'shop' => $shop,
            // 'foods' => $foods
            // ]);
    }
}
