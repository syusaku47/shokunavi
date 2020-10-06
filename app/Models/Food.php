<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Food extends Model
{
    protected $table = 'foods';
    
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function getTax()
    {
        return $this->price*1.08;
    }
}
