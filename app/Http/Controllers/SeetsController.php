<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seet;
use App\Models\Shop;
use App\Models\Type;

class SeetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Shop $shop)
    {
        $seets = Seet::all();
        return view('shops.seets.index',[
            'shop' => $shop,
            'seets' => $seets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Shop $shop)
    {
        $types = Type::all();
        return view('shops.seets.create',[
            'shop' => $shop,
            'types' => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shop $shop)
    {

        $seet = new Seet();
        $seet->fill($request->all());
        $seet->shop_id = $shop->id;
        $seet->save();

        return redirect()
        ->route('shops.seets.index',[
            'shop' => $shop
        ])
        ->with('store_seet_success','席を作成しました');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        $types = Type::all();
        return view('shops.seets.edit',compact($shop,$types));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
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
