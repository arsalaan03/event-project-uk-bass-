<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
      'event_id',
      'title',
      'slug',
      'image',
      'short_content',
      'data_time',
      'overview',
      'location',
      'map',
      'price',
      'event_date_time',
      'user_id',
    ];

    function category()
    {
        return $this->belongsTo(EventCategory::class, 'event_id');
    }
}
