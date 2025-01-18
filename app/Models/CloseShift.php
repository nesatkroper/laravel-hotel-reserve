<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CloseShift extends Model
{
    //
    protected $table = 'close_shift_tbl';

    protected $primaryKey = 'close_shift_id';

    protected $fillable = [
        'emplyee_id',
        'bank_note_id',
        'close_khmer_riel',
        'close_us_dollar',
        'shift_code',
        'close_date',
        'close_time'
    ];

    public function employeese()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function banknotes()
    {
        return $this->hasOne(BankNote::class, 'bank_note_id', 'bank_note_id');
    }
}
