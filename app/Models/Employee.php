<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'employee_tbl';

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'auth_id',
        'account_status',
        'first_name',
        'last_name',
        'picture',
        'gender',
        'dob',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'position',
        'department',
        'salary',
        'hired_date'
    ];
}
