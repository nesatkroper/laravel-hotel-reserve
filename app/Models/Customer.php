<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customer_tbl';

    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'auth_id',
        'account_status',
        'first_name',
        'last_name',
        'picture',
        'gender',
        'email',
        'phone',
        'address',
        'city',
        'state',
    ];
}
