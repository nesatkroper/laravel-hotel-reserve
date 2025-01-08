<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    //
    protected $table = 'reservation_detail_tbl';

    protected $primaryKey = 'reservation_detail_id';

    protected $fillable = [
        'reservation_id',
        'room_id',
        'employee_id',
        'customer_id',
        'memo'
    ];

    public function reservations()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id', 'reservation_id');
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
}
