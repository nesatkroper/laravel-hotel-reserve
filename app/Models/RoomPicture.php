<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomPicture extends Model
{
    //
    protected $table = 'room_picture_tbl';

    protected $primaryKey = 'room_picture_id';

    protected $fillable = [
        'room_id',
        'picture_name',
        'picture',
    ];

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_picture_id');
    }
}
