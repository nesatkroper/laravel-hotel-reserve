<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $table = 'reservation_tbl';

    protected $primaryKey = 'reservation_id';

    protected $fillable = [
        'room_id',
        'customer_id',
        'checkin_date',
        'checkout_date',
        'is_checkin',
        'is_checkout',
        'reservation_type',
        'adults',
        'children',
        'payment_status',
        'payment_method',
        'memo',
        'is_hidden'
    ];
}
