<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        dd($request);
        //ログインユーザーIDを取得
        $loginId = Auth::id();
        //カート情報のユーザーIDを取得
        $requestId = $request->user_id;

        //ログイン者とカート情報作成者が一致しなければ別のページにリダイレクト
        if ($loginId != $requestId) {
            return redirect(route('shops.user_index'))->with('user_not_same', 'こちらへはアクセスが出来ません');
        }

        //チェックに合格し次の処理に進むことができる
        return $next($request);
    }
}
