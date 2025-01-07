<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupPicture extends Model
{
    //
    protected $table = 'group_picture_tbl';

    protected $primaryKey = 'group_picture_id';

    protected $fillable = [
        'parent_id',
        'picture_name',
        'picture',
    ];

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'parent_id', 'group_picture_id');
    }
}
