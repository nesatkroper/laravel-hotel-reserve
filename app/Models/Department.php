<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $table = 'department_tbl';

    protected $primaryKey = 'department_id';

    protected $fillable = [
        'department_name',
        'department_code',
        'memo'
    ];

    public function positions()
    {
        return $this->hasMany(Position::class, 'department_id', 'department_id');
    }
}
