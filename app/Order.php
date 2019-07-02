<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'products' => 'array',
    ];
}
