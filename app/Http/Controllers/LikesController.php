<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Like;
use Auth;
use App\Models\Shop;
class LikesController extends Controller
{
    public function store(Request $request, $shopId)
    {
        Like::create(
        array(
            'user_id' => Auth::user()->id,
            'shop_id' => $shopId
            )
        );

        $shop = Shop::findOrFail($shopId);

        return redirect()
            ->action('ShopsController@user_show', $shop->id);
    }

    public function destroy($shopId, $likeId) {
        $shop = Shop::findOrFail($shopId);
        $shop->like_by()->findOrFail($likeId)->delete();

        return redirect()
            ->action('ShopsController@user_show', $shop->id);
    }
}
