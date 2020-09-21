<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Food;
use App\Models\Drink;
use Auth;
use App\Models\Like;

class Content extends Model
{
    public function foods()
    {
        return $this->hasMany('App\Models\Food');
    }

    public function drinks()
    {
        return $this->hasMany('App\Models\Drink');
    }

    protected $fillable = ['title', 'body', 'summary', 'user_id'];

    public function comments() {
      return $this->hasMany('App\Models\Comment');
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function likes()
    {
      return $this->hasMany('App\Models\Like');
    }

    public function like_by()
    {
      return Like::where('user_id', Auth::user()->id)->first();
    }
}

