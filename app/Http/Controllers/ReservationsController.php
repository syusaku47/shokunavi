<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Shop;
use Auth;
use App\Mail\ReservationSended;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shop $shop)
    {
        // ログインユーザー取得
        $current_user = Auth::guard('user')->user();

        $reservation = new Reservation();
        $reservation->fill($request->all());
        $reservation->user_id = $current_user->id;
        $reservation->seet_id = $request->seetId;
        $reservation->created_at = Carbon::now();
        $reservation->updated_at = Carbon::now();
        $reservation->save();

        // メール送信機能 予約がされたらメールが送信される
        Mail::to($current_user)->send(new ReservationSended($current_user, $reservation));

        return redirect()
            ->route('shops.user_show', [
                'shop' => $shop
            ])->with('store_reservation_success', '予約が完了しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
