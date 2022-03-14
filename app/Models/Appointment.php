<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function therapyRoom()
    {
        return $this->belongsTo(TherapyRoom::class, 'therapy_room_id');
    }

    public function therapist()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
