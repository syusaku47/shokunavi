<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateShop;
use App\Models\Food;
use Carbon\Carbon;
use Auth;

class FoodsController extends Controller
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
        return view('foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->num as $val) {
            $food = new Food();
            
            //ドリンクの時
            if( $i >= $f ){
                $food->name = $request->Food_name[$i];
                // $food->hot = $request->hot[$i];
                $food->category_id = 2;
            }else{//食事メニューの時
                $food->name = $request->Food_name[$i];
                // $food->spice = $request->spice[$i];
            }

            if( $request->tips[$i] == 1 ){
                $food->tips = $request->tips[$i];
            } 

            $food->price = $request->price[$i];
            $food->description = $request->description[$i];
            
            $food->content_id = $shop->id;
            $food->created_at = Carbon::now();
            $food->updated_at = Carbon::now();
            $food->save();
            $i++;
        }
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
        $foods = $shop->foods()->get();
        $i=0;
        foreach ($foods as $food) {
            
            if( $request->drink_name ){
                $food->name = $request->drink_name[$i];
                $food->hot = $request->hot[$i];
            }else{
                $food->name = $request->food_name[$i];
                $food->spice = $request->spice[$i];
            }
            $food->price = $request->price[$i];
            $food->description = $request->description[$i];
            $food->updated_at = Carbon::now();
            $food->save();
            $i++;
        }

        return redirect()->route('shops.index');
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
