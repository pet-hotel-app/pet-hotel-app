<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['pet_id', 'owner_id', 'room_id', 'start_date', 'end_date', 'status', 'total_price', 'checked_in_at', 'checked_out_at'];

    protected $dates = ['start_date', 'end_date', 'checked_in_at', 'checked_out_at'];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
