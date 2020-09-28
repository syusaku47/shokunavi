<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;

class Like extends Model
{
    use CounterCache;

    public $counterCacheOptions = [
        'Shop' => [
            'field' => 'likes_count',
            'foreignKey' => 'shop_id'
        ]
    ];

    protected $fillable = ['user_id', 'shop_id'];

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
