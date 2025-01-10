<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product_tbl';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name',
        'product_code',
        'product_category_id',
        'picture',
        'price',
        'discount_rate',
        'status'
    ];

    public function categories()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'product_category_id');
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class, 'product_id', 'product_id');
    }
}
