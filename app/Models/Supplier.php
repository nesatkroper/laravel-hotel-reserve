<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table = 'supplier_tbl';

    protected $primaryKey = 'supplier_id';

    protected $fillable = [
        'supplier_name',
        'company_name',
        'phone',
        'email',
        'address',
    ];

    public function stocks()
    {
        return $this->belongsTo(ProductStock::class, 'supplier_id', 'supplier_id');
    }
}
