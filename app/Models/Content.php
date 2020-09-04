<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Content extends Model
{
    public function menus()
    {
        return $this->hasMany('App\Models\Menu');
    }
}

