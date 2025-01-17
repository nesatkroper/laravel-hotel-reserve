<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $table = 'product_categorie_tbl';

    protected $primaryKey = 'product_category_id';

    protected  $fillable = [
        'picture',
        'category_name',
        'category_code',
        'memo'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }
}
