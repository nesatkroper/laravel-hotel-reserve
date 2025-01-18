<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenShift extends Model
{
    //
    protected $table = 'open_shift_tbl';

    protected $primaryKey = 'open_shift_id';

    protected $fillable = [
        'employee_id',
        'bank_note_id',
        'open_khmer_riel',
        'open_us_dollar',
        'shift_code',
        'open_date',
        'open_time'
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
