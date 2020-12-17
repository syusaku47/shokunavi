<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seet extends Model
{
    protected $fillable = ['type','num_of_seets','image','discription'];

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
