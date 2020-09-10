<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;

class Like extends Model
{
    use CounterCache;

    public $counterCacheOptions = [
        'Content' => [
            'field' => 'likes_count',
            'foreignKey' => 'content_id'
        ]
    ];

    protected $fillable = ['user_id', 'content_id'];

    public function Content()
    {
        return $this->belongsTo('App\Models\Content');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
