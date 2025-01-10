<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $table = 'sale_tbl';

    protected $primaryKey = 'sale_id';

    protected $fillable = [
        'employee_id',
        'room_id',
        'customer_id',
        'sale_date',
        'discount_rate',
        'total',
        'amount'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'employee_id', 'employee_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_id', 'room_id');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'customer_id', 'customer_id');
    }
}
