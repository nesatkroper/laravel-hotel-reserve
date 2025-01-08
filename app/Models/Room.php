<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $table = 'room_tbl';

    protected $primaryKey = 'room_id';

    protected $fillable = [
        'room_type',
        'room_name',
        'picture',
        'price',
        'is_ac',
        'capacity',
        'size',
        'discount_rate',
        'is_booked',
        'status'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'room_id', 'room_id');
    }

    public function room_pictures()
    {
        return $this->hasMany(RoomPicture::class, 'room_id', 'room_id');
    }

    public function reservation_details()
    {
        return $this->hasMany(ReservationDetail::class, 'reservation_detail_id');
    }
}
