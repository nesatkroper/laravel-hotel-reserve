<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    //
    protected $table = 'product_stock_tbl';

    protected $primaryKey = 'product_stock_id';

    protected $fillable = [
        'product_id',
        'supplier_id',
        'inv_number',
        'product_add',
        'add_price',
        'add_date',
        'memo',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
    }
}
