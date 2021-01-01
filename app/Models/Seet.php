<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seet extends Model
{
    protected $fillable = ['num_of_seets','image','discription'];

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }
}
