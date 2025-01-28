<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'employee_tbl';

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'employee_code',
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
        'position_id',
        'department_id',
        'salary',
        'hired_date'
    ];

    public function reservations()
    {
        return $this->belongsTo(Reservation::class, 'employee_id', 'employee_id');
    }

    public function auth()
    {
        return $this->belongsTo(User::class, 'auth_id', 'employee_id');
    }

    public function reservation_details()
    {
        return $this->hasMany(ReservationDetail::class, 'reservation_detail_id');
    }

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function positions()
    {
        return $this->belongsTo(Position::class, 'position_id', 'position_id');
    }
}
