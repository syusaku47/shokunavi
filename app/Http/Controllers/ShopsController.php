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
        // ログインカスターを取得
        $customer = Auth::guard('customer')->user();

        // ログインカスタマーの店舗取得
        $shops = DB::table('shops')
            ->where('customer_id', $customer->id)
            ->select('id', 'name', 'catchcopy', 'recommend', 'image', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->paginate(20);

        // タグを取得
        $tags = Tag::all();

        return view('shops.index', [
            'shops' => $shops,
            'tags' => $tags,
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
        // $shop = Shop::create([
        //     'name' => $request->name,
        //     'image' => 'default.jpg',
        //     'catchcopy' => $request->catchcopy,
        //     'recommend' => $request->recommend,
        //     'customer_id' => Auth::user()->id,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

        $shop = new Shop();
        $shop->fill($request->all());//fillは
        $shop->image = 'default.jpg';
        $shop->customer_id = Auth::user()->id;
        $shop->created_at = Carbon::now();
        $shop->updated_at = Carbon::now();
        $shop->save();

        foreach ($request->tag as $req) {
            $tag = ShopTag::create([
                'shop_id' => $shop->id,
                'tag_id' => $req,
            ]);
        }
        // foreach ($request->tag as $req) {
        //     $tag = new ShopTag();
        //     $tag->shop_id = $shop->id;
        //     $tag->tag_id = $req;
        //     $tag->save();
        // }

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
        $tags = Tag::all();
        $shopTags = DB::table('shop_tag')
            ->where('shop_id', $shop->id)
            ->select('tag_id')
            ->get();

        foreach ($shopTags as $shopTag) {
            $tagId[] = $shopTag->tag_id;
        }

        return view('shops.edit', [
            'shop' => $shop,
            'tags' => $tags,
            'tagId' => $tagId,
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


        $tags = DB::table('shop_tag')
        ->where('shop_id',$shop->id)
        ->delete();

        for($i=0; $i<count($request->tag); $i++){
            $tagId = new ShopTag();
            $tagId->shop_id = $shop->id;
            $tagId->tag_id = $request->tag[$i];
            $tagId->save();
        }

        if ($file = $request->image) {
            $shop->image = ShopFormData::createImage($request);
        }
        $shop->updated_at = Carbon::now();
        $shop->save();


// $request->tag[$i];

//         foreach($request as $req){
//             for($i=0; $i<count($tagsId); $i++){
//                 if($req->tag[$i]!=$tagsId[$i]['tag_id']){
                    
//                 }else{

//             }
//         }
//         }

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
