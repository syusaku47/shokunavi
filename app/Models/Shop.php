<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Food;
use Auth;
use App\Models\Like;

class Shop extends Model
{

    public function foods()
    {
        return $this->hasMany('App\Models\Food');
    }

    protected $fillable = ['title', 'body', 'summary', 'user_id'];

    public function comments() 
    {
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