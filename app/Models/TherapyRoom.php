<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapyRoom extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'therapy_room_id');
    }
}
