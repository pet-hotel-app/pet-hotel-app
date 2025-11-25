<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = ['owner_id', 'name', 'species', 'breed', 'age', 'notes'];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
