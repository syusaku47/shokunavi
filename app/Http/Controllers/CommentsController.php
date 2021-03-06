<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Shop;
use App\Http\Requests\CommentForm;
use Auth;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentForm $request, Shop $shop)
    {
        $comment = new Comment();
        $comment->title = $request->title;
        $comment->body = $request->body;
        $comment->shop_id = $shop->id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->route('shops.user_show', [
            'shop' => $shop->id
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop, Comment $comment)
    {
        $customer = $shop->customer()->first();
        if (Auth::guard('customer')->user()->id == $customer->id) {
            $comments = $shop->comments()->get();
            $comment->delete();
            return redirect()->route('shops.show', [
                'shop' => $shop,
                'comments' => $comments,

            ]);
        }
    }
}
