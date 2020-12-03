<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Food;
use App\Models\Customer;
use Auth;
use App\Models\Like;
use App\Models\Tag;
use App\Models\ShopTag;

class Shop extends Model
{

    public function foods()
    {
        return $this->hasMany('App\Models\Food');
    }


    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function like_by()
    {
        return Like::where('user_id', Auth::user()->id)->first();
    }

    public function tags()
    {
        return $this->hasManyThrough('App\Models\Tag', 'App\Models\ShopTag', 'shop_id', 'id', null, 'tag_id');
    }
}
