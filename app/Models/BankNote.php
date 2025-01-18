<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankNote extends Model
{
    //
    protected $table = 'bank_note_tbl';

    protected $primaryKey = 'bank_note_id';

    protected $fillable = [
        'khmer_100',
        'khmer_500',
        'khmer_1K',
        'khmer_2K',
        'khmer_5K',
        'khmer_10K',
        'khmer_15K',
        'khmer_20K',
        'khmer_30K',
        'khmer_50K',
        'khmer_100K',
        'khmer_200K',
        'us_1',
        'us_5',
        'us_10',
        'us_50',
        'us_100',
    ];

    public function openshifts()
    {
        return $this->belongsTo(OpenShift::class);
    }

    public function closeshifts()
    {
        return $this->belongsTo(CloseShift::class);
    }
}
