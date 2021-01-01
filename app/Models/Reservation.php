<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Reservation extends Pivot
{
    protected $fillable = ['num_of_guests', 'date', 'time', 'user_id', 'seet_id'];
    protected $table = 'seet_user';
}
