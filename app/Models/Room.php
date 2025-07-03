<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
     protected $guarded = [];
    public function getPrice()
    {
        if ($this->discount_price !== null) {
            return $this->discount_price;
        }

        if ($this->discount_percent !== null) {
            $discount = ($this->price * $this->discount_percent) / 100;
            return $this->price - $discount;
        }

        return $this->price;
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function isAvailable($startDate, $endDate)
    {
        return !$this->bookings()
            ->where('booking_status', '!=', 'cancelled')
            ->where('start_date', '<=', $endDate)
            ->where('end_date', '>=', $startDate)
            ->exists();
    }
}
