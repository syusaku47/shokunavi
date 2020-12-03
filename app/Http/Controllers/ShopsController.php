<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShop;
use App\Http\Requests\EditShop;
use App\Models\Shop;
use App\Models\Tag;
use App\Models\ShopTag;
use App\Models\Category;
use Carbon\Carbon;
use Auth;
use App\Services\ShopFormData;
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
        $customer = Auth::guard('customer')->user();
        $shops = DB::table('shops')
            ->where('customer_id', $customer->id)
            ->select('id', 'name', 'catchcopy', 'recommend', 'image', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->paginate(20);

        return view('shops.index', [
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
        $tags = Tag::all();
        return view('shops.create', [
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateShop $request)
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


        foreach ($request->tag as $req) {
            $tag = new ShopTag();
            $tag->shop_id = $shop->id;
            $tag->tag_id = $req;
            $tag->save();
        }

        return redirect()->route('shops.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        $foods = $shop->foods()->where('category_id', 1)->get();   //食事メニュー取得
        $drinks = $shop->foods()->where('category_id', 2)->get();  //ドリンク取得
        $tags = $shop->tags()->get();
        $comments = $shop->comments()->get();  //口コミ取得

        return view('shops/show', [
            'shop' => $shop,
            'foods' => $foods,
            'drinks' => $drinks,
            'tags' => $tags,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        $foods = $shop->foods()->get();

        return view('shops.edit', [
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
    public function update(EditShop $request, $id)
    {
        $shop = Shop::findOrFail($id);
        $shop->name = $request->name;
        $shop->catchcopy = $request->catchcopy;
        $shop->recommend = $request->recommend;
        if ($file = $request->image) {
            $shop->image = ShopFormData::createImage($request);
        }
        $shop->updated_at = Carbon::now();
        $shop->save();

        return redirect()->route('shops.show', [
            'shop' => $shop,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->route('shops.index');
    }


    //閲覧ユーザーコントローラー
    public function user_index(Request $request)
    {
        $shops = ShopFormData::search($request);

        return view('shops.user_index', [
            'shops' => $shops,
        ]);
    }

    public function user_show(Shop $shop)
    {
        $like = $shop->likes()->where('user_id', Auth::user()->id)->first();
        $foods = $shop->foods()->where('category_id', 1)->get();   //食事メニュー取得
        $drinks = $shop->foods()->where('category_id', 2)->get();  //ドリンク取得
        $comments = $shop->comments()->get();  //口コミ取得
        return view('shops.user_show')
            ->with(array(
                'shop' => $shop,
                'like' => $like,
                'foods' => $foods,
                'drinks' => $drinks,
                'comments' => $comments
            ));
    }
}
