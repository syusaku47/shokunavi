<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopTag extends Model
{
    protected $table = 'shop_tag';
    protected $fillable = ['shop_id','tag_id'];
}
