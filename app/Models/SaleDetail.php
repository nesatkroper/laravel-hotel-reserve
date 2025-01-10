<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    //
    protected $table = 'sale_detail_tbl';

    protected $primaryKey = 'sale_detail_id';

    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'amount'
    ];

    public function sales()
    {
        return $this->belongsTo(Sale::class, 'sale_id', 'sale_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
