<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'camp_id', 'discount_id', 'payment_status', 'midtrans_url', 'midtrans_booking_code', 'discount_percentage', 'total'];

    public function setExpiredAttribute($value) {
        return $this->attributes['expired'] = date('Y-m-t', strtotime($value));
    }

    public function Camp() {
        return $this->belongsTo(Camp::class);
    }

    public function User() {
        return $this->belongsTo(User::class);
    }

    public function Discount() {
        return $this->belongsTo(Discount::class);
    }
}
