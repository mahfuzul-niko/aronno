<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   protected $fillable = [
    'room_id',
    'start_date',
    'end_date',
    'guest_name',
    'guest_number',
    'guest_email',
    'price',
    'payment_status',
    'payment_type',
    'booking_status',
];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
