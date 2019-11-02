<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable = [
        'size', 'quantity','product_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
