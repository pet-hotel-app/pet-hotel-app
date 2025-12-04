<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'booking_id',
        'message',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public function scopeConversation($query, $userId1, $userId2)
    {
        return $query->where(function($q) use ($userId1, $userId2) {
            $q->where('sender_id', $userId1)->where('receiver_id', $userId2);
        })->orWhere(function($q) use ($userId1, $userId2) {
            $q->where('sender_id', $userId2)->where('receiver_id', $userId1);
        })->orderBy('created_at', 'asc');
    }

    public function markAsRead()
    {
        $this->update(['read_at' => now()]);
    }
}
