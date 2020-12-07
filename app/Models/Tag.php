<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected  $fillable = ['name'];

    public function shops()
    {
        return $this->hasManyThrough('App\Models\Shop', 'App\Models\ShopTag', 'tag_id', 'id', null, 'shop_id');
    }
}
