<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['num_of_guests', 'date', 'time', 'shop_id', 'seet_id'];
}
