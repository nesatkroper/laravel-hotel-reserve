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
        'group_picture_id',
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

    public function group_pictures()
    {
        return $this->hasMany(GroupPicture::class, 'group_picture_id', 'parent_id');
    }
}
