<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $table = 'position_tbl';

    protected $primaryKey = 'position_id';

    protected $fillable = [
        'department_id',
        'position_name',
        'position_code',
        'memo'
    ];

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }
}
