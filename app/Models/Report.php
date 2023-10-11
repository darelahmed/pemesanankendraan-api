<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'vehicle_booking_id',
        'user_id',
        'approval_level',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function booking() {
        return $this->belongsTo(VehicleBooking::class, 'vehicle_booking_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
