<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventBooking extends Model
{
    protected $table = 'eventBooking';
    protected $fillable = [
        'name',
        'phone_code',
        'phone',
        'tickets',
        'user_id',
        'event_id',
    ];
}
