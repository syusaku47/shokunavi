<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateFood;
use App\Http\Requests\EditFood;
use App\Models\Food;
use App\Models\Category;
use App\Models\Shop;
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
    public function create(Shop $shop)
    {
        return view('shops.foods.create',[
            'shop'=>$shop
        ]
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFood $request, $id)
    {
        $shop = Shop::find($id);
        $i=0;
        foreach ($request->num as $val) {
            $food = new Food();
            
            $food->name = $request->menu_name[$i];
            if($i>1){
                $food->category_id = 2;
            }else{
                $food->category_id = 1;
            }

            if( $request->tips[$i] == 1 ){
                $food->tips = $request->tips[$i];
            } 

            $food->price = $request->price[$i];
            $food->description = $request->description[$i];
            
            $food->shop_id = $shop->id;
            $food->created_at = Carbon::now();
            $food->updated_at = Carbon::now();
            $food->save();
            $i++;
        }

        return redirect()->route('shops.show',[
            'shop'=>$shop->id
        ]);
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
    public function edit(Shop $shop)
    {  
        $foods = $shop->foods()->where('category_id', 1 )->get();   //食事メニュー取得
        $drinks = $shop->foods()->where('category_id', 2 )->get();  //ドリンク取得
        
        return view('shops.foods.edit',[
        'shop' => $shop,
        'foods' => $foods,
        'drinks' => $drinks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFood $request, Shop $shop)
    {
        $foods = $shop->foods()->get();
        $i=0;
        foreach ($foods as $food) {
            
            $food->name = $request->menu_name[$i];
            $food->price = $request->price[$i];
            $food->description = $request->description[$i];
            $food->tips = $request->tips[$i];
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
    public function destroy(Shop $shop,Food $food)
    {
        $food->delete();
        return redirect()->route('shops.show',[
        'shop'=> $shop
            ]);
    }
}
